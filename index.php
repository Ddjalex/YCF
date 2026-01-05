<?php
require_once 'functions.php';
include 'header.php';
?>

<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(to right, rgba(0, 51, 102, 0.9) 0%, rgba(0, 51, 102, 0.4) 40%, rgba(0, 0, 0, 0.2) 100%), url('attached_assets/stock_images/young_visionary_in_b_4aa5a9bf.jpg'); background-size: cover; background-position: center; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: flex-start; color: white; text-align: left; padding: 0 10%;">
    <div style="max-width: 900px; margin-top: 110px;">
        <h1 style="font-size: 3.5rem; margin-bottom: 0.5rem; font-weight: 800; line-height: 1.1; text-shadow: 0 2px 10px rgba(0,0,0,0.3);">Empowering the Next Generation of Digital Sovereignty</h1>
        <p style="font-size: 1.6rem; margin-bottom: 1.5rem; font-weight: 400; opacity: 0.9;">Join 100+ young visionaries in Berlin for a fully-funded leadership journey at the Youth Crypto Forum Germany 2026.</p>
        
        <div style="background: rgba(0, 0, 0, 0.6); backdrop-filter: blur(15px); border-radius: 8px; padding: 0; display: flex; align-items: center; border: 1px solid rgba(255, 255, 255, 0.1); box-shadow: 0 10px 40px rgba(0,0,0,0.3); width: fit-content; overflow: hidden; height: 60px; margin-bottom: 2rem;">
            <div style="background: #00aeef; padding: 0 1.5rem; height: 100%; display: flex; align-items: center;">
                <span style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: white; white-space: nowrap;">Registration Deadline: March 10, 2026</span>
            </div>
            <div id="countdown" style="display: flex; gap: 1.5rem; align-items: center; padding: 0 2rem; color: white; font-family: Inter, Arial, sans-serif;">
                <!-- Countdown handled by JS -->
                <div style="text-align: center;"><span id="days" style="font-size: 1.5rem; font-weight: 700;">64</span><span style="font-size: 0.7rem; margin-left: 5px; opacity: 0.8;">days</span></div>
                <div style="text-align: center;"><span id="hours" style="font-size: 1.5rem; font-weight: 700;">00</span><span style="font-size: 0.7rem; margin-left: 5px; opacity: 0.8;">hrs</span></div>
                <div style="text-align: center;"><span id="minutes" style="font-size: 1.5rem; font-weight: 700;">00</span><span style="font-size: 0.7rem; margin-left: 5px; opacity: 0.8;">min</span></div>
            </div>
        </div>

        <a href="/apply" style="background: #00aeef; color: white; text-decoration: none; padding: 1.2rem 2.5rem; border-radius: 8px; font-weight: 800; font-size: 1.1rem; transition: all 0.3s; text-transform: uppercase; display: inline-block; box-shadow: 0 4px 15px rgba(0,174,239,0.4);" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">Apply for Scholarship</a>
    </div>
</section>

<!-- Core Modules Section -->
<section style="padding: 6rem 10%; background: #fcfcfc;">
    <div style="text-align: center; margin-bottom: 4rem;">
        <h2 style="color: var(--dark-blue); font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem;">Program Structure</h2>
        <p style="color: #666; font-size: 1.1rem; max-width: 700px; margin: 0 auto;">A holistic approach to crypto leadership, mirroring the Collective Leadership Institute's focus on "Inner and Outer Peace."</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2.5rem;">
        <!-- Module 1 -->
        <div style="background: white; border-radius: 15px; padding: 2.5rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-top: 5px solid #00aeef;">
            <div style="font-size: 0.9rem; color: #00aeef; font-weight: 700; margin-bottom: 0.5rem; text-transform: uppercase;">Module 1</div>
            <h3 style="color: var(--dark-blue); font-size: 1.5rem; margin-bottom: 1rem;">Decentralized Mindset</h3>
            <p style="color: #666; font-size: 1rem; line-height: 1.6;">Focusing on Ethics, security, and the philosophy of Web3. Learn the "Inner Peace" principles of self-leadership in the digital age.</p>
        </div>
        <!-- Module 2 -->
        <div style="background: white; border-radius: 15px; padding: 2.5rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-top: 5px solid #00aeef;">
            <div style="font-size: 0.9rem; color: #00aeef; font-weight: 700; margin-bottom: 0.5rem; text-transform: uppercase;">Module 2</div>
            <h3 style="color: var(--dark-blue); font-size: 1.5rem; margin-bottom: 1rem;">Governance & DAO Leadership</h3>
            <p style="color: #666; font-size: 1rem; line-height: 1.6;">How to build fair, transparent digital communities. Master dialogue and conflict resolution within decentralized structures.</p>
        </div>
        <!-- Module 3 -->
        <div style="background: white; border-radius: 15px; padding: 2.5rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-top: 5px solid #00aeef;">
            <div style="font-size: 0.9rem; color: #00aeef; font-weight: 700; margin-bottom: 0.5rem; text-transform: uppercase;">Module 3</div>
            <h3 style="color: var(--dark-blue); font-size: 1.5rem; margin-bottom: 1rem;">Scalable Solutions</h3>
            <p style="color: #666; font-size: 1rem; line-height: 1.6;">Launching blockchain projects for social and economic impact. Bridging the gap between technical scalability and real-world needs.</p>
        </div>
    </div>
