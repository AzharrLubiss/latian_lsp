<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "lsp_tibd";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi database gagal.");
}

$conn->set_charset("utf8mb4");
?>