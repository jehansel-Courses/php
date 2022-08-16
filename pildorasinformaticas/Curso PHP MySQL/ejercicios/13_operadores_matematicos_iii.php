<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>13 - Operadores matemáticos III</title>
</head>
<body>
	<p>&nbsp</p>
	
	<h1>13 - Operadores matemáticos III</h1>
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
				<option>Incremento</option>
				<option>Decremento</option>
			</select>
		</p>

		<p>
			<input type="submit" name="button" id="button" value="Enviar" onclick="prueba">
		</p>

	</form>
	<p>&nbsp</p>

	<?php
		include("13_calculadora.php");

		// Si el usuario ha pulsado el botón, ejecuta lo siguiente ...
		if (isset($_POST['button'])) {
			// code...
			$numero1 = $_POST['num1'];
			$numero2 = $_POST['num2'];
			$operacion = $_POST['operacion'];

			calcular($operacion);
		} // if

	?>

</body>
</html>