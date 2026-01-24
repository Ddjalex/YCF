<?php
require_once 'functions.php';

header('Content-Type: application/json');

// Stop accidental GET requests from creating NULL records
if ($_SERVER['REQUEST_METHOD'] === 'GET' && empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $method = $_SERVER['REQUEST_METHOD'] ?? 'UNKNOWN';
    error_log("Invalid request method access: " . $method . " from " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));
    echo json_encode(['success' => false, 'message' => 'Invalid request method: ' . $method]);
    exit;
}

// Log input data for debugging
error_log("REQUEST METHOD: " . $_SERVER['REQUEST_METHOD']);
error_log("POST count: " . count($_POST));
error_log("FILES count: " . count($_FILES));
error_log("CONTENT TYPE: " . ($_SERVER['CONTENT_TYPE'] ?? 'N/A'));

$data_source = array_merge($_GET, $_POST);

// CRITICAL: Ensure we actually have data before proceeding
$raw_input = file_get_contents('php://input');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST) && !empty($raw_input)) {
        error_log("POST is empty but RAW input exists (length: " . strlen($raw_input) . ")");
        
        // Try JSON parsing
        $json_data = json_decode($raw_input, true);
        if ($json_data) {
             $data_source = array_merge($data_source, $json_data);
        }
        
        // Try manual multipart/json_backup parsing
        if (preg_match('/name="json_backup"[\r\n]+[\r\n]+(.*?)\r\n--/s', $raw_input, $backup_match)) {
            $backup = json_decode(trim($backup_match[1]), true);
            if ($backup) {
                error_log("Extracted backup: " . json_encode($backup));
                $data_source = array_merge($data_source, $backup);
            }
        }
        
        // Final regex sweep for name="key" -> value
        if (empty($data_source['email'])) {
             preg_match_all('/name="([^"]+)"[\r\n]+[\r\n]+(.*?)\r\n/s', $raw_input, $matches);
             if (!empty($matches[1])) {
                 foreach ($matches[1] as $i => $name) {
                     if ($name !== 'json_backup') {
                         $val = trim($matches[2][$i]);
                         if (strpos($val, "Content-Type") === false) {
                             $data_source[$name] = $val;
                         }
                     }
                 }
             }
        }
    }
}

// STOP if we still have no critical data to prevent NULL entries
if (empty($data_source['first_name']) && empty($data_source['email'])) {
    error_log("CRITICAL: Rejecting empty registration attempt. Method: " . $_SERVER['REQUEST_METHOD']);
    echo json_encode(['success' => false, 'message' => 'Registration form data was not received. Please refresh and try again.']);
    exit;
}


$upload_dir = 'uploads/';
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

function handle_upload($file_key) {
    global $upload_dir;
    if (!isset($_FILES[$file_key]) || $_FILES[$file_key]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }
    $filename = time() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", basename($_FILES[$file_key]['name']));
    $target = $upload_dir . $filename;
    if (move_uploaded_file($_FILES[$file_key]['tmp_name'], $target)) {
        return 'uploads/' . $filename;
    }
    return null;
}

// Fallback for package information if it's missing in data_source
if (empty($data_source['package_name']) && !empty($raw_input)) {
    if (preg_match('/"package_name":"([^"]+)"/', $raw_input, $pn_match)) {
        $data_source['package_name'] = $pn_match[1];
    }
    if (preg_match('/"package_id":"([^"]+)"/', $raw_input, $pi_match)) {
        $data_source['package_id'] = $pi_match[1];
    }
}

$data = [
    'package_id' => !empty($data_source['package_id']) ? $data_source['package_id'] : null,
    'package_name' => !empty($data_source['package_name']) ? $data_source['package_name'] : null,
    'first_name' => !empty($data_source['first_name']) ? $data_source['first_name'] : null,
    'last_name' => !empty($data_source['last_name']) ? $data_source['last_name'] : null,
    'nationality' => !empty($data_source['nationality']) ? $data_source['nationality'] : null,
    'email' => !empty($data_source['email']) ? $data_source['email'] : null,
    'gender' => !empty($data_source['gender']) ? $data_source['gender'] : null,
    'dob' => !empty($data_source['dob']) ? $data_source['dob'] : null,
    'phone' => !empty($data_source['phone']) ? $data_source['phone'] : null,
    'profession' => !empty($data_source['profession']) ? $data_source['profession'] : null,
    'residence' => !empty($data_source['residence']) ? $data_source['residence'] : null,
    'departure' => !empty($data_source['departure']) ? $data_source['departure'] : null,
    'visa' => !empty($data_source['visa']) ? $data_source['visa'] : null,
    'referral' => !empty($data_source['source']) ? $data_source['source'] : (!empty($data_source['referral']) ? $data_source['referral'] : null),
    'source' => !empty($data_source['source']) ? $data_source['source'] : null,
    'journey' => !empty($data_source['journey']) ? $data_source['journey'] : null,
    'impact' => !empty($data_source['impact']) ? $data_source['impact'] : null,
    'profile_photo' => handle_upload('profile_photo'),
    'passport_photo' => handle_upload('passport_photo'),
    'payment_method' => !empty($data_source['payment_method']) ? $data_source['payment_method'] : null,
    'txid' => !empty($data_source['txid']) ? $data_source['txid'] : null,
    'payment_screenshot' => handle_upload('payment_screenshot'),
    'amount' => floatval($data_source['amount'] ?? 0)
];

// Final check to prevent saving if essential fields are still NULL after recovery
if ($data['first_name'] === null || $data['email'] === null) {
    error_log("CRITICAL: Rejecting registration due to missing essential fields (Email/Name). Data Source: " . json_encode($data_source));
    echo json_encode(['success' => false, 'message' => 'Your registration data was lost during transmission. Please try reducing the size of your uploaded photos and try again.']);
    exit;
}

$success = save_registration($data);

if (!$success) {
    $pdo = get_db_connection();
    $errorInfo = $pdo ? $pdo->errorInfo() : "No connection";
    error_log("Registration Save Failed for: " . ($data['email'] ?? 'unknown') . " - Error: " . json_encode($errorInfo));
}

// Ensure clean output for JSON response
ob_clean();
echo json_encode(['success' => $success, 'message' => $success ? 'Saved successfully' : 'Database error']);
exit;