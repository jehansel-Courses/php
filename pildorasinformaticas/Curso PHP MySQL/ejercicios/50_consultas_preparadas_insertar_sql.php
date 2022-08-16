<?php

require("38_datos_conexion.php");

echo "Conectando con la base de datos para CONSULTAS PREPARADAS... ";
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

// Creamos la sentencia SQL sustituyendo los valores de criterio por el símbolo ?
$sql = "INSERT INTO `articulos`(`seccion`, `nombrearticulo`, `fecha`, `paisorigen`, `precio`) VALUES (?, ?, ?, ?, ?)";
echo "<br>" . $sql;

// Preparamos la consulta con la función mysqli_prepare()
// Esta función require dos parametros: el objeto conexión y la sentencia sql
// La función devuelve objeto de tipo mysqli_stmt
$stmt = mysqli_prepare($conexion, $sql);

// Unimos los parámetros a la sentencia sql. De esto se encarga la función mysqli_stmt_bind_param()
// Devuelve TRUE o FALSE. 
// Esta función requiere tres parámetros: el objeto mysqli_stmt (devuelto por mysqli_prepare),
// el tipo de dato que se utilizará como criterio en sql, variable con criterio
// La función mysqli_stmt_bind_param devuelve TRUE si tuvó éxito o FALSE si lo contario
$ok = mysqli_stmt_bind_param($stmt, "ssssd", $seccion, $articulo, $fecha, $pais, $precio);

// Ejecutar la consulta con la función mysqli_stms_execute()
// Esta función devuelve TRUE o FALSE
// Necesita como parámetro en el objeto mysqli_stmt
$ok = mysqli_stmt_execute($stmt);
if ($ok == false) {
    echo "<br>Error al ejecutar la consulta";
} else {
    // Asociar variables al resultado de la consulta
    // Esto lo conseguimos con al función mysqli_bind_result()
    // Devuelve TRUE o FALSE
    // Necesita como parámetros el objeto mysqli_stmt y tantas variables como columnas en consulta sql
    //$ok = mysqli_stmt_bind_result($stmt, $seccion, $nombreArticulo, $fecha, $paisOrigen, $precio);

    // Lectura de valores
    // Para ello utilizamos la función mysqli_stmt_fetch()
    // Pide como parámetro el objeto mysqli_stmt
    echo "<br>Agregado nuevo registro<br>";
    /*
    while (mysqli_stmt_fetch($stmt)) {
        echo "<br>" . $seccion . " " . $nombreArticulo . " " . $fecha . " " . $paisOrigen . " " . $precio;
    }
    */
}

mysqli_stmt_close($stmt);
