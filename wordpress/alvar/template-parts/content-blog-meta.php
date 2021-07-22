<?php
/**
 * The template part for displaying blog meta
 * This must be used in the Loop
 *
 * @since 1.0.0
 */
?>

<!-- Blog Meta Info -->
<div class="post-meta-wrapper">
	
	<ul class="post-meta meta-general">
		<li class="meta-date">
			<a href="<?php the_permalink(); ?>">
				<time class="published" datetime="<?php echo esc_attr( get_the_time( 'Y-m-d' ) ); ?>"><?php echo get_the_time( get_option( 'date_format' ) ); ?></time>
			</a>
		</li>
		<li class="meta-author">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<?php the_author(); ?>
			</a>
		</li>
		<?php if ( get_theme_mod( 'alvar_ctmzr_general_options_enable_blog_comments', true ) ) : ?>
			<li class="meta-comments">
				<?php comments_popup_link( esc_html__( 'No Comments', 'alvar' ), esc_html__( '1 Comment', 'alvar' ), esc_html__( '% Comments', 'alvar' ) ); ?>
			</li>
		<?php endif; ?>
	</ul>
	
	
	
	<?php
		
		// Blog Category List
		$categories = get_the_category();
		
	?>
	
	<?php if ( is_single() && ! empty( $categories ) ) : // Display categories only on the blog single page ?>
		<ul class="post-meta meta-categories">
			<li class="meta-categories-title">
				<?php esc_html_e( 'Categories', 'alvar' ); ?>
			</li>
			<?php
		
				foreach ( $categories as $category ) {
					echo '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></li>';
				}
				
			?>
		</ul>
	<?php endif; // if ( is_single() && ! empty( $categories ) ) : ?>
	
	
	
	<?php
		
		// Blog Tag List
		$tags = get_the_tags();
		
	?>
	
	<?php if ( is_single() && ! empty( $tags ) ) : // Display categories only on the blog single page ?>
		<ul class="post-meta meta-tags">
			<li class="meta-tags-title">
				<?php esc_html_e( 'Tags', 'alvar' ); ?>
			</li>
			<?php
		
				foreach ( $tags as $tag ) {
					echo '<li><a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '">' . esc_html( $tag->name ) . '</a></li>';
				}
				
			?>
		</ul>
	<?php endif; // if ( is_single() && ! empty( $categories ) ) : ?>
	
</div>
<!-- .post-meta-wrapper -->