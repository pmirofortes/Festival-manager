<?php
include '../services/connection.php';

$user = trim($_POST['user']);
$email = trim($_POST['mail']);
$password = trim($_POST['password']);
$confirm_password = trim($_POST['confirm_password']);
$fecha = date("Y-m-d H:i:s");

$regexEmail = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
$regexPassword = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/";

if (empty($user)) {
    header("Location: ../views/register.php?error=1"); 
    exit();
} elseif (strlen($user) < 3) {
    header("Location: ../views/register.php?error=2"); 
    exit();
}

if (empty($email)) {
    header("Location: ../views/register.php?error=3"); 
    exit();
} elseif (!preg_match($regexEmail, $email)) {
    header("Location: ../views/register.php?error=4");
    exit();
}

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) > 0) {
    header("Location: ../views/register.php?error=5"); 
    exit();
}
mysqli_stmt_close($stmt);


if (empty($password)) {
    header("Location: ../views/register.php?error=6"); 
    exit();
} elseif (!preg_match($regexPassword, $password)) {
    header("Location: ../views/register.php?error=7");
    exit();
}

if ($password !== $confirm_password) {
    header("Location: ../views/register.php?error=8");
    exit();
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT INTO usuarios (username, email, password, fecha_registro) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'ssss', $user, $email, $hash, $fecha);
    if (mysqli_stmt_execute($stmt)) {
        session_start();
        $_SESSION['user'] = $user;
        header("Location: ../views/main.php");
        exit();
    } else {
        header("Location: ../views/register.php?error=9"); 
        exit();
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);


header("Location: ../views/register.php?error=9"); 
exit();
?>