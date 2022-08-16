<?php
/*
Plugin Name: ABC Demo de plugin
Plugin URI: https://www.paginaswebrr.com
Description: Descripción del plugin
Version: 1.0
Author: Juan Roldán
Author URI: https://www.paginaswebrr.com
License: GPLv2
*/
add_action('wp_head','agregar_ga');

function agregar_ga() {
    echo "
    <script>
        alert('Hola Riki');
    </script>";

    echo "Bienvenido Juan Roldán";
}