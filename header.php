<?php
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNPSF 2025 - Official Event Portal</title>
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
        }

        * {
            box-sizing: border-box;
        }

        /* Mobile First Responsive Utilities */
        .container {
            width: 95%;
            max-width: 1200px;
            margin: 0 auto;
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
            }
            .logo-text {
                font-size: 0.7rem !important;
            }
            nav {
                display: none !important;
            }
            .mobile-menu-toggle {
                display: flex !important;
                flex-direction: column;
                gap: 5px;
                cursor: pointer;
            }
            .mobile-menu-toggle span {
                width: 25px;
                height: 3px;
                background: var(--dark-blue);
                border-radius: 2px;
            }
            .hero-container {
                padding-top: 100px !important;
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
            padding: 15px 35px !important;
            width: 100% !important;
            max-width: 600px !important;
            background-color: #2D236E !important; /* Matches site theme */
            color: #fff !important;
            border: none !important;
            font-weight: bold !important;
            text-transform: uppercase !important;
            cursor: pointer !important;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            text-decoration: none !important;
            font-size: 1.2rem !important;
            animation: pulse-scaling 2s infinite ease-in-out !important;
        }
        
        .btn-apply-special::before {
            content: '' !important;
            position: absolute !important;
            top: 0 !important;
            left: -110% !important;
            width: 120% !important;
            height: 100% !important;
            background-color: #FFD700 !important; /* The yellow color from site */
            transform: skewX(-30deg) !important;
            transition: left 0.5s cubic-bezier(0.25, 1, 0.5, 1) !important;
            z-index: -1 !important;
        }
        
        .btn-apply-special:hover::before {
            left: -10% !important;
        }
        
        .btn-apply-special:hover {
            color: #2D236E !important; /* Text color on yellow hover */
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
            background: linear-gradient(to right, rgba(0, 158, 219, 0.3) 0%, rgba(255, 255, 255, 0) 60%);
            pointer-events: none;
            z-index: 1;
        }

        @keyframes backgroundMove {
            0% { background-position: 0% 50%; }
            100% { background-position: 200% 50%; }
        }

        .image-text-mask {
            background: linear-gradient(to right, rgba(15, 23, 42, 0.22) 0%, rgba(15, 23, 42, 0) 60%), url('attached_assets/image_1767436778420.png');
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
            <img src="attached_assets/logo/Gemini_Generated_Image_ol8lm2ol8lm2ol8l-removebg-preview.png" alt="YCF Logo" class="logo-main-img" style="height: 60px; width: auto; display: block !important; visibility: visible !important; opacity: 1 !important; max-width: none;">
            <div class="logo-divider" style="height: 50px;"></div>
            <div class="logo-text" style="display: flex; flex-direction: column; justify-content: center; text-transform: uppercase; color: #2D236E; font-weight: 700; line-height: 1.1; font-size: 0.9rem;">
                <span>Youth</span>
                <span>Crypto</span>
                <span>Forum 2026</span>
            </div>
        </div>
        <nav>
            <div class="nav-item">
                <a href="/">Home</a>
            </div>
            <div class="nav-item">
                <a href="/about" style="color: #D4AF37;">About Us <span>⌄</span></a>
                <div class="dropdown">
                    <a href="#">Who We Are?</a>
                    <a href="#">Board of Advisory</a>
                    <a href="#">Board of Expert</a>
                </div>
            </div>
            <div class="nav-item">
                <a href="/agenda">Upcoming Events <span>⌄</span></a>
                <div class="dropdown">
                    <a href="#">🇩🇪 YDF 2026 <span class="badge">NEW</span></a>
                    <a href="#">🇪🇸 YGF 2026</a>
                </div>
            </div>
            <div class="nav-item">
                <a href="/news">Previous Events <span>⌄</span></a>
                <div class="dropdown">
                    <a href="#">🇹🇷 YIF 2025</a>
                    <a href="#">🇨🇭 YEF 2025</a>
                </div>
            </div>
            <div class="nav-item">
                <a href="/blog">Blog</a>
            </div>
            <div class="nav-item">
                <a href="/contact">Contact</a>
            </div>
            <div class="header-tools" style="display: none;">
                <span class="lang-switch btn-custom-animate">EN</span>
            </div>
            <div class="mobile-menu-toggle" style="display: none;">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>
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