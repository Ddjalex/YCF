<?php
require_once 'YCF/functions.php';

echo "Database Test\n";
$pdo = get_db_connection();

if ($pdo) {
    echo "Connection Successful!\n";
    try {
        $stmt = $pdo->query("SELECT * FROM registrations LIMIT 1");
        echo "Query successful!\n";
    } catch (Exception $e) {
        echo "Query failed: " . $e->getMessage() . "\n";
    }
} else {
    echo "Connection Failed.\n";
}
?>