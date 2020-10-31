<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Lingonberry
 */
?>

	</div><!-- #content -->

	<?php get_sidebar(); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="credits section">
			<div class="credits-inner section-inner">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'lingonberry' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'lingonberry' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'lingonberry' ), 'Lingonberry', '<a href="http://www.andersnoren.se" rel="designer">Anders Norén</a>' ); ?>
			</div><!-- .credits-inner section-inner -->
		</div><!-- .scredits section -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
