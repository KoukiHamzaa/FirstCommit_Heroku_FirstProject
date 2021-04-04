<?php
defined('ABSPATH') or die('No script kiddies please!!');

if ( !class_exists('ECSL_Admin') ) {

    class ECSL_Admin extends ECSL_Library {

        function __construct() {
            add_action('admin_menu', array( $this, 'backend_menu' ));
            add_filter( 'plugin_row_meta', array( $this, 'ecs_plugin_row_meta' ), 10, 2 );
            add_filter( 'admin_footer_text', array( $this, 'ecs_admin_footer_text' ) );
            add_action( 'admin_init', array( $this, 'redirect_to_site' ), 1 );

        }
        function ecs_plugin_row_meta( $links, $file ){
            if ( strpos( $file, 'everest-coming-soon-lite.php' ) !== false ) {
                $new_links = array(
                    'demo' => '<a href="'.ECS_LITE_DEMO.'" target="_blank"><span class="dashicons dashicons-welcome-view-site"></span>Live Demo</a>',
                    'doc' => '<a href="'.ECS_LITE_DOC.'" target="_blank"><span class="dashicons dashicons-media-document"></span>Documentation</a>',
                    'support' => '<a href="http://accesspressthemes.com/support" target="_blank"><span class="dashicons dashicons-admin-users"></span>Support</a>',
                    'pro' => '<a href="'.ECS_PRO_LINK.'" target="_blank"><span class="dashicons dashicons-cart"></span>Premium version</a>'
                );
                $links = array_merge( $links, $new_links );
            }
            return $links;
        }

        function ecs_admin_footer_text( $text ){

            if (isset($_GET['page']) && $_GET['page'] === 'everest-coming-soon-lite' ) {
                $text = 'Enjoyed ' . ECS_LITE_PLUGIN_NAME . '? <a href="' . ECS_LITE_RATING . '" target="_blank">Please leave us a ★★★★★ rating</a> We really appreciate your support! | Try premium version <a href="' . ECS_PRO_LINK . '" target="_blank">' . ECS_PRO_PLUGIN_NAME . '</a> - more features, more power!';
                return $text;
            } else {
                return $text;
            }
        }


        function redirect_to_site(){

            if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'ecs-documentation' ) {
             wp_redirect( ECS_LITE_DOC );
             exit();
         }

         if ( isset( $_GET[ 'page' ] ) && $_GET[ 'page' ] == 'ecs-premium' ) {
             wp_redirect( ECS_PRO_LINK );
             exit();
         }
     }

     function backend_menu() {
        add_menu_page(__('Everest Coming Soon Lite', 'everest-coming-soon-lite'), __('Everest Coming Soon Lite', 'everest-coming-soon-lite'), 'manage_options', 'everest-coming-soon-lite', array( $this, 'main_settings_page' ), 'dashicons-clock');
        add_submenu_page('everest-coming-soon-lite', __('Settings', 'everest-coming-soon-lite'), __('Settings', 'everest-coming-soon-lite'), 'manage_options', 'everest-coming-soon-lite', array( $this, 'main_settings_page' ));
        add_submenu_page('everest-coming-soon-lite', __('Subscribers', 'everest-coming-soon-lite'), __('Subscribers', 'everest-coming-soon-lite'), 'manage_options', 'ecs-subscribers', array( $this, 'subscribers_list' ));
        add_submenu_page('everest-coming-soon-lite', __('How to Use', 'everest-coming-soon-lite'), __('How to Use', 'everest-coming-soon-lite'), 'manage_options', 'ecs-how-to-use', array( $this, 'how_to_use' ));
        add_submenu_page('everest-coming-soon-lite', __('About', 'everest-coming-soon-lite'), __('About', 'everest-coming-soon-lite'), 'manage_options', 'ecs-about', array( $this, 'about' ));

        add_submenu_page('everest-coming-soon-lite', __('Documentation', 'everest-coming-soon-lite'), __('Documentation', 'everest-coming-soon-lite'), 'manage_options', 'ecs-documentation',  '__return_false', null, 9);
        add_submenu_page('everest-coming-soon-lite', __('Check Premium Version', 'everest-coming-soon-lite'), __('Check Premium Version', 'everest-coming-soon-lite'), 'manage_options', 'ecs-premium', '__return_false', null, 9);
    }

    function main_settings_page() {
        include(ECSL_PATH . 'inc/views/backend/main-settings.php');
    }

    function subscribers_list() {
        include(ECSL_PATH . 'inc/views/backend/subscribers-list.php');
    }

    function how_to_use() {
        include(ECSL_PATH . 'inc/views/backend/how-to-use.php');
    }

    function about() {
        include(ECSL_PATH . 'inc/views/backend/about.php');
    }

}

new ECSL_Admin();
}