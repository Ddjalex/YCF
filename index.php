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
        
        <a href="#" class="btn-custom-animate">Register Now</a>
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

<section class="agenda" style="padding: 6rem 10%; background-image: linear-gradient(rgba(0, 51, 102, 0.8), rgba(0, 51, 102, 0.8)), url('attached_assets/1_Rs5tF_ifkt8I99W5BZyBKw_1767637840250.jpg'); background-size: cover; background-position: center; background-attachment: fixed; color: white;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem;">
        <h2 style="color: white; font-size: 2.5rem; font-weight: 800; letter-spacing: 1px;">AGENDA</h2>
        <a href="#" class="btn-custom-animate" style="font-size: 0.8rem; padding: 8px 20px;">View all &rsaquo;</a>
    </div>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2.5rem;">
        <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 24px; padding: 2.5rem; border: 1px solid rgba(255, 255, 255, 0.2);">
            <div style="display: flex; align-items: center; margin-bottom: 2rem;">
                <span style="background: var(--primary-blue); color: white; padding: 0.5rem 1.2rem; border-radius: 20px; font-weight: 700; margin-right: 1.2rem; font-size: 0.9rem;">Day 1</span>
                <span style="font-weight: 600; color: rgba(255, 255, 255, 0.8); font-size: 1.1rem;">2026-06-15</span>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1.5rem; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.95rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.5rem;">09:00 - 10:10</div>
                    <div style="color: #333; font-size: 1.1rem; font-weight: 600; line-height: 1.4;">Opening Keynote: The Crypto Landscape in 2026</div>
                </div>
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1.5rem; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.95rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.5rem;">10:10 - 10:30</div>
                    <div style="color: #333; font-size: 1.1rem; font-weight: 600; line-height: 1.4;">Coffee Break & Networking</div>
                </div>
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1.5rem; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.95rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.5rem;">10:30 - 12:30</div>
                    <div style="color: #333; font-size: 1.1rem; font-weight: 600; line-height: 1.4;">Panel: Regulation vs Innovation in Germany</div>
                </div>
            </div>
        </div>

        <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 24px; padding: 2.5rem; border: 1px solid rgba(255, 255, 255, 0.2);">
            <div style="display: flex; align-items: center; margin-bottom: 2rem;">
                <span style="background: var(--primary-blue); color: white; padding: 0.5rem 1.2rem; border-radius: 20px; font-weight: 700; margin-right: 1.2rem; font-size: 0.9rem;">Day 2</span>
                <span style="font-weight: 600; color: rgba(255, 255, 255, 0.8); font-size: 1.1rem;">2026-06-16</span>
            </div>
            
            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1.5rem; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.95rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.5rem;">09:00 - 10:00</div>
                    <div style="color: #333; font-size: 1.1rem; font-weight: 600; line-height: 1.4;">Workshop: Building Web3 Apps for the Masses</div>
                </div>
                <div style="background: rgba(255, 255, 255, 0.95); padding: 1.5rem; border-radius: 16px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
                    <div style="font-size: 0.95rem; font-weight: 800; color: var(--dark-blue); margin-bottom: 0.5rem;">10:00 - 13:00</div>
                    <div style="color: #333; font-size: 1.1rem; font-weight: 600; line-height: 1.4;">Hackathon: Sustainable Blockchain Solutions</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="vision" style="padding: 6rem 10%; background: #fff; text-align: center;">
    <h2 class="montserrat" style="font-size: 3rem; color: #000; font-weight: 900; margin-bottom: 1.5rem; line-height: 1.1;">Aligned with Europe's Youth Vision &<br>Global Priorities</h2>
    <p style="font-size: 1.1rem; color: #333; max-width: 800px; margin: 0 auto 4rem; line-height: 1.6;">The Youth Development Forum 2026 is shaped around the core objectives of leading European and international youth frameworks, including:</p>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
        <div style="background: #2D236E; color: white; padding: 3rem 2rem; border-radius: 30px; text-align: center; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
            <h3 class="montserrat" style="font-size: 1.5rem; margin-bottom: 1.5rem; line-height: 1.3;">EU Youth Strategy 2019–2027</h3>
            <p style="font-size: 1rem; opacity: 0.9; line-height: 1.6;">Encouraging youth participation, social inclusion, green leadership, and digital transformation.</p>
        </div>
        <div style="background: #2D236E; color: white; padding: 3rem 2rem; border-radius: 30px; text-align: center; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
            <h3 class="montserrat" style="font-size: 1.5rem; margin-bottom: 1.5rem; line-height: 1.3;">EU Digital Decade & AI governance goals</h3>
            <p style="font-size: 1rem; opacity: 0.9; line-height: 1.6;">Empowering young people in emerging technologies.</p>
        </div>
        <div style="background: #2D236E; color: white; padding: 3rem 2rem; border-radius: 30px; text-align: center; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
            <h3 class="montserrat" style="font-size: 1.5rem; margin-bottom: 1.5rem; line-height: 1.3;">Council of Europe's Youth Sector Priorities</h3>
            <p style="font-size: 1rem; opacity: 0.9; line-height: 1.6;">Strengthening democratic participation, human rights education, and intercultural dialogue.</p>
        </div>
    </div>
