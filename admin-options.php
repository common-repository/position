<?php
/**
 * @package Position
 */

/**
 * 
 * @since  		1.0.0
 * 
 * Register the options page
 * 
 */
function position_add_options_page() {

	add_options_page( 'Position', 'Position', 'manage_options', 'position-settings', 'position_render_options_page' );

	add_action( 'admin_init', 'position_register_settings' );
}
add_action('admin_menu', 'position_add_options_page');




/**
 * 
 * @since  		1.0.0
 * 
 * Register the options settings
 * 
 */
function position_register_settings() {

	$post_types = get_post_types( array('public' => true) );

	register_setting( 'position_group', '_position_show_cpt' );
	register_setting( 'position_group', '_position_show_name' );
	register_setting( 'position_group', '_position_show_email' );
	register_setting( 'position_group', '_position_show_website' );
	register_setting( 'position_group', '_position_show_telephone' );
	register_setting( 'position_group', '_position_show_twitter' );
	register_setting( 'position_group', '_position_show_facebook' );
	register_setting( 'position_group', '_position_show_google' );
	register_setting( 'position_group', '_position_show_linkedin' );
	register_setting( 'position_group', '_position_show_address' );
	register_setting( 'position_group', '_position_show_post_code' );
	register_setting( 'position_group', '_position_show_map_height' );
	register_setting( 'position_group', '_position_show_map' );
	register_setting( 'position_group', '_position_show_link' );

	foreach( $post_types as $post_type)
	{
		register_setting( 'position_group', '_position_show_position_settings_on_' . $post_type );
		register_setting( 'position_group', '_position_related_show_on_' . $post_type );
	}

}



/**
 * 
 * @since  		1.0.0
 * 
 * Render the options page
 * 
 */
