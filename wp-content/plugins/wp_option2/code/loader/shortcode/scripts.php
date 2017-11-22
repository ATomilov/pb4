<!--[if lte IE 9]>
<script src="//static.optionlift.com/xdomain.js" data-slave="http://safe.crm.optionlift.com/xdomain/proxy.php"></script>
<script>
	xdomain.slaves({
		"http:<?php echo str_replace( '/api', '', $api_url ); ?>": "/xdomain/proxy.php",
		"https://<?php echo str_replace( '/api', '', $api_url ); ?>": "/xdomain/proxy.php",
		"http://rates.optionlift.com": "/xdomain/proxy.php",
		"https://rates.optionlift.com": "/xdomain/proxy.php",
		"http://sockets.optionlift.com": "/xdomain/proxy.php",
		"https://sockets.optionlift.com": "/xdomain/proxy.php"
	});
</script>
<![endif]-->

<!-- ––––– RequireJS ––––– -->
<script src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.1.17/require.min.js"></script>
<!-- ––––– End of RequireJS ––––– -->

<!-- ––––– Platform Init ––––– -->
<script type="text/javascript">
	(function(document, window, callbacks) {

		/* ––––– Init Platform ––––– */

		(window[callbacks] = window[callbacks] || []).push(function() {
			try {
				new BS.App({
					id: 1,
					containerId: "bs-frontend",
					staticUrl: STATIC_URL,
					assetsUrl: ASSETS_URL,
					apiUrl: API_URL,
					ticksUrl: TICKS_URL,
					settings: SETTINGS
				});
			} catch (e) {
				console.error(e);
			}
		});

		/* ––––– Insert Platform ––––– */

		var after = document.getElementsByTagName("script")[0];
		var script = document.createElement("script");
		var func = function() {
			after.parentNode.insertBefore(script, after);
		};

		var STATIC_URL = '<?php echo $static_url; ?>';
		var ASSETS_URL = '<?php echo $assets_url; ?>';
		var API_URL = '<?php echo $api_url; ?>';
		var TICKS_URL = '<?php echo $rates_url; ?>';

		var SETTINGS = {
			startUrl: '<?php echo $settings['start_url']; ?>',
			theme: '<?php echo $settings['theme']; ?>',
			logo: '<?php echo $settings['logo']; ?>',
			default_language: '<?php echo $settings['language']; ?>',
			direction: 'ltr',
			wire_details: '<?php echo json_encode( html_entity_decode( $settings['bank_details'] ) ); ?>',
			terms_and_conditions: '<?php echo $settings['terms_and_conditions']; ?>',
			enable_binary: '<?php echo ( in_array( 'enable_binary', $settings['plan_types'] ) ) ? false : true; ?>',
			enable_forex: '<?php echo ( in_array( 'enable_forex', $settings['plan_types'] ) ) ? false : true; ?>',
			binary_signals: false,
			custom_translations: <?php echo $settings['custom_translations']; ?>,
			disabled_languages: <?php echo $settings['disabled_languages']; ?>
		};

		script.type = "text/javascript";
		script.async = true;
		script.src = STATIC_URL + "/loader.js";

		if (window.opera == "[object Opera]") {
			document.addEventListener("DOMContentLoaded", func, false);
		}
		else {
			func();
		}

	})(document, window, "bs_frontend_callbacks");
</script>
<!-- ––––– End of Platform Init ––––– -->
