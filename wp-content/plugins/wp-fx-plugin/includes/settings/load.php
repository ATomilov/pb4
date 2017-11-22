<?php

add_action( 'admin_menu', 'wporg_custom_admin_menu' );

function wporg_custom_admin_menu() {
	add_options_page( 'Settings', 'Optionlift', 'manage_options', 'wp_options', 'wp_options_page', null, 99 );
}

function wp_options_page() {
	?>
	<div class="wrap">
		<h1>Optionlift WP Plugin settings</h1><br>
		<style>
			input:not([type="submit"]) {
				width: 25em;
			}
		</style>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'api-section' );
			do_settings_sections( 'api-section' );
			submit_button();
			?>
		</form>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'trading-section' );
			do_settings_sections( 'trading-section' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}

function display_theme_panel_fields() {
	// Api settings
	add_settings_section( 'api-section', "Api's Settings", null, 'api-section' );
	//olAddTextSettings( 'ol_static_url', 'Static URL', 'api-section' );
	//olAddTextSettings( 'ol_assets_url', 'Assets URL', 'api-section' );
	//olAddTextSettings( 'ol_api_url', 'Api URL', 'api-section' );
	//olAddTextSettings( 'ol_rates_url', 'Ticks (Rates) URL', 'api-section' );

	// Trading settings
	add_settings_section( 'trading-section', 'Trading settings', null, 'trading-section' );
	//olAddTextSettings( 'ol_trading_url', 'Trading url', 'trading-section' );
}

add_action( 'admin_init', 'display_theme_panel_fields' );
