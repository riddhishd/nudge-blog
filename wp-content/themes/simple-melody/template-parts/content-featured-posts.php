<?php
/**
 * @package Simple Melody
 */
?>

<section class="featured-wrap match-height clear">

	<?php
		$featured = melody_get_featured_posts();
		$count = 0;
		// If we have no posts, our work is done here
		if ( empty( $featured ) )
			return; ?>

	<?php foreach ( $featured as $post ) : setup_postdata( $post ); $count++;?>

	<?php if( $count == 1 ): ?>
		<div class="featured-content featured-left element-height">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">

					<figure class="post-effect">
						<?php if (has_post_thumbnail()): ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark" aria-hidden="true">
								<?php the_post_thumbnail('featured-thumb-1'); ?>
							</a>
						<?php endif;?>

						<figcaption>
							<header class="entry-header">
								<div class="entry-meta">
									<?php simple_melody_posted_on(); ?> <?php simple_melody_entry_category();?>
								</div><!-- .entry-meta -->
								<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							</header>
								
								<?php edit_post_link( esc_html__( 'Edit', 'simple-melody' ), '<span class="edit-link">', '</span>' ); ?>
						</figcaption>
					</figure>

				</div><!-- .entry-content -->

			</article><!-- #post-## -->
		</div><!-- end .featured-left -->

	<?php else: ?>

	<?php $count >= 2; ?>
	<div class="featured-content featured-right element-height">

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">

					<figure class="post-effect">
						<?php if (has_post_thumbnail()): ?>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<?php the_post_thumbnail('featured-thumb-2'); ?>
							</a>
						<?php endif;?>

						<figcaption>
							<header class="entry-header">
								<div class="entry-meta">
									<?php simple_melody_posted_on(); ?> <?php simple_melody_entry_category();?>
								</div><!-- .entry-meta -->
								<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							</header>
							
							<?php edit_post_link( esc_html__( 'Edit', 'simple-melody' ), '<span class="edit-link">', '</span>' ); ?>
						</figcaption>
					</figure>

				</div><!-- .entry-content -->

			</article><!-- #post-## -->

	</div><!-- end .featured-right -->

	<?php endif; ?>


	<?php endforeach; ?>

	<?php wp_reset_postdata(); ?>

</section><!-- .featured-wrap clear -->
