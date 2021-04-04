<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

if ( $url_shortner == 'only' ) {
     include(APSS_PLUGIN_PATH . 'inc/share/frontend/url_shortner.php');
}
if ( isset( $twitter_user ) && $twitter_user != '' ) {
     $twitter_user = 'via=' . $twitter_user;
}
$link = "https://twitter.com/intent/tweet?text=$title&amp;url=$url&counturl=$url&amp;$twitter_user";
