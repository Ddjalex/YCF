<?php
require_once 'functions.php';
include 'header.php';
?>

<!-- Hero Section -->
<section class="hero" style="background: radial-gradient(circle at center, rgba(0, 210, 255, 0.15) 0%, rgba(10, 14, 23, 1) 70%), url('attached_assets/stock_images/blockchain_technolog_2224d973.jpg'); background-size: cover; background-position: center; height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; text-align: center; padding: 0 10%;">
    <div style="max-width: 1000px;">
        <h1 style="font-size: 5rem; margin-bottom: 1.5rem; font-weight: 900; line-height: 1; text-transform: uppercase; color: var(--primary-blue); text-shadow: 0 0 30px rgba(0, 210, 255, 0.4);">Youth Crypto Forum 2026:<br><span style="color: var(--neon-gold);">The Future is Decentralized</span></h1>
        <p style="font-size: 1.8rem; margin-bottom: 3rem; font-weight: 400; opacity: 0.9; color: var(--text-light);">Join 100+ young visionaries in Berlin for a fully-funded leadership journey.</p>
        
        <div style="background: rgba(22, 27, 34, 0.8); backdrop-filter: blur(20px); border-radius: 12px; padding: 2rem; display: flex; flex-direction: column; align-items: center; border: 1px solid rgba(0, 210, 255, 0.3); box-shadow: 0 0 50px rgba(0, 210, 255, 0.2); width: fit-content; margin: 0 auto 3rem;">
            <span style="font-size: 0.9rem; font-weight: 800; text-transform: uppercase; color: var(--neon-gold); letter-spacing: 2px; margin-bottom: 1rem;">MINTING DEADLINE: MARCH 10, 2026</span>
            <div id="countdown" style="display: flex; gap: 2rem; align-items: center; color: var(--primary-blue); font-family: 'Courier New', Courier, monospace;">
                <div style="text-align: center;"><span id="days" style="font-size: 3rem; font-weight: 900;">64</span><div style="font-size: 0.8rem; opacity: 0.6; text-transform: uppercase;">Days</div></div>
                <div style="font-size: 2rem; opacity: 0.5;">:</div>
                <div style="text-align: center;"><span id="hours" style="font-size: 3rem; font-weight: 900;">00</span><div style="font-size: 0.8rem; opacity: 0.6; text-transform: uppercase;">Hours</div></div>
                <div style="font-size: 2rem; opacity: 0.5;">:</div>
                <div style="text-align: center;"><span id="minutes" style="font-size: 3rem; font-weight: 900;">00</span><div style="font-size: 0.8rem; opacity: 0.6; text-transform: uppercase;">Minutes</div></div>
            </div>
        </div>

        <a href="/apply" style="background: transparent; color: var(--primary-blue); text-decoration: none; padding: 1.5rem 4rem; border-radius: 4px; font-weight: 900; font-size: 1.3rem; transition: all 0.4s; text-transform: uppercase; display: inline-block; border: 2px solid var(--primary-blue); box-shadow: 0 0 20px rgba(0, 210, 255, 0.3);" onmouseover="this.style.background='var(--primary-blue)'; this.style.color='var(--dark-bg)'; this.style.boxShadow='0 0 40px rgba(0, 210, 255, 0.6)'" onmouseout="this.style.background='transparent'; this.style.color='var(--primary-blue)'; this.style.boxShadow='0 0 20px rgba(0, 210, 255, 0.3)'">Mint Your Seat</a>
    </div>
</section>

