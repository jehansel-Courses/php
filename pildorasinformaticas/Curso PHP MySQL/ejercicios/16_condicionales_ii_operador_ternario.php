<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>16 - Condicionales II. Operador ternario</title>
    <style type="text/css">
        h1 {
            text-align: center;
        }

        table {
            background-color: #FFC;
            padding: 5px;
            border: #666 5px solid;
        }
    </style>

</head>

<body>
    <h1>16 - Condicionales II. Operador ternario</h1>

    <form action="16_validacion_condicionales.php" method="post" name="datos_usuario" id="datos_usuario">
        <table width="15%" align="center">

            <tr>
                <td>Nombre:</td>
                <td><label for="nombre_usuario"></label>
                    <input type="text" name="nombre_usuario" id="nombre_usuario">
                </td>
            </tr>

            <tr>
                <td>Contraseña:</td>
                <td><label for="edad_usuario"></label>
                    <input type="text" name="contra" id="contra">
                </td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td colspan="2" align="center"><input type="submit" name="enviando" id="enviando" value="Enviar"></td>
            </tr>
        </table>
    </form>

</body>

</html>