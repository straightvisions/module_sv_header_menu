<?php
	namespace sv100;

	class sv_header_menu extends init {
		public function init() {
			$this->set_module_title( __( 'SV Header Menu', 'sv100' ) )
				->set_module_desc( __( 'Menu Header Settings', 'sv100' ) )
				->register_navs()
				//->set_css_cache_active() // CSS cache deactivated due to use of metaboxes in this module
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(2200)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>')
				->get_root()
				->add_section( $this );

			add_action('init', function(){
				$this->load_settings()->add_metaboxes();
			});
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
				->set_default_value(array(
					'top' => '10px',
					'right' => '0',
					'bottom' => '10px',
					'left' => '0',
				))
				->load_type('margin');

			$this->get_setting('padding')
				->set_title(__('Padding', 'sv100'))
				->set_is_responsive(true)
				->load_type('margin');

			// Background
			$this->get_setting( 'bg_color' )
				->set_title( __( 'Background Color', 'sv100' ) )
				->set_default_value( '255,255,255,100' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'text_align' )
				->set_title( __( 'Text Align', 'sv100' ) )
				->set_options( array(
					''				=> __('choose...','sv100'),
					'flex-start'				=> __('left','sv100'),
					'center'					=> __('center','sv100'),
					'flex-end'					=> __('right','sv100')
				) )
				->set_default_value('center')
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'max_width' )
				->set_title( __( 'Max Width', 'sv100' ) )
				->set_description( __( 'Set the max width of the header menu bar.', 'sv100' ) )
				->set_default_value( '100%' )
				->set_is_responsive(true)
				->load_type( 'text' );

			// Border
			$this->get_setting( 'border' )
				->set_title( __( 'Border', 'sv100' ) )
				->set_description( __( 'Border', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'border' );

			$this->load_settings_toggle()->load_settings_items();

			return $this;
		}
		protected function load_settings_toggle(): sv_header_menu{
			$breakpoints = $this->get_breakpoints();

			$defaults_toggle = $breakpoints;
			foreach($defaults_toggle as $key => &$value){
				$value = true;
				if($key === 'desktop'){
					$value = false;
				}
			}

			$this->get_setting( 'toggle_active' )
				->set_title( __( 'Active', 'sv100' ) )
				->set_description( __( 'Show Menu Toggle for mobile Menu', 'sv100' ) )
				->set_default_value( $defaults_toggle )
				->set_is_responsive(true)
				->load_type( 'checkbox' );

			$this->get_setting( 'toggle_size' )
				->set_title( __( 'Size', 'sv100' ) )
				->set_description( __( 'Size in pixel.', 'sv100' ) )
				->set_min( '0' )
				->set_default_value( '18' )
				->set_is_responsive(true)
				->load_type( 'number' );

			$this->get_setting( 'toggle_menu_style' )
				->set_title( __( 'Menu Style', 'sv100' ) )
				->set_description( __( 'Change Style of the Menu', 'sv100' ) )
				->set_options( array(
					'hover'						=> 'Hover over Content',
					'slide'						=> 'Slide and move Content from right to left',
					'slide_left_to_right'		=> 'Slide and move Content from left to right'
				) )
				->set_default_value( 'hover' )
				->load_type( 'select' );

			$this->get_setting( 'toggle_closed' )
				->set_title( __( 'Icon Menu', 'sv100' ) )
				->set_description( __( 'Here you can post the SVG embed code.', 'sv100' ) )
				->set_default_value( '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>' )
				->set_is_responsive(true)
				->load_type( 'textarea' );

			$this->get_setting( 'toggle_open' )
				->set_title( __( 'Icon Menu Close', 'sv100' ) )
				->set_description( __( 'Here you can post the SVG embed code.', 'sv100' ) )
				->set_default_value( '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>' )
				->set_is_responsive(true)
				->load_type( 'textarea' );

			$this->get_setting( 'toggle_closed_color' )
				->set_title( __( 'Color (Closed)', 'sv100' ) )
				->set_default_value( '30, 30, 30, 1' )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'toggle_open_color' )
				->set_title( __( 'Color (Open)', 'sv100' ) )
				->set_default_value( '30, 30, 30, 1' )
				->set_is_responsive(true)
				->load_type( 'color' );
			
			$this->get_setting('toggle_margin')
				 ->set_title(__('Margin', 'sv100'))
				 ->set_is_responsive(true)
				 ->set_default_value(array(
					 'top' => '10px',
					 'right' => '0',
					 'bottom' => '10px',
					 'left' => '0',
				 ))
				 ->load_type('margin');

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
						'top'		=> '10px',
						'right'		=> '10px',
						'bottom'	=> '10px',
						'left'		=> '10px'
					))
					->load_type('margin');

				// Item - Fonts & Colors
				$this->get_setting( 'level_'.$i.'_font_family' )
					->set_title( __( 'Font Family', 'sv100' ) )
					->set_description( __( 'Choose a font for your text.', 'sv100' ) )
					->set_options( $this->get_module( 'sv_webfontloader' ) ? $this->get_module( 'sv_webfontloader' )->get_font_options() : array('' => __('Please activate module SV Webfontloader for this Feature.', 'sv100')) )
					->set_is_responsive(true)
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
					->set_default_value( $this->get_module( 'sv_common' ) ? $this->get_module( 'sv_common' )->get_setting('text_color')->get_data() : false )
					->set_is_responsive(true)
					->load_type( 'color' );

				$this->get_setting( 'level_'.$i.'_text_bg_color' )
					->set_title( __( 'Background Color', 'sv100' ) )
					->set_default_value( ($i === 1) ? '0,0,0,0' : '255,255,255,1' )
					->set_is_responsive(true)
					->load_type( 'color' );

				$this->get_setting( 'level_'.$i.'_text_deco' )
					->set_title( __( 'Text Decoration', 'sv100' ) )
					->set_default_value( $this->get_module( 'sv_common' ) ? $this->get_module( 'sv_common' )->get_setting('text_deco_link')->get_data() : false )
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
					->set_default_value( $this->get_module( 'sv_common' ) ? $this->get_module( 'sv_common' )->get_setting('text_color_link_hover')->get_data() : false )
					->set_is_responsive(true)
					->load_type( 'color' );

				$this->get_setting( 'level_'.$i.'_text_bg_color_hover' )
					->set_title( __( 'Background Color', 'sv100' ) )
					->set_default_value( '255,255,255,1' )
					->set_is_responsive(true)
					->load_type( 'color' );

				$this->get_setting( 'level_'.$i.'_text_deco_hover' )
					->set_title( __( 'Text Decoration', 'sv100' ) )
					->set_default_value( $this->get_module( 'sv_common' ) ? $this->get_module( 'sv_common' )->get_setting('text_deco_link_hover')->get_data() : false )
					->set_is_responsive(true)
					->set_options( array(
						'none'			=> __( 'None', 'sv100' ),
						'underline'		=> __( 'Underline', 'sv100' ),
						'line-through'	=> __( 'Line Through', 'sv100' ),
						'overline'		=> __( 'Overline', 'sv100' ),
					) )
					->load_type( 'select' );

					// Item - Fonts & Colors (Active)
				$this->get_setting( 'level_'.$i.'_text_color_active' )
					->set_title( __( 'Text Color', 'sv100' ) )
					->set_default_value( $this->get_module( 'sv_common' ) ? $this->get_module( 'sv_common' )->get_setting('text_color_link_active')->get_data() : false )
					->set_is_responsive(true)
					->load_type( 'color' );

				$this->get_setting( 'level_'.$i.'_text_bg_color_active' )
					->set_title( __( 'Background Color', 'sv100' ) )
					->set_default_value( '255,255,255,1' )
					->set_is_responsive(true)
					->load_type( 'color' );

				$this->get_setting( 'level_'.$i.'_text_deco_active' )
					->set_title( __( 'Text Decoration', 'sv100' ) )
					->set_default_value( $this->get_module( 'sv_common' ) ? $this->get_module( 'sv_common' )->get_setting('text_deco_link_active')->get_data() : false )
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
					->set_is_responsive(true)
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
			parent::register_scripts();

			$this->get_script('config')
				->set_path('lib/css/config/init.php')
				->set_inline(true);

			$this->get_script('common')
				->set_path('lib/css/common/common.css')
				->set_inline(true);

			// Register Styles
			$this->get_script( 'toggle' )
				->set_path( 'lib/css/common/toggle.css' )
				->set_inline( true );

			$this->get_script( 'items_level_1' )
				->set_path( 'lib/css/common/items_level_1.css' )
				->set_inline( true );

			$this->get_script( 'items_level_2' )
				->set_path( 'lib/css/common/items_level_2.css' )
				->set_inline( true );

			$this->get_script( 'items_level_3' )
				->set_path( 'lib/css/common/items_level_3.css' )
				->set_inline( true );

			$this->get_script( 'toggle_style_slide_right_to_left' )
				->set_path( 'lib/css/common/toggle_style_slide_right_to_left.css' );

			$this->get_script( 'toggle_style_slide_left_to_right' )
				->set_path( 'lib/css/common/toggle_style_slide_left_to_right.css' );

			// Register Scripts
			$this->get_script( 'navigation_js' )
				->set_path( 'lib/js/frontend/init.js' )
				->set_type( 'js' );

			add_filter( 'rocket_delay_js_exclusions', function ( $excluded_files = array() ) {
				$excluded_files[] = '/lib/js/frontend/init.js';

				return $excluded_files;
			} );

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
			if (!$this->get_module('sv_navigation') || !has_nav_menu( $this->get_module('sv_navigation')->get_prefix($this->get_module_name() . '_primary') ) ) {
				return '';
			}

			if(!is_admin()){
				$this->load_settings()->register_scripts();

				foreach($this->get_scripts() as $script){
					// load slide right to left only when active
					if($script->get_ID() == 'toggle_style_slide_right_to_left' && $this->get_setting( 'toggle_menu_style' )->get_data() != 'slide'){
						continue;
					}
					// load slide left to right only when active
					if($script->get_ID() == 'toggle_style_slide_left_to_right' && $this->get_setting( 'toggle_menu_style' )->get_data() != 'slide_left_to_right'){
						continue;
					}
					// load styles
					$script->set_is_enqueued();
				}
			}

			ob_start();
			require_once ($this->get_path('lib/tpl/frontend/default.php' ));
			$output									= ob_get_clean();

			return $output;
		}
		private function add_metaboxes(): sv_header_menu{
			$this->metaboxes			= $this->get_root()->get_module('sv_metabox');

			$this->metaboxes->get_setting( $this->get_prefix('active') )
				->set_title( __('Show Primary Menu', 'sv100') )
				->set_description( __('Override Default Settings', 'sv100') )
				->load_type( 'select' )
				->set_options(array(
					''			=> __('Inherit', 'sv100'),
					'0'			=> __('Hidden', 'sv100'),
					'1'			=> __('Show', 'sv100'),
				));

			$this->metaboxes->get_setting( $this->get_prefix('header_menu_top_level_color') )
				->set_title( __('Header Menu Top Level Color', 'sv100') )
				->load_type( 'color' );

			$this->metaboxes->get_setting( $this->get_prefix('header_menu_top_level_background_color') )
				->set_title( __('Header Menu Top Level Background Color', 'sv100') )
				->load_type( 'color' );

			return $this;
		}
		public function get_header_menu_color(string $field): string{
			global $post;

			$data		= '';

			if ( $this->get_module('sv_header_content')->has_color_override() ) {
				$data	= $this->metaboxes->get_data( $post->ID, $this->get_prefix($field) );
				$data	= $this->get_setting( $field )->get_rgb( $data );
			}

			return $data;
		}
	}