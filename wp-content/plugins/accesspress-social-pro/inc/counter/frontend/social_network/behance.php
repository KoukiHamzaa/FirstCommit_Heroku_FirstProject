<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'behance' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'behance' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'behance' ][ 'default_count' ] : 0;
$behance_username = (isset( $apsc_settings[ 'social_profile' ][ 'behance' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'behance' ][ 'username' ] != '' ) ? $apsc_settings[ 'social_profile' ][ 'behance' ][ 'username' ] : '';
$behance_api_key = (isset( $apsc_settings[ 'social_profile' ][ 'behance' ][ 'api_key' ] ) && $apsc_settings[ 'social_profile' ][ 'behance' ][ 'api_key' ] != '') ? $apsc_settings[ 'social_profile' ][ 'behance' ][ 'api_key' ] : '';
$behance_url = 'https://www.behance.net/' . $behance_username;
$behance_count = get_transient( 'apsc_behance' );

if ( false === $behance_count ) {
     $api_url = 'https://www.behance.net/v2/users/' . $behance_username . '?api_key=' . $behance_api_key;
     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );
     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
          $details = json_decode( $connection[ 'body' ] );
          $count = isset($details -> user -> stats -> followers) ? $details -> user -> stats -> followers : $default_count;
     }
     set_transient( 'apsc_behance', $count, $cache_period );
} else {
     $count = $behance_count;
}
