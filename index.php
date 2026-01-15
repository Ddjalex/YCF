<?php 
include 'header.php'; 
require_once 'functions.php';

// Fetch dynamic data
$news = get_latest_news();
$hero_video = get_hero_video();

if (isset($_GET['page'])) {
    // Handle pages if needed
} else {
?>
<section class="hero-container" style="padding: clamp(80px, 15vh, 160px) 20px 60px; text-align: center;">
    <h1 class="hero-title image-text-mask" style="font-size: clamp(3rem, 12vw, 10rem); font-family: Montserrat, sans-serif; font-weight: 900;">YOUTH CRYPTO</h1>
    <h2 class="hero-subtitle image-text-mask" style="font-size: clamp(1.2rem, 5vw, 3.5rem); font-family: Montserrat, sans-serif; font-weight: 800;">Forum Germany 2026</h2>
    <p class="hero-description" style="margin: 20px auto; max-width: 800px; color: var(--text-gray); font-size: clamp(0.9rem, 2vw, 1.25rem);">Shaping the Future of Digital Economy & Blockchain Technology. June 15–17, 2026 · Berlin, Germany</p>
    
    <div class="video-container" style="width: 100%; max-width: 1100px; aspect-ratio: 16/9; height: auto; border-radius: clamp(15px, 5vw, 60px); overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.15); background: #000; margin: 0 auto 40px; position: relative; border: 1px solid rgba(255,255,255,0.1);">
        <?php 
        if (strpos($hero_video, 'http') !== 0 && strpos($hero_video, '/') !== 0 && strpos($hero_video, 'attached_assets') !== 0 && strpos($hero_video, 'uploads/') !== 0) {
            $hero_video = '/' . $hero_video;
        }
        ?>
        <video src="<?php echo htmlspecialchars($hero_video); ?>" autoplay loop muted playsinline style="width: 100%; height: 100%; object-fit: cover; pointer-events: none;"></video>
    </div>

    <div class="countdown-wrapper" style="background: #f8f9fa; border-radius: 12px; padding: 10px; display: flex; flex-wrap: wrap; align-items: center; justify-content: center; box-shadow: 0 10px 40px rgba(0,0,0,0.05); width: fit-content; max-width: 95%; margin: 0 auto; min-height: 60px; border: 1px solid #eee; gap: 10px;">
        <div style="background: #00aeef; padding: 10px 1.5rem; height: auto; display: flex; align-items: center; border-radius: 8px;">
            <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: white; line-height: 1.1; white-space: nowrap;">Starts in:</span>
        </div>
        
        <div id="countdown" style="display: flex; gap: 1rem; align-items: center; padding: 10px; color: #333; font-family: Inter, Arial, sans-serif; flex-wrap: wrap; justify-content: center;">
            <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 4px;">
                <span id="days" style="display: block; font-size: clamp(1.2rem, 3vw, 1.5rem); font-weight: 700; line-height: 1;">00</span>
                <span style="text-transform: uppercase; font-size: 0.65rem; font-weight: 600; color: #999;">d</span>
            </div>
            <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 4px;">
                <span id="hours" style="display: block; font-size: clamp(1.2rem, 3vw, 1.5rem); font-weight: 700; line-height: 1;">00</span>
                <span style="text-transform: uppercase; font-size: 0.65rem; font-weight: 600; color: #999;">h</span>
            </div>
            <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 4px;">
                <span id="minutes" style="display: block; font-size: clamp(1.2rem, 3vw, 1.5rem); font-weight: 700; line-height: 1;">00</span>
                <span style="text-transform: uppercase; font-size: 0.65rem; font-weight: 600; color: #999;">m</span>
            </div>
            <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 4px;">
                <span id="seconds" style="display: block; font-size: clamp(1.2rem, 3vw, 1.5rem); font-weight: 700; line-height: 1;">00</span>
                <span style="text-transform: uppercase; font-size: 0.65rem; font-weight: 600; color: #999;">s</span>
            </div>
        </div>
        
        <a href="#packages" class="btn-custom-animate" style="padding: 10px 20px; font-size: 0.9rem; background: var(--primary-blue); color: white; text-decoration: none; border-radius: 8px; font-weight: 600;">Register Now</a>
    </div>
</section>

<section id="packages" class="participation-seats" style="padding: 4rem 5%; background: #fcfcfc; text-align: center;">
    <h2 class="montserrat" style="font-size: clamp(1.8rem, 5vw, 2.8rem); color: #000; font-weight: 900; margin-bottom: 1rem; text-transform: uppercase; font-family: Montserrat, sans-serif;">Total Participation Seats: 200</h2>
    <p style="font-size: 1.1rem; color: #333; margin-bottom: 3.5rem; font-family: Inter, sans-serif;">CGDL is offering <strong>200 seats</strong> for the Youth Crypto Forum 2026:</p>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 2rem; max-width: 1200px; margin: 0 auto;">
        <div class="seat-card" style="background: #2D236E; border-radius: 16px; padding: 2.5rem 1rem; border-bottom: 6px solid #FFD700; text-decoration: none; display: block; box-shadow: 0 10px 30px rgba(45, 35, 110, 0.1);">
            <h3 class="montserrat" style="color: white; font-size: 1.2rem; font-weight: 800; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 0.5px;">Fully Funded</h3>
            <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.6rem 1.8rem; border-radius: 10px; font-weight: 900; font-size: 1.1rem; margin-bottom: 1rem; box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);">30 Seats</div>
            <div style="color: rgba(255, 255, 255, 0.9); font-size: 0.95rem; font-weight: 600; font-family: Inter, sans-serif;">Competitive Selection</div>
        </div>
        <div class="seat-card" style="background: #2D236E; border-radius: 16px; padding: 2.5rem 1rem; border-bottom: 6px solid #FFD700; text-decoration: none; display: block; box-shadow: 0 10px 30px rgba(45, 35, 110, 0.1);">
            <h3 class="montserrat" style="color: white; font-size: 1.2rem; font-weight: 800; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 0.5px;">Partially Funded</h3>
            <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.6rem 1.8rem; border-radius: 10px; font-weight: 900; font-size: 1.1rem; margin-bottom: 1rem; box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);">50 Seats</div>
            <div style="color: rgba(255, 255, 255, 0.9); font-size: 0.95rem; font-weight: 600; font-family: Inter, sans-serif;">Competitive Selection</div>
        </div>
        <div class="seat-card" style="background: #2D236E; border-radius: 16px; padding: 2.5rem 1rem; border-bottom: 6px solid #FFD700; text-decoration: none; display: block; box-shadow: 0 10px 30px rgba(45, 35, 110, 0.1);">
            <h3 class="montserrat" style="color: white; font-size: 1.2rem; font-weight: 800; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 0.5px;">Forum Admission</h3>
            <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.6rem 1.8rem; border-radius: 10px; font-weight: 900; font-size: 1.1rem; margin-bottom: 1rem; box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);">40 Seats</div>
            <div style="color: rgba(255, 255, 255, 0.9); font-size: 0.95rem; font-weight: 600; font-family: Inter, sans-serif;">Guaranteed Selection</div>
        </div>
        <div class="seat-card" style="background: #2D236E; border-radius: 16px; padding: 2.5rem 1rem; border-bottom: 6px solid #FFD700; text-decoration: none; display: block; box-shadow: 0 10px 30px rgba(45, 35, 110, 0.1);">
            <h3 class="montserrat" style="color: white; font-size: 1.2rem; font-weight: 800; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 0.5px;">Self Funded</h3>
            <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.6rem 1.8rem; border-radius: 10px; font-weight: 900; font-size: 1.1rem; margin-bottom: 1rem; box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);">80 Seats</div>
            <div style="color: rgba(255, 255, 255, 0.9); font-size: 0.95rem; font-weight: 600; font-family: Inter, sans-serif;">Guaranteed Selection</div>
        </div>
    </div>
