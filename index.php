<?php
require_once 'functions.php';
include 'header.php';
?>

<section class="hero-container">
    <h1 class="image-text-mask">YOUTH CRYPTO</h1>
    <h2 class="hero-subtitle">Forum Germany 2026</h2>
    <p class="hero-description">Shaping the Future of Digital Economy & Blockchain Technology. June 15–17, 2026 · Berlin, Germany</p>
    
    <div style="background: #f8f9fa; border-radius: 12px; padding: 10px; display: flex; align-items: center; box-shadow: 0 10px 40px rgba(0,0,0,0.05); width: fit-content; overflow: hidden; height: 60px; border: 1px solid #eee;">
        <div style="background: #00aeef; padding: 0 1.5rem; height: 100%; display: flex; align-items: center; border-radius: 8px;">
            <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: white; line-height: 1.1; white-space: nowrap;">Starts in:</span>
        </div>
        
        <div id="countdown" style="display: flex; gap: 1.5rem; align-items: center; padding: 0 2rem; color: #333; font-family: Inter, Arial, sans-serif;">
            <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 4px;">
                <span id="days" style="display: block; font-size: 1.5rem; font-weight: 700; line-height: 1;">00</span>
                <span style="text-transform: uppercase; font-size: 0.65rem; font-weight: 600; color: #999;">d</span>
            </div>
            <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 4px;">
                <span id="hours" style="display: block; font-size: 1.5rem; font-weight: 700; line-height: 1;">00</span>
                <span style="text-transform: uppercase; font-size: 0.65rem; font-weight: 600; color: #999;">h</span>
            </div>
            <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 4px;">
                <span id="minutes" style="display: block; font-size: 1.5rem; font-weight: 700; line-height: 1;">00</span>
                <span style="text-transform: uppercase; font-size: 0.65rem; font-weight: 600; color: #999;">m</span>
            </div>
            <div class="time-block" style="text-align: center; display: flex; align-items: baseline; gap: 4px;">
                <span id="seconds" style="display: block; font-size: 1.5rem; font-weight: 700; line-height: 1;">00</span>
                <span style="text-transform: uppercase; font-size: 0.65rem; font-weight: 600; color: #999;">s</span>
            </div>
        </div>
        
        <a href="#" style="background: #00aeef; color: white; text-decoration: none; padding: 0 2rem; border-radius: 8px; font-weight: 700; font-size: 0.9rem; height: 100%; display: flex; align-items: center; transition: all 0.3s; text-transform: uppercase;" onmouseover="this.style.background='#009edb'" onmouseout="this.style.background='#00aeef'">Register Now</a>
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
        <h2 style="color: var(--dark-blue); font-size: 2rem; font-weight: 700;">List of hotels located near UNPSF 2026 event</h2>
        <a href="#" style="color: var(--primary-blue); font-weight: 600; text-decoration: none;">View all &rsaquo;</a>
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
        <?php 
        $hotels = get_hotels();
        if (empty($hotels)) {
            echo "<p style='color: #666;'>No hotels listed yet.</p>";
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

</section>

<section class="weather" style="padding: 4rem 10%; background: #f0f7ff;">
    <h2 style="color: var(--dark-blue); font-size: 1.8rem; font-weight: 700; margin-bottom: 2rem;">WEATHER IN BERLIN</h2>
    <div style="display: flex; gap: 1rem; overflow-x: auto; padding-bottom: 1rem;">
        <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; padding: 2rem; border-radius: 12px; min-width: 280px; box-shadow: 0 10px 20px rgba(79, 172, 254, 0.3);">
            <div style="font-size: 0.9rem; opacity: 0.9; margin-bottom: 1rem;">Saturday, 03 January 2026 · Berlin</div>
            <div style="display: flex; align-items: center; gap: 1.5rem;">
                <div style="font-size: 3rem;">☀️</div>
                <div>
                    <div style="font-size: 2.5rem; font-weight: 700;">2.4° C</div>
                    <div style="font-size: 1rem; opacity: 0.9;">Clear Sky</div>
                </div>
            </div>
            <div style="margin-top: 1.5rem; font-size: 0.8rem; opacity: 0.7;">Last updated: 11:00 ↻</div>
        </div>
        <?php 
        $forecast = [
            ['time' => '12:00', 'temp' => '2.40°', 'icon' => '☀️'],
            ['time' => '15:00', 'temp' => '3.15°', 'icon' => '🌤️'],
            ['time' => '18:00', 'temp' => '1.20°', 'icon' => '🌙'],
            ['time' => '21:00', 'temp' => '-0.5°', 'icon' => '☁️'],
            ['time' => '00:00', 'temp' => '-1.8°', 'icon' => '☁️'],
            ['time' => '03:00', 'temp' => '-2.5°', 'icon' => '❄️'],
        ];
        foreach ($forecast as $f): ?>
        <div style="background: white; padding: 1.5rem; border-radius: 12px; min-width: 120px; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.03);">
            <div style="font-size: 1.5rem; margin-bottom: 0.5rem;"><?php echo $f['icon']; ?></div>
            <div style="font-size: 1.1rem; font-weight: 700; color: var(--dark-blue);"><?php echo $f['temp']; ?></div>
            <div style="font-size: 0.8rem; color: #888; margin-top: 0.3rem;"><?php echo $f['time']; ?></div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="videos" style="padding: 4rem 10%;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem;">
        <h2 style="color: var(--dark-blue); font-size: 1.8rem; font-weight: 700;">VIDEOS</h2>
        <a href="#" style="color: var(--primary-blue); font-weight: 600; text-decoration: none;">View all &rsaquo;</a>
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 1.5rem;">
        <div style="position: relative; border-radius: 12px; overflow: hidden; aspect-ratio: 16/9; background: #000;">
            <img src="https://images.unsplash.com/photo-1516245834210-c4c142787335?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60px; height: 60px; background: rgba(255,255,255,0.2); backdrop-filter: blur(5px); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; cursor: pointer;">▶</div>
            <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1.5rem; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white;">
                <h3 style="font-size: 1.1rem; margin: 0;">Blockchain Revolution in Germany</h3>
            </div>
        </div>
        <div style="position: relative; border-radius: 12px; overflow: hidden; aspect-ratio: 16/9; background: #000;">
            <img src="https://images.unsplash.com/photo-1526628953301-3e589a6a8b74?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60px; height: 60px; background: rgba(255,255,255,0.2); backdrop-filter: blur(5px); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; cursor: pointer;">▶</div>
            <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1.5rem; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white;">
                <h3 style="font-size: 1.1rem; margin: 0;">Youth Crypto Forum: Highlights 2025</h3>
            </div>
        </div>
        <div style="position: relative; border-radius: 12px; overflow: hidden; aspect-ratio: 16/9; background: #000;">
            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60px; height: 60px; background: rgba(255,255,255,0.2); backdrop-filter: blur(5px); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; cursor: pointer;">▶</div>
            <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1.5rem; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white;">
                <h3 style="font-size: 1.1rem; margin: 0;">Future of Digital Economy in Europe</h3>
            </div>
        </div>
    </div>
</section>

<section class="photos" style="padding: 4rem 10%; background: #fff;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem;">
        <h2 style="color: var(--dark-blue); font-size: 1.8rem; font-weight: 700;">PHOTOS</h2>
        <a href="#" style="color: var(--primary-blue); font-weight: 600; text-decoration: none;">View all &rsaquo;</a>
    </div>
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); grid-template-rows: repeat(2, 200px); gap: 1rem;">
        <div style="grid-column: span 2; grid-row: span 2; border-radius: 12px; overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1585241936939-be4099591252?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div style="border-radius: 12px; overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1540575861501-7cf05a4b125a?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div style="border-radius: 12px; overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1591115765373-520b7a020120?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div style="grid-column: span 2; border-radius: 12px; overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1505373633569-42861a388b39?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
    </div>
