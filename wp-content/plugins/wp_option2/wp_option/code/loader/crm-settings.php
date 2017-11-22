<?php
//  Plugin fields structure
//
//  General
//	    Theme type
//	    Plan types
//	    Default language
//
//  Styling
//	    Fonts
//	    Theme style
//	    Main branding colors
//	    Nav colors
//	    Buttons colors
//	    Background colors/image
//
//  Deposit configurations
//	    Bank details
//	    Payment options available
if( function_exists('acf_add_local_field_group') ) {

    acf_add_local_field_group(array(
        'key' => 'ol_general_settings',
        'title' => 'General',
        'menu_order' => 0,
        'fields' => array (
            array (
                'key' => 'plan_types',
                'label' => 'Disable Plan Types',
                'name' => 'plan_types',
                'type' => 'checkbox',
                'choices' => array(
                    'binary_options' => 'Binary Options',
                    'hyper' => 'Hyper',
                    'long_term' => 'Long term',
                    'pairs' => 'Pairs',
                    'one_touch' => 'One Touch',
                    'forex' => 'Forex',
                ),
            ),
            array (
                'key' => 'platform_language',
                'label' => 'Platform Language',
                'name' => 'platform_language',
                'type' => 'select',
                'choices' => array(
                    'en' => 'English',
                    'ru' => 'Русский', 
                    'ch' => '中国',
                    'he' => 'Hebrew',
                    'ar' => 'Arabic',
                    'de' => 'Deutsch',

                ),
            )
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'platforms',
                ),
            ),
        ),
        'label_placement' => 'left',
    ));


    $colors = array(
        'top_nav_background' => 'Top Navigation Background',
        'top_nav_color' => 'Top Navigation Color',
        'button_background' => 'Buttons Background',
        'button_color' => 'Buttons Color',
        'border' => 'Borders color',
        'background' => 'Main Background Color',
        'color' => 'Main Color',
        'positive' => 'Positive colors',
        'negative' => 'Negative Colors',
        'chart_grid' => 'Chart Grid Color',
        'chart_line' => 'Chart Line Color',
    );
    $array = [];
    foreach($colors as $k=>$v){
        $array[] = array (
            'key' => $k,
            'label' => $v,
            'name' => $k,
            'type' => 'color_picker',
            'default_value' => '#353740',
            'conditional_logic' => array (
                array (
                    array (
                        'field' => 'platform_theme',
                        'operator' => '==',
                        'value' => 'custom',
                    ),
                ),
            ),
        );
    }
    $arr = array(
        'key' => 'ol_styling_settings',
        'title' => 'Styling',
        'menu_order' => 1,
        'fields' => array (
            array (
                'key' => 'platform_theme',
                'label' => 'Platform Theme',
                'name' => 'platform_theme',
                'type' => 'select',
                'choices' => array(
                    'dark' => 'Dark',
                    'light' => 'Light',
                    'custom' => 'Custom',
                    'dark-navy' => 'Dark Navy',
                    'binaring' => 'Binaring'

                ),
            ),
            $array[0],
            $array[1],
            $array[2],
            $array[3],
            $array[4],
            $array[5],
            $array[6],
            $array[7],
            $array[8],
            $array[9],
            $array[10],
            array (
                'key' => 'custom_css',
                'label' => 'Custom CSS',
                'name' => 'custom_css',
                'type' => 'textarea',
                'placeholder' => '//Your custom css goes here',
                'new_lines' => '',
            ),
            array (
                'key' => 'custom_js',
                'label' => 'Custom JS',
                'name' => 'custom_js',
                'type' => 'textarea',
                'placeholder' => '//Your custom js goes here',
                'new_lines' => '',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'platforms',
                ),
            ),
        ),
        'label_placement' => 'left',
    );

    acf_add_local_field_group($arr);

    // Deposit Config

    acf_add_local_field_group(array(
        'key' => 'ol_deposit_settings',
        'title' => 'Deposit Configurations',
        'menu_order' => 2,
        'fields' => array (
            array (
                'key' => 'bank_details',
                'label' => 'Bank Details',
                'name' => 'bank_details',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'type' => 'wysiwyg',
            ),
            array (
                'key' => 'disabled_payment_options',
                'label' => 'Disable Payment Options',
                'name' => 'disabled_payment_options',
                'type' => 'checkbox',
                'choices' => array(
                    'ticket' => 'Deposit request',
                    'cc' => 'Stripe CC',
                    'wire' => 'Wire transfer',
                ),
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'platforms',
                ),
            ),
        ),
        'label_placement' => 'left',
    ));


}