<?php
/**
 * @package Simple Melody
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('element-height'); ?>>

	<div class="entry-content ">
		<?php if (has_post_thumbnail()): ?>
		<figure class="post-effect">
				<a href="<?php the_permalink();?>" rel="bookmark" aria-hidden="true">
					<?php the_post_thumbnail('post-feed-thumb'); ?>
				</a>
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

		<?php else: ?>

		<header class="entry-header">
			<div class="entry-meta">
				<?php simple_melody_posted_on(); ?> <?php simple_melody_entry_category();?>
			</div><!-- .entry-meta -->
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header>

		<?php edit_post_link( esc_html__( 'Edit', 'simple-melody' ), '<span class="edit-link">', '</span>' ); ?>

		<?php endif;?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
