<?php
/**
 * Plugin Name: _s
 * Plugin URI: http://webdevstudios.com
 * Description: Core WebDevStudios plugin for _s.
 * Author: WebDevStudios
 * Author URI: http://webdevstudios.com
 * Version: 1.0.0
 * License: GPLv2
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Required Libraries
 */
require_once 'cpt_core/CPT_Core.php';
require_once 'taxonomy_core/Taxonomy_Core.php';

/**
 * Require project specific files
 */
require_once '_s/admin.php';
require_once '_s/cli.php';

/**
 * Initialize the CMB
 */
function _s_initialize_cmb() {
	if ( ! class_exists( 'cmb_Meta_Box' ) ) {
		require_once 'cmb/init.php';
	}
}
add_action( 'init', '_s_initialize_cmb', 9999 );