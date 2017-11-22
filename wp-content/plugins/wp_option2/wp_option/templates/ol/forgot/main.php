<form method="post" class="forgotForm" action="#">

    <div class="form-group">
        <label for="email" class="control-label">Email*</label>
        <input class="form-control" name="email" type="text" id="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : '' ; ?>">
    </div>

    <div class="clear"></div>

    <div class="errors alert alert-danger" style="display: none;"></div>
    <div class="success alert alert-success" style="display: none;"></div>

    <label for="submit" class="control-label required-fields">* Required fields</label>
    <div class="clear"></div>
    <input type="submit" value="Register">
</form>
<script type="text/javascript">

    (function($) {

        /*
         * Spawn optionlift api client
         * olApi(apiUrl, tradingPlatformUrl)
         */
        var olSdkClient = new olSdk('//<?php echo get_option('ol_api_url') ;?>/', '<?php echo get_option('ol_trading_url') ;?>');
 
        var $form = $('.forgotForm'),
            $email = $('.forgotForm input[name="email"]');

        olSdkClient.connectForgotForm({
            '$form' : $form,
            '$email': $email,
            'success' : function(response){
                var $response = response;
              
                if($response.status) {
                    $('.errors').hide();
                    $('.success').show().html($response.status);
                }
            },
            'error'   : function(response){
                var $response = response.responseJSON;
             
                if($response.status) {
                    $('.success').hide();
                    $('.errors').show().html($response.status);
                }
            }
        });

    })(jQuery);
</script>