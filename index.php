<?php
/**
 * @package Position
 * @version 1.4.1
 */

/*
Plugin Name:  Position
Plugin URI:   http://makedo.in/products/
Description:  Custom post types for locations. Customisable, link any post type to a location, or just include location properties on any post type. 
Author:       Make Do
Version:      1.4.1
Author URI:   http://makedo.in
Licence:      GPLv2 or later
License URI:  http://www.gnu.org/licenses/gpl-2.0.html


/////////  VERSION HISTORY

1.0.0	First development version
1.0.1	Minor bug fix, label on settings page
1.2.0	Added UI rendering
1.2.1	Paging bug fixes
1.2.2	Related meta box fix
1.2.3	Fixed issue with Bootstrap in function names
1.2.4	Bug fix when using a 'featured' location
1.2.5 	Minor amendments
1.3.0	Add custom meta to RSS feed
1.4.0 	Hide meta boxes by default
1.4.1 	Bug fix meta box

/////////  CURRENT FUNCTIONALITY

1  - Create location custom post type
2  - Register scripts
3  - Register options page
4  - Create location settings custom meta box
5  - Render map helper
6  - Create location related custom meta box
7  - Location query arguments
8  - Render location list
9  - Render location fields
10 - Add custom meta to RSS feed

*/


// 1  - Create locations custom post type
require_once 'admin-post-type-position.php';

// 2  - Register scripts
require_once 'admin-scripts.php';

// 3  - Register options page
require_once 'admin-options.php';

// 4  - Create location settings custom meta box
require_once 'admin-meta-box-position-settings.php';

// 5  - Render map helper
require_once 'ui-render-map.php';

// 6  - Create location related custom meta box
require_once 'admin-meta-box-position-relation.php';

// 7  - Location query arguments
require_once 'ui-query-arguments-position.php';
 
// 8  - Render location list
require_once 'ui-render-position-list.php';

// 9  - Render location fields
require_once 'ui-render-position.php';

// 10 - Add custom meta to RSS feed
require_once 'helper-add-rss-meta.php';
?>