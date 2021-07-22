<?php
/**
 * Register the customizer and all of its components
 *
 * @since 1.0.0
 */



/**
 * Customize the default sections from WP
 * 
 * @since 1.0.0
 */
add_action( 'customize_register', 'alvar_modify_wp_customizer_sections' );

if ( ! function_exists( 'alvar_modify_wp_customizer_sections' ) ) {

	function alvar_modify_wp_customizer_sections( $wp_customize ) {
		
		/**
		 * Modify default sections
		 *
		 * @since 1.0.0
		 */
		
		// Remove the Colors section
		$wp_customize->remove_section( 'colors' );
		
		// Remove the Background Image section
		$wp_customize->remove_section( 'background_image' );
		
		// Move the Site Identity section to the top
		$wp_customize->get_section( 'title_tagline' )->priority = 0;
		
	}

}


		
/**
 * Build the theme customizer sections
 * Only run if the Kirki plugin is active
 *
 * @since 1.0.0
 */

// 20 = priority later than 11 that the UXBARN Portfolio plugin uses when registering cpt and tax
// It is required so the terms in portfolio options can be loaded properly
add_action( 'init', 'alvar_init_customizer', 20 ); 

if ( ! function_exists( 'alvar_init_customizer' ) ) {

	function alvar_init_customizer() {
		
		if ( class_exists( 'Kirki' ) ) {
			
			/**
			 * Include customizer functions
			 */
			require_once( get_template_directory() . '/includes/customizer/customizer-functions.php' );
			
			/**
			 * Add the theme configuration
			 */
			Kirki::add_config( 'uxbarn_alvar', array(
				'capability'    => 'edit_theme_options',
				'option_type'   => 'theme_mod',
			) );
			
			/**
			 * Create sections and controls
			 */
			
			// Site Identity (Default WP Section)
			require_once( get_template_directory() . '/includes/customizer/section-site-identity.php' );
			// Typography
			require_once( get_template_directory() . '/includes/customizer/section-typography.php' );
			// Site Background Styles
			require_once( get_template_directory() . '/includes/customizer/section-site-background-styles.php' );
			// Menu Section Styles
			require_once( get_template_directory() . '/includes/customizer/section-menu-section-styles.php' );
			// Content Styles
			require_once( get_template_directory() . '/includes/customizer/section-content-styles.php' );
			// Footer Widget Area Styles
			require_once( get_template_directory() . '/includes/customizer/section-footer-widget-area-styles.php' );
			// Form Styles
			require_once( get_template_directory() . '/includes/customizer/section-form-styles.php' );
			// Other Styles
			require_once( get_template_directory() . '/includes/customizer/section-other-styles.php' );
			// General Options
			require_once( get_template_directory() . '/includes/customizer/section-general-options.php' );
			// Portfolio Styles
			require_once( get_template_directory() . '/includes/customizer/section-portfolio-styles.php' );
			// Portfolio Options
			require_once( get_template_directory() . '/includes/customizer/section-portfolio-options.php' );
			
		}
		
	}

}
	

