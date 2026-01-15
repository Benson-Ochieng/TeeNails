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
class BdevsSlidesHome3 extends \Elementor\Widget_Base {

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
		return 'bdevs-slides-home3';
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
		return __( 'Slides Home 3', 'bdevs-elementor' );
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
		return 'eicon-slides';
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
		return [ 'slideshome3', 'carousel' ];
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
			'section_content_slides_home_3',
			[
				'label' => esc_html__( 'Slides Home 3', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'background',
			[
				'label'       => esc_html__( 'Slide Background', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload slide image', 'bdevs-elementor' ),
			]	
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Text Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text title', 'bdevs-elementor' ),
				'default'     => __( 'La Notte', 'bdevs-elementor' ),
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

<section id="hero-3" class="bg-fixed hero-section division">
	<style>
		#hero-3{
			background-image: url(<?php echo wp_kses_post($settings['background']['url']); ?>);
			padding-top: 175px;
			padding-bottom: 125px;
			width: 100%;
			background-repeat: no-repeat;
			background-position: center center;
			background-size: cover;
		}
	</style>
	<div class="container">
		<div class="row d-flex align-items-center">
			<div class="col-lg-10 offset-lg-1">
				<div class="hero-3-txt text-center white--color">
					<?php if ('' != $settings['title']): ?>
						<h2><?php echo wp_kses_post($settings['title']); ?></span></h2>
					<?php endif; ?>
					<?php if ('' != $settings['text']): ?>
						<p><?php echo wp_kses_post($settings['heading']); ?></span></p>
					<?php endif; ?>
					<?php if (('' != $settings['link_btn']) && ('' != $settings['text_btn']) && '' != $settings['show_button']): ?>
						<a href="<?php echo wp_kses_post($settings['link_btn']); ?>" class="btn rose--btn tra-white--hover"><?php echo wp_kses_post($settings['text_btn']); ?></a>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
}

}