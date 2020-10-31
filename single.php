<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Lingonberry
 */

get_header(); ?>

<div class="content section-inner">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="posts clear">
		
			<?php get_template_part( 'content', get_post_format() ); ?>
			
			<?php the_post_navigation(); ?>
			
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>
		</div><!--posts-->
	</div><!--.post-->
</div><!-- .content section-inner -->

<?php get_footer(); ?>