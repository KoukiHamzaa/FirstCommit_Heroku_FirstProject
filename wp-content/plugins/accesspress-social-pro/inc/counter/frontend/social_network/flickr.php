<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'default_count' ] : 0;
$flickr_group_id = (isset( $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'group_id' ] ) && $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'group_id' ] != '' ) ? $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'group_id' ] : '';
$flickr_group_url = 'https://www.flickr.com/groups/' . $flickr_group_id;
$flickr_count = get_transient( 'apsc_flickr' );
if ( false === $flickr_count ) {
     $flickr_api_key = (isset( $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'api_key' ] ) && $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'api_key' ] != '') ? $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'api_key' ] : '';
     $api_url = 'https://api.flickr.com/services/rest/?&method=flickr.groups.getInfo&api_key=' . $flickr_api_key . '&group_id=' . $flickr_group_id;
     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );
     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
          $details = simplexml_load_string( $connection[ 'body' ] );
          $count = isset( $details -> group -> members ) ? intval( $details -> group -> members ) : $default_count;
     }
     set_transient( 'apsc_flickr', $count, $cache_period );
} else {
     $count = $flickr_count;
}

