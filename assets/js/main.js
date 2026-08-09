( function () {
	'use strict';

	// Add a shadow to the header once the page is scrolled.
	// The header is position:sticky, so it needs no body-padding compensation.
	const header = document.getElementById( 'masthead' );
	if ( header ) {
		const onScroll = function () {
			header.classList.toggle( 'scrolled', window.scrollY > 60 );
		};

		window.addEventListener( 'scroll', onScroll, { passive: true } );
		onScroll();
	}

	// Mobile nav toggle
	const toggle = document.querySelector( '.nav-toggle' );
	const nav    = document.querySelector( '.primary-nav' );

	if ( toggle && nav ) {
		toggle.addEventListener( 'click', function () {
			const isOpen = nav.classList.toggle( 'is-open' );
			toggle.setAttribute( 'aria-expanded', String( isOpen ) );
		} );

		document.addEventListener( 'click', function ( e ) {
			if ( ! toggle.contains( e.target ) && ! nav.contains( e.target ) ) {
				nav.classList.remove( 'is-open' );
				toggle.setAttribute( 'aria-expanded', 'false' );
			}
		} );
	}

	// Hamburger → X animation
	if ( toggle ) {
		const bars = toggle.querySelectorAll( 'span' );
		toggle.addEventListener( 'click', function () {
			const open = toggle.getAttribute( 'aria-expanded' ) === 'true';
			if ( open ) {
				bars[0].style.transform = 'translateY(7px) rotate(45deg)';
				bars[1].style.opacity   = '0';
				bars[2].style.transform = 'translateY(-7px) rotate(-45deg)';
			} else {
				bars.forEach( b => { b.style.transform = ''; b.style.opacity = ''; } );
			}
		} );
	}

} )();
