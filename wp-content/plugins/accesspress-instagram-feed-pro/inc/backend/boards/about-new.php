<?php 
defined('ABSPATH') or die("No script kiddies please!");
$apif_settings = get_option( 'apif_settings' );
//$this->print_array($apsc_settings);
?>

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
                <div class="apif-title"><?php _e('AccessPress Instagram Feed', 'accesspress-instagram-feed-pro'); ?></div>
            </div>

            <?php if(isset($_SESSION['apif_message'])){?><div class="apif-success-message"><p><?php echo $_SESSION['apif_message'];unset($_SESSION['apif_message']);?></p></div><?php }?>

            <div class="apif-boards-wrapper">
                <div class="metabox-holder">
                    <div id="optionsframework" class="postbox" style="float: left;">
                    <div class="apif-header">
                      <h3><?php _e('More WordPress Stuff', 'accesspress-instagram-feed-pro') ?></h3>
                    </div>

                        <div class="apif-boards-tabs" id="apif-board-about-settings">
                            <div class="apif-tab-wrapper">
                                <p><strong>AccessPress Instagram Feed Pro</strong> - is a WordPress Plugin by AccessPress Themes. </p>

                                <p>AccessPress Themes is a venture of Access Keys - who has developed hundreds of Custom WordPress themes and plugins for its clients over the years. </p>

                                <p><strong>AccessPress Instagram Feed Pro</strong> is a <strong> WordPress plugin</strong> to display your instagram feeds in your desired layout.
                                    A perfect plugin to show your instagram feeds and grow your network.

                                    All you have to do is use a shortcode to display your instagram feed right on your website in your chosen location.
                                </p>
                                <div class="halfseperator"></div>
                                 <div class="seperator"></div><div class="dottedline"></div><div class="seperator"></div>
                                <h3>Themes Compatible with the Plugin :</h3>
                                <strong>AccessPress Instagram Feed Pro</strong> works best with every WordPress theme. It's even more remarkable when used with popular themes like VMagazine and AccessPress Parallax.
                                <p><strong>AND IF THIS PLUGIN HAS IMPRESSED YOU, THEN YOU WOULD ENJOY OUR OTHER PROJECTS TOO. DO CHECK THESE OUT :</strong></p>
                                <ul>
                                        <li>
                                        <a href="https://wpall.club/">WPAll Club</a> -  A complete WordPress resources club. WordPress tutorials, blogs, curated free and premium themes and plugins, WordPress deals, offers, hosting info and more.</li>

                                        <li><a href="https://themeforest.net/user/accesskeys/portfolio">Premium WordPress Themes</a> -   6 premium WordPress themes well suited for all sort of websites. Professional, well coded and highly configurable themes for you. </li>

                                        <li><a href="https://codecanyon.net/user/accesskeys/portfolio?Ref=AccessKeys">Premium WordPress Plugins</a> - 45+ premium WordPress plugins of many different types. High user ratings, great quality and best sellers in CodeCanyon marketplace.</li> 

                                        <li><a href="https://accesspressthemes.com/">AccessPress Themes</a> - AccessPress Themes has 50+ beautiful and elegant, fully responsive, multipurpose themes to meet your need for free and commercial basis.</li>

                                        <li><a href="https://8degreethemes.com/">8Degree Themes</a> - 8Degree Themes offers 15+ free WordPress themes and 16+ premium WordPress themes carefully crafted with creativity.</li>
                                </ul>
                                 <div class="seperator"></div><div class="dottedline"></div><div class="seperator"></div>
                                <h3>Other products by AccessPress themes </h3>
                                <div class="product">
                                <div class="logo-product"><img src="<?php echo APIF_IMAGE_DIR;?>/aplite.png" alt="<?php esc_attr_e('AccessPress Social Counter','accesspress-instagram-feed-pro'); ?>" /></div>
                                <div class="productext"><p><strong>AccessPress Lite</strong> - A very popular Free WordPress theme, available in WordPress.org<br />
                                    <a href="http://accesspressthemes.com/wordpress-themes/accesspress-lite/" target="_blank">http://accesspressthemes.com/wordpress-themes/accesspress-lite/</a></p>
                                </div>
                                </div>

                                <div class="product">
                                <div class="logo-product"><img src="<?php echo APIF_IMAGE_DIR;?>/appro.png" alt="<?php esc_attr_e('AccessPress Social Counter','accesspress-instagram-feed-pro'); ?>" /></div>
                                <div class="productext"><p><strong>AccessPress Pro</strong> - Premium version of AccessPress lite<br />
                                    <a href="http://accesspressthemes.com/wordpress-themes/accesspress-lite/" target="_blank">http://accesspressthemes.com/wordpress-themes/accesspress-pro/</a></p>
                                </div>
                                </div>

                                <div class="seperator"></div><div class="dottedline"></div><div class="seperator"></div>

                                <h3>Get in touch</h3>
                                <p>If you’ve any question/feedback, please get in touch: <br />
                                    <strong>General enquiries:</strong> <a href="mailto:info@accesspressthemes.com">info@accesspressthemes.com</a><br />
                                    <strong>Support:</strong> <a href="mailto:support@accesspressthemes.com">support@accesspressthemes.com</a><br />
                                    <strong>Sales:</strong> <a href="mailto:sales@accesspressthemes.com">sales@accesspressthemes.com</a>
                                </p>
                                <div class="seperator"></div>
                                <div class="dottedline"></div><div class="seperator"></div>
                            </div>
                        </div>
                    </div><!--optionsframework-->
                </div>
            </div>
        </div>
    </div>
</div><!--div class wrap-->