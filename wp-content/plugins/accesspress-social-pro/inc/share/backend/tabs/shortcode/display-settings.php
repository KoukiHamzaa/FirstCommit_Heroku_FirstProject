<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>

<div class="apss-subhead">
     <h2><?php _e( 'Display Settings', APSS_TEXT_DOMAIN ) ?></h2>
</div>
<div class="apss-row">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3> <?php _e( 'Template Settings', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <select name="shortcode_template" id="shortcode_template" class="apss-display template-dropdown"  >
                         <?php for ( $i = 1; $i <= 40; $i ++ ) { ?>
                              <option class="apss-shortcode-temp" value="<?php echo $i; ?>" >
                                   <?php _e( 'Theme ' . $i, APSS_TEXT_DOMAIN ); ?>
                              </option>
                         <?php }
                         ?>
                    </select>
                    <div class="apss-template-demo-shortcode" >
                         <?php
                         $cnt = 1;
                         for ( $i = 1; $i <= 40; $i ++ ) {
                              ?>
                              <div class="apss-common-shortcode" id="apss-temp-demo-shortcode-<?php echo $cnt; ?>" <?php if ( $cnt != 1 ) { ?>style="display:none;"<?php } ?>>
                                   <div class="apss-preview"> <?php _e( 'Preview', APSS_TEXT_DOMAIN ); ?> </div>
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
               <p class="description"> <?php _e( 'Please choose any one out of available icon themes', APSS_TEXT_DOMAIN ) ?> </p>
          </div>
     </div>
</div>
<?php /*  ?>
  <div class="apss-row">
  <div class="apss-general-div">
  <div class="apss-title-div">
  <label>
  <h3>  <?php _e( 'Enable Animation', APSS_TEXT_DOMAIN ); ?> </h3>
  </label>
  </div>
  <div class="apss-option-value">
  <label class="">
  <input type="radio" class='' id=''   name="animation" value="0"  />
  <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
  </label>
  <label class="">
  <input type="radio" class='' id='' name="animation" value="1" />
  <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
  </label>
  <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ); ?> </p>
  </div>
  </div>
  </div>

  <div class="apss-row">
  <div class="apss-general-div">
  <div class="apss-title-div">
  <label for="apss-button-share-animation">
  <h3>
  <?php _e( 'Animation Template', APSS_TEXT_DOMAIN ); ?> </h3>
  </label>
  </div>
  <div class="apss-option-value">
  <select  id="apss-shortcode-animation">
  <option value="animation-1"><?php _e( 'Animation 1', APSS_TEXT_DOMAIN ); ?></option>
  <option value="animation-2" ><?php _e( 'Animation 2', APSS_TEXT_DOMAIN ); ?></option>
  <option value="animation-3" ><?php _e( 'Animation 3', APSS_TEXT_DOMAIN ); ?></option>
  <option value="animation-4"><?php _e( 'Animation 4', APSS_TEXT_DOMAIN ) ?></option>
  <option value="animation-5"><?php _e( 'Animation 5', APSS_TEXT_DOMAIN ); ?></option>
  <option value="animation-6" ><?php _e( 'Animation 6', APSS_TEXT_DOMAIN ); ?></option>
  <option value="animation-7" ><?php _e( 'Animation 7', APSS_TEXT_DOMAIN ); ?></option>
  <option value="animation-8"><?php _e( 'Animation 8', APSS_TEXT_DOMAIN ) ?></option>
  <option value="animation-9"><?php _e( 'Animation 9', APSS_TEXT_DOMAIN ) ?></option>
  <option value="animation-10"><?php _e( 'Animation 10', APSS_TEXT_DOMAIN ) ?></option>
  </select>
  <div class="apss-border-design">
  <div class="apss-animation-effect-shortcode" id="apss-animation-effect-shortcode">
  <div class="apss-facebook apss-single-icon">
  <?php $button_text = "Social Network"; ?>
  <a href="#" data-hover="Social Network"><?php echo esc_attr( $button_text ); ?></a>
  </div>
  </div>
  <p class="description"><?php _e( 'Please hover on above button to see animation effect.', APSS_TEXT_DOMAIN ); ?></p>
  </div>
  </div>
  </div>
  </div>
  <?php */ ?>

<div class="apss-row">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3>  <?php _e( 'Display Type', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <select id="apss-shortcode-display-settings" class="apss-shortcode-display-settings"  >
                         <option class="apss-temp" value="inline" >
                              <?php _e( 'Inline', APSS_TEXT_DOMAIN ); ?>
                         </option>
                         <option class="apss-temp" value="floating" >
                              <?php _e( 'Floating', APSS_TEXT_DOMAIN ); ?>
                         </option>
                         <option class="apss-temp" value="popup" >
                              <?php _e( 'Pop Up', APSS_TEXT_DOMAIN ); ?>
                         </option>
                         <option class="apss-temp" value="flyin" >
                              <?php _e( 'Fly-in', APSS_TEXT_DOMAIN ); ?>
                         </option>
                    </select>
               </label>
               <p class="description"> <?php _e( 'Please choose any one of the above mentioned display methods', APSS_TEXT_DOMAIN ) ?></p>
          </div>
     </div>
</div>
<div class=" apss-shortcode-display-settings-wrapper apss-option-outer-wrapper" id="tab-shortcode-inline">
     <div class="apss-elements-settings-wrap">
          <div class="apss-row-odd">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3> <?php _e( 'Buttons Align', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="radio" id="apss_buttons_left" name="button_align" value="left" checked/>
                              <?php _e( 'Left', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" id="apss_buttons_right" name="button_align" value="right" />
                              <?php _e( 'Right', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" id="apss_buttons_center" name="button_align" value="center" />
                              <?php _e( 'Center', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <p class="description"> <?php _e( 'Please choose the share button location where you want to display the social share', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
     </div>
</div>
<div class="apss-shortcode-display-settings-wrapper apss-option-outer-wrapper" id="tab-shortcode-floating" style="display:none;">
     <div class="apss-elements-settings-wrap">

          <div class="apss-row-odd">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3> <?php _e( 'Show Hide/Show Button?', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="radio" id='apss_floating_hide_show_button_no'  class='floating_sidebar_hide_show_button' name="floating_sidebar_hide_show_button" value="0" checked/>
                              <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" id='apss_floating_hide_show_button_yes' class='floating_sidebar_hide_show_button' name="floating_sidebar_hide_show_button" value="1" />
                              <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                         </label>

                         <p class="description"> <?php _e( 'Please select this options if you want to show the hide/show button in the floating sidebar.', APSS_TEXT_DOMAIN ); ?> </p>
                    </div>
               </div>
          </div>
          <div class="apss-row-even">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3> <?php _e( 'Make Floating Sidebar Semi Transparent?', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="radio" id='apss_floating_sidebar_semi_transparent_no'  class='apss_floating_sidebar_semi_transparent_enable_disable' name="semi_transparent" value="0" />

                              <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" id='apss_floating_sidebar_semi_transparent_yes' class='apss_floating_sidebar_semi_transparent_enable_disable' name="semi_transparent" value="1" />
                              <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                         </label>

                         <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ); ?> </p>
                    </div>
               </div>
          </div>

          <div class="apss-row-odd">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3> <?php _e( 'Disable Floating Social Share In Mobile Devices', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="radio" id='apss_mobile_floating_enable_no'  class='mobile_floating_positions_enable_disable' name="enable_mobile_floating_sidebar" value="0" checked />
                              <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" id='apss_mobile_floating_enable_yes' class='mobile_floating_positions_enable_disable' name="enable_mobile_floating_sidebar" value="1" />
                              <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                         </label>

                         <p class="description"> <?php _e( 'Please note that if you have enabled to show floating sidebar in mobile devices, the theme you have selected below will not take effect and the social share buttons will always appear at the bottom of the page.', APSS_TEXT_DOMAIN ); ?> </p>
                    </div>
               </div>
          </div>
          <div class="apss-row-even">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Floating Positions', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="radio" id='apss_floating_position_1' name="floating_sidebar_position" value="left" />
                              <?php _e( 'Left Middle(Vertical)', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" id='apss_floating_position_2' name="floating_sidebar_position" value="right" />
                              <?php _e( 'Right Middle(Vertical)', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" id='apss_floating_position_3' name="floating_sidebar_position" value="bottom_left" />
                              <?php _e( 'Bottom left(Horizontal)', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" id='apss_floating_position_4' name="floating_sidebar_position" value="bottom_right" />
                              <?php _e( 'Bottom right(Horizontal)', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <p class="description"> <?php _e( 'Please note that if you have enabled to show floating sidebar in mobile devices, the theme you have selected below will not take effect and the social share buttons will always appear at the bottom of the page.', APSS_TEXT_DOMAIN ); ?> </p>
                    </div>
               </div>

          </div>
          <div class="apss-row-odd">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Share Count Enable', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="radio" class='floating_count_enabler' id='apss_floating_count_enable_no'  class='floating_count_enable_options' name="floating_sidebar_counter" value="0"  />
                              <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" class='floating_count_enabler' id='apss_floating_count_enable_yes' class='floating_count_enable_options' name="floating_sidebar_counter" value="1" />
                              <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ); ?> </p>
                    </div>
               </div>
          </div>

          <div class="apss-row-even">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Total Share Count Enable', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="radio" id='floating_total_counter_enable_options_n' name="floating_sidebar_total_count" value="0" />
                              <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" id='floating_total_counter_enable_options_y' name="floating_sidebar_total_count" value="1" />
                              <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ); ?> </p>
                    </div>
               </div>
          </div>
          <div class="apss-row-odd">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Display Show All Button', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="radio" id='floating_show_all_options_n' name="floating_sidebar_show_all" value="0"/>
                              <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" id='floating_show_all_options_y' name="floating_sidebar_show_all" value="1" />
                              <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                         </label>

                         <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ); ?> </p>
                    </div>
               </div>
          </div>
          <div class="apss-row-even">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Theme Selection', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <select name="floating_sidebar_theme" id="apss-shortcode-floating-template" class="apss-display template-dropdown" size="1" >
                              <?php for ( $i = 1; $i <= 28; $i ++ ) { ?>
                                   <option class="apss-temp" value="<?php echo $i; ?>" >
                                        <?php _e( 'Theme ' . $i, 'ap-social-pro' ); ?>
                                   </option>
                              <?php }
                              ?>
                         </select>
                         <div class="apss-template-demo" >
                              <?php
                              $cnt = 1;
                              for ( $i = 1; $i <= 28; $i ++ ) {
                                   ?>
                                   <div class="apss-common-share-float-shortcode" id="apss-temp-demo-share-float-shortcode-<?php echo $cnt; ?>" <?php if ( $cnt != 1 ) { ?>style="display:none;"<?php } ?>>
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
                         <p class="description"> <?php _e( 'Please choose any one out of available icon themes', APSS_TEXT_DOMAIN ); ?> </p>
                    </div>
               </div>
          </div>
     </div>
</div>

<div class="apss-shortcode-display-settings-wrapper apss-option-outer-wrapper" id="tab-shortcode-popup" style="display:none;">
     <div class="apss-elements-settings-wrap">
          <div class="apss-row-odd">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Popup Window Title', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="text" name="popup_share_text"  value="" />
                         </label>
                         <p class="description"> <?php _e( 'Please enable these options for the popup of the soical share options.', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
          <div class="apss-row-even">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Popup Window Message', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="text" name="popup_window_message"  value="" />
                         </label>
                         <p class="description"> <?php _e( 'Please enable these options for the popup of the soical share options.', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
          <div class="apss-row-odd">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Popup Optimization', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="radio" id=''  class='apsp-shortcode-popup-type' name="popup_type" value="delayed_time" />
                              <?php _e( 'Display Popup window after a certain time', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" id='' class='apsp-shortcode-popup-type' name="popup_type" value="content_viewed" />
                              <?php _e( 'Display Popup window after certain percent of content is viewed', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" id='' class='apsp-shortcode-popup-type' name="popup_type" value="end_of_content" />
                              <?php _e( 'Display Popup window after the end of the content is reached', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <p class="description"> <?php _e( 'Please enable these options for the popup of the soical share options.', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
          <div id = 'apss_delayed_time' class="apss-row-odd apss-popup" style="display:none;">
               <div class="apss-row-even">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Popup Delay Time', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="text" id='apss_popup_delay_time' class='apss_popup_delay_time' name="popup_delay_time" value="" placeholder="<?php echo _e( 'In seconds', APSS_TEXT_DOMAIN ); ?>">
                                   <label class="apss-second-div" for="apss_popup_delay_time"><?php _e( ' Seconds', APSS_TEXT_DOMAIN ); ?></label>
                              </label>
                              <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
          </div>
          <div id= "apss_content_viewed" class="apss-row-odd apss-popup" style="display:none;">
               <div class="apss-row-even">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Percent Of Content Viewed', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="text" id='apss_popup_delay_time' class='apss_popup_delay_time' name="popup_percent_viewed" value="" placeholder="<?php echo _e( 'In seconds', APSS_TEXT_DOMAIN ); ?>">
                                   <label class="apss-second-div" for="apss_popup_delay_time"><?php _e( ' Seconds', APSS_TEXT_DOMAIN ); ?></label>
                              </label>
                              <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<div class="apss-shortcode-display-settings-wrapper apss-option-outer-wrapper" id="tab-shortcode-flyin" style="display:none;">
     <div class="apss-elements-settings-wrap">
          <div class="apss-row-odd">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Flyin Window Text', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="text" name="flyin_share_text"  value="" />
                         </label>
                         <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
          <div class="apss-row-even">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Flyin Window Message', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="text" name="flyin_window_message"  value="" />
                         </label>
                         <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
          <div class="apss-row-odd">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Flyin Location', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input type="radio" name="flyin_location" value="left" />
                              <?php _e( 'Left', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <label class="">
                              <input type="radio" name="flyin_location" value="right" />
                              <?php _e( 'Right', APSS_TEXT_DOMAIN ); ?>
                         </label>
                         <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
     </div>
</div>















