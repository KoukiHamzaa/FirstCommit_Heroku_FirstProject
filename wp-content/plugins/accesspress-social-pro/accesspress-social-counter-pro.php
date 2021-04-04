<?php
/**
 * Declaration of necessary constants for plugin
 * */
if ( ! defined( 'SC_IMAGE_DIR' ) ) {
     define( 'SC_PRO_IMAGE_DIR', plugin_dir_url( __FILE__ ) . 'images/counter' );
}
if ( ! defined( 'SC_JS_DIR' ) ) {
     define( 'SC_PRO_JS_DIR', plugin_dir_url( __FILE__ ) . 'js/counter' );
}
if ( ! defined( 'SC_CSS_DIR' ) ) {
     define( 'SC_PRO_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css/counter' );
}
defined( 'SC_PRO_PATH' ) or define( 'SC_PRO_PATH', plugin_dir_path( __FILE__ ) . 'inc/counter' );
if ( ! defined( 'SC_VERSION' ) ) {
     define( 'SC_PRO_VERSION', '2.0.7' );
}
if ( ! defined( 'APSC_TD' ) ) {
     define( 'APSC_TD', 'ap-social-pro' );
}
/**
 * Register of widgets
 * */
include_once('inc/counter/backend/widget.php');
if ( ! class_exists( 'SC_PRO_Class' ) ) {

     class SC_PRO_Class{

          var $apsc_settings;

          function __construct(){
               $this -> apsc_settings = get_option( 'apsc_settings' );
               //register_activation_hook(__FILE__, array($this, 'load_default_settings')); //loads default settings for the plugin while activating the plugin
               add_action( 'init', array( $this, 'plugin_text_domain' ) ); //loads text domain for translation ready
               add_action( 'admin_menu', array( $this, 'add_sc_menu' ) ); //adds plugin menu in wp-admin
               add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_assets' ) ); //registers admin assests such as js and css
               add_action( 'wp_enqueue_scripts', array( $this, 'register_frontend_assets' ) ); //registers js and css for frontend
               add_action( 'admin_post_apsc_settings_action', array( $this, 'apsc_settings_action' ) ); //recieves the posted values from settings form
               add_action( 'admin_post_apsc_restore_default', array( $this, 'apsc_restore_default' ) ); //restores default settings;
               add_action( 'widgets_init', array( $this, 'register_apsc_widget' ) ); //registers the widget
               add_action( 'add_meta_boxes', array( $this, 'social_counter_meta_box' ) ); //for providing the option to disable the social share option in each frontend page
               add_action( 'save_post', array( $this, 'save_meta_values' ) ); //function to save the post meta values of a plugin.
               add_shortcode( 'aps-counter-pro', array( $this, 'apsc_shortcode' ) ); //adds a shortcode
               add_shortcode( 'aps-get-count', array( $this, 'apsc_count_shortcode' ) ); //adds a shortcode to get single social profile counter.
               add_action( 'admin_post_apsc_delete_cache', array( $this, 'apsc_delete_cache' ) ); //deletes the counter values from cache
               add_action( 'wp_footer', array( $this, 'social_counter_floatbar' ) ); //appends the floating sidebar in the body
               add_action( 'wp_head', array( $this, 'head_hook' ) );

               add_action( 'admin_post_apsc_plugin_settings_download', array( $this, 'apsc_plugin_settings_download' ) );
               add_filter( 'upload_mimes', array( $this, 'custom_upload_json' ) ); // To allow upload of Json File

               add_action( 'wp_ajax_apsc_imported_settings_ajax_action', array( $this, 'imported_file' ) ); // Set the imported settings in the plugin
               add_action( 'wp_ajax_nopriv_apsc_imported_settings_ajax_action', array( $this, 'imported_file' ) ); // Set the imported settings in the plugin
          }

          function custom_upload_json( $mimes = array() ){
               //$mimes[ 'json' ] = "text/json";
               $mimes[ 'json' ] = "json";
               return $mimes;
          }

          function imported_file(){
               if ( isset( $_POST[ '_wpnonce' ] ) && wp_verify_nonce( $_POST[ '_wpnonce' ], 'apsc_backend_nonce' ) ) {
                    $imported_data = sanitize_text_field( stripslashes( $_POST[ 'imported_data' ] ) );
                    $imported_file_values = json_decode( $imported_data, True );
                    update_option( APSS_SETTING_NAME, $imported_file_values );
                    die();
               }
          }

          function apsc_plugin_settings_download(){
               if ( ! empty( $_GET[ '_wpnonce' ] ) && wp_verify_nonce( $_GET[ '_wpnonce' ], 'apsc_plugin_settings_download_nonce' ) ) {
                    header( "Content-type: application/force-download" );
                    header( 'Content-Disposition: inline; filename="ap_Social_Counter' . date( 'YmdHis' ) . '.json"' );

                    $options = get_option( APSS_SETTING_NAME );
                    $results = json_encode( $options );

                    if ( empty( $results ) ) {
                         return;
                    } else {
                         echo $results;
                    }
               }
          }

          /**
           * Plugin Translation
           */
          function plugin_text_domain(){
               load_plugin_textdomain( 'ap-social-pro', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
          }

          /**
           * Load Default Settings
           * */
          static function load_default_settings(){
               include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
               if ( is_plugin_active( 'accesspress-social-counter/accesspress-social-counter.php' ) ) {
                    wp_die( __( 'You need to deactivate AccessPress Social Counter Plugin in order to activate AccessPress Social Pro plugin.Please deactivate free one.', 'accesspress-social-counter' ) );
               }
               if ( ! get_option( 'apsc_settings' ) ) {
                    include(SC_PRO_PATH . '/backend/activation.php');
                    update_option( 'apsc_settings', $apsc_settings );
               }
          }

          /**
           * Plugin Admin Menu
           */
          function add_sc_menu(){
               add_menu_page( __( 'AccessPress Social Pro', 'ap-social-pro' ), __( 'AccessPress Social Pro', 'ap-social-pro' ), 'manage_options', 'ap-social-counter-pro', array( $this, 'sc_settings' ), 'dashicons-share' );
               add_submenu_page( 'ap-social-counter-pro', __( 'Social Counter Pro', 'ap-social-pro' ), __( 'Social Counter Pro', 'ap-social-pro' ), 'manage_options', 'ap-social-counter-pro', array( $this, 'sc_settings' ), SC_PRO_IMAGE_DIR . '/sc-icon.png' );
               add_submenu_page( 'ap-social-counter-pro', __( 'Social Share Pro', 'ap-social-pro' ), __( 'Social Share Pro', 'ap-social-pro' ), 'manage_options', 'apss-share-pro', array( 'APSS_Class', 'main_page' ), APSS_IMAGE_DIR . '/apss-icon.png' );
               add_submenu_page( 'ap-social-counter-pro', __( 'Shortcode Generator', 'ap-social-pro' ), __( 'Shortcode Generator', 'ap-social-pro' ), 'manage_options', 'apss-shortcode-generator', array( 'APSS_Class', 'shortcode_generator' ), APSS_IMAGE_DIR . '/apss-icon.png' );
               add_submenu_page( 'ap-social-counter-pro', __( 'How To Use', 'ap-social-pro' ), __( 'How To Use', 'ap-social-pro' ), 'manage_options', 'how-to-use', array( $this, 'how_to_use' ), APSS_IMAGE_DIR . '/apss-icon.png' );
               add_submenu_page( 'ap-social-counter-pro', __( 'About Us', 'ap-social-pro' ), __( 'About Us', 'ap-social-pro' ), 'manage_options', 'about-us', array( $this, 'about_us' ), APSS_IMAGE_DIR . '/apss-icon.png' );
               add_submenu_page( 'ap-social-counter-pro', __( 'More WordPress Resources', 'ap-social-pro' ), __( 'More WordPress Reso
                urces', 'ap-social-pro' ), 'manage_options', 'more-wordpress-resources', array( $this, 'more_wordpress_resources' ), APSS_IMAGE_DIR . '/apss-icon.png' );
          }

          function how_to_use(){
               include('inc/counter/backend/boards/how-to-use.php');
          }

          function more_wordpress_resources(){
               include('inc/counter/backend/boards/stuff.php');
          }

          function about_us(){
               include('inc/counter/backend/boards/about.php');
          }

          /**
           * Plugin Main Settings Page
           */
          function sc_settings(){
               include('inc/counter/backend/settings.php');
          }

          /**
           * Registering of backend js and css
           */
          function register_admin_assets(){
               $screen = get_current_screen();
               if ( (isset( $_GET[ 'page' ] ) && ($_GET[ 'page' ] == 'ap-social-counter-pro' || $_GET[ 'page' ] == 'how-to-use' || $_GET[ 'page' ] == 'about-us' || $_GET[ 'page' ] == 'more-wordpress-resources' ) ) || $screen -> id == 'widgets' ) {
                    wp_enqueue_style( 'wp-color-picker' );
                    wp_enqueue_script( 'wp-color-picker' );
                    wp_enqueue_style( 'sc-admin-css', SC_PRO_CSS_DIR . '/backend.css', array(), SC_PRO_VERSION );
                    wp_enqueue_script( 'sc-admin-js', SC_PRO_JS_DIR . '/backend.js', array( 'jquery', 'jquery-ui-sortable', 'wp-color-picker' ), SC_PRO_VERSION );
                    wp_enqueue_script( 'sc-wpac-time-js', SC_PRO_JS_DIR . '/wpac-time.js', array( 'jquery' ), SC_PRO_VERSION ); // Third Party API for Facebook followers count
                    wp_enqueue_script( 'sc-wpac-js', SC_PRO_JS_DIR . '/wpac.js', array( 'jquery' ), SC_PRO_VERSION );  // Third Party API for Facebook followers count
                    wp_enqueue_style( 'fontawesome-css', SC_PRO_CSS_DIR . '/font-awesome/font-awesome.min.css', false, SC_PRO_VERSION );
                    wp_enqueue_style( 'apsc-socicon', SC_PRO_CSS_DIR . '/socicon/style.css', false, APSS_VERSION );
                    wp_enqueue_media();
                    $ajax_nonce = wp_create_nonce( 'apsc_backend_nonce' );
                    wp_localize_script( 'sc-admin-js', 'apsc_backend_js_obj', array(
                        'ajax_url' => admin_url() . 'admin-ajax.php',
                        'ajax_nonce' => $ajax_nonce ) );
               }
          }

          /**
           * Registers Frontend Assets
           * */
          function register_frontend_assets(){
               wp_enqueue_style( 'apsc-font-awesome', SC_PRO_CSS_DIR . '/font-awesome/font-awesome.css', array(), SC_PRO_VERSION );
               wp_enqueue_style( 'apsc-googlefont-roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,500,700,900,100', array(), false );
               wp_enqueue_style( 'apsc-frontend-css', SC_PRO_CSS_DIR . '/frontend.css', array( 'apsc-font-awesome' ), SC_PRO_VERSION );
               wp_enqueue_script( 'apsc-frontend-script', SC_PRO_JS_DIR . '/frontend.js', array( 'jquery' ), SC_PRO_VERSION, true );
          }

          /**
           * Saves settings to database
           */
          function apsc_settings_action(){
               if ( ! empty( $_POST ) && wp_verify_nonce( $_POST[ 'apsc_settings_nonce' ], 'apsc_settings_action' ) ) {
                    include('inc/counter/backend/save-settings.php');
               }
          }

          /**
           * Prints array in pre format
           */
          function print_array( $array ){
               echo "<pre>";
               print_r( $array );
               echo "</pre>";
          }

          /**
           * Restores the default
           */
          function apsc_restore_default(){
               if ( ! empty( $_GET ) && wp_verify_nonce( $_GET[ '_wpnonce' ], 'apsc-restore-default-nonce' ) ) {
                    $apsc_settings = $this -> get_default_settings();
                    update_option( 'apsc_settings', $apsc_settings );
                    wp_redirect( admin_url() . 'admin.php?page=ap-social-counter-pro&message=2' );
               }
          }

          /**
           * Returns Default Settings
           */
          function get_default_settings(){
               include(SC_PRO_PATH . '/backend/activation.php');
               // echo"<pre>";
               // print_r($apsc_settings);
               // echo "</pre>";
               // exit;
               return $apsc_settings;
          }

          /**
           * AccessPress Social Counter Widget
           */
          function register_apsc_widget(){
               register_widget( 'APSC_PRO_Widget' );
          }

          ///////////////////////////for post meta options//////////////////////////////////
          /**
           * Adds a section in all the post and page section to disable the share options in frontend pages
           */
          function social_counter_meta_box(){
               add_meta_box( 'apsc-floating-counter-box', 'AccessPress Social Counter Pro options', array( $this, 'metabox_callback' ), '', 'side', 'core' );
          }

          function metabox_callback( $post ){
               wp_nonce_field( 'save_meta_values', 'apsc_meta_nonce' );
               $sidebar_flag = get_post_meta( $post -> ID, 'apsc_sidebar_flag', true );
               ?>
               <label><input type="checkbox" value="1" name="apsc_sidebar_flag" <?php checked( $sidebar_flag, true ) ?>/><?php _e( 'Hide floating sidebar', 'ap-social-pro' ); ?></label>
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
               if ( ! isset( $_POST[ 'apsc_meta_nonce' ] ) ) {
                    return;
               }

               // Verify that the nonce is valid.
               if ( ! wp_verify_nonce( $_POST[ 'apsc_meta_nonce' ], 'save_meta_values' ) ) {
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
               // $this->print_array($_POST);die();
               $sidebar_flag = (isset( $_POST[ 'apsc_sidebar_flag' ] ) && $_POST[ 'apsc_sidebar_flag' ] == 1) ? 1 : 0;

               // Update the meta field in the database.
               update_post_meta( $post_id, 'apsc_sidebar_flag', $sidebar_flag );
          }

          /**
           * Adds Shortcode
           */
          function apsc_shortcode( $atts ){
               ob_start();
               include('inc/counter/frontend/shortcode.php');
               $html = ob_get_contents();
               ob_get_clean();
               return $html;
          }

          /**
           *
           * Counter Only Shortcode
           * */
          function apsc_count_shortcode( $atts ){
               if ( isset( $atts[ 'social_media' ] ) ) {
                    $count = $this -> get_count( $atts[ 'social_media' ] );
                    if ( isset( $atts[ 'count_format' ] ) && $count != '' ) {
                         $count = $this -> get_formatted_count( $count, $atts[ 'count_format' ] );
                    }
                    return $count;
               }
          }

          /**
           * Clears the counter cache
           */
          function apsc_delete_cache(){
               if ( ! empty( $_GET ) && wp_verify_nonce( $_GET[ '_wpnonce' ], 'apsc-cache-nonce' ) ) {
                    $transient_array = array( 'apsc_facebook',
                        'apsc_twitter',
                        'apsc_youtube',
                        'apsc_instagram',
                        'apsc_google-plus',
                        'apsc_soundcloud',
                        'apsc_dribbble',
                        'apsc_github',
                        'apsc_envato',
                        'apsc_forrst',
                        'apsc_vimeo',
                        'apsc_pinterest',
                        'apsc_vk',
                        'apsc_behance',
                        'apsc_flickr',
                        'apsc_envato',
                        'apsc_posts',
                        'apsc_comments',
                        'apsc_linkedin',
                        'apsc_rss',
                        'apsc_spotify',
                        'apsc_twitch',
                        'apsc_feedly',
                        'apsc_slideshare',
                        'apsc_foursquare',
                        'apsc_delicious',
                        'apsc_weheartit',
                    );
                    foreach ( $transient_array as $transient ) {
                         delete_transient( $transient );
                    }

                    wp_redirect( admin_url() . 'admin.php?page=ap-social-counter-pro&message=3' );
               }
          }

          function authorization( $user, $consumer_key, $consumer_secret, $oauth_access_token, $oauth_access_token_secret ){
               $query = 'screen_name=' . $user;
               $signature = $this -> signature( $query, $consumer_key, $consumer_secret, $oauth_access_token, $oauth_access_token_secret );

               return $this -> header( $signature );
          }

          function signature_base_string( $url, $query, $method, $params ){
               $return = array();
               ksort( $params );

               foreach ( $params as $key => $value ) {
                    $return[] = $key . '=' . $value;
               }

               return $method . "&" . rawurlencode( $url ) . '&' . rawurlencode( implode( '&', $return ) ) . '%26' . rawurlencode( $query );
          }

          function signature( $query, $consumer_key, $consumer_secret, $oauth_access_token, $oauth_access_token_secret ){
               $oauth = array(
                   'oauth_consumer_key' => $consumer_key,
                   'oauth_nonce' => hash_hmac( 'sha1', time(), true ),
                   'oauth_signature_method' => 'HMAC-SHA1',
                   'oauth_token' => $oauth_access_token,
                   'oauth_timestamp' => time(),
                   'oauth_version' => '1.0'
               );
               $api_url = 'https://api.twitter.com/1.1/users/show.json';
               $base_info = $this -> signature_base_string( $api_url, $query, 'GET', $oauth );
               $composite_key = rawurlencode( $consumer_secret ) . '&' . rawurlencode( $oauth_access_token_secret );
               $oauth_signature = base64_encode( hash_hmac( 'sha1', $base_info, $composite_key, true ) );
               $oauth[ 'oauth_signature' ] = $oauth_signature;

               return $oauth;
          }

          public function header( $signature ){
               $return = 'OAuth ';
               $values = array();

               foreach ( $signature as $key => $value ) {
                    $values[] = $key . '="' . rawurlencode( $value ) . '"';
               }

               $return .= implode( ', ', $values );

               return $return;
          }

          /**
           * Returns twitter count
           */
          function get_twitter_count(){
               $apsc_settings = $this -> apsc_settings;
               $user = $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'username' ];
               $api_url = 'https://api.twitter.com/1.1/users/show.json';
               $params = array(
                   'method' => 'GET',
                   'sslverify' => false,
                   'timeout' => 60,
                   'headers' => array(
                       'Content-Type' => 'application/x-www-form-urlencoded',
                       'Authorization' => $this -> authorization(
                               $user, $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'consumer_key' ], $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'consumer_secret' ], $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'access_token' ], $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'access_token_secret' ]
                       )
                   )
               );

               $connection = wp_remote_get( $api_url . '?screen_name=' . $user, $params );
               if ( is_wp_error( $connection ) ) {
                    $count = 0;
               } else {
                    $_data = json_decode( $connection[ 'body' ], true );
                    if ( isset( $_data[ 'followers_count' ] ) ) {
                         $count = intval( $_data[ 'followers_count' ] );
                    } else {
                         $count = 0;
                    }
               }
               return $count;
          }

          /**
           * Social Counter Floating Sidebar
           */
          function social_counter_floatbar(){
               $apsc_settings = $this -> apsc_settings;
               if ( isset( $apsc_settings[ 'floating_sidebar' ][ 'active' ] ) && $apsc_settings[ 'floating_sidebar' ][ 'active' ] == 1 ) {


                    switch ( $apsc_settings[ 'floating_sidebar' ][ 'show' ] ) {
                         case 'all':
                              global $post;
                              if ( isset( $post -> ID ) ) {
                                   $sidebar_flag = get_post_meta( $post -> ID, 'apsc_sidebar_flag', true );
                              } else {
                                   $sidebar_flag = 0;
                              }

                              if ( $sidebar_flag != '1' ) {
                                   include('inc/counter/frontend/floating-sidebar.php');
                              }
                              break;
                         case 'only_homepage':
                              if ( is_front_page() ) {
                                   global $post;
                                   if ( isset( $post -> ID ) ) {
                                        $sidebar_flag = get_post_meta( $post -> ID, 'apsc_sidebar_flag', true );
                                   } else {
                                        $sidebar_flag = 0;
                                   }

                                   if ( $sidebar_flag != '1' ) {
                                        include('inc/counter/frontend/floating-sidebar.php');
                                   }
                              }
                              break;
                         case 'except_homepage':
                              if ( ! is_front_page() ) {
                                   global $post;
                                   if ( isset( $post -> ID ) ) {
                                        $sidebar_flag = get_post_meta( $post -> ID, 'apsc_sidebar_flag', true );
                                   } else {
                                        $sidebar_flag = 0;
                                   }

                                   if ( $sidebar_flag != '1' ) {
                                        include('inc/counter/frontend/floating-sidebar.php');
                                   }
                              }
                              break;
                         default:
                              break;
                    }
               }
          }

          function get_count( $profile ){
               include('inc/counter/frontend/api.php');
               if ( isset( $count ) && $count != '' ) {
                    return $count;
               } else {
                    return 0;
               }
          }

          /**
           *
           * @param int $count
           * @param string $format
           */
          function get_formatted_count( $count, $format ){
               switch ( $format ) {
                    case 'comma':
                         $count = number_format( $count );
                         break;
                    case 'short':
                         $count = $this -> abreviateTotalCount( $count );
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
          function abreviateTotalCount( $value ){

               $abbreviations = array( 12 => 'T', 9 => 'B', 6 => 'M', 3 => 'K', 0 => '' );

               foreach ( $abbreviations as $exponent => $abbreviation ) {

                    if ( $value >= pow( 10, $exponent ) ) {

                         return round( floatval( $value / pow( 10, $exponent ) ), 1 ) . $abbreviation;
                    }
               }
          }

          function head_hook(){
               $apsc_settings = $this -> apsc_settings;
               if ( isset( $apsc_settings[ 'mobile_hide' ] ) && $apsc_settings[ 'mobile_hide' ] == 1 ) {
                    ?>
                    <style>
                         @media (max-width:768px){
                              .apsc-floating-sidebar{
                                   display:none;
                              }

                         }
                    </style>
                    <?php
               }
          }

          function facebook_count( $url ){

               // Query in FQL
               $fql = "SELECT like_count ";
               $fql .= " FROM link_stat WHERE url = '$url'";

               $fqlURL = "https://api.facebook.com/method/fql.query?format=json&query=" . urlencode( $fql );

               // Facebook Response is in JSON
               $response = file_get_contents( $fqlURL );
               $response = json_decode( $response );
               if ( is_array( $response ) && isset( $response[ 0 ] -> like_count ) ) {
                    return $response[ 0 ] -> like_count;
               } else {
                    $count = 0;
                    return $count;
               }
          }

          /**
           * Get Facebook Access Token
           * */
          function get_fb_access_token(){
               $apsc_settings = $this -> apsc_settings;
               $api_url = 'https://graph.facebook.com/';
               $url = sprintf(
                       '%soauth/access_token?client_id=%s&client_secret=%s&grant_type=client_credentials', $api_url, $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'app_id' ], $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'app_secret' ]
               );
               $access_token = wp_remote_get( $url, array( 'timeout' => 60 ) );

               if ( is_wp_error( $access_token ) || ( isset( $access_token[ 'response' ][ 'code' ] ) && 200 != $access_token[ 'response' ][ 'code' ] ) ) {
                    return '';
               } else {
                    return sanitize_text_field( $access_token[ 'body' ] );
               }
          }

          /**
           * OLD Method of fb followers count extraction i.e. METHOD 1
           * */
          function method_one_fb_count_extraction(){
               $apsc_settings = $this -> apsc_settings;
               $access_token = $this -> get_fb_access_token();
               $access_token = json_decode( $access_token );
               $access_token = $access_token -> access_token;
               $api_url = 'https://graph.facebook.com/v3.0/'; //not working
               //$api_url = 'https://graph.facebook.com/v2.8/'; // not working
               //$api_url = 'https://graph.facebook.com/v3.2/'; // not working
               $url = sprintf(
                       '%s%s?fields=fan_count&access_token=%s', $api_url, $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'page_id' ], $access_token
               );
               $connection = wp_remote_get( $url, array( 'timeout' => 60 ) );

               if ( is_wp_error( $connection ) || ( isset( $connection[ 'response' ][ 'code' ] ) && 200 != $connection[ 'response' ][ 'code' ] ) ) {
                    $count = 0;
               } else {
                    $_data = json_decode( $connection[ 'body' ], true );
                    if ( isset( $_data[ 'fan_count' ] ) ) {
                         $count = intval( $_data[ 'fan_count' ] );
                    } else {
                         $count = 0;
                    }
               }
               return $count;
          }

          function method_two_fb_count_extraction(){
               $apsc_settings = $this -> apsc_settings;
               $fb_page_id = (isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'fb_page_id' ] ) && ! empty( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'fb_page_id' ] )) ? $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'fb_page_id' ] : ' ';
               $fb_access_token = (isset( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'access_token' ] ) && ! empty( $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'access_token' ] )) ? $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'access_token' ] : ' ';

               if ( $fb_access_token != '' && $fb_page_id != '' ) {
                    $api_url = 'https://graph.facebook.com/';
                    $url = sprintf(
                            '%s%s?fields=fan_count&access_token=%s', $api_url, $fb_page_id, $fb_access_token
                    );
               } else {
                    $url = 'https://graph.facebook.com/';
               }
               $connection = wp_remote_get( $url, array( 'timeout' => 60 ) );

               if ( is_wp_error( $connection ) || ( isset( $connection[ 'response' ][ 'code' ] ) && 200 != $connection[ 'response' ][ 'code' ] ) ) {
                    $count = 0;
               } else {
                    $_data = json_decode( $connection[ 'body' ], true );
                    if ( isset( $_data[ 'fan_count' ] ) ) {
                         $count = intval( $_data[ 'fan_count' ] );
                    } else {
                         $count = 0;
                    }
               }
               return $count;
          }

     }

     $sc_object = new SC_PRO_Class(); //initialization of plugin
}