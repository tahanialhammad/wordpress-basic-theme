<?php
/**
 * standard_theme Theme Customizer
 *
 * @package standard_theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function standard_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'standard_theme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'standard_theme_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'standard_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function standard_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function standard_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function standard_theme_customize_preview_js() {
	wp_enqueue_script( 'standard_theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'standard_theme_customize_preview_js' );

// tahani
function custom_excerpt_customizer_register($wp_customize) {
    // add section in  Customizer
    $wp_customize->add_section('custom_excerpt_section', array(
        'title' => __('Excerpt Settings', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('excerpt_length_setting', array(
        'default' => 150, 
        'sanitize_callback' => 'absint', 
    ));

    $wp_customize->add_control('excerpt_length_control', array(
        'label' => __('Max Excerpt Length', 'your-theme-textdomain'),
        'section' => 'custom_excerpt_section',
        'settings' => 'excerpt_length_setting',
        'type' => 'number', 
    ));
}
add_action('customize_register', 'custom_excerpt_customizer_register');


//logo
function logo_customize_register($wp_customize) {
    $wp_customize->add_setting('logo_size', array(
        'default' => '100',
        'sanitize_callback' => 'absint',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('logo_size_control', array(
        'label' => __('Logo Size', 'mytheme'),
        'section' => 'title_tagline', // Onder het sectie "Site Identity"
        'settings' => 'logo_size',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 50,   
            'max' => 400, 
            'step' => 1,   
        ),
    ));
}
add_action('customize_register', 'logo_customize_register');

