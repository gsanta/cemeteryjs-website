<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Lingonberry
 */
?>



	<div class="post clear">

		<div class="post-bubbles">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="format-bubble"></a>
		</div>

		<div class="content-inner clear">

			<div class="post-content">

				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'lingonberry' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

				<?php elseif ( is_search() ) : ?>

					<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'lingonberry' ); ?></p>
					<?php get_search_form(); ?>

				<?php else : ?>

					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'lingonberry' ); ?></p>
					<?php get_search_form(); ?>

				<?php endif; ?>

			</div> <!-- /post-content -->

		</div> <!-- /content-inner -->

	</div> <!-- /post -->




