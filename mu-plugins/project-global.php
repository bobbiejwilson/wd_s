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
Class Project_Global_Functions {

	public static $instance = null;

	/**
	 * Creates or returns an instance of this class
	 */
	public static function engage() {

		if ( self::$instance === null ) {
			self::$instance = new self();
		}

		return self::$instance;

	}


	/**
	 * Construct class
	 */
	public function __construct() {
		add_action( 'wp_head', array( $this, 'header_scripts' ) );
		add_action( 'wp_footer', array( $this, 'footer_scripts' ) );
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

$Project_Global_Functions = new Project_Global_Functions;
