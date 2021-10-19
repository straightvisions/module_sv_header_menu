window.addEventListener('load', function() {
	// Opens Navigation
	document.querySelector('.sv100_sv_header .sv100_sv_navigation_mobile_menu_toggle').addEventListener('click', function() {
		this.classList.toggle('open');
		document.querySelector('.sv100_sv_header').classList.toggle('open');
		document.querySelector('body').classList.toggle('sv100_sv_header_open');
		sv100_sv_navigation_mobile_menu_bind_click( document.querySelector('.sv100_sv_header') );

	});

	/* Opens and closes menus */
	function sv100_sv_navigation_mobile_menu_bind_click(parent){
		const containers = [...document.querySelectorAll('.sv100_sv_navigation_sv_header_menu_primary li.menu-item-has-children')];

		if( parent.classList.contains('open') === true ){
			// mobile menu shown
			containers.forEach(container => {
				const _a = container.querySelector('a');

				_a.addEventListener('click', e => {
					if(container.classList.contains('open')){
						// ...
					}else{
						// prevents click event on normal view (toggle off)
						if( parent.classList.contains('open') === true ){
							// show subs
							e.preventDefault();

							if( !container.parentElement.parentElement.classList.contains('open')  ){
								containers.map(el => el.classList.remove('open'));
							}

							container.classList.add('open');
						}

					}
				});

			});
		}else{
			// hide mobile menu -> close subs
			containers.forEach(container => {
				container.classList.remove('open');
			});

		}

	}

	// reset on resize
	window.addEventListener('resize', e => {
		// toggle
		document.querySelector('.sv100_sv_header .sv100_sv_navigation_mobile_menu_toggle').classList.remove('open');
		// helpers
		document.querySelector('.sv100_sv_header').classList.remove('open');
		document.querySelector('body').classList.remove('sv100_sv_header_open');
		// clickers
		sv100_sv_navigation_mobile_menu_bind_click( document.querySelector('.sv100_sv_header') );
	});

});