<?php
// functions.php - Global utility functions

function get_db_connection() {
    static $pdo = null;
    if ($pdo !== null) return $pdo;

    // try use provided credentials
    $host = '127.0.0.1';
    $port = '3306';
    $user = 'goforuku_germany';
    $pass = 'a1e2y3t4h5';
    $dbname = 'goforuku_germany';

    try {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_PERSISTENT => true,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
        ]);

        error_log("Successfully connected to cPanel MySQL");

        // One-time table check/creation
        $pdo->exec("CREATE TABLE IF NOT EXISTS registrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            package_id VARCHAR(255),
            package_name VARCHAR(255),
            first_name VARCHAR(255),
            last_name VARCHAR(255),
            nationality VARCHAR(255),
            email VARCHAR(255),
            gender VARCHAR(255),
            dob VARCHAR(255),
            phone VARCHAR(255),
            profession VARCHAR(255),
            residence VARCHAR(255),
            departure VARCHAR(255),
            visa VARCHAR(255),
            referral TEXT,
            journey TEXT,
            impact TEXT,
            profile_photo TEXT,
            passport_photo TEXT,
            payment_method VARCHAR(255),
            txid VARCHAR(255),
            payment_screenshot TEXT,
            amount DECIMAL(10,2),
            status VARCHAR(50) DEFAULT 'pending',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");

        return $pdo;
    } catch (PDOException $e) {
        error_log("cPanel MySQL Connection Failed: " . $e->getMessage());
        // Fallback to Replit environment if cPanel connection fails
        $database_url = getenv('DATABASE_URL');
        if ($database_url) {
            try {
                $dbopts = parse_url($database_url);
                if ($dbopts) {
                    $dsn = "pgsql:host=" . $dbopts['host'] . ";port=" . ($dbopts['port'] ?? 5432) . ";dbname=" . ltrim($dbopts['path'], '/');
                    $pdo = new PDO($dsn, $dbopts['user'], $dbopts['pass'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                    return $pdo;
                }
            } catch (PDOException $ex) {}
        }
        return null;
    }
}

function save_registration($data) {
    $pdo = get_db_connection();
    if (!$pdo) {
        error_log("CRITICAL ERROR: Database connection failed in save_registration for email: " . ($data['email'] ?? 'unknown'));
        return false;
    }
    
    // Filter data to match table columns
    $allowed_fields = [
        'package_id', 'package_name', 'first_name', 'last_name', 'nationality', 
        'email', 'gender', 'dob', 'phone', 'profession', 'organization', 'residence', 
        'departure', 'visa', 'referral', 'source', 'journey', 'impact', 
        'profile_photo', 'passport_photo', 'payment_method', 'txid', 
        'payment_screenshot', 'amount'
    ];
    
    $insert_data = [];
    foreach ($allowed_fields as $field) {
        $insert_data[$field] = $data[$field] ?? null;
    }
    
    // Double check essential fields
    if (empty($insert_data['first_name'])) {
        error_log("CRITICAL ERROR: Registration attempt with EMPTY first_name. Full data: " . json_encode($data));
    }
    
    $fields = array_keys($insert_data);
    $placeholders = array_map(function($f) { return ":$f"; }, $fields);
    
    $sql = "INSERT INTO registrations (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")";
    try {
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute($insert_data);
        if (!$result) {
            error_log("SQL Execution Failed for " . ($insert_data['email'] ?? 'unknown') . ": " . implode(" ", $stmt->errorInfo()));
        } else {
            error_log("Registration saved successfully for " . $insert_data['email']);
        }
        return $result;
    } catch (PDOException $e) {
        error_log("Insert PDOException for " . ($insert_data['email'] ?? 'unknown') . ": " . $e->getMessage());
        return false;
    } catch (Exception $e) {
        error_log("Insert General Exception: " . $e->getMessage());
        return false;
    }
}

