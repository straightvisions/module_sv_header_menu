<?php
	$properties			= array();

	// Margin
	$key				= 'level_'.$i.'_margin';
	$value				= $$key;

	if($value) {
		$imploded		= false;
		foreach($value as $breakpoint => $val) {
			$top = (isset($val['top']) && strlen($val['top']) > 0) ? $val['top'] : 0;
			$right = (isset($val['right']) && strlen($val['right']) > 0) ? $val['right'] : 0;
			$bottom = (isset($val['bottom']) && strlen($val['bottom']) > 0) ? $val['bottom'] : 0;
			$left = (isset($val['left']) && strlen($val['left']) > 0) ? $val['left'] : 0;

			if($top+$right+$bottom+$left!==0) {
				$imploded[$breakpoint] = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
			}
		}
		if($imploded) {
			$properties['margin'] = $setting->prepare_css_property_responsive($imploded, '', '');
		}
	}

	// Padding
	// @todo: same as margin, refactor to avoid doubled code
	$key				= 'level_'.$i.'_padding';
	$value			= $$key;

	if($value) {
		$imploded		= false;
		foreach($value as $breakpoint => $val) {
			$top = (isset($val['top']) && strlen($val['top']) > 0) ? $val['top'] : 0;
			$right = (isset($val['right']) && strlen($val['right']) > 0) ? $val['right'] : 0;
			$bottom = (isset($val['bottom']) && strlen($val['bottom']) > 0) ? $val['bottom'] : 0;
			$left = (isset($val['left']) && strlen($val['left']) > 0) ? $val['left'] : 0;

			if($top+$right+$bottom+$left!==0) {
				$imploded[$breakpoint] = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
			}
		}
		if($imploded) {
			$properties['padding'] = $setting->prepare_css_property_responsive($imploded, '', '');
		}
	}

	// Font
	// @todo: double code
	$key				= 'level_'.$i.'_font_family';
	$value				= $$key;

	$font_family				= false;
	$font_weight				= false;
	foreach($value as $breakpoint => $val) {
		if($val) {
			$f							= $setting->get_parent()->get_module('sv_webfontloader')->get_font_by_label($val);
			$font_family[$breakpoint]	= $f['family'];
			$font_weight[$breakpoint]	= $f['weight'];
		}else{
			$font_family[$breakpoint]	= false;
			$font_weight[$breakpoint]	= false;
		}
	}
	if($font_family && (count(array_unique($font_family)) > 1 || array_unique($font_family)['mobile'] !== false)){
		$properties['font-family']	= $setting->prepare_css_property_responsive($font_family,'',', sans-serif;');
		$properties['font-weight']	= $setting->prepare_css_property_responsive($font_weight,'','');
	}

	$key				= 'level_'.$i.'_font_size';
	$value				= $$key;
	if($value) {
		$properties['font-size']	= $setting->prepare_css_property_responsive($value,'','px');
	}

	$key				= 'level_'.$i.'_line_height';
	$value				= $$key;
	if($value) {
		$properties['line-height']	= $setting->prepare_css_property_responsive($value);
	}

	$key				= 'level_'.$i.'_text_align';
	$value				= $$key;
	if($value) {
		$properties['text-align']	= $setting->prepare_css_property_responsive($value);
	}


	$key				= 'level_'.$i.'_text_color';
	$value				= $$key;
	if($value){
		$properties['color']		= $setting->prepare_css_property_responsive($value,'rgba(',')');
	}

	$key				= 'level_'.$i.'_text_bg_color';
	$value				= $$key;
	if($value){
		$properties['background-color']		= $setting->prepare_css_property_responsive($value,'rgba(',')');
	}

	echo $setting->build_css(
		$level[$i].' > li > a',
		$properties
	);

	// Text Decoration
	$properties			= array();

	$key				= 'level_'.$i.'_text_deco';
	$value				= $$key;
	if($value){
		$imploded		= false;
		foreach($value as $breakpoint => $val) {
			if($val != 'none'){
				$imploded['width'][$breakpoint] = '100%';
				$imploded['border-bottom'][$breakpoint] = '1px solid #FFF';

			}
		}

		if($imploded) {
			$properties['width'] = $setting->prepare_css_property_responsive($imploded['width'], '', '');
			$properties['border-bottom'] = $setting->prepare_css_property_responsive($imploded['border-bottom'], '', '');

			echo $setting->build_css(
				$level[$i].' > li > a > .item-title::before',
				$properties
			);
		}
	}

	// Hover/Focus
	$properties			= array();

	$key				= 'level_'.$i.'_text_color_hover';
	$value				= $$key;
	if($value){
		$properties['color']		= $setting->prepare_css_property_responsive($value,'rgba(',')');
	}

	$key				= 'level_'.$i.'_text_bg_color_hover';
	$value				= $$key;
	if($value){
		$properties['background-color']		= $setting->prepare_css_property_responsive($value,'rgba(',')');
	}

	$key				= 'level_'.$i.'_text_deco_hover';
	$value				= $$key;
	if($value){
		$properties['text-decoration']		= $setting->prepare_css_property_responsive($value,'','');
	}

	echo $setting->build_css(
		$level[$i].' > li:hover > a, '.$level[$i].' > li:focus > a',
		$properties
	);

	// Text Decoration
	// @todo doubled code
	$properties			= array();

	$key				= 'level_'.$i.'_text_deco_hover';
	$value				= $$key;
	if($value){
		$imploded		= false;
		foreach($value as $breakpoint => $val) {
			if($val != 'none'){
				$imploded['width'][$breakpoint] = '100%';
				$imploded['border-bottom'][$breakpoint] = '1px solid #FFF';
				$imploded['transition'][$breakpoint] = 'width .25s ease-in-out';
			}
		}

		if($imploded) {
			$properties['width'] = $setting->prepare_css_property_responsive($imploded['width'], '', '');
			$properties['border-bottom'] = $setting->prepare_css_property_responsive($imploded['border-bottom'], '', '');
			$properties['transition'] = $setting->prepare_css_property_responsive($imploded['transition'], '', '');

			echo $setting->build_css(
				$level[$i].' > li:hover > a > .item-title::before',
				$properties
			);
		}
	}