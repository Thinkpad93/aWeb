<?php
/**
 * Collection of all theme functions
 *
 * @since 1.0.0
 */



/**
 * Register any required and recommended plugins to use with this theme via TGMPA
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_register_additional_plugins' ) ) {
	
	function alvar_register_additional_plugins() {
		
		$plugins = array(
			
			array(
				'name' 		=> 'Kirki',
				'slug' 		=> 'kirki',
				'required' 	=> true,
				'version' 	=> '',
			),
			
			array(
				'name' 		=> 'UXBARN Portfolio',
				'slug' 		=> 'uxbarn-portfolio',
				'source'	=> get_template_directory() . '/includes/plugin-packages/uxbarn-portfolio_1.2.5.1.zip',
				'required' 	=> true,
				'version' 	=> '1.2.5.1',
			),
			
			array(
				'name' 		=> 'Advanced Custom Fields PRO',
				'slug' 		=> 'advanced-custom-fields-pro',
				'source'	=> get_template_directory() . '/includes/plugin-packages/advanced-custom-fields-pro_5.7.9.zip',
				'required' 	=> true,
				'version' 	=> '5.7.9',
			),
			
			array(
				'name' 		=> 'UXBARN Author Profile',
				'slug' 		=> 'uxbarn-author-profile',
				'source'	=> get_template_directory() . '/includes/plugin-packages/uxbarn-author-profile_1.0.1.1.zip',
				'required' 	=> true,
				'version' 	=> '1.0.1.1',
			),
			
			array(
				'name' 		=> 'Envato Market',
				'slug' 		=> 'envato-market',
				'source'	=> get_template_directory() . '/includes/plugin-packages/envato-market_2.0.1.zip',
				'required' 	=> true,
				'version' 	=> '2.0.1',
			),
			
			array(
				'name' 		=> 'Contact Form 7',
				'slug' 		=> 'contact-form-7',
				'required' 	=> false,
				'version' 	=> '',
			),
			
		);
	
		tgmpa( $plugins );
		
	}

}



/**
 * A simple function to return the theme version number
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_get_theme_version' ) ) {
		
	function alvar_get_theme_version() {

		$theme = wp_get_theme();
		return $theme->get( 'Version' );
		
	}
	
}



/**
 * Register site menus
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_register_menus' ) ) {
		
	function alvar_register_menus() {
		
		register_nav_menus( array(
				'main_menu' => esc_html__( 'Main Menu', 'alvar' ),
			)
		);
		
	}

}



/**
 * Customize the menu classes for setting the active status when viewing on various templates
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_customize_menu_item_classes' ) ) {

	function alvar_customize_menu_item_classes( $classes, $item, $args ) {
		
		if ( 'main_menu' !== $args->theme_location ) {
			return $classes;
		}
		
		$menu_text = '';
		
		// For Blog
		if ( is_singular( 'post' ) || is_category() || is_tag() || is_author() ) {
			$menu_text = esc_html( get_theme_mod( 'alvar_ctmzr_general_options_blog_menu_text_active_status', esc_html__( 'Blog', 'alvar' ) ) );
		}
		
		// For Portfolio
		if ( is_tax( 'uxbarn_portfolio_tax' ) || is_singular( 'uxbarn_portfolio' ) ) {
			$menu_text = esc_html( get_theme_mod( 'alvar_ctmzr_portfolio_options_portfolio_menu_text_active_status', esc_html__( 'Portfolio', 'alvar' ) ) );
		}
		
		
		
		if ( $menu_text === $item->title ) {
			$classes[] = 'current-menu-item';
		}
		
		return array_unique( $classes );
		
	}

}



if ( ! function_exists( 'alvar_register_widget_areas' ) ) {
	
	function alvar_register_widget_areas() {
		
		// Theme Widget Area
		$column_number = intval( get_theme_mod( 'alvar_ctmzr_footer_widget_area_styles_footer_widget_area_column_number', '4' ) );
	
		for ( $i = 1; $i <= $column_number; $i++ ) {
			
			register_sidebar( array (
				'name' 			=> sprintf( esc_html__( 'Widget Area Column %d', 'alvar' ), $i ),
				'id' 			=> 'alvar-widget-area-' . $i,
				'description' 	=> esc_html__( 'This widget area will be displayed in the footer right below normal content. To hide or show the entire widget area, go to "Appearance > Customize > Footer Styles" (make sure the Kirki plugin is already installed.)', 'alvar' ),
				'before_widget' => '<section id="%1$s" class="%2$s widget-item">',
				'after_widget' 	=> '</section>',
				'before_title' 	=> '<h4 class="widget-title">',
				'after_title' 	=> '</h4>',
				)
			);
			
		}
		
	}

}
	


/**
 * Adjust the number of posts per page in the search template
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_adjust_search_posts_per_page' ) ) {

	function alvar_adjust_search_posts_per_page( $query ) {
		
		if ( $query->is_search() ) {
			$query->set( 'posts_per_page', get_theme_mod( 'alvar_ctmzr_general_options_number_of_posts_search_results', 10 ) );
		}
		
	}

}



/**
 * Modify WP post_class() via a filter in functions.php
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_modify_post_classes' ) ) {

	function alvar_modify_post_classes( $classes, $class, $post_id ) {
		
		if ( is_home() || is_page() || is_single() || is_archive() || is_search() ) {
			
			$classes = array_merge( $classes, array( 'post-item' ) );
			
			if ( is_singular( 'uxbarn_portfolio' ) ) {
				
				$post_format = get_post_meta( $post_id, 'uxbarn_portfolio_item_format', true );
				$classes[] = $post_format;
				
			}
			
		}
		
		return $classes;
		
	}

}



/**
 * Modify WP body_class() via a filter in functions.php
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_modify_body_classes' ) ) {

	function alvar_modify_body_classes( $classes ) {
		
		$full_screen_bg_class = '';
		if ( get_theme_mod( 'alvar_ctmzr_site_background_full_screen', false ) ) {
			$full_screen_bg_class = 'full-screen-bg';
		}

		$classes[] = $full_screen_bg_class;
		
		return $classes;
		
	}

}



/**
 * Register theme image sizes
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_register_theme_image_sizes' ) ) {
		
	function alvar_register_theme_image_sizes() {
		
		add_image_size( 'alvar-port-list-large', 9999, 600 );
		add_image_size( 'alvar-port-single', 1090, 9999 );
		add_image_size( 'alvar-port-single-portrait', 590, 9999 );
		
	}
	
}



/**
 * Modify the output of the excerpt more text
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_get_excerpt_more_text' ) ) {

	function alvar_get_excerpt_more_text() {

		return ' ... ';

	}

}



/**
 * Modify the output of page titles
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_modify_page_titles' ) ) {

	function alvar_modify_page_titles( $title ) {
		
		$findthese = array(
			'#Protected:#',
			'#Private:#'
		);

		$replacewith = array(
			'', // What to replace "Protected:" with
			'' // What to replace "Private:" with
		);

		$title = preg_replace( $findthese, $replacewith, $title );
		return $title;

	}

}



/**
 * Override WP max excerpt length
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_custom_excerpt_length' ) ) {
	
	function alvar_custom_excerpt_length( $length ) {
		return 999;
	}
	
}



/**
 * Print the custom trimmed excerpt by character length
 * The function must be used in The Loop
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_the_excerpt_max_charlength' ) ) {
		
	function alvar_the_excerpt_max_charlength( $charlength ) {
		
		$excerpt = get_the_excerpt();
		$charlength++;

		if ( mb_strlen( $excerpt ) > $charlength ) {
			
			$subex = mb_substr( $excerpt, 0, $charlength - 5 );
			$exwords = explode( ' ', $subex );
			$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut );
			} else {
				echo esc_html( $subex );
			}
			
			echo '...';
			
		} else {
			echo esc_html( $excerpt );
		}
		
	}

}



/**
 * Get an attachment array
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_get_attachment' ) ) {
		
	function alvar_get_attachment( $attachment_id, $image_size = 'full' ) {
		
		$attachment = get_post( $attachment_id );
		
		// Need to check it first
		if ( isset( $attachment ) ) {
			
			// [0] = src, [1] = width, [2] = height
			$attachment_array = wp_get_attachment_image_src( $attachment_id, $image_size );
			
			return array(
				'id'			=> $attachment->ID,
				'alt' 			=> get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
				'caption' 		=> $attachment->post_excerpt,
				'description' 	=> $attachment->post_content,
				'href' 			=> get_permalink( $attachment->ID ),
				'title' 		=> $attachment->post_title,
				'src' 			=> $attachment_array[0],
				'width'			=> $attachment_array[1],
				'height'		=> $attachment_array[2],
			);
		
		} else {
			
			return array();
			
		}
	}

}



/**
 * Get an attachment id from image URL
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_get_attachment_id_from_src' ) ) {
	
	function alvar_get_attachment_id_from_src( $url ) {
		
		$attachment_id = 0;
		$dir = wp_upload_dir();
		if ( false !== strpos( $url, $dir['baseurl'] . '/' ) ) { // Is URL in uploads directory?
			$file = basename( $url );
			$query_args = array(
				'post_type'   => 'attachment',
				'post_status' => 'inherit',
				'fields'      => 'ids',
				'meta_query'  => array(
					array(
						'value'   => $file,
						'compare' => 'LIKE',
						'key'     => '_wp_attachment_metadata',
					),
				)
			);
			$query = new WP_Query( $query_args );
			if ( $query->have_posts() ) {
				foreach ( $query->posts as $post_id ) {
					$meta = wp_get_attachment_metadata( $post_id );
					$original_file       = basename( $meta['file'] );
					$cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );
					if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
						$attachment_id = $post_id;
						break;
					}
				}
			}
		}
		return $attachment_id;
		
	}

}



/**
 * Get Google Font URL to be used in the theme
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_get_google_fonts_url' ) ) {

	function alvar_get_google_fonts_url() {
		
		$google_fonts = ALVAR_DEFAULT_GOOGLE_FONTS;
		
		// Encode it
		$google_fonts = urlencode( str_replace( '+', ' ', $google_fonts ) );
		
		// Font list
		$query_args = array( 'family' => $google_fonts );
		
		// Character sets
		if ( function_exists( 'ot_get_option' ) ) {
			$char_sets = ot_get_option( 'alvar_to_setting_google_fonts_character_sets', '' );
		} else {
			$char_sets = '';
		}
		
		if ( '' !== $char_sets ) {
			
			$imp_char_sets = implode(',', $char_sets);
			if ( $imp_char_sets != 'latin' ) {
				
				$query_args = array(
									 'family' => $google_fonts,
									 'subset' => $imp_char_sets,
								);
							
			}
			
		}
		
		return add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		
	}

}
	


/**
 * Sanitize strings using wp_kes() with initial allowed tags
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_wp_kses_escape' ) ) {

	function alvar_wp_kses_escape( $string, $additional_allowed_tags = array() ) {
		
		return wp_kses( $string, 
			array(
				'span' => array(), 'strong' => array(), 'br' => array(), 'p' => array( 'class' => array() ), 'em' => array(),
				'a'	=> array( 'href' => array(), 'target' => array(), 'title' => array() ),
				'ul' => array( 'id' => array(), 'class' => array() ),
				'li' => array(),
			) + $additional_allowed_tags
		);
		
	}

}



/**
 * Get the final output of the intro
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_get_intro_output' ) ) {

    function alvar_get_intro_output( $intro ) {
		
		return alvar_wp_kses_escape( $intro );
		
	}

}
	



/**
 * Get the value of specified Customizer options
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_get_theme_mod_value' ) ) {

	function alvar_get_theme_mod_value( $option_set, $option_name, $default_value = '' ) {
		
		if ( isset( $option_set[ $option_name ] ) && $option_set[ $option_name ] != '' ) {
			return $option_set[ $option_name ];
		}
		
		return $default_value;
		
	}
	
}



/**
 * Adjust the title in archive templates
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_filter_archive_title' ) ) {
		
	function alvar_filter_archive_title( $title ) {
		
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>' ;
		}

		return $title;
		
	}
	
}



/**
 * Print the pagination on single posts and pages
 * Must be used within the Loop
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_print_post_pagination' ) ) {

	function alvar_print_post_pagination() {
		
		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'alvar' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'alvar' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		
	}

}



if ( ! function_exists( 'alvar_hex2rgb' ) ) {
	
	function alvar_hex2rgb( $hex ) {
		
	   $hex = str_replace( "#", "", $hex );
	 
	   if ( strlen( $hex ) == 3 ) {
		
		  $r = hexdec( substr( $hex, 0, 1 ).substr( $hex, 0, 1 ) );
		  $g = hexdec( substr( $hex, 1, 1 ).substr( $hex, 1, 1 ) );
		  $b = hexdec( substr( $hex, 2, 1 ).substr( $hex, 2, 1 ) );
		  
	   } else {
		
		  $r = hexdec( substr( $hex, 0, 2 ) );
		  $g = hexdec( substr( $hex, 2, 2 ) );
		  $b = hexdec( substr( $hex, 4, 2 ) );
		  
	   }
	   
	   $rgb = array( $r, $g, $b );
	   
	   return $rgb; // returns an array with the rgb values
	   
	}
	
}



/**
 * Display site social icons
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_display_social_icon_set' ) ) {

	function alvar_display_social_icon_set( $type = 'icons' ) {
		
		// Social Icon Set
		$facebook_url 	 = get_theme_mod( 'alvar_ctmzr_site_identity_facebook_url', '' );
		$twitter_url 	 = get_theme_mod( 'alvar_ctmzr_site_identity_twitter_url', '' );
		$google_plus_url = get_theme_mod( 'alvar_ctmzr_site_identity_google_plus_url', '' );
		$instagram_url 	 = get_theme_mod( 'alvar_ctmzr_site_identity_instagram_url', '' );
		$flickr_url 	 = get_theme_mod( 'alvar_ctmzr_site_identity_flickr_url', '' );
		$px500_url 	 	 = get_theme_mod( 'alvar_ctmzr_site_identity_500px_url', '' );
		$pinterest_url 	 = get_theme_mod( 'alvar_ctmzr_site_identity_pinterest_url', '' );
		$linkedin_url 	 = get_theme_mod( 'alvar_ctmzr_site_identity_linkedin_url', '' );
		$dribbble_url 	 = get_theme_mod( 'alvar_ctmzr_site_identity_dribbble_url', '' );
		$behance_url 	 = get_theme_mod( 'alvar_ctmzr_site_identity_behance_url', '' );
		$vimeo_url 	 	 = get_theme_mod( 'alvar_ctmzr_site_identity_vimeo_url', '' );
		$youtube_url 	 = get_theme_mod( 'alvar_ctmzr_site_identity_youtube_url', '' );
		$soundcloud_url  = get_theme_mod( 'alvar_ctmzr_site_identity_soundcloud_url', '' );
		$rss_url  		 = get_theme_mod( 'alvar_ctmzr_site_identity_rss_url', '' );
		
		$is_all_social_url_empty = false;
		
		if ( empty( $facebook_url ) && empty( $twitter_url ) && empty( $google_plus_url ) && empty( $instagram_url ) && empty( $flickr_url ) && 
			 empty( $pinterest_url ) && empty( $linkedin_url ) && empty( $dribbble_url ) && empty( $behance_url ) && empty( $vimeo_url ) && 
			 empty( $youtube_url ) && empty( $px500_url ) && empty( $soundcloud_url ) && empty( $rss_url ) ) {
			$is_all_social_url_empty = true;
		}
		
		
		if ( ! $is_all_social_url_empty ) {
			
			// Default values to "icons" type
			$social_ul_class = 'social-icons';
			$facebook = '<i class="fa fa-facebook"></i>';
			$twitter = '<i class="fa fa-twitter"></i>';
			$google_plus = '<i class="fa fa-google-plus"></i>';
			$instagram = '<i class="fa fa-instagram"></i>';
			$flickr = '<i class="fa fa-flickr"></i>';
			$px500 = '<i class="fa fa-500px"></i>';
			$pinterest = '<i class="fa fa-pinterest"></i>';
			$linkedin = '<i class="fa fa-linkedin"></i>';
			$dribbble = '<i class="fa fa-dribbble"></i>';
			$behance = '<i class="fa fa-behance"></i>';
			$vimeo = '<i class="fa fa-vimeo"></i>';
			$youtube = '<i class="fa fa-youtube-play"></i>';
			$soundcloud = '<i class="fa fa-soundcloud"></i>';
			$rss = '<i class="fa fa-rss"></i>';
			
			if ( 'text' === $type ) {
				
				$social_ul_class = 'social-links';
				$facebook = esc_html__( 'Facebook', 'alvar' );
				$twitter = esc_html__( 'Twitter', 'alvar' );
				$google_plus = esc_html__( 'Google+', 'alvar' );
				$instagram = esc_html__( 'Instagram', 'alvar' );
				$flickr = esc_html__( 'Flickr', 'alvar' );
				$px500 = esc_html__( '500px', 'alvar' );
				$pinterest = esc_html__( 'Pinterest', 'alvar' );
				$linkedin = esc_html__( 'LinkedIn', 'alvar' );
				$dribbble = esc_html__( 'Dribbble', 'alvar' );
				$behance = esc_html__( 'Behance', 'alvar' );
				$vimeo = esc_html__( 'Vimeo', 'alvar' );
				$youtube = esc_html__( 'YouTube', 'alvar' );
				$soundcloud = esc_html__( 'SoundCloud', 'alvar' );
				$rss = esc_html__( 'RSS', 'alvar' );
				
			}
					
			echo '<div class="social-icon-wrapper"><ul class="' . esc_attr( $social_ul_class ) . '">';
		
			if ( ! empty( $facebook_url ) ) {
				echo '<li><a href="' . esc_url( $facebook_url ) . '" target="_blank">' . $facebook . '</a></li>';
			}
			
			if ( ! empty( $twitter_url ) ) {
				echo '<li><a href="' . esc_url( $twitter_url ) . '" target="_blank">' . $twitter . '</a></li>';
			}
			
			if ( ! empty( $google_plus_url ) ) {
				echo '<li><a href="' . esc_url( $google_plus_url ) . '" target="_blank">' . $google_plus . '</a></li>';
			}
			
			if ( ! empty( $instagram_url ) ) {
				echo '<li><a href="' . esc_url( $instagram_url ) . '" target="_blank">' . $instagram . '</a></li>';
			}
			
			if ( ! empty( $flickr_url ) ) {
				echo '<li><a href="' . esc_url( $flickr_url ) . '" target="_blank">' . $flickr . '</a></li>';
			}
			
			if ( ! empty( $px500_url ) ) {
				echo '<li><a href="' . esc_url( $px500_url ) . '" target="_blank">' . $px500 . '</a></li>';
			}
			
			if ( ! empty( $pinterest_url ) ) {
				echo '<li><a href="' . esc_url( $pinterest_url ) . '" target="_blank">' . $pinterest . '</a></li>';
			}
			
			if ( ! empty( $linkedin_url ) ) {
				echo '<li><a href="' . esc_url( $linkedin_url ) . '" target="_blank">' . $linkedin . '</a></li>';
			}
			
			if ( ! empty( $dribbble_url ) ) {
				echo '<li><a href="' . esc_url( $dribbble_url ) . '" target="_blank">' . $dribbble . '</a></li>';
			}
			
			if ( ! empty( $behance_url ) ) {
				echo '<li><a href="' . esc_url( $behance_url ) . '" target="_blank">' . $behance . '</a></li>';
			}
			
			if ( ! empty( $vimeo_url ) ) {
				echo '<li><a href="' . esc_url( $vimeo_url ) . '" target="_blank">' . $vimeo . '</a></li>';
			}
			
			if ( ! empty( $youtube_url ) ) {
				echo '<li><a href="' . esc_url( $youtube_url ) . '" target="_blank">' . $youtube . '</a></li>';
			}
			
			if ( ! empty( $soundcloud_url ) ) {
				echo '<li><a href="' . esc_url( $soundcloud_url ) . '" target="_blank">' . $soundcloud . '</a></li>';
			}
			
			if ( ! empty( $rss_url ) ) {
				echo '<li><a href="' . esc_url( $rss_url ) . '" target="_blank">' . $rss . '</a></li>';
			}
			
			echo '</ul></div>';
			
		}
		
	}

}



/**
 * Whether to print out the h1 tag for the site title
 *
 * @since 1.0.2
 */
