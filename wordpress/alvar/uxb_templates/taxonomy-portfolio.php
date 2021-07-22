<?php 
/**
 * Display portfolio items of selected category
 * 
 * @since 1.0.0
 */

get_header(); ?>

<?php
	
	$mode = alvar_get_portfolio_display_mode();
	$content_class = alvar_get_portfolio_content_class( $mode );
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

<main id="content-container" class="<?php echo esc_attr( implode( ' ', array( 'all-works', $content_class, $mode ) ) ); ?>">
	
	<section class="portfolio-list-section">
		
		<?php
			
			if ( get_theme_mod( 'alvar_ctmzr_portfolio_options_all_works_show_category_menu', true ) ) {
				
				// Display portfolio category menus
				get_template_part( 'template-parts/portfolio-category-menu' );
				
			}
			
		?>
			
		<div class="portfolio-listing-wrapper <?php echo esc_attr( implode( ' ', array( 'all-works', $mode ) ) ); ?>">
			
			<div class="portfolio-listing clearfix" title="<?php echo esc_attr( $title_text ); ?>">
				
				<?php 
					
					// Start the loop
					while ( have_posts() ) {
						
						the_post();
						
						// Printing out items
						get_template_part( 'template-parts/portfolio-listing-loop' );
						
					}
					
				?>
			
			</div>
			<!-- .portfolio-listing -->
			
			<?php alvar_print_portfolio_loading(); ?>
			
		</div>
		<!-- .portfolio-listing-wrapper -->

		<?php
			
			// If the display mode is "carousel", only display the navigation buttons
			if ( 'carousel' === $mode ) {
				?>
					
				<div class="additional-link-button-wrapper">
					<?php alvar_print_portfolio_carousel_navigation_buttons(); ?>
				</div>
				
				<?php
			} else {
				
				// Include the post pagination
				get_template_part( 'template-parts/pagination' );
				
			}
			
		?>
		
	</section>
		
</main>

<?php get_footer(); ?>