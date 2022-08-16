<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>62 - Sesiones y PHP SELF</title>
    <style>
        h1,
        h2,
        div {
            text-align: center;
        }

        .tresd {
            box-shadow: 3px 3px 7px rgba(174, 174, 192, 0.25), -3px -3px 7px rgba(255, 255, 255, 0.7), inset 3px 3px 3px rgba(255, 255, 255, 0.7), inset -3px -3px 3px rgba(174, 174, 192, 0.25);
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <?php

    if (isset($_POST["enviar"])) {

        require("../poo/57_config.php");

        try {
            // Creamos la conexión PDO por medio de la isntancia de su clase
            //echo "<br>Conectando a la base de datos con PDO...";
            $conexionDB = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PWD);
            $conexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            //echo "Ok";
            $conexionDB->exec("SET CHARACTER SET utf8");

            // Preparamos la consulta sql    
            $sql = "SELECT * FROM usuarios_pass 
                    WHERE usuarios = :usuario
                    AND password = :contrasena";
            //echo "<br>Query: $sql";
            $stmtPDO = $conexionDB->prepare($sql);

            // Obtener los datos del formulario
            $usuario = htmlentities(addslashes($_POST["usuario"]));
            $contrasena = htmlentities(addslashes($_POST["contrasena"]));
            // Substituir los valores del formulario en el sql
            $stmtPDO->bindValue(":usuario", $usuario, PDO::PARAM_STR);
            $stmtPDO->bindValue(":contrasena", $contrasena, PDO::PARAM_STR);

            // Ejecutamos la consulta
            $stmtPDO->execute();

            // Contamos el número de registros encontrados
            $numeroRegistros = $stmtPDO->rowCount();

            // Recorremos la data obtenida si existe el usuario
            if ($numeroRegistros != 0) {

                // Iniciamos o reanudamos la sesión del usuario
                session_start();

                // Almacenamos el login del usuario el la variable super globlal SESSION
                // para usarla posteriormente
                $_SESSION["usuarioLogeado"] = $usuario;

                //header("Location: 60_sistema_de_login_ii_user_logged_1.php");

            } else {
/*
                // Redirecciona a una página diferente en el mismo directorio el cual se hizo la petición 
                $host  = $_SERVER['HTTP_HOST'];
                $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                $extra = '59_sistema_de_login_i.php';
                header("Location: http://$host$uri/$extra");
*/
                echo "<br>Usuario o contraseña incorrectos";

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
    } // fin if
    ?>


    <h1>62 - Sesiones y PHP SELF</h1>
    <?php
    if (!isset($_SESSION["usuarioLogeado"])) {
        include("62_formulario.html");
    } else {
        echo "Usuario: " . $_SESSION["usuarioLogeado"];
    }

    ?>
    <h2>Contenido de la web</h2>
    <div>
        <br><img src="imagenes/img1.jpg" width="300" height="166">
        <br><img src="imagenes/img2.jpg" width="300" height="166">
    </div>
</body>

</html>