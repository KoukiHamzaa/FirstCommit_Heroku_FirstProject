<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$viber_title = $title;
$encode_url = urlencode( $url );
$link = "viber://forward?text=$viber_title $encode_url";

