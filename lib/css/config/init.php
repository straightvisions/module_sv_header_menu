<?php
	require_once($module->get_path('lib/css/config/toggle.php'));
	require_once($module->get_path('lib/css/config/general.php'));


	$level = array(
		1 => '.sv100_sv_navigation_sv_header_menu_primary > ul',
		2 => '.sv100_sv_navigation_sv_header_menu_primary > ul > li > ul',
		3 => '.sv100_sv_navigation_sv_header_menu_primary > ul > li > ul > li > ul',
	);
	$i = 1;
	while ($i <= 3) {
		require($module->get_path('lib/css/config/items.php'));
		$i++;
	}