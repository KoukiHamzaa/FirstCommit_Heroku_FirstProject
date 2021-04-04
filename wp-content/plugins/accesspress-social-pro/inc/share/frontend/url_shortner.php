<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
if ( $url_shortner_enable == 'yes' ) {
     $url_short = $url;
     if ( $shortner_type == 'bitly' && $bitly_username != '' && $bitly_api_key != '' ) {
          $url = self::short_bitly( $url_short, $bitly_username, $bitly_api_key );
     }

     if ( $shortner_type == 'rebrandly' && $rebrandly_domain_id != '' && $rebrandly_api_key != '' ) {
          $url = self::short_rebrandly( $url_short, $rebrandly_domain_id, $rebrandly_api_key );
     }

     if ( $shortner_type == 'post' && $post_api_key != '' ) {
          $url = self::short_post( $url_short, $post_api_key );
     }

     if ( $shortner_type == 'wp_function' ) {
          $url = self::short_wp_function( $url_short );
     }
     $url = urlencode( $url );
}