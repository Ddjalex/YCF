<?php
require_once 'functions.php';
include 'header.php';
?>

<section class="hero" style="background: linear-gradient(to right, rgba(0, 51, 102, 0.9) 0%, rgba(0, 51, 102, 0.4) 40%, rgba(0, 0, 0, 0.2) 100%), url('attached_assets/image_1767436778420.png'); background-size: cover; background-position: center; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: flex-start; color: white; text-align: left; padding: 0 10%;">
    <div style="max-width: 900px; margin-top: 110px;">
        <h1 style="font-size: 4rem; margin-bottom: 0.5rem; font-weight: 800; line-height: 1; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">Youth Crypto Forum Germany 2026</h1>
        <p style="font-size: 1.8rem; margin-bottom: 1.5rem; font-weight: 400; opacity: 0.9;">Shaping the Future of Digital Economy & Blockchain Technology</p>
        <p style="font-size: 1.2rem; margin-bottom: 4rem; font-weight: 400; opacity: 0.8; max-width: 800px;">June 15–17, 2026<br>Berlin, Germany</p>
        
        <div style="background: rgba(0, 0, 0, 0.4); backdrop-filter: blur(15px); border-radius: 8px; padding: 0; display: flex; align-items: center; border: 1px solid rgba(255, 255, 255, 0.1); box-shadow: 0 10px 40px rgba(0,0,0,0.3); width: fit-content; overflow: hidden; height: 50px; margin-left: 0;">
            <div style="background: #00aeef; padding: 0 1rem; margin-right: 0; flex-shrink: 0; height: 100%; display: flex; flex-direction: column; justify-content: center; min-height: 50px;">
                <span style="font-size: 0.65rem; font-weight: 700; text-transform: uppercase; color: white; line-height: 1.1; white-space: nowrap;">Left until the Forum starts:</span>
            </div>
            
            <div id="countdown" style="display: flex; gap: 1rem; align-items: center; padding: 0 1.5rem; color: white; font-family: Inter, Arial, sans-serif;">
                <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 3px;">
                    <span id="days" style="display: block; font-size: 1.2rem; font-weight: 700; line-height: 1;">00</span>
                    <span style="text-transform: lowercase; font-size: 0.6rem; font-weight: 400; opacity: 0.8;">days</span>
                </div>
                <div style="font-size: 1rem; font-weight: 300; opacity: 0.4;">:</div>
                <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 3px;">
                    <span id="hours" style="display: block; font-size: 1.2rem; font-weight: 700; line-height: 1;">00</span>
                    <span style="text-transform: lowercase; font-size: 0.6rem; font-weight: 400; opacity: 0.8;">hours</span>
                </div>
                <div style="font-size: 1rem; font-weight: 300; opacity: 0.4;">:</div>
                <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 3px;">
                    <span id="minutes" style="display: block; font-size: 1.2rem; font-weight: 700; line-height: 1;">00</span>
                    <span style="text-transform: lowercase; font-size: 0.6rem; font-weight: 400; opacity: 0.8;">minutes</span>
                </div>
                <div style="font-size: 1rem; font-weight: 300; opacity: 0.4;">:</div>
                <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 3px;">
                    <span id="seconds" style="display: block; font-size: 1.2rem; font-weight: 700; line-height: 1;">00</span>
                    <span style="text-transform: lowercase; font-size: 0.6rem; font-weight: 400; opacity: 0.8;">seconds</span>
                </div>
            </div>
            
            <div style="padding: 0 0.5rem; flex-shrink: 0; height: 100%; display: flex; align-items: center; background: rgba(0,0,0,0.1);">
                <a href="#" style="background: #00aeef; color: white; text-decoration: none; padding: 0.4rem 1rem; border-radius: 4px; font-weight: 700; font-size: 0.8rem; transition: all 0.3s; text-transform: uppercase;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">Register</a>
            </div>
        </div>
    </div>
</section>
        
        <div style="margin-top: 3rem; display: flex; gap: 4rem; font-size: 1.3rem; font-weight: 500; opacity: 0.9;">
            <div style="display: flex; align-items: center;"><span style="margin-right: 0.8rem; font-size: 1.6rem;">📅</span> June 15-17, 2026</div>
            <div style="display: flex; align-items: center;"><span style="margin-right: 0.8rem; font-size: 1.6rem;">📍</span> Berlin, Germany</div>
        </div>
    </div>
</section>

