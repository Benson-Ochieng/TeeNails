<?php
/**
 * Plugin Name: Lanotte Elementor
 * Description: Create unlimited widgets with Elementor Page Builder.
 * Plugin URI:  http://shtheme.com/
 * Version:     1.0.0
 * Author:      Nasir Uddin Mandal
 * Author URI:  http://shtheme.com
 * Text Domain: bdevs-elementor
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Bdevs Elementor Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class BdevsElementor {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.5';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var BdevsElementor The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return BdevsElementor An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'bdevs-elementor' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		add_action( 'elementor/init', [ $this, 'add_elementor_category' ], 1 );

		// Add Plugin actions
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_frontend_scripts' ], 10 );

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_frontend_styles' ] );

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

		// Register controls
		//add_action( 'elementor/controls/controls_registered', [ $this, 'register_controls' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'bdevs-elementor' ),
			'<strong>' . esc_html__( 'Lanotte Elementor', 'bdevs-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bdevs-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bdevs-elementor' ),
			'<strong>' . esc_html__( 'Lanotte Elementor', 'bdevs-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bdevs-elementor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bdevs-elementor' ),
			'<strong>' . esc_html__( 'Lanotte Elementor', 'bdevs-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'bdevs-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Add Elementor category.
	 */
	public function add_elementor_category() {
    	\Elementor\Plugin::instance()->elements_manager->add_category('bdevs-elementor',
	      	array(
					'title' => __( 'Lanotte Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	}
	

	/**
	* Register Frontend Scripts
	*
	*/
	public function register_frontend_scripts() {
	wp_register_script( 'bdevs-elementor', plugin_dir_url( __FILE__ ) . 'assets/js/bdevs-elementor.js', array( 'jquery' ), self::VERSION );
	}


	/**
	* Register Frontend styles
	*
	*/
	public function register_frontend_styles() {
	wp_register_style( 'bdevs-elementor', plugin_dir_url( __FILE__ ) . 'assets/css/bdevs-elementor.css', self::VERSION );
	}






	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() { 

		// Include Widget files
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/section-slides.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/about-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/service-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/about2-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/about3-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/testimonials-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/promo-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/brand-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/blog-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/gallery-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/service2-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/booking-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/banner-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/team-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/video-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/contact-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/contact-form-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/promo2-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/faqs-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/banner2-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/gallery2-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/banner3-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/about4-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/cards-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/about5-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/pricing-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/pricing2-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/page/team2-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/slides-home1.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/service3-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/gallery3-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/slides-home2.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/video2-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/slides-home3.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/pricing3-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/slides-home5.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/slides-home6.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/newletter-section.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/slides-home7.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/slides-home8.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/slides-home9.php';

		


		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSectionSlides() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsServiceSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAbout2Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAbout3Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTestimonialsSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsPromoSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBrandSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsGallerySection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsService2Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBookingSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBannerSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTeamSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsVideoSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsContactSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsContactFormSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsPromo2Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsFAQsSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBanner2Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsGallery2Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBanner3Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAbout4Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsCardsSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAbout5Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsPricingSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsPricing2Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTeam2Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSlidesHome1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsService3Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsGallery3Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSlidesHome2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsVideo2Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSlidesHome3() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsPricing3Section() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSlidesHome5() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSlidesHome6() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsNewLetterSection() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSlidesHome7() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSlidesHome8() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSlidesHome9() );



	}

	/** 
	 * register_controls description
	 * @return [type] [description]
	 */
	public function register_controls() {

		$controls_manager = \Elementor\Plugin::$instance->controls_manager;
		$controls_manager->register_control( 'slider-widget', new Test_Control1() );
	
	}

	/**
	 * Prints the Elementor Page content.
	 */
	public static function get_content( $id = 0 ) {
		if ( class_exists( '\ElementorPro\Plugin' ) ) {
			echo do_shortcode( '[elementor-template id="' . $id . '"]' );
		} else {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );
		}
	}

}

BdevsElementor::instance();