</section>

<section class="forum-highlights" style="padding: 3rem 10%; background: linear-gradient(rgba(10, 17, 40, 0.8), rgba(10, 17, 40, 0.8)), url('attached_assets/germany-0_1767641199459.jpg'); background-size: cover; background-position: center; background-attachment: fixed; color: white;">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center; max-width: 1100px; margin: 0 auto;">
        <div style="max-width: 400px;">
            <h2 class="montserrat" style="font-size: 2.5rem; font-weight: 900; line-height: 1.1; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: -1px;">FORUM<br>HIGHLIGHTS</h2>
            <p style="font-size: 1rem; line-height: 1.4; color: rgba(255, 255, 255, 0.9); margin-bottom: 1.5rem; font-weight: 500;">This curated tour emphasizes how history shapes diplomacy, peacebuilding, and leadership today.</p>
            <a href="#" class="btn-custom-animate">Register Now</a>
        </div>
        
        <div style="display: flex; flex-direction: column; gap: 0.4rem;">
            <div style="background: #2D236E; padding: 0.8rem 1.5rem; border-top-left-radius: 20px; border-bottom-left-radius: 20px; display: flex; align-items: center; gap: 1rem; width: 100%; border: 1px solid rgba(255, 255, 255, 0.1); border-right: none;">
                <div style="font-size: 1.2rem; width: 35px; text-align: center;">💬</div>
                <div style="font-size: 0.9rem; font-weight: 600;">Expert-led Workshops & Interactive Masterclasses</div>
            </div>
            <div style="background: #2D236E; padding: 0.8rem 1.5rem; border-top-left-radius: 20px; border-bottom-left-radius: 20px; display: flex; align-items: center; gap: 1rem; width: 100%; border: 1px solid rgba(255, 255, 255, 0.1); border-right: none;">
                <div style="font-size: 1.2rem; width: 35px; text-align: center;">📜</div>
                <div style="font-size: 0.9rem; font-weight: 600;">Youth Diplomacy Sessions & Policy Dialogues</div>
            </div>
            <div style="background: #2D236E; padding: 0.8rem 1.5rem; border-top-left-radius: 20px; border-bottom-left-radius: 20px; display: flex; align-items: center; gap: 1rem; width: 100%; border: 1px solid rgba(255, 255, 255, 0.1); border-right: none;">
                <div style="font-size: 1.2rem; width: 35px; text-align: center;">🤝</div>
                <div style="font-size: 0.9rem; font-weight: 600;">Networking with global leaders, changemakers & institutions</div>
            </div>
            <div style="background: #2D236E; padding: 0.8rem 1.5rem; border-top-left-radius: 20px; border-bottom-left-radius: 20px; display: flex; align-items: center; gap: 1rem; width: 100%; border: 1px solid rgba(255, 255, 255, 0.1); border-right: none;">
                <div style="font-size: 1.2rem; width: 35px; text-align: center;">🌍</div>
                <div style="font-size: 0.9rem; font-weight: 600;">Country presentations, cultural exchange & collaborative activities</div>
            </div>
            <div style="background: #2D236E; padding: 0.8rem 1.5rem; border-top-left-radius: 20px; border-bottom-left-radius: 20px; display: flex; align-items: center; gap: 1rem; width: 100%; border: 1px solid rgba(255, 255, 255, 0.1); border-right: none;">
                <div style="font-size: 1.2rem; width: 35px; text-align: center;">🏢</div>
                <div style="font-size: 0.9rem; font-weight: 600;">Visit to the Federal Parliament of Germany (The Bundestag)</div>
            </div>
            <div style="background: #2D236E; padding: 1rem 1.5rem; border-top-left-radius: 20px; border-bottom-left-radius: 20px; display: flex; gap: 1rem; width: 100%; border: 1px solid rgba(255, 255, 255, 0.1); border-right: none;">
                <div style="font-size: 1.2rem; width: 35px; text-align: center;">🗺️</div>
                <div>
                    <div style="font-size: 0.95rem; font-weight: 700; margin-bottom: 0.2rem;">Guided City Tour of Berlin, highlighting:</div>
                    <ul style="margin: 0; padding-left: 1rem; font-size: 0.85rem; opacity: 0.9; line-height: 1.3; font-weight: 500;">
                        <li>World War history</li>
                        <li>Diplomatic evolution in Europe</li>
                        <li>Lessons for future generations</li>
                        <li>The city's transformation into a hub of innovation, democracy & culture</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
    </div>
