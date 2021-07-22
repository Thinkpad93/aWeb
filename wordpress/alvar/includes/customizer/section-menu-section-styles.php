<?php
/**
 * Customizer: Menu Section Styles
 *
 * @since 1.0.0
 */

Kirki::add_section( 'alvar_ctmzr_menu_section_styles', array(
	'title'      => esc_attr__( 'Logo & Menu Area Styles', 'alvar' ),
	'priority'   => 15,
	'capability' => 'edit_theme_options',
) );



/**
 * Logo and Tagline Location
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_logo_tagline_location',
	'label'    			=> esc_attr__( 'Logo and Tagline Location', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> 'both-left-bar',
	'multiple'			=> 1,
	'choices'     		=> array(
								'both-left-bar'  => esc_attr__( 'Both in left bar', 'alvar' ),
								'logo-above-menu'  => esc_attr__( 'Only logo above menu', 'alvar' ),
								'both-above-menu'  => esc_attr__( 'Both above menu', 'alvar' ),
							),
) );



// Blank Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_menu_options_blank3',
	'section'     => 'alvar_ctmzr_menu_section_styles',
	'description' => '<br/><br/>',
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_menu_section_styles_logo_desc',
	'section'     => 'alvar_ctmzr_menu_section_styles',
	'description' => esc_attr__( 'Adjust the site title attributes below when you are not using a logo image. If you want to upload a logo image, please go to the "Site Identity" section.', 'alvar' ),
) );



/**
 * Site Title Text Style
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_logo_text_style',
	'label'    			=> esc_attr__( 'Site Title Text Style', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> 'lowercase',
	'multiple'			=> 1,
	'choices'     		=> array(
								'none'		=> esc_attr__( 'Normal', 'alvar' ),
								'uppercase' => esc_attr__( 'Uppercase', 'alvar' ),
								'lowercase' => esc_attr__( 'Lowercase', 'alvar' ),
							),
	'output' 			=> array(
								array(
									'element' => '.site-title',
									'property' => 'text-transform',
									'suffix'  => '',
								),
							),
) );



/**
 * Site Title Font Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_logo_font_size',
	'label'    			=> esc_attr__( 'Site Title Font Size', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '18px',
	'output' 			=> array(
								array(
									'element' => '.site-logo, .site-logo a, .site-title',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * Site Title Font Weight
 * 
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_logo_font_weight',
	'label'    			=> esc_attr__( 'Site Title Font Weight', 'alvar' ),
	'description' 		=> '',
	'tooltip'      		=> esc_attr__( 'It also depends on the typeface if it supports the selected weight or not.', 'alvar' ),
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '700',
	'multiple'			=> 1,
	'choices'     		=> alvar_ctmzr_get_font_weight_list(),
	'output' 			=> array(
								array(
									'element' => '.site-logo, .site-logo a, .site-title',
									'property' => 'font-weight',
									'suffix'  => '',
								),
							),
) );



/**
 * Site Title Letter Spacing
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_logo_letter_spacing',
	'label'    			=> esc_attr__( 'Site Title Letter Spacing (px)', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '0.5',
	'choices'     		=> array(
								'min'  => 0,
								'step' => 0.1,
							),
	'output' 			=> array(
								array(
									'element' => '.site-logo, .site-logo a, .site-title',
									'property' => 'letter-spacing',
									'suffix'  => 'px',
								),
							),
) );



/**
 * Site Title Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_logo_text_color',
	'label'    			=> esc_attr__( 'Site Title Text Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => '.site-logo, .site-logo a, .site-title',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



// Blank Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_menu_options_blank1',
	'section'     => 'alvar_ctmzr_menu_section_styles',
	'description' => '<br/><br/>',
) );



/**
 * Show Tagline
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_show_tagline',
	'label'    			=> esc_attr__( 'Show Tagline?', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'switch',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '1',
	'choices' 			=> array(
								'on' 	=> esc_attr__( 'Yes', 'alvar' ),
								'off' 	=> esc_attr__( 'No', 'alvar' ),
							),
) );



/**
 * Tagline Font Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_tagline_font_size',
	'label'    			=> esc_attr__( 'Tagline Font Size', 'alvar' ),
	'tooltip' 			=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '11px',
	'output' 			=> array(
								array(
									'element' => '.tagline',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * Tagline Font Weight
 * 
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_tagline_font_weight',
	'label'    			=> esc_attr__( 'Tagline Font Weight', 'alvar' ),
	'description' 		=> '',
	'tooltip'      		=> esc_attr__( 'It also depends on the typeface if it supports the selected weight or not.', 'alvar' ),
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '400',
	'multiple'			=> 1,
	'choices'     		=> alvar_ctmzr_get_font_weight_list(),
	'output' 			=> array(
								array(
									'element' => '.tagline',
									'property' => 'font-weight',
									'suffix'  => '',
								),
							),
) );



/**
 * Tagline Letter Spacing
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_tagline_letter_spacing',
	'label'    			=> esc_attr__( 'Tagline Letter Spacing (px)', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '1',
	'choices'     		=> array(
								'min'  => 0,
								'step' => 0.1,
							),
	'output' 			=> array(
								array(
									'element' => '.tagline',
									'property' => 'letter-spacing',
									'suffix'  => 'px',
								),
							),
) );



/**
 * Tagline Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_tagline_text_color',
	'label'    			=> esc_attr__( 'Tagline Text Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#888',
	'output' 			=> array(
								array(
									'element' => '.tagline',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



// Blank Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_menu_options_blank2',
	'section'     => 'alvar_ctmzr_menu_section_styles',
	'description' => '<br/><br/>',
) );



/**
 * Show Search Button
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_show_search_button',
	'label'    			=> esc_attr__( 'Show Search Button?', 'alvar' ),
	'description' 		=> esc_attr__( 'To make the button visible, also make sure that the left bar is showing using the option far below.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'switch',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '1',
	'choices' 			=> array(
								'on' 	=> esc_attr__( 'Yes', 'alvar' ),
								'off' 	=> esc_attr__( 'No', 'alvar' ),
							),
) );



/**
 * Search Button Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_search_button_color',
	'label'    			=> esc_attr__( 'Search Button Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => '.search-icon-button, .search-icon-button:hover',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Search Overlay Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_search_text_color',
	'label'    			=> esc_attr__( 'Search Overlay Text Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#000000',
	'output' 			=> array(
								array(
									'element' => '#search-panel-wrapper .search-field, #search-close-button',
									'property' => 'color',
									'suffix'  => '',
								),
							),
	'transport' 		=> 'postMessage',
	'js_vars'   		=> array(
								array(
									'element'  => '#search-panel-wrapper .search-field, #search-close-button',
									'function' => 'css',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Search Overlay Background Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_search_bg_color',
	'label'    			=> esc_attr__( 'Search Overlay Background Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#ffffff',
	'output' 			=> array(
								array(
									'element' => '#search-panel-wrapper',
									'property' => 'background-color',
									'suffix'  => '',
								),
							),
	'transport' 		=> 'postMessage',
	'js_vars'   		=> array(
								array(
									'element'  => '#search-panel-wrapper',
									'function' => 'css',
									'property' => 'background-color',
									'suffix'  => '',
								),
							),
) );



// Blank Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_menu_options_blank4',
	'section'     => 'alvar_ctmzr_menu_section_styles',
	'description' => '<br/><br/>',
) );



/**
 * Show Left Bar
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_show_left_bar',
	'label'    			=> esc_attr__( 'Show Left Bar?', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'switch',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '1',
	'choices' 			=> array(
								'on' 	=> esc_attr__( 'Yes', 'alvar' ),
								'off' 	=> esc_attr__( 'No', 'alvar' ),
							),
) );



/**
 * Left Bar Background Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_left_bar_bg_color',
	'label'    			=> esc_attr__( 'Left Bar Background Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#fff',
	'output' 			=> array(
								array(
									'element' => '#side-vertical-bar',
									'property' => 'background-color',
									'suffix'  => '',
								),
								array(
									'element' => '.logo-tagline-wrapper',
									'property' => 'background-color',
									'media_query' => '@media only screen and (max-width: 1024px)',
									'suffix'  => '',
								),
							),
) );



/**
 * Left Bar Border Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_left_bar_border_color',
	'label'    			=> esc_attr__( 'Left Bar Border Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#aaa',
	'output' 			=> array(
								array(
									'element' => '#side-vertical-bar',
									'property' => 'border-color',
									'suffix'  => '',
								),
								array(
									'element' => '.logo-tagline-wrapper',
									'property' => 'border-color',
									'media_query' => '@media only screen and (max-width: 1024px)',
									'suffix'  => '',
								),
							),
) );



/**
 * Left Bar Width
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_left_bar_width',
	'label'    			=> esc_attr__( 'Left Bar Width (px)', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> 52,
	'choices'     		=> array(
								'min'  => 0,
								'max'  => 90,
								'step' => 1,
							),
	'output' 			=> array(
								array(
									'element' => '#side-vertical-bar',
									'property' => 'width',
									'suffix'  => 'px',
								),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_menu_section_styles_separator0',
	'section'     => 'alvar_ctmzr_menu_section_styles',
	'description' => '<br/><hr /><br/>',
) );



/**
 * Menu Text Style
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_menu_text_style',
	'label'    			=> esc_attr__( 'Menu Text Style', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> 'uppercase',
	'multiple'			=> 1,
	'choices'     		=> array(
								'none'		=> esc_attr__( 'Normal', 'alvar' ),
								'uppercase' => esc_attr__( 'Uppercase', 'alvar' ),
								'lowercase' => esc_attr__( 'Lowercase', 'alvar' ),
							),
	'output' 			=> array(
								array(
									'element' => '.menu-style',
									'property' => 'text-transform',
									'suffix'  => '',
								),
							),
) );



/**
 * Menu Font Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_menu_font_size',
	'label'    			=> esc_attr__( 'Menu Font Size', 'alvar' ),
	'tooltip' 			=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '12px',
	'output' 			=> array(
								array(
									'element' => '.menu-style',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * Menu Font Weight
 * 
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_menu_font_weight',
	'label'    			=> esc_attr__( 'Menu Font Weight', 'alvar' ),
	'description' 		=> '',
	'tooltip'      		=> esc_attr__( 'It also depends on the typeface if it supports the selected weight or not.', 'alvar' ),
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '400',
	'multiple'			=> 1,
	'choices'     		=> alvar_ctmzr_get_font_weight_list(),
	'output' 			=> array(
								array(
									'element' => '.menu-style',
									'property' => 'font-weight',
									'suffix'  => '',
								),
							),
) );



/**
 * Menu Letter Spacing
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_menu_letter_spacing',
	'label'    			=> esc_attr__( 'Menu Letter Spacing (px)', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '1.5',
	'choices'     		=> array(
								'min'  => 0,
								'step' => 0.1,
							),
	'output' 			=> array(
								array(
									'element' => '.menu-style',
									'property' => 'letter-spacing',
									'suffix'  => 'px',
								),
							),
) );



/**
 * Menu Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_menu_text_color',
	'label'    			=> esc_attr__( 'Menu Text Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#999',
	'output' 			=> array(
								array(
									'element' => '.menu-list > li > a',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Menu Text Color on Hover
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_menu_text_color_hover',
	'label'    			=> esc_attr__( 'Menu Text Color on Hover', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => '.menu-style > li:hover > a, .menu-style > li > a:hover',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Active Menu Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_active_menu_color',
	'label'    			=> esc_attr__( 'Active Menu Text Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => '#root-container .menu-style > .current_page_item > a, #root-container .menu-style > .current-menu-item > a, #root-container .menu-style > .current-menu-parent > a, #root-container .menu-style > .current-menu-ancestor > a, #root-container .menu-style > li.active > a, #mobile-menu-toggle',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_menu_section_styles_separator2',
	'section'     => 'alvar_ctmzr_menu_section_styles',
	'description'     => '<br/><br/>',
) );



/**
 * Submenu Font Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_submenu_font_size',
	'label'    			=> esc_attr__( 'Submenu Font Size', 'alvar' ),
	'tooltip' 			=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '11px',
	'output' 			=> array(
								array(
									'element' => '.sub-menu, .portfolio-categories',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * Submenu Font Weight
 * 
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_submenu_font_weight',
	'label'    			=> esc_attr__( 'Submenu Font Weight', 'alvar' ),
	'description' 		=> '',
	'tooltip'      		=> esc_attr__( 'It also depends on the typeface if it supports the selected weight or not.', 'alvar' ),
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '400',
	'multiple'			=> 1,
	'choices'     		=> alvar_ctmzr_get_font_weight_list(),
	'output' 			=> array(
								array(
									'element' => '.sub-menu, .portfolio-categories a',
									'property' => 'font-weight',
									'suffix'  => '',
								),
							),
) );



/**
 * Submenu Letter Spacing
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_submenu_letter_spacing',
	'label'    			=> esc_attr__( 'Submenu Letter Spacing (px)', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '1',
	'choices'     		=> array(
								'min'  => 0,
								'step' => 0.1,
							),
	'output' 			=> array(
								array(
									'element' => '.sub-menu, .portfolio-categories',
									'property' => 'letter-spacing',
									'suffix'  => 'px',
								),
							),
) );



/**
 * Submenu Width
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_submenu_width',
	'label'    			=> esc_attr__( 'Submenu Width (px)', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> 175,
	'choices'     		=> array(
								'min'  => 0,
								'step' => 1,
							),
	'output' 			=> array(
								array(
									'element' => '.sub-menu',
									'property' => 'width',
									'suffix'  => 'px',
								),
							),
) );



/**
 * Submenu Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_submenu_text_color',
	'label'    			=> esc_attr__( 'Submenu Text Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#cccccc',
	'output' 			=> array(
								array(
									'element' => '.menu-list .sub-menu a, .portfolio-categories a',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Submenu Text Color on Hover
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_submenu_text_color_hover',
	'label'    			=> esc_attr__( 'Submenu Text Color on Hover', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#ffffff',
	'output' 			=> array(
								array(
									'element' => '.sub-menu > li:hover > a, .portfolio-categories > li:hover > a',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Submenu Level 1 Background Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_submenu_lv1_background_color',
	'label'    			=> esc_attr__( 'Submenu Level 1 Background Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => '.sub-menu, .portfolio-categories',
									'property' => 'background-color',
									'suffix'  => '',
								),
							),
) );



/**
 * Submenu Level 2 Background Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_submenu_lv2_background_color',
	'label'    			=> esc_attr__( 'Submenu Level 2 Background Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#333333',
	'output' 			=> array(
								array(
									'element' => '.sub-menu .sub-menu',
									'property' => 'background-color',
									'suffix'  => '',
								),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_menu_section_styles_separator55',
	'section'     => 'alvar_ctmzr_menu_section_styles',
	'description' => '<br/><hr /><br/>',
) );



/**
 * Copyright Font Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_copyright_font_size',
	'label'    			=> esc_attr__( 'Copyright Font Size', 'alvar' ),
	'tooltip' 			=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '11px',
	'output' 			=> array(
								array(
									'element' => '.copyright-social-wrapper',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * Copyright Letter Spacing
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_copyright_letter_spacing',
	'label'    			=> esc_attr__( 'Copyright Letter Spacing (px)', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '1',
	'choices'     		=> array(
								'min'  => 0,
								'step' => 0.1,
							),
	'output' 			=> array(
								array(
									'element' => '.copyright-social-wrapper',
									'property' => 'letter-spacing',
									'suffix'  => 'px',
								),
							),
) );



/**
 * Copyright Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_copyright_text_color',
	'label'    			=> esc_attr__( 'Copyright Text Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#999',
	'output' 			=> array(
								array(
									'element' => '.copyright-social-wrapper',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Copyright Link Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_menu_section_styles_copyright_link_color',
	'label'    			=> esc_attr__( 'Copyright Link Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_menu_section_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => '.copyright-social-wrapper a',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );