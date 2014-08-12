<?php
/*
Plugin Name: _S - Admin
Plugin URI: http://webdevstudios.com
Description: Creates an options page in the WordPress Dashboard.
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
 * Admin class for _S Project
 *
 * @package WordPress
 *
 * @subpackage Project
 */
class _S_Admin {

	// A single instance of this class.
	public static $instance         = null;
	public static $key              = '_s';
	public static $title            = '';
	public static $site_options     = array();

	/**
	 * Creates or returns an instance of this class.
	 *
	 * @since  1.0.0
	 *
	 * @return _S_Admin A single instance of this class.
	 */
	public static function go() {
		if( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Initiate our hooks
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		self::$title = __( 'Site Options', '_s' );

		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_page' ) );
	}

	/**
	 * Register our setting to WP
	 *
	 * @since 1.0.0
	 */
	public function init() {
		register_setting( self::$key, self::$key );
	}

	/**
	 * Add menu options page
	 *
	 * @since 1.0.0
	 */
	public function add_page() {
		$this->options_page = add_menu_page( self::$title, self::$title, 'manage_options', self::$key, array( $this, 'admin_page' ) );
		add_action( 'admin_head-' . $this->options_page, array( $this, 'admin_head' ) );
	}

	/**
	 * CSS
	 *
	 * @since 1.0.0
	 */
	public function admin_head() { ?>
		<style type="text/css">
		.cmb-form .button-primary {
			margin: 48px 0 0 8px;
		}
		</style>
	<?php }

	/**
	 * Admin page markup. Mostly handled by CMB
	 *
	 * @since 1.0.0
	 */
	public function admin_page() { ?>
		<div class="wrap cmb_options_page <?php echo self::$key; ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php // Check for CMB
			if( class_exists( 'cmb_Meta_Box' ) ) {
				cmb_metabox_form( $this->option_fields(), self::$key );
			} ?>
		</div>
	<?php }

	/**
	 * Defines the site option metabox and field configuration
	 *
	 * @since  1.0.0
	 *
	 * @return array
	 */
	public static function option_fields() {

		// Only need to initiate the array once per page-load
		if ( ! empty( self::$site_options ) ) {
			return self::$site_options;
		}

		self::$site_options = array(
			'id'         => 'site_options',
			'show_on'    => array( 'key' => 'options-page', 'value' => array( self::$key, ), ),
			'show_names' => true,
			'cmb_styles' => false,
			'fields'     => array(
				// Site options cmb fields go here.
			)
		);

		return self::$site_options;

	}

    /**
     * Make public the protected $key variable.
     *
     * @since  1.0.0
     *
     * @return string  Option key
     */
    public static function key() {
        return self::$key;
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
		$required_plugins = self::$required_plugins;
		$plugins = get_option( 'active_plugins' );

		foreach( $plugins as $plugin ) {
			if( false !== stripos( $plugin, $this->key(), 0 ) ) {
				$required_plugins[] = $plugin;
			}
		}

		return $required_plugins;
	}

}

$GLOBALS['_s_admin'] = new _S_Admin();

/**
 * Wrapper function around cmb_get_option
 *
 * @since  1.0.0
 *
 * @param  string  $key Options array key
 *
 * @return mixed        Option value
 */
function _s_get_option( $key = '' ) {
    return cmb_get_option( _S_Admin::key(), $key );
}

