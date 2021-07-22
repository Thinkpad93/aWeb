<?php
/**
 * Custom fields for portfolio with Advanced Custom Fields
 *
 * @since 2.0.0
 */



if ( ! function_exists( 'alvar_portfolio_cf_create_portfolio_template_settings' ) ) {
		
	function alvar_portfolio_cf_create_portfolio_template_settings() {
		
		
		if ( function_exists( 'acf_add_local_field_group' ) ):

			acf_add_local_field_group(array(
				'key' => 'key_group_portfolio_template_settings',
				'title' => esc_html__('Portfolio Template Settings', 'alvar'),
				'fields' => array(
					
					array(
						'key' => 'key_field_uxbarn_portfolio_template_message',
						'label' => 'Portfolio template is selected',
						'name' => 'uxbarn_portfolio_template_message',
						'type' => 'message',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => alvar_wp_kses_escape( __('You can find the template settings by going to <em>Appearance > Customize > Theme Settings > Portfolio Settings</em>.', 'alvar') ),
						'new_lines' => 'wpautop',
						'esc_html' => 0,
					),
					
				),
				
				'location' => array(
					array(
						array(
							'param' => 'page_template',
							'operator' => '==',
							'value' => 'template-all-works.php',
						),
					),
				),
				
				'menu_order' => 0,
				'position' => 'side',
				'style' => 'seamless',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
				
			) );
			
		endif;
		
	}
	
}



if ( ! function_exists( 'alvar_portfolio_cf_get_full_width_default_value' ) ) {
		
	function alvar_portfolio_cf_get_full_width_default_value() {
		return '';
	}
	
}

