<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>28,29 - POO VII, VII. Variables y métodos estáticos</title>
</head>

<body>
    <h1>28,29 - POO VII, VIII. Variables y métodos estáticos</h1>
    <?php

    include("28_Concesionario.php");

    //CompraVehiculo::$ayuda = 10000;
    CompraVehiculo::descuentoGobierno();

    $compraAntonio = new CompraVehiculo("compacto");
    $compraAntonio->climatizador();
    $compraAntonio->tapiceriaCuero("blanco");
    echo "<br>Antonio: " . $compraAntonio->precioFinal();

    $compraAna = new CompraVehiculo("compacto");
    $compraAna->climatizador();
    $compraAna->tapiceriaCuero("rojo");
    echo "<br>Ana: " . $compraAna->precioFinal();

    ?>

</body>

</html>