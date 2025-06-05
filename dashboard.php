<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$login_count = $_SESSION['login_count'];

$register_success = '';
$register_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_user = trim($_POST['nama'] ?? '');
    $new_pass = trim($_POST['umur'] ?? '');

    if ($new_user && $new_pass) {
        // Simulasi pendaftaran (belum disimpan ke database)
        $register_success = "Pengguna <strong>" . htmlspecialchars($new_user) . "</strong> berhasil didaftarkan (simulasi).";
    } else {
        $register_error = "Semua field harus diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f7f9fc;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background-color: #fff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h1 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .highlight {
            font-weight: 600;
            color: #007bff;
        }

        .section-title {
            font-weight: 600;
            margin: 20px 0 10px;
            font-size: 16px;
            text-align: left;
        }

        form {
            margin-top: 10px;
            text-align: left;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .logout-btn {
            margin-top: 15px;
            background-color: #e74c3c;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>👋 Selamat Datang, <span class="highlight"><?= htmlspecialchars($username); ?></span></h1>
        <p>Login ke-<span class="highlight"><?= $login_count; ?></span></p>

        <div class="section-title">📝 Pendaftaran Pengguna</div>
        <form method="post">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="number" name="umur" placeholder="Umur" required>
            <button type="submit">Daftar</button>

            <?php if ($register_success): ?>
                <div class="message success"><?= $register_success ?></div>
            <?php elseif ($register_error): ?>
                <div class="message error"><?= $register_error ?></div>
            <?php endif; ?>
        </form>

        <form action="logout.php" method="post">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</body>

</html>