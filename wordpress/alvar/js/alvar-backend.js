/* #Prepare the module
 ================================================== */
var ThemeBackend = ( function( $ ) {
	'use strict';
	
	function migrateCustomFieldData( $button ) {
		
		var migratingText = ThemeBackendParams.migrating_text;
		
		if ( $( '.migration-status' ).length > 0 ) {
			$( '.migration-status' ).text( migratingText ).addClass( 'blink' ).removeClass( 'migration-error' );
		} else {
			$button.after( '<span class="migration-status blink">' + migratingText + '</span>' );
		}
		
		$button.prop( 'disabled', true );
		
		// Set AJAX data
		var data = {
			action: 'alvar_migrate_custom_field_data',
			nonce: $button.data( 'nonce' ),
		};
		
		$.post( ajaxurl, data, function( response ) {
			
			// If success, show a complete message
			if ( response.success ) {
				
				var $noticeContainer = $button.closest( '.notice' );
				$noticeContainer.children().not( '.notice-dismiss' ).remove();
				$noticeContainer.append( '<p>' + response.data + '</p>' );
				
			} else {
				
				// Otherwise, show an error message
				$( '.migration-status' ).text( response.data ).addClass( 'migration-error' ).removeClass( 'blink' );
				console.log( 'Error: ' + response.data );
				
				$button.prop( 'disabled', false );
				
			}
			
		});
		
	}
	
	return {
		migrateCustomFieldData: migrateCustomFieldData,
	};
	
}( jQuery ));



/* #Run the module
 ================================================== */
jQuery( document ).ready( function( $ ) {
	'use strict';
	
	$( '#migrate-data-ot-acf' ).on( 'click', function( event ) {
		ThemeBackend.migrateCustomFieldData( $( this ) );
	});
		 
});