    </main>
    <footer style="background: #0a1128; color: white; padding: 4rem 10% 2rem; border-top: 1px solid rgba(255,255,255,0.1);">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 3rem; margin-bottom: 3rem;">
            <!-- Column 1: Brand -->
            <div>
                <img src="/attached_assets/logo/Gemini_Generated_Image_ol8lm2ol8lm2ol8l-removebg-preview.png" style="height: 50px; margin-bottom: 1.5rem; filter: brightness(0) invert(1);">
                <p style="font-size: 0.95rem; line-height: 1.6; opacity: 0.8; margin-bottom: 1.5rem;">
                    Bridging Ideas Shaping Futures. The premier platform for youth innovation in the digital economy.
                </p>
            </div>

            <!-- Column 2: Links -->
            <div>
                <h3 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 1.5rem; text-transform: uppercase; letter-spacing: 1px;">Policies, Terms and Conditions</h3>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.8rem;">
                    <li><a href="#" style="color: white; text-decoration: none; opacity: 0.8; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;">› Terms & Conditions</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; opacity: 0.8; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;">› Privacy Policies</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; opacity: 0.8; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;">› Refund Policies</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; opacity: 0.8; font-size: 0.9rem; display: flex; align-items: center; gap: 8px;">› GDPR Compliance Policy</a></li>
                </ul>
            </div>

            <!-- Column 3: Contact -->
            <div>
                <h3 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 1.5rem; text-transform: uppercase; letter-spacing: 1px;">Contact Us</h3>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem;">
                    <li style="display: flex; align-items: center; gap: 12px; font-size: 0.9rem; opacity: 0.8;">
                        <span>📞</span> +49 (30) 1234-5678
                    </li>
                    <li style="display: flex; align-items: center; gap: 12px; font-size: 0.9rem; opacity: 0.8;">
                        <span>✉️</span> info@youthcryptoforum.de
                    </li>
                    <li style="display: flex; align-items: flex-start; gap: 12px; font-size: 0.9rem; opacity: 0.8; line-height: 1.4;">
                        <span>📍</span> Germany: Pariser Platz 1, 10117 Berlin, Germany
                    </li>
                </ul>
                <div style="display: flex; gap: 1rem; margin-top: 1.5rem;">
                    <a href="#" style="width: 35px; height: 35px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">f</a>
                    <a href="#" style="width: 35px; height: 35px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">ig</a>
                    <a href="#" style="width: 35px; height: 35px; background: rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">in</a>
                </div>
            </div>
        </div>
        <div style="text-align: center; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1); font-size: 0.85rem; opacity: 0.6;">
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