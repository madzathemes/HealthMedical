
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="aside">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'madza_translate' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'madza_translate' ) ); ?>
		</div><!-- .entry-content -->
	</div><!-- .aside -->

	<footer class="entry-meta">
		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'madza_translate' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php echo get_the_date(); ?></a>
		<div class="mt-space-icon"><i class="ti-more"> </i></div>
		<?php edit_post_link( __( 'Edit', 'madza_translate' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
	<div class="mt-space-icon"><i class="ti-line-dashed"> </i></div>
</article><!-- #post -->
