<?php

		echo $_s->build_css(
			'.sv100_sv_navigation_container_sv100_sv_navigation_sv_header_menu_primary',
			array_merge(
				$script->get_parent()->get_setting('max_width')->get_css_data('max-width')
			)
		);

	echo $_s->build_css(
		'.sv100_sv_navigation_sv_header_menu_primary',
		array_merge(
			$script->get_parent()->get_setting('bg_color')->get_css_data('background-color'),
			$script->get_parent()->get_setting('padding')->get_css_data('padding'),
			$script->get_parent()->get_setting('margin')->get_css_data(),
			$script->get_parent()->get_setting('border')->get_css_data()
		)
	);

	echo $_s->build_css(
		'.sv100_sv_navigation_sv_header_menu_primary > .menu',
		array_merge(
			$script->get_parent()->get_setting('text_align')->get_css_data('align-items')
		)
	);