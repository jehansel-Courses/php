<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>78, 79, 80 - Modelo Vista Controlador III</title>
    <!--
    <link rel="stylesheet" type="text/css" href="./css/81_hoja.css">
-->
</head>

<body>
    <?php
    require("./modelo/81_paginacion.php");
    ?>
    <form action="../crud/73_insertar.php" method="GET">
        <table width="50%" border="0" align="center">
            <tr>
                <td class="primera_fila">Id</td>
                <td class="primera_fila">Nombre</td>
                <td class="primera_fila">Apellido</td>
                <td class="primera_fila">Dirección</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
                <td class="sin">&nbsp;</td>
            </tr>

            <?php
            foreach ($matrizPersonas as $persona) :
            ?>
                <tr>
                    <td><?php echo $persona["id"] ?></td>
                    <td><?php echo $persona["nombre"] ?></td>
                    <td><?php echo $persona["apellido"] ?></td>
                    <td><?php echo $persona["direccion"] ?></td>
                    <td class="bot"><a href="../crud/70_borrar.php?id=<?php echo $persona["id"] ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
                    <td class='bot'><a href="../crud/70_editar.php?id=<?php echo $persona["id"] ?>&nom=<?php echo $persona["nombre"] ?>&ape=<?php echo $persona["apellido"] ?>&dir=<?php echo $persona["direccion"] ?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
                </tr>
            <?php
            endforeach;
            ?>

            <tr>
                <td></td>
                <td><input type='text' name='Nom' size='10' class='centrado'></td>
                <td><input type='text' name='Ape' size='10' class='centrado'></td>
                <td><input type='text' name='Dir' size='10' class='centrado'></td>
                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
            </tr>

            <tr>
                <td>
                    <?php
                    // ====================================== CRUD (fin)

                    // ====================================== Paginación parte 2 (inicio)
                    echo "<br>";
                    for ($i = 1; $i <= $totalPaginas; $i++) {
                        echo " <a href='?pagina=" . $i . "'>" . $i . "</a>";
                    }
                    // ====================================== Paginación parte 2 (fin)
                    ?>
                </td>
            </tr>

        </table>
    </form>

</body>

</html>