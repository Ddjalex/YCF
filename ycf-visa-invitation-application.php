<?php 
include 'header.php'; 
require_once 'functions.php';

$package = 'visa_invitation';
$package_names = [
    'visa_invitation' => 'YCF Visa Invitation Application'
];
$package_prices = [
    'visa_invitation' => 147.99
];
$service_charges = [
    'visa_invitation' => 2.00
];
$current_package_name = $package_names['visa_invitation'];
$current_price = $package_prices['visa_invitation'];
$current_service_charge = $service_charges['visa_invitation'];
$total_amount = $current_price + $current_service_charge;
$is_guaranteed = true;
?>

<div class="hero-container" style="padding: 100px 5% 60px; min-height: auto; background: url('attached_assets/germany-0_1767641199459.jpg') center/cover no-repeat fixed;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div id="gf_24">
            <?php 
            require_once 'registration_form.php';
            render_registration_form('visa_invitation', 'YDF Visa Invitation', 147.99); 
            ?>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>