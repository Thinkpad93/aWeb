<?php
/**
 * The main file for setting up and initializing the theme
 *
 * @since 1.0.0
 */
 
 

/**
 * Set up the theme constant(s)
 *
 * @since 1.0.0
 */
define( 'ALVAR_THEME_ROOT_IMAGE_URL', get_template_directory_uri() . '/images/' );
define( 'ALVAR_DEFAULT_GOOGLE_FONTS', 'Arimo:400,400i,700,700i' );



/**
 * Include all the required asset files of the theme.
 *
 * @since 1.0.0
 */
require_once( get_template_directory() . '/includes/assets.php' );
require_once( get_template_directory() . '/includes/theme-functions.php' );
require_once( get_template_directory() . '/includes/class-tgm-plugin-activation.php' );
require_once( get_template_directory() . '/includes/customizer/customizer-init.php' );
require_once( get_template_directory() . '/includes/plugin-codes/custom-plugin-functions.php' );



/**
 * Initialize the theme.
 *
 * @since 1.0.0
 */
add_action( 'after_setup_theme', 'alvar_init_theme' );

if ( ! function_exists( 'alvar_init_theme' ) ) {
	
	function alvar_init_theme() {
		
		// Register WP features
		if ( ! isset( $content_width ) ) {
			$content_width = 665;
		}
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );
		
		/*
		 * This theme styles the visual editor on the backend to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style( array( 'css/editor-style.css', alvar_get_google_fonts_url() ) );
		
		
		
		/*
		 * Register theme scripts and styles
		 * [assets.php]
		 */
		add_action( 'wp_enqueue_scripts', 'alvar_load_theme_assets' );
		add_action( 'admin_enqueue_scripts', 'alvar_load_admin_assets' );
		add_action( 'customize_controls_enqueue_scripts', 'alvar_load_customizer_assets' );
		
		
		
		/*
		 * Register main WP modules
		 * [theme-functions.php]
		 */
		add_action( 'init', 'alvar_register_menus' );
		add_action( 'widgets_init', 'alvar_register_widget_areas' );
		
		
		
		/*
		 * Others
		 * [theme-functions.php]
		 */
		
		// Customize the menu classes
		add_filter( 'nav_menu_css_class', 'alvar_customize_menu_item_classes', 10, 3 );
		
		// Modify the classes in WP post_class() for various locations
		add_filter( 'post_class', 'alvar_modify_post_classes', 10, 3 );
		
		// Modify the classse in WP body_class()
		add_filter( 'body_class', 'alvar_modify_body_classes', 10 );
		
		// Register theme's image sizes
		add_action( 'init', 'alvar_register_theme_image_sizes' );
		
		// Change the WP excerpt length (in words count)
		add_filter( 'excerpt_length', 'alvar_custom_excerpt_length', 999 );
		
		// Modify page titles
		add_filter( 'the_title', 'alvar_modify_page_titles' );
		
		// Adjust posts per page of the search template
		add_action( 'pre_get_posts', 'alvar_adjust_search_posts_per_page' );
		
		// Register required and recommended plugins
		add_action( 'tgmpa_register', 'alvar_register_additional_plugins' );

		// Create a wrapper to the video embed
		$filter_name = 'embed_oembed_html';
		if ( class_exists( 'Jetpack' ) ) {
			$filter_name = 'video_embed_html';
		}
		add_filter( $filter_name, 'alvar_create_video_embed_wrapper', 10, 3 );
		

		
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'alvar', get_template_directory() . '/languages' );
		
	}
	
}



/**
 * PLUGIN CUSTOMIZATION
 */

/**
 * The OpionTree plugin has been deprecated since the theme version 2.0.0.
 * The code below will show an important notification if the OT plugin is still in use.
 * 
 * @since 2.0.0
 */
if ( class_exists( 'OT_Loader' ) ) {
	
	// [custom-plugin-functions.php]
	add_action( 'admin_notices', 'alvar_show_ot_notification' );
	
}

