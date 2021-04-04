<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>

<div class="apss-wrapper-block">
     <div class="apss-setting-header clearfix">
          <div class="apss-headerlogo">
               <img src="<?php echo APSS_IMAGE_DIR; ?>/logo-old.png" alt="<?php esc_attr_e( 'AccessPress Social Share Pro', APSS_TEXT_DOMAIN ); ?>" />
          </div>
     </div>
     <?php if ( isset( $_GET[ 'message' ] ) && $_GET[ 'message' ] == 1 ) { ?>
          <div class="notice notice-success is-dismissible">
               <p><?php _e( 'Settings saved successfully', APSS_TEXT_DOMAIN ); ?> </p>
          </div>
     <?php } ?>
     <?php if ( isset( $_GET[ 'message' ] ) && $_GET[ 'message' ] == 2 ) { ?>
          <div class="notice notice-success is-dismissible">
               <p><?php _e( 'Settings restored to default', APSS_TEXT_DOMAIN ); ?></p>
          </div>
     <?php }
     ?>
     <?php if ( isset( $_GET[ 'message' ] ) && $_GET[ 'message' ] == 3 ) { ?>
          <div class="notice notice-success is-dismissible">
               <p><?php _e( 'Cache cleared successfully', APSS_TEXT_DOMAIN ); ?></p>
          </div>
     <?php }
     ?>
     <?php if ( isset( $_GET[ 'message' ] ) && $_GET[ 'message' ] == 4 ) { ?>
          <div class="notice notice-success is-dismissible">
               <p><?php _e( 'File Imported Successfully', APSS_TEXT_DOMAIN ); ?></p>
          </div>
     <?php }
     ?>
     <?php
     $options = get_option( APSS_SETTING_NAME );

