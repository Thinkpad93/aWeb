<?php
/**
 * Customizer: Content Styles
 *
 * @since 1.0.0
 */

Kirki::add_section( 'alvar_ctmzr_content_styles', array(
	'title'      => esc_attr__( 'Content Styles', 'alvar' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
) );



/**
 * H1 Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_h1_size',
	'label'    			=> esc_attr__( 'Heading 1 Size (h1)', 'alvar' ),
	'tooltip'			=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '1.8em',
	'output' 			=> array(
								array(
									'element' => 'h1',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * H2 Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_h2_size',
	'label'    			=> esc_attr__( 'Heading 2 Size (h2)', 'alvar' ),
	'tooltip'			=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '1.5em',
	'output' 			=> array(
								array(
									'element' => 'h2',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * H3 Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_h3_size',
	'label'    			=> esc_attr__( 'Heading 3 Size (h3)', 'alvar' ),
	'tooltip'			=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '1.375em',
	'output' 			=> array(
								array(
									'element' => 'h3',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * H4 Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_h4_size',
	'label'    			=> esc_attr__( 'Heading 4 Size (h4)', 'alvar' ),
	'tooltip'			=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '1.25em',
	'output' 			=> array(
								array(
									'element' => 'h4',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * H5 Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_h5_size',
	'label'    			=> esc_attr__( 'Heading 5 Size (h5)', 'alvar' ),
	'tooltip'			=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '1.125em',
	'output' 			=> array(
								array(
									'element' => 'h5',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * H6 Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_h6_size',
	'label'    			=> esc_attr__( 'Heading 6 Size (h6)', 'alvar' ),
	'tooltip'			=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '1em',
	'output' 			=> array(
								array(
									'element' => 'h6',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * Heading Font Weight
 * 
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_content_heading_font_weight',
	'label'    			=> esc_attr__( 'Heading Font Weight', 'alvar' ),
	'description' 		=> '',
	'tooltip'      		=> esc_attr__( 'It also depends on the typeface if it supports the selected weight or not.', 'alvar' ),
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '700',
	'multiple'			=> 1,
	'choices'     		=> alvar_ctmzr_get_font_weight_list(),
	'output' 			=> array(
								array(
									'element' => 'h1, h2, h3, h4, h5, h6, .post-title, .post-item .post-title a, .section-title',
									'property' => 'font-weight',
									'suffix'  => '',
								),
							),
) );



/**
 * Heading Letter Spacing
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_content_heading_letter_spacing',
	'label'    			=> esc_attr__( 'Heading Letter Spacing (px)', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'number',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '0.2',
	'choices'     		=> array(
								'min'  => 0,
								'step' => 0.1,
							),
	'output' 			=> array(
								array(
									'element' => 'h1, h2, h3, .post-title, .post-item .post-title a, .section-title',
									'property' => 'letter-spacing',
									'suffix'  => 'px',
								),
							),
) );


// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_content_styles_separator0',
	'section'     => 'alvar_ctmzr_content_styles',
	'description'     => '<br/><br/>',
) );


/**
 * Content Text Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_content_text_size',
	'label'    			=> esc_attr__( 'Content Text Size', 'alvar' ),
	'tooltip'			=> esc_attr__( 'You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '14px',
	'output' 			=> array(
								array(
									'element' => 'body, .post-content, .post-excerpt, .section-content',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * Content Text Font Weight
 * 
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_content_text_font_weight',
	'label'    			=> esc_attr__( 'Content Text Font Weight', 'alvar' ),
	'description' 		=> '',
	'tooltip'      		=> esc_attr__( 'It also depends on the typeface if it supports the selected weight or not.', 'alvar' ),
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '400',
	'multiple'			=> 1,
	'choices'     		=> alvar_ctmzr_get_font_weight_list(),
	'output' 			=> array(
								array(
									'element' => 'body, .post-content, .post-excerpt, .image-caption, .section-content, .post-navigation .nav-title',
									'property' => 'font-weight',
									'suffix'  => '',
								),
							),
) );



/**
 * Content Link Font Weight
 * 
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_content_link_font_weight',
	'label'    			=> esc_attr__( 'Content Link Font Weight', 'alvar' ),
	'description' 		=> '',
	'tooltip'      		=> esc_attr__( 'It also depends on the typeface if it supports the selected weight or not.', 'alvar' ),
	'type'     			=> 'select',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '700',
	'multiple'			=> 1,
	'choices'     		=> alvar_ctmzr_get_font_weight_list(),
	'output' 			=> array(
								array(
									'element' => '.blog-list a, .post-item a, .content-section-wrapper a',
									'property' => 'font-weight',
									'suffix'  => '',
								),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_content_styles_separator1',
	'section'     => 'alvar_ctmzr_content_styles',
	'description'     => '<br/><br/>',
) );



/**
 * Blog Title Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_blog_title_size',
	'label'    			=> esc_attr__( 'Blog and Page Title Size', 'alvar' ),
	'tooltip'			=> esc_attr__( 'It will be applied to the title on the blog and pages. You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '18px',
	'output' 			=> array(
								array(
									'element' => '.post-title',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * Blog Meta Info Font Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_blog_meta_info_text_size',
	'label'    			=> esc_attr__( 'Blog Meta Info Font Size', 'alvar' ),
	'tooltip'			=> esc_attr__( 'It will be applied to the meta info text on the blog template. You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '10px',
	'output' 			=> array(
								array(
									'element' => '.post-meta',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * Page Section Title Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_page_section_title_size',
	'label'    			=> esc_attr__( 'Page Section Title Size', 'alvar' ),
	'tooltip'			=> esc_attr__( 'It will be applied to the section title on pages (eg. author profile and comment sections). You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '16px',
	'output' 			=> array(
								array(
									'element' => '.section-title',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_content_styles_separator11',
	'section'     => 'alvar_ctmzr_content_styles',
	'description'     => '<br/><br/>',
) );



/**
 * Heading Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_heading_color',
	'label'    			=> esc_attr__( 'Heading Color', 'alvar' ),
	'tooltip'			=> esc_attr__( 'The color will be applied to most heading tags in the content section.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => 'h1, h2, h3, h4, h5, h6, .post-title, .post-item .post-title a, .section-title',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_text_color',
	'label'    			=> esc_attr__( 'Text Color', 'alvar' ),
	'tooltip'			=> esc_attr__( 'The color will be applied to most text in the content section.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '#555555',
	'output' 			=> array(
								array(
									'element' => '#content-container',
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
	'settings' 			=> 'alvar_ctmzr_content_styles_link_color',
	'label'    			=> esc_attr__( 'Link Color', 'alvar' ),
	'tooltip'			=> esc_attr__( 'The color will be applied to most links in the content section.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => '.post-item a, .post-meta a, .meta-categories-title, .meta-tags-title, .content-section-wrapper a, .next-prev-post-navigation a',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Content Background Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_content_bg_color',
	'label'    			=> esc_attr__( 'Content Background Color', 'alvar' ),
	'description' 		=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '#fff',
	'output' 			=> array(
								array(
									'element' => '#content-container, .portfolio-listing-wrapper.carousel, .archive .top-section, .all-works .top-section, .next-prev-post-navigation',
									'property' => 'background-color',
									'suffix'  => '',
								),
								array(
									'element' => '.portfolio-category-selector',
									'property' => 'background-color',
									'media_query' => '@media only screen and (max-width: 767px)',
									'suffix'  => '',
								),
							),
) );



// Separator
Kirki::add_field( 'uxbarn_alvar', array(
	'type'        => 'custom',
	'settings'    => 'alvar_ctmzr_content_styles_separator12',
	'section'     => 'alvar_ctmzr_content_styles',
	'description'     => '<br/><hr/><br/>',
) );



/**
 * Pagination Text Size
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_pagination_text_size',
	'label'    			=> esc_attr__( 'Pagination Text Size', 'alvar' ),
	'tooltip'			=> esc_attr__( 'It will be applied to the pagination at the bottom of the content section. You can use either em or px unit here.', 'alvar' ),
	'help'        		=> '',
	'type'     			=> 'dimension',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '11px',
	'output' 			=> array(
								array(
									'element' => '.numbers-pagination, .additional-link-button-wrapper a',
									'property' => 'font-size',
									'suffix'  => '',
								),
							),
) );



/**
 * Pagination Text Color
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_pagination_text_color',
	'label'    			=> esc_attr__( 'Pagination Text Color', 'alvar' ),
	'tooltip'			=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '#999999',
	'output' 			=> array(
								array(
									'element' => '.numbers-pagination a, .numbers-pagination .current::after, .numbers-pagination a::after, .additional-link-button-wrapper a, .additional-link-button-wrapper a::after',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );



/**
 * Pagination Text Color on Hover
 *
 * @since 1.0.0
 */
Kirki::add_field( 'uxbarn_alvar', array(
	'settings' 			=> 'alvar_ctmzr_content_styles_pagination_text_color_hover',
	'label'    			=> esc_attr__( 'Pagination Text Color on Hover', 'alvar' ),
	'tooltip'			=> '',
	'help'        		=> '',
	'type'     			=> 'color',
	'section'  			=> 'alvar_ctmzr_content_styles',
	'default'  			=> '#050505',
	'output' 			=> array(
								array(
									'element' => '.numbers-pagination a:hover, .numbers-pagination .current, .additional-link-button-wrapper a:hover',
									'property' => 'color',
									'suffix'  => '',
								),
							),
) );