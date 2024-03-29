<?php get_header(); 
	
global $col_4, $col_8;
	
?>

<div class="row">

	<div class="col-md-<?php if ($mt_layout != "full") { echo "8 "; echo esc_attr($col_8); } else {  echo "12 "; } echo esc_attr($mt_float_layout); ?> ">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); 
					
					 get_template_part( 'content', get_post_format() ); 
					
				 endwhile; ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'madza_translate' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'madza_translate' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>


	</div>
	
	<?php if ($mt_layout != "full") { ?>
		
		<div class="col-md-4 <?php echo esc_attr($col_4); ?> <?php echo esc_attr($mt_float_sidebar); ?> "><?php get_sidebar(); ?></div>
	
	<?php } ?>
			
</div>

<?php get_footer(); ?>
