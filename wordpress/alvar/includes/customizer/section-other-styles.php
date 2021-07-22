<?php
/**
 * Customizer: Other Styles
 *
 * @since 1.0.0
 */

Kirki::add_section( 'alvar_ctmzr_other_styles', array(
	'title'      => esc_attr__( 'Other Styles', 'alvar' ),
	'priority'   => 30,
	'capability' => 'edit_theme_options',
) );



/**
 * Lightbox Overlay Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_other_styles_lightbox_overlay_color',
	'label'    			=> esc_attr__( 'Image Lightbox Overlay Color', 'alvar' ),
	'tooltip' 			=> esc_attr__( 'A lightbox is what you see when clicking on images on the portfolio single page.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_other_styles',
	'default'  			=> 'rgba(248,248,248,1)',
	'choices'			=> array( 'alpha' => true, ),
	'transport' 		=> 'postMessage',
	'output' 			=> array(
								array(
									'element' => '.fancybox-overlay',
									'property' => 'background',
									'suffix'  => ' !important',
								),
							),
	'js_vars'   		=> array(
								array(
									'element'  => '.fancybox-overlay',
									'function' => 'css',
									'property' => 'background',
									'suffix'  => ' !important',
								),
							),
) );



/**
 * Lightbox Caption Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_other_styles_lightbox_caption_color',
	'label'    			=> esc_attr__( 'Image Lightbox Text Color', 'alvar' ),
	'tooltip' 			=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_other_styles',
	'default'  			=> '#050505',
	'choices'			=> array( 'alpha' => true, ),
	'transport' 		=> 'postMessage',
	'output' 			=> array(
								array(
									'element' => '.fancybox-title-outside-wrap, .fancybox-next span::after, .fancybox-prev span::after, .fancybox-close::after',
									'property' => 'color',
									'suffix'  => '',
								),
							),
	'js_vars'   		=> array(
								array(
									'element'  => '.fancybox-title-outside-wrap, .fancybox-next span::after, .fancybox-prev span::after, .fancybox-close::after',
									'function' => 'css',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );