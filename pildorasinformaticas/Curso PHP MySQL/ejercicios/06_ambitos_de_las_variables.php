<!doctype html>
<html>
	<head>
		<meta charset="utf-8">	
		<title>6 - Ámbitos de las variables</title>
	</head>

	<body>
		<h1>6 - Ámbitos de las variables</h1>

		<?php
			global $nombre;
			$nombre = "Juan M";

			function dameNombre() {
				//global $nombre;
				$nombre = "El nombre es " . $nombre;
			}

			dameNombre();
			echo $nombre;

		?>
	</body>

</html>