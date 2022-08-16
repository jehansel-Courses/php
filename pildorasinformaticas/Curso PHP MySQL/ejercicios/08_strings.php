<!doctype html>
<html>
	<head>
		<meta charset="utf-8">	
		<title>8 - Strings</title>
		<style type="text/css">

			.resaltar {
				color: #F00;
				font-weight: bold;

			}
		</style>
	</head>

	<body>
		<h1>8 - Strings</h1>
		<?php
			echo "<p class='resaltar'>Esto es un ejemplo de frase comilla doble</p>";
			echo '<p class="resaltar">Esto es un ejemplo de frase comilla simple</p>';
			echo "<p class=\"resaltar\">Esto es un ejemplo de frase comilla doble con barra invertida</p>";
			echo '<p class=\'resaltar\'>Esto es un ejemplo de frase comilla simple con barra invertida</p>';

			$nombre = "Juan";
			echo "Hola $nombre comilla doble <br>";
			echo 'Hola $nombre comilla simple <br>';

			/*
			strcmp devuelve 1 = true, 0 = false
			strcasecmp devuelve 1 = true, 0 = false
			*/

			$var1 = "Casa";
			$var2 = "CASA";

			$resultado = strcmp($var1, $var2);
			echo "strcmp = El resultado de $var1 y $var2 es $resultado <br>";
			if($resultado) {
				echo "No<br>";
			} else {
				echo "Si<br>";
			}

			$resultado2 = strcasecmp($var1, $var2);
			echo "strcasecmp = El resultado de $var1 y $var2 es $resultado2 <br>";
			if($resultado2) {
				echo "No<br>";
			} else {
				echo "Si<br>";
			}

		?>

	</body>

</html>