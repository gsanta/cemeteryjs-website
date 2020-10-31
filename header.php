<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <main id="main">
 *
 * @package Lingonberry
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'lingonberry' ); ?></a>
	<nav id="site-navigation" class="site-navigation" role="navigation">
		<div class="navigation-inner section-inner clear">
			<ul class="blog-menu"><?php wp_nav_menu( array( 'container' => '', 'theme_location' => 'primary', 'items_wrap' => '%3$s', 'fallback_cb' => false ) ); ?></ul>
			<?php get_search_form(); ?>
		</div><!--.navigation-inner section-inner-->
	</nav><!-- #site-navigation -->

	<div class="header section">
		<div class="header-inner section-inner">
		<?php if ( function_exists( 'jetpack_the_site_logo' ) && jetpack_has_site_logo() ) : ?>

			<?php jetpack_the_site_logo(); ?>

		<?php else : ?>

			<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home" class="site-logo noimg"><span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span></a>

		<?php endif; ?>


			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

			<button class="nav-toggle" title="<?php _e( 'Menu', 'lingonberry' ); ?>">
				<div class="bar"></div>
				<span class="screen-reader-text"><?php _e( 'Menu', 'lingonberry' ); ?></span>
			</button><!-- .nav-toggle -->

		</div><!-- .header-inner section-inner -->
	</div><!-- .header section -->

	<div id="content" class="site-content">
