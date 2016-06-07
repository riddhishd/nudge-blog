<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Simple Melody
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('clear'); ?>>

	<div class="entry-content">
		<header class="entry-header">
			<?php if(is_front_page()):?>	
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			<?php else: ?>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php endif; ?>

		</header><!-- .entry-header -->	

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simple-melody' ),
				'after'  => '</div>',
			) );
		?>

		<?php edit_post_link( esc_html__( 'Edit', 'simple-melody' ), '<span class="edit-link">', '</span>' ); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->