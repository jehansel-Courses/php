<?php
require("58_devuelve_productos.php");

$pais = $_POST["pais"];

// Instanciamos la clase
$productos = new DevuelveProductos();
// Ejecutamos el método
$arrayProductos = $productos->getProductos($pais);
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>58 - Conexión a BBDD utilizando clases POO y PDO</title>
</head>

<body>
    <h1>58 - Conexión a BBDD utilizando clases POO y PDO</h1>
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