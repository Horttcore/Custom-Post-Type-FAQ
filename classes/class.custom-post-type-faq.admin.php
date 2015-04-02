<?php
/**
 * Custom Post Type FAQ Admin
 *
 * @package Custom Post Type FAQ
 * @author Ralf Hortt
 */
final class Custom_Post_Type_FAQ_Admin
{



	/**
	 * Plugin constructor
	 *
	 * @access public
	 * @since 2.0
	 * @author Ralf Hortt
	 **/
	public function __construct()
	{

		add_filter( 'post_updated_messages', array( $this, 'post_updated_messages' ) );

	} // END __construct


	/**
	 * Update messages
	 *
	 * @access public
	 * @param array $messages Messages
	 * @return array Messages
	 * @since 2.0
	 * @author Ralf Hortt
	 **/
	public function post_updated_messages( $messages )
	{

		$post             = get_post();
		$post_type        = 'faq';
		$post_type_object = get_post_type_object( $post_type );

		$messages[$post_type] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'FAQ updated.', 'custom-post-type-faq' ),
			2  => __( 'Custom field updated.' ),
			3  => __( 'Custom field deleted.' ),
			4  => __( 'FAQ updated.', 'custom-post-type-faq' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'FAQ restored to revision from %s', 'custom-post-type-faq' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => __( 'FAQ published.', 'custom-post-type-faq' ),
			7  => __( 'FAQ saved.', 'custom-post-type-faq' ),
			8  => __( 'FAQ submitted.', 'custom-post-type-faq' ),
			9  => sprintf( __( 'FAQ scheduled for: <strong>%1$s</strong>.', 'custom-post-type-faq' ), date_i18n( __( 'M j, Y @ G:i', 'custom-post-type-faq' ), strtotime( $post->post_date ) ) ),
			10 => __( 'FAQ draft updated.', 'custom-post-type-faq' )
		);

		if ( !$post_type_object->publicly_queryable )
			return $messages;

		$permalink = get_permalink( $post->ID );

		$view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View FAQ', 'custom-post-type-faq' ) );
		$messages[$post_type][1] .= $view_link;
		$messages[$post_type][6] .= $view_link;
		$messages[$post_type][9] .= $view_link;

		$preview_permalink = add_query_arg( 'preview', 'true', $permalink );
		$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview faq', 'custom-post-type-faq' ) );
		$messages[$post_type][8]  .= $preview_link;
		$messages[$post_type][10] .= $preview_link;

		return $messages;

	} // END post_updated_messages



} // END final class Custom_Post_Type_FAQ_Admin

new Custom_Post_Type_FAQ_Admin;
