<?php 
/**
 * Template Name: All Works with Category Menu
 * Description: This template is for showing all of your works with category menu
 * 
 * @since 1.0.0
 */

get_header(); ?>

<?php 

	if ( function_exists( 'uxb_port_init_plugin' ) ) {
			
		if ( post_password_required() ) {
			get_template_part( 'template-parts/content-password' );
		} else {
			
			$mode = alvar_get_portfolio_display_mode();
			$content_class = alvar_get_portfolio_content_class( $mode );
			
		?>

		<main id="content-container" class="<?php echo esc_attr( implode( ' ', array( 'all-works', $content_class, $mode ) ) ); ?>">
				
			<?php
						
				echo '<section class="portfolio-list-section">';
						
					// Display portfolio category title and category menu
					get_template_part( 'template-parts/portfolio-category-menu' );
						
					// Display portfolio items
					get_template_part( 'template-parts/portfolio-listing' );
					
				echo '</section>';
				
			?>
			
		</main>
		
	<?php }
	
	}		
		
?>
	
<?php get_footer(); ?>