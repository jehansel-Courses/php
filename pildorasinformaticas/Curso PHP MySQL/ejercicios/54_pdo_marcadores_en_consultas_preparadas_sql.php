<?php
require("38_datos_conexion.php");

// Para evitar la inyección del SQL por un hacker
// https://www.php.net/manual/es/mysqli.real-escape-string.php
//$busqueda = $_GET["buscar"];
$seccion    = $_POST["seccion"];
$paisOrigen = $_POST["paisOrigen"];

try {

    // Creamos la conexión PDO por medio de la isntancia de su clase
    echo "<br>Conexión a MySQL con PDO y marcadores...";
    $connPDO = new PDO('mysql:host=' . $dbHost . '; dbname=' . $dbNombre, $dbUsuario, $dbContra);
    $connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    echo "Ok";

    $connPDO->exec("SET CHARACTER SET utf8");

    // Preparamos la consulta sql    
    $sql = "SELECT seccion, nombrearticulo, paisorigen, precio FROM articulos WHERE seccion = :seccion AND paisorigen = :paisOrigen";
    echo "<br>" . $sql;
    $stmtPDO = $connPDO->prepare($sql);
    $stmtPDO->bindValue(":seccion", $seccion, PDO::PARAM_STR);
    $stmtPDO->bindValue(":paisOrigen", $paisOrigen, PDO::PARAM_STR);

    // Ejecutamos la consulta
    //$stmtPDO->execute(array(":nomArticulo" => "%" . $articulo . "%"));
    $stmtPDO->execute();

    // Recorremos la data obtenida
    if (!$stmtPDO->rowCount() == 0) {
        while ($renglon = $stmtPDO->fetch(PDO::FETCH_ASSOC)) {
            echo "<br> " . $renglon["seccion"] . " " . $renglon["nombrearticulo"] . " " . $renglon["paisorigen"] . " " . $renglon["precio"];
        }
    } else {
        echo "<br>No se encontraron registros";
    }

    $stmtPDO->closeCursor();
} catch (Exception $e) {
    //die("<br><br>Error: " . $e->getMessage());
    echo "<br><br>Mensaje:" . $e->getMessage();
    echo "<br>Código:" . $e->getCode();
    echo "<br>Archivo:" . $e->getFile();
    echo "<br>Línea:" . $e->getLine();
} finally {

    $connPDO = null;
}
