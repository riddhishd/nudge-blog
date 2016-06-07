<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Simple Melody
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function simple_melody_jetpack_setup() {
	/**
	* Add theme support for Infinite Scroll
	*/
	add_theme_support( 'infinite-scroll', array(
		'container' => 'post-grid',
		'wrapper' => false,
		'render'    => 'simple_melody_infinite_scroll_render',
		'footer'    => 'page',
		'footer_widgets' => array( 'footer-widget-1', 'footer-widget-2', 'footer-widget-3', ),
	) );

	/**
	* Add support for responsive videos.
	*/
	add_theme_support( 'jetpack-responsive-videos' );

} // end function simple_melody_jetpack_setup
add_action( 'after_setup_theme', 'simple_melody_jetpack_setup' );


function simple_melody_infinite_scroll_render() {
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	endwhile;
} // end function simple_melody_infinite_scroll_render


/**
 * Removing JP Related posts to reinsert in different place
 *  */
if ( class_exists( 'Jetpack_RelatedPosts' )) :
	function jetpackme_remove_rp() {
		$jprp = Jetpack_RelatedPosts::init();
		$callback = array( $jprp, 'filter_add_target_to_dom' );
		remove_filter( 'the_content', $callback, 40 );
	}
	add_filter( 'wp', 'jetpackme_remove_rp', 20 );
endif;
