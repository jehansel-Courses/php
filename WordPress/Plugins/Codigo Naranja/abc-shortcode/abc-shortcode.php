<?php
/*
Plugin Name: ABC shortcode de plugin
Plugin URI: https://www.paginaswebrr.com
Description: Descripcion del plugin
Version: 1.0
Author: Juan Roldán
Author URI: https://www.paginaswebrr.com
License: GPLv2
*/

// https://codigonaranja.com/como-crear-un-shortcode-en-wordpress
// ===========================================================================
add_shortcode('cn-ebook', 'cn_mostrar_ebook');

function cn_mostrar_ebook($atts)
{
    $output = 'Nota: si deseas aprender más sobre este tema,
              <a href="#">puedes revisar este ebook</a>';
    return $output;
}
// ===========================================================================
add_shortcode('cn-ebook-2', 'cn_mostrar_ebook2');

function cn_mostrar_ebook2($atts)
{
    /*
https://www.php.net/manual/es/function.extract.php
extract
(PHP 4, PHP 5, PHP 7, PHP 8)
extract — Importar variables a la tabla de símbolos actual desde un array

https://developer.wordpress.org/reference/functions/shortcode_atts/
shortcode_atts( array $pairs, array $atts, string $shortcode = '' )
Combine user attributes with known attributes and fill in defaults when needed.
*/
    extract(shortcode_atts(array(
        'url' => '#' //Valor predeterminado
    ), $atts));

    /*
https://developer.wordpress.org/reference/functions/esc_url/
esc_url( string $url, string[] $protocols = null, string $_context = 'display' )
Checks and cleans a URL.
*/
    $output = 'Nota: si deseas aprender más sobre este tema,
             <a href="' . esc_url($url) . '">puedes revisar este ebook</a>';
    return $output;
}
// ===========================================================================
add_shortcode('privado', 'cn_proteger');

function cn_proteger($atts, $content = null)
{
    /*
https://developer.wordpress.org/reference/functions/is_user_logged_in/
is_user_logged_in()
Determines whether the current visitor is a logged in user.
*/

    if (is_user_logged_in()) {
        return '<div class="private">' . $content . '</div>';
    } else {
        $output = '<div class="register">';
        $output .= 'Este contenido es solo para miembros,
                  inicia sesión para acceder al contenido.</div>';
        return $output;
    }
}
