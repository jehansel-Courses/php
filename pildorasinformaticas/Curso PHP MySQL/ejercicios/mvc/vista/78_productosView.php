<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>78, 79, 80 - Modelo Vista Controlador III</title>
    <style>
        td {
            border: 1px dotted #FF0000;
        }
    </style>
</head>

<body>
    <!--
    <h1>78, 79, 80 - Modelo Vista Controlador III</h1>
    -->

    <table>
        <tr>
            <td>PRODUCTOS</td>
        </tr>

        <?php
        foreach ($matrizProductos as $registro) {
            echo "<tr><td>" . $registro["nombrearticulo"] . "</tr></td>";
        }
        ?>

    </table>
</body>

</html>