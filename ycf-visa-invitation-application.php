<?php 
include 'header.php'; 
require_once 'functions.php';

$package = 'visa_invitation';
$package_names = [
    'visa_invitation' => 'YCF Visa Invitation Application'
];
$package_prices = [
    'visa_invitation' => 99.00
];
$service_charges = [
    'visa_invitation' => 3.00
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
            render_registration_form('visa_invitation', 'YDF Visa Invitation', 99.00); 
            ?>
        </div>
    </div>
</div>

<section style="padding: 60px 5%; background: #fcfcfc; text-align: center;">
    <h2 class="montserrat" style="font-size: 3rem; font-weight: 900; color: #000; margin-bottom: 10px;">Key Themes of YDF 2026</h2>
    <p style="font-size: 1.1rem; color: #444; max-width: 800px; margin: 0 auto;">The sessions, workshops, and dialogues revolve around <strong>cross-cutting global</strong></p>
</section>

<?php include 'footer.php'; ?>