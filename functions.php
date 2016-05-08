<?php
/*-----------------------------------------------------------------------------------*/
/* Directory
/*-----------------------------------------------------------------------------------*/
$mt_options = get_option("themename_theme_options");

/*-----------------------------------------------------------------------------------*/
/* Option tree
/*-----------------------------------------------------------------------------------*/
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
 
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
require( trailingslashit( get_template_directory() ) . 'option-tree/theme-options.php' );

/*-----------------------------------------------------------------------------------*/
/* Function
/*-----------------------------------------------------------------------------------*/
include_once ('functions/class-widget.php'); 
include_once ('functions/functions-footer.php'); 
include_once ('functions/functions-homepage.php'); 	
include_once ('functions/functions-hooks.php'); 
include_once ('functions/functions-comment.php');
include_once ('functions/functions-customize.php');
include_once ('functions/functions-browser.php');
include_once ('functions/functions-plugins.php');
include_once ('functions/functions-general.php');
include_once ('functions/plugins/aq_resizer.php');
include_once ('functions/import/madza-import.php');
#include_once ('functions/import/madza-export.php');

/*-----------------------------------------------------------------------------------*/
/* Madza Theme Setup
/*-----------------------------------------------------------------------------------*/
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

function madza_theme_setup() {

	add_editor_style();
	
	add_theme_support( 'post-formats', array('image', 'video', 'link', 'quote', 'gallery' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' ); 
	add_theme_support( 'woocommerce' );
	
	load_theme_textdomain( 'madza_translate', get_template_directory() . '/languages' );
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	set_post_thumbnail_size( 999, 999, true );
	
	register_nav_menus( array(
		'primary' => __( 'Header Navigation', 'madza_translate' ),
	) );
	register_nav_menus( array(
		'footer_menu' => __( 'Footer Navigation', 'madza_translate' ),
	) );
}

add_action( 'after_setup_theme', 'madza_theme_setup' );
	
/*-----------------------------------------------------------------------------------*/
/* Default Options
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 750;

function new_excerpt_length( $length ) {
	
	if(ot_get_option("blog_content_lenght")!="") { $lenghts = ot_get_option("blog_content_lenght"); } else { $lenghts = "100"; }
	return $lenghts;
	
}
add_filter( 'excerpt_length', 'new_excerpt_length' );

/*-----------------------------------------------------------------------------------*/
/*	Theme Options
/*-----------------------------------------------------------------------------------*/
function my_custom_login_logo() {
    if(ot_get_option("login_logo")!="") {
	    echo '<style type="text/css">
	        h1 a { '.ot_get_option("login_logo").' !important; }
	    </style>';
    }
}
add_action('login_head', 'my_custom_login_logo');

/*-----------------------------------------------------------------------------------*/
/*	Sidebar functions
/*-----------------------------------------------------------------------------------*/
function madza_sidebar_function() { 
	global $post;	    
    $args = array(
    	'post_type'=> 'mt_sidebar',
        'order' => 'ASC',
        'posts_per_page' => 999, 
        'orderby' => 'date', 
        'order' => 'DSC',
    );
    
    query_posts($args); while ( have_posts() ) : the_post();
    
			register_sidebar(array(
			  'name' => __(get_the_title()),
			  'id' => 'sidebar-id-'.get_the_ID().'',
			  'description' => __( 'Widget area created from Sidebar custom post type.' , 'madza_translate'),
			  'before_widget' => '<div class="menu_categories">',
				'after_widget' => '<div class="clear"></div></div>',
				'before_title' => '<h4 class="widget_h"><span>',
				'after_title' => '</span></h4>',
			));
			
	 endwhile; wp_reset_query(); 
} 
add_action('madza_sidebar_function', 'madza_sidebar_function');

madza_sidebar_function();


add_action('admin_init','optionscheck_change_santiziation', 100);
 
function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
}
 
 
function custom_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
      "src" => array(),
      "type" => array(),
      "allowfullscreen" => array(),
      "allowscriptaccess" => array(),
      "height" => array(),
          "width" => array()
      );
      $custom_allowedtags["script"] = array();
 
      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}

/*-----------------------------------------------------------------------------------*/
/*	Fix responsive issue
/*-----------------------------------------------------------------------------------*/

$col_2 = "";
$col_3 = "";
$col_4 = "";
$col_5 = "";
$col_6 = "";
$col_7 = "";
$col_8 = "";
$col_9 = "";
$col_10 = "";


/*-----------------------------------------------------------------------------------*/
/*	Visual Composer
/*-----------------------------------------------------------------------------------*/
if(function_exists('vc_set_as_theme')) vc_set_as_theme(true);

// Initialising Shortcodes
if (class_exists('WPBakeryVisualComposerAbstract')) {
    function requireVcExtend(){
        require_once locate_template('/functions/vc_functions.php');
    }
    add_action('init', 'requireVcExtend',2);
}
?>