<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Lingonberry
 */

get_header(); ?>

<main id="main" class="content section-inner" role="main">

	<div class="posts">
		<div class="post">
			<div class="content-inner">

				<div class="post-header">
		        	<h2 class="post-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'lingonberry' ); ?></h2>
		        </div><!-- .post-header -->

		        <div class="post-content">
		            <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'lingonberry') ?></p>
		            <?php get_search_form(); ?>
		        </div> <!-- .post-content -->

	        </div> <!-- .content-inner -->
		</div> <!-- .post -->
	</div> <!-- .posts -->

</main><!-- #main -->

<?php get_footer(); ?>