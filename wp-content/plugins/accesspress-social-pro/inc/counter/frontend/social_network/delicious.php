<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'default_count' ] : 0;
$delicious_username = (isset( $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'username' ] != '' ) ? $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'username' ] : '';

$delicious_count = get_transient( 'apsc_delicious' );
if ( false === $delicious_count ) {
     $api_url = 'http://feeds.delicious.com/v2/json/userinfo/' . $delicious_username;

     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );
     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
      $response = json_decode( $connection[ 'body' ], true );
          if ( isset( $response [ '2' ] ) && isset( $response [ '2' ] -> n ) ) {
               $count = $response [ '2' ] -> n;
          }else{
            $count = $default_count;
          }
     }
     set_transient( 'apsc_delicious', $count, $cache_period );
} else {
     $count = $delicious_count;
}