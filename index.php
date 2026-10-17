<?php
session_start();

if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit;
}

$error = isset($_GET["error"]);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | LSP TIBD</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-body">

<div class="login-card">
    <div class="logo">LSP TIBD</div>
    <p class="eyebrow">LEMBAGA SERTIFIKASI PROFESI</p>
    <h1>Selamat Datang</h1>
    <p class="muted">Silakan login untuk melanjutkan.</p>

    <?php if ($error): ?>
        <div class="alert">
            Username atau password salah.
        </div>
    <?php endif; ?>

    <form action="proses_login.php" method="POST">
        <label for="username">Username</label>
        <input
            type="text"
            id="username"
            name="username"
            placeholder="Masukkan username"
            maxlength="50"
            autocomplete="username"
            required
        >

        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            name="password"
            placeholder="Masukkan password"
            autocomplete="current-password"
            required
        >

        <button type="submit" class="btn-primary">
            Login
        </button>
    </form>

    <p class="login-footer">
        LSP TIBD &copy; 2026
    </p>
</div>

<script src="assets/js/script.js"></script>
</body>
</html>