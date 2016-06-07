<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Simple Melody
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-footer-inner match-height">

			<!-- Footer Block Left -->
			<?php
				if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
				<div class="footer-block element-height">

				<?php
					if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
						<div class="footer-widget-area" role="complementary">
							<?php dynamic_sidebar( 'footer-widget-1' ); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<!-- Footer Block Center -->
			<?php
				if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
					<div class="footer-block footer-widget-area element-height" role="complementary">
						<?php dynamic_sidebar( 'footer-widget-2' ); ?>
					</div>	
				<?php endif; ?>

			<!-- Footer Block Right -->
			<?php
				if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
					<div class="footer-block footer-widget-area element-height" role="complementary">
						<?php dynamic_sidebar( 'footer-widget-3' ); ?>
					</div>
				<?php endif; ?>

		</div><!-- end .site-footer-inner -->

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'simple-melody' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'simple-melody' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'simple-melody' ), 'Simple Melody', '<a href="http://nudgethemes.com" rel="designer">Nudge Themes</a>' ); ?>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
