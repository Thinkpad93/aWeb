<?php 
/**
 * The template for displaying all single post content
 *
 * @since 1.0.0
 */

get_header(); ?>

<main id="content-container" class="content-width">

	<?php while ( have_posts() ) : the_post(); // Start the loop ?>
		
	<div class="blog-single">
			
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
					
					<?php get_template_part( 'template-parts/content-blog-meta' ); ?>
				
				</div>
				
			</div>
			<!-- .post-content-container -->
			

			<?php
				
				// Author bio
				$author_desc = get_the_author_meta( 'description' );
				
				// Author social strings
				$author_social_string = '';
				
				$social_url = get_the_author_meta( 'facebook' );
				if ( ! empty( $social_url ) ) {
					$author_social_string .= '<li><a href="' . esc_url( $social_url ) . '"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>';
				}
				
				$social_url = get_the_author_meta( 'twitter' );
				if ( ! empty( $social_url ) ) {
					$author_social_string .= '<li><a href="' . esc_url( $social_url ) . '"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>';
				}
				
				$social_url = get_the_author_meta( 'google' );
				if ( ! empty( $social_url ) ) {
					$author_social_string .= '<li><a href="' . esc_url( $social_url ) . '"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>';
				}
				
				$social_url = get_the_author_meta( 'instagram' );
				if ( ! empty( $social_url ) ) {
					$author_social_string .= '<li><a href="' . esc_url( $social_url ) . '"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';
				}
				
				$social_url = get_the_author_meta( 'flickr' );
				if ( ! empty( $social_url ) ) {
					$author_social_string .= '<li><a href="' . esc_url( $social_url ) . '"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>';
				}
				
				$social_url = get_the_author_meta( 'px500' );
				if ( ! empty( $social_url ) ) {
					$author_social_string .= '<li><a href="' . esc_url( $social_url ) . '"><i class="fa fa-500px" aria-hidden="true"></i></a></li>';
				}
				
				$social_url = get_the_author_meta( 'pinterest' );
				if ( ! empty( $social_url ) ) {
					$author_social_string .= '<li><a href="' . esc_url( $social_url ) . '"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>';
				}
				
				$social_url = get_the_author_meta( 'linkedin' );
				if ( ! empty( $social_url ) ) {
					$author_social_string .= '<li><a href="' . esc_url( $social_url ) . '"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>';
				}
				
				$social_url = get_the_author_meta( 'dribbble' );
				if ( ! empty( $social_url ) ) {
					$author_social_string .= '<li><a href="' . esc_url( $social_url ) . '"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>';
				}
				
				$social_url = get_the_author_meta( 'behance' );
				if ( ! empty( $social_url ) ) {
					$author_social_string .= '<li><a href="' . esc_url( $social_url ) . '"><i class="fa fa-behance" aria-hidden="true"></i></a></li>';
				}
				
				$social_url = get_the_author_meta( 'vimeo' );
				if ( ! empty( $social_url ) ) {
					$author_social_string .= '<li><a href="' . esc_url( $social_url ) . '"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>';
				}
				
				$social_url = get_the_author_meta( 'youtube' );
				if ( ! empty( $social_url ) ) {
					$author_social_string .= '<li><a href="' . esc_url( $social_url ) . '"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>';
				}
				
				$social_url = get_the_author_meta( 'soundcloud' );
				if ( ! empty( $social_url ) ) {
					$author_social_string .= '<li><a href="' . esc_url( $social_url ) . '"><i class="fa fa-soundcloud" aria-hidden="true"></i></a></li>';
				}
				
			?>
			
			<?php if ( ! empty( $author_desc ) || ! empty( $author_social_string ) ) : ?>
				
				<!-- Author Section -->
				<section class="author-info content-section-wrapper clearfix">
					<h3 class="section-title"><?php echo esc_html__( 'Written by', 'alvar' ) . ' ' . get_the_author(); ?></h3>
					
					<div class="section-content">
						
						<?php if ( ! empty( $author_desc ) ) : ?>
							<p>
								<?php echo esc_html( $author_desc ); ?>
							</p>
						<?php endif; ?>
						
						<?php if ( ! empty( $author_social_string ) ) : ?>
							<ul class="author-social">
								<?php echo alvar_wp_kses_escape( $author_social_string, array( 'i' => array( 'class' => array(), 'aria-hidden' => array() ) ) ); ?>
							</ul>
						<?php endif; ?>
						
					</div>
						
				</section>
			
			<?php endif; ?>
			
			
			<?php 
				
				// Comment Section
				if ( get_theme_mod( 'alvar_ctmzr_general_options_enable_blog_comments', true ) ) {
					comments_template(); 
				}
				
			?>
			
			
		</article>
		
	</div>
	<!-- .blog-single -->
		
	<?php endwhile; // End of the loop ?>

</main>

<?php
	
	if ( get_theme_mod( 'alvar_ctmzr_general_options_enable_post_navigation', false ) ) {
		
		echo '<div class="next-prev-post-navigation content-width">';
		
		the_post_navigation( array(
			
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous Post', 'alvar' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . esc_html__( 'Previous', 'alvar' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper"><i class="ion-ios-arrow-thin-left"></i></span>%title</span>',
					
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next Post', 'alvar' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . esc_html__( 'Next', 'alvar' ) . '</span><span class="nav-title">%title<span class="nav-title-icon-wrapper"><i class="ion-ios-arrow-thin-right"></i></span></span>',
			
		) );
		
		echo '</div>';
		
	}
	
?>

<?php get_footer(); ?>