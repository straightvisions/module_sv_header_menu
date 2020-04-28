<?php
	$toggle_active		= $script->get_parent()->get_setting('toggle_active')->get_data();

	if($toggle_active) {
		// maybe hide desktop menu
		$properties = array();

		$toggle = array_map(function ($val) {
			return $val ? 'none' : 'block';
		}, $toggle_active);

		$properties['display'] = $setting->prepare_css_property_responsive($toggle, '', '');

		echo $setting->build_css(
			'.sv100_sv_navigation_sv_header_menu_primary',
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
			$script->get_parent()->get_setting('margin')->get_css_data()
		);

	}