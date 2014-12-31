<?php

class SampleTest extends WP_UnitTestCase {

	/**
	* @test
	*/
	function the_logo_with_default()
	{
		$image = 'http://example.com/image.png';

		add_filter( 'logo_customizer_default_logo', function() use ( $image ) {
			return $image;
		} );

		$this->expectOutputRegex( '#' . $image . '#' );
		the_logo();
	}

	/**
	 * @test
	 */
	function the_logo_with_no_default()
	{
		$this->expectOutputString( esc_attr( get_bloginfo( 'name' ) ) );
		the_logo();
	}
}
