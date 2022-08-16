<?php
//$busqueda = $_GET["buscar"];
$busqueda = $_POST["buscar"];

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
    echo "<br>";
    echo $renglon["seccion"] . " ";
    echo $renglon["nombrearticulo"] . " ";
    echo $renglon["paisorigen"] . " ";
    echo $renglon["precio"] . " ";
}

echo "<br>Fin";

// Cerramos la conexión
mysqli_close($conexion);
