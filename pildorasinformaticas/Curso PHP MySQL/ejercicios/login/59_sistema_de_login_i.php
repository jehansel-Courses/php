<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>59 - Sistema de login I</title>
    <style>
        .tresd {
            box-shadow: 3px 3px 7px rgba(174, 174, 192, 0.25), -3px -3px 7px rgba(255, 255, 255, 0.7), inset 3px 3px 3px rgba(255, 255, 255, 0.7), inset -3px -3px 3px rgba(174, 174, 192, 0.25);
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h1>59 - Sistema de login I</h1>
    <form name="form1" action="59_comprueba_login.php" method="POST">
        <table border="0" align="center">
            <tr>
                <td>Usuario</td>
                <td><label for="usuario"></label><input class="tresd" type="text" name="usuario" id="usuario"></td>
            </tr>
            <tr>
                <td>Contraseña</td>
                <td><label for="contrasena"></label><input class="tresd" type="password" name="contrasena" id="contrasena"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="center" id="boton"><input class="tresd" type="submit" name="enviar" id="enviar" value="Acceder"></td>
            </tr>
        </table>
    </form>

</body>

</html>