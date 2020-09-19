<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('Toggle', 'sv100'); ?></h2>
		<div class="sv_setting_flex">
			<?php echo $module->get_setting( 'toggle_active' )->form(); ?>
			<?php echo $module->get_setting( 'toggle_size' )->form(); ?>
			<?php echo $module->get_setting( 'toggle_menu_style' )->form(); ?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'toggle_closed' )->form();
				echo $module->get_setting( 'toggle_open' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'toggle_closed_color' )->form();
				echo $module->get_setting( 'toggle_open_color' )->form();
			?>
		</div>

		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'toggle_margin' )->form();
			?>
		</div>
	</div>
<?php } ?>