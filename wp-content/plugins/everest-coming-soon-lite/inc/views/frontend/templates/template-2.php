<div class="ecs-templates-wrap">
    <div class="ecs-section ecs-intro-section ecs-clearfix">
        <div class="ecs-intro-left-section animated slideInLeft">
            <div class="ecs-intro-content-wrap">
                <div class="ecs-intro-left-title animated fadeIn">
                    <?php if ( $header_text != '' ) { ?><h2><?php echo esc_attr($header_text); ?></h2><?php } ?>
                </div>
                <div class="ecs-countdown-wrap ecs-clearfix animated zoomIn">
                    <?php
                    include(ECSL_PATH . 'inc/views/frontend/components/timer.php');
                    ?>
                </div>
            </div>
        </div>
        <div class="ecs-intro-right-section animated slideInRight">
            <div class="ecs-intro-content-wrap">
                <?php if ( !empty($component_settings[ 'logo' ]) ) { ?>
                    <div class="ecs-logo-wrapper animated fadeInDown">
                        <a href="<?php echo esc_url(site_url()); ?>">
                            <img src="<?php echo esc_url($component_settings[ 'logo' ]); ?>">
                        </a>
                    </div>
                <?php } ?>
                <div class="ecs-intro-right-title animated fadeInUp">
                    <?php if ( $about_us_title != '' ) { ?><h2><?php echo esc_attr($about_us_title); ?></h2><?php } ?>
                </div>
                <?php if ( $about_us_description != '' ) { ?>
                    <div class="ecs-intro-description animated fadeInUp">
                        <?php echo $about_us_description; ?>
                    </div>
                <?php } ?>
                <div class="ecs-section-link-wrap ecs-clearfix">
                    <a href="#ecs-subscription-active" class="ecs-subscription-link ecs-id-link animated slideInLeft"><?php echo (!empty($template_settings[ 'template_2' ][ 'notify_us_label' ])) ? esc_attr($template_settings[ 'template_2' ][ 'notify_us_label' ]) : __('Notify Us', 'everest-coming-soon-lite'); ?></a>
                    <a href="#ecs-more-info-active" class="ecs-more-info-link ecs-id-link animated slideInRight"><?php echo (!empty($template_settings[ 'template_2' ][ 'notify_us_label' ])) ? esc_attr($template_settings[ 'template_2' ][ 'information_label' ]) : __('Information', 'everest-coming-soon-lite'); ?></a>
                </div>
                <?php
                if ( !empty($social_networks) ) {
                    ?>
                    <div class="ecs-social-share-wrap animated fadeInUp">
                        <?php
                        foreach ( $social_networks as $social_network => $url ) {
                            if ( $url != '' ) {
                                ?>
                                <a href="<?php echo esc_url($url); ?>" class="ecs-social-icon ecs-<?php echo esc_attr($social_network); ?>">
                                    <i class="fa fa-<?php echo esc_attr($social_network); ?>"></i>
                                </a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="ecs-section ecs-subscription-section" id="ecs-subscription-active">
        <div class="ecs-overlay"></div>
        <div class="ecs-subscription-inner-container">
            <div class="ecs-subscription-content">
                <span class="ecs-close"></span>
                <?php if ( $subscription_title != '' ) { ?><h3 class="ecs-section-content-title"><?php echo esc_attr($subscription_title); ?></h3><?php
                }
                if ( $subscription_description != '' ) {
                    ?>
                    <div class="ecs-content-description">
                        <?php echo $subscription_description; ?>
                    </div>
                <?php } ?>
                <div class="ecs-subscription-form-wrap">
                    <form id="ecs-subscription-form" data-subscription-error-message="<?php echo esc_attr($subscribe_required_message); ?>">
                        <div class="ecs-input-wrap">
                            <input type="email" name="email" placeholder="<?php echo esc_attr($subscription_email_field_label); ?>" />
                        </div>
                        <button type="submit" class="ecs-button"><?php echo esc_attr($subscribe_button_label); ?></button>
                        <img src="<?php echo ECSL_IMG_DIR . 'ajax-loader.gif' ?>" class="ecs-subscribe-loader" style="display:none;"/>
                        <div class="ecs-subscription-message"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="ecs-section ecs-more-info-section" id="ecs-more-info-active">
        <span class="ecs-close"></span>
        <div class="ecs-more-info-inner-wrap">
            <div class="ecs-contact-content">
                <h3 class="ecs-section-content-title"><?php echo esc_attr($contact_us_title); ?></h3>
                <div class="ecs-content-description">
                    <?php echo $contact_us_description; ?>
                </div>
                <div class="ecs-contact-form-wrap">
                    <form class="ecs-email-form" data-form-error-message="<?php echo esc_attr($contact_required_message); ?>">
                        <div class="ecs-input-wrap">
                            <input type="text" name="contact_name" placeholder="<?php echo esc_attr($name_field_label); ?>" />
                            <div class="ecs-contact-error ecs-name-error"></div>
                        </div>
                        <div class="ecs-input-wrap">
                            <input type="email" name="contact_email" placeholder="<?php echo esc_attr($email_field_label); ?>" />
                            <div class="ecs-contact-error ecs-email-error"></div>
                        </div>
                        <div class="ecs-input-wrap">
                            <textarea  placeholder="<?php echo esc_attr($message_field_label); ?>" name="contact_message"></textarea>
                            <div class="ecs-contact-error ecs-message-error"></div>
                        </div>
                        <button type="submit" class="ecs-button"><?php echo esc_attr($submit_button_label); ?></button>
                        <img src="<?php echo esc_attr(ECSL_IMG_DIR) . 'ajax-loader.gif' ?>" class="ecs-email-loader" style="display:none;"/>
                        <div class="ecs-email-message"></div>
                    </form>
                </div>
            </div>
            <div class="ecs-location-content">
                <h3 class="ecs-section-content-title"><?php echo esc_attr($get_in_touch_title); ?></h3>
                <div class="ecs-contact-info-wrap ecs-clearfix">
                    <?php if ( $address_value != '' ) { ?>
                        <div class="ecs-contact-info">
                            <div class="ecs-contact-icon">
                                <i class="fa fa-map-marker"></i>
                                <span><?php echo esc_attr($address_label); ?></span>
                            </div>
                            <div class="ecs-contact-details">
                                <p>
                                    <?php echo str_replace(',', ',<br/>', $address_value); ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                    if ( $phone_value != '' ) {
                        ?>
                        <div class="ecs-contact-info">
                            <div class="ecs-contact-icon">
                                <i class="fa fa-phone"></i>
                                <span><?php echo esc_attr($phone_label); ?></span>
                            </div>
                            <div class="ecs-contact-details">
                                <?php
                                $phone_value_array = explode(',', $phone_value);
                                foreach ( $phone_value_array as $phone_value ) {
                                    ?>
                                    <span><a href="tel:<?php echo esc_attr($phone_value); ?>"><?php echo esc_attr($phone_value); ?></a></span>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    if ( $email_value != '' ) {
                        ?>
                        <div class="ecs-contact-info">
                            <div class="ecs-contact-icon">
                                <i class="fa fa-envelope"></i>
                                <span><?php echo esc_attr($email_label); ?></span>
                            </div>
                            <div class="ecs-contact-details">
                                <?php
                                $email_value_array = explode(',', $email_value);
                                foreach ( $email_value_array as $email_value ) {
                                    ?>
                                    <span><a href="mailto:<?php echo esc_attr($email_value); ?>"><?php echo esc_attr($email_value); ?></a></span>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
</div>