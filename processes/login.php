<?php
include '../services/connection.php';

$user = $_POST['user'];
$password = $_POST['password'];

if (isset($user) && isset($password)) {
    $sql = "SELECT * FROM usuarios WHERE username = ? AND password = ?"; //cambiar esta consulta
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ss', $user, $password);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location:../views/main.php");
            } else {
                echo "Usuario o contraseña incorrectos";
            }
        } else {
            echo "Error al hacer login: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
} else {
    echo "Error al hacer login: " . mysqli_error($conn);
}



?>