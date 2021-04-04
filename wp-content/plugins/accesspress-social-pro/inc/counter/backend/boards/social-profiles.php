<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="apsc-boards-tabs" id="apsc-board-social-profile-settings">
     <?php
//     echo "<pre>";
//     print_r( $apsc_settings );
//     echo "</pre>";
     ?>
     <div class="apsc-tab-wrapper">
          <!---Facebook-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-facebook">
                         <h3><?php _e( 'Facebook', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-facebook">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[facebook][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-facebook" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>

                                   <label class="apsc-general-checkbox" for="apsc-facebook">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label for="apsc-facebook-method">
                              <?php _e( 'Facebook Counter Extraction', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label class="apsc-fb-method">
                                   <input type="radio" name="social_profile[facebook][method]" value="1" class="apss-facebook-method" id="" <?php echo isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'method' ] ) && $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'method' ] == '1' ? ' checked="checked" ' : '1111'; ?>/>
                                   <?php _e( 'Method 1', 'ap-social-pro' ); ?>
                              </label>
                              <div class="apsc-option-note"><?php _e( 'Method 1 you will require to enter your app id and app secret. Due to recent changes in Facebook API, most of our clients have been complaining that "Method 1" does not work.  ', 'ap-social-pro' ); ?></div>

                              <label class="apsc-fb-method">
                                   <input type="radio" name="social_profile[facebook][method]" value="2" class="apss-facebook-method" id="" <?php echo isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'method' ] ) && $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'method' ] == '2' ? 'checked="checked"' : '2222'; ?>/>
                                   <?php _e( 'Method 2', 'ap-social-pro' ); ?>
                              </label>
                              <div class="apsc-option-note"><?php _e( 'Method 2 makes use of a third party API "WidgetPack" to do the work. Please login to your Facebook account using the "FB Connect" button and connect WidgetPack to Facebook. Once done, you will notice that the image and name of your page will be displayed beneath the "FB Connect" button in the plugin settings. When you click on it, All the details will automatically be entered in the fields beneath the "FB Connect Button". Note: Your FB login details will NOT be stored.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apss-facebook-method-1" id="apss-facebook-method-1" <?php echo ( isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'method' ] ) && $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'method' ] == '1' ) ? 'style=display:block;' : 'style=display:none;'; ?>>
                         <div class="apsc-option-inner-wrapper apsc-row-even">
                              <label><?php _e( 'Facebook Page ID', 'ap-social-pro' ); ?></label>
                              <div class="apsc-option-field">
                                   <input type="text" name="social_profile[facebook][page_id]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'page_id' ] ) && $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'page_id' ] != '' ? $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'page_id' ] : ''; ?>"/>
                                   <div class="apsc-option-note"><?php _e( 'Please enter the page ID or page name.For example:If your page url is https://www.facebook.com/AccessPressThemes then your page ID is AccessPressThemes', 'ap-social-pro' ); ?></div>
                              </div>
                         </div>
                         <div class="apsc-option-inner-wrapper apsc-row-even">
                              <label><?php _e( 'Facebook App ID', 'ap-social-pro' ); ?></label>
                              <div class="apsc-option-field">
                                   <input type="text" name="social_profile[facebook][app_id]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'app_id' ] ) ? esc_attr( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'app_id' ] ) : ''; ?>"/>
                                   <div class="apsc-option-note"><?php _e( 'Please go to <a href="https://developers.facebook.com/" target="_blank">https://developers.facebook.com/</a> and create an app and get the App ID', 'ap-social-pro' ); ?></div>
                              </div>
                         </div>
                         <div class="apsc-option-inner-wrapper apsc-row-even">
                              <label><?php _e( 'Facebook App Secret', 'ap-social-pro' ); ?></label>
                              <div class="apsc-option-field">
                                   <input type="text" name="social_profile[facebook][app_secret]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'app_secret' ] ) ? esc_attr( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'app_secret' ] ) : ''; ?>"/>
                                   <div class="apsc-option-note"><?php _e( 'Please go to <a href="https://developers.facebook.com/" target="_blank">https://developers.facebook.com/</a> and create an app and get the App Secret', 'ap-social-pro' ); ?></div>
                              </div>
                         </div>
                    </div>
                    <div class="apss-facebook-method-2" id="apss-facebook-method-2" <?php echo ( isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'method' ] ) && $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'method' ] == '2' ) ? 'style=display:block;' : 'style=display:none;'; ?>>

                         <div class="apsc-option-inner-wrapper apsc-row-even">
                              <label><?php _e( 'Facebook Login', 'ap-social-pro' ); ?></label>
                              <div class="apsc-option-field">
                                   <button type="button" id="apsc_fb_connect"><?php _e( 'FB Connect', 'ap-social-pro' ); ?></button>
                                   <div class="apsc-fb-pages-list"></div>
                              </div>
                         </div>
                         <div class="apsc-option-inner-wrapper apsc-row-even">
                              <label><?php _e( 'Page Name', 'ap-social-pro' ); ?></label>
                              <div class="apsc-option-field">
                                   <input type="text" id="" class="apsc-page-name" name="social_profile[facebook][page_name]" value="<?php (isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'page_name' ] ) && ! empty( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'page_name' ] )) ? esc_attr_e( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'page_name' ] ) : ''; ?>" class="apsc-page-name" placeholder="<?php _e( 'Page Name', 'ap-social-pro' ); ?>" readonly />
                                   <div class="apsc-option-note"><?php _e( ' ', 'ap-social-pro' ); ?></div>
                              </div>
                         </div>
                         <div class="apsc-option-inner-wrapper apsc-row-even">
                              <label><?php _e( 'Page ID', 'ap-social-pro' ); ?></label>
                              <div class="apsc-option-field">
                                   <input type="text" class="apsc-page-id" id="" name="social_profile[facebook][fb_page_id]" value="<?php (isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'fb_page_id' ] ) && ! empty( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'fb_page_id' ] )) ? esc_attr_e( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'fb_page_id' ] ) : ''; ?>" class="apsc-page-name" placeholder="<?php _e( 'Page ID', 'ap-social-pro' ); ?>" readonly />
                                   <div class="apsc-option-note"><?php _e( ' ', 'ap-social-pro' ); ?></div>
                              </div>
                         </div>
                         <div class="apsc-option-inner-wrapper apsc-row-even">
                              <label><?php _e( 'Access Token', 'ap-social-pro' ); ?></label>
                              <div class="apsc-option-field">
                                   <input type="text" id="" class="apsc-page-token" name="social_profile[facebook][access_token]" value="<?php (isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'access_token' ] ) && ! empty( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'access_token' ] )) ? esc_attr_e( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'access_token' ] ) : ''; ?>" class="apsc-page-name" placeholder="<?php _e( 'Access Token', 'ap-social-pro' ); ?>" readonly />
                                   <div class="apsc-option-note"><?php _e( ' ', 'ap-social-pro' ); ?></div>
                              </div>
                         </div>
                         <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-widget-id="<?php echo 'apss-facebook-method-2'; ?>" onload="fbrev_init({widgetId: this.getAttribute('data-widget-id')})" style="display:none">
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[facebook][default_count]" value="<?php
                              if ( isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'default_count' ] ) ) {
                                   echo $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'default_count' ];
                              } else {
                                   echo '';
                              }
                              ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Twitter-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-twitter">
                         <h3><?php _e( 'Twitter', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd apsc-row-odd">
                         <label for="apsc-twitter">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" accesskey="">
                                   <input type="checkbox" name="social_profile[twitter][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-twitter"<?php if ( isset( $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-twitter">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Twitter Username', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[twitter][username]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'username' ] != '' ? $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'username' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the twitter username.For example:apthemes', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Twitter Consumer Key', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[twitter][consumer_key]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'consumer_key' ] ) && $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'consumer_key' ] != '' ? $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'consumer_key' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please create an app on Twitter through this link:', 'ap-social-pro' ); ?> <a href="https://dev.twitter.com/apps" target="_blank">https://dev.twitter.com/apps</a><?php _e( ' and get this information.' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Twitter Consumer Secret', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[twitter][consumer_secret]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'consumer_secret' ] ) && $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'consumer_secret' ] != '' ? $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'consumer_secret' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please create an app on Twitter through this link:', 'ap-social-pro' ); ?> <a href="https://dev.twitter.com/apps" target="_blank">https://dev.twitter.com/apps </a><?php _e( ' and get this information.' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Twitter Access Token', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[twitter][access_token]" value="<?php isset( $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'access_token' ] ) && $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'access_token' ] != '' ? $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'access_token' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please create an app on Twitter through this link:', 'ap-social-pro' ); ?> <a href="https://dev.twitter.com/apps" target="_blank">https://dev.twitter.com/apps </a><?php _e( ' and get this information.' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Twitter Access Token Secret', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[twitter][access_token_secret]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'access_token_secret' ] ) && $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'access_token_secret' ] != '' ? $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'access_token_secret' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please create an app on Twitter through this link:', 'ap-social-pro' ); ?> <a href="https://dev.twitter.com/apps" target="_blank">https://dev.twitter.com/apps </a><?php _e( ' and get this information.' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[twitter][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Google Plus-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-google-plus">
                         <h3><?php _e( 'Google Plus', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-google-plus">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[googlePlus][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-google-plus" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'googlePlus' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-google-plus">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Google Plus Page Name or Profile ID', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[googlePlus][page_id]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'googlePlus' ][ 'page_id' ] ) && $apsc_settings[ 'social_profile' ][ 'googlePlus' ][ 'page_id' ] != '' ? $apsc_settings[ 'social_profile' ][ 'googlePlus' ][ 'page_id' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the page name or profile ID.For example:If your page url is https://plus.google.com/+BBCNews then your page name is +BBCNews', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Google API Key', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[googlePlus][api_key]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'googlePlus' ][ 'api_key' ] ) && $apsc_settings[ 'social_profile' ][ 'googlePlus' ][ 'api_key' ] != '' ? $apsc_settings[ 'social_profile' ][ 'googlePlus' ][ 'api_key' ] : ''; ?>"/>
                              <div class="apsc-option-note">
                                   <p><?php _e( 'To get your API Key, please go to <a href="https://console.developers.google.com/project" target="_blank">https://console.developers.google.com/project</a> and follow below steps.', 'ap-social-pro' ); ?></p>
                                   <ol>
                                        <li> <?php _e( 'Click on create project.', 'ap-social-pro' ); ?></li>
                                        <li> <?php _e( 'Enter project name and click create, A new page will load with newly created app dashboard.', 'ap-social-pro' ); ?></li>
                                        <li> <?php _e( 'In the blue API box click on "Enable and manage APIs".', 'ap-social-pro' ); ?></li>
                                        <li> <?php _e( 'Enable google+ api by clicking on it.', 'ap-social-pro' ); ?></li>
                                        <li> <?php _e( 'Now click on credentials tab.', 'ap-social-pro' ); ?></li>
                                        <li> <?php _e( 'When you click on "Create Credentials" button, options will appear.', 'ap-social-pro' ); ?></li>
                                        <li> <?php _e( 'Now click on API key, a popup will appear.', 'ap-social-pro' ); ?></li>
                                        <li> <?php _e( 'Now click on Browser key.', 'ap-social-pro' ); ?></li>
                                        <li> <?php _e( 'Copy the browser key and paste in the above field.', 'ap-social-pro' ); ?></li>
                                   </ol>
                              </div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[googlePlus][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'googlePlus' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'googlePlus' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'googlePlus' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Instagram-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-instagram">
                         <h3><?php _e( 'Instagram', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-instagram">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[instagram][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-instagram" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-instagram">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Instagram Username', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[instagram][username]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'username' ] != '' ? $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'username' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the instagram username', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Instagram User ID', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[instagram][user_id]" value="<?php
                              if ( isset( $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'user_id' ] ) ) {
                                   echo $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'user_id' ];
                              } else {
                                   echo '';
                              }
                              ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the instagram user ID.You can get this information from <a href="http://instagram.pixelunion.net/" target="_blank">http://instagram.pixelunion.net/</a>', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Instagram Access Token', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[instagram][access_token]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'access_token' ] ) && $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'access_token' ] != '' ? $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'access_token' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the instagram Access Token.You can get this information from <a href="http://instagram.pixelunion.net/" target="_blank">http://instagram.pixelunion.net/</a>', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[instagram][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Youtube-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-youtube">
                         <h3><?php _e( 'Youtube', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-youtube">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[youtube][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-youtube"<?php if ( isset( $apsc_settings[ 'social_profile' ][ 'youtube' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-youtube">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Youtube Channel ID', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[youtube][channel_id]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'youtube' ][ 'channel_id' ] ) ? esc_attr( $apsc_settings[ 'social_profile' ][ 'youtube' ][ 'channel_id' ] ) : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the youtube channel ID.Your channel ID looks like: UC4WMyzBds5sSZcQxyAhxJ8g. And please note that your channel ID is different from username.Please go <a href="https://support.google.com/youtube/answer/3250431?hl=en" target="_blank">here</a> to know how to get your channel ID.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Youtube Channel URL', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[youtube][channel_url]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'youtube' ][ 'channel_url' ] ) && $apsc_settings[ 'social_profile' ][ 'youtube' ][ 'channel_url' ] != '' ? esc_attr( $apsc_settings[ 'social_profile' ][ 'youtube' ][ 'channel_url' ] ) : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the youtube channel URL.For example:https://www.youtube.com/user/accesspressthemes', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Youtube API Key', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[youtube][api_key]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'youtube' ][ 'api_key' ] ) ? esc_attr( $apsc_settings[ 'social_profile' ][ 'youtube' ][ 'api_key' ] ) : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'To get your API Key, first create a project/app in <a href="https://console.developers.google.com/project" target="_blank">https://console.developers.google.com/project</a> and then turn on Youtube Analytics API from "APIs & auth >APIs inside your project.Then again go to "APIs & auth > APIs > Credentials > Public API access" and then click "CREATE A NEW KEY" button, select the "Browser key" option and click in the "CREATE" button, and then copy your API key and paste in above field.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Subscribers Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[youtube][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'youtube' ][ 'default_count' ] ) ? esc_attr( $apsc_settings[ 'social_profile' ][ 'youtube' ][ 'default_count' ] ) : 0; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter total number of subscribers that your youtube channel has in case the API fetching is failed for automatic update.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Sound Cloud-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-sound-cloud">
                         <h3><?php _e( 'Sound Cloud', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-sound-cloud" >
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[soundcloud][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-sound-cloud" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-sound-cloud">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'SoundCloud Username', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[soundcloud][username]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'username' ] != '' ? $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'username' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the SoundCloud username.For example:bchettri', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'SoundCloud Client ID', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[soundcloud][client_id]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'client_id' ] ) && $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'client_id' ] != '' ? $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'client_id' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the SoundCloud APP Client ID.You can get this information from <a href="http://soundcloud.com/you/apps/new" target="_blank">http://soundcloud.com/you/apps/new</a> after creating a new app', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[soundcloud][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>

          </div>

          <!--Dribbble-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-dribble">
                         <h3><?php _e( 'Dribbble', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-extra-note">
                         <p><?php _e( 'Note: Dribbble needs authentication and complicated mechanism to get the followers count. So please use the static count for displaying the count in frontend.', 'ap-social-pro' ); ?></p>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-dribble">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[dribbble][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-dribble" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'dribbble' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-dribble">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Dribbble Username', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[dribbble][username]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'dribbble' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'dribbble' ][ 'username' ] != '' ? $apsc_settings[ 'social_profile' ][ 'dribbble' ][ 'username' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your dribbble username.For example:Creativedash', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Access Token', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[dribbble][access_token]" value="<?php
                              if ( isset( $apsc_settings[ 'social_profile' ][ 'dribbble' ][ 'access_token' ] ) ) {
                                   echo $apsc_settings[ 'social_profile' ][ 'dribbble' ][ 'access_token' ];
                              }
                              ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter access token from your dribbble app.', 'ap-social-pro' ); ?></div>
                              <div class="apsc-option-note">
                                   How to get access token? <br />
                                   please login to your dribbble account first and go to <a href='https://dribbble.com/account/applications/new' target='_blank'>this</a> link and create an app. There you will need to enter your app name, Description, Website URL, Callback URL and need to accept the dribbble API terms and conditions and Click on Register Application button. Upon Registration after page reload you will get your client access token. This is the required access token.
                              </div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[dribbble][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'dribbble' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'dribbble' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'dribbble' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Steam-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-steam">
                         <h3><?php _e( 'Steam', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-steam">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>

                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[steam][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-steam" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'steam' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-steam">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Steam Group Name', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[steam][group_name]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'steam' ][ 'group_name' ] ) && $apsc_settings[ 'social_profile' ][ 'steam' ][ 'group_name' ] != '' ? $apsc_settings[ 'social_profile' ][ 'steam' ][ 'group_name' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your steam group name.For example:BadgesCollectors', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[steam][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'steam' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'steam' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'steam' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Vimeo-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-vimeo">
                         <h3><?php _e( 'Vimeo', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-vimeo">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[vimeo][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-vimeo" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-vimeo">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Vimeo Username', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[vimeo][username]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'username' ] != '' ? $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'username' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your vimeo channel username.For example:documentaryfilm', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[vimeo][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Pinterest-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-pinterest">
                         <h3><?php _e( 'Pinterest', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-pinterest">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[pinterest][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-pinterest" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-pinterest">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Pinterest Profile URL', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[pinterest][profile_url]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'profile_url' ] ) && $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'profile_url' ] != '' ? $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'profile_url' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your pinterest profile url.For example:http://www.pinterest.com/froymejia', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[pinterest][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Forrst-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-forrst">
                         <h3><?php _e( 'Forrst', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-forrst">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[forrst][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-forrst" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-forrst">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Forrst Username', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[forrst][username]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'username' ] != '' ? $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'username' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your forrst username.For example:Ranger', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[forrst][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--VK-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-vk">
                         <h3><?php _e( 'VK', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-vk">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[vk][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-vk" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'vk' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-vk">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Group ID', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[vk][group_id]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'vk' ][ 'group_id' ] ) && $apsc_settings[ 'social_profile' ][ 'vk' ][ 'group_id' ] != '' ? $apsc_settings[ 'social_profile' ][ 'vk' ][ 'group_id' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your VK group ID.For example:applevk', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[vk][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'vk' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'vk' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'vk' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Flickr-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-flickr">
                         <h3><?php _e( 'Flickr', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-flickr">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[flickr][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-flickr" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-flickr">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Group ID', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[flickr][group_id]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'group_id' ] ) && $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'group_id' ] != '' ? $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'group_id' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your Flickr group ID.For example:44124373027@N01.To get your group ID please go to <a href="http://idgettr.com/" target="_blank">http://idgettr.com/</a>', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'API Key', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[flickr][api_key]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'api_key' ] ) && $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'api_key' ] != '' ? $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'api_key' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your Flickr API Key.You can get this api key by creating a app from <a href="https://www.flickr.com/services/apps/create/apply/?" target="_blank">https://www.flickr.com/services/apps/create/apply/?</a>.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[flickr][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Behance-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-behance">
                         <h3><?php _e( 'Behance', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-behance">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[behance][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-behance" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'behance' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-behance">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Behance Username', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[behance][username]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'behance' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'behance' ][ 'username' ] != '' ? $apsc_settings[ 'social_profile' ][ 'behance' ][ 'username' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your Behance Username.For example:matiascorea', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Behance API Key', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[behance][api_key]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'behance' ][ 'api_key' ] ) && $apsc_settings[ 'social_profile' ][ 'behance' ][ 'api_key' ] != '' ? $apsc_settings[ 'social_profile' ][ 'behance' ][ 'api_key' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your Behance API Key.To get the API key please go to <a href="https://www.behance.net/dev/register" target="_blank">https://www.behance.net/dev/register</a> and register an app and get the API Key.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[behance][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'behance' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'behance' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'behance' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Github-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-github">
                         <h3><?php _e( 'Github', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-github">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <labe  class="apsc-checkbox" l>
                                   <input type="checkbox" name="social_profile[github][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-github"<?php if ( isset( $apsc_settings[ 'social_profile' ][ 'github' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-github">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                                   </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Github Username', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[github][username]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'github' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'github' ][ 'username' ] != '' ? $apsc_settings[ 'social_profile' ][ 'github' ][ 'username' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your Github Username.For example:SimonEast', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[github][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'github' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'github' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'github' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Envato-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-envato">
                         <h3><?php _e( 'Envato', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-envato">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[envato][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-envato" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'envato' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-envato">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Envato Username', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[envato][username]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'envato' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'envato' ][ 'username' ] != '' ? $apsc_settings[ 'social_profile' ][ 'envato' ][ 'username' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your Envato Username.For example:AccessKeys', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Envato Profile URL', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[envato][profile_url]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'envato' ][ 'profile_url' ] ) && $apsc_settings[ 'social_profile' ][ 'envato' ][ 'profile_url' ] != '' ? $apsc_settings[ 'social_profile' ][ 'envato' ][ 'profile_url' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your Envato Profile URL.For example:http://codecanyon.net/user/AccessKeys', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[envato][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'envato' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'envato' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'envato' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--linkedin-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-linkedin">
                         <h3><?php _e( 'Linkedin', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-extra-note">
                         <p><?php _e( 'Note: Linkedin needs authentication and complicated mechanism to get the followers count. So please use the static count for displaying the count in frontend.', 'ap-social-pro' ); ?></p>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-linkedin">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[linkedin][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-linkedin" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-linkedin">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Linkedin profile URL', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[linkedin][profile_url]" value="<?php
                              if ( isset( $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'profile_url' ] ) ) {
                                   echo $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'profile_url' ];
                              }
                              ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the linkedin profile url. For example: https://www.linkedin.com/company/microsoft', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Counts', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[linkedin][default_count]" value="<?php
                              if ( isset( $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'default_count' ] ) ) {
                                   echo $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'default_count' ];
                              }
                              ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the static count you want to dispaly in the frontend.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Counter type', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <label for='linkedin_counter_type_followers'>
                                   <input type='radio' name='social_profile[linkedin][linkedin_counter_type]' id='linkedin_counter_type_followers' value='followers'
                                   <?php
                                   if ( isset( $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'linkedin_counter_type' ] ) && $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'linkedin_counter_type' ] == 'followers' ) {
                                        echo "checked='checked'";
                                   }
                                   ?>
                                          />
                                          <?php _e( 'Followers', 'ap-social-pro' ); ?>
                              </label>
                              <label for='linkedin_counter_type_connections'>
                                   <input type='radio' name='social_profile[linkedin][linkedin_counter_type]' id='linkedin_counter_type_connections' value='connections'
                                   <?php
                                   if ( isset( $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'linkedin_counter_type' ] ) && $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'linkedin_counter_type' ] == 'connections' ) {
                                        echo "checked='checked'";
                                   }
                                   ?>
                                          />
                                          <?php _e( 'Connections', 'ap-social-pro' ); ?>
                              </label>
                              <div class="apsc-option-note"><?php _e( 'Please select the option above to choose between followers or connections', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--rss-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-rss">
                         <h3><?php _e( 'RSS', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-rss">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[rss][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-rss" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'rss' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-rss">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'RSS url', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[rss][rss_url]" value="<?php
                              if ( isset( $apsc_settings[ 'social_profile' ][ 'rss' ][ 'rss_url' ] ) ) {
                                   echo $apsc_settings[ 'social_profile' ][ 'rss' ][ 'rss_url' ];
                              }
                              ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the rss feed url. For example: https://www.linkedin.com/company/microsoft', 'ap-social-pro' ); ?></div>

                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Counts', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[rss][default_count]" value="<?php
                              if ( isset( $apsc_settings[ 'social_profile' ][ 'rss' ][ 'default_count' ] ) ) {
                                   echo $apsc_settings[ 'social_profile' ][ 'rss' ][ 'default_count' ];
                              }
                              ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the count value to show in frontend.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Posts-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-posts">
                         <h3><?php _e( 'Posts', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-posts">
                              <?php _e( 'Display Counter', 'ap-social-pro' ); ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[posts][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-posts" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'posts' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-posts">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
               </div>
          </div>

          <!--Comments-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-comments">
                         <h3><?php _e( 'Comments', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-comments">
                              <?php _e( 'Display Counter', 'ap-social-pro' ); ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[comments][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-comments"<?php if ( isset( $apsc_settings[ 'social_profile' ][ 'comments' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-comments">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
               </div>
          </div>

          <!--Twitch-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-twitch">
                         <h3><?php _e( 'Twitch', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-envato">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[twitch][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-twitch" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-twitch">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Twitch Channel Name', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[twitch][channel_name]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'channel_name' ] ) && $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'channel_name' ] != '' ? $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'channel_name' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your twitch channel_name. ', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Twitch Access Token', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[twitch][access_token]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'access_token' ] ) && $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'access_token' ] != '' ? $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'access_token' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your twitch access token.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[twitch][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Spotify -->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-spotify">
                         <h3><?php _e( 'Spotify', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-envato">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[spotify][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-spotify" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'spotify' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-spotify">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Spotify URI', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[spotify][url]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'spotify' ][ 'url' ] ) && $apsc_settings[ 'social_profile' ][ 'spotify' ][ 'url' ] != '' ? $apsc_settings[ 'social_profile' ][ 'spotify' ][ 'url' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your spotify url.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[spotify][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'spotify' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'spotify' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'spotify' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Feedly-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-feedly">
                         <h3><?php _e( 'Feedly', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-envato">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[feedly][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-feedly" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-feedly">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Feedly URI', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[feedly][url]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'url' ] ) && $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'url' ] != '' ? $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'url' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your feedly URL.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[feedly][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Slideshare-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-slideShare">
                         <h3><?php _e( 'SlideShare', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-envato">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[slideshare][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-slideshare" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-slideshare">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'SlideShare Username', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[slideshare][username]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'username' ] != '' ? $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'username' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your slideshare username.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[slideshare][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Foursquare-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-foursquare">
                         <h3><?php _e( 'Foursquare', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-envato">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[foursquare][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-foursquare" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-foursquare">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Foursquare API Key', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[foursquare][api_key]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'api_key' ] ) && $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'api_key' ] != '' ? $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'api_key' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your foursquare api key.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[foursquare][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Weheartit-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-weheartit">
                         <h3><?php _e( 'Weheartit', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-envato">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[weheartit][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-weheartit" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-weheartit">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Weheartit Username', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[weheartit][username]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'username' ] != '' ? $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'username' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your weheartit username.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[weheartit][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

          <!--Delicious-->
          <div class="apsc-option-outer-wrapper">
               <div class="apsc-element apsc-abc apsc-clearfix">
                    <label class="apsc-sn-delicious">
                         <h3><?php _e( 'Delicious', 'ap-social-pro' ) ?></h3>
                    </label>
                    <div class="apsc-element-action-buttons">
                         <a href="javascript:void(0)" class="apsc-elements-settings-trigger button-primary">Settings</a>
                         <span class="fa fa-chevron-down"></span>
                    </div>
               </div>
               <div class="apsc-elements-settings-wrap" style="display:none;" >
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label for="apsc-envato">
                              <?php _e( 'Display Counter', 'ap-social-pro' ) ?>
                         </label>
                         <div class="apsc-option-field">
                              <label  class="apsc-checkbox" >
                                   <input type="checkbox" name="social_profile[delicious][active]" value="1" class="apsc-counter-activation-trigger" id="apsc-delicious" <?php if ( isset( $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'active' ] ) ) { ?>checked="checked"<?php } ?>/>
                                   <label class="apsc-general-checkbox" for="apsc-delicious">
                                        <?php _e( 'Show/Hide', 'ap-social-pro' ); ?>
                                   </label>
                                   <div class="apsc-check round"></div>
                              </label>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-even">
                         <label><?php _e( 'Delicious Username', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[delicious][username]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'username' ] ) && $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'username' ] != '' ? $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'username' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter your delicious username.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
                    <div class="apsc-option-inner-wrapper apsc-row-odd">
                         <label><?php _e( 'Default Count', 'ap-social-pro' ); ?></label>
                         <div class="apsc-option-field">
                              <input type="text" name="social_profile[delicious][default_count]" value="<?php echo isset( $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'default_count' ] ) && $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'default_count' ] != '' ? $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'default_count' ] : ''; ?>"/>
                              <div class="apsc-option-note"><?php _e( 'Please enter the default count to show instead of 0 when API\'s are not available.', 'ap-social-pro' ); ?></div>
                         </div>
                    </div>
               </div>
          </div>

     </div>
</div>