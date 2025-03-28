<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Festival Manager</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="../img/favicon.png">
    <script src="../js/validacionRegistro.js"></script> 
</head>
<body>
    <header>
        <a href="main.php"> 
            <img class="logo" src="../img/logo2.png">
        </a>
        <h1>Registro Festival</h1>
    </header>
    
    <div class="register-container">
        <form class="register-form" action="../processes/insert_user.php" method="post">
            <h1>Crear Cuenta</h1>
            <p>Completa tus datos para registrarte</p>
            
            <div class="form-group">
                <label for="user">Nombre de Usuario:</label>
                <input type="text" name="user" id="user" placeholder="Ej: festivalfan" required onblur="validarUser()">
                <div id="user-error" class="error"></div>
            </div>
            
            <div class="form-group">
                <label for="mail">Correo Electrónico:</label>
                <input type="email" name="mail" id="mail" placeholder="tucorreo@ejemplo.com" required onblur="validarEmail()">
                <div id="email-error" class="error"></div>                 
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" placeholder="Contraseña" required onblur="validarPassword()">
                <div id="password-error" class="error"></div>  
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Confirmar Contraseña:</label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Repite tu contraseña" required onblur="validarConfirm()">
                <div id="confirm-error" class="error"></div>  
            </div>
            
            <input type="submit" value="Registrarse" class="btn-primary">
            
            <div class="form-footer">
                <p class="link">¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a></p>
            </div>
        </form>
    </div>
</body>
</html>