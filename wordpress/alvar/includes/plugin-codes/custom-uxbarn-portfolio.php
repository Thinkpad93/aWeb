<?php
/**
 * Customizing UXBARN Portfolio plugin
 *
 * @since 1.0.0
 */



if ( ! function_exists( 'alvar_portfolio_custom' ) ) {
	
	function alvar_portfolio_custom() {
		
		// Filter to override the plugin's shortcode output
		add_filter( 'uxb_port_load_portfolio_shortcode_filter', 'alvar_custom_port_load_portfolio_shortcode', 10, 2 );
		
		// Filter to override the plugin's CPT argument
		add_filter( 'uxb_port_register_cpt_args_filter', 'alvar_custom_port_cpt_args' );
		
		// Filter to override the plugin's taxonomy argument
		add_filter( 'uxb_port_register_tax_args_filter', 'alvar_custom_port_tax_args' );
		
		// Filter to override the plugin's item list in the back end
		add_filter( 'uxb_port_create_columns_header_filter', 'alvar_custom_port_create_columns_header', 10, 3 );
			
		// Modify the query when displaying portfolio items
		add_action( 'pre_get_posts', 'alvar_modify_portfolio_query' );
		
		
		
		/**
		 * DEPRECATED SINCE v2.0.0
		 * The code below is deprecated as it is related to OptionTree.
		 * For more information about this, please go to https://uxbarn.com/optiontree-deprecated
		 */
		
		if ( class_exists( 'OT_Loader' ) ) {
			
			// Register custom meta boxes
			add_action( 'admin_init', 'alvar_custom_port_create_item_format_setting' );
			
		}
		
	}
	
}




if ( ! function_exists( 'alvar_modify_portfolio_query' ) ) {

	function alvar_modify_portfolio_query( $query ) {
		
		// This will be applied to portfolio taxonomy template
		if ( $query->is_tax( 'uxbarn_portfolio_tax' ) && 
			 ! is_page_template( 'template-all-works.php' ) && 
			 ! is_page_template( 'template-featured-works.php' ) ) {
			
			$query_values = alvar_get_portfolio_all_works_template_values();
			
			// Posts per page
			$query->set( 'posts_per_page', $query_values['posts_per_page'] );
			
			// Order by
			$query->set( 'orderby', $query_values['orderby'] );
			
			// Order
			$query->set( 'order', $query_values['order'] );
			
			if ( 'carousel' === alvar_get_portfolio_display_mode() ) {
				$query->set( 'nopaging', true );
			}
			
		}
		
	}

}



if ( ! function_exists( 'alvar_get_portfolio_all_works_template_values' ) ) {

	function alvar_get_portfolio_all_works_template_values() {
		
		return array(
			'posts_per_page'	=> get_theme_mod( 'alvar_ctmzr_portfolio_options_all_works_number_of_items', 9 ),
			'orderby'			=> get_theme_mod( 'alvar_ctmzr_portfolio_options_all_works_portfolio_items_order_by', 'ID' ),
			'order'				=> get_theme_mod( 'alvar_ctmzr_portfolio_options_all_works_portfolio_items_order', 'DESC' ),
		);
		
	}

}
	



