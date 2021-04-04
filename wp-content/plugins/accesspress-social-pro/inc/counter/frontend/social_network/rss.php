<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?><?php

$rss_count = get_transient( 'apsc_rss' );
$default_count = (isset( $apsc_settings[ 'social_profile' ][ 'rss' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'rss' ][ 'default_count' ] != '') ? $apsc_settings[ 'social_profile' ][ 'rss' ][ 'default_count' ] : 0;
$count = $default_count;
