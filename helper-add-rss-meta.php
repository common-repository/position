<?php
/**
 * @package Position
 */

/**
 * 
 * @since  		1.3.0
 *
 * Add the meta information to the RSS feed
 * 
 */
function position_add_rss_meta() 
{
	global $post;
	global $thumbnail_added;

	if( has_post_thumbnail( $post->ID ) && !$thumbnail_added )
	{
		$thumbnail = get_attachment_link( get_post_thumbnail_id( $post->ID ) );
		echo( '<image>' . $thumbnail . '</image>' );
		$thumbnail_added = true;
	}

	$post_id 								= $post->ID;
	$position_related 						= get_post_meta( $post_id, '_position_related', true );

	if( !empty( $position_related ) )
	{
		//echo('<location-related-page>' . get_permalink ( $position_related )  . '</location-related-page>');
		$post_id = $position_related;
	}

	$position_name 							= get_post_meta( $post_id, '_position_name', true );
	$position_email 						= get_post_meta( $post_id, '_position_email', true );
	$position_website 						= get_post_meta( $post_id, '_position_website', true );
	$position_telephone 					= get_post_meta( $post_id, '_position_telephone', true );
	$position_twitter 						= get_post_meta( $post_id, '_position_twitter', true );
	$position_facebook 						= get_post_meta( $post_id, '_position_facebook', true );
	$position_google 						= get_post_meta( $post_id, '_position_google', true );
	$position_linkedin 						= get_post_meta( $post_id, '_position_linkedin', true );
	$position_address 						= get_post_meta( $post_id, '_position_address', true );
	$position_post_code 					= get_post_meta( $post_id, '_position_post_code', true );

	if( !empty( $position_name ) )
	{
		echo('<location-name>' . $position_name  . '</location-name>');
	}

	if( !empty( $position_email ) )
	{
		echo('<location-email>' . $position_email . '</location-email>');
	}

	if( !empty( $position_website ) )
	{
		echo('<location-website>' . esc_url ( $position_website )  . '</location-website>');
	}

	if( !empty( $position_telephone ) )
	{
		echo('<location-telephone>' . $position_telephone  . '</location-telephone>');
	}

	if( !empty( $position_twitter ) )
	{
		echo('<location-twitter>' . esc_url ( $position_twitter )  . '</location-twitter>');
	}

	if( !empty( $position_facebook ) )
	{
		echo('<location-facebook>' . esc_url ( $position_facebook )  . '</location-facebook>');
	}

	if( !empty( $position_google ) )
	{
		echo('<location-google>' . esc_url ( $position_google )  . '</location-google>');
	}

	if( !empty( $position_linkedin ) )
	{
		echo('<location-linkedin>' . esc_url ( $position_linkedin )  . '</location-linkedin>');
	}

	if( !empty( $position_address ) )
	{
		echo('<location-address>' . $position_address  . '</location-address>');
	}

	if( !empty( $position_post_code ) )
	{
		echo('<location-post_code>' . $position_post_code  . '</location-post_code>');
	}
}
add_action('rss2_item', 'position_add_rss_meta');
?>