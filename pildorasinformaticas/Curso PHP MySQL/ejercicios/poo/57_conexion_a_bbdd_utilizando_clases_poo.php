<?php
require("57_devuelve_productos.php");

// Instanciamos la clase
$productos = new DevuelveProductos();
// Ejecutamos el método
$arrayProductos = $productos->getProductos();
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>57 - Conexión a BBDD utilizando clases POO</title>
</head>

<body>
    <h1>57 - Conexión a BBDD utilizando clases POO</h1>
    <?php
    foreach ($arrayProductos as $producto) {
        echo "<br>" .
            $producto["seccion"] . " " .
            $producto["nombrearticulo"] . " " .
            $producto["fecha"] . " " .
            $producto["paisorigen"] . " " .
            $producto["precio"];
    }
    ?>
</body>

</html>