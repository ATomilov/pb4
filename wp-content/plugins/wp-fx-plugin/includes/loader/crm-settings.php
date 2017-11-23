<?php

/*
======================================== >>>>> */
/*
= Variable Definitions = */
/* ======================================== >>>>> */

// Colors and Variables
$colors = [
    'top_nav_background' => 'Top Navigation Background',
    'top_nav_color'      => 'Top Navigation Color',
    'button_background'  => 'Buttons Background',
    'button_color'       => 'Buttons Color',
    'border'             => 'Borders color',
    'background'         => 'Main Background Color',
    'color'              => 'Main Color',
    'positive'           => 'Positive colors',
    'negative'           => 'Negative Colors',
    'chart_grid'         => 'Chart Grid Color',
    'chart_line'         => 'Chart Line Color',
];
$colors_setting = [];
foreach ($colors as $k => $v) {
    $colors_setting[] = [
        'key'               => $k,
        'label'             => $v,
        'name'              => $k,
        'type'              => 'color_picker',
        'default_value'     => '#353740',
        'conditional_logic' => [
            [
                [
                    'field'    => 'platform_theme',
                    'operator' => '==',
                    'value'    => 'custom',
                ],
            ],
        ],
    ];
}

/*
======================================== >>>>> */
/*
= Fields Init = */
/* ======================================== >>>>> */

if (function_exists('acf_add_local_field_group')) {

    $languages = [
        'en' => 'English',
        'ru' => 'Russian',
        'it' => 'Italian',
        'es' => 'Spanish',
        'de' => 'Germany',
        'fr' => 'French',
        'he' => 'Hebrew',
        'zh' => 'Chinese',
        'ar' => 'Arabic',
    ];

    acf_add_local_field_group(
        [
            'key'        => 'ol_general_settings',
            'title'      => 'Platform Settings',
            'menu_order' => 0,
            'fields'     => [

                /* ––––– General Tab ––––– */

                [
                    'key'   => 'general_tab',
                    'label' => 'General',
                    'name'  => '',
                    'type'  => 'tab',
                ],
                [
                    'key'           => 'start_url',
                    'label'         => 'Start URL',
                    'name'          => 'start_url',
                    'type'          => 'text',
                    'default_value' => '/binary-trading/BINARY',
                ],
                [
                    'key'   => 'logo',
                    'label' => 'Logo',
                    'name'  => 'logo',
                    'type'  => 'text',
                ],
                [
                    'key'     => 'plan_types',
                    'label'   => 'Disable Plan Types',
                    'name'    => 'plan_types',
                    'type'    => 'checkbox',
                    'choices' => [
                        'enable_binary' => 'Binary Trading',
                        'enable_forex'  => 'CFD Trading',
                    ],
                ],
                [
                    'key'     => 'platform_language',
                    'label'   => 'Platform Language',
                    'name'    => 'platform_language',
                    'type'    => 'select',
                    'ui'      => true,
                    'choices' => $languages,
                ],
                [
                    'key'      => 'disabled_languages',
                    'label'    => 'Disabled Languages',
                    'name'     => 'disabled_languages',
                    'type'     => 'select',
                    'multiple' => true,
                    'ui'       => true,
                    'choices'  => $languages,
                ],
                [
                    'key'   => 'terms_and_conditions',
                    'label' => 'Terms and Conditions URL',
                    'name'  => 'terms_and_conditions',
                    'type'  => 'text',
                ],

                /* ––––– Styling ––––– */

                [
                    'key'   => 'styling_tab',
                    'label' => 'Styling',
                    'name'  => '',
                    'type'  => 'tab',
                ],
                [
                    'key'     => 'platform_theme',
                    'label'   => 'Platform Theme',
                    'name'    => 'platform_theme',
                    'type'    => 'select',
                    'choices' => [
                        'theme-dark-yellow'      => 'Dark Yellow',
                        'theme-dark-green'       => 'Dark Green',
                        'theme-dark-pink'        => 'Dark Pink',
                        'theme-dark-purple'      => 'Dark Purple',
                        'theme-dark-blue'        => 'Dark Blue',
                        'theme-dark-blue-2'      => 'Dark Blue 2',
                        'theme-dark-blue-3'      => 'Dark Blue 3',
                        'theme-dark-blue-light'  => 'Dark Blue Light',
                        'theme-light-yellow'     => 'Light Yellow',
                        'theme-light-green'      => 'Light Green',
                        'theme-light-pink'       => 'Light Pink',
                        'theme-light-purple'     => 'Light Purple',
                        'theme-light-blue'       => 'Light Blue',
                        'theme-light-blue-2'     => 'Light Blue 2',
                        'theme-light-blue-3'     => 'Light Blue 3',
                        'theme-light-blue-light' => 'Light Blue Light',

                    ],
                ],
                $colors_setting[0],
                $colors_setting[1],
                $colors_setting[2],
                $colors_setting[3],
                $colors_setting[4],
                $colors_setting[5],
                $colors_setting[6],
                $colors_setting[7],
                $colors_setting[8],
                $colors_setting[9],
                $colors_setting[10],
                [
                    'key'       => 'custom_css',
                    'label'     => 'Custom CSS',
                    'name'      => 'custom_css',
                    'type'      => 'textarea',
                    'new_lines' => '',
                ],
                [
                    'key'       => 'custom_js',
                    'label'     => 'Custom JS',
                    'name'      => 'custom_js',
                    'type'      => 'textarea',
                    'new_lines' => '',
                ],

                /* ––––– Translations ––––– */

                [
                    'key'   => 'translations_tab',
                    'label' => 'Translations',
                    'name'  => '',
                    'type'  => 'tab',
                ],
                [
                    'key'          => 'custom_translations',
                    'label'        => 'Custom Translations',
                    'name'         => 'custom_translations',
                    'instructions' => 'This is JSON field',
                    'type'         => 'textarea',
                    'rows'         => 10,
                ],

                /* ––––– Deposit ––––– */

                [
                    'key'   => 'deposit_tab',
                    'label' => 'Deposit',
                    'name'  => '',
                    'type'  => 'tab',
                ],
                [
                    'key'          => 'bank_details',
                    'label'        => 'Bank Details',
                    'name'         => 'bank_details',
                    'tabs'         => 'all',
                    'toolbar'      => 'basic',
                    'media_upload' => 0,
                    'type'         => 'wysiwyg',
                ],

            ],
            'location'   => [
                [
                    [
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'platforms',
                    ],
                ],
            ],
        ]
    );
}