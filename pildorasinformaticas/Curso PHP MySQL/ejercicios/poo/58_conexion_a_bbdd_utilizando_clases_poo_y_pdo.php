<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>58 - Conexión a BBDD utilizando clases POO y PDO</title>
</head>

<body>
    <h1>58 - Conexión a BBDD utilizando clases POO y PDO</h1>
    <form name="form1" action="58_conexion_a_bbdd_utilizando_clases_poo_y_pdo_buscar.php" method="POST">
        <table border="0" align="center">
            <tr>
                <td>Sección</td>
                <td><label for="seccion"></label><input type="text" name="seccion" id="seccion"></td>
            </tr>
            <tr>
                <td>Artículo</td>
                <td><label for="articulo"></label><input type="text" name="articulo" id="articulo"></td>
            </tr>
            <tr>
                <td>Fecha</td>
                <td><label for="fecha"></label><input type="text" name="fecha" id="fecha"></td>
            </tr>
            <tr>
                <td>País</td>
                <td><label for="pais"></label><input type="text" name="pais" id="pais"></td>
            </tr>
            <tr>
                <td>Precio</td>
                <td><label for="precio"></label><input type="text" name="precio" id="precio"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center" id="boton"><input type="submit" name="enviar" id="enviar" value="Buscar"></td>
            </tr>
        </table>
    </form>

</body>

</html>