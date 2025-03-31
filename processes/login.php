<?php
include '../services/connection.php';

$user = $_POST['user'];
$password = $_POST['password'];

if (isset($user) && isset($password)) {
    // 1. Primero buscamos el usuario para obtener su hash almacenado
    $sql = "SELECT username, password FROM usuarios WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $user);
        
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $stored_hash = $row['password'];
                
                // 2. Verificamos la contraseña contra el hash almacenado
                if (password_verify($password, $stored_hash)) {
                    session_start();
                    $_SESSION['user'] = $user;
                    header("Location: ../views/main.php");
                    exit();
                } else {
                    header("Location: ../views/login.php?error=credenciales");
                    exit();
                }
            } else {
                header("Location: ../views/login.php?error=credenciales");
                exit();
            }
        } else {
            echo "Error al ejecutar la consulta: " . mysqli_error($conn);
        }
        
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
} else {
    echo "Usuario y contraseña no pueden estar vacíos.";
}
?>