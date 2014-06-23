<?php
/*
Plugin Name: Custom Metaboxes and Fields
Plugin URI: http://webdevstudios.com
Description: Creates metaboxes in the post editor.
Author: WebDevStudios
Author URI: http://webdevstudios.com
Version: 1.0.0
License: GPLv2
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


add_filter( 'cmb_meta_boxes', '_s_cmb_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function _s_cmb_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '__s_';

	// Add site metaboxes as needed
	// Example metaboxes:
	// https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress/blob/trunk/example-functions.php

	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) ) {
		require_once 'cmb/init.php';
	}

}
