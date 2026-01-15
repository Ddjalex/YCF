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

<!-- Participation Seats Grid Section -->
<section id="participation-seats" style="padding: 5rem 10% 4rem; background: #fff; text-align: center;">
    <h2 class="montserrat" style="font-size: 3rem; color: #000; font-weight: 900; margin-bottom: 0.5rem; text-transform: uppercase;">TOTAL PARTICIPATION SEATS: 200</h2>
    <p style="font-size: 1rem; color: #444; margin-bottom: 3rem; font-weight: 500;">CGDL is offering 200 seats for the Youth Development Forum 2026:</p>
    
    <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; max-width: 1200px; margin: 0 auto;">
        <?php 
        $seat_cards = [
            ['title' => 'FULLY FUNDED', 'seats' => '30 Seats', 'type' => 'Competitive Selection', 'pkg' => 'scholarship'],
            ['title' => 'PARTIALLY FUNDED', 'seats' => '50 Seats', 'type' => 'Competitive Selection', 'pkg' => 'scholarship'],
            ['title' => 'FORUM ADMISSION', 'seats' => '40 Seats', 'type' => 'Guaranteed Selection', 'pkg' => 'forum-admission'],
            ['title' => 'SELF FUNDED', 'seats' => '80 Seats', 'type' => 'Guaranteed Selection', 'pkg' => 'self-funded']
        ];
        foreach ($seat_cards as $card): ?>
        <div style="background: #2D236E; border-radius: 12px; padding: 60px 20px; color: white; position: relative; border-bottom: 6px solid #FFD700; display: flex; flex-direction: column; align-items: center; min-height: 400px; justify-content: space-between;">
            <div style="display: flex; flex-direction: column; align-items: center; gap: 20px; width: 100%;">
                <h3 class="montserrat" style="font-size: 1.4rem; font-weight: 800; letter-spacing: 0.5px;"><?php echo $card['title']; ?></h3>
                <div style="background: #FFD700; color: #2D236E; padding: 10px 30px; border-radius: 8px; font-weight: 900; font-size: 1.4rem;"><?php echo $card['seats']; ?></div>
                <p style="font-size: 0.9rem; font-weight: 600; opacity: 0.9; margin: 0;"><?php echo $card['type']; ?></p>
            </div>
            
            <a href="apply.php?package=<?php echo $card['pkg']; ?>" style="display: flex; align-items: center; gap: 10px; text-decoration: none; color: white; margin-top: auto; padding-top: 40px; transition: transform 0.2s;" onmouseover="this.style.transform='translateX(5px)'" onmouseout="this.style.transform='translateX(0)'">
                <div style="width: 0; height: 0; border-top: 15px solid transparent; border-bottom: 15px solid transparent; border-left: 25px solid #FFD700;"></div>
                <span class="montserrat" style="font-weight: 900; font-size: 1.6rem; letter-spacing: 1px; white-space: nowrap;">APPLY NOW</span>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Scholarship Categories Redesign -->
