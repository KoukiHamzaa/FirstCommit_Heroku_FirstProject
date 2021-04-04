<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

$title = str_replace( ' ', '%20', $title );
$title = str_replace( "'", '%27', $title );
$title = str_replace( "\"", '%22', $title );
$title = str_replace( '#', '%23', $title );
$title = str_replace( '+', '%2B', $title );
$title = str_replace( '$', '%24', $title );
$title = str_replace( '&', '%26', $title );
$title = str_replace( ',', '%2C', $title );
$title = str_replace( '/', '%2F', $title );
$title = str_replace( ':', '%3A', $title );
$title = str_replace( ';', '%3B', $title );
$title = str_replace( '=', '%3D', $title );
$title = str_replace( '?', '%3F', $title );
$title = str_replace( '@', '%40', $title );
$title = str_replace( '\%27', '%27', $title );


$link = sprintf( 'https://www.yammer.com/messages/new?login=true&amp;trk_event=yammer_share&amp;status=%1$s %2$s', $title, urlencode( $url ) );

