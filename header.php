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
        }
        header {
            background: var(--white);
            border-bottom: 1px solid #eee;
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 1rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .logo {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--dark-blue);
            text-decoration: none;
        }
        nav a {
            margin-left: 1.5rem;
            text-decoration: none;
            color: var(--dark-blue);
            font-weight: 600;
        }
        .btn-register {
            background: var(--primary-blue);
            color: white !important;
            padding: 0.6rem 1.2rem;
            border-radius: 4px;
            transition: background 0.3s;
        }
        .btn-register:hover {
            background: var(--dark-blue);
        }
    </style>
</head>
<body>
    <header>
        <a href="index.php" class="logo">YCF 2026</a>
        <nav>
            <a href="#">About</a>
            <a href="#">Agenda</a>
            <a href="#">News</a>
            <a href="admin.php" style="font-size: 0.8rem; color: #999;">Admin</a>
            <a href="#" class="btn-register">Register</a>
        </nav>
    </header>
    <main>