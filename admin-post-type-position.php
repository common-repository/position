<?php
/**
 * @package Position
 */

/**
 *
 * @since 		1.0.0
 *
 * Creates a custom post type for the locations
 *
 */
function position_create_position_post_type() {

	$labels 	= array();
	$args 		= array();

	// Set labels for the custom post type
	$labels = array(
		'name'               => _x( 'Locations', 'post type general name' ),
		'singular_name'      => _x( 'Location', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'location' ),
		'add_new_item'       => __( 'Add New Location' ),
		'edit_item'          => __( 'Edit Location' ),
		'new_item'           => __( 'New Location' ),
		'all_items'          => __( 'All Locations' ),
		'view_item'          => __( 'View Location' ),
		'search_items'       => __( 'Search Locations' ),
		'not_found'          => __( 'No locations found' ),
		'not_found_in_trash' => __( 'No locations found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Locations'
	);

	// Set the arguements for the custom post type
	$args = array(
		'rewrite' 				=> array( 'slug' => 'locations' ),
		'has_archive'			=> true,
		'labels'				=> $labels,
		'description'			=> 'Locations',
		'public'				=> true,
		'menu_position'			=> 20,
		'menu_icon'				=> 'dashicons-location',
		'supports'				=> array(
									'title',
									'editor',
									'author',
									'thumbnail',
									'excerpt',
									'custom-fields',
									'revisions',
									'comments',
									'page-attributes'
									)
	);


	// Register the custom post type
	if( get_option('_position_show_cpt') == 'show' )
	{
		register_post_type( 'position', $args );
	}
}
add_action( 'init', 'position_create_position_post_type' );


/**
 *
 * @since 		1.4.0
 * @updated 	1.4.1
 *
 * Hide meta boxes by default
 *
 */
function position_change_default_hidden( $hidden, $screen ) {
	if ( 'position' == $screen->id ) {
		$hidden[] 	= 'postcustom';
		$hidden[] 	= 'trackbacksdiv';
		$hidden[] 	= 'commentstatusdiv';
		$hidden[] 	= 'commentsdiv';
		$hidden[] 	= 'slugdiv';
		$hidden[] 	= 'authordiv';
		$hidden[] 	= 'revisionsdiv';
		$hidden[]	= 'pageparentdiv';
	}
	return $hidden;
}
add_filter( 'default_hidden_meta_boxes', 'position_change_default_hidden', 10, 2 );



/**
 *
 * @since 		1.0.0
 *
 * Register post thumbnails
 *
 */
function person_register_position_post_thumbnails()
{
	$post_thumbnails = get_theme_support( 'post-thumbnails' );
	$new_post_thumbnails = array();

	if( is_array( $post_thumbnails ) )
	{
		if( is_array( $post_thumbnails[0] ) )
		{
			foreach( $post_thumbnails[0] as $value )
			{
				array_push( $new_post_thumbnails, $value );
			}
		}
	}

	array_push( $new_post_thumbnails, 'position' );

	// Add support for post thumbnails to the theme
	add_theme_support( 'post-thumbnails', $new_post_thumbnails );

	// Add custom image sizes
	if( !in_array( 'square-75', get_intermediate_image_sizes() ) )
	{
		add_image_size( 'square-75', 75, 75, true );
	}

	if( !in_array( 'square-150', get_intermediate_image_sizes() ) )
	{
		add_image_size( 'square-150', 150, 150, true );
	}

	if( !in_array( 'square-300', get_intermediate_image_sizes() ) )
	{
		add_image_size( 'square-300', 300, 300, true );
	}

	if( !in_array( 'square-600', get_intermediate_image_sizes() ) )
	{
		add_image_size( 'square-600', 600, 600, true );
	}

	if( !in_array( 'square-1200', get_intermediate_image_sizes() ) )
	{
		add_image_size( 'square-1200', 1200, 1200, true );
	}

}
add_action( 'after_setup_theme', 'person_register_position_post_thumbnails' );
?>