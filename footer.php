    </main>
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