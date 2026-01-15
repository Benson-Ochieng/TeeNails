<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsBlogSection extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Bdevs Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bdevs-blog-section';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Bdevs Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Blog Section', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-grid';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'bdevs-elementor' ];
	}

	public function get_keywords() {
		return [ 'blogsection', 'carousel' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	// BDT Position
	protected function element_pack_position() {
		$position_options = [
			''              => esc_html__('Default', 'bdevs-elementor'),
			'top-left'      => esc_html__('Top Left', 'bdevs-elementor') ,
			'top-center'    => esc_html__('Top Center', 'bdevs-elementor') ,
			'top-right'     => esc_html__('Top Right', 'bdevs-elementor') ,
			'center'        => esc_html__('Center', 'bdevs-elementor') ,
			'center-left'   => esc_html__('Center Left', 'bdevs-elementor') ,
			'center-right'  => esc_html__('Center Right', 'bdevs-elementor') ,
			'bottom-left'   => esc_html__('Bottom Left', 'bdevs-elementor') ,
			'bottom-center' => esc_html__('Bottom Center', 'bdevs-elementor') , 
			'bottom-right'  => esc_html__('Bottom Right', 'bdevs-elementor') ,
		];

		return $position_options;
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content_blog_section',
			[
				'label' => esc_html__( 'Blog Section', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Text heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text heading', 'bdevs-elementor' ),
				'default'     => __( 'From the blog', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Text Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text title', 'bdevs-elementor' ),
				'default'     => __( 'Latest News & Events', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'post_number',
			[
				'label'       => __( 'Post Number', 'bdevs-elementor' ),
				'type'        => Controls_Manager::NUMBER,
				'placeholder' => __( 'Enter your post number', 'bdevs-elementor' ),
				'default'     => __( '3', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);
		$this->add_control(
			'post_order_by',
			[
				'label'       => __( 'Post Order By', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text post order by', 'bdevs-elementor' ),
				'default'     => __( 'ID', 'bdevs-elementor' ),
				'label_block' => true,
			]	
		);
		$this->add_control(
			'post_order',
			[
				'label'     => esc_html__( 'Post Order', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__( 'ASC', 'bdevs-elementor' ),
					'desc' => esc_html__( 'DESC', 'bdevs-elementor' ),
				],
				'default'   => 'asc',
			]
		);
		

		
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'bdevs-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'bdevs-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'left',
			]
		);


		$this->add_control(
			'show_title',
			[
				'label'   => esc_html__( 'Show Title', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_heading',
			[
				'label'   => esc_html__( 'Show Heading', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);


		$this->end_controls_section();

	}

	public function render() {
	$settings  = $this->get_settings_for_display();
	extract($settings);
	?>

<section id="blog-1" class="pb-60 blog-section division">				
	<div class="container">
		<div class="row justify-content-center">	
			<div class="col-lg-10 col-xl-8">
				<div class="section-title title-01 mb-70">
					<?php if (('' != $settings['heading']) && ($settings['show_heading'])): ?>
						<span class="section-id"><?php echo wp_kses_post($settings['heading']); ?></span>
					<?php endif; ?>
					<?php if (('' != $settings['title']) && ($settings['show_title'])): ?>
						<h2 class="h2-lg"><?php echo wp_kses_post($settings['title']); ?></h2>
					<?php endif; ?>
				</div>	
			</div>
		</div>
		<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
			<?php
			$wp_query = new \WP_Query(array(
				'posts_per_page' => wp_kses_post($settings['post_number']),
				'post_type' => 'post',
				'orderby' => wp_kses_post($settings['post_order_by']),
				'order' => wp_kses_post($settings['post_order'])
			));
			$i = 0;
				while($wp_query->have_posts()): $wp_query->the_post(); 
					$i++;
					$j = $i * 0.3;
					$blog_content = get_post_meta(get_the_ID(),'_cmb_content_excerpt_1', true);
					$image_recent = get_post_meta(get_the_ID(),'_cmb_image_recent', true);
			?>
				<div class="col">
					<div id="bp-1-1" class="blog-1-post mb-40 wow fadeInUp" data-wow-delay="<?php echo esc_attr($j) ; ?>s">
						<div class="blog-post-img">
							<div class="hover-overlay"> 
								<img class="img-fluid" src="<?php echo wp_get_attachment_url($image_recent);?>" alt="blog-post-image" />
								<div class="item-overlay"></div>
							</div>
						</div>
						<div class="blog-post-txt">
							<p class="post-tag"><?php comments_number( esc_html__('0 Comments', 'lanotte'), esc_html__('1 Comment', 'lanotte'), esc_html__('% Comments', 'lanotte') ); ?> <span>|</span> <?php echo get_the_date('M j, Y'); ?></p>
							<h5 class="h5-md black--color">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h5>
							<p class="p-lg">
								<?php if ( '' !== wp_specialchars_decode($blog_content)): ?>
									<?php print wp_specialchars_decode($blog_content); ?>
								<?php else:?>
									<?php if(isset($lanotte_redux_demo['blog_excerpt'])){?>
									<?php echo esc_attr(lanotte_excerpt_2($lanotte_redux_demo['blog_excerpt'])); ?>
									<?php }else{?>
									<?php echo esc_attr(lanotte_excerpt_2(10)); 
									}?>
								<?php endif ?>
							</p>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>

<?php
}

}