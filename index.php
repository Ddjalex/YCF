<?php
require_once 'functions.php';
include 'header.php';
?>

<section class="hero" style="background: linear-gradient(to right, rgba(0, 51, 102, 0.9) 0%, rgba(0, 51, 102, 0.4) 40%, rgba(0, 0, 0, 0.2) 100%), url('attached_assets/image_1767436778420.png'); background-size: cover; background-position: center; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: flex-start; color: white; text-align: left; padding: 0 10%;">
    <div style="max-width: 900px; margin-top: 110px;">
        <h1 style="font-size: 4rem; margin-bottom: 0.5rem; font-weight: 800; line-height: 1; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">Young Peacebuilders Program 2026</h1>
        <p style="font-size: 1.8rem; margin-bottom: 1.5rem; font-weight: 400; opacity: 0.9;">Shaping the Future through Collective Leadership & Inner Peacebuilding</p>
        <p style="font-size: 1.2rem; margin-bottom: 4rem; font-weight: 400; opacity: 0.8; max-width: 800px;">
            Application Period: Feb 17 – Mid-March, 2026<br>
            Berlin, Germany
        </p>
        
        <div style="background: rgba(0, 0, 0, 0.4); backdrop-filter: blur(15px); border-radius: 8px; padding: 0; display: flex; align-items: center; border: 1px solid rgba(255, 255, 255, 0.1); box-shadow: 0 10px 40px rgba(0,0,0,0.3); width: fit-content; overflow: hidden; height: 50px; margin-left: 0;">
            <div style="background: #00aeef; padding: 0 1rem; margin-right: 0; flex-shrink: 0; height: 100%; display: flex; flex-direction: column; justify-content: center; min-height: 50px;">
                <span style="font-size: 0.65rem; font-weight: 700; text-transform: uppercase; color: white; line-height: 1.1; white-space: nowrap;">Left until the Program starts:</span>
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
                <a href="#" style="background: #00aeef; color: white; text-decoration: none; padding: 0.4rem 1rem; border-radius: 4px; font-weight: 700; font-size: 0.8rem; transition: all 0.3s; text-transform: uppercase;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">Apply Now</a>
            </div>
        </div>
    </div>
</section>

<section class="program-context" style="padding: 6rem 10%; background: #fff; position: relative;">
    <div style="max-width: 1000px; margin: 0 auto;">
        <h2 style="color: var(--dark-blue); font-size: 2.5rem; font-weight: 800; margin-bottom: 2rem; border-left: 5px solid var(--primary-blue); padding-left: 1.5rem;">The Young Peacebuilders Program</h2>
        <p style="font-size: 1.2rem; line-height: 1.8; color: #444; margin-bottom: 2rem;">
            The Young Peacebuilders Program is a scholarship-based initiative designed for young leaders to learn collective leadership skills and "Inner Peacebuilding". This program empowers participants to resolve conflicts and foster collaboration in their communities and beyond.
        </p>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 3rem;">
            <div style="background: #f8fbff; padding: 2rem; border-radius: 12px; border: 1px solid #e6f4fa;">
                <h3 style="color: var(--primary-blue); margin-bottom: 1rem;">Scholarship-Based</h3>
                <p style="font-size: 0.95rem; color: #666;">Fully supported program for selected young leaders worldwide.</p>
            </div>
            <div style="background: #f8fbff; padding: 2rem; border-radius: 12px; border: 1px solid #e6f4fa;">
                <h3 style="color: var(--primary-blue); margin-bottom: 1rem;">Inner Peacebuilding</h3>
                <p style="font-size: 0.95rem; color: #666;">Developing internal resilience and mindfulness for better leadership.</p>
            </div>
            <div style="background: #f8fbff; padding: 2rem; border-radius: 12px; border: 1px solid #e6f4fa;">
                <h3 style="color: var(--primary-blue); margin-bottom: 1rem;">Conflict Resolution</h3>
                <p style="font-size: 0.95rem; color: #666;">Practical skills to foster collaboration and resolve complex disputes.</p>
            </div>
        </div>
    </div>
</section>

<section class="news" style="padding: 4rem 10%; background: #fcfcfc;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem;">
        <h2 style="color: var(--dark-blue); font-size: 2rem; font-weight: 700;">LATEST UPDATES</h2>
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
        <h2 style="color: var(--dark-blue); font-size: 2rem; font-weight: 700;">Accommodation near Berlin Venue</h2>
        <a href="#" style="color: var(--primary-blue); font-weight: 600; text-decoration: none;">View all &rsaquo;</a>
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
        <?php 
        $hotels = get_hotels();
        if (empty($hotels)) {
            echo "<p style='color: #666;'>No accommodations listed yet.</p>";
        }
        foreach ($hotels as $hotel): ?>
        <div style="background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
            <div style="height: 200px; background-image: url('<?php echo $hotel['photo_url'] ?: 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=80'; ?>'); background-size: cover; background-position: center; position: relative;">
                <?php if ($hotel['video_url']): ?>
                <div style="position: absolute; top: 10px; right: 10px; background: rgba(0,0,0,0.6); color: white; padding: 5px 10px; border-radius: 20px; font-size: 0.7rem; display: flex; align-items: center; gap: 5px; cursor: pointer;" onclick="window.open('<?php echo $hotel['video_url']; ?>', '_blank')">
                    <span>▶</span> Video Tour
                </div>
                <?php endif; ?>
            </div>
            <div style="padding: 1.5rem;">
                <div style="color: #ffb400; font-size: 0.8rem; margin-bottom: 0.5rem;">
                    <?php echo str_repeat('★', $hotel['stars']); ?>
                </div>
                <h3 style="font-size: 1.2rem; color: var(--dark-blue); margin: 0 0 0.5rem; height: 1.4rem; overflow: hidden;"><?php echo htmlspecialchars($hotel['name']); ?></h3>
                <p style="font-size: 0.85rem; color: #666; margin-bottom: 1.5rem; height: 2.5rem; overflow: hidden;"><?php echo htmlspecialchars($hotel['description']); ?></p>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <a href="<?php echo $hotel['map_url'] ?: '#'; ?>" target="_blank" style="color: #00aeef; font-size: 0.85rem; text-decoration: none; display: flex; align-items: center; gap: 0.5rem; background: #f0faff; padding: 0.5rem 1rem; border-radius: 6px; font-weight: 600;">
                        <span>📍</span> See on map
                    </a>
                    <a href="#" style="color: #333; font-size: 0.85rem; text-decoration: none; font-weight: 600;">View Detail</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="visa" style="padding: 4rem 10%; background: #f8fbff; position: relative; overflow: hidden;">
    <h2 style="color: var(--dark-blue); font-size: 1.8rem; font-weight: 700; margin-bottom: 2rem;">VISA REQUIREMENTS</h2>
    <div style="background: white; padding: 2.5rem; border-radius: 12px; box-shadow: 0 5px 25px rgba(0,0,0,0.05); position: relative; z-index: 1;">
        <p style="font-size: 1rem; color: #444; margin-bottom: 1.5rem; line-height: 1.8;">
            Obtaining a visa is the responsibility of the participant. Please check the visa requirements for your nationality at the official website: <a href="https://www.auswaertiges-amt.de/en/visa-service" style="color: var(--primary-blue); font-weight: 600;">Germany Federal Foreign Office</a>.
        </p>
    </div>
</section>

<?php include 'footer.php'; ?>