jQuery( document ).ready( function() {
    // Opens Navigation
    jQuery( document ).on( 'click', '.sv100_sv_header .sv100_sv_navigation_mobile_menu_toggle', function() {
        jQuery( this ).toggleClass( 'open' );
        jQuery( '.sv100_sv_header' ).toggleClass( 'open' );
		jQuery( 'body' ).toggleClass( 'sv100_sv_header_open' );
    });

    /* Opens and closes menus */
    jQuery( document ).on( 'click', '.sv100_sv_header.open .sv100_sv_navigation_sv_header_primary a.dropdown-toggle', function(event) {
		event.preventDefault();

        if ( jQuery( this ).parent().hasClass( 'open' ) ) {
            jQuery( this ).next( '.sub-menu' ).slideUp( '250ms' );
        } else if ( ! jQuery( this ).parent().hasClass( 'open' ) ) {
            jQuery( this ).parent().parent().children( '.open' ).children( '.sub-menu' ).slideUp( '250ms' );
            jQuery( this ).parent().parent().children( '.open' ).toggleClass( 'open' );
            jQuery( this ).next( '.sub-menu' ).slideDown( '250ms' );
        }

        jQuery( this ).parent().toggleClass( 'open' );
    });
});