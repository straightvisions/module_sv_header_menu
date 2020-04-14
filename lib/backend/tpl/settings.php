<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>
	<div class="sv_setting_subpages">
		<ul class="sv_setting_subpages_nav"></ul>
		<?php
			require_once( $module->get_path( 'lib/backend/tpl/subpage_general.php' ) );
			require_once( $module->get_path( 'lib/backend/tpl/subpage_toggle.php' ) );

			$i = 1;
			while ($i <= 3) {
				require( $module->get_path( 'lib/backend/tpl/subpage_items.php' ) );
				$i++;
			}
		?>
	</div>
<?php } ?>
