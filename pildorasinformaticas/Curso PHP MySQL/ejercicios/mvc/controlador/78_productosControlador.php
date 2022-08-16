<?php

    // Modelo
    require_once("./modelo/78_productosModelo.php");
    $producto = new ProductosModelo();
    $matrizProductos = $producto->getProductos();
    
    //echo "Matriz de productos<br><br>";
    //var_dump($matrizProductos);

    // Vista
    require_once("./vista/78_productosView.php");

?>