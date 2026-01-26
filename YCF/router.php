<?php
// Custom router for PHP development server
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Normalize URI: remove leading slash for file system checks
$path = ltrim($uri, '/');

// Check if we are in the admin subdirectory or root
$is_admin_path = (strpos($uri, '/admin/') === 0 || $uri === '/admin');

if ($is_admin_path) {
    // Determine the relative path within YCF/admin/
    $sub_path = preg_replace('/^\/admin\/?/', '', $uri);
    
    // Default to index.php for /admin or /admin/
    if ($sub_path === '' || $sub_path === '/') {
        $sub_path = 'index.php';
    }
    
    // Remove trailing slash if present for file check
    $sub_path = rtrim($sub_path, '/');
    
    $file_in_admin = __DIR__ . '/admin/' . $sub_path;
    
    if (file_exists($file_in_admin) && !is_dir($file_in_admin)) {
        require_once $file_in_admin;
        exit;
    }
    
    if (file_exists($file_in_admin . '.php')) {
        require_once $file_in_admin . '.php';
        exit;
    }
}

// Fallback to original YCF files
$file = __DIR__ . $uri;

// CRITICAL: Ensure process_registration.php is always accessible via POST
// Force it to load the file regardless of what the server thinks the method is
if (strpos($uri, '/process_registration.php') !== false) {
    include __DIR__ . '/process_registration.php';
    exit;
}

if (file_exists($file) && !is_dir($file)) {
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    
    // Handle PHP files explicitly
    if ($ext === 'php') {
        include $file;
        exit;
    }
    
    // Manually handle video mime types for the dev server
    if ($ext === 'mp4') {
        $size = filesize($file);
        $start = 0;
        $end = $size - 1;

        if (isset($_SERVER['HTTP_RANGE'])) {
            $range = $_SERVER['HTTP_RANGE'];
            if (preg_match('/bytes=(\d+)-(\d*)?/', $range, $matches)) {
                $start = (int)$matches[1];
                if (isset($matches[2]) && $matches[2] !== '') {
                    $end = (int)$matches[2];
                }
            }
            header('HTTP/1.1 206 Partial Content');
            header("Content-Range: bytes $start-$end/$size");
        }

        $length = $end - $start + 1;
        header("Content-Type: video/mp4");
        header("Content-Length: $length");
        header("Accept-Ranges: bytes");
        header("Cache-Control: public, max-age=86400");
        
        $fp = fopen($file, 'rb');
        fseek($fp, $start);
        
        while (!feof($fp) && ($pos = ftell($fp)) <= $end) {
            $buffer = 1024 * 512; // 512KB buffer
            if ($pos + $buffer > $end) {
                $buffer = $end - $pos + 1;
            }
            set_time_limit(60);
            echo fread($fp, $buffer);
            flush();
            if (connection_aborted()) break;
        }
        fclose($fp);
        exit;
    }
    return false;
}

// Support for pretty URLs (without .php extension)
if ($uri === '/') {
    include __DIR__ . '/index.php';
    exit;
}

// Check for .php extension version
$php_file = __DIR__ . '/' . $path . '.php';
if (file_exists($php_file)) {
    include $php_file;
    exit;
}

return false;
