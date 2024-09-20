<?php

/**
 * Enqueue scripts and styles.
 */
function standard_theme_scripts() {
	wp_enqueue_style( 'standard_theme-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_script( 'standard_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script('Tailwind_css', 'https://cdn.tailwindcss.com');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'standard_theme_scripts' );