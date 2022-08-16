<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>20 - Funciones I</title>
</head>

<body>
    <h1>20 - Funciones I</h1>
    <?php

    // ==========================================================
    function suma($num1, $num2) {
        $resultado = $num1 + $num2;

        return $resultado;
    }

    // Función hecho por el desarrollador
    echo "<br>" . suma(10, 5);

    // ==========================================================

    // ==========================================================
    function frase_mayus($frase, $conversion=true) {
        $frase = strtolower($frase);
        if ($conversion) {
            $resultado = ucwords($frase);
        } else {
            $resultado = strtoupper($frase);
        }

        return $resultado;
    }

    // Función hecho por el desarrollador
    // Sólo le pasamos un parámetro
    echo "<br>" . frase_mayus("esto es una prueba");
    // Le pasamos dos parámetros
    echo "<br>" . frase_mayus("hola mi amigo", false);
    // ==========================================================


    // Funciones de PHP
    // https://www.php.net/manual/es/indexes.functions.php
    echo "<br>" . strtolower("JUAN");
    echo "<br>" . strtoupper("hansel");


    ?>

</body>

</html>