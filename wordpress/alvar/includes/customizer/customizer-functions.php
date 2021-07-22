<?php
/**
 * Functions used by Customizer
 *
 * @since 1.0.0
 */



/**
 * Sanitize any input text using the theme function
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_ctmzr_sanitize_with_theme_wpkes' ) ) {

	function alvar_ctmzr_sanitize_with_theme_wpkes( $input ) {
		return alvar_wp_kses_escape( $input );
	}

}



/**
 * Font weight list
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'alvar_ctmzr_get_font_weight_list' ) ) {

	function alvar_ctmzr_get_font_weight_list() {
		return array(
					'300'  => '300',
					'400'  => '400',
					'500'  => '500',
					'600'  => '600',
					'700'  => '700',
					'inherit' => 'inherit',
				);
	}

}