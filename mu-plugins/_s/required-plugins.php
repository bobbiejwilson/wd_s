<?php
/*
Plugin Name: _S - Required Plugins
Plugin URI: http://webdevstudios.com
Description: Make certain plugins required so that they cannot be (easily) deactivated.
Author: WebDevStudios
Author URI: http://webdevstudios.com
Version: 1.0.0
License: GPLv2
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Required plugins class for _S Project
 *
 * @package WordPress
 *
 * @subpackage Project
 */
class _S_Required_Plugins {

	/**
	 * Initiate our hooks
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_filter( 'plugin_action_links', array( $this, 'filter_plugin_links' ), 10, 4 );
	}

	/**
	 * Remove the deactivation link for all custom/required plugins
	 *
	 * @since 1.0.0
	 *
	 * @param $actions
	 * @param $plugin_file
	 * @param $plugin_data
	 * @param $context
	 *
	 * @return array
	 */
	public function filter_plugin_links( $actions = array(), $plugin_file = '', $plugin_data = '', $context = '' ) {
		// Remove edit link for all plugins
		if( array_key_exists( 'edit', $actions ) ) {
			unset( $actions['edit'] );
		}

		// Remove deactivate link for custom/required plugins
		if( array_key_exists( 'deactivate', $actions ) && in_array( $plugin_file, $this->get_required_plugins() ) ) {
			$actions['deactivate'] = sprintf( '<span style="color: #888">%s</span>', __( 'WDS Required Plugin', '_s' ) );
		}

		return $actions;
	}


	/**
	 * Get the plugins that are required for the project. This will be all plugins that are prefix with the project
	 * key, and then any additional plugins defined in the $required_plugins static variable.
	 *
	 * @since  1.0.0
	 *
	 * @return array
	 */
	public function get_required_plugins() {
		$required_plugins = array();
		$plugins = get_option( 'active_plugins' );

		foreach( $plugins as $plugin ) {
			if( false !== stripos( $plugin, $GLOBALS['_s_admin']->key(), 0 ) ) {
				$required_plugins[] = $plugin;
			}
		}

		return (array) apply_filters( 'wds_required_plugins', $required_plugins );
	}

}

$GLOBALS['_s_required_plugins'] = new _S_Required_Plugins();