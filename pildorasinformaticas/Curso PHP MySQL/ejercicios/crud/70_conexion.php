<?php

require("../poo/57_config.php");

try {
    // Creamos la conexión PDO por medio de la isntancia de su clase
    //echo "<br>Conectando a la base de datos con PDO...";
    $conexionDB = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PWD);
    $conexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    //echo "Ok";
    $conexionDB->exec("SET CHARACTER SET utf8");
} // fin try
catch (Exception $e) {
    //die("<br><br>Error: " . $e->getMessage());
    echo "<br><br>Mensaje:" . $e->getMessage();
    echo "<br>Código:" . $e->getCode();
    echo "<br>Archivo:" . $e->getFile();
    echo "<br>Línea:" . $e->getLine();
} // fin catch
