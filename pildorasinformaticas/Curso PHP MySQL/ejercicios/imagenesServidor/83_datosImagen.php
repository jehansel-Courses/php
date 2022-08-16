<?php
// Recibimos los datos de la imagen
$imagenNombre = $_FILES["imagen"]["name"];
$imagenTipo = $_FILES["imagen"]["type"];
$imagenTamano = $_FILES["imagen"]["size"];
$imagenTmpNombre = $_FILES["imagen"]["tmp_name"];
$imagenError = $_FILES["imagen"]["error"];

echo "<br>Nombre: " . $imagenNombre;
echo "<br>Tipo: " . $imagenTipo;
echo "<br>Tamaño: " . round($imagenTamano / (1024 * 1000), 2) . " MB";
echo "<br>Ruta temporal: " . $imagenTmpNombre;
echo "<br>Error: " . $imagenError;

$archivoValidoTipo = "image";
$archivoValidoTamano = 1024 * 1000; // (1 MB)
if (strpos($imagenTipo, $archivoValidoTipo) === 0) {
    if ($imagenTamano <= $archivoValidoTamano) {
        // Ruta de la carpeta destino del servidor
        $carpetaDestino = $_SERVER["DOCUMENT_ROOT"] . "/cursophp/pildorasinformaticas/imagenesServidor/uploadImages/";
        echo "<br>Ruta destino: " . $carpetaDestino;

        // Movemos la imagen del directorio temporal al directorio destino
        move_uploaded_file($imagenTmpNombre, $carpetaDestino . $imagenNombre);
    } else {
        echo "<br>El tamaño es demasiado grande ok";
    }
} else {
    echo "<br>Sólo se pueden subir imágenes.";
}

require("../crud/70_conexion.php");
// Preparamos la consulta sql    
$sql = "UPDATE articulos SET 
        foto = '$imagenNombre'";
echo "<br>Query: $sql";
$stmtPDO = $conexionDB->prepare($sql);

// Ejecutamos la consulta
$stmtPDO->execute();
