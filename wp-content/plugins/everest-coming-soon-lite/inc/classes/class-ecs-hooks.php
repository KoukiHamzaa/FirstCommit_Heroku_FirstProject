<?php
defined('ABSPATH') or die('No script kiddies please!!');

if ( !class_exists('ECSL_Hooks') ) {

    class ECSL_Hooks extends ECSL_Library {

        function __construct() {
            add_action('init', array( $this, 'load_plugin_settings' ));
            add_action('template_redirect', array( $this, 'coming_soon' ));
            add_action('plugins_loaded', array( $this, 'register_textdomain' ));
            /**
             * Coming Soon Mode On Notice
             */
            add_action('admin_bar_menu', array( $this, 'custom_toolbar_link' ), 999);

            /**
             * Admin Head Hook for custom style
             */
            add_action('admin_head', array( $this, 'custom_style' ));

            /**
             * Export Subscribers
             */
            add_action('admin_post_ecs_export_subscriber', array( $this, 'export_subscribers' ));
        }

        /**
         * Load Plugin Textdomain
         *
         * @since 1.0.0
         */
        function register_textdomain() {
            load_plugin_textdomain('everest-coming-lite', false, ECSL_PATH . '/languages');
        }

        function load_plugin_settings() {
            $settings = get_option('ecs_settings');
            if ( empty($settings) ) {
                $settings = ECSL_Library::get_default_settings();
            }
            $GLOBALS[ 'ecs_settings' ] = $settings;
        }

        function coming_soon() {
            global $ecs_settings;
            /**
             * If maintenance mode is enabled
             */
            if ( is_user_logged_in() ) {
                $disable_roles = apply_filters('ecsl_disabled_roles', array( 'administrator' ));
                $current_user = wp_get_current_user();
                $role = $current_user->roles[ 0 ];
                /**
                  If maintenance mode is disabled for current user role
                 *
                 */
                if ( in_array($role, $disable_roles) ) {
                    return;
                }
            }
            if ( !empty($ecs_settings[ 'general' ][ 'maintenance_mode' ]) ) {
                include(ECSL_PATH . 'inc/views/frontend/coming-soon.php');
                die();
            }
        }

        /**
         * Coming Soon Notice
         */
        function custom_toolbar_link($wp_admin_bar) {
            global $ecs_settings;
            $status = (isset($ecs_settings[ 'general' ][ 'maintenance_mode' ])) ? $ecs_settings[ 'general' ][ 'maintenance_mode' ] : 0;
            $maintenance_status = ($status == 0) ? __('Coming Soon Mode Off', '8degree-maintenance') : __('Coming Soon Mode On', '8degree-maintenance');
            $args = array(
                'id' => 'edmm-coming-soon-notice',
                'title' => $maintenance_status,
                'href' => admin_url('admin.php?page=everest-coming-soon-lite'),
                'meta' => array(
                    'class' => 'edmm-coming-soon-notice',
                    'title' => __('Coming Soon Mode On', '8degree-maintenance')
                )
            );
            $wp_admin_bar->add_node($args);
        }

        /*
         *  Admin Hook for custom style
         */

        function custom_style() {
            global $ecs_settings;
            $status = (isset($ecs_settings[ 'general' ][ 'maintenance_mode' ])) ? $ecs_settings[ 'general' ][ 'maintenance_mode' ] : 0;
            if ( $status == 1 ) {
                echo "<style>";
                echo "li#wp-admin-bar-edmm-coming-soon-notice > a {background: #d02626;}";
                echo "</style>";
            }
        }

        /**
         * Export Subscribers
         */
        function export_subscribers() {
            if ( !empty($_GET[ '_wpnonce' ]) && wp_verify_nonce($_GET[ '_wpnonce' ], 'ecs_export_nonce') ) {
                global $wpdb;
                $table_name = $wpdb->prefix . 'ecs_subscribers';
                header("Content-type: application/force-download");
                header('Content-Disposition: inline; filename="subscribers' . date('YmdHis') . '.csv"');
                $results = $wpdb->get_results("SELECT * FROM $table_name");
                echo "Email\r\n";
                if ( count($results) ) {
                    foreach ( $results as $row ) {
                        echo $row->email . "\r\n";
                    }
                }
            } else {
                $this->permission_denied();
            }
        }

    }

    new ECSL_Hooks();
}