<section style="background: url('attached_assets/germany-0_1767641199459.jpg') center/cover no-repeat fixed; position: relative; padding: 0;">
    <div style="background: rgba(45, 35, 110, 0.92); width: 100%; height: 100%; padding: 80px 10%;">
        <div style="background: #2D236E; color: white; max-width: 900px; margin: 0 auto 60px; padding: 30px; border-radius: 15px; text-align: center; position: relative; box-shadow: 0 10px 30px rgba(0,0,0,0.3);">
            <h2 class="montserrat" style="font-size: 2.5rem; font-weight: 800; line-height: 1.2;">Scholarship Categories<br>(Competitive Selection)</h2>
            <p style="font-size: 0.95rem; line-height: 1.6; opacity: 0.9; margin-top: 15px;">These are funded categories offered to outstanding applicants based on merit, motivation, and global representation. The Fully Funded and Partially Funded categories share one unified application form.</p>
            <div style="position: absolute; bottom: -20px; left: 50%; transform: translateX(-50%); width: 0; height: 0; border-left: 20px solid transparent; border-right: 20px solid transparent; border-top: 20px solid #2D236E;"></div>
        </div>

        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="display: flex; gap: 40px; flex-wrap: wrap; justify-content: center; margin-bottom: 40px;">
                <!-- Fully Funded -->
                <div style="background: #2D236E; color: white; border-radius: 25px; padding: 50px 40px; flex: 1; min-width: 350px; position: relative; box-shadow: 0 20px 40px rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.1);">
                    <div style="text-align: center; margin-bottom: 30px;">
                        <span style="font-size: 1.8rem; font-weight: 700; color: #FFD700;">$16.99</span>
                        <h3 class="montserrat" style="font-size: 2.2rem; font-weight: 900; margin: 15px 0;">Fully Funded Category</h3>
                    </div>
                    
                    <div style="border-top: 1px dotted rgba(255,255,255,0.3); padding: 25px 0;">
                        <h4 style="text-align: center; text-transform: uppercase; letter-spacing: 2px; font-size: 0.9rem; margin-bottom: 25px; color: #FFD700;">What's Included</h4>
                        <p style="font-size: 0.9rem; opacity: 0.8; text-align: center; margin-bottom: 25px;">Participants selected under the Fully Funded category receive a complete scholarship package that covers:</p>
                        <ul style="list-style: none; padding: 0; font-size: 0.95rem; line-height: 2;">
                            <li>✈️ Round-trip airfare to Berlin, Germany</li>
                            <li>🏨 Accommodation in a premium 4-star hotel (3 nights, 4 days)</li>
                            <li>🍽️ Daily meals & breakfast</li>
                            <li>🗝️ Full access to all conference sessions, workshops, and activities</li>
                            <li>📜 Certificate of Participation issued by CGDL</li>
                            <li>🎒 Delegate kit including conference materials</li>
                            <li>🗺️ Guided city tour of Berlin, covering historical sites & diplomacy</li>
                            <li>🛂 Comprehensive visa support, including an official visa support letter</li>
                            <li>🤝 Participation in cultural exchange sessions and networking events</li>
                            <li>📢 Opportunity to engage with global speakers, experts, and youth leaders</li>
                        </ul>
                    </div>
                </div>

                <!-- Partially Funded -->
                <div style="background: #2D236E; color: white; border-radius: 25px; padding: 50px 40px; flex: 1; min-width: 350px; position: relative; box-shadow: 0 20px 40px rgba(0,0,0,0.4); border: 1px solid rgba(255,255,255,0.1);">
                    <div style="text-align: center; margin-bottom: 30px;">
                        <span style="font-size: 1.8rem; font-weight: 700; color: #FFD700;">$16.99</span>
                        <h3 class="montserrat" style="font-size: 2.2rem; font-weight: 900; margin: 15px 0;">Partially Funded Category</h3>
                    </div>
                    
                    <div style="border-top: 1px dotted rgba(255,255,255,0.3); padding: 25px 0;">
                        <h4 style="text-align: center; text-transform: uppercase; letter-spacing: 2px; font-size: 0.9rem; margin-bottom: 25px; color: #FFD700;">What's Included</h4>
                        <p style="font-size: 0.9rem; opacity: 0.8; text-align: center; margin-bottom: 25px;">Participants selected for the Partially Funded category receive significant subsidization and will be provided:</p>
                        <ul style="list-style: none; padding: 0; font-size: 0.95rem; line-height: 2;">
                            <li>🗝️ Full access to all conference sessions, workshops, and activities</li>
                            <li>🏨 Accommodation in a premium 4-star hotel (3 nights, 4 days)</li>
                            <li>🍽️ Meals & breakfast throughout the forum</li>
                            <li>📜 Certificate of Participation from CGDL</li>
                            <li>🎒 Delegate kit including conference materials</li>
                            <li>🗺️ Guided city tour of Berlin focusing on history & diplomacy</li>
                            <li>🛂 Comprehensive visa support, including an official visa support letter</li>
                            <li>🤝 Participation in cultural & networking activities</li>
                        </ul>
                        <div style="margin-top: 30px; border-top: 1px dotted rgba(255,255,255,0.3); padding-top: 20px;">
                            <h4 style="text-align: center; text-transform: uppercase; font-size: 0.8rem; color: #999;">Not Included</h4>
                            <p style="text-align: center; font-size: 0.9rem; margin-top: 10px;">✈️ Airfare</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Unified Apply Button -->
            <div style="max-width: 800px; margin: 0 auto;">
                <a href="apply.php?package=scholarship" class="btn-apply-special" style="display: block; width: 100%; padding: 25px; background: linear-gradient(to right, #FFD700, #DAA520); color: #2D236E; text-align: center; text-decoration: none; border-radius: 12px; font-weight: 900; font-size: 1.5rem; letter-spacing: 1px; border: none; cursor: pointer; text-transform: uppercase; box-shadow: 0 10px 25px rgba(218, 165, 32, 0.4); transition: transform 0.2s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                    APPLY NOW!
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Guaranteed Categories -->
<section style="padding: 80px 10%; background: #fff; text-align: center;">
    <h2 class="montserrat" style="font-size: 2.8rem; font-weight: 900; color: #2D236E; margin-bottom: 15px;">Guaranteed Categories<br>(Confirmed Seats)</h2>
    <p style="color: #444; margin-bottom: 60px; max-width: 900px; margin-left: auto; margin-right: auto; line-height: 1.6;">These categories offer guaranteed participation with no competitive selection. Applicants secure their seat upon completing their registration.</p>
    
    <div style="display: flex; gap: 40px; flex-wrap: wrap; justify-content: center; max-width: 1200px; margin: 0 auto;">
        <!-- Forum Admission -->
        <div style="background: #2D236E; color: white; border-radius: 20px; padding: 50px 40px; flex: 1; min-width: 350px; text-align: left; border-bottom: 8px solid #FFD700; box-shadow: 0 15px 30px rgba(0,0,0,0.1);">
            <div style="opacity: 0.6; text-decoration: line-through; font-size: 1.2rem;">$799.99</div>
            <div style="font-size: 3rem; font-weight: 800; color: #FFD700; margin-bottom: 30px;">$499.00</div>
            <h3 class="montserrat" style="font-size: 2rem; font-weight: 900; margin-bottom: 25px;">Forum Admission Category</h3>
            <div style="border-top: 1px dotted rgba(255,255,255,0.3); padding-top: 25px;">
                <p style="font-size: 0.9rem; opacity: 0.9; margin-bottom: 25px;">Forum Admission is ideal for participants seeking guaranteed entry without accommodation support. It includes:</p>
                <ul style="list-style: none; padding: 0; line-height: 2; font-size: 0.95rem;">
                    <li>✔️ Guaranteed participation at the Youth Development Forum 2026</li>
                    <li>✔️ Access to all conference sessions & workshops</li>
                    <li>✔️ Certificate of Participation from CGDL</li>
                    <li>✔️ Delegate kit & conference materials</li>
                    <li>✔️ Guided city tour of Berlin (historical + diplomatic insights)</li>
                    <li>✔️ Comprehensive visa support, including visa support letter</li>
                </ul>
                <div style="margin-top: 30px; border-top: 1px dotted rgba(255,255,255,0.3); padding-top: 20px;">
                    <p style="font-size: 0.8rem; color: #999; text-transform: uppercase;">Not Included</p>
                    <ul style="list-style: none; padding: 0; font-size: 0.9rem; margin-top: 10px;">
                        <li>✈️ Airfare</li>
                        <li>🏨 Accommodation</li>
                    </ul>
                </div>
            </div>
            <a href="apply.php?package=forum-admission" style="display: block; width: 100%; padding: 20px; margin-top: 40px; background: linear-gradient(to right, #444, #000); color: white; text-align: center; text-decoration: none; border-radius: 10px; font-weight: 900; text-transform: uppercase;">Register NOW!</a>
        </div>

        <!-- Self Funded -->
        <div style="background: #2D236E; color: white; border-radius: 20px; padding: 50px 40px; flex: 1; min-width: 350px; text-align: left; border-bottom: 8px solid #FFD700; box-shadow: 0 15px 30px rgba(0,0,0,0.1);">
            <div style="opacity: 0.6; text-decoration: line-through; font-size: 1.2rem;">$999.99</div>
            <div style="font-size: 3rem; font-weight: 800; color: #FFD700; margin-bottom: 30px;">$799.00</div>
            <h3 class="montserrat" style="font-size: 2rem; font-weight: 900; margin-bottom: 25px;">Self-Funded Category</h3>
            <div style="border-top: 1px dotted rgba(255,255,255,0.3); padding-top: 25px;">
                <p style="font-size: 0.9rem; opacity: 0.9; margin-bottom: 25px;">The Self-Funded category is an upgraded guaranteed option designed for those who prefer a package that includes accommodation. It includes:</p>
                <ul style="list-style: none; padding: 0; line-height: 2; font-size: 0.95rem;">
                    <li>✔️ Guaranteed participation with priority confirmation</li>
                    <li>✔️ Accommodation in a premium 4-star hotel (3 nights, 4 days)</li>
                    <li>✔️ Meals & breakfast</li>
                    <li>✔️ Access to all conference sessions & workshops</li>
                    <li>✔️ Certificate of Participation from CGDL</li>
                    <li>✔️ Delegate kit & materials</li>
                    <li>✔️ Guided city tour of Berlin</li>
                    <li>✔️ Comprehensive visa support, including visa support letter</li>
                </ul>
                <div style="margin-top: 30px; border-top: 1px dotted rgba(255,255,255,0.3); padding-top: 20px;">
                    <p style="font-size: 0.8rem; color: #999; text-transform: uppercase;">Not Included</p>
                    <p style="font-size: 0.9rem; margin-top: 10px;">✈️ Airfare</p>
                </div>
            </div>
            <a href="apply.php?package=self-funded" style="display: block; width: 100%; padding: 20px; margin-top: 40px; background: linear-gradient(to right, #444, #000); color: white; text-align: center; text-decoration: none; border-radius: 10px; font-weight: 900; text-transform: uppercase;">Register NOW!</a>
        </div>
    </div>
