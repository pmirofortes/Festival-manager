<?php
include '../services/connection.php';

$nombre = trim($_POST['nombre']);
$genero = trim($_POST['genero']);
$pais = trim($_POST['pais']);
$fecha = date("Y-m-d H:i:s");


if (empty($nombre)) {
    header("Location: ../views/main.php?error=1"); 
    exit();
}

$sql = "SELECT * FROM artistas WHERE nombre = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 's', $nombre);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) > 0) {
    header("Location: ../views/main.php?error=2"); 
    exit();
}
mysqli_stmt_close($stmt);

// Validar género
if (empty($genero)) {
    header("Location: ../views/main.php?error=3"); 
    exit();
}

// Validar país
if (empty($pais)) {
    header("Location: ../views/main.php?error=4"); 
    exit();
}


$sql = "INSERT INTO artistas (nombre, genero, pais, fecha_registro) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'ssss', $nombre, $genero, $pais, $fecha);
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../views/main.php?mensaje=Artista registrado correctamente"); 
        exit();
    } else {
        echo "Error al registrar el artista: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);


header("Location: ../views/main.php?error=5"); 
exit();
?>