</section>

<section class="participation-seats" style="padding: 4rem 10% 2rem; background: #fcfcfc; text-align: center;">
    <h2 class="montserrat" style="font-size: 1.8rem; color: #000; font-weight: 800; margin-bottom: 0.5rem; letter-spacing: 0.5px; text-transform: uppercase;">Total Participation Seats: 200</h2>
    <p style="font-size: 0.95rem; color: #333; margin-bottom: 2rem; font-weight: 500;">CGDL is offering <strong>200 seats</strong> for the Youth Development Forum 2026:</p>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; max-width: 1200px; margin: 0 auto; perspective: 1000px;">
        <!-- Card 1 -->
        <div style="background: #2D236E; border-radius: 16px; padding: 1.5rem 1rem; position: relative; border-bottom: 8px solid #FFD700; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: default;" onmouseover="this.style.transform='translateY(-10px) rotateX(5deg)'; this.style.boxShadow='0 15px 30px rgba(45, 35, 110, 0.2)';" onmouseout="this.style.transform='translateY(0) rotateX(0)'; this.style.boxShadow='none';">
            <h3 class="montserrat" style="color: white; font-size: 1.1rem; font-weight: 800; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 1px;">Fully Funded</h3>
            <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.4rem 1.2rem; border-radius: 8px; font-weight: 900; font-size: 1.1rem; margin-bottom: 1rem; box-shadow: 0 4px 10px rgba(255, 215, 0, 0.3);">30 Seats</div>
            <p style="color: rgba(255,255,255,0.8); font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin: 0;">Competitive Selection</p>
        </div>
        
        <!-- Card 2 -->
        <div style="background: #2D236E; border-radius: 16px; padding: 1.5rem 1rem; position: relative; border-bottom: 8px solid #FFD700; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: default;" onmouseover="this.style.transform='translateY(-10px) rotateX(5deg)'; this.style.boxShadow='0 15px 30px rgba(45, 35, 110, 0.2)';" onmouseout="this.style.transform='translateY(0) rotateX(0)'; this.style.boxShadow='none';">
            <h3 class="montserrat" style="color: white; font-size: 1.1rem; font-weight: 800; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 1px;">Partially Funded</h3>
            <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.4rem 1.2rem; border-radius: 8px; font-weight: 900; font-size: 1.1rem; margin-bottom: 1rem; box-shadow: 0 4px 10px rgba(255, 215, 0, 0.3);">50 Seats</div>
            <p style="color: rgba(255,255,255,0.8); font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin: 0;">Competitive Selection</p>
        </div>
        
        <!-- Card 3 -->
        <div style="background: #2D236E; border-radius: 16px; padding: 1.5rem 1rem; position: relative; border-bottom: 8px solid #FFD700; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: default;" onmouseover="this.style.transform='translateY(-10px) rotateX(5deg)'; this.style.boxShadow='0 15px 30px rgba(45, 35, 110, 0.2)';" onmouseout="this.style.transform='translateY(0) rotateX(0)'; this.style.boxShadow='none';">
            <h3 class="montserrat" style="color: white; font-size: 1.1rem; font-weight: 800; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 1px;">Forum Admission</h3>
            <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.4rem 1.2rem; border-radius: 8px; font-weight: 900; font-size: 1.1rem; margin-bottom: 1rem; box-shadow: 0 4px 10px rgba(255, 215, 0, 0.3);">40 Seats</div>
            <p style="color: rgba(255,255,255,0.8); font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin: 0;">Guaranteed Selection</p>
        </div>
        
        <!-- Card 4 -->
        <div style="background: #2D236E; border-radius: 16px; padding: 1.5rem 1rem; position: relative; border-bottom: 8px solid #FFD700; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); cursor: default;" onmouseover="this.style.transform='translateY(-10px) rotateX(5deg)'; this.style.boxShadow='0 15px 30px rgba(45, 35, 110, 0.2)';" onmouseout="this.style.transform='translateY(0) rotateX(0)'; this.style.boxShadow='none';">
            <h3 class="montserrat" style="color: white; font-size: 1.1rem; font-weight: 800; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 1px;">Self Funded</h3>
            <div style="background: #FFD700; color: #2D236E; display: inline-block; padding: 0.4rem 1.2rem; border-radius: 8px; font-weight: 900; font-size: 1.1rem; margin-bottom: 1rem; box-shadow: 0 4px 10px rgba(255, 215, 0, 0.3);">80 Seats</div>
            <p style="color: rgba(255,255,255,0.8); font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin: 0;">Guaranteed Selection</p>
        </div>
    </div>
