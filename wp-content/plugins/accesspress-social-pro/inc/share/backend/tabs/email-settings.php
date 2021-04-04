<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="apss-tab-contents apss-email-settings" id="tab-apss-email-settings" style='display:none'>
     <div class="apss-subhead">
          <h2><?php _e( 'Email Settings', APSS_TEXT_DOMAIN ) ?></h2>
     </div>
     <div class="apss-row-odd">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3> <?php _e( 'Disable popup ?', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="">
                         <input type ='checkbox' name="apss_share_settings[apss_email_share_popup_disable]" value='1' <?php
                         if ( isset( $options[ 'apss_email_share_popup_disable' ] ) ) {
                              checked( $options[ 'apss_email_share_popup_disable' ], 1 );
                         }
                         ?> />
                                <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>

                    </label>
                    <p class="description"> <?php _e( 'Please select this option if you want to disable the popup email share and allow user to use their mailing app.', APSS_TEXT_DOMAIN ) ?> </p>
               </div>
          </div>
     </div>
     <div class="apss-row-even">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3> <?php _e( 'Email subject', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="">
                         <input type='text' name="apss_share_settings[apss_email_subject]" value="<?php echo $options[ 'apss_email_subject' ] ?>" />
                    </label>
                    <p class="description"> <?php _e( 'Please enter a subject for your mail', APSS_TEXT_DOMAIN ) ?> </p>
               </div>
          </div>
     </div>
     <div class="apss-row-odd">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3> <?php _e( 'Email body', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="">
                         <textarea rows='30' cols='30' name="apss_share_settings[apss_email_body]"><?php echo $options[ 'apss_email_body' ] ?></textarea>
                    </label>
                    <p class="description">
                         <?php _e( 'Available parameters: <br />
				            %%url%% = current page/post url(custom url if you have used "custom_share_link" attribute in the shortcode ) <br />
				            %%title%% = current page/post\'s title <br />
				            %%permalink%% = current page/post url <br />
				            %%siteurl%% = Site url <br />', APSS_TEXT_DOMAIN ) ?>
                    </p>
               </div>
          </div>
     </div>
</div>

