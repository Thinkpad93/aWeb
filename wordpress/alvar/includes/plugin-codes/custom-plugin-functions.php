<?php
/**
 * Collection of the functions related to third-party plugins
 *
 * @since 2.0.0
 */



/**
 * Show a notification about the OptionTree plugin
 *
 * @since 2.0.0
 */
if ( ! function_exists( 'alvar_show_ot_notification' ) ) {
		
	function alvar_show_ot_notification() {
		
		?>
			<div class="notice notice-success is-dismissible">
				<p><?php _e( '<strong>[Notice from UXBARN]</strong> It seems the OptionTree plugin is still active on your site. <a href="https://uxbarn.com/optiontree-deprecated" target="_blank">Please click here to read an important announcement</a> about the deprecation of the plugin and its replacement in the UXBARN themes.', 'alvar' ); ?></p>
			</div>
		<?php
		
	}
	
}



/**
 * Show a notification about the data migration from OT to ACF
 *
 * @since 2.0.0
 */
if ( ! function_exists( 'alvar_show_acf_notification' ) ) {
		
	function alvar_show_acf_notification() {
		
		//delete_option( 'alvar_is_custom_field_data_migrated' );
		
		$is_data_migrated = alvar_is_custom_field_data_migrated();
		
		if ( ! $is_data_migrated ) {
				
			$nonce = wp_create_nonce( 'migrate_custom_field_data_nonce' );
			$migrate_button = get_submit_button( 'Migrate Data to ACF', 'primary large', 'migrate-data-ot-acf', true, array( 'data-nonce' => $nonce ) );
			
			?>
				<div class="notice notice-success is-dismissible">
					<p><?php _e( '<strong>[Notice from UXBARN]</strong> The Advanced Custom Fields plugin (ACF) is now active and ready for data migration. Please use the button below to migrate the custom field data from OptionTree.' . $migrate_button, 'alvar' ); ?></p>
				</div>
			<?php
			
		}
		
	}
	
}



/**
 * Disable the default loading image of the Kirki plugin
 *
 * @since 2.0.0
 */
function alvar_plugin_update_kirki_configuration( $config ) {
	
	return wp_parse_args( array(
		'disable_loader' => true,
	), $config );
	
}



/**
 * Disable ACF menu and auto update mechanism as it's bundled with the theme
 *
 * @since 2.0.0
 */
if ( ! function_exists( 'alvar_customize_acf' ) ) {
	
	function alvar_customize_acf() {
			
		// Disable ACF admin menu
		add_filter( 'acf/settings/show_admin', '__return_false' );
		
		// Disable update notification
		add_filter( 'acf/settings/show_updates', '__return_false' );
		
	}
	
}



/**
 * Can be used for checking the status of the custom field data migration
 *
 * @since 2.0.0
 */
if ( ! function_exists( 'alvar_is_custom_field_data_migrated' ) ) {
	
	function alvar_is_custom_field_data_migrated() {
		
		// If there currently is OptionTree active, it needs data migration
		if ( class_exists( 'OT_Loader' ) ) {

			$is_data_migrated = get_option( 'alvar_is_custom_field_data_migrated' );

			if ( ! isset( $is_data_migrated ) ) {
				$is_data_migrated = false;
			}

			return $is_data_migrated;
			
		} else {
			// Otherwise, always return true
			return true;
		}
		
	}
	
}



/**
 * For migrating any saved data from OptionTree to ACF
 *
 * @since 2.0.0
 */
