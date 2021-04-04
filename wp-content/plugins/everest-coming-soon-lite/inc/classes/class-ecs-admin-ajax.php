<?php
defined('ABSPATH') or die('No script kiddies please!!');

if ( !class_exists('ECSL_Admin_Ajax') ) {

    class ECSL_Admin_Ajax extends ECSL_Library {

        function __construct() {
            /**
             * Settings Save
             */
            add_action('wp_ajax_ecs_settings_save_action', array( $this, 'save_settings' ));
            add_action('wp_ajax_nopriv_ecs_settings_save_action', array( $this, 'permission_denied' ));

            /**
             * Restore Default Settings
             */
            add_action('wp_ajax_ecs_restore_settings_action', array( $this, 'restore_settings' ));
            add_action('wp_ajax_nopriv_ecs_restore_settings_action', array( $this, 'permission_denied' ));
        }

        function save_settings() {
            if ( !empty($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'ecs_ajax_nonce') ) {
                $response = array();
                $_POST = array_map('stripslashes_deep', $_POST);
                parse_str(($_POST[ 'posted_values' ]), $received_data);
//                echo "<pre>";
//                print_r($received_data);
//                die();
                $sanitize_rule = array( 'custom_css' => 'html', 'phone_value' => 'no' );
                $received_data = $this->sanitize_array($received_data, $sanitize_rule);
                update_option('ecs_settings', $received_data[ 'settings' ]);
                echo json_encode(array( 'message' => __('Settings saved successfully!', 'everest-coming-soon-lite') ));
                die();
            } else {
                $this->permission_denied();
            }
        }

        function restore_settings() {
            if ( !empty($_POST[ '_wpnonce' ]) && wp_verify_nonce($_POST[ '_wpnonce' ], 'ecs_ajax_nonce') ) {
                $default_settings = $this->get_default_settings();
                update_option('ecs_settings', $default_settings);
                echo json_encode(array( 'message' => __('Settings restored successfully.Reloading..', 'everest-coming-soon-lite') ));
                die();
            } else {
                $this->permission_denied();
            }
        }

    }

    new ECSL_Admin_Ajax();
}
