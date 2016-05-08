<?php
/**
 * @author madars.bitenieks
 * @copyright 2013
 */

get_header(); 

global $post, $col_4, $col_8;
$exclude_single_id = get_the_ID(); 
$src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array( 999,999 ), false, '' );
$mt_portfolio_slider_height = get_post_meta(get_the_ID(), "mt_portfolio_slider_height", true); 
$mt_fields = get_post_meta(get_the_ID(),'mb_portfolio_fields', true);
$slides = get_post_meta(get_the_ID(),'mb_portfolio_slider', true);
$mt_layout = get_post_meta(get_the_ID(), "layout_positions", true);
$mt_doctor_image = get_post_meta(get_the_ID(), "mt_doctor_image_size", true);

$mt_float_layout = "";
$mt_float_sidebar = "";
	
if ($mt_layout == "left") {

	$mt_float_layout = "floatright";
	$mt_float_sidebar = "floatleft";
}

$mt_image_width = "960";

if($mt_layout != "full" ) { $mt_image_width = "620"; }
if($mt_doctor_image == "small" ) { $mt_image_width = "555"; }


?>
<div class="row">
<div class="mt-staff-div">
	<div class="col-md-6">
		
		<header>
			<div class="">
			
					<?php 
					
					if(has_post_thumbnail()) { 
						
						echo get_the_post_thumbnail( get_the_ID(), array(555, $mt_portfolio_slider_height, 'bfi_thumb' => true), $src[0] );
					
					} 
					
					?>
							
						<?php if($comment=='Yes'){ comments_template( '', true );  }?>
				
			</div>
		</header>
	</div>

	<div class="col-md-6 mt-staff-content">
		<div class="mt-social-icon-single">
		<?php 
			if(get_post_meta(get_the_ID(), 'mt_doctor_twitter', true)!=""){ ?><a class="mt-cpt-social" href="<?php echo get_post_meta(get_the_ID(), 'mt_doctor_twitter', true); ?>"><i class="mt-staff-icon fa fa-twitter"></i></a> <?php }
			if(get_post_meta(get_the_ID(), 'mt_doctor_facebook', true)!=""){ ?> <a class="mt-cpt-social" href="'.get_post_meta(get_the_ID(), 'mt_doctor_facebook', true).'"><i class="mt-staff-icon fa fa-facebook"></i></a> <?php }
			if(get_post_meta(get_the_ID(), 'mt_doctor_google', true)!=""){ ?> <a class="mt-cpt-social" href="'.get_post_meta(get_the_ID(), 'mt_doctor_google', true).'"><i class="mt-staff-icon fa fa-google-plus"></i></a> <?php }
			if(get_post_meta(get_the_ID(), 'mt_doctor_linked', true)!=""){ ?><a class="mt-cpt-social" href="'.get_post_meta(get_the_ID(), 'mt_doctor_linked', true).'"><i class="mt-staff-icon fa fa-linkedin"></i></a> <?php }
		?>
		</div>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php  the_content(); ?>
		<?php endwhile;  wp_reset_query(); ?>

	</div>
	<div class="clear"></div>
</div>

</div>
<!--<div class="row">	
	<div class="col-md-12">
		<?php get_sidebar(); ?>
		
	</div>
</div>-->     
<?php get_footer(); ?>