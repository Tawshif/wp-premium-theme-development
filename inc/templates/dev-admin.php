<h1>Dev Theme Options</h1>
<?php settings_errors(); ?>
<form action="options.php" method="post">
	<?php settings_fields('dev-settings-group' ); ?>
	<?php do_settings_sections('dev_admin' ); ?>
	<?php submit_button(); ?>
</form>
