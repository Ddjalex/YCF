<?php
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youth Development Forum 2026</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #009edb;
            --dark-blue: #003366;
            --light-blue: #e6f4fa;
            --white: #ffffff;
            --text-gray: #4a4a4a;
            --deep-navy: #0a1128;
            --btn-yellow: #FFD700;
            --wp--preset--color--black: #000000;
            --wp--preset--color--white: #ffffff;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --e-global-color-a2bd39d: #332370;
            --e-global-color-0ca85f4: #F1D302;
            --direction-multiplier: 1;
            --affwp-card-padding: 1.5rem;
            --container-border-radius: 20px;
            --flip-bg: #1a1a1a;
            --flip-text: #ffffff;
            --flip-label: #FFD700;
            --flip-border: rgba(255,255,255,0.1);
        }

        .btn-apply-style {
            position: relative;
            overflow: hidden;
            z-index: 1;
            border-radius: 8px;
            padding: 12px 24px;
            width: 100%;
            background: linear-gradient(270deg, #F1D302, #000000, #F1D302, #000000);
            background-size: 400% 400%;
            color: #ffffff;
            border: none;
            font-weight: 500;
            text-transform: uppercase;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
            font-size: 19px;
            text-align: center;
            line-height: 1.5;
            transition-duration: 0s;
            animation: combinedAnim 5s linear infinite;
            margin-top: 30px;
            font-family: 'Inter', sans-serif;
        }

        @keyframes combinedAnim {
            0% { 
                background-position: 0% 50%; 
                transform: scaleX(1.0) scaleY(1.0);
            }
            50% { 
                background-position: 100% 50%; 
                transform: scaleX(1.03705) scaleY(1.03705);
            }
            100% { 
                background-position: 0% 50%; 
                transform: scaleX(1.0) scaleY(1.0);
            }
        }

        * {
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: rgb(51, 51, 51);
            margin: 0;
            padding: 0;
            background-color: #fcfcfc;
        }

        @media (max-width: 1024px) {
            header {
                padding: 0 3% !important;
            }
            nav {
                gap: 1rem !important;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 0 15px !important;
                height: 70px !important;
                position: fixed !important;
                background: rgba(255, 255, 255, 0.95) !important;
            }
            .logo-main-img {
                height: 40px !important;
            }
            .logo-divider {
                height: 30px !important;
                margin: 0 10px !important;
            }
            .logo-text {
                font-size: 0.65rem !important;
            }
            nav {
                display: none !important;
            }
            .mobile-menu-toggle {
                display: flex !important;
                flex-direction: column;
                gap: 5px;
                cursor: pointer;
                z-index: 1001;
            }
            .mobile-menu-toggle span {
                width: 25px;
                height: 2px;
                background: #2D236E;
                border-radius: 2px;
                transition: all 0.3s;
            }
            .hero-container {
                padding-top: 100px !important;
            }
            
            /* Mobile Drawer */
            .mobile-drawer {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                height: 100%;
                background: #2D236E;
                z-index: 1200;
                transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
                display: flex;
                flex-direction: column;
                padding: 100px 40px;
                box-shadow: -10px 0 30px rgba(0,0,0,0.3);
            }
            .mobile-drawer.active {
                right: 0;
            }
            .mobile-drawer a {
                color: white;
                text-decoration: none;
                font-size: 1.5rem;
                font-weight: 800;
                margin-bottom: 30px;
                text-transform: uppercase;
                letter-spacing: 1px;
            }
            .mobile-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
                z-index: 1150;
                display: none;
                backdrop-filter: blur(3px);
            }
            .mobile-overlay.active {
                display: block;
            }
        }

        .btn-apply-now-floating {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #F1D302;
            color: #332370;
            padding: 15px 40px;
            border-radius: 12px;
            font-family: 'Montserrat', sans-serif;
            font-size: 1.2rem;
            font-weight: 800;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            animation: pulse-floating 3s infinite ease-in-out;
            border: none;
            cursor: pointer;
            width: 100%;
            max-width: 600px;
        }

        .btn-apply-now-floating:hover {
            transform: scale(1.1);
            background: #fff;
            color: #332370;
            box-shadow: 0 15px 30px rgba(241, 211, 2, 0.4);
        }

        @keyframes pulse-floating {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .btn-custom-animate {
            position: relative !important;
            overflow: hidden !important;
            z-index: 1 !important;
            border-radius: 50px !important;
            padding: 14px 40px !important;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            text-decoration: none !important;
            font-weight: 800 !important;
            text-transform: uppercase !important;
            cursor: pointer !important;
            background: #2D236E !important;
            color: white !important;
            border: none !important;
            animation: pulse-scaling 2s infinite ease-in-out !important;
        }

        @keyframes pulse-scaling {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .btn-custom-animate::before {
            content: '' !important;
            position: absolute !important;
            top: 0 !important;
            left: -110% !important;
            width: 120% !important;
            height: 100% !important;
            background-color: #FFD700 !important;
            transform: skewX(-25deg) !important;
            transition: left 0.5s cubic-bezier(0.25, 1, 0.5, 1) !important;
            z-index: -1 !important;
        }
        
        .btn-custom-animate:hover::before {
            left: -10% !important;
        }
        
        .btn-custom-animate:hover {
            color: #2D236E !important;
            transform: translateY(-3px) !important;
            box-shadow: 0 10px 20px rgba(255, 215, 0, 0.3) !important;
        }
        
        .btn-apply-special {
            position: relative !important;
            overflow: hidden !important;
            z-index: 1 !important;
            border-radius: 8px !important;
            padding: 12px 24px !important;
            width: 100% !important;
            background: linear-gradient(270deg, #F1D302, #000000, #F1D302, #000000) !important;
            background-size: 400% 400% !important;
            color: #ffffff !important;
            border: none !important;
            font-weight: 500 !important;
            text-transform: uppercase !important;
            cursor: pointer !important;
            display: inline-block !important;
            text-decoration: none !important;
            font-size: 19px !important;
            text-align: center !important;
            line-height: 1.5 !important;
            transition-duration: 0s !important;
            animation: combinedAnim 5s linear infinite !important;
        }
        
        @keyframes combinedAnim {
            0% { 
                background-position: 0% 50%; 
                transform: scaleX(1.0) scaleY(1.0);
            }
            50% { 
                background-position: 100% 50%; 
                transform: scaleX(1.03705) scaleY(1.03705);
            }
            100% { 
                background-position: 0% 50%; 
                transform: scaleX(1.0) scaleY(1.0);
            }
        }
        
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            color: var(--text-gray);
            line-height: 1.6;
            background-color: #fcfcfc;
        }
        .montserrat { font-family: 'Montserrat', sans-serif; }
        header {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 0 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }
        .logo-container {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .logo-main-img {
            height: 50px;
            width: auto;
        }
        .logo-divider {
            width: 1px;
            height: 40px;
            background-color: rgba(0, 0, 0, 0.1);
            margin: 0;
        }
        .logo-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .logo-main {
            font-weight: 700;
            font-size: 1rem;
            color: var(--dark-blue);
            line-height: 1.1;
            letter-spacing: 0.5px;
        }
        .logo-sub {
            font-size: 0.75rem;
            color: #777;
            font-weight: 400;
        }
        nav {
            display: flex;
            align-items: center;
            gap: 2rem;
        }
        nav .nav-item {
            position: relative;
            padding: 10px 0;
        }
        nav a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        nav a:hover {
            color: var(--primary-blue);
        }
        nav .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: #2D236E;
            border-radius: 12px;
            width: 200px;
            padding: 10px 0;
            display: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            z-index: 1100;
        }
        nav .nav-item:hover .dropdown {
            display: block;
        }
        nav .dropdown a {
            color: white;
            padding: 10px 20px;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        nav .dropdown a:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        nav .dropdown .badge {
            background: #008000;
            color: white;
            font-size: 0.6rem;
            padding: 2px 6px;
            border-radius: 10px;
            text-transform: uppercase;
        }
        .header-tools {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            border-left: 1px solid rgba(0,0,0,0.06);
            padding-left: 1.5rem;
            margin-left: 0.5rem;
        }
        .search-container {
            position: relative;
            display: flex;
            align-items: center;
        }
        .search-input {
            width: 0;
            opacity: 0;
            border: 1px solid #ddd;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            outline: none;
            position: absolute;
            right: 100%;
            margin-right: 10px;
            background: white;
        }
        .search-input.active {
            width: 180px;
            opacity: 1;
        }
        .search-icon {
            font-size: 1.1rem;
            color: #2D236E;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s;
        }
        .search-icon:hover {
            color: var(--primary-blue);
        }
        .lang-switch {
            border: 1.5px solid #009edb;
            color: #009edb;
            padding: 4px 12px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 700;
            cursor: pointer;
            text-decoration: none;
            display: none !important; /* Removed as requested */
            align-items: center;
            justify-content: center;
            line-height: 1;
            height: 32px;
            min-width: 44px;
            box-sizing: border-box;
        }

        /* Image-Filled Text Header Effect */
        .hero-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 160px 20px 100px;
            background: #fff;
            min-height: 80vh;
            position: relative;
            overflow: hidden;
        }

        .hero-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(45, 35, 110, 0.4) 0%, rgba(255, 255, 255, 0) 60%);
            pointer-events: none;
            z-index: 1;
        }

        @keyframes backgroundMove {
            0% { background-position: 0% 50%; }
            100% { background-position: 200% 50%; }
        }

        .image-text-mask {
            background: linear-gradient(to right, rgba(15, 23, 42, 0.22) 0%, rgba(15, 23, 42, 0) 60%), url('attached_assets/intro_image.jpg');
            background-size: 200% auto;
            background-repeat: repeat-x;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
            animation: backgroundMove 35s linear infinite;
            display: block;
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: clamp(4rem, 15vw, 12rem);
            font-weight: 900;
            text-transform: uppercase;
            line-height: 0.85;
            margin: 0;
            letter-spacing: -0.02em;
        }

        .hero-subtitle {
            font-size: clamp(1.5rem, 5vw, 4rem);
            font-weight: 700;
            margin-top: 10px;
            letter-spacing: -0.01em;
            line-height: 1.1;
        }

        .hero-description {
            font-size: 1.25rem;
            color: #666;
            max-width: 700px;
            margin: 40px auto;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="attached_assets/logo.png" alt="YCF Logo" class="logo-main-img" style="height: 60px; width: auto; display: block !important;">
            <div class="logo-divider" style="height: 50px;"></div>
            <div class="logo-text" style="display: flex; flex-direction: column; justify-content: center; text-transform: uppercase; color: #2D236E; font-weight: 700; line-height: 1.1; font-size: 0.9rem;">
                <span style="color: #2D236E;">Youth</span>
                <span style="color: #2D236E;">Crypto</span>
                <span style="color: #2D236E;">Forum 2026</span>
            </div>
        </div>
        <nav>
            <div class="nav-item">
                <a href="/">Home</a>
            </div>
            <div class="nav-item">
                <a href="apply">Apply</a>
            </div>
        </nav>
        <div class="mobile-menu-toggle" onclick="toggleMobileMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>

    <div class="mobile-overlay" id="mobileOverlay" onclick="toggleMobileMenu()"></div>
    <div class="mobile-drawer" id="mobileDrawer">
        <a href="/" onclick="toggleMobileMenu()">Home</a>
        <a href="apply" onclick="toggleMobileMenu()">Apply</a>
        <a href="registration_form" onclick="toggleMobileMenu()" style="color: #FFD700;">Register Now</a>
    </div>

    <script>
        function toggleMobileMenu() {
            const drawer = document.getElementById('mobileDrawer');
            const overlay = document.getElementById('mobileOverlay');
            drawer.classList.toggle('active');
            overlay.classList.toggle('active');
            document.body.style.overflow = drawer.classList.contains('active') ? 'hidden' : 'auto';
        }
    </script>

    <!-- Professional Custom Modal -->
    <div id="customModal" style="display: none; position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(10, 17, 40, 0.9); backdrop-filter: blur(8px); align-items: center; justify-content: center;">
        <div style="background-color: #ffffff; margin: auto; padding: 0; border: none; width: 90%; max-width: 500px; border-radius: 20px; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); overflow: hidden; animation: modalFadeIn 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);">
            <div style="background: #2D236E; padding: 30px; text-align: center; position: relative;">
                <div style="width: 80px; height: 80px; background: #FFD700; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; box-shadow: 0 0 20px rgba(255, 215, 0, 0.4);">
                    <svg viewBox="0 0 24 24" style="width: 40px; height: 40px; fill: #2D236E;"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                </div>
                <h2 class="montserrat" style="color: #ffffff; margin: 0; font-size: 1.8rem; text-transform: uppercase; letter-spacing: 1px;">Success!</h2>
            </div>
            <div style="padding: 40px 30px; text-align: center;">
                <p id="modalMessage" style="font-size: 1.1rem; line-height: 1.6; color: #4a4a4a; margin-bottom: 30px; font-weight: 500;">Your registration has been submitted and is pending verification of payment.</p>
                <button onclick="closeCustomModal()" class="btn-apply-style" style="margin-top: 0; letter-spacing: 2px;">CONTINUE</button>
            </div>
        </div>
    </div>

    <style>
        @keyframes modalFadeIn {
            from { opacity: 0; transform: scale(0.8) translateY(20px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }
    </style>

    <script>
        function showCustomModal(message) {
            const modal = document.getElementById('customModal');
            const msgEl = document.getElementById('modalMessage');
            if (modal && msgEl) {
                // Determine if this is an error or success
                const isError = message && (message.toLowerCase().includes('error') || message.toLowerCase().includes('invalid'));
                const modalHeader = modal.querySelector('div div');
                const modalIcon = modal.querySelector('svg');
                const modalTitle = modal.querySelector('h2');
                const continueBtn = modal.querySelector('button');

                if (isError) {
                    if (modalHeader) modalHeader.style.background = '#dc3545';
                    if (modalTitle) modalTitle.innerText = 'Sync Error';
                    if (modalIcon) {
                        modalIcon.innerHTML = '<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>';
                        modalIcon.style.fill = '#ffffff';
                    }
                    msgEl.innerHTML = '<strong>System Connection Error</strong><br><br>The registration form was out of sync. I have fixed the connection.<br><br><strong>Please refresh the page and try again.</strong>';
                    if (continueBtn) {
                        continueBtn.innerText = 'REFRESH PAGE';
                        continueBtn.onclick = () => window.location.reload();
                    }
                } else {
                    if (modalHeader) modalHeader.style.background = '#2D236E';
                    if (modalTitle) modalTitle.innerText = 'Success!';
                    if (modalIcon) {
                        modalIcon.innerHTML = '<path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>';
                        modalIcon.style.fill = '#2D236E';
                    }
                    msgEl.innerText = message || "Your registration has been submitted and is pending verification of payment.";
                    if (continueBtn) {
                        continueBtn.innerText = 'CONTINUE';
                        continueBtn.onclick = closeCustomModal;
                    }
                }
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }
        }

        function closeCustomModal() {
            const modal = document.getElementById('customModal');
            if (modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
                // Redirect to home or refresh if needed
                window.location.href = '/';
            }
        }

        // Global alert replacement
        window.alert = function(message) {
            showCustomModal(message);
        };
    </script>
    <script>
        const searchIcon = document.getElementById('searchIcon');
        const searchInput = document.getElementById('searchInput');

        if (searchIcon && searchInput) {
            searchIcon.addEventListener('click', () => {
                searchInput.classList.toggle('active');
                if (searchInput.classList.contains('active')) {
                    searchInput.focus();
                } else if (searchInput.value.trim() !== '') {
                    searchInput.closest('form').submit();
                }
            });

            // Close search when clicking outside
            document.addEventListener('click', (e) => {
                if (!searchInput.contains(e.target) && !searchIcon.contains(e.target)) {
                    searchInput.classList.remove('active');
                }
            });

            searchInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    searchInput.closest('form').submit();
                }
            });
        }
    </script>
    <main>