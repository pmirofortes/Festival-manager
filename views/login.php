<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <p>Introduce tus credenciales para acceder a la aplicación</p>
    <form action="../processes/login.php" method="post">
        <label for="user">Usuario:</label>
        <input type="text" name="user" id="user" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <input type="submit" value="Login">
    </form>
    <p>Si no tienes cuenta, <a href="register.php">registrate</a></p>
</body>
</html>