</section>

<!-- Scholarship Categories Section -->
<section style="background: url('attached_assets/germany-0_1767641199459.jpg') center/cover no-repeat fixed; color: white; text-align: center; position: relative;">
    <div style="background: rgba(45, 35, 110, 0.85); width: 100%; padding: 80px 20px;">
        <div style="background: #2D236E; border-radius: 15px; padding: 25px; max-width: 800px; margin: 0 auto 40px; border: 1px solid rgba(255, 255, 255, 0.1);">
            <h2 class="montserrat" style="font-size: clamp(1.5rem, 4vw, 2.5rem); margin-bottom: 10px; font-weight: 800; text-transform: uppercase;">Scholarship Categories</h2>
            <h3 class="montserrat" style="font-size: clamp(1.1rem, 3vw, 1.8rem); margin-bottom: 15px; font-weight: 700;">(Competitive Selection)</h3>
            <p style="font-size: 1.05rem; line-height: 1.6; color: white; margin-bottom: 0;">
                These are <em>funded</em> categories offered to outstanding applicants based on merit, motivation, and global representation. The <strong>Fully Funded</strong> and <strong>Partially Funded</strong> categories share one unified application form.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; max-width: 1100px; margin: 0 auto 50px;">
            <!-- Fully Funded Detail -->
            <div style="background: #2D236E; border-radius: 20px; padding: 40px 30px; border: 1px solid rgba(255, 255, 255, 0.1); text-align: left;">
                <div style="font-size: 2.2rem; font-weight: 800; margin-bottom: 10px; text-align: center;">$16.99</div>
                <h3 class="montserrat" style="font-size: 1.8rem; font-weight: 900; margin-bottom: 25px; text-transform: uppercase; text-align: center;">Fully Funded Category</h3>
                <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 20px;">
                    <h4 style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                    <p style="font-size: 0.85rem; opacity: 0.9; margin-bottom: 20px; line-height: 1.5;">Participants selected under the Fully Funded category receive a complete scholarship package that covers:</p>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.85rem; line-height: 1.8;">
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">✈️</span> Round-trip airfare to Berlin, Germany</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🏨</span> Accommodation in a premium 4-star hotel (3 nights, 4 days)</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🍽️</span> Daily meals & breakfast</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🔑</span> Full access to all conference sessions, workshops, and activities</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🛂</span> Comprehensive visa support</li>
                    </ul>
                </div>
            </div>

            <!-- Partially Funded Detail -->
            <div style="background: #2D236E; border-radius: 20px; padding: 40px 30px; border: 1px solid rgba(255, 255, 255, 0.1); text-align: left;">
                <div style="font-size: 2.2rem; font-weight: 800; margin-bottom: 10px; text-align: center;">$16.99</div>
                <h3 class="montserrat" style="font-size: 1.8rem; font-weight: 900; margin-bottom: 25px; text-transform: uppercase; text-align: center;">Partially Funded Category</h3>
                <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 20px;">
                    <h4 style="font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 20px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                    <p style="font-size: 0.85rem; opacity: 0.9; margin-bottom: 20px; line-height: 1.5;">Participants selected for the Partially Funded category receive significant subsidization and will be provided:</p>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.85rem; line-height: 1.8;">
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🔑</span> Full access to all conference sessions & workshops</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🏨</span> Accommodation in a premium 4-star hotel</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🍽️</span> Meals & breakfast</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">📜</span> Certificate of Participation from CGDL</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🛂</span> Visa support letter</li>
                    </ul>
                </div>
            </div>
        </div>

        <a href="ycf-funded-category-application.php" class="btn-custom-animate" style="background: linear-gradient(to bottom, #8B6914, #000); color: white; padding: 18px 80px; text-decoration: none; border-radius: 12px; font-weight: 800; display: inline-block; font-size: 1.2rem; border: 1px solid rgba(255,215,0,0.3); text-transform: uppercase;">Apply Now!</a>
    </div>
