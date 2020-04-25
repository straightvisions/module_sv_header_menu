<?php
	$has_navigation	= (
		$script->get_parent()->get_module( 'sv_navigation' )
		&& $script->get_parent()->get_module( 'sv_navigation' )
			->has_items( $script->get_parent()->get_module_name() . '_primary' )
	) ? true : false;

	if($has_navigation) {
		// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
		// This reduces the lines of code for the needed setting values.
		foreach ($script->get_parent()->get_settings() as $setting) {
			${$setting->get_ID()} = $setting->get_data();
		}

		require_once($script->get_parent()->get_path('lib/frontend/css/config/toggle.php'));
		require_once($script->get_parent()->get_path('lib/frontend/css/config/general.php'));


		$level = array(
			1 => '.sv100_sv_navigation_sv_header_menu_primary > ul',
			2 => '.sv100_sv_navigation_sv_header_menu_primary > ul > li > ul',
			3 => '.sv100_sv_navigation_sv_header_menu_primary > ul > li > ul > li > ul',
		);
		$i = 1;
		while ($i <= 3) {
			require($script->get_parent()->get_path('lib/frontend/css/config/items.php'));
			$i++;
		}

	}