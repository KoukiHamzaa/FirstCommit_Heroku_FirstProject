<?php 
defined('ABSPATH') or die("No script kiddies please!");
$apif_settings = get_option( 'apif_settings' );
//$this->print_array($apif_settings);
?>
<div class="wrap">
<div class="apif-add-set-wrapper clearfix">
<div class="apif-panel">
<div class="apif-settings-header">
    <div class="apif-logo">
        <img src="<?php echo APIF_IMAGE_DIR; ?>/instagram-2.png" alt="<?php esc_attr_e('AccessPress Instagram Feed', 'accesspress-instagram-feed-pro'); ?>" />
    </div>
<!--     <div class="apif-socials">
        <p>< ?php _e('Follow us for new updates', 'accesspress-instagram-feed-pro') ?></p>
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
    </div> -->
    <div class="apif-title">
    <?php _e('Settings', 'accesspress-instagram-feed-pro'); ?></div>
</div>

<?php if(isset($_SESSION['apif_success']) && $_SESSION['apif_success'] == 'true'){ 
        if(isset($_SESSION['apif_message'])){ ?>
        <div class="apif-success-message"><p><?php echo $_SESSION['apif_message']; unset($_SESSION['apif_message']); unset($_SESSION['apif_success']); ?></p></div>
        <?php }
     }else if(isset($_SESSION['apif_success']) && $_SESSION['apif_success'] == 'false'){ ?>
        <div class="apif-fail-message"><p><?php echo $_SESSION['apif_message'];unset($_SESSION['apif_message']); unset($_SESSION['apif_success']); ?></p></div>
<?php
     } 
?>