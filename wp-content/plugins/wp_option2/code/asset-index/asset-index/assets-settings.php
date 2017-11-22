<?php

$cache_file = 'cache-asset-index';
$url =  'https://options.vogelcapital.com/api/assets';

if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 1 ))) {
   // Cache file is less than five minutes old. 
   // Don't bother refreshing, just use the file as-is.
   $file = file_get_contents($cache_file);
} else {
   // Our cache is out-of-date, so load the data from our remote server,
   // and also save it over our cache for next time.
   //$file = file_get_contents($url);

   //  Initiate curl
    $ch = curl_init($url);
    // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // Will return the response, if false it print the response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Set the url
    curl_setopt($ch, CURLOPT_URL,$url);
    // Execute
    $file=curl_exec($ch);
 
    // Closing
    curl_close($ch);


   file_put_contents($cache_file, $file, LOCK_EX);
}
 

$assets = json_decode($file);

$assets = $assets->data;

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
