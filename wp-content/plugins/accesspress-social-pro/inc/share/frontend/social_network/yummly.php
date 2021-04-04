<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
//$link = sprintf( 'http://www.yummly.com/urb/verify?url=%2$s&title=%3$s&image=%1$s&yumtype=button', $share [ 'image' ], $share [ 'url' ], $share [ 'title' ], $share [ 'description' ] );

$link = sprintf( 'http://www.yummly.com/urb/verify?url=%1$s&title=%2$s&yumtype=button', $url, $title );
