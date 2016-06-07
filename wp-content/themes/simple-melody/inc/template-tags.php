<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Simple Melody
 */

if ( ! function_exists( 'simple_melody_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function simple_melody_posts_navigation() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'simple-melody' ); ?></h2>

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( esc_html__( 'Older posts', 'simple-melody' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( esc_html__( 'Newer posts', 'simple-melody' ) ); ?></div>
			<?php endif; ?>

	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'simple_melody_post_navigation' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function simple_melody_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	
	?>
	<nav class="navigation post-navigation clear" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'simple-melody' ); ?></h2>
		<div class="nav-links match-height clear">
			<?php
				previous_post_link( ' <div class="nav-previous element-height">%link</div>', wp_kses( __( '<span class="meta-nav">Previous article</span> %title ', 'simple-melody' ), array( 'span' => array( 'class' => array() ) ) ));
				next_post_link( ' <div class="nav-next element-height">%link</div>', wp_kses( __( '<span class="meta-nav">Next article</span> %title ', 'simple-melody' ), array( 'span' => array( 'class' => array() ) ) ));
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'simple_melody_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function simple_melody_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'simple-melody' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'simple_melody_entry_category' ) ) :
/**
 * Prints HTML with meta information for the categories.
 */
function simple_melody_entry_category() {
	// Hide category text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'simple-melody' ) );
		if ( $categories_list && simple_melody_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'In %1$s', 'simple-melody' ) . '</span>', $categories_list );
		}
	}
}
endif;

if ( ! function_exists( 'simple_melody_entry_comments' ) ) :
/**
 * Prints HTML with comments.
 */
function simple_melody_entry_comments() {

	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'simple-melody' ), esc_html__( '1 Comment', 'simple-melody' ), esc_html__( '% Comments', 'simple-melody' ) );
		echo '</span>';
	}
	edit_post_link( esc_html__( 'Edit', 'simple-melody' ), '<span class="edit-link">', '</span>' );
}
endif;


if ( ! function_exists( 'simple_melody_entry_tags' ) ) :
/**
 * Prints HTML with meta information for tags.
 */
function simple_melody_entry_tags() {
	// Hide tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ' ', 'simple-melody' ) );
		if ( $tags_list ) {
			echo '<footer class="entry-footer entry-meta">';
			printf( '<span class="tags-links">' . esc_html__( '%1$s', 'simple-melody' ) . '</span>', $tags_list );
			echo '</footer>';
		}
	}
}
endif;

if ( ! function_exists( 'simple_melody_portfolio_entry_tags' ) ) :
/**
 * Prints HTML with meta information for portfolio tags. ****NEED HELP WITH THIS: wrap each item in span****
 */
function simple_melody_portfolio_entry_tags() {
	global $post;

	/* translators: used between list items, there is a space after the comma */
	$portfolio_tags_list = the_terms($post->ID, 'jetpack-portfolio-tag', '', ' '); 

	if ( $portfolio_tags_list ) {
		printf( '<span class="tags-links">' . esc_html__( '%1$s', 'simple-melody' ) . '</span>', $portfolio_tags_list );
	}

	edit_post_link( esc_html__( 'Edit', 'simple-melody' ), '<span class="edit-link">', '</span>' );	

}
endif;


if ( ! function_exists( 'simple_melody_portfolio_entry_types' ) ) :
/**
 * Prints HTML with meta information for portfolio types. ****NEED HELP WITH THIS: wrap entire list in span****
 */
function simple_melody_portfolio_entry_types() {
	global $post;

	$portfolio_types_list = the_terms($post->ID, 'jetpack-portfolio-type', '', ', ');
	if ( $portfolio_types_list ) {

		sprintf( esc_html__( '%1$s', 'simple-melody' ), $portfolio_types_list );
	}

}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( 'Category: %s', 'simple-melody' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Tag: %s', 'simple-melody' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Author: %s', 'simple-melody' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Year: %s', 'simple-melody' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'simple-melody' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Month: %s', 'simple-melody' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'simple-melody' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Day: %s', 'simple-melody' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'simple-melody' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'simple-melody' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'simple-melody' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'simple-melody' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'simple-melody' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'simple-melody' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'simple-melody' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'simple-melody' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'simple-melody' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'simple-melody' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Archives: %s', 'simple-melody' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'simple-melody' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'simple-melody' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function simple_melody_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'simple_melody_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'simple_melody_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so melody_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so melody_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in melody_categorized_blog.
 */
function simple_melody_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'simple_melody_categories' );
}
add_action( 'edit_category', 'simple_melody_category_transient_flusher' );
add_action( 'save_post',     'simple_melody_category_transient_flusher' );
