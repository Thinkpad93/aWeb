<?php
/**
 * Customizer: Portfolio Styles
 *
 * @since 1.0.0
 */

Kirki::add_section( 'alvar_ctmzr_portfolio_styles', array(
	'title'      => esc_attr__( 'Portfolio Styles', 'alvar' ),
	'priority'   => 40,
	'capability' => 'edit_theme_options',
) );



// General Portfolio Styles
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_styles_title1',
	'section'     => 'alvar_ctmzr_portfolio_styles',
	'description' => '<h2 class="custom-heading">' . esc_html__( 'General Portfolio Styles', 'alvar' ) . '</h2>',
) );



/**
 * Portfolio Title Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_portfolio_title_text_size',
	'label'    			=> esc_attr__( 'Portfolio Item Title Size', 'alvar' ),
	'tooltip'			=> esc_attr__( 'It will be applied to the portfolio titles on the Featured Works and All Works templates. You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> '11px',
	'output' 			=> array(
								array(
									'element' => '.portfolio-title',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_styles_separator4',
	'section'     => 'alvar_ctmzr_portfolio_styles',
	'description'     => '<br/><br/>',
) );



/**
 * Portfolio Loading Icon Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_portfolio_loading_icon_color',
	'label'    			=> esc_attr__( 'Portfolio Loading Icon Color', 'alvar' ),
	'tooltip' 			=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => '.loading-icon',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Portfolio Loading Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_portfolio_loading_text_color',
	'label'    			=> esc_attr__( 'Portfolio Loading Text Color', 'alvar' ),
	'tooltip' 			=> esc_attr__( 'The loading message display on the portfolio Featured Works and All Works templates.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => '.loading-text',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_styles_separator55',
	'section'     => 'alvar_ctmzr_portfolio_styles',
	'description'     => '<br/><hr/><br/>',
) );



// Featured Works Template Styles
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_styles_title2',
	'section'     => 'alvar_ctmzr_portfolio_styles',
	'description' => '<h2 class="custom-heading">' . esc_html__( 'Featured Works Template Styles', 'alvar' ) . '</h2>',
) );



/**
 * Template Display Mode
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_featured_works_display_mode',
	'label'    			=> esc_attr__( 'Template Display Mode', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> 'carousel',
	'multiple'			=> 1,
	'choices'     		=> array(
								'carousel'  => esc_attr__( 'Carousel', 'alvar' ),
								'flexible-grid'  => esc_attr__( 'Flexible Grid', 'alvar' ),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_styles_separator60',
	'section'     => 'alvar_ctmzr_portfolio_styles',
	'description'     => '<br/><br/>',
) );



/**
 * Show Button
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_show_additional_button',
	'label'    			=> esc_attr__( 'Show Additional Link?', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'It displays at the bottom of the portfolio item display, next to the navigation.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'switch',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> '1',
	'choices' 			=> array(
								'on' 	=> esc_attr__( 'Yes', 'alvar' ),
								'off' 	=> esc_attr__( 'No', 'alvar' ),
							),
) );



/**
 * Button Text
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_additional_button_text',
	'label'    			=> esc_attr__( 'Link Text', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> esc_html__( 'View all works', 'alvar' ),
) );



/**
 * Button Target URL
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_additional_button_target_url',
	'label'    			=> esc_attr__( 'Link Target URL', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'Users will be navigated to the specified URL.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> '',
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_styles_separator3',
	'section'     => 'alvar_ctmzr_portfolio_styles',
	'description'     => '<br/><hr/><br/>',
) );



// All Works Template Styles
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_styles_title3',
	'section'     => 'alvar_ctmzr_portfolio_styles',
	'description' => '<h2 class="custom-heading">' . esc_html__( 'All Works Template Styles', 'alvar' ) . '</h2>',
) );



/**
 * Template Display Mode
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_all_works_display_mode',
	'label'    			=> esc_attr__( 'Template Display Mode', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> 'flexible-grid',
	'multiple'			=> 1,
	'choices'     		=> array(
								'carousel'  => esc_attr__( 'Carousel', 'alvar' ),
								'flexible-grid'  => esc_attr__( 'Flexible Grid', 'alvar' ),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_styles_separator59',
	'section'     => 'alvar_ctmzr_portfolio_styles',
	'description'     => '<br/><br/>',
) );



/**
 * Portfolio Category Title Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_portfolio_category_title_size',
	'label'    			=> esc_attr__( 'Portfolio Category Title Size', 'alvar' ),
	'tooltip'			=> esc_attr__( 'The category title displays at the top of the template.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> '12px',
	'output' 			=> array(
								array(
									'element' => '.archive .top-section .post-title, .all-works .top-section .post-title',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * Show Portfolio Category Menu
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_all_show_portfolio_category_menu',
	'label'    			=> esc_attr__( 'Show Portfolio Category Menu?', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'The category menu displays at the top of the template.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'switch',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> '1',
	'choices' 			=> array(
								'on' 	=> esc_attr__( 'Yes', 'alvar' ),
								'off' 	=> esc_attr__( 'No', 'alvar' ),
							),
) );



/**
 * Portfolio Category Menu Width
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_portfolio_category_menu_width',
	'label'    			=> esc_attr__( 'Portfolio Category Menu Width (px)', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> 200,
	'choices'     		=> array(
								'min'  => 0,
								'step' => 1,
							),
	'output' 			=> array(
								array(
									'element' => '.portfolio-categories',
									'property' => 'width',
									'suffix'  => 'px',
								),
							),
) );



Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_styles_desc3',
	'section'     => 'alvar_ctmzr_portfolio_styles',
	'description' => '<p class="custom-description">' . esc_html__( 'Note that the font attributes and colors of the portfolio category menu are inherited from the site submenu styles. You can adjust them in the "Logo & Menu Area Styles" section.', 'alvar' ) . '</p>',
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_styles_separator13',
	'section'     => 'alvar_ctmzr_portfolio_styles',
	'description'     => '<br/><br/>',
) );



/**
 * "Change category" Menu Text
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_change_category_menu_text',
	'label'    			=> esc_attr__( '"Change category" Menu Text', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'This text displays next to the category title at the top of the template.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> esc_html__( 'Change category', 'alvar' ),
) );



/**
 * "Change category" Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_change_category_menu_text_color',
	'label'    			=> esc_attr__( '"Change category" Text Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> '#888888',
	'output' 			=> array(
								array(
									'element' => '.portfolio-category-selector > li > a',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * "Change category" Text Color on Hover
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_change_category_menu_text_color_hover',
	'label'    			=> esc_attr__( '"Change category" Text Color on Hover', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => '.portfolio-category-selector > li:hover > a, .portfolio-category-selector > li > a:hover',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_styles_separator14',
	'section'     => 'alvar_ctmzr_portfolio_styles',
	'description'     => '<br/><br/>',
) );



/**
 * "All" Menu Text
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_styles_all_works_everything_menu_text',
	'label'    			=> esc_attr__( '"All Works" Menu Text', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'This category menu automatically links to a page that is using the All Works template. You can use this option to change its text.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'alvar_ctmzr_portfolio_styles',
	'default'  			=> esc_html__( 'All Works', 'alvar' ),
) );