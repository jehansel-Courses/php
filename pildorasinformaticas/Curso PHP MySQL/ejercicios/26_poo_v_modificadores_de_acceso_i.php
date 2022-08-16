<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>26 - POO V. Modificadores de acceso I</title>
</head>

<body>
    <h1>26 - POO V. Modificadores de acceso I</h1>
    <?php
    include("26_Persona.php");

    $persona1 = new Persona();
    $persona1->setGenero("Hombre");
    echo "El género de la persona es: " . $persona1->getGenero();

    $persona1->setParteCuerpo("Tengo cabeza");
    echo "<br>" . $persona1->getParteCuerpo();


    ?>

</body>

</html>