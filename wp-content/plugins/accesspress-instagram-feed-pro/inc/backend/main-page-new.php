<?php defined('ABSPATH') or die("No script kiddies please!");
include('boards/header.php');
global $wpdb;
$instagram_feed_tbl = $wpdb->prefix.'instagram_feeds';
$ins_feeds = $wpdb->get_results("SELECT * FROM $instagram_feed_tbl ORDER BY id DESC");
if (isset($_GET['action'], $_GET['_wpnonce'], $_GET['if_id']) && wp_verify_nonce($_GET['_wpnonce'], 'apif-edit-nonce')) {
include('edit-feed.php');
} else {?>
<div class="apsc-boards-wrapper">
<div class="apifeeds-cache-build-message updated notice notice-success is-dismissible" style="display: none;"><p></p></div>
<?php 
if(isset($_GET['message'])){?>
<div class="apif-success-message">
<p><?php 
if($_GET['message'] == 1){
_e('Settings Saved Successfully.','accesspress-instagram-feed-pro');
}else if($_GET['message'] == 2){
 _e('Cache Cleared Successfully.','accesspress-instagram-feed-pro');   
}else if($_GET['message'] == 3){
 _e('Feed Copied Successfully.','accesspress-instagram-feed-pro');   
}else if($_GET['message'] == 4){
 _e('Could not copy and add new data. Please try again later.','accesspress-instagram-feed-pro');   
}else if($_GET['message'] == 5){
 _e('Settings Saved Successfully.','accesspress-instagram-feed-pro');   
}else if($_GET['message'] == 6){
 _e('Something went wrong.Please try again later.','accesspress-instagram-feed-pro');   
}else if($_GET['message'] == 7){
 _e('Feed has been removed successfully.','accesspress-instagram-feed-pro');   
}else if($_GET['message'] == 8){
 _e('Something went wrong.Please try again later.','accesspress-instagram-feed-pro');   
}else if($_GET['message'] == 9){
 _e('Error: Please fill access token first from Instagram Settings Page.','accesspress-instagram-feed-pro');   
}

?></p>
</div>
<?php }?>
<div class="apmm_button_section">
<a href="<?php echo admin_url() . 'admin.php?page=apif-add-feed' ?>" class="button-primary"><?php _e('ADD NEW','accesspress-instagram-feed-pro');?></a>
</div>
<div class="metabox-holder">
<div id="optionsframework" class="postbox" style="float: left;">
<form class="apsc-settings-form" method="post" action="<?php echo admin_url() . 'admin-post.php' ?>">
    <input type="hidden" name="action" value="apif_settings_action"/>
    <table class="wp-list-table widefat fixed posts">
        <thead>
            <tr>
                <th scope="col" id="title" class="manage-column column-title sortable asc" style="">
                    <a href="javascript:void(0)"> <span><?php _e('Title', 'accesspress-instagram-feed-pro'); ?></span> </a>
                </th>
                <th scope="col" id="shortcode" class="manage-column column-shortcode" style="">
                    <?php _e('Shortcode', 'accesspress-instagram-feed-pro'); ?>
                </th>
                <th scope="col" id="template-shortcode" class="manage-column column-shortcode" style="">
                    <?php _e('Template Shortcode', 'accesspress-instagram-feed-pro'); ?>
                </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th scope="col" class="manage-column column-title sortable asc" style=""><a href="javascript:void(0)"><span><?php _e('Title', 'accesspress-instagram-feed-pro'); ?></span></a></th>
                <th scope="col" class="manage-column column-shortcode" style=""><?php _e('Shortcode', 'accesspress-instagram-feed-pro'); ?></th>
                <th scope="col" id="template-shortcode" class="manage-column column-shortcode" style="">
                    <?php _e('Template Shortcode', 'accesspress-instagram-feed-pro'); ?>
                </th>
            </tr>
        </tfoot>	
		<tbody id="the-list" data-wp-lists="list:post">
            <?php
            if (count($ins_feeds) > 0) {
                $icon_set_counter = 1;
                foreach ($ins_feeds as $ins_feed) {
                	$feed_settings = unserialize($ins_feed->feed_settings);
               // $this->displayArr($feed_settings);
                    $feed_type = (isset($feed_settings['feed_type']) && $feed_settings['feed_type'] != '')?esc_attr($feed_settings['feed_type']):'';
                    if($feed_type == "any_user_timeline"){
                         $any_user_username = (isset($feed_settings['any_user_username']) && $feed_settings['any_user_username'] != '')?esc_attr($feed_settings['any_user_username']):'';
                    }else if($feed_type == "hashtag"){
                         $hashtag_name = (isset($feed_settings['hashtag_name']) && $feed_settings['hashtag_name'] != '')?$feed_settings['hashtag_name']:'';
                         $any_user_username = $hashtag_name;
                    }

                    $edit_nonce = wp_create_nonce('apif-edit-nonce');
                    $delete_nonce = wp_create_nonce('apif-delete-nonce');
                    $copy_nonce = wp_create_nonce('apif-copy-nonce');
                    ?>
                    <tr <?php if ($icon_set_counter % 2 != 0) { ?>class="alternate"<?php } ?>>
                        <td class="title column-title">
                            <strong>
                                <a class="row-title" href="<?php echo admin_url() .  'admin.php?page=ap-instagram-feed-pro&action=edit_if&if_id=' . $ins_feed->id . '&_wpnonce=' . $edit_nonce; ?>" title="Edit">
                                    <?php echo esc_attr($feed_settings['feed_name']); ?>
                                </a>
                            </strong>
                            <div class="row-actions">
                            <span class="rebuild_cache"><a href="javascript:void(0);" data-id="<?php echo $ins_feed->id;?>" class="apif-rebuild-each-cache" data-type="rebuild_cache" data-feedtype="<?php echo $feed_type;?>" data-username="<?php echo $any_user_username;?>"><?php _e( 'Rebuild Cache', 'accesspress-instagram-feed-pro' ); ?></a> | </span>
                                <span class="edit"><a href="<?php echo admin_url() . 'admin.php?page=ap-instagram-feed-pro&action=edit_if&if_id=' . $ins_feed->id . '&_wpnonce=' . $edit_nonce; ?>"><?php _e( 'Edit', 'accesspress-instagram-feed-pro' ); ?></a> | </span>
                                <span class="copy"><a href="<?php echo admin_url() . 'admin-post.php?action=apif_copy_action&if_id=' . $ins_feed->id . '&_wpnonce=' . $copy_nonce; ?>" onclick="return confirm('<?php _e('Are you sure you want to copy this Feed ?', 'accesspress-instagram-feed-pro'); ?>')"><?php _e( 'Copy', 'accesspress-instagram-feed-pro' ); ?></a> | </span>
                                <span class="delete"><a href="<?php echo admin_url() . 'admin-post.php?action=apif_delete_action&if_id=' . $ins_feed->id . '&_wpnonce=' . $delete_nonce; ?>" onclick="return confirm('<?php _e('Are you sure you want to delete this Feed?', 'accesspress-instagram-feed-pro'); ?>')"><?php _e( 'Delete', 'accesspress-instagram-feed-pro' ); ?></a> | </span>
                                 <span class="apif-preview"><a target="_blank" href="<?php echo site_url() . '?apif_insta_preview=true&insta_id=' .$ins_feed->id; ?>"><?php _e( 'Preview', 'accesspress-instagram-feed-pro' ); ?></a></span>
                            </div>
                        </td>
                        <td class="shortcode column-shortcode"><input type="text" onFocus="this.select();" readonly="readonly" value="[ap_instagram_feed_pro id=&quot;<?php echo $ins_feed->id; ?>&quot;]" class="shortcode-in-list-table wp-ui-text-highlight code" style="width: 262px;"></td>
                        <td class="shortcode column-shortcode"><input type="text" onFocus="this.select();" readonly="readonly" value="&lt;?php echo do_shortcode('[ap_instagram_feed_pro id=&quot;<?php echo $ins_feed->id; ?>&quot;]')?&gt;" class="shortcode-in-list-table wp-ui-text-highlight code" style="width: 262px;"></td>
                    </tr>
                    <?php
                    $icon_set_counter++;
                }
            } else {
                ?>
                <tr><td colspan="2"><div class="aps-noresult"><?php _e('No Feeds available yet', 'accesspress-instagram-feed-pro'); ?></div></td></tr>
                <?php
            }
            ?>
        </tbody>
    </table>
        <?php
        /**
         * Nonce field
         * */
        wp_nonce_field('apif_feed_settings_edit_action', 'apif_feed_settings_edit_nonce');
        ?>
</form>   
</div><!--optionsframework-->
</div>
</div>
<?php } ?>
</div>
</div>
</div><!--div class wrap-->
<div class="apif-popup-wrapper" style="display: none;">
<div class="apif-overalywrapper"></div>
<div class="apif-image-loader-wrapper">
<span>Rebuiding Cache. Please Wait...</span>
<img src="<?php echo APIF_IMAGE_DIR."/loading.gif"; ?>"/>
</div>
</div>