<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
require_once '../functions.php';
$registrations = get_all_registrations();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - YDF 2026</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #f4f7f6; margin: 0; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; background: #2D236E; color: white; padding: 20px; border-radius: 12px; }
        h1 { margin: 0; font-size: 1.5rem; }
        .logout { color: white; text-decoration: none; font-weight: 600; }
        .card { background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); padding: 20px; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 12px; border-bottom: 2px solid #eee; color: #666; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; }
        td { padding: 12px; border-bottom: 1px solid #eee; font-size: 0.9rem; }
        .status { padding: 4px 8px; border-radius: 4px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; }
        .status-pending { background: #fff3cd; color: #856404; }
        .view-btn { color: #2D236E; text-decoration: none; font-weight: 600; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Registration Management</h1>
            <a href="logout.php" class="logout">Logout</a>
        </header>
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Package</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($registrations)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: #888;">No registrations found yet.</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach ($registrations as $reg): ?>
                        <tr>
                            <td><?php echo date('M d, Y', strtotime($reg['created_at'])); ?></td>
                            <td><?php echo htmlspecialchars($reg['first_name'] . ' ' . $reg['last_name']); ?></td>
                            <td><?php echo htmlspecialchars($reg['package_name']); ?></td>
                            <td><?php echo htmlspecialchars($reg['email']); ?></td>
                            <td><span class="status status-<?php echo strtolower($reg['status']); ?>"><?php echo $reg['status']; ?></span></td>
                            <td><a href="view_registration.php?id=<?php echo $reg['id']; ?>" class="view-btn">View Details</a></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>