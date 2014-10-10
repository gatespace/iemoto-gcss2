<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Iemoto GroundworkCSS 2
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function iemoto_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'iemoto_jetpack_setup' );
