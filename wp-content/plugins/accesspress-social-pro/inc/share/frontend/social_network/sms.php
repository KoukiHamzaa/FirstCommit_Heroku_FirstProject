<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$sms_title = $title;
$encode_url = urlencode( $url );
// $link = "viber://forward?text=$sms_title $encode_url";
$link = "sms:?body=$title $encode_url";

