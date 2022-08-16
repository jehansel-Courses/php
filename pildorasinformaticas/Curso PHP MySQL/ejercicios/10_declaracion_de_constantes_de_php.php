<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>10 - Declaración de constantes de PHP</title>
</head>
<body>
<h1>10 - Declaración de constantes de PHP</h1>
<?php
	define("AUTOR", "Juan");

	echo "El autor es : " . AUTOR;

	echo "<br>La línea de esta instrucción es: " . __LINE__;
	echo "<br>" . __FILE__;
	echo "<br>" . __DIR__;
	echo "<br>" . __FUNCTION__;
	echo "<br>" . __CLASS__;
	echo "<br>" . __TRAIT__;
	echo "<br>" . __METHOD__;
	echo "<br>" . __NAMESPACE__;
?>

</body>
</html>