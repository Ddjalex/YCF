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
    'self_funded' => 0.00
];
$current_package_name = $package_names['self_funded'];
$current_price = $package_prices['self_funded'];
$current_service_charge = $service_charges['self_funded'];
$total_amount = $current_price + $current_service_charge;
$is_guaranteed = true;
?>

<div class="hero-container" style="padding-top: 100px; min-height: auto; background: url('attached_assets/germany-0_1767641199459.jpg') center/cover no-repeat fixed;">
    <div style="background: rgba(45, 35, 110, 0.85); width: 100%; padding: 60px 20px; color: white; text-align: center;">
        <h1 class="montserrat" style="font-size: clamp(2rem, 5vw, 3.5rem); margin-bottom: 20px;">Youth Crypto Forum 2026<br>Self Funded</h1>
        <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 15px 30px; border-radius: 10px; font-weight: 800; font-size: 1.1rem; max-width: 800px;">
            Guaranteed Selection for Self Funded Participation.
        </div>
        <div style="margin-top: 20px; font-size: 2.5rem; font-weight: 800; font-family: 'Montserrat', sans-serif;">$799.00</div>
    </div>
</div>

<div style="max-width: 1100px; margin: 0 auto; padding: 60px 20px;">
    <div style="background: white; border-radius: 20px; padding: 40px; box-shadow: 0 15px 50px rgba(0,0,0,0.05); border: 1px solid #eee;">
        <h2 class="montserrat" style="font-size: 2rem; color: #2D236E; margin-bottom: 20px;">Self Funded Registration</h2>
        <p style="font-size: 1.1rem; line-height: 1.8; color: #444; margin-bottom: 30px;">
            The self-funded package includes accommodation, forum access, and guided cultural tours in Berlin.
        </p>
        <a href="#" class="btn-custom-animate" style="background: var(--primary-blue); color: white; padding: 15px 40px; text-decoration: none; border-radius: 8px; font-weight: 700; display: inline-block;">Start Registration</a>
    </div>
</div>

<?php include 'footer.php'; ?>