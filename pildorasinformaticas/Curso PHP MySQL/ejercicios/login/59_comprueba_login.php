<?php
/* Aquí explica como hacer la redirección
 https://es.stackoverflow.com/questions/19791/php-y-la-funci%C3%B3n-headerlocation

Deberías comprobar que la función header está antes de cualquier respuesta del tipo echo, print_r, var_dump, etc. Una respuesta httpenvía primero las cabeceras y después el contenido. Si se intenta añadir o modificar las cabeceras después de haberlas enviado suele dar este tipo de errores. Es cuestión de comprobar el flujo de la web o aplicación en el tramo de código que comenta @Mariano. – 

Redireccionar con header('Location: ...')
header() envía los encabezados HTTP y debe ser lo primero que envía el server, antes de cualquier otra declaración, sin siquiera líneas en blanco antes. Además, para algunos navegadores, la URL a la que se desea redireccionar no puede ser una ruta relativa, debe ser una ruta absoluta.

header('Location: http://tuweb.com/pagina.html');
die();
Y con die() terminamos inmediatamente la ejecución del script, evitando que se envíe más salida al cliente. Sin embargo, es mejor envíar un mensaje notificando que se ha redireccionado con un enlace para seguir, en caso de que no funcione el redireccionamiento automático. Por ejemplo

header('Location: http://tuweb.com/pagina.html');
echo "El recurso se ha movido hacia <a href=\"http://tuweb.com/pagina.html\">aquí</a>."
die();
Por ejemplo, si quisiéramos redireccionar a una página dentro de la ruta actual, independientemente de cuál sea la ruta:

$host = $_SERVER['HTTP_HOST'];
$ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$html = 'pagina.html';
$url = "http://$host$ruta/$html";
header("Location: $url");
echo "El recurso se ha movido hacia <a href=\"$url\">aquí</a>."
die();
En tu caso, el código PHP debería estar al principio del archivo.

¡Muchas gracias! es tal como tú decías. Puse todo el código php al principio del archivo y se solucionó. Estaba leyendo PHP & MySQL For Dummies y ahí también salía lo del error "headers already sent" y justo decían lo de que no debían haber espacios ni nada antes. Aún así no se me ocurrió que la cosa era tan simple como poner todo el php al principio, como que asumí que el navegador debe leer todo de arriba a abajo y no iba a funcionar. Solucionado
*/

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

        header("Location: 60_sistema_de_login_ii_user_logged_1.php");
    } else {

        // Redirecciona a una página diferente en el mismo directorio el cual se hizo la petición 
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = '59_sistema_de_login_i.php';
        header("Location: http://$host$uri/$extra");

        echo "<br>Go!";

        exit;
    }

    $stmtPDO->closeCursor();
} catch (Exception $e) {
    //die("<br><br>Error: " . $e->getMessage());
    echo "<br><br>Mensaje:" . $e->getMessage();
    echo "<br>Código:" . $e->getCode();
    echo "<br>Archivo:" . $e->getFile();
    echo "<br>Línea:" . $e->getLine();
}

?>

<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>59 - Sistema de login I</title>
</head>

<body>
    <h1>59 - Sistema de login I</h1>
    <?php
    /*
    require("../poo/57_config.php");

    try {
        // Creamos la conexión PDO por medio de la isntancia de su clase
        echo "<br>Conectando a la base de datos con PDO...";
        $conexionDB = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME, DB_USER, DB_PWD);
        $conexionDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$connPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        echo "Ok";
        $conexionDB->exec("SET CHARACTER SET utf8");

        // Preparamos la consulta sql    
        $sql = "SELECT * FROM usuarios_pass 
                    WHERE usuarios = :usuario
                    AND password = :contrasena";
        echo "<br>Query: $sql";
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
            echo "<br>Bienvenido $usuario";
        } else {

            // Redirecciona a una página diferente en el mismo directorio el cual se hizo la petición 
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = '59_sistema_de_login_i.php';
            header("Location: http://$host$uri/$extra");

            echo "<br>Vamonos!";

            exit;
        }

        $stmtPDO->closeCursor();
    } catch (Exception $e) {
        //die("<br><br>Error: " . $e->getMessage());
        echo "<br><br>Mensaje:" . $e->getMessage();
        echo "<br>Código:" . $e->getCode();
        echo "<br>Archivo:" . $e->getFile();
        echo "<br>Línea:" . $e->getLine();
    }
    */
    ?>

</body>

</html>