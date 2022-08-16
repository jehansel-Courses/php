<!doctype html>
<html>
	<head>
		<meta charset="utf-8">	
		<title>7 - Variables estáticas</title>
	</head>

	<body>
		<h1>7 - Variables estáticas</h1>
		<?php
			function incrementaVariable() {
				$contador = 0;
				$contador++;

				echo $contador . "<br>";
			}

			echo "Contador <br>";
			incrementaVariable();
			incrementaVariable();
			incrementaVariable();
			incrementaVariable();

			function incrementaVariable2() {
				static $contadores = 0;
				$contadores++;

				echo $contadores . "<br>";
			}

			echo "Contadores <br>";
			incrementaVariable2();
			incrementaVariable2();
			incrementaVariable2();
			incrementaVariable2();

		?>
	</body>

</html>