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
<section class="hero-container" style="padding: clamp(60px, 10vh, 120px) 20px 40px; text-align: center;">
    <h1 class="hero-title image-text-mask" style="font-size: clamp(2.5rem, 10vw, 8rem); font-family: Montserrat, sans-serif; font-weight: 900; line-height: 1;">YOUTH CRYPTO</h1>
    <h2 class="hero-subtitle image-text-mask" style="font-size: clamp(1rem, 4vw, 3rem); font-family: Montserrat, sans-serif; font-weight: 800;">Forum Germany 2026</h2>
    <p class="hero-description" style="margin: 15px auto; max-width: 700px; color: var(--text-gray); font-size: clamp(0.85rem, 1.8vw, 1.1rem);">Shaping the Future of Digital Economy & Blockchain Technology. June 15–17, 2026 · Berlin, Germany</p>
    
    <div class="video-container" style="width: 100%; max-width: 900px; aspect-ratio: 16/9; height: auto; border-radius: clamp(10px, 3vw, 40px); overflow: hidden; box-shadow: 0 15px 40px rgba(0,0,0,0.15); background: #000; margin: 0 auto 30px; position: relative; border: 1px solid rgba(255,255,255,0.1);">
        <?php 
        if (strpos($hero_video, 'http') !== 0 && strpos($hero_video, '/') !== 0 && strpos($hero_video, 'attached_assets') !== 0 && strpos($hero_video, 'uploads/') !== 0) {
            $hero_video = '/' . $hero_video;
        }
        ?>
        <video src="<?php echo htmlspecialchars($hero_video); ?>" autoplay loop muted playsinline style="width: 100%; height: 100%; object-fit: cover; pointer-events: none;"></video>
    </div>

    <div class="countdown-wrapper" style="background: #f8f9fa; border-radius: 10px; padding: 8px; display: flex; flex-wrap: wrap; align-items: center; justify-content: center; box-shadow: 0 8px 30px rgba(0,0,0,0.05); width: fit-content; max-width: 95%; margin: 0 auto 30px; min-height: 50px; border: 1px solid #eee; gap: 8px;">
        <div style="background: #00aeef; padding: 8px 1.2rem; height: auto; display: flex; align-items: center; border-radius: 6px;">
            <span style="font-size: 0.7rem; font-weight: 700; text-transform: uppercase; color: white; line-height: 1.1; white-space: nowrap;">Starts in:</span>
        </div>
        
        <div id="countdown" style="display: flex; gap: 0.8rem; align-items: center; padding: 8px; color: #333; font-family: Inter, Arial, sans-serif; flex-wrap: wrap; justify-content: center;">
            <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 3px;">
                <span id="days" style="display: block; font-size: clamp(1.1rem, 2.5vw, 1.3rem); font-weight: 700; line-height: 1;">00</span>
                <span style="text-transform: uppercase; font-size: 0.6rem; font-weight: 600; color: #999;">d</span>
            </div>
            <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 3px;">
                <span id="hours" style="display: block; font-size: clamp(1.1rem, 2.5vw, 1.3rem); font-weight: 700; line-height: 1;">00</span>
                <span style="text-transform: uppercase; font-size: 0.6rem; font-weight: 600; color: #999;">h</span>
            </div>
            <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 3px;">
                <span id="minutes" style="display: block; font-size: clamp(1.1rem, 2.5vw, 1.3rem); font-weight: 700; line-height: 1;">00</span>
                <span style="text-transform: uppercase; font-size: 0.6rem; font-weight: 600; color: #999;">m</span>
            </div>
            <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 3px;">
                <span id="seconds" style="display: block; font-size: clamp(1.1rem, 2.5vw, 1.3rem); font-weight: 700; line-height: 1;">00</span>
                <span style="text-transform: uppercase; font-size: 0.6rem; font-weight: 600; color: #999;">s</span>
            </div>
        </div>
        
        <a href="#packages" class="btn-custom-animate" style="padding: 8px 16px; font-size: 0.85rem; background: var(--primary-blue); color: white; text-decoration: none; border-radius: 6px; font-weight: 600;">Register Now</a>
    </div>

    <!-- News & Updates Section (Now after countdown) -->
    <section style="padding: 20px 20px 60px; background: #fff;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 30px; flex-wrap: wrap; gap: 15px;">
                <h2 class="montserrat" style="font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 900; color: #000; text-transform: uppercase; margin: 0;">Latest News</h2>
                <a href="news.php" style="color: #00aeef; font-weight: 700; text-decoration: none; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;">View All Posts <span style="font-size: 1.2rem;">→</span></a>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                <?php foreach($news as $item): ?>
                <div class="news-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid #eee; display: flex; flex-direction: column;">
                    <div style="width: 100%; height: 200px; overflow: hidden;">
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column;">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">
                            <span style="color: #00aeef;"><?php echo htmlspecialchars($item['category']); ?></span>
                            <span style="color: #999;"><?php echo htmlspecialchars($item['date']); ?></span>
                        </div>
                        <h3 class="montserrat" style="font-size: 1.25rem; font-weight: 800; line-height: 1.4; margin-bottom: 12px; color: #000;">
                            <?php echo htmlspecialchars($item['title']); ?>
                        </h3>
                        <p style="color: #666; font-size: 0.9rem; line-height: 1.6; margin-bottom: 20px;">
                            <?php echo htmlspecialchars($item['summary']); ?>
                        </p>
                        <a href="news_detail.php?id=<?php echo $item['id']; ?>" style="margin-top: auto; color: #000; font-weight: 800; text-decoration: none; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; display: inline-flex; align-items: center; gap: 8px;">
                            Read Full Story <span style="font-size: 1.1rem;">+</span>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</section>

