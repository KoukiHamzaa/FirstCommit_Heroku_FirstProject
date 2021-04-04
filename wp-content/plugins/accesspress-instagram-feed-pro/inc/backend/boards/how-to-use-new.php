<?php defined('ABSPATH') or die("No script kiddies please!");
// $apif_settings = get_option( 'apif_settings' );
 //global $wpdb;
// $arr = array(
//     '0' => array(
//         'feed_id' => '1867610664774097006',
//           'post_id' => 3,
//           'type' => 'instagram',
//           'media_type' => 'image',
//           'nickname' => 'satrbucks2',
//         ),
//      '1' => array(
//         'feed_id' => '1858239343928636347',
//           'post_id' => 3,
//           'type' => 'instagram',
//           'media_type' => 'image',
//           'nickname' => 'satrbucks',
//         ),
//      '2' => array(
//         'feed_id' => '1858239343928636749',
//           'post_id' => 3,
//           'type' => 'instagram',
//           'media_type' => 'image',
//           'nickname' => 'satrbucks22',
//         ),

// );
?>
<!-- https://stackoverflow.com/questions/21903099/php-substr-prevents-link-due-to-html-tag -->
<div class="wrap">
    <div class="apif-add-set-wrapper clearfix">
        <div class="apif-panel">
            <div class="apif-settings-header">

                <div class="apif-logo">
                    <img src="<?php echo APIF_IMAGE_DIR; ?>/instagram-2.png" alt="<?php esc_attr_e('AccessPress Instagram Feed', 'accesspress-instagram-feed-pro'); ?>" />
                </div>

                <div class="apif-socials">
                    <p><?php _e('Follow us for new updates', 'accesspress-instagram-feed-pro') ?></p>
                    <div class="ap-social-bttns">

                        <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FAccessPress-Themes%2F1396595907277967&amp;width&amp;layout=button&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35&amp;appId=1411139805828592" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:20px; width:50px " allowTransparency="true"></iframe>
                        &nbsp;&nbsp;
                        <a href="https://twitter.com/apthemes" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @apthemes</a>
                        <script>!function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)['0'];
                            if (!d.getElementById(id)) {
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//platform.twitter.com/widgets.js";
                                fjs.parentNode.insertBefore(js, fjs);
                            }
                        }(document, "script", "twitter-wjs");</script>
                    </div>
                </div>
                <div class="apif-title"><?php _e('AccessPress Instagram Feed', 'accesspress-instagram-feed-pro'); ?></div>
            </div>

            <?php if(isset($_SESSION['apif_message'])){?><div class="apif-success-message"><p><?php echo $_SESSION['apif_message'];unset($_SESSION['apif_message']);?></p></div><?php }?>

            <div class="apif-boards-wrapper">
               

                <div class="metabox-holder">
                <div id="optionsframework" class="postbox" style="float: left;">
                    <div class="apif-header">
                      <h3><?php _e('How to Use', 'accesspress-instagram-feed-pro') ?></h3>
                    </div>
                    <div class="apif-boards-tabs" id="apif-board-how_to_use-settings">
				    <!-- <div class="apsp-sub-title">How to Use</div> -->
                     <div class="apif-tab-wrapper">
                     <p>To dispaly the instagram feeds in posts or pages is very easy. 

                    First you need to go to "Instagram settings" sub menu and need to configure the instagram credentials.

                    Now for display of instagram feeds you need to add feeds. For adding feeds Please click on "Add new feed" sub menu. A page will appear with the configuration options. The configurations are divided into two settings tab - display settings and layout settings.
                    </p>
                    </div>
                    <div class="apif-tab-wrapper">
                        <div class="apsp-sub-title">Display settings</div>
                        <ul>
                            <li>Feed name - Name of the feed for the refrence so that you can know which feed you are using.</li>
                            <li>Feed type - You can select the feed type here. You can select which feed you want to display - your feeds, recent media and tag only. In latest updates, instagram has depreciated API to get feeds of your likes, popular feeds, any user so we have removed this feature from our plugin.</li>
                            <li>Image size - You can select the option which image size you want to use. Available image sizes - thumbnail, medium and large.</li>
                            <li>Show instagram link - Option to show link to instagram. If the content type is video video icon will appear and if content type is image camera icon will appear.</li>
                            <li>show user image - Option to show the user image.</li>
                            <li>Show image like count - Option to show image like count.</li>
                            <li>Show image comment count - Option to show image comment count.</li>
                            <li>Counter display format - Here you can choose options for display of the counter formats.</li>
                            <li>Lightbox options - Here you can enable/disable the lightbox options. And if lightbox enabled you can select which lightbox you want to display.</li>
                            <li>No of images to display - Here you can chooose the number of images you want to display on page load. Set the number of images according to  the layout.</li>
                            <li>Theme accent color - You can set the hover background color here. You can set the opacity of color as well. If not selected default color will be used.</li>
                            <li>Hover text color - You can set the hover text colors here. If nothing selected default color will be used.</li>
                        </ul>
                        Now when you click on "Add" button a shortcode will be generated with the specific id for that feed 
                    </div>
                    <div class='apif-tab-wrapper'>
                        <div class='apsp-sub-title'>Layout settings</div>
                        <ul>
                            <li>1. Grid layout.</li>
                            <li>2. Masonary layout</li>
                            <li>3. Instagram layout</li>
                            <li>4. Round image layout</li>
                            <li>5. Grid rotator</li>
                            <li>6. Owl slider layout</li>
                            <li>7. Nivo slider</li>
                            <li>8. Jcarousel slider</li>
                            <li>9. Slider pro slider</li>
                            <li>10. Thumbnail scroller slider</li>
                        </ul>
                    </div>
                    <div class="apif-tab-wrapper">       
                        <p>For each layout various dynamic options are available.</p>
                        <p>Use the shortcode <code>['ap_instagram_feed_pro id="specific_id"']</code> to display the instagram feed within your content.</p>
                        <p>Use the function <code><?php echo "&lt;?php do_shortcode('['ap_instagram_feed_pro id='specific_id']'); ?&gt;"; ?></code> to display within template or theme files.</p>        
                        <p>The created feeds will be available in the widets area as well.</p>
                    </div>
				</div>
                    
                   
            </div><!--optionsframework-->
</div>
        </div>
</div>
</div>
</div><!--div class wrap-->