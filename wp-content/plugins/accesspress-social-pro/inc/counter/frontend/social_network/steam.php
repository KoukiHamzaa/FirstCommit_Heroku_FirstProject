<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'steam' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'steam' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'steam' ][ 'default_count' ] : 0;
$steam_count = get_transient( 'apsc_steam' );

if ( false === $steam_count ) {
     $stream_group_name = (isset( $apsc_settings[ 'social_profile' ][ 'steam' ][ 'group_name' ] ) && $apsc_settings[ 'social_profile' ][ 'steam' ][ 'group_name' ] != ' ') ? $apsc_settings[ 'social_profile' ][ 'steam' ][ 'group_name' ] : '';
     $api_url = 'http://steamcommunity.com/groups/' . $stream_group_name . '/memberslistxml/?xml=1';
     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );
     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) || '400' <= $connection[ 'response' ][ 'code' ] ) {
          $count = $default_count;
     } else {
          try {
               $xml = @new SimpleXmlElement( $connection[ 'body' ], LIBXML_NOCDATA );
               $count = intval( $xml -> groupDetails -> memberCount );
               //set_transient('apsc_steam', $count,$cache_period);
          } catch ( Exception $e ) {
               $count = $default_count;
          }
     }
     set_transient( 'apsc_dribbble', $count, $cache_period );
} else {
     $count = $steam_count;
}
