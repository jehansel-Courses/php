<?php
include("70_conexion.php");

//$id = $_GET["id"];
$nom = $_GET["Nom"];
$ape = $_GET["Ape"];
$dir = $_GET["Dir"];

// Preparamos la consulta sql    
$sql = "INSERT INTO datosUsuarios(
            nombre,
            apellido,
            direccion
        )
        VALUES (
            '$nom',
            '$ape',
            '$dir'
        )";
//echo "<br>Query: $sql";
$stmtPDO = $conexionDB->prepare($sql);

// Ejecutamos la consulta
$stmtPDO->execute();

header("Location: 70_crud_i_index.php");
