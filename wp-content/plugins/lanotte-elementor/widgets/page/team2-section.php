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
class BdevsTeam2Section extends \Elementor\Widget_Base {

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
		return 'bdevs-team2-section';
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
		return __( 'Team 2 Section', 'bdevs-elementor' );
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
		return 'eicon-gallery-grid';
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
		return [ 'team2section', 'carousel' ];
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
			'section_content_team2_section',
			[
				'label' => esc_html__( 'Team 2 Section', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Section Team Items', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Slide #1', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'img_item',
						'label'       => esc_html__( 'Image Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::MEDIA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'text_item',
						'label'       => esc_html__( 'Text Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
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
						'name'        => 'link_social_1',
						'label'       => esc_html__( 'Link Social 1 Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'link_social_2',
						'label'       => esc_html__( 'Link Social 2 Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'link_social_3',
						'label'       => esc_html__( 'Link Social 3 Item', 'bdevs-elementor' ),
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

<section id="team-1" class="wide-50 team-section division">
	<div class="container">
		<div class="team-members-wrapper text-center">
			<div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4">
				<?php
				$i = 0;
				foreach ( $settings['tabs'] as $item ) : 
					$i++;
				?>
					<div class="col">
						<div class="team-member wow fadeInUp" data-wow-delay="<?php echo esc_attr($i*0.3) ; ?>s">
							<div class="team-member-photo">
								<div class="hover-overlay">
									<?php if ('' != $item['img_item']['url']): ?>
										<img class="img-fluid" src="<?php echo wp_kses_post($item['img_item']['url']); ?>" alt="team-member-foto">
									<?php endif ?>
									<div class="item-overlay"></div>
									<div class="tm-social white--color ico-25 clearfix">
										<ul class="text-center clearfix">
											<?php if ('' != $item['link_social_1']): ?>
												<li><a href="<?php echo wp_kses_post($item['link_social_1']); ?>"><span class="flaticon-facebook"></span></a></li>
											<?php endif ?>
											<?php if ('' != $item['link_social_2']): ?>
												<li><a href="<?php echo wp_kses_post($item['link_social_2']); ?>"><span class="flaticon-instagram"></span></a></li>
											<?php endif; ?>
											<?php if ('' != $item['link_social_3']): ?>
												<li><a href="<?php echo wp_kses_post($item['link_social_3']); ?>"><span class="flaticon-twitter"></span></a></li>
											<?php endif; ?>
										</ul>
									</div>
								</div>
							</div>
							<div class="team-member-data">
								<?php if ('' != $item['text_item']): ?>
									<span class="txt-upcase"><?php echo wp_kses_post($item['text_item']); ?></span>	
								<?php endif; ?>
								<?php if ('' != $item['name_item']): ?>
									<h5 class="h5-lg"><?php echo wp_kses_post($item['name_item']); ?></h5>
								<?php endif; ?>
							</div>	
						</div>									
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>

<?php
}

}