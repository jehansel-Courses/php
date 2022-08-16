<?php

// Conexión a la base de datos
require_once("./modelo/81_conectar.php");
$conexionDB = Conectar::conexion();

// ====================================== Paginación parte 1 (inicio)
// ====================================== Query Completo
// Preparamos la consulta sql    
$sqlTotal = "SELECT * FROM datosUsuarios
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
$tamanoPaginas = 3;

if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];

    if ($pagina == 1) {
        //header("Location:74_paginacion_i.php");
        header("Location:81_mvc_iv.php");
    }
} else {
    // Página en la que nos encontramos al cargar el sitio web
    $pagina = 1;
}

// Fija el límite inferior del SQL limite
$empezarDesde = ($pagina - 1) * $tamanoPaginas;
// Cuántas páginas vamos a tener en total
$totalPaginas = ceil($numeroRegistros / $tamanoPaginas);
/*
// Imprimiendo la información
echo "<br>Query Total: $sqlTotal";
echo "<br>Número de registros: " . $numeroRegistros;
echo "<br>Página actual: " . $pagina;
echo "<br>Total de páginas: " . $totalPaginas;
*/
// Cerramos el statement para no gastar recursos
$stmtPDO->closeCursor();
    // ====================================== Paginación parte 1 (fin)
