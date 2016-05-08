<?php

get_header(); 

?>
<article id="post-0" class="post error404 no-results not-found" style="padding:40px 0px;">
	<header class="entry-header" style="text-align:center;">
		<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'madza_translate' ); ?></h1>
	</header>

	<div class="entry-content" style="text-align:center!important; float:none!important;">
		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'madza_translate' ); ?></p>
		<div style="width:200px; margin: 0 auto;"><?php get_search_form(); ?></div>
	</div><!-- .entry-content -->
</article><!-- #post-0 -->

<div class="clear"></div>

<?php get_footer(); ?>