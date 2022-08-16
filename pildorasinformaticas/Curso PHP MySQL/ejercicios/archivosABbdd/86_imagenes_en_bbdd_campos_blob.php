<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>86 - Imágenes en BBDD. Campos BLOB</title>
    <style>
        table {
            margin: auto;
            width: 500px;
            border: 2px dotted #FF0000;
        }
    </style>
</head>

<body>
    <h1>86 - Imágenes en BBDD. Campos BLOB</h1>
    <form action="86_datosArchivos.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label for="archivo">Archivo:</label>
                </td>
                <td>
                    <input type="file" name="archivo" size="20">
                </td>
            </tr>

            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="submit" value="Enviar Archivo">
                </td>
            </tr>
        </table>
    </form>

</body>

</html>