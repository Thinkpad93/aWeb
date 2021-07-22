<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the content div and all content after
 *
 * @since 1.0.0
 */
?>
		
			<?php
				
				// Footer Widget Area
				get_sidebar();
				
			?>
			
		</div>
		<!-- #main-container -->
			
	</div>
	<!-- #root-container -->


	<!-- Fullscreen Search Panel -->
	<div id="search-panel-wrapper">
		<div id="inner-search-panel">
			<?php get_search_form( true ); ?>
			<a id="search-close-button" href="javascript:;" title="<?php esc_attr_e( 'Close', 'alvar' ); ?>"><i class="ion-ios-close-empty"></i></a>
		</div>
	</div>
	
	<?php wp_footer(); ?>
	
</body>
</html>