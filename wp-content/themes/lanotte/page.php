<?php
$lanotte_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php 
while (have_posts()): the_post();
	$share_social = get_post_meta(get_the_ID(),'_cmb_share_social', true);
?>
<section id="single-post" class="wide-80 inner-page-hero blog-page-section division">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="post-content">
					<div class="single-post-title text-center">
						<h2 class="h2-sm"><?php the_title(); ?></h2>
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
					<?php if ( has_post_thumbnail() ) { ?>
						<div class="blog-post-img mt-50 mb-30">
							<img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>">
						</div>
					<?php } ?>
					<div class="single-post-txt">
						<?php the_content(); ?>
					</div>
					<div class="row post-share-links d-flex align-items-center">
						<div class="col-sm-9 col-xl-8 post-tags-list">
							<span>
								<?php echo get_the_tag_list(); ?>
							</span>
						</div>
						<div class="col-sm-3 col-xl-4 post-share-list text-end">
							<ul class="share-social-icons ico-25 theme-color text-center clearfix">
								<?php print wp_specialchars_decode($share_social); ?>
							</ul>
						</div>
					</div>
					<div class="post-comments">
						<?php comments_template();?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endwhile; ?>
<?php get_footer(); ?>