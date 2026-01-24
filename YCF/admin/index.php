<?php
// admin/index.php - Absolute path redirection to dashboard
session_start();
// Get current directory path to ensure correct redirection
$dir = dirname($_SERVER['PHP_SELF']);
$redirect_url = rtrim($dir, '/') . '/dashboard.php';
header("Location: $redirect_url");
exit;
?>