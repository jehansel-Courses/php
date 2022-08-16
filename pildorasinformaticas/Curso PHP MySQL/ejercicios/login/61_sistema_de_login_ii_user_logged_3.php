<?php
// Iniciamos o reanudamos la sesión del usuario
session_start();

// Rescatamos el valor de la variable super globlal 
// para verificar que es un usuario logeado
if (!isset($_SESSION["usuarioLogeado"])) {
    // Como el usuario no es válido
    // Redirecciona al login
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '59_sistema_de_login_i.php';
    header("Location: http://$host$uri/$extra");
}

?>

<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>60 - Sistema de login II (user logged 3)</title>
</head>

<body>
    <h1>60 - Sistema de login II (user logged 3)</h1>
    
    <?php
    echo "<br>Usuario " . $_SESSION["usuarioLogeado"];
    ?>

    <p>Esto es información sólo para usuarios registrados</p>
    <br><a href="60_sistema_de_login_ii_user_logged_1.php">Página 1</a>
    <br><a href="61_sistema_de_login_ii_user_logged_2.php">Página 2</a>
    <br><a href="61_sistema_de_login_ii_user_logged_4.php">Página 4</a>

    <br><br><a href="61_cerrar_sesion.php">Cerrar sesión</a>
</body>

</html>