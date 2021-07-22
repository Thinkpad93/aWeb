<?php
/**
 * Customizer: Typography Section
 *
 * @since 1.0.0
 */

Kirki::add_section( 'alvar_ctmzr_typography', array(
	'title'      => esc_attr__( 'Typography', 'alvar' ),
	'priority'   => 5,
	'capability' => 'edit_theme_options',
) );



/**
 * First typeface
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings'    => 'alvar_ctmzr_typography_first_typeface',
	'label'       => esc_attr__( 'First Typeface', 'alvar' ),
	'description' => esc_attr__( 'This typeface will mostly be applied to heading elements. You can fine-tune font size and weight in the other style sections.', 'alvar' ),
	'type'        => 'typography',
	'section'     => 'alvar_ctmzr_typography',
	'default'     => array(
		'font-family'    => 'Arimo',
		//'variant'        => '700',
		//'letter-spacing' => '0.5px',
	),
	'output' => array(
		array(
			'element' => 'h1, h2, h3, h4, h5, h6, .site-logo, .site-logo a, .site-title, #mobile-menu-toggle, #mobile-menu-entity, .post-intro, .post-navigation',
			'suffix'  => '',
		),
	),
) );



/**
 * Second typeface
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings'    => 'alvar_ctmzr_typography_second_typeface',
	'label'       => esc_attr__( 'Second Typeface', 'alvar' ),
	'description' => esc_attr__( 'This typeface will mostly be applied to body elements. You can fine-tune font size and weight in the other style sections.', 'alvar' ),
	'type'        => 'typography',
	'section'     => 'alvar_ctmzr_typography',
	'default'     => array(
		'font-family'    => 'Arimo',
		//'variant'        => '500',
		//'letter-spacing' => '0.5px',
	),
	'output' => array(
		array(
			'element' => 'body, .tagline',
			'suffix'  => '',
		),
	),
) );
