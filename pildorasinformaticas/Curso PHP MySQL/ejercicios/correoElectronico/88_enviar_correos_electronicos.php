<!DOCTYPE HTML>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>88 - Enviar correos electrónicos</title>
    <style>
        table {
            margin: auto;
            left: 0;
        }
    </style>
</head>

<body>
    <h1>88 - Enviar correos electrónicos</h1>

    <form name="formularioContaco" action="88_enviarMail.php" method="POST">
        <table width="500px">
            <tr>
                <td>
                    <label for="nombre">Nombre: *</label>
                </td>
                <td>
                    <input type="text" name="nombre" maxlength="50" size="25">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="apellido">Apellido: *</label>
                </td>
                <td>
                    <input type="text" name="apellido" maxlength="50" size="25">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Dirección de email: *</label>
                </td>
                <td>
                    <input type="text" name="email" maxlength="80" size="35">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="telefono">Número de teléfono:</label>
                </td>
                <td>
                    <input type="text" name="telefono" maxlength="25" size="15">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="asunto">Asunto:</label>
                </td>
                <td>
                    <input type="text" name="asunto">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="comentarios">Comentarios: *</label>
                </td>
                <td>
                    <textarea name="comentarios" maxlength="500" cols="30" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Enviar">
                </td>
            </tr>
        </table>
    </form>

</body>

</html>