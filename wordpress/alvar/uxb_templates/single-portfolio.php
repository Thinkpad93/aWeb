<?php
/**
 * Custom template that overrides the default one of UXBARN Portfolio plugin
 *
 * @since 1.0.0
 */
 
 get_header(); ?>

<main id="content-container" class="single-portfolio content-width-large">
		
	<?php while ( have_posts() ) : the_post(); ?>
		
		<?php 
			
			$post_id = get_the_ID();
			$display_post_format_content = true; 
			$post_format = get_post_meta( $post_id, 'uxbarn_portfolio_item_format', true );
			$no_image_class = '';
			$portfolio_format_content = '';
				
			// Check if the custom field data is already migrated to ACF
			$is_data_migrated = alvar_is_custom_field_data_migrated();
			
			if ( 'image-slideshow' === $post_format ) {
					
				if ( ! $is_data_migrated ) {
					
					// If not yet migrated, use the deprecated OptionTree field
					$portfolio_format_content = get_post_meta( $post_id, 'uxbarn_portfolio_image_slideshow', true );
					
				} else {
					
					// If migrated, use the ACF field
					if ( function_exists( 'get_field' ) ) {
						$portfolio_format_content = get_field( 'uxbarn_portfolio_acf_image_slideshow' );
					}
					
				}
				
			} else if ( 'video' === $post_format ) {
				
				$portfolio_format_content = get_post_meta( $post_id, 'uxbarn_portfolio_video_url', true );
				
			} else { // For mixed format
					
				if ( ! $is_data_migrated ) {
					
					// If not yet migrated, use the deprecated OptionTree field
					$portfolio_format_content = get_post_meta( $post_id, 'uxbarn_portfolio_mixed_content', true );
					
				} else {
					
					// If migrated, use the ACF field
					if ( function_exists( 'get_field' ) ) {
						$portfolio_format_content = get_field( 'uxbarn_portfolio_acf_mixed_content' );
					}
					
				}
				
			}
			
			
			// If the content is empty and password required, then hide the format section
			if ( empty( $portfolio_format_content ) || post_password_required() ) {
			
				$display_post_format_content = false;
				$no_image_class = 'no-image';
					
			}
			
		?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<div class="portfolio-content-wrapper content-width">
					
				<div class="<?php echo esc_attr( implode( ' ', array( 'post-content-container clearfix', $no_image_class ) ) ); ?>">
					
					<div class="post-title-wrapper">
						<h1 class="post-title"><?php the_title(); ?></h1>
					</div>
					<div class="post-content-wrapper no-margin-bottom">
						<div class="post-content">
							<?php
							
								the_content();
								alvar_print_post_pagination();
								
							?>
						</div>
					</div>
						
				</div>
				
				<?php 
					
					if ( $display_post_format_content ) {
						alvar_print_portfolio_loading();
					}
				
				?>
				
			</div>
			
			<?php if ( $display_post_format_content ) : ?>
			
				<div class="port-format-content">
					<?php
						
						// For Images format
						if ( 'image-slideshow' === $post_format ) {
							alvar_print_portfolio_image_format_content( $portfolio_format_content );
						} else if ( 'video' === $post_format ) {
							alvar_print_portfolio_video_format_content( $portfolio_format_content );
						} else { // For Mixed format
							
							foreach( $portfolio_format_content as $content ) {
									
								// If the OT values are all migrated to ACF fields, then these values will be used instead
								if ( $is_data_migrated ) {
									
									$mixed_content_type = $content['uxbarn_portfolio_acf_mixed_content_type'];
									$mixed_content_image_slideshow = $content['uxbarn_portfolio_acf_mixed_content_image_slideshow'];
									$mixed_content_video_url = $content['uxbarn_portfolio_acf_mixed_content_video_url'];
									//$mixed_video_caption = $content['uxbarn_portfolio_acf_mixed_content_video_caption'];
									
								} else {
										
									// Otherwise, use OT values (deprecated since 2.0.0)
									$mixed_content_type = $content['uxbarn_portfolio_mixed_content_type'];
									$mixed_content_image_slideshow = $content['uxbarn_portfolio_mixed_content_image_slideshow'];
									$mixed_content_video_url = $content['uxbarn_portfolio_mixed_content_video_url'];
									//$mixed_video_caption = $content['uxbarn_portfolio_mixed_content_video_caption'];
									
								}
								
								
								if ( 'image-slideshow' === $mixed_content_type ) {
									
									$image_content = $mixed_content_image_slideshow;
									if ( ! empty( $image_content ) ) {
										alvar_print_portfolio_image_format_content( $image_content );
									}
									
								} else {
									
									$video_content = $mixed_content_video_url;
									if ( ! empty( $video_content ) ) {
										alvar_print_portfolio_video_format_content( $video_content );
									}
									
								}
								
							}
							
						}
						
					?>
				</div>
				<!-- .post-format-wrapper -->
				
			<?php endif; // End if ( $display_post_format_content ) : ?>
			
			<?php 
				
				$show_comments = get_theme_mod( 'alvar_ctmzr_portfolio_options_enable_portfolio_comments', false );
				
				// Comment Section
				if ( $show_comments ) {
					
					echo '<div class="portfolio-content-wrapper content-width">';
					echo '<div class="post-content-container portfolio-comments clearfix">';
					comments_template(); 
					echo '</div>';
					echo '</div>';
					
				}
				
			?>
			
		</article>
		
	<?php endwhile; ?>

</main>

<?php
	
	if ( get_theme_mod( 'alvar_ctmzr_portfolio_options_enable_post_navigation', false ) ) {
		
		$with_comments_class = ' no-comments ';
		if ( $show_comments ) {
			$with_comments_class = ' with-comments ';
		}
		
		echo '<div class="next-prev-post-navigation content-width ' . esc_attr( $with_comments_class ) . '">';
		
		the_post_navigation( array(
			
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Post', 'alvar' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . esc_html__( 'Previous', 'alvar' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper"><i class="ion-ios-arrow-thin-left"></i></span>%title</span>',
					
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Post', 'alvar' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . esc_html__( 'Next', 'alvar' ) . '</span><span class="nav-title">%title<span class="nav-title-icon-wrapper"><i class="ion-ios-arrow-thin-right"></i></span></span>',
		
			'in_same_term' => ! get_theme_mod( 'alvar_ctmzr_portfolio_options_enable_post_navigation_all_categories', false ),
			'taxonomy' => 'uxbarn_portfolio_tax',
			
		) );
		
		echo '</div>';
		
	}
	
?>

<?php get_footer(); ?>