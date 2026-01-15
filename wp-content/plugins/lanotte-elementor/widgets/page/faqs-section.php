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
class BdevsFAQsSection extends \Elementor\Widget_Base {

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
		return 'bdevs-faqs-section';
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
		return __( 'FAQs Section', 'bdevs-elementor' );
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
		return 'eicon-notes';
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
		return [ 'faqssection', 'carousel' ];
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
			'section_content_faqs_section',
			[
				'label' => esc_html__( 'FAQs Section', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'FAQs Section Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Slide #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'question_item',
						'label'       => esc_html__( 'Question Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'type',
						'label'       => esc_html__( 'Show Answer With List', 'bdevs-elementor' ),
						'type'        => Controls_Manager::SWITCHER,
						'dynamic'     => [ 'active' => true ],
						'default' 	  => 'no',
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
								'name'        => 'answer_item',
								'label'       => esc_html__( 'Answer Item', 'bdevs-elementor' ),
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

<section id="faqs-1" class="wide-60 faqs-section division">
	<div class="container">
		<div class="faqs-1-questions">
			<div class="row row-cols-1 row-cols-lg-2">
				<div class="col">
					<div class="questions-holder pr-15">
						<?php
						$i = 0;
						foreach ( $settings['tabs'] as $item ) :
							$i++;
						?>
							<?php if ($i % 2 == 1) { ?>
								<div class="question wow fadeInUp">
									<h5 class="h5-lg"><?php echo wp_kses_post($item['question_item']); ?></h5>
									<?php if ($item['type'] == 'yes') { ?>
										<ul class="simple-list">
											<?php
											foreach ( $item['list_item'] as $item1 ) : 
											?>
											<?php if ('' != $item1['answer_item']): ?>
												<li class="list-item">
													<p class="p-lg">
														<?php echo wp_kses_post($item1['answer_item']); ?>
													</p>
												</li>
											<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									<?php } else { ?>
										<?php
										foreach ( $item['list_item'] as $item1 ) : 
										?>
										<?php if ('' != $item1['answer_item']): ?>
											<p class="p-lg">
												<?php echo wp_kses_post($item1['answer_item']); ?>
											</p>
										<?php endif; ?>
										<?php endforeach; ?>
									<?php } ?>
								</div>
							<?php } ?>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="col">
					<div class="questions-holder pr-15">
						<?php
						$i = 0;
						foreach ( $settings['tabs'] as $item ) :
							$i++;
						?>
							<?php if ($i % 2 == 0) { ?>
								<div class="question wow fadeInUp">
									<h5 class="h5-lg"><?php echo wp_kses_post($item['question_item']); ?></h5>
									<?php if ($item['type'] == 'yes') { ?>
										<ul class="simple-list">
											<?php
											foreach ( $item['list_item'] as $item1 ) : 
											?>
											<?php if ('' != $item1['answer_item']): ?>
												<li class="list-item">
													<p class="p-lg">
														<?php echo wp_kses_post($item1['answer_item']); ?>
													</p>
												</li>
											<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									<?php } else { ?>
										<?php
										foreach ( $item['list_item'] as $item1 ) : 
										?>
										<?php if ('' != $item1['answer_item']): ?>
											<p class="p-lg">
												<?php echo wp_kses_post($item1['answer_item']); ?>
											</p>
										<?php endif; ?>
										<?php endforeach; ?>
									<?php } ?>
								</div>
							<?php } ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<?php if (('' != $settings['link_button']) && ('' != $settings['text_button']) && ($settings['show_button'])): ?>
			<div class="row">
				<div class="col">	
					<div class="more-questions wow fadeInUp">
						<a href="<?php echo wp_kses_post($settings['link_button']); ?>" class="btn btn-md tra-grey--btn rose--hover">
							<?php echo wp_kses_post($settings['text_button']); ?>
						</a>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>
<?php
}

}