
<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'default_count' ] : 0;
$feedly_url = (isset( $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'url' ] ) && $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'url' ] != '') ? urlencode( $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'url' ] ) : '';

$feedly_count = get_transient( 'apsc_feedly' );
if ( false === $feedly_count ) {
     $api_url = ( 'http://cloud.feedly.com/v3/feeds/feed/' . $feedly_url );
     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );

     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
          $count = $default_count;
     } else {
          $response = json_decode( $connection[ 'body' ], true );
          if ( is_array( $response ) && isset( $response [ 'subscribers' ] ) ) {
               $count = $response [ 'subscribers' ];
          } else {
               $count = $default_count;
          }
     }
     set_transient( 'apsc_feedly', $count, $cache_period );
} else {
     $count = $feedly_count;
}

