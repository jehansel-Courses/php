<?php
if (isset($_POST["enviando"])) {

    // Atributo NAME del formulario HTML
    $nombre = $_POST["nombre_usuario"];
    $contra = $_POST["contra_usuario"];
    //print($nombre);
    //print($contra);

    switch (true) {
        case $nombre == 'Juan' && $contra == "1234":
            print("Hola $nombre");
            break;

        case $nombre == 'Hansel' && $contra == "1234":
            print("Hola $nombre");
            break;

        case $nombre == 'Jean' && $contra == "1234":
            print("Hola $nombre");
            break;

        case $nombre == 'Angy' && $contra == "1234":
            print("Hola $nombre");
            break;

        default:
            print("$nombre no tienes acceso");
            break;
    } // switch
} // if
