<?php
/**
 * This template part is for printing out the additional top section for archive, search, and portfolio listing templates
 * 
 * @since 1.0.0
 */
?>

<?php if ( is_archive() || is_search() ) : // For any archive pages, print out the additional top section ?>
	
	<?php
	
		$title = '';
		$text = '';
		$show_text = true;
		
		$show_portfolio_category_class = '';
		
		if ( is_tag() ) {
			
			$title = single_tag_title( '', false );
			$text = sprintf( __( 'You are currently browsing posts of the "%s" tag.', 'alvar' ), $title );
			$show_text = false;
			
		} else if ( is_date() ) {
			
		} else if ( is_category() ) {
			
			$title = single_cat_title( '', false );
			$text = sprintf( __( 'You are currently browsing posts of the "%s" category.', 'alvar' ), $title );
			$show_text = false;
			
		} else if ( is_search() ) {
			
			$keywords = $_GET['s'];
			$all_searches = new WP_Query( 's=' . $keywords . '&showposts=-1' );
			$title = sprintf( __( 'Found %s results for "%s"', 'alvar' ), $all_searches->post_count, $_GET['s'] );
			wp_reset_postdata();
			
		} else if ( is_author() ) {
			
			$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
			$title = $curauth->display_name;
			$text = sprintf( __( 'You are currently browsing posts written by %s.', 'alvar' ), $title );
			$show_text = false;
			
		} else if ( is_tax( 'uxbarn_portfolio_tax' ) ) {
			
			$title = single_term_title( '', false );
			
			if ( get_theme_mod( 'alvar_ctmzr_portfolio_options_show_category_title', false ) ) {
				$show_portfolio_category_class = 'show-category-title';
			}
			
		}
	
	?>

	<div class="top-section post-item post-content-container clearfix <?php echo esc_attr( $show_portfolio_category_class ); ?>">
		
		<h1 class="post-title"><?php echo esc_html( $title ); ?></h1>
		
		<?php if ( ( ! empty( $text ) || is_search() ) && $show_text ) : ?>
			<div class="post-content">
				<?php
				
					echo esc_html( $text );
					
					if ( is_search() ) {
						get_search_form();
					}
					
				?>
			</div>
		<?php endif; ?>
			
	</div>

<?php endif; ?>
