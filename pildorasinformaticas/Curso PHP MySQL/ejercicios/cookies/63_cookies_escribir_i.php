<?php
/*
https://www.php.net/manual/es/function.setcookie.php
setcookie() define una cookie para ser enviada junto con el resto de cabeceras HTTP.
Como otros encabezados, cookies deben ser enviadas antes de cualquier salida en el script (este es un protocolo de restricción). 
Esto requiere que hagas llamadas a esta función antes de cualquier salida, incluyendo etiquetas <html> y <head> así como cualquier espacio en blanco.
*/
//echo "<br>Preparando la cookie escribir o setear...";
// Duracion de la cookie en segundos, ver https://www.php.net/manual/es/function.time.php
setcookie("prueba", "Esta es la información de nuestra primera cookie, revisa el link https://www.php.net/manual/es/function.setcookie.php", time() + 35);
echo "<br>Preparando la cookie escribir o setear...";
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>63 - Cookies I, escribir o setear</title>
</head>

<body>
    <h1>63 - Cookies I, escribir o setear</h1>
    <?php
    echo "<br>Ok";
    ?>
</body>

</html>