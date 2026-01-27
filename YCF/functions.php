<?php
// functions.php - Global utility functions

function get_mysql_connection() {
    static $mysql_pdo = null;
    if ($mysql_pdo !== null) return $mysql_pdo;

    // Direct values for external server - Priority 1
    $host = '91.204.209.29'; 
    $database = 'goforuku_germany';
    $user = 'goforuku_germany';
    $password = 'a1e2y3t4h5';

    try {
        $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4;port=3306";
        $mysql_pdo = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => true, // Enabled for remote cPanel compatibility
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
        ]);
        error_log("DEBUG: MySQL connection successful to $host");
        return $mysql_pdo;
    } catch (PDOException $e) {
        error_log("MySQL Remote Connection Failed: " . $e->getMessage());
        return null;
    }
}

function get_db_connection() {
    return get_mysql_connection();
}

function save_registration($data) {
    $mysql_pdo = get_mysql_connection();
    if (!$mysql_pdo) {
        error_log("CRITICAL: No DB connection in save_registration");
        return false;
    }
    
    $allowed_fields = [
        'package_id', 'package_name', 'first_name', 'last_name', 'nationality', 
        'email', 'gender', 'dob', 'phone', 'profession', 'organization', 'residence', 
        'departure', 'visa', 'referral', 'source', 'journey', 'impact', 
        'profile_photo', 'passport_photo', 'payment_method', 'txid', 
        'payment_screenshot', 'amount', 'status'
    ];
    
    $insert_data = [];
    foreach ($allowed_fields as $field) {
        $insert_data[$field] = $data[$field] ?? null;
    }
    
    $fields = array_keys($insert_data);
    $placeholders = array_map(function($f) { return ":$f"; }, $fields);
    $sql = "INSERT INTO registrations (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")";
    
    try {
        $stmt = $mysql_pdo->prepare($sql);
        $success = $stmt->execute($insert_data);
        if ($success) {
            error_log("DEBUG: Registration saved successfully for " . $insert_data['email']);
            return true;
        } else {
            error_log("DEBUG: SQL execution failed: " . json_encode($stmt->errorInfo()));
            return false;
        }
    } catch (PDOException $e) {
        error_log("DEBUG: PDO Error: " . $e->getMessage());
        return false;
    }
}

function get_all_registrations() {
    $pdo = get_db_connection();
    if (!$pdo) return [];
    try {
        $stmt = $pdo->query("SELECT * FROM registrations ORDER BY created_at DESC");
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log("DEBUG: Failed to fetch registrations: " . $e->getMessage());
        return [];
    }
}

function get_registration_by_id($id) {
    $pdo = get_db_connection();
    if (!$pdo) return null;
    $stmt = $pdo->prepare("SELECT * FROM registrations WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function get_hotels($search = null) {
    $pdo = get_db_connection();
    if (!$pdo) return [];
    try {
        if ($search) {
            $stmt = $pdo->prepare("SELECT * FROM hotels WHERE name LIKE ? OR location LIKE ? OR description LIKE ? ORDER BY stars DESC, name ASC");
            $stmt->execute(['%' . $search . '%', '%' . $search . '%', '%' . $search . '%']);
        } else {
            $stmt = $pdo->query("SELECT * FROM hotels ORDER BY stars DESC, name ASC");
        }
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        return [];
    }
}

function get_target_date() {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT `value` FROM admin_settings WHERE `key` = 'countdown_date'");
            $stmt->execute();
            $result = $stmt->fetch();
            if ($result) return $result['value'];
        } catch (PDOException $e) {
        }
    }
    return "June 15, 2026 09:00:00";
}

function get_hero_video() {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT `value` FROM admin_settings WHERE `key` = 'hero_video'");
            $stmt->execute();
            $result = $stmt->fetch();
            if ($result && !empty($result['value'])) {
                return $result['value'];
            }
        } catch (PDOException $e) {
        }
    }
    return 'https://assets.mixkit.co/videos/preview/mixkit-digital-animation-of-a-circuit-board-4451-large.mp4';
}

function get_homepage_videos() {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM videos ORDER BY id DESC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
        }
    }
    return [
        ['title' => 'Blockchain Revolution in Germany', 'video_url' => '', 'thumbnail_url' => 'https://images.unsplash.com/photo-1516245834210-c4c142787335?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'],
        ['title' => 'Youth Crypto Forum: Highlights 2025', 'video_url' => '', 'thumbnail_url' => 'https://images.unsplash.com/photo-1526628953301-3e589a6a8b74?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'],
        ['title' => 'Future of Digital Economy in Europe', 'video_url' => '', 'thumbnail_url' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80']
    ];
}

