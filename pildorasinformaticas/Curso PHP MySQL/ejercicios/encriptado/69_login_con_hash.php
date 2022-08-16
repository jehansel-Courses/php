<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>69 - Login con hash</title>
</head>

<body>
    <h1>69 - Login con hash</h1>

    <form name="form1" action="69_comprueba_login.php" method="POST">
        <table border="0" align="center">
            <tr>
                <td class="tresd">Usuario</td>
                <td>
                    <label for="usuario"></label><input class="tresd" type="text" name="usuario" id="usuario">
                </td>
            </tr>
            <tr>
                <td class="tresd">Contraseña</td>
                <td>
                    <label for="contrasena"></label><input class="tresd" type="password" name="contrasena" id="contrasena">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center" id="boton"><input class="tresd" type="submit" name="enviar" id="enviar" value="Dale"></td>
            </tr>
        </table>
    </form>

</body>

</html>