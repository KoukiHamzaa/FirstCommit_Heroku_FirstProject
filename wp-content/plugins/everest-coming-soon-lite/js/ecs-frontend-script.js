jQuery(document).ready(function ($) {
    if ($('.ecs-countdown').length > 0) {
        var countdown_expiry_date = $('.ecs-countdown').data('expire-date');
        if (countdown_expiry_date != '') {
            $('.ecs-countdown').downCount({
                date: countdown_expiry_date + ' 12:00:00',
            });
        }
    }

    $('.ecs-close').click(function () {
        $(this).closest('.ecs-section').removeClass('ecs-active-section');
    });



    $('#ecs-subscription-form').submit(function (e) {
        e.preventDefault();

        var email_address = $('#ecs-subscription-form input[name="email"]').val();
        if (email_address == '') {
            var error_message = $(this).data('subscription-error-message');
            $('.ecs-subscription-message').html(error_message);
        } else {
            $.ajax({
                type: 'post',
                url: ajax_url,
                data: {
                    email: email_address,
                    _wpnonce: ajax_nonce,
                    action: 'ecs_subscribe_action'
                },
                beforeSend: function (xhr) {
                    $('.ecs-subscribe-loader').show();
                },
                success: function (res) {
                    $('.ecs-subscribe-loader').hide();
                    res = $.parseJSON(res);
                    $('.ecs-subscription-message').html(res.message);
                    if (res.success == 1) {
                        $('#ecs-subscription-form input[name="email"]').val('');
                    }

                }
            });
        }
    });
    $('#ecs-subscription-form input[name="email"]').keyup(function () {
        $('.ecs-subscription-message').html('');
    });

    $('.ecs-email-form').submit(function (e) {
        e.preventDefault();
        var error_flag = 0;
        var required_message = $(this).data('form-error-message');
        var name = $('.ecs-email-form input[name="contact_name"]').val();
        if (name == '') {
            error_flag = 1;
            $('.ecs-name-error').html(required_message);
        }
        var email = $('.ecs-email-form input[name="contact_email"]').val();
        if (email == '') {
            error_flag = 1;
            $('.ecs-email-error').html(required_message);
        }
        var message = $('.ecs-email-form textarea[name="contact_message"]').val();
        if (message == '') {
            error_flag = 1;
            $('.ecs-message-error').html(required_message);
        }

        if (error_flag == 0) {
            $.ajax({
                type: 'post',
                url: ajax_url,
                data: {
                    _wpnonce: ajax_nonce,
                    contact_name: name,
                    contact_email: email,
                    contact_message: message,
                    action: 'ecs_email_action'
                },
                beforeSend: function (xhr) {
                    $('.ecs-email-loader').show();
                },
                success: function (res) {
                    $('.ecs-email-loader').hide();
                    res = $.parseJSON(res);
                    $('.ecs-email-message').html(res.message);
                    if (res.success == 1) {
                        $('.ecs-email-form input[name="contact_name"]').val('');
                        $('.ecs-email-form input[name="contact_email"]').val('');
                        $('.ecs-email-form textarea[name="contact_message"]').val('');

                    }

                }
            });
        }
    });

    $('.ecs-email-form input[type="text"],.ecs-email-form input[type="email"],.ecs-email-form textarea').keyup(function () {
        $(this).next('.ecs-contact-error').html('');
    });





    $('.ecs-id-link').click(function (e) {
        $('.ecs-section').removeClass('ecs-active-section');
        e.preventDefault();
        //  $('.ecs-close').click();
        var id = $(this).attr('href');

        $(id).addClass('ecs-active-section');
        //   $(id).fadeIn(500);

    });



    $('.ecs-template-1 .ecs-navigation-bttn, .ecs-template-1 .ecs-readmore-button').click(function (e) {
        e.preventDefault();
        $('.ecs-template-1 .ecs-templates-wrap').addClass('ecs-active-section');
    });

    $('.ecs-template-1 .ecs-overlay, .ecs-template-1 .ecs-navigation-close-bttn').click(function (e) {
        e.preventDefault();
        $('.ecs-template-1 .ecs-templates-wrap').removeClass('ecs-active-section');
    });

    $('.ecs-scroll-trigger').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href');
        $('html,body').animate({
            scrollTop: $(id).offset().top},
                'slow');
    });



});


