<?php
include 'header.php';

$package = $_GET['package'] ?? 'funded';

// Map legacy or mismatched package names to standard keys
if ($package === 'gf_22' || $package === 'forum_admission') {
    $package = 'forum_admission';
} elseif ($package === 'gf_23' || $package === 'self_funded') {
    $package = 'self_funded';
} elseif ($package === 'gf_24') {
    $package = 'funded';
}

$package_names = [
    'fully_funded' => 'YDF Fully Funded Category Registration',
    'partially_funded' => 'YDF Partially Funded Category Registration',
    'forum_admission' => 'YDF Forum Admission Registration',
    'self_funded' => 'YDF Self Funded Category Registration',
    'funded' => 'YDF Funded Category Registration',
    'visa_letter' => 'YDF Visa Invitation Letter Package Registration'
];

$package_prices = [
    'fully_funded' => 149.99,
    'partially_funded' => 149.99,
    'forum_admission' => 597.00,
    'self_funded' => 697.00,
    'funded' => 149.99,
    'visa_letter' => 149.99
];

$service_charges = [
    'fully_funded' => 0.00,
    'partially_funded' => 0.00,
    'forum_admission' => 2.00,
    'self_funded' => 2.00,
    'funded' => 0.00,
    'visa_letter' => 0.00
];

$current_package_name = $package_names[$package] ?? $package_names['funded'];
$current_price = $package_prices[$package] ?? $package_prices['funded'];
$current_service_charge = $service_charges[$package] ?? $service_charges['funded'];
$total_amount = $current_price + $current_service_charge;

$is_guaranteed = ($package === 'forum_admission' || $package === 'self_funded');

// Multi-step Registration Component
include_once 'YCF/registration_form.php';
?>

<div class="hero-container" style="padding-top: 100px; min-height: auto; background: url('attached_assets/germany-0_1767641199459.jpg') center/cover no-repeat fixed;">
    <div style="background: rgba(45, 35, 110, 0.85); width: 100%; padding: 60px 20px; color: white; text-align: center;">
        <h1 class="montserrat" style="font-size: clamp(2rem, 5vw, 3.5rem); margin-bottom: 20px;">Youth Development Forum 2026<br><?php echo str_replace('YDF ', '', str_replace(' Registration', '', $current_package_name)); ?></h1>
        <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 15px 30px; border-radius: 10px; font-weight: 800; font-size: 1.1rem; max-width: 800px;">
            <?php if ($is_guaranteed): ?>
                Guaranteed Selection for <?php echo str_replace(' Registration', '', $current_package_name); ?>.
            <?php else: ?>
                Apply Once To Be Considered For Both Fully Funded And Partially Funded Seats - No Separate Applications Required.
            <?php endif; ?>
        </div>
        <?php if ($package === 'forum_admission'): ?>
            <div style="margin-top: 20px; font-size: 2.5rem; font-weight: 800; font-family: 'Montserrat', sans-serif;">$499.00</div>
        <?php endif; ?>
    </div>
</div>

<div style="max-width: 1100px; margin: 0 auto; padding: 60px 20px;">
    <div id="intro-section" style="display: flex; flex-wrap: wrap; gap: 40px; align-items: flex-start;">
        <div style="flex: 1; min-width: 300px;">
            <h2 class="montserrat" style="font-size: 2.5rem; color: #2D236E; margin-bottom: 20px;">Ready to Lead the Future?<br>Berlin 2026 Is Calling</h2>
            <p style="font-size: 1.1rem; line-height: 1.8; color: #444; margin-bottom: 20px;">
                You're just a few clicks away from your chance to join (<strong><?php echo str_replace(' Registration', '', $current_package_name); ?></strong>) one of the most exciting youth events of <strong>2026</strong>!
            </p>
            <p style="font-size: 1.1rem; line-height: 1.8; color: #444; margin-bottom: 20px;">
                From <strong>May 7–10, 2026, 200 young changemakers</strong> from across the globe will gather in <strong>Berlin, Germany</strong> for four unforgettable days of bold conversations, interactive learning, leadership development, and cultural experiences. Selection is <strong><?php echo $is_guaranteed ? 'guaranteed' : 'merit-based'; ?></strong>, so bring your best ideas, passion, and story to the table.
            </p>
            <p style="font-size: 1.1rem; line-height: 1.8; color: #444; margin-bottom: 20px;">
                Your journey to the future starts here — let your voice be heard!
            </p>
            <p style="font-size: 1.1rem; line-height: 1.8; color: #444;">
                The application form has three simple parts:<br>
                <strong>1. Basic details</strong><br>
                <strong>2. Personal Details & Motivation</strong><br>
                <strong>3. Application Fee</strong>
            </p>
            
            <div style="display: flex; gap: 20px; margin-top: 40px; flex-wrap: wrap;">
                <div style="background: #2D236E; color: white; padding: 20px; border-radius: 12px; flex: 1; min-width: 200px; display: flex; align-items: center; gap: 15px;">
                    <div style="font-size: 2rem;">📍</div>
                    <div>
                        <div style="font-size: 0.8rem; opacity: 0.8;">Event Location</div>
                        <div style="font-weight: 700; font-size: 1.2rem;">Berlin Germany</div>
                    </div>
                </div>
                <div style="background: #2D236E; color: white; padding: 20px; border-radius: 12px; flex: 1; min-width: 200px; display: flex; align-items: center; gap: 15px;">
                    <div style="font-size: 2rem;">📅</div>
                    <div>
                        <div style="font-size: 0.8rem; opacity: 0.8;">Event Dates</div>
                        <div style="font-weight: 700; font-size: 1.2rem;">7–10 May 2026</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div style="flex: 1; min-width: 300px; text-align: center;">
            <div style="background: #eee; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                 <img src="attached_assets/stock_images/cryptocurrency_block_a66cf05b.jpg" style="width: 100%; height: auto; display: block;">
            </div>
        </div>
    </div>

    <div style="margin-top: 80px;">
        <?php render_registration_form($package, $current_package_name, $current_price); ?>
    </div>
</div>

<?php include 'footer.php'; ?>
