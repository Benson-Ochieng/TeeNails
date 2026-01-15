<?php 
$lanotte_redux_demo = get_option('redux_demo');
// require_once get_template_directory() . '/framework/widget/recent-post.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';
function lanotte_theme_setup(){  
/*
 * This theme uses a custom image size for featured images, displayed on
 * "standard" posts and pages.
 */
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );
	$lang = get_template_directory_uri() . '/languages';
	load_theme_textdomain('lanotte', $lang);
	add_theme_support( 'post-thumbnails' );
	add_filter('wpcf7_autop_or_not', '__return_false');
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );
	// Switches default core markup for search form, comment form, and comments
	// to output valid HTML5.
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	// This theme uses wp_nav_menu() in one location. 
	register_nav_menus( array(
	'primary' 		=>  esc_html__( 'Primary Navigation Menu.', 'lanotte' ),
	'homeleft' 		=>  esc_html__( 'Home Left Navigation Menu.', 'lanotte' ),
	'homeright' 	=>  esc_html__( 'Home Right Navigation Menu.', 'lanotte' ),
	'homemenu' 		=>  esc_html__( 'Home Navigation Menu.', 'lanotte' ),
	'layoutmenu' 	=>  esc_html__( 'Layout Navigation Menu.', 'lanotte' ),
	));
}
add_action( 'after_setup_theme', 'lanotte_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;
function lanotte_theme_scripts_styles(){
	$lanotte_redux_demo = get_option('redux_demo');
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
	wp_enqueue_style('flaticon', get_template_directory_uri().'/assets/css/flaticon.css');
	wp_enqueue_style('lanotte-menu', get_template_directory_uri().'/assets/css/menu.css');
	wp_enqueue_style('fade-down', get_template_directory_uri().'/assets/css/dropdown-effects/fade-down.css');
	wp_enqueue_style('magnific-popup', get_template_directory_uri().'/assets/css/magnific-popup.css');
	wp_enqueue_style('flexslider', get_template_directory_uri().'/assets/css/flexslider.css');
	wp_enqueue_style('owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.min.css');
	wp_enqueue_style('owl-theme', get_template_directory_uri().'/assets/css/owl.theme.default.min.css');
	wp_enqueue_style('datetimepicker', get_template_directory_uri().'/assets/css/datetimepicker.min.css');
	wp_enqueue_style('lanotte-style', get_template_directory_uri().'/assets/css/style.css');
	wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.css');
	wp_enqueue_style('responsive', get_template_directory_uri().'/assets/css/responsive.css');
	wp_enqueue_style('lanotte-css', get_stylesheet_uri(), array(), '2023-03-02');
	if(isset($lanotte_redux_demo['rtl']) && $lanotte_redux_demo['rtl']==1){
	wp_enqueue_style( 'rtl', get_template_directory_uri().'/rtl.css');  }
	if(isset($lanotte_redux_demo['chosen-color']) && $lanotte_redux_demo['chosen-color']==1){
	wp_enqueue_style( 'color', get_template_directory_uri().'/framework/color.php');
	} 
	wp_enqueue_style( 'googlefonts-1', 'https://fonts.googleapis.com/css2?family=Catamaran:wght@300;400;500;700;800&display=swap', array(), null );
	wp_enqueue_style( 'googlefonts-2', 'https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap', array(), null );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('lanotte-jquery', get_template_directory_uri().'/assets/js/jquery-3.6.0.min.js', array(), false, true);
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js', array(), false, true);
	wp_enqueue_script('modernizr-custom', get_template_directory_uri().'/assets/js/modernizr.custom.js', array(), false, true);
	wp_enqueue_script('jquery-easing', get_template_directory_uri().'/assets/js/jquery.easing.js', array(), false, true);
	wp_enqueue_script('jquery-appear', get_template_directory_uri().'/assets/js/jquery.appear.js', array(), false, true);
	wp_enqueue_script('jquery-scrollto', get_template_directory_uri().'/assets/js/jquery.scrollto.js', array(), false, true);
	wp_enqueue_script('menu', get_template_directory_uri().'/assets/js/menu.js', array(), false, true);
	wp_enqueue_script('materialize', get_template_directory_uri().'/assets/js/materialize.js', array(), false, true);
	wp_enqueue_script('datetimepicker', get_template_directory_uri().'/assets/js/datetimepicker.js', array(), false, true);
	wp_enqueue_script('jquery-vide', get_template_directory_uri().'/assets/js/jquery.vide.min.js', array(), false, true);
	wp_enqueue_script('imagesloaded', get_template_directory_uri().'/assets/js/imagesloaded.pkgd.min.js', array(), false, true);
	wp_enqueue_script('isotope', get_template_directory_uri().'/assets/js/isotope.pkgd.min.js', array(), false, true);
	wp_enqueue_script('jquery-flexslider', get_template_directory_uri().'/assets/js/jquery.flexslider.js', array(), false, true);
	wp_enqueue_script('owl-carousel', get_template_directory_uri().'/assets/js/owl.carousel.min.js', array(), false, true);
	wp_enqueue_script('magnific-popup', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js', array(), false, true);
	// wp_enqueue_script('booking-form', get_template_directory_uri().'/assets/js/booking-form.js', array(), false, true);
	// wp_enqueue_script('contact-form', get_template_directory_uri().'/assets/js/contact-form.js', array(), false, true);
	// wp_enqueue_script('comment-form', get_template_directory_uri().'/assets/js/comment-form.js', array(), false, true);
	wp_enqueue_script('jquery-validate', get_template_directory_uri().'/assets/js/jquery.validate.min.js', array(), false, true);
	// wp_enqueue_script('jquery-ajaxchimp', get_template_directory_uri().'/assets/js/jquery.ajaxchimp.min.js', array(), false, true);
	wp_enqueue_script('lanotte-wow', get_template_directory_uri().'/assets/js/wow.js', array(), false, true);
	wp_enqueue_script('lanotte-custom', get_template_directory_uri().'/assets/js/custom.js', array(), false, true);
	wp_enqueue_script('lanotte-changer', get_template_directory_uri().'/assets/js/changer.js', array(), false, true);
	wp_enqueue_script('lanotte-styleswitch', get_template_directory_uri().'/assets/js/styleswitch.js', array(), false, true);
}
add_action( 'wp_enqueue_scripts', 'lanotte_theme_scripts_styles' );
// Widget Sidebar
function lanotte_widgets_init() 
{
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Section 1', 'lanotte' ),
		'id'            => 'footer-1',        
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'lanotte' ),        
		'before_widget' => '<div class="col-sm-6 col-lg-4 width-100">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => ''
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Section 2', 'lanotte' ),
		'id'            => 'footer-2',        
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'lanotte' ),        
		'before_widget' => '<div class="col-sm-6 col-lg-4">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => ''
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Section 3', 'lanotte' ),
		'id'            => 'footer-3',        
		'description'   => esc_html__( 'Appears in the footer section of the site.', 'lanotte' ),        
		'before_widget' => '<div class="col-sm-6 col-lg-3">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => ''
	) );
}
add_action( 'widgets_init', 'lanotte_widgets_init' );
function lanotte_search_form( $form ) {
	$form = '
	<div class="search-bx">
		<form role="search" action="'.esc_url(home_url('/')).'">
			<div class="input-group">
				<input name="s" type="text" class="form-control" placeholder="'.esc_attr__('Write your text', 'lanotte').'"  value="' . get_search_query() . '">
				<span class="input-group-btn">
					<button class="site-button"><i class="fa fa-search"></i></button>
				</span>
			</div>
		</form>
	</div>
	';
	return $form;
}
add_filter( 'get_search_form', 'lanotte_search_form' );
// Comment Form
function lanotte_theme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
	<?php
	  if(get_avatar($comment,$size='68' )!=''){?>
	  	<div class="comment d-flex">
			<?php echo get_avatar($comment ); ?>
			<div class="comment-body">
				<div class="comment-meta">
					<h6 class="h6-lg"><?php printf( get_comment_author_link()) ?></h6>						
					<span class="comment-date"><?php comment_date('jS F Y'); ?> - </span>
					<span class="btn-reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
				</div>
				<?php comment_text(); ?>
			</div>
		</div>
	<?php }else{?>
		<div class="comment d-flex">
			<div class="comment-body">
				<div class="comment-meta">
					<h6 class="h6-lg"><?php printf( get_comment_author_link()) ?></h6>						
					<span class="comment-date"><?php comment_date('jS F Y'); ?> - </span>
					<span class="btn-reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
				</div>
				<?php comment_text(); ?>
			</div>
		</div>
<?php }?>
<?php
}
function lanotte_excerpt_1() {
	$lanotte_redux_demo = get_option('redux_demo');
	if(isset($lanotte_redux_demo['blog_excerpt'])){
	$limit = $lanotte_redux_demo['blog_excerpt'];
	}else{
	$limit = 40;
	}
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
	} else {
	$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}