</section>

<!-- Visa Invitation Letter Package -->
<section style="padding: 60px 10%; background: #fcfcfc;">
    <div style="max-width: 1100px; margin: 0 auto; background: #2D236E; border-radius: 25px; color: white; display: flex; flex-wrap: wrap; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.3); border-bottom: 8px solid #FFD700;">
        <div style="flex: 1; min-width: 350px; padding: 60px 50px;">
            <h3 class="montserrat" style="font-size: 2.8rem; font-weight: 900; margin-bottom: 25px;">Visa Invitation Letter</h3>
            <p style="font-size: 1rem; opacity: 0.9; line-height: 1.6; margin-bottom: 30px;">Applicants who want to apply early for their visa can request a Visa Invitation Letter Package from CGDL.</p>
            <div style="display: flex; align-items: baseline; gap: 15px; margin-bottom: 35px;">
                <span style="opacity: 0.6; text-decoration: line-through; font-size: 1.3rem;">$299.99</span>
                <span style="font-size: 3rem; font-weight: 800; color: #FFD700;">$99.00</span>
            </div>
            <ul style="list-style: none; padding: 0; line-height: 2.2; font-size: 1rem; margin-bottom: 40px; border-top: 1px dotted rgba(255,255,255,0.3); padding-top: 25px;">
                <li>✔️ Official Visa Invitation Letter</li>
                <li>✔️ Visa Documents Checklist</li>
                <li>✔️ Confirmation of Event Participation</li>
                <li>✔️ Embassy Coordination Assistance</li>
            </ul>
            <p style="font-size: 0.85rem; opacity: 0.8; margin-bottom: 30px;">This option is available to all categories of applicants. Applicants can later upgrade to either forum admission or self funded and the cost of their visa package will be fully adjusted towards the upgrade.</p>
            <a href="apply.php?package=visa-invitation" style="display: block; width: 100%; padding: 20px; background: linear-gradient(to right, #444, #000); color: white; text-align: center; text-decoration: none; border-radius: 10px; font-weight: 900; text-transform: uppercase; letter-spacing: 1px;">Register NOW!</a>
        </div>
        <div style="flex: 1; min-width: 350px; background: url('https://images.unsplash.com/photo-1599946347341-671151699d21?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80') center/cover; position: relative;">
            <div style="position: absolute; inset: 0; background: linear-gradient(to right, #2D236E, transparent); opacity: 0.3;"></div>
        </div>
    </div>
</section>

<?php endif; ?>

<?php include 'footer.php'; ?>