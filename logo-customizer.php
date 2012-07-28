<?php
/*
Plugin Name: Logo Customizer
Author: Takayuki Miyauchi
Plugin URI: http://firegoby.jp/
Description: This plugin allow you to customize logo image on Theme Customizer.
Version: 1.0.0
Author URI: http://firegoby.jp/
Domain Path: /languages
Text Domain: logo-customizer
*/

new LogoCustomizer();

class LogoCustomizer {

function __construct()
{
    add_action('customize_register', array(&$this, 'customize_register'));
    add_action('plugins_loaded', array(&$this, "plugins_loaded"));
}

public function plugins_loaded()
{
    load_plugin_textdomain(
        "logo-customizer",
        false,
        dirname(plugin_basename(__FILE__)).'/languages'
    );
}

public function customize_register($wp_customize)
{

    $wp_customize->add_section('logo-customizer', array(
        'title'          => __('Logo Image', 'logo-customizer'),
        'priority'       => 15,
    ));

    $wp_customize->add_setting('logo-customizer', array(
        'default'        => '',
        'type'           => 'option',
        'capability'     => 'edit_theme_options',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'logo_Image',
        array(
            'label'     => __('Image', 'logo-customizer'),
            'section'   => 'logo-customizer',
            'settings'  => 'logo-customizer',
        )
    ));

}

} // end class LogoCustomizer


/*
 * Template Tag "the_logo()"
 */
function the_logo() {
    if (get_option('logo-customizer')) {
        $image = '<img id="site-logo" src="%s" alt="%s" style="max-width:100%%; height:auto;">';
        printf(
            $image,
            get_option('logo-customizer'),
            get_bloginfo('name')
        );
    } else {
        bloginfo('name');
    }
}

// EOF

