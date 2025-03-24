<?php
include '../services/connection.php';
$user = $_POST['user'];
$email = $_POST['mail'];
$password = $_POST['password'];
$fecha = date("Y-m-d H:i:s");


if(isset($user) && isset($email) && isset($password)){
    //hara el insert a la base de datos
    $sql = "INSERT INTO usuarios (username, email, password, fecha_registro) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssss', $user, $email, $password, $fecha); 
        if (mysqli_stmt_execute($stmt)) {
            header("Location:../views/main.php");
        } else {
            echo "Error al registrar el usuario1: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
} else {
    echo "Error al registrar el usuario: " . mysqli_error($conn);
}
?>
