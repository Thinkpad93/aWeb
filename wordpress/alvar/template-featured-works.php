<?php 
/**
 * Template Name: Featured Works
 * Description: This template is for showing only the selected works of your portfolio. You can select which categories to display by going to "Appearance > Customize > Portfolio Options".
 * 
 * @since 1.0.0
 */

get_header(); ?>

<?php
	
	if ( post_password_required() ) {
		get_template_part( 'template-parts/content-password' );
	} else {
			
		$mode = alvar_get_portfolio_display_mode();
		$content_class = alvar_get_portfolio_content_class( $mode );

	?>

	<main id="content-container" class="<?php echo esc_attr( implode( ' ', array( 'featured-works no-category-menu', $content_class, $mode ) ) ); ?>">
		
		<?php
			
			// Display portfolio items
			get_template_part( 'template-parts/portfolio-listing' );
			
		?>
		
	</main>
	
	<?php } ?>

<?php get_footer(); ?>