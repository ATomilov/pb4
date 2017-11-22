<form id="open-account-form" class="open-account-form-forward" name="open-account-form" method="post" action="#">

    <div style="margin-bottom:10px;">
        <input style="margin-bottom:10px;" type="text" name="fname" id="open-account-form-first-name" class="first_name" placeholder="Full Name">
        <input type="text" name="lname" id="open-account-form-last-name" class="last_name" placeholder="Last Name">
    </div>
    <div style="margin-bottom:10px;">
        <input type="text" name="email" id="open-account-form-email" class="email" placeholder="E-Mail">
    </div>
    <select name="country" class="form-control countrylist" id="open-account-form-country" style="margin-bottom:10px;">
    </select>
    <input type="hidden" name="language" value="English" id="open-account-language"/>
    <input type="hidden" name="currency" value="USD" id="open-account-currency"/>
    <input type="hidden" name="a_aid" value="" id="open-account-a_aid"/>
    <input type="hidden" name="b_bid" value="" id="open-account-b_bid"/>
    <input type="hidden" name="campaign" value="" id="open-account-campaign"/>
    <div style="margin-bottom:10px;">
        <input type="text" name="phone_prefix" id="phone-prefix open-account-form-phone-number" value="" class="phone_prefix" placeholder="Area" style="width: 24%; float: left; margin-right: 2%;">
        <input type="text" name="phone" id="open-account-form-phone-number" class="phone_number" placeholder="Phone" style="width: 74%; float: left;">
    </div>

    <div style="margin-bottom:10px;margin-top:10px;">
        <input style="margin-top:10px;" type="submit" name="submit" class="btn btn-success btn-start-trading" value="Start Trading Now!">
    </div>
</form>