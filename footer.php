    </main>
    <footer style="background: var(--deep-navy); color: white; padding: 4rem 5% 2rem; border-top: 1px solid rgba(255,255,255,0.05);">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 3rem; margin-bottom: 3rem;">
            <!-- Column 1: Brand -->
            <div style="text-align: center; sm-text-align: left;">
                <img src="/attached_assets/logo/Gemini_Generated_Image_ol8lm2ol8lm2ol8l-removebg-preview.png" style="height: 50px; margin-bottom: 1.5rem; filter: brightness(0) invert(1);">
                <p style="font-size: 0.95rem; line-height: 1.6; opacity: 0.85; margin-bottom: 1.5rem; font-weight: 300;">
                    Bridging Ideas Shaping Futures. The premier platform for youth innovation in the digital economy.
                </p>
            </div>

            <!-- Column 2: Links -->
            <div>
                <h3 class="montserrat" style="font-size: 1.1rem; font-weight: 800; margin-bottom: 1.5rem; text-transform: uppercase; letter-spacing: 1.5px; color: var(--primary-blue);">Policies</h3>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                    <li><a href="/terms.php" style="color: white; text-decoration: none; opacity: 0.75; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;"><span style="color: var(--primary-blue);">›</span> Terms & Conditions</a></li>
                    <li><a href="/privacy.php" style="color: white; text-decoration: none; opacity: 0.75; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;"><span style="color: var(--primary-blue);">›</span> Privacy Policies</a></li>
                    <li><a href="/refund.php" style="color: white; text-decoration: none; opacity: 0.75; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;"><span style="color: var(--primary-blue);">›</span> Refund Policies</a></li>
                </ul>
            </div>

            <!-- Column 3: Contact -->
            <div>
                <h3 class="montserrat" style="font-size: 1.1rem; font-weight: 800; margin-bottom: 1.5rem; text-transform: uppercase; letter-spacing: 1.5px; color: var(--primary-blue);">Contact Us</h3>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1.2rem;">
                    <li style="display: flex; align-items: center; gap: 12px; font-size: 0.9rem; opacity: 0.85;">
                        <span>📞</span> +49 (30) 1234-5678
                    </li>
                    <li style="display: flex; align-items: center; gap: 12px; font-size: 0.9rem; opacity: 0.85;">
                        <span>✉️</span> info@youthcryptoforum.de
                    </li>
                </ul>
                <div style="display: flex; gap: 1rem; margin-top: 2rem;">
                    <a href="#" style="width: 36px; height: 36px; background: rgba(255,255,255,0.08); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; font-size: 0.8rem;">f</a>
                    <a href="#" style="width: 36px; height: 36px; background: rgba(255,255,255,0.08); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; font-size: 0.8rem;">ig</a>
                </div>
            </div>
        </div>
        <div style="text-align: center; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.05); font-size: 0.8rem; opacity: 0.6; font-weight: 300;">
            Copyright © 2026 Youth Crypto Forum Germany
        </div>
    </footer>
    <script>
        const targetDate = new Date("<?php echo get_target_date(); ?>").getTime();
        const updateCountdown = setInterval(() => {
            const now = new Date().getTime();
            const distance = targetDate - now;
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            if (document.getElementById("days")) {
                document.getElementById("days").innerText = days.toString().padStart(2, "0");
                document.getElementById("hours").innerText = hours.toString().padStart(2, "0");
                document.getElementById("minutes").innerText = minutes.toString().padStart(2, "0");
                document.getElementById("seconds").innerText = seconds.toString().padStart(2, "0");
            }
            if (distance < 0) {
                clearInterval(updateCountdown);
                if (document.getElementById("countdown")) document.getElementById("countdown").innerHTML = "EVENT STARTED";
            }
        }, 1000);
    </script>
</body>
</html>