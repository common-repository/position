=== Position ===
Contributors: mwtsn
Donate link: 
Tags: locations, location, map, contact, postions, position
Requires at least: 3.3
Tested up to: 3.9
Stable tag: 1.4.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Custom post types for locations. Customisable, link any post type to a location, or just include location properties on any post type. 

== Description ==

Created by [Make Do](http://makedo.in/), this plugin will give you a custom post type for locations, apply location properties to your existing post types or associate any post type with a location. 

The plugin comes with functions that you can use to generate a loop to query locationss so you can make your own output, it also comes with a few functions that will generate Bootstrap 3 compatible lists for you.

This function works great for adding detailed location information to [people](http://wordpress.org/plugins/person), [events](http://wordpress.org/plugins/occasion), organisations, or any other post type you can imagine.  

= Position features =

* Locations custom post type (can be disabled)
* Location settings meta box (can be enabled on any post type)
* Related location meta box (off by default, but can be enabled on any post type)
* Function to render a Google map, based on a location post code
* Function to generate loop query arguments
* Function to render a locations list
* Creates several custom images sizes for you to use in your plugin
* Output location data into your RSS feeds

View the FAQ section for usage instructions.

If you are using this plugin in your project [we would love to hear about it](mailto:hello@makedo.in).

== Installation ==

1. Backup your WordPress install
2. Upload the plugin folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. The Bootstrap 3 compatible list, rendered using the position_list_render_bootstrap() function
2. The Bootstrap 3 compatible view, rendered using the position_render_bootstrap() function
3. The 'location' custom post type
4. The options screen
5. The 'related' meta box on an events custom post type

== Frequently asked questions ==

= If I want to grab the locations in my loop, what is the default custom post type name? =

It is: 'position'

= What are the names of all the meta information for the 'Location settings' meta box? =

Those are:

* '_position_name'
* '_position_email'
* '_position_website'
* '_position_telephone'
* '_position_twitter'
* '_position_facebook'
* '_position_google'
* '_position_linkedin'
* '_position_address'
* '_position_post_code'
* '_position_map_height'

= What are the names of all the meta information for the 'Related location' meta box? =

That is:

* '_position_related'

= What functions can I use? =

The functions provided by this plugin are:

* position_query_arguements()
* position_get_map_embed()
* position_list_render_bootstrap()

Although you will get much better results if you create your own templates using the custom meta data provided, the plugin also provides the following function that will generate a view:

* position_render_bootstrap()

All of these functions accept arguments.

= What does the position_query_arguements() function do? =

This function provides arguments for you to filter the locations (or your own post types) creating a custom Loop. You can use it like so:

`get_posts( position_query_arguements( $args ) );`

It accepts the following arguments as an array (or you can leave the $args empty to use the defaults):

`
$defaults = array(
	'featured'					=> false, 							// [ true | false ] - Set to true to return posts that have the featured post custom meta data set to true
	'featured_post_meta_key' 	=> '_position_featured',			// The custom meta field that identifies the featured post, will also accept an array
	'order'						=> 'ASC',							// [ ASC | DESC ]
	'orderby'					=> 'date', 							// [ date | menu_order | title ]
	'posts_per_page'			=> 5,								// Set number of posts to return, -1 will return all
	'post_type'					=> 'position',						// [ post | page | custom post type | array() ]			
	'taxonomy_filter'			=> false,							// [ true | false ] - Set to true to filter by taxonomy
	'taxonomy_key'				=> '',								// The key of the taxonomy we wish to filter by
	'taxonomy_terms'			=> '',								// The terms (uses slug), will accept a string or array
	'use_featured_image'		=> false, 							// [ true | false ] - Set to true to only use posts with a featured image
);
get_posts( position_query_arguements( $defaults ) );
`

= How do I render the Google map? (what does position_get_map_embed() do) =

Use the function: 

`position_get_map_embed( $post_id, $height = 'auto' )`

You can pass an int into the $height parameter for the height of the iframe, or leave it empty to use the embed height that you can set in the meta box ('_position_map_height').

= What does the position_list_render_bootstrap() function do? =

This function will render a Bootstrap 3 compatible list of locations. You can use it like so: 

`position_list_render_bootstrap( $args );`

It accepts all the same arguments as the `position_query_arguements()` function, as well as the following arguments as an array (or you can leave the $args empty to use the defaults):

`
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
position_list_render_bootstrap( $defaults );
`

= I'm trying to use the function 'position_list_render_bootstrap()' on an archive page, but the paging doesn't work =

You can fix that by copying the following function into your functions.php:

`
function position_list_pre_get_posts( $query ) {
	if ( !is_admin() && $query->is_post_type_archive('position') && $query->is_main_query() ) {
		$query->set( 'posts_per_page', 1 );
	}
}
add_action( 'pre_get_posts', 'position_list_pre_get_posts' );
`

= I'm trying to use the function 'position_list_render_bootstrap()' on my home page, but the friendly URL paging doesn't work =

WordPress will not let you use the friendly paging on the home page because it confuses it with the standard post paging. 

Instead of using the `position_list_render_bootstrap()` function, you should use a pre_get_posts filter to change the post type of the home page posts.

You can however still page through the list of this function, as long as you use query strings (e.g. ?page=2), but this function doesnt do that for you.

= What does the position_render_bootstrap() function do? =

This function will render a Bootstrap 3 compatible view of a location.  We recomend you build your own views with the meta data provided, but if you wish you can use it like so:

`position_render_bootstrap( $args );`

You can use it with the following arguments as an array (or you can leave the $args empty to use the defaults):

`
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
position_render_bootstrap( $defaults );
`

= What custom image sizes are created by this plugin? =

The image sizes are:

* 'square-75' - 75 x 75
* 'square-150' - 150 x 150
* 'square-300' - 300 x 300
* 'square-600' - 600 x 600
* 'square-1200' - 1200 x 1200

= The custom image sizes dont seem to work, help! =

The image sizes will only take effect on images you have uploaded after this plugin has been installed, however there are other plugins out there (such as [WPThumb](http://wordpress.org/plugins/wp-thumb/)) that will fix this for you.

If it still isnt working, check that you have the 'GD' module installed in your PHP environment. If you havent, you can install it like so:

`apt-get install php5-gd`

= The bootstrap render isnt working, what do I need to do? =

The plugin will only render HTML, you will need to add Bootstrap CSS and JS to your theme.

= Can I contribute? =

Sure thing, the GitHub repository is right here: (https://github.com/mwtsn/position)

== Changelog ==

= 1.4.1 = 
* Bug fix meta box

= 1.4.0 =
* Hide meta boxes by default

= 1.3.0 =
* Add custom meta to RSS feed

= 1.2.5 =
* Minor amendments

= 1.2.4 =
* Bug fix when using a 'featured' location 

= 1.2.3	=
* Fixed issue with Bootstrap in function names

= 1.2.2 =	
* Related meta box fix

= 1.2.1 =	
* Paging bug fixes

= 1.2.0 =
* Added UI rendering

= 1.0.1 =
* Minor bug fix, label on settings page

= 1.0.0 =
* Initial WordPress repository release

== Upgrade notice ==

Prior to version 1.2.3 functions with 'bootstrap' in the names were incorrectly spelled 'boostrap'. Legacy functions have been added to route the call, so the change shouldn't cause any issues. 