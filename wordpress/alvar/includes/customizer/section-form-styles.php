<?php
/**
 * Customizer: Form Styles
 *
 * @since 1.0.0
 */

Kirki::add_section( 'alvar_ctmzr_form_styles', array(
	'title'      => esc_attr__( 'Form Styles', 'alvar' ),
	'priority'   => 26,
	'capability' => 'edit_theme_options',
) );



/**
 * Input Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_form_styles_input_text_color',
	'label'    			=> esc_attr__( 'Input Text Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_form_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => 'input[type="text"], input[type="password"], input[type="email"], input[type="search"], input[type="number"], input[type="url"], textarea, select',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Input Border Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_form_styles_input_border_color',
	'label'    			=> esc_attr__( 'Input Border Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_form_styles',
	'default'  			=> '#cccccc',
	'output' 			=> array(
								array(
									'element' => 'input[type="text"], input[type="password"], input[type="email"], input[type="search"], input[type="number"], input[type="url"], textarea, select',
									'property' => 'border-color',
									'suffix'  => '',
								),
							),
) );



/**
 * Input Background Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_form_styles_input_bg_color',
	'label'    			=> esc_attr__( 'Input Background Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_form_styles',
	'default'  			=> '#ffffff',
	'output' 			=> array(
								array(
									'element' => 'input[type="text"], input[type="password"], input[type="email"], input[type="search"], input[type="number"], input[type="url"], textarea, select',
									'property' => 'background-color',
									'suffix'  => '',
								),
							),
) );



/**
 * Input Active Border Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_form_styles_input_active_bg_color',
	'label'    			=> esc_attr__( 'Input Active Border Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_form_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => 'input:focus, textarea:focus',
									'property' => 'border-color',
									'suffix'  => '',
								),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_form_styles_separator1',
	'section'     => 'alvar_ctmzr_form_styles',
	'description' => '<br/><br/>',
) );



/**
 * Button Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_form_styles_button_text_color',
	'label'    			=> esc_attr__( 'Button Text Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_form_styles',
	'default'  			=> '#ffffff',
	'output' 			=> array(
								array(
									'element' => 'input[type="button"], input[type="submit"], button, a.button',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Button Background Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_form_styles_button_bg_color',
	'label'    			=> esc_attr__( 'Button Background Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_form_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => 'input[type="button"], input[type="submit"], button, a.button',
									'property' => 'background-color',
									'suffix'  => '',
								),
							),
) );