</section>

<section class="organizers" style="padding: 4rem 10%; background: #fcfcfc;">
    <h2 style="color: var(--dark-blue); font-size: 1.5rem; font-weight: 700; margin-bottom: 3rem; text-transform: uppercase; letter-spacing: 1px;">Organizers</h2>
    <div style="display: flex; gap: 2rem; align-items: center; overflow-x: auto; padding-bottom: 2rem;">
        <div style="background: white; padding: 1.5rem 2.5rem; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.03); display: flex; align-items: center; gap: 1rem; min-width: 300px;">
            <img src="https://www.unpsf2025.org/assets/banner-logo-9fqzApTB.svg" style="height: 40px;">
            <div style="border-left: 1px solid #eee; padding-left: 1rem;">
                <div style="font-weight: 700; font-size: 0.9rem; color: #333;">United Nations</div>
                <div style="font-size: 0.7rem; color: #777;">Dept. of Economic & Social Affairs</div>
            </div>
        </div>
        <div style="background: white; padding: 1.5rem 2.5rem; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.03); display: flex; align-items: center; gap: 1rem; min-width: 300px;">
            <div style="font-weight: 800; font-size: 1.2rem; color: var(--primary-blue);">GERMANY</div>
            <div style="border-left: 1px solid #eee; padding-left: 1rem;">
                <div style="font-weight: 700; font-size: 0.9rem; color: #333;">Ministry of Digital Affairs</div>
                <div style="font-size: 0.7rem; color: #777;">Federal Republic of Germany</div>
            </div>
        </div>
        <div style="background: white; padding: 1.5rem 2.5rem; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.03); display: flex; align-items: center; gap: 1rem; min-width: 300px;">
            <div style="font-size: 1.5rem;">🌐</div>
            <div style="border-left: 1px solid #eee; padding-left: 1rem;">
                <div style="font-weight: 700; font-size: 0.9rem; color: #333;">European Blockchain Agency</div>
                <div style="font-size: 0.7rem; color: #777;">Digital Future Initiative</div>
            </div>
        </div>
    </div>
