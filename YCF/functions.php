<?php
// functions.php - Global utility functions

function get_mysql_connection() {
    static $mysql_pdo = null;
    if ($mysql_pdo !== null) return $mysql_pdo;

    $host = $_ENV['MYSQL_HOST'] ?? getenv('MYSQL_HOST');
    $database = $_ENV['MYSQL_DATABASE'] ?? getenv('MYSQL_DATABASE');
    $user = $_ENV['MYSQL_USER'] ?? getenv('MYSQL_USER');
    $password = $_ENV['MYSQL_PASSWORD'] ?? getenv('MYSQL_PASSWORD');

    if (!$host || !$database || !$user || !$password) {
        error_log("MySQL credentials not fully configured. Missing: " . 
            (!$host ? "MYSQL_HOST " : "") . 
            (!$database ? "MYSQL_DATABASE " : "") . 
            (!$user ? "MYSQL_USER " : "") . 
            (!$password ? "MYSQL_PASSWORD" : ""));
        return null;
    }

    try {
        // If host is localhost, use 127.0.0.1 to force TCP instead of socket
        $connect_host = ($host === 'localhost') ? '127.0.0.1' : $host;
        $dsn = "mysql:host=$connect_host;dbname=$database;charset=utf8mb4";
        $mysql_pdo = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
        ]);
        error_log("MySQL connection established successfully to $database");
        return $mysql_pdo;
    } catch (PDOException $e) {
        error_log("MySQL Connection Failed for $host: " . $e->getMessage());
        return null;
    }
}

function get_db_connection() {
    // Only use MySQL connection for the main application
    return get_mysql_connection();
}

