<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 oldie no-js"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9 no-js"> <![endif]-->
<html <?php language_attributes(); ?>>
<head class="animated">    
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php global $page, $post, $paged, $col_4, $col_8, $mt_options;	?>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <?php wp_enqueue_script('html5shiv', get_template_directory_uri() . '/functions/js/html5shiv.js', array('jquery'), '1.0', true); ?>
  <?php wp_enqueue_script('respondmin', get_template_directory_uri() . '/functions/js/respond.min.js', array('jquery'), '1.0', true); ?>
<![endif]-->
<?php wp_head(); ?> 
</head>
<body <?php body_class(); ?> ><?php
$title = esc_attr(get_post_meta(get_the_ID(), "m_title_on", true));
$_bacground_image_page = get_post_meta(get_the_ID(), "m_page_background", true); 
$breadcrumbs = esc_attr(get_post_meta(get_the_ID(), "m_title_bred", true));
$mt_options = get_option("themename_theme_options");
$mt_mobile = "hidden-lg hidden-md";
$mt_destop = "hidden-sm hidden-xs";
$mt_options = get_option("themename_theme_options");

/*-----------------------------------------------------------------------------------*/
/*	Background Image
/*-----------------------------------------------------------------------------------*/
$_background_exist_r = "no";
if ( ! empty( $_bacground_image_page )) {

	if ( $_bacground_image_page['background-image'] !="") { if ( $_bacground_image_page['background-repeat'] =="" ) { $_background_exist_r = "yes"; } }
}

$mt_homepage_bg_p_image = get_option("themename_theme_options");

if ( ! empty( $_bacground_image_page )) {

	if ( $_background_exist_r == "yes" and $_bacground_image_page['background-image']!="") {   

		?><img id="background" src="<?php echo esc_url($_bacground_image_page['background-image']); ?>" alt=""  /><?php 

	}
} 

if($_background_exist_r =="no") {	
	if(isset($mt_homepage_bg_p_image['background_repeat'])){
		if ( ! empty( $mt_homepage_bg_p_image )) { 
					if($mt_homepage_bg_p_image['background_repeat']=="full") { 
						?><img id="background" src="<?php echo esc_url($mt_homepage_bg_p_image['image_upload_test']); ?>" alt=""  /><?php 
			
					}
		 	}
	}	 	
}

/*-----------------------------------------------------------------------------------*/
/*	Subtitle Function
/*-----------------------------------------------------------------------------------*/
function mtf_subtitle(){
	?><div class="col-md-12"><div class="mt-subtitle"><h4><?php echo esc_textarea(get_post_meta(get_the_ID(), "mt_subtitle", true));  ?></h4></div></div><?php
}	

/*-----------------------------------------------------------------------------------*/
/*	Logo function
/*-----------------------------------------------------------------------------------*/
function mt_logo() {
	
	global $mt_options;
	
	if($mt_options['mt_logo']!="") { $logo_image = $mt_options['mt_logo']; } else { $logo_image = get_template_directory_uri()."/images/logo.png";  }
	
	?>
	<a class="logo hidden-sm hidden-xs" style="margin-top:<?php if($mt_options['mt_logo_t']!="") { echo esc_attr($mt_options['mt_logo_t']); } else { echo "0"; } ?>px; margin-bottom:<?php if($mt_options['mt_logo_b']!="") { echo esc_attr($mt_options['mt_logo_b']); } else { echo "0"; } ?>px"  href="<?php echo home_url();?>">
	
		<img width="<?php if($mt_options['mt_logo_w']!="") { echo esc_attr($mt_options['mt_logo_w']); } else { echo "171"; } ?>" height="<?php if($mt_options['mt_logo_h']!="") { echo esc_attr($mt_options['mt_logo_h']); } else { echo "70"; } ?>" src="<?php echo esc_url($logo_image); ?>"  alt="<?php bloginfo('name'); ?>" />
		
	</a>
	
	
	<?php
}
add_filter('mt_logo','mt_logo');

