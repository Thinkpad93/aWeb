<?php 
/**
 * This template part is for displaying portfolio category menu
 * It is called in the template-all-works.php and taxonomy-portfolio.php
 * 
 * @since 1.0.0
 */
?>

<?php

	$all_categories_text = get_theme_mod( 'alvar_ctmzr_portfolio_styles_all_works_everything_menu_text', esc_html__( 'All Works', 'alvar' ) );
	$current_category_text = $all_categories_text;
	
	if ( is_tax( 'uxbarn_portfolio_tax' ) ) {
		$current_category_text = get_queried_object()->name;
	}
		
?>

<div class="top-section post-item post-content-container clearfix">
	<h1 class="post-title"><?php echo esc_html( $current_category_text ); ?></h1>
</div>

<?php if ( get_theme_mod( 'alvar_ctmzr_portfolio_styles_all_show_portfolio_category_menu', true ) ) : ?>
		
	<ul class="portfolio-category-selector">
		<li>
			<a href="javascript:;"><?php echo esc_html( get_theme_mod( 'alvar_ctmzr_portfolio_styles_change_category_menu_text', __( 'Change category', 'alvar' ) ) ); ?></a>
			<?php
				
				// Create portfolio categories
				$port_categories = get_terms( 'uxbarn_portfolio_tax', array( 'hide_empty'=>false ) );
				
				if ( ! empty( $port_categories ) && ! is_wp_error( $port_categories ) ) {
					
					echo '<ul class="portfolio-categories">';
				
					// Find the page URL that is currently using the all-works template
					$page_url = '#';
					
					$pages = get_pages( array(
								'meta_key' 		=> '_wp_page_template',
								'meta_value' 	=> 'template-all-works.php'
							));
					
					// Pick only the first page in array
					if ( ! empty( $pages ) ) {
						$page_url = get_permalink( $pages[0]->ID );
					}
					
					// Create the All Works category menu
					echo '<li class="all-works"><a href="' . esc_url( $page_url ) . '">' . $all_categories_text . '</a></li>';
					
					
					
					// Terms
					$selected_terms = get_theme_mod( 'alvar_ctmzr_portfolio_options_all_works_select_categories', array() );
					
					// Create the categories only if they are selected in the Customizer
					foreach ( $port_categories as $term ) {

						$wpml_selected_terms = array();
						if ( ! empty( $selected_terms ) ) {
							foreach( $selected_terms as $selected_term_id ) {
								$wpml_selected_terms[] = apply_filters( 'wpml_object_id', $selected_term_id, 'uxbarn_portfolio_tax', true );
							}
						}
						
						if ( empty( $selected_terms ) || 
								( ! empty( $selected_terms ) && 
									( in_array( $term->term_id, $selected_terms ) || in_array( $term->term_id, $wpml_selected_terms ) ) 
								) 
						   ) {	
							
							$category_link_text = '<a href="' . esc_url( get_term_link( $term->term_id ) ) . '">' . esc_html( $term->name ) . '</a>';
							$active_class = '';
							$term_class = 'port-term-' . $term->term_id;
							
							if ( is_tax( 'uxbarn_portfolio_tax' ) && $term->term_id == get_queried_object()->term_id ) {
								continue;
							}
							
							echo '<li class="' . esc_attr( implode( ' ', array( $active_class, $term_class ) ) ) . '">' . $category_link_text . '</li>';
							
						}
						
					}
					
					echo '</ul>';
						
				}
				
			?>

		</li>
	</ul>
	
<?php endif; ?>