<?php
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

		// maybe show toggle
		$properties						= array();

		$toggle = array_map(function ($val){
			return $val ? 'block' : 'none';
		}, $toggle_active);

		$properties['display']	= $setting->prepare_css_property_responsive($toggle,'','');
		$properties['width']	= $setting->prepare_css_property_responsive($toggle_size,'','px');
		$properties['height']	= $setting->prepare_css_property_responsive($toggle_size,'','px');

		echo $setting->build_css(
			'.sv100_sv_navigation_sv_header_menu_primary_mobile_menu_toggle',
			$properties
		);

		// closed icon
		$properties				= array();
		$properties['-webkit-mask-image']	= $setting->prepare_css_property($toggle_closed,'url(\'data:image/svg+xml;utf8,','\')');

		echo $setting->build_css(
			'.sv100_sv_navigation_mobile_menu_toggle::before',
			$properties
		);

		// closed color
		$properties				= array();
		$properties['background-color']	= $setting->prepare_css_property_responsive($toggle_closed_color,'rgba(',')');

		echo $setting->build_css(
			'.sv100_sv_navigation_mobile_menu_toggle::before',
			$properties
		);

		// open icon
		$properties				= array();
		$properties['-webkit-mask-image']	= $setting->prepare_css_property($toggle_open,'url(\'data:image/svg+xml;utf8,','\')');

		echo $setting->build_css(
			'.sv100_sv_header button.sv100_sv_navigation_mobile_menu_toggle.open::before',
			$properties
		);

		// open color
		$properties				= array();
		$properties['background-color']	= $setting->prepare_css_property_responsive($toggle_open_color,'rgba(',')');

		echo $setting->build_css(
			'.sv100_sv_header button.sv100_sv_navigation_mobile_menu_toggle.open::before',
			$properties
		);

		// Margin
		if($margin) {
			$properties				= array();
			$imploded		= false;
			foreach($margin as $breakpoint => $val) {
				$top = (isset($val['top']) && strlen($val['top']) > 0) ? $val['top'] : false;
				$right = (isset($val['right']) && strlen($val['right']) > 0) ? $val['right'] : false;
				$bottom = (isset($val['bottom']) && strlen($val['bottom']) > 0) ? $val['bottom'] : false;
				$left = (isset($val['left']) && strlen($val['left']) > 0) ? $val['left'] : false;

				if($top !== false || $right !== false || $bottom !== false || $left !== false) {
					$imploded[$breakpoint] = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
				}
			}
			if($imploded) {
				$properties['margin'] 			= $setting->prepare_css_property_responsive($imploded, '', '');
			}

			echo $setting->build_css(
				'.sv100_sv_header button.sv100_sv_navigation_mobile_menu_toggle',
				$properties
			);

		}
	}