<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
include('apss-variable.php');
?>
<div class='apss-popup-overlay' id='apss-popup-overlay-all-shares-start' style="display:none"></div>
<div class='apss-social-share-popup-all-shares apss-social-share apss-theme-2 clearfix' style="display:none">
     <span class='apss_share_popup'><?php echo _e( $options[ 'popup_options' ][ 'share_text' ], APSS_TEXT_DOMAIN ); ?></span>
     <div class='apss_popup_all_wrapper'>
          <?php
          foreach ( $options[ 'social_networks' ] as $key => $value ) {
               include('apss-share.php');
          }
          do_action( 'apss_more_networks' );
          ?>
     </div>
</div>