function position_render_options_page()
{	
	$post_types 		= get_post_types( array('public' => true) );
	sort( $post_types );

	foreach( $post_types as $post_type)
	{
		if($post_type == 'position')
		{
			if( get_option('_position_show_position_settings_on_' . $post_type ) === false )
			{
				add_option( '_position_show_position_settings_on_' . $post_type, 'show' );
			}
		}
	}

	if( get_option('_position_show_cpt') === false)
	{
		add_option( '_position_show_cpt', 'show' );
	}

	if( get_option('_position_show_name') === false)
	{
		add_option( '_position_show_name', 'true' );
	}

	if( get_option('_position_show_email') === false)
	{
		add_option( '_position_show_email', 'true' );
	}

	if( get_option('_position_show_website') === false)
	{
		add_option( '_position_show_website', 'true' );
	}

	if( get_option('_position_show_telephone') === false)
	{
		add_option( '_position_show_telephone', 'true' );
	}

	if( get_option('_position_show_twitter') === false)
	{
		add_option( '_position_show_twitter', 'true' );
	}

	if( get_option('_position_show_facebook') === false)
	{
		add_option( '_position_show_facebook', 'true' );
	}

	if( get_option('_position_show_google') === false)
	{
		add_option( '_position_show_google', 'true' );
	}

	if( get_option('_position_show_address') === false)
	{
		add_option( '_position_show_address', 'true' );
	}

	if( get_option('_position_show_post_code') === false)
	{
		add_option( '_position_show_post_code', 'true' );
	}

		if( get_option('_position_show_map_height') === false)
	{
		add_option( '_position_show_map_height', 'true' );
	}

	if( get_option('_position_show_map') === false)
	{
		add_option( '_position_show_map', 'true' );
	}

	if( get_option('_position_show_link') === false)
	{
		add_option( '_position_show_link', 'true' );
	}

	?>
		<div class="wrap position_options">
			<h2>Position</h2>
			<form method="post" action="options.php">
			<?php 
				settings_fields( 'position_group' );
				do_settings_sections( 'position_group' );
			?>
			<table class="form-table">

				<tr valign="top">
					<th scope="row"><label for="position_show_cpt">Show the 'Locations' post type</label></th>
					<td><input type="checkbox" value="show" id="position_show_cpt" name="_position_show_cpt"<?php echo ( get_option('_position_show_cpt') == 'show' ) ? ' checked' : '';?>></td>
				</tr>
				<tr valign="top">
					<th scope="row">Show 'Location settings' custom meta on post type</th>
					<td>
						<?php
							foreach( $post_types as $post_type)
							{
								?>
									<span class="inline">
										<input type="checkbox" value="show" id="position_show_position_settings_on_<?php echo $post_type;?>" name="_position_show_position_settings_on_<?php echo $post_type;?>"<?php echo ( get_option('_position_show_position_settings_on_' . $post_type ) == 'show' ) ? ' checked' : '';?>>
										<label for="position_show_position_settings_on_<?php echo $post_type;?>">
										<?php
											
											$obj = get_post_type_object( $post_type );
											echo $obj->labels->singular_name;
										?>
										</label>
									</span>
								<?php
							}
						?>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Location settings fields</th>
					<td>
						
						<span class="inline">
							<input type="checkbox" value="true" id="position_show_name" name="_position_show_name"<?php echo ( get_option( '_position_show_name' ) == 'true' ) ? ' checked' : '';?>>
							<label for="position_show_name">
								Display name
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="position_show_email" name="_position_show_email"<?php echo ( get_option( '_position_show_email' ) == 'true' ) ? ' checked' : '';?>>
							<label for="position_show_email">
								Email
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="position_show_website" name="_position_show_website"<?php echo ( get_option( '_position_show_website' ) == 'true' ) ? ' checked' : '';?>>
							<label for="position_show_website">
								Website
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="position_show_telephone" name="_position_show_telephone"<?php echo ( get_option( '_position_show_telephone' ) == 'true' ) ? ' checked' : '';?>>
							<label for="position_show_telephone">
								Telephone
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="position_show_twitter" name="_position_show_twitter"<?php echo ( get_option( '_position_show_twitter' ) == 'true' ) ? ' checked' : '';?>>
							<label for="position_show_twitter">
								Twitter
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="position_show_facebook" name="_position_show_facebook"<?php echo ( get_option( '_position_show_facebook' ) == 'true' ) ? ' checked' : '';?>>
							<label for="position_show_facebook">
								Facebook
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="position_show_google" name="_position_show_google"<?php echo ( get_option( '_position_show_google' ) == 'true' ) ? ' checked' : '';?>>
							<label for="position_show_google">
								Google
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="position_show_linkedin" name="_position_show_linkedin"<?php echo ( get_option( '_position_show_linkedin' ) == 'true' ) ? ' checked' : '';?>>
							<label for="position_show_linkedin">
								LinkedIn
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="position_show_address" name="_position_show_address"<?php echo ( get_option( '_position_show_address' ) == 'true' ) ? ' checked' : '';?>>
							<label for="position_show_address">
								Address
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="position_show_post_code" name="_position_show_post_code"<?php echo ( get_option( '_position_show_post_code' ) == 'true' ) ? ' checked' : '';?>>
							<label for="position_show_post_code">
								Post code
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="position_show_map_height" name="_position_show_map_height"<?php echo ( get_option( '_position_show_map_height' ) == 'true' ) ? ' checked' : '';?>>
							<label for="position_show_map_height">
								Map height
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="position_show_map" name="_position_show_map"<?php echo ( get_option( '_position_show_map' ) == 'true' ) ? ' checked' : '';?>>
							<label for="position_show_map">
								Map
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="position_show_link" name="_position_show_link"<?php echo ( get_option( '_position_show_link' ) == 'true' ) ? ' checked' : '';?>>
							<label for="position_show_link">
								Map link
							</label>
						</span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Show 'Related location' custom meta on post type</th>
					<td>
						<?php
							foreach( $post_types as $post_type)
							{
								?>
									<span class="inline">
										<input type="checkbox" value="show" id="position_related_show_on_<?php echo $post_type;?>" name="_position_related_show_on_<?php echo $post_type;?>"<?php echo ( get_option('_position_related_show_on_' . $post_type ) == 'show' ) ? ' checked' : '';?>>
										<label for="position_related_show_on_<?php echo $post_type;?>">
										<?php
											
											$obj = get_post_type_object( $post_type );
											echo $obj->labels->singular_name;
										?>
										</label>
									</span>
								<?php
							}
						?>
					</td>
				</tr>
				
			</table>
			<?php submit_button(); ?>
			</form>
		</div>
	<?php
}

/**
 * Add "Settings" action on installed plugin list
 */
function position_add_plugin_actions( $links ) {
	array_unshift( $links, '<a href="options-general.php?page=position-settings">Settings</a>');
	return $links;
}
add_action( 'plugin_action_links_position/index.php', 'position_add_plugin_actions' );

/**
 * Add links on installed plugin list
 */
function position_add_plugin_links( $links, $file ) 
{
	if( $file == 'position/index.php' ) {
		$rate_url = 'http://wordpress.org/support/view/plugin-reviews/position?rate=5#postform';
		$links[] = '<a href="' . $rate_url . '" target="_blank" title="Rate and Review this Plugin on WordPress.org">Rate this plugin</a>';
	}
	
	return $links;
}
add_filter( 'plugin_row_meta', 'position_add_plugin_links' , 10, 2);
?>