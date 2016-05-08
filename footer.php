
<div class="clear"></div>
</div>
</div>



<?php 

global $col_6, $post;

$page_sections = "";

$page_sections = get_post_meta(get_the_ID(), "mb_page_sections_in", true); 


if($page_sections!="") { 

	foreach($page_sections as $page_section){
		
		if($page_section['section']!="") {
			
			$args = array( 'post_type' => 'mt_section', 'p' => $page_section['section'] );
			
			$query = new WP_Query( $args );
			
			while ( $query->have_posts() ) : $query->the_post();
				
				global $post;
				 
				$class = ""; if(get_post_meta(get_the_ID(), "mt_class", true)!="") { $class = get_post_meta(get_the_ID(), "mt_class", true); } 
				 
				 ?><section data-type="background"  data-speed="<?php if(get_post_meta(get_the_ID(), "mt_paralex_speed", true)!="" and get_post_meta(get_the_ID(), "mt_paralex_speed_on", true)!="no"){ echo esc_attr(get_post_meta(get_the_ID(), "mt_paralex_speed", true)); }?>" class="mt-boxed-version mt-style-<?php echo esc_attr(get_the_ID()); ?> <?php echo esc_attr($class); ?>" ><div class="mt-section-bg mt-section-bg-<?php echo esc_attr(get_the_ID()); ?>"></div><div class="container"><div class="row"><div class="col-md-12"><?php the_content(); ?></div></div></div></section><?php
			
			endwhile;  wp_reset_query(); 
			
		}
		
	}

} 


$args = array( 'post_type' => 'mt_section', 'posts_per_page' => 999  );
			
$query = new WP_Query( $args );
			
while ( $query->have_posts() ) : $query->the_post();
				
	global $post;
	
	$in_all_page = get_post_meta(get_the_ID(), "mt_in_all_pages", true);
	
	if($in_all_page=="yes") {
		
		$class = ""; if(get_post_meta(get_the_ID(), "mt_class", true)!="") { $class = get_post_meta(get_the_ID(), "mt_class", true); } 
		 
		?><section data-type="background"  data-speed="<?php if(get_post_meta(get_the_ID(), "mt_paralex_speed", true)!="" and get_post_meta(get_the_ID(), "mt_paralex_speed_on", true)!="no"){ echo esc_attr(get_post_meta(get_the_ID(), "mt_paralex_speed", true)); }?>" class="mt-boxed-version mt-style-<?php echo esc_attr(get_the_ID()); ?> <?php echo esc_attr($class); ?>" ><div class="mt-section-bg mt-section-bg-<?php echo esc_attr(get_the_ID()); ?>"></div><div class="container"><div class="row"><div class="col-md-12"><?php the_content(); ?></div></div></div></section><?php	
	}		
		 
endwhile;  wp_reset_query(); 

?>



<?php 

$mt_homepage_bg_p_image = get_option("themename_theme_options");

if(isset($mt_homepage_bg_p_image['footer_top']) or isset($mt_homepage_bg_p_image['footer_bottom'])){ if  ($mt_homepage_bg_p_image['footer_top'] == '1' or $mt_homepage_bg_p_image['footer_bottom'] == '1' ) { ?>

<footer id="footer">
   
    <div class="mt-footer-1"><?php if ($mt_homepage_bg_p_image['footer_top'] != '0') { function_footer_widget_areas(); } ?></div>
    <div class="mt-footer-2">
    <?php if  ($mt_homepage_bg_p_image['footer_bottom'] != '0') { ?>
	
	<div class="mt-scroll-top"><i class="ti-angle-double-up"></i><p><?php printf( __( 'SCROLL TO TOP', "madza_translate"  ) ); ?></p></div>
	<div class="container">
 		<div class="row" id="sub-footer">
			
			<div id="footer-left" class="col-md-6 <?php echo esc_attr($col_6); ?>">
			
		        <div><p><?php if($mt_homepage_bg_p_image['copyright_text']!="") { echo balanceTags($mt_homepage_bg_p_image['copyright_text']); } else { echo "Copyright 2013. Powered by WordPress Theme. By M.Bitenieks"; } ?></p></div> 
		        
		    </div>    
		    
		    <div id="footer-right" class="col-md-6 <?php echo esc_attr($col_6); ?>">
		    
		        <div id="button-nav"><?php wp_nav_menu( array('theme_location'  => "footer_menu", 'container' =>false, 'fallback_cb' => false, 'menu_class' => 'bottom-menu', 'menu_id' => 'menu_footer','echo' => true, 'before' => '','after' => '', 'link_before' => '','link_after' => '', 'depth' => 1));  ?></div>

		        
		    </div> 
 		</div>    
		        
		    <?php if  (ot_get_option('bottom_footer_html')) { ?>
		    <div class="row">       
		        <div class="col-md-12 footer_widget_midle"> <?php $mt_options_5 =  balanceTags(of_get_option('bottom_footer_html')); echo sprintf( __('%s', 'madza_footer_copyright_translates'), $mt_options_5 ); ?>  </div>
		    </div>        
		    <?php } ?>
		
	</div>
	
	<?php } ?>   
    </div>
</footer>    
   
<?php } } ?>


<?php wp_footer(); ?>

</body>

</html>