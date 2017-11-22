<?php
$settings = [];

$static_url = '//' . get_option('ol_static_url');
$api_url = '//' . get_option('ol_api_url');
$rates_url = '//' . get_option('ol_rates_url');

if($platform_language):
    $settings['language'] = $platform_language;
    if(in_array($platform_language, ['ar']) || in_array($platform_language, ['he'])):
        $settings['direction'] = 'rtl';
    endif;
endif;

if($platform_theme):
    $settings['theme'] = $platform_theme;
endif;

if($plan_types):
    $settings['disabled_plan_types'] = $plan_types;
endif;

if($disabled_payment_options):
    $settings['disabled_payment_options'] = $disabled_payment_options;
endif;

if($bank_details):
    $settings['bank_details'] = htmlentities($bank_details);
endif;

