<?php
defined('ABSPATH') or die('No script kiddies please!');

if ( !class_exists('ECSL_Library') ) {

    class ECSL_Library {

        /**
         * Print array in pre format
         *
         * @param type $array
         */
        function print_array($array) {
            if ( isset($_GET[ 'debug' ]) ) {
                echo "<pre>";
                print_r($array);
                echo "</pre>";
            }
        }

        /**
         * Sanitizes Multi Dimensional Array
         * @param array $array
         * @param array $sanitize_rule
         * @return array
         *
         * @since 1.0.0
         */
        function sanitize_array($array = array(), $sanitize_rule = array()) {
            if ( !is_array($array) || count($array) == 0 ) {
                return array();
            }

            foreach ( $array as $k => $v ) {
                if ( !is_array($v) ) {

                    $default_sanitize_rule = 'html';
                    $sanitize_type = isset($sanitize_rule[ $k ]) ? $sanitize_rule[ $k ] : $default_sanitize_rule;
                    $array[ $k ] = $this->sanitize_value($v, $sanitize_type);
                }
                if ( is_array($v) ) {
                    $array[ $k ] = $this->sanitize_array($v, $sanitize_rule);
                }
            }

            return $array;
        }

        /**
         * Sanitizes Value
         *
         * @param type $value
         * @param type $sanitize_type
         * @return string
         *
         * @since 1.0.0
         */
        function sanitize_value($value = '', $sanitize_type = 'text') {
            switch ( $sanitize_type ) {
                case 'html':
                    $allowed_html = wp_kses_allowed_html('post');
                    return wp_kses($value, $allowed_html);
                    break;
                case 'no':
                    return $value;
                    break;
                default:
                    return sanitize_text_field($value);
                    break;
            }
        }

        /**
         * Prints Display None
         *
         * @param string $parameter1
         * @param string $parameter2
         *
         * @since 1.0.0
         */
        function eg_display_none($parameter1, $parameter2) {
            if ( $parameter1 != $parameter2 ) {
                echo 'style="display:none"';
            }
        }

        /**
         * Generate default settings array
         *
         * @return array $settings
         *
         * @since 1.0.0
         */
        function get_default_settings() {
            $settings = array( 'general' => array( 'disable_roles' => array( 'administrator' ) ) );
            return $settings;
        }

        function permission_denied() {
            die('No script kiddies please!!');
        }

        function convert_into_br($text) {
            $text = implode("<br \>", explode("\n", $text));
            return $text;
        }

    }

}
