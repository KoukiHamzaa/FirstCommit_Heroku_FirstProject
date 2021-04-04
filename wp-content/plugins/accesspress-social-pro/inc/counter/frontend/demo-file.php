<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

/* Demo Code Starts here */
if ( isset( $_GET[ 'page' ] ) && ($_GET[ 'page' ]) != '' ) {
     $page = $_GET[ 'page' ];
     if ( $page == 'count_inline' ) {
          if ( isset( $_GET[ 'type' ] ) && ($_GET[ 'type' ]) != '' ) {
               $count_inline = $_GET[ 'type' ];
          } else {
               $count_inline = '';
          }
          $apsc_settings[ 'social_profile_theme' ] = "theme-$count_inline";
     }
     if ( $page == 'count_float' ) {
          if ( isset( $_GET[ 'type' ] ) && ($_GET[ 'type' ]) != '' ) {
               $count_float = $_GET[ 'type' ];
          } else {
               $count_float = '';
          }

          if ( isset( $_GET[ 'position' ] ) && ($_GET[ 'position' ]) != '' ) {
               $count_float_position = $_GET[ 'position' ];
          } else {
               $count_float_position = 'left-middle';
          }

          $floating_sidebar[ 'theme' ] = "theme-$count_float";
          $floating_sidebar[ 'position' ] = $count_float_position;
     }
}

/* Demo Code Ends here */
