<?php
// Custom router for PHP development server
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . $uri;

if (file_exists($file) && !is_dir($file)) {
    // Manually handle video mime types for the dev server
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if ($ext === 'mp4') {
        $size = filesize($file);
        $start = 0;
        $end = $size - 1;

        if (isset($_SERVER['HTTP_RANGE'])) {
            preg_match('/bytes=(\d+)-(\d*)?/', $_SERVER['HTTP_RANGE'], $matches);
            $start = intval($matches[1]);
            $end = ($matches[2] !== '') ? intval($matches[2]) : $end;
            
            header('HTTP/1.1 206 Partial Content');
            header("Content-Range: bytes $start-$end/$size");
            $length = ($end - $start) + 1;
        } else {
            $length = $size;
        }

        header('Content-Type: video/mp4');
        header('Accept-Ranges: bytes');
        header("Content-Length: $length");
        
        $fp = fopen($file, 'rb');
        fseek($fp, $start);
        
        $buffer = 8192;
        while (!feof($fp) && ($pos = ftell($fp)) <= $end) {
            if ($pos + $buffer > $end) {
                $buffer = $end - $pos + 1;
            }
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