</section>

<section class="scholarship-categories" style="padding: 0; position: relative; background: url('attached_assets/germany-0_1767641199459.jpg') center/cover no-repeat fixed;">
    <div style="background: rgba(0, 0, 0, 0.4); padding: 80px 10%;">
        <div style="max-width: 800px; margin: 0 auto 50px; background: #2D236E; padding: 30px; border-radius: 15px; color: white; text-align: center; position: relative; box-shadow: 0 15px 30px rgba(0,0,0,0.3);">
            <h2 class="montserrat" style="font-size: 2.2rem; font-weight: 900; margin-bottom: 15px; text-transform: uppercase; line-height: 1.1;">Scholarship Categories<br>(Competitive Selection)</h2>
            <p style="font-size: 1rem; line-height: 1.6; opacity: 0.9; font-weight: 400;">
                These are <em>funded</em> categories offered to outstanding applicants based on merit, motivation, and global representation. 
                The <strong>Fully Funded</strong> and <strong>Partially Funded</strong> categories share one unified application form.
            </p>
            <div style="position: absolute; bottom: -15px; left: 50%; transform: translateX(-50%); width: 0; height: 0; border-left: 15px solid transparent; border-right: 15px solid transparent; border-top: 15px solid #2D236E;"></div>
        </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 30px; max-width: 1200px; margin: 0 auto; width: 100%;">
        <!-- Fully Funded Info -->
        <div style="background: rgba(45, 35, 110, 0.9); backdrop-filter: blur(10px); border-radius: 25px; padding: 40px; color: white; border: 1px solid rgba(255, 255, 255, 0.1); display: flex; flex-direction: column; box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
            <div style="text-align: center; margin-bottom: 30px;">
                <div style="font-size: 2.2rem; font-weight: 900; margin-bottom: 5px; color: white;">$16.99</div>
                <h3 class="montserrat" style="font-size: 2rem; font-weight: 800; text-transform: none; margin-bottom: 15px;">Fully Funded Category</h3>
                <div style="display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 20px;">
                    <span style="height: 1px; flex-grow: 1; background: rgba(255,255,255,0.3); border-top: 1px dashed rgba(255,255,255,0.4);"></span>
                    <span style="font-size: 0.9rem; text-transform: none; letter-spacing: 0.5px; opacity: 0.9;">What\'s Included</span>
                    <span style="height: 1px; flex-grow: 1; background: rgba(255,255,255,0.3); border-top: 1px dashed rgba(255,255,255,0.4);"></span>
                </div>
                <p style="font-size: 0.95rem; line-height: 1.5; opacity: 0.9; margin-bottom: 25px;">Participants selected under the Fully Funded category receive a complete scholarship package that covers:</p>
            </div>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 15px; font-size: 0.95rem;">
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">✈</span> Round-trip airfare to Berlin, Germany</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">🏨</span> Accommodation in a premium 4-star hotel (3 nights, 4 days)</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">🍱</span> Daily meals & breakfast</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">✓</span> Full access to all conference sessions, workshops, and activities</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">●</span> Certificate of Participation issued by the Center for Global Dialogue & Leadership (CGDL)</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">💼</span> Delegate kit including conference materials</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">🏛</span> Guided city tour of Berlin, covering historical sites, diplomacy landmarks, and lessons from global conflict & peacebuilding</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">✉</span> Comprehensive visa support, including visa support letter</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">🤝</span> Participation in cultural exchange sessions and networking events</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">🎙</span> Opportunity to engage with global speakers, experts, and youth leaders</li>
            </ul>
        </div>

        <!-- Partially Funded Info -->
        <div style="background: rgba(45, 35, 110, 0.9); backdrop-filter: blur(10px); border-radius: 25px; padding: 40px; color: white; border: 1px solid rgba(255, 255, 255, 0.1); display: flex; flex-direction: column; box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
            <div style="text-align: center; margin-bottom: 30px;">
                <div style="font-size: 2.2rem; font-weight: 900; margin-bottom: 5px; color: white;">$16.99</div>
                <h3 class="montserrat" style="font-size: 2rem; font-weight: 800; text-transform: none; margin-bottom: 15px;">Partially Funded Category</h3>
                <div style="display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 20px;">
                    <span style="height: 1px; flex-grow: 1; background: rgba(255,255,255,0.3); border-top: 1px dashed rgba(255,255,255,0.4);"></span>
                    <span style="font-size: 0.9rem; text-transform: none; letter-spacing: 0.5px; opacity: 0.9;">What\'s Included</span>
                    <span style="height: 1px; flex-grow: 1; background: rgba(255,255,255,0.3); border-top: 1px dashed rgba(255,255,255,0.4);"></span>
                </div>
                <p style="font-size: 0.95rem; line-height: 1.5; opacity: 0.9; margin-bottom: 25px;">Participants selected for the Partially Funded category receive significant subsidization and will be provided:</p>
            </div>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 15px; font-size: 0.95rem;">
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">✓</span> Full access to all conference sessions, workshops, and activities</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">🏨</span> Accommodation in a premium 4-star hotel (3 nights, 4 days)</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">🍱</span> Meals & breakfast throughout the forum</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">●</span> Certificate of Participation from CGDL</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">💼</span> Delegate kit including conference materials</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">🏛</span> Guided city tour of Berlin focusing on history, diplomacy, and global youth leadership</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">✉</span> Comprehensive visa support, including an official visa support letter</li>
                <li style="display: flex; gap: 12px; align-items: center;"><span style="font-size: 1.2rem;">🤝</span> Participation in cultural & networking activities</li>
            </ul>
            <div style="margin-top: auto; padding-top: 30px; text-align: center;">
                <div style="display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 15px;">
                    <span style="height: 1px; flex-grow: 1; background: rgba(255,255,255,0.3); border-top: 1px dashed rgba(255,255,255,0.4);"></span>
                    <span style="font-size: 0.9rem; text-transform: none; letter-spacing: 0.5px; opacity: 0.9;">Not Included</span>
                    <span style="height: 1px; flex-grow: 1; background: rgba(255,255,255,0.3); border-top: 1px dashed rgba(255,255,255,0.4);"></span>
                </div>
                <div style="font-size: 1rem; display: flex; align-items: center; justify-content: center; gap: 8px;">
                    <span style="font-size: 1.2rem;">✈</span> Airfare
                </div>
            </div>
        </div>

        <div style="grid-column: 1 / -1; margin-top: 40px; text-align: center; background: rgba(45, 35, 110, 0.9); backdrop-filter: blur(10px); padding: 30px; border-radius: 25px; border: 1px solid rgba(255, 255, 255, 0.1); box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
            <a href="apply.php" class="btn-apply-special" style="display: block; width: 100%; max-width: 600px; margin: 0 auto;">APPLY NOW!</a>
        </div>
    </div>
