<?php 
/*
 * Template Name: Home One Template
 * Description: A Page Template with a Page Builder design.
 */
$lanotte_redux_demo = get_option('redux_demo');
get_header('home1'); 
?>
<?php if (have_posts()){ ?>
	<?php while (have_posts()) : the_post()?>
		<?php the_content(); ?>
		<?php endwhile; ?>
	<?php }else {
	echo esc_html__( 'Home One Template', 'lanotte' );
}?>
<?php
get_footer('2');
?>