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
        <h2 class="montserrat" style="font-size: clamp(1.5rem, 4vw, 2.5rem); margin-bottom: 10px; font-weight: 800; text-transform: uppercase;">Guaranteed Categories</h2>
        <h3 class="montserrat" style="font-size: clamp(1.1rem, 3vw, 1.8rem); margin-bottom: 20px; font-weight: 700;">(Confirmed Seats)</h3>
        
        <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); padding: 25px; border-radius: 15px; max-width: 900px; margin: 0 auto 40px; border: 1px solid rgba(255, 255, 255, 0.2);">
            <p style="font-size: 1.1rem; line-height: 1.6; color: white; margin-bottom: 0;">
                These categories offer guaranteed participation with no competitive selection. Applicants secure their seat upon completing their registration.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; max-width: 1100px; margin: 0 auto;" id="package-details-grid">
            <!-- Forum Admission Category -->
            <div style="background: #2D236E; border-radius: 20px; padding: 40px 30px; border: 1px solid rgba(255, 255, 255, 0.1); position: relative; overflow: hidden;">
                <div style="font-size: 1.2rem; opacity: 0.7; text-decoration: line-through; margin-bottom: 5px;">$799.99</div>
                <div style="font-size: 2.2rem; font-weight: 800; margin-bottom: 10px;">$499.00</div>
                <h3 class="montserrat" style="font-size: 1.8rem; font-weight: 900; margin-bottom: 25px; text-transform: uppercase;">Forum Admission Category</h3>
                
                <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 20px; text-align: left;">
                    <h4 style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                    <p style="font-size: 0.9rem; opacity: 0.9; margin-bottom: 20px; line-height: 1.5;">Forum Admission is ideal for participants seeking guaranteed entry without accommodation support. It includes:</p>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.9rem; line-height: 1.8;">
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">✅</span> Guaranteed participation at the Youth Development Forum 2026</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🎟️</span> Access to all conference sessions & workshops</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">📜</span> Certificate of Participation from CGDL</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🎒</span> Delegate kit & conference materials</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🏛️</span> Guided city tour of Berlin (historical + diplomatic insights)</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🛂</span> Comprehensive visa support, including visa support letter</li>
                    </ul>
                    <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); margin: 20px 0; padding-top: 10px;">
                        <h4 style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; text-align: center; color: rgba(255, 255, 255, 0.7);">Not Included</h4>
                        <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.9rem; line-height: 1.8;">
                            <li style="display: flex; gap: 10px;"><span style="color: #FFD700;">✈️</span> Airfare</li>
                            <li style="display: flex; gap: 10px;"><span style="color: #FFD700;">🏨</span> Accommodation</li>
                        </ul>
                    </div>
                </div>
                <div style="margin-top: 30px;">
                    <a href="ycf-forum-admission-application.php" class="btn-custom-animate" style="background: linear-gradient(to bottom, #8B6914, #000); color: white; padding: 15px 40px; text-decoration: none; border-radius: 10px; font-weight: 800; display: block; font-size: 1.1rem; border: 1px solid rgba(255,215,0,0.3); text-transform: uppercase;">Register NOW!</a>
                </div>
            </div>

            <!-- Self-Funded Category -->
            <div style="background: #2D236E; border-radius: 20px; padding: 40px 30px; border: 1px solid rgba(255, 255, 255, 0.1); position: relative; overflow: hidden;">
                <div style="font-size: 1.2rem; opacity: 0.7; text-decoration: line-through; margin-bottom: 5px;">$999.99</div>
                <div style="font-size: 2.2rem; font-weight: 800; margin-bottom: 10px;">$799.00</div>
                <h3 class="montserrat" style="font-size: 1.8rem; font-weight: 900; margin-bottom: 25px; text-transform: uppercase;">Self-Funded Category</h3>
                
                <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 20px; text-align: left;">
                    <h4 style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                    <p style="font-size: 0.9rem; opacity: 0.9; margin-bottom: 20px; line-height: 1.5;">The Self-Funded category is an upgraded guaranteed option designed for those who prefer a package that includes accommodation. It includes:</p>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.9rem; line-height: 1.8;">
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">✅</span> Guaranteed participation with priority confirmation</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🏨</span> Accommodation in a premium 4-star hotel (3 nights, 4 days)</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🍽️</span> Meals & breakfast</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🔑</span> Access to all conference sessions & workshops</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">📜</span> Certificate of Participation from CGDL</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🎒</span> Delegate kit & materials</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🗺️</span> Guided city tour of Berlin</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🛂</span> Comprehensive visa support, including visa support letter</li>
                    </ul>
                    <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); margin: 20px 0; padding-top: 10px;">
                        <h4 style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; text-align: center; color: rgba(255, 255, 255, 0.7);">Not Included</h4>
                        <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.9rem; line-height: 1.8;">
                            <li style="display: flex; gap: 10px;"><span style="color: #FFD700;">✈️</span> Airfare</li>
                        </ul>
                    </div>
                </div>
                <div style="margin-top: 30px;" id="gf_23">
                    <?php 
                    require_once 'registration_form.php';
                    render_registration_form('self_funded', 'YDF Self Funded', 799.00); 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>