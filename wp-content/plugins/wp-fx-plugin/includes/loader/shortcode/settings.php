<?php

$settings = [];

$static_url = '//' . get_option('ol_static_url');
$assets_url = '//' . get_option('ol_assets_url');
$api_url    = '//' . get_option('ol_api_url');
$rates_url  = '//' . get_option('ol_rates_url');

$settings['plan_types'] = ($plan_types) ? $plan_types : [];

$settings['start_url']            = $start_url ? $start_url : '';
$settings['language']             = $platform_language ? $platform_language : 'en';
$settings['theme']                = $platform_theme ? $platform_theme : 'theme-dark-yellow';
$settings['bank_details']         = ($bank_details) ? htmlentities($bank_details) : 'Contact the administrator of this website.';
$settings['logo']                 = $logo ? $logo : '#.';
$settings['terms_and_conditions'] = $terms_and_conditions ? terms_and_conditions : '#.';
$settings['available_themes']     = $available_themes ? $available_themes : '\'\'';
$settings['custom_translations']  = $custom_translations ? $custom_translations : '\'\'';

$disabled_languages             = $disabled_languages ? $disabled_languages : [];
$settings['disabled_languages'] = '[';
foreach ($disabled_languages as $disabled_language) {
    $settings['disabled_languages'] .= '"' . $disabled_language . '",';
}
$settings['disabled_languages'] .= ']';
