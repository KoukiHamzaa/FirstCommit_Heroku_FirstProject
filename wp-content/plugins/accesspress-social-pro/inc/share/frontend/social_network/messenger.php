<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$sms_title = $title;
$encode_url = urlencode( $url );
$link = "fb-messenger://share/?link=$encode_url";
