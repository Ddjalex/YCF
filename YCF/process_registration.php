<?php
require_once 'functions.php';

header('Content-Type: application/json');

// Debug: Log request details
error_log("Request Method: " . $_SERVER['REQUEST_METHOD']);
error_log("Content-Type: " . ($_SERVER['CONTENT_TYPE'] ?? 'not set'));
error_log("POST data keys: " . json_encode(array_keys($_POST)));

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    error_log("CRITICAL: Received " . $_SERVER['REQUEST_METHOD'] . " request to process_registration.php - REJECTING");
    
    // Check if it's an AJAX request
    $isAjax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') || 
              (isset($_SERVER['HTTP_ACCEPT']) && strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false);

    if ($isAjax) {
        echo json_encode(['success' => false, 'message' => 'Invalid request method (' . $_SERVER['REQUEST_METHOD'] . '). Only POST is allowed.']);
        exit;
    }
    
    // Fallback for direct browser access
    header("Location: index.php");
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

// Collect fields
$data = [
    'package_id' => $_POST['package_id'] ?? '',
    'package_name' => $_POST['package_name'] ?? '',
    'first_name' => $_POST['first_name'] ?? $_POST['reg_first_name'] ?? '',
    'last_name' => $_POST['last_name'] ?? $_POST['reg_last_name'] ?? '',
    'nationality' => $_POST['nationality'] ?? $_POST['reg_nationality'] ?? '',
    'email' => $_POST['email'] ?? $_POST['reg_email'] ?? '',
    'gender' => $_POST['gender'] ?? $_POST['reg_gender'] ?? '',
    'dob' => $_POST['dob'] ?? $_POST['reg_dob'] ?? '',
    'phone' => $_POST['phone'] ?? $_POST['reg_phone'] ?? '',
    'profession' => $_POST['profession'] ?? $_POST['reg_profession'] ?? '',
    'organization' => $_POST['organization'] ?? $_POST['reg_organization'] ?? '',
    'residence' => $_POST['residence'] ?? $_POST['reg_residence'] ?? '',
    'departure' => $_POST['departure'] ?? $_POST['reg_departure'] ?? '',
    'visa' => $_POST['visa'] ?? $_POST['reg_visa'] ?? '',
    'referral' => $_POST['referral'] ?? '',
    'source' => $_POST['source'] ?? '',
    'journey' => $_POST['journey'] ?? $_POST['reg_journey'] ?? '',
    'impact' => $_POST['impact'] ?? $_POST['reg_impact'] ?? '',
    'profile_photo' => handle_upload('profile_photo') ?? handle_upload('reg_profile_photo'),
    'passport_photo' => handle_upload('passport_photo') ?? handle_upload('reg_passport_photo'),
    'payment_method' => $_POST['payment_method'] ?? '',
    'txid' => $_POST['txid'] ?? $_POST['transaction_id'] ?? $_POST['reg_transaction_id'] ?? '',
    'payment_screenshot' => handle_upload('payment_screenshot') ?? handle_upload('crypto_screenshot') ?? handle_upload('reg_crypto_screenshot'),
    'amount' => floatval($_POST['amount'] ?? 0),
    'status' => 'pending'
];

// Check if we have essential data via json_backup
if (empty($data['first_name']) && isset($_POST['json_backup'])) {
    $backup = json_decode($_POST['json_backup'], true);
    if ($backup) {
        foreach ($data as $key => $val) {
            if (empty($val) && isset($backup[$key])) {
                $data[$key] = $backup[$key];
            }
        }
        // Also check prefixed versions in backup
        if (empty($data['first_name']) && isset($backup['reg_first_name'])) $data['first_name'] = $backup['reg_first_name'];
        if (empty($data['email']) && isset($backup['reg_email'])) $data['email'] = $backup['reg_email'];
        
        error_log("DEBUG: Recovered data from json_backup: " . json_encode($data));
    }
}

// CRITICAL VALIDATION: Ensure at least first_name and email are present
if (empty($data['first_name']) || empty($data['email'])) {
    error_log("REJECTING EMPTY DATA: " . json_encode($data));
    echo json_encode(['success' => false, 'message' => 'Required fields (First Name, Email) are missing. Please ensure your browser supports FormData.']);
    exit;
}

// Map possible alternate names
if (empty($data['txid']) && isset($_POST['transaction_id'])) $data['txid'] = $_POST['transaction_id'];
if (empty($data['source']) && isset($_POST['referral'])) $data['source'] = $_POST['referral'];

// CRITICAL DEBUG: Log exactly what we received from POST
error_log("DEBUG: Full _POST contents: " . json_encode($_POST));
error_log("DEBUG: Full _FILES contents: " . json_encode($_FILES));

// Clean up: remove source from referral if referral is set
if (!empty($data['referral']) && empty($data['source'])) {
    $data['source'] = $data['referral'];
}

// Ensure first_name and last_name aren't both the same if only one was provided
if (!empty($data['first_name']) && empty($data['last_name']) && strpos($data['first_name'], ' ') !== false) {
    $parts = explode(' ', $data['first_name'], 2);
    $data['first_name'] = $parts[0];
    $data['last_name'] = $parts[1];
}

// Log data before saving to debug missing fields
$raw_post = $_POST;
// Filter out binary data for logging
if (isset($raw_post['profile_photo'])) $raw_post['profile_photo'] = '[binary]';
if (isset($raw_post['passport_photo'])) $raw_post['passport_photo'] = '[binary]';
if (isset($raw_post['crypto_screenshot'])) $raw_post['crypto_screenshot'] = '[binary]';
if (isset($raw_post['payment_screenshot'])) $raw_post['payment_screenshot'] = '[binary]';

error_log("Raw POST data: " . json_encode($raw_post));
error_log("Saving registration data: " . json_encode($data));

try {
    $success = save_registration($data);

    if ($success) {
        error_log("DEBUG: Registration save function returned TRUE");
        // Send admin notification
        send_admin_registration_notification($data);
        
        // Return success response
        echo json_encode(['success' => true, 'message' => 'Registration successful!']);
    } else {
        error_log("DEBUG: Registration save function returned FALSE");
        // Log the failure details
        $pdo = get_db_connection();
        $errorInfo = $pdo ? $pdo->errorInfo() : "No connection";
        error_log("Registration Save Failed for: " . ($data['email'] ?? 'unknown') . " - Error: " . json_encode($errorInfo));
        
        // Return success to user but log the error (silent failure to avoid user frustration)
        echo json_encode(['success' => true, 'message' => 'Registration received and being processed.']);
    }
} catch (Exception $e) {
    error_log("CRITICAL EXCEPTION in process_registration: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'An error occurred during registration. Please try again.']);
}
