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
class BdevsPromoSection extends \Elementor\Widget_Base {

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
		return 'bdevs-promo-section';
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
		return __( 'Promo Section', 'bdevs-elementor' );
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
		return 'eicon-image-rollover';
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
		return [ 'promosection', 'carousel' ];
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
			'section_content_promo_section',
			[
				'label' => esc_html__( 'Promo Section', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'bg_left',
			[
				'label'       => esc_html__( 'Background Left', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload background image', 'bdevs-elementor' ),
			]	
		);
		$this->add_control(
			'bg_right',
			[
				'label'       => esc_html__( 'Background Right', 'bdevs-elementor' ),
				'type'        => Controls_Manager::MEDIA,
				'dynamic'     => [ 'active' => true ],
				'label_block' => true,
				'description' => esc_html__( 'Upload background image', 'bdevs-elementor' ),
			]	
		);
		$this->add_control(
			'heading1',
			[
				'label'       => __( 'Text Heading Left', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text heading left', 'bdevs-elementor' ),
				'default'     => __( 'A Brush Of Perfection', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title1',
			[
				'label'       => __( 'Text Title Left', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text title left', 'bdevs-elementor' ),
				'default'     => __( 'Follow & Share', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'link1',
			[
				'label'       => __( 'Link Follow Left', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your link follow', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text1',
			[
				'label'       => __( 'Text Follow Left', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text follow left', 'bdevs-elementor' ),
				'default'     => __( '@la_notte_nail', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'link_button1',
			[
				'label'       => __( 'Link Button Left', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your link button left', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text_button1',
			[
				'label'       => __( 'Text Button Left', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text button left', 'bdevs-elementor' ),
				'default'     => __( 'View Our Gallery', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'heading2',
			[
				'label'       => __( 'Text Heading Right', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text heading right', 'bdevs-elementor' ),
				'default'     => __( 'Make it happen', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title2',
			[
				'label'       => __( 'Text Title Right', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text title 2', 'bdevs-elementor' ),
				'default'     => __( 'Gift Cards', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'link_button2',
			[
				'label'       => __( 'Link Button Right', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your link button right', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text_button2',
			[
				'label'       => __( 'Text Button Right', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text button right', 'bdevs-elementor' ),
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



		$this->end_controls_section();

	}

	public function render() {

		$settings  = $this->get_settings_for_display();
		extract($settings);
		?> 

<section id="promo-4" class="rel promo-section division">
	<style>
		#promo-4:before{
			background-image: url(<?php echo wp_kses_post($settings['bg_left']['url']); ?>);
		}
		#promo-4:after{
			background-image: url(<?php echo wp_kses_post($settings['bg_right']['url']); ?>);
		}
	</style>
	<div class="container">
		<div class="row row-cols-1 row-cols-md-2 align-items-center">
			<div class="col">
				<div id="pb-4-1">
					<div class="pbox-4-description black--color">
						<div class="pbox-4-caption">
							<span class="section-id"><?php echo wp_kses_post($settings['heading1']); ?></span>
							<h3 class="h3-md"><?php echo wp_kses_post($settings['title1']); ?></h3>
							<h2 class="h2-xl">
								<a href="<?php echo wp_kses_post($settings['link1']); ?>">
									<?php echo wp_kses_post($settings['text1']); ?>
								</a>
							</h2>
							<a href="<?php echo wp_kses_post($settings['link_button1']); ?>" class="btn rose--btn tra-black--hover">
								<?php echo wp_kses_post($settings['text_button1']); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col">
				<div id="pb-4-2">
					<div class="pbox-4-description white--color">
						<div class="pbox-4-caption">
							<span class="section-id"><?php echo wp_kses_post($settings['heading2']); ?></span>
							<h2><?php echo wp_kses_post($settings['title2']); ?></h2>
							<a href="<?php echo wp_kses_post($settings['link_button2']); ?>" class="btn tra-white--btn rose--hover">
								<?php echo wp_kses_post($settings['text_button2']); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
}

}