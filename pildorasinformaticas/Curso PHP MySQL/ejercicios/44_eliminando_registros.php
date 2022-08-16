<?php

//$busqueda = $_GET["buscar"];
$seccion = $_POST["seccion"];
$articulo = $_POST["articulo"];
$fecha = $_POST["fecha"];
$pais = $_POST["pais"];
$precio = $_POST["precio"];

require("38_datos_conexion.php");

echo "Conectando con la base de datos... ";
//$conexion = mysqli_connect($dbHost, $dbUsuario, $dbContra, $dbNombre);
$conexion = mysqli_connect($dbHost, $dbUsuario, $dbContra);
if (mysqli_connect_errno()) {
    echo "Fallo al conctar con la BBDD";
}
echo "Ok<br>";
mysqli_select_db($conexion, $dbNombre) or die("No se encuentra la BBDD");

// Para que reconozca los caracteres latinos
mysqli_set_charset($conexion, "utf8");

//Preparamos la consulta sql
$query = "DELETE FROM `articulos` WHERE seccion = '$seccion' AND nombrearticulo = '$articulo'";
echo "<br>" . $query;

// Ejecutamos el query
$registros = mysqli_query($conexion, $query);

echo "<br>Registros: " . $registros; 
if ($registros == false) {
    echo "<br>Error al eliminar el registro";
} else {
    //echo "<br>El registro se eliminó correctamente";
    //echo "<br>Registros afectados: " . mysqli_affected_rows($conexion);

    if (mysqli_affected_rows($conexion) == 0) {
        echo "<br>No ha registros por eliminar con ese criterio.";
    } else {    
        echo "<br>Registros afectados: " . mysqli_affected_rows($conexion);
    }
}

// Cerramos la conexión
mysqli_close($conexion);
