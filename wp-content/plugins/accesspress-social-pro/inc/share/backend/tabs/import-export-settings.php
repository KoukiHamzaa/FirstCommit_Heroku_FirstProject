<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="apss-tab-contents apss-import-export-settings" id="tab-apss-import-export-settings" style='display:none'>
     <div class="apss-subhead">
          <h2><?php _e( 'Import/Export Settings', APSS_TEXT_DOMAIN ) ?></h2>
     </div>
     <div class="apss-row-odd">
          <?php /* ?>
            <div class="apss-general-div">
            <div class="apss-title-div">
            <label>
            <h3> <?php _e( 'Export Settings', APSS_TEXT_DOMAIN ); ?> </h3>
            </label>
            </div>
            <div class="apss-option-value">
            <label>
            <?php
            $goback = esc_url_raw( 'admin.php?page=apss-share-pro' );
            $backup_string = json_encode( $options );
            ?>
            <textarea name='apss_share_settings[export_settings]' rows="15" cols="100"><?php echo $backup_string ?></textarea>
            <a href="<?php echo $goback ?>" class = "apss-export-file-button">Export File</a>
            </label>
            <p class="description"><?php _e( '', APSS_TEXT_DOMAIN ); ?></p>
            </div>
            </div>
            <?php
           */ ?>
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3> <?php _e( 'Export File', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <?php
                    $goback = esc_url_raw( 'admin.php?action=apss_save_options' );
                    ?>
                    <label>
                         <a class="apss-export-file-download-button" href="<?php echo admin_url( 'admin-post.php?action=apss_plugin_settings_download&_wpnonce=' . wp_create_nonce( 'apss_plugin_settings_download_nonce' ) ) ?>"><?php _e( 'Download Export File', APSS_TEXT_DOMAIN ); ?></a>
                    </label>
                    <p class="description"><?php _e( 'Please download the social share\'s settings from the button above', APSS_TEXT_DOMAIN ); ?></p>
               </div>
          </div>
     </div>
     <div class="apss-row-even">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3> <?php _e( 'Import File', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="apss-import-file-wrap">
                         <input type="text" name="apss_share_settings[import_filename]" value=""/>
                         <input type="button" class="button-primary apss-media-uploader" value="<?php _e( 'Upload Import File', APSS_TEXT_DOMAIN ); ?>"/>
                    </label>
                    <p class="description"><?php _e( 'Please upload the social share\'s setting from the button above', APSS_TEXT_DOMAIN ); ?></p>
               </div>
          </div>
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3> <?php _e( 'Import Settings', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label>
                         <textarea id="apss-imported-file-content" name='apss_share_settings[import_settings]' rows="15" cols="100"></textarea>
                         <a href="#" class="apss-import-file-button" id="apss-import-file-button">Import File</a>
                    </label>
                    <p class="description"><?php _e( 'Please import the social share\'s setting from the button above', APSS_TEXT_DOMAIN ); ?></p>
               </div>
          </div>

     </div>
</div>