<section id="packages" class="participation-seats" style="padding: 60px 20px; text-align: center; background: #fff;">
    <div style="border: 1px solid #eee; border-radius: 20px; padding: 40px 20px; max-width: 1100px; margin: 0 auto; background: #fff;">
        <h2 class="montserrat" style="font-size: clamp(2rem, 5vw, 3.5rem); color: #000; font-weight: 900; margin-bottom: 0.8rem; text-transform: uppercase; font-family: Montserrat, sans-serif;">Total Participation Seats: 200</h2>
        <p style="font-size: 1.1rem; color: #333; margin-bottom: 3rem; font-family: Inter, sans-serif;">CGDL is offering <strong>200 seats</strong> for the Youth Crypto Forum 2026:</p>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1.5rem; max-width: 1000px; margin: 0 auto;">
            <div class="seat-card" style="background: #2D236E; border-radius: 12px; padding: 2.5rem 1rem; border-bottom: 8px solid #FFD700; text-decoration: none; display: block; box-shadow: 0 8px 25px rgba(45, 35, 110, 0.1);">
                <h3 class="montserrat" style="color: white; font-size: 1.1rem; font-weight: 800; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 0.5px;">Fully Funded</h3>
                <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.6rem 1.8rem; border-radius: 8px; font-weight: 900; font-size: 1.1rem; margin-bottom: 1rem; box-shadow: 0 3px 10px rgba(255, 215, 0, 0.2);">30 Seats</div>
                <div style="color: rgba(255, 255, 255, 0.9); font-size: 0.9rem; font-weight: 600; font-family: Inter, sans-serif;">Competitive Selection</div>
            </div>
            <div class="seat-card" style="background: #2D236E; border-radius: 12px; padding: 2.5rem 1rem; border-bottom: 8px solid #FFD700; text-decoration: none; display: block; box-shadow: 0 8px 25px rgba(45, 35, 110, 0.1);">
                <h3 class="montserrat" style="color: white; font-size: 1.1rem; font-weight: 800; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 0.5px;">Partially Funded</h3>
                <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.6rem 1.8rem; border-radius: 8px; font-weight: 900; font-size: 1.1rem; margin-bottom: 1rem; box-shadow: 0 3px 10px rgba(255, 215, 0, 0.2);">50 Seats</div>
                <div style="color: rgba(255, 255, 255, 0.9); font-size: 0.9rem; font-weight: 600; font-family: Inter, sans-serif;">Competitive Selection</div>
            </div>
            <div class="seat-card" style="background: #2D236E; border-radius: 12px; padding: 2.5rem 1rem; border-bottom: 8px solid #FFD700; text-decoration: none; display: block; box-shadow: 0 8px 25px rgba(45, 35, 110, 0.1);">
                <h3 class="montserrat" style="color: white; font-size: 1.1rem; font-weight: 800; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 0.5px;">Forum Admission</h3>
                <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.6rem 1.8rem; border-radius: 8px; font-weight: 900; font-size: 1.1rem; margin-bottom: 1rem; box-shadow: 0 3px 10px rgba(255, 215, 0, 0.2);">40 Seats</div>
                <div style="color: rgba(255, 255, 255, 0.9); font-size: 0.9rem; font-weight: 600; font-family: Inter, sans-serif;">Guaranteed Selection</div>
            </div>
            <div class="seat-card" style="background: #2D236E; border-radius: 12px; padding: 2.5rem 1rem; border-bottom: 8px solid #FFD700; text-decoration: none; display: block; box-shadow: 0 8px 25px rgba(45, 35, 110, 0.1);">
                <h3 class="montserrat" style="color: white; font-size: 1.1rem; font-weight: 800; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: 0.5px;">Self Funded</h3>
                <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.6rem 1.8rem; border-radius: 8px; font-weight: 900; font-size: 1.1rem; margin-bottom: 1rem; box-shadow: 0 3px 10px rgba(255, 215, 0, 0.2);">80 Seats</div>
                <div style="color: rgba(255, 255, 255, 0.9); font-size: 0.9rem; font-weight: 600; font-family: Inter, sans-serif;">Guaranteed Selection</div>
            </div>
        </div>
    </div>
