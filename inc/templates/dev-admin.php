<h1>Dev Theme Options</h1>
<?php settings_errors(); ?>
<?php 
	$firstName = esc_attr( get_option( 'first_name'));
	$lastName = esc_attr( get_option( 'last_name'));
	$fullName = $firstName .' ' . $lastName;
	$description = esc_attr( get_option( 'user-description' ) );
 ?>

<div class="dev-sidebar-preview">
	<div class="dev-sidebar">
		<h1 class="dev-userName"><?php print $fullName; ?></h1>
		<h2 class="dev-description"><?php print $description ?></h2>
		<div class="icon-wraper">
			
		</div>
	</div>
</div>
<form action="options.php" method="post">
	<?php settings_fields('dev-settings-group' ); ?>
	<?php do_settings_sections('dev_admin' ); ?>
	<?php submit_button(); ?>
</form>
