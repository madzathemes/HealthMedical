<?php
/**
 * @author madars.bitenieks
 * @copyright 2012
 */

get_header(); 
global $col_4, $col_8;

?>
<div class="row">
<div class="col-md-8 <?php echo esc_attr($col_8); ?> floatleft">
										<?php if ( have_posts() ) : ?>
								
												
												<?php /* Start the Loop */ ?>
												<?php while ( have_posts() ) : the_post(); ?>
													<?php get_template_part( 'content', get_post_format() ); ?>
												<?php endwhile; ?>
												
												<?php twentytwelve_content_nav( 'nav-below' ); ?>
										<?php else : ?>
														<div id="post-0" class="post no-results not-found">
															<h2 class="entry-title"><?php _e( 'Nothing Found', "madza_translate"  ); ?></h2>
															<div class="entry-content">
																<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', "madza_translate"  ); ?></p>
															
															</div>
														</div>
										<?php endif; wp_reset_query();
?></div>

<div class="col-md-4 <?php echo esc_attr($col_4); ?>floatright">
	<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>
