<?php
/**
 * Customizer: Portfolio Options
 *
 * @since 1.0.0
 */

Kirki::add_section( 'alvar_ctmzr_portfolio_options', array(
	'title'      => esc_attr__( 'Portfolio Options', 'alvar' ),
	'priority'   => 45,
	'capability' => 'edit_theme_options',
) );



// General 
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_options_general_options_title',
	'section'     => 'alvar_ctmzr_portfolio_options',
	'description' => '<h2 class="custom-heading">' . esc_html__( 'General Portfolio Options', 'alvar' ) . '</h2>',
) );



/**
 * Carousel Autoplay Seconds
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_carousel_autoplay_seconds',
	'label'    			=> esc_attr__( 'Portfolio Carousel Autoplay Seconds', 'alvar' ),
	'description' 		=> esc_attr__( 'Enter the number of seconds for the autoplay of the portfolio carousel. You can also enter "0" to disable the autoplay.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> 5,
	'choices'     		=> array(
								'min'  => 0,
								'step' => 1,
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_options_separator01',
	'section'     => 'alvar_ctmzr_portfolio_options',
	'description' => '<br/><hr /><br/>',
) );



// Featured Works Template
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_options_featured_works_title2',
	'section'     => 'alvar_ctmzr_portfolio_options',
	'description' => '<h2 class="custom-heading">' . esc_html__( 'Featured Works Template Options', 'alvar' ) . '</h2>',
) );



/**
 * Select Categories
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_featured_works_select_categories',
	'label'    			=> esc_attr__( 'Select Categories', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'Select which portfolio categories to display on the featured works template. Unchecking all will display the works from all categories.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'multicheck',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> array(),
	'choices'     		=> Kirki_Helper::get_terms( array( 'taxonomy' => 'uxbarn_portfolio_tax', 'hide_empty' => false, 'orderby' => 'name', 'order' => 'ASC' ) ),
) );



/**
 * Number of Posts on Featured Works Template
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_featured_works_number_of_items',
	'label'    			=> esc_attr__( 'Number of Items to Display', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> 5,
	'choices'     		=> array(
								'min'  => 1,
								'step' => 1,
							),
) );



/**
 * Portfolio Items Order by
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_featured_works_portfolio_items_order_by',
	'label'    			=> esc_attr__( 'Portfolio Items Order by', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> 'ID',
	'multiple'			=> 1,
	'choices'     		=> array(
								'ID'  		=> esc_attr__( 'ID', 'alvar' ),
								'title'  	=> esc_attr__( 'Title', 'alvar' ),
								'name'  	=> esc_attr__( 'Slug', 'alvar' ),
								'date'  	=> esc_attr__( 'Published Date', 'alvar' ),
								'modified'  => esc_attr__( 'Modified Date', 'alvar' ),
								'rand'  	=> esc_attr__( 'Random', 'alvar' ),
							),
) );



/**
 * Portfolio Items Order
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_featured_works_portfolio_items_order',
	'label'    			=> esc_attr__( 'Portfolio Items Order', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> 'DESC',
	'multiple'			=> 1,
	'choices'     		=> array(
								'ASC'  		=> esc_attr__( 'Ascending', 'alvar' ),
								'DESC'  	=> esc_attr__( 'Descending', 'alvar' ),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_options_separator1',
	'section'     => 'alvar_ctmzr_portfolio_options',
	'description' => '<br/><hr /><br/>',
) );



// All Works Template
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_options_all_works_title2',
	'section'     => 'alvar_ctmzr_portfolio_options',
	'description' => '<h2 class="custom-heading">' . esc_html__( 'All Works Template Options', 'alvar' ) . '</h2>',
) );



/**
 * Select Categories
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_all_works_select_categories',
	'label'    			=> esc_attr__( 'Select Categories', 'alvar' ),
	'tooltip' 			=> esc_attr__( 'Select which portfolio categories to display on the all works template. Unchecking all will display the works from all categories.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'multicheck',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> array(),
	'choices'     		=> Kirki_Helper::get_terms( array( 'taxonomy' => 'uxbarn_portfolio_tax', 'hide_empty' => false, 'orderby' => 'name', 'order' => 'ASC' ) ),
) );



/**
 * Number of Posts on All Works Template
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_all_works_number_of_items',
	'label'    			=> esc_attr__( 'Number of Items per Page', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> 9,
	'choices'     		=> array(
								'min'  => 1,
								'step' => 1,
							),
) );



/**
 * Portfolio Items Order by
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_all_works_portfolio_items_order_by',
	'label'    			=> esc_attr__( 'Portfolio Items Order by', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> 'ID',
	'multiple'			=> 1,
	'choices'     		=> array(
								'ID'  		=> esc_attr__( 'ID', 'alvar' ),
								'title'  	=> esc_attr__( 'Title', 'alvar' ),
								'name'  	=> esc_attr__( 'Slug', 'alvar' ),
								'date'  	=> esc_attr__( 'Published Date', 'alvar' ),
								'modified'  => esc_attr__( 'Modified Date', 'alvar' ),
								'rand'  	=> esc_attr__( 'Random', 'alvar' ),
							),
) );



/**
 * Portfolio Items Order
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_all_works_portfolio_items_order',
	'label'    			=> esc_attr__( 'Portfolio Items Order', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> 'DESC',
	'multiple'			=> 1,
	'choices'     		=> array(
								'ASC'  		=> esc_attr__( 'Ascending', 'alvar' ),
								'DESC'  	=> esc_attr__( 'Descending', 'alvar' ),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_options_separator2',
	'section'     => 'alvar_ctmzr_portfolio_options',
	'description' => '<br/><hr /><br/>',
) );



// Others
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_options_others_title2',
	'section'     => 'alvar_ctmzr_portfolio_options',
	'description' => '<h2 class="custom-heading">' . esc_html__( 'Other Options', 'alvar' ) . '</h2>',
) );



/**
 * Portfolio Menu Text
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_portfolio_menu_text_active_status',
	'label'    			=> esc_attr__( 'Portfolio Menu Text', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'By default, when viewing a portfolio single page, WP will not set the active status on the menu. Use this option to tell WP what text on the menu to be set as active for most portfolio-related pages.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> esc_html__( 'Portfolio', 'alvar' ),
) );



/**
 * Enable Lightbox on Portfolio Single Page
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_enable_lightbox',
	'label'    			=> esc_attr__( 'Enable Lightbox on Portfolio Single Pages?', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'Whether to enable the lightbox link on the images on portfolio single pages.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'switch',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> '1',
	'choices' 			=> array(
								'on' 	=> esc_attr__( 'Yes', 'alvar' ),
								'off' 	=> esc_attr__( 'No', 'alvar' ),
							),
) );



/**
 * Enable Comments on Portfolio Single Page
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_enable_portfolio_comments',
	'label'    			=> esc_attr__( 'Enable Comment Section on Portfolio Single Pages?', 'alvar' ),
	'tooltip' 			=> esc_attr__( 'Whether to show or hide the entire comment section on portfolio single pages.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'switch',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> '0',
	'choices' 			=> array(
								'on' 	=> esc_attr__( 'Yes', 'alvar' ),
								'off' 	=> esc_attr__( 'No', 'alvar' ),
							),
) );



/**
 * Enable Next/Previous Post Navigation
 *
 * @since 1.0.1
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_enable_post_navigation',
	'label'    			=> esc_attr__( 'Enable Next/Previous Post Navigation?', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'Whether to show or hide the post navigation at the bottom of each portfolio item on its single page.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'switch',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> '0',
	'choices' 			=> array(
								'on' 	=> esc_attr__( 'Yes', 'alvar' ),
								'off' 	=> esc_attr__( 'No', 'alvar' ),
							),
) );



/**
 * Make Post Navigation Link All Categories
 *
 * @since 1.0.3
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_enable_post_navigation_all_categories',
	'label'    			=> esc_attr__( 'Make Post Navigation Link All Categories?', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'By default, the navigation only links the portfolio items in the same category. You can enable this option to make it link across all categories.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'switch',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> '0',
	'choices' 			=> array(
								'on' 	=> esc_attr__( 'Yes', 'alvar' ),
								'off' 	=> esc_attr__( 'No', 'alvar' ),
							),
) );



// Blank Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_portfolio_options_blank3',
	'section'     => 'alvar_ctmzr_portfolio_options',
	'description' => '<br/><br/>',
) );



/**
 * Portfolio Category Slug
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_portfolio_category_slug',
	'label'    			=> esc_attr__( 'Portfolio Category Slug', 'alvar' ),
	'description' 		=> alvar_wp_kses_escape( __( '<p>The slug is displayed in the URL when viewing portfolio category template.</p><p>IMPORTANT: Make sure that the slug is not the same as any page slug.</p><p>*After saving, go to "Settings > Permalinks" and click save to make the new slug work.</p>', 'alvar' ) ),
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> esc_html__( 'portfolio-category', 'alvar' ),
) );



/**
 * Portfolio Slug
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_portfolio_options_portfolio_slug',
	'label'    			=> esc_attr__( 'Portfolio Slug', 'alvar' ),
	'description' 		=> alvar_wp_kses_escape( __( '<p>The slug is displayed in the URL when viewing portfolio items.</p><p>IMPORTANT: Make sure that the slug is not the same as any page slug.</p><p>*After saving, go to "Settings > Permalinks" and click save to make the new slug work.</p>', 'alvar' ) ),
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'alvar_ctmzr_portfolio_options',
	'default'  			=> esc_html__( 'portfolio', 'alvar' ),
) );



