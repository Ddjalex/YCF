<?php
// admin/index.php - Redirect to dashboard within the admin folder
session_start();
header('Location: ./dashboard.php');
exit;
?>