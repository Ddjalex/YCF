<?php 
include 'header.php'; 
require_once 'functions.php';

$package = 'self_funded';
$package_names = [
    'self_funded' => 'YCF Self Funded Application'
];
$package_prices = [
    'self_funded' => 799.00
];
$service_charges = [
    'self_funded' => 3.00
];
$current_package_name = $package_names['self_funded'];
$current_price = $package_prices['self_funded'];
$current_service_charge = $service_charges['self_funded'];
$total_amount = $current_price + $current_service_charge;
$is_guaranteed = true;
?>

<div class="hero-container" style="padding-top: 100px; min-height: auto; background: url('attached_assets/germany-0_1767641199459.jpg') center/cover no-repeat fixed;">
    <div style="background: rgba(45, 35, 110, 0.85); width: 100%; padding: 60px 20px; color: white; text-align: center;">
        <h2 class="montserrat" style="font-size: clamp(1.5rem, 4vw, 2.5rem); margin-bottom: 10px; font-weight: 800; text-transform: uppercase;">Guaranteed Categories</h2>
        <h3 class="montserrat" style="font-size: clamp(1.1rem, 3vw, 1.8rem); margin-bottom: 20px; font-weight: 700;">(Confirmed Seats)</h3>
        
        <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); padding: 25px; border-radius: 15px; max-width: 900px; margin: 0 auto 40px; border: 1px solid rgba(255, 255, 255, 0.2);">
            <p style="font-size: 1.1rem; line-height: 1.6; color: white; margin-bottom: 0;">
                These categories offer guaranteed participation with no competitive selection. Applicants secure their seat upon completing their registration.
            </p>
        </div>

        <div style="margin-top: 50px;" id="gf_23">
            <?php 
            require_once 'registration_form.php';
            render_registration_form('self_funded', 'YDF Self Funded', 799.00); 
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>