<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
//OLD FLOATING TEMPLATE (1 to 6)
?>
<div class="apsc-floating-sidebar  <?php echo $count_class; ?> apsc-sidebar-<?php echo $floating_sidebar[ 'theme' ]; ?> apsc-sidebar-<?php echo $floating_sidebar[ 'position' ]; ?><?php if ( isset( $floating_sidebar[ 'semi_transparent' ] ) && $floating_sidebar[ 'semi_transparent' ] == '1' ) { ?> apsc-semi-transparent <?php } ?>">
     <div class="float-wrap">
          <div class="apsc-floating-social-networks clearfix">
               <?php
               $total_count = 0;
               foreach ( $apsc_settings[ 'profile_order' ] as $social_profile ) {
                    if ( isset( $apsc_settings[ 'social_profile' ][ $social_profile ][ 'active' ] ) && $apsc_settings[ 'social_profile' ][ $social_profile ][ 'active' ] == 1 ) {
                         $profile_count = $this -> get_count( $social_profile );
                         $total_count = $total_count + $profile_count;
                         $count = $this -> get_formatted_count( $profile_count, $counter_format );
                         ?>
                         <div class="apsc-each-profile <?php
                         if ( isset( $hide_count ) && $hide_count == '1' ) {
                              echo "apsc-hide-count";
                         }

                         if ( $social_profile == 'googlePlus' ) {
                              $network = 'google-plus';
                         } else {
                              $network = $social_profile;
                         }
                         ?>">
                                   <?php
                                   include(SC_PRO_PATH . '/frontend/template.php');
                                   ?>
                              <a  class="apsc-<?php echo $network ?>-icon clearfix" href="<?php echo $social_profile_url; ?>" target="_blank" >
                                   <div class="apsc-inner-block">
                                        <span class="social-icon">
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

                                             <i class="fa <?php echo $fa_class ?> apsc-<?php echo $social_profile ?>"></i>
                                             <span class="media-name"><?php echo _e( '<?php echo $social_profile ?>', APSC_TD ); ?></span>
                                        </span>
                                        <?php
                                        if ( isset( $hide_count ) && $hide_count != '1' ) {
                                             ?>
                                             <span class="apsc-count"><?php echo $count; ?></span>
                                             <span class="apsc-media-type">
                                                  <?php
                                                  if ( $social_profile == 'linkedin' ) {
                                                       _e( $linkedin_counter_type, APSC_TD );
                                                  } else {
                                                       _e( 'Followers', APSC_TD );
                                                  }
                                                  ?>
                                             </span>
                                             <?php
                                        }
                                        ?>
                                   </div>
                              </a>
                         </div><?php
                    }
               }
               if ( isset( $apsc_settings[ 'total_count' ] ) && $apsc_settings[ 'total_count' ] == 1 ) {
                    ?>
     <?php if ( isset( $hide_count ) && $hide_count != '1' ) { ?>
                         <div class="apsc-each-profile">
                              <a href="javascript:void(0)" class="apsc-total-icon apsc-icon-soc clearfix" target="_blank">
                                   <div class="apsc-inner-block">
                                        <span class="social-icon"><span class="apsc-fa-icon"><span class="apsc-total-text"><?php echo _e( 'Total', APSC_TD ); ?></span></span><span class="media-name"><span class="apsc-social-name"><?php echo _e( 'Total', APSC_TD ); ?></span></span></span>
                                        <span class="apsc-count"><?php echo $this -> get_formatted_count( $total_count, $apsc_settings[ 'counter_format' ] ); ?></span><span class="apsc-media-type"></span>
                                   </div>
                              </a>
                         </div>
                    <?php } ?>
                    <?php
               }

               if ( isset( $floating_sidebar[ 'hover_color' ] ) && $floating_sidebar[ 'hover_color' ] != '' ) {
                    ?>
                    <style>
                         .apsc-floating-sidebar .apsc-each-profile a:hover{background:<?php echo $floating_sidebar[ 'hover_color' ]; ?> !important;}
                    </style>
                    <?php
               }
               ?>
          </div>
     </div>
     <div class='apsc-floating-bar-show-hide' data-status="not_clicked"></div>
</div>