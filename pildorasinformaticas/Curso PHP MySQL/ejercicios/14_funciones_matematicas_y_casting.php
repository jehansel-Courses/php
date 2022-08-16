<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>14 - Funciones matemáticas y casting</title>
</head>

<body>
	<h1>14 - Funciones matemáticas y casting</h1>
	<?php

	$num1 = rand();
	echo "El número es: $num1";

	$num2 = rand(10, 50);
	echo "<br>El número entre 10 y 50 es: $num2";

	$num3 = pow(5, 3);
	echo "<br>La potencia de 5 a la 3 es: $num3";

	// tipo float
	$num4 = 5.7556454;
	echo "<br>El $num4 redondeado es: " . round($num4, 2);

	// tipo texto
	$num5 = "5";
	// tipo entero, HACE UN CASTING IMPLÍCITO
	$num5 += 2;
	// tipo float, HACE UN CASTING IMPLÍCITO
	$num5 += 5.75;
	// tipo int, HACE UN CASTING EXPLICITO
	$num5 = (int)$num5;

	echo "<br>El número es: $num5";

	print("<br>Buen viaje");
	?>

</body>

</html>