if ( ! function_exists( 'alvar_portfolio_cf_create_portfolio_item_settings' ) ) {
		
	function alvar_portfolio_cf_create_portfolio_item_settings() {
		
		if ( function_exists( 'acf_add_local_field_group' ) ):

			acf_add_local_field_group(array(
				'key' => 'key_group_portfolio_item_settings',
				'title' => esc_html__('Portfolio Item Settings', 'alvar'),
				'fields' => array(
					
					/*array(
						'key' => 'key_field_uxbarn_portfolio_acf_enable_full_width',
						'label' => esc_html__('Make it full-width on portfolio templates?', 'alvar'),
						'name' => 'uxbarn_portfolio_acf_enable_full_width',
						'type' => 'true_false',
						'instructions' => esc_html__('Make the featured image of this item full-width when displaying on portfolio templates.', 'alvar'),
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => '',
						'default_value' => 0,
						'ui' => 1,
						'ui_on_text' => '',
						'ui_off_text' => '',
					),*/
					
					array(
						'key' => 'key_field_uxbarn_portfolio_item_format',
						'label' => esc_html__('Portfolio Item Format', 'alvar'),
						'name' => 'uxbarn_portfolio_item_format',
						'type' => 'select',
						'instructions' => esc_html__('Select the format for this item; then you can manage its content using the option below.', 'alvar'),
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'choices' => array(
							'image-slideshow' => esc_html__('Image', 'alvar'),
							'video' => esc_html__('Video', 'alvar'),
							'mixed' => esc_html__('Mixed', 'alvar'),
						),
						'default_value' => array(
						),
						'allow_null' => 0,
						'multiple' => 0,
						'ui' => 0,
						'ajax' => 0,
						'return_format' => 'value',
						'placeholder' => '',
					),
					array(
						'key' => 'key_field_uxbarn_portfolio_acf_image_slideshow',
						'label' => esc_html__('Images', 'alvar'),
						'name' => 'uxbarn_portfolio_acf_image_slideshow',
						'type' => 'gallery',
						'instructions' => esc_html__('The uploaded images will be displayed on the portfolio single page.', 'alvar'),
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'key_field_uxbarn_portfolio_item_format',
									'operator' => '==',
									'value' => 'image-slideshow',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'min' => '',
						'max' => '',
						'insert' => 'append',
						'library' => 'all',
						'min_width' => '',
						'min_height' => '',
						'min_size' => '',
						'max_width' => '',
						'max_height' => '',
						'max_size' => '',
						'mime_types' => 'jpg, jpeg, png, gif',
					),
					array(
						'key' => 'key_field_uxbarn_portfolio_video_url',
						'label' => esc_html__('Video URL', 'alvar'),
						'name' => 'uxbarn_portfolio_video_url',
						'type' => 'text',
						'instructions' => esc_html__('Enter a YouTube or Vimeo URL here.', 'alvar'),
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'key_field_uxbarn_portfolio_item_format',
									'operator' => '==',
									'value' => 'video',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),
					/*array(
						'key' => 'key_field_uxbarn_portfolio_video_caption',
						'label' => esc_html__('Video Caption', 'alvar'),
						'name' => 'uxbarn_portfolio_video_caption',
						'type' => 'textarea',
						'instructions' => esc_html__('This caption will display right below the video.', 'alvar'),
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'key_field_uxbarn_portfolio_item_format',
									'operator' => '==',
									'value' => 'video',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'maxlength' => '',
					),*/
					array(
						'key' => 'key_field_uxbarn_portfolio_acf_mixed_content',
						'label' => esc_html__('Mixed Content', 'alvar'),
						'name' => 'uxbarn_portfolio_acf_mixed_content',
						'type' => 'repeater',
						'instructions' => esc_html__('Click to add new content and choose what content type you want to use.', 'alvar'),
						'required' => 0,
						'conditional_logic' => array(
							array(
								array(
									'field' => 'key_field_uxbarn_portfolio_item_format',
									'operator' => '==',
									'value' => 'mixed',
								),
							),
						),
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => 'key_sub_field_uxbarn_portfolio_acf_mixed_content_type',
						'min' => 0,
						'max' => 0,
						'layout' => 'row',
						'button_label' => esc_html__('Add New', 'alvar'),
						'sub_fields' => array(
							array(
								'key' => 'key_sub_field_uxbarn_portfolio_acf_mixed_content_type',
								'label' => esc_html__('Content Type', 'alvar'),
								'name' => 'uxbarn_portfolio_acf_mixed_content_type',
								'type' => 'select',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'choices' => array(
									'image-slideshow' => esc_html__('Image', 'alvar'),
									'video' => esc_html__('Video', 'alvar'),
								),
								'default_value' => array(
								),
								'allow_null' => 0,
								'multiple' => 0,
								'ui' => 0,
								'ajax' => 0,
								'return_format' => 'value',
								'placeholder' => '',
							),
							array(
								'key' => 'key_sub_field_uxbarn_portfolio_acf_mixed_content_image_slideshow',
								'label' => esc_html__('Images', 'alvar'),
								'name' => 'uxbarn_portfolio_acf_mixed_content_image_slideshow',
								'type' => 'gallery',
								'instructions' => esc_html__('The uploaded images will be displayed on the portfolio single page.', 'alvar'),
								'required' => 0,
								'conditional_logic' => array(
									array(
										array(
											'field' => 'key_sub_field_uxbarn_portfolio_acf_mixed_content_type',
											'operator' => '==',
											'value' => 'image-slideshow',
										),
									),
								),
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'min' => '',
								'max' => '',
								'insert' => 'append',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => 'jpg, jpeg, png, gif',
							),
							array(
								'key' => 'key_sub_field_uxbarn_portfolio_acf_mixed_content_video_url',
								'label' => esc_html__('Video URL', 'alvar'),
								'name' => 'uxbarn_portfolio_acf_mixed_content_video_url',
								'type' => 'text',
								'instructions' => esc_html__('Enter a YouTube or Vimeo URL here.', 'alvar'),
								'required' => 0,
								'conditional_logic' => array(
									array(
										array(
											'field' => 'key_sub_field_uxbarn_portfolio_acf_mixed_content_type',
											'operator' => '==',
											'value' => 'video',
										),
									),
								),
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
							array(
								'key' => 'key_field_uxbarn_portfolio_acf_mixed_content_video_caption',
								'label' => esc_html__('Video Caption', 'alvar'),
								'name' => 'uxbarn_portfolio_acf_mixed_content_video_caption',
								'type' => 'textarea',
								'instructions' => esc_html__('This caption will display right below the video.', 'alvar'),
								'required' => 0,
								'conditional_logic' => array(
									array(
										array(
											'field' => 'key_sub_field_uxbarn_portfolio_acf_mixed_content_type',
											'operator' => '==',
											'value' => 'video',
										),
									),
								),
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
						),
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'uxbarn_portfolio',
						),
					),
				),
				'menu_order' => 4,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));

			endif;

	}
	
}