if ( ! function_exists( 'alvar_is_site_title_h1_allowed' ) ) {

	function alvar_is_site_title_h1_allowed() {
		
		if ( is_front_page() ) {
			return true;
		}
		
		return false;
		
	}

}



/**
 * Create a video embed wrapper to handle the max width of the video
 *
 * @since 1.0.4
 */
if ( ! function_exists( 'alvar_create_video_embed_wrapper' ) ) {

	function alvar_create_video_embed_wrapper( $html ) {
		return '<div class="video-wrapper">' . $html . '</div>';
	}

}
	


/**
 * Print out comments
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_create_custom_comment' ) ) {
	 
	function alvar_create_custom_comment( $comment, $args, $depth ) {
		
		//$GLOBALS['comment'] = $comment;
		//extract( $args, EXTR_SKIP );

		if ( 'div' === $args['style'] ) {
			
			$tag = 'div';
			$add_below = 'comment';
			
		} else {
			
			$tag = 'li';
			$add_below = 'div-comment';
			
		}

?>
		<<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		
		<?php if ( 'div' !== $args['style'] ) : ?>
			<article id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
		<?php endif; ?>
		
			<div class="comment-author-avatar">
				<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</div>
			
			<div class="comment-content-wrapper">
				
				<?php edit_comment_link( esc_html__( 'Edit', 'alvar' ), '', '' ); ?>
				
				<footer class="comment-meta">
					<div class="comment-author">
						<?php printf( '<cite class="fn">%s</cite> ', get_comment_author_link() ); ?>
					</div>
					
					<div class="comment-date">
						<a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>"><?php echo alvar_wp_kses_escape( sprintf( __( '%1$s at %2$s', 'alvar' ), get_comment_date(),  get_comment_time() ) ); ?></a>
					</div>
				</footer>
				
				<div class="comment-content">
					<?php comment_text(); ?>
					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php esc_html_e( '* Your comment is awaiting moderation.', 'alvar' ); ?></p>
					<?php endif; ?>
				</div>
				
				<div class="reply">
					<?php 
						
						echo get_comment_reply_link( 
								array_merge( $args, array( 
									'reply_text' 	=> esc_html__( 'Reply', 'alvar' ),
									'add_below' 	=> $add_below,
									'depth' 		=> $depth,
									'max_depth' 	=> $args['max_depth'],
								) ) 
							);
						
					?>
				</div>
				
			</div>
			
		<?php if ( 'div' !== $args['style'] ) : ?>
			</article>
		<?php endif; ?>
		<?php    
				
	}

}