if ( ! function_exists( 'alvar_custom_port_cpt_args' ) ) {

	function alvar_custom_port_cpt_args( $args ) {
	
		$args = array(
					'label' 			=> esc_html__( 'Portfolio', 'alvar' ),
					'labels' 			=> array(
												'singular_name'		=> esc_html__( 'Portfolio', 'alvar' ),
												'add_new' 			=> esc_html__( 'Add New Portfolio Item', 'alvar' ),
												'add_new_item' 		=> esc_html__( 'Add New Portfolio Item', 'alvar' ),
												'new_item' 			=> esc_html__( 'New Portfolio Item', 'alvar' ),
												'edit_item' 		=> esc_html__( 'Edit Portfolio Item', 'alvar' ),
												'all_items' 		=> esc_html__( 'All Portfolio Items', 'alvar' ),
												'view_item' 		=> esc_html__( 'View Portfolio', 'alvar' ),
												'search_items' 		=> esc_html__( 'Search Portfolio', 'alvar' ),
												'not_found' 		=> esc_html__( 'Nothing found', 'alvar' ),
												'not_found_in_trash' => esc_html__( 'Nothing found in Trash', 'alvar' ),
											),
					'menu_icon' 		=> ALVAR_THEME_ROOT_IMAGE_URL . 'admin/uxbarn-admin-s.jpg',
					'description' 		=> '',
					'public' 			=> true,
					'show_ui' 			=> true,
					'capability_type' 	=> 'post',
					'hierarchical' 		=> false,
					'has_archive' 		=> false,
					'supports' 			=> array( 'title', 'editor', 'thumbnail', 'revisions', 'comments' ),
					'rewrite' 			=> array( 'slug' => esc_html( get_theme_mod( 'alvar_ctmzr_portfolio_options_portfolio_slug', esc_html__( 'portfolio', 'alvar' ) ) ), 'with_front' => false )
				);
		
		return $args;
		
	}

}



if ( ! function_exists( 'alvar_custom_port_tax_args' ) ) {

	function alvar_custom_port_tax_args( $args ) {
	
		$args = array(
					'label' 			=> esc_html__( 'Portfolio Categories', 'alvar' ), 
					'labels' 			=> array(
											'singular_name' => esc_html__( 'Portfolio Category', 'alvar' ),
											'search_items' 	=> esc_html__( 'Search Categories', 'alvar' ),
											'all_items' 	=> esc_html__( 'All Categories', 'alvar' ),
											'edit_item' 	=> esc_html__( 'Edit Category', 'alvar' ), 
											'update_item' 	=> esc_html__( 'Update Category', 'alvar' ),
											'add_new_item' 	=> esc_html__( 'Add New Category', 'alvar' ),
										),
					'singular_label' 	=> esc_html__( 'Portfolio Category', 'alvar' ),
					'hierarchical' 		=> true, 
					'rewrite' 			=> array( 'slug' => esc_html( get_theme_mod( 'alvar_ctmzr_portfolio_options_portfolio_category_slug', esc_html__( 'portfolio-category', 'alvar' ) ) ) ),
				);
				
		return $args;
	
	}
	
}



if ( ! function_exists( 'alvar_custom_port_create_columns_header' ) ) {
	
	function alvar_custom_port_create_columns_header( $merged_columns, $defaults, $custom_columns ) {
		
		$custom_columns = array(
			'cb' 			=> '<input type=\"checkbox\" />',
			'title' 		=> esc_html__( 'Title', 'alvar' ),
			'cover_image' 	=> esc_html__( 'Featured Image', 'alvar' ),
			'item_format' 	=> esc_html__( 'Item Format', 'alvar' ),
			'terms' 		=> esc_html__( 'Categories', 'alvar' ),
		);
		
		$merged_columns = array_merge( $custom_columns, $defaults );
		
		return $merged_columns;
		
	}
	
}



if ( ! function_exists( 'alvar_custom_port_create_columns_content') ) {
	
	function alvar_custom_port_create_columns_content( $column ) {
		
		global $post;
		switch ( $column )
		{
			case 'cover_image':
				the_post_thumbnail( 'thumbnail' );
				break;
			case 'item_format':
				echo ucwords( get_post_meta( $post->ID, 'uxbarn_portfolio_item_format', true ) );
				break;
			case 'terms':
				$terms = get_the_terms( $post->ID, 'uxbarn_portfolio_tax' );
				
				if ( ! empty( $terms ) ) {
					$out = array();
					foreach ( $terms as $term )
						$out[] = '<a href="' . esc_url( get_term_link( $term->slug, 'uxbarn_portfolio_tax' ) ) .'">' . $term->name . '</a>';
						echo join( ', ', $out );
				
				} else {
					echo ' ';
				}
				break;
		}
		
	}
	
}