</section>

<!-- Guaranteed Categories Section -->
<section style="background: #fff; padding: 80px 20px; text-align: center;">
    <div style="background: #2D236E; border-radius: 15px; padding: 25px; max-width: 800px; margin: 0 auto 40px; border: 1px solid rgba(0,0,0,0.05); color: white;">
        <h2 class="montserrat" style="font-size: clamp(1.5rem, 4vw, 2.5rem); margin-bottom: 10px; font-weight: 800; text-transform: uppercase;">Guaranteed Categories</h2>
        <h3 class="montserrat" style="font-size: clamp(1.1rem, 3vw, 1.8rem); margin-bottom: 15px; font-weight: 700;">(Confirmed Seats)</h3>
        <p style="font-size: 1.05rem; line-height: 1.6; opacity: 0.9; margin-bottom: 0;">
            These categories offer guaranteed participation with no competitive selection. Applicants secure their seat upon completing their registration.
        </p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; max-width: 1100px; margin: 0 auto 50px;">
        <!-- Forum Admission Detail -->
        <div style="background: #2D236E; border-radius: 20px; padding: 40px 30px; color: white; text-align: left;">
            <div style="font-size: 1.1rem; opacity: 0.7; text-decoration: line-through; margin-bottom: 5px; text-align: center;">$799.99</div>
            <div style="font-size: 2.2rem; font-weight: 800; margin-bottom: 10px; text-align: center;">$499.00</div>
            <h3 class="montserrat" style="font-size: 1.6rem; font-weight: 900; margin-bottom: 25px; text-transform: uppercase; text-align: center;">Forum Admission Category</h3>
            <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 20px;">
                <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.85rem; line-height: 1.8;">
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">✅</span> Guaranteed participation at YDF 2026</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🎟️</span> Access to all conference sessions & workshops</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">📜</span> Certificate of Participation from CGDL</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px; color: #ff9f9f;"><span style="color: #FFD700;">❌</span> No Accommodation included</li>
                </ul>
            </div>
            <div style="margin-top: 30px; text-align: center;">
                <a href="ycf-forum-admission-application.php" class="btn-custom-animate" style="background: linear-gradient(to bottom, #8B6914, #000); color: white; padding: 15px 40px; text-decoration: none; border-radius: 10px; font-weight: 800; display: block; font-size: 1rem; border: 1px solid rgba(255,215,0,0.3); text-transform: uppercase;">Register NOW!</a>
            </div>
        </div>

        <!-- Self-Funded Detail -->
        <div style="background: #2D236E; border-radius: 20px; padding: 40px 30px; color: white; text-align: left;">
            <div style="font-size: 1.1rem; opacity: 0.7; text-decoration: line-through; margin-bottom: 5px; text-align: center;">$999.99</div>
            <div style="font-size: 2.2rem; font-weight: 800; margin-bottom: 10px; text-align: center;">$799.00</div>
            <h3 class="montserrat" style="font-size: 1.6rem; font-weight: 900; margin-bottom: 25px; text-transform: uppercase; text-align: center;">Self-Funded Category</h3>
            <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 20px;">
                <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.85rem; line-height: 1.8;">
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">✅</span> Guaranteed participation with priority confirmation</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🏨</span> Accommodation in premium 4-star hotel</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🍽️</span> All meals & breakfast included</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">📜</span> Certificate of Participation from CGDL</li>
                </ul>
            </div>
            <div style="margin-top: 30px; text-align: center;">
                <a href="ycf-self-funded-application.php" class="btn-custom-animate" style="background: linear-gradient(to bottom, #8B6914, #000); color: white; padding: 15px 40px; text-decoration: none; border-radius: 10px; font-weight: 800; display: block; font-size: 1rem; border: 1px solid rgba(255,215,0,0.3); text-transform: uppercase;">Register NOW!</a>
            </div>
        </div>
    </div>
