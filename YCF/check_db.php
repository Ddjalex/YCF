<?php
require_once 'functions.php';

echo "<!DOCTYPE html>
<html>
<head>
    <title>Database Check - goforums.org</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; max-width: 1000px; margin: 20px auto; padding: 20px; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background: #f4f4f4; }
        tr:nth-child(even) { background: #f9f9f9; }
        .status-box { background: #f0f7ff; border-left: 5px solid #2D236E; padding: 15px; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h1>Database Check for goforums.org</h1>";

$pdo = get_db_connection();

if ($pdo) {
    echo "<div class='status-box'>
            <p class='success'>✅ Database Connection Successful!</p>
          </div>";
    
    try {
        // Check registrations table
        $stmt = $pdo->query("SELECT COUNT(*) as total FROM registrations");
        $result = $stmt->fetch();
        echo "<p>Total Registrations in Database: <strong>" . $result['total'] . "</strong></p>";
        
        if ($result['total'] > 0) {
            echo "<h3>Latest 10 Registrations:</h3>";
            $stmt = $pdo->query("SELECT id, first_name, last_name, email, package_name, status, created_at FROM registrations ORDER BY created_at DESC LIMIT 10");
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Package</th><th>Status</th><th>Date</th></tr>";
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['package_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No registrations found yet. Try submitting the form!</p>";
        }
        
    } catch (Exception $e) {
        echo "<p class='error'>❌ Query Error: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p class='error'>❌ Database Connection Failed. Please check your credentials in functions.php</p>";
}

echo "<hr><p><a href='index.php'>Back to Home</a> | <a href='check_db.php'>Refresh</a></p>
</body>
</html>";
?>