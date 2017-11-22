<?php

$cache_file = 'cache-asset-index';
$url = 'http://'.get_option('ol_api_url').'/options';
if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 60 * 5 ))) {
   // Cache file is less than five minutes old. 
   // Don't bother refreshing, just use the file as-is.
   $file = file_get_contents($cache_file);
} else {
   // Our cache is out-of-date, so load the data from our remote server,
   // and also save it over our cache for next time.
   $file = file_get_contents($url);
   file_put_contents($cache_file, $file, LOCK_EX);
}

$assets = json_decode($file);

$assets = $assets->assets;

$uniqueAssets = [];

foreach($assets as $asset){
    if( function_exists('acf_add_local_field_group') ) {
        $name = $asset->name;
        if(in_array($asset->name, $uniqueAssets)) continue;
$uniqueAssets[] = $asset->name;

        acf_add_local_field_group(array(
            'key' => 'ol_assets_'.$asset->id,
            'title' => $name,
            'menu_order' => 2,
            'fields' => array (
                array (
                    'key' => 'description_'.$asset->id,
                    'label' => 'Description',
                    'name' => 'description_'.$asset->id,
                    'tabs' => 'all',
                    'type' => 'text',
                ),
                array (
                    'key' => 'trading_hours_'.$asset->id,
                    'label' => 'Trading hours',
                    'name' => 'trading_hours_'.$asset->id,
                    'tabs' => 'all',
                    'type' => 'text',
                ),
            ),
            'location' => array (
                array (
                    array (
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'assetindexes',
                    ),
                ),
            ),
            'label_placement' => 'left',
        ));


    }
}
