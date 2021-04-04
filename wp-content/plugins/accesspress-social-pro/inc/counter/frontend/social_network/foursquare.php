<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'default_count' ] : 0;
$foursquare_api_key = (isset( $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'api_key' ] ) && $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'api_key' ] != ' ') ? $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'api_key' ] : '';
$foursquare_count = get_transient( 'apsc_foursquare' );
if ( false === $foursquare_count ) {
     $api_url = ( 'https://api.foursquare.com/v2/users/self?oauth_token=' . $foursquare_api_key . '&v=' . date( 'Ymd' ) );
     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );
     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
      $response = json_decode( $connection[ 'body' ], true );
          if ( isset( $response[ "response" ] ) && isset( $response[ "response" ][ "user" ] ) && isset( $response[ "response" ][ "user" ][ "friends" ][ "count" ] ) ) {
               $count = $response[ "response" ][ "user" ][ "friends" ][ "count" ];
          }else{
            $count = $default_count;
          }
     }
     set_transient( 'apsc_foursquare', $count, $cache_period );
} else {
     $count = $foursquare_count;
}
