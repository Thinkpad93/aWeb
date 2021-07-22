<?php 
/**
 * This template part is for displaying portfolio items in the Loop
 * It is called in the portfolio-listing.php and taxonomy-portfolio.php
 * 
 * @since 1.0.0
 */
?>

<?php

	if ( has_post_thumbnail() ) {
		
		$image_size = 'alvar-port-list-large';
		
		$title_class = '';
		if ( ! get_theme_mod( 'alvar_ctmzr_portfolio_styles_show_portfolio_title', true ) ) {
			$title_class = 'visually-hidden';
		}
		
		$attachment = alvar_get_attachment( get_post_thumbnail_id() );
		$width = $attachment['width'];
		$height = $attachment['height'];
		$image_orientation_class = 'landscape';
		
		// Portrait orientation photo
		if ( $height > 0 && $width/$height < 1 ) {
			$image_orientation_class = 'portrait';
		}
		
		// The $_SESSION[ 'portfolio_item_additional_class' ] is from "portfolio-listing.php" or "taxonomy-portfolio.php"
		echo '<article class="' . esc_attr( implode( ' ', array( 'portfolio-item', 'port-item-' . get_the_ID(), $_SESSION[ 'portfolio_item_additional_class' ] ) ) ) . '" data-w="' . intval( $width ) . '" data-h="' . intval( $height ) . '">';
		
		echo '<a href="' . esc_url( get_permalink() ) . '">';
		echo '<div class="' . esc_attr( implode( ' ', array( 'portfolio-thumbnail', $image_orientation_class ) ) ) . '">';
		echo get_the_post_thumbnail( get_the_ID(), $image_size );
		echo '<h3 class="portfolio-title ' . esc_attr( $title_class ) . '">' . esc_html( get_the_title() ) . '</h3>';
		echo '</div>';
		echo '</a>';
		
		echo '</article>'; // .portfolio-item
		
	}
	
?>