<?php
/**
 * Plugin Name: Custom Post Type FAQ
 * Plugin URI: http://horttcore.de
 * Description: Custom Post Type FAQ
 * Version: 1.0.0
 * Author: Ralf Hortt
 * Author URI: http://horttcore.de
 * Text Domain: custom-post-type-faq
 * Domain Path: /languages/
 * License: GPL2
 */

require( 'classes/custom-post-type-faq.php' );

if ( is_admin() )
	require( 'classes/custom-post-type-faq.admin.php' );