</section>

<!-- Visa Invitation Section -->
<section style="background: #f8f9fa; padding: 80px 5%; position: relative; overflow: hidden;">
    <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; align-items: center;">
        <div style="background: #2D236E; border-radius: 20px; padding: 40px; color: white; box-shadow: 0 20px 50px rgba(0,0,0,0.2);">
            <h1 class="montserrat" style="font-size: 2.2rem; font-weight: 900; margin-bottom: 20px; text-transform: uppercase;">Visa Invitation Letter</h1>
            <p style="font-size: 1rem; opacity: 0.9; line-height: 1.6; margin-bottom: 25px;">
                Applicants who want to apply early for their visa can request a <strong>Visa Invitation Letter Package</strong> from CGDL.
            </p>
            <div style="margin-bottom: 30px;">
                <span style="font-size: 1.2rem; opacity: 0.7; text-decoration: line-through; margin-right: 15px;">$299.99</span>
                <span style="font-size: 2.2rem; font-weight: 900;">$99.00</span>
            </div>
            <ul style="list-style: none; padding: 0; margin: 0 0 30px 0; font-size: 0.9rem; line-height: 2;">
                <li style="display: flex; gap: 12px;"><span style="color: #FFD700;">🛂</span> Official Visa Invitation Letter</li>
                <li style="display: flex; gap: 12px;"><span style="color: #FFD700;">📄</span> Visa Documents Checklist</li>
                <li style="display: flex; gap: 12px;"><span style="color: #FFD700;">✅</span> Confirmation of Event Participation</li>
            </ul>
            <a href="ycf-visa-invitation-application.php" class="btn-custom-animate" style="background: linear-gradient(to bottom, #8B6914, #000); color: white; padding: 15px 0; text-decoration: none; border-radius: 12px; font-weight: 800; display: block; text-align: center; font-size: 1.1rem; border: 1px solid rgba(255,215,0,0.3); text-transform: uppercase;">Register NOW!</a>
        </div>
        <div style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.1); height: 100%; min-height: 400px; position: relative;">
            <img src="attached_assets/germany-0_1767641199459.jpg" alt="Berlin" style="width: 100%; height: 100%; object-fit: cover;">
            <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(45, 35, 110, 0.9)); padding: 40px 20px; color: white; text-align: center;">
                <h2 class="montserrat" style="font-size: 2.5rem; font-weight: 900; letter-spacing: 5px;">SUM / VISA</h2>
            </div>
        </div>
    </div>
