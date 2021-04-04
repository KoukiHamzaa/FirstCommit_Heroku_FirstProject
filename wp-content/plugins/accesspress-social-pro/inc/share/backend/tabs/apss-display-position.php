<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="apss-tab-contents apss-display-settings" id="tab-apss-display-settings" style='display:none'>
     <div class="apss-subhead">
          <h2><?php _e( 'Display Settings', APSS_TEXT_DOMAIN ) ?></h2>
     </div>
     <ul class="apss-inner-tab-setting-tabs clearfix">
          <li><div data-link="inline-button-settings" id="apss-inline-button-settings" class="apss-inner-tabs-trigger apss-inner-active-tab "><?php _e( 'Inline Buttons Settings', APSS_TEXT_DOMAIN ); ?></div</li>
          <li><div data-link="floating-button-settings"  id="floating-button-settings" class="apss-inner-tabs-trigger "><?php _e( 'Floating Buttons Settings', APSS_TEXT_DOMAIN ) ?></div></li>
          <li><div data-link="popup-settings" id="apss-popup-settings" class="apss-inner-tabs-trigger"><?php _e( 'Popup Settings', APSS_TEXT_DOMAIN ); ?></div></li>
          <li><div data-link="flyin-settings" id="apss-flyin-settings" class="apss-inner-tabs-trigger"><?php _e( 'Fly in Settings', APSS_TEXT_DOMAIN ); ?></div></li>
          <li><div data-link="template-settings" id="apss-template-settings" class="apss-inner-tabs-trigger"><?php _e( 'Template Settings', APSS_TEXT_DOMAIN ); ?></div></li>
     </ul>
     <div class="apss-display-settings-wrapper apss-option-outer-wrapper" id="tab-inline-button-settings" >
          <div class="apss-element apss-abc apss-clearfix">
               <label>
                    <h1><?php _e( 'Inline Buttons Settings', APSS_TEXT_DOMAIN ) ?></h1>
               </label>
          </div>
          <div class="apss-elements-settings-wrap">
               <div class="apss-row-odd">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Display Position', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="radio" id="apss_below_content" name="apss_share_settings[social_share_position_options]" value="below_content" <?php
                                   if ( $options[ 'share_positions' ] == 'below_content' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Below content', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <label class="">
                                   <input type="radio" id="apss_above_content" name="apss_share_settings[social_share_position_options]" value="above_content" <?php
                                   if ( $options[ 'share_positions' ] == 'above_content' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Above content', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <label class="">
                                   <input type="radio" id="apss_below_above_content" name="apss_share_settings[social_share_position_options]" value="on_both" <?php
                                   if ( $options[ 'share_positions' ] == 'on_both' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Both(Below content and Above content)', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <p class="description"> <?php _e( 'Please select one of the above postions for inline share buttons', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>

               <div class="apss-row-even">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Buttons Align', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="radio" id="apss_buttons_left" name="apss_share_settings[social_share_location_options]" value="left" <?php
                                   if ( isset( $options[ 'share_locations' ] ) && $options[ 'share_locations' ] == 'left' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Left', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <label class="">
                                   <input type="radio" id="apss_buttons_right" name="apss_share_settings[social_share_location_options]"/ value="right" <?php
                                   if ( isset( $options[ 'share_locations' ] ) && $options[ 'share_locations' ] == 'right' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Right', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <label class="">
                                   <input type="radio" id="apss_buttons_center" name="apss_share_settings[social_share_location_options]" value="center" <?php
                                   if ( isset( $options[ 'share_locations' ] ) && $options[ 'share_locations' ] == 'center' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Center', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <p class="description"> <?php _e( 'Please select one of the above alignments for inline share buttons', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <div class="apss-display-settings-wrapper apss-option-outer-wrapper" id="tab-floating-button-settings" style="display:none;">    <div class="apss-element apss-abc apss-clearfix">
               <label>
                    <h1><?php _e( 'Floating Buttons Settings', APSS_TEXT_DOMAIN ) ?></h1>
               </label>
          </div>
          <div class="apss-elements-settings-wrap">
               <div class="apss-row-odd">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Enable Floating Social Share', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="radio" id='apss_floating_enable_no'  class='floating_positions_enable_disable' name="apss_share_settings[floating_sidebar][enabled]" value="0"
                                   <?php
                                   if ( isset( $options[ 'floating_sidebar' ][ 'enabled' ] ) && $options[ 'floating_sidebar' ][ 'enabled' ] == '0' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <label class="">
                                   <input type="radio" id='apss_floating_enable_yes' class='floating_positions_enable_disable' name="apss_share_settings[floating_sidebar][enabled]" value="1"
                                   <?php
                                   if ( isset( $options[ 'floating_sidebar' ][ 'enabled' ] ) && $options[ 'floating_sidebar' ][ 'enabled' ] == '1' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <p class="description"> <?php _e( "Select 'Yes' to enable the floating share buttons ", APSS_TEXT_DOMAIN ); ?> </p>
                         </div>
                    </div>
               </div>
               <div class="apss_floating_sidebar_options" <?php
               if ( isset( $options[ 'floating_sidebar' ][ 'enabled' ] ) && $options[ 'floating_sidebar' ][ 'enabled' ] == '1' ) {
                    echo "style='display:block'";
               } else {
                    echo "style='display:none'";
               }
               ?>>
                    <div class="apss-row-even">
                         <div class="apss-general-div">
                              <div class="apss-title-div">
                                   <label>
                                        <h3>  <?php _e( 'Social Network', APSS_TEXT_DOMAIN ); ?> </h3>
                                   </label>
                              </div>
                              <div class="apss-option-value apss-option-inner-wrapper">
                                   <div class="apps-opt-wrap apps-opt-wrap1 clearfix" id='apss-opt-wrap1'>

                                        <?php
                                        $label_array = array(
                                            'facebook' => ' <span class="media-icon"><i class="fa fa-facebook"></i></span> Facebook',
                                            'twitter' => ' <span class="media-icon"><i class="fa fa-twitter"></i></span> Twitter',
                                            'google-plus' => '<span class="media-icon"><i class="fa fa-google-plus"></i></span> Google Plus',
                                            'pinterest' => '<span class="media-icon"> <i class="fa fa-pinterest"></i> </span>Pinterest',
                                            'linkedin' => '<span class="media-icon"><i class="fa fa-linkedin"></i></span> Linkedin',
                                            'digg' => '<span class="media-icon"><i class="fa fa-digg"></i></span> Digg',
                                            'delicious' => '<span class="media-icon"><i class="fa fa-delicious"></i></span> Delicious',
                                            'reddit' => ' <span class="media-icon"><i class="fa fa-reddit"></i></span> Reddit',
                                            'stumbleupon' => ' <span class="media-icon"><i class="fa fa-stumbleupon"></i></span> StumbleUpon',
                                            'tumblr' => '<span class="media-icon"><i class="fa fa-tumblr"></i> </span>Tumblr',
                                            'vkontakte' => '<span class="media-icon"><i class="fa fa-vk"></i> </span>VKontakte',
                                            'xing' => '<span class="media-icon"><i class="fa fa-xing"></i> </span>Xing',
                                            'weibo' => '<span class="media-icon"><i class="fa fa-weibo"></i> </span>Weibo',
                                            'buffer' => '<span class="media-icon"><i class="fa fa-buffer"></i> </span>Buffer',
                                            'whatsapp' => '<span class="media-icon"><i class="fa fa-whatsapp"></i> </span>Whatsapp',
                                            'viber' => '<span class="media-icon"><i class="fa fa-viber"></i> </span>Viber',
                                            'sms' => '<span class="media-icon"><i class="fa fa-comment-o"></i> </span>SMS',
                                            'messenger' => '<span class="media-icon"><i class="fa fa-messenger"></i></span>Messenger',
                                            'email' => '<span class="media-icon"><i class="fa  fa-envelope"></i></span> Email',
                                            'print' => '<span class="media-icon"><i class="fa fa-print"></i> </span>Print',
                                            'blogger' => '<span class="media-icon"><i class="fa fa-bold"></i> </span>Blogger',
                                            'flipboard' => '<span class="media-icon"><i class="fa fa-flipboard"></i> </span>Flipboard',
                                            'kakao' => '<span class="media-icon"><i class="fa fa-kakao"></i> </span>Kakao',
                                            'yammer' => '<span class="media-icon"><i class="socicon-yammer"></i> </span>Yammer',
                                            'mix' => '<span class="media-icon"><i class="fa fa-mix"></i> </span>Mix',
                                            'yummly' => '<span class="media-icon"><i class="fa fa-yummly"></i> </span>Yummly',
                                            'odnoklassniki' => '<span class="media-icon"><i class="fa fa-odnoklassniki"></i> </span>Odnoklassniki',
                                            'pocket' => '<span class="media-icon"><i class="fa fa-get-pocket"></i> </span>Pocket'
                                        );
                                        ?>
                                        <?php if ( isset( $options[ 'floating_social_networks' ] ) ) { ?>
                                             <?php foreach ( $options[ 'floating_social_networks' ] as $key => $val ) {
                                                  ?>
                                                  <div class="apss-option-wrapper apss-option-wrapper1 apss-floating-<?php echo $key; ?>">
                                                       <div class="apss-option-field">
                                                            <div class='apss-select-all-label'><label class="clearfix"><span class="left-icon"><i class="fa fa-arrows"></i></span><span class="social-name"><?php echo isset( $label_array[ $key ] ) ? $label_array[ $key ] : ''; ?></span></label></div>
                                                            <div class='apss-select-all-text-field'><input type="checkbox" class='social_floating_networks_class' data-key='<?php echo $key; ?>' name="floating_social_networks[<?php echo $key; ?>]" value="1" <?php
                                                                 if ( $val == '1' ) {
                                                                      echo "checked='checked'";
                                                                 }
                                                                 ?> />
                                                            </div>
                                                       </div>
                                                  </div>
                                             <?php } ?>
                                             <input type="hidden" name="apss_floating_social_newtwork_order" id='apss_floating_social_newtwork_order' value="<?php echo implode( ',', array_keys( $options[ 'floating_social_networks' ] ) ); ?>"/>
                                        <?php } else { ?>
                                             <?php foreach ( $options[ 'social_networks' ] as $key => $val ) {
                                                  ?>
                                                  <div class="apss-option-wrapper apss-option-wrapper1">
                                                       <div class="apss-option-field">
                                                            <div class='apss-select-all-label'><label class="clearfix"><span class="left-icon"><i class="fa fa-arrows"></i></span><span class="social-name"><?php echo $label_array[ $key ]; ?></span></label></div>
                                                            <div class='apss-select-all-text-field'><input type="checkbox" class='social_floating_networks_class' data-key='<?php echo $key; ?>' name="floating_social_networks[<?php echo $key; ?>]" value="1" <?php
                                                                 if ( $val == '1' ) {
                                                                      echo "checked='checked'";
                                                                 }
                                                                 ?> />
                                                            </div>
                                                       </div>
                                                  </div>
                                             <?php } ?>
                                             <input type="hidden" name="apss_floating_social_newtwork_order" id='apss_floating_social_newtwork_order' value="<?php echo implode( ',', array_keys( $options[ 'social_networks' ] ) ); ?>"/>
                                        <?php } ?>
                                   </div>
                                   <p class="description"> <?php _e( 'Select the social medias you want to be displayed in the floating sidebar. Also, please drag drop to set an order for them', APSS_TEXT_DOMAIN ); ?> </p>
                              </div>
                         </div>
                    </div>

                    <div class="apss-row-odd">
                         <div class="apss-general-div">
                              <div class="apss-title-div">
                                   <label>
                                        <h3>  <?php _e( "Enable 'Hide/Show' Button", APSS_TEXT_DOMAIN ); ?> </h3>
                                   </label>
                              </div>
                              <div class="apss-option-value">
                                   <label class="">
                                        <input type="radio" id='apss_floating_hide_show_button_no'  class='floating_sidebar_hide_show_button' name="apss_share_settings[floating_sidebar][hide_show_button]" value="0" <?php
                                        if ( isset( $options[ 'floating_sidebar' ][ 'hide_show_button' ] ) ) {
                                             if ( $options[ 'floating_sidebar' ][ 'hide_show_button' ] == '0' ) {
                                                  echo "checked='checked'";
                                             }
                                        } else {
                                             echo "checked='checked'";
                                        }
                                        ?> />
                                               <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                                   </label>
                                   <label class="">
                                        <input type="radio" id='apss_floating_hide_show_button_yes' class='floating_sidebar_hide_show_button' name="apss_share_settings[floating_sidebar][hide_show_button]" value="1" <?php
                                        if ( isset( $options[ 'floating_sidebar' ][ 'hide_show_button' ] ) ) {
                                             if ( $options[ 'floating_sidebar' ][ 'hide_show_button' ] == '1' ) {
                                                  echo "checked='checked'";
                                             }
                                        }
                                        ?> />
                                               <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                                   </label>
                                   <p class="description"> <?php _e( "Select 'Yes' to enable hide/show button for floating sidebar. Note: It is only available for top left, top right, middle left and middle right sidebar positions", APSS_TEXT_DOMAIN ); ?> </p>
                              </div>
                         </div>
                    </div>

                    <div class="apss-row-even">
                         <div class="apss-general-div">
                              <div class="apss-title-div">
                                   <label>
                                        <h3>  <?php _e( 'Semi Transparent', APSS_TEXT_DOMAIN ); ?> </h3>
                                   </label>
                              </div>
                              <div class="apss-option-value">
                                   <label class="">
                                        <input type="radio" id='apss_floating_sidebar_semi_transparent_no'  class='apss_floating_sidebar_semi_transparent_enable_disable' name="apss_share_settings[floating_sidebar][semi_transparent]" value="0" <?php
                                        if ( isset( $options[ 'floating_sidebar' ][ 'semi_transparent' ] ) ) {
                                             if ( $options[ 'floating_sidebar' ][ 'semi_transparent' ] == '0' ) {
                                                  echo "checked='checked'";
                                             }
                                        }
                                        ?> />

                                        <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                                   </label>
                                   <label class="">
                                        <input type="radio" id='apss_floating_sidebar_semi_transparent_yes' class='apss_floating_sidebar_semi_transparent_enable_disable' name="apss_share_settings[floating_sidebar][semi_transparent]" value="1" <?php
                                        if ( isset( $options[ 'floating_sidebar' ][ 'semi_transparent' ] ) ) {
                                             if ( $options[ 'floating_sidebar' ][ 'semi_transparent' ] == '1' ) {
                                                  echo "checked='checked'";
                                             }
                                        }
                                        ?> />
                                               <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                                   </label>

                                   <p class="description"> <?php _e( "Select 'Yes' to make the sidebar semi transparent", APSS_TEXT_DOMAIN ); ?> </p>
                              </div>
                         </div>
                    </div>

                    <div class="apss-row-odd">
                         <div class="apss-general-div">
                              <div class="apss-title-div">
                                   <label>
                                        <h3>  <?php _e( 'Disable In Mobile Devices', APSS_TEXT_DOMAIN ); ?> </h3>
                                   </label>
                              </div>
                              <div class="apss-option-value">
                                   <label class="">
                                        <input type="radio" id='apss_mobile_floating_enable_no'  class='mobile_floating_positions_enable_disable' name="apss_share_settings[mobile_floating_sidebar][enabled]" value="0" <?php
                                        if ( isset( $options[ 'mobile_floating_sidebar' ][ 'enabled' ] ) ) {
                                             if ( $options[ 'mobile_floating_sidebar' ][ 'enabled' ] == '0' ) {
                                                  echo "checked='checked'";
                                             }
                                        }
                                        ?> />

                                        <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                                   </label>
                                   <label class="">
                                        <input type="radio" id='apss_mobile_floating_enable_yes' class='mobile_floating_positions_enable_disable' name="apss_share_settings[mobile_floating_sidebar][enabled]" value="1" <?php
                                        if ( isset( $options[ 'mobile_floating_sidebar' ][ 'enabled' ] ) ) {
                                             if ( $options[ 'mobile_floating_sidebar' ][ 'enabled' ] == '1' ) {
                                                  echo "checked='checked'";
                                             }
                                        }
                                        ?> />
                                               <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                                   </label>

                                   <p class="description"> <?php _e( "Select 'Yes' to disable floating sidebar in mobile devices", APSS_TEXT_DOMAIN ); ?> </p>
                              </div>
                         </div>
                    </div>

                    <div class="apss-row-even">
                         <div class="apss-general-div">
                              <div class="apss-title-div">
                                   <label>
                                        <h3>  <?php _e( 'Theme selection', APSS_TEXT_DOMAIN ); ?> </h3>
                                   </label>
                              </div>
                              <div class="apss-option-value">
                                   <select name="apss_share_settings[floating_sidebar][theme]" id="icon-template-share-float" class="apss-display template-dropdown" size="1" >
                                        <?php for ( $i = 1; $i <= 28; $i ++ ) { ?>
                                             <option class="apss-temp" value="<?php echo $i; ?>"
                                             <?php
                                             if ( isset( $options[ 'floating_sidebar' ][ 'theme' ] ) && $options[ 'floating_sidebar' ][ 'theme' ] == $i ) {
                                                  echo "selected='selected'";
                                             }
                                             ?> >
                                                          <?php
                                                          _e( 'Theme ' . $i, 'ap-social-pro' );
                                                          ?>
                                             </option>
                                        <?php }
                                        ?>
                                   </select>

                                   <div class="apss-template-demo" >
                                        <?php
                                        $cnt = 1;
                                        for ( $i = 1; $i <= 28; $i ++ ) {
                                             ?>
                                             <div class="apss-common-share-float" id="apss-temp-demo-share-float-<?php echo $cnt; ?>" <?php if ( $cnt != 1 ) { ?>style="display:none;"<?php } ?>>
                                                  <div class="apss-preview"> Preview </div>
                                                  <div class="apss-display-template apss-clearfix">
                                                       <img src="<?php echo APSS_IMAGE_DIR . "/theme/floating-theme$i.png"; ?>"/>
                                                  </div>
                                             </div>
                                             <?php
                                             $cnt ++;
                                        }
                                        ?>
                                   </div>
                                   <p class="description"> <?php _e( 'Please select any one of the above available templates', APSS_TEXT_DOMAIN ); ?> </p>
                              </div>
                         </div>
                    </div>

                    <div class="apss-row-odd">
                         <div class="apss-general-div">
                              <div class="apss-title-div">
                                   <label>
                                        <h3> <?php _e( 'Floating positions', APSS_TEXT_DOMAIN ); ?> </h3>
                                   </label>
                              </div>
                              <div class="apss-option-value" id="apss-position-radio-image">
                                   <?php
                                   $positions = array(
                                       'Top Left' => 'top_left',
                                       'Top Right' => 'top_right',
                                       'Botton Left' => 'bottom_left',
                                       'Bottom Right' => 'bottom_right',
                                       'Top Center' => 'top_center',
                                       'Bottom Center' => 'bottom_center',
                                       'Left Center' => 'left_center',
                                       'Right Center' => 'right_center'
                                   );
                                   ?>
                                   <?php
                                   foreach ( $positions as $position => $p ) {
                                        ?>
                                        <label class="">
                                             <input type="radio" id='apss_floating_position_1' name="apss_share_settings[floating_sidebar][position]" value="<?php echo $p; ?>" <?php
                                             if ( isset( $options[ 'floating_sidebar' ][ 'position' ] ) && $options[ 'floating_sidebar' ][ 'position' ] === $p ) {
                                                  echo "checked='checked'";
                                             }
                                             ?> />
                                             <img src="<?php echo APSS_IMAGE_DIR . "/position/$p.png"; ?>" height="90" width="122"/>
                                             <span> <?php echo $position; ?> </span>
                                        </label>
                                   <?php } ?>
                                   <p class="description"> <?php _e( 'Select any one of the positions for floating sidebar. Please note that if you have enabled to show floating sidebar in mobile devices, the theme you have selected will not take effect and the social share buttons will always appear at the bottom of the page.', APSS_TEXT_DOMAIN ); ?> </p>
                              </div>
                         </div>
                    </div>

                    <div class="apss-row-even">
                         <div class="apss-general-div">
                              <div class="apss-title-div">
                                   <label>
                                        <h3>  <?php _e( 'Enable Share Count', APSS_TEXT_DOMAIN ); ?> </h3>
                                   </label>
                              </div>
                              <div class="apss-option-value">
                                   <label class="">
                                        <input type="radio" class='floating_count_enabler' id='apss_floating_count_enable_no'  class='floating_count_enable_options' name="apss_share_settings[floating_sidebar][counter]" value="0" <?php
                                        if ( isset( $options[ 'floating_sidebar' ][ 'counter' ] ) && $options[ 'floating_sidebar' ][ 'counter' ] == '0' ) {
                                             echo "checked='checked'";
                                        }
                                        ?> />

                                        <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                                   </label>
                                   <label class="">
                                        <input type="radio" class='floating_count_enabler' id='apss_floating_count_enable_yes' class='floating_count_enable_options' name="apss_share_settings[floating_sidebar][counter]" value="1" <?php
                                        if ( isset( $options[ 'floating_sidebar' ][ 'counter' ] ) && $options[ 'floating_sidebar' ][ 'counter' ] == '1' ) {
                                             echo "checked='checked'";
                                        }
                                        ?> />
                                               <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                                   </label>

                                   <p class="description"> <?php _e( "Select 'Yes' to display share count in floating sidebar", APSS_TEXT_DOMAIN ); ?> </p>
                              </div>
                         </div>
                    </div>

                    <div class="apss-row-odd">
                         <div class="apss-general-div">
                              <div class="apss-title-div">
                                   <label>
                                        <h3>  <?php _e( 'Enable Total Share Count', APSS_TEXT_DOMAIN ); ?> </h3>
                                   </label>
                              </div>
                              <div class="apss-option-value">
                                   <label class="">
                                        <input type="radio" id='floating_total_counter_enable_options_n' name="apss_share_settings[floating_sidebar][total_count]" value="0" <?php
                                        if ( isset( $options[ 'floating_sidebar' ][ 'total_count' ] ) && $options[ 'floating_sidebar' ][ 'total_count' ] == '0' ) {
                                             echo "checked='checked'";
                                        } else {
                                             echo "checked='checked'";
                                        }
                                        ?> />
                                               <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                                   </label>
                                   <label class="">
                                        <input type="radio" id='floating_total_counter_enable_options_y' name="apss_share_settings[floating_sidebar][total_count]" value="1" <?php
                                        if ( isset( $options[ 'floating_sidebar' ][ 'total_count' ] ) && $options[ 'floating_sidebar' ][ 'total_count' ] == '1' ) {
                                             echo "checked='checked'";
                                        }
                                        ?> />
                                               <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                                   </label>
                                   <p class="description"> <?php _e( "Select 'Yes' to display total share count in floating sidebar", APSS_TEXT_DOMAIN ); ?> </p>
                              </div>
                         </div>
                    </div>

                    <div class="apss-row-even">
                         <div class="apss-general-div">
                              <div class="apss-title-div">
                                   <label>
                                        <h3>  <?php _e( 'Enable Show All Button ', APSS_TEXT_DOMAIN ); ?> </h3>
                                   </label>
                              </div>
                              <div class="apss-option-value">
                                   <label class="">
                                        <input type="radio" id='floating_show_all_options_n' name="apss_share_settings[floating_sidebar][show_all]" value="0" <?php
                                        if ( isset( $options[ 'floating_sidebar' ][ 'show_all' ] ) && $options[ 'floating_sidebar' ][ 'show_all' ] == '0' ) {
                                             echo "checked='checked'";
                                        } else {
                                             echo "checked='checked'";
                                        }
                                        ?> />
                                               <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                                   </label>
                                   <label class="">
                                        <input type="radio" id='floating_show_all_options_y' name="apss_share_settings[floating_sidebar][show_all]" value="1" <?php
                                        if ( isset( $options[ 'floating_sidebar' ][ 'show_all' ] ) && $options[ 'floating_sidebar' ][ 'show_all' ] == '1' ) {
                                             echo "checked='checked'";
                                        }
                                        ?> />
                                               <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                                   </label>

                                   <p class="description"> <?php _e( "Select 'Yes' to display the show all button at the end of the floating sidebar. This button will display all the social medias in a popup.", APSS_TEXT_DOMAIN ); ?> </p>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <div class="apss-display-settings-wrapper apss-option-outer-wrapper" id="tab-popup-settings" style="display:none;">
          <div class="apss-element apss-abc apss-clearfix">
               <label>
                    <h1><?php _e( 'Popup Settings', APSS_TEXT_DOMAIN ) ?></h1>
               </label>
          </div>
          <div class="apss-elements-settings-wrap">
               <div class="apss-row-odd">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Enable Popup', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="radio" id='apss_popup_enable_no'  class='popup_enable_disable' name="apss_share_settings[popup_options][enabled]" value="0" <?php
                                   if ( $options[ 'popup_options' ][ 'enabled' ] == '0' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <label class="">
                                   <input type="radio" id='apss_popup_enable_yes' class='popup_enable_disable' name="apss_share_settings[popup_options][enabled]" value="1" <?php
                                   if ( $options[ 'popup_options' ][ 'enabled' ] == '1' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                              </label>

                              <p class="description"> <?php _e( "Select 'Yes' to enable popup display of share buttons", APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
               <div class="apss-row-even">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Popup Window Title', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="text" name="apss_share_settings[popup_options][share_text]"  value="<?php
                                   if ( isset( $options[ 'popup_options' ][ 'share_text' ] ) ) {
                                        echo $options[ 'popup_options' ][ 'share_text' ];
                                   }
                                   ?>" />
                              </label>
                              <p class="description"> <?php _e( 'Please enter a popup window title for the popup window', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
               <div class="apss-row-odd">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Popup Window Message', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="text" name="apss_share_settings[popup_options][popup_window_message]"  value="<?php
                                   if ( isset( $options[ 'popup_options' ][ 'popup_window_message' ] ) ) {
                                        echo $options[ 'popup_options' ][ 'popup_window_message' ];
                                   }
                                   ?>" />
                              </label>
                              <p class="description"> <?php _e( 'Please enter a popup window message for the popup window', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
               <div class="apss-row-even">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Popup Optimization', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="radio" id=''  class='apss_popup_optimization' name="apss_share_settings[popup_options][popup_type]" value="delayed_time" <?php
                                   if ( isset( $options[ 'popup_options' ][ 'popup_type' ] ) && $options[ 'popup_options' ][ 'popup_type' ] == 'delayed_time' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Display Popup window after a certain time', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <label class="">
                                   <input type="radio" id='' class='apss_popup_optimization' name="apss_share_settings[popup_options][popup_type]" value="content_viewed" <?php
                                   if ( isset( $options[ 'popup_options' ][ 'popup_type' ] ) && $options[ 'popup_options' ][ 'popup_type' ] == 'content_viewed' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Display Popup window after certain percent of content is viewed', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <label class="">
                                   <input type="radio" id='apss_end_of_content' class='apss_popup_optimization' name="apss_share_settings[popup_options][popup_type]" value="end_of_content" <?php
                                   if ( isset( $options[ 'popup_options' ][ 'popup_type' ] ) && $options[ 'popup_options' ][ 'popup_type' ] == 'end_of_content' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Display Popup window after the end of the content is reached', APSS_TEXT_DOMAIN ); ?>
                              </label>

                              <p class="description"> <?php _e( 'Select any one of the above options to display the popup window', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
               <div class="apss-row-odd" id="apss_delayed_time"
               <?php
               if ( isset( $options[ 'popup_options' ][ 'popup_type' ] ) && $options[ 'popup_options' ][ 'popup_type' ] == 'delayed_time' ) {
                    echo "style=display:block;";
               } else {
                    echo "style=display:none;";
               }
               ?>>
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Popup Delay Time', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="text" id='apss_popup_delay_time' class='apss_popup_delay_time' name="apss_share_settings[popup_options][delay_time]" value="<?php
                                   if ( isset( $options[ 'popup_options' ][ 'delay_time' ] ) ) {
                                        echo $options[ 'popup_options' ][ 'delay_time' ];
                                   }
                                   ?>" placeholder="<?php echo _e( 'In seconds', APSS_TEXT_DOMAIN ); ?>">
                                   <label class="apss-second-div" for="apss_popup_delay_time"><?php _e( ' Seconds', APSS_TEXT_DOMAIN ); ?></label>
                              </label>
                              <p class="description"> <?php _e( 'Enter the time value after which you want your popup to be displayed. Note: time must be entered in seconds', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
               <div class="apss-row-odd" id="apss_content_viewed"<?php
               if ( isset( $options[ 'popup_options' ][ 'popup_type' ] ) && $options[ 'popup_options' ][ 'popup_type' ] == 'content_viewed' ) {
                    echo "style=display:block;";
               } else {
                    echo "style=display:none;";
               }
               ?>>
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Percent of content viewed', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="text" id='apss_popup_percent_viewed' class='apss_popup_delay_time' name="apss_share_settings[popup_options][percent_viewed]" value="<?php
                                   if ( isset( $options[ 'popup_options' ][ 'percent_viewed' ] ) ) {
                                        echo $options[ 'popup_options' ][ 'percent_viewed' ];
                                   }
                                   ?>" placeholder="<?php echo _e( 'In seconds', APSS_TEXT_DOMAIN ); ?>">
                                   <label class="apss-second-div" for="apss_popup_delay_time"><?php _e( '%', APSS_TEXT_DOMAIN ); ?></label>
                              </label>
                              <p class="description"> <?php _e( 'Enter the percent value after which you want your popup to be displayed', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <div class="apss-display-settings-wrapper apss-option-outer-wrapper" id="tab-flyin-settings" style="display:none;">
          <div class="apss-element apss-abc apss-clearfix">
               <label>
                    <h1><?php _e( 'Fly in Settings', APSS_TEXT_DOMAIN ) ?></h1>
               </label>
          </div>
          <div class="apss-elements-settings-wrap">
               <div class="apss-row-odd">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Enable Flyin', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="radio" id='apss_flyin_enable_no'  class='flyin_enable_disable' name="apss_share_settings[flyin_options][enabled]" value="0" <?php
                                   if ( isset( $options[ 'flyin_options' ][ 'enabled' ] ) && $options[ 'flyin_options' ][ 'enabled' ] == '0' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <label class="">
                                   <input type="radio" id='apss_flyin_enable_yes' class='flyin_enable_disable' name="apss_share_settings[flyin_options][enabled]" value="1" <?php
                                   if ( isset( $options[ 'flyin_options' ][ 'enabled' ] ) && $options[ 'flyin_options' ][ 'enabled' ] == '1' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                              </label>

                              <p class="description"> <?php _e( "Select 'Yes' to enable Flyin window", APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
               <div class="apss-row-even">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Fly in Window Title', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="text" name="apss_share_settings[flyin_options][flyin_share_text]"  value="<?php
                                   if ( isset( $options[ 'flyin_options' ][ 'flyin_share_text' ] ) ) {
                                        echo $options[ 'flyin_options' ][ 'flyin_share_text' ];
                                   }
                                   ?>" />
                              </label>
                              <p class="description"> <?php _e( 'Enter title for the flyin window', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
               <div class="apss-row-odd">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Fly in Window Message', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="text" name="apss_share_settings[flyin_options][flyin_window_message]"  value="<?php
                                   if ( isset( $options[ 'flyin_options' ][ 'flyin_window_message' ] ) ) {
                                        echo $options[ 'flyin_options' ][ 'flyin_window_message' ];
                                   }
                                   ?>" />
                              </label>
                              <p class="description"> <?php _e( 'Enter message to be displayed in the flyin window', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
               <div class="apss-row-even">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Fly in Location', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="radio" id=''  class='' name="apss_share_settings[flyin_options][flyin_location]" value="left" <?php
                                   if ( isset( $options[ 'flyin_options' ][ 'flyin_location' ] ) && $options[ 'flyin_options' ][ 'flyin_location' ] == 'left' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Left', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <label class="">
                                   <input type="radio" id='' class='' name="apss_share_settings[flyin_options][flyin_location]" value="right" <?php
                                   if ( isset( $options[ 'flyin_options' ][ 'flyin_location' ] ) && $options[ 'flyin_options' ][ 'flyin_location' ] == 'right' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Right', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <p class="description"> <?php _e( 'Select any one of the positions for the flyin window', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <div class="apss-display-settings-wrapper apss-option-outer-wrapper" id="tab-template-settings" style="display:none;">
          <div class="apss-element apss-abc apss-clearfix">
               <label>
                    <h1><?php _e( 'Template Settings', APSS_TEXT_DOMAIN ) ?></h1>
               </label>
          </div>
          <div class="apss-elements-settings-wrap">
               <div class="apss-row-odd">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Social Icons Sets', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <select name="apss_share_settings[social_icon_set]" id="icon-template" class="apss-display template-dropdown" size="1" >
                                        <?php for ( $i = 1; $i <= 40; $i ++ ) { ?>
                                             <option class="apss-temp" value="<?php echo $i; ?>"
                                             <?php
                                             if ( $options[ 'social_icon_set' ] == $i ) {
                                                  echo "selected='selected'";
                                             }
                                             ?> >
                                                          <?php
                                                          _e( 'Theme ' . $i, 'ap-social-pro' );
                                                          ?>
                                             </option>
                                        <?php }
                                        ?>
                                   </select>
                                   <div class="apss-template-demo" >
                                        <?php
                                        $cnt = 1;
                                        for ( $i = 1; $i <= 40; $i ++ ) {
                                             ?>
                                             <div class="apss-common" id="apss-temp-demo-<?php echo $cnt; ?>" <?php if ( $cnt != 1 ) { ?>style="display:none;"<?php } ?>>
                                                  <div class="apss-preview"> Preview </div>
                                                  <div class="apss-display-template apss-clearfix">
                                                       <img src='<?php echo APSS_IMAGE_DIR . "/theme/theme$i.png"; ?>'/>
                                                  </div>
                                             </div>
                                             <?php
                                             $cnt ++;
                                        }
                                        ?>
                                   </div>
                              </label>
                              <p class="description"> <?php _e( 'Please select any one of the available templates', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
               <?php /* ?>
                 <div class="apss-row-even">
                 <div class="apss-general-div">
                 <div class="apss-title-div">
                 <label for="apss-button-share-animation">
                 <h3> <?php _e( 'Enable Animation', APSS_TEXT_DOMAIN ); ?> </h3>
                 </label>
                 </div>
                 <div class="apss-option-value">
                 <label class="apss-animation-wrap">
                 <input type="checkbox" name="apss_share_settings[button_animation]" id='apss-button-share-animation' value="enable" <?php echo isset( $options[ 'button_animation' ] ) && $options[ 'button_animation' ] === 'enable' ? "checked='checked'" : ''; ?>/>
                 <label class="apss-general-checkbox" for="apss-button-share-animation">
                 <?php _e( 'Enable', 'ap-social-pro' ); ?>
                 </label>
                 <div class="apss-check round"></div>
                 </label>

                 <p class="description"><?php _e( 'Check to enable animation in the share buttons', APSS_TEXT_DOMAIN ) ?></p>
                 </div>
                 </div>
                 </div>
                 <div class="apss-row-odd">
                 <div class="apss-general-div">
                 <div class="apss-title-div">
                 <label for="apss-button-share-animation">
                 <h3>
                 <?php _e( 'Animation Template', APSS_TEXT_DOMAIN ); ?> </h3>
                 </label>
                 </div>
                 <div class="apss-option-value">
                 <select  name=apss_share_settings[button_animation_type] id="apss-button-animation">
                 <option value="animation-1" <?php echo isset( $options[ 'button_animation_type' ] ) && $options[ 'button_animation_type' ] == 'animation-1' ? "selected='selected'" : ""; ?> ><?php _e( 'Animation 1', APSS_TEXT_DOMAIN ); ?></option>
                 <option value="animation-2" <?php echo isset( $options[ 'button_animation_type' ] ) && $options[ 'button_animation_type' ] == 'animation-2' ? "selected='selected'" : ""; ?> ><?php _e( 'Animation 2 ', APSS_TEXT_DOMAIN ); ?></option>
                 <option value="animation-3" <?php echo isset( $options[ 'button_animation_type' ] ) && $options[ 'button_animation_type' ] == 'animation-3' ? "selected='selected'" : ""; ?> ><?php _e( 'Animation 3', APSS_TEXT_DOMAIN ); ?></option>
                 <option value="animation-4" <?php echo isset( $options[ 'button_animation_type' ] ) && $options[ 'button_animation_type' ] == 'animation-4' ? "selected='selected'" : ""; ?> ><?php _e( 'Animation 4', APSS_TEXT_DOMAIN ) ?></option>
                 <option value="animation-5" <?php echo isset( $options[ 'button_animation_type' ] ) && $options[ 'button_animation_type' ] == 'animation-5' ? "selected='selected'" : ""; ?> ><?php _e( 'Animation 5', APSS_TEXT_DOMAIN ); ?></option>
                 <option value="animation-6" <?php echo isset( $options[ 'button_animation_type' ] ) && $options[ 'button_animation_type' ] == 'animation-6' ? "selected='selected'" : ""; ?> ><?php _e( 'Animation 6', APSS_TEXT_DOMAIN ); ?></option>
                 <option value="animation-7" <?php echo isset( $options[ 'button_animation_type' ] ) && $options[ 'button_animation_type' ] == 'animation-7' ? "selected='selected'" : ""; ?> ><?php _e( 'Animation 7', APSS_TEXT_DOMAIN ); ?></option>
                 <option value="animation-8" <?php echo isset( $options[ 'button_animation_type' ] ) && $options[ 'button_animation_type' ] == 'animation-8' ? "selected='selected'" : ""; ?> ><?php _e( 'Animation 8', APSS_TEXT_DOMAIN ) ?></option>
                 <option value="animation-9" <?php echo isset( $options[ 'button_animation_type' ] ) && $options[ 'button_animation_type' ] == 'animation-9' ? "selected='selected'" : ""; ?> ><?php _e( 'Animation 9', APSS_TEXT_DOMAIN ) ?></option>
                 <option value="animation-10" <?php echo isset( $options[ 'button_animation_type' ] ) && $options[ 'button_animation_type' ] == 'animation-10' ? "selected='selected'" : ""; ?> ><?php _e( 'Animation 10', APSS_TEXT_DOMAIN ) ?></option>
                 </select>
                 <div class="apss-border-design">
                 <div class="apss-animation-effect <?php echo isset( $options[ 'button_animation_type' ] ) && $options[ 'button_animation_type' ] != ' ' ? $options[ 'button_animation_type' ] : "animation-1"; ?>" id="apss-animation-effect">
                 <div class="apss-facebook apss-single-icon">
                 <?php $button_text = "Social Network"; ?>
                 <a href="#" data-hover="Social Network"><span><?php echo esc_attr( $button_text ); ?></span><i class="<?php echo isset( $options[ 'button_animation_type' ] ) && $options[ 'button_animation_type' ] != ' ' ? $options[ 'button_animation_type' ] : "animation-1"; ?>"></i></a>
                 </div>
                 </div>
                 <p class="description"><?php _e( 'Please hover on above button to see animation effect', APSS_TEXT_DOMAIN ); ?></p>
                 </div>
                 </div>
                 </div>
                 </div>
                 <?php */ ?>
          </div>
     </div>
</div>