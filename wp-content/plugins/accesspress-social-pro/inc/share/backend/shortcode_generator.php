<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>

<div class="apss-wrapper-block">
     <div class="apss-setting-header clearfix">
          <div class="apss-headerlogo">
               <img src="<?php echo APSS_IMAGE_DIR; ?>/logo-old.png" alt="<?php esc_attr_e( 'AccessPress Social Pro', APSS_TEXT_DOMAIN ); ?>" />
          </div>
     </div>

     <div class="apps-wrap apps-shortcode-generator">
          <div class="apss-setting-outer-wrap">
               <ul class="apss-setting-tabs clearfix">
                    <li class="apss-shortcode-generator-settings-li">
                         <a href="#shortcode_generator_settings" data-link="shortcode_generator_settings" id="apss-share-shortcode-settings" class="apss-shortcode-tabs-trigger apss-active-tab">
                              <?php _e( 'Social Share', APSS_TEXT_DOMAIN ); ?>
                         </a>
                         <ul class="apss-sg-ul-wrapper" styel="display:none;" >
                              <li>
                                   <a href="#" data-link="social-network-settings" id="apss-social-network-settings" class="apss-share-sc apss-active-tab ">
                                        <?php _e( 'Social Network Settings', APSS_TEXT_DOMAIN ); ?>
                                   </a>
                              </li>
                              <li>
                                   <a href="#" data-link="display-settings" id="display-settings" class="apss-share-sc">
                                        <?php _e( 'Display Settings', APSS_TEXT_DOMAIN ) ?>
                                   </a>
                              </li>
                              <li>
                                   <a href="#" data-link="miscellaneous-settings" id="apss-miscellaneous-settings" class="apss-share-sc">
                                        <?php _e( 'Miscellaneous Settings', APSS_TEXT_DOMAIN ); ?>
                                   </a>
                              </li>
                              <li>
                                   <a href="#" data-link="custom-text-settings" id="apss-custom-text-settings" class="apss-share-sc">
                                        <?php _e( 'Custom Text Settings', APSS_TEXT_DOMAIN ); ?>
                                   </a>
                              </li>
                         </ul>
                    </li>
                    <li class="apss-social-counter-li">
                         <a href="#" data-link="counter_shortcode_generator_settings" id="apss-count-shortcode-settings" class="apss-shortcode-tabs-trigger">
                              <?php _e( 'Social counter', APSS_TEXT_DOMAIN ); ?>
                         </a>
                    </li>
               </ul>
               <div class="apss-wrapper">
                    <?php
                    include('tabs/share-shortcode-generator.php');
                    include('tabs/counter-shortcode-generator.php');
                    ?>
               </div>
          </div>
     </div>
</div>