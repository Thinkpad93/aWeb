<?php
/**
 * Customizer: Site Identity Section
 *
 * @since 1.0.0
 */



/**
 * Phone Number
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_phone_number',
	'label'    			=> esc_attr__( 'Phone Number', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => '',
) );



/**
 * Email
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_email',
	'label'    			=> esc_attr__( 'Email', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'sanitize_email',
) );



/**
 * Other Info Text
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_other_info_text',
	'label'    			=> esc_attr__( 'Other Info Text', 'alvar' ),
	'tooltip' 			=> esc_attr__( 'This text will display right above the copyright text. It should not be too long.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'textarea',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => '',
) );



/**
 * Copyright Text
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_copyright_text',
	'label'    			=> esc_attr__( 'Copyright Text', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'textarea',
	'section'  			=> 'title_tagline',
	'default'  			=> sprintf( __( '&copy; Alvar. Designed by <a href="%s">UXBARN</a>.', 'alvar' ), 'https://uxbarn.com' ),
	'sanitize_callback' => 'alvar_ctmzr_sanitize_with_theme_wpkes',
	'transport' 		=> 'postMessage',
	'js_vars'   		=> array(
								array(
									'element'  => '.copyright',
									'function' => 'html',
								),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_site_identity_blank',
	'section'     => 'title_tagline',
	'description' => '<br/><br/>',
) );



/**
 * Social Network Display
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_social_network_display',
	'label'    			=> esc_attr__( 'Social Network Display', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'select',
	'section'  			=> 'title_tagline',
	'default'  			=> 'text',
	'multiple'			=> 1,
	'choices'     		=> array(
								'text'  => esc_attr__( 'Text', 'alvar' ),
								'icons'  => esc_attr__( 'Icons', 'alvar' ),
							),
) );



/**
 * Social Icon Set
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_facebook_url',
	'label'    			=> esc_attr__( 'Facebook URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_twitter_url',
	'label'    			=> esc_attr__( 'Twitter URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_google_plus_url',
	'label'    			=> esc_attr__( 'Google+ URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_instagram_url',
	'label'    			=> esc_attr__( 'Instagram URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_flickr_url',
	'label'    			=> esc_attr__( 'Flickr URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_500px_url',
	'label'    			=> esc_attr__( '500px URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_pinterest_url',
	'label'    			=> esc_attr__( 'Pinterest URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_linkedin_url',
	'label'    			=> esc_attr__( 'LinkedIn URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_dribbble_url',
	'label'    			=> esc_attr__( 'Dribbble URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_behance_url',
	'label'    			=> esc_attr__( 'Behance URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_vimeo_url',
	'label'    			=> esc_attr__( 'Vimeo URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_youtube_url',
	'label'    			=> esc_attr__( 'YouTube URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_soundcloud_url',
	'label'    			=> esc_attr__( 'SoundCloud URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );

Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_site_identity_rss_url',
	'label'    			=> esc_attr__( 'RSS URL', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'text',
	'section'  			=> 'title_tagline',
	'default'  			=> '',
	'sanitize_callback' => 'esc_url_raw',
) );