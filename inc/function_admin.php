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
	register_setting( 'dev-settings-group', 'profile_picture' );
	register_setting( 'dev-settings-group', 'first_name' );
	register_setting( 'dev-settings-group', 'last_name' );
	register_setting( 'dev-settings-group', 'user-description' );
	register_setting( 'dev-settings-group', 'twitter_handler', 'dev_sanitize_twitter_handler' );
	register_setting( 'dev-settings-group', 'facebook_handler' );
	register_setting( 'dev-settings-group', 'gplus_handler' );

	add_settings_section( 'dev-sidebar-options', 'Sidebar Options', 'dev_sidebar_options', 'dev_admin' );
	
	add_settings_field( 'sidebar-profile-picture', 'Profile Picture', 'dev_sidebar_prifile', 'dev_admin', 'dev-sidebar-options' );
	add_settings_field( 'sidebar-name', 'First Name', 'dev_sidebar_name', 'dev_admin', 'dev-sidebar-options');
	add_settings_field( 'sidebar-description', 'Description', 'dev_sidebar_description', 'dev_admin', 'dev-sidebar-options');
	add_settings_field( 'sidebar-twitter', 'Twitter Handeler', 'dev_sidebar_twitter', 'dev_admin', 'dev-sidebar-options');
	add_settings_field( 'sidebar-facebook', 'Facebook handler', 'dev_sidebar_facebook', 'dev_admin', 'dev-sidebar-options');
	add_settings_field( 'sidebar-gplus', 'Google Plus handler', 'dev_sidebar_gplus', 'dev_admin', 'dev-sidebar-options');
}

function dev_sidebar_options(){
	echo "Customize your sidebar options";
}


function dev_sidebar_prifile(){
	$picture = esc_attr(get_option('profile_picture'));
	echo '<input type="button" name="" value="Upload Profile Picture" id="upload-button" class="button button-uploader"><input type="hidden" name="profile_picture" value="'.$picture.'"/>';
}

function dev_sidebar_name(){
	$firstName = esc_attr( get_option( 'first_name'));
	$lastName = esc_attr( get_option( 'last_name'));
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name"> <input type="text" name="last_name" value="'.$lastName.'" placeholder="last Name" />';	
}
function dev_sidebar_description() {
	$description = esc_attr( get_option( 'user-description' ) );
	echo '<textarea  name="user-description" value="'.$description.'" ></textarea>
	<p class="description">Write something about you</p>';
}
function dev_sidebar_twitter(){
	$twitterHandler = esc_attr( get_option( 'twitter_handler'));
	echo '<input type="text" name="twitter_handler" value="'.$twitterHandler.'" placeholder="Twitter"><p class="description">Input Twitter username without the @ character</p>';	
	
}
function dev_sidebar_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook" />';
}
function dev_sidebar_gplus() {
	$gplus = esc_attr( get_option( 'gplus_handler' ) );
	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+" />';
}

// Senitaization Settings

function dev_sanitize_twitter_handler($input){
	$output = sanitize_text_field($input);
	$output = str_replace('@', '', $output);
	return $output;	
}

function dev_create_page(){
	require_once (get_template_directory(). '/inc/templates/dev-admin.php');
}


function dev_theme_css(){
	echo "<h1>Dev Theme Css Settings</h1> ";
}