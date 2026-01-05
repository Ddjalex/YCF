<?php
session_start();
require_once '../functions.php';

// Simple secure session check
if (!isset($_SESSION['authenticated'])) {
    if (isset($_POST['password']) && $_POST['password'] === 'admin2026') {
        $_SESSION['authenticated'] = true;
        // Ensure we stay on /admin/ after login
        header("Location: /admin/");
        exit;
    } else {
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Admin Login - UNPSF 2026</title>
            <style>
                body { font-family: 'Inter', sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f0f7ff; margin: 0; }
                form { background: white; padding: 2.5rem; border-radius: 16px; box-shadow: 0 20px 50px rgba(0,0,0,0.1); width: 350px; text-align: center; }
                input { width: 100%; padding: 1rem; margin: 1.5rem 0; border: 2px solid #edf2f7; border-radius: 8px; box-sizing: border-box; font-size: 1rem; transition: border-color 0.2s; }
                input:focus { outline: none; border-color: #009edb; }
                button { width: 100%; padding: 1rem; background: #009edb; color: white; border: none; border-radius: 8px; font-weight: 700; cursor: pointer; font-size: 1rem; transition: background 0.2s; }
                button:hover { background: #007bb5; }
            </style>
        </head>
        <body>
            <form method="POST">
                <img src="https://www.unpsf2025.org/assets/banner-logo-9fqzApTB.svg" style="height: 60px; margin-bottom: 1.5rem;">
                <h2 style="margin: 0; color: #003366; font-size: 1.5rem;">Admin Terminal</h2>
                <p style="color: #718096; font-size: 0.9rem; margin-top: 0.5rem;">Secure access required</p>
                <input type="password" name="password" placeholder="Access Key" required autofocus>
                <button type="submit">Initialize Dashboard</button>
            </form>
        </body>
        </html>
        <?php
        exit;
    }
}

$pdo = get_db_connection();
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'update_countdown') {
        $stmt = $pdo->prepare("INSERT INTO admin_settings (key, value) VALUES ('countdown_date', ?) ON CONFLICT (key) DO UPDATE SET value = EXCLUDED.value");
        $stmt->execute([$_POST['countdown_date']]);
        $message = "Countdown updated successfully!";
    } elseif ($_POST['action'] === 'add_hotel') {
        $stmt = $pdo->prepare("INSERT INTO hotels (name, description, location, video_url, photo_url, stars, map_url) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$_POST['name'], $_POST['description'], $_POST['location'], $_POST['video_url'], $_POST['photo_url'], $_POST['stars'], $_POST['map_url']]);
        $message = "Hotel added successfully!";
    } elseif ($_POST['action'] === 'delete_hotel') {
        $stmt = $pdo->prepare("DELETE FROM hotels WHERE id = ?");
        $stmt->execute([$_POST['id']]);
        $message = "Hotel removed.";
    } elseif ($_POST['action'] === 'update_hero_video') {
        $stmt = $pdo->prepare("INSERT INTO admin_settings (key, value) VALUES ('hero_video', ?) ON CONFLICT (key) DO UPDATE SET value = EXCLUDED.value");
        $stmt->execute([$_POST['hero_video']]);
        $message = "Hero video updated!";
    } elseif ($_POST['action'] === 'add_video') {
        $stmt = $pdo->prepare("INSERT INTO videos (title, video_url, thumbnail_url) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['title'], $_POST['video_url'], $_POST['thumbnail_url']]);
        $message = "Video added!";
    } elseif ($_POST['action'] === 'delete_video') {
        $stmt = $pdo->prepare("DELETE FROM videos WHERE id = ?");
        $stmt->execute([$_POST['id']]);
        $message = "Video removed.";
    }
}

$hotels = get_hotels();
$current_date = get_target_date();
$hero_video = get_hero_video();
$homepage_videos = get_homepage_videos();

include '../header.php';
?>

<div style="padding: 2rem 5%; max-width: 1200px; margin: 0 auto; font-family: 'Inter', sans-serif;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem;">
        <h1 style="color: #003366; margin: 0;">System Control Center</h1>
        <a href="/" style="text-decoration: none; color: #009edb; font-weight: 600;">&larr; Public View</a>
    </div>

    <?php if ($message): ?>
        <div style="background: #e6fffa; color: #2c7a7b; padding: 1rem; border-radius: 8px; margin-bottom: 2rem; border: 1px solid #b2f5ea;"><?php echo $message; ?></div>
    <?php endif; ?>

    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 2rem;">
        <div>
            <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #edf2f7; margin-bottom: 2rem;">
                <h3 style="margin-top: 0; color: #2d3748;">Hero Video</h3>
                <form method="POST">
                    <input type="hidden" name="action" value="update_hero_video">
                    <label style="display: block; font-size: 0.8rem; color: #718096; margin-bottom: 0.5rem;">Hero Video URL (MP4)</label>
                    <input type="text" name="hero_video" value="<?php echo htmlspecialchars($hero_video); ?>" style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 6px; margin-bottom: 1rem;">
                    <button type="submit" style="width: 100%; padding: 0.8rem; background: #2d3748; color: white; border: none; border-radius: 6px; cursor: pointer;">Update Hero Video</button>
                </form>
            </div>

            <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #edf2f7; margin-bottom: 2rem;">
                <h3 style="margin-top: 0; color: #2d3748;">Global Countdown</h3>
                <form method="POST">
                    <input type="hidden" name="action" value="update_countdown">
                    <label style="display: block; font-size: 0.8rem; color: #718096; margin-bottom: 0.5rem;">Target Event Date</label>
                    <input type="text" name="countdown_date" value="<?php echo htmlspecialchars($current_date); ?>" style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 6px; margin-bottom: 1rem;">
                    <button type="submit" style="width: 100%; padding: 0.8rem; background: #2d3748; color: white; border: none; border-radius: 6px; cursor: pointer;">Sync Countdown</button>
                </form>
            </div>

            <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #edf2f7;">
                <h3 style="margin-top: 0; color: #2d3748;">New Hotel Entry</h3>
                <form method="POST">
                    <input type="hidden" name="action" value="add_hotel">
                    <input type="text" name="name" placeholder="Hotel Name" required style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 6px; margin-bottom: 1rem;">
                    <input type="text" name="location" placeholder="Location String" style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 6px; margin-bottom: 1rem;">
                    <textarea name="description" placeholder="Short Description" rows="3" style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 6px; margin-bottom: 1rem;"></textarea>
                    <input type="text" name="video_url" placeholder="Video URL (YouTube/MP4)" style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 6px; margin-bottom: 1rem;">
                    <input type="text" name="photo_url" placeholder="Photo Path/URL" style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 6px; margin-bottom: 1rem;">
                    <div style="display: flex; gap: 1rem; margin-bottom: 1rem;">
                        <input type="number" name="stars" value="5" min="1" max="5" style="width: 50%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 6px;">
                        <input type="text" name="map_url" placeholder="Map Link" style="width: 50%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 6px;">
                    </div>
                    <button type="submit" style="width: 100%; padding: 0.8rem; background: #009edb; color: white; border: none; border-radius: 6px; cursor: pointer;">Deploy Entry</button>
                </form>
            </div>
        </div>

            <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #edf2f7; margin-bottom: 2rem;">
                <h3 style="margin-top: 0; color: #2d3748;">Add New Video</h3>
                <form method="POST">
                    <input type="hidden" name="action" value="add_video">
                    <input type="text" name="title" placeholder="Video Title" required style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 6px; margin-bottom: 1rem;">
                    <input type="text" name="video_url" placeholder="Video URL" style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 6px; margin-bottom: 1rem;">
                    <input type="text" name="thumbnail_url" placeholder="Thumbnail Image URL" style="width: 100%; padding: 0.8rem; border: 1px solid #e2e8f0; border-radius: 6px; margin-bottom: 1rem;">
                    <button type="submit" style="width: 100%; padding: 0.8rem; background: #009edb; color: white; border: none; border-radius: 6px; cursor: pointer;">Add Video</button>
                </form>
            </div>

            <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #edf2f7; margin-bottom: 2rem;">
                <h3 style="margin-top: 0; color: #2d3748;">Manage Videos</h3>
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="text-align: left; border-bottom: 2px solid #edf2f7;">
                                <th style="padding: 1rem 0.5rem; color: #718096; font-size: 0.8rem;">Title</th>
                                <th style="padding: 1rem 0.5rem; color: #718096; font-size: 0.8rem;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($homepage_videos as $video): ?>
                                <?php if (isset($video['id'])): ?>
                                <tr style="border-bottom: 1px solid #edf2f7;">
                                    <td style="padding: 1rem 0.5rem;">
                                        <div style="font-weight: 600; color: #2d3748;"><?php echo htmlspecialchars($video['title']); ?></div>
                                    </td>
                                    <td style="padding: 1rem 0.5rem;">
                                        <form method="POST" onsubmit="return confirm('Are you sure?')">
                                            <input type="hidden" name="action" value="delete_video">
                                            <input type="hidden" name="id" value="<?php echo $video['id']; ?>">
                                            <button type="submit" style="background: #fff5f5; color: #c53030; border: 1px solid #feb2b2; padding: 0.3rem 0.6rem; border-radius: 4px; cursor: pointer; font-size: 0.8rem;">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #edf2f7;">
                <h3 style="margin-top: 0; color: #2d3748;">Active Hotel Database</h3>
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="text-align: left; border-bottom: 2px solid #edf2f7;">
                            <th style="padding: 1rem 0.5rem; color: #718096; font-size: 0.8rem;">Name/Location</th>
                            <th style="padding: 1rem 0.5rem; color: #718096; font-size: 0.8rem;">Visuals</th>
                            <th style="padding: 1rem 0.5rem; color: #718096; font-size: 0.8rem;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($hotels as $hotel): ?>
                            <tr style="border-bottom: 1px solid #edf2f7;">
                                <td style="padding: 1rem 0.5rem;">
                                    <div style="font-weight: 600; color: #2d3748;"><?php echo htmlspecialchars($hotel['name']); ?></div>
                                    <div style="font-size: 0.8rem; color: #a0aec0;"><?php echo htmlspecialchars($hotel['location']); ?></div>
                                </td>
                                <td style="padding: 1rem 0.5rem;">
                                    <div style="display: flex; gap: 0.5rem;">
                                        <?php if ($hotel['photo_url']): ?><span title="Photo">🖼️</span><?php endif; ?>
                                        <?php if ($hotel['video_url']): ?><span title="Video">🎥</span><?php endif; ?>
                                        <span style="color: #ecc94b;"><?php echo str_repeat('★', $hotel['stars']); ?></span>
                                    </div>
                                </td>
                                <td style="padding: 1rem 0.5rem;">
                                    <form method="POST" onsubmit="return confirm('Are you sure?')">
                                        <input type="hidden" name="action" value="delete_hotel">
                                        <input type="hidden" name="id" value="<?php echo $hotel['id']; ?>">
                                        <button type="submit" style="background: #fff5f5; color: #c53030; border: 1px solid #feb2b2; padding: 0.3rem 0.6rem; border-radius: 4px; cursor: pointer; font-size: 0.8rem;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>