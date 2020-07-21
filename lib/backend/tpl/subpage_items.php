<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
<div class="sv_setting_subpage">
	<h2><?php echo __('Level ', 'sv100').$i; ?></h2>
	<h3 class="divider"><?php _e( 'Spacing', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'level_'.$i.'_margin' )->form();
			echo $module->get_setting( 'level_'.$i.'_padding' )->form();
		?>
	</div>
	<h3 class="divider"><?php _e( 'Font', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'level_'.$i.'_font_family' )->form();
			echo $module->get_setting( 'level_'.$i.'_font_size' )->form();
			echo $module->get_setting( 'level_'.$i.'_line_height' )->form();
		?>
	</div>
	<h3 class="divider"><?php _e( 'Color', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'level_'.$i.'_text_color' )->form();
			echo $module->get_setting( 'level_'.$i.'_text_bg_color' )->form();
			echo $module->get_setting( 'level_'.$i.'_text_deco' )->form();
		?>
	</div>
	<h3 class="divider"><?php _e( 'Hover/Focus', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'level_'.$i.'_text_color_hover' )->form();
			echo $module->get_setting( 'level_'.$i.'_text_bg_color_hover' )->form();
			echo $module->get_setting( 'level_'.$i.'_text_deco_hover' )->form();
		?>
	</div>
	<h3 class="divider"><?php _e( 'Active', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'level_'.$i.'_text_color_active' )->form();
			echo $module->get_setting( 'level_'.$i.'_text_bg_color_active' )->form();
			echo $module->get_setting( 'level_'.$i.'_text_deco_active' )->form();
		?>
	</div>
	<h3><?php _e('Border', 'sv100'); ?></h3>
	<div class="sv_setting_flex">
		<?php echo $module->get_setting( 'level_'.$i.'_border' )->form(); ?>
	</div>
</div>
<?php } ?>