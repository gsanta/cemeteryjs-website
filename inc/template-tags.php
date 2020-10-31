<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Lingonberry
 */

if ( ! function_exists( 'the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Posts navigation', 'lingonberry' ); ?></h2>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'lingonberry' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'lingonberry' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;
if ( ! function_exists( 'the_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function the_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Post navigation', 'lingonberry' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'lingonberry_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function lingonberry_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	global $post;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)' ), '<span class="edit-link">', '</span>' ); ?>
	</li>

	<?php else : ?>

	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="comment">
			<div class="comment-meta comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>

					<div class="comment-meta-content">
					<?php printf( '<cite class="fn">%1$s %2$s</cite>',
						get_comment_author_link(),
						( $comment->user_id === $post->post_author ) ? '<span class="post-author"> ' . __( '(Post author)', 'lingonberry' ) . '</span>' : ''
					); ?>

					<p><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s &mdash; %2$s', '1: date, 2: time', 'lingonberry' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a></p>

				</div><!-- .comment-metadata-content -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'lingonberry' ); ?></p>
				<?php endif; ?>

				<div class="comment-actions">

					<?php edit_comment_link( __( 'Edit', 'lingonberry' ), '', '' ); ?>

					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'lingonberry' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

				</div> <!-- /comment-actions -->

				<div class="clear"></div>


			</div><!-- .comment-meta comment-author vcard -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->



	<?php endif;

}
endif;
 // ends check for lingonberry_comment()

if ( ! function_exists( 'lingonberry_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function lingonberry_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) )
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	
	echo '<div class="post-meta">';
	printf( __( '<span class="posted-on">%1$s</span><span class="byline"><span class="sep">/</span>%2$s</span>', 'lingonberry' ),
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'lingonberry' ), get_the_author() ) ),
			esc_html( get_the_author() )
		)
	);
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="sep">/</span><span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'lingonberry' ), __( '1 Comment', 'lingonberry' ), __( '% Comments', 'lingonberry' ) );
		echo '</span>';
	}
	edit_post_link( __( 'Edit', 'lingonberry' ), '<span class="sep">/</span><span class="edit-link">', '</span>' );
	echo '</div>';
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function lingonberry_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so lingonberry_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so lingonberry_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in lingonberry_categorized_blog
 */
function lingonberry_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'lingonberry_category_transient_flusher' );
add_action( 'save_post',     'lingonberry_category_transient_flusher' );


/**
 * Creates post format specific "bubbles" that show up next to the post
 */
 if ( ! function_exists( 'lingonberry_post_bubbles' ) ) :
function lingonberry_post_bubbles() {
	?>
	<div class="post-bubbles">

		<a href="<?php the_permalink(); ?>" class="format-bubble" title="<?php the_title_attribute(); ?>"><span class="screen-reader-text"><?php the_title(); ?> &mdash; <?php the_date(); ?></span></a>

	</div><!-- .post-bubbles -->
<?php
}
endif; // Post Bubbles

/**
 * Creates meta data that shows the categories and tags
 */
 if ( ! function_exists( 'lingonberry_post_cat_tags' ) ) :
function lingonberry_post_cat_tags() {
	?>
	<div class="post-cat-tags">
		<?php 
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'lingonberry' ) );
			if ( $categories_list && lingonberry_categorized_blog() ) {
				printf( '<span class="post-categories">' . __( 'Categories: %1$s', 'lingonberry' ) . '</span>', $categories_list );
			}
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'lingonberry' ) );
			if ( $tags_list ) {
				printf( '<span class="post-tags">' . __( 'Tags: %1$s', 'lingonberry' ) . '</span>', $tags_list );
			}
		?>
	</div>
<?php
}
endif; // Post Cat Tags

/**
 * Creates featured image with optional caption
 */
 if ( ! function_exists( 'lingonberry_featured_image' ) ) :
function lingonberry_featured_image() {
	?>
		<?php if ( has_post_thumbnail() ) : ?>

			<div class="featured-media">

				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>">
					<?php the_post_thumbnail( 'lingonberry-post-image' ); ?>
					<?php if ( ! empty( get_post( get_post_thumbnail_id() )->post_excerpt ) ) : ?>
						<div class="media-caption-container">
							<p class="media-caption"><?php echo get_post( get_post_thumbnail_id() )->post_excerpt; ?></p><!--Shows the featured image caption-->
						</div>
					<?php endif; ?>
				</a>

			</div> <!-- /featured-media -->

		<?php endif; ?>
<?php
}
endif; // Post Cat Tags