if ( ! function_exists( 'alvar_print_portfolio_loading' ) ) {

	function alvar_print_portfolio_loading() {
		?>
		
		<div class="portfolio-loading">
			<div class="loading-icon">
				<i class="fa fa-circle-o-notch fa-spin fast-spin fa-fw"></i>
			</div>
			<span class="loading-text"><?php echo esc_html__( 'Loading', 'alvar' ); ?></span>
			<div class="loading-bar">
				<div class="progress-bar"></div>
			</div>
		</div>
		
		<?php
	}
	
}



if ( ! function_exists( 'alvar_print_portfolio_carousel_navigation_buttons' ) ) {

	function alvar_print_portfolio_carousel_navigation_buttons() {
		?>
		
		<a href="javascript:;" class="prev-slide"><?php echo esc_html__( 'Prev', 'alvar' ); ?></a>
		<a href="javascript:;" class="next-slide"><?php echo esc_html__( 'Next', 'alvar' ); ?></a>
		
		<?php
	}
	
}



if ( ! function_exists( 'alvar_get_current_portfolio_template' ) ) {

	function alvar_get_current_portfolio_template() {
		
		$current_template = 'all-works';
		if ( is_page_template( 'template-featured-works.php' ) ) {
			$current_template = 'featured-works';
		}
		
		if ( is_tax( 'uxbarn_portfolio_tax' ) ) {
			$current_template = 'all-works tax-template';
		}
		
		return $current_template;
		
	}
	
}



if ( ! function_exists( 'alvar_get_portfolio_display_mode' ) ) {

	function alvar_get_portfolio_display_mode() {
		
		$current_template = alvar_get_current_portfolio_template();
		$mode = 'flexible-grid';
		
		if ( 'all-works' === $current_template || is_tax( 'uxbarn_portfolio_tax' ) ) {
			$mode = get_theme_mod( 'alvar_ctmzr_portfolio_styles_all_works_display_mode', 'flexible-grid' );
		} else {
			$mode = get_theme_mod( 'alvar_ctmzr_portfolio_styles_featured_works_display_mode', 'carousel' );
		}
		
		return $mode;
		
	}
	
}



if ( ! function_exists( 'alvar_get_portfolio_content_class' ) ) {

	function alvar_get_portfolio_content_class( $mode ) {
		
		$content_class = 'content-width-large';
		if ( 'carousel' === $mode ) {
			$content_class = 'content-width-full';
		}
		
		return $content_class;
		
	}
	
}



if ( ! function_exists( 'alvar_get_default_portfolio_wrapper_title_text' ) ) {

	function alvar_get_default_portfolio_wrapper_title_text() {
		return __( 'Drag to slide / Click to view', 'alvar' );
	}
	
}



if ( ! function_exists( 'alvar_get_portfolio_single_image_size' ) ) {

	function alvar_get_portfolio_single_image_size( $orientation = 'landscape' ) {
		
		$image_size = 'alvar-port-single';
		if ( 'portrait' === $orientation ) {
			$image_size = 'alvar-port-single-portrait';
		}
		
		if ( get_theme_mod( 'alvar_ctmzr_portfolio_options_use_full_size_image_single_pages', false ) ) {
			$image_size = 'full';
		}
		
		return $image_size;
		
	}

}



if ( ! function_exists( 'alvar_print_portfolio_image_format_content' ) ) {

	function alvar_print_portfolio_image_format_content( $images ) {
		
		$is_data_migrated = alvar_is_custom_field_data_migrated();
		
		if ( ! $is_data_migrated ) {
			
			// If not, it means the $images is a string saved by OptionTree
			$image_id_array = explode( ',', $images );
			foreach( $image_id_array as $image_id ) {
				alvar_print_portfolio_image_format_content_loop( $image_id );
			}
			
		} else {
			
			// If migrated, the $images is a serialized array saved by ACF
			if ( $images ) {
				foreach( $images as $image ) {
					alvar_print_portfolio_image_format_content_loop( $image['ID'] );
				}
			}
			
		}
		
	}
	
}