</section>

<!-- Scholarship Categories Section -->
<section style="background: url('attached_assets/germany-0_1767641199459.jpg') center/cover no-repeat fixed; color: white; text-align: center; position: relative;">
    <div style="background: rgba(45, 35, 110, 0.85); width: 100%; padding: 60px 20px;">
        <div style="background: #2D236E; border-radius: 12px; padding: 20px; max-width: 700px; margin: 0 auto 30px; border: 1px solid rgba(255, 255, 255, 0.1);">
            <h2 class="montserrat" style="font-size: clamp(1.4rem, 3.5vw, 2.2rem); margin-bottom: 8px; font-weight: 800; text-transform: uppercase;">Scholarship Categories</h2>
            <h3 class="montserrat" style="font-size: clamp(1rem, 2.5vw, 1.5rem); margin-bottom: 12px; font-weight: 700;">(Competitive Selection)</h3>
            <p style="font-size: 0.95rem; line-height: 1.5; color: white; margin-bottom: 0;">
                These are <em>funded</em> categories offered to outstanding applicants based on merit, motivation, and global representation. The <strong>Fully Funded</strong> and <strong>Partially Funded</strong> categories share one unified application form.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; max-width: 900px; margin: 0 auto 40px;">
            <!-- Fully Funded Detail -->
            <div style="background: #2D236E; border-radius: 16px; padding: 30px 20px; border: 1px solid rgba(255, 255, 255, 0.1); text-align: left;">
                <div style="font-size: 2rem; font-weight: 800; margin-bottom: 8px; text-align: center;">$16.99</div>
                <h3 class="montserrat" style="font-size: 1.5rem; font-weight: 900; margin-bottom: 20px; text-transform: uppercase; text-align: center;">Fully Funded Category</h3>
                <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 15px;">
                    <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                    <p style="font-size: 0.8rem; opacity: 0.9; margin-bottom: 15px; line-height: 1.4;">Participants selected under the Fully Funded category receive a complete scholarship package that covers:</p>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.8rem; line-height: 1.6;">
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">✈️</span> Round-trip airfare to Berlin, Germany</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🏨</span> Accommodation in a premium 4-star hotel (3 nights, 4 days)</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🍽️</span> Daily meals & breakfast</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🔑</span> Full access to all sessions & activities</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">📜</span> Certificate of Participation issued by CGDL</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🎒</span> Delegate kit & materials</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🗺️</span> Guided city tour of Berlin</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🛂</span> Comprehensive visa support</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🤝</span> Cultural exchange & networking</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🔊</span> Engage with global speakers & experts</li>
                    </ul>
                </div>
            </div>

            <!-- Partially Funded Detail -->
            <div style="background: #2D236E; border-radius: 16px; padding: 30px 20px; border: 1px solid rgba(255, 255, 255, 0.1); text-align: left;">
                <div style="font-size: 2rem; font-weight: 800; margin-bottom: 8px; text-align: center;">$16.99</div>
                <h3 class="montserrat" style="font-size: 1.5rem; font-weight: 900; margin-bottom: 20px; text-transform: uppercase; text-align: center;">Partially Funded Category</h3>
                <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 15px;">
                    <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                    <p style="font-size: 0.8rem; opacity: 0.9; margin-bottom: 15px; line-height: 1.4;">Participants selected for the Partially Funded category receive significant subsidization and will be provided:</p>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.8rem; line-height: 1.6;">
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🔑</span> Full access to all conference sessions & workshops</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🏨</span> Accommodation in a premium 4-star hotel (3 nights, 4 days)</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🍽️</span> Meals & breakfast throughout the forum</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">📜</span> Certificate of Participation from CGDL</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🎒</span> Delegate kit & materials</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🗺️</span> Guided city tour of Berlin focusing on history</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🛂</span> Comprehensive visa support & letter</li>
                        <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🤝</span> Cultural & networking activities</li>
                    </ul>
                    <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); margin: 15px 0; padding-top: 10px;">
                        <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; text-align: center; color: rgba(255, 255, 255, 0.7);">Not Included</h4>
                        <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.75rem;">
                            <li style="display: flex; gap: 10px;"><span style="color: #FFD700;">✈️</span> Airfare</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px;">
            <a href="ycf-funded-category-application.php#gf_21" class="btn-custom-animate" style="background: linear-gradient(to bottom, #8B6914, #000); color: white; padding: 15px 60px; text-decoration: none; border-radius: 10px; font-weight: 800; display: inline-block; font-size: 1.1rem; border: 1px solid rgba(255,215,0,0.3); text-transform: uppercase;">Apply Now!</a>
        </div>
    </div>
