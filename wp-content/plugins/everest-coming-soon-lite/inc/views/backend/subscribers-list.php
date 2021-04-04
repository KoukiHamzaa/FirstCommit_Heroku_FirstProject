<div class= "ecs-settings-container">
<div class="wrap ecs-main-wrap">
    <div class="ecs-head ecs-clearfix">
        <img src="<?php echo esc_attr(ECSL_IMG_DIR) . '/logo.png'; ?>" />
        <h3><?php _e('Subscribers', 'everest-coming-soon-lite'); ?></h3>
    </div>
    <?php
    if ( isset($_POST[ 'remove_subs' ]) ) {
        global $wpdb;
        $si_id = array_map('intval', $_POST[ 'rem' ]);
        $table_name = $wpdb->prefix . 'ecs_subscribers';
        if ( !$si_id == '' ) {
            foreach ( $si_id as $id ) {
                $wpdb->delete($table_name, array( 'subscriber_id' => $id ), array( '%d' ));
            }
        }
    }
    ?>

    <form method="post" action="">
        <div class="ecs-panel-body">
            <h2><?php _e('Subscribers', 'everest-coming-soon-lite'); ?></h2>
            <div class="ecs-subscribe-actions">
                <input type="submit" class="button-secondary" name="remove_subs" id="remove-sub" value="<?php _e('Remove Subscribers', 'everest-coming-soon-lite'); ?>" onclick="return confirm('<?php _e('Are you sure you want to delete?', 'everest-coming-soon-lite'); ?>')" />
                <a class="button" href="<?php echo admin_url('admin-post.php?action=ecs_export_subscriber&_wpnonce=' . wp_create_nonce('ecs_export_nonce')); ?>"><?php _e('Export as CSV', 'everest-coming-soon-lite') ?></a>
            </div>
            <table class="wp-list-table widefat fixed">
                <thead>
                    <tr>
                        <th>
                            <label><input type="checkbox" name="checkall_sub" value="1" id="ecs-checkall" /></label>
                        </th>
                        <th>
                            <span><?php _e('Email', 'everest-coming-soon-lite'); ?></span>
                        </th>
                    </tr>
                </thead>
                <?php
                global $wpdb;
                $table_name = $wpdb->prefix . 'ecs_subscribers';
                $user_sets = $wpdb->get_results("SELECT * FROM $table_name");
                ?>
                <tbody>
                    <?php
                    if ( count($user_sets) > 0 ) {

                        foreach ( $user_sets as $user_set ) {
                            ?>

                            <tr>
                                <td><input type="checkbox" name="rem[]" class="ecs-select-subs" value="<?php echo esc_js(esc_html($user_set->subscriber_id)); ?>"></td>
                                <td><?php echo $user_set->email; ?></td>

                            </tr>

                            <?php
                        }
                    } else {
                        ?>
                        <tr><td colspan="2"><div class="ecs-noresult"><?php _e('No Subscribers Found.', 'everest-coming-soon-lite'); ?></div></td></tr>
                            <?php 
                    } ?>
            </table>
        </div>
    </form>
</div>
<div class="ecs-upgrade-wrapper">
        <a href="<?php echo esc_url(ECS_PRO_LINK); ?>" target="_blank">
            <img src="<?php echo esc_attr(ECSL_IMG_DIR) . '/upgrade-to-pro/upgrade-to-pro.png' ?>" style="width:100%;">
        </a>

        <div class="ecs-upgrade-button-wrap-backend">

            <a href="<?php echo esc_attr(ECS_PRO_DEMO); ?>" class="smls-demo-btn" target="_blank"><?php _e( 'Demo', 'everest-coming-soon-lite' ); ?></a>

            <a href="<?php echo esc_url(ECS_PRO_LINK); ?>" target="_blank" class="smls-upgrade-btn"><?php _e( 'Upgrade', 'everest-coming-soon-lite' ); ?></a>

            <a href="<?php echo esc_attr(ECS_PRO_DETAIL); ?>" target="_blank" class="smls-upgrade-btn"><?php _e( 'Plugin Information', 'everest-coming-soon-lite' ); ?></a>

        </div>

        <a href="<?php echo esc_url(ECS_PRO_LINK); ?>" target="_blank">
            <img src="<?php echo esc_attr(ECSL_IMG_DIR); ?>upgrade-to-pro/upgrade-to-pro-feature.png" alt="<?php _e( 'Everest Coming Soon', 'everest-coming-soon-lite' ); ?>" style="width:100%;">
        </a>
    </div>
</div>
