<?php

	if( $this->get_setting( 'active' )->get_data() == 1 ){
		echo $this->get_root()->get_module( 'sv_navigation' )
			? $this->get_root()->get_module( 'sv_navigation' )->load( array(
				'location' 		=> $this->get_module_name() . '_primary'
			) )
			: '';
	}
