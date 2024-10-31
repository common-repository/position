<?php
/**
 * @package Location
 */

/**
 * 
 * @since  		1.0.0
 * 
 * Render the map embed box
 * 
 * @param  int 		$post_id 		The id of the post that has the embed code
 * @param  int 		$height  		The height of the embed in px
 * 
 * @return string          			The map embed iframe
 * 
 */
function position_get_map_embed( $post_id, $height = 'auto' )
{

	$return = '';
	$position_map_height 	= get_post_meta( $post_id, '_position_map_height', true );
	$position_post_code		= get_post_meta( $post_id, '_position_post_code', true );

	if( $height == 'auto' && !empty( $position_map_height ) )
	{
		$height = $position_map_height;
	}

	if( !empty( $position_post_code ) )
	{
		$return = '<iframe width="100%" height="'. $height .'" title ="Google map for postcode: '. $position_post_code .' " src="https://maps.google.co.uk/maps?hl=en&amp;q='. $position_post_code .'&amp;output=embed&amp;iwloc=near"></iframe>';
	}

	return $return;
}

?>