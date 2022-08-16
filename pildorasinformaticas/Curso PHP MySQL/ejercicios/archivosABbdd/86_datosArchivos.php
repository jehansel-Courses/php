<?php
// Recibimos los datos de la archivo
$archivoNombre = $_FILES["archivo"]["name"];
$archivoTipo = $_FILES["archivo"]["type"];
$archivoTamano = $_FILES["archivo"]["size"];
$archivoTmpNombre = $_FILES["archivo"]["tmp_name"];
$archivoError = $_FILES["archivo"]["error"];

echo "<br>Nombre: " . $archivoNombre;
echo "<br>Tipo: " . $archivoTipo;
echo "<br>Tamaño: " . round($archivoTamano / (1024 * 1000), 2) . " MB";
echo "<br>Ruta temporal: " . $archivoTmpNombre;
echo "<br>Error: " . $archivoError;

$archivoValidoTipo = "image";
$archivoValidoTamano = 1024 * 1000; // (1 MB)

// Se comenta el IF porque ahora se reciben cualquier tipo de archivos
// if (strpos($archivoTipo, $archivoValidoTipo) === 0) {
    if ($archivoTamano <= $archivoValidoTamano) {
        // Ruta de la carpeta destino del servidor
        $carpetaDestino = $_SERVER["DOCUMENT_ROOT"] . "/cursophp/pildorasinformaticas/archivosABbdd/uploadFiles/";
        echo "<br>Ruta destino: " . $carpetaDestino;

        // Movemos la archivo del directorio temporal al directorio destino
        move_uploaded_file($archivoTmpNombre, $carpetaDestino . $archivoNombre);
    } else {
        echo "<br>El tamaño es demasiado grande ok";
    }
// } else {
    // echo "<br>Sólo se pueden subir imágenes.";
// }

// Abrir el archivo desde el index y convertirlo a bytes
$archivoObjetivo = fopen($carpetaDestino . $archivoNombre, "r");
// Transformarlo (leer) a bytes
$archivoContenido = fread($archivoObjetivo, $archivoTamano);
// Quitamos los caracteres que no reconoce 
$archivoContenido = addslashes($archivoContenido);
// Cerramos el flujo de datos del archivo
fclose($archivoObjetivo);

// Conexión a la base de datos
require("../crud/70_conexion.php");
// Preparamos la consulta sql    
$sql = "INSERT archivos
        (nombre, tipo, contenido)
        VALUES ('$archivoNombre', '$archivoTipo', '$archivoContenido')";
echo "<br>Query: $sql";
$stmtPDO = $conexionDB->prepare($sql);

// Ejecutamos la consulta
$resultado = $stmtPDO->execute();
echo "<br>Resultado del INSERT: " . $resultado;
//echo "<br>Resultado del PDO: " . $stmtPDO;
echo "<br>Registros insertados: " . $stmtPDO->rowCount();

// Cerramos la conexion
$stmtPDO = null;
$conexionDB = null;

if($resultado) {
    echo "<br>El registro se insertó con éxito";
} else {
    echo "<br>Error al insertar el registro";
}