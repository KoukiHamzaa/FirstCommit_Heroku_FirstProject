<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$twitter_count = get_transient( 'apsc_twitter' );
$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'default_count' ] : 0;
if ( false === $twitter_count ) {
     $count = $this -> get_twitter_count();
     $count = ($count == 0) ? $default_count : $count;
     set_transient( 'apsc_twitter', $count, $cache_period );
} else {
     $count = $twitter_count;
}
