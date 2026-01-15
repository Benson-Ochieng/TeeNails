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
class BdevsTeamSection extends \Elementor\Widget_Base {

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
		return 'bdevs-team-section';
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
		return __( 'Team Section', 'bdevs-elementor' );
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
		return 'eicon-posts-justified';
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
		return [ 'teamsection', 'carousel' ];
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
			'section_content_team_section',
			[
				'label' => esc_html__( 'Team Section', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Text heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text heading', 'bdevs-elementor' ),
				'default'     => __( 'Join the team today', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Text Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your text title', 'bdevs-elementor' ),
				'default'     => __( 'Open Job Positions', 'bdevs-elementor' ),
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
						'name'        => 'icon_item',
						'label'       => esc_html__( 'Icon Item', 'bdevs-elementor' ),
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
						'name'        => 'subtitle_item',
						'label'       => esc_html__( 'SubTitle Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'link_btn_item',
						'label'       => esc_html__( 'Link Button Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'text_btn_item',
						'label'       => esc_html__( 'Text Button Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'content_item',
						'label'       => esc_html__( 'Content Item', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
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
								'name'        => 'text_list_item',
								'label'       => esc_html__( 'Text List Item', 'bdevs-elementor' ),
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


		$this->end_controls_section();

	}

	public function render() {
	$settings  = $this->get_settings_for_display();
	extract($settings);
	?>

<section id="team-2" class="pb-60 team-section division">
	<div class="container">	
		<div class="row justify-content-center">	
			<div class="col-lg-10 col-xl-8">
				<div class="section-title title-01 mb-70">
					<?php if (('' != $settings['heading']) && ($settings['show_heading'])): ?>
						<span class="section-id"><?php echo wp_kses_post($settings['heading']); ?></span>
					<?php endif; ?>
					<?php if (('' != $settings['title']) && ($settings['show_title'])): ?>
						<h2 class="h2-md"><?php echo wp_kses_post($settings['title']); ?></h2>
					<?php endif; ?>	
				</div>	
			</div>
		</div>	
		<div class="team-members-wrapper">
			<div class="col-md-12">
				<div class="masonry-wrap grid-loaded">
					<?php
					$i = 0;
					foreach ( $settings['tabs'] as $item ) : 
						$i ++;
					?>
						<?php if (('' != $item['title_item']) || ('' != $item['subtitle_item']) || ('' != $item['content_item']) || ('' != $item1['text_list_item'])): ?>
							<div class="masonry-image">
								<div class="career-box bg--white-smoke wow fadeInUp" data-wow-delay="<?php echo esc_attr($i*0.3) ; ?>s">
									<div class="rel career-box-title clearfix">
										<?php if ('' != $item['icon_item']): ?>
											<div class="career-box-ico ico-70 black--color clearfix">
												<span class="<?php echo wp_kses_post($item['icon_item']); ?>"></span>
											</div>
										<?php endif; ?>
										<div class="career-box-title-txt color-01 clearfix">
											<?php if ('' != $item['title_item']): ?>
												<h5 class="h5-lg"><?php echo wp_kses_post($item['title_item']); ?></h5>
											<?php endif; ?>
											<?php if ('' != $item['subtitle_item']): ?>
												<p class="txt-upcase"><?php echo wp_kses_post($item['subtitle_item']); ?></p>
											<?php endif; ?>
										</div>
										<?php if (('' != $item['link_btn_item']) && ($item['text_btn_item'] != '')): ?>
											<div class="career-box-btn">
												<a href="<?php echo wp_kses_post($item['link_btn_item']); ?>" class="btn btn-sm tra-black--btn rose--hover">
													<?php echo wp_kses_post($item['text_btn_item']); ?>
												</a>
											</div>
										<?php endif; ?>
									</div>
									<div class="rel career-box-txt">
										<?php if ('' != $item['content_item']): ?>
											<p class="p-lg">
												<?php echo wp_kses_post($item['content_item']); ?>
											</p>
										<?php endif; ?>
										<ul class="simple-list">
											<?php
											foreach ( $item['list_item'] as $item1 ) : 
											?>
												<?php if ('' != $item1['text_list_item']): ?>
													<li class="list-item">
														<p class="p-lg"><?php echo wp_kses_post($item1['text_list_item']); ?></p>
													</li>
												<?php endif ?>
											<?php endforeach; ?>
										</ul>
									</div>	
								</div>									
							</div>
						<?php endif; ?>

					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
}

}