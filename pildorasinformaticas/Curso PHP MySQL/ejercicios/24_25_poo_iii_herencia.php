<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>24,25 - POO III (clase Coche se encuentra en otro archivo). Herencia</title>
</head>

<body>
    <h1>24,25 - POO III (clase Coche se encuentra en otro archivo). Herencia</h1>
    <?php
    include("24_Coche.php");

    // Creamos el objeto / Instanciamos la clase y le pasamos los parámetros del constructor
    $coche = new Coche("BMW VICTOR", "ROJO", 100);

    // Mostramos la información del primer coche
    echo $coche->mostrarInfo();

    $coche2 = new Coche("SEAT 500", "VERDE");

    // Mostramos la información del segundo coche
    echo $coche2->mostrarInfo();

    // Cmabiamos el color del coche
    $coche2->setColor("BLACK");
    // Mostramos la información del segundo coche
    echo $coche2->mostrarInfo();

    // Método heredado de vehiuclo
    $coche2->setPeso(100);
    echo "<br><br>El peso es: ". $coche2->getPeso();

    ?>

</body>

</html>