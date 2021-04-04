<div class= "ecs-settings-container">
<div class="wrap ecs-main-wrap">
    <div class="ecs-head ecs-clearfix">
        <img src="<?php echo esc_attr(ECSL_IMG_DIR) . '/logo.png'; ?>" />
        <h3><?php _e('Settings', 'everest-coming-soon-lite'); ?></h3>
    </div>
    <h2 class="nav-tab-wrapper wp-clearfix">
        <a href="javascript:void(0);" class="nav-tab nav-tab-active ecs-tab-trigger" data-settings-tab="general"><?php _e('General Settings', 'everest-coming-soon-lite'); ?></a>
        <a href="javascript:void(0);" class="nav-tab ecs-tab-trigger" data-settings-tab="template"><?php _e('Template Settings', 'everest-coming-soon-lite'); ?></a>
        <a href="javascript:void(0);" class="nav-tab ecs-tab-trigger" data-settings-tab="components"><?php _e('Components Settings', 'everest-coming-soon-lite'); ?></a>
        <a href="https://accesspressthemes.com/wordpress-plugins/everest-coming-soon/" class="nav-tab" target="_blank"><?php _e('Upgrade to PRO', 'everest-coming-soon-lite'); ?></a>
    </h2>
    <div class="ecs-settings-wrap">
        <?php
        global $ecs_settings;
        /**
         * General Section
         *
         */
        include(ECSL_PATH . 'inc/views/backend/boards/general-settings.php');

        /**
         * Templates Section
         *
         */
        include(ECSL_PATH . 'inc/views/backend/boards/template-settings.php');

        /**
         * Components Section
         *
         */
        include(ECSL_PATH . 'inc/views/backend/boards/components-settings.php');
        
        ?>
    </div>
    <div class="ecs-form-actions">
        <a href="javascript:void(0);" id="ecs-save-settings-trigger"><i class="fa fa-floppy-o" aria-hidden="true"></i><span><?php _e('Save Settings', 'everest-coming-soon-lite'); ?></span></a>
        <a href="javascript:void(0);" id="ecs-restore-settings-trigger"><i class="fa fa-rotate-left" aria-hidden="true"></i><span><?php _e('Restore Settings', 'everest-coming-soon-lite'); ?></span></a>
    </div>
    <div class="ecs-notice-head">
        <p class="ecs-wait-message" style="display:none;"><img src="<?php echo esc_attr(ECSL_IMG_DIR) . '/backend-ajax-loader.gif'; ?>"/> <?php _e('Please wait...', 'everest-coming-soon-lite'); ?></p>
        <p class="ecs-success-message" style="display: none;"></p>
    </div>
</div>
<div class="ecs-upgrade-wrapper">
        <a href="<?php echo esc_url(ECS_PRO_LINK); ?>" target="_blank">
            <img src="<?php echo esc_attr(ECSL_IMG_DIR) . '/upgrade-to-pro/upgrade-to-pro.png' ?>" style="width:100%;">
        </a>

        <div class="ecs-upgrade-button-wrap-backend">

            <a href="<?php echo esc_attr(ECS_PRO_DEMO); ?>" class="smls-demo-btn" target="_blank"><?php _e( 'Demo', 'everest-coming-soon-lite'); ?></a>

            <a href="<?php echo esc_url(ECS_PRO_LINK); ?>" target="_blank" class="smls-upgrade-btn"><?php _e( 'Upgrade', 'everest-coming-soon-lite'); ?></a>

            <a href="<?php echo esc_attr(ECS_PRO_DETAIL); ?>" target="_blank" class="smls-upgrade-btn"><?php _e( 'Plugin Information', 'everest-coming-soon-lite'); ?></a>

        </div>

        <a href="<?php echo esc_url(ECS_PRO_LINK); ?>" target="_blank">
            <img src="<?php echo esc_attr(ECSL_IMG_DIR); ?>upgrade-to-pro/upgrade-to-pro-feature.png" alt="<?php _e( 'Everest Coming Soon', 'everest-coming-soon-lite' ); ?>" style="width:100%;">
        </a>
    </div>
</div>