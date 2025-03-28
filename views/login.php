<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../img/favicon.png">
</head>
<body>
    <header>
        <a href="main.php"> 
            <img class="logo" src="../img/logo2.png">
        </a>
        <h1>Login Music Festival</h1> 
    </header>
    <div class="login-container">
        <form class="login-form" action="../processes/login.php" method="post">
        <h1>Login</h1>
        <p>Introduce tus credenciales para acceder a la aplicación</p>
        
        <div class="form-group">
            <label for="user">Usuario:</label>
            <input type="text" name="user" id="user" required>
        </div>
        
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
        </div>
        
        <input type="submit" value="Iniciar Sesión">
        
        <?php if (isset($_GET["fallo"]) && $_GET["fallo"] == "credenciales"): ?>
            <p class="error">Usuario o contraseña incorrectos.</p>
        <?php endif; ?>
        
        <p class="link">Si no tienes cuenta, <a href="register.php">regístrate</a></p>
        </form>
    </div>
</body>
</html>