<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Manager</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="../img/favicon.png">
</head>
<body>
    <header>
    <?php
    echo "<p>Bienvenido, " . $_SESSION['user'] . "</p>";

    ?><!-- logo, boton cerrar sesion, mensaje bienvenida y puede que algun enlace -->
    </header>
    <main>
        <section>
            <h2>Artistas</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Genero</th>
                        <th>País</th>
                        <th>Fecha de inserción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../services/connection.php';
                    $sql = "SELECT * FROM artistas";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['genero'] . "</td>";
                            echo "<td>" . $row['pais'] . "</td>";
                            echo "<td>" . date('d/m/Y', strtotime($row['fecha_registro'])) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "0 resultados";
                    }
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </section>
        <section>
            <h2>Insertar artista</h2>
            <form action="../processes/insert_artist.php" method="post">
                <label for="name">Nombre:</label>
                <input type="text" name="nombre" id="nombre" required>
                <label for="genre">Genero:</label>
                <input type="text" name="genero" id="genero" required>    
                <label for="pais">País:</label>
                <input type="text" name="pais" id="pais" required>
                <input type="submit" value="Insertar">
            </form>
        </section>
</body>
</html>

<!-- tabla de artistas con select (nombre, genero, genero, fecha de insert) -->
 <!-- form para inserts con los campos anteriores -->