function get_weather_data() {
    $url = "https://api.open-meteo.com/v1/forecast?latitude=52.5244&longitude=13.4019&current_weather=true&hourly=temperature_2m,weathercode&timezone=Europe%2FBerlin";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    $response = curl_exec($ch);
    curl_close($ch);
    if (!$response) return null;
    $data = json_decode($response, true);
    if (!isset($data['current_weather'])) return null;
    $current = $data['current_weather'];
    $code_map = [0 => '☀️', 1 => '🌤️', 2 => '🌤️', 3 => '☁️', 45 => '🌫️', 48 => '🌫️', 51 => '🌦️', 53 => '🌦️', 55 => '🌦️', 61 => '🌧️', 63 => '🌧️', 65 => '🌧️', 71 => '❄️', 73 => '❄️', 75 => '❄️', 77 => '❄️', 80 => '🌦️', 81 => '🌦️', 82 => '🌦️', 85 => '❄️', 86 => '❄️', 95 => '⛈️', 96 => '⛈️', 99 => '⛈️'];
    $weathercode = $current['weathercode'] ?? 0;
    $icon = $code_map[$weathercode] ?? '☀️';
    $forecast = [];
    if (isset($data['hourly']['time'])) {
        $now_idx = 0; $now_time = time();
        foreach ($data['hourly']['time'] as $idx => $time_str) { if (strtotime($time_str) >= $now_time) { $now_idx = $idx; break; } }
        for ($i = 1; $i <= 6; $i++) {
            if (isset($data['hourly']['time'][$now_idx + $i])) {
                $t = strtotime($data['hourly']['time'][$now_idx + $i]);
                $temp = $data['hourly']['temperature_2m'][$now_idx + $i] ?? 0;
                $wcode = $data['hourly']['weathercode'][$now_idx + $i] ?? 0;
                $forecast[] = ['time' => date('H:00', $t), 'temp' => round($temp) . '°', 'icon' => $code_map[$wcode] ?? '☀️'];
            }
        }
    }
    return ['temp' => round($current['temperature_2m'] ?? 0) . '° C', 'icon' => $icon, 'description' => $weathercode, 'last_updated' => date('H:i'), 'forecast' => $forecast];
}

function get_search_results($search) {
    $pdo = get_db_connection();
    $results = ['hotels' => [], 'news' => [], 'videos' => []];
    if (!$pdo || empty($search)) return $results;
    $term = '%' . $search . '%';
    try {
        $stmt = $pdo->prepare("SELECT * FROM hotels WHERE name LIKE ? OR location LIKE ? OR description LIKE ? ORDER BY stars DESC");
        $stmt->execute([$term, $term, $term]);
        $results['hotels'] = $stmt->fetchAll();
        $stmt = $pdo->prepare("SELECT * FROM videos WHERE title LIKE ? ORDER BY id DESC");
        $stmt->execute([$term]);
        $results['videos'] = $stmt->fetchAll();
        $all_news = get_latest_news();
        $results['news'] = array_filter($all_news, function($item) use ($search) {
            return stripos($item['title'], $search) !== false || stripos($item['summary'], $search) !== false;
        });
    } catch (PDOException $e) { }
    return $results;
}

function get_latest_news() {
    $news_file = 'news_data.json';
    if (file_exists($news_file)) return json_decode(file_get_contents($news_file), true);
    return [
        ['id' => 1, 'title' => 'Youth Crypto Forum 2026: The Future of Digital Economy in Berlin', 'summary' => 'Join thousands of young innovators in Berlin to discuss blockchain and the global economy.', 'content' => 'The Youth Crypto Forum 2026 is set to be the landmark event of the year for digital finance in Europe...', 'date' => 'January 10, 2026', 'category' => 'Press Release', 'image' => 'attached_assets/stock_images/cryptocurrency_block_a66cf05b.jpg'],
        ['id' => 2, 'title' => 'Berlin to Host Major Blockchain Summit at Brandenburg Gate', 'summary' => 'Germany\'s capital preparing for the largest youth-focused crypto event in Europe.', 'content' => 'Preparation is in full swing at the historic Brandenburg Gate...', 'date' => 'January 05, 2026', 'category' => 'Update', 'image' => 'attached_assets/stock_images/cryptocurrency_block_a86cab3a.jpg'],
        ['id' => 3, 'title' => 'Registration for Early Bird Tickets Now Open for Forum 2026', 'summary' => 'Secure your spot at the Youth Crypto Forum with special early bird pricing available now.', 'content' => 'Don\'t miss out on the most anticipated youth crypto event in Europe!...', 'date' => 'January 02, 2026', 'category' => 'Announcement', 'image' => 'attached_assets/stock_images/cryptocurrency_block_d84d2c76.jpg']
    ];
}

function get_news_by_id($id) {
    foreach (get_latest_news() as $item) { if ($item['id'] == $id) return $item; }
    return null;
}

function get_admin_setting($key, $default = '') {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT `value` FROM admin_settings WHERE `key` = ?");
            $stmt->execute([$key]);
            $result = $stmt->fetch();
            if ($result) return $result['value'];
        } catch (PDOException $e) { }
    }
    $defaults = ['btc_address' => '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa'];
    return $defaults[$key] ?? $default;
}

function send_admin_registration_notification($data) {
    $admin_email = get_admin_setting('admin_email', 'admin@youthcryptoforum.com');
    $site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . ($_SERVER['HTTP_HOST'] ?? 'localhost');
    $full_name = trim(($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? ''));
    $subject = "New Registration: $full_name - Youth Crypto Forum 2026";
    
    $message = "<html><body style='font-family: Arial, sans-serif;'>
        <div style='background: #2D236E; color: white; padding: 20px;'><h2>New Registration Received</h2></div>
        <div style='padding: 20px; border: 1px solid #ddd;'>
            <p><strong>Name:</strong> $full_name</p>
            <p><strong>Email:</strong> " . ($data['email'] ?? 'N/A') . "</p>
            <p><strong>Package:</strong> " . ($data['package_name'] ?? 'N/A') . "</p>
            <p><strong>Payment:</strong> $" . number_format($data['amount'] ?? 0, 2) . " via " . ($data['payment_method'] ?? 'N/A') . "</p>
            <p><strong>TXID:</strong> " . ($data['txid'] ?? 'N/A') . "</p>
        </div>
    </body></html>";
    
    $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=UTF-8\r\nFrom: Youth Crypto Forum <noreply@youthcryptoforum.com>\r\n";
    return @mail($admin_email, $subject, $message, $headers);
}
