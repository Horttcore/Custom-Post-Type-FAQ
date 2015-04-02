<?php
/**
 *
 *  Custom Post Type FAQ
 *
 */
final class Custom_Post_Type_FAQ
{



	/**
	 * Plugin constructor
	 *
	 * @return void
	 * @author Ralf Hortt
	 * @since 1.0
	 **/
	public function __construct()
	{

		add_action( 'init', array( $this, 'register_post_type' ) );
		add_action( 'init', array( $this, 'register_taxonomy' ) );
		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );

	} // END __construct



	/**
	 * Load plugin translation
	 *
	 * @access public
	 * @return void
	 * @author Ralf Hortt <me@horttcore.de>
	 * @since v1.0
	 **/
	public function load_plugin_textdomain()
	{

		load_plugin_textdomain( 'custom-post-type-faq', false, dirname( plugin_basename( __FILE__ ) ) . '/../languages/'  );

	} // END load_plugin_textdomain



	/**
	 * Register Post Type
	 *
	 * @access public
	 * @return void
	 * @author Ralf Hortt
	 * @since 1.0
	 */
	public function register_post_type()
	{

		register_post_type( 'faq', array(
				'labels' => array(
				'name' => _x( 'FAQ', 'post type general name', 'custom-post-type-faq' ),
				'singular_name' => _x( 'FAQ', 'post type singular name', 'custom-post-type-faq' ),
				'add_new' => _x( 'Add New', 'FAQ', 'custom-post-type-faq' ),
				'add_new_item' => __( 'Add New FAQ', 'custom-post-type-faq' ),
				'edit_item' => __( 'Edit FAQ', 'custom-post-type-faq' ),
				'new_item' => __( 'New FAQ', 'custom-post-type-faq' ),
				'view_item' => __( 'View FAQ', 'custom-post-type-faq' ),
				'search_items' => __( 'Search FAQ', 'custom-post-type-faq' ),
				'not_found' =>  __( 'No FAQ found', 'custom-post-type-faq' ),
				'not_found_in_trash' => __( 'No FAQ found in Trash', 'custom-post-type-faq' ),
				'parent_item_colon' => '',
				'menu_name' => __( 'FAQ', 'custom-post-type-faq' )
			),
			'public' => TRUE,
			'publicly_queryable' => TRUE,
			'show_ui' => TRUE,
			'show_in_menu' => TRUE,
			'query_var' => TRUE,
			'rewrite' => array( 'slug' => _x( 'faq', 'Post Type Slug', 'custom-post-type-faq' ) ),
			'capability_type' => 'post',
			'has_archive' => TRUE,
			'hierarchical' => TRUE,
			'menu_position' => NULL,
			'supports' => array('title', 'editor', 'thumbnail', 'page-attributes' ),
			'menu_icon' => 'dashicons_lightbulb'
		) );

	} // END register_post_type



	/**
	 * Register taxonomy
	 *
	 * @access public
	 * @return void
	 * @author Ralf Hortt
	 * @since 1.0
	 */
	public function register_taxonomy()
	{

		register_taxonomy( 'faq-category', array( 'faq' ), array(
			'hierarchical' => TRUE,
			'labels' => array(
			'name' => _x( 'FAQ Categories', 'taxonomy general name', 'custom-post-type-faq' ),
				'singular_name' => _x( 'FAQ Category', 'taxonomy singular name', 'custom-post-type-faq' ),
				'search_items' =>  __( 'Search FAQ Categories', 'custom-post-type-faq' ),
				'all_items' => __( 'All FAQ Categories', 'custom-post-type-faq' ),
				'parent_item' => __( 'Parent FAQ Category', 'custom-post-type-faq' ),
				'parent_item_colon' => __( 'Parent FAQ Category:', 'custom-post-type-faq' ),
				'edit_item' => __( 'Edit FAQ Category', 'custom-post-type-faq' ),
				'update_item' => __( 'Update FAQ Category', 'custom-post-type-faq' ),
				'add_new_item' => __( 'Add New FAQ Category', 'custom-post-type-faq' ),
				'new_item_name' => __( 'New FAQ Category Name', 'custom-post-type-faq' ),
				'menu_name' => __( 'FAQ Categories', 'custom-post-type-faq' ),
			),
			'show_ui' => TRUE,
			'query_var' => TRUE,
			'rewrite' => array( 'slug' => _x( 'faq-category', 'Slug', 'custom-post-type-faq' ) ),
			'show_admin_column' => TRUE,
		));

	} // END register_taxonomy



} // END final class Custom_Post_Type_FAQ

new Custom_Post_Type_FAQ;
