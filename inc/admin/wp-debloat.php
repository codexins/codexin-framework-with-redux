<?php

/**
 * Destroys useless wordpress bloat
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );

add_action( 'init', function () {
    // Displays emoji support
	// We do not use emojis in our themes, so these are not necessary
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	add_filter( 'emoji_svg_url', '__return_false' );
	// Hides the link to the Really Simple Discovery service endpoint.
	remove_action( 'wp_head', 'rsd_link' );
	// Hides the link to the Windows Live Writer manifest file.
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// Prevents inject of rel=shortlink into the head if a shortlink is defined for the current page.
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	// Hides the XHTML generator that is generated on the wp_head hook.
	remove_action( 'wp_head', 'wp_generator' );
	// Filters the given oEmbed HTML. Only for oEmbedded pages
	// Removes REST API config as we do not use REST API
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	remove_action( 'wp_head', 'rest_output_link_wp_head' );
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	// JSON + JSONP for use with REST API most likely 
	// We may need to comment these out if we use them!
	add_filter( 'json_enabled', '__return_false' );
	add_filter( 'json_jsonp_enabled', '__return_false' );
	// Not sure if this is necessary - keeping for archive:
	/*
	add_filter( 'tiny_mce_plugins', function () {
		if ( is_array( $plugins ) ) { return array_diff( $plugins, array( 'wpemoji' ) ); } 
		else { return array(); }
	});
	*/
});

add_action( 'wp_enqueue_scripts', function () {
	wp_dequeue_script( 'wp-embed' );
});
?>