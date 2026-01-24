<?php
require_once 'functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && $_SERVER['REQUEST_METHOD'] !== 'GET') {
    $method = $_SERVER['REQUEST_METHOD'] ?? 'UNKNOWN';
    error_log("Invalid request method access: " . $method . " from " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));
    
    // Log the actual headers to see if something is stripping the method
    $headers = getallheaders();
    error_log("Request Headers: " . json_encode($headers));

    echo json_encode(['success' => false, 'message' => 'Invalid request method: ' . $method]);
    exit;
}

// Log input data for debugging
error_log("REQUEST METHOD: " . $_SERVER['REQUEST_METHOD']);
error_log("POST count: " . count($_POST));
error_log("FILES count: " . count($_FILES));
error_log("CONTENT TYPE: " . ($_SERVER['CONTENT_TYPE'] ?? 'N/A'));

$data_source = array_merge($_GET, $_POST);

// CRITICAL: If POST is empty but it's a POST request, PHP is likely failing to parse multipart
// due to server limits or configuration. Try to grab data from json_backup field manually.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_POST)) {
    $raw_input = file_get_contents('php://input');
    if (!empty($raw_input)) {
        error_log("Attempting manual extraction from raw input (length: " . strlen($raw_input) . ")");
        
        // Look for our specific json_backup field in the multipart body
        if (preg_match('/name="json_backup"[\r\n]+[\r\n]+(.*?)\r\n--/s', $raw_input, $backup_match)) {
            $backup = json_decode(trim($backup_match[1]), true);
            if ($backup) {
                error_log("Successfully extracted backup data: " . json_encode($backup));
                $data_source = array_merge($data_source, $backup);
            }
        }
        
        // If still no data, try general extraction for any string fields
        if (empty($data_source['email'])) {
            preg_match_all('/name="([^"]+)"[\r\n]+[\r\n]+(.*?)\r\n/s', $raw_input, $matches);
            if (!empty($matches[1])) {
                foreach ($matches[1] as $i => $name) {
                    if ($name !== 'json_backup') {
                        // Clean up multipart data (remove headers if accidentally caught)
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

// Fallback: Check if we have essential data, if not, try to parse ANY strings
if (empty($data_source['email']) && !empty($raw_input)) {
    preg_match_all('/"email":"([^"]+)"/', $raw_input, $email_match);
    if (!empty($email_match[1][0])) {
         $data_source['email'] = $email_match[1][0];
    }
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

$data = [
    'package_id' => $data_source['package_id'] ?? '',
    'package_name' => $data_source['package_name'] ?? '',
    'first_name' => $data_source['first_name'] ?? '',
    'last_name' => $data_source['last_name'] ?? '',
    'nationality' => $data_source['nationality'] ?? '',
    'email' => $data_source['email'] ?? '',
    'gender' => $data_source['gender'] ?? '',
    'dob' => $data_source['dob'] ?? '',
    'phone' => $data_source['phone'] ?? '',
    'profession' => $data_source['profession'] ?? '',
    'residence' => $data_source['residence'] ?? '',
    'departure' => $data_source['departure'] ?? '',
    'visa' => $data_source['visa'] ?? '',
    'referral' => $data_source['source'] ?? $data_source['referral'] ?? '',
    'source' => $data_source['source'] ?? '',
    'journey' => $data_source['journey'] ?? '',
    'impact' => $data_source['impact'] ?? '',
    'profile_photo' => handle_upload('profile_photo'),
    'passport_photo' => handle_upload('passport_photo'),
    'payment_method' => $data_source['payment_method'] ?? '',
    'txid' => $data_source['txid'] ?? '',
    'payment_screenshot' => handle_upload('payment_screenshot'),
    'amount' => floatval($data_source['amount'] ?? 0)
];

$success = save_registration($data);

if (!$success) {
    $pdo = get_db_connection();
    $errorInfo = $pdo ? $pdo->errorInfo() : "No connection";
    error_log("Registration Save Failed for: " . ($data['email'] ?? 'unknown') . " - Error: " . json_encode($errorInfo));
}

echo json_encode(['success' => $success, 'message' => $success ? 'Saved successfully' : 'Database error']);