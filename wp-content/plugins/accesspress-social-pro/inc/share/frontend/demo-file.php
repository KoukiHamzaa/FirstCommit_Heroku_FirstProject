<?php

/* Demo Code Starts here */
if ( isset( $_GET[ 'page' ] ) && ($_GET[ 'page' ]) != '' ) {
     $page = $_GET[ 'page' ];
     if ( $page == 'share_inline' ) {
          if ( isset( $_GET[ 'type' ] ) && ($_GET[ 'type' ]) != '' ) {
               $share_inline = $_GET[ 'type' ];
          } else {
               $share_inline = '';
          }
          $icon_set_value = $share_inline;
     }
     if ( $page == 'share_float' ) {
          if ( isset( $_GET[ 'type' ] ) && ($_GET[ 'type' ]) != '' ) {
               $share_float = $_GET[ 'type' ];
          } else {
               $share_float = '';
          }

          if ( isset( $_GET[ 'position' ] ) && ($_GET[ 'position' ]) != '' ) {
               $share_float_position = $_GET[ 'position' ];
          } else {
               $share_float_position = $position;
          }

          $theme = $share_float;
          $position = $share_float_position;
     }
     $demo_url = explode( '?', $url );
     $url = $demo_url[ 0 ];
}

/* Demo Code Ends here */
