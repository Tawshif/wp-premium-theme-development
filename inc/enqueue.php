<?php 	

/*
@package dev theme
==================================
		Admin Enqueue Function
==================================

 */

function dev_load_admin_scripts( $hook ){
	wp_register_style( 'dev_admin', get_template_directory_uri().'/assets/css/admin.css', array(), '1.0.0', 'all' );

	wp_enqueue_style( 'dev_admin' );
}

add_action( 'admin_enqueue_scripts', 'dev_load_admin_scripts');