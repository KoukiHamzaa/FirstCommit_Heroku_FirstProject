<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="apss-tab-contents apss-sticky-header-share-settings" id="tab-apss-sticky-header-share-settings" style='display:none'>
     <div class="apss-subhead">
          <h2><?php _e( 'Sticky Header Share Settings:', APSS_TEXT_DOMAIN ) ?></h2>
     </div>

     <div class="apss-row-odd">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label for="apsc-sticky-share">
                         <h3>  <?php _e( 'Enable Sticky Share Buttons At Top', APSS_TEXT_DOMAIN ) ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="enable_comment apss-switch">
                         <input type="checkbox" id="apsc-sticky-share" class='apss-sticky-header-share-enable' name="apss_share_settings[social_share_sticky_share][enable]" value='1' <?php
                         if ( isset( $options[ 'social_share_sticky_share' ][ 'enable' ] ) ) {
                              checked( $options[ 'social_share_sticky_share' ][ 'enable' ], 1 );
                         }
                         ?> />
                         <label class="apsc-general-checkbox" for="apsc-sticky-share">
                              <?php _e( 'Enable', 'ap-social-pro' ); ?>
                         </label>
                         <div class="apsc-check round"></div>
                    </label>
                    <p class="description"> <?php _e( 'Check to enable sticky share button at the top of your site', APSS_TEXT_DOMAIN ) ?> </p>
               </div>
          </div>
     </div>

     <div class="apss-sticky-header-share-settings-wrapper" <?php if ( isset( $options[ 'social_share_sticky_share' ][ 'enable' ] ) && $options[ 'social_share_sticky_share' ][ 'enable' ] == '1' ) { ?> style='display:block;' <?php } else { ?> style='display:none;' <?php } ?>  >
          <div class="apss-row-even">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <h3>  <?php _e( 'Upload Site Logo', APSS_TEXT_DOMAIN ) ?> </h3>
                    </div>
                    <div class="apss-option-value">
                         <label>
                              <button id="apss-custom-image-upload"><?php _e( 'Upload an image using media library', APSS_TEXT_DOMAIN ); ?></button>
                         </label>

                         <p class="description"> <?php _e( 'Upload your site logo ', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>

          <div class="apss-row-odd">
               <div class="apss-general-div" >
                    <div class="apss-title-div">
                         <h3>  <?php _e( 'URL address of site logo', APSS_TEXT_DOMAIN ) ?> </h3>
                    </div>
                    <div class="apss-option-value">
                         <label>
                              <input type="url" id="apss_custom_image_url"  readonly name="apss_share_settings[social_share_sticky_share][image_url]" value="<?php
                              if ( isset( $options[ 'social_share_sticky_share' ][ 'image_url' ] ) ) {
                                   echo $options[ 'social_share_sticky_share' ][ 'image_url' ];
                              }
                              ?>">
                         </label>
                         <p class="description"> <?php _e( 'The link to your uploaded site logo will be placed here', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
          <div class="apss-row-even" style="display:none;">
               <div class="apss-general-div" >
                    <div class="apss-title-div">
                         <h3>  <?php _e( 'Height', APSS_TEXT_DOMAIN ) ?> </h3>
                    </div>
                    <div class="apss-option-value">
                         <label>
                              <input type="number" min="0" step="1" id="apss_custom_image_height" name="apss_share_settings[social_share_sticky_share][image_height]" value="<?php
                              if ( isset( $options[ 'social_share_sticky_share' ][ 'image_height' ] ) ) {
                                   echo $options[ 'social_share_sticky_share' ][ 'image_height' ];
                              }
                              ?>" class="small-text"> px
                         </label>
                         <p class="description"> <?php _e( 'Set the height of your site logo', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
          <div class="apss-row-odd" style="display:none;">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <h3>  <?php _e( 'Width', APSS_TEXT_DOMAIN ) ?> </h3>
                    </div>
                    <div class="apss-option-value">
                         <label>
                              <input type="number" min="0" step="1" id="apss_custom_image_width" name="apss_share_settings[social_share_sticky_share][image_width]" value="<?php
                              if ( isset( $options[ 'social_share_sticky_share' ][ 'image_width' ] ) ) {
                                   echo $options[ 'social_share_sticky_share' ][ 'image_width' ];
                              }
                              ?>" class="small-text"> px
                         </label>
                         <p class="description"> <?php _e( 'Set the width of your site logo', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
          <div class="apss-row-even">
               <div class="apss-general-div" >
                    <div class="apss-title-div">
                         <h3>  <?php _e( 'Sticky header share site logo preview', APSS_TEXT_DOMAIN ) ?> </h3>
                    </div>
                    <div class="apss-option-value">
                         <label>
                              <?php
                              if ( isset( $options[ 'social_share_sticky_share' ][ 'image_url' ] ) ) {
                                   $image_url = $options[ 'social_share_sticky_share' ][ 'image_url' ];
                                   $image_width = $options[ 'social_share_sticky_share' ][ 'image_width' ];
                                   $image_height = $options[ 'social_share_sticky_share' ][ 'image_height' ];
                              } else {
                                   $image_width = '0';
                                   $image_height = '0';
                                   $image_url = '';
                              }
                              ?>
                              <span id="apss_custom_button_preview" class="custom-preview">
                                   <img id='apss_custom_button_image_preview' src='<?php echo $image_url; ?>' />
                              </span>
                              <?php //  /* ?>
                              <div class="apss-row">
                                   <button id="apss_refresh_custom_button_preview" class="preview-btn">Refresh preview</button>
                              </div>
                              <?php //  */ ?>
                         </label>
                         <p class="description"> <?php _e( 'The preview of your uploaded logo will be displayed here', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
     </div>
</div>