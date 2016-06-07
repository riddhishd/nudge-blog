<?php
/**
 * @package Simple Melody
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta">
				<?php simple_melody_posted_on(); ?> <span class="types-link">In <?php simple_melody_portfolio_entry_types();  ?></span>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->	

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simple-melody' ),
				'after'  => '</div>',
			) );
		?>

		<footer class="entry-footer entry-meta">
			<span class="tags-links"><?php simple_melody_portfolio_entry_tags(); ?></span>
		</footer><!-- .entry-footer -->

	</div><!-- .entry-content -->

</article><!-- #post-## -->