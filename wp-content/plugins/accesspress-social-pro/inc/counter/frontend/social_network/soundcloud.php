<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'default_count' ] : 0;
$username = (isset( $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'username' ] != '') ? $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'username' ] : '';
$soundcloud_count = get_transient( 'apsc_soundcloud' );
if ( false === $soundcloud_count ) {
     $api_url = 'https://api.soundcloud.com/users/' . $username . '.json?client_id=' . $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'client_id' ];
     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );
     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
          $response = json_decode( $connection[ 'body' ], true );
          if ( isset( $response[ 'followers_count' ] ) ) {
               $count = intval( $response[ 'followers_count' ] );
          } else {
               $count = $default_count;
          }
     }
     set_transient( 'apsc_soundcloud', $count, $cache_period );
} else {
     $count = $soundcloud_count;
}
