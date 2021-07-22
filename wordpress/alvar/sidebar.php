<?php
/**
 * For displaying selected widgets in the theme widget area
 *
 * @since 1.0.0
 */
?>

<?php

	$has_any_widgets = false;
	$display_widget_area = get_theme_mod( 'alvar_ctmzr_footer_widget_area_styles_show_footer_widget_area', true );
	$widget_area_columns = intval( get_theme_mod( 'alvar_ctmzr_footer_widget_area_styles_footer_widget_area_column_number', '4' ) );
	$widget_area_id_prefix = 'alvar-widget-area-';
	
	for ( $i = 1; $i <= $widget_area_columns; $i++ ) {
		
		// The same ID as what registered in theme-functions.php
		$widget_area_id = $widget_area_id_prefix . $i;
		
		// Check if the current sidebar has any widgets
		if ( is_active_sidebar( $widget_area_id ) ) {
			$has_any_widgets = true;
		}
		
	}

?>

<?php if ( $display_widget_area && $has_any_widgets ) : ?>

	<!-- Widget area -->
	<footer class="theme-widget-area content-width-large clearfix">
		
		<?php
		
			$col_num = 12 / $widget_area_columns;
			
			for ( $i = 1; $i <= $widget_area_columns; $i++ ) {
				
				// The same ID as what registered in theme-functions.php
				$widget_area_id = $widget_area_id_prefix . $i;
					
				?>
				
				<div class="w<?php echo esc_attr( intval( $col_num ) ); ?> widget-column clearfix">
					<?php dynamic_sidebar( $widget_area_id ); ?>
				</div>
				
				<?php
				
			}
		
		?>
		
	</footer>
	
<?php endif; ?>