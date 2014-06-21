<?php
/*
Plugin Name: Site Options
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
 * Create an options page with CMB
 *
 * @package WordPress
 * @subpackage Project
 */
class _S_Site_Options {

	// A single instance of this class.
	public static $instance      = null;
	public static $key           = 'cmb_options';
	public static $title         = '';
	public static $site_options = array();

	/**
	 * Creates or returns an instance of this class.
	 * @since  0.1.0
	 * @return prefix_Admin A single instance of this class.
	 */
	public static function go() {
		if ( self::$instance === null )
			self::$instance = new self();

		return self::$instance;
	}

	/**
	 * Initiate our hooks
	 * @since 0.1.0
	 */
	public function __construct() {

		// Set our title
		self::$title = __( 'Site Options', 'cmb' );

		add_action( 'admin_init', array( $this, 'init' ) );
		add_action( 'admin_menu', array( $this, 'add_page' ) );
	}

	/**
	 * Register our setting to WP
	 * @since  0.1.0
	 */
	public function init() {
		register_setting( self::$key, self::$key );
	}

	/**
	 * Add menu options page
	 * @since 0.1.0
	 */
	public function add_page() {
		$this->options_page = add_menu_page( self::$title, self::$title, 'manage_options', self::$key, array( $this, 'admin_page' ) );
		add_action( 'admin_head-' . $this->options_page, array( $this, 'admin_head' ) );
	}

	/**
	 * CSS & Junk
	 * @since  0.1.0
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
	 * @since  0.1.0
	 */
	public function admin_page() { ?>
		<div class="wrap cmb_options_page <?php echo self::$key; ?>">
			<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
			<?php // Check for CMB
			if ( class_exists( 'cmb_Meta_Box' ) ) {
				cmb_metabox_form( $this->option_fields(), self::$key );
			} ?>
		</div>
	<?php }

	/**
	 * Defines the site option metabox and field configuration
	 * @since  0.1.0
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
     * @since  0.1.0
     * @return string  Option key
     */
    public static function key() {
        return self::$key;
    }


}


$_S_Site_Options = new _S_Site_Options();


/**
 * Wrapper function around cmb_get_option
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function _s_get_option( $key = '' ) {
    return cmb_get_option( _S_Site_Options::key(), $key );
}

