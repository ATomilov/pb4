<form method="post" class="registeringForm" action="#">
    <div class="form-group">
        <label for="fname" class="control-label"><?php echo _e("First name", 'ol_plugin');?>*</label>
        <input class="form-control" name="fname" type="text" id="fname" value="<?php echo isset($_GET['fname']) ? $_GET['fname'] : '' ; ?>">
    </div>

    <div class="form-group">
        <label for="lname" class="control-label"><?php echo _e("Last name", 'ol_plugin');?>*</label>
        <input class="form-control" name="lname" type="text" id="lname" value="<?php echo isset($_GET['lname']) ? $_GET['lname'] : '' ; ?>">
    </div>

    <div class="form-group phone-group-input">
        <label for="phone" class="control-label"><?php echo _e("Phone", 'ol_plugin');?>*</label>
        <input class="form-control" name="phone_prefix" type="text" id="phone-prefix" value="<?php echo isset($_GET['phone_prefix']) ? $_GET['phone_prefix'] : '' ; ?>">
        <input class="form-control" name="phone" type="text" id="phone" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : '' ; ?>">
        <input name="hidden_phone" type="hidden">
    </div>

    <div class="form-group">
        <label for="email" class="control-label"><?php echo _e("Email", 'ol_plugin');?>*</label>
        <input class="form-control" name="email" type="text" id="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : '' ; ?>">
    </div>

    <div class="form-group">
        <label for="password" class="control-label"><?php echo _e("Password", 'ol_plugin');?>*</label>
        <input class="form-control" name="password" type="password" value="" id="password">
    </div>

    <div class="form-group">
        <label for="country" class="control-label"><?php echo _e("Country", 'ol_plugin');?>*</label>
        <select class="form-control chosen" id="country" name="country">
            <?php echo isset($_GET['country']) ? '<option value="'. $_GET['country'] .'">'. $_GET['country'] .'</option>' : '' ; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="language" class="control-label"><?php echo _e("Language", 'ol_plugin');?>*</label>
        <select class="form-control chosen" id="language" name="language"></select>
    </div>

    <div class="form-group">
        <label for="currency" class="control-label"><?php echo _e("Currency", 'ol_plugin');?></label>
        <select class="form-control chosen" id="currency" name="currency"></select>
    </div>

    <div class="form-group">
        <div class="checkbox">
            <label><input type="checkbox" name="terms" value="1"><?php echo _e("Im over 18 years of age and I accept the terms & conditions", 'ol_plugin');?>*</label>
        </div>
    </div>

    <input name="campaign" type="hidden" value="<?php echo isset($_GET['campaign_id']) ? $_GET['campaign_id'] : 0 ; ?>" id="campaign">
    <input name="affiliate" type="hidden" value="<?php echo isset($_GET['affiliate_id']) ? $_GET['affiliate_id'] : 0 ; ?>" id="affiliate">
    <input name="trading_group_id" type="hidden" value="<?php echo isset($_GET['trading_group_id']) ? $_GET['trading_group_id'] : 0 ; ?>" id="affiliate">
    <input name="a_aid" type="hidden" value="<?php echo isset($_GET['a_aid']) ? $_GET['a_aid'] : ''; ?>" id="a_aid">
    <input name="b_bid" type="hidden" value="<?php echo isset($_GET['b_bid']) ? $_GET['b_bid'] : ''; ?>" id="b_bid">

    <div class="clear"></div>

    <div class="errors alert alert-danger" style="display: none;"></div>

    <label for="submit" class="control-label required-fields">* <?php echo _e("Required fields", 'ol_plugin');?></label>
    <input type="submit" value="<?php _e('Register', 'ol_plugin'); ?>">
</form>
<script type="text/javascript">

    (function($) {

        /*
         * Spawn optionlift api client
         * olApi(apiUrl, tradingPlatformUrl)
         */
        var olSdkClient = new olSdk('//<?php echo get_option('ol_api_url') ;?>/', '<?php echo get_option('ol_trading_url') ;?>');

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
            '$form' : $form,
            '$firstName' : $firstName,
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
            'appendCountries' : true,
            'appendLanguages' : true,
            'appendCurrencies' : true,
            'detectCountry' : true,
            'success' : function(){
                setTimeout(function(){window.location.replace('/trading/#!/account/deposit/')}, 100);

            },
            'error'   : function(response){
                $('.ol-error').remove();
                $form.find('.form-control').css("border-color", "");

                $response = response.responseJSON.meta.errors;

                $.each($response, function() {
                    $.each(this, function(k, v) {
                        $form.find('*[name="'+k+'"]').css("border-color", "red").parent().append('<span class="ol-error">'+v+'</span>');
                    });
                });
                if($response.message) {
                    $('.errors').show().html($response.message);
                }
            }
        });

    })(jQuery);
</script>
<style>
.rtl .registeringForm label{
    float:right;
}
.rtl .registeringForm .ol-error{
    float: left;
}
.rtl .registeringForm input, .rtl .registeringForm select{
    float: right;
}
</style>