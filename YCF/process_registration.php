<?php
require_once 'functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST' && $_SERVER['REQUEST_METHOD'] !== 'GET') {
    $method = $_SERVER['REQUEST_METHOD'] ?? 'UNKNOWN';
    error_log("Invalid request method access: " . $method . " from " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown'));
    echo json_encode(['success' => false, 'message' => 'Invalid request method: ' . $method]);
    exit;
}

$data_source = ($_SERVER['REQUEST_METHOD'] === 'POST') ? $_POST : $_GET;


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