(function( $ ) {
	'use strict';
	
	/**
 	 * Display the media uploader.
 	 *
 	 * @since    1.0.0
 	 */
	function aiovg_render_media_uploader( $elem, form ) {
 
    	var file_frame, attachment;
 
     	// If an instance of file_frame already exists, then we can open it rather than creating a new instance
    	if ( file_frame ) {
        	file_frame.open();
        	return;
    	}; 

     	// Use the wp.media library to define the settings of the media uploader
    	file_frame = wp.media.frames.file_frame = wp.media({
        	frame: 'post',
        	state: 'insert',
        	multiple: false
    	});
 
     	// Setup an event handler for what to do when a media has been selected
    	file_frame.on( 'insert', function() {
 
        	// Read the JSON data returned from the media uploader
    		attachment = file_frame.state().get( 'selection' ).first().toJSON();
		
			// First, make sure that we have the URL of the media to display
    		if ( 0 > $.trim( attachment.url.length ) ) {
        		return;
    		};
		
			// Set the data
			switch ( form ) {
				case 'videos':
					var id = $elem.data( 'format' );
					$( '#aiovg-' + id ).val( attachment.url );
					break;
				case 'tracks':
					var id = $elem.closest( 'tr' ).find( '.aiovg-track-src' ).attr( 'id' );
					$( '#' + id ).val( attachment.url );
					break;
				case 'categories':
					$( '#aiovg-categories-image-id' ).val( attachment.id );
					$( '#aiovg-categories-image-wrapper' ).html( '<img src="' + attachment.url + '" />' );
				
					$( '#aiovg-categories-upload-image' ).hide();
					$( '#aiovg-categories-remove-image' ).show();
					break;
				case 'settings':
					$elem.prev( '.aiovg-url' ).val( attachment.url );
					break;
			};
 
    	});
 
    	// Now display the actual file_frame
    	file_frame.open();
 
	};
	
	/**
	 *  Make tracks inside the video form sortable.
     *
	 *  @since    1.0.0
	 */
	function aiovg_sort_tracks() {
		
		var $sortable_element = $( '#aiovg-tracks tbody' );
			
		if ( $sortable_element.hasClass( 'ui-sortable' ) ) {
			$sortable_element.sortable( 'destroy' );
		};
			
		$sortable_element.sortable({
			handle: '.aiovg-handle'
		});
		
	};

	/**
	 * Called when the page has loaded.
	 *
	 * @since    1.0.0
	 */
	$(function() {
			   
		// Admin: Dismiss admin notice
		$( '#aiovg-admin-notice' ).on( 'click', '.notice-dismiss', function( e ) {
																			  
			e.preventDefault();
			
			var data = {
				'action': 'aiovg_dismiss_admin_notice',
				'security': $( '#aiovg-admin-notice' ).data( 'security' )
			};
			
			$.post( ajaxurl, data );
			
		});
		
		// Videos: Show or Hide fields basd on the selected video source type
		$( '#aiovg-video-type' ).on( 'change', function( e ) {
 
            e.preventDefault();
 
 			var type = $( this ).val();
			
			$( '.aiovg-toggle-fields' ).hide();
			$( '.aiovg-type-'+type ).show( 300 );
			
			if ( 'default' == type ) {
				$( '#aiovg-has-webm, #aiovg-has-ogv' ).trigger( 'change' );
			}

		}).trigger( 'change' );
		
		// Videos: Show or Hide WebM fields
		$( '#aiovg-has-webm' ).on( 'change', function( e ) {
 
            e.preventDefault();
 
 			if ( $( this ).is( ':checked' ) ) {
				$( '#aiovg-field-webm' ).show( 300 );
			} else {
				$( '#aiovg-field-webm' ).hide( 300 );
			}
 
        }).trigger( 'change' );
		
		// Videos: Show or Hide OGV fields
		$( '#aiovg-has-ogv' ).on( 'change', function( e ) {
 
            e.preventDefault();
 
 			if ( $( this ).is( ':checked' ) ) {
				$( '#aiovg-field-ogv' ).show( 300 );
			} else {
				$( '#aiovg-field-ogv' ).hide( 300 );
			}
 
        }).trigger( 'change' );
		
		// Videos: Display the media uploader when "Upload Media" button clicked
		$( '.aiovg-upload-media' ).on( 'click', function( e ) {
 
            e.preventDefault();
            aiovg_render_media_uploader( $( this ), 'videos' );
 
        });
		
		// Videos: Add new subtitle fields when "Add New File" button clicked
		$( '#aiovg-add-new-track' ).on( 'click', function( e ) {
 
            e.preventDefault();
			
			var id = $( '.aiovg-tracks-row', '#aiovg-tracks' ).length;
			
			var $row = $( '#aiovg-tracks-clone' ).find( 'tr' ).clone();
			$row.find( '.aiovg-track-src' ).attr( 'id', 'aiovg-track-'+id );
			
            $( '#aiovg-tracks' ).append( $row );
 
        });
		
		if( ! $( '.aiovg-tracks-row', '#aiovg-tracks' ).length ) {
			$( '#aiovg-add-new-track' ).trigger( 'click' );
		}

		// Videos: Display the media uploader for adding subtitles when "Upload File" button clicked	
		$( 'body' ).on( 'click', '.aiovg-upload-track', function( e ) {
 
            e.preventDefault();
            aiovg_render_media_uploader( $( this ), 'tracks' );
 
        });
		
		// Videos: Delete a subtitles fields set when "Delete" button clicked
		$( 'body' ).on( 'click', '.aiovg-delete-track', function( e ) {
 
            e.preventDefault();			
            $( this ).closest( 'tr' ).remove();
 
        });
		
		// Videos: Make the subtitles fields sortable
		aiovg_sort_tracks();
		
		// Categories: Display the media uploader when "Add Image" button clicked	
		$( '#aiovg-categories-upload-image' ).on( 'click', function( e ) {
 
            e.preventDefault();
			aiovg_render_media_uploader( $( this ), 'categories' );
 
        });
		
		// Categories: Delete the image when "Remove Image" button clicked
		$( '#aiovg-categories-remove-image' ).on( 'click', function( e ) {
														 
            e.preventDefault();
			
			var id = parseInt( $( '#aiovg-categories-image-id' ).val() );
			
			if ( id > 0 ) {
				
				var data = {
					'action': 'aiovg_delete_category_image',
					'attachment_id': id,
					'security': $( '#aiovg_category_image_nonce' ).val()
				};
				
				$.post( ajaxurl, data, function(response) {
					$( '#aiovg-categories-image-id' ).val( '' );
					$( '#aiovg-categories-image-wrapper' ).html( '' );
					
					$( '#aiovg-categories-remove-image' ).hide();
					$( '#aiovg-categories-upload-image' ).show();
				});
				
			};
			
		});
		
		// Categories: Clear the image field after a category was created
		$( document ).ajaxComplete(function( e, xhr, settings ) {
			
			if ( $( "#aiovg-categories-image-id" ).length ) {
				
				var queryStringArr = settings.data.split( '&' );
			   
				if ( -1 !== $.inArray( 'action=add-tag', queryStringArr ) ) {
					var xml = xhr.responseXML;
					var response = $( xml ).find( 'term_id' ).text();
					if ( '' != response ) {
						$( '#aiovg-categories-image-id' ).val( '' );
						$( '#aiovg-categories-image-wrapper' ).html( '' );
						
						$( '#aiovg-categories-remove-image' ).hide();
						$( '#aiovg-categories-upload-image' ).show();
					};
				};
			
			};
			
		});
			   
		// Settings: Initiate color picker
		$( '.aiovg-color-picker-field', '#aiovg-settings' ).wpColorPicker();
		
		// Settings: Browse button
		$( '.aiovg-browse', '#aiovg-settings' ).on( 'click', function( e ) {
																	  
			e.preventDefault();			
			aiovg_render_media_uploader( $( this ), 'settings' );
			
		});
		
		// Shortcode: Initialize popup
		$( '#aiovg-media-button' ).magnificPopup({
 			type: 'inline'
		});
		
		// Shortcode: Show or Hide fields basd on the selected shortcode type
		$( '#aiovg-shortcode-type' ).on( 'change', function( e ) {
 
            e.preventDefault();
 
 			var type = $( this ).val();
			
			$( '.aiovg-shortcode-field' ).hide();
			$( '.aiovg-shortcode-type-' + type ).fadeIn();

		}).trigger( 'change' );
		
		// Shortcode: Initiate color picker
		$( '.aiovg-color-picker-field', '#aiovg-shortcode' ).wpColorPicker();
		
		// Shortcode: Insert shortcode
		$( '#aiovg-insert-shortcode' ).on( 'click', function( e ) {
 
            e.preventDefault();
 
 			var shortcode = $( '#aiovg-shortcode-type' ).val();
			var attrs     = '';
			
			$( '.aiovg-shortcode-type-' + shortcode ).each(function() { 
							
				var $elem = $( this ).find( '.aiovg-shortcode-input' );
				
				if ( $elem.length ) {
					var type  = $elem.attr( 'type' );
					var id    = $elem.attr( 'id' );
					var name  = id.replace( 'aiovg-shortcode-' + shortcode + '-', '' );
					var def   = $elem.data( 'default' );					
					var value = $elem.val();
					
					if ( 'category' == name ) {
						value = $( 'input[type="checkbox"]:checked', $elem ).map(function() {
							return this.value;
						}).get().join( "," );
					}
					
					if ( 'checkbox' == type ) {
						value = $elem.is( ':checked' ) ? 1 : 0;
					}
					
					if ( value != def ) {
						attrs += ( ' ' + name + '="' + value + '"' );
					}
				}
				
			});
			
			window.send_to_editor( '[aiovg_' + shortcode + attrs + ']' );
			$.magnificPopup.close();

		}).trigger( 'change' );
		
		// Shortcode: Close shortcode builder
		$( '#aiovg-cancel-shortcode-insert' ).on( 'click', function( e ) {
		
			e.preventDefault();
			$.magnificPopup.close();
			
		});
			   
	});
	
	// Widgets: Initiate color picker 
	function aiovg_widget_color_picker( widget ) {
		widget.find( '.aiovg-color-picker-field' ).wpColorPicker( {
			change: _.throttle( function() { // For Customizer
				$( this ).trigger( 'change' );
			}, 3000 )
		});
	}

	function on_aiovg_widget_update( event, widget ) {
		aiovg_widget_color_picker( widget );
	}

	$( document ).on( 'widget-added widget-updated', on_aiovg_widget_update );

	$( document ).ready( function() {
		$( '#widgets-right .widget:has(.aiovg-color-picker-field)' ).each( function () {
				aiovg_widget_color_picker( $( this ) );
		} );
	} );

})( jQuery );
