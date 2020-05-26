<?php
	$toggle_active		= $script->get_parent()->get_setting('toggle_active')->get_data();

	if(empty($toggle_active) === false) {
		// closed setup ------------------------------------------------------------------------------------------------
		$properties = array();

		$toggle_position = array_map(function ($val) {
			return $val ? 'absolute' : 'initial';
		}, $toggle_active);

		$toggle_visibility = array_map(function ($val) {
			return $val ? 'hidden' : 'visible';
		}, $toggle_active);

		$toggle_left = array_map(function ($val) {
			return $val ? '-100%' : '0';
		}, $toggle_active);


		$properties['position'] 	= $setting->prepare_css_property_responsive($toggle_position, '', '');
		$properties['visibility'] 	= $setting->prepare_css_property_responsive($toggle_visibility, '', '');
		$properties['left'] 		= $setting->prepare_css_property_responsive($toggle_left, '', '');

		echo $setting->build_css(
			'.sv100_sv_navigation_sv_header_menu_primary',
			$properties
		);
		// open setup --------------------------------------------------------------------------------------------------
		$properties = array();


		$toggle_visibility = array_map(function ($val) {
			return $val ? 'visible' : '';
		}, $toggle_active);

		$toggle_left = array_map(function ($val) {
			return $val ? '0' : '';
		}, $toggle_active);

		$properties['visibility'] 	= $setting->prepare_css_property_responsive($toggle_visibility, '', '');
		$properties['left'] 		= $setting->prepare_css_property_responsive($toggle_left, '', '');

		echo $setting->build_css(
			'.sv100_sv_header_open .sv100_sv_navigation_sv_header_menu_primary',
			$properties
		);
		// responsive item flow
		$properties = array();

		$flex_direction = array_map(function ($val) {
			return $val ? 'column' : 'row';
		}, $toggle_active);

		$properties['flex-direction'] = $setting->prepare_css_property_responsive($flex_direction, '', '');

		echo $setting->build_css(
			'.sv100_sv_navigation_sv_header_menu_primary > ul',
			$properties
		);


		// maybe show toggle
		$properties						= array();

		$toggle = array_map(function ($val) {
			return $val ? 'block' : 'none';
		}, $toggle_active);

		$properties['display']	= $setting->prepare_css_property_responsive($toggle,'','');
		$properties['width']	= $setting->prepare_css_property_responsive($toggle_size,'','px');
		$properties['height']	= $setting->prepare_css_property_responsive($toggle_size,'','px');

		echo $setting->build_css(
			'.sv100_sv_navigation_sv_header_menu_primary_mobile_menu_toggle',
			$properties
		);

		echo $_s->build_css(
			'.sv100_sv_navigation_mobile_menu_toggle::before',
			array_merge(
				$script->get_parent()->get_setting('toggle_closed')->get_css_data('-webkit-mask-image','url(\'data:image/svg+xml;utf8,','\')'),
				$script->get_parent()->get_setting('toggle_closed_color')->get_css_data('background-color')
			)
		);

		echo $_s->build_css(
			'.sv100_sv_header button.sv100_sv_navigation_mobile_menu_toggle.open::before',
			array_merge(
				$script->get_parent()->get_setting('toggle_open')->get_css_data('-webkit-mask-image','url(\'data:image/svg+xml;utf8,','\')'),
				$script->get_parent()->get_setting('toggle_open_color')->get_css_data('background-color')
			)
		);

		echo $_s->build_css(
			'.sv100_sv_header button.sv100_sv_navigation_mobile_menu_toggle',
			$script->get_parent()->get_setting('toggle_margin')->get_css_data()
		);

	}