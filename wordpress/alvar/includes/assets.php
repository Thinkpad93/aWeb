<?php
/**
 * Collection of the functions for loading JS and CSS in the theme
 *
 * @since 1.0.0
 */



if ( ! function_exists( 'alvar_load_theme_assets' ) ) {
	
	function alvar_load_theme_assets() {
		
		alvar_load_theme_css();
		alvar_load_theme_js();
		
	}
	
}



if ( ! function_exists( 'alvar_load_theme_css' ) ) {
	
	function alvar_load_theme_css() {
		
		// Enqueue all CSS
		wp_enqueue_style( 'alvar-google-fonts', alvar_get_google_fonts_url(), array(), null );
		wp_enqueue_style( 'ionicon', get_template_directory_uri() . '/css/ionicons.min.css', array(), null );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), null );
		wp_enqueue_style( 'jquery-mmenu', get_template_directory_uri() . '/css/jquery.mmenu.all.css', array(), null );
		
		$is_wp_lightbox_enabled = get_theme_mod( 'alvar_ctmzr_general_options_enable_lightbox_wp_images', true );
		$is_portfolio_lightbox_enabled = get_theme_mod( 'alvar_ctmzr_portfolio_options_enable_lightbox', true );
		
		if ( $is_wp_lightbox_enabled || $is_portfolio_lightbox_enabled ) {
			
			wp_enqueue_style( 'jquery-fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css', array(), null );
			wp_enqueue_style( 'jquery-fancybox-helpers-thumbs', get_template_directory_uri() . '/css/fancybox/helpers/jquery.fancybox-thumbs.css', array(), null );
			wp_enqueue_style( 'jquery-fancybox-helpers-buttons', get_template_directory_uri() . '/css/fancybox/helpers/jquery.fancybox-buttons.css', array(), null );
			
		}
		
		if ( is_page_template( 'template-featured-works.php' ) || is_page_template( 'template-all-works.php' ) || is_tax( 'uxbarn_portfolio_tax' ) ) {
			wp_enqueue_style( 'flickity', get_template_directory_uri() . '/css/flickity.css', array(), null );
		}
		
		wp_enqueue_style( 'alvar-theme', get_template_directory_uri() . '/style.css', array(), alvar_get_theme_version() );
		
	}
	
}



if ( ! function_exists( 'alvar_load_theme_js' ) ) {
	
	function alvar_load_theme_js() {
		
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-custom.js', array( 'jquery' ), null );
		wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'jquery-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'jquery-mmenu', get_template_directory_uri() . '/js/jquery.mmenu.all.js', array( 'jquery' ), null, true );
		
		$is_wp_lightbox_enabled = get_theme_mod( 'alvar_ctmzr_general_options_enable_lightbox_wp_images', true );
		$is_portfolio_lightbox_enabled = get_theme_mod( 'alvar_ctmzr_portfolio_options_enable_lightbox', true );
		
		if ( $is_wp_lightbox_enabled || $is_portfolio_lightbox_enabled ) {
				
			wp_enqueue_script( 'jquery-fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'jquery-fancybox-helpers-thumbs', get_template_directory_uri() . '/js/fancybox-helpers/jquery.fancybox-thumbs.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'jquery-fancybox-helpers-buttons', get_template_directory_uri() . '/js/fancybox-helpers/jquery.fancybox-buttons.js', array( 'jquery' ), null, true );
			
		}
		
		wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.js', array( 'jquery' ), null, true );
		
		if ( is_page_template( 'template-featured-works.php' ) || is_page_template( 'template-all-works.php' ) || is_tax( 'uxbarn_portfolio_tax' ) ) {
			
			wp_enqueue_script( 'jquery-flex-images', get_template_directory_uri() . '/js/jquery.flex-images.js', array( 'jquery' ), null, true );
			wp_enqueue_script( 'flickity', get_template_directory_uri() . '/js/flickity.pkgd.js', array( 'jquery' ), null, true );
			
		}
		
		wp_enqueue_script( 'alvar-theme', get_template_directory_uri() . '/js/alvar.js', array( 'jquery' ), alvar_get_theme_version(), true );
		
		
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		$params = array(
					'carousel_autoplay_milliseconds'	=> intval( get_theme_mod( 'alvar_ctmzr_portfolio_options_carousel_autoplay_seconds', 5 ) ),
					'justified_images_row_height'		=> intval( get_theme_mod( 'alvar_ctmzr_portfolio_styles_grid_max_row_height', 450 ) ),
					'modal_search_input_text'			=> get_theme_mod( 'alvar_ctmzr_general_options_search_placeholder_text', esc_html__( 'Type and hit enter', 'alvar' ) ),
					'show_search_button'				=> get_theme_mod( 'alvar_ctmzr_general_options_show_search_button', false ),
					'enable_lightbox_wp_gallery' 		=> get_theme_mod( 'alvar_ctmzr_general_options_enable_lightbox_wp_images', true ),
				);
		
		wp_localize_script( 'alvar-theme', 'ThemeOptions', $params );
		
	}
	
}



if ( ! function_exists( 'alvar_load_admin_assets' ) ) {
	
	function alvar_load_admin_assets( $page ) {
		
		wp_enqueue_style( 'alvar-google-fonts', alvar_get_google_fonts_url(), array(), null );
		wp_enqueue_style( 'ionicon', get_template_directory_uri() . '/css/ionicons.min.css', array(), null );
		wp_enqueue_style( 'alvar-backend', get_template_directory_uri() . '/css/alvar-backend.css', array(), null );
		
		// @since 2.0.0
		wp_enqueue_script( 'alvar-backend', get_template_directory_uri() . '/js/alvar-backend.js', array( 'jquery' ), alvar_get_theme_version(), true );
		
		$params = array(
					'migrating_text' => esc_html__( 'Migrating...', 'alvar' ),
				);
		wp_localize_script( 'alvar-backend', 'ThemeBackendParams', $params );
		
	}
	
}



if ( ! function_exists( 'alvar_load_customizer_assets' ) ) {
	
	function alvar_load_customizer_assets() {
		
		wp_enqueue_style( 'alvar-customizer', get_template_directory_uri() . '/css/customizer.css', array(), null );
		
	}
	
}