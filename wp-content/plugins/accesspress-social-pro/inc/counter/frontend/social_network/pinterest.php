<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'default_count' ] : 0;
$profile_url = (isset( $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'profile_url' ] ) && $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'profile_url' ] != '') ? $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'profile_url' ] : '';
$pinterest_count = get_transient( 'apsc_pinterest' );
if ( false === $pinterest_count ) {
     if ( $profile_url != '' ) {
          $metas = get_meta_tags( $profile_url );
          $count = isset( $metas[ 'pinterestapp:followers' ] ) ? $metas[ 'pinterestapp:followers' ] : $default_count;
     } else {
          $count = $default_count;
     }
     set_transient( 'apsc_pinterest', $count, $cache_period );
} else {
     $count = $pinterest_count;
}

