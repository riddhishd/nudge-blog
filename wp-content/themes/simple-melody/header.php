<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Simple Melody
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'simple-melody' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-search-form">
			<?php get_search_form();?>
			<a class="close-search" id="close-search" href="#"><span class="screen-reader-text"><?php esc_html_e( 'Close Search box', 'simple-melody' ); ?></span></a>
		</div>
		<div class="siter-header-inner">
			<div class="site-branding">
				<?php if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
				<div class="site-branding-text">
					<?php if ( is_front_page() && is_home() || (is_front_page())) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div>	
			</div><!-- .site-branding -->

		</div><!-- end .site-header-inner -->
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i><?php esc_html_e( 'Menu', 'simple-melody' ); ?></button>
			<a href="#" id="header-search-btn" class="header-search-btn"><i class="fa fa-search"></i><span class="screen-reader-text"><?php esc_html_e( 'Search', 'simple-melody' ); ?></span></a>
			<?php wp_nav_menu( 
						array(
							'container'      => '', 
							'theme_location' => 'primary', 
							'menu_id'        => 'primary-menu' 
							) 
				  ); ?>	
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<?php $intro_text_box = get_theme_mod( 'simple_melody_intro_textbox' );

		  if( $intro_text_box ) :?>

		<div class="intro-block left clear">

			<p><?php echo wp_kses_post( $intro_text_box ); ?></p>

		</div>

	<?php endif; ?>

	<div id="content" class="site-content">
