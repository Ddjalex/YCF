<?php
// functions.php - Global utility functions

function get_db_connection() {
    $database_url = getenv('DATABASE_URL');
    if (!$database_url) {
        error_log("DATABASE_URL not set");
        return null;
    }
    try {
        // Simple DSN for PostgreSQL
        $dsn = str_replace('postgres://', 'pgsql:host=', $database_url);
        $dsn = str_replace('postgresql://', 'pgsql:host=', $dsn);
        
        // Extract components manually if needed, but PDO can often handle URL-like DSNs with some tweaking
        // For Neon/Replit, it's usually better to parse it properly
        $dbopts = parse_url($database_url);
        if (!$dbopts) return null;

        $host = $dbopts['host'];
        $port = $dbopts['port'] ?? 5432;
        $user = $dbopts['user'];
        $pass = $dbopts['pass'];
        $dbname = ltrim($dbopts['path'], '/');

        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";
        return new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        error_log("Connection failed: " . $e->getMessage());
        return null;
    }
}

/**
 * Get hotel listings
 */
function get_hotels() {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM hotels ORDER BY id DESC");
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
            if ($result && !empty($result['value'])) return $result['value'];
        } catch (PDOException $e) {
        }
    }
    
    $hero_video = 'attached_assets/hero_video.mp4';
    if (!file_exists($hero_video)) {
        $hero_video = 'attached_assets/generated_videos/cinematic_blockchain_and_technology_highlights.mp4';
    }
    return $hero_video;
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
 * Mock data for news items
 */
function get_latest_news() {
    $news_file = 'news_data.json';
    if (file_exists($news_file)) {
        return json_decode(file_get_contents($news_file), true);
    }
    
    return [
        [
            'title' => 'Youth Crypto Forum 2026: The Future of Digital Economy in Berlin',
            'summary' => 'Join thousands of young innovators in Berlin to discuss blockchain and the global economy.',
            'date' => 'January 10, 2026',
            'category' => 'Press Release',
            'image' => 'attached_assets/stock_images/cryptocurrency_block_a66cf05b.jpg'
        ],
        [
            'title' => 'Berlin to Host Major Blockchain Summit at Brandenburg Gate',
            'summary' => 'Germany\'s capital preparing for the largest youth-focused crypto event in Europe.',
            'date' => 'January 05, 2026',
            'category' => 'Update',
            'image' => 'attached_assets/stock_images/cryptocurrency_block_a86cab3a.jpg'
        ],
        [
            'title' => 'Registration for Early Bird Tickets Now Open for Forum 2026',
            'summary' => 'Secure your spot at the Youth Crypto Forum with special early bird pricing available now.',
            'date' => 'January 02, 2026',
            'category' => 'Announcement',
            'image' => 'attached_assets/stock_images/cryptocurrency_block_d84d2c76.jpg'
        ]
    ];
}
?>