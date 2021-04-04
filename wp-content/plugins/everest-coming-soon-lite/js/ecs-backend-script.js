jQuery(document).ready(function ($) {
    /**
     *
     * @type object
     */
    var notice_timeout;


    $('.ecs-tab-trigger').click(function () {
        $('.ecs-tab-trigger').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');
        var settings = $(this).data('settings-tab');
        $('.ecs-sub-settings-wrap').hide();
        $('#ecs-' + settings + '-section').show();
    });
    var mediaUploader;
    $('body').on('click', '.ecs-file-upload', function () {
        var $selector = $(this);
        var button_label = $(this).data('button-label');
        var window_title = $(this).data('window-title');
        // If the uploader object has already been created, reopen the dialog

        // Extend the wp.media object
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: window_title,
            button: {
                text: button_label
            }, multiple: false
        });

        // When a file is selected, grab the URL and perform necessary task to display as the gallery items
        mediaUploader.on('select', function () {
            attachment = mediaUploader.state().get('selection').toJSON();
            // console.log(attachment);
            var attachment_id = attachment[0].id;
            var attachment_url = attachment[0].url;
            // alert(attachment_id);
            $selector.parent().find('input[type="text"]').val(attachment_url);
            if (button_label == 'Insert Image') {
                if ($selector.parent().find('.ecs-image-preview').length > 0) {
                    $selector.parent().find('.ecs-image-preview').html('<img src="' + attachment_url + '"/>');
                }
            }

        });
        // Open the uploader dialog
        mediaUploader.open();
    });
    $('.ecs-toggle-postbox').click(function () {
        $(this).toggleClass('ecs-up-toggle ecs-down-toggle');
        $(this).closest('.ecs-postbox').find('.ecs-postbox-inner').slideToggle('fast');
    });

    $('.ecs-postbox h3').click(function () {
        $(this).closest('.ecs-postbox').find('.ecs-toggle-postbox').click();
    });
    $('.ecs-sortable').sortable({containment: "parent"});

    $('.ecs-template-switch').change(function () {
        var template_id = $(this).val();
        $('.ecs-template-preview a').hide();
        $('.ecs-template-preview a[data-template-id="' + template_id + '"]').show();
        $(this).closest('.ecs-sub-settings-wrap').find('.ecs-postbox[data-template-id]').hide();
        $(this).closest('.ecs-sub-settings-wrap').find('.ecs-postbox[data-template-id="' + template_id + '"]').show();
        if ($('.ecs-components-docs-wrap').length > 0) {
            $('.ecs-components-docs-wrap p').hide();
            $('.ecs-components-docs-wrap p[data-template-ref="' + template_id + '"]').show();
        }

    });

    $('#ecs-save-settings-trigger').click(function () {
        tinyMCE.triggerSave();
        var posted_values = [];
        $('.ecs-settings-field').each(function () {
            var field_type = $(this).attr('type');
            var field_name = $(this).attr('name');
            var field_value = $(this).val();
            if (field_type == 'checkbox' || field_type == 'radio') {
                if ($(this).is(':checked')) {
                    posted_values.push(field_name + '=' + field_value);
                }
            } else {
                posted_values.push(field_name + '=' + field_value);

            }
        });
        posted_values = encodeURI(posted_values.join('&'));
        $.ajax({
            url: ecs_backend_js_object.ajax_url,
            type: 'post',
            data: {
                posted_values: posted_values,
                action: 'ecs_settings_save_action',
                _wpnonce: ecs_backend_js_object.ajax_nonce,
            },
            beforeSend: function (xhr) {
                clearTimeout(notice_timeout);
                $('.ecs-success-message').slideUp();
                $('.ecs-wait-message').slideDown();
            },
            success: function (res) {
                var res = $.parseJSON(res);
                $('.ecs-wait-message').hide();
                $('.ecs-success-message').html(res.message).show();
                notice_timeout = setTimeout(function () {
                    $('.ecs-success-message').slideUp();
                }, 5000);

            }
        });
    });

    $('.ecs-datepicker').datepicker({dateFormat: 'mm/dd/yy'});

    $('#ecs-restore-settings-trigger').click(function () {
        if (confirm(ecs_backend_js_object.strings.restore_confirm)) {
            $.ajax({
                url: ecs_backend_js_object.ajax_url,
                type: 'post',
                data: {
                    action: 'ecs_restore_settings_action',
                    _wpnonce: ecs_backend_js_object.ajax_nonce,
                },
                beforeSend: function (xhr) {
                    clearTimeout(notice_timeout);
                    $('.ecs-success-message').slideUp();
                    $('.ecs-wait-message').slideDown();
                },
                success: function (res) {
                    var res = $.parseJSON(res);
                    $('.ecs-wait-message').hide();
                    $('.ecs-success-message').html(res.message).show();
                    notice_timeout = setTimeout(function () {
                        $('.ecs-success-message').slideUp();
                    }, 5000);
                    location.reload();

                }
            });
        }
    });

    $('.ecs-image-preview').each(function () {
        var image_url = $(this).closest('.ecs-field').find('input[type="text"]').val();
        if (image_url && image_url != '') {
            $(this).html('<img src="' + image_url + '"/>');
        }
    });
    $('.ecs-file-upload').after('<input type="button" value="clear" class="button-secondary ecs-clear-preview"/>');
    $('body').on('click', '.ecs-clear-preview', function () {
        $(this).closest('.ecs-field').find('input[type="text"]').val('');
        $(this).next('.ecs-image-preview').html('');
    });

    $('#ecs-checkall').click(function () {
        if ($(this).is(':checked')) {
            $('.ecs-select-subs').attr('checked', 'checked');
        } else {
            $('.ecs-select-subs').removeAttr('checked');

        }
    });

    $('.ecs-postbox-nav-trigger').click(function () {
        $('.ecs-postbox-nav-trigger').removeClass('ecs-active-postbox-nav');
        $(this).addClass('ecs-active-postbox-nav');
        var postbox_id = $(this).data('nav-ref');
        $('#ecs-components-section .ecs-postbox').hide();
        $('#ecs-components-section .ecs-postbox[data-postbox-ref="' + postbox_id + '"]').show();

    });

});

