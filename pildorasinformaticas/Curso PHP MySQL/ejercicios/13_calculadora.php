<style type="text/css">
	.resultado {
		color: #F00;
		font-weight: bold;
		font-size: 132%;
	}
</style>


<?php

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
		    case "Incremento":
		    	$numero1++;
		        echo "<br>El resultado del incremento es: " . ($numero1);
		        break;
		    case "Decremento":
		    	$numero1--;
		        echo "<br>El resultado del decremento es: " . ($numero1);
		        break;
		} // switch()


		/*
		if (!strcmp("Suma", $operacion)) {
			echo "El resultado es: " . ($numero1 + $numero2);
		}
		*/
	} // calcular()
?>