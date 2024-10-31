<?php
/**
 * @package Position
 */

/**
 * 
 * @since  		1.0.0
 * 
 * Custom meta box for location related
 * 
 */
function position_related_meta_box() {

	// Only add the box to the selected post types
	$screens 		= array();
	$post_types 	= get_post_types( array('public' => true) );

	foreach( $post_types as $post_type)
	{
		if( get_option('_position_related_show_on_' . $post_type ) === 'show' )
		{
			array_push( $screens, $post_type );
		}
	}

	foreach ( $screens as $screen ) 
	{
		add_meta_box(
			'position_related',
			'Related location',
			'position_related_render_meta_box',
			$screen
		);
	}

}
add_action( 'add_meta_boxes', 'position_related_meta_box' );


/**
 * 
 * @since  		1.0.0
 * 
 * Render the location related  meta box
 * 
 */
function position_related_render_meta_box( $post ) {

	$position_related = get_post_meta( $post->ID, '_position_related', true );

	?>
		<div class="position_related cf">
			<p>
				<div class="row cf">
					<div class="label__container">
						<strong>
							<label class="label-inline" for="position_related">Choose location</label>
						</strong>
					</div>
					<div class="input__container">
							<select class="full" id="position_related" name="position_related">
								<option value="">None</option>
								<?php

									$list_posts_args 	= array(
										'post_type'			=> 'position',
										'orderby'			=> 'title',
										'order'				=> 'ASC',
										'posts_per_page' 	=> -1
									);
									$list_posts = get_posts( $list_posts_args );

									foreach( $list_posts as $list_post )
									{
										?>
											<option value="<?php echo $list_post->ID;?>"<?php echo ( $position_related == $list_post->ID ) ? ' selected' : '';?>><?php echo $list_post->post_title;?></option>
										<?php
									}
						
								?>
							</select>
					</div>
				</div>
			</p>
		</div>
	<?php

	wp_nonce_field( 'submit_position_related', 'position_related_nonce' ); 
}


/**
 * 
 * @since  		1.0.0
 * 
 * Handle the location related meta box post data
 * 
 */
function position_related_handle_post_data( $post_id )
{
	$nonce_key							= 'position_related_nonce';
	$nonce_action						= 'submit_position_related';

	// If it is just a revision don't worry about it
	if ( wp_is_post_revision( $post_id ) )
		return $post_id;

	// Check it's not an auto save routine
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;

	// Verify the nonce to defend against XSS
	if ( !isset( $_POST[$nonce_key] ) || !wp_verify_nonce( $_POST[$nonce_key], $nonce_action ) )
		return $post_id;

	// Check that the current user has permission to edit the post
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;

	$position_related = isset( $_POST['position_related'] ) ?  $_POST['position_related'] : null;

	if( !empty( $position_related ) ) update_post_meta( $post_id, '_position_related', $position_related );
}
add_action( 'save_post', 'position_related_handle_post_data' );
?>