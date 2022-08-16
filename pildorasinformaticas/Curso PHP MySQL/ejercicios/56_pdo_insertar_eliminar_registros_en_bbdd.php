<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>56 - PDO insertar y eliminar registros en BBDD</title>
</head>

<body>
    <h1>56 - PDO insertar y eliminar registros en BBDD</h1>
    <form name="form1" action="56_pdo_insertar_eliminar_registros_en_bbdd_sql.php" method="POST">
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
                <td colspan="2" align="center" id="boton"><input type="submit" name="enviar" id="enviar" value="Insertar"></td>
            </tr>
        </table>
    </form>

</body>

</html>