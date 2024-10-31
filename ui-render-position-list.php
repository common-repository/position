<?php
/**
 * @package Position
 */


/**
 * 
 * @since  		1.2.0
 * 
 * Render bootstrap list
 * 
 */
function position_list_render_bootstrap( $args = array(), $version = '3' )
{
	// Future proofing, set the version of Bootstrap we wish to render
	// if( $version == '3' ){ // Render here }
	
	position_list_render_bootstrap_3( $args );
}


/**
 * 
 * @since  		1.2.0
 * 
 * Return loop query args
 *
 * @param 		array 		$args 		argumens to define filter	
 * @return 		array 		arguments to filter wp_query
 * 
 */
function position_list_render_bootstrap_3( $args = array() ) 
{
	global $wp_query;
	$defaults = array(
		'class_image'					=> '',								// The class for the image
		'class_list_item_wrapper'		=> '',								// The wrapper class for each object
		'class_list_wrapper'			=> '',								// The wrapper for the entire function class
		'class_media'					=> 'media',							// The media object class
		'class_media_body_wrapper'		=> 'media-body',					// The body wrapper class
		'class_media_content_wrapper'	=> '',								// The content wrapper class
		'class_media_heading'			=> 'media-heading',					// The heading class
		'class_media_image_wrapper' 	=> 'pull-left',						// The image wrapper class
		'class_pagination'				=> 'pager',							// The class of the pagination ul
		'content_source' 				=> 'excerpt', 						// [ content | excerpt ] - Choose where the testimonial comes from. The default is the content of the page, and it will fall back, unless set here.
		'heading_as_link'				=> true,							// Set the heading to be a link
		'id'							=> 'position_list',					// If you want to have multiple renders, you will want to change the id each time
		'image_as_link'					=> true,							// Set the image to be a link
		'image_size'					=> 'square-75',						// [ thumbnail | medium | large | full | custom ] choose the size of the thumbnail (be default we use a custom size)
		'pagination_next_label'			=> 'Next »',						// The text for the 'next' pagination button
		'pagination_previous_label'		=> '« Previous',					// The text for the 'previous' pagination button
		'posts_per_page'				=> 5,								// The ammount of posts you want in the list (-1 will return all)
		'post_type'						=> 'position',						// [ post | page | custom post type | array() ]			
		'show_content'					=> true,							// [ true | false ] - show the content
		'show_heading'					=> true,							// [ true | false ] - show the headings
		'show_image'					=> true, 							// [ true | false ] - show images in the list
		'show_pagination' 				=> true,							// [ true | false ] - show pagination
		'tag_media_heading'				=> 'h4',							// The tag to be used for the heading
		'tag_media_image_wrapper'		=> 'a',								// The tag to be used for the image wrapper (if its a link, it needs to be 'a')
	);

	if( !is_main_query() )
	{
		$defaults['show_pagination'] = false;
	}

	$is_home 						= is_home();
	$r 								= array_merge( $defaults, $args );
	$query_args 					= position_query_arguements( $r );
	$post_count						= 0;

	//	Pagination fix
	$temp 		= $wp_query;
	$wp_query   = null;
	$wp_query   = new WP_Query();
	$wp_query->query( $query_args );

	if ( have_posts() ) 
	{
		?>
		<div id="<?php echo $r['id']; ?>" class="<?php echo $r['class_list_wrapper']; ?>">
		<?php
		while ( have_posts() ) 
		{
			the_post(); 
			?>
			<div class="<?php echo $r['class_list_item_wrapper']; ?>">
				<div class="<?php echo $r['class_media']; ?>">
					<<?php echo $r['tag_media_image_wrapper']; ?> class="<?php echo $r['class_media_image_wrapper']; ?>"<?php echo ( $r['image_as_link'] && $r['tag_media_image_wrapper'] == 'a' )? ' href="'. get_permalink() .'"' : ''; ?>>
						<?php the_post_thumbnail( $r['image_size'], array('class' => $r['class_image'] ) );?>
					</<?php echo $r['tag_media_image_wrapper']; ?>>
					<div class="<?php echo $r['class_media_body_wrapper']; ?>">
						<?php 
						if( $r['show_heading'] )
						{
							?>
								<<?php echo $r['tag_media_heading']; ?> class="<?php echo $r['class_media_heading']; ?>">
									<?php 

										if( $r['heading_as_link'] )
										{
											?>
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											<?php
										}
										else
										{
											the_title();
										}
									?>
								</<?php echo $r['tag_media_heading']; ?>>
							<?php
						} 
						if( $r['show_content'] )
						{
							?>
								<div class="<?php echo $r['class_media_content_wrapper']; ?>">
									<?php
										if( $r['content_source'] == 'content' )
										{
											the_content();
										}
										else
										{
											the_excerpt();
										}
									?>
								</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
			<?php
		}
		?>
		</div>
		<?php
	}

	if( $r['show_pagination'] && !$is_home )
	{
		?>
			<ul class="<?php echo $r['class_pagination']; ?>">
				<li><?php echo get_previous_posts_link( $r['pagination_next_label'] ); ?></li>
				<li><?php echo get_next_posts_link( $r['pagination_previous_label'] ); ?></li>
			</ul>
		<?php
	}

	// Reset the loop (after the pagination fix)
	$wp_query = null;
	$wp_query = $temp;
	wp_reset_postdata();
	wp_reset_query();
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
function position_list_render_boostrap( $args = array(), $version = '3' )
{
	position_list_render_bootstrap( $args, $version );
}
?>