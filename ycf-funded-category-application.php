<?php 
include 'header.php'; 
require_once 'functions.php';

$package = 'funded';
$package_names = [
    'funded' => 'YCF Funded Category Application'
];
$package_prices = [
    'funded' => 16.99
];
$service_charges = [
    'funded' => 0.00
];
$current_package_name = $package_names['funded'];
$current_price = $package_prices['funded'];
$current_service_charge = $service_charges['funded'];
$total_amount = $current_price + $current_service_charge;
$is_guaranteed = false;
?>

<div class="hero-container" style="padding-top: 100px; min-height: auto; background: url('attached_assets/germany-0_1767641199459.jpg') center/cover no-repeat fixed;">
    <div style="background: rgba(45, 35, 110, 0.85); width: 100%; padding: 60px 20px; color: white; text-align: center;">
        <h2 class="montserrat" style="font-size: clamp(1.5rem, 4vw, 2.5rem); margin-bottom: 10px; font-weight: 800; text-transform: uppercase;">Scholarship Categories</h2>
        <h3 class="montserrat" style="font-size: clamp(1.1rem, 3vw, 1.8rem); margin-bottom: 20px; font-weight: 700;">(Competitive Selection)</h3>
        
        <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); padding: 25px; border-radius: 15px; max-width: 900px; margin: 0 auto 40px; border: 1px solid rgba(255, 255, 255, 0.2);">
            <p style="font-size: 1.1rem; line-height: 1.6; color: white; margin-bottom: 0;">
                These are <em>funded</em> categories offered to outstanding applicants based on merit, motivation, and global representation. The <strong>Fully Funded</strong> and <strong>Partially Funded</strong> categories share one unified application form.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; max-width: 1100px; margin: 0 auto;">
            <!-- Fully Funded -->
            <div style="background: #2D236E; border-radius: 20px; padding: 40px 30px; border: 1px solid rgba(255, 255, 255, 0.1); position: relative; overflow: hidden;">
                <div style="font-size: 2.2rem; font-weight: 800; margin-bottom: 10px;">$16.99</div>
                <h3 class="montserrat" style="font-size: 1.8rem; font-weight: 900; margin-bottom: 25px; text-transform: uppercase;">Fully Funded Category</h3>
                
                <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 20px; text-align: left;">
                    <h4 style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                    <p style="font-size: 0.9rem; opacity: 0.9; margin-bottom: 20px; line-height: 1.5;">Participants selected under the Fully Funded category receive a complete scholarship package that covers:</p>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.9rem; line-height: 1.8;">
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">✈️</span> Round-trip airfare to Berlin, Germany</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🏨</span> Accommodation in a premium 4-star hotel (3 nights, 4 days)</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🍽️</span> Daily meals & breakfast</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🔑</span> Full access to all conference sessions, workshops, and activities</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">☀️</span> Certificate of Participation issued by the Center for Global Dialogue & Leadership (CGDL)</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🎒</span> Delegate kit including conference materials</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🗺️</span> Guided city tour of Berlin, covering historical sites, diplomacy landmarks, and lessons from global conflict & peacebuilding</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🛂</span> Comprehensive visa support, including visa support letter</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🤝</span> Participation in cultural exchange sessions and networking events</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🔊</span> Opportunity to engage with global speakers, experts, and youth leaders</li>
                    </ul>
                </div>
            </div>

            <!-- Partially Funded -->
            <div style="background: #2D236E; border-radius: 20px; padding: 40px 30px; border: 1px solid rgba(255, 255, 255, 0.1); position: relative; overflow: hidden;">
                <div style="font-size: 2.2rem; font-weight: 800; margin-bottom: 10px;">$16.99</div>
                <h3 class="montserrat" style="font-size: 1.8rem; font-weight: 900; margin-bottom: 25px; text-transform: uppercase;">Partially Funded Category</h3>
                
                <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 20px; text-align: left;">
                    <h4 style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                    <p style="font-size: 0.9rem; opacity: 0.9; margin-bottom: 20px; line-height: 1.5;">Participants selected for the Partially Funded category receive significant subsidization and will be provided:</p>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.9rem; line-height: 1.8;">
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🔑</span> Full access to all conference sessions, workshops, and activities</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🏨</span> Accommodation in a premium 4-star hotel (3 nights, 4 days)</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🍽️</span> Meals & breakfast throughout the forum</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">📜</span> Certificate of Participation from CGDL</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🎒</span> Delegate kit including conference materials</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🗺️</span> Guided city tour of Berlin focusing on history, diplomacy, and global youth leadership</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🛂</span> Comprehensive visa support, including an official visa support letter</li>
                        <li style="margin-bottom: 10px; display: flex; gap: 10px;"><span style="color: #FFD700;">🤝</span> Participation in cultural & networking activities</li>
                    </ul>
                    <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); margin: 20px 0; padding-top: 10px;">
                        <h4 style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; text-align: center; color: rgba(255, 255, 255, 0.7);">Not Included</h4>
                        <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.9rem;">
                            <li style="display: flex; gap: 10px;"><span style="color: #FFD700;">✈️</span> Airfare</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top: 50px;">
            <a href="#" class="btn-custom-animate" style="background: linear-gradient(to bottom, #8B6914, #000); color: white; padding: 18px 80px; text-decoration: none; border-radius: 12px; font-weight: 800; display: inline-block; font-size: 1.2rem; border: 1px solid rgba(255,215,0,0.3); text-transform: uppercase;">Apply Now!</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>