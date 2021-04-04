<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
$current_page_url = $this -> curPageURL();
$popup_urls = isset( $_SESSION[ 'apss_popup_urls' ] ) ? $_SESSION[ 'apss_popup_urls' ] : array();
if ( ! in_array( $current_page_url, $popup_urls ) ) {
     $hide_popup_overlay = 0;
} else {
     $hide_popup_overlay = 1;
}
?>

<div class='apss-popup-overlay <?php echo $class; ?> ' id='apss-popup-overlay-start' style="display:none;">
</div>
<div class='apss-social-share  apss-social-share-popup apss-theme-<?php echo $icon_set_value; ?> clearfix <?php echo $class; ?>' style="display:none;" data-popup-type="<?php echo $popup_type ?>" data-delay-time="<?php echo $delay_time; ?>" data-percent-viewed ="<?php echo $percent_viewed ?>" >
     <span class='apss_share_popup apss_popup_window_title'><?php echo $popup_window_title; ?></span>
     <span class='apss_share_popup apss_popup_window_message'><?php echo $popup_window_message; ?></span>
     <span id='apss_close_popup' class='apss_close_popup close'>X</span>

<!--     <p id="output" style="position:fixed; left:0; top:0; padding:10px; font-weight:bold">
          You have scrolled the page by:
     </p>-->
     <?php
     foreach ( $options[ 'social_networks' ] as $key => $value ) {
          include('apss-share.php');
     }
     do_action( 'apss_more_networks' );
     ?>
</div>
