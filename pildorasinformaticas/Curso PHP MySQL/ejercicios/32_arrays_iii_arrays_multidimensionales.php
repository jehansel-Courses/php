<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>32 - Arrays III. Arrays multidimensionales</title>
</head>

<body>
    <h1>32 - Arrays III. Arrays multidimensionales</h1>
    <?php

    $alimentos = array(

        "fruta" => array(
            "tropical" => "kiwi",
            "cítrico" => "mandarina",
            "otros" => "manzana"
        ), // fruta

        "leche" => array(
            "animal" => "vaca",
            "vegetal" => "coco"
        ), // leche

        "carne" => array(
            "vacuno" => "lomo",
            "porcino" => "pata"
        ) // carne

    ); // alimentos

    echo "Accede directamente al valor de la segunda dimensión:<br>";
    echo $alimentos["carne"]["vacuno"];

    echo "<br><br>Accede a todos los valores (foreach):<br>";
    foreach( $alimentos as $claveAlimentos => $tipoAlimentos ) {
        
        print("<br>$claveAlimentos:");
        
        //while ( list( $clave, $valor) = each( $tipoAlimentos ) ) {
        foreach( $tipoAlimentos as $clave => $valor) {            
            echo "<br>$clave = $valor";
        }
        echo "<br>";
    }

    echo "<br><br>Todo el arreglo<br>";
    var_dump($alimentos);
    ?>

</body>

</html>