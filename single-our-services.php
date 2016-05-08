<?php
/**
 * @author madars.bitenieks
 * @copyright 2013
 */

get_header(); 

global $post, $col_4, $col_8;

$src = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), array( 999,999 ), false, '' );
$mt_portfolio_slider_height = get_post_meta(get_the_ID(), "mt_portfolio_slider_height", true); 
$mt_fields = get_post_meta(get_the_ID(),'mb_portfolio_fields', true);
$slides = get_post_meta(get_the_ID(),'mb_portfolio_slider', true);
$mt_layout = get_post_meta(get_the_ID(), "layout_positions", true);

$mt_float_layout = "";
$mt_float_sidebar = "";
	
if ($mt_layout == "left") {

	$mt_float_layout = "floatright";
	$mt_float_sidebar = "floatleft";
}

?>
<div class="row">

	<div class="col-md-4">
		
		<header>
			<div class="entry-page-image">
			
					<?php 
					
					if(has_post_thumbnail()) { 
						
						echo get_the_post_thumbnail( get_the_ID(), array('360', $mt_portfolio_slider_height, 'bfi_thumb' => true), $src[0] );
					
					} 
					
					?>
							
						<?php if($comment=='Yes'){ comments_template( '', true );  }?>
				
			</div>
		</header>
	</div>
<div
	<div class="col-md-8">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php  the_content(); ?>
		<?php endwhile;  wp_reset_query(); ?>

	</div>
</div>
<div class="row">	
	<div class="col-md-12 mt-full-sidebar">
		<?php get_sidebar(); ?>
		
	</div>
</div>       
<?php get_footer(); ?>