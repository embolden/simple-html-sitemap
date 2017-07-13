# Simple HTML Sitemap

Plugin Name: Simple HTML Sitemap  
Plugin URI:  
Description: Shortcode to display a simple HTML sitemap  
Author: Integrity  
Version: 1.1  
Author URI: http://www.integritystl.com  

# Using the Plugin
Type `[html_sitemap]` into the Post or Page WYSIWYG editor.  You can pass arguments to it using `argument_name="argument-value"` syntax.  Ex: `[html_sitemap exclude="3,6,23"]`

# List of Arguments & Default Values
	'depth' => 0,
	'show_date' => '',
	'date_format' => get_option( 'date_format' ),
	'child_of' => 0,
	'exclude' => '',
	'authors' => '',
	'sort_column' => 'menu_order, post_title',
	'link_before' => '',
	'link_after' => '',
	'walker' => '',

# Using Filters
To change the class name of the container use the `html_sitemap_item_class` filter. The filter's function needs to return the class name that you want to use.

	add_filter( 'html_sitemap_container_class', '_prefix_set_html_sitemap_container_class' )
	function _prefix_set_html_sitemap_item_class() {
		return 'custom-html-sitemap-container-class';
	}

To change the class name of the sitemap items use the `html_sitemap_item_class` filter. The filter's function needs to return an array of class names that you want to use.

	add_filter( 'html_sitemap_item_class', '_prefix_set_html_sitemap_item_class' )
	function _prefix_set_html_sitemap_item_class() {
		return array( 'custom-html-sitemap-item-class' );
	}

# Change Log
## 1.1
- Added `html_sitemap_container_class` filter
- Added `html_sitemap_item_class` filter
- Added comments
- Added README.md