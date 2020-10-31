<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lingonberry
 */

get_header(); ?>

<main id="main" class="content section-inner" role="main">

	<?php if ( have_posts() ) : ?>
		<div class="posts clear">

		<?php while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php get_template_part( 'content', get_post_format() ); ?>
			</div> <!-- .post -->
			
		<?php endwhile; ?>
		
		<?php the_posts_navigation(); ?>

    	</div><!-- .posts -->
    
    <?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>
    
	<?php endif; ?>

</main><!-- #main -->


<?php get_footer(); ?>