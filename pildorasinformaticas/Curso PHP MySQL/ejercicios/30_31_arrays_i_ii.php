<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>30,31 - Arrays I, II</title>
</head>

<body>
    <h1>30,31 - Arrays I, II</h1>
    <?php

    // ==============================================================================================
    // Array Indexado | Puedes o no poner los índices iniciando en 0

    print("<br><br>ARRAY INDEXADO");

    $semana[] = "Lunes";
    $semana[] = "Martes";
    $semana[] = "Miércoles";
    $semana[] = "Jueves";
    echo "<br>" .  $semana[1];

    // Para recorrer todo el array INDEXADO
    print("<br><br>DÍAS DE LA SEMANA (for hasta count(arreglo)):");
    for ($i = 0; $i < count($semana); $i++) {
        print("<br>$semana[$i]");
    }

    // Para ordenar de forma alfabética el array
    sort($semana);

    // Para recorrer todo el array INDEXADO
    print("<br><br>DÍAS DE LA SEMANA orden de la A a la Z:");
    for ($i = 0; $i < count($semana); $i++) {
        print("<br>$semana[$i]");
    }

    // ==============================================================================================

    print("<br><br>ARRAY INDEXADO");
    $mes[0] = "Enero";
    $mes[1] = "Febrero";
    $mes[2] = "Marzo";
    echo "<br>" . $mes[1];

    // ==============================================================================================

    // ==============================================================================================

    print("<br><br>ARRAY INDEXADO");
    $edad[] = "8";
    $edad[] = "9";
    $edad[] = "1";
    $edad[] = "3";
    $edad[] = "1";

    // Para recorrer todo el array INDEXADO
    print("<br><br>Edad en desorden:");
    for ($i = 0; $i < count($edad); $i++) {
        print("<br>$edad[$i]");
    }

    // Para ordenar de forma alfabética el array
    rsort($edad);
    print("<br><br>Edad ordenada de Mayor a Menor:");
    for ($i = 0; $i < count($edad); $i++) {
        print("<br>$edad[$i]");
    }

    // ==============================================================================================

    print("<br><br>ARRAY INDEXADO");
    $nombre = array("Hansel", "Jean", "Angy");
    echo "<br>" . $nombre[1];

    // ==============================================================================================

    // Array Asociativo
    print("<br><br>ARRAY ASOCIATIVO");
    $datos = array(
        "Nombre" => "Juan",
        "Apellido" => "Roldán",
        "Edad" => 49
    );
    echo "<br>" . $datos["Apellido"];

    // Para saber si la variable es un array o no
    //$datos = "Zamudio";
    if (is_array($datos)) {
        echo "<br>Sí es un array";
    } else {
        echo "<br>No es array";
    }

    // Para recorrer todo el array ASOCIATIVO
    print("<br><br>INFORMACIÓN DEL USUARIO (foreach):");
    $datos["País"] = "México";
    foreach ($datos as $clave => $valor) {
        //echo "<br>A $clave le corresponde $valor";
        print("<br>A $clave le corresponde $valor");
    } // fin foreach

    // ==============================================================================================

    // Todos los arrays
    print("<br><br>TODOS LOS ARRAYS");
    echo "<br>";
    var_dump($semana);
    echo "<br>";
    var_dump($mes);
    echo "<br>";
    var_dump($nombre);
    echo "<br>";
    var_dump($datos);
    ?>

</body>

</html>