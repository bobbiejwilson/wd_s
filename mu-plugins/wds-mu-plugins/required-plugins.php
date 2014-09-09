<?php

/**
 * Add required plugins to WDS_Required_Plugins
 *
 * @param  array  $required Array of required plugins in `plugin_dir/plugin_file.php` form
 *
 * @return array            Modified array of required plugins
 */
function _s_required_plugins_add( $required ) {

	$required = array_merge( $required, array(
		'jetpack/jetpack.php',
		'sample-plugin/sample-plugin.php',
	) );

	return $required;
}
add_filter( 'wds_required_plugins', '_s_required_plugins_add' );