function lanotte_excerpt_2() {
	$lanotte_redux_demo = get_option('redux_demo');
	if(isset($lanotte_redux_demo['blog_excerpt'])){
	$limit = $lanotte_redux_demo['blog_excerpt'];
	}else{
	$limit = 10;
	}
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt).'...';
	} else {
	$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}
function lanotte_pagination($pages='') {
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	if($pages==''){
		global $wp_query;
		 $pages = $wp_query->max_num_pages;
		 if(!$pages)
		 {
			 $pages = 1;
		 }
	}
	$pagination = array(
		'base'          => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
		'format'        => '',
		'current'       => max( 1, get_query_var('paged') ),
		'total'         => $pages,
		'prev_text'     => wp_specialchars_decode('<i class="fa-solid fa-angle-left"></i>',ENT_QUOTES),
		'next_text'     => wp_specialchars_decode('<i class="fa-solid fa-angle-right"></i>',ENT_QUOTES),
		'type'          => 'list',
		'end_size'      => 3,
		'mid_size'      => 3
);
	$return = paginate_links( $pagination );
	echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination justify-content-center">', $return );
}


/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'lanotte_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function lanotte_theme_register_required_plugins(){
	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
            'name'      => esc_html__( 'One Click Demo Import', 'lanotte' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ), 
     	array(
            'name'      => esc_html__( 'Classic Editor', 'lanotte' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ), 
        array(
            'name'      => esc_html__( 'Jetpack VideoPress', 'lanotte' ),
            'slug'      => 'jetpack-videopress',
            'required'  => true,
        ),
        array(
            'name'      => esc_html__( 'Font Awesome', 'lanotte' ),
            'slug'      => 'font-awesome',
            'required'  => true,
        ), 
        array(
            'name'      => esc_html__( 'Font Awesome', 'lanotte' ),
            'slug'      => 'font-awesome',
            'required'  => true,
        ), 
      	array(
            'name'      => esc_html__( 'Menu Image', 'lanotte' ),
            'slug'      => 'menu-image',
            'required'  => true,
        ),
      	array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'lanotte' ),
            'slug'      => 'widget-importer-&-exporter',
            'required'  => true,
        ), 
      	array(
            'name'      => esc_html__( 'Contact Form 7', 'lanotte' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ), 
      	array(
            'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'lanotte' ),
            'slug'      => 'wp-maximum-execution-time-exceeded',
            'required'  => true,
        ), 
      	array(
            'name'                     => esc_html__( 'Elementor', 'lanotte' ),
            'slug'                     => 'elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/elementor.zip',
        ),
      	array(
            'name'                     => esc_html__( 'Lanotte Common', 'lanotte' ),
            'slug'                     => 'lanotte-common',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/lanotte-common.zip',
        ),
      	array(
            'name'                     => esc_html__( 'Lanotte Elementor', 'lanotte' ),
            'slug'                     => 'lanotte-elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/lanotte-elementor.zip',
        ),
    );
	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'default_path' => '',                      // Default absolute path to pre-packaged plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'lanotte' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'lanotte' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'lanotte' ), // %s = plugin name.
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'lanotte' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'lanotte' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'lanotte' ), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'lanotte' ), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'lanotte' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'lanotte' ), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'lanotte' ), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'lanotte' ), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'lanotte' ), // %1$s = plugin name(s).
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'lanotte' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'lanotte' ),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'lanotte' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'lanotte' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'lanotte' ), // %s = dashboard link.
			'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
	);
	tgmpa( $plugins, $config );
}
?>