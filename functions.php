<?php
// functions.php - Global utility functions

function get_db_connection() {
    // Try PostgreSQL first
    $database_url = getenv('DATABASE_URL');
    if ($database_url) {
        try {
            $dbopts = parse_url($database_url);
            if ($dbopts) {
                $host = $dbopts['host'];
                $port = $dbopts['port'] ?? 5432;
                $user = $dbopts['user'];
                $pass = $dbopts['pass'];
                $dbname = ltrim($dbopts['path'], '/');
                $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
                $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                
                // Initialize tables if they don't exist
                $pdo->exec("CREATE TABLE IF NOT EXISTS registrations (
                    id SERIAL PRIMARY KEY,
                    package_id TEXT,
                    package_name TEXT,
                    first_name TEXT,
                    last_name TEXT,
                    nationality TEXT,
                    email TEXT,
                    gender TEXT,
                    dob TEXT,
                    phone TEXT,
                    profession TEXT,
                    residence TEXT,
                    departure TEXT,
                    visa TEXT,
                    referral TEXT,
                    journey TEXT,
                    impact TEXT,
                    profile_photo TEXT,
                    passport_photo TEXT,
                    payment_method TEXT,
                    txid TEXT,
                    payment_screenshot TEXT,
                    amount REAL,
                    status TEXT DEFAULT 'pending',
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )");
                
                $pdo->exec("CREATE TABLE IF NOT EXISTS admin_settings (
                    key TEXT PRIMARY KEY,
                    value TEXT
                )");
                
                return $pdo;
            }
        } catch (PDOException $e) {
            error_log("PostgreSQL Connection failed: " . $e->getMessage());
        }
    }
    
    // Fallback to SQLite if PostgreSQL fails or isn't configured
    try {
        $pdo = new PDO("sqlite:database.sqlite");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Initialize tables if they don't exist
        $pdo->exec("CREATE TABLE IF NOT EXISTS registrations (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            package_id TEXT,
            package_name TEXT,
            first_name TEXT,
            last_name TEXT,
            nationality TEXT,
            email TEXT,
            gender TEXT,
            dob TEXT,
            phone TEXT,
            profession TEXT,
            residence TEXT,
            departure TEXT,
            visa TEXT,
            referral TEXT,
            journey TEXT,
            impact TEXT,
            profile_photo TEXT,
            passport_photo TEXT,
            payment_method TEXT,
            txid TEXT,
            payment_screenshot TEXT,
            amount REAL,
            status TEXT DEFAULT 'pending',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");
        return $pdo;
    } catch (PDOException $e) {
        error_log("SQLite Connection failed: " . $e->getMessage());
        return null;
    }
}

function save_registration($data) {
    $pdo = get_db_connection();
    if (!$pdo) return false;
    
    $fields = array_keys($data);
    $placeholders = array_map(function($f) { return ":$f"; }, $fields);
    
    $sql = "INSERT INTO registrations (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute($data);
}

function get_all_registrations() {
    $pdo = get_db_connection();
    if (!$pdo) return [];
    
    $stmt = $pdo->query("SELECT * FROM registrations ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_registration_by_id($id) {
    $pdo = get_db_connection();
    if (!$pdo) return null;
    
    $stmt = $pdo->prepare("SELECT * FROM registrations WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Get hotel listings
 */
function get_hotels($search = null) {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            if ($search) {
                $stmt = $pdo->prepare("SELECT * FROM hotels WHERE name ILIKE ? OR location ILIKE ? OR description ILIKE ? ORDER BY stars DESC, name ASC");
                $stmt->execute(['%' . $search . '%', '%' . $search . '%', '%' . $search . '%']);
            } else {
                $stmt = $pdo->query("SELECT * FROM hotels ORDER BY stars DESC, name ASC");
            }
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
    return [];
}

/**
 * Formats a date for the countdown timer
 */
function get_target_date() {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT value FROM admin_settings WHERE key = 'countdown_date'");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) return $result['value'];
        } catch (PDOException $e) {
            // Fallback
        }
    }
    return "June 15, 2026 09:00:00";
}

/**
 * Get hero video
 */
function get_hero_video() {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT value FROM admin_settings WHERE key = 'hero_video'");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && !empty($result['value'])) {
                $val = $result['value'];
                // Clean up any double slashes and ensure local paths don't start with / for logic consistency
                if (strpos($val, '//') === 0) $val = ltrim($val, '/');
                return $val;
            }
        } catch (PDOException $e) {
        }
    }
    
    // Default fallback - Using a reliable external video
    return 'https://assets.mixkit.co/videos/preview/mixkit-digital-animation-of-a-circuit-board-4451-large.mp4';
}

/**
 * Get homepage videos
 */
