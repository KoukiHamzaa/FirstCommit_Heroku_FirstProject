<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
if ( strpos( $options[ 'apss_email_body' ], '%%' ) || strpos( $options[ 'apss_email_subject' ], '%%' ) ) {
     $link = 'mailto:?subject=' . $options[ 'apss_email_subject' ] . '&amp;body=' . $options[ 'apss_email_body' ];
     $link = preg_replace( array( '#%%title%%#', '#%%siteurl%%#', '#%%permalink%%#', '#%%url%%#' ), array( get_the_title(), get_site_url(), get_permalink(), $url ), $link );
} else {
     $link = 'mailto:?subject=' . $options[ 'apss_email_subject' ] . '&amp;body=' . $options[ 'apss_email_body' ] . ": " . $url;
}

