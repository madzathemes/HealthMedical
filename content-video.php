<?php

 global $more, $post;    // Declare global $more (before the loop).
$more = 0;       // Set (inside the loop) to display content above the more tag.

if(is_single()) { $more = 1; } ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		
		<?php if (!is_single()){?>	
			<header class="entry-header">
				<i class="ti-video-clapper mt-blog-icon"></i>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<?php if(ot_get_option("blog_meta_on")!="off") {  twentytwelve_entry_meta(); } ?>
			</header>						
		<?php } ?>
			
				<div  class="entry-content">
					<?php if(!is_single()) { 
						
						if(ot_get_option("blog_content_type")=="full_content") { the_content( __( '', 'madza_translate' ) ); } else { the_excerpt(); }
						
					} else { 
					
						the_content( __( '', 'madza_translate' ) ); 
						
					}  ?>
				</div><!-- .entry-content -->
				

				
		<footer class="entry-meta">
			<?php  			
			if(!is_single()) { echo "<a href='".get_permalink()."' class='more-link'><span>"; _e( 'Read more', 'twentytwelve' );  echo "</span></a><div class='clear'></div>"; }
			
			 ?>			
			 	
		</footer><!-- .entry-meta -->
	<div class="mt-space-icon"><i class="ti-line-dashed"> </i></div>
</article><!-- #post -->
