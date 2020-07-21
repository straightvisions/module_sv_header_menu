<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('General', 'sv100'); ?></h2>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'active' )->form();
				echo $module->get_setting( 'bg_color' )->form();
				echo $module->get_setting( 'text_align' )->form();
			?>
		</div>
		<h3><?php _e('Spacing', 'sv100'); ?></h3>
		<div class="sv_setting_flex">
			<?php echo $module->get_setting( 'margin' )->form(); ?>
			<?php echo $module->get_setting( 'padding' )->form(); ?>
		</div>
		<h3><?php _e('Border', 'sv100'); ?></h3>
		<div class="sv_setting_flex">
			<?php echo $module->get_setting( 'border' )->form(); ?>
		</div>
	</div>
<?php } ?>