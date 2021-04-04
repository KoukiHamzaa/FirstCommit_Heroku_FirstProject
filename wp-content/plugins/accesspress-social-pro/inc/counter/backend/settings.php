<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$apsc_settings = get_option( 'apsc_settings' );
//echo "<pre>";
//print_r( $apsc_settings );
//echo "</pre>";
?>

<div class="wrap">
     <div class="apsc-add-set-wrapper clearfix">
          <div class="apsc-panel">
               <div class="apsc-settings-header">
                    <div class="apsc-logo">
                         <img src="<?php echo SC_PRO_IMAGE_DIR; ?>/logo.png" alt="<?php esc_attr_e( 'AccessPress Social Counter Pro', 'ap-social-pro' ); ?>" />
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
               <div class="apsc-boards-wrapper">
                    <ul class="apsc-settings-tabs">
                         <li class="social-profile-settings-li"><a href="#social-profile" id="social-profile-settings" class="apsc-tabs-trigger apsc-active-tab"><?php _e( 'Social Profiles', 'ap-social-pro' ) ?></a></li>
                         <li class="display-settings-li"><a href='#display-settings' id="display-settings" class="apsc-tabs-trigger"><?php _e( 'Display Settings', 'ap-social-pro' ); ?></a></li>
                         <li class="float-sidebar-settings-li"><a href="#float-sidebar" id="float-sidebar-settings" class="apsc-tabs-trigger"><?php _e( 'Floating Sidebar Settings', 'ap-social-pro' ); ?></a></li>
                         <li class="cache-settings-li"><a href="#cache-settings" id="cache-settings" class="apsc-tabs-trigger"><?php _e( 'Cache Settings', 'ap-social-pro' ); ?></a></li>
                         <li class="import-export-settings-li"><a href="#import-export" id="import-export-settings" class="apsc-tabs-trigger"><?php _e( 'Import/Export Settings', 'ap-social-pro' ); ?></a></li>
                    </ul>
                    <div class="metabox-holder">
                         <div id="optionsframework" class="postbox" style="float: left;">
                              <form class="apsc-settings-form" method="post" action="<?php echo admin_url() . 'admin-post.php' ?>">
                                   <input type="hidden" name="action" value="apsc_settings_action"/>
                                   <div class="apsc-hashtag-save" id="abc">
                                        <input type="hidden" name="hashtag" value="#social-profile"/>
                                   </div>
                                   <?php
                                   include_once('boards/social-profiles.php');
                                   include_once('boards/display-settings.php');
                                   include_once('boards/floating-sidebar.php');
                                   include_once('boards/cache-settings.php');
                                   include_once('boards/import-export.php');

                                   wp_nonce_field( 'apsc_settings_action', 'apsc_settings_nonce' );
                                   ?>
                                   <div id="optionsframework-submit" class="ap-settings-submit">
                                        <input type="submit" class="button button-primary" value="Save all changes" name="ap_settings_submit"/>
                                        <?php
                                        $nonce = wp_create_nonce( 'apsc-restore-default-nonce' );
                                        $cache_nonce = wp_create_nonce( 'apsc-cache-nonce' );
                                        ?>
                                        <a href="<?php echo admin_url() . 'admin-post.php?action=apsc_restore_default&_wpnonce=' . $nonce; ?>" onclick="return confirm('<?php _e( 'Are you sure you want to restore default settings?', 'ap-social-pro' ); ?>')"><input type="button" value="<?php _e( 'Restore Default Settings', 'ap-social-pro' ); ?>" class="ap-reset-button button button-primary"/></a>
                                        <a href="<?php echo admin_url() . 'admin-post.php?action=apsc_delete_cache&_wpnonce=' . $cache_nonce; ?>" onclick="return confirm('<?php _e( 'Are you sure you want to delete cache?', 'ap-social-pro' ); ?>')"><input type="button" value="<?php _e( 'Delete Cache', 'ap-social-pro' ); ?>" class="ap-reset-button button button-primary"/></a>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>