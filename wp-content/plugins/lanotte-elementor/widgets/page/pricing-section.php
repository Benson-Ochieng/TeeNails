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
class BdevsPricingSection extends \Elementor\Widget_Base {

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
		return 'bdevs-pricing-section';
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
		return __( 'Pricing Section', 'bdevs-elementor' );
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
		return [ 'pricingsection', 'carousel' ];
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
			'section_content_pricing_section',
			[
				'label' => esc_html__( 'Pricing Section', 'bdevs-elementor' ),
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
						'name'        => 'heading_item',
						'label'       => esc_html__( 'Heading Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'title_item',
						'label'       => esc_html__( 'Title Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'list_item',
						'label'       => esc_html__( 'List Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::REPEATER,
						'default'     => [
							[
								'tab_title'   => esc_html__( 'Slide #2', 'bdevs-elementor' ),
								'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
							]
						],
						'fields'  	  =>[
							[
								'name'        => 'name_item',
								'label'       => esc_html__( 'Name Item', 'bdevs-elementor' ),
								'type'        => Controls_Manager::TEXT,
								'dynamic'     => [ 'active' => true ],
								'default'     => esc_html__( '' , 'bdevs-elementor' ),
								'label_block' => true,
							],
							[
								'name'        => 'price_item',
								'label'       => esc_html__( 'Price Item', 'bdevs-elementor' ),
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
						]
					],
				],
			]
		);
		$this->add_control(
			'link_button',
			[
				'label'       => __( 'Link Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your link button', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text_button',
			[
				'label'       => __( 'Text Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text button', 'bdevs-elementor' ),
				'default'     => __( 'Have Other Questions?', 'bdevs-elementor' ),
				'label_block' => true,
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
			'show_button',
			[
				'label'   => esc_html__( 'Show Button', 'bdevs-elementor' ),
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

<section id="pricing-6" class="bg--tra-img wide-70 pricing-section division">
	<div class="container">
		<div class="pricing-6-wrapper">
			<div class="row">
				<?php
				$i = 0;
				foreach ( $settings['tabs'] as $item ) : 
					$i++;
				?>
					<div class="col-lg-6">
						<?php if ($i % 2 == 1) { ?>
							<div class="pricing-6-table pr-25 wow fadeInUp">
						<?php } else { ?>
							<div class="pricing-6-table pl-25 wow fadeInUp">
						<?php } ?>
					 			<span class="section-id"><?php echo wp_kses_post($item['heading_item']); ?></span>
								<h5 class="h5-xl pricing-title"><?php echo wp_kses_post($item['title_item']); ?></h5>
								<ul class="pricing-6-list">
									<?php
									foreach ( $item['list_item'] as $item1 ) : 
									?>
										<li class="pricing-6-item">
											<div class="detail-price">
												<div class="price-name"><h5 class="h5-lg"><?php echo wp_kses_post($item1['name_item']); ?></h5></div>
												<div class="price-dots"></div>
												<div class="price-number"><h5 class="h5-lg"><?php echo wp_kses_post($item1['price_item']); ?></h5></div>
											</div>
											<div class="price-txt">
												<p class="p-md"><em><?php echo wp_kses_post($item1['text_item']); ?></em></p>
											</div>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<?php if (('' != $settings['link_button']) && ('' != $settings['text_button']) && ($settings['show_button'])): ?>
	 		<div class="row">
	 			<div class="col">
	 				<div class="more-btn mt-50">
						<p class="tra-link">
							<a href="<?php echo wp_kses_post($settings['link_button']); ?>">
								<?php echo wp_kses_post($settings['text_button']); ?>
							</a>
						</p>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php
}

}