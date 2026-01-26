<?php
// admin/index.php - Redirect to admin login
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    header("Location: /admin/dashboard.php");
} else {
    header("Location: /admin/login.php");
}
exit;
?>