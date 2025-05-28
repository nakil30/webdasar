<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$login_count = $_SESSION['login_count'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Selamat Datang</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
        }

        .card {
            background-color: #fff;
            padding: 40px 60px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
        }

        .card h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .card p {
            font-size: 16px;
            color: #555;
        }

        .highlight {
            font-weight: 600;
            color: #007BFF;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>🎉 Selamat Datang!</h1>
        <p>Halo, <span class="highlight"><?php echo htmlspecialchars($username); ?></span></p>
        <p>Ini adalah login Anda yang ke-<span class="highlight"><?php echo $login_count; ?></span></p>
    </div>
</body>

</html>