    </main>
    <footer style="background: var(--deep-navy); color: white; padding: 5rem 10% 2.5rem; border-top: 1px solid rgba(255,255,255,0.05);">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 4rem; margin-bottom: 4rem;">
            <!-- Column 1: Brand -->
            <div>
                <img src="/attached_assets/logo/Gemini_Generated_Image_ol8lm2ol8lm2ol8l-removebg-preview.png" style="height: 65px; margin-bottom: 2rem; filter: brightness(0) invert(1);">
                <p style="font-size: 1.05rem; line-height: 1.8; opacity: 0.85; margin-bottom: 2rem; font-weight: 300;">
                    Bridging Ideas Shaping Futures. The premier platform for youth innovation in the digital economy.
                </p>
            </div>

            <!-- Column 2: Links -->
            <div>
                <h3 class="montserrat" style="font-size: 1.3rem; font-weight: 800; margin-bottom: 2rem; text-transform: uppercase; letter-spacing: 1.5px; color: var(--primary-blue);">Policies & Terms</h3>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1.2rem;">
                    <li><a href="#" style="color: white; text-decoration: none; opacity: 0.75; font-size: 1rem; display: flex; align-items: center; gap: 12px; transition: opacity 0.3s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.75"><span style="color: var(--primary-blue);">›</span> Terms & Conditions</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; opacity: 0.75; font-size: 1rem; display: flex; align-items: center; gap: 12px; transition: opacity 0.3s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.75"><span style="color: var(--primary-blue);">›</span> Privacy Policies</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; opacity: 0.75; font-size: 1rem; display: flex; align-items: center; gap: 12px; transition: opacity 0.3s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.75"><span style="color: var(--primary-blue);">›</span> Refund Policies</a></li>
                    <li><a href="#" style="color: white; text-decoration: none; opacity: 0.75; font-size: 1rem; display: flex; align-items: center; gap: 12px; transition: opacity 0.3s;" onmouseover="this.style.opacity=1" onmouseout="this.style.opacity=0.75"><span style="color: var(--primary-blue);">›</span> GDPR Compliance</a></li>
                </ul>
            </div>

            <!-- Column 3: Contact -->
            <div>
                <h3 class="montserrat" style="font-size: 1.3rem; font-weight: 800; margin-bottom: 2rem; text-transform: uppercase; letter-spacing: 1.5px; color: var(--primary-blue);">Contact Us</h3>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1.5rem;">
                    <li style="display: flex; align-items: center; gap: 15px; font-size: 1rem; opacity: 0.85;">
                        <span style="font-size: 1.2rem;">📞</span> +49 (30) 1234-5678
                    </li>
                    <li style="display: flex; align-items: center; gap: 15px; font-size: 1rem; opacity: 0.85;">
                        <span style="font-size: 1.2rem;">✉️</span> info@youthcryptoforum.de
                    </li>
                    <li style="display: flex; align-items: flex-start; gap: 15px; font-size: 1rem; opacity: 0.85; line-height: 1.6;">
                        <span style="font-size: 1.2rem;">📍</span> Pariser Platz 1, 10117 Berlin, Germany
                    </li>
                </ul>
                <div style="display: flex; gap: 1.2rem; margin-top: 2.5rem;">
                    <a href="#" style="width: 42px; height: 42px; background: rgba(255,255,255,0.08); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: background 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.08)'">f</a>
                    <a href="#" style="width: 42px; height: 42px; background: rgba(255,255,255,0.08); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: background 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.08)'">ig</a>
                    <a href="#" style="width: 42px; height: 42px; background: rgba(255,255,255,0.08); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: background 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.08)'">in</a>
                </div>
            </div>
        </div>
        <div style="text-align: center; padding-top: 2.5rem; border-top: 1px solid rgba(255,255,255,0.05); font-size: 0.9rem; opacity: 0.6; font-weight: 300; letter-spacing: 0.5px;">
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