<?php


function ol_asset_index_shortcode( $atts ) {
    ob_start();
    $args = array(
        'post_type' => 'assetindexes',
        'post__in' => [$atts['id']]
    );
    $the_query = new WP_Query( $args );

    if(isset($the_query->posts[0])) {
        $assetIndex = $the_query->posts[0];

        /* Restore original Post Data */
        wp_reset_postdata();

        if(get_fields($assetIndex->ID)) {
            extract(get_fields($assetIndex->ID));
        }

        $assets = json_decode(file_get_contents('http://'.get_option('ol_api_url').'/options'));
        $assets = $assets->assets;

     
        $uniqueAssets = [];

        $olAssetsIndex = [];
        foreach($assets as $asset){
            $asset = (object) $asset;
            if(in_array($asset->name, $uniqueAssets)) continue;

            $uniqueAssets[] = $asset->name;

            $description_name = 'description_'.$asset->id;
            $trading_hours_name = 'trading_hours_'.$asset->id;
            $_group = null;
            if($asset->group[0] == 1){
                $_group = 'Hot assets';
            }
            if($asset->group[1] == 1){
                $_group = 'Currencies';
            }
            if($asset->group[2] == 1){
                $_group = 'Commodities';
            }
            if($asset->group[3] == 1){
                $_group = 'Stocks';
            }
            if($asset->group[4] == 1){
                $_group = 'Indicies';
            }
            if(empty($$description_name)) $$description_name = '';
            if(empty($$trading_hours_name)) $$trading_hours_name = '';
            if($_group){
                $name = $asset->name;
                $olAssetsIndex[$_group][] = (object)[
                'name' => $name,
                'description' => $$description_name,
                'trading_hours' => $$trading_hours_name,
                'id' => $asset->id
            ];
            }
            
        }

        include_once ol_locate_template('ol/assets-index/main.php');

        $result = ob_get_clean();
    } else {
        $result = 'Id inside the shortcode seems to be wrong';
    }


    return $result;
}

add_shortcode( 'ol-asset-index', 'ol_asset_index_shortcode' );