function save_registration($data) {
    $mysql_pdo = get_mysql_connection();
    
    if (!$mysql_pdo) {
        error_log("CRITICAL ERROR: No database connection available in save_registration for email: " . ($data['email'] ?? 'unknown'));
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
        $stmt = $mysql_pdo->prepare($sql);
        $success = $stmt->execute($insert_data);
        if ($success) {
            error_log("Registration saved to MySQL successfully for " . $insert_data['email']);
            return true;
        } else {
            error_log("MySQL insert failed for " . ($insert_data['email'] ?? 'unknown') . ": " . implode(" ", $stmt->errorInfo()));
            return false;
        }
    } catch (PDOException $e) {
        error_log("MySQL Insert PDOException for " . ($insert_data['email'] ?? 'unknown') . ": " . $e->getMessage());
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

function send_admin_registration_notification($data) {
    $admin_email = get_admin_setting('admin_email', 'admin@youthcryptoforum.com');
    
    $site_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . ($_SERVER['HTTP_HOST'] ?? 'localhost');
    
    $full_name = trim(($data['first_name'] ?? '') . ' ' . ($data['last_name'] ?? ''));
    
    $subject = "New Registration: " . $full_name . " - Youth Crypto Forum 2026";
    
    $message = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #2D236E; color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
            .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
            .section { margin-bottom: 20px; padding: 15px; background: white; border-radius: 8px; border-left: 4px solid #FFD700; }
            .section-title { font-weight: bold; color: #2D236E; margin-bottom: 10px; font-size: 16px; }
            .field { margin: 8px 0; }
            .field-label { font-weight: bold; color: #666; display: inline-block; width: 150px; }
            .field-value { color: #333; }
            .photo-section { text-align: center; margin: 15px 0; }
            .photo-section img { max-width: 200px; max-height: 200px; border: 2px solid #ddd; border-radius: 8px; margin: 5px; }
            .footer { background: #2D236E; color: white; padding: 15px; text-align: center; border-radius: 0 0 10px 10px; font-size: 12px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Registration Received</h2>
                <p>Youth Crypto Forum 2026 - Berlin, Germany</p>
            </div>
            <div class='content'>
                <div class='section'>
                    <div class='section-title'>Step 1: Personal Information</div>
                    <div class='field'><span class='field-label'>Full Name:</span> <span class='field-value'>" . htmlspecialchars($full_name) . "</span></div>
                    <div class='field'><span class='field-label'>Email:</span> <span class='field-value'>" . htmlspecialchars($data['email'] ?? 'N/A') . "</span></div>
                    <div class='field'><span class='field-label'>Phone:</span> <span class='field-value'>" . htmlspecialchars($data['phone'] ?? 'N/A') . "</span></div>
                    <div class='field'><span class='field-label'>Gender:</span> <span class='field-value'>" . htmlspecialchars($data['gender'] ?? 'N/A') . "</span></div>
                    <div class='field'><span class='field-label'>Date of Birth:</span> <span class='field-value'>" . htmlspecialchars($data['dob'] ?? 'N/A') . "</span></div>
                    <div class='field'><span class='field-label'>Nationality:</span> <span class='field-value'>" . htmlspecialchars($data['nationality'] ?? 'N/A') . "</span></div>
                    <div class='field'><span class='field-label'>Profession:</span> <span class='field-value'>" . htmlspecialchars($data['profession'] ?? 'N/A') . "</span></div>
                    <div class='field'><span class='field-label'>Organization:</span> <span class='field-value'>" . htmlspecialchars($data['organization'] ?? 'N/A') . "</span></div>
                    <div class='field'><span class='field-label'>Residence:</span> <span class='field-value'>" . htmlspecialchars($data['residence'] ?? 'N/A') . "</span></div>
                    <div class='field'><span class='field-label'>Departure City:</span> <span class='field-value'>" . htmlspecialchars($data['departure'] ?? 'N/A') . "</span></div>
                    <div class='field'><span class='field-label'>Visa Required:</span> <span class='field-value'>" . htmlspecialchars($data['visa'] ?? 'N/A') . "</span></div>
                </div>
                
                <div class='section'>
                    <div class='section-title'>Step 2: Application Details</div>
                    <div class='field'><span class='field-label'>Package:</span> <span class='field-value'>" . htmlspecialchars($data['package_name'] ?? 'N/A') . "</span></div>
                    <div class='field'><span class='field-label'>Source/Referral:</span> <span class='field-value'>" . htmlspecialchars($data['source'] ?? $data['referral'] ?? 'N/A') . "</span></div>
                    <div class='field'><span class='field-label'>Personal Journey:</span></div>
                    <div style='background: #fff; padding: 10px; border-radius: 5px; margin-top: 5px;'>" . nl2br(htmlspecialchars($data['journey'] ?? 'N/A')) . "</div>
                    <div class='field' style='margin-top: 15px;'><span class='field-label'>Expected Impact:</span></div>
                    <div style='background: #fff; padding: 10px; border-radius: 5px; margin-top: 5px;'>" . nl2br(htmlspecialchars($data['impact'] ?? 'N/A')) . "</div>
                </div>
                
                <div class='section'>
                    <div class='section-title'>Step 3: Payment Information</div>
                    <div class='field'><span class='field-label'>Amount:</span> <span class='field-value'>$" . number_format(floatval($data['amount'] ?? 0), 2) . "</span></div>
                    <div class='field'><span class='field-label'>Payment Method:</span> <span class='field-value'>" . htmlspecialchars($data['payment_method'] ?? 'N/A') . "</span></div>
                    <div class='field'><span class='field-label'>Transaction ID:</span> <span class='field-value'>" . htmlspecialchars($data['txid'] ?? 'N/A') . "</span></div>
                </div>
                
                <div class='section'>
                    <div class='section-title'>Uploaded Documents</div>
                    <div class='photo-section'>";
    
    if (!empty($data['profile_photo'])) {
        $profile_url = $site_url . '/' . $data['profile_photo'];
        $message .= "<div><strong>Profile Photo:</strong><br><img src='" . $profile_url . "' alt='Profile Photo'></div>";
    } else {
        $message .= "<div><strong>Profile Photo:</strong> Not uploaded</div>";
    }
    
    if (!empty($data['passport_photo'])) {
        $passport_url = $site_url . '/' . $data['passport_photo'];
        $message .= "<div style='margin-top: 10px;'><strong>Passport Photo:</strong><br><img src='" . $passport_url . "' alt='Passport Photo'></div>";
    } else {
        $message .= "<div style='margin-top: 10px;'><strong>Passport Photo:</strong> Not uploaded</div>";
    }
    
    if (!empty($data['payment_screenshot'])) {
        $payment_url = $site_url . '/' . $data['payment_screenshot'];
        $message .= "<div style='margin-top: 10px;'><strong>Payment Screenshot:</strong><br><img src='" . $payment_url . "' alt='Payment Screenshot'></div>";
    } else {
        $message .= "<div style='margin-top: 10px;'><strong>Payment Screenshot:</strong> Not uploaded</div>";
    }
    
    $message .= "
                    </div>
                </div>
            </div>
            <div class='footer'>
                <p>This is an automated notification from Youth Crypto Forum 2026</p>
                <p>Please review this registration in the admin dashboard</p>
            </div>
        </div>
    </body>
    </html>";
    
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: Youth Crypto Forum <noreply@youthcryptoforum.com>\r\n";
    $headers .= "Reply-To: " . ($data['email'] ?? 'noreply@youthcryptoforum.com') . "\r\n";
    
    $mail_sent = @mail($admin_email, $subject, $message, $headers);
    
    if ($mail_sent) {
        error_log("Admin notification email sent successfully for registration: " . ($data['email'] ?? 'unknown'));
    } else {
        error_log("Failed to send admin notification email for registration: " . ($data['email'] ?? 'unknown'));
    }
    
    return $mail_sent;
}
