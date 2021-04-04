<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'github' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'github' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'github' ][ 'default_count' ] : 0;
$git_username = (isset( $apsc_settings[ 'social_profile' ][ 'github' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'github' ][ 'username' ] != '') ? $apsc_settings[ 'social_profile' ][ 'github' ][ 'username' ] : '';
$git_url = 'https://github.com/' . $git_username;
$git_count = get_transient( 'apsc_github' );
if ( false === $git_count ) {
     $api_url = 'https://api.github.com/users/' . $git_username;
     $params = array(
         'sslverify' => false,
         'timeout' );
     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
          $detail = json_decode( $connection[ 'body' ] );
          $count = isset( $detail -> followers ) ? intval( $detail -> followers ) : $default_count;
     }
     set_transient( 'apsc_github', $count, $cache_period );
} else {
     $count = $git_count;
}
