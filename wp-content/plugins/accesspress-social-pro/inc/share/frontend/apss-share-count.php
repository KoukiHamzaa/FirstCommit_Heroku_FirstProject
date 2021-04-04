<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
// disable count for digg, email, messenger, print, sms, tumblr, viber, weibo, whatsapp, zing

$no_counter_networks = array( 'digg', 'email', 'messenger', 'print', 'sms', 'tumblr', 'viber', 'weibo', 'whatsapp', 'zing' );
if ( ! in_array( $key, $no_counter_networks ) ) {
     $count = APSS_Class::get_count( $key, $url );

     if ( isset( $http_url_checked ) && $http_url_checked == '1' ) {
          $url_check = parse_url( $url );
          if ( $url_check[ 'scheme' ] == 'https' ) {
               $url1 = APSS_Class::get_http_url( $url );
               $http_count = APSS_Class::get_count( $key, $url1 );
               if ( $count != $http_count ) {
                    $count += $http_count;
               } else {
                    $count = $count;
               }
          }
     }
     $formatted_count = APSS_Class :: get_formatted_count( $count, $counter_type_options );
} else {
     $count = 0;
}

