<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="apss-tab-contents apss-shortcode-generator-settings" id="tab-apss-shortcode-generator-settings" style='display:none'>
     <div class="apss-shortcode-outer-wrap">
          <div class="apss-shortcode-wrap">
               <div class="apss-shortcode-generator-wrapper apss-option-outer-wrapper" id="tab-social-network-settings" >
                    <?php include('shortcode/social-network.php'); ?>
               </div>

               <div class="apss-shortcode-generator-wrapper apss-option-outer-wrapper" id="tab-display-settings" style="display:none;">
                    <?php include('shortcode/display-settings.php'); ?>
               </div>

               <div class="apss-shortcode-generator-wrapper apss-option-outer-wrapper" id="tab-miscellaneous-settings" style="display:none;">
                    <?php include('shortcode/miscellaneous-settings.php'); ?>
               </div>

               <div class="apss-shortcode-generator-wrapper apss-option-outer-wrapper" id="tab-custom-text-settings" style="display:none;">
                    <?php include('shortcode/custom-text-settings.php'); ?>
               </div>
          </div>
          <div class="apss-field">
               <div class="apss-shortcode">
                    <?php _e( 'You can copy generated shortcode anywhere either post, page or widget.', APSS_TEXT_DOMAIN ); ?>
                    <textarea class="apss_short_codeDisp"  name="apss_settings[generate_shortcode]" id="apss_generated_shortcode" readonly="readonly" rows="10"><?php
                         if ( isset( $apss_settings[ 'generate_shortcode' ] ) ) {
                              echo str_replace( '\\', '', ($apss_settings[ 'generate_shortcode' ] ) );
                         }
                         ?>
                    </textarea>
                    <span style="display:none;" class="apss_copied-msg"> Shortcode copied in clipboard </span>
               </div>
               <div class="apss-field-wrap">
                    <input type="button"  class="apss-shortcode-button" value="<?php _e( ' Click Me To Generate Shortcode', APSS_TEXT_DOMAIN ); ?>"/>
               </div>
          </div>
     </div>
</div>