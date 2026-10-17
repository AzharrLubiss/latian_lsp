<?php
session_start();
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";

if ($username === "" || $password === "") {
    header("Location: index.php?error=1");
    exit;
}

$stmt = $conn->prepare(
    "SELECT id, username, password
     FROM users
     WHERE username = ?
     LIMIT 1"
);

$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user["password"])) {
    session_regenerate_id(true);

    $_SESSION["user_id"] = $user["id"];
    $_SESSION["username"] = $user["username"];

    $stmt->close();
    $conn->close();

    header("Location: dashboard.php");
    exit;
}

$stmt->close();
$conn->close();

header("Location: index.php?error=1");
exit;
?>