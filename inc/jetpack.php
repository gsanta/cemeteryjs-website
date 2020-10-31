<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Lingonberry
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function lingonberry_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'main',
		'footer_widgets' => array( 'sidebar-1', 'sidebar-2', 'sidebar-3' ),
		'render'         => 'lingonberry_infinite_scroll_render',
	) );
	
	add_theme_support( 'jetpack-responsive-videos' );
	
	add_image_size( 'lingonberry-logo', 200, 200, true );
	add_theme_support( 'site-logo', array( 'size' => 'lingonberry-logo' ) );
}
add_action( 'after_setup_theme', 'lingonberry_jetpack_setup' );


/**
 * Setting up the loop to work properly for infinite scroll.
 */
function lingonberry_infinite_scroll_render() {
	 if ( have_posts() ) : ?>
		<div class="posts">

			<?php while (have_posts()) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php get_template_part( 'content', get_post_format() ); ?>
				</div> <!-- .post -->

			<?php endwhile; ?>
	   </div> <!-- .post -->
	<?php endif;
}


