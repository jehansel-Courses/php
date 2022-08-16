<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>14 - Prioridad operadores</title>
</head>

<body>
	<h1>14 - Prioridad operadores</h1>
    <?php
    $var1 = true;
    $var2 = false;

    // VER
    // https://www.php.net/manual/es/language.operators.precedence.php

    // resultado = FALSO
    //$resultado = $var1 && $var2;

    // resultado = VERDADERO
    $resultado = $var1 and $var2;

    if ($resultado) {
        echo "Verdadero";
    } else {
        echo "Falso";
    }
    ?>

</body>

</html>