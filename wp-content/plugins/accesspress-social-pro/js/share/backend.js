function removeMe(args) {
     jQuery('.' + args).html('');
}

(function($) {
     $(function() {
          $('#apss_submit_settings').click(function() {
               var cache_period_val = $('#apss_cache_period').val();
               if ($.isNumeric(cache_period_val) === true) {
               } else {
                    $('.invalid_cache_period').html("Please enter the integer value only.");
                    $('.apss_cache_period').focus();
                    return false;
               }
          });
          $('.floating_positions_enable_disable').click(function() {
               if ($(this).val() === '1') {
                    $('.apss_floating_sidebar_options').show();
               } else {
                    $('.apss_floating_sidebar_options').hide();
               }

          });
          $('.floating_count_enabler').click(function() {
               if ($(this).val() === '1') {
                    $('.apss_floating_count_type').show();
               } else {
                    $('.apss_floating_count_type').hide();
               }
          });
          $('.select_all_media').click(function() {
               if ($(this).is(':checked')) {
                    $('.social_networks_class').attr('checked', 'checked');
               } else {
                    $('.social_networks_class').removeAttr('checked');
               }
          });
          $('.select_all_floating_media').click(function() {
               if ($(this).is(':checked')) {
                    $('.social_floating_networks_class').attr('checked', 'checked');
               } else {
                    $('.social_floating_networks_class').removeAttr('checked');
               }
          });
          $('#counter_enable_options_y').click(function() {
               $('.apss-counter-api-options').show();
          });
          $('#counter_enable_options_n').click(function() {
               $('.apss-counter-api-options').hide();
          });
          // Uploading media using new media uploader (Wordpress 3.5+)
          var file_frame;
          $('#apss-custom-image-upload').click(function(e) {
               e.preventDefault();
               // If the media frame already exists, reopen it.
               if (file_frame) {
                    file_frame.open();
                    return;
               }

               // Create the media frame.
               file_frame = wp.media.frames.file_frame = wp.media({
                    title: 'Select your stick header share site logo',
                    button: {
                         text: 'Use as sticky header share site logo'
                    },
                    multiple: false  // Set to true to allow multiple files to be selected
               });
               // When an image is selected, run a callback.
               file_frame.on('select', function() {
                    // We set multiple to false so only get one image from the uploader
                    var image = file_frame.state().get('selection').first().toJSON();
                    $("#apss_custom_image_url").val(image.url);
                    $("#apss_custom_image_width").val(image.width);
                    $("#apss_custom_image_height").val(image.height);
                    $("#apss_custom_button_preview").html('<img id= "apss_custom_button_image_preview" src="' + image.url + '"/>');
               });
               file_frame.open();
          });
          $("#apss_refresh_custom_button_preview").click(function(e) {
               e.preventDefault();
               var customWidth = $('#apss_custom_image_width').val();
               var customHeight = $('#apss_custom_image_height').val();
               var customUrl = $('#apss_custom_image_url').val();
               $('.apss_custom_button_image_preview').attr('src', customUrl);
               return false;
          });
          $('.apss-sticky-header-share-enable').click(function() {
               if ($(this).is(':checked')) {
                    //show the content
                    $('.apss-sticky-header-share-settings-wrapper').show();
               } else {
                    // hide the content
                    $('.apss-sticky-header-share-settings-wrapper').hide();
               }
          });
          // Major Update Code Start


          // Share Setting Main Tab
          $('.apss-tabs-trigger').click(function() {
               $('.apss-tabs-trigger').removeClass('apss-active-tab');
               $(this).addClass('apss-active-tab');
               var link = $(this).data('link');
               var board_id = 'tab-' + $(this).attr('id');
               $('.apss-tab-contents').hide();
               $('#' + board_id).show();
               var pageURL = $(this).attr("href");
               if (link === 'import-export_settings') {
                    $('#apss-save-settings').hide();
               } else {
                    $('#apss-save-settings').show();
               }
               $('.apss-hashtag-save').find('input[type="hidden"]').val(pageURL);
          });
          $('.apss-tabs-trigger').each(function() {
               var pageURL = $(this).attr("href");
               if (pageURL === location.hash) {
                    $(this).click();
               }
          });
          // Shortcode Tab

          $('.apss-shortcode-tabs-trigger').click(function() {
               $('.apss-shortcode-tabs-trigger').removeClass('apss-active-tab');
               $(this).addClass('apss-active-tab');
               var id = $(this).attr('id');
               var board_id = 'tab-' + id;
               $('.apss-shortcode-tab-contents').hide();
               $('#' + board_id).show();
          });
          // For sub tab of the shortcode generator
          $('.apss-share-sc').click(function() {
               $('.apss-shortcode-tab-contents').hide();
               $('#tab-apss-share-shortcode-settings').show();
               $('.apss-share-sc').removeClass('apss-active-tab');
               $(this).addClass('apss-active-tab');
               var link = $(this).data('link');
               var board_id = 'tab-' + link;
               $('.apss-shortcode-generator-wrapper').hide();
               $('#' + board_id).show();
          });
          $(".apss-common").first().addClass("temp-active");
          $('#icon-template').on('change', function() {
               template_value = $(this).val();
               var current_id = template_value;
               if (current_id <= 40) {
                    $('#apss-temp-demo-' + current_id).removeClass('temp-active');
                    $('.apss-common').hide();
                    $(this).addClass('temp-active');
                    $('#apss-temp-demo-' + current_id).show();
               }
          });
          if ($("#icon-template option:selected")[0]) {
               cur_temp_val = $('#icon-template option:selected').val();
               var current_id = cur_temp_val;
               $('.apss-common').hide();
               $('#apss-temp-demo-' + current_id).show();
          }

          $(".apss-common-share-float").first().addClass("temp-active");
          $('#icon-template-share-float').on('change', function() {
               template_value = $(this).val();
               var array_break = template_value.split('-');
               var current_id = array_break[1];
               var current_id = template_value;
               if (current_id <= 40) {
                    $('#apss-temp-demo-share-float-' + current_id).removeClass('temp-active');
                    $('.apss-common-share-float').hide();
                    $(this).addClass('temp-active');
                    $('#apss-temp-demo-share-float-' + current_id).show();
               }
          });
          if ($("#icon-template-share-float option:selected")[0]) {
               cur_temp_val = $('#icon-template-share-float option:selected').val();
               var array_break = cur_temp_val.split('-');
               var current_id = array_break[1];
               var current_id = cur_temp_val;
               $('.apss-common-share-float').hide();
               $('#apss-temp-demo-share-float-' + current_id).show();
          }

          jQuery('.cpa-color-picker').wpColorPicker();
//          var editor = CodeMirror.fromTextArea(document.getElementById("custom_css"), {lineNumbers: true, lineWrapping: true});

//editor.setSize(800, 150);
          $('.apss-media-uploader').on('click', function() {
               var selector = $(this);
               var file = wp.media({
                    title: 'Upload file',
                    multiple: false //true if you want to upload multiple files at once
               }).open()
               .on('select', function(e) {
                    var uploaded_file = file.state().get('selection').first();
                    console.log(uploaded_file);
                    var file_url = uploaded_file.toJSON().url;
                    selector.parent().find('input[type="text"]').val(file_url);
                    $('#apss-imported-file-content').load(file_url);
               });
          });
          $('#apss-import-file-button').click(function() {
               var imported_data = $('#apss-imported-file-content').val();
               $.ajax({
                    type: 'post',
                    url: apss_backend_js_obj.ajax_url,
                    data: {
                         imported_data: imported_data,
                         action: 'apss_imported_settings_ajax_action',
                         _wpnonce: apss_backend_js_obj.ajax_nonce
                    },
                    beforeSend: function(xhr) {
                    },
                    success: function(res) {
//location.reload();
                         alert("File sucessfully imported and implemented.");
                    }
               });
          });
          $('.apps-opt-wrap1').sortable({
               containment: "parent",
               update: function(event, ui) {
                    var profile_array = [];
                    $('.apss-option-wrapper1 input[type="checkbox"]').each(function() {
                         profile_array.push($(this).attr('data-key'));
                    });
                    var social_networks_orders = profile_array.join(',');
                    $('#apss_floating_social_newtwork_order').val(social_networks_orders);
               }
          });
// Social Network

          $('.available_social_networks_class').on('change', function() {
               var social_network = $(this).data('key');
               $('#apss-network-' + social_network).prop('checked', this.checked);
               $(this).parent().hide();
               $('#apss-network-' + social_network).closest('.apss-selected-option-wrapper').show();
          });
          $('.apss-remove-selected-network').click(function() {
               var remove_network = $(this).data('remove-network');
               $("#available_network_" + remove_network).prop("checked", false);
               $('#apss-' + remove_network).hide();
               $("#available_network_" + remove_network).parent().show();
          });


          // Sorting social networking for "Social Networks" tab

          $('.left-icon').css('cursor', 'pointer');
          $('.apps-opt-wrap').sortable({
               items: '.apss-option-wrapper',
               handle: '.left-icon',
               update: function(event, ui) {
                    var profile_array = [];
                    $('.apss-selected-option-wrapper input[type="checkbox"]').each(function() {
                         profile_array.push($(this).attr('data-key'));
                    });
                    var social_networks_orders = profile_array.join(',');
                    $('#apss_social_newtwork_order').val(social_networks_orders);
               }
          });

          // Sorting social networking for "Floating Settings" tab

          $('.apps-opt-wrap1').sortable({
               items: '.apss-option-wrapper1',
               handle: '.left-icon',
               update: function(event, ui) {
                    var profile_array = [];
                    $('.apss-option-wrapper1 input[type="checkbox"]').each(function() {
                         profile_array.push($(this).attr('data-key'));
                    });
                    var social_networks_orders = profile_array.join(',');
                    $('#apss_floating_social_newtwork_order').val(social_networks_orders);
               }
          });

          // Sorting social networking for "Shortcode Generator" tab

          $('.apps-opt-wrap-2').sortable({
               items: '.apss-option-wrapper-2',
               handle: '.apss-left-icon',
               update: function(event, ui) {
                    var profile_array = [];
                    $('.apss-selected-option-wrapper input[type="checkbox"]').each(function() {
                         profile_array.push($(this).attr('data-key'));
                    });
                    var social_networks_orders = profile_array.join(',');
                    $('#apss_social_newtwork_order').val(social_networks_orders);
               }
          });

          // For shortner type div show hide

          $('#apss-shortner-type').on('change', function() {
               shortner_type = $(this).val();
               $('.apss-shortner-type-class').hide();
               $("#apss-" + shortner_type).show();
          });
          // For sub tabs of display tab settings

          $('.apss-inner-tabs-trigger').click(function() {
               $('.apss-inner-tabs-trigger').removeClass('apss-inner-active-tab');
               $(this).addClass('apss-inner-active-tab');
               var link = $(this).data('link');
               var board_id = 'tab-' + link;
               $('.apss-display-settings-wrapper').hide();
               $('#' + board_id).show();
          });
          // For sub tab of the share counter settings

          $('.apss-inner-share-tabs-trigger').click(function() {
               $('.apss-inner-share-tabs-trigger').removeClass('apss-inner-active-tab');
               $(this).addClass('apss-inner-active-tab');
               var link = $(this).data('link');
               var board_id = 'tab-' + link;
               $('.apss-share-counter-settings-wrapper').hide();
               $('#' + board_id).show();
          });

          $('#apss-shortcode-display-settings').on('change', function() {
               value = $(this).val();
               var board_id = 'tab-shortcode-' + value;
               $('.apss-shortcode-display-settings-wrapper').hide();
               $('#' + board_id).show();
          });

          $(".apss-common-shortcode").first().addClass("temp-active");

          $('#shortcode_template').on('change', function() {
               template_value = $(this).val();
               var current_id = template_value;
               if (current_id <= 40) {
                    $('#apss-temp-demo-shortcode-' + current_id).removeClass('temp-active');
                    $('.apss-common-shortcode').hide();
                    $(this).addClass('temp-active');
                    $('#apss-temp-demo-shortcode-' + current_id).show();
               }
          });
          if ($("#shortcode_template option:selected")[0]) {
               cur_temp_val = $('#shortcode_template option:selected').val();
               var current_id = cur_temp_val;
               $('.apss-common-shortcode').hide();
               $('#apss-temp-demo-shortcode-' + current_id).show();
          }

          $(".apss-shortcode-button").click(function() {

               /**
                Social Network Settings
                **/
               var sn_array = [];
               $('.shortcode_social_networks_class:checked').each(function() {
                    sn_array.push($(this).val());
               });
               var networks = sn_array.join(",");
               /**
                Display Settings
                **/
               var template = $('#shortcode_template').val();
               var enable_animation = $("input[name='animation']:checked").val();

               if (enable_animation == 1) {
                    var animation = $('#apss-shortcode-animation').val();
               } else {
                    var animation = '';
               }
               var display_method = $('#apss-shortcode-display-settings').val();
               if (display_method === " " || display_method === "inline") {
                    var button_align = $("input[name='button_align']:checked").val();
                    var inline_enabled = "inline = 'enable'" + " alignment = '" + button_align + "'";
               } else {
                    var inline_enabled = "inline = 'disable' ";
               }

               if (display_method == "floating") {
                    var show_hide_button = $("input[name='floating_sidebar_hide_show_button']:checked").val();
                    var semi_transparent = $("input[name='semi_transparent']:checked").val();
                    var enable_mobile_floating_sidebar = $("input[name='enable_mobile_floating_sidebar']:checked").val();
                    var floating_sidebar_position = $("input[name='floating_sidebar_position']:checked").val();
                    var floating_sidebar_counter = $("input[name='floating_sidebar_counter']:checked").val();
                    var floating_sidebar_total_count = $("input[name='floating_sidebar_total_count']:checked").val();
                    var floating_sidebar_show_all = $("input[name='floating_sidebar_show_all']:checked").val();
                    var floating_sidebar_theme = $('#apss-shortcode-floating-template').val();
                    var floating_enabled = "floating = 'enable'" + " show_hide_button = '" + show_hide_button + "'" + " semi_transparent  = '" + semi_transparent + "'" + " enable_mobile_floating_sidebar  = '" + enable_mobile_floating_sidebar + "'" + " floating_sidebar_position  = '" + floating_sidebar_position + "'" + " floating_sidebar_counter  = '" + floating_sidebar_counter + "'" + " floating_sidebar_total_count  = '" + floating_sidebar_total_count + "'" + " floating_sidebar_show_all  = '" + floating_sidebar_show_all + "'" + " floating_sidebar_theme  = '" + floating_sidebar_theme + "'";
               } else {
                    var floating_enabled = "floating = 'disable' ";
               }

               if (display_method == "popup") {
                    var popup_share_text = $("input[name='popup_share_text']").val();
                    var popup_window_message = $("input[name='popup_window_message']").val();
                    var popup_type = $("input[name='popup_type']:checked").val();
                    var popup_delay_time = $("input[name='popup_delay_time']").val();
                    var popup_percent_viewed = $("input[name='popup_percent_viewed']").val();
                    var popup_enabled = "popup = 'enable'" + " popup_share_text = '" + popup_share_text + "'" + " popup_window_message  = '" + popup_window_message + "'" + " popup_type  = '" + popup_type + "'" + " popup_delay_time  = '" + popup_delay_time + "'" + " popup_percent_viewed  = '" + popup_percent_viewed + "' ";
               } else {
                    var popup_enabled = "popup = 'disable' ";
               }

               if (display_method == "flyin") {
                    var flyin_share_text = $("input[name='flyin_share_text']").val();
                    var flyin_window_message = $("input[name='flyin_window_message']").val();
                    var flyin_location = $("input[name='flyin_location']:checked").val();
                    var flyin_enabled = "flyin = 'enable' " + " flyin_share_text = '" + flyin_share_text + "' " + " flyin_window_message  = '" + flyin_window_message + "' " + " flyin_location  = '" + flyin_location + "' ";
               } else {
                    var flyin_enabled = "flyin = 'disable' ";
               }
               /**
                Miscellaneous Settings
                **/
               var twitter_username = $("input[name='twitter_username']").val();
               var twitter_api_use = $("input[name='twitter_api_use']").val();
               var fb_app_id = $("input[name='fb_app_id']").val();
               var fb_app_secret = $("input[name='fb_app_secret']").val();
               var enable_share_count = $("input[name='enable_share_count']:checked").val();
               var enable_total_share_count = $("input[name='enable_total_share_count']:checked").val();
               var custom_share_link = $("input[name='custom_share_link']").val();
               var enable_http_count = $("input[name='enable_http_count']:checked").val();
               var dialog_box_options = $("input[name='dialog_box_options']:checked").val();
               var disable_whatsapp_in_desktop = $("input[name='disable_whatsapp_in_desktop']:checked").val();
               var disable_viber_in_desktop = $("input[name='disable_viber_in_desktop']:checked").val();
               var disable_sms_in_desktop = $("input[name='disable_sms_in_desktop']:checked").val();
               var disable_messenger_in_desktop = $("input[name='disable_messenger_in_desktop']:checked").val();
               /**
                Custom Text Settings
                **/
               var share_text = $("input[name='share_text']").val();
               var common_short_text = $("input[name='common_short_text']").val();
               var twitter_short_text = $("input[name='twitter_short_text']").val();
               var email_short_text = $("input[name='email_short_text']").val();
               var print_short_text = $("input[name='print_short_text']").val();
               var common_long_text = $("input[name='common_long_text']").val();
               var twitter_long_text = $("input[name='twitter_long_text']").val();
               var email_long_text = $("input[name='email_long_text']").val();
               var print_long_text = $("input[name='print_long_text']").val();
               var shortcode = "[apss_share "
               + " " + "networks = '" + networks + "' "
               + " " + "theme = '" + template + "' "
               + " " + "animation = '" + animation + "' "
               + " " + inline_enabled
               + " " + floating_enabled
               + " " + popup_enabled
               + " " + flyin_enabled
               + " " + "twitter_username = '" + twitter_username + "' "
               + " " + "twitter_api_use = '" + twitter_api_use + "' "
               + " " + "fb_app_id = '" + fb_app_id + "' "
               + " " + "fb_app_secret = '" + fb_app_secret + "' "
               + " " + "counter = '" + enable_share_count + "'"
               + " " + "total_counter = '" + enable_total_share_count + "'"
               + " " + "custom_share_link = '" + custom_share_link + "'"
               + " " + "http_count = '" + enable_http_count + "'"
               + " " + "dialog_box_options = '" + dialog_box_options + "'"
               + " " + "disable_whatsapp_in_desktop = '" + disable_whatsapp_in_desktop + "'"
               + " " + "disable_viber_in_desktop = '" + disable_viber_in_desktop + "'"
               + " " + "disable_sms_in_desktop = '" + disable_sms_in_desktop + "'"
               + " " + "disable_messenger_in_desktop = '" + disable_messenger_in_desktop + "'"
               + " " + "share_text = '" + share_text + "'"
               + " " + "common_short_text = '" + common_short_text + "'"
               + " " + "twitter_short_text = '" + twitter_short_text + "'"
               + " " + "email_short_text = '" + email_short_text + "'"
               + " " + "print_short_text = '" + print_short_text + "'"
               + " " + "common_long_text = '" + common_long_text + "'"
               + " " + "twitter_long_text = '" + twitter_long_text + "'"
               + " " + "email_long_text = '" + email_long_text + "'"
               + " " + "print_long_text = '" + print_long_text + "'"
               + " " + "]";
               $("#apss_generated_shortcode").html(shortcode);
          });
          $(".apss-common-share-float-shortcode").first().addClass("temp-active");
          $('#apss-shortcode-floating-template').on('change', function() {
               template_value = $(this).val();
               var array_break = template_value.split('-');
               var current_id = array_break[1];
               var current_id = template_value;
               if (current_id <= 40) {
                    $('#apss-temp-demo-share-float-shortcode-' + current_id).removeClass('temp-active');
                    $('.apss-common-share-float-shortcode').hide();
                    $(this).addClass('temp-active');
                    $('#apss-temp-demo-share-float-shortcode-' + current_id).show();
               }
          });
          if ($("#apss-shortcode-floating-template option:selected")[0]) {
               cur_temp_val = $('#apss-shortcode-floating-template option:selected').val();
               var array_break = cur_temp_val.split('-');
               var current_id = array_break[1];
               var current_id = cur_temp_val;
               $('.apss-common-share-float-shortcode').hide();
               $('#apss-temp-demo-share-float-shortcode-' + current_id).show();
          }

          $('#apss-button-animation').on('change', function() {
               var animation = $(this).val();
               var default_class = 'apss-animation-effect ';
               $('#apss-animation-effect').removeClass().addClass(default_class + animation)
          });
          $('#apss-total_share_button-animation').on('change', function() {
               var animation = $(this).val();
               var default_class = 'apss-animation-effect-total ';
               $('#apss-animation-effect-total').removeClass().addClass(default_class + animation)
          });
          $('#apss-shortcode-animation').on('change', function() {
               var animation = $(this).val();
               var default_class = 'apss-animation-effect-shortcode ';
               $('#apss-animation-effect-shortcode').removeClass().addClass(default_class + animation)
          });

          $('.apss_popup_optimization').on('change', function() {
               var popup_type = $(this).val();
               if (popup_type === "delayed_time") {
                    $('#apss_delayed_time').show();
               } else {
                    $('#apss_delayed_time').hide();
               }
               if (popup_type === "content_viewed") {
                    $('#apss_content_viewed').show();
               } else {
                    $('#apss_content_viewed').hide();
               }
          });

          $('.apss_short_codeDisp').click(function() {
               $(this).select();
               $(this).focus();
               document.execCommand('copy');
               $(this).siblings('.apss_copied-msg').show().delay(1000).fadeOut();
          });

          $('.apsp-shortcode-popup-type').on('change', function() {
               var popup_type = $(this).val();
               $('.apss-popup').hide();
               $('#apss_' + popup_type).show();
          });


     }); //document.ready close
}
(jQuery)
);