<?php
/**
 * Customisations and Art Direction
 * Utility functions to be used across all projects.
 * 
 * @subpackage: opening_times
 */

/**
 * Register custom fonts.
 *
 * @since opening_times 1.0.0
 */
function opening_times_ad_fonts_url() {
	$fonts_url = '';
	/**
	 * Translators: If there are characters in your language that are not
	 * supported by IM Fell, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$imFell = _x( 'on', 'IM Fell font: on or off', 'taking-stock' );

	if ( 'off' !== $imFell ) {
		$font_families = array();

		$font_families[] = 'IM+Fell+English';

		$query_args = array(
			//'family' => urlencode( implode( '|', $font_families ) ),
			'family' => implode( '|', $font_families ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 *
 * @since opening_times 1.0.0
 */
function opening_times_ad_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'sinb-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'opening_times_ad_resource_hints', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function opening_times_ad_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'sinb-fonts', opening_times_ad_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'opening_times_ad_scripts' );
