<?php
require("38_datos_conexion.php");

// Para evitar la inyección del SQL por un hacker
// https://www.php.net/manual/es/mysqli.real-escape-string.php
//$busqueda = $_GET["buscar"];
$articulo = $_POST["buscar"];

try {

    // Creamos la conexión PDO por medio de la isntancia de su clase
    $connPDO = new PDO('mysql:host=' . $dbHost . '; dbname=' . $dbNombre, $dbUsuario, $dbContra);
    $connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<br>Conexión a MySQL con PDO... Ok";

    $connPDO->exec("SET CHARACTER SET utf8");

    // Preparamos la consulta sql    
    $sql = "SELECT seccion, nombrearticulo, paisorigen FROM articulos WHERE nombrearticulo LIKE ?";
    echo "<br>" . $sql;
    $stmtPDO = $connPDO->prepare($sql);
    $stmtPDO->bindValue(1, "%$articulo%", PDO::PARAM_STR);

    // Ejecutamos la consulta
    //$stmtPDO->execute(array("%Caballero%"));
    $stmtPDO->execute();

    // Recorremos la data obtenida
    if (!$stmtPDO->rowCount() == 0) {
        while ($renglon = $stmtPDO->fetch(PDO::FETCH_ASSOC)) {
            echo "<br> " . $renglon["seccion"] . " " . $renglon["nombrearticulo"] . " " . $renglon["paisorigen"];
        }
    } else {
        echo "<br>No se encontraron registros";
    }

    $stmtPDO->closeCursor();
} catch (Exception $e) {

    die("Error: " . $e->getMessage());
} finally {

    $connPDO = null;
}
