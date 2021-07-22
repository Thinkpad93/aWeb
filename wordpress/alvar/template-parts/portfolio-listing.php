<?php 
/**
 * This template part is for displaying portfolio items
 * It is called in the template-all-works.php and template-featured-works.php
 * 
 * @since 1.0.0
 */
?>

<?php
	
	$current_template = alvar_get_current_portfolio_template();
	$mode = alvar_get_portfolio_display_mode();
	$title_text = alvar_get_default_portfolio_wrapper_title_text();
	
	// To be used in the "portfolio-listing-loop.php" to fix the unwanted height from stacking images issue when they are being loaded
	// The class will be removed in the JS code once the images are completely loaded
	// Two files that initize this session are "portfolio-listing.php" and "taxonomy-portfolio.php"
	$_SESSION[ 'portfolio_item_additional_class' ] = '';
	
	if ( 'flexible-grid' === $mode ) {
		
		$title_text = '';
		$_SESSION[ 'portfolio_item_additional_class' ] = 'visually-hidden';
		
	}
	
?>

<div class="portfolio-listing-wrapper <?php echo esc_attr( implode( ' ', array( $mode ) ) ); ?>">
	
	<div class="portfolio-listing clearfix" title="<?php echo esc_attr( $title_text ); ?>">
		
		<?php
			
			// Default values to All Works Template
			$nopaging = false;
			$selected_terms = get_theme_mod( 'alvar_ctmzr_portfolio_options_all_works_select_categories', array() );
			$query_values = alvar_get_portfolio_all_works_template_values();
			$posts_per_page = $query_values['posts_per_page'];
			$orderby = $query_values['orderby'];
			$order = $query_values['order'];
			
			// If it's featured works template, then get the value from its options
			if ( 'featured-works' === $current_template ) {
				
				// No pagination on the featured-works template
				$nopaging = true;
				$selected_terms = get_theme_mod( 'alvar_ctmzr_portfolio_options_featured_works_select_categories', array() );
				$orderby = get_theme_mod( 'alvar_ctmzr_portfolio_options_featured_works_portfolio_items_order_by', 'ID' );
				$order = get_theme_mod( 'alvar_ctmzr_portfolio_options_featured_works_portfolio_items_order', 'DESC' );
				
			}
			
			
			// If it's carousel, always disable pagination
			if ( 'carousel' === $mode ) {
				$nopaging = true;
			}
			
			
			// Create tax query array to be merged with WP_Query parameter array
			$tax_query_array = array();
			
			if ( ! empty( $selected_terms ) ) {
				
				$tax_query_array = array(
					'tax_query'		=> array( array(
						'taxonomy'	=> 'uxbarn_portfolio_tax',
						'terms'		=> $selected_terms,
						'operator' 	=> 'IN',
					) ),
				);
				
			}
			
			
			// Prepare the correct value for "paged"
			$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			if ( is_front_page() ) {
				$paged = get_query_var( 'page' ) ? get_query_var( 'page' ) : 1;
			}
			
			// Prepare WP_Query parameter array
			$args = array_merge( array(
						'post_type'			=> 'uxbarn_portfolio',
						'nopaging'			=> $nopaging,
						'posts_per_page'	=> $posts_per_page,
						'paged'				=> $paged,
						'orderby'			=> $orderby,
						'order'				=> $order,
					), $tax_query_array );
			
			// Get posts
			$query = new WP_Query( $args );
			//echo var_dump($query->request);
			$item_counter = 1;
			
			// Pagination fix for custom query
			$temp_query = $wp_query;
			$wp_query   = NULL;
			$wp_query   = $query;
			
			// Start the custom Loop
			if ( $query->have_posts() ) {
				
				$max_items = get_theme_mod( 'alvar_ctmzr_portfolio_options_featured_works_number_of_items', 5 );
				
				while ( $query->have_posts() ) {
					
					$query->the_post();
					
					// If it's All Works template, run the loop normally
					if ( 'all-works' === $current_template ) {
						get_template_part( 'template-parts/portfolio-listing-loop' );
					} else {
						
						// If it's Featured Works template, show the number of items equal to the specified maximum number
						if ( $item_counter <= $max_items ) {
							get_template_part( 'template-parts/portfolio-listing-loop' );
						}
						
					}
					
					$item_counter++;
					
				}
				
			}
			
			// Restore original Post Data
			wp_reset_postdata();
			
		?>
		
	</div>
	<!-- .portfolio-listing -->
	
	<?php alvar_print_portfolio_loading(); ?>
	
</div>
<!-- .portfolio-listing-wrapper -->

<?php
	
	if ( $item_counter > 1 ) {
		
		// If the display mode is "carousel", only display the navigation buttons
		if ( 'carousel' === $mode ) {
			?>
				
			<div class="additional-link-button-wrapper">
				<?php 
					
					// Carousel navigation (Next/Prev)
					alvar_print_portfolio_carousel_navigation_buttons();
					
					// Additional link button
					$show_button = get_theme_mod( 'alvar_ctmzr_portfolio_styles_show_additional_button', true );
					
					if ( $show_button && 'featured-works' === $current_template ) :
						
						$button_text = get_theme_mod( 'alvar_ctmzr_portfolio_styles_additional_button_text', esc_html__( 'View all works', 'alvar' ) );
						$button_url = get_theme_mod( 'alvar_ctmzr_portfolio_styles_additional_button_target_url', '#' );
					
				?>
					
					<a href="<?php echo esc_url( $button_url ); ?>" class="custom-link"><?php echo esc_html( $button_text ); ?></a>
					
				<?php endif; // if ( $show_button ) ?>
				
			</div>
			
			<?php
		} else {
			
			// Include the post pagination
			get_template_part( 'template-parts/pagination' );
			
		}
		
	}

	// Reset main query object (part of pagination fix above)
	$wp_query = NULL;
	$wp_query = $temp_query;

?>