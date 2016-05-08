

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

	<div class="entry-content">
		<?php the_content( __( '', 'madza_translate' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'madza_translate' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'madza_translate' ), '<span class="edit-link">', '</span>' ); ?>
		
	</footer><!-- .entry-meta -->
	<div class="mt-space-icon"><i class="ti-line-dashed"> </i></div>
</article><!-- #post -->
