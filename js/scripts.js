( function ( $ ) {
	// main part of script
	$( document ).ready( function () {
		/*
		* refresh all forms
		*/
		$( 'input:checked' ).removeAttr( 'checked' );
		$( 'input:file' ).val( '' );
		
		/*
		* work with form elements
		* radiobuttons restyle
		*/
		$( 'input[type=radio]' ).wrap( '<div class="bicubic-radio"></div>' );		
		// hover realization
		$( '.bicubic-radio' ).mouseenter( function () {
				$( this ).addClass( 'bicubic-hover' );
			});
		$( '.bicubic-radio' ).mouseleave( function () {
				$( this ).removeClass( 'bicubic-hover' );
			});
		// active realization
		$( '.bicubic-radio' ).click( function () {
			if ( $( this ).find( 'input' ).is( ':checked' ) ) {
				$( this ).removeClass( 'bicubic-active' );
				$( this ).find( 'input' ).attr( 'checked', false );
			} else {
				$( '.bicubic-radio' ).removeClass( 'bicubic-active' );
				$( this ).addClass( 'bicubic-active' );
				$( this ).find( 'input' ).attr( 'checked', true );
			}
		});
		
		/*
		* checkboxes restyle
		*/
		$( 'input[type=checkbox]' ).wrap( '<div class="bicubic-check"></div>' );		
		// hover realization
		$( '.bicubic-check' ).mouseenter( function () {
			$( this ).addClass( 'bicubic-hover' );
		});
		$( '.bicubic-check' ).mouseleave( function () {
			$( this ).removeClass( 'bicubic-hover' );
		});		
		// active Realization
		$( '.bicubic-check' ).click( function () {
			if ( $( this ).find( 'input' ).is( ':checked' ) ) {
				$( this ).removeClass( 'bicubic-active' );
				$( this ).find( 'input' ).attr( 'checked', false );
			} else {
				$( this ).addClass( 'bicubic-active' );
				$( this ).find( 'input' ).attr( 'checked', true );
			}
		});

		/*
		* reset button restyle
		*/
		$( 'input:reset' ).wrap( '<div class="bicubic-reset-form"></div>' );
		$( 'input:reset' ).click( function () {
			// reset checkboxes and radio
			$( this ).closest( 'form' ).find( 'input' ).each( function () {
				$( this ).removeAttr( 'checked' );
			});
			$( this ).closest( 'form' ).find( '.bicubic-radio' ).removeClass( 'bicubic-active' );
			$( this ).closest( 'form' ).find( '.bicubic-check' ).removeClass( 'bicubic-active' );
			// reset input:file
			$( this ).closest( 'form' ).find( '.bicubic-custom-file-text' ).text( choose_file );
			$( this ).closest( 'form' ).find( '.bicubic-custom-file-status' ).text( file_is_not_selected );			
		});

		/*
		* submit button restyle
		*/
		$( '.bicubic-container input:submit' ).wrap( '<div class="bicubic-submit-button"></div>' );
		$( '.entry-content #search-submit' ).unwrap();
		$( '.widget_search #search-submit' ).unwrap();

		/*
		* select section restyle
		*/
		var test = $( 'select' ).size();
		for ( var k = 0; k < test; k++ ) {
			$( 'select' ).eq( k ).css( 'display', 'none' );
			$( 'select' ).eq( k ).after( CreateSelect( k ) );
		}

		// functional of new select
		$( '.bicubic-select' ).click( function () {
			if ( $( this ).find( '.bicubic-options' ).css( 'display' ) == 'none' ) {
				$( this ).css( 'z-index', '100' );
				$( this ).find( '.bicubic-options' ).css( {
					'display': 'block'
				});
			} else {
				$( this ).css( 'z-index', '10' );
				$( this ).find( '.bicubic-options' ).css( {
					'display': 'none'
				});
			}
		});
		$( '.bicubic-select' ).find( '.bicubic-option' ).click( function () {
			// write text to active opt
			$( this ).parent().parent().find( '.bicubic-active-opt' ).find( 'div:first' ).text( $( this ).text() );
			// remove active option from init select
			$( this ).parent().parent().prev( 'select' ).find( 'option' ).removeAttr( 'selected' );
			// add atrr selected to select	
			$( this ).parent().parent().prev( 'select' ).find( 'option' ).eq( ( $( this ).attr( 'name' ) ) ).attr( 'selected', 'selected' );
		});
		
		/*
		* input:file restyle
		*/
		$( createInputAttr() );

		// functional of new input:file
		$( '.bicubic-custom-file' ).click( function () {
			var file_input = document.getElementById( $( this ).find( '.bicubic-custom-file-status' ).attr('name') )
			$( file_input ).click();

		});
		$( 'input:file' ).change( function () {
			var val=$(this).attr('id');
			$( '[name='+val+']' ).text( $( this ).val().split( '\\' ).pop() )
		});

		/*
		* hide .bicubic-nav-link div if empty
		*/
		if ( $( '.bicubic-nav-link a' ).size() == 0 ) {
			$( '.bicubic-nav-link' ).css( {
				'display': 'none'
			});
		}

		/*
		* add border between .entry-content and .bicubic-sidebar
		*/
		if ( $( '.entry-content' ).innerHeight()< $( '.bicubic-sidebar' ).innerHeight() /*|| 
			$( '#content' ).innerHeight() <	$( '.bicubic-sidebar' ).innerHeight() */) {
			// add border to .bicubic-sidebar and remove from .entry-content
			$( '.bicubic-sidebar' ).css( {
				'border-left': '1px solid #dbdbdb'
			});
			$( '.entry-content' ).css( {
				'border-right': 'none'
			});
		} else {
			// add border to .entry-content and remove from .bicubic-sidebar
			$( '.bicubic-sidebar' ).css( {
				'border-left': 'none'
			});
			$( '.entry-content' ).css( {
				'border-right': '1px solid #dbdbdb'
			});
			// special for portfolio plugin
			$( 'body.page #container' ).css( {
				'border-right': '1px solid #dbdbdb'
			});
			$( '.entry-content .bicubic-nav-link' ).css( {
				'border-bottom': 'none'
			});
			$( 'body.page .bicubic-top:last' ).css( {
					'border-bottom': 'none'
			});
			if ( $( '.bicubic-nav-link' ).css( 'display' ) == 'none' ) {
				$( '.entry-content .bicubic-top:last' ).css( {
					'border-bottom': 'none'
				});
			}
		}

		/*
		* hide first .top link if more than 1 in document
		*/
		if ( $( '.entry-content .bicubic-top' ).size() > 1 ) {
			$( '.entry-content .bicubic-top:first' ).css( {
				'display': 'none'
			});
		}

		/*
		* hide dasher border-bottom in last li in sub-menu and .children
		*/		
		$( '#nav .sub-menu li:last-child, #nav .children li:last-child' ).css( {
			'border-bottom': 'none'
		});

		/*
		* :last-child realization for ie
		*/		
		$( '.widget .menu .sub-menu li:last-child' ).css( {
			'padding': '0'
		});
		$( '.bicubic-options .bicubic-option:last-child' ).css( {
			'padding': '9px 5px 19px 30px'
		});

		/*
		* work with sidebar 
		* correct Pages widget
		*/			
		$( '.widget .children:last-child' ).css( {
			'padding-bottom': '0'
		});
		$( '.widget .children li:last-child' ).css( {
			'padding-bottom': '0'
		});

		// correct text widget
		$( '.textwidget p:last' ).css( {
			'padding-bottom': '0'
		});

		// correct dropdowns widgets
		$( '.widget' ).children( 'select' ).wrap( '<div class="bicubic-dropdown-widget"></div>' );
		var drops = $( '.widget' ).children( '.bicubic-select' ).size();
		var current;
		var target;
		for ( var i = 0; i < 2; i++ ) {
			current = $( '.widget' ).find( '.bicubic-select' ).eq( i );
			target = $( current ).prev( '.bicubic-dropdown-widget' );
			$( current ).detach();
			$( current ).appendTo( $( target ) );
		};	

		// archive-dropdown widget functional
		$( '[name=archive-dropdown]' ).next( '.bicubic-select' ).find( '.bicubic-option' ).click( function () {
			location.href = $( this ).attr( 'value' );
		});
		
		// category-dropdown widget functional
		$( '#cat' ).next( '.bicubic-select' ).find( '.bicubic-option' ).click( function () {
			location.href = bicubic_home_url + '?cat=' + $( this ).attr( 'value' );
		});
		
		// correct search widget
		$( '.widget_search' ).children( 'form' ).wrap( '<div class="bicubic-search-widget"></div>' );
		
		/*
		* to the top animation
		*/
		$( function () {
			var e = $( '.bicubic-top a' ),
				speed = 500;
			e.click( function () {
				$( 'html:not(  :animated  )' + ( !$.browser.opera ? ',body:not(  :animated  )' : '' ) ).animate( { scrollTop: 0	}, 500 );
				return false;
			});
		});
		
		/*
		* menu control if it leave current window
		*/
		$( '#nav ul li' ).mouseenter( function () {
			var window_width = $( window ).width();
			var parent_width = $( this ).width();
			var offset = $( this ).offset();
			var parent_left_offset = offset.left;
			var rest_space = window_width - parent_left_offset - parent_width;
			if ( rest_space < 218 && ( $( this ).parent().hasClass( 'sub-menu' ) ) || rest_space < 218 && ( $( this ).parent().hasClass( 'children' ) ) ) {
				$( this ).children( 'ul' ).css( {
					'left': '-100%',
					'top': '65%'
				});
			}
		});
		
		/*
		* remove unwanted border-top at first widget
		*/
		$( '.bicubic-sidebar > .widget > li:first .widgettitle' ).css( 'border-top', 'none' );
		
		/*
		* add support of placeholder for unsupported browsers
		*/
		$( 'input[placeholder]' ).placeholder();
		
		/*
		* fix font for opera
		*/		
		if ( navigator.userAgent.indexOf( 'Opera' ) != -1 ) {
   			$( 'body' ).css( 'font-family', '"Open Sans"' );
   		}
		/*
		* fix contact form attachment hint
		*/
		var bicubic_custom_file_append = $( '.cntctfrmpr_hidden_help_text_attach' ).prev( '.bicubic-custom-file' );
		$( '.cntctfrmpr_hidden_help_text_attach' ).detach().appendTo( bicubic_custom_file_append );

	});
} )( jQuery );


