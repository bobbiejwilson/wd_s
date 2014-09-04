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
require_once 'cmb/init.php';
require_once 'cpt_core/CPT_Core.php';
require_once 'taxonomy_core/Taxonomy_Core.php';
require_once 'wds_required_plugins/wds_required_plugins.php';

/**
 * Require project specific files
 */
require_once '_s/admin.php';
require_once '_s/required-plugins.php';
require_once '_s/cli.php';
