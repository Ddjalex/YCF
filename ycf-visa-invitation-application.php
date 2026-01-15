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
    'visa_invitation' => 0.00
];
$current_package_name = $package_names['visa_invitation'];
$current_price = $package_prices['visa_invitation'];
$current_service_charge = $service_charges['visa_invitation'];
$total_amount = $current_price + $current_service_charge;
$is_guaranteed = true;
?>

<div class="hero-container" style="padding: 100px 5% 60px; min-height: auto; background: url('attached_assets/germany-0_1767641199459.jpg') center/cover no-repeat fixed;">
    <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; align-items: center;">
        
        <!-- Info Card -->
        <div style="background: #2D236E; border-radius: 20px; padding: 40px; color: white; border: 1px solid rgba(255, 255, 255, 0.1); box-shadow: 0 20px 50px rgba(0,0,0,0.3);" id="package-details-grid">
            <h1 class="montserrat" style="font-size: 2.5rem; font-weight: 900; margin-bottom: 20px; text-transform: uppercase;">Visa Invitation Letter</h1>
            <p style="font-size: 1.1rem; opacity: 0.9; line-height: 1.6; margin-bottom: 25px;">
                Applicants who want to apply early for their visa can request a <strong>Visa Invitation Letter Package</strong> from CGDL.
            </p>
            
            <div style="margin-bottom: 30px;">
                <span style="font-size: 1.3rem; opacity: 0.7; text-decoration: line-through; margin-right: 15px;">$299.99</span>
                <span style="font-size: 2.5rem; font-weight: 900; color: white;">$99.00</span>
            </div>
            
            <ul style="list-style: none; padding: 0; margin: 0 0 30px 0; font-size: 1rem; line-height: 2;">
                <li style="display: flex; gap: 12px; align-items: center;"><span style="color: #FFD700;">🛂</span> Official Visa Invitation Letter</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="color: #FFD700;">📄</span> Visa Documents Checklist</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="color: #FFD700;">✅</span> Confirmation of Event Participation</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="color: #FFD700;">🤝</span> Embassy Coordination Assistance</li>
            </ul>
            
            <div style="background: rgba(255, 255, 255, 0.05); border-left: 4px solid #FFD700; padding: 20px; border-radius: 0 10px 10px 0; margin-bottom: 35px;">
                <p style="font-size: 0.95rem; line-height: 1.5; margin: 0;">
                    This option is available to all categories of applicants. Applicants can later upgrade to either forum admission or self funded and the cost of their visa package will be fully adjusted towards the upgrade.
                </p>
            </div>
            
            <div id="gf_24">
                <?php 
                require_once 'registration_form.php';
                render_registration_form('visa_invitation', 'YDF Visa Invitation', 99.00); 
                ?>
            </div>
        </div>
        
        <!-- Image Card -->
        <div style="position: relative;">
            <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.2);">
                <img src="attached_assets/germany-0_1767641199459.jpg" alt="Berlin Brandenburg Gate" style="width: 100%; height: 400px; object-fit: cover;">
                <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(45, 35, 110, 0.95)); padding: 40px 20px; color: white; text-align: center;">
                    <h2 class="montserrat" style="font-size: 2rem; font-weight: 900; letter-spacing: 2px;">SUM / VISA</h2>
                    <p style="font-size: 0.9rem; opacity: 0.8; text-transform: uppercase; letter-spacing: 1px;">Berlin, Germany</p>
                </div>
            </div>
        </div>
        
    </div>
</div>

<section style="padding: 60px 5%; background: #fcfcfc; text-align: center;">
    <h2 class="montserrat" style="font-size: 3rem; font-weight: 900; color: #000; margin-bottom: 10px;">Key Themes of YDF 2026</h2>
    <p style="font-size: 1.1rem; color: #444; max-width: 800px; margin: 0 auto;">The sessions, workshops, and dialogues revolve around <strong>cross-cutting global</strong></p>
</section>

<?php include 'footer.php'; ?>