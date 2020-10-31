<?php
/**
 * @package Lingonberry
 */
 
$format = get_post_format();
?>

<?php lingonberry_post_bubbles(); ?><!-- Calls out post bubbles-->

<article class="content-inner" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-header">

		<?php if ( 'aside' != $format && 'chat' != $format && 'link' != $format && 'status' != $format && 'quote' != $format ) : ?>
			<?php lingonberry_featured_image(); ?><!-- Calls out featured image with optional caption-->
		<?php endif; ?>

			<?php the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>

			<?php lingonberry_posted_on(); ?><!-- Calls out author and date-->

		<?php endif; ?>
	</div><!-- .post-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>


			<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'lingonberry' )); ?>


	<?php else : ?>
		<div class="post-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'lingonberry' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'lingonberry' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	<?php if ( is_single() ) : ?>
		<?php lingonberry_post_cat_tags(); ?>
	<?php endif; ?>

</article><!-- .content-inner -->
