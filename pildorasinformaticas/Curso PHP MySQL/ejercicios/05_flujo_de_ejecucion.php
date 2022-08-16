<?php
	function dameDatos() {
		echo "Este es el mensaje del interior de la función <br>";
		echo "y está fuera antes del HTML tag <br>";
	}
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">	
		<title>5 - Flujo de ejecución</title>
	</head>

	<body>
		<h1>5 - Flujo de ejecución</h1>
		<?php
			echo "Este es el primer mensaje<br>";

			/*
			https://www.anerbarrena.com/diferencia-entre-php-include-require-4973/#:~:text=Usar%C3%ADa%20require%20siempre%20que%20el,y%20pies%20HTML%20o%20similares).
			Diferencia entre PHP include y require
			Ahora os voy a explicar la diferencia entre include y require:

			include inserta en nuestro script un código procedente de otro archivo, si no existe dicho archivo
			o si contiene algún tipo de error nos mostrará un ‘warning‘ por pantalla y el script seguirá ejecutándose.

			require hace la misma operación que include, pero en caso de no existir el archivo
			o error en el mismo mostrará un ‘fatal error‘ y el script no se sigue ejecutando.

			Ya habéis visto que la diferencia está en cómo tratan los errores ambas funciones. Usaría require siempre que el código sea importante (Funciones reutilizables de PHP, configuraciones…), mientras que include lo usaría en casos en los que el código no es vital para la ejecución del script (cabeceras y pies HTML o similares).
			*/
			include("proporciona_datos.php");
			//require("proporciona_datos.php");

			echo "Este es el segundo mensaje<br>";

			echo "Llamando a dameDatos() <br>";			
			dameDatos();

			echo "Antes de proporcionaDatos() <br>";
			proporcionaDatos();

			echo "Fin";
		?>
	</body>

</html>