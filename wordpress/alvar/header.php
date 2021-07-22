<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the content div.
 *
 * @since 1.0.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5" />
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
		
<body <?php body_class(); ?> >
	
	<div id="root-container">
		
		<?php
	
			$show_left_bar_class = '';
			$show_left_bar = get_theme_mod( 'alvar_ctmzr_menu_section_styles_show_left_bar', true );
			if ( ! $show_left_bar ) {
				$show_left_bar_class = 'no-left-bar';
			}
			
		?>
		
		<header id="side-container" class="<?php echo esc_attr( $show_left_bar_class ) ; ?>">
			
			<?php
				
				$additional_classes = '';
				$tagline = get_bloginfo( 'description' );
				$display_tagline = get_theme_mod( 'alvar_ctmzr_menu_section_styles_show_tagline', true );
				
				if ( ! empty( $tagline ) && $display_tagline ) {
					$additional_classes .= ' with-tagline ';
				}
				
				$logo_class = 'left-bar';
				$tagline_class = 'tagline-left-bar';
				$logo_tagline_location = get_theme_mod( 'alvar_ctmzr_menu_section_styles_logo_tagline_location', 'both-left-bar' );
				
				if ( 'logo-above-menu' === $logo_tagline_location ) {
					$logo_class = 'logo-above-menu';
				} else if ( 'both-above-menu' === $logo_tagline_location ) {
					$logo_class = 'logo-above-menu';
					$tagline_class = 'tagline-above-menu';
				}
				
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$logo_image_class = '';
				if ( ! empty( $custom_logo_id ) ) {
					$logo_image_class = 'has-logo-image';
				}
				
			?>
			
			<!-- Logo and tagline -->
			<div class="logo-tagline-wrapper <?php echo esc_attr( $additional_classes ); ?>">
				<div class="logo-wrapper <?php echo esc_attr( $logo_class . ' ' . $logo_image_class ); ?>">
					<div class="site-title-wrapper">
							
						<?php if ( alvar_is_site_title_h1_allowed() ) : ?>
							<h1 class="site-title-heading">
						<?php endif; ?>
						
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php
								
								if ( ! empty( $custom_logo_id ) ) {
									
									$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
									$logo_url = $image[0];
									echo '<img src="' . esc_url( $logo_url ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" class="logo-image" />';
									
								} else {
									echo '<span class="site-title">' . esc_html( get_bloginfo( 'name' ) ) . '</span>';
								}
								
							?>
							</a>
							
						<?php if ( alvar_is_site_title_h1_allowed() ) : ?>
							</h1>
						<?php endif; ?>
						
					</div>
				</div>
				
				<?php
					
					// Print out the tagline if there is any
					if ( ! empty( $tagline ) && $display_tagline ) {
						echo '<span class="' . esc_attr( implode( ' ', array( 'tagline', $logo_image_class, $tagline_class ) ) ) . '">' . esc_html( $tagline ) . '</span>';
					}
				
				?>
				
			</div>
			<!-- .site-logo -->
			
			<!-- Site Menu -->
			<div class="site-menu <?php echo esc_attr( $logo_class ); ?>">
				<nav class="site-menu-nav">
						
					<?php
						
						// Main Menu
						wp_nav_menu( array(
							'container'		 => 'ul',
							'theme_location' => 'main_menu',
							'menu_class'     => 'menu-list menu-style',
						 ) );
						
					?>
					
					<!-- Mobile menu container: the items will be generated in the JS -->
					<div id="mobile-menu">
						<a id="mobile-menu-toggle" href="#mobile-menu-entity">
							<span class="mobile-menu-text"><?php esc_html_e( 'Menu', 'alvar' ); ?></span>
							<i class="ion-navicon"></i></a>
						<div id="mobile-menu-entity"></div>
					</div>
					
				</nav>
			</div>
		
			<div class="copyright-social-wrapper">
				
				<?php
				
					$phone = get_theme_mod( 'alvar_ctmzr_site_identity_phone_number', '' );
					$email = get_theme_mod( 'alvar_ctmzr_site_identity_email', '' );
					$other_info_content = get_theme_mod( 'alvar_ctmzr_site_identity_other_info_text', '' );
				
				?>
				
				<?php if ( ! empty ( $phone ) || ! empty( $email ) || ! empty( $other_info_content ) ) : ?>
					<div class="other-info">
						<?php
						
							if ( ! empty( $phone ) ) {
								echo '<span class="phone">' . esc_html( $phone ) . '</span>';
							}
							
							if ( ! empty( $email ) ) {
								echo '<span class="email"><a href="mailto:' . sanitize_email( $email ) . '">' . sanitize_email( $email ) . '</a></span>';
							}
							
							if ( ! empty( $other_info_content ) ) {
								echo '<div class="other-info-content">' . $other_info_content . '</div>';
							}
						
						?>
					</div>
				<?php endif; ?>
				
				<?php
					
					// Social Icon Set
					alvar_display_social_icon_set( get_theme_mod( 'alvar_ctmzr_site_identity_social_network_display', 'text' ) );
					
					// Copyright Text
					$default_copyright_text = alvar_wp_kses_escape( sprintf( __( '&copy; Alvar. Designed by <a href="%s">UXBARN</a>.', 'alvar' ), 'https://uxbarn.com' ) );
					
					// Get the saved copyright text
					$copyright_text = get_theme_mod( 'alvar_ctmzr_site_identity_copyright_text', $default_copyright_text );
				
				?>
				
				<?php if ( ! empty( $copyright_text ) ) : ?>
					<div class="copyright">
						<?php echo alvar_wp_kses_escape( $copyright_text ); ?>
					</div>
				<?php endif; ?>
				
			</div>
			
			<?php if ( $show_left_bar ) : ?>
				<div id="side-vertical-bar">
					<?php if ( get_theme_mod( 'alvar_ctmzr_menu_section_styles_show_search_button', true ) ) : ?>
						<a href="javascript:;" class="search-icon-button"><i class="ion-ios-search-strong"></i></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			
		</header>
		
		<?php
			
			$has_footer_class = '';
			if ( get_theme_mod( 'alvar_ctmzr_footer_widget_area_styles_show_footer_widget_area', true ) ) {
				$has_footer_class = 'has-footer';
			}
			
		?>
		
		<div id="main-container" class="<?php echo esc_attr( $has_footer_class ); ?>">
			