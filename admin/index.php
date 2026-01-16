<?php
// admin/index.php - Redirect to dashboard
session_start();
header('Location: dashboard.php');
exit;
?>