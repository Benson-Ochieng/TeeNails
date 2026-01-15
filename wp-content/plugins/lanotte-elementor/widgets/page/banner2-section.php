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
class BdevsBanner2Section extends \Elementor\Widget_Base {

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
		return 'bdevs-banner2-section';
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
		return __( 'Banner 2 Section', 'bdevs-elementor' );
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
		return 'eicon-banner';
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
		return [ 'banner2section', 'carousel' ];
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
			'section_content_banner2_section',
			[
				'label' => esc_html__( 'Banner 2 Section', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'background',
			[
				'label'       => esc_html__( 'Banner Background', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload banner image', 'bdevs-elementor' ),
			]	
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Text Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text title', 'bdevs-elementor' ),
				'default'     => __( 'We want to make every girl pretty, happy, and loved!', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text1',
			[
				'label'       => __( 'Text Content 1', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text content', 'bdevs-elementor' ),
				'default'     => __( '20% Off', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text2',
			[
				'label'       => __( 'Text Content 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text content', 'bdevs-elementor' ),
				'default'     => __( 'on Manicure + Gel Polish', 'bdevs-elementor' ),
				'label_block' => true,
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
				'default'     => __( 'Services & prices', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'note',
			[
				'label'       => __( 'Text Note', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your text note', 'bdevs-elementor' ),
				'default'     => __( '* All Autumn Long!', 'bdevs-elementor' ),
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

<section id="banner-3" class="bg-fixed banner-section division">
	<style>
		#banner-3{
			background-image: url(<?php echo wp_kses_post($settings['background']['url']); ?>);
			width: 100%;
			background-repeat: no-repeat;
			background-position: center center;
			background-size: cover;
		}
	</style>
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-lg-6">
				<div class="banner-3-txt text-center">
					<?php if ('' != $settings['title']): ?>
						<h5 class="h5-md"><?php echo wp_kses_post($settings['title']); ?></h5>
					<?php endif ?>
					<?php if ('' != $settings['text1']): ?>
						<h2><?php echo wp_kses_post($settings['text1']); ?></h2>
					<?php endif; ?>
					<?php if ('' != $settings['text2']): ?>
						<h4 class="h4-xs"><?php echo wp_kses_post($settings['text2']); ?></h4>
					<?php endif; ?>
					<?php if (('' != $settings['link_button']) && ($settings['text_button'] != '') &&($settings['show_button'])): ?>
						<a href="<?php echo wp_kses_post($settings['link_button']); ?>" class="btn rose--btn tra-black--hover">
							<?php echo wp_kses_post($settings['text_button']); ?>
						</a>
					<?php endif; ?>
					<?php if ('' != $settings['note']): ?>
						<p class="mt-20"><?php echo wp_kses_post($settings['note']); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
}

}