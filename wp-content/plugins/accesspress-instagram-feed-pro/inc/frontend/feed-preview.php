<html>
    <head>
        <title><?php _e('Instagram Feed Preview', 'accesspress-instagram-feed-pro'); ?></title>
        <?php wp_head(); ?>
        <style>
            body:before{display:none !important;}
            body:after{display:none !important;}
            body{background:#F1F1F1 !important;}
            .ap-preview-subtitle a { color: #116CB9;}.ap-form-preview-wrap {
                width: 86%;
                margin: 0 auto;
                padding: 60px;
                background: #fff;
                box-shadow: 0 0 2px;
                margin-bottom: 20px;
            }
            .ap-preview-title-wrap {
                text-align: center;
                font-size: 20px;
            }
            .ap-preview-note {
                width: 60%;
                margin: 20px auto;
                font-size: 15px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="ap-preview-title-wrap">
            <div class="ap-preview-title"><?php _e('Preview Mode', 'accesspress-instagram-feed-pro'); ?></div>
        </div>
        <div class="ap-preview-note"><?php _e('This is just the basic preview and it may look different when used in frontend as per your theme\'s styles. Lightbox and load more may also not work properly in the preview mode.', 'accesspress-instagram-feed-pro'); ?></div>
        <div class="ap-form-preview-wrap">
            <?php
            echo do_shortcode('[ap_instagram_feed_pro id="' . $insta_id . '"]');
            ?>
        </div>

    </body>
    <?php wp_footer(); ?>
</html>