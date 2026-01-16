<?php
// PHP Dev Server does not support .htaccess. 
// For production (Apache), use the .htaccess below.
// For the Replit PHP Dev Server, we would typically need a router file.

$request = $_SERVER['REQUEST_URI'];
$base = explode('?', $request)[0];

// Remove leading slash
$path = ltrim($base, '/');

// If empty, serve index.php
if ($path == '') {
    include 'index.php';
    exit;
}

// Check if the file exists as .php
if (file_exists($path . '.php')) {
    include $path . '.php';
    exit;
}

// Fallback to 404 or index if file not found
return false;
?>