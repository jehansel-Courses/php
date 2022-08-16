<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>83, 84 - Subir imágenes al servidor</title>
    <style>
        table {
            margin: auto;
            width: 500px;
            border: 2px dotted #FF0000;
        }
    </style>
</head>

<body>
    <h1>83, 84 - Subir imágenes al servidor</h1>
    <form action="83_datosImagen.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label for="imagen">Imagen:</label>
                </td>
                <td>
                    <input type="file" name="imagen" size="20">
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Enviar imagen">
                </td>
            </tr>
        </table>
    </form>

</body>

</html>