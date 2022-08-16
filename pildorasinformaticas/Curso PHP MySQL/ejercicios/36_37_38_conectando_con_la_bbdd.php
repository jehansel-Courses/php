<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>36,37,38 - Conectando la web con la BBDD de SiteGround</title>
</head>

<body>
    <h1>36,37,38 - Conectando la web con la BBDD de SiteGround</h1>
    <?php
    // XAMPP Pc local de JMRZ
    /*
    $dbHost    = "localhost";
    $dbNombre  = "pruebas";
    $dbUsuario = "root";
    $dbContra  = "";
    */

    require("38_datos_conexion.php");

    echo "Conectando con la base de datos... ";
    //$conexion = mysqli_connect($dbHost, $dbUsuario, $dbContra, $dbNombre);
    $conexion = mysqli_connect($dbHost, $dbUsuario, $dbContra);
    if (mysqli_connect_errno()) {
        echo "Fallo al conctar con la BBDD";
    }
    echo "Ok<br>";
    mysqli_select_db($conexion, $dbNombre) or die("No se encuentra la BBDD");

    // Para que reconozca los caracteres latinos
    mysqli_set_charset($conexion, "utf8");

    //Preparamos la consulta sql
    //$query = "SELECT * FROM datospersonales";
    $query = "SELECT * FROM articulos WHERE paisorigen = 'CHINA'";
    echo "<br>" . $query . "<br><br>";

    $registros = mysqli_query($conexion, $query);
    //Recorremos la data obtenida
    while (($renglon = mysqli_fetch_row($registros)) == true) {
        echo "<br>";
        echo $renglon[0] . " ";
        echo $renglon[1] . " ";
        echo $renglon[2] . " ";
        echo $renglon[3] . " ";
        echo $renglon[4] . " ";
    }

    // Cerramos la conexión
    mysqli_close($conexion);

    /*
    // mysqli_fetch_row devuelve un array
    $row = mysqli_fetch_row($resulSet);

    echo "<br>";
    var_dump($row);
    echo "<br>" . $row[0];
*/

    /*
    // ==================================================================================
    try {
        //Creamos la conexión PDO por medio de una instancia de su clase
        //$cnn = new PDO("mysql:host=localhost;dbname=prueba", "root", "");
        $cnn = new PDO("mysql:host=$dbHost;dbname=$dbNombre", $dbUsuario, $dbContra);

        //Preparamos la consulta sql
        $respuesta = $cnn->prepare("select * from datospersonales");

        //Ejecutamos la consulta
        $respuesta->execute();

        //Creamos un array donde almacenaremos la data obtenida
        $usuarios = [];

        //Recorremos la data obtenida
        foreach ($respuesta as $res) {
            //Llenamos la data en el array
            $usuarios[] = $res;
        }

        //Hacemos una impresion del array en formato JSON.
        echo json_encode($usuarios);
    } catch (Exception $e) {

        echo $e->getMessage();
    }

    // ==================================================================================
*/
    ?>

</body>

</html>