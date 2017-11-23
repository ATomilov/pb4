(function($) {

		/*
		 * Spawn optionlift api client
		 * olApi(apiUrl, tradingPlatformUrl)
		 */
		var olApiClient = new olApi('//<?php echo get_option('ol_api_url');?>/', '<?php echo get_option('ol_trading_url');?>');

		/*
		 * Detect when platform on page
		 * detectPlatform(whenOnPageCallback(), whenNotOnPageCallback())
		 */
		olApiClient.detectPlatform(function() {
			$('.ol-not-login, .ol-login').remove();
		}, function() {});

		/*
		 * Connect login form
		 * connectLoginForm({$form, $login, $password, loginedCallback(response), notLoginedCallback(response) })
		 */
		olApiClient.connectLoginForm({
			'$form': $('.loginForm'),
			'$login': $('.loginForm .login'),
			'$password': $('.loginForm .password'),
			'success': function(response) {
				window.location.replace('/trading');
			},
			'error': function(response) {
				alert('Wrong login/password');
				console.log(response);
			}
		});

		/*
		 * Get links for user menu when logined
		 * getMenuLinks(callback(links))
		 */
		olApiClient.getMenuLinks(function(links) {
			$('.ol-login').find('.ol-account-link').attr('href', links.account);
			$('.ol-login').find('.ol-deposit-link').attr('href', links.deposit);
			$('.ol-login').find('.ol-trading-link').attr('href', links.tp);
		});

		/*
		 * Connect logout links
		 * connectLogout($element, afterLogoutCallback())
		 */
		olApiClient.connectLogout($('.ol-logout-link'), function() {
			window.location.reload();
		});

		/*
		 * Getting user data
		 * user(logined(user), notLogined())
		 */
		olApiClient.user(function(user) {
			$('.ol-login .user-letters').html(user.fname[0] + user.lname[0]);
			$('.ol-login .user-hi').html('Hi, ' + user.fname + ' ' + user.lname);
			$('.ol-user-fname').html(user.fname);
			$('.ol-user-lname').html(user.lname);
			$('.ol-login').show();
			$('.ol-not-login').hide();
		}, function() {
			$('.ol-not-login').show();
		});

	})(jQuery);