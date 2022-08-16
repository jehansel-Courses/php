<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>51 - Conexión a BBDD con POO</title>
</head>

<body>
    <h1>51 - Conexión a BBDD con POO</h1>
    <?php
    require("38_datos_conexion.php");

    $conexion = new mysqli($dbHost, $dbUsuario, $dbContra, $dbNombre);

    if ($conexion->connect_errno) {
        echo "<br>Falló la conexión: " . $conexion->connect_errno;
    } else {
        echo "<br>Conectado a: " . $dbHost;
    }

    $conexion->set_charset("utf8");

    $sql = "SELECT * FROM articulos";

    $registros = $conexion->query($sql);

    if ($conexion->connect_errno) {
        die($conexion->error);
        echo "<br>Falló el query: " . $conexion->connect_errno;
    } else {
        echo "<br>SQL: " . $sql;
    }

    while ($renglon = $registros->fetch_assoc()) {
        $seccion  = $renglon['seccion'];
        $articulo = $renglon['nombrearticulo'];
        $fecha    = $renglon['fecha'];
        $pais     = $renglon['paisorigen'];
        $precio   = $renglon['precio'];
    ?>
        <form name="form1" action="#" method="POST">
            <table border="0" align="center">
                <tr>
                    <td>Sección</td>
                    <td><label for="seccion"></label><input type="text" name="seccion" id="seccion" value="<?php echo $seccion ?>"></td>
                </tr>
                <tr>
                    <td>Artículo</td>
                    <td><label for="articulo"></label><input type="text" name="articulo" id="articulo" value="<?php echo $articulo ?>"></td>
                </tr>
                <tr>
                    <td>Fecha</td>
                    <td><label for="fecha"></label><input type="text" name="fecha" id="fecha" value="<?php echo $fecha ?>"></td>
                </tr>
                <tr>
                    <td>País</td>
                    <td><label for="pais"></label><input type="text" name="pais" id="pais" value="<?php echo $pais ?>"></td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td><label for="precio"></label><input type="text" name="precio" id="precio" value="<?php echo $precio ?>"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="center"><input type="submit" name="enviar" id="enviar" value="Actualizar"></td>
                    <td align="center"><input type="reset" name="borrar" id="borrar" value="Borrar"></td>
                </tr>
            </table>
        </form>

    <?php
    }

    $conexion->close();
    ?>
</body>

</html>