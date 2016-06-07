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
				<?php simple_melody_posted_on(); ?> <?php simple_melody_entry_category();?> <?php simple_melody_entry_comments();?> 
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->	

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simple-melody' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<?php simple_melody_entry_tags(); ?>

</article><!-- #post-## -->