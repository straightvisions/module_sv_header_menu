const getNextSibling = function (elem, selector) {

	// Get the next sibling element
	const sibling = elem.nextElementSibling;

	// If there's no selector, return the first sibling
	if (!selector) return sibling;

	// If the sibling matches our selector, use it
	// If not, jump to the next sibling and continue the loop
	while (sibling) {
		if (sibling.matches(selector)) return sibling;
		sibling = sibling.nextElementSibling
	}

};

window.addEventListener('load', function() {
	// Opens Navigation
	document.querySelector('.sv100_sv_header .sv100_sv_navigation_mobile_menu_toggle').addEventListener('click', function() {
		this.classList.toggle('open');
		document.querySelector('.sv100_sv_header').classList.toggle('open');
		document.querySelector('body').classList.toggle('sv100_sv_header_open');
	});

	/* Opens and closes menus */
	const submenus = document.body.querySelectorAll('.sv100_sv_navigation_sv_header_menu_primary li:not(.open) > a.dropdown-toggle');

	submenus.forEach(element =>
		element.addEventListener("click", function(event) {
			event.preventDefault();

			if ( this.parentElement.classList.contains( 'open' ) ) {
				getNextSibling(this, '.sub-menu' ).classList.toggle( 'show_submenu' );
			} else {
				getNextSibling(this, '.sub-menu' ).classList.toggle( 'show_submenu' );
			}

			this.parentElement.classList.toggle('open');
		}
	));
});