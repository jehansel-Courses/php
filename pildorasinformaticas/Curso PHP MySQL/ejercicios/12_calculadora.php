<style type="text/css">
	.resultado {
		color: #F00;
		font-weight: bold;
		font-size: 132%;
	}
</style>


<?php
	// Si el usuario ha pulsado el botón, ejecuta lo siguiente ...
	if (isset($_POST['button'])) {
		// code...
		$numero1 = $_POST['num1'];
		$numero2 = $_POST['num2'];
		$operacion = $_POST['operacion'];

		calcular($operacion);
	} // if

	function calcular($calculo) {

		global $numero1, $numero2;

		switch ($calculo) {
		    case "Suma":
		    	$solucion = $numero1 + $numero2;
		        echo "<br><p class='resultado'>El resultado de la suma es: $solucion</p>";
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
		} // switch()


		/*
		if (!strcmp("Suma", $operacion)) {
			echo "El resultado es: " . ($numero1 + $numero2);
		}
		*/
	} // calcular()
?>