<section class="news" style="padding: 4rem 10%; background: #fcfcfc;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem;">
        <h2 style="color: var(--dark-blue); font-size: 2rem; font-weight: 700;">LATEST NEWS</h2>
        <a href="#" style="color: var(--primary-blue); font-weight: 600; text-decoration: none;">View all &rsaquo;</a>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2.5rem;">
        <?php foreach (get_latest_news() as $item): ?>
            <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="height: 200px; background: #eee; background-image: url('<?php echo $item['image']; ?>'); background-size: cover;"></div>
                <div style="padding: 2rem;">
                    <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                        <span style="background: var(--primary-blue); color: white; font-size: 0.7rem; font-weight: 700; padding: 0.3rem 0.8rem; border-radius: 20px; text-transform: uppercase; margin-right: 1rem;"><?php echo $item['category']; ?></span>
                        <span style="font-size: 0.85rem; color: #999;"><?php echo $item['date']; ?></span>
                    </div>
                    <h3 style="color: var(--dark-blue); margin: 0 0 1rem; font-size: 1.25rem; line-height: 1.3; height: 3.3rem; overflow: hidden;"><?php echo $item['title']; ?></h3>
                    <p style="font-size: 0.95rem; color: #666; margin-bottom: 1.5rem; height: 4.5rem; overflow: hidden;"><?php echo $item['summary']; ?></p>
                    <a href="#" style="color: var(--primary-blue); font-weight: 700; text-decoration: none; font-size: 0.9rem;">Read More &rarr;</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="hotels" style="padding: 4rem 10%; background: #fff;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem;">
        <h2 style="color: var(--dark-blue); font-size: 2rem; font-weight: 700;">HOTELS</h2>
        <a href="#" style="color: var(--primary-blue); font-weight: 600; text-decoration: none;">View all &rsaquo;</a>
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
        <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            <div style="height: 180px; background-image: url('attached_assets/stock_images/modern_hotel_buildin_3678f2dc.jpg'); background-size: cover;"></div>
            <div style="padding: 1.5rem;">
                <div style="color: #ffb400; font-size: 0.8rem; margin-bottom: 0.5rem;">★★★★★</div>
                <h3 style="font-size: 1.1rem; color: var(--dark-blue); margin: 0 0 1rem;">The Ritz-Carlton, Berlin</h3>
                <a href="#" style="color: var(--primary-blue); font-size: 0.85rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                    <span style="font-size: 1rem;">📍</span> See on Google Maps
                </a>
            </div>
        </div>
        <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            <div style="height: 180px; background-image: url('attached_assets/stock_images/modern_hotel_buildin_c47aad9b.jpg'); background-size: cover;"></div>
            <div style="padding: 1.5rem;">
                <div style="color: #ffb400; font-size: 0.8rem; margin-bottom: 0.5rem;">★★★★★</div>
                <h3 style="font-size: 1.1rem; color: var(--dark-blue); margin: 0 0 1rem;">Hotel Adlon Kempinski</h3>
                <a href="#" style="color: var(--primary-blue); font-size: 0.85rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                    <span style="font-size: 1rem;">📍</span> See on Google Maps
                </a>
            </div>
        </div>
        <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            <div style="height: 180px; background-image: url('attached_assets/stock_images/modern_hotel_buildin_b68ea702.jpg'); background-size: cover;"></div>
            <div style="padding: 1.5rem;">
                <div style="color: #ffb400; font-size: 0.8rem; margin-bottom: 0.5rem;">★★★★</div>
                <h3 style="font-size: 1.1rem; color: var(--dark-blue); margin: 0 0 1rem;">Waldorf Astoria Berlin</h3>
                <a href="#" style="color: var(--primary-blue); font-size: 0.85rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                    <span style="font-size: 1rem;">📍</span> See on Google Maps
                </a>
            </div>
        </div>
        <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
            <div style="height: 180px; background-image: url('attached_assets/stock_images/modern_hotel_buildin_07610799.jpg'); background-size: cover;"></div>
            <div style="padding: 1.5rem;">
                <div style="color: #ffb400; font-size: 0.8rem; margin-bottom: 0.5rem;">★★★★★</div>
                <h3 style="font-size: 1.1rem; color: var(--dark-blue); margin: 0 0 1rem;">Grand Hyatt Berlin</h3>
                <a href="#" style="color: var(--primary-blue); font-size: 0.85rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem;">
                    <span style="font-size: 1rem;">📍</span> See on Google Maps
                </a>
            </div>
        </div>
    </div>
</section>

<section class="visa" style="padding: 4rem 10%; background: #f8fbff; position: relative; overflow: hidden;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0.05; pointer-events: none; display: flex; justify-content: center; align-items: center;">
        <img src="https://www.unpsf2025.org/assets/banner-logo-9fqzApTB.svg" style="width: 80%; transform: rotate(-15deg);">
    </div>
    <h2 style="color: var(--dark-blue); font-size: 1.8rem; font-weight: 700; margin-bottom: 2rem;">VISA REQUIREMENTS</h2>
    <div style="background: white; padding: 2.5rem; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.05); position: relative; z-index: 1;">
        <p style="font-size: 1rem; color: #444; margin-bottom: 1.5rem; line-height: 1.8;">
            Obtaining a visa is the responsibility of the participant. Please check the visa requirements for your nationality at the official website: <a href="https://www.auswaertiges-amt.de/en/visa-service" style="color: var(--primary-blue); font-weight: 600;">Germany Federal Foreign Office</a>.
        </p>
        <p style="font-size: 1rem; color: #444; margin-bottom: 1.5rem; line-height: 1.8;">
            You can apply for a Schengen visa for Germany through the official portal. The application process includes completing the online form in <strong>English or German</strong>, uploading a passport-style photo and a scanned copy of your passport, and paying a <strong>consular fee</strong>. The visa is typically valid for 90 days.
        </p>
    </div>
