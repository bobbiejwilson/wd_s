<?php

/**
 * Get all files w/in the mu-plugins/wds-mu-plugins directory
 *
 * @see wp_get_mu_plugins -- https://github.com/WordPress/WordPress/blob/master/wp-includes/load.php
 * @return array  Array of files to include
 */
function get_wds_mu_plugins() {
	$wds_mu_dir = WPMU_PLUGIN_DIR . '/wds-mu-plugins';

	$mu_plugins = array();

	if ( ! is_dir( $wds_mu_dir ) ) {
		return $mu_plugins;
	}

	if ( ! $dh = opendir( $wds_mu_dir ) ) {
		return $mu_plugins;
	}

	while ( ( $plugin = readdir( $dh ) ) !== false ) {
		if ( substr( $plugin, -4 ) == '.php' ) {
			$mu_plugins[] = $wds_mu_dir . '/' . $plugin;
		}
	}

	closedir( $dh );
	sort( $mu_plugins );

	return $mu_plugins;
}

// Loop all wds mu plugins and include (Same method as WP mu-plugins)
foreach ( get_wds_mu_plugins() as $mu_plugin ) {
	include_once( $mu_plugin );
}
