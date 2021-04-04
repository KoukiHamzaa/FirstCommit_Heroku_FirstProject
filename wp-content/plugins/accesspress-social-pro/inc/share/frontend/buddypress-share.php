<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

include('apss-variable.php');

$activity_type = bp_get_activity_type();
$url = $activity_link = bp_get_activity_thread_permalink();
$title = $activity_title = bp_get_activity_feed_item_title();
$total_count = 0;
foreach ( $options[ 'social_networks' ] as $key => $value ) {
     include('apss-share.php');
}

do_action( 'apss_more_networks' );
