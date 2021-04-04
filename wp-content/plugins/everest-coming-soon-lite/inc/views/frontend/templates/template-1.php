<div class="ecs-templates-wrap animated fadeIn">
    <div class="ecs-section ecs-intro-section animated fadeIn">
        <div class="ecs-overlay"></div>
        <div class="ec-intro-section-wrap">
            <div class="ecs-section-inner-wrap ecs-intro-inner-wrap">
                <div class="ecs-intro-content-title animated fadeInDown">
                    <h2><?php echo esc_attr($countdown_title); ?></h2>
                </div>
                <div class="ecs-countdown-wrap ecs-clearfix  animated fadeInDown">
                    <?php
                    include(ECSL_PATH . 'inc/views/frontend/components/timer.php');
                    ?>
                </div>
                <div class="ecs-intro-description animated fadeInUp">
                    <?php echo $countdown_short_description; ?>
                </div>
                <div class="ecs-subscription-form-wrap animated fadeInUp">
                    <form id="ecs-subscription-form" data-subscription-error-message="<?php echo esc_attr($subscribe_required_message); ?>">
                        <div class="ecs-input-wrap">
                            <input type="email" name="email" placeholder="<?php echo esc_attr($subscription_email_field_label); ?>" />
                        </div>
                        <button type="submit" class="ecs-button"><?php echo esc_attr($subscribe_button_label); ?></button>
                        <img src="<?php echo esc_attr(ECSL_IMG_DIR) . 'ajax-loader.gif' ?>" class="ecs-subscribe-loader" style="display:none;" />
                        <div class="ecs-subscription-message"></div>
                    </form>
                </div>
                <div class="ecs-readmore-button animated fadeInUp">
                    <a href="#ecs-more-details"><i class="fa fa-info"></i><?php echo (!empty($template_settings[ 'template_1' ][ 'more_information_label' ])) ? esc_attr($template_settings[ 'template_1' ][ 'more_information_label' ]) : __('More Information', 'everest-coming-soon-lite'); ?></a>
                </div>

            </div>
        </div>
    </div>

    <div class="ecs-section ecs-side-section">
        <div class="ecs-navigation-bttn">
            <span class="ecs-one"></span>
            <span class="ecs-two"></span>
            <span class="ecs-three"></span>
        </div>
        <div class="ecs-navigation-close-bttn">
            <span class="ecs-one"></span>
            <span class="ecs-two"></span>
            <span class="ecs-three"></span>
        </div>
        <div class="ecs-side-section-wrap">
            <div class="ecs-section-inner-wrap ecs-side-inner-wrap">
                <?php if ( $get_in_touch_title != '' ) { ?><h3 class="ecs-section-content-title"><?php echo esc_attr($get_in_touch_title); ?></h3><?php } ?>
                <div class="ecs-content-description">
                    <?php echo $get_in_touch_description; ?>
                </div>
                <div class="ecs-contact-info-wrap ecs-clearfix">
                    <div class="ecs-contact-info">
                        <?php echo esc_attr($address_value); ?>
                    </div>
                    <div class="ecs-contact-info">
                        <?php
                        $phone_value_array = explode(',', $phone_value);
                        foreach ( $phone_value_array as $phone_value ) {
                            ?>
                            <span><a href="tel:<?php echo esc_attr($phone_value); ?>"><?php echo esc_attr($phone_value); ?></a></span>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="ecs-contact-info">
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
                <?php
                if ( !empty($social_networks) ) {
                    ?>
                    <div class="ecs-social-share-wrap">
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

        </div>
    </div>
</div>