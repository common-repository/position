<?php
/**
 * @package Position
 */


/**
 * 
 * @since  		1.2.0
 * 
 * Render bootstrap 
 * 
 */
function position_render_bootstrap( $post_id, $args = array(), $version = '3' )
{
	// Future proofing, set the version of Bootstrap we wish to render
	// if( $version == '3' ){ // Render here }

	position_render_bootstrap_3( $post_id, $args );
}


/**
 * 
 * @since  		1.2.0
 * 
 * Render bootstrap 3
 *
 * @param 		int 		$post_id 	the post id to render
 * @param 		array 		$args 		arguments to define render
 * 
 */
function position_render_bootstrap_3( $post_id, $args = array() ) 
{
	$defaults = array(
		'class_address_wrapper'			=> '',						// The class of the address wrapper
		'class_content_wrapper' 		=> '',						// The class of the content wrapper
		'class_header'					=> '',						// The class of the header tag
		'class_image_wrapper' 			=> 'pull-right',			// The class of the image wrapper
		'class_link_wrapper' 			=> 'pull-right',			// The class of the map link wrapper
		'class_meta_label_wrapper'		=> 'col-md-2',				// The class of the label wrapper
		'class_wrapper'					=> 'location__wrapper',		// The class of the location wrapper
		'class_meta_row'				=> 'row',					// The class of the row
		'class_meta_value_wrapper'		=> 'col-md-10',				// The class of the value wrapper
		'class_map_wrapper'				=> 'location__map',			// The class of the map wrapper
		'class_title'					=> 'location__title',		// The class of the title
		'id'							=> 'position',				// If you want to have multiple renders, you will want to change the id each time
		'post_type'						=> 'position',				// [ post | page | custom post type | array() ]			
		'show_address'					=> true,					// [ true | false ] - show the address in the list
		'show_content'					=> true,					// [ true | false ] - show the post content in the list
		'show_email'					=> true,					// [ true | false ] - show the email in the list
		'show_facebook'					=> true,					// [ true | false ] - show facebook in the list
		'show_google'					=> true,					// [ true | false ] - show google+ in the list
		'show_image'					=> true, 					// [ true | false ] - show images in the list
		'show_link'						=> true,					// [ true | false ] - show the larger map link in the lsit
		'show_linkedin'					=> true,					// [ true | false ] - show linkedin in the list
		'show_map'						=> true,					// [ true | false ] - show the map
		'show_name'						=> true,					// [ true | false ] - show the title
		'show_post_code'				=> true,					// [ true | false ] - show the post code
		'show_telephone'				=> true,					// [ true | false ] - show the telephone number
		'show_twitter'					=> true,					// [ true | false ] - show twitter in the list
		'show_website'					=> true,					// [ true | false ] - show the website url in the list
		'tag_meta_label_wrapper_close' 	=> '</strong></p>',			// The tag(s) you wish to close the label with
		'tag_meta_label_wrapper_open' 	=> '<p><strong>',			// The tag(s) you wish to open the label with
		'tag_meta_value_wrapper_close' 	=> '</p>',					// The tag(s) you wish to close the value with
		'tag_meta_value_wrapper_open' 	=> '<p>',					// The tag(s) you wish to open the value with
		'title_format'					=> 'display',				// [ display | title ] - use the post type title, or the display name, by default the display will be used and will fall back to the title

	);

	$r 								= array_merge( $defaults, $args );
	$location 						= get_post( $post_id );
	$post_thumbnail_id 				= get_post_thumbnail_id( $post_id );

	$position_name 					= get_post_meta( $post_id, '_position_name', true );
	$position_email 				= get_post_meta( $post_id, '_position_email', true );
	$position_website 				= get_post_meta( $post_id, '_position_website', true );
	$position_telephone 			= get_post_meta( $post_id, '_position_telephone', true );
	$position_twitter 				= get_post_meta( $post_id, '_position_twitter', true );
	$position_facebook 				= get_post_meta( $post_id, '_position_facebook', true );
	$position_google 				= get_post_meta( $post_id, '_position_google', true );
	$position_linkedin 				= get_post_meta( $post_id, '_position_linkedin', true );
	$position_address 				= get_post_meta( $post_id, '_position_address', true );
	$position_post_code 			= get_post_meta( $post_id, '_position_post_code', true );

	$position_show_name 			= get_option( '_position_show_name' );
	$position_show_email 			= get_option( '_position_show_email' );
	$position_show_website 			= get_option( '_position_show_website' );
	$position_show_telephone 		= get_option( '_position_show_telephone' );
	$position_show_twitter 			= get_option( '_position_show_twitter' );
	$position_show_facebook 		= get_option( '_position_show_facebook' );
	$position_show_google 			= get_option( '_position_show_google' );
	$position_show_linkedin 		= get_option( '_position_show_linkedin' );
	$position_show_address 			= get_option( '_position_show_address' );
	$position_show_post_code 		= get_option( '_position_show_post_code' );
	$position_show_map 				= get_option( '_position_show_map' );
	$position_show_link 			= get_option( '_position_show_link' );

	if( $position_show_name 		!= 'true' 	|| !$r['show_name'] ) 		$position_name 		= null;
	if( $position_show_email 		!= 'true' 	|| !$r['show_email'] ) 		$position_email 	= null;
	if( $position_show_website 		!= 'true' 	|| !$r['show_website'] ) 	$position_website 	= null;
	if( $position_show_telephone 	!= 'true' 	|| !$r['show_telephone'] ) 	$position_telephone = null;
	if( $position_show_twitter 		!= 'true' 	|| !$r['show_twitter'] ) 	$position_twitter 	= null;
	if( $position_show_facebook		!= 'true' 	|| !$r['show_facebook'] ) 	$position_facebook 	= null;
	if( $position_show_google		!= 'true' 	|| !$r['show_google'] ) 	$position_google 	= null;
	if( $position_show_linkedin		!= 'true' 	|| !$r['show_linkedin'] ) 	$position_linkedin 	= null;
	if( $position_show_address		!= 'true' 	|| !$r['show_address'] ) 	$position_address 	= null;
	if( $position_show_post_code	!= 'true' 	|| !$r['show_post_code'] ) 	$position_post_code	= null;
	if( $position_show_map			!= 'true' 	|| !$r['show_map'] ) 		$position_show_map 	= 'false';
	if( $position_show_link			!= 'true' 	|| !$r['show_link'] ) 		$position_show_link = 'false';

	if( ( $r['title_format'] != 'display' && $r['show_name'] ) || ( $r['show_name'] && empty( $position_name ) ) )
	{
		$position_name = $location->post_title;
	}

	?>
	<section id="<?php echo $r['id']; ?>" class="<?php echo $r['class_wrapper']; ?> vcard organisation">
		
		<?php 
		if( !empty( $position_name ) )
		{
			?>
			<header class="<?php echo $r['class_header']; ?>">
				<h1 class="<?php echo $r['class_title']; ?> org"><?php echo $position_name; ?></h1>
			</header>
			<?php
		}
		if( $r['show_image'] )
		{
			?>
			<div class="<?php echo $r['class_image_wrapper']; ?>"><?php echo wp_get_attachment_image( $post_thumbnail_id, 'medium' ); ?></div>
			<?php
		}
		?>
		<?php 
		if( $r['show_content'] )
		{
			?>
			<div class="<?php echo $r['class_content_wrapper']; ?>">
				<?php echo wpautop( $location->post_content );?>
			</div>
			<?php
		}
		if( !empty( $position_email ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
						<?php echo $r['tag_meta_label_wrapper_open']; ?>
							Email
						<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a class="email" href="mailto:<?php echo $position_email; ?>"><?php echo $position_email; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $position_telephone ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
					<?php echo $r['tag_meta_label_wrapper_open']; ?>
						Telephone
					<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a class="tel" href="tel:<?php echo str_replace( ' ','', $position_telephone ); ?>"><?php echo $position_telephone; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $position_website ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
					<?php echo $r['tag_meta_label_wrapper_open']; ?>
						Website
					<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a class="url" href="<?php echo $position_website; ?>" target="_blank"><?php echo $position_website; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $position_twitter ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
					<?php echo $r['tag_meta_label_wrapper_open']; ?>
						Twitter
					<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a href="http://twitter.com/<?php echo $position_twitter; ?>" target="_blank">@<?php echo $position_twitter; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $position_facebook ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
					<?php echo $r['tag_meta_label_wrapper_open']; ?>
						Facebook
					<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a href="<?php echo $position_facebook; ?>" target="_blank"><?php echo $position_facebook; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $position_google ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
					<?php echo $r['tag_meta_label_wrapper_open']; ?>
						Google+
					<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a href="<?php echo $position_google; ?>" target="_blank"><?php echo $position_google; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $position_linkedin ) )
		{
			?>
			<div class="<?php echo $r['class_meta_row']; ?>">
				<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
					<?php echo $r['tag_meta_label_wrapper_open']; ?>
						LinkedIn
					<?php echo $r['tag_meta_label_wrapper_close']; ?>
				</div>
				<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
					<?php echo $r['tag_meta_value_wrapper_open']; ?>
						<a href="<?php echo $position_linkedin; ?>" target="_blank"><?php echo $position_linkedin; ?></a>
					<?php echo $r['tag_meta_value_wrapper_close']; ?>
				</div>
			</div>
			<?php
		}
		if( !empty( $position_address ) || !empty( $position_email ) )
		{
			?>
			<div class="adr <?php echo $r['class_address_wrapper']; ?>">
				<?php
				if( !empty( $position_address ) )
				{
					?>
					<div class="<?php echo $r['class_meta_row']; ?>">
						<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
							<?php echo $r['tag_meta_label_wrapper_open']; ?>
								Address
							<?php echo $r['tag_meta_label_wrapper_close']; ?>
						</div>
						<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
							<span class="street-address">
								<?php echo wpautop( $position_address ); ?>
							</span>
						</div>
					</div>
					<?php
				}
				if( !empty( $position_post_code ) )
				{
					?>
					<div class="<?php echo $r['class_meta_row']; ?>">
						<div class="<?php echo $r['class_meta_label_wrapper']; ?>">
							<?php echo $r['tag_meta_label_wrapper_open']; ?>
								Post code
							<?php echo $r['tag_meta_label_wrapper_close']; ?>
						</div>
						<div class="<?php echo $r['class_meta_value_wrapper']; ?>">
							<?php echo $r['tag_meta_value_wrapper_open']; ?>
								<span class="postal_code"><?php echo $position_post_code; ?></span>
							<?php echo $r['tag_meta_value_wrapper_close']; ?>
						</div>
					</div>
					<?php
				}
				?>
			</div>	
			<?php
		}
		if( $position_show_map == 'true' )
		{
			?>
			<div class="<?php echo $r['class_map_wrapper']; ?>">
				<?php echo $r['tag_meta_label_wrapper_open']; ?>Map<?php echo $r['tag_meta_label_wrapper_close']; ?>
				<?php 

					echo position_get_map_embed( $post_id ); 

					if( $position_show_link )
					{
						?>
						<p class="<?php echo $r['class_link_wrapper']; ?>"><a href="<?php echo $postion_link; ?>" target="_blank">View full size map</a></p>
						<?php
					}
				?>
			</div>
			<?php
		}
		?>
	</section>

	<?php
}


/** Legacy support **/

/**
 * 
 * @since  		1.2.3
 * 
 * Function was spelt wrong previous to this version. 
 * This function will call the old function if anybody is calling it.
 * 
 */
function position_render_boostrap( $post_id, $args = array(), $version = '3' )
{
	position_render_bootstrap( $post_id, $args, $version );
}
?>