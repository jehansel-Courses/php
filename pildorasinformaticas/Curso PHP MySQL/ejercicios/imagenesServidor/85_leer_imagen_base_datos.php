<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>85 - Subir imágenes al servidor III. Leer imagen de la base de datos</title>
</head>

<body>
    <h1>85 - Subir imágenes al servidor III. Leer imagen de la base de datos</h1>
    <?php
    require("../crud/70_conexion.php");
    // Preparamos la consulta sql    
    $sql = "SELECT foto FROM articulos
        WHERE seccion = 'CERÁMICA' 
        AND nombrearticulo = 'Tubos'";
    echo "<br>Query: $sql";
    $stmtPDO = $conexionDB->prepare($sql);

    // Ejecutamos la consulta
    $stmtPDO->execute();

    // registros es un array de objetos
    $registros = $stmtPDO->fetchAll(PDO::FETCH_OBJ);

    foreach ($registros as $articulo) :
        $rutaImagen = $articulo->foto;
        echo "<br>Foto: " . $rutaImagen;
    endforeach;
    ?>
    <div>
        <img src="/cursophp/pildorasinformaticas/imagenesServidor/uploadImages/<?php echo $rutaImagen ?>" alt="Imagen del articulo" width="25%">
    </div>
</body>

</html>