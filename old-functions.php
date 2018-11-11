<?php
/**
 * Various definitions of global variables.
 *
 * Framework files and functions are hooked here.
 *
 * @link 		https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 	Codexin
 * @subpackage 	Core
 * @since 		1.0
 */


// Declaring Global Variable for Theme Options
define( 'CODEXIN_THEME_OPTIONS', 'codexin_get_option' );

require_once 'lib/menus.php';
require_once 'lib/shortcodes.php';
require_once 'lib/scripts.php';
require_once 'lib/widgets.php';
require_once 'lib/wp-debloat.php';
require_once 'lib/helpers.php';
require_once 'lib/color-patterns.php';
require_once 'vendors/meta-box/meta-box.php';

if ( class_exists( 'RW_Meta_Box' ) && is_admin() ) {
    // Add plugin meta-box-show-hide
    require_once 'vendors/meta-box/extensions/meta-box-show-hide.php';

    // Add plugin meta-box-tabs
    require_once 'vendors/meta-box/extensions/meta-box-tabs.php';

    // Add plugin meta-box-conditional-logic
    require_once 'vendors/meta-box/extensions/meta-box-conditional-logic.php';
}

require_once 'lib/metaboxes.php';

add_theme_support( 'post-thumbnails' );

add_theme_support( 'html5', array(
	'search-form',
	'comment-form',
	'comment-list',
	'gallery',
	'caption',
) );


/**
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 */
add_theme_support( 'title-tag' );

// Declaring woocommerce support

add_action( 'after_setup_theme', 'codexin_woocommerce_support' );
function codexin_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


// include Redux framework theme  options

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/vendors/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/vendors/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/vendors/ReduxFramework/admin-config.php' ) ) {
    require_once( dirname( __FILE__ ) . '/vendors/ReduxFramework/admin-config.php' );
}

// /* Removing 'Redux Framework' sub menu under Tools */

// /** remove redux menu under the tools **/
add_action( 'admin_menu', 'remove_redux_menu',12 );
function remove_redux_menu() {
    remove_submenu_page('tools.php','redux-about');
}


/**
 * Enable support for adding custom image sizes
 *
 */
add_image_size( 'single-post-image', 800, 450, true );


add_action( 'admin_init', 'codexin_editor_styles' );
if ( ! function_exists( 'codexin_editor_styles' ) ) {
	/**
	 * Apply theme's stylesheet to the visual editor.
	 *
	 * @uses 	add_editor_style() Links a stylesheet to visual editor
	 * @since 	v1.0
	 */
	function codexin_editor_styles() {
		add_editor_style( 'css/admin/editor-style.css' );
	}
}


// Adding woocommerce compitability to theme structure

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'codexin_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'codexin_wrapper_end', 10);

function codexin_wrapper_start() {
  echo '<div class="container">';
}

function codexin_wrapper_end() {
  echo '</div>';
}

// woocommerce finished



add_filter( 'widget_text', 'do_shortcode' );

// add_filter( 'excerpt_more', function ( $more ) {
//  	return ' ... <a class="readmore" href="' . get_the_permalink() . '">Read More.</a>';
// });

# returns a custom-formated page title
function get_page_title ( $title, $id = null ) {
	?>
	<div id="page_title" class="section site-content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1><?php echo $title ?></h1>	
				</div>
			</div>
		</div>
	</div>
	<?php
} // get_page_title( $title, $id = null )


// Removing srcset from featured image
add_filter( 'max_srcset_image_width', create_function( '', 'return 1;' ) );

// Removing width & height from featured image
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}



# removes query strings from static resources
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
function _remove_script_version ( $src ) {
	$parts = explode( '?ver', $src );
	return $parts[0];
} // _remove_script_version ( $src )



if(!function_exists('codexin_header_tracking_code')){
    /**
     * Add advanced tracking code to header
     *
     * @uses 	add_action()
     * @since 	v1.0
     */
    function codexin_header_tracking_code() {
        $advanced_tracking_code = codexin_get_option( 'cx_advanced_tracking_code' );

        if( $advanced_tracking_code ) {
            printf( '%s', $advanced_tracking_code );
        }
    }
    add_action( 'wp_head', 'codexin_header_tracking_code', 999 );
}