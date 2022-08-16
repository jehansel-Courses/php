<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>21 - Funciones II. Parámetros por valor y refrencia</title>
</head>

<body>
    <h1>21 - Funciones II. Parámetros por valor y refrencia</h1>
    <?php

    // Parámetros por valor
    //function incrementa($valor1) {

    // Parámetros por referencia    
    function incrementa(&$valor1) {
        $valor1++;
        return $valor1;
    }

    $numero = 5;
    // Función hecho por el desarrollador
    echo "<br>Llamada a la función: " . incrementa($numero) . "<br>";
    echo "El valor de número es: $numero";
    ?>

</body>

</html>