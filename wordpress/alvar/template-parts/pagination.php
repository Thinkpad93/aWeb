<?php
/**
 * The template part for displaying the post pagination
 * This is used in index.php, archive.php, search.php
 *
 * @since 1.0.0
 */

// Page numbers pagination
$pagination_output = get_the_posts_pagination( array(
						'mid_size'	=> 2,
						'prev_text' => esc_html__( 'Previous', 'alvar' ), //'<i class="ion-ios-arrow-thin-left"></i>',
						'next_text' => esc_html__( 'Next Page', 'alvar' ), //'<i class="ion-ios-arrow-thin-right"></i>',
					) );

if ( ! empty( $pagination_output ) ) {
	echo '<div class="numbers-pagination">' . $pagination_output . '</div>';
}

?>