</section>

<!-- Guaranteed Categories Section -->
<section style="background: #fff; padding: 60px 20px; text-align: center;">
    <div style="background: #2D236E; border-radius: 12px; padding: 20px; max-width: 700px; margin: 0 auto 30px; border: 1px solid rgba(0,0,0,0.05); color: white;">
        <h2 class="montserrat" style="font-size: clamp(1.4rem, 3.5vw, 2.2rem); margin-bottom: 8px; font-weight: 800; text-transform: uppercase;">Guaranteed Categories</h2>
        <h3 class="montserrat" style="font-size: clamp(1rem, 2.5vw, 1.5rem); margin-bottom: 12px; font-weight: 700;">(Confirmed Seats)</h3>
        <p style="font-size: 0.95rem; line-height: 1.5; opacity: 0.9; margin-bottom: 0;">
            These categories offer guaranteed participation with no competitive selection. Applicants secure their seat upon completing their registration.
        </p>
    </div>

    <div style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); display: grid; gap: 20px; max-width: 900px; margin: 0 auto 40px;">
        <!-- Forum Admission Detail -->
        <div style="background: #2D236E; border-radius: 16px; padding: 30px 20px; color: white; text-align: left;">
            <div style="font-size: 1rem; opacity: 0.7; text-decoration: line-through; margin-bottom: 5px; text-align: center;">$799.99</div>
            <div style="font-size: 2rem; font-weight: 800; margin-bottom: 8px; text-align: center;">$499.00</div>
            <h3 class="montserrat" style="font-size: 1.4rem; font-weight: 900; margin-bottom: 20px; text-transform: uppercase; text-align: center;">Forum Admission Category</h3>
            <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 15px;">
                <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                <p style="font-size: 0.8rem; opacity: 0.9; margin-bottom: 15px; line-height: 1.4;">Forum Admission is ideal for participants seeking guaranteed entry without accommodation support. It includes:</p>
                <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.8rem; line-height: 1.6;">
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">✅</span> Guaranteed participation at YDF 2026</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🎟️</span> Access to all sessions & workshops</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">📜</span> Certificate of Participation from CGDL</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🎒</span> Delegate kit & materials</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🏛️</span> Guided city tour of Berlin</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🛂</span> Comprehensive visa support & letter</li>
                </ul>
                <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); margin: 15px 0; padding-top: 10px;">
                    <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; text-align: center; color: rgba(255, 255, 255, 0.7);">Not Included</h4>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.75rem; line-height: 1.6;">
                        <li style="display: flex; gap: 10px;"><span style="color: #FFD700;">✈️</span> Airfare</li>
                        <li style="display: flex; gap: 10px;"><span style="color: #FFD700;">🏨</span> Accommodation</li>
                    </ul>
                </div>
            </div>
            <div style="margin-top: 25px; text-align: center;">
                <a href="ycf-forum-admission-application.php#gf_22" class="btn-custom-animate" style="background: linear-gradient(to bottom, #8B6914, #000); color: white; padding: 12px 30px; text-decoration: none; border-radius: 8px; font-weight: 800; display: block; font-size: 0.95rem; border: 1px solid rgba(255,215,0,0.3); text-transform: uppercase;">Register NOW!</a>
            </div>
        </div>

        <!-- Self-Funded Detail -->
        <div style="background: #2D236E; border-radius: 16px; padding: 30px 20px; color: white; text-align: left;">
            <div style="font-size: 1rem; opacity: 0.7; text-decoration: line-through; margin-bottom: 5px; text-align: center;">$999.99</div>
            <div style="font-size: 2rem; font-weight: 800; margin-bottom: 8px; text-align: center;">$799.00</div>
            <h3 class="montserrat" style="font-size: 1.4rem; font-weight: 900; margin-bottom: 20px; text-transform: uppercase; text-align: center;">Self-Funded Category</h3>
            <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 15px;">
                <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                <p style="font-size: 0.8rem; opacity: 0.9; margin-bottom: 15px; line-height: 1.4;">The Self-Funded category is an upgraded guaranteed option designed for those who prefer accommodation. It includes:</p>
                <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.8rem; line-height: 1.6;">
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">✅</span> Guaranteed participation with priority confirmation</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🏨</span> Accommodation in a premium 4-star hotel (3 nights, 4 days)</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🍽️</span> Meals & breakfast</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🔑</span> Access to all conference sessions & workshops</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">📜</span> Certificate of Participation from CGDL</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🎒</span> Delegate kit & materials</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🗺️</span> Guided city tour of Berlin</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🛂</span> Comprehensive visa support & letter</li>
                </ul>
                <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); margin: 15px 0; padding-top: 10px;">
                    <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; text-align: center; color: rgba(255, 255, 255, 0.7);">Not Included</h4>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.75rem; line-height: 1.6;">
                        <li style="display: flex; gap: 10px;"><span style="color: #FFD700;">✈️</span> Airfare</li>
                    </ul>
                </div>
            </div>
            <div style="margin-top: 25px; text-align: center;">
                <a href="ycf-self-funded-application.php#gf_23" class="btn-custom-animate" style="background: linear-gradient(to bottom, #8B6914, #000); color: white; padding: 12px 30px; text-decoration: none; border-radius: 8px; font-weight: 800; display: block; font-size: 0.95rem; border: 1px solid rgba(255,215,0,0.3); text-transform: uppercase;">Register NOW!</a>
            </div>
        </div>
    </div>
