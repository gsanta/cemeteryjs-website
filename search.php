<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Lingonberry
 */

get_header(); ?>

	<div class="content section-inner">
		<?php if ( have_posts() ) : ?>

			<header class="page-header clear">
				<h1 class="page-title"><?php printf( __( 'Search Results for %s', 'lingonberry' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
			
			<div class="posts clear">
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php get_template_part( 'content', get_post_format() ); ?>
					</div><!--.post id-->
				<?php endwhile; ?>

				<?php the_posts_navigation(); ?>

			</div><!--.posts-->
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- .content section-inner -->

<?php get_footer(); ?>