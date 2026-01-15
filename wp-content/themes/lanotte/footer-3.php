<?php $lanotte_redux_demo = get_option('redux_demo');?> 
		<footer id="footer-3" class="footer division">
			<div class="container 1white-smoke--color">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<?php dynamic_sidebar( 'footer-3' ); ?>
					<?php endif; ?>
				</div>
				<div class="bottom-footer">
					<div class="row row-cols-1 row-cols-md-2 d-flex align-items-center">
						<?php if(isset($lanotte_redux_demo['footer_copyright']) && $lanotte_redux_demo['footer_copyright']!=''){?>
							<div class="col">
								<div class="footer-copyright">
									<p class="p-md"><?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['footer_copyright']));?></p>
								</div>
							</div>
						<?php }else{?>
							<div class="col">
								<div class="footer-copyright">
									<p class="p-md"><?php echo esc_html__( '© 2023 La Notte. All Rights Reserved', 'lanotte' ); ?></p>
								</div>
							</div>
						<?php } ?>
						<div class="col">
							<ul class="bottom-footer-list text-end">
								<?php if(($lanotte_redux_demo['link_text_1'] != '') &&($lanotte_redux_demo['text_1'] != '')){?>
									<li><p class="p-md"><a href="<?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['link_text_1']));?>"><?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['text_1']));?></a></p></li>
								<?php } ?>
									<li><span><?php echo esc_html__( '|', 'lanotte' ); ?></span></li>
								<?php if(($lanotte_redux_demo['link_text_2'] != '') &&($lanotte_redux_demo['text_2'] != '')){?>
									<li><p class="p-md"><a href="<?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['link_text_2']));?>"><?php echo wp_specialchars_decode(esc_attr($lanotte_redux_demo['text_2']));?></a></p></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<?php wp_footer(); ?>
</body>
</html>