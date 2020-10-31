<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Lingonberry
 */
 
if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) )
	return;
?>
<div class="footer section">
	<div class="footer-inner section-inner">
	<!-- Calls out three columns of footer widgets. See functions.php-->
		<div id="footer-widgets" class="widget-area three">
			<div id="secondary" class="widget-area" role="complementary">
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
					<div id="sidebar-one">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</div><!-- #sidebar-one -->
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
					<div id="sidebar-two">
						<?php dynamic_sidebar( 'sidebar-2' ); ?>
					</div><!-- #sidebar-two -->
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
					<div id="sidebar-three">
						<?php dynamic_sidebar( 'sidebar-3' ); ?>
					</div><!-- #sidebar-three -->
				<?php endif; ?>
			</div><!-- #secondary -->
		</div><!-- #footer-widgets -->
	</div><!-- .footer-inner section-inner -->
</div><!-- .footer section -->
