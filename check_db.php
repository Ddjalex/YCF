<?php
require_once 'functions.php';

echo "<h2>Database Check for goforums.org</h2>";

$pdo = get_db_connection();

if ($pdo) {
    echo "<p style='color: green;'>✅ Database Connection Successful!</p>";
    
    try {
        // Check registrations table
        $stmt = $pdo->query("SELECT COUNT(*) as total FROM registrations");
        $result = $stmt->fetch();
        echo "<p>Total Registrations found: <strong>" . $result['total'] . "</strong></p>";
        
        if ($result['total'] > 0) {
            echo "<h3>Latest 5 Registrations:</h3>";
            $stmt = $pdo->query("SELECT id, first_name, last_name, email, created_at FROM registrations ORDER BY created_at DESC LIMIT 5");
            echo "<table border='1' cellpadding='10' style='border-collapse: collapse; width: 100%;'>";
            echo "<tr style='background: #f4f4f4;'><th>ID</th><th>Name</th><th>Email</th><th>Date</th></tr>";
            while ($row = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . $row['created_at'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        
    } catch (Exception $e) {
        echo "<p style='color: red;'>❌ Query Error: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p style='color: red;'>❌ Database Connection Failed.</p>";
}

echo "<hr><p><a href='index.php'>Back to Home</a></p>";
?>