</section>

<!-- Visa Invitation Section -->
<section style="background: #f8f9fa; padding: 60px 5%; position: relative; overflow: hidden;">
    <div style="max-width: 1000px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; align-items: center;">
        <div style="background: #2D236E; border-radius: 16px; padding: 30px; color: white; box-shadow: 0 15px 40px rgba(0,0,0,0.2);">
            <h1 class="montserrat" style="font-size: 1.8rem; font-weight: 900; margin-bottom: 15px; text-transform: uppercase;">Visa Invitation Letter</h1>
            <p style="font-size: 0.9rem; opacity: 0.9; line-height: 1.5; margin-bottom: 20px;">
                Applicants who want to apply early for their visa can request a <strong>Visa Invitation Letter Package</strong> from CGDL.
            </p>
            <div style="margin-bottom: 20px;">
                <span style="font-size: 1rem; opacity: 0.7; text-decoration: line-through; margin-right: 12px;">$299.99</span>
                <span style="font-size: 1.8rem; font-weight: 900;">$99.00</span>
            </div>
            <ul style="list-style: none; padding: 0; margin: 0 0 25px 0; font-size: 0.85rem; line-height: 1.8;">
                <li style="display: flex; gap: 10px; align-items: center;"><span style="color: #FFD700;">🛂</span> Official Visa Invitation Letter</li>
                <li style="display: flex; gap: 10px; align-items: center;"><span style="color: #FFD700;">📄</span> Visa Documents Checklist</li>
                <li style="display: flex; gap: 10px; align-items: center;"><span style="color: #FFD700;">✅</span> Confirmation of Event Participation</li>
                <li style="display: flex; gap: 10px; align-items: center;"><span style="color: #FFD700;">🤝</span> Embassy Coordination Assistance</li>
            </ul>
            <p style="font-size: 0.8rem; opacity: 0.8; line-height: 1.4; margin-bottom: 25px; background: rgba(255,255,255,0.05); padding: 12px; border-radius: 6px; border-left: 2px solid #FFD700;">
                Upgrade later to forum admission or self funded and the cost will be fully adjusted towards the upgrade.
            </p>
            <a href="ycf-visa-invitation-application.php#gf_24" class="btn-custom-animate" style="background: linear-gradient(to bottom, #8B6914, #000); color: white; padding: 12px 0; text-decoration: none; border-radius: 10px; font-weight: 800; display: block; text-align: center; font-size: 1rem; border: 1px solid rgba(255,215,0,0.3); text-transform: uppercase;">Register NOW!</a>
        </div>
        <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 15px 40px rgba(0,0,0,0.1); height: 100%; min-height: 350px; position: relative;">
            <img src="attached_assets/germany-0_1767641199459.jpg" alt="Berlin" style="width: 100%; height: 100%; object-fit: cover;">
            <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(transparent, rgba(45, 35, 110, 0.9)); padding: 30px 15px; color: white; text-align: center;">
                <h2 class="montserrat" style="font-size: 2rem; font-weight: 900; letter-spacing: 3px;">SUM / VISA</h2>
                <p style="font-size: 0.75rem; opacity: 0.7; text-transform: uppercase; letter-spacing: 1px;">Berlin, Germany</p>
            </div>
        </div>
    </div>