</section>

<section class="news" style="padding: 4rem 5%; background: #fcfcfc;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 15px;">
        <h2 style="color: var(--dark-blue); font-size: clamp(1.5rem, 4vw, 2rem); font-weight: 700; margin: 0; font-family: Montserrat, sans-serif;">LATEST NEWS</h2>
        <a href="#" style="color: var(--primary-blue); font-weight: 600; text-decoration: none;">View all &rsaquo;</a>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem;">
        <?php foreach ($news as $item): ?>
            <div class="news-card" style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;">
                <div style="height: 200px; background: #eee; background-image: url('<?php echo $item['image']; ?>'); background-size: cover; background-position: center;"></div>
                <div style="padding: 1.5rem;">
                    <div style="display: flex; align-items: center; margin-bottom: 1rem; flex-wrap: wrap; gap: 10px;">
                        <span style="background: var(--primary-blue); color: white; font-size: 0.7rem; font-weight: 700; padding: 0.3rem 0.8rem; border-radius: 20px; text-transform: uppercase;"><?php echo htmlspecialchars($item['category']); ?></span>
                        <span style="font-size: 0.85rem; color: #999;"><?php echo htmlspecialchars($item['date']); ?></span>
                    </div>
                    <h3 style="color: var(--dark-blue); margin: 0 0 1rem; font-size: 1.15rem; line-height: 1.3; height: 3rem; overflow: hidden;"><?php echo htmlspecialchars($item['title']); ?></h3>
                    <p style="font-size: 0.9rem; color: #666; margin-bottom: 1.5rem; height: 4rem; overflow: hidden;"><?php echo htmlspecialchars($item['summary']); ?></p>
                    <a href="news_detail.php?id=<?php echo $item['id']; ?>" class="btn-custom-animate" style="font-size: 0.8rem; padding: 8px 20px; background: var(--dark-blue); color: white; text-decoration: none; border-radius: 6px; display: inline-block;">Read More &rarr;</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="agenda" style="padding: 4rem 5%; background-image: linear-gradient(rgba(0, 51, 102, 0.85), rgba(0, 51, 102, 0.85)), url('attached_assets/1_Rs5tF_ifkt8I99W5BZyBKw_1767637840250.jpg'); background-size: cover; background-position: center; background-attachment: fixed; color: white;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem; flex-wrap: wrap; gap: 15px;">
        <h2 style="color: white; font-size: clamp(1.8rem, 5vw, 2.5rem); font-weight: 800; letter-spacing: 1px; margin: 0; font-family: Montserrat, sans-serif;">AGENDA</h2>
        <a href="#" class="btn-custom-animate" style="font-size: 0.8rem; padding: 8px 20px; background: rgba(255,255,255,0.2); color: white; text-decoration: none; border-radius: 6px;">View all &rsaquo;</a>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
        <div class="agenda-day" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 20px; padding: 2rem; border: 1px solid rgba(255, 255, 255, 0.2);">
            <div style="display: flex; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 10px;">
                <span style="background: var(--primary-blue); color: white; padding: 0.4rem 1rem; border-radius: 20px; font-weight: 700; font-size: 0.85rem;">Day 1</span>
                <span style="font-weight: 600; color: rgba(255, 255, 255, 0.8); font-size: 1rem;">2026-06-15</span>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1.2rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.85rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.3rem;">09:00 - 10:10</div>
                    <div style="color: #333; font-size: 1rem; font-weight: 600; line-height: 1.4;">Opening Keynote: The Crypto Landscape in 2026</div>
                </div>
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1.2rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.85rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.3rem;">10:10 - 10:30</div>
                    <div style="color: #333; font-size: 1rem; font-weight: 600; line-height: 1.4;">Coffee Break & Networking</div>
                </div>
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1.2rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.85rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.3rem;">10:30 - 12:30</div>
                    <div style="color: #333; font-size: 1rem; font-weight: 600; line-height: 1.4;">Panel: Regulation vs Innovation in Germany</div>
                </div>
            </div>
        </div>

        <div class="agenda-day" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 20px; padding: 2rem; border: 1px solid rgba(255, 255, 255, 0.2);">
            <div style="display: flex; align-items: center; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 10px;">
                <span style="background: var(--primary-blue); color: white; padding: 0.4rem 1rem; border-radius: 20px; font-weight: 700; font-size: 0.85rem;">Day 2</span>
                <span style="font-weight: 600; color: rgba(255, 255, 255, 0.8); font-size: 1rem;">2026-06-16</span>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1.2rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.85rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.3rem;">09:00 - 10:00</div>
                    <div style="color: #333; font-size: 1rem; font-weight: 600; line-height: 1.4;">Workshop: Building Web3 Apps for the Masses</div>
                </div>
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1.2rem; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.85rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.3rem;">10:00 - 13:00</div>
                    <div style="color: #333; font-size: 1rem; font-weight: 600; line-height: 1.4;">Hackathon: Sustainable Blockchain Solutions</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="vision" style="padding: 5rem 5%; background: #fff; text-align: center;">
    <h2 class="montserrat" style="font-size: clamp(1.8rem, 5vw, 2.8rem); color: #000; font-weight: 900; margin-bottom: 1.5rem; line-height: 1.1; font-family: Montserrat, sans-serif;">Aligned with Europe's Youth Vision &<br>Global Priorities</h2>
    <p style="font-size: 1rem; color: #333; max-width: 800px; margin: 0 auto 3rem; line-height: 1.6;">The Youth Development Forum 2026 is shaped around the core objectives of leading European and international youth frameworks.</p>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
        <div class="vision-card" style="background: #2D236E; color: white; padding: 2.5rem 1.5rem; border-radius: 20px; text-align: center;">
            <h3 class="montserrat" style="font-size: 1.25rem; margin-bottom: 1rem; line-height: 1.3; font-family: Montserrat, sans-serif;">EU Youth Strategy 2019–2027</h3>
            <p style="font-size: 0.95rem; opacity: 0.9; line-height: 1.6;">Encouraging youth participation, social inclusion, and digital transformation.</p>
        </div>
        <div class="vision-card" style="background: #2D236E; color: white; padding: 2.5rem 1.5rem; border-radius: 20px; text-align: center;">
            <h3 class="montserrat" style="font-size: 1.25rem; margin-bottom: 1rem; line-height: 1.3; font-family: Montserrat, sans-serif;">EU Digital Decade & AI governance</h3>
            <p style="font-size: 0.95rem; opacity: 0.9; line-height: 1.6;">Empowering young people in emerging technologies and AI leadership.</p>
        </div>
        <div class="vision-card" style="background: #2D236E; color: white; padding: 2.5rem 1.5rem; border-radius: 20px; text-align: center;">
            <h3 class="montserrat" style="font-size: 1.25rem; margin-bottom: 1rem; line-height: 1.3; font-family: Montserrat, sans-serif;">Council of Europe's Youth Sector</h3>
            <p style="font-size: 0.95rem; opacity: 0.9; line-height: 1.6;">Strengthening democratic participation and human rights education.</p>
        </div>
    </div>
