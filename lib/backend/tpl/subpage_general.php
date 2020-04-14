<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('General', 'sv100'); ?></h2>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'active' )->form();
			?>
		</div>
		<h3><?php _e('Spacing', 'sv100'); ?></h3>
		<div class="sv_setting_flex">
			<?php echo $module->get_setting( 'margin' )->form(); ?>
			<?php echo $module->get_setting( 'padding' )->form(); ?>
		</div>
		<h3><?php _e('Background', 'sv100'); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'bg_color' )->form();
				echo $module->get_setting( 'bg_image' )->form();
				echo $module->get_setting( 'bg_media_size' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'bg_position' )->form();
				echo $module->get_setting( 'bg_size' )->form();
				echo $module->get_setting( 'bg_fit' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'bg_repeat' )->form();
				echo $module->get_setting( 'bg_attachment' )->form();
			?>
		</div>
		<h3><?php _e('Border', 'sv100'); ?></h3>
		<div class="sv_setting_flex">
			<?php echo $module->get_setting( 'border' )->form(); ?>
		</div>
	</div>
<?php } ?>