if ( ! function_exists( 'alvar_migrate_custom_field_data' ) ) {
	
	function alvar_migrate_custom_field_data() {
		
		// Check the nonce first
		if ( ! check_ajax_referer( 'migrate_custom_field_data_nonce', 'nonce', false ) ) {
			wp_send_json_error();
		}
		
		
		$args = array(
					'post_type'	=> 'uxbarn_portfolio',
					'nopaging' => true,
				);
		
		// Get portfolio posts
		$query = new WP_Query( $args );
		
		if ( $query->have_posts() ) {
			
			// Loop through portfolio posts and migrate its custom field data to ACF
			while ( $query->have_posts() ) {
				$query->the_post();
				
				$post_id = get_the_ID();
				
				
				
				// FULL-WITH VIEW
				$ot_full_width_view = get_post_meta( $post_id, 'uxbarn_portfolio_enable_full_width', true );
				$full_width_value = false;
				
				if ( 'on' === $ot_full_width_view ) {
					$full_width_value = true;
				}
				
				// Update the full width data to ACF
				update_field( 'uxbarn_portfolio_acf_enable_full_width', $full_width_value, $post_id );
				
				//delete_field( 'uxbarn_portfolio_acf_enable_full_width', $post_id );
				
				
				
				// IMAGE FORMAT: Gallery data
				$ot_image_id_list_string = get_post_meta( $post_id, 'uxbarn_portfolio_image_slideshow', true );
				
				// If there's gallery data from OT
				if ( $ot_image_id_list_string ) {
					
					$ot_image_id_list_array = explode( ',', $ot_image_id_list_string );
					$acf_gallery_serialized_array = array();
					
					// Loop through OT's gallery data and create a new ACF array to be migrated later
					foreach( $ot_image_id_list_array as $ot_image_id ) {
						
						$acf_gallery_serialized_array[] = alvar_create_acf_gallery_data( $ot_image_id );
						
					}
					
					// Update the gallery data to the ACF field
					update_field( 'uxbarn_portfolio_acf_image_slideshow', $acf_gallery_serialized_array, $post_id );
					
					//delete_field( 'uxbarn_portfolio_acf_image_slideshow', $post_id );
					
				}
				
				
				
				// MIXED FORMAT: List item/repeatable field data
				$ot_mixed_array = get_post_meta( $post_id, 'uxbarn_portfolio_mixed_content', true );
				$acf_final_mixed_array = array();
				
				// Loop through the mixed format items of OT
				foreach( $ot_mixed_array as $ot_mixed_item ) {
					
					// Prepare the data of the gallery to be migrated later
					$ot_mixed_item_image_id_list_array = explode( ',', $ot_mixed_item['uxbarn_portfolio_mixed_content_image_slideshow'] );
					$acf_mixed_item_gallery_array = array();
					
					// If there's gallery data from OT
					if ( $ot_mixed_item_image_id_list_array ) {
						
						// Loop through OT's gallery data and create a new ACF array to be migrated later
						foreach( $ot_mixed_item_image_id_list_array as $ot_mixed_item_image_id ) {
							
							$acf_mixed_item_gallery_array[] = alvar_create_acf_gallery_data( $ot_mixed_item_image_id );
							
						}
						
					}
					
					
					// Prepare the final array of the current mixed item to be migrated
					$acf_final_mixed_array[] = array(
						'uxbarn_portfolio_acf_mixed_content_type' => $ot_mixed_item['uxbarn_portfolio_mixed_content_type'],
						'uxbarn_portfolio_acf_mixed_content_image_slideshow' => $acf_mixed_item_gallery_array,
						'uxbarn_portfolio_acf_mixed_content_video_url' => $ot_mixed_item['uxbarn_portfolio_mixed_content_video_url'],
						//'uxbarn_portfolio_acf_mixed_content_video_caption' => $ot_mixed_item['uxbarn_portfolio_mixed_content_video_caption'],
					);
					
				}
				
				// Update the mixed format data to the ACF field
				update_field( 'uxbarn_portfolio_acf_mixed_content', $acf_final_mixed_array, $post_id );
				
				
				
			} // while ( $query->have_posts() ) {
			
			// Update the status after all the data is migrated
			update_option( 'alvar_is_custom_field_data_migrated', true );
			
			sleep(3);
			
			// Send a complete status to alvar-backend.js for showing it on the backend
			wp_send_json_success( esc_html__( 'Migrating custom field data to ACF has been completed! Please check if your data is currently displaying correctly with ACF on both front-end and back-end, you can then safely disable the OptionTree plugin.', 'alvar' ) );
			
		} else { // if ( $query->have_posts() ) {
				
			wp_send_json_error( esc_html__( 'There are no portfolio posts. The migration could not be started.', 'alvar' ) );
			
		}
		
	}
	
}



if ( ! function_exists( 'alvar_create_acf_gallery_data' ) ) {
	
	function alvar_create_acf_gallery_data( $image_id ) {
		
		$image_attachment =  alvar_get_attachment( intval( $image_id ) );
							
		return array( 
			'ID' => intval( $image_id ),
			'alt' => '',
			'title' => '',
			'caption' => $image_attachment['caption'],
			'description' => $image_attachment['description'],
			'mime_type' => '',
			'type' => '',
			'url' => $image_attachment['src'],
			'width' => $image_attachment['width'],
			'height' => $image_attachment['height'],
			'sizes' => array(),
		);
		
	}
	
}