//     echo "<pre>";
//     print_r( $options );
//     echo "</pre>";
     ?>
     <div class="apps-wrap">
          <div class="apss-setting-outer-wrap">
               <ul class="apss-setting-tabs clearfix">
                    <li class= "apss-social-share-li">
                         <a href="#social_network" data-link="social_share" id="apss-social-networks" class="apss-tabs-trigger apss-active-tab ">
                              <?php _e( 'Social Share', APSS_TEXT_DOMAIN ); ?>
                         </a>
                         <ul class="apss-ss-ul-wrapper">
                              <li class="apss-social-networks-li" >
                                   <a href="#social_network" data-link="share_option" id="apss-social-networks" class="apss-tabs-trigger apss-active-tab ">
                                        <?php _e( 'Social Networks', APSS_TEXT_DOMAIN ); ?>
                                   </a>
                              </li>
                              <li class="apss-share-options-li">
                                   <a href="#share_option" data-link="share_option"  id="apss-share-options" class="apss-tabs-trigger ">
                                        <?php _e( 'Share Options', APSS_TEXT_DOMAIN ) ?>
                                   </a>
                              </li>
                              <li class="apss-display-settings-li">
                                   <a href="#display_settings" data-link="display_settings" id="apss-display-settings" class="apss-tabs-trigger">
                                        <?php _e( 'Display Settings', APSS_TEXT_DOMAIN ); ?>
                                   </a>
                              </li>
                              <li class="apss-sticky-header-share-settings-li">
                                   <a href="#sticky_header_settings" data-link="sticky_header_settings" id="apss-sticky-header-share-settings" class="apss-tabs-trigger">
                                        <?php _e( 'Sticky header share Settings', APSS_TEXT_DOMAIN ); ?>
                                   </a>
                              </li>

                              <li class="apss-miscellaneous-li">
                                   <a href="#miscellaneous" data-link="miscellaneous" id="apss-miscellaneous" class="apss-tabs-trigger">
                                        <?php _e( 'Miscellaneous', APSS_TEXT_DOMAIN ); ?>
                                   </a>
                              </li>
                              <li class="apss-custom-text-li">
                                   <a href="#custom_text" data-link="custom_text" id="apss-custom-text" class="apss-tabs-trigger"><?php _e( 'Custom Text', APSS_TEXT_DOMAIN ); ?>
                                   </a>
                              </li>
                         </ul>
                    </li>
                    <li class="apss-url-shortner-li">
                         <a href="#url_shortner" data-link="url_shortner" id="apss-url-shortner" class="apss-tabs-trigger"><?php _e( 'Url Shortner', APSS_TEXT_DOMAIN ); ?>
                         </a>
                    </li>
                    <li class="apss-share-counter-settings-li">
                         <a href="#share_counter_settings" data-link="share_counter_settings" id="apss-share-counter-settings" class="apss-tabs-trigger">
                              <?php _e( 'Share Counter Settings', APSS_TEXT_DOMAIN ); ?>
                         </a>
                    </li>
                    <li class="apss-email-settings-li">
                         <a  href="#email_settings" data-link="email_settings" id="apss-email-settings" class="apss-tabs-trigger"><?php _e( 'Email Settings', APSS_TEXT_DOMAIN ); ?>
                         </a>
                    </li>
                    <li class="apss-import-export-settings-li">
                         <a  href="#import_export_settings" data-link="import_export_settings" id="apss-import-export-settings" class="apss-tabs-trigger">
                              <?php _e( 'Import/Export Settings', APSS_TEXT_DOMAIN ); ?>
                         </a>
                    </li>
               </ul>
               <form method="post" action="<?php echo admin_url() . 'admin-post.php' ?>">
                    <input type="hidden" name="action" value="apss_save_options" />
                    <div class="apss-hashtag-save" id="abc">
                         <input type="hidden" name="apss_share_settings[hashtag]" value="#social_network"/>
                    </div>
                    <div class="apss-wrapper">
                         <?php
                         include('tabs/apss-social-media.php');
                         include('tabs/apss-share-option.php');
                         include('tabs/apss-display-position.php');
                         include('tabs/apss-sticky-share-header-settings.php');
                         include('tabs/apss-share-counter-settings.php');
                         include('tabs/apss-miscellaneous.php');
                         include('tabs/apss-custom-text.php');
                         include('tabs/apss-url-shortner.php');
                         include('tabs/email-settings.php');
                         include('tabs/import-export-settings.php');
                         ?>
                         <div class="save-seting" id="apss-save-settings">
                              <?php wp_nonce_field( 'apss_nonce_save_settings', 'apss_add_nonce_save_settings' ); ?>
                              <input type="submit" class="submit_settings button primary-button" value="<?php _e( 'Save settings', APSS_TEXT_DOMAIN ); ?>" name="apss_submit_settings" id="apss_submit_settings"/>
                              <?php
                              /**
                               * Nonce field
                               * */
                              wp_nonce_field( 'apss_settings_action', 'apss_settings_action' );
                              ?>
                              <?php $nonce = wp_create_nonce( 'apss-restore-default-settings-nonce' ); ?>
                              <?php $nonce_clear = wp_create_nonce( 'apss-clear-cache-nonce' ); ?>
                              <a href="<?php echo admin_url() . 'admin-post.php?action=apss_restore_default_settings&_wpnonce=' . $nonce; ?>" onclick="return confirm('<?php _e( 'Are you sure you want to restore default settings?', APSS_TEXT_DOMAIN ); ?>')">
                                   <input type="button" value="Restore Default Settings" class="apss-reset-button button primary-button"/></a>
                              <a href="<?php echo admin_url() . 'admin-post.php?action=apss_clear_cache&_wpnonce=' . $nonce_clear; ?>" onclick="return confirm('<?php _e( 'Are you sure you want to clear cache share counter?', APSS_TEXT_DOMAIN ); ?>')">
                                   <input type="button" value="Clear Cache" class="apss-reset-button button primary-button"/></a>
                         </div>
                    </div>
               </form>
          </div>
     </div>
</div>