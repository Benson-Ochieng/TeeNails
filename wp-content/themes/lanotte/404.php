<?php 
$lanotte_redux_demo = get_option('redux_demo');
get_header(); 
?>
<section id="blog-2" class="wide-40 inner-page-hero blog-section division">					
	<div class="container">	
		<div class="row justify-content-center">	
			<div class="col-md-10 col-lg-8">
				<div class="section-title title-01 mb-70">
					<h1 class="h1-lg">
						<?php if(isset($lanotte_redux_demo['404_heading']) && $lanotte_redux_demo['404_heading']!=''){?>
							<?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['404_heading']));?>
						<?php }else{?>
							<?php echo esc_html__( '404', 'lanotte' );
						}?>
					</h1>
					<h2 class="h2-lg">
						<?php if(isset($lanotte_redux_demo['404_title']) && $lanotte_redux_demo['404_title']!=''){?>
							<?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['404_title']));?>
						<?php }else{?>
							<?php echo esc_html__( 'Page Not Found!', 'lanotte' );
						}?>
					</h2>
					<div class="mt-40">
						<a href="<?php echo esc_url(home_url('/')); ?>" class="btn rose--btn tra-black--hover last-link">
							<?php if(isset($lanotte_redux_demo['404_button']) && $lanotte_redux_demo['404_button']!=''){?>
								<?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['404_button']));?>
							<?php }else{?>
								<?php echo esc_html__( 'Back to home', 'lanotte' );
							}?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer('3');
?>