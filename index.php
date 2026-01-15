<?php
require_once 'functions.php';
include 'header.php';
?>

<?php 
$search = $_GET['search'] ?? null;
if ($search): 
    $searchResults = get_search_results($search);
?>
<section class="search-results" style="padding: 4rem 10%; background: #fff;">
    <h2 style="color: var(--dark-blue); font-size: 2rem; margin-bottom: 2rem;">Search Results for "<?php echo htmlspecialchars($search); ?>"</h2>

    <?php if (empty($searchResults['hotels']) && empty($searchResults['news']) && empty($searchResults['videos'])): ?>
        <p style="color: #666; font-size: 1.2rem;">No results found across hotels, news, or videos.</p>
    <?php endif; ?>

    <?php if (!empty($searchResults['hotels'])): ?>
        <div style="margin-bottom: 3rem;">
            <h3 style="color: var(--primary-blue); border-bottom: 2px solid #f0f0f0; padding-bottom: 0.5rem; margin-bottom: 1.5rem;">Hotels</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem;">
                <?php foreach ($searchResults['hotels'] as $hotel): ?>
                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.05);">
                    <div style="height: 180px; background-image: url('<?php echo $hotel['photo_url']; ?>'); background-size: cover; background-position: center;"></div>
                    <div style="padding: 1.2rem;">
                        <h4 style="margin: 0 0 0.5rem; color: var(--dark-blue);"><?php echo htmlspecialchars($hotel['name']); ?></h4>
                        <a href="<?php echo $hotel['map_url']; ?>" target="_blank" style="color: #00aeef; font-size: 0.85rem; text-decoration: none;">📍 See on Map</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($searchResults['news'])): ?>
        <div style="margin-bottom: 3rem;">
            <h3 style="color: var(--primary-blue); border-bottom: 2px solid #f0f0f0; padding-bottom: 0.5rem; margin-bottom: 1.5rem;">News & Updates</h3>
            <div style="display: grid; grid-template-columns: 1fr; gap: 1rem;">
                <?php foreach ($searchResults['news'] as $news): ?>
                <div style="padding: 1.5rem; background: #f8fbff; border-radius: 12px; border-left: 4px solid var(--primary-blue);">
                    <h4 style="margin: 0 0 0.5rem; color: var(--dark-blue);"><?php echo htmlspecialchars($news['title']); ?></h4>
                    <p style="margin: 0; font-size: 0.9rem; color: #666;"><?php echo htmlspecialchars($news['summary']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($searchResults['videos'])): ?>
        <div>
            <h3 style="color: var(--primary-blue); border-bottom: 2px solid #f0f0f0; padding-bottom: 0.5rem; margin-bottom: 1.5rem;">Videos</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                <?php foreach ($searchResults['videos'] as $vid): ?>
                <div style="border-radius: 12px; overflow: hidden; position: relative; height: 120px; background: #000;">
                    <video src="<?php echo $vid['video_url']; ?>" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7;"></video>
                    <div style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600; text-align: center; padding: 10px; font-size: 0.8rem; background: rgba(0,0,0,0.3);">
                        <?php echo htmlspecialchars($vid['title']); ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
    
    <div style="margin-top: 3rem; text-align: center;">
        <a href="/" class="btn-custom-animate">Back to Home</a>
    </div>
