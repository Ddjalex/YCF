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
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: absolute;
            top: 20px;
            left: 5%;
            right: 5%;
            z-index: 1000;
            padding: 0.8rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 15px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        .logo-container {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .logo-text {
            display: flex;
            flex-direction: column;
            border-right: 1px solid #ddd;
            padding-right: 1.5rem;
        }
        .logo-main {
            font-weight: 700;
            font-size: 1.1rem;
            color: var(--dark-blue);
            line-height: 1.1;
        }
        .logo-sub {
            font-size: 0.75rem;
            color: #666;
            font-weight: 400;
        }
        .logo {
            text-decoration: none;
        }
        nav {
            display: flex;
            align-items: center;
            gap: 1.5rem;
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
        .btn-register {
            background: var(--primary-blue);
            color: white !important;
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-register:hover {
            background: var(--dark-blue);
            transform: translateY(-2px);
        }
        .header-tools {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-left: 1rem;
            padding-left: 1rem;
            border-left: 1px solid #ddd;
        }
        .lang-switch {
            border: 1px solid var(--primary-blue);
            color: var(--primary-blue);
            padding: 0.3rem 0.6rem;
            border-radius: 6px;
            font-size: 0.8rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-container">
            <div class="logo-text">
                <span class="logo-main">YOUTH CRYPTO</span>
                <span class="logo-sub">Forum Germany 2026</span>
            </div>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/UN_emblem_blue.svg/1200px-UN_emblem_blue.svg.png" alt="Emblem" style="height: 40px; opacity: 1;">
        </div>
        <nav>
            <a href="#">About</a>
            <a href="#">News</a>
            <a href="#">Agenda</a>
            <a href="#">Speakers</a>
            <a href="#">Videos</a>
            <a href="#">Photos</a>
            <div class="header-tools">
                <a href="#" style="font-size: 1.2rem;">🔍</a>
                <span class="lang-switch">EN</span>
                <a href="admin.php" style="font-size: 0.7rem; color: #999;">Admin</a>
            </div>
        </nav>
    </header>
    <main>