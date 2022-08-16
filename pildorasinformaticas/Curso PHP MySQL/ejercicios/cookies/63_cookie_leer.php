<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>63 - Cookies I, leer</title>
</head>

<body>
    <h1>63 - Cookies I, leer</h1>
    <?php
    echo "<br>Preparando la cookie para leer...";

    if (isset($_COOKIE["prueba"])) {
        echo "<br>" . $_COOKIE["prueba"];
        echo "<br>Voy a destruir la cookie..."; // NO LA DESTRUYE PORQUE SE DEBE HACER ANTES DE TODO COMO EN 63_cookie_leer.php
        setcookie("prueba", "Esta es la información de nuestra primera cookie, revisa el link https://www.php.net/manual/es/function.setcookie.php", time() - 1);
        echo "ok";
    } else {
        echo "<br>La cookie no se ha creado";
    }

    ?>
</body>

</html>