<?php
/*
Plugin Name: Modifica etiqueta generator
Plugin URI: https://www.paginaswebrr.com
Description: Modifica etiqueta generator
Version: 1.0
Author: Juan Roldán
Author URI: https://www.paginaswebrr.com
License: GPLv2
*/
add_filter('the_generator', 'remove_generator', 10, 1);

function remove_generator($html)
{
    return preg_replace('|content=("WordPress.*?")|', 'content="Juancho Rol"', $html);
}
