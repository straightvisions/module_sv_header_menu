<?php
	namespace sv100;

	/**
	 * @version         4.150
	 * @author			straightvisions GmbH
	 * @package			sv100
	 * @copyright		2019 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.000
	 * @license			See license.txt or https://straightvisions.com
	 */

	class sv_header_menu extends init {
		public function init() {
			$this->set_module_title( __( 'SV Header Menu', 'sv100' ) )
				->set_module_desc( __( 'Menu Header Settings', 'sv100' ) )
				->load_settings()
				->load_settings_toggle()
				->load_settings_items()
				->register_scripts()
				->register_navs()
				->set_section_title( __( 'Header Menu', 'sv100' ) )
				->set_section_desc( $this->get_module_desc() )
				->set_section_type( 'settings' )
				->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
				->set_section_order(22)
				->get_root()
				->add_section( $this );
		}

		protected function load_settings(): sv_header_menu {
			// active
			$this->get_setting( 'active' )
				->set_title( __( 'Active', 'sv100' ) )
				->set_default_value( 1 )
				->load_type( 'checkbox' );

			// Spacing
			$this->get_setting('margin')
				->set_title(__('Margin', 'sv100'))
				->set_is_responsive(true)
				->load_type('margin');

			$this->get_setting('padding')
				->set_title(__('Padding', 'sv100'))
				->set_is_responsive(true)
				->load_type('margin');

			// Background
			$this->get_setting( 'bg_color' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '255,255,255,0' )
				->load_type( 'color' );
/* @todo: create a combined background setting type like margin or border
			$this->get_setting( 'bg_image' )
				->set_title( __( 'Background Image', 'sv100' ) )
				->load_type( 'upload' );

			$this->get_setting( 'bg_media_size' )
				->set_title( __( 'Background Media Size', 'sv100' ) )
				->set_default_value( 'medium_large' )
				->set_options( array_combine( get_intermediate_image_sizes(), get_intermediate_image_sizes() ) )
				->load_type( 'select' );

			$this->get_setting( 'bg_position' )
				->set_title( __( 'Background Position', 'sv100' ) )
				->set_default_value( 'center top' )
				->set_placeholder( 'center top' )
				->load_type( 'text' );

			$this->get_setting( 'bg_size' )
				->set_title( __( 'Background Size', 'sv100' ) )
				->set_description( '<p>' . __( 'Background Size in Pixel', 'sv100' ) . '<br>
				 ' . __( 'If disabled Background Fit will take effect.', 'sv100' ) . '</p>
				 <p><strong>' . __( '0 = Disabled', 'sv100' ) . '</strong></p>' )
				->set_default_value( 0 )
				->set_placeholder( '0 ' )
				->set_min( 0 )
				->load_type( 'number' );

			$this->get_setting( 'bg_fit' )
				->set_title( __( 'Background Fit', 'sv100' ) )
				->set_description( __( 'Defines how the background image aspect ratio behaves.', 'sv100' ) )
				->set_default_value( 'cover' )
				->set_options( array(
					'cover' 	=> __( 'Cover', 'sv100' ),
					'contain' 	=> __( 'Contain', 'sv100' )
				) )
				->load_type( 'select' );

			$this->get_setting( 'bg_repeat' )
				->set_title( __( 'Background Repeat', 'sv100' ) )
				->set_default_value( 'no-repeat' )
				->set_options( array(
					'no-repeat' => __( 'No Repeat', 'sv100' ),
					'repeat' 	=> __( 'Repeat', 'sv100' ),
					'repeat-x' 	=> __( 'Repeat Horizontally', 'sv100' ),
					'repeat-y' 	=> __( 'Repeat Vertically', 'sv100' ),
					'space' 	=> __( 'Space', 'sv100' ),
					'round' 	=> __( 'Round', 'sv100' ),
					'initial' 	=> __( 'Initial', 'sv100' ),
					'inherit' 	=> __( 'Inherit', 'sv100' )
				) )
				->load_type( 'select' );

			$this->get_setting( 'bg_attachment' )
				->set_title( __( 'Background Attachment', 'sv100' ) )
				->set_default_value( 'fixed' )
				->set_options( array(
					'fixed' 	=> __( 'fixed', 'sv100' ),
					'scroll' 	=> __( 'scroll', 'sv100' ),
					'local' 	=> __( 'local', 'sv100' ),
					'initial' 	=> __( 'initial', 'sv100' ),
					'inherit' 	=> __( 'inherit', 'sv100' )
				) )
				->load_type( 'select' );
*/
			// Border
			$this->get_setting( 'border' )
				->set_title( __( 'Border', 'sv100' ) )
				->set_description( __( 'Border', 'sv100' ) )
				->load_type( 'border' );

			return $this;
		}
		protected function load_settings_toggle(): sv_header_menu{
			$this->get_setting( 'toggle_active' )
				->set_title( __( 'Active', 'sv100' ) )
				->set_description( __( 'Show Menu Toggle for mobile Menu', 'sv100' ) )
				->set_default_value( true )
				->set_is_responsive(true)
				->load_type( 'checkbox' );

			$this->get_setting( 'toggle_size' )
				->set_title( __( 'Size', 'sv100' ) )
				->set_description( __( 'Size in pixel.', 'sv100' ) )
				->set_min( '0' )
				->set_default_value( '18' )
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'toggle_closed' )
				->set_title( __( 'Icon (Closed)', 'sv100' ) )
				->set_description( __( 'Here you can post the SVG embed code.', 'sv100' ) )
				->set_default_value( '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>' )
				->load_type( 'textarea' );

			$this->get_setting( 'toggle_open' )
				->set_title( __( 'Icon (Open)', 'sv100' ) )
				->set_description( __( 'Here you can post the SVG embed code.', 'sv100' ) )
				->set_default_value( '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>' )
				->load_type( 'textarea' );

			$this->get_setting( 'toggle_closed_color' )
				->set_title( __( 'Color (Closed)', 'sv100' ) )
				->set_default_value( '#1e1e1e' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'toggle_open_color' )
				->set_title( __( 'Color (Open)', 'sv100' ) )
				->set_default_value( '#1e1e1e' )
				->set_is_responsive(true)
				->load_type( 'color' );

			return $this;
		}
		protected function load_settings_items(): sv_header_menu {
			$i = 1;
			while ($i <= 3) {
				// Item - Spacing
				$this->get_setting('level_'.$i.'_margin')
					->set_title(__('Margin', 'sv100'))
					->set_is_responsive(true)
					->load_type('margin');

				$this->get_setting('level_'.$i.'_padding')
					->set_title(__('Padding', 'sv100'))
					->set_is_responsive(true)
					->set_default_value(array(
						'mobile'		=> array(
							'top'		=> '10px',
							'right'		=> '10px',
							'bottom'	=> '10px',
							'left'		=> '10px'
						)
					))
					->load_type('margin');

				// Item - Fonts & Colors
				$this->get_setting( 'level_'.$i.'_font_family' )
					->set_title( __( 'Font Family', 'sv100' ) )
					->set_description( __( 'Choose a font for your text.', 'sv100' ) )
					->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
					->load_type( 'select' );

				$this->get_setting( 'level_'.$i.'_font_size' )
					->set_title( __( 'Font Size', 'sv100' ) )
					->set_description( __( 'Font Size in pixel.', 'sv100' ) )
					->set_default_value( 16 )
					->set_is_responsive(true)
					->load_type( 'number' );

				$this->get_setting( 'level_'.$i.'_line_height' )
					->set_title( __( 'Line Height', 'sv100' ) )
					->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
					->set_default_value( 1 )
					->set_is_responsive(true)
					->load_type( 'text' );

				$this->get_setting( 'level_'.$i.'_text_color' )
					->set_title( __( 'Text Color', 'sv100' ) )
					->set_default_value( '255,255,255,1' )
					->set_is_responsive(true)
					->load_type( 'color' );

				$this->get_setting( 'level_'.$i.'_text_bg_color' )
					->set_title( __( 'Background Color', 'sv100' ) )
					->set_default_value( '0,0,0,0' )
					->set_is_responsive(true)
					->load_type( 'color' );

				$this->get_setting( 'level_'.$i.'_text_deco' )
					->set_title( __( 'Text Decoration', 'sv100' ) )
					->set_default_value( 'underline' )
					->set_is_responsive(true)
					->set_options( array(
						'none'			=> __( 'None', 'sv100' ),
						'underline'		=> __( 'Underline', 'sv100' ),
						'line-through'	=> __( 'Line Through', 'sv100' ),
						'overline'		=> __( 'Overline', 'sv100' ),
					) )
					->load_type( 'select' );

				// Item - Fonts & Colors (Hover/Focus)
				$this->get_setting( 'level_'.$i.'_text_color_hover' )
					->set_title( __( 'Text Color', 'sv100' ) )
					->set_default_value( '31,31,31,1' )
					->set_is_responsive(true)
					->load_type( 'color' );

				$this->get_setting( 'level_'.$i.'_text_bg_color_hover' )
					->set_title( __( 'Background Color', 'sv100' ) )
					->set_default_value( '0,0,0,0' )
					->set_is_responsive(true)
					->load_type( 'color' );

				$this->get_setting( 'level_'.$i.'_text_deco_hover' )
					->set_title( __( 'Text Decoration', 'sv100' ) )
					->set_default_value( 'underline' )
					->set_is_responsive(true)
					->set_options( array(
						'none'			=> __( 'None', 'sv100' ),
						'underline'		=> __( 'Underline', 'sv100' ),
						'line-through'	=> __( 'Line Through', 'sv100' ),
						'overline'		=> __( 'Overline', 'sv100' ),
					) )
					->load_type( 'select' );

				// Item - Border
				$this->get_setting( 'level_'.$i.'_border' )
					->set_title( __( 'Border', 'sv100' ) )
					->set_description( __( 'Border', 'sv100' ) )
					->load_type( 'border' );

				// Item - Background
				$this->get_setting( 'level_'.$i.'_bg_color' )
					->set_title( __( 'Background Color', 'sv100' ) )
					->set_default_value( '255,255,255,0' )
					->load_type( 'color' );

				$i++;
			}

			return $this;
		}

		protected function register_scripts(): sv_header_menu {
			$this->get_script( 'common' )
				->set_path( 'lib/frontend/css/common.css' )
				->set_inline( true );

			$this->get_script( 'toggle' )
				->set_path( 'lib/frontend/css/toggle.css' )
				->set_inline( true );

			$this->get_script( 'items' )
				->set_path( 'lib/frontend/css/items.css' )
				->set_inline( true );

			$this->get_script( 'items_level_1' )
				->set_path( 'lib/frontend/css/items_level_1.css' )
				->set_inline( true );

			$this->get_script( 'config' )
				->set_path( 'lib/frontend/css/config.php' )
				->set_inline( true );

			$this->get_script( 'common_js' )
				->set_path( 'lib/frontend/js/navigation.js' )
				->set_type( 'js' )
				->set_deps( array(  'jquery' ) );


			return $this;
		}

		protected function register_navs(): sv_header_menu {
			if ( $this->get_module( 'sv_navigation' ) ) {
				$this->get_module( 'sv_navigation' )
					->create( $this )
					->set_desc( __( 'Primary menu', 'sv100' ) )
					->set_location( 'primary' )
					->load_nav();
			}

			return $this;
		}

		public function load( $settings = array() ): string {
			$settings								= shortcode_atts(
				array(
					'inline'						=> true,
					'template'                      => false,
				),
				$settings,
				$this->get_module_name()
			);

			ob_start();

			$this->get_script( 'common' )->set_inline( $settings['inline'] )->set_is_enqueued();
			$this->get_script( 'toggle' )->set_inline( $settings['inline'] )->set_is_enqueued();
			$this->get_script( 'items' )->set_inline( $settings['inline'] )->set_is_enqueued();
			$this->get_script( 'items_level_1' )->set_inline( $settings['inline'] )->set_is_enqueued();
			$this->get_script( 'config' )->set_inline( $settings['inline'] )->set_is_enqueued();

			require_once ($this->get_path('lib/frontend/tpl/default.php' ));

			$output							        = ob_get_contents();
			ob_end_clean();

			return $output;
		}
	}