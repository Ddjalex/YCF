<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
require_once '../functions.php';

// Handle form submissions for settings
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $pdo = get_db_connection();
    
    if ($pdo) {
        if ($action === 'update_hero') {
            $video_url = $_POST['video_url'] ?? '';
            $success_msg = "Video path updated.";
            
            // Handle file upload
            if (isset($_FILES['hero_file']) && $_FILES['hero_file']['error'] === UPLOAD_ERR_OK) {
                $upload_dir = '../uploads/';
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                $filename = time() . '_' . basename($_FILES['hero_file']['name']);
                $target = $upload_dir . $filename;
                if (move_uploaded_file($_FILES['hero_file']['tmp_name'], $target)) {
                    $video_url = 'uploads/' . $filename;
                    $success_msg = "Video uploaded and updated successfully!";
                }
            }
            
            $stmt = $pdo->prepare("INSERT INTO admin_settings (`key`, `value`) VALUES ('hero_video', ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`)");
            if ($stmt->execute([$video_url])) {
                $_SESSION['success_msg'] = $success_msg;
                header('Location: dashboard.php');
                exit;
            }
        } elseif ($action === 'update_countdown') {
            $date = $_POST['target_date'] ?? '';
            $stmt = $pdo->prepare("INSERT INTO admin_settings (`key`, `value`) VALUES ('countdown_date', ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`)");
            $stmt->execute([$date]);
        } elseif ($action === 'update_crypto') {
            $addr = $_POST['btc_address'] ?? '';
            $stmt = $pdo->prepare("INSERT INTO admin_settings (`key`, `value`) VALUES ('btc_address', ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`)");
            $stmt->execute([$addr]);
        }
    }
}

