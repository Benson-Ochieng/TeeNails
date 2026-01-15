<?php
/**
 * Plugin Name: Meta Box
 * Plugin URI:  https://metabox.io
 * Description: Create custom meta boxes and custom fields in WordPress.
 * Version:     5.3.3
 * Author:      MetaBox.io
 * Author URI:  https://metabox.io
 * License:     GPL2+
 * Text Domain: meta-box
 * Domain Path: /languages/
 * 
 * @package Meta Box
 */

if ( defined( 'ABSPATH' ) && ! defined( 'RWMB_VER' ) ) {
	register_activation_hook( __FILE__, 'rwmb_check_php_version' );

	/**
	 * Display notice for old PHP version.
	 */
	function rwmb_check_php_version() {
		if ( version_compare( phpversion(), '5.3', '<' ) ) {
			die( esc_html__( 'Meta Box requires PHP version 5.3+. Please contact your host to upgrade.', 'meta-box' ) );
		}
	}




	require_once dirname( __FILE__ ) . '/inc/loader.php';
	$rwmb_loader = new RWMB_Loader();
	$rwmb_loader->init();


	add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {

	$prefix = '_cmb_';


	//Add other metaboxs as needed

	


  // Open Code


	$meta_boxes[] = array(
		'id'         => 'post_setting',
		'title'      => 'Post Setting',
		'pages'      => array('post'), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields' => array(
			array(
				'name' => 'Content Excerpt Blog Grid',
				'desc' => 'Content excerpt show in blog grid',
				'default' => '',
				'id' => $prefix . 'content_excerpt_1',
				'type' => 'textarea'
			),
			array(
				'name' => 'Content Excerpt Blog List',
				'desc' => 'Content excerpt show in blog list',
				'default' => '',
				'id' => $prefix . 'content_excerpt_2',
				'type' => 'textarea'
			),
			array(
				'name' => 'Featured Image 2',
				'desc' => 'Featured image 2 show in other page',
				'default' => '',
				'id' => $prefix . 'image_recent',
				'type' => 'file'
			),
			array(
				'name' => 'Share Social',
				'desc' => 'Share Social Post',
				'default' => '',
				'id' => $prefix . 'share_social',
				'type' => 'textarea'
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'pages_setting',
		'title'      => 'Pages Setting',
		'pages'      => array('page'), // Pages type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
		'fields' => array(
			array(
				'name' 		=> 'Make Menu Transparent',
				'desc' 		=> 'Check this option if you want to display main menu in transparent (Apply to Page Templage)',
				'std'  		=> 0, // 0 or 1
				'id' 		=> $prefix . 'menu_transparent',
				'type' 		=> 'checkbox'
			),
			array(
				'name' 		=> 'Hide Button Menu',
				'desc' 		=> 'Check this option if you want to hide default button menu',
				'std'  		=> 0, // 0 or 1
				'id' 		=> $prefix . 'hide_button',
				'type'		=> 'checkbox'
			),
			array(
				'name' 		=> 'Text Button Menu',
				'desc' 		=> 'Text button menu',
				'default' 	=> 'Contacts',
				'id' 		=> $prefix . 'text_button',
				'type' 		=> 'text'
			),
			array(
				'name' 		=> 'Link Button Menu',
				'desc' 		=> 'Link button menu',
				'default' 	=> '#',
				'id' 		=> $prefix . 'link_button',
				'type' 		=> 'textarea'
			),
			array(
				'name' 		=> 'Hide Menu Layout',
				'desc' 		=> 'Check this option if you want to hide main menu layout',
				'std'  		=> 0, // 0 or 1
				'id' 		=> $prefix . 'menu_layout',
				'type' 		=> 'checkbox'
			),
		)
	);



	

// End Code
	return $meta_boxes;
});
}