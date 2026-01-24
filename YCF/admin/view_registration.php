<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
require_once dirname(__DIR__) . '/functions.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: dashboard.php');
    exit;
}

// Handle Approval
$message = '';
if (isset($_POST['approve'])) {
    $pdo = get_db_connection();
    if ($pdo) {
        $stmt = $pdo->prepare("UPDATE registrations SET status = 'Approved' WHERE id = ?");
        if ($stmt->execute([$id])) {
            $reg = get_registration_by_id($id);
            if ($reg) {
                $to = $reg['email'];
                $subject = "Registration Approved - YCF 2026";
                $body = "Dear " . htmlspecialchars($reg['first_name']) . ",\n\n";
                $body .= "We are pleased to inform you that your registration for the Youth Crypto Forum Germany 2026 has been APPROVED.\n\n";
                $body .= "Package: " . $reg['package_name'] . "\n";
                $body .= "Registration ID: #" . $reg['id'] . "\n\n";
                $body .= "Further details regarding your participation will be sent to you shortly.\n\n";
                $body .= "Best regards,\nThe YCF Team";
                
                $headers = "From: no-reply@youthcryptoforum.de";
                
                // Note: mail() might need a configured SMTP server
                if (mail($to, $subject, $body, $headers)) {
                    $message = "<div style='padding:15px; background:#d4edda; color:#155724; border-radius:8px; margin-bottom:20px; font-weight:600;'>Registration Approved and Confirmation Email Sent!</div>";
                } else {
                    $message = "<div style='padding:15px; background:#fff3cd; color:#856404; border-radius:8px; margin-bottom:20px; font-weight:600;'>Registration Approved, but confirmation email could not be sent (SMTP not configured).</div>";
                }
            }
        }
    }
}

