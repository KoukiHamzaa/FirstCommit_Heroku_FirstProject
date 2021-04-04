<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'default_count' ] : 0;
$forrst_username = (isset( $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'username' ] != '') ? $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'username' ] : '';
$forrst_url = 'https://forrst.com/people/' . $forrst_username;
$forrst_count = get_transient( 'apsc_forrst' );
if ( false === $forrst_count || '' == $forrst_count ) {
     $api_url = 'https://forrst.com/api/v2/users/info?username=' . $forrst_username;
     $params = array( 'sslverify' => false, 'timeout' => 60 );
     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
          $details = json_decode( $connection[ 'body' ] );
          if ( isset( $details -> resp -> followers ) ) {
               $count = $details -> resp -> followers;
          } else {
               $count = $default_count;
          }
     }
     set_transient( 'apsc_forrst', $count, $cache_period );
} else {
     $count = $forrst_count;
}