</section>
<?php else: ?>
<section class="hero-container">
    <h1 class="hero-title image-text-mask">YOUTH CRYPTO</h1>
    <h2 class="hero-subtitle image-text-mask">Forum Germany 2026</h2>
    <p class="hero-description">Shaping the Future of Digital Economy & Blockchain Technology. June 15–17, 2026 · Berlin, Germany</p>
    
    <div style="width: 100%; max-width: 1100px; height: 420px; border-radius: 80px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.15); background: #000; margin-bottom: 50px; position: relative; border: 1px solid rgba(255,255,255,0.1);">
        <?php 
        $hero_video = get_hero_video(); 
        if (strpos($hero_video, 'http') !== 0 && strpos($hero_video, '/') !== 0 && strpos($hero_video, 'attached_assets') !== 0 && strpos($hero_video, 'uploads/') !== 0) {
            $hero_video = '/' . $hero_video;
        }
        ?>
        <video src="<?php echo htmlspecialchars($hero_video); ?>" autoplay loop muted playsinline style="width: 100%; height: 100%; object-fit: cover; pointer-events: none;"></video>
    </div>

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
        
        <a href="#participation-seats" class="btn-custom-animate">Register Now</a>
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
                    <a href="news_detail.php?id=<?php echo $item['id']; ?>" class="btn-custom-animate" style="font-size: 0.8rem; padding: 8px 20px;">Read More &rarr;</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="participation-seats" id="participation-seats" style="padding: 4rem 10% 2rem; background: #fcfcfc; text-align: center;">
    <h2 class="montserrat" style="font-size: 1.8rem; color: #000; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: 0.5px; text-transform: uppercase;">Total Participation Seats: 200</h2>
    <p style="font-size: 0.95rem; color: #333; margin-bottom: 2rem; font-weight: 500;">CGDL is offering <strong>200 seats</strong> for the Youth Development Forum 2026:</p>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; max-width: 1200px; margin: 0 auto; perspective: 1000px;">
        <div style="background: #2D236E; border-radius: 16px; padding: 1.5rem 1rem; position: relative; border-bottom: 8px solid #FFD700; transition: all 0.4s; color: white;">
            <h3 class="montserrat" style="font-size: 1.1rem; font-weight: 800; margin-bottom: 1rem; text-transform: uppercase;">Fully Funded</h3>
            <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.4rem 1.2rem; border-radius: 8px; font-weight: 900; margin-bottom: 1rem;">30 Seats</div>
            <p style="font-size: 0.85rem; font-weight: 700;">Competitive Selection</p>
            <a href="apply.php?package=scholarship" class="btn-apply-special" style="display: block; margin-top: 15px; padding: 10px; background: #FFD700; color: #2D236E; text-decoration: none; border-radius: 6px; font-weight: 800;">Apply Now</a>
        </div>
        
        <div style="background: #2D236E; border-radius: 16px; padding: 1.5rem 1rem; position: relative; border-bottom: 8px solid #FFD700; transition: all 0.4s; color: white;">
            <h3 class="montserrat" style="font-size: 1.1rem; font-weight: 800; margin-bottom: 1rem; text-transform: uppercase;">Partially Funded</h3>
            <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.4rem 1.2rem; border-radius: 8px; font-weight: 900; margin-bottom: 1rem;">50 Seats</div>
            <p style="font-size: 0.85rem; font-weight: 700;">Competitive Selection</p>
            <a href="apply.php?package=scholarship" class="btn-apply-special" style="display: block; margin-top: 15px; padding: 10px; background: #FFD700; color: #2D236E; text-decoration: none; border-radius: 6px; font-weight: 800;">Apply Now</a>
        </div>
        
        <div style="background: #2D236E; border-radius: 16px; padding: 1.5rem 1rem; position: relative; border-bottom: 8px solid #FFD700; transition: all 0.4s; color: white;">
            <h3 class="montserrat" style="font-size: 1.1rem; font-weight: 800; margin-bottom: 1rem; text-transform: uppercase;">Forum Admission</h3>
            <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.4rem 1.2rem; border-radius: 8px; font-weight: 900; margin-bottom: 1rem;">40 Seats</div>
            <p style="font-size: 0.85rem; font-weight: 700;">Guaranteed Selection</p>
            <a href="apply.php?package=forum-admission" class="btn-apply-special" style="display: block; margin-top: 15px; padding: 10px; background: #FFD700; color: #2D236E; text-decoration: none; border-radius: 6px; font-weight: 800;">Apply Now</a>
        </div>
        
        <div style="background: #2D236E; border-radius: 16px; padding: 1.5rem 1rem; position: relative; border-bottom: 8px solid #FFD700; transition: all 0.4s; color: white;">
            <h3 class="montserrat" style="font-size: 1.1rem; font-weight: 800; margin-bottom: 1rem; text-transform: uppercase;">Self Funded</h3>
            <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.4rem 1.2rem; border-radius: 8px; font-weight: 900; margin-bottom: 1rem;">80 Seats</div>
            <p style="font-size: 0.85rem; font-weight: 700;">Guaranteed Selection</p>
            <a href="apply.php?package=self-funded" class="btn-apply-special" style="display: block; margin-top: 15px; padding: 10px; background: #FFD700; color: #2D236E; text-decoration: none; border-radius: 6px; font-weight: 800;">Apply Now</a>
        </div>
    </div>
</section>

