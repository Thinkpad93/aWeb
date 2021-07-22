<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @since 1.0.0
 */
?>

<article class="post-item">
	<div class="no-results-section post-content-container">
		<div class="inner-post-content">
			<h1 class="post-title"><?php esc_html_e( 'Nothing Found', 'alvar' ); ?></h1>
			<div class="post-content">
				<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p><?php echo alvar_wp_kses_escape( sprintf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'alvar' ), esc_url( admin_url( 'post-new.php' ) ) ) ); ?></p>

				<?php elseif ( is_search() ) : ?>

					<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'alvar' ); ?></p>
					<?php get_search_form(); ?>

				<?php else : ?>

					<p><?php esc_html_e( 'It seems we cannot find what you are looking for. Please try searching the site using the form below.', 'alvar' ); ?></p>
					<?php get_search_form(); ?>

				<?php endif; ?>
			</div>
		</div>
	</div>
</article>