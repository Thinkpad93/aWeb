<?php
/**
 * This template will be used when a page is not found
 *
 * @since 1.0.0
 */

get_header(); ?>

<main id="content-container" class="content-width">
	
	<article class="post-item">
		<div class="post-content-container no-results-section">
			<h1 class="post-title"><?php esc_html_e( 'Page Not Found', 'alvar' ); ?></h1>
			<div class="post-content">
				<p>
					<?php echo alvar_wp_kses_escape( sprintf( __('The requested page could not be found or it is currently unavailable.<br/>Please <a href="%s">click here</a> to go to our homepage or use the search form below.', 'alvar'), esc_url( home_url( '/' ) ) ) ); ?>
				</p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</article>

</main>

<?php get_footer(); ?>