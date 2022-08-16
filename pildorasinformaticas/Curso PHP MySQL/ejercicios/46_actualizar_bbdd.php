<?php
require("38_datos_conexion.php");

echo "Conectando con la base de datos para ACTUALIZAR... ";
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
$seccion  = mysqli_real_escape_string($conexion, $_POST["seccion"]);
$articulo = mysqli_real_escape_string($conexion, $_POST["articulo"]);
$fecha    = mysqli_real_escape_string($conexion, $_POST["fecha"]);
$pais     = mysqli_real_escape_string($conexion, $_POST["pais"]);
$precio   = mysqli_real_escape_string($conexion, $_POST["precio"]);

// Para que reconozca los caracteres latinos
mysqli_set_charset($conexion, "utf8");

//Preparamos la consulta sql
$query = "UPDATE `articulos` SET `seccion`='$seccion',`nombrearticulo`='$articulo',`fecha`='$fecha',`paisorigen`='$pais',`precio`='$precio' WHERE seccion = '$seccion' AND nombrearticulo = '$articulo'";
echo "<br>" . $query;

// Ejecutamos el query
$registros = mysqli_query($conexion, $query);

echo "<br>Registros: " . $registros;
if ($registros == false) {
    echo "<br>Error al actualizar el registro";
} else {
    //echo "<br>El registro se eliminó correctamente";
    //echo "<br>Registros afectados: " . mysqli_affected_rows($conexion);

    if (mysqli_affected_rows($conexion) == 0) {
        echo "<br>No hay registros para actualizar con ese criterio.";
    } else {
        echo "<br>Registros actualizados: " . mysqli_affected_rows($conexion);
    }
}

// Cerramos la conexión
mysqli_close($conexion);
