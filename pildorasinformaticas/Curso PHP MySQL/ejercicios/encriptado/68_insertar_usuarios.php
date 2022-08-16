<?php
require("../poo/57_config.php");

try {
    // Creamos la conexión PDO por medio de la isntancia de su clase
    //echo "<br>Conectando a la base de datos con PDO...";
    $conexionDB = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PWD);
    $conexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Ok";
    $conexionDB->exec("SET CHARACTER SET utf8");

    // Preparamos la consulta sql    
    $sql = "INSERT INTO `usuarios_pass`(`usuarios`, `PASSWORD`) VALUES (:usuario, :contrasena)";
    echo "<br>Query: $sql";
    $stmtPDO = $conexionDB->prepare($sql);

    // Obtener los datos del formulario
    $usuario = htmlentities(addslashes($_POST["usuario"]));
    $contrasena = htmlentities(addslashes($_POST["contrasena"]));

    // Se cifra la contraseña con los valores por defecto (COSTE = 10)
    // pwd = 12345, cifrado = $2y$10$PEA9NtDdO12fd
    //$contrasena_cifrado = password_hash($contrasena, PASSWORD_DEFAULT);
    // Se cifra la contraseña con COSTE = 12
    // pwd = 12345, cifrado = $2y$12$/EN4QgG.imXos
    $contrasena_cifrado = password_hash($contrasena, PASSWORD_DEFAULT, array("cost" => 12));

    // Substituir los valores del formulario en el sql
    $stmtPDO->bindValue(":usuario", $usuario, PDO::PARAM_STR);
    //$stmtPDO->bindValue(":contrasena", $contrasena, PDO::PARAM_STR);
    $stmtPDO->bindValue(":contrasena", $contrasena_cifrado, PDO::PARAM_STR);

    // Ejecutamos la consulta
    $stmtPDO->execute();

    // Contamos el número de registros encontrados
    $numeroRegistros = $stmtPDO->rowCount();

    // Recorremos la data obtenida si existe el usuario
    if ($numeroRegistros != 0) {
        // El usr y pwd son correctos
        echo "<br>El user y pwd se persistieron correctamente";
    } else {
        echo "<br>Error al persistir en la base de datos";
    }
    $stmtPDO->closeCursor();
} // fin try
catch (Exception $e) {
    //die("<br><br>Error: " . $e->getMessage());
    echo "<br><br>Mensaje:" . $e->getMessage();
    echo "<br>Código:" . $e->getCode();
    echo "<br>Archivo:" . $e->getFile();
    echo "<br>Línea:" . $e->getLine();
} // fin catch
