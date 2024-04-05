<?php
// Iniciar la sesión
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redireccionar al usuario a una página de inicio de sesión u otra página deseada
header("Location: login.php");
exit;
?>