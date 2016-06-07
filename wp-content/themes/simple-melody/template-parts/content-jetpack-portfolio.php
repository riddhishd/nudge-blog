<?php
/**
 * @package Simple Melody
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class('clear element-height'); ?>>

	<div class="entry-content ">

		<figure class="post-effect">
			<?php if (has_post_thumbnail()): ?>
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<?php the_post_thumbnail('post-feed-thumb'); ?>
				</a>
			<?php endif;?>

			<figcaption>
				<header class="entry-header">
					<div class="entry-meta">
						<?php simple_melody_portfolio_entry_types(); ?>
					</div><!-- .entry-meta -->

					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				</header>

				<?php edit_post_link( esc_html__( 'Edit', 'simple-melody' ), '<span class="edit-link">', '</span>' ); ?>
			</figcaption>
		</figure>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simple-melody' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->	

</article><!-- #post-## -->
