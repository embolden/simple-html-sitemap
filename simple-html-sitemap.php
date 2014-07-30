<?php
/*
Plugin Name: Simple HTML Sitemap
Plugin URI: 
Description: Shortcode to display a simple HTML sitemap
Author: Integrity
Version: 1.1
Author URI: http://www.integritystl.com
*/

class HTML_Sitemap {
	/**
	 * 
	 */
	public function __construct() {
		add_shortcode( 'html_sitemap', array( $this, 'output_shortcode' ) );
	}

	/**
	 *
	 */
	public function output_shortcode( $atts ) {
		// All of the args available to wp_list_pages
		$defaults = array(
			'depth' => 0,
			'show_date' => '',
			'date_format' => get_option( 'date_format' ),
			'child_of' => 0,
			'exclude' => '',
			// 'title_li' => '',
			// 'echo' => 0,
			'authors' => '',
			'sort_column' => 'menu_order, post_title',
			'link_before' => '',
			'link_after' => '',
			'walker' => '',
		);

		// Compare passed in attributes to defaults
		shortcode_atts( $defaults, $atts );

		// Shortcodes can't echo
		$atts['echo'] = 0;
		// Never display titles
		$atts['title_li'] = '';

		// Remove the normal menu classes from list items
		add_filter( 'page_css_class', array( $this, 'remove_page_css_class' ) );
		// List the pages
		$output = wp_list_pages( $atts );
		// Remove filter to keep it from affecting normal menu operation
		remove_filter( 'page_css_class', array( $this, 'remove_page_css_class' ) );

		// Return the list of links
		// Filter is used to change the class on the UL
		return '<ul class="' . $class = apply_filters( 'html_sitemap_container_class', 'html-sitemap' ) . '">' . $output . '</ul>';
	}

	/**
	 *
	 */
	public function remove_page_css_class() {
		return (array) apply_filters( 'html_sitemap_item_class', array() );
	}
}
new HTML_Sitemap();
?>