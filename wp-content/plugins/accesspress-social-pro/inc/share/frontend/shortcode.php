<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

include(APSS_PLUGIN_PATH . 'inc/share/frontend/apss-variable.php');
include(APSS_PLUGIN_PATH . 'inc/share/frontend/apss-shortcode-variable.php');

if ( isset( $atts[ 'inline' ] ) && $atts[ 'inline' ] == 'enable' ) {
     include('shortcode_inline.php');
}

if ( isset( $atts[ 'floating' ] ) && $atts[ 'floating' ] == 'enable' ) {
     include('floating_sidebar.php');
}

if ( isset( $atts[ 'popup' ] ) && $atts[ 'popup' ] == 'enable' ) {
     include('popup_share.php');
}
if ( isset( $atts[ 'flyin' ] ) && $atts[ 'flyin' ] == 'enable' ) {
     include('flyin_share.php');
}