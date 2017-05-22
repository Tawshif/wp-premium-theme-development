<?php 
/*
@package My Theme

===========================
	Admin Page
===========================
*/

function dev_add_admin_page(){

	// Generate Dev Admin page
	add_menu_page(' Dev Theme Options', 'DevTheme', 'manage_options', 'dev_admin', 'dev_create_page', get_template_directory_uri().'/assets/images/icon.png', 110 );

	// Generate Dev theme Admin subpages
	
	add_submenu_page( 'dev_admin', 'Dev Theme Options', 'General', 'manage_options', 'dev_admin', 'dev_create_page' );
	add_submenu_page( 'dev_admin', 'Dev CSS Options', 'Custom CSS', 'manage_options', 'dev_admin_css', 'dev_theme_css' );

	// Activate Custom Settings

	add_action( 'admin_init', 'dev_custom_settings');
}


add_action( 'admin_menu', 'dev_add_admin_page' );

function dev_custom_settings(){
	register_setting( 'dev-settings-group', 'first_name' );
	add_settings_section( 'dev-sidebar-options', 'Sidebar Options', 'dev_sidebar_options', 'dev_admin' );
	add_settings_field( 'sidebar-name', 'First Name', 'dev_sidebar_name', 'dev_admin', 'dev-sidebar-options');
}

function dev_sidebar_options(){
	echo "Customize your sidebar options";
}
function dev_sidebar_name(){
	$firstName = esc_attr( get_option( 'first_name'));
	echo '<input type="text" name="first_name" value="" placeholder="First Name">';	
}


function dev_create_page(){
	require_once (get_template_directory(). '/inc/templates/dev-admin.php');
}

function dev_theme_css(){
	echo "<h1>Dev Theme Css Settings</h1> ";
}