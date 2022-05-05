<?php
	echo $_s->build_css(
		'.sv100_sv_navigation_sv_header_menu_primary',
		array_merge(
			$module->get_setting('max_width')->get_css_data('max-width'),
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

	// post color override
	$properties		= array();
	$header_menu_top_level_color 	= $module->get_header_menu_color('header_menu_top_level_color');
	if($header_menu_top_level_color) {
		$properties['color'] = $_s->prepare_css_property($header_menu_top_level_color, 'rgba(', ') !important');
	}
	if(count($properties) > 0){
		echo $_s->build_css(
			'body:not(.sv100_sv_header_open) .sv100_sv_navigation_sv_header_menu_primary ul > li > a',
			array_merge(
				$properties
			)
		);
	}

	$properties		= array();
	$header_menu_top_level_background_color 	= $module->get_header_menu_color('header_menu_top_level_background_color');
	if($header_menu_top_level_background_color) {
		$properties['background-color'] = $_s->prepare_css_property($header_menu_top_level_background_color, 'rgba(', ') !important');
	}
	if(count($properties) > 0){
		echo $_s->build_css(
			'body:not(.sv100_sv_header_open) .sv100_sv_header_wrapper',
			array_merge(
				$properties
			)
		);
	}
