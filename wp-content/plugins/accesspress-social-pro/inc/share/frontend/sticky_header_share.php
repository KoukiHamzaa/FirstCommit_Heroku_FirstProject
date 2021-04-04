<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
include('apss-variable.php');
?>

<div class='apss-sticky-header-wrapper apss-social-share apss-theme-<?php echo $icon_set_value ?>'>
     <div class='apss-header-logo'><img src='<?php echo $sticky_header_site_logo; ?>' /></div>
     <div class='apss-sticky-social-shares-wrapper'>
          <?php
          $url = (get_permalink() != FALSE) ? get_permalink() : APSS_Class:: curPageURL();
          $total_count = 0;
          if ( isset( $options[ 'social_networks' ] ) && ! empty( $options[ 'social_networks' ] ) ) {
               foreach ( $options[ 'social_networks' ] as $key => $value ) {
                    include('apss-share.php');
               }
               do_action( 'apss_more_networks' );
          }
          ?>
     </div>
     <div class='apss-sticky-total-share-count'>
          <?php $formatted_count = APSS_Class:: get_formatted_count( $total_count, $counter_type_options ); ?>
          <span class='apss-count-number'><?php echo $formatted_count; ?></span>
          <span class='apss-shares-text'><?php echo _e( ' Shares', APSS_TEXT_DOMAIN ); ?></span>
     </div>
     <span class="apss-sticky-header-close"> x </span>
</div>