$registrations = get_all_registrations();
$hero_video = get_admin_setting('hero_video', 'https://assets.mixkit.co/videos/preview/mixkit-digital-animation-of-a-circuit-board-4451-large.mp4');
$countdown_date = get_admin_setting('countdown_date', 'June 15, 2026 09:00:00');
$btc_address = get_admin_setting('btc_address', '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Terminal - YDF 2026</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #00a4df;
            --dark: #003366;
            --bg: #f4f7f6;
            --text-gray: #666;
            --card-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        body { font-family: 'Inter', sans-serif; background: var(--bg); margin: 0; padding: 0; }
        
        /* Fixed Header */
        header {
            background: #003366;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            padding: 15px 20px;
            border-radius: 8px;
            margin: 20px 30px 0;
            border-left: 5px solid #28a745;
            font-weight: 500;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .alert-success .close { cursor: pointer; font-weight: 700; opacity: 0.5; }
        .alert-success .close:hover { opacity: 1; }
        header h1 { font-size: 1.1rem; margin: 0; font-weight: 700; letter-spacing: 0.5px; }
        .public-link { color: #fff; text-decoration: none; font-size: 0.9rem; font-weight: 500; }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 30px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 35px;
            height: fit-content;
        }

        .card-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 25px;
        }

        .form-group { margin-bottom: 22px; }
        label { display: block; font-size: 0.85rem; color: #888; margin-bottom: 10px; font-weight: 500; }
        
        input[type="text"], input[type="url"], textarea { 
            width: 100%; padding: 14px 18px; border: 1px solid #eef0f2; border-radius: 8px; 
            font-size: 0.95rem; box-sizing: border-box; background: #fafbfc; outline: none;
            transition: border-color 0.2s;
        }
        input[type="text"]:focus { border-color: var(--primary); }
        
        .btn { 
            display: inline-block; width: 100%; padding: 15px; border-radius: 8px; border: none; 
            font-weight: 700; cursor: pointer; text-align: center; transition: 0.2s; font-size: 0.95rem;
            text-transform: none;
        }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: #008ac0; }
        .btn-dark { background: #2c3241; color: white; }
        .btn-dark:hover { background: #1f242f; }
        .btn-orange { background: #ff9f43; color: white; }
        .btn-orange:hover { background: #e68a35; }

        /* Tables & Lists */
        .table-container { grid-column: span 2; }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 18px; font-size: 0.85rem; text-transform: uppercase; color: #888; border-bottom: 2px solid #f0f2f5; font-weight: 700; }
        td { padding: 18px; border-bottom: 1px solid #f0f2f5; font-size: 0.95rem; color: #444; }

        .file-input-wrapper {
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        input[type="file"] { font-size: 0.85rem; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #ccc; border-radius: 4px; }
    </style>
</head>
<body>
    <header>
        <h1>ADMIN TERMINAL</h1>
        <div style="display: flex; gap: 20px; align-items: center;">
            <a href="/" class="public-link">Public Site →</a>
            <a href="logout.php" class="public-link" style="opacity: 0.7;">Sign Out</a>
        </div>
    </header>

    <?php if (isset($_SESSION['success_msg'])): ?>
        <div class="alert-success">
            <span><?php echo $_SESSION['success_msg']; unset($_SESSION['success_msg']); ?></span>
            <span class="close" onclick="this.parentElement.style.display='none'">&times;</span>
        </div>
    <?php endif; ?>

    <div class="dashboard-container">
        <!-- Hero Video Card -->
        <div class="card">
            <div class="card-title">Hero Video</div>
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update_hero">
                <div class="form-group">
                    <label>Current Video Path/URL</label>
                    <input type="text" name="video_url" value="<?php echo htmlspecialchars($hero_video); ?>">
                </div>
                <div class="form-group">
                    <label>Or Upload New Video</label>
                    <div class="file-input-wrapper">
                        <input type="file" name="hero_file" accept="video/*">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Hero Video</button>
            </form>
        </div>

        <!-- Add New Video Card -->
        <div class="card">
            <div class="card-title">Add New Video</div>
            <div class="form-group">
                <input type="text" placeholder="Video Title">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Video URL">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Thumbnail Image URL">
            </div>
            <button class="btn btn-primary">Add Video</button>
        </div>

        <!-- Global Countdown Card -->
        <div class="card">
            <div class="card-title">Global Countdown</div>
            <form method="POST">
                <input type="hidden" name="action" value="update_countdown">
                <div class="form-group">
                    <label>Target Event Date</label>
                    <input type="text" name="target_date" value="<?php echo htmlspecialchars($countdown_date); ?>">
                </div>
                <button type="submit" class="btn btn-dark">Sync Countdown</button>
            </form>
        </div>

        <!-- Crypto Settings Card -->
        <div class="card">
            <div class="card-title">Crypto Deposit Address</div>
            <form method="POST">
                <input type="hidden" name="action" value="update_crypto">
                <div class="form-group">
                    <label>BTC Wallet Address</label>
                    <input type="text" name="btc_address" value="<?php echo htmlspecialchars($btc_address); ?>">
                </div>
                <div class="form-group">
                    <label>QR Code Image</label>
                    <div class="file-input-wrapper">
                        <input type="file" name="qr_file">
                    </div>
                </div>
                <button type="submit" class="btn btn-orange">Update Crypto Settings</button>
            </form>
        </div>

        <!-- Registrations Management Card -->
        <div class="card table-container">
            <div class="card-title">Manage Registrations</div>
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Package</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($registrations)): ?>
                    <tr><td colspan="4" style="text-align: center; color: #999;">No registrations found.</td></tr>
                    <?php else: ?>
                        <?php foreach (array_slice($registrations, 0, 10) as $reg): ?>
                        <tr>
                            <td><?php echo date('M d', strtotime($reg['created_at'])); ?></td>
                            <td><?php echo htmlspecialchars($reg['first_name'] . ' ' . $reg['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($reg['package_name']); ?></td>
                            <td><a href="view_registration.php?id=<?php echo $reg['id']; ?>" style="color: var(--primary); text-decoration: none; font-weight: 700;">View Details</a></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Active Hotel Database Card -->
        <div class="card table-container">
            <div class="card-title">Active Hotel Database</div>
            <table>
                <thead>
                    <tr>
                        <th>Name/Location</th>
                        <th>Visuals</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td colspan="3" style="text-align: center; color: #999; padding: 30px;">Database empty.</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>