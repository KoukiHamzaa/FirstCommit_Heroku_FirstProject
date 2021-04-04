<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'default_count' ] : 0;
$slideshare_url = (isset( $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'username' ] != '') ? $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'username' ] : '';

$slideshare_count = get_transient( 'apsc_slideshare' );

if ( false === $slideshare_count ) {
     $api_url = 'http://www.slideshare.net/' . $slideshare_url . '/followers';

     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );

     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
          $response = json_decode( $connection[ 'body' ], true );
          $matches = preg_match( '/([0-9]+)( Followers| Follower)/s', $response, $matches );

          if ( is_array( $matches ) && isset( $matches [ 1 ] ) ) {
               $count = $matches [ 1 ];
          } else {
               $count = $default_count;
          }
     }
     set_transient( 'apsc_slideshare', $count, $cache_period );
} else {
     $count = $slideshare_count;
}

