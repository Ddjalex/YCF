<?php
require_once 'functions.php';
include 'header.php';
?>

<section class="hero" style="background: linear-gradient(rgba(0,51,102,0.8), rgba(0,51,102,0.8)), url('https://images.unsplash.com/photo-1529107386315-e1a2ed48a620?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80'); background-size: cover; background-position: center; height: 60vh; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; text-align: center; padding: 0 10%;">
    <h1 style="font-size: 3rem; margin-bottom: 1rem;">UNPSF 2025</h1>
    <p style="font-size: 1.2rem; margin-bottom: 2rem; max-width: 800px;">Join global leaders in shaping the future of international peace and security cooperation.</p>
    
    <div id="countdown" style="display: flex; gap: 2rem;">
        <div class="time-block">
            <span id="days" style="display: block; font-size: 2.5rem; font-weight: 700;">00</span>
            <span style="text-transform: uppercase; font-size: 0.8rem;">Days</span>
        </div>
        <div class="time-block">
            <span id="hours" style="display: block; font-size: 2.5rem; font-weight: 700;">00</span>
            <span style="text-transform: uppercase; font-size: 0.8rem;">Hours</span>
        </div>
        <div class="time-block">
            <span id="minutes" style="display: block; font-size: 2.5rem; font-weight: 700;">00</span>
            <span style="text-transform: uppercase; font-size: 0.8rem;">Minutes</span>
        </div>
        <div class="time-block">
            <span id="seconds" style="display: block; font-size: 2.5rem; font-weight: 700;">00</span>
            <span style="text-transform: uppercase; font-size: 0.8rem;">Seconds</span>
        </div>
    </div>
</section>

<section class="news" style="padding: 4rem 5%;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h2 style="color: var(--dark-blue); border-left: 5px solid var(--primary-blue); padding-left: 1rem;">Latest News</h2>
        <a href="#" style="color: var(--primary-blue); font-weight: 600;">View All News &rarr;</a>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
        <?php foreach (get_latest_news() as $item): ?>
            <div style="background: white; border: 1px solid #eee; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="padding: 1.5rem;">
                    <span style="background: var(--light-blue); color: var(--primary-blue); font-size: 0.75rem; font-weight: 700; padding: 0.3rem 0.6rem; border-radius: 4px; text-transform: uppercase;"><?php echo $item['category']; ?></span>
                    <h3 style="color: var(--dark-blue); margin: 1rem 0 0.5rem;"><?php echo $item['title']; ?></h3>
                    <p style="font-size: 0.85rem; color: #888; margin-bottom: 1rem;"><?php echo $item['date']; ?></p>
                    <p><?php echo $item['summary']; ?></p>
                    <a href="#" style="display: inline-block; margin-top: 1rem; color: var(--primary-blue); font-weight: 600; text-decoration: none;">Read More</a>
                </div>
            </div>
        <?php endforeach; ?>
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