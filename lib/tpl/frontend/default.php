<?php
	if( $this->get_metabox_data('active') == 1 ){
		echo $this->get_root()->get_module( 'sv_navigation' )
			? $this->get_root()->get_module( 'sv_navigation' )->load( array(
				'location' 		=> $this->get_module_name() . '_primary'
			) )
			: '';
	}