<?php
if (isset($_COOKIE["idiomaSeleccionado"])) {
    header("Location: 65_cookieLeer.php");
}
?>

<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>65 - Cookies III</title>
</head>

<body>
    <h1>65 - Cookies III</h1>

    <p>Elige idioma</p>
    <br><a href="65_cookieCrear.php?idioma=es">Español</a>
    <br><a href="65_cookieCrear.php?idioma=en">Inglés</a>
</body>

</html>