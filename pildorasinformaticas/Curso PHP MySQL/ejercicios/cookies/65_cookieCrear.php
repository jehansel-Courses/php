<?php
setcookie("idiomaSeleccionado", $_GET["idioma"], time() + (60 * 60 * 24 * 30));
//setcookie("idiomaSeleccionado", $_GET["idioma"], time() + (60));
header("Location: 65_cookieLeer.php");
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>65 - Cookies III - Crea cookie</title>
</head>

<body>
    <h1>65 - Cookies III - Crea cookie</h1>
    <p>Cookie creada</p>
</body>

</html>