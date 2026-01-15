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
class BdevsPricing3Section extends \Elementor\Widget_Base {

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
		return 'bdevs-pricing3-section';
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
		return __( 'Pricing 3 Section', 'bdevs-elementor' );
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
		return 'eicon-price-list';
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
		return [ 'pricing3section', 'carousel' ];
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
			'section_content_pricing3_section',
			[
				'label' => esc_html__( 'Pricing 3 Section', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Text heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text heading', 'bdevs-elementor' ),
				'default'     => __( 'Best deal', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Text Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text title', 'bdevs-elementor' ),
				'default'     => __( 'Our Special Prices', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'link_btn',
			[
				'label'       => __( 'Link Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your link button', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text_btn',
			[
				'label'       => __( 'Text Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text button', 'bdevs-elementor' ),
				'default'     => __( 'Find out more', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Pricing Section Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Slide #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'link_item',
						'label'       => esc_html__( 'Link Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'img_item',
						'label'       => esc_html__( 'Image Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::MEDIA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'name_item',
						'label'       => esc_html__( 'Name Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'price1_item',
						'label'       => esc_html__( 'Price Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '$10' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'price2_item',
						'label'       => esc_html__( 'Price Sale Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '$10' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'text_item',
						'label'       => esc_html__( 'Text Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
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




		$this->end_controls_section();

	}

	public function render() {

		$settings  = $this->get_settings_for_display();
		extract($settings);
		?> 

<section id="pricing-4" class="pricing-4-boxed pricing-section division">
	<div class="container">
		<div class="p4-wrapper bg--white">
			<div class="row justify-content-center">	
				<div class="col-lg-10 col-xl-8">
					<div class="section-title title-01 mb-70">
			 			<span class="section-id"><?php echo wp_kses_post($settings['heading']); ?></span>
						<h2 class="h2-lg"><?php echo wp_kses_post($settings['title']); ?></h2>
					</div>	
				</div>
			</div>
	 		<div class="pricing-4-wrapper">
				<div class="row row-cols-1 row-cols-md-2">
					<div class="col">
						<div class="pricing-4-table">
							<ul class="pricing-4-list wow fadeInUp">
								<?php
								$i = 0;
								foreach ( $settings['tabs'] as $item ) : 
									$i++;
								?>
								<?php if ($i % 2 == 1) { ?>
									<li class="pricing-4-item pr-15">
										<?php if ('' != $item['link_item']): ?>
										<a href="<?php echo wp_kses_post($item['link_item']); ?>">
										<?php endif ?>
											 <div class="row d-flex align-items-center">
											 	<?php if ('' != $item['img_item']['url']): ?>
													<div class="col-lg-3">
														<div class="hover-overlay"> 
															<img class="img-fluid" src="<?php echo wp_kses_post($item['img_item']['url']); ?>" alt="pricing-image">
															<div class="item-overlay"></div>
														</div>
													</div>
											 	<?php endif ?>
											 	<?php if ('' != $item['img_item']['url']) { ?>
											 		<div class="col-lg-9">
											 	<?php } else { ?>
											 		<div class="col-lg-12">
											 	<?php } ?>
														<div class="pricing-4-txt">
															<?php if ('' != $item['name_item']): ?>
																<div class="price-name">
																	<h5 class="h5-lg"><?php echo wp_kses_post($item['name_item']); ?></h5>
																</div>
															<?php endif ?>
															<div class="price-dots"></div>
															<div class="price-number">
																<h5 class="h5-lg">
																	<span class="old-price"><?php echo wp_kses_post($item['price1_item']); ?></span>
																	<?php echo wp_kses_post($item['price2_item']); ?>
																</h5>
															</div>
															<div class="price-txt">
																<p>
																	<?php echo wp_kses_post($item['text_item']); ?>
																</p>
															</div>
														</div>
													</div>
											</div>
										<?php if ('' != $item['link_item']): ?>
										</a>
										<?php endif ?>
									</li>
								<?php } ?>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<div class="col">
						<div class="pricing-4-table">
							<ul class="pricing-4-list wow fadeInUp">
								<?php
								$i = 0;
								foreach ( $settings['tabs'] as $item ) : 
									$i++;
								?>
								<?php if ($i % 2 == 1) { ?>
									<li class="pricing-4-item pr-15">
										<?php if ('' != $item['link_item']): ?>
										<a href="<?php echo wp_kses_post($item['link_item']); ?>">
										<?php endif ?>
											 <div class="row d-flex align-items-center">
											 	<?php if ('' != $item['img_item']['url']): ?>
													<div class="col-lg-3">
														<div class="hover-overlay"> 
															<img class="img-fluid" src="<?php echo wp_kses_post($item['img_item']['url']); ?>" alt="pricing-image">
															<div class="item-overlay"></div>
														</div>
													</div>
											 	<?php endif ?>
											 	<?php if ('' != $item['img_item']['url']) { ?>
											 		<div class="col-lg-9">
											 	<?php } else { ?>
											 		<div class="col-lg-12">
											 	<?php } ?>
														<div class="pricing-4-txt">
															<?php if ('' != $item['name_item']): ?>
																<div class="price-name">
																	<h5 class="h5-lg"><?php echo wp_kses_post($item['name_item']); ?></h5>
																</div>
															<?php endif ?>
															<div class="price-dots"></div>
															<div class="price-number">
																<h5 class="h5-lg">
																	<span class="old-price"><?php echo wp_kses_post($item['price1_item']); ?></span>
																	<?php echo wp_kses_post($item['price2_item']); ?>
																</h5>
															</div>
															<div class="price-txt">
																<p>
																	<?php echo wp_kses_post($item['text_item']); ?>
																</p>
															</div>
														</div>
													</div>
											</div>
										<?php if ('' != $item['link_item']): ?>
										</a>
										<?php endif ?>
									</li>
								<?php } ?>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
	 		<div class="row">
	 			<div class="col">
	 				<div class="more-btn mt-60">
						<a href="<?php echo wp_kses_post($settings['link_btn']); ?>" class="btn violet-red--btn tra-black--hover"><?php echo wp_kses_post($settings['text_btn']); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
}

}