<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
//NEW FLOATING TEMPLATE (7 onwards)
?>
<div class="apsc-floating-sidebar  <?php echo $count_class; ?> apsc-<?php echo $floating_sidebar[ 'theme' ]; ?> apsc-sidebar-<?php echo $floating_sidebar[ 'position' ]; ?><?php if ( isset( $floating_sidebar[ 'semi_transparent' ] ) && $floating_sidebar[ 'semi_transparent' ] == '1' ) { ?> apsc-semi-transparent <?php } ?>">
     <div class="float-wrap">
          <div class="apsc-floating-social-networks clearfix">
<?php if ( $floating_sidebar[ 'theme' ] == 'theme-24' || $floating_sidebar[ 'theme' ] == 'theme-25' ) { ?>
                    <div class="apsc-float-click">
                         <i class="fa fa-share-alt"></i>
                    </div>
                    <div class="apsc-floating-button-wrap ">
                         <?php
                    }

                    $total_count = 0;
                    foreach ( $apsc_settings[ 'profile_order' ] as $social_profile ) {
                         if ( isset( $apsc_settings[ 'social_profile' ][ $social_profile ][ 'active' ] ) && $apsc_settings[ 'social_profile' ][ $social_profile ][ 'active' ] == 1 ) {
                              $profile_count = $this -> get_count( $social_profile );
                              $total_count = $total_count + $profile_count;
                              $count = $this -> get_formatted_count( $profile_count, $counter_format );
                              if ( $social_profile == 'googlePlus' ) {
                                   $network = 'google-plus';
                              } else {
                                   $network = $social_profile;
                              }
                              ?>
                              <div class="apsc-<?php echo $network ?> apsc-single-icon">
                                   <?php
                                   include(SC_PRO_PATH . '/frontend/template.php');
                                   ?>
                                   <a  href="<?php echo $social_profile_url ?>" target="_blank">
                                        <div class='apsc-icon-block'>
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

                                             <span class='apsc-social-text'>
                                                  <span class="apsc-social-name"><?php echo _e( $social_profile, APSC_TD ); ?></span>
                                             </span>
                                             <span class='apsc-follow'>
          <?php echo _e( 'Follow', APSC_TD ); ?>
                                             </span>

          <?php if ( $hide_count != '1' ) { ?>
                                                  <div class='apsc-count-wrapper'>
                                                       <span class="apsc-count"><?php echo $count; ?></span>
                                                       <span class="apsc-media-type"><?php echo _e( 'Followers', APSC_TD ); ?></span>
                                                  </div>
          <?php } ?>

                                        </div>
                                        <div class="apsc-hover-content-wrap">
          <?php if ( $hide_count != '1' ) { ?>

                                                  <div class='count apsc-count' >
               <?php echo $count; ?>
                                                  </div>

                                                  <?php } ?>
                                             <div class="apsc-hover-text">
          <?php echo "Followers"; ?>
                                             </div>
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
                    if ( $floating_sidebar[ 'theme' ] == 'theme-24' || $floating_sidebar[ 'theme' ] == 'theme-25' ) {
                         ?>
                    </div>
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
     <?php
     if ( $floating_sidebar[ 'theme' ] != 'theme-24' && $floating_sidebar[ 'theme' ] != 'theme-25' ) {
          ?>
          <div class='apsc-floating-bar-show-hide' data-status="not_clicked"></div>
<?php } ?>

</div>