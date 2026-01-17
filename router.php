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
            $range = $_SERVER['HTTP_RANGE'];
            if (preg_match('/bytes=(\d+)-(\d*)?/', $range, $matches)) {
                $start = (int)$matches[1];
                if (isset($matches[2]) && $matches[2] !== '') {
                    $end = (int)$matches[2];
                }
            }
            
            header('HTTP/1.1 206 Partial Content');
            header("Content-Range: bytes $start-$end/$size");
            $new_length = ($end - $start) + 1;
        } else {
            $new_length = $size;
        }

        header("Content-Type: video/mp4");
        header("Accept-Ranges: bytes");
        header("Content-Length: $new_length");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
        
        $fp = fopen($file, 'rb');
        fseek($fp, $start);
        
        $chunk_size = 1024 * 64; // 64KB
        while (!feof($fp) && ($pos = ftell($fp)) <= $end) {
            if ($pos + $chunk_size > $end) {
                $chunk_size = $end - $pos + 1;
            }
            echo fread($fp, $chunk_size);
            ob_flush();
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
