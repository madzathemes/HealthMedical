<?php

global $more, $post;    // Declare global $more (before the loop).
$more = 0;       // Set (inside the loop) to display content above the more tag.

if(is_single()) { $more = 1; }?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
			<?php if (!is_single()){?>	
				<i class="ti-gallery mt-blog-icon"></i>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<?php if(ot_get_option("blog_meta_on")!="off") {  twentytwelve_entry_meta(); } ?>
			<?php } ?>
		</header>	
			<div class="entry-page-image">
				<div class="flexslider mt<?php echo esc_attr($post->ID); ?>"> 
					<ul class="slides">	<?php 
						global $post;	$object_x2 = get_post_meta($post->ID, "mb_portfolio_slider", true);
						
						$object_x2 = get_post_meta($post->ID, "mb_portfolio_slider", true);
							
						if ( get_post_meta($post->ID, "mt_portfolio_slider_height2", true)!="") { $height = get_post_meta($post->ID, "mt_portfolio_slider_height2", true); } else { $height = "auto"; }  	
						
						if ( ! empty( $object_x2 )) {
						foreach( $object_x2 as $slide ) {
										
														if($slide['slider_image']!=""){	
														?>
															<li><img src="<?php 
															echo esc_url(bfi_thumb( $slide['slider_image'], array('width' => 750, 'height' => $height) ));
															?>" /></li>
														<?php
														} 
														?>													            
									
						<?php } } ?>			
					</ul>
				</div>
		
				<script type="text/javascript">
					jQuery(window).load(function() {
			              jQuery('.mt<?php echo esc_attr($post->ID); ?>').flexslider({
			                animation: "slide",
			                 smoothHeight: true			              });
			            });
				</script>
			</div>				
				<div class="entry-content">
					<?php if( ! is_single()) { 
				
				if(ot_get_option("blog_content_type")=="full_content") { the_content( __( '', 'madza_translate' ) ); } else { the_excerpt(); }
				
			} else { 
			
				the_content( __( '', 'madza_translate' ) ); 
				
			}  ?>
				</div><!-- .entry-content -->
			
		<footer class="entry-meta">
			<?php if(!is_single()) { echo "<a href='".get_permalink()."' class='more-link'><span>"; _e( 'Read more', 'twentytwelve' );  echo "</span></a><div class='clear'></div>"; }
			  ?>		
			  
		</footer><!-- .entry-meta -->
		<div class="mt-space-icon"><i class="ti-line-dashed"> </i></div>
</article><!-- #post -->