$reg = get_registration_by_id($id);
if (!$reg) {
    echo "Registration not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Detail - YDF 2026</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f4f7f6; margin: 0; padding: 20px; color: #333; }
        .container { max-width: 900px; margin: 0 auto; }
        .back-link { margin-bottom: 20px; display: block; color: #2D236E; text-decoration: none; font-weight: 600; }
        .card { background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); padding: 30px; margin-bottom: 20px; }
        h1 { color: #2D236E; margin-top: 0; border-bottom: 2px solid #eee; padding-bottom: 15px; margin-bottom: 25px; display: flex; justify-content: space-between; align-items: center; }
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 25px; }
        .field { margin-bottom: 15px; }
        .label { font-size: 0.75rem; color: #888; text-transform: uppercase; font-weight: 700; margin-bottom: 5px; display: block; }
        .value { font-size: 1rem; font-weight: 500; }
        .full-width { grid-column: span 2; }
        .photo-box { background: #f9f9fb; border: 1px solid #eee; border-radius: 8px; padding: 10px; text-align: center; }
        .photo-box img { max-width: 100%; border-radius: 4px; max-height: 300px; }
        .status-badge { display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; background: #eee; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-approved { background: #d4edda; color: #155724; }
        .btn-approve { background: #28a745; color: white; border: none; padding: 10px 25px; border-radius: 8px; font-weight: 700; cursor: pointer; transition: background 0.2s; }
        .btn-approve:hover { background: #218838; }
        .btn-approve:disabled { background: #ccc; cursor: not-allowed; }
    </style>
</head>
<body>
    <div class="container">
        <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
        
        <?php echo $message; ?>

        <div class="card">
            <h1>
                <div>Registration #<?php echo $reg['id']; ?> <span class="status-badge status-<?php echo strtolower($reg['status']); ?>"><?php echo $reg['status']; ?></span></div>
                <?php if ($reg['status'] !== 'Approved'): ?>
                <form method="POST">
                    <button type="submit" name="approve" class="btn-approve">Approve Registration</button>
                </form>
                <?php endif; ?>
            </h1>
            
            <div class="grid">
                <div class="field">
                    <span class="label">Full Name</span>
                    <div class="value"><?php echo htmlspecialchars($reg['first_name'] . ' ' . $reg['last_name']); ?></div>
                </div>
                <div class="field">
                    <span class="label">Email</span>
                    <div class="value"><?php echo htmlspecialchars($reg['email']); ?></div>
                </div>
                <div class="field">
                    <span class="label">Package</span>
                    <div class="value"><?php echo htmlspecialchars($reg['package_name']); ?></div>
                </div>
                <div class="field">
                    <span class="label">Nationality</span>
                    <div class="value"><?php echo htmlspecialchars($reg['nationality']); ?></div>
                </div>
                <div class="field">
                    <span class="label">Gender</span>
                    <div class="value"><?php echo htmlspecialchars($reg['gender']); ?></div>
                </div>
                <div class="field">
                    <span class="label">Date of Birth</span>
                    <div class="value"><?php echo htmlspecialchars($reg['dob'] ?? ''); ?></div>
                </div>
                <div class="field">
                    <span class="label">Phone</span>
                    <div class="value"><?php echo htmlspecialchars($reg['phone'] ?? ''); ?></div>
                </div>
                <div class="field">
                    <span class="label">Profession</span>
                    <div class="value"><?php echo htmlspecialchars($reg['profession'] ?? ''); ?></div>
                </div>
                <div class="field">
                    <span class="label">Organization</span>
                    <div class="value"><?php echo htmlspecialchars($reg['organization'] ?? 'N/A'); ?></div>
                </div>
                <div class="field">
                    <span class="label">Departure City</span>
                    <div class="value"><?php echo htmlspecialchars($reg['departure'] ?? 'N/A'); ?></div>
                </div>
                <div class="field">
                    <span class="label">Residence</span>
                    <div class="value"><?php echo htmlspecialchars($reg['residence'] ?? 'N/A'); ?></div>
                </div>
                <div class="field">
                    <span class="label">Visa Required</span>
                    <div class="value"><?php echo htmlspecialchars($reg['visa'] ?? ''); ?></div>
                </div>
                <div class="field">
                    <span class="label">Source / Referral</span>
                    <div class="value"><?php echo htmlspecialchars(($reg['source'] ?? '') . ' / ' . ($reg['referral'] ?? '')); ?></div>
                </div>
                
                <div class="field full-width">
                    <span class="label">Personal Journey</span>
                    <div class="value" style="white-space: pre-wrap; line-height: 1.6;"><?php echo htmlspecialchars($reg['journey'] ?? ''); ?></div>
                </div>
                <div class="field full-width">
                    <span class="label">Impact</span>
                    <div class="value" style="white-space: pre-wrap; line-height: 1.6;"><?php echo htmlspecialchars($reg['impact'] ?? ''); ?></div>
                </div>
                
                <div class="field">
                    <span class="label">Profile Photo</span>
                    <div class="photo-box">
                        <?php if ($reg['profile_photo']): ?>
                            <img src="../<?php echo htmlspecialchars($reg['profile_photo']); ?>" alt="Profile">
                        <?php else: ?>
                            <span style="color: #ccc;">No photo</span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="field">
                    <span class="label">Passport Photo</span>
                    <div class="photo-box">
                        <?php if ($reg['passport_photo']): ?>
                            <img src="../<?php echo htmlspecialchars($reg['passport_photo']); ?>" alt="Passport">
                        <?php else: ?>
                            <span style="color: #ccc;">No photo</span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="field full-width" style="border-top: 2px solid #eee; padding-top: 20px; margin-top: 10px;">
                    <h3 style="margin-top: 0; color: #2D236E;">Payment Information</h3>
                </div>
                
                <div class="field">
                    <span class="label">Payment Method</span>
                    <div class="value"><?php echo htmlspecialchars($reg['payment_method']); ?></div>
                </div>
                <div class="field">
                    <span class="label">Transaction ID (TXID)</span>
                    <div class="value" style="font-family: monospace;"><?php echo htmlspecialchars($reg['txid']); ?></div>
                </div>
                <div class="field full-width">
                    <span class="label">Payment Screenshot</span>
                    <div class="photo-box">
                        <?php if ($reg['payment_screenshot']): ?>
                            <img src="../<?php echo htmlspecialchars($reg['payment_screenshot']); ?>" alt="Payment">
                        <?php else: ?>
                            <span style="color: #ccc;">No screenshot</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>