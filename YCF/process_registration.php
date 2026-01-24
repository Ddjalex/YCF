<?php
require_once 'functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $raw_input = file_get_contents('php://input');
    if (!empty($raw_input)) {
        $json_input = json_decode($raw_input, true);
        if ($json_input) {
            $_POST = array_merge($_POST, $json_input);
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // If it's a GET request but contains registration data, it's likely a sync issue
    if (isset($_GET['first_name']) || isset($_GET['email'])) {
        $_POST = array_merge($_POST, $_GET);
    } else {
        // Log but allow for potential fallback processing
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
    'source' => $_POST['source'] ?? ($_POST['referral'] ?? ''),
    'journey' => $_POST['journey'] ?? '',
    'impact' => $_POST['impact'] ?? '',
    'profile_photo' => handle_upload('profile_photo'),
    'passport_photo' => handle_upload('passport_photo'),
    'payment_method' => $_POST['payment_method'] ?? '',
    'txid' => $_POST['txid'] ?? '',
    'payment_screenshot' => handle_upload('payment_screenshot'),
    'amount' => floatval($_POST['amount'] ?? 0),
    'status' => 'pending'
];

// Clean up: remove source from referral if referral is set
if (!empty($data['referral']) && empty($data['source'])) {
    $data['source'] = $data['referral'];
}

// Log data before saving to debug missing fields
error_log("Saving registration data: " . json_encode($data));

$success = save_registration($data);

if (!$success) {
    $pdo = get_db_connection();
    $errorInfo = $pdo ? $pdo->errorInfo() : "No connection";
    error_log("Registration Save Failed for: " . ($data['email'] ?? 'unknown') . " - Error: " . json_encode($errorInfo));
} else {
    // Force direct save to backup if primary failed or just to be safe
    // error_log("Registration saved successfully for " . ($data['email'] ?? 'unknown'));
}

echo json_encode(['success' => $success, 'message' => $success ? 'Saved successfully' : 'Database error']);