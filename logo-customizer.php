<?php
/*
Plugin Name: Logo Customizer
Author: Takayuki Miyauchi
Plugin URI: https://github.com/miya0001/logo-customizer
Description: This plugin allow you to customize logo image on Theme Customizer.
Version: 1.2.0
Author URI: https://github.com/miya0001/
Domain Path: /languages
Text Domain: logo-customizer
*/

$logo_customizer = new Logo_Customizer();
$logo_customizer->register();

class Logo_Customizer {

	function register()
	{
		add_action( 'plugins_loaded', array( $this, "plugins_loaded" ) );
	}

	public function plugins_loaded()
	{
		load_plugin_textdomain(
			"logo-customizer",
			false,
			dirname( plugin_basename( __FILE__ ) ).'/languages'
		);

		add_action( 'customize_register', array( $this, 'customize_register' ) );
	}

	public function customize_register( $wp_customize )
	{

		$wp_customize->add_section( 'logo-customizer', array(
			'title'    => __( 'Logo Image', 'logo-customizer' ),
			'priority' => 15,
		) );

		$wp_customize->add_setting( 'logo-customizer', array(
			'default'    => apply_filters( 'logo_customizer_default_logo', '' ),
			'type'       => 'option',
			'capability' => 'edit_theme_options',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control(
			$wp_customize,
			'logo_Image',
			array(
				'label'	   => __( 'Image', 'logo-customizer' ),
				'section'  => 'logo-customizer',
				'settings' => 'logo-customizer',
			)
		) );

	}
} // end class LogoCustomizer


/*
 * Template Tag "the_logo()"
 */
function the_logo() {

	$logo = get_option( 'logo-customizer', apply_filters( 'logo_customizer_default_logo', '' ) );

	if ( $logo ) {
		$image = '<img id="site-logo" src="%s" alt="%s" style="max-width:100%%; height:auto;">';
		printf(
			$image,
			esc_url( $logo ),
			esc_attr( get_bloginfo( 'name' ) )
		);
	} else {
		bloginfo( 'name' );
	}
}

// EOF
