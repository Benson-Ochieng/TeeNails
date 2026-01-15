<?php 
/*
 * Template Name: Home Two Template
 * Description: A Page Template with a Page Builder design.
 */
$lanotte_redux_demo = get_option('redux_demo');
get_header('home2'); 
?>
<?php if (have_posts()){ ?>
	<?php while (have_posts()) : the_post()?>
		<?php the_content(); ?>
		<?php endwhile; ?>
	<?php }else {
	echo esc_html__( 'Home Two Template', 'lanotte' );
}?>
<?php
get_footer('3');
?>