</section>

<section class="hotels" style="padding: 6rem 10%; background: #0a1128; color: white;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem;">
        <h2 style="color: white; font-size: 2.5rem; font-weight: 800; letter-spacing: 1px; text-transform: uppercase;">HOTELS</h2>
        <a href="#" class="btn-custom-animate" style="font-size: 0.8rem; padding: 8px 20px;">View all &rsaquo;</a>
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2.5rem;">
        <?php 
        $search = $_GET['search'] ?? null;
        $hotels = get_hotels($search);
        if (empty($hotels)) {
            echo "<p style='color: rgba(255,255,255,0.7);'>No hotels found matching your search.</p>";
        }
        foreach ($hotels as $hotel): ?>
        <div style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border-radius: 30px; overflow: hidden; border: 1px solid rgba(255, 255, 255, 0.2); transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
            <div style="height: 240px; padding: 15px;">
                <div style="width: 100%; height: 100%; background-image: url('<?php echo $hotel['photo_url'] ?: 'https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=80'; ?>'); background-size: cover; background-position: center; border-radius: 25px;"></div>
            </div>
            <div style="padding: 0 2rem 2.5rem; display: flex; flex-direction: column; gap: 1rem;">
                <div style="color: #ffb400; font-size: 1rem; letter-spacing: 2px; font-weight: bold;">
                    <?php echo str_repeat('★', $hotel['stars']); ?>
                </div>
                <h3 style="font-size: 1.6rem; color: white; margin: 0; font-weight: 700; height: 1.9rem; overflow: hidden; font-family: 'Inter', sans-serif;"><?php echo htmlspecialchars($hotel['name']); ?></h3>
                
                <div style="margin-top: 1rem;">
                    <a href="<?php echo $hotel['map_url'] ?: '#'; ?>" target="_blank" style="color: rgba(255,255,255,0.9); font-size: 1rem; text-decoration: none; display: flex; align-items: center; gap: 0.8rem; font-weight: 500; font-family: 'Inter', sans-serif;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#00aeef" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        See on Google Maps
                    </a>
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