<!-- Core Modules Section -->
<section style="padding: 8rem 10%; background: var(--dark-bg);">
    <div style="text-align: center; margin-bottom: 5rem;">
        <h2 style="color: var(--neon-gold); font-size: 3rem; font-weight: 900; text-transform: uppercase; letter-spacing: -1px;">Protocol Roadmap</h2>
        <div style="width: 80px; height: 4px; background: var(--primary-blue); margin: 1.5rem auto;"></div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 3rem;">
        <!-- Module 1 -->
        <div style="background: var(--card-bg); border-radius: 4px; padding: 3rem; border: 1px solid rgba(255, 215, 0, 0.1); transition: all 0.3s; position: relative; overflow: hidden;" onmouseover="this.style.borderColor='var(--neon-gold)'; this.style.transform='translateY(-10px)'" onmouseout="this.style.borderColor='rgba(255, 215, 0, 0.1)'; this.style.transform='translateY(0)'">
            <div style="position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--neon-gold);"></div>
            <div style="font-size: 0.9rem; color: var(--neon-gold); font-weight: 800; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 2px;">Phase 01</div>
            <h3 style="color: var(--primary-blue); font-size: 1.8rem; margin-bottom: 1.5rem; text-transform: uppercase;">Decentralized Mindset</h3>
            <p style="color: var(--text-gray); font-size: 1.1rem; line-height: 1.8;">Ethics, security, and the philosophy of Web3. Internalizing the core principles of digital self-governance.</p>
        </div>
        <!-- Module 2 -->
        <div style="background: var(--card-bg); border-radius: 4px; padding: 3rem; border: 1px solid rgba(0, 210, 255, 0.1); transition: all 0.3s; position: relative; overflow: hidden;" onmouseover="this.style.borderColor='var(--primary-blue)'; this.style.transform='translateY(-10px)'" onmouseout="this.style.borderColor='rgba(0, 210, 255, 0.1)'; this.style.transform='translateY(0)'">
            <div style="position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--primary-blue);"></div>
            <div style="font-size: 0.9rem; color: var(--primary-blue); font-weight: 800; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 2px;">Phase 02</div>
            <h3 style="color: var(--neon-gold); font-size: 1.8rem; margin-bottom: 1.5rem; text-transform: uppercase;">Governance & DAO</h3>
            <p style="color: var(--text-gray); font-size: 1.1rem; line-height: 1.8;">Fair, transparent digital communities. Conflict resolution in the code-is-law era.</p>
        </div>
        <!-- Module 3 -->
        <div style="background: var(--card-bg); border-radius: 4px; padding: 3rem; border: 1px solid rgba(255, 255, 255, 0.1); transition: all 0.3s; position: relative; overflow: hidden;" onmouseover="this.style.borderColor='var(--white)'; this.style.transform='translateY(-10px)'" onmouseout="this.style.borderColor='rgba(255, 255, 255, 0.1)'; this.style.transform='translateY(0)'">
            <div style="position: absolute; top: 0; left: 0; width: 4px; height: 100%; background: var(--white);"></div>
            <div style="font-size: 0.9rem; color: var(--white); font-weight: 800; margin-bottom: 1rem; text-transform: uppercase; letter-spacing: 2px;">Phase 03</div>
            <h3 style="color: var(--primary-blue); font-size: 1.8rem; margin-bottom: 1.5rem; text-transform: uppercase;">Scalable Impact</h3>
            <p style="color: var(--text-gray); font-size: 1.1rem; line-height: 1.8;">Launching blockchain projects for social and economic impact. Bridging tech with real-world needs.</p>
        </div>
    </div>
</section>

<!-- Funding Tiers -->
<section style="padding: 8rem 10%; background: #0d1117; color: white;">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 6rem; align-items: center;">
        <div>
            <h2 style="font-size: 3.5rem; font-weight: 900; margin-bottom: 2rem; color: var(--neon-gold); text-transform: uppercase;">Funding Tiers</h2>
            <p style="font-size: 1.3rem; color: var(--text-gray); margin-bottom: 3rem; line-height: 1.8;">Our protocol is fully funded for selected visionaries. No gas fees, no barriers.</p>
            
            <div style="display: grid; gap: 2rem;">
                <div style="display: flex; align-items: flex-start; gap: 2rem; background: var(--card-bg); padding: 2rem; border-radius: 4px; border: 1px solid rgba(255,255,255,0.05);">
                    <div style="background: rgba(0, 210, 255, 0.1); color: var(--primary-blue); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; flex-shrink: 0;">✈️</div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem; font-size: 1.4rem; color: var(--white);">Fellowship Nodes</h4>
                        <p style="margin: 0; font-size: 1rem; color: var(--text-gray);">Full travel nodes, 4-star hardware, and daily sustenance protocols included.</p>
                    </div>
                </div>
                <div style="display: flex; align-items: flex-start; gap: 2rem; background: var(--card-bg); padding: 2rem; border-radius: 4px; border: 1px solid rgba(255,255,255,0.05);">
                    <div style="background: rgba(255, 215, 0, 0.1); color: var(--neon-gold); width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.8rem; flex-shrink: 0;">📜</div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem; font-size: 1.4rem; color: var(--white);">Protocol Proof</h4>
                        <p style="margin: 0; font-size: 1rem; color: var(--text-gray);">On-chain recognized certificate in "Collective Leadership for Digital Assets."</p>
                    </div>
                </div>
            </div>
        </div>
        <div style="border-radius: 8px; overflow: hidden; box-shadow: 0 30px 60px rgba(0,0,0,0.6); border: 2px solid rgba(0, 210, 255, 0.2);">
            <img src="attached_assets/stock_images/diverse_young_leader_c35359f6.jpg" alt="Leadership Collaboration" style="width: 100%; height: auto; display: block; filter: grayscale(0.5) contrast(1.2);">
        </div>
    </div>
