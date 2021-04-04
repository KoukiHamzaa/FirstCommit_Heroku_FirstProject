<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="apsc-boards-tabs" id="apsc-board-import-export-settings" style="display:none">
     <?php /* ?>
       <div class="apsc-tab-wrapper">
       <div class="apsc-option-inner-wrapper apsc-row-odd">
       <label> <?php _e( 'Export Settings', 'ap-social-pro' ); ?> </label>
       <div class="apsc-option-field">
       <label>
       <?php
       $goback = esc_url_raw( 'admin.php?page=ap-social-counter-pro' );
       $backup_string = json_encode( $apsc_settings );
       ?>
       <textarea  rows="15" cols="100"><?php echo $backup_string ?></textarea>
       <a href="<?php echo $goback ?>" class = "apsc-export-file-button">Export File</a>
       </label>
       <p class="description"><?php _e( '', 'ap-social-pro' ); ?></p>
       </div>
       </div>
       <?php */ ?>
     <div class="apsc-option-inner-wrapper apsc-row-odd">
          <label>  <?php _e( 'Export File', 'ap-social-pro' ); ?> </label>
          <div class="apsc-option-field">
               <?php
               $goback = esc_url_raw( 'admin.php?action=apsc_settings_action' );
               ?>
               <label>
                    <a class="apsc-export-file-download-button" href="<?php echo admin_url( 'admin-post.php?action=apsc_plugin_settings_download&_wpnonce=' . wp_create_nonce( 'apsc_plugin_settings_download_nonce' ) ) ?>"><?php _e( 'Download File', 'ap-social-pro' ); ?></a>
               </label>
               <div class="apsc-option-note">
                    <?php _e( 'Please download the social counter\'s settings from the button above', 'ap-social-pro' ); ?>
               </div>
          </div>
     </div>
     <div class="apsc-option-inner-wrapper apsc-row-even">
          <label><?php _e( 'Import File', 'ap-social-pro' ); ?> </label>
          <div class="apsc-option-field">
               <label>
                    <input type="text"  value=""/>
                    <input type="button" class="button-primary apsc-media-uploader" value="<?php _e( 'Upload Import File', 'ap-social-pro' ); ?>"/>
               </label>
               <div class="apsc-option-note">
                    <?php _e( 'Please upload the social counter\'s setting from the button above', 'ap-social-pro' ); ?>
               </div>
          </div>
     </div>
     <div class="apsc-option-inner-wrapper apsc-row-even">
          <label>
               <?php _e( 'Import Settings', 'ap-social-pro' ); ?>
          </label>
          <div class="apsc-option-field">
               <label>
                    <textarea id="apsc-imported-file-content" rows="15" cols="100"></textarea>
                    <a href="#" class="apsc-import-file-button" id="apsc-import-file-button">Import File</a>
               </label>
               <div class="apsc-option-note">
                    <?php _e( 'Please import the social counter\'s setting from the button above', 'ap-social-pro' ); ?>
               </div>          </div>
     </div>

</div>
