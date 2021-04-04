<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="apsc-boards-tabs" id="apsc-board-display-settings" style="display: none">
     <div class="apsc-tab-wrapper">
          <div class="apsc-option-inner-wrapper apsc-row-odd">
               <label><?php _e( 'Social Profile Order', 'ap-social-pro' ); ?></label>
               <div class="apsc-option-field">
                    <div class="apsc-sortable">
                         <?php
                         $social_profiles_ref = array( 'facebook' => 'Facebook',
                             'twitter' => 'Twitter',
                             'googlePlus' => 'Google Plus',
                             'instagram' => 'Instagram',
                             'soundcloud' => 'SoundCloud',
                             'dribbble' => 'Dribbble',
                             'youtube' => 'Youtube',
                             'steam' => 'Steam',
                             'vimeo' => 'Vimeo',
                             'pinterest' => 'Pinterest',
                             'forrst' => 'Forrst',
                             'vk' => 'VK',
                             'flickr' => 'Flickr',
                             'behance' => 'Behance',
                             'github' => 'Github',
                             'envato' => 'Envato',
                             'posts' => 'Posts',
                             'comments' => 'Comments',
                             'linkedin' => 'LinkedIn',
                             'rss' => 'RSS',
                             'spotify' => 'Spotify',
                             'twitch' => 'Twitch',
                             'feedly' => 'Feedly',
                             'slideshare' => 'Slideshare',
                             'foursquare' => 'Foursquare',
                             'delicious' => 'Delicious',
                             'weheartit' => 'Weheartit',
                         );

                         $social_profiles = $apsc_settings[ 'profile_order' ];
                         foreach ( $social_profiles as $social_profile ) {
                              ?>
                              <div class="apsc-sortable-elements-wrap apsc-clearfix">
                                   <span class="apsc-left-icon fa fa-arrows"></span>
                                   <span class="social-name apsc_social_name_<?php echo $social_profile; ?>"><?php _e( $social_profiles_ref[ $social_profile ], 'ap-social-pro' ); ?></span>
                                   <input type="hidden" name="profile_order[]" value="<?php echo $social_profile; ?>"/>
                              </div>
                              <?php
                         }
                         ?>
                    </div>
                    <div class="apsc-option-note"><?php _e( 'Set the order in which you want the social networking buttons to be displayed in the frontend by dragging them', 'ap-social-pro' ); ?></div>
               </div>
          </div>

          <div class="apsc-option-inner-wrapper apsc-row-even">
               <label for="apsc-display-counter"><?php _e( 'Hide counter', 'ap-social-pro' ); ?></label>
               <div class="apsc-option-field">
                    <label  class="apsc-checkbox" >
                         <input type="checkbox" name="hide_count" value="1" id="apsc-display-counter" <?php
                         if ( isset( $apsc_settings[ 'hide_count' ] ) ) {
                              checked( $apsc_settings[ 'hide_count' ], true );
                         }
                         ?>/>
                         <label class="apsc-general-checkbox" for="apsc-display-counter">
                              <?php _e( 'Yes', 'ap-social-pro' ); ?>
                         </label>
                         <div class="apsc-check round"></div>
                    </label>
                    <div class="apsc-option-note"><?php _e( 'Check this if you want to hide the (fan/followers) counts', 'ap-social-pro' ); ?></div>

               </div>
          </div>
          <div class="apsc-option-inner-wrapper apsc-row-odd">
               <label><?php _e( 'Counter Format', 'ap-social-pro' ); ?></label>
               <div class="apsc-option-field">
                    <label><input type="radio" name="counter_format" value="default" <?php echo (isset( $apsc_settings[ 'counter_format' ] ) && $apsc_settings[ 'counter_format' ] == 'default') ? 'checked="checked"' : ''; ?>/>12300</label>
                    <label><input type="radio" name="counter_format" value="comma" <?php echo (isset( $apsc_settings[ 'counter_format' ] ) && $apsc_settings[ 'counter_format' ] == 'comma') ? 'checked="checked"' : ''; ?>/>12,300</label>
                    <label><input type="radio" name="counter_format" value="short" <?php echo (isset( $apsc_settings[ 'counter_format' ] ) && $apsc_settings[ 'counter_format' ] == 'short') ? 'checked="checked"' : ''; ?>/>12.3K</label>
                    <div class="apsc-option-note"><?php _e( 'Select any one of the above counter format for your social networking buttons', 'ap-social-pro' ); ?></div>

               </div>
          </div>
          <div class="apsc-option-inner-wrapper apsc-row-even">
               <label for="apsc-show-total-count"><?php _e( 'Show Total Count', 'ap-social-pro' ); ?></label>
               <div class="apsc-option-field">
                    <label  class="apsc-checkbox" >
                         <input type="checkbox" name="total_count" value="1" id="apsc-show-total-count" <?php checked( $apsc_settings[ 'total_count' ], true ); ?>/>

                         <label class="apsc-general-checkbox" for="apsc-show-total-count">
                              <?php _e( 'Yes', 'ap-social-pro' ); ?>
                         </label>
                         <div class="apsc-check round"></div>
                         <div class="apsc-option-note"><?php _e( 'Check this if you want to show the total number of counts at the end', 'ap-social-pro' ); ?></div>

                    </label>
               </div>
          </div>
          <div class="apsc-option-inner-wrapper apsc-row-odd">
               <label><?php _e( 'Choose Theme', 'ap-social-pro' ); ?></label>
               <div class="apsc-option-field apsc-theme-block">
                    <select name="social_profile_theme" id="icon-template" class="apsc-display template-dropdown" size="1" >
                         <?php for ( $i = 1; $i <= 42; $i ++ ) { ?>
                              <option class="apsc-temp" value="theme-<?php echo $i; ?>" <?php if ( isset( $apsc_settings[ 'social_profile_theme' ] ) && $apsc_settings[ 'social_profile_theme' ] == "theme-$i" ) { ?>selected="selected"<?php } ?>>
                                   <?php
                                   _e( 'Theme ' . $i, 'ap-social-pro' );
                                   ?>
                              </option>
                         <?php }
                         ?>
                    </select>
                    <div class="apsc-template-demo" >
                         <?php
                         $cnt = 1;
                         for ( $i = 1; $i <= 42; $i ++ ) {
                              ?>
                              <div class="apsc-common" id="apsc-temp-demo-<?php echo $cnt; ?>" <?php if ( $cnt != 1 ) { ?>style="display:none;"<?php } ?>>
                                   <div class="apsc-preview"> Preview </div>
                                   <div class="apsc-display-template apsc-clearfix">
                                        <img src="<?php echo SC_PRO_IMAGE_DIR . '/themes/theme-' . $i . '.jpg'; ?>"/>
                                   </div>
                              </div>
                              <?php
                              $cnt ++;
                         }
                         ?>
                    </div>
                    <div class="apsc-option-note"><?php _e( 'Select any one of the above template/theme for your social networking buttons', 'ap-social-pro' ); ?></div>

               </div>
          </div>
          <?php
          $template = array( 'theme-21', 'theme-22', 'theme-23', 'theme-24', 'theme-25', 'theme-26', 'theme-27', 'theme-28', 'theme-29', 'theme-30', 'theme-31', 'theme-32', 'theme-33', 'theme-34', 'theme-35', 'theme-36', 'theme-37', 'theme-38', 'theme-39', 'theme-40', 'theme-41', 'theme-42' );
          ?>
          <div id="apsc-counter-ani-div" class="apsc-option-inner-wrapper apsc-row-even" <?php echo ( isset( $apsc_settings[ 'social_profile_theme' ] ) && in_array( $apsc_settings[ 'social_profile_theme' ], $template ) ) ? 'style="display:none;"' : 'style="display:block;"' ?>>
               <label><?php _e( 'Icon Hover Animations', 'ap-social-pro' ); ?></label>
               <div class="apsc-option-field">
                    <select name="icon_hover_animation">
                         <option value=""><?php _e( 'No Animation', 'ap-social-pro' ); ?></option>
                         <?php for ( $i = 1; $i <= 5; $i ++ ) {
                              ?>
                              <option value="apsc-animation-<?php echo $i; ?>" <?php echo (isset( $apsc_settings[ 'icon_hover_animation' ] ) && $apsc_settings[ 'icon_hover_animation' ] == 'apsc-animation-' . $i) ? 'selected="selected"' : ''; ?>>Animation-<?php echo $i; ?></option>
                              <?php
                         }
                         ?>
                    </select>
                    <div class="apsc-option-note"><?php _e( 'Select any one of the above animation for your social networking buttons', 'ap-social-pro' ); ?></div>
               </div>
          </div>
     </div>
</div>