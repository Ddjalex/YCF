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
    
    // Ensure admin_settings table exists
    if ($pdo) {
        $pdo->exec("CREATE TABLE IF NOT EXISTS admin_settings (key TEXT PRIMARY KEY, value TEXT)");
        
        if ($action === 'update_hero') {
            $video_url = $_POST['video_url'] ?? '';
            $stmt = $pdo->prepare("INSERT INTO admin_settings (key, value) VALUES ('hero_video', ?) ON CONFLICT(key) DO UPDATE SET value = excluded.value");
            $stmt->execute([$video_url]);
        } elseif ($action === 'update_countdown') {
            $date = $_POST['target_date'] ?? '';
            $stmt = $pdo->prepare("INSERT INTO admin_settings (key, value) VALUES ('countdown_date', ?) ON CONFLICT(key) DO UPDATE SET value = excluded.value");
            $stmt->execute([$date]);
        } elseif ($action === 'update_crypto') {
            $addr = $_POST['btc_address'] ?? '';
            $stmt = $pdo->prepare("INSERT INTO admin_settings (key, value) VALUES ('btc_address', ?) ON CONFLICT(key) DO UPDATE SET value = excluded.value");
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
    <title>Admin Dashboard - YDF 2026</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #009edb;
            --dark: #003366;
            --bg: #f8f9fa;
        }
        body { font-family: 'Inter', sans-serif; background: var(--bg); margin: 0; padding: 0; display: flex; min-height: 100vh; }
        
        /* Sidebar */
        .sidebar { width: 260px; background: white; border-right: 1px solid #eee; display: flex; flex-direction: column; }
        .sidebar-header { padding: 30px 20px; border-bottom: 1px solid #f0f0f0; display: flex; align-items: center; gap: 12px; }
        .sidebar-header img { width: 40px; }
        .sidebar-header h2 { font-size: 1.1rem; color: var(--dark); margin: 0; }
        .nav-links { padding: 20px 0; flex-grow: 1; }
        .nav-link { display: flex; align-items: center; padding: 12px 25px; color: #666; text-decoration: none; transition: 0.2s; font-weight: 500; }
        .nav-link:hover, .nav-link.active { background: #f0f7ff; color: var(--primary); }
        .nav-link.active { border-left: 4px solid var(--primary); }
        
        /* Main Content */
        .main-content { flex-grow: 1; display: flex; flex-direction: column; }
        header { background: var(--dark); color: white; padding: 15px 40px; display: flex; justify-content: space-between; align-items: center; }
        header h1 { font-size: 1rem; margin: 0; text-transform: uppercase; letter-spacing: 1px; }
        .public-site { color: white; text-decoration: none; font-size: 0.9rem; }
        
        .content-body { padding: 40px; }
        .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; }
        
        .card { background: white; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); padding: 30px; margin-bottom: 30px; }
        .card-title { font-size: 1.25rem; font-weight: 700; color: #333; margin-bottom: 25px; }
        
        .form-group { margin-bottom: 20px; }
        label { display: block; font-size: 0.85rem; color: #888; margin-bottom: 8px; font-weight: 500; }
        input[type="text"], input[type="url"], textarea { 
            width: 100%; padding: 12px 15px; border: 1px solid #eee; border-radius: 8px; 
            font-size: 0.95rem; box-sizing: border-box; background: #fafbfc;
        }
        
        .btn { 
            display: inline-block; width: 100%; padding: 12px; border-radius: 8px; border: none; 
            font-weight: 600; cursor: pointer; text-align: center; transition: 0.2s; font-size: 0.95rem;
        }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: #008ac0; }
        .btn-dark { background: #2D236E; color: white; }
        .btn-orange { background: #f39c12; color: white; }
        
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 15px; font-size: 0.8rem; text-transform: uppercase; color: #888; border-bottom: 1px solid #eee; }
        td { padding: 15px; border-bottom: 1px solid #f9f9f9; font-size: 0.95rem; }
        
        .status { padding: 4px 10px; border-radius: 20px; font-size: 0.75rem; font-weight: 700; }
        .status-pending { background: #fff3cd; color: #856404; }
        
        .section-hidden { display: none; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="../attached_assets/logo/Gemini_Generated_Image_ol8lm2ol8lm2ol8l-removebg-preview.png" alt="Logo">
            <h2>YDF Terminal</h2>
        </div>
        <div class="nav-links">
            <a href="#" class="nav-link active" onclick="showSection('overview')">Dashboard Overview</a>
            <a href="#" class="nav-link" onclick="showSection('registrations')">Manage Registrations</a>
            <a href="#" class="nav-link" onclick="showSection('settings')">Global Settings</a>
            <a href="#" class="nav-link" onclick="showSection('hotels')">Hotel Database</a>
        </div>
        <div style="padding: 20px;">
            <a href="logout.php" class="btn btn-dark" style="background: #f8d7da; color: #721c24;">Sign Out</a>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h1>ADMIN TERMINAL</h1>
            <a href="/" class="public-site">Public Site →</a>
        </header>

        <div class="content-body">
            <!-- Overview Section -->
            <div id="section-overview">
                <div class="grid">
                    <!-- Hero Video Card -->
                    <div class="card">
                        <div class="card-title">Hero Video</div>
                        <form method="POST">
                            <input type="hidden" name="action" value="update_hero">
                            <div class="form-group">
                                <label>Current Video Path/URL</label>
                                <input type="text" name="video_url" value="<?php echo htmlspecialchars($hero_video); ?>">
                            </div>
                            <div class="form-group">
                                <label>Or Upload New Video</label>
                                <input type="file" disabled>
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
                                <input type="file" disabled>
                            </div>
                            <button type="submit" class="btn btn-orange">Update Crypto Settings</button>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-title">Manage Videos</div>
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2" style="text-align: center; color: #888;">No additional videos configured.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Registrations Section -->
            <div id="section-registrations" class="section-hidden">
                <div class="card">
                    <div class="card-title">Recent Registrations</div>
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Package</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($registrations as $reg): ?>
                            <tr>
                                <td><?php echo date('M d, Y', strtotime($reg['created_at'])); ?></td>
                                <td><?php echo htmlspecialchars($reg['first_name'] . ' ' . $reg['last_name']); ?></td>
                                <td><?php echo htmlspecialchars($reg['package_name']); ?></td>
                                <td><span class="status status-pending"><?php echo $reg['status']; ?></span></td>
                                <td><a href="view_registration.php?id=<?php echo $reg['id']; ?>" style="color: var(--primary); text-decoration: none; font-weight: 600;">View</a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Hotels Section -->
            <div id="section-hotels" class="section-hidden">
                <div class="grid">
                    <div class="card">
                        <div class="card-title">New Hotel Entry</div>
                        <div class="form-group">
                            <input type="text" placeholder="Hotel Name">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Location String">
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Short Description" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Video URL (YouTube/MP4)">
                        </div>
                        <div class="form-group">
                            <label>Hotel Photo (URL or Upload)</label>
                            <input type="text" placeholder="Photo Path/URL">
                        </div>
                        <div class="form-group">
                            <input type="file">
                        </div>
                        <div style="display: flex; gap: 20px;">
                             <input type="text" placeholder="Stars" style="width: 80px;" value="5">
                             <input type="text" placeholder="Map Link">
                        </div>
                        <button class="btn btn-primary" style="margin-top: 20px;">Deploy Entry</button>
                    </div>

                    <div class="card">
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
                                <tr>
                                    <td colspan="3" style="text-align: center; color: #888;">Database empty. Add a new entry.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.getElementById('section-overview').classList.add('section-hidden');
            document.getElementById('section-registrations').classList.add('section-hidden');
            document.getElementById('section-hotels').classList.add('section-hidden');
            
            // Show target section
            document.getElementById('section-' + sectionId).classList.remove('section-hidden');
            
            // Update active link
            document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
            event.currentTarget.classList.add('active');
        }
    </script>
</body>
</html>