<?php
require_once 'functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
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
    $filename = time() . '_' . basename($_FILES[$file_key]['name']);
    $target = $upload_dir . $filename;
    if (move_uploaded_file($_FILES[$file_key]['tmp_name'], $target)) {
        return $target;
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
    'residence' => $_POST['residence'] ?? '',
    'departure' => $_POST['departure'] ?? '',
    'visa' => $_POST['visa'] ?? '',
    'referral' => $_POST['referral'] ?? '',
    'journey' => $_POST['journey'] ?? '',
    'impact' => $_POST['impact'] ?? '',
    'profile_photo' => handle_upload('profile_photo'),
    'passport_photo' => handle_upload('passport_photo'),
    'payment_method' => $_POST['payment_method'] ?? '',
    'txid' => $_POST['txid'] ?? '',
    'payment_screenshot' => handle_upload('payment_screenshot'),
    'amount' => floatval($_POST['amount'] ?? 0)
];

$success = save_registration($data);

echo json_encode(['success' => $success, 'message' => $success ? 'Saved successfully' : 'Database error']);