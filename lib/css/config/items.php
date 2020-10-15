<?php
	echo $_s->build_css(
		$level[$i].' > li > a',
		array_merge(
			$module->get_setting('level_'.$i.'_font_family')->get_css_data('font-family'),
			$module->get_setting('level_'.$i.'_font_size')->get_css_data('font-size','','px'),
			$module->get_setting('level_'.$i.'_line_height')->get_css_data('line-height'),
			$module->get_setting('level_'.$i.'_text_color')->get_css_data(),
			$module->get_setting('level_'.$i.'_text_bg_color')->get_css_data('background-color'),
			$module->get_setting('level_'.$i.'_padding')->get_css_data('padding'),
			$module->get_setting('level_'.$i.'_margin')->get_css_data(),
			$module->get_setting('border')->get_css_data()
		)
	);

	echo $_s->build_css(
		$level[$i].' > li.dropdown > a > .item-title::after',
		array_merge(
			$module->get_setting('level_'.$i.'_text_color')->get_css_data('background-color')
		)
	);

	// Hover
	echo $_s->build_css(
		$level[$i].' > li:hover > a, '.$level[$i].' > li:focus > a',
		array_merge(
			$module->get_setting('level_'.$i.'_text_color_hover')->get_css_data(),
			$module->get_setting('level_'.$i.'_text_bg_color_hover')->get_css_data('background-color'),
			$module->get_setting('level_'.$i.'_margin')->get_css_data(),
			$module->get_setting('border')->get_css_data()
		)
	);

	// Active
	echo $_s->build_css(
		$level[$i].' > li.open > a, '.$level[$i].' > li.active > a, '.$level[$i].' > li.current-page-ancestor > a',
		array_merge(
			$module->get_setting('level_'.$i.'_text_color_active')->get_css_data(),
			$module->get_setting('level_'.$i.'_text_bg_color_active')->get_css_data('background-color'),
			$module->get_setting('level_'.$i.'_margin')->get_css_data(),
			$module->get_setting('border')->get_css_data()
		)
	);

	// Text Decoration
	$properties			= array();

	$value				= $module->get_setting('level_'.$i.'_text_deco')->get_data();
	if($value){
		$imploded		= false;
		foreach($value as $breakpoint => $val) {
			if($val != 'none'){
				$imploded['width'][$breakpoint] = '100%';
				$imploded['border-bottom'][$breakpoint] = '1px solid rgba('.$module->get_setting('level_'.$i.'_text_color')->get_data()[$breakpoint].')';

			}
		}

		if($imploded) {
			$properties['width'] = $_s->prepare_css_property_responsive($imploded['width'], '', '');
			$properties['border-bottom'] = $_s->prepare_css_property_responsive($imploded['border-bottom'], '', '');

			echo $_s->build_css(
				$level[$i].' > li > a > .item-title::before',
				$properties
			);
		}
	}

	// Text Decoration Hover
	// @todo doubled code
	$properties			= array();

	$value				= $module->get_setting('level_'.$i.'_text_deco_hover')->get_data();
	if($value){
		$imploded		= false;
		foreach($value as $breakpoint => $val) {
			if($val != 'none'){
				$imploded['width'][$breakpoint] = '100%';
				$imploded['border-bottom'][$breakpoint] = '1px solid rgba('.$module->get_setting('level_'.$i.'_text_color_hover')->get_data()[$breakpoint].')';
				$imploded['transition'][$breakpoint] = 'width .25s ease-in-out';
			}
		}

		if($imploded) {
			$properties['width'] = $_s->prepare_css_property_responsive($imploded['width'], '', '');
			$properties['border-bottom'] = $_s->prepare_css_property_responsive($imploded['border-bottom'], '', '');
			$properties['transition'] = $_s->prepare_css_property_responsive($imploded['transition'], '', '');

			echo $_s->build_css(
				$level[$i].' > li:hover > a > .item-title::before',
				$properties
			);
		}
	}

	// Text Decoration Active
	// @todo doubled code
	$properties			= array();

	$value				= $module->get_setting('level_'.$i.'_text_deco_active')->get_data();
	if($value){
		$imploded		= false;
		foreach($value as $breakpoint => $val) {
			if($val != 'none'){
				$imploded['width'][$breakpoint] = '100%';
				$imploded['border-bottom'][$breakpoint] = '1px solid rgba('.$module->get_setting('level_'.$i.'_text_color_active')->get_data()[$breakpoint].')';
				$imploded['transition'][$breakpoint] = 'width .25s ease-in-out';
			}
		}

		if($imploded) {
			$properties['width'] = $_s->prepare_css_property_responsive($imploded['width'], '', '');
			$properties['border-bottom'] = $_s->prepare_css_property_responsive($imploded['border-bottom'], '', '');
			$properties['transition'] = $_s->prepare_css_property_responsive($imploded['transition'], '', '');

			echo $_s->build_css(
				$level[$i].' > li.active > a > .item-title::before',
				$properties
			);
		}
	}

