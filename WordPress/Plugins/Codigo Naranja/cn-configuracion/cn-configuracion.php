<?php
/*
Plugin Name: Plugin con parámetros Google Analytics
Plugin URI: https://www.paginaswebrr.com
Description: Pantalla de parámetros para hacer un menú para mi plugin de GA
Version: 2.0
Author: Juan Roldán
Author URI: https://www.paginaswebrr.com
License: GPLv2
*/

/*
Como hacer una página de ajustes para tu plugin de WordPress
https://youtu.be/HjzVGkV6vxg
*/

// ================================================================================
# Agregar información predeterminada al activar el plugin
/*
Este Script se correra en 3 momentos:
1. Al activar por primera vez
2. Al actualizar
3. Al reactivar
*/
// ================================================================================
/*
https://developer.wordpress.org/reference/functions/register_activation_hook/
register_activation_hook( string $file, callable $callback )
Set the activation hook for a plugin.
*/
register_activation_hook(__FILE__, 'cn_set_default_options');

function cn_set_default_options()
{
    // Revisar si ya se había activado antes
    /*
    https://developer.wordpress.org/reference/functions/get_option/
    get_option( string $option, mixed $default = false )
    Retrieves an option value based on an option name.
    */
    if (get_option('cn_ga_cuenta') === false) {
        /*
        https://developer.wordpress.org/reference/functions/add_option/
        add_option( string $option, mixed $value = '', string $deprecated = '', string|bool $autoload = 'yes' )
        Adds a new option.
        */
        add_option('cn_ga_cuenta', 'UA-0000000-0');
    }
}

// ================================================================================
// Agrega el submenú en el menú AJUSTES (SETTINGS)
// ================================================================================
/*
https://developer.wordpress.org/reference/hooks/admin_menu/
do_action( 'admin_menu', string $context )
Fires before the administration menu loads in the admin.
*/
add_action('admin_menu', 'cn_menu_ajustes');

# Agregar esta configuración al menú
function cn_menu_ajustes()
{
    /*
    https://developer.wordpress.org/reference/functions/add_options_page/
    add_options_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $callback = '', int $position = null )
    Adds a submenu page to the Settings main menu.
    */
    $pagina_opciones = add_options_page(
        'Configuración Google Analytics', // Título de la página
        'Código de Google Analytics', // Nombre del menú
        'manage_options', // Nivel de acceso, solo usuarios (https://wordpress.org/support/article/roles-and-capabilities/)
        'cn-conf-ga', // slug
        'cn_genera_pagina' // Función que procesará todo
    );
}
// ================================================================================
// Generar el código de la pagina de actualización
// ================================================================================
function cn_genera_pagina()
{
    // Conseguir el valor de GA
    /*
    https://developer.wordpress.org/reference/functions/get_option/
    get_option( string $option, mixed $default = false )
    Retrieves an option value based on an option name.
    */
    $codigo_ga = get_option('cn_ga_cuenta');
?>
    <div class="wrap">
        <h2>Google Analytics</h2>

        <!-- 
        https://developer.wordpress.org/reference/files/wp-admin/admin-post.php/
        -->
        <form method="post" action="admin-post.php">
            <input type="hidden" name="action" value="guardar_ga" />

            <!-- 
            Mejorar la seguridad 
            https://developer.wordpress.org/reference/functions/wp_nonce_field/
            wp_nonce_field( int|string $action = -1, string $name = '_wpnonce', bool $referer = true, bool $echo = true )
            Retrieve or display nonce hidden field for forms.
            -->
            <?php wp_nonce_field('token_ga'); ?>

            Código de Google Analytics:
            <!-- 
            https://developer.wordpress.org/reference/functions/esc_html/
            esc_html( string $text )
            Escaping for HTML blocks.
            -->
            <input type="text" name="codigo_ga" value="<?php echo esc_html($codigo_ga) ?>" />
            <br />
            <input type="submit" value="Guardar" class="button-primary" />
        </form>
    </div>
<?php
}

// ================================================================================
// Guarda en la base de datos el contenido de la variable
// ================================================================================
add_action('admin_post_guardar_ga', 'cn_guardar_ga');

function cn_guardar_ga()
{
    // Revisar el permios de autorización
    /*
    https://developer.wordpress.org/reference/functions/current_user_can/
    current_user_can( string $capability, mixed $args )
    Returns whether the current user has the specified capability.
    */
    if (!current_user_can('manage_options')) {
        /*
        https://developer.wordpress.org/reference/functions/wp_die/
        wp_die( string|WP_Error $message = '', string|int $title = '', string|array|int $args = array() )
        Kills WordPress execution and displays HTML page with an error message.
        */
        wp_die('Not allowed');
    }

    // Revisar el token que creamos antes
    /*
    https://developer.wordpress.org/reference/functions/check_admin_referer/
    check_admin_referer( int|string $action = -1, string $query_arg = '_wpnonce' )
    Ensures intent by verifying that a user was referred from another admin page with the correct security nonce.
    */
    check_admin_referer('token_ga');

    // Limpiar valor, para prevenir problemas de seguridad
    /*
    https://developer.wordpress.org/reference/functions/sanitize_text_field/
    sanitize_text_field( string $str )
    Sanitizes a string from user input or from the database.
    */
    $codigo_ga = sanitize_text_field($_POST['codigo_ga']);

    // Guardar en la base de datos
    /*
    https://developer.wordpress.org/reference/functions/update_option/
    update_option( string $option, mixed $value, string|bool $autoload = null )
    Updates the value of an option that was already added.

    https://developer.wordpress.org/reference/functions/delete_option/
    delete_option( string $option )
    Removes option by name. Prevents removal of protected WordPress options.
    */
    update_option('cn_ga_cuenta', $codigo_ga);

    // Regresamos a la página de ajustes
    /*
    https://developer.wordpress.org/reference/functions/wp_redirect/
    wp_redirect( string $location, int $status = 302, string $x_redirect_by = 'WordPress' )
    Redirects to another page.
    Note: wp_redirect() does not exit automatically, and should almost always be followed by a call to exit;

    https://developer.wordpress.org/reference/functions/add_query_arg/
    add_query_arg( $args )
    Retrieves a modified URL query string.

    https://developer.wordpress.org/reference/functions/admin_url/
    admin_url( string $path = '', string $scheme = 'admin' )
    Retrieves the URL to the admin area for the current site.
    */
    wp_redirect(add_query_arg(
        'page',
        'cn-conf-ga',
        admin_url('options-general.php')
    ));
    /*
    Resultado
    https://www.staging5.parrillasyasadoresde.com/wp-admin/options-general.php?page=cn-conf-ga
    */
    
    exit;
}