/* define all custom functions */
// function for input:file
function CreateFileInput( k ) {
	var custom_file = document.createElement( 'div' );
	( function ( $ ) {
		$( custom_file ).addClass( 'bicubic-custom-file' );
		$( custom_file ).append( '<div class="bicubic-custom-file-content"></div>' );
		$( custom_file ).find( '.bicubic-custom-file-content' ).append( '<div class="bicubic-custom-file-text"></div>' );
		$( custom_file ).find( '.bicubic-custom-file-content' ).append( '<div class="bicubic-custom-file-button"></div>' );
		$( custom_file ).append( '<div class="bicubic-custom-file-status"></div>' );
		$( custom_file ).find('.bicubic-custom-file-status').attr( 'name', $( 'input:file' ).eq(k).attr( 'id' ))
		$( custom_file ).find( '.bicubic-custom-file-text' ).text( choose_file );
		$( custom_file ).find( '.bicubic-custom-file-status' ).text( file_is_not_selected );
		// $( custom_file ).append( '<div class="bicubic-clear"></div>' );
	} )( jQuery );
	return custom_file;
}

// function for hide init input:file and add after a new input:file
function createInputAttr() {
	( function ( $ ) {
		var size = $( 'input:file' ).size();
		for (var i = 0; i < size; i++) {
			$( 'input:file' ).eq(i).attr( 'id', 'file-' + i ).css( 'display', 'none' ).after( CreateFileInput( i ) );
		};
	} )( jQuery );
}

