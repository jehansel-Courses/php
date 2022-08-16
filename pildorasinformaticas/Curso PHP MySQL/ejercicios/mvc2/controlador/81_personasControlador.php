<?php

    // Modelo
    require_once("./modelo/81_personasModelo.php");
    $persona = new PersonasModel();
    $matrizPersonas = $persona->getPersonas();
    
    //echo "Matriz de personas<br><br>";
    //var_dump($matrizPersonas);

    // Vista
    require_once("./vista/81_personasView.php");

?>