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
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.95) 0%, rgba(245, 250, 255, 0.98) 100%);
            backdrop-filter: blur(15px);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 0 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            height: 80px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.8);
        }
        .logo-container {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .logo-main-img {
            height: 55px;
            width: auto;
        }
        .logo-divider {
            width: 1px;
            height: 45px;
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
            color: #555;
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
            <a href="#">About</a>
            <a href="#">News</a>
            <a href="#">Agenda</a>
            <a href="#">Speakers</a>
            <a href="#">Videos</a>
            <a href="#">Photos</a>
            <a href="#">Information</a>
            <a href="#">Media Bank</a>
            <div class="header-tools">
                <span class="search-icon">🔍</span>
                <span class="lang-switch">EN</span>
                <a href="admin.php" style="font-size: 0.6rem; color: #ccc; margin-left: 0.5rem; text-decoration: none;">Admin</a>
            </div>
        </nav>
    </header>
    <main>