<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$apif_settings = get_option( 'apif_settings' );
//$this->print_array($apif_settings);
?>
<div class="wrap">
<div class="apif-add-set-wrapper clearfix">
    <div class="apif-panel">
        <div class="apif-settings-header">
            <div class="apif-logo">
                <img src="<?php echo APIF_IMAGE_DIR; ?>/instagram-2.png" alt="<?php esc_attr_e( 'AccessPress Instagram Feed', 'accesspress-instagram-feed-pro' ); ?>" />
            </div>
            <div class="apif-socials">
                <p><?php _e( 'Follow us for new updates', 'accesspress-instagram-feed-pro' ); ?></p>
                <div class="ap-social-bttns">
                    <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FAccessPress-Themes%2F1396595907277967&amp;width&amp;layout=button&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35&amp;appId=1411139805828592" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:20px; width:50px " allowTransparency="true"></iframe>
                    &nbsp;&nbsp;
                    <a href="https://twitter.com/apthemes" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @apthemes</a>
                    <script>!function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//platform.twitter.com/widgets.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, "script", "twitter-wjs");</script>
                </div>
            </div>
            <div class="apif-title"><?php _e( 'AccessPress Instagram Feed', 'accesspress-instagram-feed-pro' ); ?></div>
        </div>
        <?php if( isset( $_SESSION['apif_message'] ) ) { ?><div class="apif-success-message"><p><?php echo $_SESSION['apif_message'];
        unset( $_SESSION['apif_message'] ); ?></p></div><?php
    } ?>
    <div class="apif-boards-wrapper">
        <div class="metabox-holder">
            <div id="optionsframework" class="postbox" style="float: left;">
             <div class="apif-header">
               <h3><?php echo _e('Add New Instagram Feeds', 'accesspress-instagram-feed-pro'); ?></h3>
                <!-- settings tabs selector -->
                <div class='apif-settings-tab-selector'>
                    <a href='javascript: void(0);' class='apif-settings-tab apif-active-tab' id='apif-general-settings'>General Settings</a>
                    <a href='javascript: void(0);' class='apif-settings-tab' id='apif-display-settings'>Display Settings</a>
                    <a href='javascript: void(0);' class='apif-settings-tab' id='apif-layout-settings'>Template Settings</a>
                    <a href='javascript: void(0);' class='apif-settings-tab' id='apif-extra-settings'>Advanced Settings</a>
                </div>
            </div>
            <form class="apif-settings-form" id="apif-settings-add-form" method="post" action="<?php echo admin_url() . 'admin-post.php' ?>">
                    <input type="hidden" name="action" value="apif_new_feed"/>
                    <!-- settings tabs -->
                    <div class="apif-settings-tabs">
                        <!-- tabs wrapper  -->
                        <div class="apif-tab-wrapper">
                            <!-- General settings Start -->
                            <div class='apif-general-settings apif-tabs' id='apif-tab-apif-general-settings'>
                                <?php
                                  include(APIF_INST_INCLUDES_BACKEND_PATH. 'tabs/general-settings.php' );
                                 ?>  
                             </div>  
                          <!-- General settings End -->   
                          <!-- Display settings Start -->
                          <div class='apif-layout-settings apif-tabs' id='apif-tab-apif-display-settings' style='display:none'>
                               <?php
                                  include(APIF_INST_INCLUDES_BACKEND_PATH. 'tabs/display-settings.php' );
                                 ?> 
                          </div>
                          <!-- Display settings End -->
                          <!-- Template settings Start -->
                          <div class='apif-layout-settings apif-tabs' id='apif-tab-apif-layout-settings' style='display:none'>
                               <?php
                                  include(APIF_INST_INCLUDES_BACKEND_PATH. 'tabs/template-settings.php' );
                                 ?> 
                          </div>
                          <!-- Template settings End -->
                          <!-- Extra settings Start -->
                          <div class='apif-layout-settings apif-tabs' id='apif-tab-apif-extra-settings' style='display:none'>
                               <?php
                                  include(APIF_INST_INCLUDES_BACKEND_PATH. 'tabs/extra-settings.php' );
                                 ?> 
                          </div>
                          <!-- Extra settings End -->
                     </div>
                    </div>
                    <?php
                    /**
                    * Nonce field
                    *
                    */
                    wp_nonce_field( 'apif_add_feed_action', 'apif_add_feed_nonce' );
                    ?>
                   <!--  <div id="optionsframework-submit" class="apif-feed-settings-submit">
                        <input type="submit" class="button button-primary apif_form_submit_button" value="Add" name="apif_form_submit_button ap_new_feed_settings_submit"/>
                    </div> -->
                      <div id="optionsframework-submit" class="apif-settings-submit apif-add-feeds">
                        <a type="submit" id="apif-save-data" class="apif-form-actions"><i class="fa fa-floppy-o" aria-hidden="true"></i><span><?php _e( 'Save', 'accesspress-instagram-feed-pro' ); ?></span></a>
                        <a href="<?php echo admin_url( 'admin.php?page=ap-instagram-feed-pro' ); ?>" id="apif-cancel" class="apif-form-actions"><i class="fa fa-times" aria-hidden="true"></i><span><?php _e( 'Cancel', 'accesspress-instagram-feed-pro' ); ?></span></a>
                  </div>
             </form>
         </div><!--optionsframework-->
      </div>
   </div>
  </div>
 </div>
</div><!--div class wrap-->