if ( ! function_exists( 'alvar_print_portfolio_image_format_content_loop' ) ) {

	function alvar_print_portfolio_image_format_content_loop( $image_id ) {
	
		$full_size_attachment = alvar_get_attachment( $image_id );
		
		if ( ! empty( $full_size_attachment ) ) {
			
			$width = $full_size_attachment['width'];
			$height = $full_size_attachment['height'];
			
			$image_size = alvar_get_portfolio_single_image_size();
			$orientation_class = 'landscape';
			
			// Portrait photo
			if ( $height > 0 && $width/$height < 1 ) {
				
				$image_size = alvar_get_portfolio_single_image_size( 'portrait' );
				$orientation_class = 'portrait';
				
			}
			
			$display_size_attachment = alvar_get_attachment( $image_id, $image_size );
			
			if ( ! empty( $display_size_attachment ) ) {
				
				// srcset and sizes attributes
				$img_srcset_attr = wp_get_attachment_image_srcset( $display_size_attachment['id'], $image_size );
				$img_sizes_attr = wp_get_attachment_image_sizes( $display_size_attachment['id'], $image_size );
				$width = $display_size_attachment['width'];
				$height = $display_size_attachment['height'];
				
				echo '<div class="port-format-item image-wrapper ' . esc_attr( $orientation_class ) . '">';
				echo '<div class="inner-image-wrapper">';
				
				$img_code = '<img src="' . esc_url( $display_size_attachment['src'] ) . '" alt="' . esc_attr( $display_size_attachment['alt'] ) . '" width="' . intval( $width ) . '" height="' . intval( $height ) . '" srcset="' . esc_attr( $img_srcset_attr ) . '" sizes="' . esc_attr( $img_sizes_attr ) . '" />';
				
				// Enable lightbox
				$enable_lightbox = get_theme_mod( 'alvar_ctmzr_portfolio_options_enable_lightbox', true );
				
				if ( $enable_lightbox ) {
					echo '<a href="' . esc_url( $full_size_attachment['src'] ) . '" class="image-box" data-fancybox-group="portfolio-images">' . $img_code . '</a>';
				} else {
					echo ' ' . $img_code;
				}
				
				// Image caption
				$caption = $display_size_attachment['caption'];
				if ( ! empty( $caption ) ) {
					echo '<div class="image-caption content-width">' . esc_html( $caption ) . '</div>';
				}
				
				echo '</div>'; // .inner-image-wrapper
				echo '</div>'; // .image-wrapper
		
			}
			
		}
		
	}
	
}



if ( ! function_exists( 'alvar_print_portfolio_video_format_content' ) ) {

	function alvar_print_portfolio_video_format_content( $video_url ) {
		
		echo '<div class="port-format-item video-wrapper">' . wp_oembed_get( esc_url( $video_url ) ) . '</div>';
		
	}
	
}





/**
 * DEPRECATED SINCE v2.0.0
 * The function below is deprecated as it is related to OptionTree.
 * For more information about this, please go to https://uxbarn.com/optiontree-deprecated
 */
