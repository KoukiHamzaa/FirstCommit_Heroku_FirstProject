<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

$link = sprintf( 'https://getpocket.com/save?title=%1$s&url=%2$s', $title, urlencode( $url ) );
