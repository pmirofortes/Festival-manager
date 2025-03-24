<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro<h1>
    <h2>Introduce tus datos para registrarte</h2>
    <form action="../processes/insert_user.php" method="post">
        <label for="user">Usuario:</label>
        <input type="text" name="user" id="user" required>
        <label for="user">Correo electronico:</label>
        <input type="email" name="mail" id="mail" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <label for="password">Confirmar contraseña:</label>
        <input type="password" name="confirm_password" id="confirm_password" required>        
        <input type="submit" value="Registro">
    </form>
</body>
</html>