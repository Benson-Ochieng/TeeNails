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
class BdevsAbout4Section extends \Elementor\Widget_Base {

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
		return 'bdevs-about4-section';
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
		return __( 'About 4 Section', 'bdevs-elementor' );
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
		return 'eicon-info';
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
		return [ 'about4section', 'carousel' ];
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
			'section_content_about4_section',
			[
				'label' => esc_html__( 'About 4 Section', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'image',
			[
				'label'       => esc_html__( 'About Image', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload about image', 'bdevs-elementor' ),
			]	
		);
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Text Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Text Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text title', 'bdevs-elementor' ),
				'default'     => __( 'Reveal Colorful You', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'content',
			[
				'label'       => __( 'Text Content', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text content', 'bdevs-elementor' ),
				'default'     => __( 'Content', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'sub_title',
			[
				'label'       => __( 'Text Sub Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text title', 'bdevs-elementor' ),
				'default'     => __( 'Elegance in Every Stroke', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Section About Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Slide #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
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
		$this->add_control(
			'link_btn',
			[
				'label'       => __( 'Link Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text_btn',
			[
				'label'       => __( 'Text Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text title', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
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
			'show_heading',
			[
				'label'   => esc_html__( 'Show Heading', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
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
			'show_content',
			[
				'label'   => esc_html__( 'Show Content', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_subtitle',
			[
				'label'   => esc_html__( 'Show Sub Title', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_img',
			[
				'label'   => esc_html__( 'Show Image', 'bdevs-elementor' ),
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

<section id="about-10" class="about-section division">
	<div class="container white-smoke--shape">
		<div class="row d-flex align-items-center">
			<?php if (('' != $settings['image']['url']) && ($settings['show_img'])): ?>
				<div class="col-md-5 col-lg-6">
					<div class="about-10-img wow fadeInRight">
						<img class="img-fluid" src="<?php echo wp_kses_post($settings['image']['url']); ?>" alt="about-image">
					</div>
				</div>
			<?php endif; ?>
			<?php if (('' != $settings['image']['url']) && ($settings['show_img'])) { ?>
				<div class="col-md-7 col-lg-6">
			<?php } else { ?>
				<div class="col-md-12 col-lg-12">
			<?php } ?>
			 		<div class="about-10-txt wow fadeInLeft">
			 			<?php if (('' != $settings['heading']) && ($settings['show_heading'])): ?>
					 		<span class="section-id"><?php echo wp_kses_post($settings['heading']); ?></span>
					 	<?php endif; ?>
			 			<?php if (('' != $settings['title']) && ($settings['show_title'])): ?>
							<h5 class="h5-lg"><?php echo wp_kses_post($settings['title']); ?></h5>
						<?php endif; ?>
						<?php if (('' != $settings['content']) && ($settings['show_content'])): ?>
							<p class="p-lg">
								<?php echo wp_kses_post($settings['content']); ?>
							</p>
						<?php endif; ?>
						<?php if (('' != $settings['sub_title']) && ($settings['show_subtitle'])): ?>
							<h5 class="h5-lg"><?php echo wp_kses_post($settings['sub_title']); ?></h5>
						<?php endif; ?>
							<ul class="simple-list">
								<?php
								foreach ( $settings['tabs'] as $item ) : 
								?>
								<?php if ('' != $item['text_item']): ?>
									<li class="list-item">
										<p class="p-lg">
											<?php echo wp_kses_post($item['text_item']); ?>
										</p>
									</li>
								<?php endif ?>
								<?php endforeach; ?>
							</ul>
						<?php if (('' != $settings['link_btn']) && ('' != $settings['text_btn'])): ?>
							<a href="<?php echo wp_kses_post($settings['link_btn']); ?>" class="btn plum--btn tra-black--hover"><?php echo wp_kses_post($settings['text_btn']); ?></a>
						<?php endif ?>
			 		</div>
			 	</div>
		</div>
	</div>
</section>

<?php
}

}