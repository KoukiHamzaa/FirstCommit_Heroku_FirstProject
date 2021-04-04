<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'default_count' ] : 0;
$twitch_channel_name = (isset( $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'channel_name' ] ) && $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'channel_name' ] != '') ? $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'channel_name' ] : '';
$twitch_access_token = (isset( $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'access_token' ] ) && $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'access_token' ] != '') ? $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'access_token' ] : '';

$twitch_count = get_transient( 'apsc_twitch' );
if ( false === $twitch_count ) {
     $api_url = 'https://api.twitch.tv/kraken/channels/' . $twitch_channel_name . '?oauth_token=' . $twitch_access_token;

     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );
     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
        $data = json_decode( $connection[ 'body' ], true );
          $count = isset( $data [ 'followers' ] ) ? $data [ 'followers' ] : $default_count;
     }
     set_transient( 'apsc_twitch', $count, $cache_period );
} else {
     $count = $twitch_count;
}