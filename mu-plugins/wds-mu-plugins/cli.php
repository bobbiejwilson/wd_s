<?php
/*
 * Plugin Name: _s - CLI
 * Plugin URI: http://webdevstudios.com
 * Description: Adds WP-CLI commands to _s.
 * Author: WebDevStudios
 * Author URI: http://webdevstudios.com
 * Version: 1.0.0
 * License: GPLv2
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Check if WP_CLI exists, and only extend it if it does
if ( defined( 'WP_CLI' ) && WP_CLI && ! class_exists( '_S_CLI' ) ) {

	/**
	 * Class _S_CLI
	 */
	class _S_CLI extends WP_CLI_Command {



	}

	WP_CLI::add_command( '_s', '_S_CLI' );
}
