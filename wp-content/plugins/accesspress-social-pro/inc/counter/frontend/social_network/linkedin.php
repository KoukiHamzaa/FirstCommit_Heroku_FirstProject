<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

$linkedin_count = get_transient( 'apsc_linkedin' );
$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'default_count' ] : 0;

if ( false === $linkedin_count ) {
     $count = $default_count;
     set_transient( 'apsc_envato', $count, $cache_period );
} else {
     $count = $linkedin_count;
}