<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>87 - Imágenes en BBDD. Campos BLOB II</title>
</head>

<body>
    <h1>87 - Imágenes en BBDD. Campos BLOB II</h1>
    <?php

    // Variables con los nombres de los campos de la tabla ARCHIVOS
    $id = "";
    $nombre = "";
    $tipo = "";
    $contenido = "";

    //require("../crud/70_conexion.php");

    require("../poo/57_config.php");

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PWD);
    if (mysqli_connect_errno()) {
        echo "Fallo al conectar con el servidor de la Base de Datos.";
        exit();
    }

    mysqli_select_db($conexion, DB_NAME) or die("No se encuentra la base de datos");
    //mysqli_set_charset($conexion, "utf8");
    mysqli_set_charset($conexion, "utf8mb4_general_ci");

    // Preparamos la consulta sql    
    $sql = "SELECT * FROM archivos
        WHERE id = 9";
    echo "<br>Query: $sql";

    $resultado = mysqli_query($conexion, $sql);
    while ($renglon = mysqli_fetch_array($resultado)) {
        $id = $renglon["id"];
        $nombre = $renglon["nombre"];
        $tipo = $renglon["tipo"];
        $contenido = $renglon["contenido"];
    }



    /*
    $stmtPDO = $conexionDB->prepare($sql);

    // Ejecutamos la consulta
    $stmtPDO->execute();

    // registros es un array de objetos
/*
    $registros = $stmtPDO->fetchAll(PDO::FETCH_OBJ);
    foreach ($registros as $archivo) :
        $id = $archivo->id;
        $nombre = $archivo->nombre;
        $tipo = $archivo->tipo;
        $contenido = $archivo->contenido;
    endforeach;
*/
    /*
    while ($renglon = $stmtPDO->fetch(PDO::FETCH_ASSOC)) {
        $id = $renglon["id"];
        $nombre = $renglon["nombre"];
        $tipo = $renglon["tipo"];
        $contenido = $renglon["contenido"];
    }
*/
    echo "<br>Id: " . $id;
    echo "<br>Nombre: " . $nombre;
    echo "<br>Tipo: " . $tipo;
    //echo "<br>Contenido: " . $contenido;

    //echo "<img src='data:image/jpeg;base64," . base64_encode(stripslashes($contenido)) . "' width = '50px' height = '50px'/>";
    echo "<br>";
    echo "<img src='data:" . $tipo . "; base64," . base64_encode($contenido) . "'>";
    //echo "<img src='data:image/png;base64," . $contenido . "' width = '50px' height = '50px'/>";
    /*
    echo "<br>";
    echo "<a href=' " . base64_encode($contenido) . "'>Ver</a>";
*/
/*
    echo "<br>";    
    echo "Segundo intento";
    header("Content-type: $tipo");
    print $contenido;
*/
    ?>
</body>

</html>