// function for custom select
function CreateSelect( k ) {
	// create select division
	var sel = document.createElement( 'div' );
	( function ( $ ) {
		$( sel ).addClass( 'bicubic-select' );
		// create active-option division
		var active_opt = document.createElement( 'div' );
		$( active_opt ).addClass( 'bicubic-active-opt' );
		$( active_opt ).append( '<div></div>' );
		$( active_opt ).append( '<div class="bicubic-select-button"></div>' );
		$( active_opt ).find( 'div:first' ).text( $( 'select' ).eq( k ).find( 'option' ).first().text() );
		// create options division
		var options = document.createElement( 'div' );
		$( options ).addClass( 'bicubic-options' );
		// create array of optgroups
		var count = $( 'select' ).eq( k ).find( 'optgroup' ).size();
		var optgroups = [];
		// create options division
		if ( count ) {
			var z = 0;
			for ( var i = 0; i < count; i++ ) {
				optgroups[i] = document.createElement( 'div' );
				$( optgroups[i] ).addClass( 'bicubic-optgroup' );
				$( optgroups[i] )
					.text( $( 'select' ).eq( k ).find( 'optgroup' ).eq( i ).attr( 'label' ) );
			};
			for ( var i = 0; i < count; i++ ) {
				$( options ).append( optgroups[i] );
				for ( var j = 0; j < $( 'select' ).eq( k ).find( 'optgroup' ).eq( i ).children().size(); j++ ) {
					var opt = document.createElement( 'div' );
					$( opt ).addClass( 'bicubic-option' );
					$( opt ).attr( 'value', $( 'select' ).eq( k ).find( 'optgroup' ).eq( i ).children().eq( j ).attr( 'value' ) );
					$( opt ).text( $( 'select' ).eq( k ).find( 'optgroup' ).eq( i ).children().eq( j ).text() );
					$( opt ).attr( 'name', z );
					z++;
					$( options ).append( opt );
				};
			};
		} else {
			for ( var i = 0; i < $( 'select' ).eq( k ).find( 'option' ).size(); i++ ) {
				var opt = document.createElement( 'div' );
				$( opt ).addClass( 'bicubic-option' );
				$( opt ).attr( 'value', $( 'select' ).eq( k ).find( 'option' ).eq( i ).attr( 'value' ) );
				$( opt ).attr( 'name', i );
				$( opt ).text( $( 'select' ).eq( k ).find( 'option' ).eq( i ).text() );
				$( options ).append( opt );
			};
		};
		$( sel ).append( active_opt );
		$( sel ).append( options );
	} )( jQuery );
	return sel;
}

( function( $ ) {
	$(document).ready(function() {
		/* Check of previous selected items */
		$( 'select' ).each(function() {
			var index = $( this ).find( "option[selected]" ).index();
			if (index >= 0) {
				/*add attr selected to select*/
				var selected_select = $( this ).find( "option[selected]" ).parent().next().find( ".bicubic-active-opt" ).find( "div:first" );
				/*write text to active opt*/
				selected_select.text( $( this ).find( "option[selected]" ).text() );
			}
		});
		/* Clear select elements */
		$( 'input:reset' ).click( function() {
			/* Clear original selects. */
			$( 'select' ).each(function() {
				/* set path */
				var clear_select = $( this ).find( "option:first" );
				var clear_selected_select = $( this ).find( "option[selected]" );
				/* clear active opt */
				$( clear_selected_select ).removeAttr( 'selected' );
				$( clear_select ).attr( 'selected', 'selected' );
			});
			/* Clear custom selects. */
			$( '.bicubic-select' ).each(function() {
				var clear_select = $( this ).find( ".bicubic-active-opt" ).find( "div:first" );
				$( clear_select ).text( $( this ).prev().find( "option:first" ).text() )
			});
			e.preventDefault;
		});
	});
} )( jQuery );