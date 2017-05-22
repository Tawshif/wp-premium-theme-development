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
	
	add_submenu_page( 'dev_admin', 'Dev Theme Options', 'Setting', 'manage_options', 'dev_admin_setting', 'dev_theme_settings_page' );

	add_submenu_page( 'dev_admin', 'Dev CSS Options', 'Custom CSS', 'manage_options', 'dev_admin_css', 'dev_theme_settings_page' );

}

add_action( 'admin_menu', 'dev_add_admin_page' );

function dev_create_page()
{
	echo "<h1>Dev Theme Options</h1> ";
}

function dev_theme_settings_page()
{
	echo "<h1>Dev Theme Settings</h1> ";
}