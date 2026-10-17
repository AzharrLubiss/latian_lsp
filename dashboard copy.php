
<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

$pages = [
    "home" => "Home",
    "profil" => "Profil",
    "layanan" => "Layanan",
    "kontak" => "Kontak"
];

$page = $_GET["page"] ?? "home";

if (!array_key_exists($page, $pages)) {
    $page = "home";
}

$username = htmlspecialchars(
    $_SESSION["username"],
    ENT_QUOTES,
    "UTF-8"
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pages[$page] ?> | LSP TIBD</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="topbar">
    <a href="dashboard.php" class="brand">
        <span class="brand-mark">L</span>
        <span>
            <strong>LSP TIBD</strong>
            <small>Sertifikasi Profesi</small>
        </span>
    </a>

    <button class="menu-toggle" id="menuToggle"
            type="button" aria-label="Buka menu"
            aria-expanded="false">
        ☰
    </button>

    <nav class="navigation" id="navigation">
        <?php foreach ($pages as $key => $label): ?>
            <a
                href="dashboard.php?page=<?= $key ?>"
                class="<?= $page === $key ? 'active' : '' ?>"
            >
                <?= $label ?>
            </a>
        <?php endforeach; ?>

        <a href="logout.php" class="logout-link">Logout</a>
    </nav>
</header>

<main class="main-content">
    <div class="welcome-bar">
        <div>
            <p class="eyebrow">PORTAL INFORMASI LSP</p>
            <h1><?= $pages[$page] ?></h1>
        </div>
        <div class="user-badge">
            <span class="avatar">A</span>
            <span>
                <strong><?= $username ?></strong>
                <small>Pengguna</small>
            </span>
        </div>
    </div>

    <?php
    require __DIR__ . "/pages/" . $page . ".php";
    ?>
</main>

<footer class="site-footer">
    <p>&copy; 2026 LSP TIBD. Informasi Sertifikasi Profesi.</p>
</footer>

<script src="assets/js/script.js"></script>
</body>
</html>
