<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    // Use the password from the screenshot or a default
    if ($password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header('Location: ./dashboard.php');
        exit;
    } else {
        $error = "Secure access required";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Terminal - YDF 2026</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #f0f2f5; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            height: 100vh; 
            margin: 0;
            background-image: radial-gradient(#d1d5db 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .login-container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.05);
            width: 100%;
            max-width: 450px;
            text-align: center;
        }
        .logo-box {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .logo-box img {
            max-width: 100%;
            height: auto;
        }
        h1 {
            color: #003366;
            font-size: 1.75rem;
            font-weight: 700;
            margin: 0 0 10px;
        }
        p {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 30px;
        }
        .input-group {
            margin-bottom: 25px;
        }
        input[type="password"] {
            width: 100%;
            padding: 15px 20px;
            border: 1px solid #e1e4e8;
            border-radius: 12px;
            font-size: 1rem;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.2s;
            background: #f9fafb;
        }
        input[type="password"]:focus {
            border-color: #009edb;
        }
        button {
            width: 100%;
            padding: 16px;
            background-color: #009edb;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        button:hover {
            background-color: #0080b3;
        }
        .error {
            color: #d93025;
            background: #fce8e6;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-box">
             <img src="../attached_assets/logo/Gemini_Generated_Image_ol8lm2ol8lm2ol8l-removebg-preview.png" alt="Logo">
        </div>
        <h1>Admin Terminal</h1>
        <p>Secure access required</p>
        
        <?php if (isset($error)): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="input-group">
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            <button type="submit">Initialize Dashboard</button>
        </form>
    </div>
</body>
</html>