if ( ! function_exists( 'alvar_custom_port_create_item_format_setting' ) ) {
		
	function alvar_custom_port_create_item_format_setting() {
		
		$args = array(
			'id'          => 'uxbarn_portfolio_item_format_meta_box',
			'title'       => esc_html__( 'Portfolio Item Settings', 'alvar' ),
			'desc'        => '',
			'pages'       => array( 'uxbarn_portfolio' ),
			'context'     => 'normal',
			'priority'    => 'high',
			'fields'      => array(
				array(
					'id'          => 'uxbarn_portfolio_item_format',
					'label'       => esc_html__( 'Portfolio Item Format', 'alvar' ),
					'desc'        => alvar_wp_kses_escape( __( 'Select the format for this item. Then you can manage its content using the option below.', 'alvar' ) ),
					'std'         => 'image-slideshow',
					'type'        => 'select',
					'section'     => 'uxbarn_portfolio_item_format_sec',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'choices'     => array( 
					  array(
						'value'       => 'image-slideshow',
						'label'       => esc_html__( 'Image', 'alvar' ),
						'src'         => ''
					  ),
					  array(
						'value'       => 'video',
						'label'       => esc_html__( 'Video', 'alvar' ),
						'src'         => ''
					  ),
					  array(
						'value'       => 'mixed',
						'label'       => esc_html__( 'Mixed', 'alvar' ),
						'src'         => ''
					  ),
					),
				),

				array(
					'id'          => 'uxbarn_portfolio_image_slideshow',
					'label'       => esc_html__( 'Images', 'alvar' ),
					'desc'        => esc_html__( 'The uploaded images will be displayed on the portfolio single page vertically.', 'alvar' ),
					'std'         => '',
					'type'        => 'gallery',
					'section'     => 'uxbarn_portfolio_slideshow_format_sec',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'		=> 'uxbarn_portfolio_item_format:is(image-slideshow)',
			  	),
			  	
			  	array(
					'id'          => 'uxbarn_portfolio_video_url',
					'label'       => esc_html__( 'Video URL', 'alvar' ),
					'desc'        => alvar_wp_kses_escape( __( 'Enter the URL to your YouTube or Vimeo video here. <br/><br/>For example, <em>"http://www.youtube.com/watch?v=G_G8SdXktHg"</em> for YouTube. Or, <em>"http://vimeo.com/7449107"</em> for Vimeo.', 'alvar' ) ),
					'std'         => '',
					'type'        => 'text',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'		=> 'uxbarn_portfolio_item_format:is(video)',
		 	 	),
				
				array(
					'id'          => 'uxbarn_portfolio_mixed_content',
					'label'       => esc_html__( 'Mixed Content', 'alvar' ),
					'desc'        => alvar_wp_kses_escape( __( 'Click to add new content and choose what content type you want to use. Note that the "title" field will not be used on the front end.', 'alvar' ) ),
					'std'         => '',
					'type'        => 'list-item',
					'rows'        => '',
					'post_type'   => '',
					'taxonomy'    => '',
					'class'       => '',
					'condition'		=> 'uxbarn_portfolio_item_format:is(mixed)',
					'settings'		=> array(
						array(
							'id'          => 'uxbarn_portfolio_mixed_content_type',
							'label'       => esc_html__( 'Content Type', 'alvar' ),
							'desc'        => '',
							'std'         => 'image-slideshow',
							'type'        => 'select',
							'section'     => 'uxbarn_portfolio_item_format_sec',
							'rows'        => '',
							'post_type'   => '',
							'taxonomy'    => '',
							'class'       => '',
							'choices'     => array( 
								  array(
									'value'       => 'image-slideshow',
									'label'       => esc_html__( 'Image', 'alvar' ),
									'src'         => ''
								  ),
								  array(
									'value'       => 'video',
									'label'       => esc_html__( 'Video', 'alvar' ),
									'src'         => ''
								  ),
							),
						),
						array(
							'id'          => 'uxbarn_portfolio_mixed_content_image_slideshow',
							'label'       => esc_html__( 'Images', 'alvar' ),
							'desc'        => esc_html__( 'The uploaded images will be displayed on the portfolio single page vertically.', 'alvar' ),
							'std'         => '',
							'type'        => 'gallery',
							'section'     => 'uxbarn_portfolio_slideshow_format_sec',
							'rows'        => '',
							'post_type'   => '',
							'taxonomy'    => '',
							'class'       => '',
							'condition'		=> 'uxbarn_portfolio_mixed_content_type:is(image-slideshow)',
					  	),
					  	
					  	array(
							'id'          => 'uxbarn_portfolio_mixed_content_video_url',
							'label'       => esc_html__( 'Video URL', 'alvar' ),
							'desc'        => alvar_wp_kses_escape( __( 'Enter the URL to your YouTube or Vimeo video here. <br/><br/>For example, <em>"http://www.youtube.com/watch?v=G_G8SdXktHg"</em> for YouTube. Or, <em>"http://vimeo.com/7449107"</em> for Vimeo.', 'alvar' ) ),
							'std'         => '',
							'type'        => 'text',
							'rows'        => '',
							'post_type'   => '',
							'taxonomy'    => '',
							'class'       => '',
							'condition'		=> 'uxbarn_portfolio_mixed_content_type:is(video)',
				 	 	),
						
					),
			  	),
					
			)
		);
		
		ot_register_meta_box( $args );
		
	}

}