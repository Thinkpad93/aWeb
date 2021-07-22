<?php
/**
 * Customizer: Site Background Styles
 *
 * @since 1.0.0
 */

Kirki::add_section( 'alvar_ctmzr_site_background', array(
	'title'      => esc_attr__( 'Site Background Styles', 'alvar' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
) );



/**
 * Background Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_background_background_color',
	'label'    			=> esc_attr__( 'Background Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_site_background',
	'default'  			=> '#f8f8f8',
	'output' 			=> array(
								array(
									'element' => 'body',
									'property' => 'background-color',
									'suffix'  => '',
								),
							),
) );



/**
 * Background Image
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_background_background_image',
	'label'    			=> esc_attr__( 'Background Image', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'image',
	'section'  			=> 'alvar_ctmzr_site_background',
	'default'  			=> '',
	'output' 			=> array(
								array(
									'element' => 'body',
									'property' => 'background-image',
									'suffix'  => '',
								),
							),
) );



/**
 * Make Background Image Full Screen
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_background_full_screen',
	'label'    			=> esc_attr__( 'Make it fit and fixed in the viewport', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'checkbox',
	'section'  			=> 'alvar_ctmzr_site_background',
	'default'  			=> '',
) );