<?php

require("38_datos_conexion.php");

echo "Conectando con la base de datos para BUSCAR... ";
//$conexion = mysqli_connect($dbHost, $dbUsuario, $dbContra, $dbNombre);
$conexion = mysqli_connect($dbHost, $dbUsuario, $dbContra);
if (mysqli_connect_errno()) {
    echo "Fallo al conctar con la BBDD";
}
echo "Ok<br>";
mysqli_select_db($conexion, $dbNombre) or die("No se encuentra la BBDD");

// Para evitar la inyección del SQL por un hacker
// https://www.php.net/manual/es/mysqli.real-escape-string.php
//$busqueda = $_GET["buscar"];
$busqueda = mysqli_real_escape_string($conexion, $_POST["buscar"]);

// Para que reconozca los caracteres latinos
mysqli_set_charset($conexion, "utf8");

//Preparamos la consulta sql
//$query = "SELECT * FROM datospersonales";
//$query = "SELECT * FROM articulos WHERE paisorigen = 'CHINA'";
$query = "SELECT * FROM articulos WHERE nombrearticulo LIKE '%$busqueda%'";
echo "<br>" . $query;

$registros = mysqli_query($conexion, $query);

/*
    //Recorremos la data obtenida para ARRAYS INDEXADOS
    echo "<br><br>Arrays INDEXADOS";
    while (($renglon = mysqli_fetch_row($registros)) == true) {
        echo "<br>";
        echo $renglon[0] . " ";
        echo $renglon[1] . " ";
        echo $renglon[2] . " ";
        echo $renglon[3] . " ";
        echo $renglon[4] . " ";
    }
*/

//Recorremos la data obtenida para ARRAYS ASOCIATIVOS
echo "<br><br>Arrays ASOCIATIVOS";
while (($renglon = mysqli_fetch_array($registros, MYSQLI_ASSOC)) == true) {
    $seccion  = $renglon['seccion'];
    $articulo = $renglon['nombrearticulo'];
    $fecha    = $renglon['fecha'];
    $pais     = $renglon['paisorigen'];
    $precio   = $renglon['precio'];
?>
    <form name="form1" action="46_actualizar_bbdd.php" method="POST">
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

// Cerramos la conexión
mysqli_close($conexion);
?>