function mt_logo_r() {
	
	global $mt_options;

	if($mt_options['mt_logo_r']!="") { $logo_image_responsive = $mt_options['mt_logo_r']; } else { $logo_image_responsive = get_template_directory_uri()."/images/logo.png";  } ?>
	
	<a class="logo_responsive hidden-lg hidden-md " style="margin-top:<?php if($mt_options['mt_logo_t']!="") { echo esc_attr($mt_options['mt_logo_t']); } else { echo "0"; } ?>px; margin-bottom:<?php if($mt_options['mt_logo_b']!="") { echo esc_attr($mt_options['mt_logo_b']); } else { echo "0"; } ?>px" href="<?php echo esc_url(home_url());?>">
	
		<img  width="<?php if($mt_options['mt_logo_w']!="") { echo esc_attr($mt_options['mt_logo_w']); } else { echo "171"; } ?>" height="<?php if($mt_options['mt_logo_h']!="") { echo esc_attr($mt_options['mt_logo_h']); } else { echo "70"; } ?>" src="<?php echo esc_url($logo_image_responsive); ?>" alt="<?php bloginfo('name'); ?>" />
		
	</a>
	<?php
}
add_filter('mt_logo_r','mt_logo_r');

/*-----------------------------------------------------------------------------------*/
/*	Menu Function
/*-----------------------------------------------------------------------------------*/
function mt_menu() {
	wp_nav_menu( array('theme_location'=>"primary",  'menu_class' => 'sf-menu',  'menu_id' => 'menu', 'echo' => true, 'depth' => 0)); 
  
}
add_filter('mt_menu','mt_menu');
?>
<?php if(get_post_meta(get_the_ID(), "mt_menu_fix", true)=="yes" or $mt_options['mt_menu_fix']=="1"){ ?>
<div class="mt-fixed-header <?php echo esc_attr($mt_destop); ?>">
		
	<div class="container">
	
		<div class="row">
		
	    	<div class="col-md-12">
	    	
	    	<?php mt_logo(); ?>
	    	
	    		<div> <?php mt_menu(); ?></div>	
	    		
		    </div>
		     
	    </div>
	    
    </div>
		    
</div>
<?php } ?>
<?php  $mt_title_customize = get_option("themename_theme_options"); ?> 

<div class="mt-menu-frame">
	<div class="container">
		<div class="row">
		
	    	<div class="col-md-12">
	    	
	    		<div class="mt-menu">
	    		
		    		<?php mt_logo(); ?>
		    		<?php mt_logo_r(); ?>
		    		
		    		<div id="nav"><?php mt_menu(); ?></div>
		    		
		    		<div class="clear"></div>	
		    		
	    		</div>
	    		
		    </div>
		    
		 </div>
	    
	</div>
</div>

<div id="header-title"> 
	
<?php if($mt_title_customize['image_upload_test_title2']!=""){ ?>	
<div class="ss-slides">
    <div class="ss-slide">
        <img src="<?php echo esc_url($mt_title_customize['image_upload_test_title']); ?>" alt="" />
    </div>
    <div class="ss-slide">
        <img src="<?php echo esc_url($mt_title_customize['image_upload_test_title2']); ?>" alt="" />
    </div>
</div>
<?php } ?>

<?php 
if(isset($mt_options['mt_header_ep'])){
	if($mt_options['mt_header_ep']=="1") { ?>
	<div class="mt-social-frame  hidden-sm hidden-xs">
		<div class="container">
			<div class="row">
			 
			 	<div class="col-md-12"> 
			 
			 		<ul class="mt-social"> <?php
						$mt_options = get_option("themename_theme_options");
						if($mt_options['mt_icon_twitter']!="") {?><li><a href="<?php echo esc_url($mt_options['mt_icon_twitter']); ?>"><i class="fa fa-twitter"></i></a></li><?php }
						if($mt_options['mt_icon_facebook']!="") {?><li><a href="<?php echo esc_url($mt_options['mt_icon_facebook']); ?>" ><i class="fa fa-facebook"></i></a></li><?php }
						if($mt_options['mt_icon_intagram']!="") {?><li><a href="<?php echo esc_url($mt_options['mt_icon_intagram']); ?>" ><i class="fa fa-instagram"></i></a></li><?php }
						if($mt_options['mt_icon_vimeo']!="") {?><li><a href="<?php echo esc_url($mt_options['mt_icon_vimeo']); ?>"><i class="fa fa-vimeo-square"></i></a></li><?php }
						if($mt_options['mt_icon_youtube']!="") {?><li><a href="<?php echo esc_url($mt_options['mt_icon_youtube']); ?>"><i class="fa fa-youtube"></i></a></li><?php }
						if($mt_options['mt_icon_linkedin']!="") {?><li><a href="<?php echo esc_url($mt_options['mt_icon_linkedin']); ?>"><i class="fa fa-linkedin"></i></a></li><?php }
						if($mt_options['mt_icon_gplus']!="") {?><li><a href="<?php echo esc_url($mt_options['mt_icon_gplus']); ?>"><i class="fa fa-google-plus"></i></a></li><?php }
						if($mt_options['mt_icon_dribble']!="") {?><li><a href="<?php echo esc_url($mt_options['mt_icon_dribble']); ?>"><i class="fa fa-dribbble"></i></a></li><?php }
						if($mt_options['mt_icon_skype']!="") {?><li><a href="<?php echo esc_url($mt_options['mt_icon_skype']); ?>"><i class="fa fa-skype"></i></a></li><?php }
						if($mt_options['mt_icon_pinterest']!="") {?><li><a href="<?php echo esc_url($mt_options['mt_icon_pinterest']); ?>"><i class="fa fa-pinterest"></i></a></li><?php }
						if($mt_options['mt_icon_rss']!="") {?><li><a href="<?php echo esc_url($mt_options['mt_icon_rss']); ?>"><i class="fa fa-rss"></i></a></li><?php }
						?> 
					</ul>
					<div class="mt_menu_description">
			 			<p>
			 				 <?php $mt_options_4 = balanceTags($mt_options['mt_header_phone']); echo sprintf( __('%s', 'madza_header_phone_translates'), $mt_options_4 ); ?>
			 			</p>
			 		</div>
		    	</div>
			</div>
		</div> 
	</div><?php 
	
	} 
}

