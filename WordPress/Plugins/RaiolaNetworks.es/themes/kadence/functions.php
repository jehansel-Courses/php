<?php

/**
 * Kadence functions and definitions
 *
 * This file must be parseable by PHP 5.2.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kadence
 */

define('KADENCE_VERSION', '1.1.18');
define('KADENCE_MINIMUM_WP_VERSION', '5.4');
define('KADENCE_MINIMUM_PHP_VERSION', '7.0');

// Bail if requirements are not met.
if (version_compare($GLOBALS['wp_version'], KADENCE_MINIMUM_WP_VERSION, '<') || version_compare(phpversion(), KADENCE_MINIMUM_PHP_VERSION, '<')) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}
// Include WordPress shims.
require get_template_directory() . '/inc/wordpress-shims.php';

// Load the `kadence()` entry point function.
require get_template_directory() . '/inc/class-theme.php';

// Load the `kadence()` entry point function.
require get_template_directory() . '/inc/functions.php';

// Initialize the theme.
call_user_func('Kadence\kadence');


// ====================================================================================================
/*
https://raiolanetworks.es/blog/tweaking-avanzado-con-snippets-en-el-functions-php-de-wordpress/
modificar el mensaje de bienvenida de la pantalla de login
*/
function mensajeLogin()
{
	return "<p align='center'>Bienvenido a <b>R & R</b>.<br/>
Por favor ingresa en tu cuenta</p><br/>";
}

/*
https://developer.wordpress.org/reference/hooks/login_message/	
apply_filters( 'login_message', string $message )
Filters the message to display above the login form.
*/
//Creamos el hook que llama a ese filtro y le pasamos nuestra funcion
add_filter('login_message', 'mensajeLogin');

// ====================================================================================================
/*
https://raiolanetworks.es/blog/tweaking-avanzado-con-snippets-en-el-functions-php-de-wordpress/
cambiar el logo por defecto de la pantalla de login de Wordpress.
*/
//LOGIN: Como cambiar el logo del login
function logoLogin()
{
	/*
	https://developer.wordpress.org/reference/functions/get_bloginfo/
	get_bloginfo( string $show = '', string $filter = 'raw' )
	Retrieves information about the current site.
	*/
	//echo "Directorio: " . get_bloginfo('template_url');
	echo '<style type="text/css">
		h1 a {
			background-image: url(' . get_bloginfo('template_url') . '/images/logo-ryr.png) !important;
		}
		</style>';
}

/*
https://developer.wordpress.org/reference/hooks/login_head/
do_action( 'login_head' )
Fires in the login page header after scripts are enqueued
*/
add_action('login_head', 'logoLogin');

// ====================================================================================================
/*
https://raiolanetworks.es/blog/tweaking-avanzado-con-snippets-en-el-functions-php-de-wordpress/
sustituir el logo de Wordpress del back-end
*/
function logoDash()
{
	echo "Directorio Template: " . get_bloginfo('template_url');
	echo "Directorio Stylesheet: " . get_bloginfo('stylesheet_url');
	echo '<style type="text/css">
		#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
			background-image: url(' . get_bloginfo('template_url') . '/images/custom-logo.png) !important;
			background-position: 0 0;
			color:rgba(0, 0, 0, 0);
		}

		#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
			background-position: 0 0;
		}
	</style>
	';
}

/*
https://developer.wordpress.org/reference/hooks/wp_before_admin_bar_render/
do_action( 'wp_before_admin_bar_render' )
Fires before the admin bar is rendered.
*/
add_action('wp_before_admin_bar_render', 'logoDash');

// ====================================================================================================
/*
https://raiolanetworks.es/blog/tweaking-avanzado-con-snippets-en-el-functions-php-de-wordpress/
cambiar el mensaje de “Creado por Wordpress”
*/
function cambiarPieDash()
{
	echo "R & R ~ Dashboard";
}

/*
https://developer.wordpress.org/reference/hooks/admin_footer_text/
apply_filters( 'admin_footer_text', string $text )
Filters the “Thank you” text displayed in the admin footer.
*/
add_filter('admin_footer_text', 'cambiarPieDash');


