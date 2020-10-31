<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Lingonberry
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-inner">
		<div class="post-header">
			<?php the_title( '<h2 class="post-title">', '</h2>' ); ?>
		</div> <!-- .post-header -->

		<div class="post-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'lingonberry' ),
					'after'  => '</div>',
				) );
			?>
			<?php edit_post_link( __( 'Edit', 'lingonberry' ), '<span class="edit-link">', '</span>' ); ?>
		</div><!-- .post-content. The rest of the divs are closed in page.php-->
	</div><!-- .content-inner from content-page-->
</article><!-- .post from content-page-->