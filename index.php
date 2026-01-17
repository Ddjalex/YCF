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
        $display_video = $hero_video;
        // Logic to ensure the video source is correctly formatted for the browser
        if (strpos($display_video, 'http') !== 0 && strpos($display_video, 'attached_assets') !== 0) {
            // Ensure local paths like 'uploads/file.mp4' are correctly resolved for Replit
            $display_video = ltrim($display_video, '/');
            $display_video_root = '/' . $display_video;
        } else {
            $display_video_root = $display_video;
        }
        ?>
        <video key="<?php echo htmlspecialchars($display_video_root); ?>" autoplay loop muted playsinline preload="metadata" style="width: 100%; height: 100%; object-fit: cover; display: block; background: #000;" oncanplay="this.play()">
            <source src="<?php echo htmlspecialchars($display_video_root); ?>" type="video/mp4">
            <source src="<?php echo htmlspecialchars($display_video); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- High-End 3D Flip Countdown -->
    <div style="background: #000; border-radius: clamp(8px, 2vw, 12px); padding: clamp(20px, 4vw, 40px) 10px; width: 95%; max-width: 700px; margin: 0 auto 25px; box-shadow: 0 20px 50px rgba(0,0,0,0.6); text-align: center; position: relative; overflow: hidden; border: 1px solid rgba(255,255,255,0.05);">
        <div class="flip-countdown" style="display: flex; gap: clamp(12px, 3vw, 24px); justify-content: center; perspective: 1000px;">
            <div class="time-box">
                <div class="flip-card" id="card-days">
                    <div class="top">00</div>
                    <div class="bottom">00</div>
                    <div class="leaf"><div class="leaf-front">00</div><div class="leaf-rear">00</div></div>
                </div>
                <div class="flip-label">DAYS</div>
            </div>
            <div class="time-box">
                <div class="flip-card" id="card-hours">
                    <div class="top">00</div>
                    <div class="bottom">00</div>
                    <div class="leaf"><div class="leaf-front">00</div><div class="leaf-rear">00</div></div>
                </div>
                <div class="flip-label">HOURS</div>
            </div>
            <div class="time-box">
                <div class="flip-card" id="card-minutes">
                    <div class="top">00</div>
                    <div class="bottom">00</div>
                    <div class="leaf"><div class="leaf-front">00</div><div class="leaf-rear">00</div></div>
                </div>
                <div class="flip-label">MINS</div>
            </div>
            <div class="time-box">
                <div class="flip-card" id="card-seconds">
                    <div class="top">00</div>
                    <div class="bottom">00</div>
                    <div class="leaf"><div class="leaf-front">00</div><div class="leaf-rear">00</div></div>
                </div>
                <div class="flip-label">SECS</div>
            </div>
        </div>
        
        <div style="position: relative; z-index: 2; margin-top: 30px;">
            <a href="#seats-section" class="btn-apply-style">Register Here</a>
        </div>
    </div>

    <style>
        :root {
            --flip-bg: #1a1a1a;
            --flip-text: #ffffff;
            --flip-label: #FFD700;
            --flip-border: rgba(255,255,255,0.1);
        }

        .time-box { text-align: center; }
        .flip-label { 
            margin-top: 12px; 
            font-size: clamp(8px, 2vw, 12px); 
            font-weight: 800; 
            color: var(--flip-label); 
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .flip-card {
            position: relative;
            width: clamp(50px, 18vw, 110px);
            height: clamp(65px, 24vw, 140px);
            font-size: clamp(28px, 10vw, 70px);
            font-weight: 900;
            line-height: clamp(65px, 24vw, 140px);
            background-color: var(--flip-bg);
            border-radius: 6px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.8);
            perspective: 1000px;
        }

        .flip-card .top,
        .flip-card .bottom,
        .flip-card .leaf-front,
        .flip-card .leaf-rear {
            position: absolute;
            left: 0;
            width: 100%;
            height: 50%;
            overflow: hidden;
            background-color: var(--flip-bg);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            box-sizing: border-box;
            color: var(--flip-text);
        }

        .flip-card .top,
        .flip-card .leaf-front {
            top: 0;
            border-radius: 6px 6px 0 0;
            line-height: clamp(65px, 24vw, 140px);
            border-bottom: 1px solid rgba(0,0,0,0.5);
            z-index: 2;
        }

        .flip-card .bottom,
        .flip-card .leaf-rear {
            bottom: 0;
            border-radius: 0 0 6px 6px;
            line-height: 0;
            z-index: 1;
        }

        /* Improved shadows for depth */
        .flip-card .bottom {
            background-image: linear-gradient(to bottom, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0) 20%);
        }

        .flip-card .leaf {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 50%;
            z-index: 10;
            transform-origin: bottom;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            transform-style: preserve-3d;
        }

        .flip-card .leaf-rear {
            transform: rotateX(-180deg);
            background-color: var(--flip-bg);
            z-index: 11;
        }

        .flip-card .leaf-front {
            z-index: 12;
        }

        /* Flip Position: Up to Down */
        .flip-card.flipping .leaf {
            transform: rotateX(-180deg);
        }

        /* Shadow animation on the leaf */
        .flip-card.flipping .leaf-front {
            animation: shadow-top 0.6s ease-in forwards;
        }
        .flip-card.flipping .leaf-rear {
            animation: shadow-bottom 0.6s ease-out forwards;
        }

        @keyframes shadow-top {
            0% { background-color: var(--flip-bg); }
            100% { background-color: #000; }
        }
        @keyframes shadow-bottom {
            0% { background-color: #000; }
            100% { background-color: var(--flip-bg); }
        }

        .flip-card::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            height: 1px;
            background: rgba(0,0,0,0.8);
            z-index: 25;
            transform: translateY(-50%);
            box-shadow: 0 1px 2px rgba(255,255,255,0.05);
        }

        /* Mobile specific adjustments */
        @media (max-width: 480px) {
            .flip-countdown {
                gap: 8px;
            }
        }
    </style>

    <script>
        (function() {
            const target = new Date("2026-06-15T09:00:00").getTime();
            
            function updateCard(id, newVal) {
                const card = document.getElementById(id);
                if (!card) return;
                
                const formattedVal = String(newVal).padStart(2, '0');
                const top = card.querySelector('.top');
                const bottom = card.querySelector('.bottom');
                const leafFront = card.querySelector('.leaf-front');
                const leafRear = card.querySelector('.leaf-rear');
                
                if (top.textContent === formattedVal) return;

                // Prepare for flip
                card.classList.remove('flipping');
                void card.offsetWidth; // force reflow
                
                // Front of moving flap shows current number
                leafFront.textContent = top.textContent;
                // Back of moving flap shows new number
                leafRear.textContent = formattedVal;
                // Bottom static half shows current number initially
                bottom.textContent = top.textContent;
                // Top static half shows new number immediately (it's behind the flap)
                top.textContent = formattedVal;
                
                card.classList.add('flipping');
                
                setTimeout(() => {
                    bottom.textContent = formattedVal;
                    card.classList.remove('flipping');
                }, 600);
            }

            function tick() {
                const now = new Date().getTime();
                const d = target - now;
                if (d < 0) return;

                const days = Math.floor(d / (1000 * 60 * 60 * 24));
                const hours = Math.floor((d % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((d % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((d % (1000 * 60)) / 1000);

                updateCard("card-days", days);
                updateCard("card-hours", hours);
                updateCard("card-minutes", minutes);
                updateCard("card-seconds", seconds);
            }

            setInterval(tick, 1000);
            tick();
        })();
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

    <style>
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

    <!-- Visa Invitation Letter Section -->
    <section id="visa-section" style="padding: 60px 20px; background: #fff;">
        <div style="max-width: 1100px; margin: 0 auto; background: #2D236E; border-radius: 20px; overflow: hidden; display: flex; flex-wrap: wrap; box-shadow: 0 20px 50px rgba(0,0,0,0.2);">
            <!-- Content Side -->
            <div style="flex: 1; min-width: 300px; padding: clamp(30px, 5vw, 60px); color: white; text-align: left;">
                <h2 class="montserrat" style="font-size: clamp(2rem, 4vw, 3rem); font-weight: 800; margin-bottom: 20px; text-transform: none;">Visa Invitation Letter</h2>
                <p style="font-size: 1.1rem; line-height: 1.6; opacity: 0.9; margin-bottom: 30px;">
                    Applicants who want to apply early for their visa can request a <strong>Visa Invitation Letter Package</strong> from CGDL.
                </p>
                
                <div style="margin-bottom: 30px;">
                    <span style="text-decoration: line-through; opacity: 0.6; font-size: 1.2rem; margin-right: 10px;">$299.99</span>
                    <span style="font-size: 2.5rem; font-weight: 800; color: #fff;">$99.00</span>
                </div>

                <ul style="list-style: none; padding: 0; margin: 0 0 40px 0; border-top: 1px dashed rgba(255,255,255,0.2);">
                    <li style="padding: 15px 0; border-bottom: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; gap: 12px;">
                        <span style="font-size: 1.2rem;">✉️</span> Official Visa Invitation Letter
                    </li>
                    <li style="padding: 15px 0; border-bottom: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; gap: 12px;">
                        <span style="font-size: 1.2rem;">📋</span> Visa Documents Checklist
                    </li>
                    <li style="padding: 15px 0; border-bottom: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; gap: 12px;">
                        <span style="font-size: 1.2rem;">📄</span> Confirmation of Event Participation
                    </li>
                    <li style="padding: 15px 0; border-bottom: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; gap: 12px;">
                        <span style="font-size: 1.2rem;">🏢</span> Embassy Coordination Assistance
                    </li>
                </ul>

                <p style="font-size: 0.9rem; line-height: 1.5; opacity: 0.8; margin-bottom: 30px;">
                    This option is available to all categories of applicants. Applicants can later upgrade to either forum admission or self funded and the cost of their visa package will be fully adjusted towards the upgrade.
                </p>

                <a href="apply?package=visa_letter" class="btn-apply-style" style="margin-top: 0; width: auto; padding: 15px 50px;">Register NOW!</a>
            </div>
            
            <!-- Image Side -->
            <div style="flex: 1; min-width: 300px; position: relative; overflow: hidden; background: #000;">
                <img src="attached_assets/image_1768640597035.png" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.9;" alt="Berlin Brandenburg Gate">
                <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 40px; background: linear-gradient(transparent, rgba(0,0,0,0.8));">
                    <div style="background: rgba(168, 85, 247, 0.4); backdrop-filter: blur(5px); padding: 15px 30px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.2); color: white; display: inline-block;">
                        <span style="font-weight: 800; font-size: 1.5rem; text-transform: uppercase; letter-spacing: 2px;">SCHENGEN VISA</span>
                    </div>
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
                <div style="font-size: 2rem; font-weight: 800; margin-bottom: 8px; text-align: center;">$34.99</div>
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
                <div style="font-size: 2rem; font-weight: 800; margin-bottom: 8px; text-align: center;">$34.99</div>
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

    <style>
        /* Shared Sliding Animation for Buttons */
        .btn-slide-animation {
            position: relative;
            overflow: hidden;
            display: inline-block;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            z-index: 1;
        }
        
        .btn-slide-animation::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.15);
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            z-index: -1;
        }
        
        .btn-slide-animation:hover::before {
            left: 0;
        }

        .btn-slide-animation:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }
    </style>
    
    <div style="grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); display: grid; gap: 20px; max-width: 900px; margin: 0 auto 40px;">
        <!-- Forum Admission Detail -->
        <div style="background: #2D236E; border-radius: 16px; padding: 30px 20px; border: 1px solid rgba(255, 255, 255, 0.1); text-align: left; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
            <div style="font-size: 2.2rem; font-weight: 800; margin-bottom: 10px; text-align: center;"><span style="text-decoration: line-through; font-size: 1.2rem; opacity: 0.6; margin-right: 10px;">$799.99</span>$599.00</div>
            <h3 class="montserrat" style="font-size: 1.5rem; font-weight: 900; margin-bottom: 20px; text-transform: uppercase; text-align: center;">Forum Admission Category</h3>
            <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 15px;">
                <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                <p style="font-size: 0.85rem; opacity: 0.9; margin-bottom: 15px; text-align: center; line-height: 1.4;">Forum Admission is ideal for participants seeking guaranteed entry without accommodation support. It includes:</p>
                <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.8rem; line-height: 1.6;">
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">✔</span> Guaranteed participation at the Youth Development Forum 2026</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🧬</span> Access to all conference sessions & workshops</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">📜</span> Certificate of Participation from CGDL</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🎒</span> Delegate kit & conference materials</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🗺️</span> Guided city tour of Berlin (historical + diplomatic insights)</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🛂</span> Comprehensive visa support, including visa support letter</li>
                </ul>
                <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); margin: 15px 0; padding-top: 10px;">
                    <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; text-align: center; color: rgba(255, 255, 255, 0.7);">Not Included</h4>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.75rem;">
                        <li style="margin-bottom: 5px; display: flex; gap: 10px;"><span style="color: #FFD700;">✈</span> Airfare</li>
                        <li style="display: flex; gap: 10px;"><span style="color: #FFD700;">🏨</span> Accommodation</li>
                    </ul>
                </div>
            </div>
            <a href="apply?package=forum_admission" class="btn-slide-animation" style="display: block; width: 100%; padding: 18px 0; background: linear-gradient(to right, #000 0%, #a67c00 50%, #cca300 100%); color: #fff; text-align: center; border-radius: 8px; text-decoration: none; font-weight: 700; margin-top: 15px; text-transform: uppercase; font-family: 'Montserrat', sans-serif; letter-spacing: 1px;">APPLY NOW!</a>
        </div>

        <!-- Self Funded Detail -->
        <div style="background: #2D236E; border-radius: 16px; padding: 30px 20px; border: 1px solid rgba(255, 255, 255, 0.1); text-align: left; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
            <div style="font-size: 2.2rem; font-weight: 800; margin-bottom: 10px; text-align: center;"><span style="text-decoration: line-through; font-size: 1.2rem; opacity: 0.6; margin-right: 10px;">$999.99</span>$699.00</div>
            <h3 class="montserrat" style="font-size: 1.5rem; font-weight: 900; margin-bottom: 20px; text-transform: uppercase; text-align: center;">Self-Funded Category</h3>
            <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); padding-top: 15px;">
                <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; text-align: center; color: rgba(255, 255, 255, 0.7);">What's Included</h4>
                <p style="font-size: 0.85rem; opacity: 0.9; margin-bottom: 15px; text-align: center; line-height: 1.4;">The Self-Funded category is an upgraded guaranteed option designed for those who prefer a package that includes accommodation. It includes:</p>
                <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.8rem; line-height: 1.6;">
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">✔</span> Guaranteed participation with priority confirmation</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🏨</span> Accommodation in a premium 4-star hotel (3 nights, 4 days)</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🍽</span> Meals & breakfast</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">📍</span> Access to all conference sessions & workshops</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">📜</span> Certificate of Participation from CGDL</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">📓</span> Delegate kit & materials</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🌍</span> Guided city tour of Berlin</li>
                    <li style="margin-bottom: 8px; display: flex; gap: 8px;"><span style="color: #FFD700;">🛂</span> Comprehensive visa support, including visa support letter</li>
                </ul>
                <div style="border-top: 1px dashed rgba(255, 255, 255, 0.3); margin: 15px 0; padding-top: 10px;">
                    <h4 style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; text-align: center; color: rgba(255, 255, 255, 0.7);">Not Included</h4>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.75rem;">
                        <li style="display: flex; gap: 10px;"><span style="color: #FFD700;">✈</span> Airfare</li>
                    </ul>
                </div>
            </div>
            <a href="apply?package=self_funded" class="btn-slide-animation" style="display: block; width: 100%; padding: 18px 0; background: linear-gradient(to right, #000 0%, #a67c00 50%, #cca300 100%); color: #fff; text-align: center; border-radius: 8px; text-decoration: none; font-weight: 700; margin-top: 15px; text-transform: uppercase; font-family: 'Montserrat', sans-serif; letter-spacing: 1px;">APPLY NOW!</a>
        </div>
    </div>

    <div style="margin-top: 30px; display: flex; justify-content: center; width: 100%;">
    </div>
</section>

<?php
}
include 'footer.php';
?>