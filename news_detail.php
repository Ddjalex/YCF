<?php
require_once 'functions.php';
include 'header.php';

$id = $_GET['id'] ?? null;
$item = get_news_by_id($id);

if (!$item):
?>
<section style="padding: 10rem 10%; text-align: center;">
    <h2 style="color: var(--dark-blue); font-size: 2.5rem; margin-bottom: 2rem;">News Item Not Found</h2>
    <p style="color: #666; margin-bottom: 3rem;">The news article you are looking for does not exist or has been removed.</p>
    <a href="/" class="btn-custom-animate">Back to Home</a>
</section>
<?php else: ?>
<section class="news-detail" style="padding: 10rem 10% 6rem; background: #fff;">
    <div style="max-width: 900px; margin: 0 auto;">
        <div style="margin-bottom: 3rem;">
            <span style="background: var(--primary-blue); color: white; font-size: 0.8rem; font-weight: 700; padding: 0.4rem 1rem; border-radius: 20px; text-transform: uppercase; margin-right: 1.5rem;"><?php echo $item['category']; ?></span>
            <span style="font-size: 1rem; color: #999;"><?php echo $item['date']; ?></span>
        </div>
        
        <h1 style="color: var(--dark-blue); font-size: 3rem; line-height: 1.2; font-weight: 800; margin-bottom: 2.5rem;"><?php echo $item['title']; ?></h1>
        
        <div style="width: 100%; height: 450px; border-radius: 24px; overflow: hidden; margin-bottom: 3.5rem; box-shadow: 0 20px 50px rgba(0,0,0,0.1);">
            <div style="width: 100%; height: 100%; background-image: url('<?php echo $item['image']; ?>'); background-size: cover; background-position: center;"></div>
        </div>
        
        <div style="font-size: 1.2rem; color: #444; line-height: 1.8; margin-bottom: 4rem;">
            <p style="margin-bottom: 2rem; font-weight: 600; color: #222;"><?php echo $item['summary']; ?></p>
            <div style="white-space: pre-wrap;"><?php echo $item['content']; ?></div>
        </div>
        
        <div style="border-top: 1px solid #eee; padding-top: 3rem; display: flex; justify-content: space-between; align-items: center;">
            <a href="/" class="btn-custom-animate">Back to Home</a>
            <div style="display: flex; gap: 1rem;">
                <span style="color: #999; font-size: 0.9rem;">Share:</span>
                <span style="cursor: pointer; color: var(--primary-blue);">FB</span>
                <span style="cursor: pointer; color: var(--primary-blue);">TW</span>
                <span style="cursor: pointer; color: var(--primary-blue);">LN</span>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php include 'footer.php'; ?>
