<?php
/**
 * The file Contains all metaboxes used in the 'Reveal' Theme using Metabox Plugin
 *
 * @since 1.0
 */

// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'codexin' ) );


add_filter( 'rwmb_meta_boxes', 'codexin_register_meta_boxes' );
/**
 * Function to register all the metaboxes
 *
 * @since 1.0
 */
function codexin_register_meta_boxes( $meta_boxes ) {
    $prefix = 'codexin_';

    /**
     * Metabox for Pages
     *
     */
    
    // Page Header & Footer Disabling Metabox
    // $meta_boxes[] = array(
    //     'id'            => 'codexin_page_header_footer',
    //     'title'         => esc_html__( 'Page Header & Footer Settings', 'codexin' ),
    //     'post_types'    => array( 'page' ),
    //     'context'       => 'normal',
    //     'priority'      => 'high',
    //     'fields'        => array(
    //         array(
    //             'id'    => $prefix . 'disable_header',
    //             'name'  => esc_html__( 'Disable Page Header?', 'codexin' ),
    //             'type'  => 'checkbox',
    //             'desc'  => esc_html__( 'Checking this will disable the Page Header', 'codexin' ),
    //         ),

    //         array(
    //             'id'    => $prefix . 'disable_footer',
    //             'name'  => esc_html__( 'Disable Page Footer?', 'codexin' ),
    //             'type'  => 'checkbox',
    //             'desc'  => esc_html__( 'Checking this will disable the Page Footer', 'codexin' ),
    //         ),
    //     ) // End fields
    // ); // End codexin_page_header_footer


    return $meta_boxes;
}


