//All the backend js for the plugin 
(function($) {
    $(function() {

        if($('#accesstoken').val() !== ''){
            var access = window.location.hash.substring(14);
            var url = window.location.href;
            var arr = url.split('&');
            arr.pop();
            //console.log(arr[0]);
            window.history.replaceState(null, null, arr[0]);
        }

        /**
         * Hover Animation Select
         *
         * @since 1.0.0
         */
        $('.apif-hover-layouts input[type="checkbox"]').change(function () {
            $('.apif-hover-layouts input[type="checkbox"]').attr('checked', false);
            $(this).attr('checked', true);
        });

        //$('.apif-theme-accent-color').alphaColorPicker();
        $('.apif-masonary-layout-settings-load-more-button-text-color').wpColorPicker();
        $('.apif-masonary-layout-settings-load-more-button-background-color').wpColorPicker();
        $('.apif-masonary-layout-settings-load-more-button-border-color').wpColorPicker();
        $('.apif-masonary-layout-settings-load-more-button-hover-text-color').wpColorPicker();
        $('.apif-masonary-layout-settings-load-more-button-hover-background-color').wpColorPicker();
        $('.apif-masonary-layout-settings-load-more-button-hover-border-color').wpColorPicker();
        $('.apif-slider-layout-4-navigation-color').wpColorPicker();
        $('.apif-colorpicker-option').wpColorPicker();
        $('.apif-round-image-layout-hover-border-color').wpColorPicker();
        $('.apif-masonary-layout-settings-background-color').wpColorPicker();
        $('.apif-masonary-layout-settings-border-color').wpColorPicker();
        $('.apif-slider-1-layout-settings-image-caption-background-color').wpColorPicker();
        $('.apif-slider-1-layout-settings-next-previous-color').wpColorPicker();
        $('.apif-slider-3-layout-settings-next-previous-color').wpColorPicker();
        $('.apif-colorpicker').wpColorPicker();
        $('.apif-slider-layout-settings-next-previous-color').wpColorPicker();

        $('#apif-save-updatedata').click(function(e){
            e.preventdefault;
            $("#apif-settings-form").submit(); //Trigger the Submit Here

        });

         $('#apif-save-data').click(function(e){
            e.preventdefault;
            $("#apif-settings-add-form").submit(); //Trigger the Submit Here

        });
        
        /*
        Settings Tabs Switching 
        */
        $('.apif-settings-tab').click(function() {
            // alert('helo');
            $('.apif-settings-tab').removeClass('apif-active-tab');
            $(this).addClass('apif-active-tab');
            var tab_id = 'apif-tab-' + $(this).attr('id');
            $('.apif-tabs').hide();
            $('#' + tab_id).show();
        });
         
         /*
         * Social Share if enabled
         */
         $(".apif-social-share-trigger").click(function() {
            if ($(this).is(':checked')) {
                $('.apif-more-social-share-icon-lists').show();
            } else {
                $('.apif-more-social-share-icon-lists').hide();
            }
        });

         $('.apif-lightbox_layout').change(function(){
             if ($(this).val() == 'apif_own_lightbox') {
               $('.apif-comments-option-wrapper').show();
             }else{
               $('.apif-comments-option-wrapper').hide();
             }
         });
        

        $('.apif-feed-type').change(function() {
            // $(this).val() will work here
            if ($(this).val() == 'any_user' || $(this).val() == 'any_user_timeline') {
                $('.apif-any-user-username-settings').show();
                $('.apif-tag-settings').hide();
                $('.apif-user-like-settings').hide();
                $('.apif-recent-media-settings').hide();
                $('.apif-hashtag-settings').hide();
                $('.apif-personal-hashtag-settings').hide();
                $('.apif-imgcustomsize option[value="thumbnail-240"]').removeAttr('disabled');
                $('.apif-imgcustomsize option[value="thumbnail-240"]').text('Thumbnail 240');
                $('.apif-imgcustomsize option[value="thumbnail-320"]').removeAttr('disabled');
                $('.apif-imgcustomsize option[value="thumbnail-320"]').text('Thumbnail 320');
            }else if ($(this).val() == 'tag') {
                $('.apif-tag-settings').show();
                $('.apif-any-user-username-settings').hide();
                $('.apif-user-like-settings').hide();
                $('.apif-recent-media-settings').hide();
                $('.apif-hashtag-settings').hide();
                $('.apif-chashtag-settings').show();
                $('.apif-personal-hashtag-settings').hide();
               /* $('.apif-imgcustomsize option[value="thumbnail"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail"]').text('Thumbnail(Deprecated)');*/
                $('.apif-imgcustomsize option[value="thumbnail-240"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail-240"]').text('Thumbnail 240(Deprecated)');
                $('.apif-imgcustomsize option[value="thumbnail-320"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail-320"]').text('Thumbnail 320(Deprecated)');
            }else if ($(this).val() == 'hashtag') {
                $('.apif-tag-settings').hide();
                $('.apif-hashtag-settings').show();
                $('.apif-chashtag-settings').show();
                $('.apif-any-user-username-settings').hide();
                $('.apif-user-like-settings').hide();
                $('.apif-recent-media-settings').hide();
                $('.apif-personal-hashtag-settings').hide();
               /* $('.apif-imgcustomsize option[value="thumbnail"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail"]').text('Thumbnail(Deprecated)');*/
                $('.apif-imgcustomsize option[value="thumbnail-240"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail-240"]').text('Thumbnail 240(Deprecated)');
                $('.apif-imgcustomsize option[value="thumbnail-320"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail-320"]').text('Thumbnail 320(Deprecated)');
            }else if ($(this).val() == 'personal_hashtag') {
                $('.apif-tag-settings').hide();
                $('.apif-personal-hashtag-settings').show();
                $('.apif-hashtag-settings').hide();
                $('.apif-chashtag-settings').show();
                $('.apif-any-user-username-settings').hide();
                $('.apif-user-like-settings').hide();
                $('.apif-recent-media-settings').hide();
                $('.apif-imgcustomsize option[value="thumbnail-240"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail-240"]').text('Thumbnail 240(Deprecated)');
                $('.apif-imgcustomsize option[value="thumbnail-320"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail-320"]').text('Thumbnail 320(Deprecated)');
            }else if($(this).val() =='likes'){
                $('.apif-tag-settings').hide();
                $('.apif-hashtag-settings').hide();
                $('.apif-user-like-settings').show();
                $('.apif-any-user-username-settings').hide();
                $('.apif-recent-media-settings').hide();
                $('.apif-personal-hashtag-settings').hide();
               /* $('.apif-imgcustomsize option[value="thumbnail"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail"]').text('Thumbnail(Deprecated)');*/
               $('.apif-imgcustomsize option[value="thumbnail-240"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail-240"]').text('Thumbnail 240(Deprecated)');
                $('.apif-imgcustomsize option[value="thumbnail-320"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail-320"]').text('Thumbnail 320(Deprecated)');
            }else if($(this).val() =='recent_media'){
                $('.apif-tag-settings').hide();
                $('.apif-user-like-settings').hide();
                $('.apif-hashtag-settings').hide();
                $('.apif-any-user-username-settings').hide();
                $('.apif-recent-media-settings').show();
                $('.apif-personal-hashtag-settings').hide();
               /* $('.apif-imgcustomsize option[value="thumbnail"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail"]').text('Thumbnail(Deprecated)');*/
               $('.apif-imgcustomsize option[value="thumbnail-240"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail-240"]').text('Thumbnail 240(Deprecated)');
                $('.apif-imgcustomsize option[value="thumbnail-320"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail-320"]').text('Thumbnail 320(Deprecated)');
            }else {
                $('.apif-user-like-settings').hide();
                $('.apif-any-user-username-settings').hide();
                $('.apif-tag-settings').hide();
                $('.apif-hashtag-settings').hide();
                $('.apif-recent-media-settings').hide();
                $('.apif-personal-hashtag-settings').hide();
               /* $('.apif-imgcustomsize option[value="thumbnail"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail"]').text('Thumbnail(Deprecated)');*/
               $('.apif-imgcustomsize option[value="thumbnail-240"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail-240"]').text('Thumbnail 240(Deprecated)');
                $('.apif-imgcustomsize option[value="thumbnail-320"]').prop('disabled',true);
                $('.apif-imgcustomsize option[value="thumbnail-320"]').text('Thumbnail 320(Deprecated)');
            }
        });
        
        // check if lightbox is enabled
        if ($('.apif-lightbox-activation-trigger').is(':checked')) {
            $('.apif-lightbox-layouts').show();
        }
        
        // toggle lightbox options on the basis of lightbox enabled or not
        $(".apif-lightbox-activation-trigger").click(function() {
            if ($(this).is(':checked')) {
                $('.apif-lightbox-layouts').show();
            } else {
                $('.apif-lightbox-layouts').hide();
            }
        });
        
        // toggle lightbox options on the basis of lightbox enabled or not
        $(".apif-counter-activation-trigger").click(function() {
            if ($(this).is(':checked')) {
                $('.apif-load-more-button-options').show();
            } else {
                $('.apif-load-more-button-options').hide();
            }
        });

        $('.apif-instagram-layout-show-comments').click(function(){
            if ($(this).is(':checked')) {
                $('.apif-instagram-layout-show-comments-count').show();
            } else {
                $('.apif-instagram-layout-show-comments-count').hide();
            }
        });


        // $('input[type="radio"],.instagram_mosaic').click(function() {
        $('.instagram_mosaic').change(function() {
             if ($(this).attr("value") == "mosaic" || $(this).attr("value") === 'grid_rotator'){
                $('.apif-social-share-wrapper').hide();
            }else{
                $('.apif-social-share-wrapper').show();
            }
            if ($(this).attr("value") == "mosaic") {
                $(".apif-layout-setting").not(".mosaic-layout").fadeOut();
                $(".mosaic-layout").fadeIn();
             
            }
            if ($(this).attr("value") == "masonry_layout") {
                $(".apif-layout-setting").not(".masonary").fadeOut();
                $(".masonary").fadeIn();
            }
            if ($(this).attr("value") == "masonry_layout1") {
                $(".apif-layout-setting").not(".masonary1").fadeOut();
                $(".masonary1").fadeIn();
            }
            if ($(this).attr("value") == "masonry_layout2") {
                $(".apif-layout-setting").not(".masonary2").fadeOut();
                $(".masonary2").fadeIn();
            }
            if ($(this).attr("value") == "masonry_layout3") {
                $(".apif-layout-setting").not(".masonary3").fadeOut();
                $(".masonary3").fadeIn();
            }
            if ($(this).attr("value") == "masonry_layout4") {
                $(".apif-layout-setting").not(".masonary4").fadeOut();
                $(".masonary4").fadeIn();
            }

            if ($(this).attr("value") == "masonry_layout5") {
                $(".apif-layout-setting").not(".masonary5").fadeOut();
                $(".masonary5").fadeIn();
            }

            if ($(this).attr("value") == "round_image") {
                $(".apif-layout-setting").not(".round-image").fadeOut();
                $(".round-image").fadeIn();
            }
            if ($(this).attr("value") == "grid_layout") {
                $(".apif-layout-setting").not(".grid_layout").fadeOut();
                $(".grid_layout").fadeIn();
            }
             if ($(this).attr("value") == "grid_layout1") {
                $(".apif-layout-setting").not(".grid_layout1").fadeOut();
                $(".grid_layout1").fadeIn();
            }
             if ($(this).attr("value") == "grid_layout2") {
                $(".apif-layout-setting").not(".grid_layout2").fadeOut();
                $(".grid_layout2").fadeIn();
            }
            if ($(this).attr("value") == "grid_rotator") {
                $(".apif-layout-setting").not(".grid-rotator").fadeOut();
                $(".grid-rotator").fadeIn();
            }
            if ($(this).attr("value") == 'instagram_layout') {
                $(".apif-layout-setting").not(".instagram-layout").fadeOut();
                $(".instagram-layout").fadeIn();
            }
            if ($(this).attr("value") == 'slider') {
                $(".apif-layout-setting").not(".slider-layout").fadeOut();
                $(".slider-layout").fadeIn();
            }
            if ($(this).attr("value") == 'slider_1_layout') {
                $(".apif-layout-setting").not(".slider-1-layout").fadeOut();
                $(".slider-1-layout").fadeIn();
            }
            if ($(this).attr("value") == 'slider_2_layout') {
                $(".apif-layout-setting").not(".slider-2-layout").fadeOut();
                $(".slider-2-layout").fadeIn();
            }
            if ($(this).attr("value") == 'slider_3_layout') {
                $(".apif-layout-setting").not(".slider-3-layout").fadeOut();
                $(".slider-3-layout").fadeIn();
            }
            if ($(this).attr("value") == 'slider_4_layout') {
                $(".apif-layout-setting").not(".slider-4-layout").fadeOut();
                $(".slider-4-layout").fadeIn();
            }
            if ($(this).attr("value") == 'slider_5_layout') {
                $(".apif-layout-setting").not(".slider-5-layout").fadeOut();
                $(".slider-5-layout").fadeIn();
            }
             if ($(this).attr("value") == 'slider_6_layout') {
                $(".apif-layout-setting").not(".slider-6-layout").fadeOut();
                $(".slider-6-layout").fadeIn();
            }
            if ($(this).attr("value") == 'slider_7_layout') {
                $(".apif-layout-setting").not(".slider-7-layout").fadeOut();
                $(".slider-7-layout").fadeIn();
            }
             if ($(this).attr("value") == 'filter_template1' || $(this).attr("value") == 'filter_template2'
                 || $(this).attr("value") == 'filter_template3' || $(this).attr("value") == 'filter_template4' || $(this).attr("value") == 'filter_template5') {
                $(".apif-layout-setting").not(".filter_template").fadeOut();
                $(".filter_template").fadeIn();
                if ($(this).attr("value") == 'filter_template1'){
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template1').show();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template2').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template3').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template4').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template5').hide();
                    $('.apif-filter-layout2').hide();
                    $('.apif-filter-layout3').hide();
                    $('.apif-animationselection-wrap').show();
                }else if($(this).attr("value") == 'filter_template2'){
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template1').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template2').show();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template3').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template4').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template5').hide();
                    $('.apif-filter-layout2').show();
                    $('.apif-filter-layout3').show();
                    $('.apif-animationselection-wrap').hide();
                }else if($(this).attr("value") == 'filter_template3'){
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template1').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template2').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template3').show();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template4').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template5').hide();
                    $('.apif-filter-layout2').hide();
                    $('.apif-filter-layout3').show();
                    $('.apif-animationselection-wrap').hide();
                }else if($(this).attr("value") == 'filter_template4'){
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template1').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template2').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template3').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template5').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template4').show();
                    $('.apif-filter-layout2').hide();
                    $('.apif-filter-layout3').hide();
                    $('.apif-animationselection-wrap').show();
                }else if($(this).attr("value") == 'filter_template5'){
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template1').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template2').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template3').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template4').hide();
                    $(".apif-layout-setting.filter_template").find('.apif-filter-template5').show();
                    $('.apif-filter-layout2').hide();
                    $('.apif-filter-layout3').hide();
                    $('.apif-animationselection-wrap').show();
                }
            }
        });

          var feedtype = $('.instagram_mosaic option:selected').val();
           if (feedtype === 'mosaic' || feedtype === 'grid_rotator') {
                $('.apif-social-share-wrapper').hide();
            }else{
                $('.apif-social-share-wrapper').show();
            }
        
        $('.apif_form_submit_button').click(function() {
            if ($('.apif-feed-name').val() === '') {
                alert('empty');
                event.preventdefault();
            }
        });

        $container1 = $('.apif-column-settings-wrap');
        $container1.find('.apif-slider-range-max').each(function(){
            var $this = $(this);
            var $min     = $this.closest('.apif-template-input-wrap').find('.apif-input-field').data('min');
            var $max     = $this.closest('.apif-template-input-wrap').find('.apif-input-field').data('max');
            var $value   = $this.closest('.apif-template-input-wrap').find('.apif-input-field').val();
            $this.slider({
                range: "max",
                min: $min,
                max: $max,
                value: $value,
                slide: function( event, ui ) {
                  $this.closest('.apif-template-input-wrap').find('.apif-input-field').val( ui.value );
                }
              });
        });

        var ajax_url = admin_ajax_object.ajax_url;
        var ajax_nonce = admin_ajax_object.ajax_nonce;
        var cache_message = admin_ajax_object.cache_message;
        var error_cache_msg = admin_ajax_object.error_cache_msg;

        $('.apif-rebuild-each-cache').click(function(){
          var feed_id = $(this).data('id');
          var type = $(this).data('type');//rebuild_cache
          var feed_type = $(this).data('feedtype');//any_user_timeline
          var anyusername = $(this).data('username');
          if(type === 'rebuild_cache'){
                 $.ajax({
                        type: 'post',
                        url: ajax_url,
                        data: {
                            action: 'rebuild_cache_settings',
                            _wpnonce: ajax_nonce,
                            feed_type  : feed_type,
                            anyusername  : anyusername,
                            feed_id : feed_id
                        },
                        beforeSend: function (xhr) {
                             $('.apif-popup-wrapper').show();
                             $('.apifeeds-cache-build-message').hide();
                             $('.apifeeds-cache-build-message p').text('');
                        },
                        success: function (response) {

                             var response = JSON.parse(response);
                            // console.log(response.status);
                             $('.apif-popup-wrapper').hide();
                             $('.apifeeds-cache-build-message').hide();
                            //  console.log(response.status);
                            if(response.status === 'success'){
                             $('.apifeeds-cache-build-message p').text('');
                             $('.apifeeds-cache-build-message').show();
                             $('.apifeeds-cache-build-message p').text(cache_message);
                            }else{
                             $('.apifeeds-cache-build-message p').text('');
                             $('.apifeeds-cache-build-message').show();
                             $('.apifeeds-cache-build-message p').text(error_cache_msg);
                            }
                        }
                    });

          }
          

        });

    });
}(jQuery));