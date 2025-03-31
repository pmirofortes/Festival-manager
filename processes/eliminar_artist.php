<?php
include "../services/connection.php";
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM artistas WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    header("Location:../views/main.php?mensaje=Artista eliminado con éxito");
    mysqli_stmt_close($stmt);
    
    exit();
} else {
    header("Location:../views/main.php?mensaje=Artista no se ha podido eliminar");
    exit();
}


?>