</section>

<section class="forum-highlights" style="padding: 4rem 5%; background: linear-gradient(rgba(10, 17, 40, 0.85), rgba(10, 17, 40, 0.85)), url('attached_assets/germany-0_1767641199459.jpg'); background-size: cover; background-position: center; background-attachment: fixed; color: white; text-align: center;">
    <div style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); display: grid; gap: 2.5rem; align-items: center; max-width: 1200px; margin: 0 auto;">
        <div>
            <h2 class="montserrat" style="font-size: clamp(1.8rem, 5vw, 2.8rem); font-weight: 900; line-height: 1.1; margin-bottom: 1.5rem; text-transform: uppercase; letter-spacing: -1px; font-family: Montserrat, sans-serif;">FORUM<br>HIGHLIGHTS</h2>
            <p style="font-size: 1rem; line-height: 1.6; color: rgba(255, 255, 255, 0.9); margin-bottom: 2rem;">This curated tour emphasizes how history shapes diplomacy, peacebuilding, and leadership today.</p>
            <a href="#packages" class="btn-custom-animate" style="background: var(--btn-yellow); color: var(--deep-navy); padding: 12px 30px; text-decoration: none; border-radius: 8px; font-weight: 800; display: inline-block;">Register Now</a>
        </div>
        
        <div style="display: flex; flex-direction: column; gap: 0.5rem; text-align: left;">
            <div style="background: #2D236E; padding: 0.8rem 1.2rem; border-radius: 12px; display: flex; align-items: center; gap: 1rem; border: 1px solid rgba(255, 255, 255, 0.1);">
                <div style="font-size: 1.2rem; width: 30px; text-align: center;">💬</div>
                <div style="font-size: 0.85rem; font-weight: 600;">Expert-led Workshops & Masterclasses</div>
            </div>
            <div style="background: #2D236E; padding: 0.8rem 1.2rem; border-radius: 12px; display: flex; align-items: center; gap: 1rem; border: 1px solid rgba(255, 255, 255, 0.1);">
                <div style="font-size: 1.2rem; width: 30px; text-align: center;">📜</div>
                <div style="font-size: 0.85rem; font-weight: 600;">Youth Diplomacy & Policy Dialogues</div>
            </div>
            <div style="background: #2D236E; padding: 0.8rem 1.2rem; border-radius: 12px; display: flex; align-items: center; gap: 1rem; border: 1px solid rgba(255, 255, 255, 0.1);">
                <div style="font-size: 1.2rem; width: 30px; text-align: center;">🤝</div>
                <div style="font-size: 0.85rem; font-weight: 600;">Networking with Global Leaders</div>
            </div>
            <div style="background: #2D236E; padding: 0.8rem 1.2rem; border-radius: 12px; display: flex; align-items: center; gap: 1rem; border: 1px solid rgba(255, 255, 255, 0.1);">
                <div style="font-size: 1.2rem; width: 30px; text-align: center;">🏢</div>
                <div style="font-size: 0.85rem; font-weight: 600;">Visit to the Bundestag Parliament</div>
            </div>
        </div>
    </div>
</section>
<?php 
}
include 'footer.php'; 
?>