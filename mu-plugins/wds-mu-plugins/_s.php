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
require_once WPMU_PLUGIN_DIR . '/cmb2/init.php';
require_once WPMU_PLUGIN_DIR . '/cpt-core/CPT_Core.php';
require_once WPMU_PLUGIN_DIR . '/taxonomy-core/Taxonomy_Core.php';
require_once WPMU_PLUGIN_DIR . '/wds-required-plugins/wds-required-plugins.php';
