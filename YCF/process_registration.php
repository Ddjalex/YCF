<?php
require_once 'functions.php';

header('Content-Type: application/json');

// Log the request method and content type for debugging
error_log("Request Method: " . $_SERVER['REQUEST_METHOD']);
error_log("Content-Type: " . ($_SERVER['CONTENT_TYPE'] ?? 'not set'));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // FormData (multipart/form-data) automatically populates $_POST
    // Only try JSON parsing if $_POST is empty (pure JSON request)
    if (empty($_POST)) {
        $raw_input = file_get_contents('php://input');
        if (!empty($raw_input)) {
            $json_input = json_decode($raw_input, true);
            if ($json_input) {
                $_POST = $json_input;
                error_log("Parsed JSON input: " . json_encode($json_input));
            }
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['first_name']) || isset($_GET['email'])) {
        $_POST = array_merge($_POST, $_GET);
    } else {
        error_log("General GET access to process_registration.php from " . $_SERVER['REMOTE_ADDR']);
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

// Collect fields
$data = [
    'package_id' => $_POST['package_id'] ?? '',
    'package_name' => $_POST['package_name'] ?? '',
    'first_name' => $_POST['first_name'] ?? '',
    'last_name' => $_POST['last_name'] ?? '',
    'nationality' => $_POST['nationality'] ?? '',
    'email' => $_POST['email'] ?? '',
    'gender' => $_POST['gender'] ?? '',
    'dob' => $_POST['dob'] ?? '',
    'phone' => $_POST['phone'] ?? '',
    'profession' => $_POST['profession'] ?? '',
    'organization' => $_POST['organization'] ?? '',
    'residence' => $_POST['residence'] ?? '',
    'departure' => $_POST['departure'] ?? '',
    'visa' => $_POST['visa'] ?? '',
    'referral' => $_POST['referral'] ?? '',
    'source' => $_POST['source'] ?? '',
    'journey' => $_POST['journey'] ?? '',
    'impact' => $_POST['impact'] ?? '',
    'profile_photo' => handle_upload('profile_photo') ?? handle_upload('reg_profile_photo'),
    'passport_photo' => handle_upload('passport_photo') ?? handle_upload('reg_passport_photo'),
    'payment_method' => $_POST['payment_method'] ?? '',
    'txid' => $_POST['txid'] ?? $_POST['transaction_id'] ?? '',
    'payment_screenshot' => handle_upload('payment_screenshot') ?? handle_upload('crypto_screenshot'),
    'amount' => floatval($_POST['amount'] ?? 0),
    'status' => 'pending'
];

// CRITICAL DEBUG: Log exactly what we received from POST
error_log("DEBUG: Full _POST contents: " . json_encode($_POST));
error_log("DEBUG: Full _FILES contents: " . json_encode($_FILES));

// Check if we have essential data
if (empty($data['first_name']) && isset($_POST['json_backup'])) {
    $backup = json_decode($_POST['json_backup'], true);
    if ($backup) {
        foreach ($data as $key => $val) {
            if (empty($val) && isset($backup[$key])) {
                $data[$key] = $backup[$key];
            }
        }
    }
}

// Clean up: remove source from referral if referral is set
if (!empty($data['referral']) && empty($data['source'])) {
    $data['source'] = $data['referral'];
}

// Log data before saving to debug missing fields
$raw_post = $_POST;
// Filter out binary data for logging
if (isset($raw_post['profile_photo'])) $raw_post['profile_photo'] = '[binary]';
if (isset($raw_post['passport_photo'])) $raw_post['passport_photo'] = '[binary]';
error_log("Raw POST data: " . json_encode($raw_post));
error_log("Saving registration data: " . json_encode($data));

$success = save_registration($data);

if (!$success) {
    $pdo = get_db_connection();
    $errorInfo = $pdo ? $pdo->errorInfo() : "No connection";
    error_log("Registration Save Failed for: " . ($data['email'] ?? 'unknown') . " - Error: " . json_encode($errorInfo));
} else {
    error_log("Registration saved successfully for " . ($data['email'] ?? 'unknown'));
}

echo json_encode(['success' => $success, 'message' => $success ? 'Saved successfully' : 'Database error']);