<?php
session_start();

// Simple secure session check
if (!isset($_SESSION['authenticated'])) {
    if (isset($_POST['password']) && $_POST['password'] === 'admin2026') { // In production, use hashing
        $_SESSION['authenticated'] = true;
    } else {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Admin Login - UNPSF 2026</title>
            <style>
                body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f0f7ff; margin: 0; }
                form { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); width: 300px; }
                input { width: 100%; padding: 0.8rem; margin: 1rem 0; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
                button { width: 100%; padding: 0.8rem; background: #009edb; color: white; border: none; border-radius: 6px; font-weight: 700; cursor: pointer; }
            </style>
        </head>
        <body>
            <form method="POST">
                <h2 style="margin: 0; color: #003366;">Admin Access</h2>
                <input type="password" name="password" placeholder="Enter security key" required autofocus>
                <button type="submit">Unlock System</button>
            </form>
        </body>
        </html>
        <?php
        exit;
    }
}

// admin.php - Simple admin panel
require_once 'functions.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['countdown_date'])) {
        file_put_contents('countdown_date.txt', $_POST['countdown_date']);
        $message = "Countdown date updated!";
    }
    
    if (isset($_POST['news_json'])) {
        $news_data = json_decode($_POST['news_json'], true);
        if (json_last_error() === JSON_ERROR_NONE) {
            file_put_contents('news_data.json', $_POST['news_json']);
            $message = "News items updated!";
        } else {
            $message = "Invalid JSON for news items.";
        }
    }
}

$current_date = get_target_date();
$current_news = json_encode(get_latest_news(), JSON_PRETTY_PRINT);

include 'header.php';
?>

<section style="padding: 4rem 5%; max-width: 800px; margin: 0 auto;">
    <h2 style="color: var(--dark-blue);">Admin Dashboard</h2>
    
    <?php if ($message): ?>
        <p style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 4px;"><?php echo $message; ?></p>
    <?php endif; ?>

    <form method="POST" style="background: #f8f9fa; padding: 2rem; border-radius: 8px; border: 1px solid #eee; margin-bottom: 2rem;">
        <h3>Update Event Countdown</h3>
        <p style="font-size: 0.9rem; color: #666;">Format: Month Day, Year HH:MM:SS (e.g., December 15, 2026 09:00:00)</p>
        <input type="text" name="countdown_date" value="<?php echo $current_date; ?>" style="width: 100%; padding: 0.8rem; margin-bottom: 1rem; border: 1px solid #ddd; border-radius: 4px;">
        <button type="submit" style="background: var(--primary-blue); color: white; border: none; padding: 0.8rem 1.5rem; border-radius: 4px; cursor: pointer;">Update Countdown</button>
    </form>

    <form method="POST" style="background: #f8f9fa; padding: 2rem; border-radius: 8px; border: 1px solid #eee;">
        <h3>Manage News Items (JSON)</h3>
        <p style="font-size: 0.9rem; color: #666;">Edit the news items in JSON format below:</p>
        <textarea name="news_json" rows="15" style="width: 100%; padding: 0.8rem; margin-bottom: 1rem; border: 1px solid #ddd; border-radius: 4px; font-family: monospace; font-size: 0.85rem;"><?php echo $current_news; ?></textarea>
        <button type="submit" style="background: var(--primary-blue); color: white; border: none; padding: 0.8rem 1.5rem; border-radius: 4px; cursor: pointer;">Update News Items</button>
    </form>
    
    <p style="margin-top: 2rem;"><a href="index.php">&larr; Back to Website</a></p>
</section>

<?php include 'footer.php'; ?>