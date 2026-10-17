<?php
require_once "koneksi.php";

$username = "admin";
$password = password_hash("11223344", PASSWORD_DEFAULT);

$stmt = $conn->prepare(
    "INSERT INTO users (username, password)
     VALUES (?, ?)"
);

$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    echo "Akun admin berhasil dibuat.";
} else {
    echo "Gagal membuat akun. Username mungkin sudah ada.";
}

$stmt->close();
$conn->close();
?>