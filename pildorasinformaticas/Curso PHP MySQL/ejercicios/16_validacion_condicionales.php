<?php
    if (isset($_POST["enviando"])) {
        
        // Atributo NAME del formulario HTML
        $contra = $_POST["contra"];
        $nombre = $_POST["nombre_usuario"];
/*
        if ($edad < 18) {
            echo "Eres menor de edad, no tienes acceso";
        } else {
            echo "Eres mayor de edad. Bienvenido";
        }
*/
        $resultado = $nombre == "Juan" && $contra == "1234" ? "Bienvedio" : "Acceso denegado";
        echo $resultado;
    }
?>