<section class="guaranteed-categories" style="padding: 4rem 10%; background: white;">
    <h2 class="montserrat" style="text-align: center; font-size: 2.5rem; color: #2D236E; margin-bottom: 40px;">Guaranteed Categories (Confirmed Seats)</h2>
    <div style="display: flex; gap: 30px; flex-wrap: wrap;">
        <div style="background: #2D236E; border-radius: 20px; padding: 40px; color: white; flex: 1; min-width: 300px; position: relative; border-bottom: 8px solid #FFD700;">
            <div style="text-decoration: line-through; opacity: 0.6; font-size: 1.2rem;">$799.99</div>
            <div style="font-size: 2.5rem; font-weight: 800; color: #FFD700; margin-bottom: 20px;">$499.00</div>
            <h3 class="montserrat" style="font-size: 1.8rem; margin-bottom: 20px;">Forum Admission Category</h3>
            <ul style="list-style: none; padding: 0; margin-bottom: 30px; font-size: 0.95rem; line-height: 1.6;">
                <li style="margin-bottom: 10px;">✓ Guaranteed participation</li>
                <li style="margin-bottom: 10px;">✓ Access to all sessions & workshops</li>
                <li style="margin-bottom: 10px;">✓ Certificate of Participation</li>
            </ul>
            <a href="apply.php?package=forum-admission" class="btn-apply-special" style="display: block; text-align: center; text-decoration: none; padding: 15px; background: #FFD700; color: #2D236E; font-weight: 800; border-radius: 10px; text-transform: uppercase;">Register NOW!</a>
        </div>
        
        <div style="background: #2D236E; border-radius: 20px; padding: 40px; color: white; flex: 1; min-width: 300px; position: relative; border-bottom: 8px solid #FFD700;">
            <div style="text-decoration: line-through; opacity: 0.6; font-size: 1.2rem;">$999.99</div>
            <div style="font-size: 2.5rem; font-weight: 800; color: #FFD700; margin-bottom: 20px;">$799.00</div>
            <h3 class="montserrat" style="font-size: 1.8rem; margin-bottom: 20px;">Self-Funded Category</h3>
            <ul style="list-style: none; padding: 0; margin-bottom: 30px; font-size: 0.95rem; line-height: 1.6;">
                <li style="margin-bottom: 10px;">✓ 4-star hotel (3 nights)</li>
                <li style="margin-bottom: 10px;">✓ All meals & breakfast included</li>
                <li style="margin-bottom: 10px;">✓ Priority confirmation</li>
            </ul>
            <a href="apply.php?package=self-funded" class="btn-apply-special" style="display: block; text-align: center; text-decoration: none; padding: 15px; background: #FFD700; color: #2D236E; font-weight: 800; border-radius: 10px; text-transform: uppercase;">Register NOW!</a>
        </div>
    </div>

    <div style="max-width: 800px; margin: 40px auto; background: #2D236E; padding: 40px; border-radius: 24px; color: white; display: flex; flex-wrap: wrap; gap: 30px; box-shadow: 0 20px 50px rgba(0,0,0,0.2); border-bottom: 8px solid #FFD700;">
        <div style="flex: 1; min-width: 300px;">
            <h3 class="montserrat" style="font-size: 2rem; margin-bottom: 10px;">Visa Invitation Letter</h3>
            <div style="display: flex; align-items: baseline; gap: 10px; margin-bottom: 20px;">
                <span style="text-decoration: line-through; opacity: 0.6; font-size: 1.1rem;">$299.99</span>
                <span style="font-size: 2rem; font-weight: 800; color: #FFD700;">$99.00</span>
            </div>
            <ul style="list-style: none; padding: 0; margin-bottom: 30px; font-size: 0.9rem; line-height: 1.6;">
                <li style="margin-bottom: 8px;">✓ Official Visa Invitation Letter</li>
                <li style="margin-bottom: 8px;">✓ Visa Documents Checklist</li>
                <li style="margin-bottom: 8px;">✓ Embassy Coordination Assistance</li>
            </ul>
            <a href="apply.php?package=visa-invitation" class="btn-apply-special" style="display: block; text-align: center; text-decoration: none; padding: 15px; background: #FFD700; color: #2D236E; font-weight: 800; border-radius: 10px; text-transform: uppercase;">Register NOW!</a>
        </div>
        <div style="flex: 1; min-width: 300px; border-radius: 16px; overflow: hidden; background: url('https://images.unsplash.com/photo-1599946347341-671151699d21?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80') center/cover;"></div>
    </div>
</section>
<?php endif; ?>

<?php include 'footer.php'; ?>