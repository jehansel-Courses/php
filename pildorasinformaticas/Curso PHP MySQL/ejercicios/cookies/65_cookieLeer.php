<?php
if (!$_COOKIE["idiomaSeleccionado"]) {
    header("Location: 65_cookies_iii_practica_1.php");
} elseif ($_COOKIE["idiomaSeleccionado"] == "es") {
    header("Location: 65_espanol.php");
} elseif ($_COOKIE["idiomaSeleccionado"] == "en") {
    header("Location: 65_ingles.php");
}
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>65 - Cookies III - Leer cookie</title>
</head>

<body>
    <h1>65 - Cookies III - Leer cookie</h1>
</body>

</html>