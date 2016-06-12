<?php

/**
 * Register required and recommended plugins for this theme.
 */
function gently_register_required_plugins() {

    $plugins = array(
        //
        array(
            'name'     => 'Kirki customizer',
            'slug'     => 'kirki',
            'required' => false
        ),
		array(
			'name'     => 'Mailchimp for WordPress',
			'slug'     => 'mailchimp-for-wp',
			'required' => false
		)
    );

    tgmpa( $plugins );

}
add_action( 'tgmpa_register', 'gently_register_required_plugins' );