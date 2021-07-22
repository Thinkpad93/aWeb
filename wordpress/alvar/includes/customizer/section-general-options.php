<?php
/**
 * Customizer: General Options
 *
 * @since 1.0.0
 */

Kirki::add_section( 'alvar_ctmzr_general_options', array(
	'title'      => esc_attr__( 'General Options', 'alvar' ),
	'priority'   => 35,
	'capability' => 'edit_theme_options',
) );



/**
 * Search Placeholder Text
 *
 * @since 1.0.2
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_general_options_search_placeholder_text',
	'label'    			=> esc_attr__( 'Search Placeholder Text', 'alvar' ),
	'tooltip'	 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'alvar_ctmzr_general_options',
	'default'  			=> esc_attr__( 'Type and hit enter', 'alvar' ),
) );



/**
 * Number of Posts on Search Results
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_general_options_number_of_posts_search_results',
	'label'    			=> esc_attr__( 'Number of Posts on Search Results', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_general_options',
	'default'  			=> 10,
	'choices'     		=> array(
								'min'  => 1,
								'step' => 1,
							),
) );



/**
 * Enable Lightbox on WP Images
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_general_options_enable_lightbox_wp_images',
	'label'    			=> esc_attr__( 'Enable Lightbox on WP Images and Gallery?', 'alvar' ),
	'description' 		=> esc_attr__( 'To make it works, also make sure that you set the "Link To" option to "Media File" when adding WP image/gallery.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'switch',
	'section'  			=> 'alvar_ctmzr_general_options',
	'default'  			=> '1',
	'choices' 			=> array(
								'on' 	=> esc_attr__( 'Yes', 'alvar' ),
								'off' 	=> esc_attr__( 'No', 'alvar' ),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_general_options_separator2',
	'section'     => 'alvar_ctmzr_general_options',
	'default'     => '<br /><br/>',
) );



/**
 * Enable Blog Comment Section
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_general_options_enable_blog_comments',
	'label'    			=> esc_attr__( 'Enable Blog Comment?', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'Whether to show or hide the entire comment section on blog single pages.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'switch',
	'section'  			=> 'alvar_ctmzr_general_options',
	'default'  			=> '1',
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
	'settings' 			=> 'alvar_ctmzr_general_options_enable_post_navigation',
	'label'    			=> esc_attr__( 'Enable Next/Previous Post Navigation?', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'Whether to show or hide the post navigation at the bottom of each blog post on its single page.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'switch',
	'section'  			=> 'alvar_ctmzr_general_options',
	'default'  			=> '0',
	'choices' 			=> array(
								'on' 	=> esc_attr__( 'Yes', 'alvar' ),
								'off' 	=> esc_attr__( 'No', 'alvar' ),
							),
) );



/**
 * Blog Excerpt Length
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_general_options_blog_excerpt_length',
	'label'    			=> esc_attr__( 'Blog Excerpt Length', 'alvar' ),
	'tooltip' 			=> esc_attr__( 'Set the number of character for the excerpt that displays on the blog list page.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_general_options',
	'default'  			=> 205,
	'choices'     		=> array(
								'min'  => 1,
								'step' => 1,
							),
) );



/**
 * Blog Menu Text for Displaying Active Status
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_general_options_blog_menu_text_active_status',
	'label'    			=> esc_attr__( 'Blog Menu Text for Displaying Active Status', 'alvar' ),
	'tooltip'	 		=> esc_attr__( 'By default, when viewing a blog single page, WP will not set the active status on the blog menu. Use this option to tell WP what text on the menu to be set as active for most blog-related pages.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'alvar_ctmzr_general_options',
	'default'  			=> esc_attr__( 'Blog', 'alvar' ),
) );