function get_all_registrations() {
    $pdo = get_db_connection();
    if (!$pdo) return [];
    
    $stmt = $pdo->query("SELECT * FROM registrations ORDER BY created_at DESC");
    return $stmt->fetchAll();
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
    if ($pdo) {
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
    return [];
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
        [
            'title' => 'Blockchain Revolution in Germany',
            'video_url' => '',
            'thumbnail_url' => 'https://images.unsplash.com/photo-1516245834210-c4c142787335?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
        ],
        [
            'title' => 'Youth Crypto Forum: Highlights 2025',
            'video_url' => '',
            'thumbnail_url' => 'https://images.unsplash.com/photo-1526628953301-3e589a6a8b74?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
        ],
        [
            'title' => 'Future of Digital Economy in Europe',
            'video_url' => '',
            'thumbnail_url' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'
        ]
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
    $code_map = [
        0 => '☀️', 1 => '🌤️', 2 => '🌤️', 3 => '☁️', 45 => '🌫️', 48 => '🌫️',
        51 => '🌦️', 53 => '🌦️', 55 => '🌦️', 61 => '🌧️', 63 => '🌧️', 65 => '🌧️',
        71 => '❄️', 73 => '❄️', 75 => '❄️', 77 => '❄️', 80 => '🌦️', 81 => '🌦️',
        82 => '🌦️', 85 => '❄️', 86 => '❄️', 95 => '⛈️', 96 => '⛈️', 99 => '⛈️',
    ];
    $weathercode = $current['weathercode'] ?? 0;
    $icon = $code_map[$weathercode] ?? '☀️';
    $forecast = [];
    if (isset($data['hourly']['time'])) {
        $now_idx = 0;
        $now_time = time();
        foreach ($data['hourly']['time'] as $idx => $time_str) {
            if (strtotime($time_str) >= $now_time) {
                $now_idx = $idx;
                break;
            }
        }
        for ($i = 1; $i <= 6; $i++) {
            if (isset($data['hourly']['time'][$now_idx + $i])) {
                $t = strtotime($data['hourly']['time'][$now_idx + $i]);
                $temp = $data['hourly']['temperature_2m'][$now_idx + $i] ?? 0;
                $wcode = $data['hourly']['weathercode'][$now_idx + $i] ?? 0;
                $forecast[] = [
                    'time' => date('H:00', $t),
                    'temp' => round($temp) . '°',
                    'icon' => $code_map[$wcode] ?? '☀️'
                ];
            }
        }
    }
    return [
        'temp' => round($current['temperature_2m'] ?? 0) . '° C',
        'icon' => $icon,
        'description' => $weathercode,
        'last_updated' => date('H:i'),
        'forecast' => $forecast
    ];
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
    } catch (PDOException $e) {
    }
    return $results;
}

function get_latest_news() {
    $news_file = 'news_data.json';
    if (file_exists($news_file)) {
        return json_decode(file_get_contents($news_file), true);
    }
    return [
        [
            'id' => 1,
            'title' => 'Youth Crypto Forum 2026: The Future of Digital Economy in Berlin',
            'summary' => 'Join thousands of young innovators in Berlin to discuss blockchain and the global economy.',
            'content' => 'The Youth Crypto Forum 2026 is set to be the landmark event of the year for digital finance in Europe...',
            'date' => 'January 10, 2026',
            'category' => 'Press Release',
            'image' => 'attached_assets/stock_images/cryptocurrency_block_a66cf05b.jpg'
        ],
        [
            'id' => 2,
            'title' => 'Berlin to Host Major Blockchain Summit at Brandenburg Gate',
            'summary' => 'Germany\'s capital preparing for the largest youth-focused crypto event in Europe.',
            'content' => 'Preparation is in full swing at the historic Brandenburg Gate...',
            'date' => 'January 05, 2026',
            'category' => 'Update',
            'image' => 'attached_assets/stock_images/cryptocurrency_block_a86cab3a.jpg'
        ],
        [
            'id' => 3,
            'title' => 'Registration for Early Bird Tickets Now Open for Forum 2026',
            'summary' => 'Secure your spot at the Youth Crypto Forum with special early bird pricing available now.',
            'content' => 'Don\'t miss out on the most anticipated youth crypto event in Europe!...',
            'date' => 'January 02, 2026',
            'category' => 'Announcement',
            'image' => 'attached_assets/stock_images/cryptocurrency_block_d84d2c76.jpg'
        ]
    ];
}

function get_news_by_id($id) {
    foreach (get_latest_news() as $item) {
        if ($item['id'] == $id) return $item;
    }
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
        } catch (PDOException $e) {
        }
    }
    $defaults = ['btc_address' => '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa'];
    return $defaults[$key] ?? $default;
}
