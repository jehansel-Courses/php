<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>74 - Paginación I. Index</title>
    <link rel="stylesheet" type="text/css" href="../crud/70_hoja.css">
</head>

<body>
    <h1>74 - Paginación I. Index</h1>

    <?php
    include("../crud/70_conexion.php");

    // ====================================== Query Completo
    // Preparamos la consulta sql    
    $sqlTotal = "SELECT * FROM articulos 
                    WHERE 1";
    //LIMIT 0,5";
    //echo "<br>Query Total: $sqlTotal";
    $stmtPDO = $conexionDB->prepare($sqlTotal);

    // Ejecutamos la consulta
    $stmtPDO->execute(array());

    // registros es un array de objetos
    //$registros = $stmtPDO->fetchAll(PDO::FETCH_OBJ);

    // Para conocer el número total de registros de la tabla
    $numeroRegistros = $stmtPDO->rowCount();

    // ====================================== Query Limitado
    // Cuántos registros quiero mostrar por página
    $tamanoPaginas = 5;

    if (isset($_GET["pagina"])) {
        $pagina = $_GET["pagina"];

        if ($pagina == 1) {
            header("Location:74_paginacion_i.php");
        }
    } else {
        // Página en la que nos encontramos al cargar el sitio web
        $pagina = 1;
    }

/*    
    if (isset($_GET["pagina"])) {
        if ($_GET["pagina"] == 1) {
            $pagina = 1;
            header("Location:74_paginacion_i.php");
        } else {
            $pagina = $_GET["pagina"];
        }
    } else {
        // Página en la que nos encontramos al cargar el sitio web
        $pagina = 1;
    }
*/

    // Fija el límite inferior del SQL limite
    $empezarDesde = ($pagina - 1) * $tamanoPaginas;
    // Cuántas páginas vamos a tener en total
    $totalPaginas = ceil($numeroRegistros / $tamanoPaginas);

    // Imprimiendo la información
    echo "<br>Query Total: $sqlTotal";
    echo "<br>Número de registros: " . $numeroRegistros;
    echo "<br>Página actual: " . $pagina;
    echo "<br>Total de páginas: " . $totalPaginas;

    // Cerramos el statement para no gastar recursos
    $stmtPDO->closeCursor();

    // Preparamos la consulta sql    
    $sqlLimite = "SELECT * FROM articulos 
                    WHERE 1
                    LIMIT $empezarDesde,$tamanoPaginas";
    echo "<br>Query: $sqlLimite";
    $stmtPDO = $conexionDB->prepare($sqlLimite);

    // Ejecutamos la consulta
    $stmtPDO->execute(array());

    while ($registro = $stmtPDO->fetch(PDO::FETCH_ASSOC)) {
        echo "<br>" . $registro["seccion"] . " " . $registro["nombrearticulo"] . " " . $registro["paisorigen"] . " " . $registro["precio"];
    }

    // ====================================== Paginación
    echo "<br><br>";
    for ($i = 1; $i <= $totalPaginas; $i++) {
        echo " <a href='?pagina=" . $i . "'>" . $i . "</a>";
    }




    ?>

    <!--

    <form action="73_insertar.php" method="GET">
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
            //foreach ($registros as $articulo) :
            ?>
                <tr>
                    <td><?php echo $articulo->seccion ?></td>
                    <td><?php echo $articulo->nombrearticulo ?></td>
                    <td><?php echo $articulo->paisorigen ?></td>
                    <td><?php echo $articulo->precio ?></td>
                    <td class="bot"><a href="70_borrar.php?id=<?php echo $persona->id ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
                    <td class='bot'><a href="70_editar.php?id=<?php echo $persona->id ?>&nom=<?php echo $persona->nombre ?>&ape=<?php echo $persona->apellido ?>&dir=<?php echo $persona->direccion ?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
                </tr>
            <?php
            //endforeach;
            ?>

            <tr>
                <td></td>
                <td><input type='text' name='Nom' size='10' class='centrado'></td>
                <td><input type='text' name='Ape' size='10' class='centrado'></td>
                <td><input type='text' name='Dir' size='10' class='centrado'></td>
                <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
            </tr>
        </table>
    </form>

        -->
    <p>&nbsp;</p>
</body>

</html>