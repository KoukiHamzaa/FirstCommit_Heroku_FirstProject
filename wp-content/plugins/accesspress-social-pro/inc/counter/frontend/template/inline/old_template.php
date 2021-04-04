<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
//OLD TEMPLATE  (1 to 21)
?>
<div class="apsc-icons-wrapper <?php echo (isset( $atts[ 'custom_class' ] )) ? $atts[ 'custom_class' ] : ''; ?> apsc-<?php echo $apsc_settings[ 'social_profile_theme' ] . $animation_class; ?>" data-hover-color="<?php echo $apsc_settings[ 'icon_hover_color' ]; ?>">
     <?php
     $total_count = 0;
     foreach ( $apsc_settings[ 'profile_order' ] as $social_profile ) {
          if ( isset( $apsc_settings[ 'social_profile' ][ $social_profile ][ 'active' ] ) && $apsc_settings[ 'social_profile' ][ $social_profile ][ 'active' ] == 1 ) {
               $profile_count = $this -> get_count( $social_profile );
               $total_count = $total_count + $profile_count;
               $count = $this -> get_formatted_count( $profile_count, $apsc_settings[ 'counter_format' ] );
               ?>
               <div class="apsc-each-profile <?php
               if ( $hide_count == '1' ) {
                    echo "apsc-hide-count";
               }
               ?>">
                         <?php
                         include(SC_PRO_PATH . '/frontend/template.php');
                         if ( $social_profile == 'googlePlus' ) {
                              $network = 'google-plus';
                         } else {
                              $network = $social_profile;
                         }
                         ?>
                    <a  class='apsc-<?php echo $network; ?>-icon apsc-icon-soc clearfix' href="<?php echo $social_profile_url ?>" target="_blank">
                         <div class="apsc-inner-block">
                              <span class="social-icon">
                                   <span class="apsc-fa-icon">
                                        <?php
                                        if ( $social_profile == 'vimeo' ) {
                                             $fa_class = "fa-vimeo-square";
                                        } else if ( $social_profile == 'posts' ) {
                                             $fa_class = 'fa-edit';
                                        } else if ( $social_profile == 'googlePlus' ) {
                                             $fa_class = 'fa-google-plus';
                                        } else {
                                             $fa_class = "fa-$social_profile";
                                        }
                                        ?>
                                        <i class="fa <?php echo $fa_class; ?> apsc-<?php echo $social_profile ?>"></i>
                                   </span>
                                   <span class="media-name">
                                        <span class="apsc-social-name"><?php echo _e( $social_profile, APSC_TD ); ?></span>
                                   </span>
                              </span>
          <?php if ( $hide_count != '1' ) { ?>
                                   <div class='apsc-count-wrapper'>
                                        <span class="apsc-count"><?php echo $count; ?></span>
                                        <span class="apsc-media-type"><?php echo _e( 'Followers', APSC_TD ); ?></span>
                                   </div>
          <?php } ?>
                         </div>
                    </a>
                    <a  class = "apsc-bttn-bg" href="<?php echo $social_profile_url ?>" target="_blank">
                         <div class="apsc_bttn">
          <?php echo _e( 'follow', APSC_TD ); ?>
                         </div>
                    </a>
               </div><?php
          }
     }
     if ( isset( $apsc_settings[ 'total_count' ] ) && $apsc_settings[ 'total_count' ] == 1 ) {
          ?>
          <div class="apsc-each-profile">
               <a href="javascript:void(0)" class="apsc-total-icon apsc-icon-soc clearfix" target="_blank">
                    <div class="apsc-inner-block">
                         <span class="social-icon"><span class="apsc-fa-icon"><span class="apsc-total-text"><?php echo _e( 'Total', APSC_TD ); ?></span></span><span class="media-name"><span class="apsc-social-name"><?php echo _e( 'Total', APSC_TD ); ?></span></span></span>
                         <?php if ( $hide_count != '1' ) { ?>
                              <div class='apsc-count-wrapper'><span class="apsc-count"><?php echo $this -> get_formatted_count( $total_count, $apsc_settings[ 'counter_format' ] ); ?></span><span class="apsc-media-type"></span></div>
     <?php } ?>
                    </div>
               </a>
               <a class="apsc-bttn-bg" href="javascript:void(0);" target="_blank"><div class="apsc_bttn"><?php echo _e( 'total', APSC_TD ); ?></div></a>
          </div>
          <?php
     }
     ?>

</div>