<?php
/*
Plugin Name: Global Functions
Plugin URI: http://webdevstudios.com
Description: Defines global functions to prevent data loss on a theme change.
Author: WebDevStudios
Author URI: http://webdevstudios.com
Version: 1.0.0
License: GPLv2
*/


/**
 * To prevent data loss on a theme switch, place high level functions here.
 *
 * @package WordPress
 * @subpackage Project
 */
Class _S_Global_Functions {

	/**
	 * Construct class
	 */
	public function __construct() {
	}


	/**
	 * Hooks method that requires manual firing. Prevents multiple hooking
	 * @since  1.0.0
	 */
	public function do_hooks() {
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action( 'wp_head', array( $this, 'header_scripts' ) );
		add_action( 'wp_footer', array( $this, 'footer_scripts' ) );
	}


	/**
	 * Registers our custom post-types
	 */
	public function register_post_types() {
		register_via_cpt_core(
			array( __( 'FAQ', '_s' ), __( 'FAQs', '_s' ), '_s-faqs' ), // Single, Plural, Registered slug
			array() // register_post_type args
		);
	}


	/**
	 * Registers our custom taxonomies
	 */
	public function register_taxonomies() {
		register_via_taxonomy_core(
			array( __( 'FAQ Tag', '_s' ), __( 'FAQ Tags', '_s' ), '_s-faq-tags' ), // Single, Plural, Registered slug
			array( 'hierarchical' => false ), // register_taxonomy args
			array( '_s-faqs' ) // post-types
		);
	}


	/**
	 * Inject scripts or html into the header
	 */
	public function header_scripts() { ?>

	<?php }


	/**
	 * Inject scripts or html into the footer
	 */
	public function footer_scripts() { ?>

	<?php }


}

$_S_Global_Functions = new _S_Global_Functions;
$_S_Global_Functions->do_hooks();