<section class="weather" style="padding: 4rem 10%; background: #f0f7ff;">
    <h2 style="color: var(--dark-blue); font-size: 1.8rem; font-weight: 700; margin-bottom: 2rem;">WEATHER IN BERLIN</h2>
    <div style="display: flex; gap: 1rem; overflow-x: auto; padding-bottom: 1rem;">
        <?php 
        $weather = get_weather_data();
        if ($weather): 
        ?>
        <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; padding: 2rem; border-radius: 12px; min-width: 280px; box-shadow: 0 10px 20px rgba(79, 172, 254, 0.3);">
            <div style="font-size: 0.9rem; opacity: 0.9; margin-bottom: 1rem;"><?php echo date('l, d F Y'); ?> · Berlin</div>
            <div style="display: flex; align-items: center; gap: 1.5rem;">
                <div style="font-size: 3rem;"><?php echo $weather['icon']; ?></div>
                <div>
                    <div style="font-size: 2.5rem; font-weight: 700;"><?php echo $weather['temp']; ?></div>
                    <div style="font-size: 1rem; opacity: 0.9;">Current Conditions</div>
                </div>
            </div>
            <div style="margin-top: 1.5rem; font-size: 0.8rem; opacity: 0.7;">Last updated: <?php echo $weather['last_updated']; ?> <a href="javascript:location.reload()" style="color: white; text-decoration: none;">↻</a></div>
        </div>
        <?php foreach ($weather['forecast'] as $f): ?>
        <div style="background: white; padding: 1.5rem; border-radius: 12px; min-width: 120px; text-align: center; box-shadow: 0 5px 15px rgba(0,0,0,0.03);">
            <div style="font-size: 1.5rem; margin-bottom: 0.5rem;"><?php echo $f['icon']; ?></div>
            <div style="font-size: 1.1rem; font-weight: 700; color: var(--dark-blue);"><?php echo $f['temp']; ?></div>
            <div style="font-size: 0.8rem; color: #888; margin-top: 0.3rem;"><?php echo $f['time']; ?></div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
            <p style="color: #666;">Weather data currently unavailable.</p>
        <?php endif; ?>
    </div>
</section>

<section class="videos" style="padding: 4rem 10%;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem;">
        <h2 style="color: var(--dark-blue); font-size: 1.8rem; font-weight: 700;">VIDEOS</h2>
        <a href="#" style="color: var(--primary-blue); font-weight: 600; text-decoration: none;">View all &rsaquo;</a>
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 1.5rem;">
        <?php foreach (get_homepage_videos() as $video): ?>
        <div style="position: relative; border-radius: 12px; overflow: hidden; aspect-ratio: 16/9; background: #000;">
            <img src="<?php echo $video['thumbnail_url'] ?: 'https://images.unsplash.com/photo-1516245834210-c4c142787335?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'; ?>" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60px; height: 60px; background: rgba(255,255,255,0.2); backdrop-filter: blur(5px); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; cursor: pointer;" onclick="<?php echo $video['video_url'] ? "window.open('{$video['video_url']}', '_blank')" : ""; ?>">▶</div>
            <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 1.5rem; background: linear-gradient(transparent, rgba(0,0,0,0.8)); color: white;">
                <h3 style="font-size: 1.1rem; margin: 0;"><?php echo htmlspecialchars($video['title']); ?></h3>
            </div>
        </div>
        <?php endforeach; ?>
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

<?php endif; // End search check ?>

<?php include 'footer.php'; ?>
