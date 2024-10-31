<?php
/**
 * @package Position
 */

/**
 * 
 * @since  		1.0.0
 * 
 * Custom meta box for location settings
 * 
 */
function position_meta_box() {

	// Only add the box to the selected post types
	$screens 		= array();
	$post_types 	= get_post_types( array('public' => true) );

	foreach( $post_types as $post_type)
	{
		if( get_option('_position_show_position_settings_on_' . $post_type ) === 'show' )
		{
			array_push( $screens, $post_type );
		}
	}

	foreach ( $screens as $screen ) 
	{
		add_meta_box(
			'position',
			'Location settings',
			'position_render_meta_box',
			$screen
		);
	}

}
add_action( 'add_meta_boxes', 'position_meta_box' );


/**
 * 
 * @since  		1.0.0
 * 
 * Render the person settings meta box
 * 
 */
function position_render_meta_box( $post ) {

	$position_name 							= get_post_meta( $post->ID, '_position_name', true );
	$position_email 						= get_post_meta( $post->ID, '_position_email', true );
	$position_website 						= get_post_meta( $post->ID, '_position_website', true );
	$position_telephone 					= get_post_meta( $post->ID, '_position_telephone', true );
	$position_twitter 						= get_post_meta( $post->ID, '_position_twitter', true );
	$position_facebook 						= get_post_meta( $post->ID, '_position_facebook', true );
	$position_google 						= get_post_meta( $post->ID, '_position_google', true );
	$position_linkedin 						= get_post_meta( $post->ID, '_position_linkedin', true );
	$position_address 						= get_post_meta( $post->ID, '_position_address', true );
	$position_post_code 					= get_post_meta( $post->ID, '_position_post_code', true );
	$position_map_height 					= get_post_meta( $post->ID, '_position_map_height', true );
	$require_divider						= false;

	?>
	<div class="position cf">
		<?php

			if( get_option('_position_show_name') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="position_name">Display name</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="position_name" name="position_name" value="<?php echo $position_name;?>"/>
						</div>
					</div>
				</p>
				<?php
			}
		?>
	</div>


	<?php 
		if( $require_divider && 
			( 
				get_option('_position_show_email') == 'true' || 
				get_option('_position_show_website') == 'true' ||
				get_option('_position_show_telephone') == 'true' ||
				get_option('_position_show_twitter') == 'true' ||
				get_option('_position_show_facebook') == 'true' ||
				get_option('_position_show_google') == 'true' ||
				get_option('_position_show_linkedin') == 'true'
			) 
		)
		{
			echo '</div><hr/><div class="inside">'; 
			$require_divider = false;
		}
	?>

	<div class="position cf">
		<?php

			if( get_option('_position_show_email') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="position_email">Email</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="position_email" name="position_email" value="<?php echo $position_email;?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_position_show_website') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="position_website">Website</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="position_website" name="position_website" value="<?php echo $position_website;?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_position_show_telephone') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="position_telephone">Telephone</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="tel" id="position_telephone" name="position_telephone" value="<?php echo $position_telephone; ?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_position_show_twitter') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="position_twitter">Twitter</label>
							</strong>
						</div>
						<div class="input__container">
							<div class="input__wrapper">
								<span class="help-inline at">@</span><input type="text" id="position_twitter" name="position_twitter" value="<?php echo $position_twitter; ?>"/>
							</div>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_position_show_facebook') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="position_facebook">Facebook</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="position_facebook" name="position_facebook" value="<?php echo $position_facebook; ?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_position_show_google') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="position_google">Google+</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="position_google" name="position_google" value="<?php echo $position_google; ?>"/>
						</div>
					</div>
				</p>
				<?php
			}
			if( get_option('_position_show_linkedin') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="position_linkedin">LinkedIn</label>
							</strong>
						</div>
						<div class="input__container">
								<input type="text" id="position_linkedin" name="position_linkedin" value="<?php echo $position_linkedin; ?>"/>
						</div>
					</div>
				</p>
		
				<?php
			}
		?>
		</div>

		<?php

			if( $require_divider && 
				( 
					get_option('_position_show_address') == 'true' || 
					get_option('_position_show_post_code') == 'true'
				) 
			)
			{
				echo '</div><hr/><div class="inside">'; 
				$require_divider = false;
			}
		?>

		<div class="position cf">
			<?php

				if( get_option('_position_show_address') == 'true' )
				{
					$require_divider = true;
					?>
					<p>
						<div class="row cf">
							<div class="label__container">
								<strong>
									<label class="label-inline" for="position_address">Address</label>
								</strong>
							</div>
							<div class="input__container">
									<textarea type="text" id="position_address" name="position_address"><?php echo $position_address; ?></textarea>
							</div>
						</div>
					</p>
					<?php
				}
				if( get_option('_position_show_post_code') == 'true' )
				{
					$require_divider = true;
					?>
					<p>
						<div class="row cf">
							<div class="label__container">
								<strong>
									<label class="label-inline" for="position_post_code">Post code</label>
								</strong>
							</div>
							<div class="input__container">
									<input type="text" id="position_post_code" name="position_post_code" value="<?php echo $position_post_code; ?>"/>
							</div>
						</div>
					</p>
					<?php
				}
			?>
		</div>

		<?php

			if( $require_divider && 
				( 
					get_option('_position_show_map_height') == 'true' || 
					get_option('_position_show_map') == 'true' ||
					get_option('_position_show_link') == 'true'
				) 
			)
			{
				echo '</div><hr/><div class="inside">'; 
				$require_divider = false;
			}
		?>

		<div class="position cf">
			<?php

			if( get_option('_position_show_map_height') == 'true' )
			{
				$require_divider = true;
				?>
				<p>
					<div class="row cf">
						<div class="label__container">
							<strong>
								<label class="label-inline" for="position_map_height">Map height</label>
							</strong>
						</div>
						<div class="input__container">
							<div class="input__wrapper right px">
								<input type="text" id="position_map_height" name="position_map_height" value="<?php echo $position_map_height; ?>"/><span class="help-inline at">px</span>
							</div>
						</div>
					</div>
					</p>
					<?php
				}
				if( get_option('_position_show_map') == 'true' )
				{
					$require_divider = true;
					?>
					<p>
						<div class="row cf">
							<div class="label__container">
								<strong>
									Map
								</strong>
							</div>
							<div class="input__container">
									<?php echo ( position_get_map_embed( $post->ID ) != '' ) ? position_get_map_embed( $post->ID ) : '<em>Please enter a post code for the map to render</em>'; ?>
							</div>
						</div>
					</p>
					<?php
				}
				if( get_option('_position_show_link') == 'true' )
				{
					$require_divider = true;
					?>
					<p>
						<div class="row cf">
							<div class="label__container">
								<strong>
									<label class="label-inline" for="position_map_link">Large map link</label>
								</strong>
							</div>
							<div class="input__container">
									<input type="text" id="position_map_link" name="position_map_link" class="disabled" value="<?php echo !empty( $position_post_code ) ? 'https://maps.google.co.uk/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q='. $position_post_code .'&amp;aq=&amp;ie=UTF8&amp;hq=&amp;hnear='. $position_post_code : '';?>"/>
							</div>
						</div>
					</p>
					<?php
				}
			?>
		</div>
	
	<?php

	wp_nonce_field( 'submit_location', 'position_nonce' ); 
}