</section>

<!-- Eligibility Section -->
<section style="padding: 8rem 10%; background: var(--dark-bg); border-top: 1px solid rgba(255, 215, 0, 0.1);">
    <div style="max-width: 800px; margin: 0 auto; text-align: center;">
        <h2 style="color: var(--neon-gold); font-size: 3rem; font-weight: 800; margin-bottom: 3rem; text-transform: uppercase;">Eligibility Protocol</h2>
        <ul style="list-style: none; padding: 0; text-align: left; display: grid; gap: 1.5rem;">
            <li style="padding: 1.5rem; background: var(--card-bg); border-radius: 4px; border: 1px solid rgba(0, 210, 255, 0.1); display: flex; align-items: center; gap: 1.5rem;">
                <span style="color: var(--primary-blue); font-weight: 800; font-size: 1.2rem;">01</span> 
                <div style="color: var(--text-light);"><strong style="color: var(--primary-blue);">Age Matrix:</strong> 18 – 35 years old.</div>
            </li>
            <li style="padding: 1.5rem; background: var(--card-bg); border-radius: 4px; border: 1px solid rgba(0, 210, 255, 0.1); display: flex; align-items: center; gap: 1.5rem;">
                <span style="color: var(--primary-blue); font-weight: 800; font-size: 1.2rem;">02</span> 
                <div style="color: var(--text-light);"><strong style="color: var(--primary-blue);">Node Experience:</strong> Developers, crypto-economists, or social entrepreneurs.</div>
            </li>
            <li style="padding: 1.5rem; background: var(--card-bg); border-radius: 4px; border: 1px solid rgba(0, 210, 255, 0.1); display: flex; align-items: center; gap: 1.5rem;">
                <span style="color: var(--primary-blue); font-weight: 800; font-size: 1.2rem;">03</span> 
                <div style="color: var(--text-light);"><strong style="color: var(--primary-blue);">Region:</strong> Priority for European/German market focus.</div>
            </li>
            <li style="padding: 1.5rem; background: var(--card-bg); border-radius: 4px; border: 1px solid rgba(0, 210, 255, 0.1); display: flex; align-items: center; gap: 1.5rem;">
                <span style="color: var(--primary-blue); font-weight: 800; font-size: 1.2rem;">04</span> 
                <div style="color: var(--text-light);"><strong style="color: var(--primary-blue);">Protocol Values:</strong> Commitment to transparency and financial inclusion.</div>
            </li>
        </ul>
        <a href="/apply" style="margin-top: 4rem; display: inline-block; color: var(--neon-gold); font-weight: 800; text-decoration: none; border: 2px solid var(--neon-gold); padding: 1.2rem 3rem; border-radius: 4px; text-transform: uppercase; letter-spacing: 2px; transition: all 0.3s;" onmouseover="this.style.background='var(--neon-gold)'; this.style.color='var(--dark-bg)'; this.style.boxShadow='0 0 30px rgba(255, 215, 0, 0.4)'" onmouseout="this.style.background='transparent'; this.style.color='var(--neon-gold)'; this.style.boxShadow='none'">Mint Application</a>
    </div>
</section>

<?php include 'footer.php'; ?>