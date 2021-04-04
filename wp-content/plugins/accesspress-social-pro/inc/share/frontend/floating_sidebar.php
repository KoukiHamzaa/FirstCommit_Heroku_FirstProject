<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
if ( isset( $enabled ) && $enabled == '1' ) {
     ?>
     <div class="apsp_share_float_main_demo_wrapper">
          <?php //echo $counter_enable_options; ?>
          <div class='<?php echo $class; ?> apss-social-share-sidebar apss-theme-<?php echo $theme; ?> <?php if ( $counter_enable_options == '1' ) { ?> counter-enable <?php } ?> <?php if ( $total_count == '1' ) { ?> total-counter-enable <?php } ?> clearfix apss-sidebar-<?php echo $position; ?> <?php if ( $semi_transparent == '1' ) { ?> apss-semi-transparent <?php } ?>' data-position='<?php echo $position; ?>' data-theme='<?php echo $theme; ?>'>
               <div class="float-wrap">
                    <div class='apss-floating-social-networks clearfix' >
                         <?php if ( $theme == '27' || $theme == '28' || $theme == '29' ) { ?>
                              <div class="apss-float-click">
                                   <i class="fa fa-share-alt"></i>
                              </div>
                              <div class="apss-floating-button-wrap ">
                                   <?php
                              }
                              $total_count = 0;

                              foreach ( $options[ 'floating_social_networks' ] as $key => $value ) {
                                   include('apss-share.php');
                              }

                              do_action( 'apss_more_networks' );

                              if ( isset( $show_all ) && $show_all == '1' ) {
                                   ?>
                                   <div class='apss-display-all apss-single-icon'>
                                        <a title='more' href='javascript:void(0);' class='apss-display-all-shares'>
                                             <div class='apss-icon-block clearfix'>
                                                  <i class="fa fa-plus"></i>
                                                  <span class='apss-social-text'><?php _e( 'More', APSS_TEXT_DOMAIN ); ?></span>
                                                  <span class='apss-share'><?php _e( 'More', APSS_TEXT_DOMAIN ); ?></span>
                                             </div>
                                        </a>
                                   </div>
                                   <?php
                              }
                              if ( isset( $total_count ) && $total_count == '1' ) {
                                   ?>
                                   <div class='apss-total-share-count'>
                                        <div class="apss-total-shares">
                                             <?php $formatted_count = APSS_Class:: get_formatted_count( $total_count, $counter_type_options ); ?>
                                             <span class="apss-prepend-text"><?php echo "Total" ?></span>
                                             <span class='apss-count-number'><?php echo $formatted_count; ?></span>
                                             <span class='apss-append-text'><?php echo "Shares" ?></span>
                                        </div>
                                   </div>
                                   <?php
                              }
                              if ( $theme == '27' || $theme == '28' || $theme == '29' ) {
                                   ?>
                              </div>
                         <?php }
                         ?>
                    </div>
               </div>
               <?php
               if ( $position === 'left_center' || $position === 'right_center' ) {
                    if ( $theme != '27' && $theme != '28' ) {
                         if ( isset( $enable_hide_show_button ) && $enable_hide_show_button == '1' ) {
                              ?>
                              <div class='apss-floating-bar-show-hide' data-status="not_clicked">
                              </div>
                              <?php
                         }
                    }
               }
               ?>
          </div>
     </div>
     <div class='apss-social-share-sidebar-mobile <?php if ( isset( $floating_sidebar[ 'semi_transparent' ] ) && $floating_sidebar[ 'semi_transparent' ] == '1' ) { ?> apss-semi-transparent <?php } ?>'>
          <div class='apss-social-share-sidebar-mobile-medias'>
               <div class='apss-social-share-sidebar-mobile-share-text'><?php _e( 'Share this', APSS_TEXT_DOMAIN ); ?></div>
               <?php
               foreach ( $social_networks as $key => $value ) {
                    include('apss-share.php');
               }
               do_action( 'apss_more_networks' );
               ?>
          </div>
          <div class='apss-sidebar-mobile-close'>
          </div>
     </div>
     <?php
}