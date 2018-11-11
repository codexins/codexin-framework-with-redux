<?php

/**
 * Function definition to pass colors in frontend from theme options
 *
 * @package     Codexin
 * @subpackage  Core
 * @since       1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );


if( ! function_exists( 'codexin_color_settings' ) ) {
    /**
     * Framework function to pass colors from theme options
     *
     * @uses    wp_add_inline_style()
     * @since   1.0.0
     */
    function codexin_color_settings() {

        // Retrieving color variables from theme options
        $body_bg            = !empty( codexin_get_option( 'cx_body_bg' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_body_bg' ) ) : '#fff';
        $text_color         = !empty( codexin_get_option( 'cx_text_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_text_color' ) ) : '#333';
        $primary_color      = !empty( codexin_get_option( 'cx_primary_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_primary_color' ) ) : '#295970';
        $secondary_color    = !empty( codexin_get_option( 'cx_secondary_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_secondary_color' ) ): '#fce38a';
        $tertiary_color    = !empty( codexin_get_option( 'cx_tertiary_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_tertiary_color' ) ): '#03476F';
        $border_color       = !empty( codexin_get_option( 'cx_border_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_border_color' ) ) : '#ddd';
        $offset_color       = !empty( codexin_get_option( 'cx_offset_color' ) ) ? codexin_sanitize_hex_color( codexin_get_option( 'cx_offset_color' ) ) : '#f1f1f1';
        $white_color        = '#fff';
        $transparent_bg     = 'transparent';

        $theme_opt_colors = '';

        // Building up the css selectors
        $body_bg_selectors = array(
            
        );
        $text_color_selectors = array(
            
        );
        $text_color_in_bg_selectors = array(

        );
        $text_color_in_border_selectors = array(
            
        );
        $primary_color_selectors = array(

        );
        $primary_color_in_bg_selectors = array(

        );
        $primary_color_in_bg_color_selectors = array(

        );
        $primary_color_in_border_selectors = array(

        );
        $primary_color_in_mobile_menu_selectors_1 = array(

        );
        $primary_color_in_mobile_menu_selectors_2 = array(

        );
        $primary_color_in_mobile_menu_selectors_3 = array(

        );
        $primary_color_special_selectors_1 = array(

        );
        $primary_color_special_selectors_2 = array(
            
        );
        $primary_color_special_selectors_3 = array(

        );
        $primary_color_special_selectors_4 = array(

        );
        $primary_color_special_selectors_5 = array(

        );
        $secondary_color_selectors = array(

        );
        $secondary_color_in_border_selectors = array(

        );
        $tertiary_color_selectors = array(

        );
        $border_color_selectors = array(

        );
        $border_color_in_bg_selectors = array(

        );
        $white_color_selectors = array(

        );
        $white_color_in_bg_selectors = array(

        );
        $white_color_in_border_selectors = array(

        );
        $transparent_color_in_bg_selectors = array(

        );

        // Passing styles to the correct selectors
        $theme_opt_colors .= implode( $body_bg_selectors, ',' ).'{background: '.$body_bg.';}';
        // $theme_opt_colors .= implode( $text_color_selectors, ',' ).'{color: '.$text_color.';}';
        // $theme_opt_colors .= implode( $text_color_in_bg_selectors, ',' ).'{background-color: '.$text_color.';}';
        // $theme_opt_colors .= implode( $text_color_in_border_selectors, ',' ).'{border-color: '.$text_color.';}';
        // $theme_opt_colors .= implode( $primary_color_selectors, ',' ).'{color: '.$primary_color.';}';
        // $theme_opt_colors .= implode( $primary_color_in_bg_selectors, ',' ).'{background: '.$primary_color.';}';
        // $theme_opt_colors .= implode( $primary_color_in_bg_color_selectors, ',' ).'{background-color: '.$primary_color.';}';
        // $theme_opt_colors .= implode( $primary_color_in_border_selectors, ',' ).'{border-color: '.$primary_color.';}';
        // $theme_opt_colors .= implode( $primary_color_in_mobile_menu_selectors_1, ',' ).'{background-color: '.$primary_color.';}';
        // $theme_opt_colors .= implode( $primary_color_in_mobile_menu_selectors_2, ',' ).'{background: '.codexin_adjust_color_brightness( $primary_color, -20 ).';}';
        // $theme_opt_colors .= implode( $primary_color_in_mobile_menu_selectors_3, ',' ).'{background-color: '.codexin_adjust_color_brightness( $primary_color, -40 ).';}';
        // $theme_opt_colors .= implode( $primary_color_special_selectors_1, ',' ).'{-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px '.codexin_hex_to_rgba( $primary_color, 0.6 ).';box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px '.codexin_hex_to_rgba( $primary_color, 0.6 ).';}';
        // $theme_opt_colors .= implode( $primary_color_special_selectors_2, ',' ).'{background: '.$primary_color.' none repeat scroll 0 0;}';
        // $theme_opt_colors .= implode( $secondary_color_selectors, ',' ).'{color: '.$secondary_color.';}';
        // $theme_opt_colors .= implode( $secondary_color_in_border_selectors, ',' ).'{border-color: '.$secondary_color.';}';
        // $theme_opt_colors .= implode( $tertiary_color_selectors, ',' ).'{color: '.$tertiary_color.';}';
        // $theme_opt_colors .= implode( $border_color_selectors, ',' ).'{border-color: '.$border_color.';}';
        // $theme_opt_colors .= implode( $border_color_in_bg_selectors, ',' ).'{background: '.$border_color.';}';
        // $theme_opt_colors .= implode( $white_color_selectors, ',' ).'{color: '.$white_color.';}';
        // $theme_opt_colors .= implode( $white_color_in_bg_selectors, ',' ).'{background: '.$white_color.';}';
        // $theme_opt_colors .= implode( $white_color_in_border_selectors, ',' ).'{border-color: '.$white_color.';}';
        // $theme_opt_colors .= implode( $transparent_color_in_bg_selectors, ',' ).'{background: '.$transparent_bg.';}';
        // $theme_opt_colors .= '.cx-pageloader-inner{border-top-color: '.$primary_color.';}';

        // Retrieving custom css from theme options
        $custom_css = codexin_get_option( 'cx_advanced_editor_css' );

        // Merging the custom css
        $theme_opt_colors .= $custom_css;

        // Finally adding the css after the Main Stylesheet
        wp_add_inline_style( 'main-stylesheet', $theme_opt_colors );
    }
}
add_action( 'wp_enqueue_scripts', 'codexin_color_settings' );