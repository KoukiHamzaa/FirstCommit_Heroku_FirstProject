<div class="ecs-sub-settings-wrap" id="ecs-template-section" style="display:none;">
    <div class="ecs-postbox">
        <div class="ecs-field-wrap">
            <label><?php _e('Coming Soon Template', 'everest-coming-soon-lite'); ?></label>
            <div class="ecs-field">
                <select name="settings[template][coming_soon_template]" class="ecs-settings-field ecs-template-switch">
                    <?php
                    $coming_soon_template = isset($ecs_settings[ 'template' ][ 'coming_soon_template' ]) ? esc_attr($ecs_settings[ 'template' ][ 'coming_soon_template' ]) : 1;
                    $total_templates = 2;
                    for ( $i = 1; $i <= $total_templates; $i++ ) {
                        ?>
                        <option value="<?php echo $i; ?>" <?php selected($coming_soon_template, $i); ?>><?php _e('Template', 'everest-coming-soon-lite'); ?> <?php echo $i; ?></option>
                        <?php
                    }
                    ?>
                </select>
                <div class="ecs-template-preview">
                    <?php for ( $i = 1; $i <= $total_templates; $i++ ) {
                        ?>
                        <a href="<?php echo esc_attr(ECSL_IMG_DIR) . 'templates/template-' . $i . '.jpg'; ?>" target="_blank" <?php if ( $coming_soon_template != $i ) { ?>style="display:none;"<?php } ?> data-template-id="<?php echo $i; ?>"><img src="<?php echo esc_attr(ECSL_IMG_DIR) . 'templates/template-' . $i . '.jpg'; ?>"/></a>
                        <?php
                    }
                    ?>
                </div>
                <p class="description"><?php _e('Please click on the image to view the detailed preview in new window', 'everest-coming-soon-lite'); ?></p>
            </div>
        </div>
    </div>
    <div class="ecs-postbox" data-template-id="1" <?php $this->eg_display_none($coming_soon_template, 1); ?>>
        <button type="button" class="ecs-toggle-postbox ecs-up-toggle"><span class="ecs-toggle-indicator"></span></button>
        <h3><?php _e('Template 1 Configurations', 'everest-coming-soon-lite'); ?></h3>
        <div class="ecs-postbox-inner">
            <div class="ecs-field-wrap">
                <label><?php _e('Background Image', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[template][template_1][background_image]" class="ecs-settings-field" value="<?php echo (isset($ecs_settings[ 'template' ][ 'template_1' ][ 'background_image' ])) ? esc_url($ecs_settings[ 'template' ][ 'template_1' ][ 'background_image' ]) : ''; ?>"/>
                    <input type="button" class="button-secondary ecs-file-upload" value="<?php _e('Upload Image', 'everest-coming-soon-lite'); ?>" data-button-label='<?php _e('Insert Image', 'everest-coming-soon-lite'); ?>' data-window-title='<?php _e('Choose Image', 'everest-coming-soon-lite'); ?>'/>
                    <div class="ecs-image-preview"></div>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('More Information Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[template][template_1][more_information_label]" value="<?php echo (isset($ecs_settings[ 'template' ][ 'template_1' ][ 'more_information_label' ])) ? esc_attr($ecs_settings[ 'template' ][ 'template_1' ][ 'more_information_label' ]) : ''; ?>" class="ecs-settings-field" placeholder="<?php _e('More Information', 'everest-coming-soon-lite'); ?>"/>
                </div>
            </div>
        </div>
    </div>
    <div class="ecs-postbox" data-template-id="2" <?php $this->eg_display_none($coming_soon_template, 2); ?>>
        <button type="button" class="ecs-toggle-postbox ecs-up-toggle"><span class="ecs-toggle-indicator"></span></button>
        <h3><?php _e('Template 2 Configurations', 'everest-coming-soon-lite'); ?></h3>
        <div class="ecs-postbox-inner">
            <div class="ecs-field-wrap">
                <label><?php _e('Notify Us Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[template][template_2][notify_us_label]" value="<?php echo isset($ecs_settings[ 'template' ][ 'template_2' ][ 'notify_us_label' ]) ? esc_attr($ecs_settings[ 'template' ][ 'template_2' ][ 'notify_us_label' ]) : '' ?>" class="ecs-settings-field" placeholder="<?php _e('Notify Us', 'everest-coming-soon-lite'); ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Information Label', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[template][template_2][information_label]" value="<?php echo isset($ecs_settings[ 'template' ][ 'template_2' ][ 'information_label' ]) ? esc_attr($ecs_settings[ 'template' ][ 'template_2' ][ 'information_label' ]) : '' ?>" class="ecs-settings-field" placeholder="<?php _e('Information', 'everest-coming-soon-lite'); ?>"/>
                </div>
            </div>
            <div class="ecs-field-wrap">
                <label><?php _e('Background Image', 'everest-coming-soon-lite'); ?></label>
                <div class="ecs-field">
                    <input type="text" name="settings[template][template_2][background_image]" value="<?php echo isset($ecs_settings[ 'template' ][ 'template_2' ][ 'background_image' ]) ? esc_attr($ecs_settings[ 'template' ][ 'template_2' ][ 'background_image' ]) : '' ?>" class="ecs-settings-field"/>
                    <input type="button" class="button-secondary ecs-file-upload" value="<?php _e('Upload Image', 'everest-coming-soon-lite'); ?>" data-button-label='<?php _e('Insert Image', 'everest-coming-soon-lite'); ?>' data-window-title='<?php _e('Choose Image', 'everest-coming-soon-lite'); ?>'/>
                    <div class="ecs-image-preview"></div>
                </div>
            </div>
        </div>
    </div>

</div>
