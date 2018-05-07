/**
 * Module: WP-JS-Hooks
 * Props: Carl Danley & 10up
 */
! function( t, n ) {
	"use strict";
	t.wp = t.wp || {}, t.wp.hooks = t.wp.hooks || new function() {
		function t( t, n, r, i ) {
			var e, o, c;
			if ( f[t][n] ) {
				if ( r ) {
					if ( e = f[t][n], i ) {
						for ( c = e.length; c--; ) {
							(o = e[c] ).callback === r && o.context === i && e.splice( c, 1 ); } } else {
						for ( c = e.length; c--; ) {
										e[c].callback === r && e.splice( c, 1 ); } } } else {
						f[t][n] = []
										}
			}
		}

		function n( t, n, i, e, o ) {
			var c               = { callback: i, priority: e, context: o }, l = f[t][n];
			l ? (l.push( c ), l = r( l )) : l = [c], f[t][n] = l
		}

		function r( t ) {
			for ( var n, r, i, e = 1, o = t.length; e < o; e++ ) {
				for ( n = t[e], r = e; (i = t[r - 1]) && i.priority > n.priority; ) {
					t[r] = t[r - 1], --r;
				}
				t[r] = n
			}
			return t
		}

		function i( t, n, r ) {
			var i, e, o = f[t][n];
			if ( ! o ) {
				return "filters" === t && r[0];
			}
			if ( e = o.length, "filters" === t ) {
				for ( i = 0; i < e; i++ ) {
					r[0] = o[i].callback.apply( o[i].context, r ); } } else {
				for ( i = 0; i < e; i++ ) {
					o[i].callback.apply( o[i].context, r );
				}
					}
					return "filters" !== t || r[0]
		}

		var e = Array.prototype.slice, o = {
			removeFilter: function( n, r ) {
				return "string" == typeof n && t( "filters", n, r ), o
			}, applyFilters: function() {
				var t = e.call( arguments ), n = t.shift();
				return "string" == typeof n ? i( "filters", n, t ) : o
			}, addFilter: function( t, r, i, e ) {
				return "string" == typeof t && "function" == typeof r && (i = parseInt( i || 10, 10 ), n( "filters", t, r, i, e )), o
			}, removeAction: function( n, r ) {
				return "string" == typeof n && t( "actions", n, r ), o
			}, doAction: function() {
				var t = e.call( arguments ), n = t.shift();
				return "string" == typeof n && i( "actions", n, t ), o
			}, addAction: function( t, r, i, e ) {
				return "string" == typeof t && "function" == typeof r && (i = parseInt( i || 10, 10 ), n( "actions", t, r, i, e )), o
			}
		}, f  = { actions: {}, filters: {} };
		return o
	}
}( window );
// BEGIN JS
jQuery( document ).ready(
	function( $ ) {
			var wpModal;
			registerAllActions();
			wp.hooks.doAction( 'wpopPreInit' );
			var mediaStats = wp.template( 'wpop-media-stats' );

			$( '#wpopNav li a' ).click(
				function( evt ) {
					wp.hooks.doAction( 'wpopSectionNav', this, evt ); // reg. here to allow "click" from hash to select a section
				}
			);

			wp.hooks.doAction( 'wpopInit' ); // main init

			$( 'input[type="submit"]' ).click(
				function( evt ) {
					wp.hooks.doAction( 'wpopSubmit', this, evt );
				}
			);

			$( '.pwd-clear' ).click(
				function( evt ) {
					wp.hooks.doAction( 'wpopPwdClear', this, evt );
				}
			);

			$( '.img-upload' ).on(
				'click', function( event ) {
					wp.hooks.doAction( 'wpopImgUpload', this, event );
				}
			);

			$( '.img-remove' ).on(
				'click', function( event ) {
					wp.hooks.doAction( 'wpopImgRemove', this, event );
				}
			);

		function registerAllActions() {
			wp.hooks.addAction( 'wpopPreInit', nixHashJumpJank );
			wp.hooks.addAction( 'wpopInit', handleInitHashSelection, 5 );
			wp.hooks.addAction( 'wpopFooterScripts', initIrisColorSwatches );
			wp.hooks.addAction( 'wpopInit', initSelectizeInputs );
			wp.hooks.addAction( 'wpopInit', initMediaUploadField );

			wp.hooks.addAction( 'wpopInit', wpopDisableSpinner, 100 );

			wp.hooks.addAction( 'wpopSectionNav', handleSectionNavigation );

			wp.hooks.addAction( 'wpopPwdClear', doPwdFieldClear );
			wp.hooks.addAction( 'wpopImgUpload', doMediaUpload );
			wp.hooks.addAction( 'wpopImgRemove', doMediaRemove );

			wp.hooks.addAction( 'wpopSubmit', wpopShowSpinner );
		}

			/* CORE */
		function handleSectionNavigation( elem, event ) {
			event.preventDefault();
			var page_active = $( ($( elem ).attr( 'href' )) ).addClass( 'active' );
			var menu_active = $( ($( elem ).attr( 'href' ) + '-nav') ).addClass( 'active wp-ui-primary opn' );

			// add tab's location to URL but stay at the top of the page
			window.location.hash = $( elem ).attr( 'href' );
			window.scrollTo( 0, 0 );
			$( page_active ).siblings().removeClass( 'active' );
			$( menu_active ).siblings().removeClass( 'active wp-ui-primary opn' );

			return false;
		}

		function wpopDisableSpinner() {
			$( '#panel-loader-positioning-wrap' ).fadeOut( 345 );
		}

		function wpopShowSpinner() {
			$( '#panel-loader-positioning-wrap' ).fadeIn( 345 );
		}

		function handleInitHashSelection() {
			if ( hash = window.location.hash ) {
				$( hash + '-nav a' ).trigger( 'click' );
			} else {
				$( '#wpopNav li:first a' ).trigger( 'click' );
			}
		}

		function nixHashJumpJank() {
			$( 'html, body' ).animate( { scrollTop: 0 } );
		}

			/* FIELDS JS */
		function initIrisColorSwatches() {
			var colorPickers = $( '[data-part="color"]' );
			colorPickers.iris(
				{
					width: 215,
					hide: false,
					border: false,
					create: function() {
						var currentValue = $( this ).attr( 'value' );
						if ( '' !== currentValue ) {
							doColorFieldUpdate( $( this ).attr( 'name' ), $( this ).attr( 'value' ), new Color( $( this ).attr( 'value' ) ).getMaxContrastColor() );
						}
					},
					change: function( event, ui ) {
						doColorFieldUpdate( $( this ).attr( 'name' ), ui.color.toString(), new Color( ui.color.toString() ).getMaxContrastColor() );
					}
					}
			);
		}

		function initSelectizeInputs() {
			$( '[data-select]' ).selectize(
				{
					allowEmptyOption: false,
					placeholder: $( this ).attr( 'data-placeholder' )
					}
			);
			$( '[data-multiselect]' ).selectize(
				{
					plugins: ["restore_on_backspace", "remove_button", "drag_drop", "optgroup_columns"]
					}
			);
		}

		function doColorFieldUpdate( id, color, contrast ) {
			$( '#' + id ).css( 'background-color', color ).css( 'color', contrast );
		}

		function doPwdFieldClear( elem, event ) {
			event.preventDefault();
			$( elem ).prev().val( null );
		}

		function initMediaUploadField() {
			$( '[data-part="media"]' ).each(
				function() {
					if ( '' !== $( this ).attr( 'value' ) ) {
						var closest = $( this ).closest( '.wpop-option' );
						wp.media.attachment( $( this ).attr( 'value' ) ).fetch().then(
							function( data ) {
								closest.find( '.img-remove' ).after( mediaStats( data ) );
							}
						);
					}
				}
			);
		}

		function doMediaUpload( elem, event ) {
			event.preventDefault();
			var config = $( elem ).data();
			// Initialize the modal the first time.
			if ( ! wpModal ) {
				wpModal = wp.media.frames.wpModal || wp.media(
					{
						title: config.title,
						button: { text: config.button },
						library: { type: 'image' }, // TODO: pass thru other media
						multiple: false
						}
				);

				// Picking an image
				wpModal.on(
					'select', function() {
						// Get the image URL
						var image = wpModal.state().get( 'selection' ).first().toJSON();
						if ( 'object' === typeof image ) {
							console.log( image );
							var closest = $( elem ).closest( '.wpop-option' );
							closest.find( '[type="hidden"]' ).val( image.id );
							closest.find( 'img' ).attr( 'src', image.sizes.thumbnail.url ).show();
							$( elem ).attr( 'value', 'Replace ' + $( elem ).attr( 'data-media-label' ) );
							closest.find( '.img-remove' ).show().after( mediaStats( image ) );
						}
					}
				);
			}

			// Open the modal
			wpModal.open();
		}

		function doMediaRemove( elem, event ) {
			event.preventDefault();
			var remove = confirm( 'Remove ' + $( elem ).attr( 'data-media-label' ) + '?' );
			if ( remove ) {
				var item  = $( elem ).closest( '.wpop-option' );
				var blank = item.find( '.blank-img' ).html();
				item.find( '[type="hidden"]' ).val( null );
				item.find( 'img' ).attr( 'src', blank );
				item.find( '.button-hero' ).val( 'Set Image' );
				item.find( '.media-stats' ).remove();
				$( elem ).hide();
			}
		}

	}
);
