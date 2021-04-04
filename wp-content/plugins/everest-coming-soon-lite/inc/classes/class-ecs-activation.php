<?php
defined('ABSPATH') or die('No script kiddies please!!');

if ( !class_exists('ECSL_Activation') ) {

    class ECSL_Activation extends ECSL_Library {

        function __construct() {
            register_activation_hook(ECSL_PATH . 'everest-coming-soon-lite.php', array( $this, 'activation_tasks' ));
        }

        function activation_tasks() {
            if ( is_multisite() ) {
                global $wpdb;
                $current_blog = $wpdb->blogid;

                // Get all blogs in the network and activate plugin on each one
                $blog_ids = $wpdb->get_col("SELECT blog_id FROM $wpdb->blogs");
                foreach ( $blog_ids as $blog_id ) {
                    switch_to_blog($blog_id);

                    $this->create_necessary_tables();
                    $this->initial_plugin_settings();
                    restore_current_blog();
                }
            } else {
                $this->create_necessary_tables();
                $this->initial_plugin_settings();
            }
        }

        function create_necessary_tables() {
            global $wpdb;
            $table_name = $wpdb->prefix . 'ecs_subscribers';

            $charset_collate = $wpdb->get_charset_collate();

            $sql = "CREATE TABLE IF NOT EXISTS $table_name (
            subscriber_id int NOT NULL AUTO_INCREMENT,
            email VARCHAR(255) NOT NULL,
            PRIMARY KEY  (subscriber_id)
            ) $charset_collate;";

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }

        function initial_plugin_settings() {
            $ecs_settings = get_option('ecs_settings');
            if ( !$ecs_settings ) {
                $ecs_settings = $this->get_default_settings();
                update_option('ecs_settings', $ecs_settings);
            }
        }

    }

    new ECSL_Activation();
}