</section>

<footer style="background: #000; color: white; padding: 5rem 10% 2rem;">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 4rem;">
        <div style="max-width: 400px;">
            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                <img src="https://www.unpsf2025.org/assets/banner-logo-9fqzApTB.svg" style="height: 50px; filter: brightness(0) invert(1);">
                <div style="border-left: 1px solid rgba(255,255,255,0.2); padding-left: 1rem;">
                    <div style="font-weight: 700; font-size: 1.1rem;">United Nations</div>
                    <div style="font-size: 0.8rem; opacity: 0.6;">Dept. of Economic & Social Affairs</div>
                </div>
            </div>
        </div>
        <div style="display: flex; gap: 4rem;">
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <a href="#" style="color: white; text-decoration: none; font-size: 0.9rem; opacity: 0.7;">About</a>
                <a href="#" style="color: white; text-decoration: none; font-size: 0.9rem; opacity: 0.7;">News</a>
                <a href="#" style="color: white; text-decoration: none; font-size: 0.9rem; opacity: 0.7;">Agenda</a>
            </div>
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <a href="#" style="color: white; text-decoration: none; font-size: 0.9rem; opacity: 0.7;">Speakers</a>
                <a href="#" style="color: white; text-decoration: none; font-size: 0.9rem; opacity: 0.7;">Videos</a>
                <a href="#" style="color: white; text-decoration: none; font-size: 0.9rem; opacity: 0.7;">Photos</a>
            </div>
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <a href="#" style="color: white; text-decoration: none; font-size: 0.9rem; opacity: 0.7;">Information</a>
                <a href="#" style="color: white; text-decoration: none; font-size: 0.9rem; opacity: 0.7;">Media Bank</a>
            </div>
        </div>
    </div>
    <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 2rem; display: flex; justify-content: space-between; align-items: center;">
        <div style="font-size: 0.8rem; opacity: 0.5;">Copyright © 2026. All Rights Reserved.</div>
        <div style="display: flex; align-items: center; gap: 1rem;">
            <div style="font-size: 0.8rem; opacity: 0.5;">Powered by</div>
            <div style="font-weight: 800; letter-spacing: 1px; font-size: 1rem;">UZINFOCOM</div>
        </div>
    </div>
</footer>

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