?>

<header id="header">

	<div class="container">
	
		<?php $mt_options = get_option("themename_theme_options");  if(is_front_page() and $mt_options['mt_header_column_on']=="1" or get_post_meta(get_the_ID(), "mt_header_column", true)=="1") {  ?>
	    <div class="row mt-boxy">
	    
	    	<div class="col-md-12">
	    			<div class="col-md-<?php if ($mt_options['mt_header_column_style']=="mt_column_style_1") { ?>4<?php } else { ?>6<?php } ?> mt-boxy-1">
	    				<div class="mt-boxy-color"></div>
		    			<div class="mt-boxy-info">
			    			<?php $mt_options_1 = balanceTags($mt_options['mt_header_column_text_1']); echo sprintf( __('%s', 'madza_header_1_translates'), $mt_options_1 ); ?>
		    			</div>
	    			</div>
					<div class="col-md-<?php if ($mt_options['mt_header_column_style']=="mt_column_style_1") { ?>4<?php } else { ?>6<?php } ?> mt-boxy-2">
						<div class="mt-boxy-color"></div>
						<div class="mt-boxy-info">
			    			<?php $mt_options_2 = balanceTags($mt_options['mt_header_column_text_2']); echo sprintf( __('%s', 'madza_header_2_translates'), $mt_options_2 ); ?>
		    			</div>
					</div>
					<?php if ($mt_options['mt_header_column_style']=="mt_column_style_1") { ?>
						<div class="col-md-4 mt-boxy-3">
							<div class="mt-boxy-color"></div>
							<div class="mt-boxy-info">
				    			<?php $mt_options_3 = balanceTags($mt_options['mt_header_column_text_3']); echo sprintf( __('%s', 'madza_header_3_translates'), $mt_options_3 ); ?>
				    		</div>
						</div>
					<?php } ?>
	    	</div>
	    	
	    </div>
	    <?php } ?>
    </div>
    
</header><?php
	
/*-----------------------------------------------------------------------------------*/
/*	Slider
/*-----------------------------------------------------------------------------------*/
if(get_post_meta(get_the_ID(), "mt_page_slider_type", true)=="shortcode_slider"){ 
    
		echo '<div id="mt-slider-frame-2">';  echo balanceTags(do_shortcode(get_post_meta(get_the_ID(), "mt_page_slider_shortcode", true)));  echo "</div>"; 

}

