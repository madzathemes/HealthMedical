<?php 

/*-----------------------------------------------------------------------------------*/
/* Header init
/*-----------------------------------------------------------------------------------*/

function header_script() {
    
	if ( !is_admin() ) {
		 
		$mt_options = get_option("themename_theme_options");
		 
		 
			
			wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css'); 
			wp_enqueue_style('madza-style', get_stylesheet_uri()); 
			wp_enqueue_style('responsive-css', get_template_directory_uri().'/css/responsive.css');
	
		
		wp_enqueue_script( 'jquery' , '1.0' , true);
		wp_enqueue_script('flexjs', get_template_directory_uri() . '/functions/plugins/flex-slider/jquery.flexslider-min.js', array('jquery'), '1.0');
		
	 	
	    wp_enqueue_script('effect_directory', get_template_directory_uri() . '/functions/js/effects.js', array('jquery'), '1.0', true);
		wp_enqueue_script('isotope', get_template_directory_uri() . '/functions/js/jquery.isotope.min.js', array('jquery'), '1.0', true);
	   
	    
	    #wp_enqueue_script('superfish', get_template_directory_uri() . '/functions/plugins/superfish/superfish.js', array('jquery'));
	    #wp_enqueue_script('supersubs', get_template_directory_uri() . '/functions/plugins/superfish/supersubs.js', array('jquery'), '1.0' , true);
	    #wp_enqueue_script('superfishhover', get_template_directory_uri() . '/functions/plugins/superfish/hoverIntent.js', array('jquery'), '1.0' , true);
	    #wp_enqueue_script('easing', get_template_directory_uri() . '/functions/js/jquery.easing.1.3.js', array('jquery','superfish','supersubs','superfishhover'), '1.0' , true);
	    
	    
		wp_enqueue_script('modernizerss', get_template_directory_uri() . '/functions/js/modernizr.custom.js', array('jquery'), '1.0', true );
		wp_enqueue_script('bootstrap-jsu', get_template_directory_uri() . '/functions/js/bootstrap.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('kbe', get_template_directory_uri() . '/functions/js/kenburns.js', array('jquery'), '1.0', true);
	
		$protocol = is_ssl() ? 'https' : 'http';
		
		wp_enqueue_style('madzatheme-fonts', "$protocol://fonts.googleapis.com/css?family=". $mt_options['font_name'] );
		wp_enqueue_style('fontawesome', get_template_directory_uri().'/functions/plugins/FortAwesome/css/font-awesome.min.css');
		wp_enqueue_style('themifyicons', get_template_directory_uri().'/functions/plugins/themify-icons/themify-icons.css');
		
	} else { 
	
		$mt_options = get_option("themename_theme_options");
			
		wp_enqueue_style('responsive-css', get_template_directory_uri().'/css/responsive.css');
		
		
		wp_enqueue_style('admin-css', get_template_directory_uri().'/css/admin.css');
	
		wp_enqueue_script('customadmin', get_template_directory_uri() . '/functions/js/jquery.customadmin.js', array('jquery'), '1.0'); 
		
		$protocol = is_ssl() ? 'https' : 'http';
		wp_enqueue_style( 'madzatheme-fonts', "$protocol://fonts.googleapis.com/css?family=". $mt_options['font_name'] );
	
	}

} 

add_action('init', 'header_script');

function mason_script() {
    wp_enqueue_script( 'jquery-masonry' );
}
add_action( 'wp_enqueue_scripts', 'mason_script' );


/*-----------------------------------------------------------------------------------*/
/* Header Hook
/*-----------------------------------------------------------------------------------*/

function header_hooks() {
	
	global $post;

	echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
	
	if ( is_singular() ) { wp_enqueue_script( "comment-reply" ); }  
	
	$favicon = get_option("themename_theme_options");		 
	 
	?><link rel="icon" href="<?php echo esc_url($favicon['mt_favicon']); ?>" type="image/x-icon" ><?php
	?><link rel="shortcut icon" href="<?php echo esc_url($favicon['mt_favicon']);  ?>" type="image/x-icon" ><?php
	?><script type="text/javascript">
	
	//jQuery(document).ready(function(){ jQuery("ul.sf-menu, div.sf-menu ul").supersubs({ minWidth:6, maxWidth:27, extraWidth:1 }).superfish({ speed: 'fast', delay: 100 }); });</script><?php

	get_template_part('style');  
	 
	$css = get_option("themename_theme_options");
	
	if($css['mt_css']!=""){ 
	
		?><style type="text/css"><?php echo balanceTags($css['mt_css']); ?></style><?php
		
    }
    
    remove_action('wp_head', 'rsd_link');
	
	remove_action('wp_head', 'wlwmanifest_link');
        
}

add_action('wp_head', 'header_hooks');


/* --------------------------------------------------------------------------------------- Body Class */

add_filter('body_class','style_typer');

function style_typer($classesa) {

	global $post;
		
	
		if(get_post_meta(get_the_ID(), "mt_layout_styler_page", true)!="") {
			
			 if(get_post_meta(get_the_ID(), "mt_layout_styler_page", true)=="box") {
				$classesa[] = 'layout_style_box';
				return $classesa;
			} else {
				$classesa[] = 'layout_style_full';
				return $classesa;
			} 
			
		} else {
			
			if(get_option("layout_style")=="box") {
				$classesa[] = 'layout_style_box';
				return $classesa;
			} else  {
				$classesa[] = 'layout_style_full';
				return $classesa;
			}
		}
		
}






function title_styler($title_style) {

	global $post;	
	
		if(get_post_meta(get_the_ID(), "mt_title_styler", true)!="") {
			
			if(get_post_meta(get_the_ID(), "mt_title_styler", true)=="mt_title_style_1") {
				$title_style[] = 'mt_title_style_1';
				return $title_style;
			} else if(get_post_meta($post->ID, "mt_title_styler", true)=="mt_title_style_2") {
				$title_style[] = 'mt_title_style_2';
				return $title_style;
			} else  {
				$title_style[] = 'mt_title_style_2';
				return $title_style;
			}
			
		} else {
		
			$mt_title_customize = get_option("themename_theme_options");
			
			if(isset($mt_title_customize['title_style'])){
				if($mt_title_customize['title_style']=="mt_title_style_1") {
					$title_style[] = 'mt_title_style_1';
					return $title_style;
				} else if($mt_title_customize['title_style']=="mt_title_style_2") {
					$title_style[] = 'mt_title_style_2';
					return $title_style;
				} else  {
					$title_style[] = 'mt_title_style_2';
					return $title_style;
				}
			} else {
				$title_style[] = 'mt_title_style_2';
				return $title_style;
			}
		
		}
}

add_filter('body_class','title_styler');


function mt_content_padding($mt_content_padding) {

	global $post;	
		
		if(get_post_meta(get_the_ID(), "mt_paddings_on", true)=="no") {
			$mt_content_padding[] = 'mt-padding-off';
			return $mt_content_padding;
		} else {
			$mt_content_padding[] = 'mt-padding-on';
			return $mt_content_padding;
		}  
		

}
add_filter('body_class','mt_content_padding');


function mt_content_margin($mt_content_margin) {

	global $post;	
		
		if(get_post_meta(get_the_ID(), "mt_margin_on", true)=="yes") {
			$mt_content_margin[] = 'mt-margin-on';
			return $mt_content_margin;
		} else {
			$mt_content_margin[] = 'mt-margin-off';
			return $mt_content_margin;
		}  
		

}
add_filter('body_class','mt_content_margin');



function mt_menu_fixed($mt_menu_fixed) {

	global $post;	
	
	$mt_options = get_option("themename_theme_options");
		
	if(get_post_meta(get_the_ID(), "mt_menu_fix", true)!="" and get_post_meta($post->ID, "mt_menu_fix", true)!="style_default") {
	
		if(get_post_meta(get_the_ID(), "mt_menu_fix", true)=="yes") {
			$mt_menu_fixed[] = 'mt-fixed';
			return $mt_menu_fixed;
		} else {
			$mt_menu_fixed[] = 'mt-fixed-no';
			return $mt_menu_fixed;
		}  
		
		
	} else {
		
		if(isset($mt_options['title_style'])){
			if($mt_options['mt_menu_fix']=="1") {
				$mt_menu_fixed[] = 'mt-fixed';
				return $mt_menu_fixed;
			}  else { 
				$mt_menu_fixed[] = 'mt-fixed-no'; 
				return $mt_menu_fixed;
			}
		} else {
			$mt_menu_fixed[] = 'mt-fixed-no'; 
			return $mt_menu_fixed;
		}
	}

}
add_filter('body_class','mt_menu_fixed');

/*-----------------------------------------------------------------------------------*/
/* Footer Hook
/*-----------------------------------------------------------------------------------*/

function jquery_plugins_footer() {

        
        echo balanceTags(ot_get_option('mt_custom_html'));
      
    
}
add_action('wp_footer', 'jquery_plugins_footer');
?>