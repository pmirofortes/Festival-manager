<?php
include '../services/connection.php';
$nombre = $_POST['nombre'];
$genero = $_POST['genero'];
$pais = $_POST['pais'];
$fecha = date("Y-m-d H:i:s");


if(isset($nombre) && isset($genero) && isset($pais)){
    //hara el insert a la base de datos
    $sql = "INSERT INTO artistas (nombre, genero, pais, fecha_registro) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssss', $nombre, $genero, $pais, $fecha); 
        if (mysqli_stmt_execute($stmt)) {
            header("Location:../views/main.php");
        } else {
            echo "Error al registrar el artista: " . mysqli_error($conn);
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
} else {
    echo "Error al registrar el artista: " . mysqli_error($conn);
}
?>
