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

    <!-- High-End Flip Countdown -->
    <div style="background: #000; border-radius: 20px; padding: 60px 20px; width: 95%; max-width: 1000px; margin: 0 auto 50px; box-shadow: 0 30px 60px rgba(0,0,0,0.5); text-align: center; position: relative; overflow: hidden;">
        
        <div id="countdown" style="display: flex; justify-content: center; gap: clamp(10px, 2vw, 30px); margin-bottom: 50px; flex-wrap: wrap;">
            <!-- Days -->
            <div class="countdown-group">
                <div class="flip-card" data-days>
                    <div class="top">00</div>
                    <div class="bottom">00</div>
                    <div class="leaf">
                        <div class="leaf-front">00</div>
                        <div class="leaf-back">00</div>
                    </div>
                </div>
                <span class="label">Days</span>
            </div>
            <!-- Hours -->
            <div class="countdown-group">
                <div class="flip-card" data-hours>
                    <div class="top">00</div>
                    <div class="bottom">00</div>
                    <div class="leaf">
                        <div class="leaf-front">00</div>
                        <div class="leaf-back">00</div>
                    </div>
                </div>
                <span class="label">Hours</span>
            </div>
            <!-- Minutes -->
            <div class="countdown-group">
                <div class="flip-card" data-minutes>
                    <div class="top">00</div>
                    <div class="bottom">00</div>
                    <div class="leaf">
                        <div class="leaf-front">00</div>
                        <div class="leaf-back">00</div>
                    </div>
                </div>
                <span class="label">Minutes</span>
            </div>
            <!-- Seconds -->
            <div class="countdown-group">
                <div class="flip-card" data-seconds>
                    <div class="top">00</div>
                    <div class="bottom">00</div>
                    <div class="leaf">
                        <div class="leaf-front">00</div>
                        <div class="leaf-back">00</div>
                    </div>
                </div>
                <span class="label">Seconds</span>
            </div>
        </div>
        
        <div style="margin-top: 20px; position: relative; z-index: 2;">
            <a href="apply" style="display: inline-block; background: #fff; color: #222; padding: 25px 60px; font-size: 1.8rem; font-weight: 800; text-transform: uppercase; text-decoration: none; border-radius: 8px; font-family: 'Montserrat', sans-serif; letter-spacing: 2px; transition: all 0.3s ease; box-shadow: 0 10px 30px rgba(255,255,255,0.1);">Register Here</a>
        </div>
    </div>

    <style>
        .countdown-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }
        .countdown-group .label {
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .flip-card {
            position: relative;
            width: clamp(80px, 15vw, 140px);
            height: clamp(100px, 18vw, 180px);
            background-color: #1a1a1a;
            border-radius: 12px;
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 800;
            line-height: clamp(100px, 18vw, 180px);
            color: #fff;
            font-family: 'Montserrat', sans-serif;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .flip-card .top,
        .flip-card .bottom,
        .flip-card .leaf-front,
        .flip-card .leaf-back {
            position: absolute;
            left: 0;
            width: 100%;
            height: 50%;
            overflow: hidden;
            background-color: #222;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
        }
        .flip-card .top,
        .flip-card .leaf-front {
            top: 0;
            border-radius: 12px 12px 0 0;
            line-height: clamp(100px, 18vw, 180px);
            border-bottom: 1px solid rgba(0,0,0,0.3);
        }
        .flip-card .bottom,
        .flip-card .leaf-back {
            bottom: 0;
            border-radius: 0 0 12px 12px;
            line-height: 0;
            background-color: #1e1e1e;
        }
        .flip-card .leaf {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
            z-index: 10;
            transition: transform 0.6s;
            transform-origin: bottom;
            transform-style: preserve-3d;
        }
        .flip-card .leaf-back {
            transform: rotateX(-180deg);
        }
        .flip-card.flipping .leaf {
            transform: rotateX(-180deg);
        }
        /* Visual depth enhancements */
        .flip-card::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 2px;
            background: rgba(0,0,0,0.6);
            z-index: 20;
            transform: translateY(-50%);
        }
    </style>

    <script>
        const targetDate = new Date('June 15, 2026 09:00:00').getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const diff = targetDate - now;

            if (diff <= 0) return;

            const d = Math.floor(diff / (1000 * 60 * 60 * 24));
            const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const s = Math.floor((diff % (1000 * 60)) / 1000);

            flip('days', d);
            flip('hours', h);
            flip('minutes', m);
            flip('seconds', s);
        }

        const previousValues = { days: -1, hours: -1, minutes: -1, seconds: -1 };

        function flip(unit, value) {
            const formattedValue = value.toString().padStart(2, '0');
            if (previousValues[unit] === formattedValue) return;

            const card = document.querySelector(`[data-${unit}]`);
            const top = card.querySelector('.top');
            const bottom = card.querySelector('.bottom');
            const leafFront = card.querySelector('.leaf-front');
            const leafBack = card.querySelector('.leaf-back');

            const prevValue = previousValues[unit] === -1 ? formattedValue : previousValues[unit];
            
            // Set initial states
            top.innerText = formattedValue;
            leafFront.innerText = prevValue;
            leafBack.innerText = formattedValue;
            bottom.innerText = prevValue;

            // Trigger animation
            card.classList.remove('flipping');
            void card.offsetWidth; // force reflow
            card.classList.add('flipping');

            // Cleanup after animation
            setTimeout(() => {
                bottom.innerText = formattedValue;
                card.classList.remove('flipping');
            }, 600);

            previousValues[unit] = formattedValue;
        }

        setInterval(updateCountdown, 1000);
        updateCountdown();
    </script>

    <!-- High-End Info Cards -->
    <div class="info-cards-scroll-container" style="max-width: 1200px; margin: 0 auto 40px; padding: 0 20px;">
        <div class="info-cards-grid">
            <div class="info-card">
                <div class="info-card-icon">
                    <svg viewBox="0 0 24 24" style="width: 26px; height: 26px; fill: #2D236E;"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                </div>
                <div class="info-card-label">Event Location</div>
                <div style="text-align: center;"><div class="info-card-value">Berlin, Germany</div></div>
            </div>
            <div class="info-card">
                <div class="info-card-icon">
                    <svg viewBox="0 0 24 24" style="width: 26px; height: 26px; fill: #2D236E;"><path d="M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z"/></svg>
                </div>
                <div class="info-card-label">Event Dates</div>
                <div style="text-align: center;"><div class="info-card-value">May 7–10, 2026</div></div>
            </div>
            <div class="info-card">
                <div class="info-card-icon">
                    <svg viewBox="0 0 24 24" style="width: 26px; height: 26px; fill: #2D236E;"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                </div>
                <div class="info-card-label">Total Seats</div>
                <div style="text-align: center;"><div class="info-card-value">200</div></div>
            </div>
        </div>
    </div>

        
        /* Info Cards Styling */
        .info-cards-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
        }
        .info-card {
            background: #2D236E;
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px;
            padding: 35px 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            border-bottom: 5px solid #FFD700;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
            width: 100%;
        }
        .info-card-icon {
            background: #FFD700;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .info-card-label {
            color: white;
            font-size: 0.9rem;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 12px;
            letter-spacing: 1.5px;
            text-align: center;
            opacity: 0.9;
        }
        .info-card-value {
            background: #FFD700;
            color: #2D236E;
            padding: 8px 20px;
            border-radius: 10px;
            font-weight: 900;
            font-size: 1.1rem;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
        }

        @media (min-width: 768px) {
            .info-cards-grid {
                flex-direction: row;
                justify-content: center;
                gap: 30px;
            }
            .info-card {
                flex: 1;
                max-width: 350px;
            }
        }
    </style>

    <!-- News & Updates Section (Now after countdown) -->
    <section style="padding: 20px 20px 60px; background: #fff;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 30px; flex-wrap: wrap; gap: 15px;">
                <h2 class="montserrat" style="font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 900; color: #000; text-transform: uppercase; margin: 0;">Latest News</h2>
                <a href="news" style="color: #00aeef; font-weight: 700; text-decoration: none; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;">View All Posts <span style="font-size: 1.2rem;">→</span></a>
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
                        <a href="news_detail?id=<?php echo $item['id']; ?>" style="margin-top: auto; color: #000; font-weight: 800; text-decoration: none; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; display: inline-flex; align-items: center; gap: 8px;">
                            Read Full Story <span style="font-size: 1.1rem;">+</span>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</section>

