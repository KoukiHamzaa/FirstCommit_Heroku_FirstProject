<?php
defined('ABSPATH') or die('No script kiddies please!');

if ( !class_exists('ECSL_Admin_Enqueue') ) {

    class ECSL_Admin_Enqueue {

        function __construct() {
            add_action('admin_enqueue_scripts', array( $this, 'register_backend_assets' ));
        }

        function register_backend_assets() {
            $valid_pages = array( 'everest-coming-soon-lite', 'ecs-subscribers', 'ecs-how-to-use', 'ecs-about' );
            if ( isset($_GET[ 'page' ]) && in_array($_GET[ 'page' ], $valid_pages) ) {
                $ajax_nonce = wp_create_nonce('ecs_ajax_nonce');
                $ecs_js_strings = array(
                    'ajax_notice' => __('Please wait', 'everest-coming-soon-lite'),
                    'restore_confirm' => __('Are you sure you want to restore default settings?', 'everest-coming-soon-lite')
                );
                $ecs_js_object_array = array(
                    'ajax_url' => admin_url('admin-ajax.php'),
                    'strings' => $ecs_js_strings,
                    'ajax_nonce' => $ajax_nonce,
                    'plugin_url' => ECSL_URL
                );
                wp_enqueue_media();
                wp_enqueue_style('ecs-fontawesome-style', ECSL_CSS_DIR . 'font-awesome.min.css', array(), ECSL_VERSION);
                wp_enqueue_style('ecs-jqueryui-style', ECSL_CSS_DIR . 'jquery-ui.min.css', array(), ECSL_VERSION);
                wp_enqueue_style('ecs-backend-style', ECSL_CSS_DIR . 'ecs-backend-style.css', array(), ECSL_VERSION);
                wp_enqueue_script('ecs-backend-script', ECSL_JS_DIR . 'ecs-backend-script.js', array( 'jquery', 'jquery-ui-sortable', 'jquery-ui-datepicker' ), ECSL_VERSION);
                wp_localize_script('ecs-backend-script', 'ecs_backend_js_object', $ecs_js_object_array);
            }
        }

    }

    new ECSL_Admin_Enqueue();
}