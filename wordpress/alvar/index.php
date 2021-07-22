<?php
/**
 * This is the main template file for listing blog posts
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @since 1.0.0
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
				
		<?php

			$content_class = 'content-width-large';
			if ( is_search() ) {
				$content_class = 'content-width';
			}
			
		?>

		<main id="content-container" class="<?php echo esc_attr( $content_class ); ?>">
			
		<?php 
			
			$list_class = '';
			
			if ( is_home() ) {
				$list_class = 'blog-list';
			}
			
			if ( is_search() ) {
				$list_class = 'search-result-list';
			}
			
			if ( is_archive() ) {
				$list_class = 'blog-list archive-list';
			}
			
		?>
		
		<div class="<?php echo esc_attr( $list_class ); ?>">
			
			<?php get_template_part( 'template-parts/content-top' ); // Additional top section ?>
			
			<?php while ( have_posts() ) : the_post(); // Start the Loop ?>
					
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
					<?php
					
						$no_image_class = '';
					
					?>
					
					<?php if ( ! is_search() ) : // Do not display the thumbnail on some templates ?>
						
						<?php if ( has_post_thumbnail() ) : ?>
							
							<?php
								
								$image_size = 'alvar-single';
								
								echo '<div class="post-image">';
								echo '<a href="' . esc_url( get_permalink() ) . '">';
								the_post_thumbnail( $image_size, array( 'title' => get_the_title() ) );
								echo '</a>';
								echo '</div>';
								
							?>
							
						<?php else : $no_image_class = 'no-image'; ?>
						<?php endif; // has_post_thumbnail() ?>
						
					<?php else : $no_image_class = 'no-image'; ?>
						
					<?php endif; // ! is_search() ?>
					
					<div class="<?php echo esc_attr( implode( ' ', array( 'post-content-container clearfix', $no_image_class ) ) ); ?>">
						
						<div class="post-title-wrapper">
							<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						</div>
						<div class="post-content-wrapper">
							<div class="post-content excerpt">
								<?php alvar_the_excerpt_max_charlength( get_theme_mod( 'alvar_ctmzr_general_options_blog_excerpt_length', 205 ) ); ?>
							</div>
								
							<?php if ( ! is_search() ) : // Do not display the post meta on the search result page ?>
								
								<?php get_template_part( 'template-parts/content-blog-meta' ); ?>
								
							<?php endif; // ! is_search() ?>
							
						</div>
						
					</div>
					
				</article>
					
			<?php endwhile; // End the Loop ?>
		
		</div>
		<!-- .blog-list -->
		
		<?php
		
			// Include the post pagination
			get_template_part( 'template-parts/pagination' );
			
		?>
		
	<?php
	// If no content, include the "No posts found" template.
	else : ?>
	
		<main id="content-container" class="content-width">
		
	<?php	get_template_part( 'template-parts/content', 'none' );
	endif; // End if ( have_posts() )
	?>
	
</main>
	
<?php get_footer(); ?>