/**
 * 
 * @since  		1.0.0
 * 
 * Handle the person meta box post data
 * 
 */
function position_handle_post_data( $post_id )
{
	$nonce_key							= 'position_nonce';
	$nonce_action						= 'submit_location';

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

	$position_name 			= isset( $_POST['position_name'] ) 		?  $_POST['position_name']  						: null;
	$position_email 		= isset( $_POST['position_email'] ) 	?  sanitize_email( $_POST['position_email'] )		: null;
	$position_website 		= isset( $_POST['position_website'] ) 	?  esc_url_raw( $_POST['position_website'] )  		: null;
	$position_telephone 	= isset( $_POST['position_telephone'] )	?  $_POST['position_telephone'] 					: null;
	$position_twitter 		= isset( $_POST['position_twitter'] ) 	?  $_POST['position_twitter']  						: null;
	$position_facebook 		= isset( $_POST['position_facebook'] ) 	?  esc_url_raw( $_POST['position_facebook'] )  		: null;
	$position_google 		= isset( $_POST['position_google'] ) 	?  esc_url_raw( $_POST['position_google'] ) 		: null;
	$position_linkedin 		= isset( $_POST['position_linkedin'] ) 	?  esc_url_raw( $_POST['position_linkedin'] )  		: null;
	$position_address 		= isset( $_POST['position_address'] ) 	?  esc_textarea( $_POST['position_address'] )		: null;
	$position_post_code 	= isset( $_POST['position_post_code'] ) ?  $_POST['position_post_code']  					: null;
	$position_map_height 	= isset( $_POST['position_map_height'] ) ?  $_POST['position_map_height']  					: null;
	$position_map_link 		= isset( $_POST['position_map_link'] ) 	?  esc_url_raw( $_POST['position_map_link'] )  		: null;

	if( !empty( $position_twitter ) )
	{
		$position_twitter = preg_replace( '/[^0-9a-zA-Z_]/', '', $position_twitter );
	}

	if( !empty( $position_post_code ) )
	{
		$position_post_code = strtoupper( preg_replace( '/[^0-9a-zA-Z\s]/', '', $position_post_code ) );
	}

	if( !empty( $position_telephone ) )
	{
		$position_telephone = preg_replace( '/[^0-9\s]/', '', $position_telephone );
		$position_telephone = preg_replace( '/\s\s+/', ' ', $position_telephone );
		$position_telephone = trim( $position_telephone );
	}

	if( !empty( $position_map_height ) )
	{
		$position_map_height = preg_replace( '/[^0-9]/', '', $position_map_height );
	}

	if( !empty( $position_name ) ) 							update_post_meta( $post_id, '_position_name', 							$position_name );
	if( !empty( $position_email ) ) 						update_post_meta( $post_id, '_position_email', 							$position_email );
	if( !empty( $position_website ) ) 						update_post_meta( $post_id, '_position_website', 						$position_website );
	if( !empty( $position_telephone ) ) 					update_post_meta( $post_id, '_position_telephone', 						$position_telephone );
	if( !empty( $position_twitter ) ) 						update_post_meta( $post_id, '_position_twitter', 						$position_twitter );
	if( !empty( $position_facebook ) ) 						update_post_meta( $post_id, '_position_facebook', 						$position_facebook );
	if( !empty( $position_google ) ) 						update_post_meta( $post_id, '_position_google', 						$position_google );
	if( !empty( $position_linkedin ) )						update_post_meta( $post_id, '_position_linkedin', 						$position_linkedin );
	if( !empty( $position_address ) )						update_post_meta( $post_id, '_position_address', 						$position_address );
	if( !empty( $position_post_code ) ) 					update_post_meta( $post_id, '_position_post_code',						$position_post_code );
	if( !empty( $position_map_height ) ) 					update_post_meta( $post_id, '_position_map_height',						$position_map_height );
	if( !empty( $position_map_link ) ) 						update_post_meta( $post_id, '_position_map_link',						$position_map_link );

}
add_action( 'save_post', 'position_handle_post_data' );
?>