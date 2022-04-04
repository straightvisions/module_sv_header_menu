<?php
	echo $_s->build_css(
		'.sv100_sv_navigation_container_sv100_sv_navigation_sv_header_menu_primary',
		array_merge(
			$module->get_setting('max_width')->get_css_data('max-width')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_navigation_sv_header_menu_primary',
		array_merge(
			$module->get_setting('bg_color')->get_css_data('background-color'),
			$module->get_setting('padding')->get_css_data('padding'),
			$module->get_setting('margin')->get_css_data(),
			$module->get_setting('border')->get_css_data()
		)
	);

	echo $_s->build_css(
		'.sv100_sv_navigation_sv_header_menu_primary > .menu li > a',
		array_merge(
			$module->get_setting('text_align')->get_css_data('justify-content')
		)
	);