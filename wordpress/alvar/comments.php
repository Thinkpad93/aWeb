<?php

/**
 * The template for displaying comments and the comment form
 *
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$no_comments_class = '';
if ( ! have_comments() ) {
 	$no_comments_class = 'no-comments';
}

?>

<section id="comments" class="<?php echo esc_attr( implode( ' ', array( 'comments content-section-wrapper clearfix', $no_comments_class ) ) ); ?>">
	<h3 class="section-title"><?php comments_number( esc_html__( 'No Comments', 'alvar' ), esc_html__( '1 Comment', 'alvar' ), esc_html__( '% Comments', 'alvar' ) ); ?></h3>
	<div class="section-content clearfix">
		
		<?php if ( have_comments() ) : ?>
			
			<ul class="comment-list">
				<?php
					wp_list_comments( array(
						'style'       => 'ul',
						'short_ping'  => true,
						'avatar_size' => 100,
						'callback'	  => 'alvar_create_custom_comment',
					) );
				?>
			</ul>
			
			<?php the_comments_navigation(); ?>
			
		<?php endif; // End if ( have_comments() ) ?>
		
		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'alvar' ); ?></p>
		<?php endif; ?>
		
		<?php
			// Display a comment form
			comment_form( array(
				'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
				'title_reply_after'  => '</h3>',
			) );
		?>
		
	</div>
</section>