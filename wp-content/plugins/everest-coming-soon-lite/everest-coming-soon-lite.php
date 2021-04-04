<?php

defined('ABSPATH') or die('No script kiddies please!!');
/*
  Plugin Name: Everest Coming Soon Lite
  Plugin URI: http://accesspressthemes.com/wordpress-plugins/everest-coming-soon-lite
  Description: Site Maintenance Mode Plugin
  Version: 	1.1.0
  Author:  	AccessPress Themes
  Author URI:  http://accesspressthemes.com
  License:      GPL2
  License URI:  https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages
  Text Domain: everest-coming-soon
 */


/**
 * Plugin Main Class
 *
 * @since 1.0.0
 */
if ( !class_exists('Everest_Coming_Soon_Lite') ) {

    class Everest_Coming_Soon_Lite {

        /**
         * Plugin Main initialization
         *
         * @since 1.0.0
         */
        function __construct() {
            $this->define_constants();
            $this->includes();
        }

        /**
         * Necessary Constants Define
         *
         * @since 1.0.0
         */
        function define_constants() {
            global $wpdb;
            defined('ECSL_PATH') or define('ECSL_PATH', plugin_dir_path(__FILE__));
            defined('ECSL_URL') or define('ECSL_URL', plugin_dir_url(__FILE__));
            defined('ECSL_IMG_DIR') or define('ECSL_IMG_DIR', plugin_dir_url(__FILE__) . 'img/');
            defined('ECSL_CSS_DIR') or define('ECSL_CSS_DIR', plugin_dir_url(__FILE__) . 'css/');
            defined('ECSL_JS_DIR') or define('ECSL_JS_DIR', plugin_dir_url(__FILE__) . 'js/');
            defined('ECSL_VERSION') or define('ECSL_VERSION', '1.1.0');

            defined('ECS_LITE_PLUGIN_NAME') or define('ECS_LITE_PLUGIN_NAME', 'Everest Coming Soon Lite');
            defined('ECS_LITE_DEMO') or define('ECS_LITE_DEMO', 'http://demo.accesspressthemes.com/wordpress-plugins/everest-coming-soon-lite');
            defined('ECS_LITE_DOC') or define('ECS_LITE_DOC', 'https://accesspressthemes.com/documentation/everest-coming-soon-lite/');
            defined('ECS_LITE_DETAIL') or define('ECS_LITE_DETAIL', 'https://accesspressthemes.com/wordpress-plugins/everest-coming-soon-lite/');
            defined('ECS_LITE_RATING') or define('ECS_LITE_RATING', 'https://wordpress.org/support/plugin/everest-coming-soon-lite/reviews/#new-post');


            defined('ECS_PRO_PLUGIN_NAME') or define('ECS_PRO_PLUGIN_NAME', 'Everest Coming Soon');
            defined('ECS_PRO_LINK') or define('ECS_PRO_LINK', 'https://accesspressthemes.com/wordpress-plugins/everest-coming-soon/');
            defined('ECS_PRO_DEMO') or define('ECS_PRO_DEMO', 'http://demo.accesspressthemes.com/wordpress-plugins/everest-coming-soon');
            defined('ECS_PRO_DETAIL') or define('ECS_PRO_DETAIL', 'https://accesspressthemes.com/wordpress-plugins/everest-coming-soon/');

        }

        /**
         * Includes necessary files
         *
         * @since 1.0.0
         */
        function includes() {
            include(ECSL_PATH . 'inc/classes/class-ecs-library.php');
            include(ECSL_PATH . 'inc/classes/class-ecs-activation.php');
            include(ECSL_PATH . 'inc/classes/class-ecs-admin-ajax.php');
            include(ECSL_PATH . 'inc/classes/class-ecs-ajax.php');
            include(ECSL_PATH . 'inc/classes/class-ecs-admin.php');
            include(ECSL_PATH . 'inc/classes/class-ecs-enqueue.php');
            include(ECSL_PATH . 'inc/classes/class-ecs-admin-enqueue.php');
            include(ECSL_PATH . 'inc/classes/class-ecs-hooks.php');
        }
    }
    new Everest_Coming_Soon_Lite();
}
