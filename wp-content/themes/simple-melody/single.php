<?php
/**
 * The template for displaying all single posts.
 *
 * @package Simple Melody
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php the_post_thumbnail('post-thumb'); ?>

		<div class="content-wrap">

			<div id="primary" class="content-area">

				<main id="main" class="site-main clear" role="main">
					
					<?php get_template_part( 'template-parts/content', 'single' ); ?>

					<?php simple_melody_post_navigation(); ?>

					<?php if ( class_exists( 'Jetpack_RelatedPosts' )) :
							echo do_shortcode( '[jetpack-related-posts]' );
						endif;?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				</main><!-- #main -->
			</div><!-- #primary -->

			<?php if ( get_theme_mod( "simple_melody_sidebar_pos" ) == 'sidebar-none') : ?>

				<?php // no sidebar please ?>

			<?php else: ?>

				<?php get_sidebar(); ?>

			<?php endif; ?>

		</div>
		
	<?php endwhile; // end of the loop. ?>	
		
<?php get_footer(); ?>
