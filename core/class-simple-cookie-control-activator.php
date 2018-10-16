<?php
/**
 * Fired during plugin activation
 *
 * @link       https://sumapress.com
 * @since      1.0.0
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/core
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/core
 * @author     SumaPress <soporte@sumapress.com>
 */
class Simple_Cookie_Control_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		$default_options = array(
			'position'					=> 'bottom',
			'theme'						=> 'block',
			'colors'					=> 1,
			'popupBackgroundColor'		=> '#000000',
			'popupTextColor'			=> '#ffffff',
			'popupLinkColor'			=> '#ffffff',
			'buttonBackgroundColor'		=> 'transparent',
			'buttonTextColor'			=> '#ffffff',
			'buttonBorderColor'			=> '#ffffff',
			'highlightBackgroundColor'	=> 'transparent',
			'highlightTextColor'		=> '#ffffff',
			'highlightBorderColor'		=> 'transparent',
		);

		add_option( 'customizer_simple_cookie_control', $default_options );

	}

}