</section>

<!-- Scholarship Model Section -->
<section style="padding: 6rem 10%; background: var(--dark-blue); color: white;">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
        <div>
            <h2 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 2rem;">The Fellowship Model</h2>
            <p style="font-size: 1.1rem; opacity: 0.8; margin-bottom: 2.5rem; line-height: 1.8;">Our program is fully funded for selected participants. We believe financial barriers should never hinder leadership potential.</p>
            
            <div style="display: grid; gap: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 1.5rem; background: rgba(255,255,255,0.05); padding: 1.5rem; border-radius: 10px;">
                    <span style="font-size: 2rem;">✈️</span>
                    <div>
                        <h4 style="margin: 0; font-size: 1.1rem;">Full Scholarship</h4>
                        <p style="margin: 0; font-size: 0.9rem; opacity: 0.7;">Covers flight tickets, 4-star accommodation, and meals.</p>
                    </div>
                </div>
                <div style="display: flex; align-items: center; gap: 1.5rem; background: rgba(255,255,255,0.05); padding: 1.5rem; border-radius: 10px;">
                    <span style="font-size: 2rem;">📜</span>
                    <div>
                        <h4 style="margin: 0; font-size: 1.1rem;">Certification</h4>
                        <p style="margin: 0; font-size: 0.9rem; opacity: 0.7;">Recognized certificate in "Collective Leadership for Digital Assets."</p>
                    </div>
                </div>
                <div style="display: flex; align-items: center; gap: 1.5rem; background: rgba(255,255,255,0.05); padding: 1.5rem; border-radius: 10px;">
                    <span style="font-size: 2rem;">🤝</span>
                    <div>
                        <h4 style="margin: 0; font-size: 1.1rem;">Mentorship</h4>
                        <p style="margin: 0; font-size: 0.9rem; opacity: 0.7;">Direct access to German FinTech leaders and developers.</p>
                    </div>
                </div>
            </div>
        </div>
        <div style="border-radius: 20px; overflow: hidden; box-shadow: 0 20px 50px rgba(0,0,0,0.5);">
            <img src="attached_assets/stock_images/diverse_young_leader_c35359f6.jpg" alt="Leadership Collaboration" style="width: 100%; height: auto; display: block;">
        </div>
    </div>
</section>

<!-- Eligibility Section -->
<section style="padding: 6rem 10%; background: #fff;">
    <div style="max-width: 800px; margin: 0 auto; text-align: center;">
        <h2 style="color: var(--dark-blue); font-size: 2.5rem; font-weight: 800; margin-bottom: 3rem;">Who Should Apply?</h2>
        <ul style="list-style: none; padding: 0; text-align: left; display: grid; gap: 1rem;">
            <li style="padding: 1rem; border-bottom: 1px solid #eee; display: flex; align-items: center; gap: 1rem;">
                <span style="color: #00aeef; font-weight: 800;">✓</span> <strong>Age:</strong> 18 – 35 years old.
            </li>
            <li style="padding: 1rem; border-bottom: 1px solid #eee; display: flex; align-items: center; gap: 1rem;">
                <span style="color: #00aeef; font-weight: 800;">✓</span> <strong>Experience:</strong> Developers, crypto-economists, or social entrepreneurs.
            </li>
            <li style="padding: 1rem; border-bottom: 1px solid #eee; display: flex; align-items: center; gap: 1rem;">
                <span style="color: #00aeef; font-weight: 800;">✓</span> <strong>Region:</strong> Priority for European/German market focus.
            </li>
            <li style="padding: 1rem; border-bottom: 1px solid #eee; display: flex; align-items: center; gap: 1rem;">
                <span style="color: #00aeef; font-weight: 800;">✓</span> <strong>Values:</strong> Commitment to transparency and financial inclusion.
            </li>
        </ul>
        <a href="/apply" style="margin-top: 3rem; display: inline-block; color: #00aeef; font-weight: 700; text-decoration: none; border: 2px solid #00aeef; padding: 1rem 2rem; border-radius: 8px;">View Full Criteria &rarr;</a>
    </div>
</section>

<?php include 'footer.php'; ?>