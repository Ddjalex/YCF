<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNPSF 2025 - Official Event Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #009edb;
            --dark-blue: #003366;
            --light-blue: #e6f4fa;
            --white: #ffffff;
            --text-gray: #4a4a4a;
        }
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            color: var(--text-gray);
            line-height: 1.6;
            background-color: #fcfcfc;
        }
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
            gap: 1.2rem;
            border-left: 1px solid #eee;
            padding-left: 1.5rem;
            margin-left: 0.5rem;
        }
        .search-icon {
            font-size: 1.2rem;
            color: #666;
            cursor: pointer;
        }
        .lang-switch {
            border: 1.5px solid var(--primary-blue);
            color: var(--primary-blue);
            padding: 0.3rem 0.7rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 700;
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
            <img src="https://thecgdl.org/ydf2026/wp-content/uploads/2024/05/Asset-1-8.png" alt="YCF Logo" class="logo-main-img" style="height: 60px; width: auto; display: block !important; visibility: visible !important; opacity: 1 !important; max-width: none;">
            <div class="logo-divider" style="height: 50px;"></div>
            <div class="logo-text">
                <span class="logo-main" style="font-size: 2.4rem; letter-spacing: 1px; font-weight: 800; color: #2D236E; line-height: 1;">YCF</span>
                <span class="logo-sub" style="font-size: 0.85rem; margin-top: 2px; font-weight: 600; color: #2D236E; white-space: nowrap;">YOUTH CRYPTO Forum Germany 2026</span>
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
            <div class="header-tools">
                <span class="search-icon">🔍</span>
                <span class="lang-switch">EN</span>
            </div>
        </nav>
    </header>
    <main>