<?php
if(isset($apif_settings['enable_lightbox'])){ ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        <?php
        switch ( $apif_settings['lightbox_layout']) {
            case 'preety_photo': ?>
                <?php
                if( $layout == 'slider' ){ ?>
                    // for prettyphoto
                $("area[rel^='prettyPhoto']").prettyPhoto({
                      social_tools:false
                });
                $(".apif-overlay-cont-block a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'slow',theme:'light_square',slideshow:10000, autoplay_slideshow: false,  social_tools:false});
                // for prettyphoto ends
                <?php  }else{ ?>
                // for prettyphoto
                $("area[rel^='prettyPhoto']").prettyPhoto({
                      social_tools:false
                });
                $(".ap_commond_div_for_pretty_photo_lightbox:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'slow',theme:'light_square',slideshow:10000, autoplay_slideshow: false, social_tools:false});
                // for prettyphoto ends

                <?php
                    }
            break;

            case 'swipe_box': ?>
                // for swipebox
                $( '.apif-swipebox' ).swipebox({
                    useCSS : true, // false will force the use of jQuery for animations
                    useSVG : true, // false to force the use of png for buttons
                    initialIndexOnArray : 0, // which image index to init when a array is passed
                    hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
                    hideBarsDelay : 3000, // delay before hiding bars on desktop
                    videoMaxWidth : 1140, // videos max width
                    beforeOpen: function() {}, // called before opening
                    afterOpen: null, // called after opening
                    afterClose: function() {}, // called after closing
                    loopAtEnd: false // true will return to the first image after the last image is reached
                });

                <?php
            break;

            case 'litbx_lightbox': ?>
                // for litbx gallery
                $(".litbx").litbx({padding: 10});
                <?php
            break;

            case 'classic':
            break;

            case 'venobox_lightbox': ?>
                /* default settings */
                $('.apif-venobox').venobox({
                    // framewidth: '300px',
                    // frameheight: '250px',
                    border: '6px',
                    bordercolor: '#ba7c36',
                    numeratio: true
                });
                <?php
            break;

            default:
                # code...
            break;
        }
        ?>
    });
    </script>
    <?php
}


