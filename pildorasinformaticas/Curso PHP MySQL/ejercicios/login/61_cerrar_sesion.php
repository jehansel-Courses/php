<?php
// Iniciamos o reanudamos la sesión del usuario
session_start();

// cerramos la sesión
session_destroy();

// Redirecciona al login
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = '59_sistema_de_login_i.php';
header("Location: http://$host$uri/$extra");