<section id="seats-section" class="participation-seats" style="padding: 60px 20px; text-align: center; background: #fff;">
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

        <div style="margin-top: 30px; display: flex; justify-content: center; width: 100%;">
            <a href="apply" class="btn-apply-special" style="max-width: 900px; padding: 18px 0;">Apply Now!</a>
        </div>
    </div>
</section>

<!-- Guaranteed Categories Section -->
<section style="background: url('attached_assets/istock-486585530_1768550282103.jpg') center/cover no-repeat fixed; color: white; text-align: center; position: relative;">
    <div style="background: rgba(255, 255, 255, 0.15); width: 100%; padding: 60px 20px; backdrop-filter: blur(5px);">
        <div style="background: #2D236E; border-radius: 12px; padding: 20px; max-width: 700px; margin: 0 auto 30px; border: 1px solid rgba(255, 255, 255, 0.2); color: white; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
            <h2 class="montserrat" style="font-size: clamp(1.4rem, 3.5vw, 2.2rem); margin-bottom: 8px; font-weight: 800; text-transform: uppercase;">Guaranteed Categories</h2>
            <h3 class="montserrat" style="font-size: clamp(1rem, 2.5vw, 1.5rem); margin-bottom: 12px; font-weight: 700;">(Confirmed Seats)</h3>
            <p style="font-size: 0.95rem; line-height: 1.5; opacity: 1; margin-bottom: 0;">
                These categories offer guaranteed participation with no competitive selection. Applicants secure their seat upon completing their registration.
            </p>
        </div>

    <div style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); display: grid; gap: 20px; max-width: 900px; margin: 0 auto 40px;">
        <!-- Forum Admission Detail -->
        <div style="background: #2D236E; border-radius: 16px; padding: 30px 20px; border: 1px solid rgba(255, 255, 255, 0.1); text-align: left; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
            <div style="font-size: 2rem; font-weight: 800; margin-bottom: 8px; text-align: center;">$199.99</div>
            <h3 class="montserrat" style="font-size: 1.5rem; font-weight: 900; margin-bottom: 20px; text-transform: uppercase; text-align: center;">Forum Admission</h3>
            <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 15px;">
                <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.8rem; line-height: 1.6;">
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🔑</span> Full access to all conference sessions</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">📜</span> Official Certificate from CGDL</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🎒</span> Delegate kit & materials</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🍽️</span> Daily lunch & refreshments</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🗺️</span> City tour included</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🛂</span> Visa support letter</li>
                </ul>
                <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); margin: 15px 0; padding-top: 10px;">
                    <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; text-align: center; color: rgba(255, 255, 255, 0.7);">Not Included</h4>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.75rem;">
                        <li style="margin-bottom: 5px; display: flex; gap: 10px;"><span style="color: #FFD700;">✈️</span> Airfare</li>
                        <li style="display: flex; gap: 10px;"><span style="color: #FFD700;">🏨</span> Accommodation</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Self Funded Detail -->
        <div style="background: #2D236E; border-radius: 16px; padding: 30px 20px; border: 1px solid rgba(255, 255, 255, 0.1); text-align: left; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
            <div style="font-size: 2rem; font-weight: 800; margin-bottom: 8px; text-align: center;">$499.99</div>
            <h3 class="montserrat" style="font-size: 1.5rem; font-weight: 900; margin-bottom: 20px; text-transform: uppercase; text-align: center;">Self-Funded Category</h3>
            <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 15px;">
                <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.8rem; line-height: 1.6;">
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🔑</span> Full access to all conference sessions</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🏨</span> 4-Star Hotel Accommodation (3 nights)</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🍽️</span> Full board meals & breakfast</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">📜</span> Official Certificate from CGDL</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🎒</span> Delegate kit & materials</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🗺️</span> Guided city tour</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🛂</span> Priority visa support</li>
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

    <div style="margin-top: 30px; display: flex; justify-content: center; width: 100%;">
        <a href="apply" class="btn-apply-special" style="max-width: 900px; padding: 18px 0;">Apply Now!</a>
    </div>
</section>

<?php
}
include 'footer.php';
?>