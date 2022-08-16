<?php
/*
Plugin Name: Wp Adsense
Plugin URI: https://www.paginaswebrr.com
Description: Agrega un anuncio al final de cada post
Version: 1.0
Author: Juan Roldán
Author URI: https://www.paginaswebrr.com
License: GPLv2
*/
// Crear un filtro para modificar el contenido del artículo
add_filter('the_content', 'cn_agregar_anuncio');

/*
https://developer.wordpress.org/reference/functions/the_content/
the_content( string $more_link_text = null, bool $strip_teaser = false )
Displays the post content.
*/
function cn_agregar_anuncio($the_content)
{
    // Creamos una variable que contenga todo el contenido del artículo
    $articulo = $the_content;
    /*
https://developer.wordpress.org/reference/functions/is_single/
is_single( int|string|int[]|string[] $post = '' )
Determines whether the query is for an existing single post.
 
https://developer.wordpress.org/reference/functions/is_main_query/
is_main_query()
Determines whether the query is the main query.

https://developer.wordpress.org/reference/functions/in_the_loop/
in_the_loop()
Determines whether the caller is in the Loop.

https://developer.wordpress.org/reference/functions/is_page/
is_page( int|string|int[]|string[] $page = '' )
Determines whether the query is for an existing single page

https://developer.wordpress.org/reference/functions/is_singular/
is_singular( string|string[] $post_types = '' )
Determines whether the query is for an existing single post of any post type (post, attachment, page, custom post types).

https://developer.wordpress.org/reference/functions/is_home/
is_home()
Determines whether the query is for the blog homepage.
 */
    // Solo inyectar el anuncio en los artículos
    if (is_single() && is_main_query() && in_the_loop()) {
        // Al final del artículo agregar el código del anuncio
        $articulo .= '<div class="ads"> *** insertar código de anuncio *** </div>';
    }

    // Siempre debe regresar el contenido que se desea mostrar
    return $articulo;
}
