<?php
// Main index file for Replit Development Environment
// Uses a local database for testing and preview

require_once 'YCF/functions.php';

// Define a local connection function for this environment
function get_local_dev_connection() {
    try {
        // Create or connect to a local sqlite database for development
        $pdo = new PDO('sqlite:dev_local.db');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Initialize tables if they don't exist
        $pdo->exec("CREATE TABLE IF NOT EXISTS registrations (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            first_name TEXT,
            last_name TEXT,
            email TEXT,
            package_name TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");
        
        return $pdo;
    } catch (PDOException $e) {
        return null;
    }
}

$pdo = get_local_dev_connection();
$registrations = [];
if ($pdo) {
    $stmt = $pdo->query("SELECT * FROM registrations ORDER BY id DESC");
    $registrations = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

include 'YCF/header.php';
?>

<main class="container py-5" style="margin-top: 100px;">
    <div class="card bg-dark text-white border-primary mb-4">
        <div class="card-body">
            <h1 class="display-5 fw-bold text-primary">Replit Dev Environment</h1>
            <p class="lead">This page uses a local database for Replit testing. The <code>YCF/</code> folder continues to use your cPanel MySQL.</p>
            <div class="d-flex gap-3 mt-4">
                <a href="/YCF/index.php" class="btn btn-primary btn-lg px-4">Visit YCF Site (Live DB)</a>
                <a href="/YCF/apply.php" class="btn btn-outline-light btn-lg px-4">Test Application Form</a>
            </div>
        </div>
    </div>

    <section class="mt-5">
        <h2 class="mb-4">Local Development Submissions</h2>
        <?php if (empty($registrations)): ?>
            <div class="alert alert-info bg-dark text-light border-info">No local test registrations found.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-dark table-hover border-secondary">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Package</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($registrations as $reg): ?>
                            <tr>
                                <td><?= htmlspecialchars($reg['first_name'] . ' ' . $reg['last_name']) ?></td>
                                <td><?= htmlspecialchars($reg['email']) ?></td>
                                <td><?= htmlspecialchars($reg['package_name']) ?></td>
                                <td><?= htmlspecialchars($reg['created_at']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php include 'YCF/footer.php'; ?>
