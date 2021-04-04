<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>

<div class="apss-tab-contents apss-share-counter-settings" id="tab-apss-share-counter-settings" style='display:none'>
     <ul class="apss-inner-share-tab-setting-tabs clearfix">
          <li><div data-link="total-share-counter" id="apss-total-share-counter" class="apss-inner-share-tabs-trigger apss-inner-active-tab "><?php _e( 'Total Share Count', APSS_TEXT_DOMAIN ); ?></div></li>
          <li><div data-link="individual-share-counter"  id="individual-share-counter" class="apss-inner-share-tabs-trigger "><?php _e( 'Individual Share Count', APSS_TEXT_DOMAIN ) ?></div></li>
          <li><div data-link="counter-update-settings" id="apss-counter-update-settings" class="apss-inner-share-tabs-trigger"><?php _e( 'Counter Update', APSS_TEXT_DOMAIN ); ?></div></li>
     </ul>

     <div class="apss-share-counter-settings-wrapper apss-total-share-wrapper apss-option-outer-wrapper" id="tab-total-share-counter">
          <div class="apss-elements-settings-wrap" >
               <div class="apss-row-odd">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3> <?php _e( 'Enable Social Share Total Counter', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="radio" id='total_counter_enable_options_n' name="apss_share_settings[total_counter_enable_options]" value="0" <?php
                                   if ( isset( $options[ 'total_counter_enable_options' ] ) && $options[ 'total_counter_enable_options' ] === '0' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <label class="">
                                   <input type="radio" id='total_counter_enable_options_y' name="apss_share_settings[total_counter_enable_options]" value="1" <?php
                                   if ( isset( $options[ 'total_counter_enable_options' ] ) && $options[ 'total_counter_enable_options' ] === '1' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <p class="description"> <?php _e( "Select 'Yes' to display total share count in the frontend", APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
               <div class="apss-row-even">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Counter Format', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input id='counter_number_options_1' type="radio" name="apss_share_settings[counter_type_options]" value="1" <?php
                                   if ( isset( $options[ 'counter_type_options' ] ) && $options[ 'counter_type_options' ] == '1' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( '1200', APSS_TEXT_DOMAIN ); ?>
                              </label>

                              <label class="">
                                   <input id='counter_number_options_2' type="radio" name="apss_share_settings[counter_type_options]" value="2" <?php
                                   if ( isset( $options[ 'counter_type_options' ] ) && $options[ 'counter_type_options' ] == '2' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( '1,200', APSS_TEXT_DOMAIN ); ?>
                              </label>

                              <label class="">
                                   <input id='counter_number_options_3' type="radio" name="apss_share_settings[counter_type_options]" value="3" <?php
                                   if ( isset( $options[ 'counter_type_options' ] ) && $options[ 'counter_type_options' ] == '3' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( '1K', APSS_TEXT_DOMAIN ); ?>
                              </label>

                              <p class="description"> <?php _e( 'Select a format you want your share count to be displayed in', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
               <div class="apss-row-odd">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Prepend Text', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="text" name="apss_share_settings[total_count_prepend_text]" value="<?php echo isset( $options[ 'total_count_prepend_text' ] ) && $options[ 'total_count_prepend_text' ] != '' ? $options[ 'total_count_prepend_text' ] : ''; ?>"/>
                                   <!--<input type="text" name="apss_share_settings[total_count_prepend_text]" value=""/>-->
                              </label>
                              <p class="description"> <?php _e( 'Enter a text to be appended before total count', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
               <div class="apss-row-even">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Append Text', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="text" name="apss_share_settings[total_count_append_text]" value="<?php echo (isset( $options[ 'total_count_append_text' ] ) && $options[ 'total_count_append_text' ] != '' ) ? $options[ 'total_count_append_text' ] : ''; ?>"  />
                                   <!--<input type="text" name="apss_share_settings[total_count_append_text]" value=""  />-->
                              </label>
                              <p class="description"> <?php _e( 'Enter a text to be added after total count', APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>

          </div>
     </div>

     <div class="apss-share-counter-settings-wrapper apss-individual-share-wrapper apss-option-outer-wrapper" id="tab-individual-share-counter" style="display:none;">
          <div class="apss-elements-settings-wrap" >
               <div class="apss-row-odd">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Enable Social Share Counter ', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label class="">
                                   <input type="radio" id='counter_enable_options_n' name="apss_share_settings[counter_enable_options]" value="0" <?php
                                   if ( isset( $options[ 'counter_enable_options' ] ) && $options[ 'counter_enable_options' ] == '0' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <label class="">
                                   <input type="radio" id='counter_enable_options_y' name="apss_share_settings[counter_enable_options]" value="1" <?php
                                   if ( isset( $options[ 'counter_enable_options' ] ) && $options[ 'counter_enable_options' ] == '1' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <p class="description"> <?php _e( "Select 'Yes' to display individual share count in respective social medias", APSS_TEXT_DOMAIN ) ?> </p>
                         </div>
                    </div>
               </div>
          </div>
          <div class="apss-row-even">
               <div class="apss-general-div">
                    <div class="apss-title-div">
                         <label>
                              <h3>  <?php _e( 'Counter Format', APSS_TEXT_DOMAIN ); ?> </h3>
                         </label>
                    </div>
                    <div class="apss-option-value">
                         <label class="">
                              <input id='counter_number_options_1' type="radio" name="apss_share_settings[individual_counter_format]" value="1" <?php
                              if ( $options[ 'individual_counter_format' ] == '1' ) {
                                   echo "checked='checked'";
                              }
                              ?> />
                                     <?php _e( '1200', APSS_TEXT_DOMAIN ); ?>
                         </label>

                         <label class="">
                              <input id='counter_number_options_2' type="radio" name="apss_share_settings[individual_counter_format]" value="2" <?php
                              if ( $options[ 'individual_counter_format' ] == '2' ) {
                                   echo "checked='checked'";
                              }
                              ?> />
                                     <?php _e( '1,200', APSS_TEXT_DOMAIN ); ?>
                         </label>

                         <label class="">
                              <input id='counter_number_options_3' type="radio" name="apss_share_settings[individual_counter_format]" value="3" <?php
                              if ( $options[ 'individual_counter_format' ] == '3' ) {
                                   echo "checked='checked'";
                              }
                              ?> />
                                     <?php _e( '1K', APSS_TEXT_DOMAIN ); ?>
                         </label>

                         <p class="description"> <?php _e( 'Select a format in which you want your individual count to be displayed in', APSS_TEXT_DOMAIN ) ?> </p>
                    </div>
               </div>
          </div>
     </div>

     <div class="apss-share-counter-settings-wrapper apss-counter-update apss-option-outer-wrapper" id="tab-counter-update-settings" style="display:none;">
          <div class="apss-elements-settings-wrap" >
               <div class="apss-row-odd">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Enable Cache', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label>
                                   <input type="radio" id='enable_cache_yes' name="apss_share_settings[enable_cache]" value="1" <?php
                                   if ( isset( $options[ 'enable_cache' ] ) && $options[ 'enable_cache' ] == '1' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'Yes', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <label>
                                   <input type="radio" id='enable_cache_no' name="apss_share_settings[enable_cache]" value="0" <?php
                                   if ( isset( $options[ 'enable_cache' ] ) && $options[ 'enable_cache' ] == '0' ) {
                                        echo "checked='checked'";
                                   }
                                   ?> />
                                          <?php _e( 'No', APSS_TEXT_DOMAIN ); ?>
                              </label>
                              <p class="description"><?php _e( "Select 'Yes' to enable cache for the share counter", APSS_TEXT_DOMAIN ); ?></p>
                         </div>
                    </div>
               </div>
               <div class="apss-row-even">
                    <div class="apss-general-div">
                         <div class="apss-title-div">
                              <label>
                                   <h3>  <?php _e( 'Cache Period', APSS_TEXT_DOMAIN ); ?> </h3>
                              </label>
                         </div>
                         <div class="apss-option-value">
                              <label>
                                   <input type='text' id="apss_cache_period" name='apss_share_settings[cache_settings]' value="<?php
                                   if ( isset( $options[ 'cache_period' ] ) ) {
                                        echo $options[ 'cache_period' ];
                                   }
                                   ?>" onkeyup="removeMe('invalid_cache_period');"/>
                                   <span class="error invalid_cache_period"></span>
                              </label>

                              <p class="description"><?php _e( 'Please enter the time in hours in which the social share counter should be updated. Default is 24 hours. The minimum cache period you can setup is 1 hour.', APSS_TEXT_DOMAIN ); ?></p>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