</section>

<section class="emergency" style="padding: 4rem 10%;">
    <h2 style="color: var(--dark-blue); font-size: 1.8rem; font-weight: 700; margin-bottom: 2rem;">EMERGENCY PHONE NUMBERS</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
        <div style="background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 5px 15px rgba(0,0,0,0.03); display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 style="font-size: 1rem; color: var(--dark-blue); margin: 0 0 0.5rem;">Police / Fire / Emergency</h3>
                <div style="font-size: 2.2rem; font-weight: 700; color: var(--primary-blue);">112</div>
            </div>
            <div style="font-size: 2rem;">🛡️</div>
        </div>
        <div style="background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 5px 15px rgba(0,0,0,0.03); display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 style="font-size: 1rem; color: var(--dark-blue); margin: 0 0 0.5rem;">Medical Emergency</h3>
                <div style="font-size: 2.2rem; font-weight: 700; color: var(--primary-blue);">116 117</div>
            </div>
            <div style="font-size: 2rem;">🏥</div>
        </div>
        <div style="background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 5px 15px rgba(0,0,0,0.03); display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3 style="font-size: 1rem; color: var(--dark-blue); margin: 0 0 0.5rem;">Forum Support Team</h3>
                <div style="font-size: 2.2rem; font-weight: 700; color: var(--primary-blue);">+49 30 12345678</div>
            </div>
            <div style="font-size: 2rem;">🎧</div>
        </div>
    </div>
</section>

<section class="agenda" style="padding: 4rem 10%;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem;">
        <h2 style="color: var(--dark-blue); font-size: 2rem; font-weight: 700;">AGENDA</h2>
        <a href="#" style="color: var(--primary-blue); font-weight: 600; text-decoration: none;">View all &rsaquo;</a>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
        <!-- Day 1 Card -->
        <div style="background: #f8f9fa; border-radius: 12px; padding: 2rem;">
            <div style="display: flex; align-items: center; margin-bottom: 2rem;">
                <span style="background: var(--primary-blue); color: white; padding: 0.4rem 1rem; border-radius: 20px; font-weight: 700; margin-right: 1rem;">Day 1</span>
                <span style="font-weight: 600; color: #666;">2026-06-15</span>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                <div style="background: white; padding: 1.2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
                    <div style="font-size: 0.9rem; font-weight: 700; color: #333; margin-bottom: 0.3rem;">09:00 - 10:10</div>
                    <div style="color: #666; font-size: 0.95rem;">Opening Keynote: The Crypto Landscape in 2026</div>
                </div>
                <div style="background: white; padding: 1.2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
                    <div style="font-size: 0.9rem; font-weight: 700; color: #333; margin-bottom: 0.3rem;">10:10 - 10:30</div>
                    <div style="color: #666; font-size: 0.95rem;">Coffee Break & Networking</div>
                </div>
                <div style="background: white; padding: 1.2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
                    <div style="font-size: 0.9rem; font-weight: 700; color: #333; margin-bottom: 0.3rem;">10:30 - 12:30</div>
                    <div style="color: #666; font-size: 0.95rem;">Panel: Regulation vs Innovation in Germany</div>
                </div>
            </div>
        </div>

        <!-- Day 2 Card -->
        <div style="background: #f8f9fa; border-radius: 12px; padding: 2rem;">
            <div style="display: flex; align-items: center; margin-bottom: 2rem;">
                <span style="background: var(--primary-blue); color: white; padding: 0.4rem 1rem; border-radius: 20px; font-weight: 700; margin-right: 1rem;">Day 2</span>
                <span style="font-weight: 600; color: #666;">2026-06-16</span>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                <div style="background: white; padding: 1.2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
                    <div style="font-size: 0.9rem; font-weight: 700; color: #333; margin-bottom: 0.3rem;">09:00 - 10:00</div>
                    <div style="color: #666; font-size: 0.95rem;">Workshop: Building Web3 Apps for the Masses</div>
                </div>
                <div style="background: white; padding: 1.2rem; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.02);">
                    <div style="font-size: 0.9rem; font-weight: 700; color: #333; margin-bottom: 0.3rem;">10:00 - 13:00</div>
                    <div style="color: #666; font-size: 0.95rem;">Hackathon: Sustainable Blockchain Solutions</div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const targetDate = new Date("<?php echo get_target_date(); ?>").getTime();
    
    const updateCountdown = setInterval(() => {
        const now = new Date().getTime();
        const distance = targetDate - now;
        
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        document.getElementById("days").innerText = days.toString().padStart(2, '0');
        document.getElementById("hours").innerText = hours.toString().padStart(2, '0');
        document.getElementById("minutes").innerText = minutes.toString().padStart(2, '0');
        document.getElementById("seconds").innerText = seconds.toString().padStart(2, '0');
        
        if (distance < 0) {
            clearInterval(updateCountdown);
            document.getElementById("countdown").innerHTML = "EVENT STARTED";
        }
    }, 1000);
</script>

<?php include 'footer.php'; ?>