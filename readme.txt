=== Logo Customizer ===
Contributors: miyauchi
Donate link: https://github.com/miya0001/logo-customizer
Tags: theme, customizer, logo, image, branding
Requires at least: 3.8
Tested up to: 4.1
Stable tag: 1.2.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin allows you to customize the logo image on Theme Customizer.

== Description ==

This plugin allows you to customize the logo image on Theme Customizer.

https://github.com/miya0001/logo-customizer

= How to display logo =

Please place the following:

`<?php if ( function_exists( 'the_logo' ) ) the_logo(); ?>`

= Set default logo =

`
add_filter( 'logo_customizer_default_logo', function() {
    return 'http://example.com/path/to/logo.png';
} );
`


== Installation ==

* A plugin installation screen is displayed on the WordPress admin panel.
* It installs it in `wp-content/plugins`.
* The plugin is made effective.
* Use the template tag the_logo() like below.

`<?php if ( function_exists( 'the_logo' ) ) the_logo(); ?>`


== Screenshots ==

1. Theme Customizer.


== Changelog ==

= 1.0.0 =
* The first release.

== Credits ==

This plugin is not guaranteed though the user of WordPress can freely use this plugin free of charge regardless of the purpose.
The author must acknowledge the thing that the operation guarantee and the support in this plugin use are not done at all beforehand.

== Contact ==

* twitter @wpist_me
