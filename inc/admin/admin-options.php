<?php

/**
 * Main Class definition for theme options
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */


// Do not allow directly accessing this file.
defined( 'ABSPATH' ) OR die( esc_html__( 'This script cannot be accessed directly.', 'TEXT_DOMAIN' ) );


if ( ! class_exists( 'Codexin_Admin' ) ) {
    /**
     * Theme Options Class. Uses Redux Framework.
     *
     * @since v1.0.0
     */
    class Codexin_Admin
    {
        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {
            if( ! class_exists( 'ReduxFramework' ) ) {
                return;
            }
            if( true == Redux_Helpers::isTheme( __FILE__ ) ) {
                $this->initSettings();
            } else {
                add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
            }
        }

        public function initSettings() {

            $this->theme = wp_get_theme();
            $this->setArguments();
            $this->setSections();
            if( ! isset( $this->args['opt_name'] ) ) {
                return;
            }
            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        public function setArguments() {

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => CODEXIN_THEME_OPTIONS,
                // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $this->theme->get('Name'),
                // Name that appears at the top of your panel
                'display_version' => $this->theme->get('Version'),
                // Version that appears at the top of your panel
                'menu_type' => 'menu',
                //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => true,
                // Show the sections below the admin menu item or not
                'menu_title' => esc_html__('Theme Options', 'TEXT_DOMAIN'),

                'page_title' => $this->theme->get('Name') . ' ' . esc_html__('Theme Options', 'TEXT_DOMAIN'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => '',
                // Set it you want google fonts to update weekly. A google_api_key value is required.
                'google_update_weekly' => false,
                // Must be defined to add google fonts to the typography module
                'async_typography' => false,
                // Use a asynchronous font on the front end or font string
                //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
                'admin_bar' => true,
                // Show the panel pages on the admin bar
                'admin_bar_icon' => 'dashicons-portfolio',
                // Choose an icon for the admin bar menu
                'admin_bar_priority' => 50,
                // Choose an priority for the admin bar menu
                'global_variable' => '',
                // Set a different name for your global variable other than the opt_name
                'dev_mode' => false,
                // Show the time the page took to load, etc
                'update_notice' => false,
                // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
                'customizer' => true,
                // Enable basic customizer support
                //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
                //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

                // OPTIONAL -> Give you extra features
                'page_priority' => 99,
                // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php',
                // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options',
                // Permissions needed to access the options panel.
                'menu_icon' => 'dashicons-welcome-widgets-menus',
                // Specify a custom URL to an icon
                'last_tab' => '',
                // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes',
                // Icon displayed in the admin panel next to your menu_title
                'page_slug' => 'TEXT_DOMAIN',
                // Page slug used to denote the panel
                'save_defaults' => true,
                // On load save the defaults to DB before user clicks save or not
                'default_show' => false,
                // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '',
                // What to print by the field's title if the value shown is default. Suggested: *
                'show_import_export' => true,
                // Shows the Import/Export panel when not used as a field.

                // CAREFUL -> These options are for advanced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true,
                // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true,
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '',
                // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'system_info' => true,
                // HINTS
                'hints'                => array(
                    'icon'          => 'el el-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'   => 'red',
                        'shadow'  => true,
                        'rounded' => false,
                        'style'   => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show' => array(
                            'effect'   => 'slide',
                            'duration' => '500',
                            'event'    => 'mouseover',
                        ),
                        'hide' => array(
                            'effect'   => 'slide',
                            'duration' => '500',
                            'event'    => 'click mouseleave',
                        ),
                    ),
                )
            );
        }

        public function setSections() {

            // General Settings
            $this->sections[] = array(
                'title'            => esc_html__( 'General Settings', 'TEXT_DOMAIN' ),
                'id'               => 'codexin_general_settings',
                'icon'			   => 'el el-adjust-alt',
                'customizer_width' => '500px',
                'fields'           => array(
                    array(
                        'id'        => 'cx_totop',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable To-Top Button?', 'TEXT_DOMAIN' ),
                        'subtitle'  => esc_html__( 'Choose to Enable / Disable Scroll functionality to Top', 'TEXT_DOMAIN' ),
                        'default'   => true,
                    ),

                    array(
                        'id'        => 'cx_page_loader',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Page Loader?', 'TEXT_DOMAIN' ),
                        'subtitle'  => esc_html__( 'Choose to Enable / Disable Page Loader Throughout the Site', 'TEXT_DOMAIN' ),
                        'default'   => true,
                    ),
                )
            );

            // Typography
            $this->sections[] = array(
                'title'             => esc_html__( 'Typography', 'TEXT_DOMAIN' ),
                'id'                => 'codexin_typography',
                'customizer_width'  => '500px',
                'icon'              => 'el el-fontsize',
                'fields'            => array(
                    array(
                        'id'        => 'cx_typography_body',
                        'type'      => 'typography',
                        'title'     => esc_html__( 'Body Font', 'TEXT_DOMAIN' ),
                        'subtitle'  => esc_html__( 'Specify the body font properties.', 'TEXT_DOMAIN' ),
                        'google'    => true,
                        'output'    => array('body'),
                        'color'     => false,
                        'default'   => array(
                            'font-size'   => '16px',
                            'line-height' => '26px',
                            'font-family' => 'Roboto',
                            'font-weight' => '400',
                        ),
                    ),

                    array(
                        'id'             => 'cx_main_menu_typography',
                        'type'           => 'typography',
                        'title'          => esc_html__( 'Navigation Menu Font', 'TEXT_DOMAIN' ),
                        'subtitle'       => esc_html__( 'Specify Navigation Menu font properties.', 'TEXT_DOMAIN' ),
                        'google'         => true,
                        'text-transform' => true,
                        'output'         => array('.main-menu li a'),
                        'color'          => false,
                        'default'        => array(
                            'font-size'         => '14px',
                            'line-height'       => '33px',
                            'font-family'       => 'Montserrat',
                            'font-weight'       => '400',
                            'text-transform'    => 'uppercase'
                        ),
                    ),

                    array(
                        'id'       => 'cx_typography_h1',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h1', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Specify h1 font properties.', 'TEXT_DOMAIN' ),
                        'google'   => true,
                        'color'    => false,
                        'output'   => array('h1', '.h1'),
                        'default'  => array(
                            'font-size'   => '32px',
                            'font-family' => 'Montserrat',
                            'font-weight' => '400',
                        ),
                    ),

                    array(
                        'id'          => 'cx_typography_h2',
                        'type'        => 'typography',
                        'title'       => esc_html__( 'Typography h2', 'TEXT_DOMAIN' ),
                        'output'      => array( 'h2', '.h2' ),
                        'google'      => true,
                        'subtitle'    => esc_html__( 'Specify h1 font properties.', 'TEXT_DOMAIN' ),
                        'color'       => false,
                        'default'     => array(
                            'font-weight'   => 'normal',
                            'font-family'   => 'Montserrat',
                            'font-size'     => '28px',
                            'font-weight'   => '400',
                        ),
                    ),

                    array(
                        'id'       => 'cx_typography_h3',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h3', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Specify h3 font properties.', 'TEXT_DOMAIN' ),
                        'google'   => true,
                        'color'    => false,
                        'output'   => array('h3', '.h3'),
                        'default'  => array(
                            'font-size'   => '24px',
                            'font-family' => 'Montserrat',
                            'font-weight' => '400',
                        ),
                    ),

                    array(
                        'id'       => 'cx_typography_h4',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h4', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Specify h4 font properties.', 'TEXT_DOMAIN' ),
                        'google'   => true,
                        'output'   => array('h4'),
                        'color'    => false,
                        'default'  => array(
                            'font-size'   => '21px',
                            'font-family' => 'Montserrat',
                            'font-weight' => '400',
                        ),
                    ),

                    array(
                        'id'       => 'cx_typography_h5',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h5', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Specify h5 font properties.', 'TEXT_DOMAIN' ),
                        'google'   => true,
                        'color'    => false,
                        'output'   => array('h5', '.h5'),
                        'default'  => array(
                            'font-size'   => '18px',
                            'font-family' => 'Montserrat',
                            'font-weight' => '400',
                        ),
                    ),

                    array(
                        'id'       => 'cx_typography_h6',
                        'type'     => 'typography',
                        'title'    => esc_html__( 'Typography h6', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Specify h6 font properties.', 'TEXT_DOMAIN' ),
                        'google'   => true,
                        'color'    => false,
                        'output'   => array('h6', '.h6'),
                        'default'  => array(
                            'font-size'   => '15px',
                            'font-family' => 'Montserrat',
                            'font-weight' => '400',
                        ),
                    ),
                )
            );

            // Colors
            $this->sections[] = array(
                'title'            => esc_html__( 'Colors', 'TEXT_DOMAIN' ),
                'icon'             => 'el el-brush',
                'id'               => 'codexin_color_option',
                'customizer_width' => '500px',
                'fields'           => array(

                    array(
                        'id'            => 'cx_body_bg',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Body Background Color:', 'TEXT_DOMAIN' ),
                        'subtitle'      => esc_html__( 'Please Choose the Body Background Color', 'TEXT_DOMAIN' ),
                        'default'       => '#fff',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'cx_text_color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Body Text Color:', 'TEXT_DOMAIN' ),
                        'subtitle'      => esc_html__( 'Please Choose the Body Text Color', 'TEXT_DOMAIN' ),
                        'default'       => '#333',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'cx_primary_color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Primary Color:', 'TEXT_DOMAIN' ),
                        'subtitle'      => esc_html__( 'Please Choose the Primary Color', 'TEXT_DOMAIN' ),
                        'default'       => '#295970',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'cx_secondary_color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Secondary Color:', 'TEXT_DOMAIN' ),
                        'subtitle'      => esc_html__( 'Please Choose the Secondary Color', 'TEXT_DOMAIN' ),
                        'default'       => '#fce38a',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'cx_tertiary_color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Tertiary Color:', 'TEXT_DOMAIN' ),
                        'subtitle'      => esc_html__( 'Please Choose the Tertiary Color', 'TEXT_DOMAIN' ),
                        'default'       => '#fce38a',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'cx_border_color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Border Color:', 'TEXT_DOMAIN' ),
                        'subtitle'      => esc_html__( 'Please Choose the Border Color', 'TEXT_DOMAIN' ),
                        'default'       => '#ccc',
                        'transparent'   => false,
                    ),

                    array(
                        'id'            => 'cx_offset_color',
                        'type'          => 'color',
                        'title'         => esc_html__( 'Offset Color:', 'TEXT_DOMAIN' ),
                        'subtitle'      => esc_html__( 'Please Choose the offset Color', 'TEXT_DOMAIN' ),
                        'default'       => '#fafafa',
                        'transparent'   => false,
                    ),
                )
            );

            // Header
            $this->sections[] = array(
                'title'            => esc_html__( 'Header', 'TEXT_DOMAIN' ),
                'id'               => 'codexin_header_option',
                'icon'			   => 'el el-website',
                'customizer_width' => '500px',
            );

            // Logo
            $this->sections[] = array(
                'title'            => esc_html__( 'Logo', 'TEXT_DOMAIN' ),
                'id'               => 'codexin_header',
                'customizer_width' => '500px',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'cx_logo_type',
                        'type'     => 'radio',
                        'title'    => esc_html__( 'Select Logo type', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Please select whether you want a text logo or image logo', 'TEXT_DOMAIN' ),
                        'desc'     => esc_html__( 'Select text logo or image logo', 'TEXT_DOMAIN' ),
                        'options'  => array(
                            '1' => 'Text Logo',
                            '2' => 'Image Logo',
                        ),
                        'default'  => '1'
                    ),

                    array(
                        'id'       => 'cx_text_logo',
                        'required' => array('cx_logo_type', 'equals', '1'),
                        'type'     => 'textarea',
                        'title'    => esc_html__( 'Write your text logo', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Please write text logo here', 'TEXT_DOMAIN' ),
                        'desc'     => esc_html__( 'You can write HTML code here', 'TEXT_DOMAIN' ),
                        'validate' => 'html',
                        'default'  => 'Codexin',
                    ),

                    array(
                        'id'          => 'cx_text_logo_typography',
                        'required'    => array('cx_logo_type', 'equals', '1'),
                        'type'        => 'typography',
                        'title'       => esc_html__( 'Typography For Text Logo', 'TEXT_DOMAIN' ),
                        'preview'     => true,
                        'all_styles'  => true,
                        'letter-spacing'=> true,
                        'output'      => array( 'a.navbar-brand' ),
                        'units'       => 'px',
                        'color'       => false,
                        'subtitle'    => esc_html__( 'Typography option for text logo', 'TEXT_DOMAIN' ),
                        'default'     => array(
                            'color'       => '#fff',
                            'font-style'  => '400',
                            'font-family' => 'Montserrat',
                            'google'      => true,
                            'font-size'   => '30px',
                        ),
                    ),

                    array(
                        'id'            => 'cx_logo_color',
                        'required'      => array('cx_logo_type', 'equals', '1'),
                        'type'          => 'color',
                        'title'         => esc_html__( 'Logo Color:', 'TEXT_DOMAIN' ),
                        'subtitle'      => esc_html__( 'Please Choose the Logo Color', 'TEXT_DOMAIN' ),
                        'default'       => '#295970',
                        'output'        => array( 'header a.navbar-brand', 'header a.navbar-brand:hover' ),
                        'transparent'   => false,
                    ),

                    array(
                        'id'       => 'cx_image_logo',
                        'required' => array('cx_logo_type', 'equals', '2'),
                        'type'     => 'media',
                        'url'      => true,
                        'title'    => esc_html__( 'Upload Logo', 'TEXT_DOMAIN' ),
                        'compiler' => 'true',
                        'desc'     => esc_html__( 'Please upload your Logo', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Recommended Logo Image Size 260X100', 'TEXT_DOMAIN' ),
                        'default'  => array( 'url' => '//placehold.it/260X100' ),
                    ),

                    array(
                        'id'                => 'cx_logo_padding',
                        'type'              => 'spacing',
                        'mode'              => 'padding',
                        'output'            => array( '#header .navbar-brand' ),
                        'units'             => array( 'px' ),
                        'units_extended'    => 'true',
                        'title'             => esc_html__( 'Logo padding', 'TEXT_DOMAIN' ),
                        'subtitle'          => esc_html__( 'Please enter padding value in px', 'TEXT_DOMAIN' ),
                        'default'           => array( )
                    ),
                )
            );

            //Page Title And BreadCrumbs..
            $this->sections[] = array(
                'title'            => esc_html__( 'Page Title', 'TEXT_DOMAIN' ),
                'customizer_width' => '500px',
                'id'               => 'codexin-pb',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'cx_page_title_position',
                        'type'     => 'radio',
                        'title'    => esc_html__( 'Title Position :', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Please Select Page Title Position ', 'TEXT_DOMAIN' ),
                        'options'  => array(
                            '1' => esc_html__( 'Left', 'TEXT_DOMAIN' ),
                            '2' => esc_html__( 'Center', 'TEXT_DOMAIN' ),
                            '3' => esc_html__( 'Right', 'TEXT_DOMAIN' ),
                        ),
                        'default'  => '1',
                    ),

                    array(
                        'id'                => 'cx_title_padding',
                        'type'              => 'spacing',
                        'mode'              => 'padding',
                        'left'              => false,
                        'right'             => false,
                        'output'            => array( '#page_title.page-title' ),
                        'units'             => array( 'px' ),
                        'units_extended'    => 'true',
                        'title'             => esc_html__( 'Page Title padding', 'TEXT_DOMAIN' ),
                        'subtitle'          => esc_html__( 'Please Enter Page Title Top/Bottom Padding.', 'TEXT_DOMAIN' ),
                        'default'           => array( )
                    ),

                    array(
                        'id'       => 'cx_page_title_background',
                        'type'     => 'background',
                        'title'    => esc_html__( 'Background', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Page header with image, color, etc.', 'TEXT_DOMAIN' ),
                        'output'   => array( '#page_title.page-title' ),
                    ),


                    array(
                        'id'       => 'cx_bcrumbs',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Breadcrumbs?', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Select to enable/disable Breadcrumbs', 'TEXT_DOMAIN' ),
                        'default'  => true
                    ), 



                    array(
                        'id'       => 'cx_bc_position',
                        'type'     => 'radio',
                        'required' => array( 'cx_bcrumbs', '=', '1' ),
                        'title'    => esc_html__( 'Breadcrumbs Position :', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Please Select BreadCrumbs Position ', 'TEXT_DOMAIN' ),
                        'options'  => array(
                            '1' => esc_html__( 'Left', 'TEXT_DOMAIN' ),
                            '2' => esc_html__( 'Center', 'TEXT_DOMAIN' ),
                            '3' => esc_html__( 'Right', 'TEXT_DOMAIN' ),
                        ),
                        'default'  => '1',
                    ),

                ) //End Fields array...
            ); 

            // Blog Settings
            $this->sections[] = array(
                'title'            => esc_html__( 'Blog Settings', 'TEXT_DOMAIN' ),
                'icon'             => 'dashicons dashicons-schedule',
                'id'               => 'codexin_blog_settings',
                'customizer_width' => '500px',
            );

            // Blog & Archive Page
            $this->sections[] = array(
                'title'            => esc_html__( 'Blog & Archive Page', 'TEXT_DOMAIN' ),
                'id'               => 'cx_blog_archive',
                'customizer_width' => '500px',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'        => 'cx_blog_title',
                        'type'      => 'text',
                        'title'     => esc_html__( 'Blog Page Title', 'TEXT_DOMAIN' ),
                        'subtitle'  => esc_html__( 'Enter Custom Title for Blog Page', 'TEXT_DOMAIN' ),
                        'default'   => esc_html__( 'Blog', 'TEXT_DOMAIN' )
                    ),

                    array(
                        'id'       => 'cx_blog_layout',
                        'type'     => 'image_select',
                        'title'    => esc_html__( 'Select Blog & Archive Page Layout', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Select Blog & Archive Page Layout', 'TEXT_DOMAIN' ),
                        'desc'     => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'TEXT_DOMAIN' ),
                        'options'  => array(
                            'no'        => array(
                                'alt'   => '1 Column',
                                'img'   => trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/1col.png'
                            ),
                            'left'      => array(
                                'alt'   => '2 Column Left',
                                'img'   => trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/2cl.png'
                            ),
                            'right'     => array(
                                'alt'   => '2 Column Right',
                                'img'   => trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/2cr.png'
                            )
                        ),
                        'default'  => 'right'
                    ),

                    array(
                        'id'       => 'cx_blog_title_excerpt_length',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Blog Title and Excerpt Length?', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Select to Limit Blog Title & Excerpt Length by Character', 'TEXT_DOMAIN' ),
                        'default'  => 0,
                        'on'       => esc_html__( 'Enable', 'TEXT_DOMAIN' ),
                        'off'      => esc_html__( 'Disable', 'TEXT_DOMAIN' ),
                    ),

                    array(
                        'id'        => 'cx_title_length',
                        'type'      => 'slider',
                        'min'       => '10',
                        'max'       => '150',
                        'step'      => '1',
                        'required'  => array( 'cx_blog_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__( 'Title Length for Posts', 'TEXT_DOMAIN' ),
                        'subtitle'  => esc_html__( 'Control the Title Length for Posts (In Character)', 'TEXT_DOMAIN' ),
                        'desc'      => esc_html__( "Adjust the Number of Character to Show in the Post Title in Blog & Archive Page.", 'TEXT_DOMAIN' ),
                        'default'   => 30,
                    ),

                    array(
                        'id'        => 'cx_excerpt_length',
                        'type'      => 'slider',
                        'min'       => '20',
                        'max'       => '500',
                        'step'      => '1',
                        'required'  => array( 'cx_blog_title_excerpt_length', '=', '1' ),
                        'title'     => esc_html__( 'Excerpt Length for Posts', 'TEXT_DOMAIN' ),
                        'subtitle'  => esc_html__( 'Control the Excerpt Length for Posts (In Character)', 'TEXT_DOMAIN' ),
                        'desc'      => esc_html__( "Adjust the Number of Character to Show in the Post Excerpts in Blog & Archive Page.", 'TEXT_DOMAIN' ),
                        'default'   => 180,
                    ),

                    array(
                        'id'        => 'cx_blog_read_more',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Read More Button?', 'TEXT_DOMAIN' ),
                        'subtitle'  => esc_html__( 'Enable Read More Button in Blog & Archive Page?', 'TEXT_DOMAIN' ),
                        'default'   => true,
                    ),   

                    array(
                        'id'        => 'cx_pagination',
                        'type'      => 'select',
                        'title'     => esc_html__( 'Pagination Type', 'TEXT_DOMAIN' ),
                        'subtitle'  => esc_html__( 'Select the Pagination Type for Blog & Archive Page', 'TEXT_DOMAIN' ),
                        'options'   => array(
                            'numbered'  => esc_html__( 'Numbered pagination', 'TEXT_DOMAIN' ),
                            'button'    => esc_html__( 'Next - Previous Button', 'TEXT_DOMAIN' ),
                        ),
                        'default'   => 'button'
                    ),
                )
            );

            // Single Post Settings
            $this->sections[] = array(
                'title'            => esc_html__( 'Blog Single Page', 'TEXT_DOMAIN' ),
                'id'               => 'codexin_blog_single',
                'customizer_width' => '500px',
                'subsection'       => true,
                'fields'           => array(

                    array(
                        'id'       => 'cx_single_layout',
                        'type'     => 'image_select',
                        'title'    => esc_html__( 'Select Single Post Page Layout', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Select Single Post Page Layout', 'TEXT_DOMAIN' ),
                        'desc'     => esc_html__( 'Choose From Full width / Left sidebar / Right Sidebar', 'TEXT_DOMAIN' ),
                        'options'  => array(
                            'no'    => array(
                                'alt'   => '1 Column',
                                'img'   => trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/1col.png'
                            ),
                            'left'  => array(
                                'alt'   => '2 Column Left',
                                'img'   => trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/2cl.png'
                            ),
                            'right' => array(
                                'alt'   => '2 Column Right',
                                'img'   => trailingslashit( get_template_directory_uri() ) . 'assets/images/admin/2cr.png'
                            )
                        ),
                        'default'  => 'right'
                    ),

                    array(
                        'id'        => 'cx_single_share',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Share Links?', 'TEXT_DOMAIN' ),
                        'subtitle'  => esc_html__( 'Choose to Enable / Disable Share Links in Single Post', 'TEXT_DOMAIN' ),
                        "default"   => true,
                    ),

                    array(
                        'id'        => 'cx_single_button',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Enable Post Navigation?', 'TEXT_DOMAIN' ),
                        'subtitle'  => esc_html__( 'Choose to Enable / Disable Previous or Next Post Links', 'TEXT_DOMAIN' ),
                        "default"   => true,
                    ),

                    array(
                        'id'        => 'cx_single_pagination',
                        'type'      => 'select',
                        'title'     => esc_html__( 'Pagination Type', 'TEXT_DOMAIN' ),
                        'subtitle'  => esc_html__( 'Select the Pagination Type for Single Posts.', 'TEXT_DOMAIN' ),
                        'required'  => array( 'cx_single_button', '=', '1' ),
                        'options'   => array(
                            'button'    => esc_html__( 'Next - Previous Button', 'TEXT_DOMAIN' ),
                            'title'     => esc_html__( 'Button with Post Title Text', 'TEXT_DOMAIN' ),
                        ),
                        'default'   => 'button'
                    ),

                    array(
                        'id'        => 'cx_post_comments',
                        'type'      => 'switch',
                        'title'     => esc_html__( 'Show Comments?', 'TEXT_DOMAIN' ),
                        'subtitle'  => esc_html__( 'Select if You Need to Show Single Blog Post Comments', 'TEXT_DOMAIN' ),
                        "default"   => true,
                    ),
                )
            );  

            // footer section 
            $this->sections[] = array(
                'title'            => esc_html__( 'Footer', 'TEXT_DOMAIN' ),
                'customizer_width' => '500px',
                'id'               => 'codexin_footer',
                'fields'           => array(

                    array(
                        'id'       => 'cx_footer_background',
                        'type'     => 'background',
                        'title'    => esc_html__( 'Background', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Footer with image, color, etc.', 'TEXT_DOMAIN' ),
                        'output'   => array( '#colophon' ),
                        'default'   => array(
                            'background-color'      => '#fafafa',
                        ),
                    ),

                    array(
                        'id'       => 'cx_footer_copyright',
                        'type'     => 'switch',
                        'title'    => esc_html__( 'Enable Footer Copyright?', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Select to enable/disable Footer Copyright', 'TEXT_DOMAIN' ),
                        'default'  => true,
                    ),

                    array(
                        'id'            => 'cx_footer_copyright_bg',
                        'type'          => 'background',
                        'required'      => array( 'cx_footer_copyright', '=', '1' ),
                        'title'         => esc_html__( 'Footer Copyright Background', 'TEXT_DOMAIN' ),
                        'subtitle'      => esc_html__( 'Please Choose the Footer Copyright Background', 'TEXT_DOMAIN' ),
                        'default'       => '#fafafa',
                        'output'        => array( '.footer-copyright' ),
                        'transparent'   => false,
                        'background-repeat'   => false,
                        'background-attachment'   => false,
                        'background-position'   => false,
                        'background-image'   => false,
                        'background-size'   => false,
                        'preview'   => false,
                        'default'   => array(
                            'background-color'      => '#333333',
                        ),
                    ),

                    array(
                        'id'       => 'cx_copyright',
                        'type'     => 'textarea',
                        'required' => array( 'cx_footer_copyright', '=', '1' ),
                        'title'    => esc_html__( 'Footer copyright text  ', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Please Add Your Copyright Text', 'TEXT_DOMAIN' ),
                        'desc'     => esc_html__( 'You can write HTML code here', 'TEXT_DOMAIN' ),
                        'validate' => 'html',
                        'default'  => esc_html__( 'Copyright &copy; 2017. All Right Reserved.', 'TEXT_DOMAIN' )
                    ),
                )

            ); //End Footer...

            $this->sections[] = array(
                'title'            => esc_html__( 'Advanced Settings', 'TEXT_DOMAIN' ),
                'customizer_width' => '500px',
                'id'               => 'codexin_advanced_settings',
                'icon'             => 'el el-view-mode ',
                'fields'           => array(
            ) );

            $this->sections[] = array(
                'id'            => 'cx_advanced_css',
                'title'         => esc_html__( 'Custom CSS', 'TEXT_DOMAIN' ),
                'desc'          => '',
                'subsection'    => true,
                'fields'        => array(
                    array(
                        'id'            => 'cx_advanced_editor_css',
                        'type'          => 'ace_editor',
                        'title'         => esc_html__( 'CSS Code', 'TEXT_DOMAIN' ),
                        'subtitle'      => esc_html__( 'Paste your CSS code here.', 'TEXT_DOMAIN' ),
                        'mode'          => 'css',
                        'theme'         => 'chrome',
                        'full_width'    => true
                    ),
                )
            );

            $this->sections[] = array(
                'id'            => 'cx_advanced_js',
                'title'         => esc_html__( 'Custom JS', 'TEXT_DOMAIN' ),
                'desc'          => '',
                'subsection'    => true,
                'fields'        => array(
                    array(
                        'id'            => 'cx_advanced_editor_js',
                        'type'          => 'ace_editor',
                        'title'         => esc_html__( 'JS Code', 'TEXT_DOMAIN' ),
                        'subtitle'      => esc_html__( 'Paste your JS code here.', 'TEXT_DOMAIN' ),
                        'mode'          => 'javascript',
                        'theme'         => 'chrome',
                        'default'       => "jQuery(document).ready(function(){\n\n});",
                        'full_width'    => true
                    ),
                )
            );

            $this->sections[] = array(
                'id'            => 'cx_advanced_tracking',
                'title'         => esc_html__( 'Tracking Code', 'TEXT_DOMAIN' ),
                'desc'          => '',
                'subsection'    => true,
                'fields'        => array(
                    array(
                        'id'       => 'cx_advanced_tracking_code',
                        'type'     => 'textarea',
                        'title'    => esc_html__( 'Tracking Code', 'TEXT_DOMAIN' ),
                        'subtitle' => esc_html__( 'Paste your Google Analytics (or other) tracking code here. This will be added into the head of the theme. Please put code inside \'Script\' tags.', 'TEXT_DOMAIN' ),
                    )
                )
            );




        }
    }

    global $reduxConfig;
    $reduxConfig = new Codexin_Admin();

} else {
    echo __( 'The class named Redux_Framework_sample_config has already been called. <strong>Developers, you need to prefix this class with your company name or you\'ll run into problems!</strong>', 'TEXT_DOMAIN' );
}

