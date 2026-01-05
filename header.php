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
            position: fixed;
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
        nav a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s;
        }
        nav a:hover {
            color: var(--primary-blue);
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
            <img src="https://www.unpsf2025.org/assets/banner-logo-9fqzApTB.svg" alt="UN Logo" class="logo-main-img">
            <div class="logo-divider"></div>
            <div class="logo-text">
                <span class="logo-main">YOUTH CRYPTO</span>
                <span class="logo-sub">Forum Germany 2026</span>
            </div>
        </div>
        <nav>
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/news">News</a>
            <a href="/agenda">Agenda</a>
            <a href="/speakers">Speakers</a>
            <a href="/videos">Videos</a>
            <a href="/photos">Photos</a>
            <a href="/information">Information</a>
            <div class="header-tools">
                <span class="search-icon">🔍</span>
                <span class="lang-switch">EN</span>
            </div>
        </nav>
    </header>
    <main>