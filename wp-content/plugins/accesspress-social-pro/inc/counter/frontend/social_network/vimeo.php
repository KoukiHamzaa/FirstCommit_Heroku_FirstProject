<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'default_count' ] : 0;
$username = (isset( $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'username' ] != ' ') ? $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'username' ] : '';
$social_profile_url = 'https://vimeo.com/' . $username;
$vimeo_count = get_transient( 'apsc_vimeo' );
if ( false === $vimeo_count ) {
     $api_url = 'http://vimeo.com/api/v2/channel/' . $username . '/info.json';
     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );

     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
          $response = json_decode( $connection[ 'body' ], true );
          if ( isset( $response[ 'total_subscribers' ] ) ) {
               $count = intval( $response[ 'total_subscribers' ] );
          } else {
               $count = $default_count;
          }
     }
     set_transient( 'apsc_vimeo', $count, $cache_period );
} else {
     $count = $vimeo_count;
}