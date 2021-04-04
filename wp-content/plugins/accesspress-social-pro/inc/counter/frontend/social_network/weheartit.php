<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'default_count' ] : 0;
$weheartit_username = (isset( $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'username' ] != '') ? $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'username' ] : '';

$weheartit_count = get_transient( 'apsc_weheartit' );

if ( false === $weheartit_count ) {
     $api_url = 'http://weheartit.com/' . $weheartit_username . '/fans';
     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );
     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
          $request = json_decode( $connection[ 'body' ], true );
          preg_match( '/<h3>([0-9]+) (Follower|Followers)<\/h3>/s', $request, $matches );
          //if ( is_array( $matches ) && count( $matches ) > 0 ) {
          if ( is_array( $matches ) && ! empty( $matches ) ) {
               $count = $matches [ 1 ];
          } else {
               $count = $default_count;
          }
     }
     set_transient( 'apsc_weheartit', $count, $cache_period );
} else {
     $count = $weheartit_count;
}