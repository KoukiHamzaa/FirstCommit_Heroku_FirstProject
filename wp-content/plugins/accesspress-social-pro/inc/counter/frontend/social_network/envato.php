<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'envato' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'envato' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'envato' ][ 'default_count' ] : 0;
$envato_profile_url = (isset( $apsc_settings[ 'social_profile' ][ 'envato' ][ 'profile_url' ] ) && $apsc_settings[ 'social_profile' ][ 'envato' ][ 'profile_url' ] != '') ? $apsc_settings[ 'social_profile' ][ 'envato' ][ 'profile_url' ] : '';
$envato_count = get_transient( 'apsc_envato' );
if ( false === $envato_count ) {
     $envato_username = (isset( $apsc_settings[ 'social_profile' ][ 'envato' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'envato' ][ 'username' ] != '') ? $apsc_settings[ 'social_profile' ][ 'envato' ][ 'username' ] : '';
     $api_url = 'http://marketplace.envato.com/api/edge/user:' . $envato_username . '.json';
     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );
     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
          $details = json_decode( $connection[ 'body' ] );
          $count = isset( $details -> user -> followers ) ? $details -> user -> followers : $default_count;
     }
     set_transient( 'apsc_envato', $count, $cache_period );
} else {
     $count = $envato_count;
}