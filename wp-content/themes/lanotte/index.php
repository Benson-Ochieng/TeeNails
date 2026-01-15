<?php 
$lanotte_redux_demo = get_option('redux_demo');
get_header(); 
?>
<section id="blog-2" class="wide-40 inner-page-hero blog-section division">					
	<div class="container">	
		<div class="row justify-content-center">	
			<div class="col-md-10 col-lg-8">
				<div class="section-title title-01 mb-70">	
					<span class="section-id">
						<?php if(isset($lanotte_redux_demo['blog_heading']) && $lanotte_redux_demo['blog_heading']!=''){?>
						<?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['blog_heading']));?>
						<?php }else{?>
						<?php echo esc_html__( 'From The Blog', 'lanotte' );
						}?>
					</span>	
					<h2 class="h2-lg">
						<?php if(isset($lanotte_redux_demo['blog_title']) && $lanotte_redux_demo['blog_title']!=''){?>
						<?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['blog_title']));?>
						<?php }else{?>
						<?php echo esc_html__( 'We really have so much to share with you!', 'lanotte' );
						}?>
					</h2>
				</div>	
			</div>
		</div>
		<div class="row">	
			<div class="col-lg-10 offset-lg-1">
				<?php  
				$wp_query = new \WP_Query(array('post_type' => 'post','paged' => $paged,  'orderby' => 'ID', 'order' => 'ASC'));
					while($wp_query->have_posts()): $wp_query->the_post(); 
						$blog_content = get_post_meta(get_the_ID(),'_cmb_content_excerpt_2', true);
				?>
					<div class="post-content bg--white-smoke mb-50">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="blog-post-img mt-50 mb-30">
								<img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>">
							</div>
						<?php } ?>
						<div class="single-post-title blog-list">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="post-meta">
								<p class="post-tag">
									by <?php echo get_the_author_posts_link(); ?> <span class="d-none d-md-inline">|</span>
								</p>
									<?php echo get_the_category_list(); ?>
								<p class="post-tag">
									<span class="d-none d-md-inline">|</span> <?php echo get_the_date('M j, Y'); ?>
								</p>
							</div>
						</div>
						<div class="single-post-txt">
							<p class="p-lg">
								<?php if ( '' !== wp_specialchars_decode($blog_content)): ?>
									<?php print wp_specialchars_decode($blog_content); ?>
								<?php else:?>
									<?php if(isset($lanotte_redux_demo['blog_excerpt'])){?>
									<?php echo esc_attr(lanotte_excerpt_1($lanotte_redux_demo['blog_excerpt'])); ?>
									<?php }else{?>
									<?php echo esc_attr(lanotte_excerpt_1(40)); 
									}?>
								<?php endif ?>
							</p>
						</div>
						<div class="blog-btn mt-30">
							<a href="<?php the_permalink();?>">
								<?php if(isset($lanotte_redux_demo['blog_btn_text']) && $lanotte_redux_demo['blog_btn_text']!=''){?>
								<?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['blog_btn_text']));?>
								<?php }else{?>
								<?php echo esc_html__( 'Read more', 'lanotte' );
								}?>
							</a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>	
		</div>
	</div>
</section>
<div class="pb-100 page-pagination division">
	<div class="container">
		<div class="row">	
			<div class="col-md-12">
				<nav aria-label="Page navigation example">
					<?php lanotte_pagination();?>
				</nav>
			</div>
		</div>
	</div>
</div>
<section id="newsletter-1" class="newsletter-section division">
	<div class="container">
		<div class="newsletter-wrapper bg--white-smoke">
			<div class="row justify-content-center">
				<div class="col-lg-10 col-xl-8">
					<div class="section-title title-01 mb-50">	
						<span class="section-id">
							<?php if(isset($lanotte_redux_demo['post_heading']) && $lanotte_redux_demo['post_heading']!=''){?>
							<?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['post_heading']));?>
							<?php }else{?>
							<?php echo esc_html__( 'Connect with La Nottes', 'lanotte' );
							}?>
						</span>
						<h2 class="h2-lg">
							<?php if(isset($lanotte_redux_demo['post_title']) && $lanotte_redux_demo['post_title']!=''){?>
							<?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['post_title']));?>
							<?php }else{?>
							<?php echo esc_html__( 'Join Our Newsletter', 'lanotte' );
							}?>
						</h2>
					</div>	
				</div>
			</div>
			<div class="row">
				<div class="col">
					<?php echo do_shortcode('[contact-form-7 id="14" title="Subscribe Form"]'); ?>
					<div class="newsletter-form">
						<p class="p-md">
							<?php if(isset($lanotte_redux_demo['post_text']) && $lanotte_redux_demo['post_text']!=''){?>
							<?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['post_text']));?>
							<?php }else{?>
							<?php echo esc_html__( 'By signing and clicking Submit, you affirm you have read and agree to the Privacy Policy and Terms of Use, and want to receive news.', 'lanotte' );
							}?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
?>