/*-----------------------------------------------------------------------------------*/
/*	Title
/*-----------------------------------------------------------------------------------*/
if ( $title=="on" or $title==""  ) { ?>
	
	<div class="mt-shadow">
		<div class="container"> 
			<div class="row  mt-title wpb_animate_when_almost_visible wpb_top-to-bottom wpb_start_animation">
				
					<?php  if (is_singular("portfolio") or is_singular('causes') or is_singular('our-services') or is_singular("tribe_events")) {  ?>
					
						<div class="col-md-8 <?php echo esc_attr($col_8); ?>"><h1><?php the_title(); ?></h1></div>
						<?php mtf_subtitle(); ?>
						<div class="col-md-4 <?php echo esc_attr($col_4); ?>"><?php previous_post_link('%link','<div id="single-button-left"  class="fa fa-angle-left"></div>');   next_post_link('%link','<div id="single-button-right"  class="fa fa-angle-right"></div>');  ?></div>
						
					   	               	
					<?php } else if (is_singular('our-staff')) {  ?>
					
						<div class="col-md-8 <?php echo esc_attr($col_8); ?>"><h1><?php the_title(); ?></h1></div>
						<?php mtf_subtitle(); ?>
						<div class="col-md-4 <?php echo esc_attr($col_4); ?>"><?php echo '<h2>'. get_post_meta(get_the_ID(),'mt_doctor_education', true). '</h2>';  ?></div>
						
					   	               	
					<?php } else if (is_single()){ ?>
						
						<?php if(function_exists( 'is_woocommerce' )) { ?>
						
							 <?php if (is_woocommerce() and is_product_category()) { ?>
					
									<div class="col-md-8 <?php echo esc_attr($col_8); ?>"><h1><?php single_cat_title( $prefix = '', $display = true ); ?></h1></div>
									<?php mtf_subtitle(); ?>
									<div class="col-md-4 <?php echo esc_attr($col_4); ?>"><?php woocommerce_breadcrumb(); ?></div>
								
								<?php } else if (is_woocommerce()) { ?>
								
									<div class="col-md-8 <?php echo esc_attr($col_8); ?>"><h1><?php the_title(); ?></h1></div>
									<?php mtf_subtitle(); ?>
									<div class="col-md-4 <?php echo esc_attr($col_4); ?>"><?php woocommerce_breadcrumb(); ?></div>
								
								<?php } else { ?>
								
										<div class="col-md-8 <?php echo esc_attr($col_8); ?>"><h1><?php the_title(); ?></h1><?php if(ot_get_option("blog_meta_on")!="off") {  twentytwelve_entry_meta(); } ?></div>
										<?php mtf_subtitle(); ?>
										<div class="col-md-4 <?php echo esc_attr($col_4); ?>"><?php previous_post_link('%link','<div id="single-button-left"  class="fa fa-angle-left"></div>');   next_post_link('%link','<div id="single-button-right"  class="fa fa-angle-right"></div>');  ?></div>
										
								<?php } ?>
								
						<?php } else { ?> 
						
							<div class="col-md-8 <?php echo esc_attr($col_8); ?>"><h1><?php the_title(); ?></h1><?php if(ot_get_option("blog_meta_on")!="off") {  twentytwelve_entry_meta(); } ?></div>
							<?php mtf_subtitle(); ?>
							<div class="col-md-4 <?php echo esc_attr($col_4); ?>"><?php previous_post_link('%link','<div id="single-button-left"  class="fa fa-angle-left"></div>');   next_post_link('%link','<div id="single-button-right"  class="fa fa-angle-right"></div>');  ?></div>
							
							
					
						<?php } ?>
					
					<?php } else if (is_search()){ ?> 
						
						<div class="col-md-8 <?php echo esc_attr($col_8); ?>"><h1><?php printf( __( 'Search Results for: %s', "madza_translate"  ), '' . get_search_query() . '' ); ?></h1></div>
						<?php mtf_subtitle(); ?>
						<div class="col-md-4 <?php echo esc_attr($col_4); ?>"></div>
					    
					<?php } else if (is_404()){ ?> 
					
					    <div class="col-md-8 <?php echo esc_attr($col_8); ?>"><h1><?php printf( __( '404 page', "madza_translate"  ) ); ?></h1></div>
					    <?php mtf_subtitle(); ?>
					    <div class="col-md-4 <?php echo esc_attr($col_4); ?>"></div>
					    
					<?php } else if (is_category()){ ?> 
						
						<div class="col-md-8 <?php echo esc_attr($col_8); ?>"><h1><?php single_cat_title( $prefix = '', $display = true ); ?></h1></div>
						<?php mtf_subtitle(); ?>
						<div class="col-md-4 <?php echo esc_attr($col_4); ?>"><?php if ( $mt_options['mt_breadcrumb']=="1" AND $breadcrumbs == "on"){  dimox_breadcrumbs(); } ?></div>
					                   
					<?php } else if (is_tag()){ ?> 
						
						<div class="col-md-8 <?php echo esc_attr($col_8); ?>"><h1><?php single_cat_title( $prefix = '', $display = true ); ?></h1></div>
						<?php mtf_subtitle(); ?>
						<div class="col-md-4 <?php echo esc_attr($col_4); ?>"><?php if ( $mt_options['mt_breadcrumb']=="1" AND $breadcrumbs == "on"){  dimox_breadcrumbs(); } ?></div>
						
					                   
					<?php } else { ?> 
					
						<?php if(function_exists( 'tribe_is_event' )) { ?>
						
								<?php if (tribe_is_event() && !tribe_is_day() && !is_single()) { ?>
								
										<div class="col-md-8 <?php echo esc_attr($col_8); ?>"><h1><?php printf( __( 'Events', "madza_translate"  ) ); ?></h1></div>
										<?php mtf_subtitle(); ?>
										<div class="col-md-4 <?php echo esc_attr($col_4); ?>"><?php if ( $mt_options['mt_breadcrumb']=="1" AND $breadcrumbs == "on"){  dimox_breadcrumbs(); } ?></div>
										
								<?php } else { ?>
								
									<div class="col-md-<?php if ( $mt_options['mt_breadcrumb']!="1" AND $breadcrumbs != "on"){ echo "12"; } else { echo "8"; }?> <?php echo esc_attr($col_8); ?>"><h1><?php the_title(); ?></h1></div>
									<?php mtf_subtitle(); ?>
									<?php if ( $mt_options['mt_breadcrumb']=="1" AND $breadcrumbs == "on"){ ?><div class="col-md-4 <?php echo esc_attr($col_4); ?>"><?php  dimox_breadcrumbs(); ?></div><?php } ?> 
										
								<?php } ?>
								
						<?php } else if(function_exists( 'is_woocommerce' )) { ?>
						
							<?php if (is_woocommerce() and is_product_category()) { ?>
					
									<div class="col-md-8 <?php echo esc_attr($col_8); ?>"><h1><?php single_cat_title( $prefix = '', $display = true ); ?></h1></div>
									<?php mtf_subtitle(); ?>
									<div class="col-md-4 <?php echo esc_attr($col_4); ?>"><?php woocommerce_breadcrumb(); ?></div>
								
								<?php } else if (is_woocommerce()) { ?>
								
									<div class="col-md-8 <?php echo esc_attr($col_8); ?>"><h1><?php  if(is_shop()) {  printf( __( 'Shop', "madza_translate"  ) ); } else {  the_title(); } ?></h1></div>
									<?php mtf_subtitle(); ?>
									<div class="col-md-4 <?php echo esc_attr($col_4); ?>"><?php woocommerce_breadcrumb(); ?></div>
								
								<?php } else { ?>
								
									<div class="col-md-<?php if ( $mt_options['mt_breadcrumb']!="1" AND $breadcrumbs != "on"){ echo "12"; } else { echo "8"; }?> <?php echo  esc_attr($col_8); ?>"><h1><?php the_title(); ?></h1></div>
									<?php mtf_subtitle(); ?>
									<?php if ( $mt_options['mt_breadcrumb']=="1" AND $breadcrumbs == "on"){ ?><div class="col-md-4 <?php $col_4; ?>"><?php  dimox_breadcrumbs(); ?></div><?php } ?>
										
								<?php } ?> 
								
						<?php } else { ?>
						
							<div class="col-md-<?php if ( $mt_options['mt_breadcrumb']!="1" AND $breadcrumbs != "on"){ echo "12"; } else { echo "8"; }?> <?php echo  esc_attr($col_8); ?>"><h1><?php the_title(); ?></h1></div>
							
							<?php mtf_subtitle(); ?>
							
							<?php if(isset($mt_options['mt_breadcrumb'])){if ( $mt_options['mt_breadcrumb']=="1" AND $breadcrumbs == "on"){ ?><div class="col-md-4 <?php echo esc_attr($col_4); ?>"><?php  dimox_breadcrumbs(); ?></div><?php } }?>
						
						<?php } ?>
					<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
	
<img class="mt-ti" src="<?php echo get_template_directory_uri(); ?>/images/mt-ti-white.png" alt="" >
</div>  

<div id="mb-content"> <div class="container<?php if(is_singular('mt_section')){ echo "-off"; } ?> mt-single-effect">