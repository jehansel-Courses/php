<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>11 - Operadores matemáticos I</title>
</head>
<body>
	<p>&nbsp</p>
	
	<h1>11 - Operadores matemáticos I</h1>
	<br>

	<p>&nbsp</p>
	<form name="form1" method="post" action="">
		<p>
			<label for="num1"></label>
			<input type="text" name="num1" id="num1">

			<label for="num2"></label>
			<input type="text" name="num2" id="num2">

			<label for="operacion"></label>
			<select name="operacion" id="operacion">
				<option>Suma</option>
				<option>Resta</option>
				<option>Multiplicación</option>
				<option>División</option>
				<option>Módulo</option>
			</select>
		</p>

		<p>
			<input type="submit" name="button" id="button" value="Enviar" onclick="prueba">
		</p>

	</form>
	<p>&nbsp</p>

	<?php
		// Si el usuario ha pulsado el botón, ejecuta lo siguiente ...
		if (isset($_POST['button'])) {
			// code...
			$numero1 = $_POST['num1'];
			$numero2 = $_POST['num2'];
			$operacion = $_POST['operacion'];

			/*
			if (!strcmp("Suma", $operacion)) {
				echo "El resultado es: " . ($numero1 + $numero2);
			}
			*/

			switch ($operacion) {
			    case "Suma":
			        echo "<br>El resultado de la suma es: " . ($numero1 + $numero2);
			        break;
			    case "Resta":
			        echo "<br>El resultado de la resta es: " . ($numero1 - $numero2);
			        break;
			    case "Multiplicación":
			        echo "<br>El resultado de la multiplicación es: " . ($numero1 * $numero2);
			        break;
			    case "División":
			        echo "<br>El resultado de la división es: " . ($numero1 / $numero2);
			        break;
			    case "Módulo":
			        echo "<br>El resultado del módulo es: " . ($numero1 % $numero2);
			        break;
			}

		}


	?>

</body>
</html>