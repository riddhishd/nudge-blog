<?php

/**
 * This template adds the Getting Started page.
 *
 * @package WordPress
 * @subpackage simple-melody
 */


/**
 * Load Getting Started styles in the admin
 */
function simple_melody_start_page_admin_scripts() {

	// Load styles only on our page
	global $pagenow;
	if( 'themes.php' != $pagenow )
		return;

	// Start Page styles
	wp_register_style( 'start-page', get_template_directory_uri() . '/inc/admin/start-page/start-page.css', false, '1.0.0' );
	wp_enqueue_style( 'start-page' );

}
add_action( 'admin_enqueue_scripts', 'simple_melody_start_page_admin_scripts' );

//Add the theme info page
if (!function_exists('simple_melody_add_start_page')) {
	function simple_melody_add_start_page() {
		add_theme_page(__('Theme Sart Page', 'simple-melody'), __('Theme Sart Page', 'simple-melody'), 'edit_theme_options', 'start-page.php', 'simple_melody_info_page');
	}
}
add_action('admin_menu', 'simple_melody_add_start_page');


if (!function_exists('simple_melody_info_page')) {
	function simple_melody_info_page() {
		$theme_data = wp_get_theme(); ?>

	<div class="wrap about-wrap nudge-themes-start-page">
		<img class="theme-screenshot" src="<?php echo get_template_directory_uri() . '/screenshot.png'; ?>" alt="" />
		<h1><?php printf(__('Welcome to %1s %2s', 'simple-melody'), $theme_data->Name, $theme_data->Version ); ?></h1>
		<p class="sub-heading"><?php printf( __('Thanks for downloading %s!', 'simple-melody'), $theme_data->Name ); ?>
		<?php echo $theme_data->Description; ?></p>

		<div class="postbox my-form-wrap">
			<h3 class="box-title"><?php printf( __('Getting Started with %s', 'simple-melody'), $theme_data->Name ); ?></h3>

			<div class="feature-section two-col">
				<div class="col">
						<div class="media-container">
							<img src="<?php echo get_template_directory_uri() . '/inc/admin/start-page/images/docs-Melody-docs.png'; ?>">
						</div>
						
					</div>
				<div class="col">
					<h3><?php printf( __('Documentation', 'simple-melody')); ?></h3>
						<p><?php printf( __('Need help setting up Simple Melody? Take a look at the documentation for help on getting setup.', 'simple-melody')); ?></p>
						<a href="https://nudgethemes.com/documentation/" class="button button-primary" target="_blank"><?php printf( __('Go to the Documentation', 'simple-melody')); ?></a>
				</div>
			</div>
		</div>

		<div class="postbox my-form-wrap">
			<h2 id="Melody-upgrade" class="box-title"><?php printf( __('Upgrade to Melody', 'simple-melody')); ?></h2>
			<p class="upgrade-btn-wrap"><?php printf( __('Upgrading to <a href="https://nudgethemes.com/wordpress-themes/melody-theme/" target="_blank">Melody</a> allows you to customize your site\'s colors, upload a custom logo and set featured content using <a href="http://jetpack.me/" target="_blank"> Jetpack</a>, as well as several other features which will help you make your site your very own.', 'simple-melody'));?><br><a href="https://nudgethemes.com/wordpress-themes/melody-theme/" class="button button-primary button-upgrade" target="_blank"><?php printf( __('Upgrade to Melody', 'simple-melody')); ?></a></p>

			<div class="feature-section two-col">
				<div class="col">
					<div class="media-container">
						<img src="<?php echo get_template_directory_uri() . '/inc/admin/start-page/images/Melody-featured-posts.jpg'; ?>">
					</div>
					<h3><?php printf( __('Featured Posts', 'simple-melody')); ?></h3>
					<p><?php printf( __('Melody\'s design is simple yet elegant. Pick your three favorite posts and highlight them as featured posts.', 'simple-melody')); ?></p>
				</div>
				<div class="col">
					<div class="media-container">
						<img src="<?php echo get_template_directory_uri() . '/inc/admin/start-page/images/Melody-grid-layout.jpg'; ?>">
					</div>
					<h3><?php printf( __('Post Grid', 'simple-melody')); ?></h3>
					<p><?php printf( __('Choose between Melody\'s two or three post grid layout.', 'simple-melody')); ?></p>
				</div>
				<div class="col">
					<div class="media-container">
						<img src="<?php echo get_template_directory_uri() . '/inc/admin/start-page/images/Melody-colors.jpg'; ?>">
					</div>
					<h3><?php printf( __('Custom Colors & CSS', 'simple-melody')); ?></h3>
					<p><?php printf( __('Melody lets you easily customize your site\'s colors. If you know a bit of CSS, you can even take it a little further using the Custom CSS area.', 'simple-melody')); ?></p>
				</div>
				<div class="col">
					<div class="media-container">
						<img src="<?php echo get_template_directory_uri() . '/inc/admin/start-page/images/Melody-logo.jpg'; ?>">
					</div>
					<h3><?php printf( __('Site Logo', 'simple-melody')); ?></h3>
					<p><?php printf( __('With the help of Jetpack, you can easily brand your site by adding your logo via the Customizer menu.', 'simple-melody')); ?></p>
				</div>
				<div class="col">
					<div class="media-container">
						<img src="<?php echo get_template_directory_uri() . '/inc/admin/start-page/images/Melody-special-styles.jpg'; ?>">
					</div>
					<h3><?php printf( __('Special Features', 'simple-melody')); ?></h3>
					<p><?php printf( __('Give your content a little extra visual elegance with sub-headings and drop caps. And give your most impressive images the attention and screen space they deserve. Take a look at Melody\'s documentation for how to easily create these styles.', 'simple-melody')); ?></p>
				</div>
				<div class="nt-theme-upgrade clear">
					<a href="https://nudgethemes.com/wordpress-themes/melody-theme/" class="button button-primary button-upgrade" target="_blank"><?php printf( __('Upgrade to Melody', 'simple-melody')); ?></a>
				</div>
			</div>
		</div> <!-- end my-form-wrap -->
	</div>
	<?php
	}
}