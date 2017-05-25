<?php 	

/*
@package dev theme
==================================
		Admin Enqueue Function
==================================

 */

function dev_load_admin_scripts( $hook ){

	if ('toplevel_page_dev_admin' != $hook) {return;}

	wp_register_style( 'dev_admin', get_template_directory_uri() .'/assets/css/admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'dev_admin' );

	wp_enqueue_media();

	wp_register_script( 'dev_admin_scripts', get_template_directory_uri() .'/assets/js/script.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'dev_admin_scripts' );
}

add_action( 'admin_enqueue_scripts', 'dev_load_admin_scripts');

