<?php
require_once 'functions.php';
include 'header.php';
?>

<section class="hero" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('attached_assets/image_1767436778420.png'); background-size: cover; background-position: center; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: flex-start; color: white; text-align: left; padding: 0 10%;">
    <div style="max-width: 900px; margin-top: 100px;">
        <h1 style="font-size: 4rem; margin-bottom: 0.5rem; font-weight: 800; line-height: 1; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">Youth Crypto Forum Germany 2026</h1>
        <p style="font-size: 1.8rem; margin-bottom: 1.5rem; font-weight: 400; opacity: 0.9;">Shaping the Future of Digital Economy & Blockchain Technology</p>
        <p style="font-size: 1.2rem; margin-bottom: 4rem; font-weight: 400; opacity: 0.8; max-width: 800px;">June 15–17, 2026<br>Berlin, Germany</p>
        
        <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(15px); border-radius: 12px; padding: 0; display: flex; align-items: center; border: 1px solid rgba(255, 255, 255, 0.1); box-shadow: 0 10px 40px rgba(0,0,0,0.3); width: 100%; max-width: 1000px; overflow: hidden; height: 100px;">
            <div style="background: #00aeef; padding: 0 2rem; margin-right: 0; flex-shrink: 0; height: 100%; display: flex; flex-direction: column; justify-content: center; width: 220px;">
                <span style="font-size: 0.9rem; font-weight: 700; text-transform: uppercase; color: white; line-height: 1.2;">Left until the Forum starts:</span>
            </div>
            
            <div id="countdown" style="display: flex; gap: 2rem; align-items: center; flex-grow: 1; justify-content: center; padding: 0 3rem; color: white; font-family: Inter, Arial, sans-serif;">
                <div class="time-block" style="text-align: center;">
                    <span id="days" style="display: block; font-size: 2.2rem; font-weight: 700; line-height: 1;">00</span>
                    <span style="text-transform: uppercase; font-size: 0.7rem; font-weight: 600; opacity: 0.8;">Days</span>
                </div>
                <div style="font-size: 1.8rem; font-weight: 300; opacity: 0.4;">:</div>
                <div class="time-block" style="text-align: center;">
                    <span id="hours" style="display: block; font-size: 2.2rem; font-weight: 700; line-height: 1;">00</span>
                    <span style="text-transform: uppercase; font-size: 0.7rem; font-weight: 600; opacity: 0.8;">Hours</span>
                </div>
                <div style="font-size: 1.8rem; font-weight: 300; opacity: 0.4;">:</div>
                <div class="time-block" style="text-align: center;">
                    <span id="minutes" style="display: block; font-size: 2.2rem; font-weight: 700; line-height: 1;">00</span>
                    <span style="text-transform: uppercase; font-size: 0.7rem; font-weight: 600; opacity: 0.8;">Minutes</span>
                </div>
                <div style="font-size: 1.8rem; font-weight: 300; opacity: 0.4;">:</div>
                <div class="time-block" style="text-align: center;">
                    <span id="seconds" style="display: block; font-size: 2.2rem; font-weight: 700; line-height: 1;">00</span>
                    <span style="text-transform: uppercase; font-size: 0.7rem; font-weight: 600; opacity: 0.8;">Seconds</span>
                </div>
            </div>
            
            <div style="padding: 0 1rem; flex-shrink: 0; height: 100%; display: flex; align-items: center; background: rgba(0,0,0,0.2);">
                <a href="#" style="background: #00aeef; color: white; text-decoration: none; padding: 1.2rem 3rem; border-radius: 8px; font-weight: 800; font-size: 1.2rem; transition: all 0.3s; text-transform: uppercase;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">Register</a>
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
                <div style="height: 200px; background: #eee; background-image: url('https://images.unsplash.com/photo-1621761191319-c6fb62004009?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'); background-size: cover;"></div>
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