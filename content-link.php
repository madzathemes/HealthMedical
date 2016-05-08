<?php

 global $post;
 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class();  ?>>
	<header class="entry-header">
		<i class="ti-link mt-blog-icon"></i>
		<h1 class="entry-title">
			<a href="<?php echo esc_url(get_post_meta($post->ID, "mt_portfolio_format_link_url", true)); ?>"><?php the_title(); ?></a>
		</h1>
	</header>
	<?php if (is_single()) { ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'madza_translate' ) ); ?>
	</div><!-- .entry-content -->
	<?php } ?>
	<footer class="entry-meta">
		<a class="mt_format_link" href="<?php echo esc_url(get_post_meta($post->ID, "mt_portfolio_format_link_url", true)); ?>">
			<?php echo esc_url(get_post_meta($post->ID, "mt_portfolio_format_link_url", true)); ?>
		</a>
		<?php edit_post_link( __( 'Edit', 'madza_translate' ), ' l <span class="edit-link">', '</span>' ); ?>	
			
	</footer><!-- .entry-meta -->
	<div class="mt-space-icon"><i class="ti-line-dashed"> </i></div>
</article><!-- #post -->
