<?php 

get_header(); 
global $col_4, $col_8;

$mt_layout = get_post_meta(get_the_ID(), "layout_positions", true);

$mt_float_layout = "";
$mt_float_sidebar = "";

if ($mt_layout == "left") {

	$mt_float_layout = "floatright";
	$mt_float_sidebar = "floatleft";
}
	
?>

<div class="row">
	<div class="col-md-<?php if ($mt_layout != "full") { echo esc_attr("8 "); echo esc_attr($col_8);} else {  echo esc_attr("12 "); } echo esc_attr($mt_float_layout); ?> ">
	<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		<?php mt_paging_nav(); ?>

	</div>
	
	<div class="col-md-4 <?php echo esc_attr($mt_float_sidebar); echo esc_attr($col_4); ?> "><?php get_sidebar(); ?></div>
</div>


<?php get_footer(); ?>