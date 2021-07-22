<?php 
/**
 * The template for displaying all page content
 *
 * @since 1.0.0
 */

get_header(); ?>
	
<main id="content-container" class="content-width">
	
	<?php while ( have_posts() ) : the_post(); // Start the loop ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php if ( has_post_thumbnail() ) : ?>
			
				<?php
					
					$image_size = 'full';
					
					echo '<div class="post-image">';
					the_post_thumbnail( $image_size );
					echo '</div>';
					
				?>
			
			<?php endif; // has_post_thumbnail() ?>
			
			<div class="post-content-container clearfix">
				
				<div class="post-title-wrapper">
					<h1 class="post-title"><?php the_title(); ?></h1>
				</div>
				<div class="post-content-wrapper">
					<div class="post-content">
						<?php
						
							the_content();
							alvar_print_post_pagination();
							
						?>
					</div>
				</div>
				
			</div>
			<!-- .post-content-container -->
			
			<!-- Comment Section -->
			<?php 
			
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				
			?>
			
		</article>
		
	<?php endwhile; // End of the loop ?>	

</main>

<?php get_footer(); ?>