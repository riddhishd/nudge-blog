<?php
/**
 * Simple Melody Theme Customizer
 *
 * @package Simple Melody
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simple_melody_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 
		'simple_melody_theme_options', 
		array(
			'title'    => esc_html__('Theme Options', 'simple-melody'),
			'priority' => 130,
	)); 

	$wp_customize->add_setting(
		'simple_melody_intro_textbox',
		array(
			'default'			=> esc_html__(' ', 'simple-melody'),
			'sanitize_callback' => 'simple_melody_sanitize_text',
	    )
	);

	$wp_customize->add_control(
		'simple_melody_intro_textbox',
		array(
			'label'   => esc_html__('Intro text', 'simple-melody'),
			'section' => 'simple_melody_theme_options',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'simple_melody_intro_textbox_pos',
		array(
			'default' 			=> 'intro-text-left',
			'sanitize_callback' => 'simple_melody_sanitize_position',
		)
	);

	$wp_customize->add_control(
		'simple_melody_intro_textbox_pos',
		array(
			'label' => esc_html__('Intro text position', 'simple-melody'),
			'section' => 'simple_melody_theme_options',
			'type' => 'radio',
			'choices' => array(
						'intro-text-left'   => esc_html__('Left', 'simple-melody'),
						'intro-text-center' => esc_html__('Center', 'simple-melody'),
						'intro-text-right'  => esc_html__('Right', 'simple-melody'),
					),
		)
	);

	$wp_customize->add_setting( 
		'simple_melody_sidebar_pos', 
		array(
			'default'			=> 'sidebar-left',
			'sanitize_callback' => 'simple_melody_sanitize_position',
		)
	);

	$wp_customize->add_control(
		'simple_melody_sidebar_pos',
		array(
			'label'   => esc_html__('Post sidebar position', 'simple-melody'),
			'section' => 'simple_melody_theme_options',
			'type'    => 'radio',
			'choices' => array(
						'sidebar-left'   => esc_html__('Left', 'simple-melody'),
						'sidebar-right'  => esc_html__('Right', 'simple-melody'),
						'sidebar-none'   => esc_html__('None', 'simple-melody'),
					),
		)
	);
}
add_action( 'customize_register', 'simple_melody_customize_register' );

/**
 * Sanitize intro text box
 */
function simple_melody_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Sanitize intro text box or sidebar position
 */
function simple_melody_sanitize_position( $input ) {
	$valid = array(
			'intro-text-left'   => esc_html__('Left', 'simple-melody'),
			'intro-text-center' => esc_html__('Center', 'simple-melody'),
			'intro-text-right'  => esc_html__('Right', 'simple-melody'),
			'sidebar-left'   => esc_html__('Left', 'simple-melody'),
			'sidebar-right'  => esc_html__('Right', 'simple-melody'),
			'sidebar-none'   => esc_html__('None', 'simple-melody'),

	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function simple_melody_customize_preview_js() {
	wp_enqueue_script( 'simple_melody_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'simple_melody_customize_preview_js' );

/**
 * Customizer styles
 */
function simple_melody_customizer_style() {

	// Load styles for customizer
	wp_register_style( 'customizer-styles', get_template_directory_uri() . '/inc/css/customizer.css', false, '1.0' );
	wp_enqueue_style( 'customizer-styles' );

}
add_action( 'admin_enqueue_scripts', 'simple_melody_customizer_style' );

/**
 * Customizer Upgrade button
 */
function simple_melody_customize_upgrade() { ?>

	<script>
		jQuery('#customize-info').prepend('<div class="upgrade-theme"><a href="https://nudgethemes.com/wordpress-themes/melody-theme/" target="_blank"><?php _e( 'Upgrade to Melody', 'simple-melody' ); ?></a></div>');
	</script>
<?php }
add_action( 'customize_controls_print_footer_scripts', 'simple_melody_customize_upgrade' );