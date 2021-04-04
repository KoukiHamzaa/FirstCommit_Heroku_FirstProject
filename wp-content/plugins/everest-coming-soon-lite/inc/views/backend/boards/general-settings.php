<div class="ecs-sub-settings-wrap" id="ecs-general-section">
    <div class="ecs-field-wrap">
        <label><?php _e('Maintenance Mode', 'everest-coming-soon-lite'); ?></label>
        <div class="ecs-field">
            <input type="checkbox" name="settings[general][maintenance_mode]" value="1" class="ecs-settings-field" <?php echo (isset($ecs_settings[ 'general' ][ 'maintenance_mode' ])) ? 'checked="checked"' : ''; ?>/>
            <p class="description"><?php _e('Please check if you want to enable the maintenance mode', 'everest-coming-soon-lite'); ?></p>
        </div>
    </div>
    <div class="ecs-field-wrap">
        <label><?php _e('Site Title', 'everest-coming-soon-lite'); ?></label>
        <div class="ecs-field">
            <input type="text" name="settings[general][site_title]" class="ecs-settings-field" value="<?php echo (isset($ecs_settings[ 'general' ][ 'site_title' ])) ? esc_attr($ecs_settings[ 'general' ][ 'site_title' ]) : ''; ?>"/>
        </div>
    </div>
    <div class="ecs-field-wrap">
        <label><?php _e('Meta Tag Name', 'everest-coming-soon-lite'); ?></label>
        <div class="ecs-field">
            <input type="text" name="settings[general][meta_tag_name]" class="ecs-settings-field" value="<?php echo (isset($ecs_settings[ 'general' ][ 'meta_tag_name' ])) ? esc_attr($ecs_settings[ 'general' ][ 'meta_tag_name' ]) : ''; ?>"/>
        </div>
    </div>
    <div class="ecs-field-wrap">
        <label><?php _e('Meta Tag Content', 'everest-coming-soon-lite'); ?></label>
        <div class="ecs-field">
            <textarea name="settings[general][meta_tag_content]" class="ecs-settings-field"><?php echo (isset($ecs_settings[ 'general' ][ 'meta_tag_content' ])) ? esc_attr($ecs_settings[ 'general' ][ 'meta_tag_content' ]) : ''; ?></textarea>
        </div>
    </div>
    <div class="ecs-field-wrap">
        <label><?php _e('Favicon', 'everest-coming-soon-lite'); ?></label>
        <div class="ecs-field">
            <input type="text" name="settings[general][favicon]" class="ecs-settings-field" value="<?php echo (isset($ecs_settings[ 'general' ][ 'favicon' ])) ? esc_attr($ecs_settings[ 'general' ][ 'favicon' ]) : ''; ?>"/>
            <input type="button" class="ecs-file-upload button-secondary" value="<?php _e('Upload', 'everest-coming-soon-lite'); ?>" data-button-label='<?php _e('Insert Image', 'everest-coming-soon-lite'); ?>' data-window-title='<?php _e('Choose Image', 'everest-coming-soon-lite'); ?>'>
            <div class="ecs-image-preview"></div>
        </div>
    </div>
    <div class="ecs-field-wrap">
        <label><?php _e('Hide from Search Engines', 'everest-coming-soon-lite'); ?></label>
        <div class="ecs-field">
            <input type="checkbox" name="settings[general][hide_search]" value="1"  class="ecs-settings-field" <?php echo (isset($ecs_settings[ 'general' ][ 'hide_search' ])) ? 'checked="checked"' : ''; ?>/>
            <p class="description"><?php _e('Please check if you want to disable the crawling of the site from search engines', 'everest-coming-soon-lite'); ?></p>
        </div>
    </div>
    <div class="ecs-field-wrap">
        <label><?php _e('Email - From Name', 'everest-coming-soon-lite'); ?></label>
        <div class="ecs-field">
            <input type="text" name="settings[general][email_from_name]" class="ecs-settings-field" value="<?php echo (isset($ecs_settings[ 'general' ][ 'email_from_name' ])) ? esc_attr($ecs_settings[ 'general' ][ 'email_from_name' ]) : ''; ?>"/>
            <p class="description"><?php _e('This detail will be used while sending the email such as contact email or subscriber confirmation email', 'everest-coming-soon-lite'); ?></p>
        </div>
    </div>
    <div class="ecs-field-wrap">
        <label><?php _e('Email - From Email', 'everest-coming-soon-lite'); ?></label>
        <div class="ecs-field">
            <input type="text" name="settings[general][email_from_email]" class="ecs-settings-field" value="<?php echo (isset($ecs_settings[ 'general' ][ 'email_from_email' ])) ? esc_attr($ecs_settings[ 'general' ][ 'email_from_email' ]) : ''; ?>"/>
            <p class="description"><?php _e('This detail will be used while sending the email such as contact email or subscriber confirmation email', 'everest-coming-soon-lite'); ?></p>
        </div>
    </div>
</div>