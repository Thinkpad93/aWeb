<?php
/**
 * Customizer: Footer Widget Area Styles
 *
 * @since 1.0.0
 */

Kirki::add_section( 'alvar_ctmzr_footer_widget_area_styles', array(
	'title'      => esc_attr__( 'Footer Widget Area Styles', 'alvar' ),
	'priority'   => 25,
	'capability' => 'edit_theme_options',
) );



/**
 * Show Footer Widget Area?
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_footer_widget_area_styles_show_footer_widget_area',
	'label'    			=> esc_attr__( 'Show Footer Widget Area?', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'switch',
	'section'  			=> 'alvar_ctmzr_footer_widget_area_styles',
	'default'  			=> '1',
	'choices' 			=> array(
								'on' 	=> esc_attr__( 'Yes', 'alvar' ),
								'off' 	=> esc_attr__( 'No', 'alvar' ),
							),
) );



/**
 * Number of Columns for Footer Widget Area
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_footer_widget_area_styles_footer_widget_area_column_number',
	'label'    			=> esc_attr__( 'Number of Columns for Footer Widget Area', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_footer_widget_area_styles',
	'default'  			=> '4',
	'multiple'			=> 1,
	'choices'     		=> array(
								'1'  => esc_attr__( '1 Column', 'alvar' ),
								'2'  => esc_attr__( '2 Columns', 'alvar' ),
								'3'  => esc_attr__( '3 Columns', 'alvar' ),
								'4'  => esc_attr__( '4 Columns', 'alvar' ),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_footer_widget_area_styles_separator10',
	'section'     => 'alvar_ctmzr_footer_widget_area_styles',
	'description' => '<br/><br/>',
) );



/**
 * Widget Title Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_footer_widget_area_styles_widget_title_size',
	'label'    			=> esc_attr__( 'Widget Title Size', 'alvar' ),
	'tooltip' 			=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_footer_widget_area_styles',
	'default'  			=> '12px',
	'output' 			=> array(
								array(
									'element' => '.widget-title',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * Widget Title Font Weight
 * 
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_footer_widget_area_styles_widget_title_font_weight',
	'label'    			=> esc_attr__( 'Widget Title Font Weight', 'alvar' ),
	'description' 		=> '',
	'tooltip'      		=> esc_attr__( 'It also depends on the typeface if it supports the selected weight or not.', 'alvar' ),
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_footer_widget_area_styles',
	'default'  			=> '700',
	'multiple'			=> 1,
	'choices'     		=> alvar_ctmzr_get_font_weight_list(),
	'output' 			=> array(
								array(
									'element' => '.widget-title',
									'property' => 'font-weight',
									'suffix'  => '',
								),
							),
) );



/**
 * Widget Title Letter Spacing
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_footer_widget_area_styles_widget_title_letter_spacing',
	'label'    			=> esc_attr__( 'Widget Title Letter Spacing (px)', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_footer_widget_area_styles',
	'default'  			=> '1.5',
	'choices'     		=> array(
								'min'  => 0,
								'step' => 0.1,
							),
	'output' 			=> array(
								array(
									'element' => '.widget-title',
									'property' => 'letter-spacing',
									'suffix'  => 'px',
								),
							),
) );



/**
 * Widget Title Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_footer_widget_area_styles_widget_title_color',
	'label'    			=> esc_attr__( 'Widget Title Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_footer_widget_area_styles',
	'default'  			=> '#ffffff',
	'output' 			=> array(
								array(
									'element' => '.widget-title',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_footer_widget_area_styles_separator0',
	'section'     => 'alvar_ctmzr_footer_widget_area_styles',
	'description' => '<br/><br/>',
) );



/**
 * Text Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_footer_widget_area_styles_text_size',
	'label'    			=> esc_attr__( 'Widget Text Size', 'alvar' ),
	'tooltip'			=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_footer_widget_area_styles',
	'default'  			=> '14px',
	'output' 			=> array(
								array(
									'element' => '.theme-widget-area',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * Widget Text Font Weight
 * 
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_footer_widget_area_styles_widget_text_font_weight',
	'label'    			=> esc_attr__( 'Widget Text Font Weight', 'alvar' ),
	'description' 		=> '',
	'tooltip'      		=> esc_attr__( 'It also depends on the typeface if it supports the selected weight or not.', 'alvar' ),
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_footer_widget_area_styles',
	'default'  			=> '400',
	'multiple'			=> 1,
	'choices'     		=> alvar_ctmzr_get_font_weight_list(),
	'output' 			=> array(
								array(
									'element' => '.theme-widget-area',
									'property' => 'font-weight',
									'suffix'  => '',
								),
							),
) );



/**
 * Widget Link Font Weight
 * 
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_footer_widget_area_styles_widget_link_font_weight',
	'label'    			=> esc_attr__( 'Widget Link Font Weight', 'alvar' ),
	'description' 		=> '',
	'tooltip'      		=> esc_attr__( 'It also depends on the typeface if it supports the selected weight or not.', 'alvar' ),
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_footer_widget_area_styles',
	'default'  			=> '700',
	'multiple'			=> 1,
	'choices'     		=> alvar_ctmzr_get_font_weight_list(),
	'output' 			=> array(
								array(
									'element' => '.theme-widget-area a',
									'property' => 'font-weight',
									'suffix'  => '',
								),
							),
) );



/**
 * Widget Text Letter Spacing
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_footer_widget_area_styles_widget_text_letter_spacing',
	'label'    			=> esc_attr__( 'Widget Text Letter Spacing (px)', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_footer_widget_area_styles',
	'default'  			=> '0',
	'choices'     		=> array(
								'min'  => 0,
								'step' => 0.1,
							),
	'output' 			=> array(
								array(
									'element' => '.theme-widget-area',
									'property' => 'letter-spacing',
									'suffix'  => 'px',
								),
							),
) );



/**
 * Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_footer_widget_area_styles_text_color',
	'label'    			=> esc_attr__( 'Widget Text Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_footer_widget_area_styles',
	'default'  			=> '#cccccc',
	'output' 			=> array(
								array(
									'element' => '.theme-widget-area',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Link Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_footer_widget_area_styles_link_color',
	'label'    			=> esc_attr__( 'Widget Link Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_footer_widget_area_styles',
	'default'  			=> '#ffffff',
	'output' 			=> array(
								array(
									'element' => '.theme-widget-area a',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Footer Background Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_footer_widget_area_styles_bg_color',
	'label'    			=> esc_attr__( 'Footer Background Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_footer_widget_area_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => '.theme-widget-area',
									'property' => 'background',
									'suffix'  => '',
								),
							),
) );