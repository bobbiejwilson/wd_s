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
require_once WPMU_PLUGIN_DIR . '/cmb/init.php';
require_once WPMU_PLUGIN_DIR . '/cpt_core/CPT_Core.php';
require_once WPMU_PLUGIN_DIR . '/taxonomy_core/Taxonomy_Core.php';
require_once WPMU_PLUGIN_DIR . '/wds_required_plugins/wds_required_plugins.php';
