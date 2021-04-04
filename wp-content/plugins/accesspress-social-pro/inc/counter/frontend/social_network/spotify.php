<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$default_count = ($apsc_settings[ 'social_profile' ][ 'spotify' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'spotify' ][ 'default_count' ] : 0;
$spotify_url = $apsc_settings[ 'social_profile' ][ 'spotify' ][ 'url' ];

$id = rtrim( $spotify_url, "/" );
$id = urlencode( str_replace( array( 'https://play.spotify.com/', 'https://player.spotify.com/', 'artist/', 'user/' ), '', $id ) );

$spotify_count = get_transient( 'apsc_spotify' );
if ( false === $spotify_count ) {
     if ( ! empty( $id ) && strpos( $id, 'artist' ) !== false ) {
          $api_url = "https://api.spotify.com/v1/artists/$id";
     } else {
          $api_url = "https://api.spotify.com/v1/users/$id";
     }

     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );
     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
          if ( isset( $connection [ 'followers' ] [ 'total' ] ) ) {
               $count = $connection [ 'followers' ] [ 'total' ];
          } else {
               $count = $default_count;
          }
     }
     set_transient( 'apsc_spotify', $count, $cache_period );
} else {
     $count = $spotify_count;
}