</section>

<section class="agenda" style="padding: 3rem 5%; background-image: linear-gradient(rgba(0, 51, 102, 0.85), rgba(0, 51, 102, 0.85)), url('attached_assets/1_Rs5tF_ifkt8I99W5BZyBKw_1767637840250.jpg'); background-size: cover; background-position: center; background-attachment: fixed; color: white;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 15px;">
        <h2 style="color: white; font-size: clamp(1.6rem, 4vw, 2.2rem); font-weight: 800; letter-spacing: 1px; margin: 0; font-family: Montserrat, sans-serif;">AGENDA</h2>
        <a href="#" class="btn-custom-animate" style="font-size: 0.75rem; padding: 6px 16px; background: rgba(255,255,255,0.2); color: white; text-decoration: none; border-radius: 5px;">View all &rsaquo;</a>
    </div>
    
    <div style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); display: grid; gap: 1.5rem;">
        <div class="agenda-day" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 16px; padding: 1.5rem; border: 1px solid rgba(255, 255, 255, 0.2);">
            <div style="display: flex; align-items: center; margin-bottom: 1.2rem; flex-wrap: wrap; gap: 8px;">
                <span style="background: var(--primary-blue); color: white; padding: 0.3rem 0.8rem; border-radius: 15px; font-weight: 700; font-size: 0.75rem;">Day 1</span>
                <span style="font-weight: 600; color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">2026-06-15</span>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 0.8rem;">
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1rem; border-radius: 10px; box-shadow: 0 3px 15px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.75rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.2rem;">09:00 - 10:10</div>
                    <div style="color: #333; font-size: 0.9rem; font-weight: 600; line-height: 1.3;">Opening Keynote</div>
                </div>
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1rem; border-radius: 10px; box-shadow: 0 3px 15px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.75rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.2rem;">10:30 - 12:30</div>
                    <div style="color: #333; font-size: 0.9rem; font-weight: 600; line-height: 1.3;">Panel: Regulation vs Innovation</div>
                </div>
            </div>
        </div>

        <div class="agenda-day" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 16px; padding: 1.5rem; border: 1px solid rgba(255, 255, 255, 0.2);">
            <div style="display: flex; align-items: center; margin-bottom: 1.2rem; flex-wrap: wrap; gap: 8px;">
                <span style="background: var(--primary-blue); color: white; padding: 0.3rem 0.8rem; border-radius: 15px; font-weight: 700; font-size: 0.75rem;">Day 2</span>
                <span style="font-weight: 600; color: rgba(255, 255, 255, 0.8); font-size: 0.9rem;">2026-06-16</span>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 0.8rem;">
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1rem; border-radius: 10px; box-shadow: 0 3px 15px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.75rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.2rem;">09:00 - 10:00</div>
                    <div style="color: #333; font-size: 0.9rem; font-weight: 600; line-height: 1.3;">Workshop: Web3 Apps</div>
                </div>
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1rem; border-radius: 10px; box-shadow: 0 3px 15px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.75rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.2rem;">10:00 - 13:00</div>
                    <div style="color: #333; font-size: 0.9rem; font-weight: 600; line-height: 1.3;">Hackathon: Solutions</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="vision" style="padding: 4rem 5%; background: #fff; text-align: center;">
    <h2 class="montserrat" style="font-size: clamp(1.6rem, 4vw, 2.2rem); color: #000; font-weight: 900; margin-bottom: 1.2rem; line-height: 1.1; font-family: Montserrat, sans-serif;">Europe's Youth Vision</h2>
    <p style="font-size: 0.9rem; color: #333; max-width: 600px; margin: 0 auto 2.5rem; line-height: 1.5;">Core objectives of leading European and international youth frameworks.</p>
    
    <div style="grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); display: grid; gap: 1.2rem;">
        <div class="vision-card" style="background: #2D236E; color: white; padding: 2rem 1.2rem; border-radius: 16px; text-align: center;">
            <h3 class="montserrat" style="font-size: 1.1rem; margin-bottom: 0.8rem; line-height: 1.3; font-family: Montserrat, sans-serif;">EU Youth Strategy</h3>
            <p style="font-size: 0.85rem; opacity: 0.9; line-height: 1.5;">Participation, social inclusion, and digital transformation.</p>
        </div>
        <div class="vision-card" style="background: #2D236E; color: white; padding: 2rem 1.2rem; border-radius: 16px; text-align: center;">
            <h3 class="montserrat" style="font-size: 1.1rem; margin-bottom: 0.8rem; line-height: 1.3; font-family: Montserrat, sans-serif;">EU Digital Decade</h3>
            <p style="font-size: 0.85rem; opacity: 0.9; line-height: 1.5;">Empowering young people in emerging technologies and AI leadership.</p>
        </div>
        <div class="vision-card" style="background: #2D236E; color: white; padding: 2rem 1.2rem; border-radius: 16px; text-align: center;">
            <h3 class="montserrat" style="font-size: 1.1rem; margin-bottom: 0.8rem; line-height: 1.3; font-family: Montserrat, sans-serif;">Council of Europe</h3>
            <p style="font-size: 0.85rem; opacity: 0.9; line-height: 1.5;">Strengthening democratic participation and human rights education.</p>
        </div>
    </div>
