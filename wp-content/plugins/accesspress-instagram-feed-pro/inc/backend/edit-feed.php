<?php defined('ABSPATH') or die("No script kiddies please!");
global $wpdb;
$if_id =  $_GET['if_id'];
$_wpnonce =  $_GET['_wpnonce'];
$table_name = $instagram_feed_tbl = $wpdb->prefix.'instagram_feeds';
$in_feeds = $wpdb->get_results("SELECT * FROM $table_name where id = $if_id");
$apif_settings = unserialize($in_feeds[0]->feed_settings);
// $this->displayArr($apif_settings);
?>
<?php 
if(isset($_GET['message'])){?>
<div class="apif-success-message">
<p><?php 
if($_GET['message'] == 1){
_e('Settings Updated Successfully.','accesspress-instagram-feed-pro');
}else if($_GET['message'] == 2){
 _e('Could not updated the data. Please try again later.','accesspress-instagram-feed-pro');   
}else if($_GET['message'] == 3){
 _e('Feed Copied Successfully.','accesspress-instagram-feed-pro');   
}
?></p>
</div>
<?php }?>
<div class="apif-boards-wrapper">
<div class="metabox-holder">
 <div id="optionsframework" class="postbox" style="float: left;">
    <div class="apif-header">
       <h3><?php echo _e('Edit Instagram Feed Settings', 'accesspress-instagram-feed-pro'); ?></h3>
        <!-- settings tabs selector -->
        <div class='apif-settings-tab-selector'>
            <a href='javascript: void(0);' class='apif-settings-tab apif-active-tab' id='apif-general-settings'>General Settings</a>
            <a href='javascript: void(0);' class='apif-settings-tab' id='apif-display-settings'>Display Settings</a>
            <a href='javascript: void(0);' class='apif-settings-tab' id='apif-layout-settings'>Template Settings</a>
            <a href='javascript: void(0);' class='apif-settings-tab' id='apif-extra-settings'>Advanced Settings</a>
        </div>
    </div>

    <form class="apif-settings-form" id="apif-settings-form" method="post" action="<?php echo admin_url() . 'admin-post.php' ?>">
        <input type="hidden" name="action" value="apif_edit_feed"/>
        <input type="hidden" name="action" value="apif_edit_feed"/>
        <input type="hidden" class="form-control" name = 'if_id' value='<?php echo $if_id; ?>' />
        <input type="hidden" class="form-control" name = 'nonce' value='<?php echo $_wpnonce; ?>' />
        
        <!-- settings tabs -->
        <div class="apif-settings-tabs">

            <!-- tabs wrapper  -->
            <div class="apif-tab-wrapper">
                <!-- General settings Start -->
                <div class='apif-layout-settings apif-tabs' id='apif-tab-apif-general-settings'>
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
        * */
        wp_nonce_field('apif_edit_feed_action', 'apif_edit_feed_nonce');
        ?>
      <!--   <div id="optionsframework-submit" class="apif-settings-submit">
        <input type="submit" class="button button-primary" value="Update" name="ap_edit_feed_settings_submit"/>
        </div> -->
         <div id="optionsframework-submit" class="apif-settings-submit apif-update-feeds">
              <a type="submit" id="apif-save-updatedata" class="apif-form-actions"><i class="fa fa-floppy-o" aria-hidden="true"></i><span><?php _e( 'Update', 'accesspress-instagram-feed-pro' ); ?></span></a>
              <a href="<?php echo site_url() . '?apif_insta_preview=true&insta_id=' .$if_id; ?>" id="apif-preview" class="apif-form-actions" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i><span><?php _e( 'Preview', 'accesspress-instagram-feed-pro' ); ?></span></a>
                <a href="<?php echo admin_url( 'admin.php?page=ap-instagram-feed-pro' ); ?>" id="apif-cancel" class="apif-form-actions"><i class="fa fa-times" aria-hidden="true"></i><span><?php _e( 'Cancel', 'accesspress-instagram-feed-pro' ); ?></span></a>
        </div>
   </form>
  </div><!--optionsframework-->
 </div>
</div>