function get_homepage_videos() {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM videos ORDER BY id DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

/**
 * Get live weather data for Berlin
 */
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
    
    // Map weather codes to emojis
    $code_map = [
        0 => '☀️', // Clear sky
        1 => '🌤️', 2 => '🌤️', 3 => '☁️', // Mainly clear, partly cloudy, and overcast
        45 => '🌫️', 48 => '🌫️', // Fog
        51 => '🌦️', 53 => '🌦️', 55 => '🌦️', // Drizzle
        61 => '🌧️', 63 => '🌧️', 65 => '🌧️', // Rain
        71 => '❄️', 73 => '❄️', 75 => '❄️', // Snow fall
        77 => '❄️', // Snow grains
        80 => '🌦️', 81 => '🌦️', 82 => '🌦️', // Rain showers
        85 => '❄️', 86 => '❄️', // Snow showers
        95 => '⛈️', 96 => '⛈️', 99 => '⛈️', // Thunderstorm
    ];

    $weathercode = isset($current['weathercode']) ? $current['weathercode'] : 0;
    $icon = $code_map[$weathercode] ?? '☀️';
    
    // Format forecast for next few hours
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
                $temp = isset($data['hourly']['temperature_2m'][$now_idx + $i]) ? $data['hourly']['temperature_2m'][$now_idx + $i] : 0;
                $wcode = isset($data['hourly']['weathercode'][$now_idx + $i]) ? $data['hourly']['weathercode'][$now_idx + $i] : 0;
                $forecast[] = [
                    'time' => date('H:00', $t),
                    'temp' => round($temp) . '°',
                    'icon' => $code_map[$wcode] ?? '☀️'
                ];
            }
        }
    }

    $curr_temp = isset($current['temperature_2m']) ? $current['temperature_2m'] : 0;
    return [
        'temp' => round($curr_temp) . '° C',
        'icon' => $icon,
        'description' => $weathercode, 
        'last_updated' => date('H:i'),
        'forecast' => $forecast
    ];
}

/**
 * Get global search results
 */
function get_search_results($search) {
    $pdo = get_db_connection();
    $results = ['hotels' => [], 'news' => [], 'videos' => []];
    
    if (!$pdo || empty($search)) return $results;

    $term = '%' . $search . '%';

    try {
        // Search Hotels
        $stmt = $pdo->prepare("SELECT * FROM hotels WHERE name ILIKE ? OR location ILIKE ? OR description ILIKE ? ORDER BY stars DESC");
        $stmt->execute([$term, $term, $term]);
        $results['hotels'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Search Videos
        $stmt = $pdo->prepare("SELECT * FROM videos WHERE title ILIKE ? ORDER BY id DESC");
        $stmt->execute([$term]);
        $results['videos'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Search News
        $all_news = get_latest_news();
        $results['news'] = array_filter($all_news, function($item) use ($search) {
            return stripos($item['title'], $search) !== false || stripos($item['summary'], $search) !== false;
        });

    } catch (PDOException $e) {
        error_log("Search failed: " . $e->getMessage());
    }

    return $results;
}

function get_latest_news() {
    $news_file = 'news_data.json';
    $news = [];
    if (file_exists($news_file)) {
        $news = json_decode(file_get_contents($news_file), true);
    } else {
        $news = [
            [
                'id' => 1,
                'title' => 'Youth Crypto Forum 2026: The Future of Digital Economy in Berlin',
                'summary' => 'Join thousands of young innovators in Berlin to discuss blockchain and the global economy.',
                'content' => 'The Youth Crypto Forum 2026 is set to be the landmark event of the year for digital finance in Europe. Hosted in the heart of Berlin, this forum will bring together top minds from the blockchain industry, regulatory bodies, and young tech enthusiasts. Attendees can expect deep dives into DeFi, the future of NFTs, and how CBDCs are reshaping the European monetary landscape.',
                'date' => 'January 10, 2026',
                'category' => 'Press Release',
                'image' => 'attached_assets/stock_images/cryptocurrency_block_a66cf05b.jpg'
            ],
            [
                'id' => 2,
                'title' => 'Berlin to Host Major Blockchain Summit at Brandenburg Gate',
                'summary' => 'Germany\'s capital preparing for the largest youth-focused crypto event in Europe.',
                'content' => 'Preparation is in full swing at the historic Brandenburg Gate for the upcoming Blockchain Summit. This iconic location will serve as the backdrop for thousands of participants. The summit will focus on sustainable blockchain solutions and the role of youth in democratic technological governance. Key speakers include leading researchers from the Max Planck Institute and tech pioneers from Berlin\'s Silicon Allee.',
                'date' => 'January 05, 2026',
                'category' => 'Update',
                'image' => 'attached_assets/stock_images/cryptocurrency_block_a86cab3a.jpg'
            ],
            [
                'id' => 3,
                'title' => 'Registration for Early Bird Tickets Now Open for Forum 2026',
                'summary' => 'Secure your spot at the Youth Crypto Forum with special early bird pricing available now.',
                'content' => 'Don\'t miss out on the most anticipated youth crypto event in Europe! Early bird registration is officially open. These tickets offer full access to all keynote sessions, workshops, and networking events at a significant discount. Early bird registrants will also receive exclusive access to the pre-forum mixer and a digital delegate bag filled with resources and partner perks.',
                'date' => 'January 02, 2026',
                'category' => 'Announcement',
                'image' => 'attached_assets/stock_images/cryptocurrency_block_d84d2c76.jpg'
            ]
        ];
    }
    return $news;
}

function get_news_by_id($id) {
    $all_news = get_latest_news();
    foreach ($all_news as $item) {
        if ($item['id'] == $id) {
            return $item;
        }
    }
    return null;
}

function get_admin_setting($key, $default = '') {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT value FROM admin_settings WHERE key = ?");
            $stmt->execute([$key]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) return $result['value'];
        } catch (PDOException $e) {
        }
    }
    
    // Default fallback values
    $defaults = [
        'btc_address' => '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa'
    ];
    return $defaults[$key] ?? $default;
}