/*!
 * Custom v1.0
 * Contains handlers for the different site functions
 *
 * Copyright (c) 2013-2017 Cambium
 * License: GNU General Public License v2 or later
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

/* global enquire:true */

( function( $ ) {

	var cambium = {

		// Menu
		menuInit: function() {

			// Superfish Menu
			$( 'ul.sf-menu' ).superfish( {
				delay:        1500,
				animation:    { opacity : 'show', height : 'show' },
				speed:        'fast',
				autoArrows:   false,
				cssArrows:    true
			} );

		},

		// Responsive Videos
		responsiveVideosInit: function() {

			$( '.entry-content, .sidebar' ).fitVids();

		},

		// Responsive Menu
		responsiveMenuInit: function() {

			// Clone the Header Menu and remove classes from clone to prevent css issues
			var $headerMenuClone = $( '.header-menu' ).clone().removeAttr( 'class' ).addClass( 'header-menu-responsive' );
			$headerMenuClone.removeAttr( 'style' ).find( '*' ).each( function( i,e ) {
				$( e ).removeAttr( 'style' );
			} );

			// Responsive Menu Close Button
			var $responsiveMenuClose = $( '<div class="header-menu-responsive-close">&times;</div>' );

			// Insert the cloned menu before the site content
			$( '<div class="site-header-menu-responsive" />' ).insertBefore( '.site-content' );
			$headerMenuClone.appendTo( '.site-header-menu-responsive' );
			$responsiveMenuClose.appendTo( '.site-header-menu-responsive' );

			// Add dropdown toggle that display child menu items.
			$( '.site-header-menu-responsive .page_item_has_children > a, .site-header-menu-responsive .menu-item-has-children > a' ).append( '<button class="dropdown-toggle" aria-expanded="false"/>' );
			$( '.site-header-menu-responsive .dropdown-toggle' ).off( 'click' ).on( 'click', function( e ) {
				e.preventDefault();
				$( this ).toggleClass( 'toggle-on' );
				$( this ).parent().next( '.children, .sub-menu' ).toggleClass( 'toggle-on' );
				$( this ).attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			} );

		},

		// Open Slide Panel - Responsive Mobile Menu
		slidePanelInit: function() {

			// Elements
			var menuResponsive      = $( '.site-header-menu-responsive' );
			var overlayEffect       = $( '.overlay-effect' );
			var menuResponsiveClose = $( '.header-menu-responsive-close' );

			// Responsive Menu Slide
			$( '.toggle-menu-control' ).off( 'click' ).on( 'click', function( e ) {

				// Prevent Default
				e.preventDefault();
				e.stopPropagation();

				// ToggleClass
				menuResponsive.toggleClass( 'show' );
				overlayEffect.toggleClass( 'open' );

				// Add Body Class
				if( overlayEffect.hasClass( 'open' ) ) {
					$( 'body' ).addClass( 'has-responsive-menu' );
				}

			} );

			// Responsive Menu Close
			menuResponsiveClose.off( 'click' ).on( 'click', function() {
				cambium.slidePanelCloseInit();
			} );

			// Overlay Slide Close
			overlayEffect.off( 'click' ).on( 'click', function() {
				cambium.slidePanelCloseInit();
			} );

		},

		// Close Slide Panel
		slidePanelCloseInit: function() {

			// Elements
			var menuResponsive = $( '.site-header-menu-responsive' );
			var overlayEffect  = $( '.overlay-effect' );

			// Slide Panel Close Logic
			if( overlayEffect.hasClass( 'open' ) ) {

				// Remove Body Class
				$( 'body' ).removeClass( 'has-responsive-menu' );

				// For Menu
				if( menuResponsive.hasClass( 'show' ) ) {
					menuResponsive.toggleClass( 'show' );
				}

				// Toggle Overlay Slide
				overlayEffect.toggleClass( 'open' );

			}

		},

		// Block Align Full
		blockAlignFull: function() {

			// Should we use JS Tweaks ?
			if ( $( 'body' ).hasClass( 'has-alignfull-js' ) ) {

				// Element
				var $el = $( '.has-full-width-block .alignfull' );

				// Element Width
				var el_width = parseInt( $el.width() );

				// Viewport Width
				var viewPortWidth = parseInt( $( window ).width() );

				// Element to Viewoport Width Difference
				var diff = 0;

				// Adjust Element Width
				if ( el_width > viewPortWidth ) {
					diff = el_width - viewPortWidth;
				}

				// CSS Strings
				var strWidth = '100vw - ' + diff + 'px';
				var strMargin = '(' + diff + 'px - 100vw ) / 2';

				// CSS
				$el.css({
					'width'       : 'calc(' + strWidth + ')',
					'margin-left' : 'calc(' + strMargin + ')',
					'margin-right' : 'calc(' + strMargin + ')'
				});

			}

		},

		// Media Queries
		mqInit: function() {

			enquire.register( 'screen and ( max-width: 767px )' , {

			    deferSetup : true,
			    setup : function() {

			        // Responsive Menu
					cambium.responsiveMenuInit();

			    },
			    match : function() {

					// Sliding Panels for Menu
					cambium.slidePanelInit();

					// Responsive Tables
					$( '.entry-content, .sidebar' ).find( 'table' ).wrap( '<div class="table-responsive"></div>' );

			    },
			    unmatch : function() {

			        // Responsive Menu Close
					cambium.slidePanelCloseInit();

					// Responsive Tables Undo
					$( '.entry-content, .sidebar' ).find( 'table' ).unwrap( '<div class="table-responsive"></div>' );

			    }

			});

		}

	};

	// Document Ready
	$( document ).ready( function() {

		// Menu
		cambium.menuInit();

		// Responsive Videos
		cambium.responsiveVideosInit();

		// Sliding Panels for Menu and Sidebar
		cambium.slidePanelInit();

		// Block Align Full
		cambium.blockAlignFull();

	    // Media Queries
	    cambium.mqInit();

	} );

	// Document Keyup
	$( document ).keyup( function( e ) {

	    // Escape Key
	    if ( e.keyCode === 27 ) {

			// Make the escape key to close the slide panel
			cambium.slidePanelCloseInit();

	    }

	} );

} )( jQuery );
