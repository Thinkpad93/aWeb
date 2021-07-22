/*global jQuery:false */

jQuery( document ).ready(function( $ ) {
	"use strict";
	
	
	/* #General
	 ================================================== */
	
	var waitForFinalEvent = (function () {
	  var timers = {};
	  return function (callback, ms, uniqueId) {
		if (!uniqueId) {
		  uniqueId = "Don't call this twice without a uniqueId";
		}
		if (timers[uniqueId]) {
		  clearTimeout (timers[uniqueId]);
		}
		timers[uniqueId] = setTimeout(callback, ms);
	  };
	})();
	
	
	
	/* #Portfolio
	 ================================================== */
	
	// Portfolio listing templates
	var $portfolioWrapper = $( '.portfolio-listing-wrapper' ),
		$portfolioListing = $portfolioWrapper.find( '.portfolio-listing' ),
		$carousel;
		
	if ( $portfolioListing.length > 0 ) {
		
		if ( jQuery().imagesLoaded ) {
				
			// Use imagesLoaded for both portfolio listing templates and single page
			var countItems = $( '.portfolio-item, .image-wrapper' ).length;
		
			$portfolioListing.imagesLoaded()
			.always( function( instance ) {
				
				// For the "carousel" display mode
				if ( $portfolioWrapper.hasClass( 'carousel' ) ) {
					
					// Need to set the dimension to the div first before running Flickity
					calculateWidthHeightDynamically();
					
					if ( jQuery().flickity ) {
						
						var carouselAutoPlay = ThemeOptions.carousel_autoplay_milliseconds;
						if ( '0' !== carouselAutoPlay ) {
							// Convert to milliseconds
							carouselAutoPlay = parseInt (carouselAutoPlay, 10 ) * 1000;
						} else {
							carouselAutoPlay = false;
						}
						
						// Initialize portfolio carousel
						$carousel = $portfolioListing.flickity({
							cellAlign: 'left',
							contain: true,
							prevNextButtons: false,
							pageDots: false,
							freeScroll: true,
							freeScrollFriction: 0.03,
							selectedAttraction: 0.02, // Lower makes it move slower. Default: 0.025
							friction: 0.3, // Lower friction makes the slider feel looser and more wobbly. Default: 0.28
							autoPlay: carouselAutoPlay,
						});
						
						$( '.prev-slide' ).on( 'click', function() {
							$carousel.flickity( 'previous', true );
						});
						
						$( '.next-slide' ).on( 'click', function() {
							$carousel.flickity( 'next', true );
						});
						
						$( '.additional-link-button-wrapper' ).on( 'mouseover', function() {
							$carousel.flickity( 'pausePlayer' );
						}).on( 'mouseout', function() {
							$carousel.flickity( 'unpausePlayer' );
						});
						
						$( '.portfolio-thumbnail' ).on( 'mouseover', function() {
							//$( this ).find( 'portfolio-title' ).show();
						}).on( 'mouseout', function() {
							
						});
						
					} else {
						console.log( 'flickity JS is disabled or missing.' );
					}
					
				} else { // For the "flexible-grid" mode
					
					// Use this to fix the hidden height from stacking images issue when they are being loaded
					$( '.portfolio-item' ).removeClass( 'visually-hidden' );
					
					// Justify images
					initFlexImages( $portfolioListing );
					
					// Check the height of images to make sure that they don't exceed the original's
					validateImageHeight( $portfolioListing );
					
					adjustGridItems();
					
				}
				
				displayPortfolioItems();
				
			})
			.progress( function( instance, image ) {
				
				if ( image.isLoaded ) {
					
					$( image.img ).closest( '.portfolio-item, .image-wrapper' ).addClass( 'loaded' );
					
					var countLoadedImages = $( '.portfolio-item.loaded, .image-wrapper.loaded' ).length;
					var width = 100 * ( countLoadedImages / countItems ) + '%';
					
					$( '.progress-bar' ).css({
						'width' : width
					});
					
				}
				
			});
			
		} else {
			console.log( 'imagesLoaded JS is disabled or missing.' );
		}
		
	}
	
	
	
	function adjustGridItems() {
		
		// Loop through each flexible grid
		$( '.portfolio-listing' ).each( function() {
			
			if ( ! $( '.portfolio-listing' ).hasClass( 'flickity-enabled' ) ) {

				var $container = $( this ),
					containerWidth = $container.width();

				// Get a total row number in this grid
				var totalRowCount = 1;
				$container.find( '.portfolio-item' ).each( function() {

					if ( $( this ).data( 'row' ) != totalRowCount ) {
						totalRowCount += 1;
					}

				});

				// Loop through each item, calculate the total width of the items in a row and adjust the width if needed
				for ( var i = 1; i <= totalRowCount; i++ ) {

					var totalItemWidth = 0,
						highestMarginBottom = 0;

					$container.find( '.item-row-' + i ).each( function() {

						var $title = $( this ).find( '.portfolio-title' ),
							titleHeight = $title.outerHeight( true ),
							currentMarginBottom = titleHeight + Math.abs( getIntValueFromCSSAttribute( $( this ).css( 'margin-bottom' ) ) - titleHeight );

						if ( currentMarginBottom >= highestMarginBottom ) {

							highestMarginBottom = currentMarginBottom;

							$( '.item-row-' + i ).css( 'margin-bottom', '' ).css({
								marginBottom: highestMarginBottom,
							});

						}
						
						
						
						totalItemWidth += $( this ).outerWidth( true );

						if ( $( this ).hasClass( 'last-in-row' ) ) {

							if ( totalItemWidth > containerWidth ) {
								$( this ).css( 'width', $( this ).width() - Math.ceil( totalItemWidth - containerWidth ) );
							}

						}

					});

				}
				
			}
			
		});
		
	}
	
	
	
	// Portfolio single page
	var $portContent = $( '.port-format-content' );
	
	if ( $portContent.length > 0 ) {
			
		if ( jQuery().imagesLoaded ) {
						
			$portContent.imagesLoaded()
			.always( function( instance ) {
				
				$( '.portfolio-loading' ).animate({
					opacity: 0,
				}, function() {
					
					$( '.portfolio-loading' ).css( 'display', 'none' );
					$portContent.css({
						height: 'auto',
						visibility: 'visible',
					}).addClass( 'show-portfolio' );
					
				});
				
			})
			.progress( function( instance, image ) {
				
			});
			
		} else {
			console.log( 'imagesLoaded JS is disabled or missing.' );
		}
		
	}
	
	
	function calculateWidthHeightDynamically() {
		
		if ( $( '.portfolio-listing-wrapper' ).hasClass( 'carousel' ) ) {
			
			$( '.portfolio-listing-wrapper.carousel' ).css( 'height', '75.78vh' );
			
			if ( checkModernizr() ) {
				
				if ( Modernizr.mq( '(max-width: 800px)' ) ) {
					$( '.portfolio-listing-wrapper.carousel' ).css( 'height', '60vh' );
				}
				
				if ( Modernizr.mq( '(max-width: 767px)' ) ) {
					$( '.portfolio-listing-wrapper.carousel' ).css( 'height', '50vh' );
				}
				
				if ( Modernizr.mq( '(max-width: 600px)' ) ) {
					$( '.portfolio-listing-wrapper.carousel' ).css( 'height', '40vh' );
				}
				
			}
					
					
			$( '.portfolio-item' ).each( function() {
				
				var $img = $( this ).find( '.portfolio-thumbnail img' );
				var newImageHeight = $( '.portfolio-listing-wrapper' ).outerHeight() * 600 / 738, // 600 & 738 = original values
					originalImageHeight = $( this ).attr( 'data-h' ),
					originalImageWidth = $( this ).attr( 'data-w' );
				
				
				//log( 'newImageHeight: ' + newImageHeight + ' // originalImageHeight: ' + originalImageHeight + ' // originalImageWidth: ' + originalImageWidth );
				
				$( this ).css({
					height: newImageHeight,
					width: originalImageWidth * newImageHeight / originalImageHeight,
				});
				
			});
			
			$( '.portfolio-listing-wrapper.carousel' ).css( 'height', 'auto' );
			
		}
			
	}
	
	function validateImageHeight( $portfolioListing ) {
	
		$portfolioListing.find( '.portfolio-item' ).each( function() {
			
			var $item = $( this ),
				originalHeight = parseInt( $item.attr( 'data-h' ), 10 ),
				imgClientHeight = parseInt( $item.find( 'img' ).height(), 10 );
			
			// Reset the height to "auto" instead of 100% if the displaying img is taller than the original
			// to prevent blurry img when it is stretched to 100%
			if ( imgClientHeight > originalHeight ) {
				$item.find( 'img' ).css( 'height', 'auto' );
			}
			
		});
		
	}
	
	function initFlexImages( $portfolioListing ) {
		
		if ( $( '.portfolio-listing-wrapper' ).hasClass( 'flexible-grid' ) ) {
				
			if ( jQuery().flexImages ) {
				
				// Adjust row height a bit on lower resolutions
				var rowHeightValue = parseInt( ThemeOptions.justified_images_row_height, 10 );
				
				if ( checkModernizr() ) {
						
					if ( Modernizr.mq( '(max-width: 1280px)' ) ) {
						
						rowHeightValue = rowHeightValue * 0.8;
						
						if ( Modernizr.mq( '(max-width: 1000px)' ) ) {
							
							rowHeightValue = rowHeightValue * 0.8;
						
						}
						
					}
					
				}
				
				
				$portfolioListing.flexImages({
					container: '.portfolio-item',
					rowHeight: rowHeightValue,
				});
				
			} else {
				console.log( 'flexImages JS is disabled or missing.' );
			}
			
		}
		
	}
	 
	function displayPortfolioItems() {
		
		$( '.portfolio-loading' ).animate({
			opacity: 0,
		}, function() {
			
			$( '.portfolio-loading' ).css( 'display', 'none' );
			$( '.flexible-grid .portfolio-listing' ).css( 'height', 'auto' );
			$( '.portfolio-listing, .additional-link-button-wrapper' ).addClass( 'show-portfolio' );
			
		});
		
	}
	
	
	
	adjustPortfolioNavigation();
	
	function adjustPortfolioNavigation() {
		
		if ( $( '.portfolio-listing' ).length > 0 ) {

			if ( Modernizr.mq( '(max-width: 1023px)' ) ) {
				$( 'main' ).after( $( '.numbers-pagination, .additional-link-button-wrapper' ) );
			} else {
				$( '.portfolio-listing-wrapper' ).after( $( '.numbers-pagination, .additional-link-button-wrapper' ) );
			}

		}
		
	}
	
	
	
	// Portfolio category menu
	if ( jQuery().superfish ) {
		
		$( '.portfolio-category-selector' ).superfish({
			popUpSelector: '.portfolio-categories',
			animation: {
				opacity: 'show',
			},
			speed: 300,
			speedOut: 400,
			delay: 500	// milliseconds delay on mouseout
		});
		
	} else {
		console.log( 'superfish JS is disabled or missing.' );
	}
	
	
	
	/* #Site Menu
	 ================================================== */
	if ( jQuery().superfish ) {
		
		// Init the menu and submenu
		$( '.menu-list' ).superfish({
			popUpSelector: '.sub-menu, .children',
			animation: {
				opacity: 'show',
			},
			speed: 300,
			speedOut: 400,
			delay: 500	// milliseconds delay on mouseout
		});
		
	} else {
		console.log( 'superfish JS is disabled or missing.' );
	}
	
	// Adjust the position of first-level submenu
	adjustSubmenuPosition();
	
	function adjustSubmenuPosition() {
		
		if ( checkModernizr() ) {
					
			if ( Modernizr.mq( '(min-width: 1025px)' ) ) {
							
				$( '.menu-list > li > .sub-menu, .menu-list > li > .children' ).each( function() {
					$( this ).css({
						left: $( this ).parent().children( 'a' ).width() + 25,
					});
				});
				
			} else {
				$( '.menu-list > li > .sub-menu, .menu-list > li > .children' ).css( 'left', '' );
			}
		
		}
		
	}
	
	
	
	/* #Mobile Menu
	 ================================================== */
	createMobileMenuItems();
	
	if ( jQuery().mmenu ) {
			
		// Initialize the mobile menu
		$( '#mobile-menu-entity' ).mmenu({
			// Options
			extensions 	: [ 'pagedim-black' ],
			slidingSubmenus : false,
			offCanvas : {
				position : 'right',
			},
			navbars	: {
				content : [ 'close' ],
			}
		});
		
	} else {
		console.log( 'mmenu JS is disabled or missing.' );
	}
	
	function createMobileMenuItems() {
		
		var mobileMenuList = $( '<ul />' ).appendTo( $( '#mobile-menu-entity' ) );
		
		var clonedList = $( '.menu-list > li' ).clone();
		clonedList = getGeneratedSubmenu( clonedList );
		clonedList.appendTo( mobileMenuList );
		
	}
	
	// Recursive function for generating submenus
	function getGeneratedSubmenu( list ) {
		
		$( list ).each( function() {
			
			if ( $( this ).find( 'ul' ).length > 0 ) {
				
				var submenu = $( this ).find( 'ul' ).removeAttr( 'style' ).removeAttr( 'class' ); // To remove styles that prevents mobile menu to display properly
				getGeneratedSubmenu( submenu.find( 'li' ) );
				
			}
			
		});
		
		return list;
		
	}
	
	
	
	/* #Search 
	 ================================================== */
	 
	// Change the default placeholder text of the modal search input
	$( '#search-panel-wrapper .search-field' ).attr( 'placeholder', ThemeOptions.modal_search_input_text );
	
	showSearchButton();
	
	function showSearchButton() {
		
		var showSearchButton 	= ThemeOptions.show_search_button,
			$searchButton 		= $( '.search-button' ),
			$searchIconButton 	= $( '.search-icon-button' );
		
		// If the search button is enabled
		if ( '' !== showSearchButton && '0' !== showSearchButton ) {
			
			if ( checkModernizr() ) {
					
				if ( Modernizr.mq( '(max-width: 768px)' ) ) {
					
					$( '#mobile-menu' ).prepend( $searchIconButton.css( 'display', 'inline' ) );
					$( '.search-menu-item' ).hide();
					
				} else {
					
					if ( $( '.menu-list' ).find( '.search-menu-item' ).length == 0 ) {
						$( '.menu-list' ).append( $( '<li class="menu-item search-menu-item"></li>' ).append( $searchButton.css( 'display', 'inline' ) ) );
					}
					
					$( '.search-menu-item' ).show();
					$searchIconButton.css( 'display', 'none' );
					
				}
				
			}
			
		}
		
		$( '.site-menu' ).css( 'opacity', 1 );
		
	}
	
	
	var isSearchOpened = false;
	
	$( '.search-button, .search-icon-button' ).on( 'click', function() {
		
		$( '#search-panel-wrapper' ).css( 'display', 'block' ).stop().animate({
			opacity: 1,
		}, 300, function() {
			
			$( '#search-panel-wrapper .search-field' ).focus();
			isSearchOpened = true;
			
		});
		
	});
	
	$( '#search-close-button' ).on( 'click', function() {
		closeSearchPanel();
	});
	
	$( document ).on( 'keyup', function( e ) {
		
		// Escape key
		if ( 27 === e.keyCode ) {
			closeSearchPanel();
		}
		
	});
	
	function closeSearchPanel() {
		
		if ( isSearchOpened ) {
			
			$( '#search-panel-wrapper' ).stop().animate({
				opacity: 0,
			}, 300, function() {
				
				$( this ).css( 'display', 'none' );
				isSearchOpened = false;
				
			});
	
		}
		
	}
	
	
	
	/* #Fancybox 
	 ================================================== */
	 
	var enableLightbox = ThemeOptions.enable_lightbox_wp_gallery;
	if ( enableLightbox === '0' ) {
		enableLightbox = false;
	} else {
		enableLightbox = true;
	}
	
	// Add FancyBox feature to WP gallery and WP images
	if ( enableLightbox ) {
		
		registerFancyBoxToWPGallery();
		registerFancyBoxToWPImage();
		
	}
	 
	function registerFancyBoxToWPGallery() {
		// WP Gallery shortcode
		var $wpGallery = $( '.gallery' );

		$wpGallery.each( function() {
			
			var mainId = $( this ).attr( 'id' );
			var items = $( this ).find( '.gallery-item' ).find( 'a' );

			items.each( function() {

				var href = $( this ).attr( 'href' );
				
				// Check the target file extension, if it is one of the image extension then add Fancybox class
				if ( href.toLowerCase().indexOf( '.jpg' ) >= 0 || href.toLowerCase().indexOf( '.jpeg' ) >= 0 || href.toLowerCase().indexOf( '.png' ) >= 0 || href.toLowerCase().indexOf( '.gif' ) >= 0) {

					$( this ).addClass( 'image-box' );
					$( this ).attr( 'data-fancybox-group', mainId );

				}

			});

		});
	}
	
	function registerFancyBoxToWPImage() {
		
		// Run through WP images on the page
		$( 'img[class*="wp-image-"]' ).each( function() {
			
			// If the image has an anchor tag
			var $parentAnchor = $( this ).closest( 'a' );
			
			if ( $parentAnchor.length > 0 ) {
				
				var href = $parentAnchor.attr( 'href' );
				
				// Check the target file extension, if it is one of the image extension then add Fancybox class
				if (href.toLowerCase().indexOf( '.jpg' ) >= 0 || href.toLowerCase().indexOf( '.jpeg' ) >= 0 || href.toLowerCase().indexOf( '.png' ) >= 0 || href.toLowerCase().indexOf( '.gif' ) >= 0) {

					$parentAnchor.addClass( 'image-box no-slideshow' );

				}
				
			}
			
		});
		
	}
	
	
	callFancyBoxScript();
	
	function callFancyBoxScript() {
		
		if ( jQuery().fancybox ) {
			
			// For portfolio and WP gallery
			$( '.image-box' ).fancybox({
				mouseWheel: false,
				padding: 0,
				closeBtn: false,
				nextEffect: 'fade',
				prevEffect: 'fade',
				helpers : {
					thumbs : {
						width : 40,
						height : 40,
					},
					overlay: {
						locked: true, // to prevent page jumping to the top when clicking on the object
						css: { 'background': 'rgba(248,248,248,1)' },
					},
					title: {
						type : 'outside',
					},
					buttons: {},
				},
				beforeLoad: function() {
					this.title = getImageCaptionText( $( this.element ) );
				},
			});
			
			
			
			// For WP images
			$( '.image-box.no-slideshow' ).fancybox({
				padding: 0,
				helpers : {
					overlay: {
						locked: true, // to prevent page jumping to the top when clicking on the object
						css: { 'background': 'rgba(255,255,255,0.9)' },
					},
					title: {
						type : 'outside',
					},
				},
				beforeLoad: function() {
					this.title = getImageCaptionText( $( this.element ) );
				},
			});
			
		} else {
			console.log( 'Fancybox JS is disabled or missing.' );
		}
		
	}
	
	function getImageCaptionText( $element ) {
		
		// For WP gallery
		if ( $element.closest( '.gallery-item' ).length > 0 ) {
			return $element.closest( '.gallery-item' ).find( '.wp-caption-text' ).html();
		
		// For theme image
		} else if ( $element.closest( '.image-wrapper' ).length > 0 ) {
			return $element.closest( '.image-wrapper' ).find( '.image-caption' ).html();
			
		// For any other cases... it can be normal WP media file (image)
		} else {
			return $element.closest( '.wp-caption' ).find( '.wp-caption-text' ).html();
		}
		
	}
	
	
	
	/* #Misc
	 ================================================== */
	 
	// Make the embed video fit its container
	if ( jQuery().fitVids ) {
		$( '.video-wrapper' ).fitVids();
	} else {
		console.log( 'FitVids JS is disabled or missing.' );
	}
	
	// Hide the underline of the link that wraps around img
	var $wpImages = $( 'img[class*="wp-image-"], img[class*="attachment-"], .widget-item img' );
	if ( $wpImages.closest( 'a' ).length > 0 ) {
		$wpImages.closest( 'a' ).addClass( 'no-border' );
	}
	
	function randomizeNumberFromRange( min, max ) {
		return Math.floor( Math.random() * ( max - min + 1 ) + min );
	}
	
	function log( x ) {
		console.log( x );
	}
	
	function checkModernizr() {
	
		if ( 'undefined' !== typeof Modernizr ) {
			return true;
		} else {
			console.log( 'Modernizr JS is missing.' );
			return false;
		}
		
	}
	
	function getIntValueFromCSSAttribute( $attr ) {
		return parseInt( $attr.replace( 'px', '' ), 10 );
	}
	
	
	
	/* #Responsive Related
	 ================================================== */
	moveBlogMeta();
	
	function moveBlogMeta() {
	
		var $meta = $( '.blog-single .post-meta-wrapper' );
			
		if ( $meta.length > 0 ) {
				
			if ( checkModernizr() ) {
				
				if ( Modernizr.mq( '(max-width: 1024px)' ) ) {
					
				} else {
					
					$meta.css({
						right: ( $meta.width() + $( '#content-container' ).css( 'padding-right' ).replace( 'px', '' ) * 2 ) * -1,
					});
						
				}
				
				$meta.css( 'display', 'block' );
				
			}
			
		}
		
	}
	
	
	
	setLogoTaglinePosition();
	
	function setLogoTaglinePosition() {
		
		if ( checkModernizr() ) {
			
			var $logoTaglineWrapper = $( '.logo-tagline-wrapper' ),
				$logoWrapper = $( '.logo-wrapper' ),
				$logoImage = $( '.logo-image' ), 
				$tagline = $( '.tagline' ),
				verticalBarWidth = $( '#side-vertical-bar' ).width(),
				logoTaglineWrapperTop = $( '.site-menu' ).position().top + $logoWrapper.width(),
				taglineTop = $tagline.width() + 10,
				taglineLeft = verticalBarWidth / 2 - $tagline.height() / 2 + 2;
	
			
			if ( Modernizr.mq( '(min-width: 1025px)' ) ) {
				
				// max-width must be set first
				var logoImageMaxWidth = verticalBarWidth - 12;
				if ( $logoWrapper.hasClass( 'logo-above-menu' ) ) {
					
					logoImageMaxWidth = 'none';
					
				}
				
				$logoImage.css({
					maxWidth: logoImageMaxWidth,
				});
				
				$logoImage.imagesLoaded( function() {
					
					var logoImageLeft = verticalBarWidth / 2 - $logoImage.width() / 2,
						siteTitleLeft = verticalBarWidth / 2 - $logoWrapper.height() / 2;
					
					if ( $logoWrapper.hasClass( 'logo-above-menu' ) ) {
						
						$( '.site-menu' ).prepend( $logoWrapper ).css( 'visibility', 'visible' );
						logoTaglineWrapperTop = $( '.site-menu' ).position().top;
						taglineTop = taglineTop - 10;
						logoImageLeft = 0;
						siteTitleLeft = 0;
						
					}
					
					if ( $logoWrapper.hasClass( 'has-logo-image' ) ) {
						
						logoTaglineWrapperTop = '';
						siteTitleLeft = 0;
						
					}
					
					if ( $tagline.hasClass( 'tagline-above-menu' ) ) {
						
						$logoWrapper.append( $tagline );
						taglineTop = 12;
						taglineLeft = 0;
						
					}
					
					$logoWrapper.css({
						marginLeft: siteTitleLeft,
					});
					
					$logoImage.css({
						marginLeft: logoImageLeft,
					});
					
					$tagline.css({
						marginLeft: taglineLeft,
						marginTop: taglineTop,
					});
					
					$logoTaglineWrapper.css({
						top: logoTaglineWrapperTop,
						visibility: 'visible',
					});
					
				});
				
			} else { // 1024 and below
				
				$logoImage.css({
					maxWidth: 'none',
				});
				
				$logoWrapper.css({
					marginLeft: '',
				});
				
				$logoImage.css({
					marginLeft: '',
				});
				
				$tagline.css({
					marginLeft: 0,
					marginTop: 12,
				});
				
				$logoTaglineWrapper.css({
					top: '',
					visibility: 'visible',
				});
				
				if ( $logoWrapper.hasClass( 'logo-above-menu' ) ) {
					
					$( '.logo-tagline-wrapper' ).prepend( $logoWrapper );
					
				}
				
			}
			
		}
			
	}
	
	
	adjustArchiveTitlePosition();
	
	function adjustArchiveTitlePosition() {
		
		var $selectors = $( '.archive .top-section, .all-works .top-section' ),
			topValue = ( $selectors.outerHeight() - 8 ) * -1;
			
		$selectors.css({
			top: topValue,
			visibility: 'visible',
		});
		
		$( '.portfolio-category-selector' ).css({
			top: topValue,
			left: $selectors.outerWidth(),
			visibility: 'visible',
		});
		
		
		// Adjust the position of portfolio category menu
		if ( checkModernizr() ) {
			
			var $categoryMenu = $( '.portfolio-category-selector .portfolio-categories' );
			
			if ( Modernizr.mq( '(max-width: 767px)' ) ) {
				
				$categoryMenu.css({
					marginLeft: $categoryMenu.outerWidth() / 2 * -1,
				});
				
			} else {
				
				$categoryMenu.css({
					marginLeft: '',
				});
				
			}
			
		}
		
	}
	
	
	adjustCopyrightPosition();
	
	function adjustCopyrightPosition() {
		
		if ( checkModernizr() ) {
				
			if ( Modernizr.mq( '(max-width: 1024px)' ) ) {
				$( '#main-container' ).append( $( '.copyright-social-wrapper' ).css( 'display', 'block' ) );
			} else {
				$( '#side-container .site-menu' ).after( $( '.copyright-social-wrapper' ) );
			}
			
		}
		
	}
	
	
	
	var windowWidth = $( window ).width();
	var timeoutId = 0;
	
	// Run this function right after the resizing is finished
	function doneResizing() {
	
		waitForFinalEvent(function() {
			
			// For "flexible-grid" mode
			initFlexImages( $portfolioListing );

		}, 300, 'adjust_flex_grids');
		
	}
	
	$( window ).on( 'resize', function() {
	
		// For "carousel" mode
		calculateWidthHeightDynamically();
		if ( 'undefined' !== typeof flickity && 'undefined' !== typeof $carousel ) {
			$carousel.flickity( 'resize' ).flickity( 'reposition' );
		}

		setLogoTaglinePosition();
		adjustSubmenuPosition();
		adjustCopyrightPosition();
		moveBlogMeta();
		adjustArchiveTitlePosition();
		adjustPortfolioNavigation();

		clearTimeout( timeoutId );
		timeoutId = setTimeout( doneResizing, 300 );
		
	});
		
});