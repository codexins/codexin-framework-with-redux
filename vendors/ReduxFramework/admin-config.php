<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = CODEXIN_THEME_OPTIONS;

    // This line is only for altering the demo. Can be easily removed.
    //$opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => 'AIzaSyDh2tLGzjbk89iEsbTHSSvTSNvDf8NWsqg', // check API key from aktarzaman866@gmail account
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

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

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    // $args['share_icons'][] = array(
    //     'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
    //     'title' => 'Visit us on GitHub',
    //     'icon'  => 'el el-github'
    //     //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
    //     'title' => 'Like us on Facebook',
    //     'icon'  => 'el el-facebook'
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://twitter.com/reduxframework',
    //     'title' => 'Follow us on Twitter',
    //     'icon'  => 'el el-twitter'
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://www.linkedin.com/company/redux-framework',
    //     'title' => 'Find us on LinkedIn',
    //     'icon'  => 'el el-linkedin'
    // );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        // $args['intro_text'] = sprintf( __( '<p>Welcome to Codexin Theme Options</p>', 'redux-framework-demo' ), $v );
    } else {
        // $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    // $args['footer_text'] = __( '<p>Thanks for visiting codexin Theme Options</p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        // array(
        //     'id'      => 'redux-help-tab-1',
        //     'title'   => __( 'Theme Information', 'redux-framework-demo' ),
        //     'content' => __( '<p>This is the Codexin Theme Options. It helps to achieve some changes in the critical parts of the theme.</p>', 'redux-framework-demo' )
        // ),
        // array(
        //     'id'      => 'redux-help-tab-2',
        //     'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
        //     'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        // )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    // $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    // Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields

    Redux::setSection( $opt_name, array(
        'title'      => __( 'General', 'redux-framework-demo' ),
        'id'         => 'codexin-general',
        'subsection' => false,
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
        'fields'     => array(
            // array(
            //     'id'       => 'codexin-main-logo',
            //     'type'     => 'media',
            //     'url'      => true,
            //     'title'    => __( 'Upload Logo', 'redux-framework-demo' ),
            //     'compiler' => 'true',
            //     //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            //     'subtitle'     => __( 'Upload company logo here', 'redux-framework-demo' ),
            //     'desc' => __( 'Recommended logo size 230X85', 'redux-framework-demo' ),
            //     //'hint'      => array(
            //     //    'title'     => 'Hint Title',
            //     //    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
            //     //)
            // ),

            // array(
            //     'id'       => 'codexin-favicon',
            //     'type'     => 'media',
            //     'url'      => true,
            //     'title'    => __( 'Upload Favicon', 'redux-framework-demo' ),
            //     'compiler' => 'true',
            //     //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            //     'subtitle'     => __( 'Upload Favicon Here', 'redux-framework-demo' ),
            //     'desc' => __( 'Recommended favicon size 512X512. (Favicon setup from "Appearance->Customize" will override this favicon)', 'redux-framework-demo' ),

            // ),

            array(
                'id'        => 'cx_totop',
                'type'      => 'switch',
                'title'     => esc_html__( 'Enable To-Top Button?', 'reveal' ),
                'subtitle'  => esc_html__( 'Choose to Enable / Disable Scroll functionality to Top', 'reveal' ),
                'default'   => true,
            ),

            array(
                'id'        => 'cx_page_loader',
                'type'      => 'switch',
                'title'     => esc_html__( 'Enable Page Loader?', 'reveal' ),
                'subtitle'  => esc_html__( 'Choose to Enable / Disable Page Loader Throughout the Site', 'reveal' ),
                'default'   => true,
            ),

            // array(
            //     'id'       => 'codexin-gtm',
            //     'type'     => 'text',
            //     'title'    => __( 'Google Tag Manager (GTM) ID', 'redux-framework-demo' ),
            //     'desc'     => __( 'Retrieve the GTM ID from Google Tag Manager console. This will automatically place it throughout the site.', 'redux-framework-demo' ),
            //     //'default'  => 'GTM-12356A',
            // ),
        )
    ) );

    // typography section
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Typography', 'redux-framework-demo' ),
        'id'         => 'codexin-typo',
        'subsection' => false,
        'customizer_width' => '400px',
        'icon'             => 'dashicons dashicons-editor-paste-text',
        'fields'     => array(

            array(
                'id'       => 'codexin-body-typo',
                'type'     => 'typography',
                'title'    => __( 'Body Font', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the body font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'color'     => false,
                'output'      => array( 'html, body' ),
                'default'  => array(
                    // 'color'       => '#383838',
                    'font-size'   => '16px',
                    'line-height'   => '26px',
                    'font-family' => 'Source Sans Pro',
                    'font-weight' => '400',
                ),
            ),

            array(
                'id'       => 'codexin-menu-typo',
                'type'     => 'typography',
                'title'    => __( 'Navigation Menu Font', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify the menu font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'color'     => false,
                'output'      => array( '#nav a' ),
                'default'  => array(
                    // 'color'       => '#fff',
                    'font-size'   => '16px',
                    'font-family' => 'Montserrat',
                    'font-weight' => '400',
                    'line-height' => '26px',
                ),
            ),

            // array(
            //     'id'       => 'codexin-btn-typo',
            //     'type'     => 'typography',
            //     'title'    => __( 'Button Font Throughout the site', 'redux-framework-demo' ),
            //     'subtitle' => __( 'Specify button font properties.', 'redux-framework-demo' ),
            //     'google'   => true,
            //     'color'     => false,
            //     'letter-spacing'=> true,
            //     'output'      => array( '.primary-btn, .read-more a, .secondary-btn' ),
            //     'default'  => array(
            //         // 'color'       => '#383838',
            //         'font-size'   => '14px',
            //         'line-height'   => '18px',
            //         'font-family' => 'Montserrat',
            //         'font-weight' => '400',
            //     ),
            // ),

            array(
                'id'       => 'codexin-h1-typo',
                'type'     => 'typography',
                'title'    => __( 'Heading Font (h1)', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'color'     => false,
                'output'      => array( 'h1, .h1' ),
                'default'  => array(
                    // 'color'       => '#383838',
                    'font-size'   => '32px',
                    'line-height'   => '36px',
                    'font-family' => 'Oswald',
                    'font-weight' => '400',
                ),
            ),


            array(
                'id'       => 'codexin-h2-typo',
                'type'     => 'typography',
                'title'    => __( 'Heading Font (h2)', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'color'     => false,
                'output'      => array( 'h2, .h2' ),
                'default'  => array(
                    // 'color'       => '#383838',
                    'font-size'   => '28px',
                    'line-height'   => '32px',
                    'font-family' => 'Oswald',
                    'font-weight' => '400',
                ),
            ),


            array(
                'id'       => 'codexin-h3-typo',
                'type'     => 'typography',
                'title'    => __( 'Heading Font (h3)', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'color'     => false,
                'output'      => array( 'h3, .h3' ),
                'default'  => array(
                    // 'color'       => '#383838',
                    'font-size'   => '24px',
                    'line-height'   => '28px',
                    'font-family' => 'Oswald',
                    'font-weight' => '400',
                ),
            ),


            array(
                'id'       => 'codexin-h4-typo',
                'type'     => 'typography',
                'title'    => __( 'Heading Font (h4)', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'color'     => false,
                'output'      => array( 'h4, .h4' ),
                'default'  => array(
                    // 'color'       => '#383838',
                    'font-size'   => '21px',
                    'line-height'   => '25px',
                    'font-family' => 'Oswald',
                    'font-weight' => '400',
                ),
            ),


            array(
                'id'       => 'codexin-h5-typo',
                'type'     => 'typography',
                'title'    => __( 'Heading Font (h5)', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'color'     => false,
                'output'      => array( 'h5, .h5' ),
                'default'  => array(
                    // 'color'       => '#383838',
                    'font-size'   => '19px',
                    'line-height'   => '23px',
                    'font-family' => 'Oswald',
                    'font-weight' => '400',
                ),
            ),


            array(
                'id'       => 'codexin-h6-typo',
                'type'     => 'typography',
                'title'    => __( 'Heading Font (h6)', 'redux-framework-demo' ),
                'subtitle' => __( 'Specify font properties.', 'redux-framework-demo' ),
                'google'   => true,
                'color'     => false,
                'output'      => array( 'h6, .h6' ),
                'default'  => array(
                    // 'color'       => '#383838',
                    'font-size'   => '16px',
                    'line-height'   => '20px',
                    'font-family' => 'Oswald',
                    'font-weight' => '400',
                ),
            ),

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Colors', 'reveal' ),
        'icon'             => 'el el-brush',
        'id'               => 'codexin_color_option',
        'customizer_width' => '500px',
        'fields'           => array(

            array(
                'id'            => 'cx_body_bg',
                'type'          => 'color',
                'title'         => esc_html__( 'Body Background Color:', 'reveal' ),
                'subtitle'      => esc_html__( 'Please Choose the Body Background Color', 'reveal' ),
                'default'       => '#fff',
                'transparent'   => false,
            ),

            array(
                'id'            => 'cx_text_color',
                'type'          => 'color',
                'title'         => esc_html__( 'Body Text Color:', 'reveal' ),
                'subtitle'      => esc_html__( 'Please Choose the Body Text Color', 'reveal' ),
                'default'       => '#333',
                'transparent'   => false,
            ),

            array(
                'id'            => 'cx_primary_color',
                'type'          => 'color',
                'title'         => esc_html__( 'Primary Color:', 'reveal' ),
                'subtitle'      => esc_html__( 'Please Choose the Primary Color', 'reveal' ),
                'default'       => '#295970',
                'transparent'   => false,
            ),

            array(
                'id'            => 'cx_secondary_color',
                'type'          => 'color',
                'title'         => esc_html__( 'Secondary Color:', 'reveal' ),
                'subtitle'      => esc_html__( 'Please Choose the Secondary Color', 'reveal' ),
                'default'       => '#fce38a',
                'transparent'   => false,
            ),

            array(
                'id'            => 'cx_tertiary_color',
                'type'          => 'color',
                'title'         => esc_html__( 'Tertiary Color:', 'reveal' ),
                'subtitle'      => esc_html__( 'Please Choose the Tertiary Color', 'reveal' ),
                'default'       => '#03476F',
                'transparent'   => false,
            ),

            array(
                'id'            => 'cx_border_color',
                'type'          => 'color',
                'title'         => esc_html__( 'Border Color:', 'reveal' ),
                'subtitle'      => esc_html__( 'Please Choose the Border Color', 'reveal' ),
                'default'       => '#ccc',
                'transparent'   => false,
            ),
            
            array(
                'id'            => 'cx_offset_bg',
                'type'          => 'color',
                'title'         => esc_html__( 'Offset Color:', 'reveal' ),
                'subtitle'      => esc_html__( 'Please Choose the Offset Color', 'reveal' ),
                'default'       => '#f1f1f1',
                'transparent'   => false,
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'reveal' ),
        'id'               => 'codexin_header_option',
        'icon'             => 'el el-website',
        'customizer_width' => '500px',
    ));

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General', 'reveal' ),
        'id'               => 'codexin_header_general',
        'subsection'       => true,
        'customizer_width' => '500px',
        'fields'           => array(

            array(
                'id'            => 'cx_header_bg',
                'type'          => 'background',
                'title'         => esc_html__( 'Header Background', 'reveal' ),
                'subtitle'      => esc_html__( 'Please Choose the Header Background', 'reveal' ),
                'default'       => '#fafafa',
                'output'        => array( '.header' ),
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
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Logo', 'reveal' ),
        'id'               => 'codexin_header',
        'subsection'       => true,
        'customizer_width' => '500px',
        'fields'           => array(

            array(
                'id'       => 'cx_logo_type',
                'type'     => 'radio',
                'title'    => esc_html__( 'Select Logo type', 'reveal' ),
                'subtitle' => esc_html__( 'Please select whether you want a text logo or image logo', 'reveal' ),
                'desc'     => esc_html__( 'Select text logo or image logo', 'reveal' ),
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
                'title'    => esc_html__( 'Write your text logo', 'reveal' ),
                'subtitle' => esc_html__( 'Please write text logo here', 'reveal' ),
                'desc'     => esc_html__( 'You can write HTML code here', 'reveal' ),
                'validate' => 'html',
                'default'  => 'ReVeal',
            ),

            array(
                'id'            => 'cx_logo_color',
                'type'          => 'color',
                'required'      => array('cx_logo_type', 'equals', '1'),
                'title'         => esc_html__( 'Logo Color:', 'reveal' ),
                'subtitle'      => esc_html__( 'Please Choose the Logo Color', 'reveal' ),
                'default'       => '#295970',
                'output'        => array( 'header a.navbar-brand', 'header a.navbar-brand:hover' ),
                'transparent'   => false,
            ),

            array(
                'id'          => 'cx_text_logo_typography',
                'required'    => array('cx_logo_type', 'equals', '1'),
                'type'        => 'typography',
                'title'       => esc_html__( 'Typography For Text Logo', 'reveal' ),
                'preview'     => true,
                'letter-spacing'=> true,
                'output'      => array( 'a.navbar-brand' ),
                'units'       => 'px',
                'color'       => false,
                'google'	  => true,
                'subtitle'    => esc_html__( 'Typography option for text logo', 'reveal' ),
                'default'     => array(
                    'color'       => '#fff',
                    'font-weight'  => '400',
                    'font-family' => 'Montserrat',
                    'google'      => true,
                    'font-size'   => '30px',
                ),
            ),

            array(
                'id'       => 'cx_image_logo',
                'required' => array('cx_logo_type', 'equals', '2'),
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Upload Logo', 'reveal' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Please upload your Logo', 'reveal' ),
                'subtitle' => esc_html__( 'Recommended Logo Image Size 260X100', 'reveal' ),
                'default'  => array( 'url' => '//placehold.it/260X100' ),
            ),

            array(
                'id'                => 'cx_logo_padding',
                'type'              => 'spacing',
                'mode'              => 'padding',
                'output'            => array( '#header .navbar-brand' ),
                'units'             => array( 'px' ),
                'units_extended'    => 'true',
                'title'             => esc_html__( 'Logo padding', 'reveal' ),
                'subtitle'          => esc_html__( 'Please enter padding value in px', 'reveal' ),
                'default'           => array( )
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Page Title', 'reveal' ),
        'id'               => 'codexin-pb',
        'subsection'       => true,
        'customizer_width' => '500px',
        'fields'           => array(

            array(
                'id'                => 'cx_title_padding',
                'type'              => 'spacing',
                'mode'              => 'padding',
                'left'              => false,
                'right'             => false,
                'output'            => array( '#page_title' ),
                'units'             => array( 'px' ),
                'units_extended'    => 'true',
                'title'             => esc_html__( 'Page Title padding', 'reveal' ),
                'subtitle'          => esc_html__( 'Please Enter Page Title Top/Bottom Padding.', 'reveal' ),
                'default'           => array( )
            ),

            array(
                'id'       => 'cx_page_title_background',
                'type'     => 'background',
                'title'    => esc_html__( 'Page title Background', 'reveal' ),
                'subtitle' => esc_html__( 'Page header with image, color, etc.', 'reveal' ),
                'output'   => array( '#page_title' ),
            ),

            array(
                'id'        => 'cx_blog_title',
                'type'      => 'text',
                'title'     => esc_html__( 'Blog Page Title', 'reveal' ),
                'subtitle'  => esc_html__( 'Enter Custom Title for Blog Page', 'reveal' ),
                'default'   => esc_html__( 'Blog', 'reveal' )
            ),

            array(
                'id'       => 'cx_bcrumbs',
                'type'     => 'switch',
                'title'    => esc_html__( 'Enable Breadcrumbs?', 'reveal' ),
                'subtitle' => esc_html__( 'Select to enable/disable Breadcrumbs', 'reveal' ),
                'default'  => true
            ), 
        )
    ));

    // Social Section
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Social Section', 'redux-framework-demo' ),
        'id'         => 'codexin-social',
        'subsection' => false,
        'customizer_width' => '400px',
        'icon'             => 'dashicons dashicons-share',
        'fields'     => array(

            array(
                'id'       => 'codexin-facebook',
                'type'     => 'text',
                'title'    => __( 'Facebook URL', 'redux-framework-demo' ),
            ),

            array(
                'id'       => 'codexin-googleplus',
                'type'     => 'text',
                'title'    => __( 'Google Plus URL', 'redux-framework-demo' ),
            ),

            array(
                'id'       => 'codexin-twitter',
                'type'     => 'text',
                'title'    => __( 'Twitter URL', 'redux-framework-demo' ),
            ),

            array(
                'id'       => 'codexin-youtube',
                'type'     => 'text',
                'title'    => __( 'Youtube URL', 'redux-framework-demo' ),
            ),

            array(
                'id'       => 'codexin-yelp',
                'type'     => 'text',
                'title'    => __( 'Yelp URL', 'redux-framework-demo' ),
            ),

            array(
                'id'       => 'codexin-linkedin',
                'type'     => 'text',
                'title'    => __( 'LinkedIn URL', 'redux-framework-demo' ),
            ),

            array(
                'id'       => 'codexin-pinterest',
                'type'     => 'text',
                'title'    => __( 'Pinterest URL', 'redux-framework-demo' ),
            ),

            array(
                'id'       => 'codexin-instagram',
                'type'     => 'text',
                'title'    => __( 'Instagram URL', 'redux-framework-demo' ),
            ),

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer Options', 'redux-framework-demo' ),
        'id'         => 'codexin-footer',
        'subsection' => false,
        'customizer_width' => '400px',
        'icon'             => 'dashicons dashicons-grid-view',
        'fields'     => array(

            array(
                'id'       => 'cx_footer_background',
                'type'     => 'background',
                'title'    => esc_html__( 'Footer Background', 'reveal' ),
                'subtitle' => esc_html__( 'Footer with image, color, etc.', 'reveal' ),
                'output'   => array( '#footer' ),
                'default'   => array(
                    'background-color'      => '#fafafa',
                ),
            ),
            array(
                'id'       => 'cx_copyright',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Footer copyright text', 'reveal' ),
                'subtitle' => esc_html__( 'Please Add Your Copyright Text', 'reveal' ),
                'desc'     => esc_html__( 'You can write HTML code here', 'reveal' ),
                'validate' => 'html',
                'default'  => esc_html__( 'Copyright &copy; 2017. All Right Reserved.', 'reveal' )
            ),

            array(
                'id'            => 'cx_cpright_bg',
                'type'          => 'background',
                'title'         => esc_html__( 'Footer Copyright Background', 'reveal' ),
                'subtitle'      => esc_html__( 'Please Choose the Footer Copyright Background', 'reveal' ),
                'default'       => '#fafafa',
                'output'        => array( '#copyright' ),
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

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Advanced Settings', 'reveal' ),
        'customizer_width' => '500px',
        'id'               => 'codexin_advanced_settings',
        'icon'             => 'el el-view-mode ',
        'fields'           => array(
    ) ));

    Redux::setSection( $opt_name, array(
        'id'            => 'cx_advanced_css',
        'title'         => esc_html__( 'Custom CSS', 'reveal' ),
        'desc'          => '',
        'subsection'    => true,
        'fields'        => array(
            array(
                'id'            => 'cx_advanced_editor_css',
                'type'          => 'ace_editor',
                'title'         => esc_html__( 'CSS Code', 'reveal' ),
                'subtitle'      => esc_html__( 'Paste your CSS code here.', 'reveal' ),
                'mode'          => 'css',
                'theme'         => 'chrome',
                'full_width'    => true
            ),
        )
    ));

    // Redux::setSection( $opt_name, array(
    //     'id'            => 'cx_advanced_js',
    //     'title'         => esc_html__( 'Custom JS', 'reveal' ),
    //     'desc'          => '',
    //     'subsection'    => true,
    //     'fields'        => array(
    //         array(
    //             'id'            => 'cx_advanced_editor_js',
    //             'type'          => 'ace_editor',
    //             'title'         => esc_html__( 'JS Code', 'reveal' ),
    //             'subtitle'      => esc_html__( 'Paste your JS code here.', 'reveal' ),
    //             'mode'          => 'javascript',
    //             'theme'         => 'chrome',
    //             // 'default'       => "jQuery(document).ready(function(){\n\n});",
    //             'full_width'    => true
    //         ),
    //     )
    // ));

    Redux::setSection( $opt_name, array(
        'id'            => 'cx_advanced_tracking',
        'title'         => esc_html__( 'Tracking Code', 'reveal' ),
        'desc'          => '',
        'subsection'    => true,
        'fields'        => array(
            array(
                'id'       => 'cx_advanced_tracking_code',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Tracking Code', 'reveal' ),
                'subtitle' => esc_html__( 'Paste your Google Analytics (or other) tracking code here. This will be added into the head of the theme. Please put code inside \'Script\' tags.', 'reveal' ),
            )
        )
    ));



    // Stop Here and Do Not Wright Any Codes For Theme Options From here. You can always wright code above this line

    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => __( 'Customizer Only', 'redux-framework-demo' ),
        'desc'            => __( '<p class="description">This Section should be visible only in Customizer</p>', 'redux-framework-demo' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => __( 'Customizer Only Option', 'redux-framework-demo' ),
                'subtitle'        => __( 'The subtitle is NOT visible in customizer', 'redux-framework-demo' ),
                'desc'            => __( 'The field desc is NOT visible in customizer.', 'redux-framework-demo' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
                'options'         => array(
                    '1' => 'Opt 1',
                    '2' => 'Opt 2',
                    '3' => 'Opt 3'
                ),
                'default'         => '2'
            ),
        )
    ) );

    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'redux-framework-demo' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

