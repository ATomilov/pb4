(function($) {
    /*
     * Spawn optionlift api client
     * olApi(apiUrl, tradingPlatformUrl)
     */
    var olSdkClient = new olSdk('//<?php echo get_option('
        ol_api_url '); ?>/', '<?php echo get_option('
        ol_trading_url '); ?>');
    var $form = $('.forgotForm'),
        $email = $('.forgotForm input[name="email"]');
    olSdkClient.connectForgotForm({
        '$form': $form,
        '$email': $email,
        'success': function(response) {
            var $response = response;
            if ($response.status) {
                $('.errors').hide();
                $('.success').show().html($response.status);
            }
        },
        'error': function(response) {
            var $response = response.responseJSON;
            if ($response.status) {
                $('.success').hide();
                $('.errors').show().html($response.status);
            }
        }
    });
})(jQuery);