</section>

<section class="forum-highlights" style="padding: 3.5rem 5%; background: linear-gradient(rgba(10, 17, 40, 0.85), rgba(10, 17, 40, 0.85)), url('attached_assets/germany-0_1767641199459.jpg'); background-size: cover; background-position: center; background-attachment: fixed; color: white; text-align: center;">
    <div style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); display: grid; gap: 2rem; align-items: center; max-width: 1000px; margin: 0 auto;">
        <div>
            <h2 class="montserrat" style="font-size: clamp(1.6rem, 4vw, 2.2rem); font-weight: 900; line-height: 1.1; margin-bottom: 1.2rem; text-transform: uppercase; letter-spacing: -1px; font-family: Montserrat, sans-serif;">FORUM HIGHLIGHTS</h2>
            <p style="font-size: 0.9rem; line-height: 1.5; color: rgba(255, 255, 255, 0.9); margin-bottom: 1.5rem;">How history shapes diplomacy, peacebuilding, and leadership today.</p>
            <a href="#packages" class="btn-custom-animate" style="background: var(--btn-yellow); color: var(--deep-navy); padding: 10px 25px; text-decoration: none; border-radius: 6px; font-weight: 800; display: inline-block; font-size: 0.9rem;">Register Now</a>
        </div>
        
        <div style="display: flex; flex-direction: column; gap: 0.4rem; text-align: left;">
            <div style="background: #2D236E; padding: 0.7rem 1rem; border-radius: 10px; display: flex; align-items: center; gap: 0.8rem; border: 1px solid rgba(255, 255, 255, 0.1);">
                <div style="font-size: 1rem; width: 25px; text-align: center;">💬</div>
                <div style="font-size: 0.8rem; font-weight: 600;">Expert-led Workshops</div>
            </div>
            <div style="background: #2D236E; padding: 0.7rem 1rem; border-radius: 10px; display: flex; align-items: center; gap: 0.8rem; border: 1px solid rgba(255, 255, 255, 0.1);">
                <div style="font-size: 1rem; width: 25px; text-align: center;">📜</div>
                <div style="font-size: 0.8rem; font-weight: 600;">Youth Diplomacy</div>
            </div>
            <div style="background: #2D236E; padding: 0.7rem 1rem; border-radius: 10px; display: flex; align-items: center; gap: 0.8rem; border: 1px solid rgba(255, 255, 255, 0.1);">
                <div style="font-size: 1rem; width: 25px; text-align: center;">🤝</div>
                <div style="font-size: 0.8rem; font-weight: 600;">Networking</div>
            </div>
        </div>
    </div>
</section>
<?php 
}
include 'footer.php'; 
?>