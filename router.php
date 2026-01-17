<?php
// Custom router for PHP development server
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . $uri;

if (file_exists($file) && !is_dir($file)) {
    // Manually handle video mime types for the dev server
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if ($ext === 'mp4') {
        $size = filesize($file);
        
        // Handle Range requests for streaming
        if (isset($_SERVER['HTTP_RANGE'])) {
            list($size_unit, $range_orig) = explode('=', $_SERVER['HTTP_RANGE'], 2);
            if ($size_unit == 'bytes') {
                list($range, $extra_ranges) = explode(',', $range_orig, 2);
            } else {
                $range = '';
            }
        } else {
            $range = '';
        }

        list($start, $end) = explode('-', $range, 2);
        $start = (int)$start;
        $end = ($end === '') ? $size - 1 : (int)$end;
        
        $new_length = $end - $start + 1;
        
        header('HTTP/1.1 206 Partial Content');
        header("Content-Type: video/mp4");
        header("Content-Length: $new_length");
        header("Content-Range: bytes $start-$end/$size");
        header("Accept-Ranges: bytes");
        
        $fp = fopen($file, 'rb');
        fseek($fp, $start);
        $buffer = 1024 * 64; // 64KB chunks
        while(!feof($fp) && ($pos = ftell($fp)) <= $end) {
            if ($pos + $buffer > $end) {
                $buffer = $end - $pos + 1;
            }
            set_time_limit(0);
            echo fread($fp, $buffer);
            flush();
        }
        fclose($fp);
        exit;
    }
    return false;
}

// Support for pretty URLs
if ($uri === '/') {
    include 'index.php';
    exit;
}

$path = ltrim($uri, '/');
if (file_exists($path . '.php')) {
    include $path . '.php';
    exit;
}

// Support for subdirectories like admin/
if (strpos($uri, '/admin/') === 0) {
    $admin_file = __DIR__ . $uri;
    if (file_exists($admin_file) && !is_dir($admin_file)) {
        require_once $admin_file;
        exit;
    }
    // Check if it's a .php file without extension in URL
    if (file_exists($admin_file . '.php')) {
        require_once $admin_file . '.php';
        exit;
    }
}

return false;
