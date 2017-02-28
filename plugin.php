<?php
/**
 * Plugin Name: Custom Post Type FAQ
 * Plugin URI: https://horttcore.de
 * Description: Custom Post Type FAQ
 * Version: 1.2.0
 * Author: Ralf Hortt
 * Author URI: https://horttcore.de
 * Text Domain: custom-post-type-faq
 * Domain Path: /languages/
 * License: GPL2
 */

require( 'classes/class.custom-post-type-faq.php' );

if ( is_admin() )
	require( 'classes/class.custom-post-type-faq.admin.php' );
