<?php
// functions.php - Global utility functions

function get_db_connection() {
    // ONLY MySQL (cPanel credentials) - As strictly requested
    $host = '127.0.0.1';
    $port = '3306';
    $user = 'goforuku_germany';
    $pass = 'a1e2y3t4h5';
    $dbname = 'goforuku_germany';

    try {
        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
        return $pdo;
    } catch (PDOException $e) {
        error_log("CRITICAL: MySQL Connection failed: " . $e->getMessage());
        return null;
    }
}

function save_registration($data) {
    $pdo = get_db_connection();
    if (!$pdo) return false;
    
    $fields = array_keys($data);
    $wrapped_fields = array_map(function($f) { return "`$f`"; }, $fields);
    $placeholders = array_map(function($f) { return ":$f"; }, $fields);
    
    $sql = "INSERT INTO registrations (" . implode(', ', $wrapped_fields) . ") VALUES (" . implode(', ', $placeholders) . ")";
    try {
        $stmt = $pdo->prepare($sql);
        return $stmt->execute($data);
    } catch (PDOException $e) {
        error_log("PDO Error in save_registration: " . $e->getMessage());
        return false;
    }
}

function get_all_registrations() {
    $pdo = get_db_connection();
    if (!$pdo) return [];
    try {
        $stmt = $pdo->query("SELECT * FROM registrations ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) { return []; }
}

function get_registration_by_id($id) {
    $pdo = get_db_connection();
    if (!$pdo) return null;
    try {
        $stmt = $pdo->prepare("SELECT * FROM registrations WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) { return null; }
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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) { return []; }
}

function get_target_date() {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT `value` FROM admin_settings WHERE `key` = 'countdown_date'");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) return $result['value'];
        } catch (PDOException $e) { }
    }
    return "May 7, 2026 09:00:00";
}

function get_hero_video() {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT `value` FROM admin_settings WHERE `key` = 'hero_video'");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && !empty($result['value'])) return $result['value'];
        } catch (PDOException $e) { }
    }
    return 'https://assets.mixkit.co/videos/preview/mixkit-digital-animation-of-a-circuit-board-4451-large.mp4';
}

function get_homepage_videos() {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            $stmt = $pdo->query("SELECT * FROM videos ORDER BY id DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) { }
    }
    return [];
}

function get_admin_setting($key, $default = '') {
    $pdo = get_db_connection();
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("SELECT `value` FROM admin_settings WHERE `key` = ?");
            $stmt->execute([$key]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) return $result['value'];
        } catch (PDOException $e) { }
    }
    return $default;
}

