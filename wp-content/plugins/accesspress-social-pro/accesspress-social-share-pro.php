<?php
//Decleration of the necessary constants for plugin
if ( ! defined( 'APSS_IMAGE_DIR' ) ) {
     define( 'APSS_IMAGE_DIR', plugin_dir_url( __FILE__ ) . 'images/share' );
}

if ( ! defined( 'APSS_JS_DIR' ) ) {
     define( 'APSS_JS_DIR', plugin_dir_url( __FILE__ ) . 'js/share' );
}

if ( ! defined( 'APSS_CSS_DIR' ) ) {
     define( 'APSS_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css/share' );
}

if ( ! defined( 'APSS_VERSION' ) ) {
     define( 'APSS_VERSION', '2.0.7' );
}

if ( ! defined( 'APSS_TEXT_DOMAIN' ) ) {
     define( 'APSS_TEXT_DOMAIN', 'ap-social-pro' );
}

if ( ! defined( 'APSS_SETTING_NAME' ) ) {
     define( 'APSS_SETTING_NAME', 'apss_share_settings' );
}

defined( 'APSS_PLUGIN_PATH' ) or define( 'APSS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

//Decleration of the class for necessary configuration of a plugin

/**
 * Register of widgets
 * */
include_once('inc/share/backend/widget.php');

if ( ! class_exists( 'APSS_Class' ) ) {

     class APSS_Class{

          var $apss_settings;

          function __construct(){
               $this -> apss_settings = get_option( APSS_SETTING_NAME );
               //register_activation_hook(__FILE__, array($this, 'plugin_activation')); //load the default setting for the plugin while activating
               // remove our filter, as early as possible
               // add it back after wp_trim_excerpt was applied, in case the theme calls the_content after

               add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_assets' ) ); //registers all the assets required for wp-admin
               add_filter( 'the_content', array( $this, 'apss_the_content_filter' ), 110 ); // add the filter function for display of social share icons in frontend //added 12 priority level at the end to make the plugin compactible with Visual Composer.
               //add_action( 'wp_head', array( $this, 'add_css_for_floating_share_hide_option' ) );
               add_action( 'wp_enqueue_scripts', array( $this, 'register_frontend_assets' ) ); // registers all the assets required for the frontend
               add_action( 'admin_post_apss_save_options', array( $this, 'apss_save_options' ) ); //save the options in the wordpress options table.
               add_action( 'admin_post_apss_restore_default_settings', array( $this, 'apss_restore_default_settings' ) ); //restores default settings.
               add_action( 'admin_post_apss_clear_cache', array( $this, 'apss_clear_cache' ) ); //clear the cache of the social share counter.
               add_shortcode( 'apss-share', array( $this, 'apss_shortcode' ) ); //adds a shortcode
               add_shortcode( 'apss_share', array( $this, 'apss_shortcode' ) ); //added a new shortcode to remove the shortcode with hyphen in future
               add_shortcode( 'apss-count', array( $this, 'apss_count_shortcode' ) ); //adds a share count shortcode
               add_shortcode( 'apss_count', array( $this, 'apss_count_shortcode' ) ); //added a new shortcode to remove the shortcode with hyphen in future

               add_action( 'widgets_init', array( $this, 'register_apss_widget' ) );
               add_action( 'add_meta_boxes', array( $this, 'social_meta_box' ) ); //for providing the option to disable the social share option in each frontend page
               add_action( 'save_post', array( $this, 'save_meta_values' ) ); //function to save the post meta values of a plugin.
               add_action( 'wp_footer', array( $this, 'floating_sidebar' ) ); //function to hook the floating sidebar to the frontend.

               add_action( 'wp_ajax_frontend_session', array( $this, 'frontend_session' ) );
               add_action( 'wp_ajax_nopriv_frontend_counter', array( $this, 'frontend_counter' ) );
               add_action( 'wp_ajax_frontend_counter', array( $this, 'frontend_counter' ) );
               add_action( 'wp_ajax_nopriv_frontend_session', array( $this, 'frontend_session' ) );
               add_action( 'wp_ajax_nopriv_frontend_popup_email_send', array( $this, 'frontend_email_popup_send' ) );
               add_action( 'wp_ajax_frontend_popup_email_send', array( $this, 'frontend_email_popup_send' ) );
               add_action( 'bp_activity_entry_meta', array( $this, 'buddypress_social_share' ), 999 );
               add_action( 'wp_footer', array( $this, 'apss_temp' ) );

               // Major Update Code Start

               add_action( 'admin_post_apss_plugin_settings_download', array( $this, 'apss_plugin_settings_download' ) );
               add_filter( 'upload_mimes', array( $this, 'custom_upload_mimes' ) ); // To allow upload of Json File. Already callled in Social Counter

               add_action( 'wp_ajax_apss_imported_settings_ajax_action', array( $this, 'imported_file' ) ); // Set the imported settings in the plugin
               add_action( 'wp_ajax_nopriv_apss_imported_settings_ajax_action', array( $this, 'imported_file' ) ); // Set the imported settings in the plugin

               add_action( 'wp_footer', array( $this, 'shortcode_popup_share' ) );
               //add_action( 'wp_footer', array( $this, 'shortcode_popup_share1' ) );
               // End of Major Update Code
          }

          function custom_upload_mimes( $mimes = array() ){
               $mimes[ 'json' ] = "json";
               return $mimes;
          }

          function shortcode_popup_share(){
               $shortcode = array( 'apss_share' );
               global $post;
               $pattern = get_shortcode_regex( $shortcode );
               if ( preg_match_all( '/' . $pattern . '/s', $post -> post_content, $matches ) ) {
                    $used_shortcode = ( $matches[ 0 ][ 0 ] );
                    do_shortcode( $used_shortcode );
               }
          }

          //function for adding shortcode of a plugin
          function apss_shortcode( $atts ){
               ob_start();
               include('inc/share/frontend/shortcode.php');
               $html = ob_get_contents();
               ob_get_clean();
               return $html;
          }

          function shortcode_popup_share1(){
               global $post;
               $post_to_check = get_post( $post -> ID );
               $content = $post_to_check -> post_content;
               echo $content;

               $shortcode = 'apss_share';

               if ( has_shortcode( $content, $shortcode ) ) {
                    die( 'reached' );
               }
          }

          //function for adding the floating sidebar
          function floating_sidebar(){
               global $post;

               include(APSS_PLUGIN_PATH . 'inc/share/frontend/apss-variable.php');
               include(APSS_PLUGIN_PATH . 'inc/share/frontend/demo-file.php');

               if ( isset( $post -> ID ) ) {
                    $sidebar_flag = get_post_meta( $post -> ID, 'apss_sidebar_flag', true );
               } else {
                    $sidebar_flag = 0;
               }
               if ( $sidebar_flag != '1' ) {
                    include('inc/share/frontend/floating_sidebar.php');
               }
               include('inc/share/frontend/emailshare.php');
               ?>
               <input type="hidden" id="apss-current-url" value="<?php echo $this -> curPageURL(); ?>"/>
               <?php
          }

          function imported_file(){
               if ( isset( $_POST[ '_wpnonce' ] ) && wp_verify_nonce( $_POST[ '_wpnonce' ], 'apss_backend_nonce' ) ) {
                    $imported_data = sanitize_text_field( stripslashes( $_POST[ 'imported_data' ] ) );
                    $imported_file_values = json_decode( $imported_data, True );
                    update_option( APSS_SETTING_NAME, $imported_file_values );
                    wp_redirect( admin_url() . 'admin.php?page=apss-share-pro&message=4' );
                    die();
               }
          }

          function apss_plugin_settings_download(){
               if ( ! empty( $_GET[ '_wpnonce' ] ) && wp_verify_nonce( $_GET[ '_wpnonce' ], 'apss_plugin_settings_download_nonce' ) ) {
                    header( "Content-type: application/force-download" );
                    header( 'Content-Disposition: inline; filename="ap_Social_Share' . date( 'YmdHis' ) . '.json"' );

                    $options = get_option( APSS_SETTING_NAME );
                    $results = json_encode( $options );

                    if ( empty( $results ) ) {
                         return;
                    } else {
                         echo $results;
                    }
               }
          }

          //called when plugin is activated
          static function plugin_activation(){
               include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
               if ( is_plugin_active( 'accesspress-social-share/accesspress-social-share.php' ) ) {
                    wp_die( __( 'You need to deactivate AccessPress Social Share Plugin in order to activate AccessPress Social Pro plugin.Please deactivate free one.', 'accesspress-social-share' ) );
               }
               if ( ! get_option( APSS_SETTING_NAME ) ) {
                    include( 'inc/share/backend/activation.php' );
               } else {
                    //perform the plugins options table upgrade
                    $options = get_option( APSS_SETTING_NAME );
                    if ( ! array_key_exists( 'viber', $options[ 'social_networks' ] ) ) {
                         $options[ 'floating_social_networks' ] = $options[ 'social_networks' ];
                         $options[ 'total_counter_enable_options' ] = '0';
                         foreach ( $options as $key => $value ) {
                              if ( $key === 'social_networks' ) {
                                   $options[ $key ][ 'viber' ] = '0';
                                   $options[ $key ][ 'sms' ] = '0';
                                   $options[ $key ][ 'messenger' ] = '0';
                              }
                              if ( $key === 'floating_social_networks' ) {
                                   $options[ $key ][ 'viber' ] = '0';
                                   $options[ $key ][ 'sms' ] = '0';
                                   $options[ $key ][ 'messenger' ] = '0';
                              }
                              if ( $key === 'apss_social_networks_naming' ) {
                                   $options[ $key ][ 'viber' ] = 'Viber';
                                   $options[ $key ][ 'sms' ] = 'SMS';
                                   $options[ $key ][ 'messenger' ] = 'Messenger';
                              }
                         }
                         update_option( APSS_SETTING_NAME, $options );
                    }
               }
          }

          //for saving the plugin settings
          function apss_save_options(){
               if ( isset( $_POST[ 'apss_add_nonce_save_settings' ] ) && isset( $_POST[ 'apss_submit_settings' ] ) && wp_verify_nonce( $_POST[ 'apss_add_nonce_save_settings' ], 'apss_nonce_save_settings' ) ) {
                    include( 'inc/share/backend/save-settings.php' );
               } else {
                    die( 'No script kiddies please!' );
               }
          }

          //returns the current page url
          static function curPageURL(){
               $pageURL = 'http';
               if ( isset( $_SERVER[ 'HTTPS' ] ) && $_SERVER[ 'HTTPS' ] == 'on' ) {
                    $pageURL .= "s";
               }
               $pageURL .= "://";
               if ( $_SERVER[ "SERVER_PORT" ] != "80" ) {
                    $pageURL .= $_SERVER[ "SERVER_NAME" ] . ":" . $_SERVER[ "SERVER_PORT" ] . $_SERVER[ "REQUEST_URI" ];
               } else {
                    $pageURL .= $_SERVER[ "SERVER_NAME" ] . $_SERVER[ "REQUEST_URI" ];
               }
               return $pageURL;
          }

          //returns all the registered post types only
          static function get_registered_post_types(){
               $post_types = get_post_types();
               unset( $post_types[ 'post' ] );
               unset( $post_types[ 'page' ] );
               unset( $post_types[ 'attachment' ] );
               unset( $post_types[ 'revision' ] );
               unset( $post_types[ 'nav_menu_item' ] );
               return $post_types;
          }

          // returns all the registered taxonomies
          static function get_registered_taxonomies(){
               $output = 'objects';
               $args = '';
               $taxonomies = get_taxonomies( $args, $output );
               unset( $taxonomies[ 'category' ] );
               unset( $taxonomies[ 'post_tag' ] );
               unset( $taxonomies[ 'nav_menu' ] );
               unset( $taxonomies[ 'link_category' ] );
               unset( $taxonomies[ 'post_format' ] );
               return $taxonomies;
          }

          /**
           *
           * @param int $count
           * @param string $format
           */
          static function get_formatted_count( $count, $format ){
               switch ( $format ) {
                    case '2':
                         $count = number_format( $count );
                         break;
                    case '3':
                         $count = self:: abreviateTotalCount( $count );
                         break;
                    default:
                         $count = $count;
                         break;
               }
               return $count;
          }

          /**
           *
           * @param integer $value
           * @return string
           */
          static function abreviateTotalCount( $value ){
               if ( $value == 0 ) {
                    return $value;
               } else {
                    $abbreviations = array( 12 => 'T', 9 => 'B', 6 => 'M', 3 => 'K', 0 => '' );
                    foreach ( $abbreviations as $exponent => $abbreviation ) {
                         if ( $value >= pow( 10, $exponent ) ) {
                              return round( floatval( $value / pow( 10, $exponent ) ), 1 ) . $abbreviation;
                         }
                    }
               }
          }

          //function to return the content filter for the posts and pages
          function apss_the_content_filter( $content ){
               global $post;
               $post_content = $content;

               $title = get_the_title();
               $content = strip_shortcodes( strip_tags( get_the_content() ) );
               if ( strlen( $content ) >= 100 ) {
                    $excerpt = substr( $content, 0, 100 ) . '...';
               } else {
                    $excerpt = $content;
               }

               $options = $this -> apss_settings;
               include(APSS_PLUGIN_PATH . 'inc/share/frontend/apss-variable.php');
               include(APSS_PLUGIN_PATH . 'inc/share/frontend/demo-file.php');

               ob_start();
               include(APSS_PLUGIN_PATH . 'inc/share/frontend/content-filter.php');
               $html_content = ob_get_contents();
               ob_get_clean();

               if ( in_array( 'get_the_excerpt', $GLOBALS[ 'wp_current_filter' ] ) )
                    return $content;




               $woocommerce_products_enable = in_array( 'product', $this -> apss_settings[ 'share_options' ] );
               if ( class_exists( 'WooCommerce' ) && $woocommerce_products_enable ) {
                    add_action( 'woocommerce_share', array( $this, 'woocommerce_product_share' ) );
               }
               $content_flag = get_post_meta( get_the_ID(), 'apss_content_flag', true );

               $all = in_array( 'all', $options[ 'share_options' ] );
               $is_lists_authorized = (is_search() && $content_flag != '1' ) && $all ? true : false;

               $is_attachement_check = in_array( 'attachment', $options[ 'share_options' ] );
               $is_attachement = (is_attachment() && $is_attachement_check ) ? true : false;

               $front_page = in_array( 'front_page', $options[ 'share_options' ] );
               $is_front_page = (is_front_page() && $content_flag != '1' ) && $front_page ? true : false;

               $share_shows_in_options = $options[ 'share_options' ];
               $is_singular = is_singular( $share_shows_in_options ) && ! is_front_page() && $content_flag != '1' ? true : false;
               if ( ! empty( $share_shows_in_options ) ) {
                    $is_tax = is_tax( $share_shows_in_options );
               } else {
                    $is_tax = false;
               }

               $is_category = in_array( 'categories', $options[ 'share_options' ] );
               $default_category = (is_category()) && $is_category ? true : false;

               $is_default_archive = in_array( 'archives', $options[ 'share_options' ] );
               $default_archives = ( (is_archive() && ! is_tax() ) && ! is_category() ) && $is_default_archive ? true : false;

               $custom_post_types_archives = ((is_post_type_archive() || is_tag()) && $is_tax) ? true : false;

               //echo $counter_enable_options;
               // die( 'reached' );

               if ( isset( $options[ 'counter_enable_options' ] ) && $options[ 'counter_enable_options' ] == '1' ) {
                    $counter_class = 'counter-enable';
               } else {
                    $counter_class = '';
               }

               if ( isset( $options[ 'share_locations' ] ) ) {
                    $share_locations_class = $options[ 'share_locations' ];
               } else {
                    $share_locations_class = 'left';
               }

               if ( empty( $options[ 'share_options' ] ) ) {
                    return $post_content;
               } else if ( $is_lists_authorized || $is_attachement || $is_singular || $is_tax || $is_front_page || $default_category || $default_archives || $custom_post_types_archives ) {
                    if ( $options[ 'share_positions' ] == 'below_content' ) {
                         return $post_content . "<div class='apss-social-share apss-theme-$icon_set_value $counter_class apss-buttons-$share_locations_class clearfix apsp-share-inline-bottom' >" . $html_content . "</div>";
                    }

                    if ( $options[ 'share_positions' ] == 'above_content' ) {
                         return "<div class='apss-social-share apss-theme-$icon_set_value $counter_class apss-buttons-$share_locations_class clearfix apsp-share-inline-top'>$html_content</div>" . $post_content;
                    }

                    if ( $options[ 'share_positions' ] == 'on_both' ) {
                         return "<div class='apss-social-share apss-theme-$icon_set_value $counter_class apss-buttons-$share_locations_class clearfix apsp-share-inline-top'>$html_content</div>" . $post_content . "<div class='apss-social-share apss-theme-$icon_set_value $counter_class apss-buttons-$share_locations_class clearfix apsp-share-inline-bottom'>$html_content</div>";
                    }
               } else {
                    return $post_content;
               }
               echo $html_content;
          }

          //function to hide/show the floating share in the mobile devices
          function add_css_for_floating_share_hide_option(){
               $options = $this -> apss_settings;
               if ( isset( $options[ 'mobile_floating_sidebar' ][ 'enabled' ] ) ) {
                    if ( $options[ 'mobile_floating_sidebar' ][ 'enabled' ] == '1' ) {
                         ?>
                         <style>
                              @media (max-width:768px){
                                   .apss-social-share-sidebar{
                                        display:none;
                                   }

                                   .apss-social-share-sidebar-mobile{
                                        display:none;
                                   }
                              }
                         </style>
                         <?php
                    }
               }
          }

          //function to make the social share compactible with woocommerce
          function woocommerce_product_share(){
               $counter_enable_options = $this -> apss_settings[ 'counter_enable_options' ];
               if ( $counter_enable_options == '1' ) {
                    $counter_class = 'counter-enable';
               } else {
                    $counter_class = '';
               }
               $icon_set_value = $this -> apss_settings[ 'social_icon_set' ];
               echo "<div class='apss-social-share apss-theme-$icon_set_value $counter_class clearfix' >";
               ob_start();
               include('inc/share/frontend/content-filter.php');
               $html_content = ob_get_contents();
               ob_get_clean();
               echo $html_content;
               echo "</div>";
          }

          //functions for registrtion of the admin section for backend
          function register_admin_assets(){
               $screen = get_current_screen();

               /**
                * Backend CSS
                * */
               if ( (isset( $_GET[ 'page' ] ) && ($_GET[ 'page' ] == 'apss-share-pro' || $_GET[ 'page' ] == 'apss-shortcode-generator' ) ) || $screen -> id == 'widgets' ) {
                    wp_enqueue_style( 'wp-color-picker' );
                    wp_enqueue_script( 'wp-color-picker' );
                    wp_enqueue_style( 'aps-admin-css', APSS_CSS_DIR . '/backend.css', false, APSS_VERSION ); //registering plugin admin css
                    wp_enqueue_style( 'fontawesome-css', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', false, APSS_VERSION );
                    wp_enqueue_style( 'apss-socicon', APSS_CSS_DIR . '/socicon/style.css', false, APSS_VERSION );

                    /**
                     * Backend JS
                     * */
                    wp_enqueue_script( 'jquery-ui-sortable' );
                    wp_enqueue_script( 'apss-admin-js', APSS_JS_DIR . '/backend.js', array( 'jquery', 'jquery-ui-sortable', 'wp-color-picker' ), APSS_VERSION ); //registering plugin's admin js
                    wp_enqueue_media(); //added this for image upload options
                    $ajax_nonce = wp_create_nonce( 'apss_backend_nonce' );
                    wp_localize_script( 'apss-admin-js', 'apss_backend_js_obj', array(
                        'ajax_url' => admin_url() . 'admin-ajax.php',
                        'ajax_nonce' => $ajax_nonce ) );
               }
          }

          /**
           * Registers Frontend Assets
           * */
          function register_frontend_assets(){
               wp_enqueue_style( 'apss-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css', array(), APSS_VERSION );
               wp_enqueue_style( 'apss-socicon', APSS_CSS_DIR . '/socicon/style.css', false, APSS_VERSION );
               wp_enqueue_style( 'apss-font-opensans', '//fonts.googleapis.com/css?family=Open+Sans', array(), false );
               wp_enqueue_style( 'apss-frontend-css', APSS_CSS_DIR . '/frontend.css', array( 'apss-font-awesome' ), APSS_VERSION );
               wp_enqueue_script( 'apss-frontend-mainjs', APSS_JS_DIR . '/frontend.js', array( 'jquery' ), APSS_VERSION, true );
               $ajax_nonce = wp_create_nonce( 'apss-ajax-nonce' );
               wp_localize_script( 'apss-frontend-mainjs', 'frontend_ajax_object', array( 'ajax_url' => admin_url() . 'admin-ajax.php', 'ajax_nonce' => $ajax_nonce ) );

               $whatsapp_hide = isset( $options[ 'disable_whatsapp_in_desktop' ] ) ? $options[ 'disable_whatsapp_in_desktop' ] : '0';
               $viber_hide = isset( $options[ 'disable_viber_in_desktop' ] ) ? $options[ 'disable_viber_in_desktop' ] : '0';
               $sms_hide = isset( $options[ 'disable_sms_in_desktop' ] ) ? $options[ 'disable_sms_in_desktop' ] : '0';
               $messenger_hide = isset( $options[ 'disable_messenger_in_desktop' ] ) ? $options[ 'disable_messenger_in_desktop' ] : '0';

               $current_page_url = $this -> curPageURL();

               $popup_urls = isset( $_SESSION[ 'apss_popup_urls' ] ) ? $_SESSION[ 'apss_popup_urls' ] : array();
               if ( ! in_array( $current_page_url, $popup_urls ) ) {
                    $hide_popup_overlay = 0;
               } else {
                    $hide_popup_overlay = 1;
               }

               wp_localize_script( 'apss-frontend-mainjs', 'frontend_js_object', array(
                   'whatsapp_hide' => $whatsapp_hide,
                   'viber_hide' => $viber_hide,
                   'sms_hide' => $sms_hide,
                   'messenger_hide' => $messenger_hide,
                   'hide_popup_overlay' => $hide_popup_overlay
                       )
               );
               $options = get_option( APSS_SETTING_NAME );

               if ( isset( $options[ 'pin_it_button_options' ][ 'enabled' ] ) && $options[ 'pin_it_button_options' ][ 'enabled' ] == "1" ) {
                    wp_enqueue_script( 'pinit-js', '//assets.pinterest.com/js/pinit.js', false, null, true );
               }
               add_filter( 'clean_url', array( $this, 'pinit_js_config' ) );

               if ( isset( $options[ 'popup_options' ][ 'enabled' ] ) && $options[ 'popup_options' ][ 'enabled' ] == '1' ) {
                    $popup_urls = isset( $_SESSION[ 'apss_popup_urls' ] ) ? $_SESSION[ 'apss_popup_urls' ] : array();
                    if ( ! in_array( $current_page_url, $popup_urls ) ) {
                         add_action( 'wp_footer', array( $this, 'popup_share' ) ); //add the action for the footer popup
                    }
               }

               if ( isset( $options[ 'flyin_options' ][ 'enabled' ] ) && $options[ 'flyin_options' ][ 'enabled' ] == '1' ) {
                    $flyin_urls = isset( $_SESSION[ 'apss_flyin_urls' ] ) ? $_SESSION[ 'apss_flyin_urls' ] : array();
                    if ( ! in_array( $current_page_url, $flyin_urls ) ) {
                         add_action( 'wp_footer', array( $this, 'flyin_share' ) ); //add the action for the footer flyin
                    }
               }

               if ( isset( $options[ 'floating_sidebar' ][ 'show_all' ] ) && $options[ 'floating_sidebar' ][ 'show_all' ] == '1' ) {
                    add_action( 'wp_footer', array( $this, 'popup_share_all' ) );
               }

               if ( isset( $options[ 'social_share_sticky_share' ][ 'enable' ] ) && $options[ 'social_share_sticky_share' ][ 'enable' ] == 1 ) {
                    add_action( 'wp_footer', array( $this, 'sticky_header' ) );
               }
          }

          public static function main_page(){
               include('inc/share/backend/main-page.php');
          }

          public static function shortcode_generator(){
               include('inc/share/backend/shortcode_generator.php');
          }

          /**
           * Funciton to print array in pre format
           * */
          function print_array( $array ){
               echo "<pre>";
               print_r( $array );
               echo "</pre>";
          }

          //function to restore the default setting of a plugin
          function apss_restore_default_settings(){
               $nonce = $_REQUEST[ '_wpnonce' ];
               if ( ! empty( $_GET ) && wp_verify_nonce( $nonce, 'apss-restore-default-settings-nonce' ) ) {
                    // die( 'reached_restore_function' );
                    //restore the default plugin activation settings from the activation page.
                    include( 'inc/share/backend/activation.php' );
                    wp_redirect( admin_url() . 'admin.php?page=apss-share-pro&message=2' );
                    exit;
               } else {
                    die( 'No script kiddies please!' );
               }
          }

          function popup_share(){
               include('inc/share/frontend/apss-variable.php');
               if ( have_posts() ) {
                    $popup_flag = get_post_meta( $post -> ID, 'apss_popup_flag', true );
               } else {
                    $popup_flag = 0;
               }

               if ( $popup_flag != '1' ) {
                    include('inc/share/frontend/popup_share.php');
               }
          }

          function flyin_share(){
               include('inc/share/frontend/apss-variable.php');
               if ( have_posts() ) {
                    $flyin_flag = get_post_meta( $post -> ID, 'apss_flyin_flag', true );
               } else {
                    $flyin_flag = 0;
               }
               if ( $flyin_flag != '1' ) {
                    include('inc/share/frontend/flyin_share.php');
               }
          }

          function popup_share_all(){
               include('inc/share/frontend/popup_share_all.php');
          }

          function sticky_header(){
               global $post;
               if ( isset( $post -> ID ) ) {
                    $sticky_flag = get_post_meta( $post -> ID, 'apss_sticky_flag', true );
               } else {
                    $sticky_flag = 0;
               }
               if ( $sticky_flag != '1' ) {
                    include('inc/share/frontend/sticky_header_share.php');
               }
          }

          //////////////////////////////////// for count //////////////////////////////////////////////////////
          // for facebook url share count

          static function get_fb( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );
               if ( isset( $apss_settings[ 'enable_cache' ] ) && $apss_settings[ 'enable_cache' ] == '1' ) {
                    $fb_transient = 'fb_' . md5( $url );
                    $fb_transient_count = get_transient( $fb_transient );
                    $fb_transient_count = false;
                    if ( false === $fb_transient_count ) {
                         $json_string = self :: get_json_values( 'https://graph.facebook.com/?id=' . $url );
                         $json = json_decode( $json_string, true );
                         $facebook_count = isset( $json[ 'share' ][ 'share_count' ] ) ? intval( $json[ 'share' ][ 'share_count' ] ) : 0;
                         global $wpdb;
                         $transient_tbl_name = $wpdb -> prefix . 'transients';
                         $wpdb -> insert(
                                 $transient_tbl_name, array( 'transient_name' => $fb_transient ), array( '%s' )
                         );
                    } else {
                         $facebook_count = $fb_transient_count;
                    }
               } else {
                    $json_string = self :: get_json_values( 'https://graph.facebook.com/?id=' . $url );
                    $json = json_decode( $json_string, true );
                    $facebook_count = isset( $json[ 'share' ][ 'share_count' ] ) ? intval( $json[ 'share' ][ 'share_count' ] ) : 0;
               }
               return $facebook_count;
          }

          /**
           * Get Facebook Access Token
           * */
          static function get_fb_access_token( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );
               $app_id = ( isset( $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_id' ] ) && $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_id' ] != '') ? $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_id' ] : '';
               $app_secret = (isset( $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_secret' ] ) && $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_secret' ] != '') ? $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_secret' ] : '';
               $api_url = 'https://graph.facebook.com/';

               // Not Working
               //               $get_token = sprintf(
               //
               //                       '%soauth/access_token?client_id=%s&client_secret=%s&grant_type=client_credentials', $api_url, $app_id, $app_secret
               //               );

               $get_token = "https://graph.facebook.com/oauth/access_token?client_id=$app_id&client_secret=$app_secret&grant_type=client_credentials&&redirect_uri=$url";

               $access_token = wp_remote_get( $get_token, array( 'timeout' => 60 ) );

               if ( is_wp_error( $access_token ) || ( isset( $access_token[ 'response' ][ 'code' ] ) && 200 != $access_token[ 'response' ][ 'code' ] ) ) {
                    return '';
               } else {
                    $json_decode = json_decode( $access_token[ 'body' ] );

                    return sanitize_text_field( $json_decode -> access_token );
               }
          }

          public static function new_get_fb( $url ){

               // include(APSS_PLUGIN_PATH . 'inc/share/frontend/apss-variable.php');
               $apss_settings = get_option( APSS_SETTING_NAME );
               $fb_app_id = ( isset( $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_id' ] ) && $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_id' ] != '' ) ? $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_id' ] : "";
               $fb_app_secret = ( isset( $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_secret' ] ) && $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_secret' ] != '' ) ? $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_secret' ] : "";

               include(APSS_PLUGIN_PATH . 'inc/share/frontend/apss-shortcode-variable.php');
               if ( $fb_app_id == "" || $fb_app_secret == "" ) {

                    $facebook_count = self:: get_fb( $url );
                    return $facebook_count;
               } else {

                    if ( isset( $apss_settings[ 'enable_cache' ] ) && $apss_settings[ 'enable_cache' ] == '1' ) {

                         $fb_transient = 'fb_' . md5( $url );
                         $cache_period = isset( $apss_settings[ 'cache_period' ] ) && $apss_settings[ 'cache_period' ] != '' ? $apss_settings[ 'cache_period' ] : 24;
                         $fb_transient_count = get_transient( $fb_transient );
                         if ( false === $fb_transient_count ) {
                              $facebook_count = APSS_Class:: facebook_new_share_count_api( $url );
                              set_transient( $fb_transient, $facebook_count, $cache_period * HOUR_IN_SECONDS );
                              global $wpdb;
                              $transient_tbl_name = $wpdb -> prefix . 'transients';
                              $wpdb -> insert(
                                      $transient_tbl_name, array( 'transient_name' => $fb_transient ), array( '%s' )
                              );
                         } else {
                              $facebook_count = $fb_transient_count;
                         }
                    } else {
                         //echo "hey2";
                         $facebook_count = APSS_Class :: facebook_new_share_count_api( $url );
                    }
                    return $facebook_count;
               }
          }

          static function facebook_new_share_count_api( $url ){

               $access_token = self::get_fb_access_token( $url );
               $api_url = 'https://graph.facebook.com/';

               // Not Working --v
               $facebook_count = sprintf( '%s?access_token=%s&id=%s', $api_url, $access_token, $url );

               // Not Working --v
               $facebook_count = 'https://graph.facebook.com/?id=' . $url . '&access_token=' . sanitize_text_field( $access_token );

               // Not Working --v
               $facebook_count = 'https://graph.facebook.com/?id=' . $url . '&fields=og_object{engagement}';
               if ( $access_token != '' ) {
                    $facebook_count .= '&access_token=' . sanitize_text_field( $access_token );
               }

               // Not Working -- depreciated for FB App v2.9 and higher
               $facebook_count = 'https://graph.facebook.com/?fields=og_object%7Blikes.summary(true).limit(0)%7D,share&id=' . $url;

               // Working
               $facebook_count = "https://graph.facebook.com/?id=$url&fields=engagement&access_token=$access_token";

               $json_string = self::get_json_values( $facebook_count );
               $json = json_decode( $json_string, true );
               if ( is_wp_error( $access_token ) || ( isset( $access_token[ 'response' ][ 'code' ] ) && 200 != $access_token[ 'response' ][ 'code' ] ) ) {
                    return '0';
               } else {
                    $facebook_count = isset( $json[ 'engagement' ][ 'share_count' ] ) ? intval( $json[ 'engagement' ][ 'share_count' ] ) : 0;
                    return $facebook_count;
               }
          }

          static function get_json_values( $url ){
               $args = array( 'timeout' => 10 );
               $response = wp_remote_get( $url, $args );
               $json_response = wp_remote_retrieve_body( $response );
               return $json_response;
          }

          //for twitter url share count
          static function get_tweets( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );

               if ( isset( $apss_settings[ 'enable_cache' ] ) && $apss_settings[ 'enable_cache' ] == '1' ) {
                    $cache_period = isset( $apss_settings[ 'cache_period' ] ) && $apss_settings[ 'cache_period' ] != '' ? $apss_settings[ 'cache_period' ] : 24;
                    $twitter_transient = 'twitter_' . md5( $url );
                    $twitter_transient_count = get_transient( $twitter_transient );

                    if ( false === $twitter_transient_count ) {
                         $tweet_count = APSS_Class:: twitter_share_count_api( $url );
                         set_transient( $twitter_transient, $tweet_count, $cache_period * HOUR_IN_SECONDS );
                         global $wpdb;
                         $transient_tbl_name = $wpdb -> prefix . 'transients';
                         $wpdb -> insert(
                                 $transient_tbl_name, array( 'transient_name' => $twitter_transient ), array( '%s' )
                         );
                    } else {
                         $tweet_count = $twitter_transient_count;
                    }
               } else {
                    $tweet_count = APSS_Class:: twitter_share_count_api( $url );
               }
               return $tweet_count;
          }

          static function twitter_share_count_api( $url ){
               $api_selection = ( isset( $apss_settings[ 'twitter_counter_api' ] ) ) ? $apss_settings[ 'twitter_counter_api' ] : '1';

               if ( $api_selection == '2' ) {
                    $json_string = self:: get_json_values( 'http://public.newsharecounts.com/count.json?url=' . $url );
               } else if ( $api_selection == '3' ) {
                    $json_string = self:: get_json_values( 'http://opensharecount.com/count.json?url=' . $url );
               } else {
                    $json_string = self:: get_json_values( 'http://urls.api.twitter.com/1/urls/count.json?url=' . $url ); // depriciated url share count. returns null
               }
               $json = json_decode( $json_string, true );
               $tweet_count = isset( $json[ 'count' ] ) ? intval( $json[ 'count' ] ) : 0;
               return $tweet_count;
          }

          //for google plus url share count
          static function get_plusones( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );
               if ( isset( $apss_settings[ 'enable_cache' ] ) && $apss_settings[ 'enable_cache' ] == '1' ) {
                    $cache_period = isset( $apss_settings[ 'cache_period' ] ) && $apss_settings[ 'cache_period' ] != '' ? $apss_settings[ 'cache_period' ] : 24;
                    $googleplus_transient = 'gp_' . md5( $url );
                    $googleplus_transient_count = get_transient( $googleplus_transient );
                    if ( false === $googleplus_transient_count ) {
                         $plusones_count = APSS_Class:: googleplus_share_count_api( $url );
                         set_transient( $googleplus_transient, $plusones_count, $cache_period * HOUR_IN_SECONDS );
                         global $wpdb;
                         $transient_tbl_name = $wpdb -> prefix . 'transients';
                         $wpdb -> insert(
                                 $transient_tbl_name, array( 'transient_name' => $googleplus_transient ), array( '%s' )
                         );
                    } else {
                         $plusones_count = $googleplus_transient_count;
                    }
               } else {
                    $plusones_count = APSS_Class::googleplus_share_count_api( $url );
               }
               return $plusones_count;
          }

          static function googleplus_share_count_api( $url ){
               $curl = curl_init();
               curl_setopt( $curl, CURLOPT_URL, "https://clients6.google.com/rpc" );
               curl_setopt( $curl, CURLOPT_POST, true );
               curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, false );
               curl_setopt( $curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . rawurldecode( $url ) . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]' );
               curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
               curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-type: application/json' ) );
               $curl_results = curl_exec( $curl );
               curl_close( $curl );
               $json = json_decode( $curl_results, true );

               $plusones_count = isset( $json[ 0 ][ 'result' ][ 'metadata' ][ 'globalCounts' ][ 'count' ] ) ? intval( $json[ 0 ][ 'result' ][ 'metadata' ][ 'globalCounts' ][ 'count' ] ) : 0;
               return $plusones_count;
          }

          //for pinterest url share count
          static function get_pinterest( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );
               if ( isset( $apss_settings[ 'enable_cache' ] ) && $apss_settings[ 'enable_cache' ] == '1' ) {
                    $cache_period = isset( $apss_settings[ 'cache_period' ] ) && $apss_settings[ 'cache_period' ] != '' ? $apss_settings[ 'cache_period' ] : 24;
                    $pinterest_transient = 'pinterest_' . md5( $url );
                    $pinterest_transient_count = get_transient( $pinterest_transient );
                    if ( false === $pinterest_transient_count ) {
                         $pinterest_count = APSS_Class:: pinterest_share_count_api( $url );
                         set_transient( $pinterest_transient, $pinterest_count, $cache_period * HOUR_IN_SECONDS );
                         global $wpdb;
                         $transient_tbl_name = $wpdb -> prefix . 'transients';
                         $wpdb -> insert(
                                 $transient_tbl_name, array( 'transient_name' => $pinterest_transient ), array( '%s' )
                         );
                    } else {
                         $pinterest_count = $pinterest_transient_count;
                    }
               } else {
                    $pinterest_count = APSS_Class::pinterest_share_count_api( $url );
               }
               return $pinterest_count;
          }

          static function pinterest_share_count_api( $url ){
               $json_string = self:: get_json_values( 'http://api.pinterest.com/v1/urls/count.json?url=' . $url );
               $json_string = preg_replace( '/^receiveCount\((.*)\)$/', "\\1", $json_string );
               $json = json_decode( $json_string, true );
               $pinterest_count = isset( $json[ 'count' ] ) ? intval( $json[ 'count' ] ) : 0;
               return $pinterest_count;
          }

          //for linkedin url share count
          static function get_linkedin( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );
               if ( isset( $apss_settings[ 'enable_cache' ] ) && $apss_settings[ 'enable_cache' ] == '1' ) {
                    $cache_period = isset( $apss_settings[ 'cache_period' ] ) && $apss_settings[ 'cache_period' ] != '' ? $apss_settings[ 'cache_period' ] : 24;
                    $linkedin_transient = 'linkedin_' . md5( $url );
                    $linkedin_transient_count = get_transient( $linkedin_transient );
                    if ( false === $linkedin_transient_count ) {
                         $linkedin_count = APSS_Class::linkedin_share_count_api( $url );
                         set_transient( $linkedin_transient, $linkedin_count, $cache_period * HOUR_IN_SECONDS );
                         global $wpdb;
                         $transient_tbl_name = $wpdb -> prefix . 'transients';
                         $wpdb -> insert(
                                 $transient_tbl_name, array( 'transient_name' => $linkedin_transient ), array( '%s' )
                         );
                    } else {
                         $linkedin_count = $linkedin_transient_count;
                    }
               } else {
                    $linkedin_count = APSS_Class::linkedin_share_count_api( $url );
               }
               return $linkedin_count;
          }

          static function linkedin_share_count_api( $url ){
               $json_string = self:: get_json_values( "https://www.linkedin.com/countserv/count/share?url=$url&format=json" );
               $json = json_decode( $json_string, true );
               $linkedin_count = isset( $json[ 'count' ] ) ? intval( $json[ 'count' ] ) : 0;
               return $linkedin_count;
          }

          //for delicious url share count . The API might be depriciated
          static function get_delicious( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );
               if ( isset( $apss_settings[ 'enable_cache' ] ) && $apss_settings[ 'enable_cache' ] == '1' ) {
                    $cache_period = isset( $apss_settings[ 'cache_period' ] ) && $apss_settings[ 'cache_period' ] != '' ? $apss_settings[ 'cache_period' ] : 24;
                    $delicious_transient = 'delicious_' . md5( $url );
                    $delicious_transient_count = get_transient( $delicious_transient );
                    if ( false === $delicious_transient_count ) {
                         $delicious_count = APSS_Class::delicious_share_count_api( $url );
                         set_transient( $delicious_transient, $delicious_count, $cache_period * HOUR_IN_SECONDS );
                         global $wpdb;
                         $transient_tbl_name = $wpdb -> prefix . 'transients';
                         $wpdb -> insert(
                                 $transient_tbl_name, array( 'transient_name' => $delicious_transient ), array( '%s' )
                         );
                    } else {
                         $delicious_count = $delicious_transient_count;
                    }
               } else {
                    $delicious_count = APSS_Class:: delicious_share_count_api( $url );
               }
               return $delicious_count;
          }

          static function delicious_share_count_api( $url ){
               $json_string = self:: get_json_values( 'http://feeds.delicious.com/v2/json/urlinfo/data?url=' . $url );
               $json = json_decode( $json_string, true );
               $delicious_count = isset( $json[ 0 ][ 'total_posts' ] ) ? intval( $json[ 0 ][ 'total_posts' ] ) : 0;

               return $delicious_count;
          }

          //for reddit url share count
          static function get_reddit( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );
               if ( isset( $apss_settings[ 'enable_cache' ] ) && $apss_settings[ 'enable_cache' ] == '1' ) {
                    $reddit_transient = 'reddit_' . md5( $url );
                    $reddit_transient_count = get_transient( $reddit_transient );
                    $cache_period = isset( $apss_settings[ 'cache_period' ] ) && $apss_settings[ 'cache_period' ] != '' ? $apss_settings[ 'cache_period' ] : 24;

                    if ( false === $reddit_transient_count ) {
                         $reddit_count = APSS_Class::reddit_share_count_api( $url );
                         set_transient( $reddit_transient, $reddit_count, $cache_period * HOUR_IN_SECONDS );
                         global $wpdb;
                         $transient_tbl_name = $wpdb -> prefix . 'transients';
                         $wpdb -> insert(
                                 $transient_tbl_name, array( 'transient_name' => $reddit_transient ), array( '%s' )
                         );
                    } else {
                         $reddit_count = $reddit_transient_count;
                    }
               } else {
                    $reddit_count = APSS_Class::reddit_share_count_api( $url );
               }
               return $reddit_count;
          }

          static function reddit_share_count_api( $url ){
               $json_string = self:: get_json_values( 'http://www.reddit.com/api/info.json?url=' . $url );
               $json = json_decode( $json_string, true );
               $reddit_count = isset( $json[ 'data' ][ 'children' ][ 0 ][ 'data' ][ 'score' ] ) ? intval( $json[ 'data' ][ 'children' ][ 0 ][ 'data' ][ 'score' ] ) : 0;
               return $reddit_count;
          }

          //for stumbleupon url share count
          static function get_stumble( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );
               if ( isset( $apss_settings[ 'enable_cache' ] ) && $apss_settings[ 'enable_cache' ] == '1' ) {
                    $cache_period = isset( $apss_settings[ 'cache_period' ] ) && $apss_settings[ 'cache_period' ] != '' ? $apss_settings[ 'cache_period' ] : 24;
                    $stumble_transient = 'stumble_' . md5( $url );
                    $stumble_transient_count = get_transient( $stumble_transient );

                    if ( false === $stumble_transient_count ) {
                         $stumble_count = APSS_Class::stumble_share_count_api( $url );
                         set_transient( $stumble_transient, $stumble_count, $cache_period * HOUR_IN_SECONDS );
                         global $wpdb;
                         $transient_tbl_name = $wpdb -> prefix . 'transients';
                         $wpdb -> insert(
                                 $transient_tbl_name, array( 'transient_name' => $stumble_transient ), array( '%s' )
                         );
                    } else {
                         $stumble_count = $stumble_transient_count;
                    }
               } else {
                    $stumble_count = APSS_Class::stumble_share_count_api( $url );
               }
               return $stumble_count;
          }

          static function stumble_share_count_api( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );
               $json_string = self:: get_json_values( 'http://www.stumbleupon.com/services/1.01/badge.getinfo?url=' . $url );
               $json = json_decode( $json_string, true );
               $stumble_count = isset( $json[ 'result' ][ 'views' ] ) ? intval( $json[ 'result' ][ 'views' ] ) : 0;
               return $stumble_count;
          }

          //for VKontakte url share count
          static function get_vk( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );
               if ( isset( $apss_settings[ 'enable_cache' ] ) && $apss_settings[ 'enable_cache' ] == '1' ) {
                    $cache_period = isset( $apss_settings[ 'cache_period' ] ) && $apss_settings[ 'cache_period' ] != '' ? $apss_settings[ 'cache_period' ] : 24;
                    $vk_transient = 'vk_' . md5( $url );
                    $vk_transient_count = get_transient( $vk_transient );
                    if ( false === $vk_transient_count ) {
                         $vk_count = APSS_Class::vk_share_count_api( $url );
                         set_transient( $vk_transient, $vk_count, $cache_period * HOUR_IN_SECONDS );
                         global $wpdb;
                         $transient_tbl_name = $wpdb -> prefix . 'transients';
                         $wpdb -> insert(
                                 $transient_tbl_name, array( 'transient_name' => $vk_transient ), array( '%s' )
                         );
                    } else {
                         $vk_count = $vk_transient_count;
                    }
               } else {
                    $vk_count = APSS_Class::vk_share_count_api( $url );
               }
               return $vk_count;
          }

          static function vk_share_count_api( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );
               $response = self:: get_json_values( 'http://vk.com/share.php?act=count&url=' . $url );

               // This API does not return JSON. Just plain text JS. Example:
               // 'VK.Share.count(0, 3779);'
               // From documentation, need to just grab the 2nd param: http://vk.com/developers.php?oid=-17680044&p=Share

               $matches = array();
               preg_match( '/^VK\.Share\.count\(\d, (\d+)\);$/i', $response, $matches );
               $vk_count = isset( $matches[ 1 ] ) ? intval( $matches[ 1 ] ) : 0;
               $stumble_count = isset( $json[ 'result' ][ 'views' ] ) ? intval( $json[ 'result' ][ 'views' ] ) : 0;
               return $vk_count;
          }

          //for Buffer url share count
          static function get_buffer( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );

               if ( isset( $apss_settings[ 'enable_cache' ] ) && $apss_settings[ 'enable_cache' ] == '1' ) {
                    $cache_period = isset( $apss_settings[ 'cache_period' ] ) && $apss_settings[ 'cache_period' ] != '' ? $apss_settings[ 'cache_period' ] : 24;
                    $buffer_transient = 'buffer_' . md5( $url );
                    $buffer_transient_count = get_transient( $buffer_transient );

                    if ( false === $buffer_transient_count ) {
                         $buffer_count = APSS_Class::buffer_share_count_api( $url );

                         set_transient( $buffer_transient, $buffer_count, $cache_period * HOUR_IN_SECONDS );
                         global $wpdb;
                         $transient_tbl_name = $wpdb -> prefix . 'transients';
                         $wpdb -> insert(
                                 $transient_tbl_name, array( 'transient_name' => $buffer_transient ), array( '%s' )
                         );
                    } else {
                         $buffer_count = $buffer_transient_count;
                    }
               } else {
                    $buffer_count = APSS_Class::buffer_share_count_api( $url );
               }
               return $buffer_count;
          }

          static function buffer_share_count_api( $url ){
               $apss_settings = get_option( APSS_SETTING_NAME );
               $json_string = self:: get_json_values( "https://api.bufferapp.com/1/links/shares.json?url=$url" );
               $json = json_decode( $json_string, true );
               $buffer_count = isset( $json[ 'shares' ] ) ? intval( $json[ 'shares' ] ) : 0;
               return $buffer_count;
          }

          //function to return json values from social media urls
          ////////////////////////////////////for count ends here/////////////////////////////////////////////

          /**
           * Clears the social share counter cache.
           */
          function apss_clear_cache(){
               if ( ! empty( $_GET ) && wp_verify_nonce( $_GET[ '_wpnonce' ], 'apss-clear-cache-nonce' ) ) {
                    global $wpdb;
                    $transient_tbl_name = $wpdb -> prefix . 'transients';
                    $transients = $wpdb -> get_results( "SELECT DISTINCT(transient_name) FROM $transient_tbl_name" );
                    foreach ( $transients as $transient ) {
                         delete_transient( $transient -> transient_name );
                    }
                    $wpdb -> query( "TRUNCATE $transient_tbl_name" );

                    wp_redirect( admin_url() . 'admin.php?page=apss-share-pro&message=3' );
               }
          }

          //registration of the social share widget
          function register_apss_widget(){
               register_widget( 'APSS_Widget' );
          }

          //function for the options of pinit over all images
          function pinit_js_config( $url ){
               if ( FALSE === strpos( $url, 'pinit' ) || FALSE === strpos( $url, '.js' ) || FALSE === strpos( $url, 'pinterest.com' ) ) {
                    // this isn't a Pinterest URL, ignore it
                    return $url;
               }
               $options = get_option( APSS_SETTING_NAME );
               $hover_op = $options[ 'pin_it_button_options' ][ 'enabled' ];
               $return_string = "' async";
               $size_op = $options[ 'pin_it_button_options' ][ 'icon_size' ];
               $shape_op = $options[ 'pin_it_button_options' ][ 'icon_shape' ];

               // if image hover is enabled, append the data-pin-hover attribute
               if ( isset( $hover_op ) && $hover_op == "1" ) {
                    $return_string = "$return_string data-pin-hover='true";
               }

               // add the size only if it's set to something besides small
               if ( isset( $size_op ) ) {
                    if ( $size_op == "28" || $size_op == "32" ) {
                         $return_string = "$return_string' data-pin-height='$size_op";
                    }
               }
               // add the shape
               if ( isset( $shape_op ) ) {
                    $return_string = "$return_string' data-pin-shape='$shape_op";
               }
               if ( $return_string == "" ) {
                    return $url;
               }
               return $url . $return_string;
          }

          ///////////////////////////for post meta options//////////////////////////////////
          /**
           * Adds a section in all the post and page section to disable the share options in frontend pages
           */
          function social_meta_box(){
               add_meta_box( 'ap-share-box', 'AccessPress social share options', array( $this, 'metabox_callback' ), '', 'side', 'core' );
          }

          function metabox_callback( $post ){
               wp_nonce_field( 'save_meta_values', 'ap_share_meta_nonce' );
               $content_flag = get_post_meta( $post -> ID, 'apss_content_flag', true );
               $widget_flag = get_post_meta( $post -> ID, 'apss_widget_flag', true );
               $sidebar_flag = get_post_meta( $post -> ID, 'apss_sidebar_flag', true );
               $popup_flag = get_post_meta( $post -> ID, 'apss_popup_flag', true );
               $flyin_flag = get_post_meta( $post -> ID, 'apss_popup_flag', true );
               $sticky_flag = get_post_meta( $post -> ID, 'apss_sticky_flag', true );
               ?>
               <label><input type="checkbox" value="1" name="apss_content_flag" <?php checked( $content_flag, true ) ?>/><?php _e( 'Hide share icons in content', 'ap-social-pro' ); ?></label><br>
               <label><input type="checkbox" value="1" name="apss_widget_flag" <?php checked( $widget_flag, true ) ?>/><?php _e( 'Hide share icons in widget', 'ap-social-pro' ); ?></label><br>
               <label><input type="checkbox" value="1" name="apss_sidebar_flag" <?php checked( $sidebar_flag, true ) ?>/><?php _e( 'Hide share icons in floating sidebar', 'ap-social-pro' ); ?></label><br>
               <label><input type="checkbox" value="1" name="apss_popup_flag" <?php checked( $popup_flag, true ) ?>/><?php _e( 'Hide social share popup', 'ap-social-pro' ); ?></label><br>
               <label><input type="checkbox" value="1" name="apss_flyin_flag" <?php checked( $flyin_flag, true ) ?>/><?php _e( 'Hide social share flyin', 'ap-social-pro' ); ?></label><br>
               <label><input type="checkbox" value="1" name="apss_sticky_flag" <?php checked( $sticky_flag, true ) ?>/><?php _e( 'Hide sticky header social share', 'ap-social-pro' ); ?></label>
               <?php
          }

          /**
           * Save Share Flags on post save
           */
          function save_meta_values( $post_id ){

               /*
                * We need to verify this came from our screen and with proper authorization,
                * because the save_post action can be triggered at other times.
                */

               // Check if our nonce is set.
               if ( ! isset( $_POST[ 'ap_share_meta_nonce' ] ) ) {
                    return;
               }

               // Verify that the nonce is valid.
               if ( ! wp_verify_nonce( $_POST[ 'ap_share_meta_nonce' ], 'save_meta_values' ) ) {
                    return;
               }

               // If this is an autosave, our form has not been submitted, so we don't want to do anything.
               if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
                    return;
               }

               // Check the user's permissions.
               if ( isset( $_POST[ 'post_type' ] ) && 'page' == $_POST[ 'post_type' ] ) {
                    if ( ! current_user_can( 'edit_page', $post_id ) ) {
                         return;
                    }
               } else {
                    if ( ! current_user_can( 'edit_post', $post_id ) ) {
                         return;
                    }
               }

               /* OK, it's safe for us to save the data now. */
               // Make sure that it is set.
               //$this->print_array($_POST);die();
               $content_flag = (isset( $_POST[ 'apss_content_flag' ] ) && $_POST[ 'apss_content_flag' ] == 1) ? 1 : 0;
               $widget_flag = (isset( $_POST[ 'apss_widget_flag' ] ) && $_POST[ 'apss_widget_flag' ] == 1) ? 1 : 0;
               $sidebar_flag = (isset( $_POST[ 'apss_sidebar_flag' ] ) && $_POST[ 'apss_sidebar_flag' ] == 1) ? 1 : 0;
               $popup_flag = (isset( $_POST[ 'apss_popup_flag' ] ) && $_POST[ 'apss_popup_flag' ] == 1) ? 1 : 0;
               $flyin_flag = (isset( $_POST[ 'apss_flyin_flag' ] ) && $_POST[ 'apss_flyin_flag' ] == 1) ? 1 : 0;
               $sticky_flag = (isset( $_POST[ 'apss_sticky_flag' ] ) && $_POST[ 'apss_sticky_flag' ] == 1) ? 1 : 0;


               // Update the meta field in the database.
               update_post_meta( $post_id, 'apss_content_flag', $content_flag );
               update_post_meta( $post_id, 'apss_widget_flag', $widget_flag );
               update_post_meta( $post_id, 'apss_sidebar_flag', $sidebar_flag );
               update_post_meta( $post_id, 'apss_popup_flag', $popup_flag );
               update_post_meta( $post_id, 'apss_flyin_flag', $flyin_flag );
               update_post_meta( $post_id, 'apss_sticky_flag', $sticky_flag );
          }

          function frontend_session(){
               include('inc/share/frontend/popup-session.php');
          }

          function frontend_email_popup_send(){
               include('inc/share/frontend/popup_email_send.php');
          }

          static function get_count( $profile_name, $url ){
               switch ( $profile_name ) {
                    case 'facebook':
                         $count = APSS_Class:: new_get_fb( $url );
                         break;

                    case 'twitter':
                         $count = APSS_Class:: get_tweets( $url );
                         break;

                    case 'google-plus':
                         $count = APSS_Class:: get_plusones( $url );
                         break;

                    case 'linkedin':
                         $count = APSS_Class:: get_linkedin( $url );
                         break;

                    case 'pinterest':
                         $count = APSS_Class:: get_pinterest( $url );
                         break;

                    case 'delicious':
                         $count = APSS_Class:: get_delicious( $url );
                         break;

                    case 'stumbleupon':
                         $count = APSS_Class:: get_stumble( $url );
                         break;

                    case 'vkontakte':
                         $count = APSS_Class:: get_vk( $url );
                         break;

                    case 'reddit':
                         $count = APSS_Class:: get_reddit( $url );
                         break;

                    case 'buffer':
                         $count = APSS_Class:: get_buffer( $url );

                    default:
                         $count = 0;
                         break;
               }
               return $count;
          }

          static function frontend_counter(){
               if ( ! empty( $_GET ) && wp_verify_nonce( $_GET[ '_wpnonce' ], 'apss-ajax-nonce' ) ) {

                    $apss_settings = $this -> apss_settings;
                    $count_format = $apss_settings[ 'counter_type_options' ];
                    $new_detail_array = array();
                    if ( isset( $_POST[ 'data' ] ) ) {
                         $details = $_POST[ 'data' ];
                         foreach ( $details as $detail ) {
                              $new_detail_array[ $detail[ 'network' ] ] = $this -> get_formatted_count( $this -> get_count( $detail[ 'network' ], $detail[ 'url' ] ), $count_format );
                         }
                    } else {
                         $shortcode_data = $_POST[ 'shortcode_data' ];
                         foreach ( $shortcode_data as $detail ) {
                              $detail_array = explode( '_', $detail );
                              $url = trim( $detail_array[ 0 ] );
                              $network = $detail_array[ 1 ];
                              $new_detail_array[] = $this -> get_formatted_count( $this -> get_count( $network, $url ), $count_format );
                         }
                    }
                    die( json_encode( $new_detail_array ) );
               }
          }

          //frontend counter only Shortcode
          function apss_count_shortcode( $attr ){
               ob_start();
               include( 'inc/share/frontend/count_shortcode.php' );
               $html = ob_get_contents();
               ob_get_clean();
               return $html;
          }

          static function short_bitly( $url, $user, $api ){
               $params = http_build_query(
                       array(
                           'login' => $user,
                           'apiKey' => $api,
                           'longUrl' => $url,
                           'format' => 'json',
                       )
               );
               $shorten_url = 'https://api-ssl.bitly.com/v3/shorten?' . $params;
               $response = wp_remote_get( $shorten_url );
               // if we get a valid response, save the url as meta data for this post
               if ( ! is_wp_error( $response ) ) {
                    $json = json_decode( wp_remote_retrieve_body( $response ) );
                    if ( isset( $json -> data -> url ) ) {
                         $result = $json -> data -> url;
                    }
               } else {
                    $result = 0;
               }
               return $result;
          }

          static function short_rebrandly( $url_short, $rebrandly_domain_id, $rebrandly_api_key ){
               if ( $rebrandly_domain_id != '' ) {
                    $result = wp_remote_post( 'https://api.rebrandly.com/v1/links', array( 'body' => json_encode( array( 'destination' => esc_url_raw( $url_short ), 'domain' => array( 'id' => $rebrandly_domain_id ) ) ),
                        'headers' => array( 'Content-Type' => 'application/json', 'apikey' => $rebrandly_api_key ) ) );
               } else {
                    $result = wp_remote_post( 'https://api.rebrandly.com/v1/links', array( 'body' => json_encode( array( 'destination' => esc_url_raw( $url_short ) ) ),
                        'headers' => array( 'Content-Type' => 'application/json', 'apikey' => $rebrandly_api_key ) ) );
               }
               if ( is_wp_error( $result ) ) {
                    return $url_short;
               }

               $result = json_decode( $result [ 'body' ] );
               $shortlink = isset( $result -> shortUrl ) ? $result -> shortUrl : '';

               if ( $shortlink != '' ) {
                    $shortlink = 'https://' . $shortlink;
                    return $shortlink;
               }
               return $url_short;
          }

          static function short_post( $url_short, $post_api_key ){

               $result = wp_remote_get( 'http://po.st/api/shorten?longUrl=' . esc_url_raw( $url_short ) . '&apiKey=' . $post_api_key );

               // Return the URL if the request got an error.
               if ( is_wp_error( $result ) )
                    return $url_short;

               $result = json_decode( $result [ 'body' ] );
               $shortlink = isset( $result -> short_url ) ? $result -> short_url : '';

               if ( $shortlink != '' ) {
                    return $shortlink;
               }

               return $url_short;
          }

          static function short_wp_function( $url_short ){
               $short_url = wp_get_shortlink( $post_id = '' );
               $url_parts = parse_url( $url_short );
               if ( isset( $url_parts[ 'query' ] ) ) {
                    $short_url = APSS_Class::apss_attach_tracking_code( $short_url, $url_parts[ 'query' ] );
               }
               return $short_url;
          }

          public static function apss_attach_tracking_code( $url, $code = '' ){
               $posParamSymbol = strpos( $url, '?' );

               $code = str_replace( '&', '%26', $code );

               if ( $posParamSymbol === false ) {
                    $url .= '?';
               } else {
                    $url .= '%93';
               }

               $url .= $code;
               return $url;
          }

          function buddypress_social_share(){
               if ( in_array( 'buddypress', $this -> apss_settings[ 'share_options' ] ) ) {
                    ob_start();
                    include('inc/share/frontend/buddypress-share.php');
                    $html_content = ob_get_contents();
                    ob_get_clean();
                    $icon_set_value = $this -> apss_settings[ 'social_icon_set' ];

                    $counter_enable_options = $this -> apss_settings[ 'counter_enable_options' ];
                    if ( $counter_enable_options == '1' ) {
                         $counter_class = 'counter-enable';
                    } else {
                         $counter_class = '';
                    }

                    if ( isset( $options[ 'share_locations' ] ) ) {
                         $share_locations_class = $options[ 'share_locations' ];
                    } else {
                         $share_locations_class = 'left';
                    }
                    ?>
                    <span class="apss-bp-social-button"><a class="button item-button bp-secondary-action buddypress-social-button" rel="nofollow">Share</a></span>
                    <br />
                    <div class="apss-social-share-buddypress" style="display:none">
                         <?php
                         echo "<div class='apss-social-share apss-theme-$icon_set_value $counter_class apss-buttons-$share_locations_class clearfix' >" . $html_content . "</div>";
                         ?>
                    </div>
                    <?php
               }
          }

          function apss_temp(){
               ?>
               <span class="apss-temp" style="font-size:14px;position:relative;z-index:99999;"></span>
               <?php
          }

          public static function get_http_url( $url ){
               return preg_replace( '/https:/i', 'http:', $url );
          }

     }

//APSS_Class termination

     $apss_object = new APSS_Class();
}