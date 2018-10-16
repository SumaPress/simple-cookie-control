<?php

/**
 * The class to control all about WordPress Customizer
 *
 * @link       https://sumapress.com
 * @since      1.0.0
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/admin
 */

/**
 * The class to control all about WordPress Customizer
 *
 *
 * @package    Simple_Cookie_Control
 * @subpackage Simple_Cookie_Control/admin
 * @author     SumaPress <soporte@sumapress.com>
 */
class Simple_Cookie_Control_Customizer {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * The options to change colors.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $colors;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		$this->data_colors 	= array(
			'banner'	=> array(
				array( 
					'key'		=> 'popupBackgroundColor',
					'text'		=> esc_html__( 'Main Background Color', 'simple-cookie-control' ),
					'default'	=> '#000000'
				),
				array( 
					'key'		=> 'popupTextColor',
					'text'		=> esc_html__( 'Main Text Color', 'simple-cookie-control' ),
					'default'	=> '#ffffff'
				),
				array( 
					'key'		=> 'popupLinkColor',
					'text'		=> esc_html__( 'Main Link Color', 'simple-cookie-control' ),
					'default'	=> '#ffffff'
				),
			),
			'button'	=> array(
				array( 
					'key'		=> 'buttonBackgroundColor',
					'text'		=> esc_html__( 'Button Background Color', 'simple-cookie-control' ),
					'default'	=> 'transparent'
				),
				array( 
					'key'		=> 'buttonTextColor',
					'text'		=> esc_html__( 'Button Text Color', 'simple-cookie-control' ),
					'default'	=> '#ffffff'
				),
				array( 
					'key'		=> 'buttonBorderColor',
					'text'		=> esc_html__( 'Button Border Color', 'simple-cookie-control' ),
					'default'	=> '#ffffff'
				),
			),
			'highlight'	=> array(
				array( 
					'key'		=> 'highlightBackgroundColor',
					'text'		=> esc_html__( 'Decline Button Background Color', 'simple-cookie-control' ),
					'default'	=> 'transparent'
				),
				array( 
					'key'		=> 'highlightTextColor',
					'text'		=> esc_html__( 'Decline Button Text Color', 'simple-cookie-control' ),
					'default'	=> '#ffffff'
				),
				array( 
					'key'		=> 'highlightBorderColor',
					'text'		=> esc_html__( 'Decline Button Border Color', 'simple-cookie-control' ),
					'default'	=> 'transparent'
				),
			),

		);
	}

	/**
	 * Customizer control to config custom cookie banner
	 *
	 * @since    1.0.0
	 * @param      object $wp_customize       Object from WP Customize Manager
	 */
	public function register_customizer_cookie_banner( $wp_customize ) {

		$wp_customize->add_panel(
			$this->plugin_name,
			array(
				'title'       => __( 'Simple Cookie Control', 'simple-cookie-control' ),
				'description' => __( 'Customize Manager for customcookie banner', 'simple-cookie-control' ),
				'priority'    => 160,
				'capability'  => 'manage_options',
			)
		);

		$this->add_cookies_styles_section( $wp_customize );

		// Segunda Seccion
		$wp_customize->add_section(
			'scc_layout',
			array(
				'title'      => __( 'Segunda Seccion', 'simple-cookie-control' ),
				'panel'      => $this->plugin_name,
				'priority'   => 2,
				'capability' => 'manage_options',
			)
		);

	}

	/**
	 * Customizer control to First section: styles of the banner
	 *
	 * @since    1.0.0
	 * @param      object $wp_customize       Object from WP Customize Manager
	 */
	public function add_cookies_styles_section( $wp_customize ) {

		$section = 'scc_styles';
		
		$wp_customize->add_section(
			$section,
			array(
				'title'      => __( 'Styles of the banner', 'simple-cookie-control' ),
				'panel'      => $this->plugin_name,
				'priority'   => 1,
				'capability' => 'manage_options',
			)
		);

		/**
		 * Add option to set the 'POSITION'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[position]',
			array(
				'type'       => 'option',
				'capability' => 'manage_options',
				'default'	=> 'bottom'
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[position]',
			array(
				'label'    		=> esc_html__( 'Position', 'simple-cookie-control' ),
				'description'	=> esc_html__( 'Set the position of the cookie banner', 'simple-cookie-control' ),
				'section'  		=> $section,
				'priority' 		=> 1,
				'type'     		=> 'select',
				'choices'		=> array(
					'bottom'		=> esc_html__( 'Banner bottom', 'simple-cookie-control' ),
					'top'			=> esc_html__( 'Banner top', 'simple-cookie-control' ),
					'bottom-left'	=> esc_html__( 'Floating left', 'simple-cookie-control' ),
					'bottom-right'	=> esc_html__( 'Floating right', 'simple-cookie-control' ),
				),
			)
		);

		/**
		 * Add option to set the 'LAYOUT'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[theme]',
			array(
				'type'       => 'option',
				'capability' => 'manage_options',
				'default'	=> 'block'
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[theme]',
			array(
				'label'    		=> esc_html__( 'Style', 'simple-cookie-control' ),
				'description'	=> esc_html__( 'Set the style of the cookie banner', 'simple-cookie-control' ),
				'section'  		=> $section,
				'priority' 		=> 2,
				'type'     		=> 'select',
				'choices'		=> array(
					'block'			=> esc_html__('Block', 'simple-cookie-control' ),
					'classic'		=> esc_html__('Classic', 'simple-cookie-control' ),
					'edgeless'		=> esc_html__('Edgeless', 'simple-cookie-control' ),
				),
			)
		);

		/**
		 * Add options to set the 'COLOURS'
		 */
		$wp_customize->add_setting(
			'customizer_simple_cookie_control[colors]',
			array(
				'type'       => 'option',
				'capability' => 'manage_options',
				'default'	=> 1,
				'sanitize_callback' => $this->sanitize_checkbox,
			)
		);
		$wp_customize->add_control(
			'customizer_simple_cookie_control[colors]',
			array(
				'label'    		=> esc_html__( 'Colors', 'simple-cookie-control' ),
				'description'	=> esc_html__( 'Check to change colors here or uncheck to defined them in CSS.', 'simple-cookie-control' ),
				'section'  		=> $section,
				'priority' 		=> 3,
				'type'     		=> 'checkbox',
			)
		);

		foreach ( $this->data_colors as $item ) {
			foreach ( $item as $data ) {
				$wp_customize->add_setting(
					'customizer_simple_cookie_control['. $data['key'] .']',
					array(
						'type'       => 'option',
						'capability' => 'manage_options',
						'default'	=> $data['default'],
						'sanitize_callback' => 'sanitize_hex_color',
					)
				);
				$wp_customize->add_control( 
					new WP_Customize_Color_Control( 
						$wp_customize, 
						$data['key'], 
						array(
							'label'      => esc_html__( $data['text'], 'simple-cookie-control' ),
							'section'    => $section,
							'settings'   => 'customizer_simple_cookie_control['. $data['key'] .']',
							'input_attrs' => array(
								'class'	=> 'coloooor',
							),
						) 
					) 
				);
			}	
		}		

	}

	/**
	 * Sanitize checkbox
	 *
	 * @since    1.0.0
	 * @param      boolean $checked       Value of a checked
	 */
	public function sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

}
