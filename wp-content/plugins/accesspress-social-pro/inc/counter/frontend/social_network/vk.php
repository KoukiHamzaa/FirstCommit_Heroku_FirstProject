<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'vk' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'vk' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'vk' ][ 'default_count' ] : 0;
$group_id = (isset( $apsc_settings[ 'social_profile' ][ 'vk' ][ 'group_id' ] ) && $apsc_settings[ 'social_profile' ][ 'vk' ][ 'group_id' ] != '') ? $apsc_settings[ 'social_profile' ][ 'vk' ][ 'group_id' ] : '';
$vk_url = 'http://vk.com/' . $group_id;
$vk_count = get_transient( 'apsc_vk' );

$vk_count = false; // For Testing puposes

if ( false === $vk_count ) {
     //$api_url = 'https://api.vk.com/method/groups.getMembers?group_id=' . $group_id;
     //https://api.vk.com/method/users.getFollowers?fields=photo_50&version=5.33
     $params = array(
         'sslverify' => false,
         'timeout' => 60
     );

     $api_url = 'https://vk.com/share.php?act=count&url=https://demo.accesspressthemes.com/wordpress-plugins/accesspress-social-pro/';
     $connection = wp_remote_get( $api_url, $params );
     //$shares=array();
     //preg_match( '/^VK\.Share\.count\(\d, (\d+)\);$/i', $connection, $shares );
     //$count = $shares[ 1 ];
     //echo $count;
//     die( 'reached' );

     $connection = wp_remote_get( $api_url, $params );
     if ( is_wp_error( $connection ) ) {
//          die( 'error' );
          $count = $default_count;
     } else {
          $details = json_decode( $connection[ 'body' ] );
//          echo "<pre>";
//          print_r( $details );
//          echo "</pre>";
          //die( 'reached' );
          $count = isset( $details -> response -> count ) ? $details -> response -> count : $default_count;
     }
     if ( $count != 0 ) {
          set_transient( 'apsc_vk', $count, $cache_period );
     }
} else {
     $count = $vk_count;
}