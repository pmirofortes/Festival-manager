<?php
session_destroy();
setcookie(session_name(), '', time() - 3600, '/'); // Eliminar cookie
header("Location: ../index.php")
?>