<div class="ecs-sub-settings-wrap" id="ecs-components-section" style="display:none;">

    <div class="ecs-postbox-navigation">
        <ul>
            <li><a href="javascript:void(0)" class="ecs-postbox-nav-trigger ecs-active-postbox-nav" data-nav-ref="header"><span class="dashicons dashicons-welcome-widgets-menus"></span><?php _e('Header', 'everest-coming-soon-lite'); ?></a></li>
            <li><a href="javascript:void(0)" class="ecs-postbox-nav-trigger" data-nav-ref="about-us"><span class="dashicons dashicons-id"></span><?php _e('About Us', 'everest-coming-soon-lite'); ?></a></li>
            <li><a href="javascript:void(0)" class="ecs-postbox-nav-trigger" data-nav-ref="subscription"><span class="dashicons dashicons-email"></span><?php _e('Subscription', 'everest-coming-soon-lite'); ?></a></li>
            <li><a href="javascript:void(0)" class="ecs-postbox-nav-trigger" data-nav-ref="social-network"><span class="dashicons dashicons-share"></span><?php _e('Social Network', 'everest-coming-soon-lite'); ?></a></li>
            <li><a href="javascript:void(0)" class="ecs-postbox-nav-trigger" data-nav-ref="contact-us"><span class="dashicons dashicons-share-alt2"></span><?php _e('Contact Us', 'everest-coming-soon-lite'); ?></a></li>
            <li><a href="javascript:void(0)" class="ecs-postbox-nav-trigger" data-nav-ref="get-in-touch"><span class="dashicons dashicons-heart"></span><?php _e('Get In Touch', 'everest-coming-soon-lite'); ?></a></li>
            <li><a href="javascript:void(0)" class="ecs-postbox-nav-trigger" data-nav-ref="quickinfo"><span class="dashicons dashicons-info"></span><?php _e('Quick Info', 'everest-coming-soon-lite'); ?></a></li>
            <li><a href="javascript:void(0)" class="ecs-postbox-nav-trigger" data-nav-ref="countdown"><span class="dashicons dashicons-clock"></span><?php _e('Countdown', 'everest-coming-soon-lite'); ?></a></li>
        </ul>
    </div>

    <div class="ecs-postbox" data-postbox-ref="header">
        <button type="button" class="ecs-toggle-postbox ecs-up-toggle"><span class="ecs-toggle-indicator"></span></button>
        <h3><?php _e('Header Section', 'everest-coming-soon-lite'); ?></h3>
        <div class="ecs-postbox-inner">
            <div class="ecs-field-wrap">
                <label><?php _e('Logo Image', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][logo]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'logo' ]) ? esc_url($ecs_settings[ 'component' ][ 'logo' ]) : ''; ?>"/>
                    <input type="button" class="ecs-file-upload button-secondary" value="<?php _e('Upload', 'everest-coming-soon-lite'); ?>" data-button-label='<?php _e('Insert Image', 'everest-coming-soon-lite'); ?>' data-window-title='<?php _e('Choose Image', 'everest-coming-soon-lite'); ?>'>
                    <div class="ecs-image-preview"></div>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Header Text', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][header_text]" placeholder="<?php _e('Coming Soon', 'everest-coming-soon-lite'); ?>" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'header_text' ]) ? esc_attr($ecs_settings[ 'component' ][ 'header_text' ]) : ''; ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Site Short Description', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <?php wp_editor(isset($ecs_settings[ 'component' ][ 'site_short_description' ]) ? $ecs_settings[ 'component' ][ 'site_short_description' ] : '', 'ecs-site-short-description', array( 'textarea_name' => 'settings[component][site_short_description]', 'media_buttons' => false, 'textarea_rows' => 20, 'editor_class' => 'ecs-settings-field' )); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="ecs-postbox" data-postbox-ref="about-us" style="display:none;">
        <button type="button" class="ecs-toggle-postbox ecs-up-toggle"><span class="ecs-toggle-indicator"></span></button>
        <h3><?php _e('About Us Section', 'everest-coming-soon-lite'); ?></h3>
        <div class="ecs-postbox-inner">
            <div class="ecs-field-wrap">
                <label><?php _e('About Us Title', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][about_us_title]" placeholder="<?php _e('About Us', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'about_us_title' ]) ? esc_attr($ecs_settings[ 'component' ][ 'about_us_title' ]) : ''; ?>" class="ecs-settings-field"/>
                </div>
            </div>

            <div class="ecs-field-wrap">
                <label><?php _e('About Us Description', '8degree-maintenance') ?></label>
                <div class="ecs-field">
                    <?php
                    wp_editor(isset($ecs_settings[ 'component' ][ 'about_us_description' ]) ? $ecs_settings[ 'component' ][ 'about_us_description' ] : '', 'ecs-about-us-description', array( 'textarea_name' => 'settings[component][about_us_description]', 'media_buttons' => false, 'textarea_rows' => 20, 'editor_class' => 'ecs-settings-field' ))
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="ecs-postbox" data-postbox-ref="subscription" style="display:none;">
        <button type="button" class="ecs-toggle-postbox ecs-up-toggle"><span class="ecs-toggle-indicator"></span></button>
        <h3><?php _e('Subscription Section', 'everest-coming-soon-lite'); ?></h3>
        <div class="ecs-postbox-inner">
            <div class="ecs-field-wrap">
                <label><?php _e('Subscription Title', '8degree-maintenance') ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][subscription_title]" placeholder="<?php _e('Subscribe Us', 'everest-coming-soon-lite'); ?>" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'subscription_title' ]) ? esc_attr($ecs_settings[ 'component' ][ 'subscription_title' ]) : ''; ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Subscription Description', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <textarea name="settings[component][subscription_description]" class="ecs-settings-field"><?php echo isset($ecs_settings[ 'component' ][ 'subscription_description' ]) ? esc_attr($ecs_settings[ 'component' ][ 'subscription_description' ]) : ''; ?></textarea>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Email Field Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][subscription_email_field_label]"  value="<?php echo isset($ecs_settings[ 'component' ][ 'subscription_email_field_label' ]) ? esc_attr($ecs_settings[ 'component' ][ 'subscription_email_field_label' ]) : ''; ?>" placeholder="<?php _e('Email Address', 'everest-coming-soon-lite'); ?>" class="ecs-settings-field"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Subscribe Button Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][subscribe_button_label]" value="<?php echo isset($ecs_settings[ 'component' ][ 'subscribe_button_label' ]) ? esc_attr($ecs_settings[ 'component' ][ 'subscribe_button_label' ]) : ''; ?>" placeholder="<?php _e('Subscribe', 'everest-coming-soon-lite'); ?>" class="ecs-settings-field"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Subscriber Required Message', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][subscribe_required_message]" value="<?php echo isset($ecs_settings[ 'component' ][ 'subscribe_required_message' ]) ? esc_attr($ecs_settings[ 'component' ][ 'subscribe_required_message' ]) : ''; ?>" placeholder="<?php _e('Please enter email', 'everest-coming-soon-lite'); ?>" class="ecs-settings-field"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Subscription Success Message', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][subscription_success_message]" value="<?php echo isset($ecs_settings[ 'component' ][ 'subscription_success_message' ]) ? esc_attr($ecs_settings[ 'component' ][ 'subscription_success_message' ]) : ''; ?>" placeholder="<?php _e('Subscription successful!', 'everest-coming-soon-lite'); ?>" class="ecs-settings-field"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Email already available Message', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][email_available]" value="<?php echo isset($ecs_settings[ 'component' ][ 'email_available' ]) ? esc_attr($ecs_settings[ 'component' ][ 'email_available' ]) : ''; ?>" placeholder="<?php _e('Email already available', 'everest-coming-soon-lite'); ?>" class="ecs-settings-field"/>
                </div>
            </div>
        </div>
    </div>
    <div class="ecs-postbox" data-postbox-ref="social-network" style="display:none;">
        <button type="button" class="ecs-toggle-postbox ecs-up-toggle"><span class="ecs-toggle-indicator"></span></button>
        <h3><?php _e('Social Network Section', 'everest-coming-soon-lite'); ?></h3>
        <div class="ecs-postbox-inner">
            <div class="ecs-field-wrap">
                <label><?php _e('Social Network Title', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][social_network_title]" value="<?php echo isset($ecs_settings[ 'component' ][ 'social_network_title' ]) ? esc_attr($ecs_settings[ 'component' ][ 'social_network_title' ]) : ''; ?>" placeholder="<?php _e('Connect with us', 'everest-coming-soon-lite'); ?>" class="ecs-settings-field"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Social Network Short Description', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <?php wp_editor(isset($ecs_settings[ 'component' ][ 'social_network_short_description' ]) ? $ecs_settings[ 'component' ][ 'social_network_short_description' ] : '', 'ecs-social-network-short-description', array( 'textarea_name' => 'settings[component][social_network_short_description]', 'media_buttons' => false, 'textarea_rows' => 20, 'editor_class' => 'ecs-settings-field' )); ?>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Social Networks', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <ul class="ecs-social-network-lists ecs-sortable">
                        <li><span class="ecs-network-title"><?php _e('Facebook', 'everest-coming-soon-lite'); ?></span><input type="text" name="settings[component][social_networks][facebook]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'social_networks' ][ 'facebook' ]) ? esc_attr($ecs_settings[ 'component' ][ 'social_networks' ][ 'facebook' ]) : ''; ?>"/></li>
                        <li><span class="ecs-network-title"><?php _e('Twitter', 'everest-coming-soon-lite'); ?></span><input type="text" name="settings[component][social_networks][twitter]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'social_networks' ][ 'twitter' ]) ? esc_attr($ecs_settings[ 'component' ][ 'social_networks' ][ 'twitter' ]) : ''; ?>"/></li>
                        <li><span class="ecs-network-title"><?php _e('Pinterest', 'everest-coming-soon-lite'); ?></span><input type="text" name="settings[component][social_networks][pinterest]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'social_networks' ][ 'pinterest' ]) ? esc_attr($ecs_settings[ 'component' ][ 'social_networks' ][ 'pinterest' ]) : ''; ?>"/></li>
                        <li><span class="ecs-network-title"><?php _e('Linkedin', 'everest-coming-soon-lite'); ?></span><input type="text" name="settings[component][social_networks][linkedin]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'social_networks' ][ 'linkedin' ]) ? esc_attr($ecs_settings[ 'component' ][ 'social_networks' ][ 'linkedin' ]) : ''; ?>"/></li>
                        <li><span class="ecs-network-title"><?php _e('Google Plus', 'everest-coming-soon-lite'); ?></span><input type="text" name="settings[component][social_networks][google-plus]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'social_networks' ][ 'google-plus' ]) ? esc_attr($ecs_settings[ 'component' ][ 'social_networks' ][ 'google-plus' ]) : ''; ?>"/></li>
                        <li><span class="ecs-network-title"><?php _e('Tumblr', 'everest-coming-soon-lite'); ?></span><input type="text" name="settings[component][social_networks][tumblr]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'social_networks' ][ 'tumblr' ]) ? esc_attr($ecs_settings[ 'component' ][ 'social_networks' ][ 'tumblr' ]) : ''; ?>"/></li>
                        <li><span class="ecs-network-title"><?php _e('Instagram', 'everest-coming-soon-lite'); ?></span><input type="text" name="settings[component][social_networks][instagram]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'social_networks' ][ 'instagram' ]) ? esc_attr($ecs_settings[ 'component' ][ 'social_networks' ][ 'instagram' ]) : ''; ?>"/></li>
                        <li><span class="ecs-network-title"><?php _e('Youtube', 'everest-coming-soon-lite'); ?></span><input type="text" name="settings[component][social_networks][youtube]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'social_networks' ][ 'youtube' ]) ? esc_attr($ecs_settings[ 'component' ][ 'social_networks' ][ 'youtube' ]) : ''; ?>"/></li>
                        <li><span class="ecs-network-title"><?php _e('VK', 'everest-coming-soon-lite'); ?></span><input type="text" name="settings[component][social_networks][vk]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'social_networks' ][ 'vk' ]) ? esc_attr($ecs_settings[ 'component' ][ 'social_networks' ][ 'vk' ]) : ''; ?>"/></li>
                        <li><span class="ecs-network-title"><?php _e('Vine', 'everest-coming-soon-lite'); ?></span><input type="text" name="settings[component][social_networks][vine]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'social_networks' ][ 'vine' ]) ? esc_attr($ecs_settings[ 'component' ][ 'social_networks' ][ 'vine' ]) : ''; ?>"/></li>
                        <li><span class="ecs-network-title"><?php _e('Flickr', 'everest-coming-soon-lite'); ?></span><input type="text" name="settings[component][social_networks][flickr]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'social_networks' ][ 'flickr' ]) ? esc_attr($ecs_settings[ 'component' ][ 'social_networks' ][ 'flickr' ]) : ''; ?>"/></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="ecs-postbox" data-postbox-ref="contact-us" style="display:none;">
        <button type="button" class="ecs-toggle-postbox ecs-up-toggle"><span class="ecs-toggle-indicator"></span></button>
        <h3><?php _e('Contact Us Section', 'everest-coming-soon-lite'); ?></h3>
        <div class="ecs-postbox-inner">
            <div class="ecs-field-wrap">
                <label><?php _e('Contact Us Title', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][contact_us_title]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'contact_us_title' ]) ? esc_attr($ecs_settings[ 'component' ][ 'contact_us_title' ]) : ''; ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Contact Us Description', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <?php wp_editor(isset($ecs_settings[ 'component' ][ 'contact_us_description' ]) ? $ecs_settings[ 'component' ][ 'contact_us_description' ] : '', 'ecs-contact-us-description', array( 'textarea_name' => 'settings[component][contact_us_description]', 'media_buttons' => false, 'textarea_rows' => 20, 'editor_class' => 'ecs-settings-field' )); ?>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Name Field Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][name_field_label]" class="ecs-settings-field" placeholder="<?php _e('Your Name', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'name_field_label' ]) ? esc_attr($ecs_settings[ 'component' ][ 'name_field_label' ]) : ''; ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Email Field Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][email_field_label]" class="ecs-settings-field" placeholder="<?php _e('Your Email', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'email_field_label' ]) ? esc_attr($ecs_settings[ 'component' ][ 'email_field_label' ]) : ''; ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Message Field Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][message_field_label]" class="ecs-settings-field" placeholder="<?php _e('Your Message', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'message_field_label' ]) ? esc_attr($ecs_settings[ 'component' ][ 'message_field_label' ]) : ''; ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Submit Button Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][submit_button_label]" class="ecs-settings-field" placeholder="<?php _e('Send Email', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'submit_button_label' ]) ? esc_attr($ecs_settings[ 'component' ][ 'submit_button_label' ]) : ''; ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Required Message', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][required_message]" class="ecs-settings-field" placeholder="<?php _e('This field is required', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'required_message' ]) ? esc_attr($ecs_settings[ 'component' ][ 'required_message' ]) : ''; ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Success Message', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][success_message]" class="ecs-settings-field" placeholder="<?php _e('Email sent successfully!', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'success_message' ]) ? esc_attr($ecs_settings[ 'component' ][ 'success_message' ]) : ''; ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Contact Email Subject', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][contact_email_subject]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'contact_email_subject' ]) ? esc_attr($ecs_settings[ 'component' ][ 'contact_email_subject' ]) : ''; ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Contact Message', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <textarea name="settings[component][contact_message]" class="ecs-settings-field"><?php echo isset($ecs_settings[ 'component' ][ 'contact_message' ]) ? esc_attr($ecs_settings[ 'component' ][ 'contact_message' ]) : ''; ?></textarea>
                    <p class="description"><?php _e('Please use #name, #email, #message for including name, email and message received from contact form', 'everest-coming-soon-lite'); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="ecs-postbox" data-postbox-ref="get-in-touch" style="display:none;">
        <button type="button" class="ecs-toggle-postbox ecs-up-toggle"><span class="ecs-toggle-indicator"></span></button>
        <h3><?php _e('Get In Touch Section', 'everest-coming-soon-lite'); ?></h3>
        <div class="ecs-postbox-inner">
            <div class="ecs-field-wrap">
                <label><?php _e('Get In Touch Title', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field"><input type="text" name="settings[component][get_in_touch_title]" placeholder="<?php _e('Get In Touch', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'get_in_touch_title' ]) ? esc_attr($ecs_settings[ 'component' ][ 'get_in_touch_title' ]) : ''; ?>" class="ecs-settings-field"/></div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Get In Touch Description', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <?php wp_editor(isset($ecs_settings[ 'component' ][ 'get_in_touch_description' ]) ? $ecs_settings[ 'component' ][ 'get_in_touch_description' ] : '', 'ecs-get-in-touch-description', array( 'textarea_name' => 'settings[component][get_in_touch_description]', 'media_buttons' => false, 'textarea_rows' => 20, 'editor_class' => 'ecs-settings-field' )); ?>
                </div>
            </div>

        </div>
    </div>
    <div class="ecs-postbox" data-postbox-ref="quickinfo" style="display:none;">
        <button type="button" class="ecs-toggle-postbox ecs-up-toggle"><span class="ecs-toggle-indicator"></span></button>
        <h3><?php _e('Quick Info', 'everest-coming-soon-lite'); ?></h3>
        <div class="ecs-postbox-inner">
            <div class="ecs-field-wrap">
                <label><?php _e('Address Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field"><input type="text" name="settings[component][address_label]" class="ecs-settings-field" placeholder="<?php _e('Address', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'address_label' ]) ? esc_attr($ecs_settings[ 'component' ][ 'address_label' ]) : ''; ?>"/></div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Address Value', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][address_value]" class="ecs-settings-field" placeholder="220020 Belarus, Minsk, Pobeditelei, 24" value="<?php echo isset($ecs_settings[ 'component' ][ 'address_value' ]) ? esc_attr($ecs_settings[ 'component' ][ 'address_value' ]) : ''; ?>"/>

                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Phone Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][phone_label]" class="ecs-settings-field" placeholder="<?php _e('Phone', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'phone_label' ]) ? esc_attr($ecs_settings[ 'component' ][ 'phone_label' ]) : ''; ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Phone Value', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][phone_value]" class="ecs-settings-field" placeholder="<?php _e('1 384-384-3843', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'phone_value' ]) ? esc_attr($ecs_settings[ 'component' ][ 'phone_value' ]) : ''; ?>"/>
                    <p class="description"><?php _e('Please use comma for multiple values and use #plus for + sign.', 'everest-coming-soon-lite'); ?></p>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Email Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field"><input type="text" name="settings[component][email_label]" class="ecs-settings-field" placeholder="<?php _e('Email', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'email_label' ]) ? esc_attr($ecs_settings[ 'component' ][ 'email_label' ]) : ''; ?>"/></div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Email Value', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][email_value]" class="ecs-settings-field" placeholder="<?php _e('info@mydomain.com', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'email_value' ]) ? esc_attr($ecs_settings[ 'component' ][ 'email_value' ]) : ''; ?>"/>
                    <p class="description"><?php _e('Please use comma for multiple values.', 'everest-coming-soon-lite'); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="ecs-postbox" data-postbox-ref="countdown" style="display:none;">
        <button type="button" class="ecs-toggle-postbox ecs-up-toggle"><span class="ecs-toggle-indicator"></span></button>
        <h3><?php _e('Countdown Timer Section', 'everest-coming-soon-lite'); ?></h3>
        <div class="ecs-postbox-inner">
            <div class="ecs-field-wrap">
                <label><?php _e('Countdown Title', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][countdown_title]" class="ecs-settings-field" value="<?php echo isset($ecs_settings[ 'component' ][ 'countdown_title' ]) ? esc_attr($ecs_settings[ 'component' ][ 'countdown_title' ]) : ''; ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Countdown Short Description', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <?php wp_editor(isset($ecs_settings[ 'component' ][ 'countdown_short_description' ]) ? $ecs_settings[ 'component' ][ 'countdown_short_description' ] : '', 'ecs-countdown-short-description', array( 'textarea_name' => 'settings[component][countdown_short_description]', 'media_buttons' => false, 'textarea_rows' => 20, 'editor_class' => 'ecs-settings-field' )); ?>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Countdown Expiry date', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[component][countdown_expiry_date]" class="ecs-settings-field ecs-datepicker" value="<?php echo isset($ecs_settings[ 'component' ][ 'countdown_expiry_date' ]) ? esc_attr($ecs_settings[ 'component' ][ 'countdown_expiry_date' ]) : ''; ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Days Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field"><input type="text" name="settings[component][days_label]" class="ecs-settings-field" placeholder="<?php _e('days', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'days_label' ]) ? esc_attr($ecs_settings[ 'component' ][ 'days_label' ]) : ''; ?>"/></div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Hour Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field"><input type="text" name="settings[component][hour_label]" class="ecs-settings-field" placeholder="<?php _e('Hour', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'hour_label' ]) ? esc_attr($ecs_settings[ 'component' ][ 'hour_label' ]) : ''; ?>"/></div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Minute Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field"><input type="text" name="settings[component][minute_label]" class="ecs-settings-field" placeholder="<?php _e('Min', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'minute_label' ]) ? esc_attr($ecs_settings[ 'component' ][ 'minute_label' ]) : ''; ?>"/></div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Second Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field"><input type="text" name="settings[component][second_label]" class="ecs-settings-field" placeholder="<?php _e('Sec', 'everest-coming-soon-lite'); ?>" value="<?php echo isset($ecs_settings[ 'component' ][ 'second_label' ]) ? esc_attr($ecs_settings[ 'component' ][ 'second_label' ]) : ''; ?>"/></div>
            </div>
        </div>
    </div>




</div>