(function($) {
    /*
     * Spawn optionlift api client
     * olApi(apiUrl, tradingPlatformUrl)
     */
    var olSdkClient = new olSdk('//<?php echo get_option('
        ol_api_url ');?>/', '<?php echo get_option('
        ol_trading_url ');?>');
    // Concatenate phone number
    var $value1 = $('.registeringForm input[name="phone_prefix"]').val();
    var $value2 = $('.registeringForm input[name="phone"]').val();
    var $hidden_phone = $('.registeringForm input[name="hidden_phone"]');
    $hidden_phone.val($value1 + $value2);
    $('.registeringForm input[name="phone_prefix"], .registeringForm input[name="phone"]').change(function() {
        $value1 = $('.registeringForm input[name="phone_prefix"]').val();
        $value2 = $('.registeringForm input[name="phone"]').val();
        $hidden_phone.val($value1 + $value2);
    });
    var $form = $('.registeringForm'),
        $firstName = $('.registeringForm input[name="fname"]'),
        $lastName = $('.registeringForm input[name="lname"]'),
        $email = $('.registeringForm input[name="email"]'),
        $country = $('.registeringForm select[name="country"]'),
        $language = $('.registeringForm select[name="language"]'),
        $currency = $('.registeringForm select[name="currency"]'),
        $phone_prefix = $('.registeringForm input[name="phone_prefix"]'),
        $phone = $hidden_phone,
        $password = $('.registeringForm input[name="password"]'),
        $campaign = $('.registeringForm input[name="campaign"]'),
        $affiliate = $('.registeringForm input[name="affiliate"]'),
        $trading_group = $('.registeringForm input[name="trading_group_id"]'),
        $a_aid = $('.registeringForm input[name="a_aid"]'),
        $b_bid = $('.registeringForm input[name="b_bid"]'),
        $terms = $('.registeringForm input[name="terms"]');
    olSdkClient.connectRegistrationForm({
        '$form': $form,
        '$firstName': $firstName,
        '$lastName': $lastName,
        '$email': $email,
        '$country': $country,
        '$language': $language,
        '$currency': $currency,
        '$phone_prefix': $phone_prefix,
        '$phone': $phone,
        '$password': $password,
        '$campaign': $campaign,
        '$affiliate': $affiliate,
        '$trading_group': $trading_group,
        '$a_aid': $a_aid,
        '$b_bid': $b_bid,
        '$terms': $terms,
        'appendCountries': true,
        'appendLanguages': true,
        'appendCurrencies': true,
        'detectCountry': true,
        'success': function() {
            setTimeout(function() {
                window.location.replace('/trading/#!/pl-fb/account/deposit/request');
            }, 100);
        },
        'error': function(response) {
            $('.ol-error').remove();
            $form.find('.form-control').css("border-color", "");
            $response = (response.responseJSON) ? response.responseJSON.meta.errors : response.meta.errors;
            $.each($response, function() {
                $.each(this, function(k, v) {
                    $form.find('*[name="' + k + '"]').css("border-color", "red").parent().append('<span class="ol-error">' + v + '</span>');
                });
            });
            if ($response.message) {
                $('.errors').show().html($response.message);
            }
        }
    });
})(jQuery);