if ( class_exists( 'ACF' ) && class_exists( 'OT_Loader' ) ) {
	
	// [custom-plugin-functions.php]
	add_action( 'admin_notices', 'alvar_show_acf_notification' );
	
}



/**
 * Customize the UXBARN Portfolio plugin by removing and overriding some parts in the theme
 *
 * @since 1.0.0
 */
if ( function_exists( 'uxb_port_init_plugin' ) ) {
	
	require_once( get_template_directory() . '/includes/plugin-codes/custom-fields-portfolio.php' );
	require_once( get_template_directory() . '/includes/plugin-codes/custom-uxbarn-portfolio.php' );

	// Remove plugin image sizes
	remove_action( 'init', 'uxb_port_register_plugin_image_sizes' );
	
	// Remove plugin CSS & JS 
	remove_action( 'wp_enqueue_scripts', 'uxb_port_load_frontend_styles' );
	remove_action( 'wp_enqueue_scripts', 'uxb_port_load_frontend_scripts' );
	remove_action( 'wp_enqueue_scripts', 'uxb_port_load_on_demand_assets' );
	remove_action( 'admin_enqueue_scripts', 'uxb_port_load_admin_assets' );
	
	// Remove plugin meta boxes
	remove_action( 'admin_init', 'uxb_port_create_item_format_setting' );
	remove_action( 'admin_init', 'uxb_port_create_alternate_content' );
	remove_action( 'admin_init', 'uxb_port_create_image_slideshow_format_content' );
	remove_action( 'admin_init', 'uxb_port_create_video_format_content' );
	remove_action( 'admin_init', 'uxb_port_create_meta_info' );
	
	// Remove plugin options
	remove_action( 'init', 'uxb_port_create_plugin_options' );
	
	// Remove plugin functions
	remove_action( 'vc_before_init', 'uxb_port_load_portfolio_element', 11 );
	remove_action( 'init', 'uxb_port_update_element_params', 11 );
	
	// Load custom code for the plugin
	// [custom-uxbarn-portfolio.php]
	add_action( 'init', 'alvar_portfolio_custom' );
	
	
	
	// Register custom meta boxes and fields
	// [custom-fields-portfolio.php]
	// @since 2.0.0
	
	// Custom fields for when any portfolio template is selected
	//add_action( 'acf/init', 'alvar_portfolio_cf_create_portfolio_template_settings' );
	
	// Custom fields for portfolio items
	add_action( 'acf/init', 'alvar_portfolio_cf_create_portfolio_item_settings' );
	
	// These actions are for handling AJAX request for migrating the data from OptionTree to ACF
	add_action( 'wp_ajax_alvar_migrate_custom_field_data', 'alvar_migrate_custom_field_data' );
	add_action( 'wp_ajax_nopriv_alvar_migrate_custom_field_data', 'alvar_migrate_custom_field_data' );
	
}



/**
 * Customize the configuration of the Kirki plugin
 *
 * @since 2.0.0
 */
if ( class_exists( 'Kirki' ) ) {
	
	// [custom-plugin-functions.php]
	add_filter( 'kirki_config', 'alvar_plugin_update_kirki_configuration' );
			
}



/**
 * Customize some options of ACF via its filters and actions.
 *
 * @since 2.0.0
 */

if ( class_exists( 'ACF' ) ) {
	
	// [custom-plugin-functions.php]
	alvar_customize_acf();
	
}



/**
 * DEPRECATED SINCE v2.0.0
 * 
 * Customize some options of OptionTree via its filters and actions.
 *
 * @since 1.0.0
 */

if ( class_exists( 'OT_Loader' ) ) {
	
	// Remove Settings page
	add_filter( 'ot_show_pages', '__return_false' );

	// Remove its default Theme Options menu
	add_filter( 'ot_use_theme_options', '__return_false' );
	
}