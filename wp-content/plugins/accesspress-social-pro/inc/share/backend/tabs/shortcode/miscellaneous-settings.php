<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>

<div class="apss-subhead">
     <h2><?php _e( 'Miscellaneous Settings', APSS_TEXT_DOMAIN ) ?></h2>
</div>
<div class="apss-row ">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3> <?php _e( 'Twitter Username', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <input type="text" name="twitter_username"  value="" />
               </label>
               <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ) ?> </p>
          </div>
     </div>
</div>

<div class="apss-row">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3>  <?php _e( 'Twitter 3rd Party API Intergration', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <input type="radio" id='apss_twitter_counter_option' name="twitter_api_use" value="1"  />
                    <?php _e( "Don't show Twitter share counts", APSS_TEXT_DOMAIN ); ?>
               </label>
               <p class="description"> <?php _e( ' Please select this option if you don\'t want to show twitter share counts.', APSS_TEXT_DOMAIN ) ?> </p>

               <label class="">
                    <input type="radio" id='apss_twitter_counter_option_1' name="twitter_api_use" value="2"  />
                    <?php _e( 'Use', APSS_TEXT_DOMAIN ); ?> <a href='http://newsharecounts.com' target='_blank'>NewShareCounts</a><?php _e( ' to show Twitter share counts', APSS_TEXT_DOMAIN ); ?>
               </label>
               <p class="description"> To use newsharecount public API, you have to enter your website url <?php echo site_url(); ?> and sign in using Twitter at their <a href='http://newsharecounts.com/' target='_blank'>website</a>.</p>

               <label class="">
                    <input type="radio" id='apss_twitter_counter_option_2' name="twitter_api_use" value="3"  />
                    <?php _e( 'Use', APSS_TEXT_DOMAIN ); ?> <a href='   http://opensharecount.com/' target='_blank'>OpenShareCount</a><?php _e( ' to show Twitter share counts', APSS_TEXT_DOMAIN ); ?>
               </label>
               <p class="description">To use opensharecount public API, you have to sign up and register your website url <?php echo site_url(); ?> at their <a href='http://opensharecount.com/' target='_blank'>website</a>. </p>
               <p class="description"> Note: If you switch the API please don't forget to clear cache for fetching new share counts. </p>
          </div>
     </div>
</div>
<div class="apss-row">
     <h4>If facebook counter is not working. Please setup the facebook APP and enter required details below.</h4>
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3><?php _e( 'Facebook APP ID:', APSS_TEXT_DOMAIN ); ?></h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <input type='text' id="apss_facebook_app_id" name='fb_app_id' value="" />
               </label>
               <p class="description">Please go to <a href="https://developers.facebook.com/" target="_blank">https://developers.facebook.com/</a> and create an app and get the App ID</p>
          </div>
     </div>

     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3> <?php _e( 'Facebook APP Secret:', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <input type='text' id="apss_facebook_app_secret" name='fb_app_secret' value="" />
               </label>
               <p class="description"> Please go to <a href="https://developers.facebook.com/" target="_blank">https://developers.facebook.com/</a> and create an app and get the App Secret</p>
               <p class="apss_notes_cache_settings"><b>Please note that you should make your APP live.</b> </p>
          </div>
     </div>
</div>
<div class="apss-row ">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3>  <?php _e( 'Enable Share Count', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <input type="radio" id='enable_share_count' name="enable_share_count" value="1" />
                    <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
               </label>
               <label class="">
                    <input type="radio" id='enable_share_count' name="enable_share_count" value="0" checked/>
                    <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
               </label>
               <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ) ?> </p>
          </div>
     </div>
</div>
<div class="apss-row ">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3>  <?php _e( 'Enable Total Share Count', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <input type="radio" id='enable_total_share_count' name="enable_total_share_count" value="1" />
                    <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
               </label>
               <label class="">
                    <input type="radio" id='enable_total_share_count' name="enable_total_share_count" value="0" checked/>
                    <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
               </label>
               <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ) ?> </p>
          </div>
     </div>
</div>
<div class="apss-row ">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3> <?php _e( 'Custom Share Link', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <input type="text" name="custom_share_link"  value="" />
               </label>
               <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ) ?> </p>
          </div>
     </div>
</div>
<div class="apss-row ">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3>  <?php _e( 'Fetch Share Counts From HTTP URL', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <input type="radio" id='enable_http_count_yes' name="enable_http_count" value="1" />
                    <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
               </label>
               <label class="">
                    <input type="radio" id='enable_http_count_no' name="enable_http_count" value="0" checked/>
                    <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
               </label>
               <p class="description"> <?php _e( '<b>Note:</b> Please select this option if you have moved your site from HTTP to HTTPS. For Facebook and Google+, The crawler still needs to be able to access the old page, so exempt the crawler\'s user agent from the redirect and only send an HTTP redirect to non-Facebook crawler clients. If you have done 301 redirect then the old url share counts will be lost.', APSS_TEXT_DOMAIN ) ?> </p>
          </div>
     </div>
</div>
<div class="apss-row ">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3>  <?php _e( 'Social Share Link Option', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <input type="radio" id='dialog_box_options_blank' name="dialog_box_options" value="0" checked/>
                    <?php _e( 'Open in same window', APSS_TEXT_DOMAIN ); ?>
               </label>

               <label class="">
                    <input type="radio" id='dialog_box_options_new' name="dialog_box_options" value="1" />
                    <?php _e( 'Open in new window/Tab', APSS_TEXT_DOMAIN ); ?>
               </label>

               <label class="">
                    <input type="radio" id='dialog_box_options_3' name="dialog_box_options" value="2" />
                    <?php _e( 'Open in popup window', 'ap-social-pro' ); ?>
               </label>

               <p class="description"> <?php _e( '', APSS_TEXT_DOMAIN ) ?> </p>
          </div>
     </div>
</div>
<div class="apss-row ">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3>  <?php _e( 'Disable Whatsapp Share', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <input type="radio" id='disable_whatsapp_button_no' name="disable_whatsapp_in_desktop" value="0" />
                    <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
               </label>

               <label class="">
                    <input type="radio" id='disable_whatsapp_button_yes' name="disable_whatsapp_in_desktop" value="1" checked/>
                    <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
               </label>

               <p class="description"> <?php _e( 'Note: for non mobile devices only.', APSS_TEXT_DOMAIN ) ?> </p>
          </div>
     </div>
</div>
<div class="apss-row ">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3>  <?php _e( 'Disable Viber Share', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <input type="radio" id='disable_viber_button_no' name="disable_viber_in_desktop" value="0" />
                    <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
               </label>

               <label class="">
                    <input type="radio" id='disable_viber_button_yes' name="disable_viber_in_desktop" value="1" checked />
                    <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
               </label>

               <p class="description"> <?php _e( 'Note: for non mobile devices only.', APSS_TEXT_DOMAIN ) ?> </p>
          </div>
     </div>
</div>
<div class="apss-row ">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3>  <?php _e( 'Disable SMS Share', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <input type="radio" id='disable_sms_button_no' name="disable_sms_in_desktop" value="0" />
                    <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
               </label>

               <label class="">
                    <input type="radio" id='disable_sms_button_yes' name="disable_sms_in_desktop" value="1" checked />
                    <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
               </label>

               <p class="description"> <?php _e( 'Note: for non mobile devices only.', APSS_TEXT_DOMAIN ) ?> </p>
          </div>
     </div>
</div>
<div class="apss-row ">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3>  <?php _e( 'Disable Messenger Share', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <input type="radio" id='disable_messenger_button_no' name="disable_messenger_in_desktop" value="0" />
                    <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
               </label>

               <label class="">
                    <input type="radio" id='disable_messenger_button_yes' name="disable_messenger_in_desktop" value="1" checked/>
                    <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
               </label>

               <p class="description"> <?php _e( 'Note: for non mobile devices only', APSS_TEXT_DOMAIN ) ?> </p>
          </div>
     </div>
</div>