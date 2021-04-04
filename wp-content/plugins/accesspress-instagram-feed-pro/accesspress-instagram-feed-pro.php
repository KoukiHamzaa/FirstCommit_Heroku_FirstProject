<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/*
Plugin name: AccessPress Instagram Feed Pro
Plugin URI: https://accesspressthemes.com/wordpress-plugins/accesspress-instagram-feed-pro/
Description: A plugin to add various instagram feeds to posts and pages with dynamic configuration options.
Version: 3.0.7
Author: AccessPress Themes
Author URI: http://accesspressthemes.com
Text Domain: accesspress-instagram-feed-pro
Domain Path: /languages/
License: GPLv2 or later
*/
//Decleration of the necessary constants for plugin
global $wpdb;
include('inc/mobile_detect.php');
if( !defined( 'APIF_VERSION' ) )
{
    define( 'APIF_VERSION', '3.0.7' );
}

if( !defined( 'APIF_IMAGE_DIR' ) )
{
    define( 'APIF_IMAGE_DIR', plugin_dir_url( __FILE__ ) . 'images' );
}

if( !defined( 'APIF_JS_DIR' ) )
{
    define( 'APIF_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );
}

if( !defined( 'APIF_CSS_DIR' ) )
{
    define( 'APIF_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' );
}

if( !defined( 'APIF_INST_PATH' ) )
{
    define( 'APIF_INST_PATH', plugin_dir_path( __FILE__ ) );
}

if( !defined( 'APIF_INST_INCLUDES_BACKEND_PATH' ) )
{
    define( 'APIF_INST_INCLUDES_BACKEND_PATH', plugin_dir_path( __FILE__ ) . 'inc/backend/');
}

if( !defined( 'APIF_LANG_DIR' ) )
{
    define( 'APIF_LANG_DIR', basename( dirname( __FILE__ ) ) . '/languages/' );
}

if( !defined( 'APIF_TEXT_DOMAIN' ) )
{
    define( 'APIF_TEXT_DOMAIN', 'accesspress-instagram-feed-pro' );
}

if( !defined( 'APIF_Instagram_Total_Count' ) )
{
    define( 'APIF_Instagram_Total_Count', 30 );
}

if( !defined( 'APIF_Instagram_Feeds_Table' ) )
{
    define( 'APIF_Instagram_Feeds_Table', $wpdb->prefix . "_apif_instagram_posts");
    // define( 'APIF_Instagram_Feeds_Table', $wpdb->prefix . "instagram_posts");
}
if( !defined( 'APIF_Instagram_Posts_Table' ) )
{
    define( 'APIF_Instagram_Posts_Table', $wpdb->prefix . "instagram_feeds");
}
if( !defined( 'APIF_MediaComments_Table' ) )
{
    define( 'APIF_MediaComments_Table', $wpdb->prefix . "apif_instagram_feeds_comments");
}
/**
 * Register of widgets
 *
 */
include_once( 'inc/class-instagram-media-users.php' );
include_once( 'inc/backend/widgetside.php' );
include_once( 'inc/backend/widget_integration.php');
include( 'inc/frontend/instagram.php');

if( !class_exists( 'IF_Pro_Class' ) )
{
    
    class IF_Pro_Class extends APIFPRO_MediaUsers
    {
        
        var $apif_settings;
        /**
         * Initializes the plugin functions
         */
        function __construct()
        {
            $this->apif_settings = get_option( 'apif_settings' );
            register_activation_hook( __FILE__, array($this, 'load_default_settings') );
            //plugin's table creation
           // register_activation_hook( __FILE__, array($this, 'my_plugin_create_db') );
            //loads default settings for the plugin while activating the plugin
            add_action( 'init', array($this, 'plugin_text_domain') );
            //loads text domain for translation ready
           // add_action( 'init', array($this, 'session_init') );
            //starts the session
            add_action( 'admin_menu', array($this, 'add_if_menu') );
            //adds plugin menu in wp-admin
            add_action( 'admin_enqueue_scripts', array($this, 'register_admin_assets') );
            //registers admin assests such as js and css
            add_action( 'wp_enqueue_scripts', array($this, 'register_frontend_assets') );
            //registers js and css for frontend
            add_action( 'admin_post_apif_settings_action', array($this, 'apif_settings_action') );
            //recieves the posted values from settings form
            add_action( 'admin_post_apif_new_feed', array($this, 'apif_add_feed') );
            //recieves the posted values from settings form
            add_action( 'admin_post_apif_edit_feed', array($this, 'apif_edit_feed') );
            //receives the posted values from settings form
            add_action( 'admin_post_apif_copy_action', array($this, 'apif_copy_action') );
            //recieves the posted values from settings form
            add_action( 'admin_post_apif_delete_action', array($this, 'apif_delete_action') );
            //recieves the posted values from settings form
            add_action( 'admin_post_apif_instagram_settings_action', array($this, 'apif_instagram_settings_action') );

            add_action( 'admin_post_apif_delete_cache', array($this, 'apif_delete_cache'));
            //recieves the posted values from settings form
            // add_action( 'admin_post_apif_restore_default', array($this, 'apif_restore_default') );
            //restores default settings;
            add_shortcode( 'ap_instagram_feed_pro', array($this, 'ap_instagram_feed_pro') );
            add_action( 'widgets_init', array($this, 'register_apif_widget') );
            //registers the widget
            
            // ajax call for load more function
            add_action( 'wp_ajax_load_more', array($this, 'load_more') );
            add_action( 'wp_ajax_nopriv_load_more', array($this, 'load_more') );
            // add_action( 'wp_footer', array($this, 'photoswipe_div'), 100 );
            add_action( 'wp_footer', array( $this, 'accesspress_popup') );
            //any user load more feeds ajax
            add_action( 'wp_ajax_load_more_by_userfeeds', array($this, 'load_more_by_userfeeds') );
            add_action( 'wp_ajax_nopriv_load_more_by_userfeeds', array($this, 'load_more_by_userfeeds') );

            //backend rebuild cache
             add_action( 'wp_ajax_rebuild_cache_settings', array($this, 'fn_rebuild_cache_settings') );

             //comment lists retrive and saved to database
             add_action( 'wp_ajax_get_media_comments', array($this, 'get_media_comments') );
             add_action( 'wp_ajax_nopriv_get_media_comments', array($this, 'get_media_comments') );

             //get media carousel images of specific feeds
             add_action( 'wp_ajax_get_carousel_feeds', array($this, 'get_carousel_feeds') );
             add_action( 'wp_ajax_nopriv_get_carousel_feeds', array($this, 'get_carousel_feeds') );
             add_action('template_redirect', array( $this, 'apif_insta_preview' ));
            
        }

        public function displayArr($array) {
            echo "<pre>";
            print_r($array);
            echo "</pre>";
        }

        /**
         * [apif_delete_cache description]
         * @return [type] [description]
         */
        function apif_delete_cache(){
            global $wpdb;

            $insta_posts = APIF_Instagram_Feeds_Table;
            if (!empty($_GET) && wp_verify_nonce($_GET['_wpnonce'], 'apif-delete-cache-nonce')) {
                delete_transient('any_user_feed_transient');
                delete_transient('tag_feed_transient');
                delete_transient('likes_feed_transient');
                delete_transient('recent_feed_transient');
                $insta_media_Ids = $wpdb->get_results("SELECT id FROM $insta_posts");
                if(isset($insta_media_Ids) && !empty($insta_media_Ids)){
                     $insta = new InstaWCD();
                     $insta_medias = $insta->objectToArray($insta_media_Ids);
                    foreach ($insta_medias as $key => $id_Val) {
                        $if_id =  $id_Val['id'];
                        delete_transient('any_user_timeline_feed_transient_'.$if_id);
                        delete_transient('hastag_transient_'.$if_id);
                    }
                }
                wp_redirect(admin_url().'admin.php?page=apif-settings&message=2');
            }
        }

        /**
         * Load Default Settings
         *
         */
        function load_default_settings(){
            if( !get_option( 'apif_settings' ) )
            {
                //include( 'inc/backend/activation.php' );
                $apif_settings = array(
                        'username' => '', 
                        'user_id' => '', 
                        'access_token' => '', 
                    );
              update_option( 'apif_settings', $apif_settings );
            }
            include( 'inc/backend/multisite-activation.php' );
        }

        /**
         * Plugin Translation
         */
        function plugin_text_domain(){
            load_plugin_textdomain( 'accesspress-instagram-feed-pro', false, basename( dirname( __FILE__ ) ) . '/languages/' );
        }

        /**
         * Starts the session
         */
       /* function session_init() 
        {
            if( !session_id() && !headers_sent())
            {
                session_start();
            }
        }*/

        /**
         * Plugin Admin Menu
         */
        function add_if_menu() 
        {
            add_menu_page( __( 'AP Instagram Feed Pro', 'accesspress-instagram-feed-pro' ), __( 'AP Instagram Feed Pro', 'accesspress-instagram-feed-pro' ), 'manage_options', 'ap-instagram-feed-pro', array($this, 'main_page'), APIF_IMAGE_DIR . '/sc-icon.png' );
            add_submenu_page( 'ap-instagram-feed-pro', __( 'Instagram Feeds', 'accesspress-instagram-feed-pro' ), __( 'Instagram Feeds', 'accesspress-instagram-feed-pro' ), 'manage_options', 'ap-instagram-feed-pro', array($this, 'main_page') );
            add_submenu_page( 'ap-instagram-feed-pro', __( 'Add New Feed', 'accesspress-instagram-feed-pro' ), __( 'Add New Feed', 'accesspress-instagram-feed-pro' ), 'manage_options', 'apif-add-feed', array($this, 'add_new_feed') );
            add_submenu_page( 'ap-instagram-feed-pro', __( 'Instagram Settings', 'accesspress-instagram-feed-pro' ), __( 'Instagram Settings', 'accesspress-instagram-feed-pro' ), 'manage_options', 'apif-settings', array($this, 'apif_settings') );
            add_submenu_page( 'ap-instagram-feed-pro', __( 'How to use', 'accesspress-instagram-feed-pro' ), __( 'How to use', 'accesspress-instagram-feed-pro' ), 'manage_options', 'apif-how-to-use', array($this, 'how_to_use') );
            add_submenu_page( 'ap-instagram-feed-pro', __( 'More WordPress Stuff', 'accesspress-instagram-feed-pro' ), __( 'More WordPress Stuff', 'accesspress-instagram-feed-pro' ), 'manage_options', 'apif-about', array($this, 'about') );
        }

        /**
         * Registering of backend js and css
         */
        function register_admin_assets()
        {

            if( isset( $_GET['page'] ) &&( $_GET['page'] == 'ap-instagram-feed-pro' || $_GET['page'] == 'apif-add-feed' || $_GET['page'] == 'apif-settings' || $_GET['page'] == 'apif-how-to-use' || $_GET['page'] == 'apif-about' ) )
            {
                wp_enqueue_style( 'apif-linearicons', APIF_CSS_DIR. '/linearicons.css');
                wp_enqueue_script( 'apif-lineariconjs', APIF_JS_DIR . '/linearicons.js',array( 'jquery'), APIF_VERSION );

                wp_enqueue_style( 'jquery-ui-css', APIF_CSS_DIR.'/jquery-ui.css', array(), APIF_VERSION );
                wp_enqueue_style( 'sc-admin-css', APIF_CSS_DIR . '/backend.css', array(), APIF_VERSION );
                
                // Add the color picker css file
                wp_enqueue_style( 'wp-color-picker' );
                wp_enqueue_script( 'apif-color-alpha', APIF_JS_DIR . '/wp-color-picker-alpha.js',array('wp-color-picker') ,false, APIF_VERSION );
               
                wp_enqueue_style( 'jquery-ui' );
            
                wp_enqueue_style( 'apsc-backend-font-awesome', APIF_CSS_DIR . '/font-awesome.min.css', array(), APIF_VERSION );
                
                wp_enqueue_script( 'sc-admin-js', APIF_JS_DIR . '/backend.js', array('jquery', 'jquery-ui-sortable', 'wp-color-picker'), APIF_VERSION );
                $ajax_nonce = wp_create_nonce( 'apif-admin-ajax-nonce' );
                $cache_message =  __('Cache Rebuild Successfully.','accesspress-instagram-feed-pro');
                $error_cache_message =  __('Couldnot rebuild cache. Please try again later.','accesspress-instagram-feed-pro');
                wp_localize_script( 'sc-admin-js', 'admin_ajax_object', 
                    array(
                        'ajax_url' => admin_url() . 'admin-ajax.php', 
                        'ajax_nonce' => $ajax_nonce,
                        'cache_message'=> $cache_message,
                         'error_cache_msg'=>$error_cache_message
                         ) 
                    );
            }
        }

        /**
         * Registers Frontend Assets
         *
         */
        function register_frontend_assets()
        {

            wp_enqueue_style( 'apif-linearicons', APIF_CSS_DIR. '/linearicons.css');
            wp_enqueue_script( 'apif-lineariconjs', APIF_JS_DIR . '/linearicons.js',array( 'jquery'), APIF_VERSION );
            wp_register_style( 'lightbox', APIF_CSS_DIR . '/lightbox.css', array(), APIF_VERSION );

            wp_register_style( 'owl-theme', APIF_CSS_DIR . '/owl.theme.css', array(), APIF_VERSION );
            wp_register_style( 'owl-carousel', APIF_CSS_DIR . '/owl.carousel.css', array(), APIF_VERSION );

            wp_register_style( 'apif-gridrotator', APIF_CSS_DIR . '/gridrotator.css', array(), APIF_VERSION );
            
            // for swipebox css
            wp_register_style( 'swipebox-core-style', APIF_CSS_DIR . '/swipebox/swipebox.min.css', array(), APIF_VERSION );
            // for swipebox css ends
            
            // for prettyphoto
            wp_register_style( 'apif-prettyphoto-lightbox', APIF_CSS_DIR . '/prettyphoto/prettyPhoto.css', array(), APIF_VERSION );
            // for prettyphoto ends
            
            //for litbx css
            wp_register_style( 'apif-litbx-lightbox', APIF_CSS_DIR . '/litbx/litbx.core.min.css', array(), APIF_VERSION );
            //for litbx css ends
            
            // for venobox.css
            wp_register_style( 'apif-venobox-lightbox', APIF_CSS_DIR . '/venobox/venobox.css', array(), APIF_VERSION );
            // for venobox.css ends
            
            // for bx slider
            wp_register_style( 'apif-bx-slider', APIF_CSS_DIR . '/bxslider/jquery.bxslider.css', array(), APIF_VERSION );
            // for bx slider
            
            // for thumbnail-scroller-master
            wp_register_style( 'apif-thumbnail-scroller-master', APIF_CSS_DIR . '/thumbnail-scroller-master/jquery.mThumbnailScroller.css', array(), APIF_VERSION );
            // for thumbnail-scroller-master ends
            
            // for nivo slider
            wp_register_style( 'apif-nivo-slider', APIF_CSS_DIR . '/nivo-slider/nivo-slider.css', array(), APIF_VERSION );
            wp_register_style( 'apif-nivo-slider-default-theme', APIF_CSS_DIR . '/nivo-slider/themes/default/default.css', array(), APIF_VERSION );
            wp_register_style( 'apif-nivo-slider-bar-theme', APIF_CSS_DIR . '/nivo-slider/themes/bar/bar.css', array(), APIF_VERSION );
            wp_register_style( 'apif-nivo-slider-dark-theme', APIF_CSS_DIR . '/nivo-slider/themes/dark/dark.css', array(), APIF_VERSION );
            wp_register_style( 'apif-nivo-slider-light-theme', APIF_CSS_DIR . '/nivo-slider/themes/light/light.css', array(), APIF_VERSION );
            // for nivo slider ends
            
            // for pgwslider
            wp_register_style( 'apif-pgw-slider', APIF_CSS_DIR . '/pgwslider/pgwslider.min.css', array(), APIF_VERSION );
            // for pgwslider ends
            
            // for sliderpro
            wp_register_style( 'apif-sliderpro', APIF_CSS_DIR . '/sliderpro/slider-pro.min.css', array(), APIF_VERSION );
            // for sliderpro ends
            
            wp_register_style( 'animate-style', APIF_CSS_DIR . '/animate.css', array(), APIF_VERSION );
            
            wp_enqueue_style( 'apsc-font-awesome', APIF_CSS_DIR . '/font-awesome.min.css', array(), APIF_VERSION );
            wp_enqueue_style( 'apif-frontend-css', APIF_CSS_DIR . '/frontend.css', array(), APIF_VERSION );
            
            wp_register_script( 'lightbox-js', APIF_JS_DIR . '/lightbox.js', array('jquery'), '2.8.1', true );
            wp_register_script( 'apif-isotope-pkgd-min-js', APIF_JS_DIR . '/isotope.pkgd.min.js', array('jquery'), '2.2.0', true );
          //  wp_register_script( 'apif-isotope-masonryhorizontal', APIF_JS_DIR . '/masonry-horizontal.js', array('jquery'), '2.2.0', true );
            wp_register_script( 'apif-isotope-packery', APIF_JS_DIR . '/packery.js', array('jquery'), '2.2.0', true );
            wp_register_script( 'apif-isotope-js', APIF_JS_DIR . '/isotope.js', array('jquery'), '2.2.0', true );
            wp_register_script( 'apif-imagesloaded-min-js', APIF_JS_DIR . '/imagesloaded.min.js', array('jquery'), '3.1.8', true );

            wp_register_script( 'apif-owl-carousel-js', APIF_JS_DIR . '/owl.carousel.js', array('jquery'),APIF_VERSION );
            // wp_enqueue_script( 'moment', APIF_JS_DIR . '/moment.js', array('jquery') );
            // wp_enqueue_script( 'livestamp', APIF_JS_DIR . '/livestamp.js', array('jquery', 'moment') );
            wp_register_script( 'apif-modernizr-custom', APIF_JS_DIR . '/modernizr.custom.26633.js', '', '1.0' );
            wp_register_script( 'apif-gridrotator', APIF_JS_DIR . '/jquery.gridrotator.js', array('jquery', 'apif-modernizr-custom'), '1.0' );
            

             // for jcarousel
            wp_register_script( 'apif-jcarousel-core', APIF_JS_DIR . '/jcarousel/jquery.jcarousel-core.js', array('jquery'), APIF_VERSION );
            wp_register_script( 'apif-jcarousel-skeleton', APIF_JS_DIR . '/jcarousel/jcarousel-skeleton.js', array('jquery', 'apif-jcarousel-core'), APIF_VERSION );
            wp_register_script( 'apif-jcarousel-control', APIF_JS_DIR . '/jcarousel/jquery.jcarousel-control.js', array('jquery', 'apif-jcarousel-core'), '1.0' );
            wp_register_script( 'apif-jcarousel-autoscroll', APIF_JS_DIR . '/jcarousel/jquery.jcarousel-autoscroll.js', array('jquery', 'apif-jcarousel-core'), '1.0' );
            // for jcarousel ends
            
            // for swipebox js
            wp_register_script( 'apif-swipebox-core-js', APIF_JS_DIR . '/swipebox/jquery.swipebox.min.js', array('jquery'), APIF_VERSION );
            // for swipebox js ends
            
            // for prettyphoto
            wp_register_script( 'apif-prettyphoto-lightbox-core-js', APIF_JS_DIR . '/prettyphoto/jquery.prettyPhoto.js', array('jquery'), APIF_VERSION );
            // for prettyphoto ends
            
            // for litbx
            wp_register_script( 'apif-litbx-core', APIF_JS_DIR . '/litbx/litbx.min.js', array('jquery'), APIF_VERSION );
            // for litbx ends
            
            // for venobox
            wp_register_script( 'apif-venobox-core', APIF_JS_DIR . '/venobox/venobox.min.js', array('jquery'), APIF_VERSION );
            // for venobox ends
            
            // for bx slider
            wp_register_script( 'apif-bxslider-core', APIF_JS_DIR . '/bxslider/jquery.bxslider.min.js', array('jquery'), APIF_VERSION );
            // for bx slider ends
            
            // for nivo slider
            wp_register_script( 'apif-nivoslider-core', APIF_JS_DIR . '/nivo-slider/jquery.nivo.slider.js', array('jquery'), APIF_VERSION );
            // for nivo slider ends
            
            // for pgw slider
            wp_register_script( 'apif-pgwslider-core', APIF_JS_DIR . '/pgwslider/pgwslider.min.js', array('jquery'), APIF_VERSION );
            // for pgw slider ends
            
            // for sliderpro
            wp_register_script( 'apif-sliderpro-core', APIF_JS_DIR . '/sliderpro/jquery.sliderPro.min.js', array('jquery'), APIF_VERSION );
            // for sliderpro ends
            
            // for thumbnail-scroller-master
            wp_register_script( 'apif-thumbnail-scroller-master-core', APIF_JS_DIR . '/thumbnail-scroller-master/jquery.mThumbnailScroller.js', array('jquery'), APIF_VERSION );
            // for thumbnail-scroller-master ends
            
            wp_register_script( 'wow-animation', APIF_JS_DIR . '/wow.js', array('jquery'), '1.0' );
        
            wp_register_script( 'apif-frontend-js', APIF_JS_DIR . '/frontend.js', array( 'jquery' ), APIF_VERSION );
            
            //for the frontend ajax call for load more option
            $ajax_nonce = wp_create_nonce( 'apif-ajax-nonce' );
            $apif_settings = get_option( 'apif_settings' );
            $link_enable = isset($apif_settings['enable_links']) ? $apif_settings['enable_links'] : '';
            wp_localize_script( 'apif-frontend-js', 'frontend_ajax_object', array('ajax_url' => admin_url() . 'admin-ajax.php', 'ajax_nonce' => $ajax_nonce, 'enable_links_in_username_and_tags' =>$link_enable) );
        }

        /**
         * Saves settings to database
         */
        function apif_settings_action() 
        {
            if( !empty( $_POST ) && wp_verify_nonce( $_POST['apif_settings_nonce'], 'apif_settings_action' ) )
            {
                include( 'inc/backend/save-options/save-settings.php' );
            }
        }

        /*
         * Save the new instagram feeds settings to wordpress table
        */
        function apif_add_feed() 
        {
            if( !empty( $_POST ) && wp_verify_nonce( $_POST['apif_add_feed_nonce'], 'apif_add_feed_action' ) )
            {
                include( 'inc/backend/save-options/save-new-feed.php' );
            }
        }

        /*
         * Save the edits for the feeds
        */
        function apif_edit_feed() 
        {
            
            if( !empty( $_POST['if_id'] ) && wp_verify_nonce( $_POST['apif_edit_feed_nonce'], 'apif_edit_feed_action' ) )
            {
                include( 'inc/backend/save-options/save-edit-feed.php' );
            }
        }


        /*
         *  Copy the settings of a given id
         *
        */
        function apif_copy_action() 
        {
            if( isset( $_GET['action'], $_GET['_wpnonce'] ) && wp_verify_nonce( $_GET['_wpnonce'], 'apif-copy-nonce' ) )
            {
                include_once( 'inc/backend/save-options/copy-feed-settings.php' );
            } 
            else
            {
                die( 'No script kiddies please!' );
            }
        }
        /*
         * Delete the settigs of a given id
        */
        function apif_delete_action() 
        {
            if( isset( $_GET['action'], $_GET['_wpnonce'] ) && wp_verify_nonce( $_GET['_wpnonce'], 'apif-delete-nonce' ) )
            {
                include_once( 'inc/backend/save-options/delete-feed-settings.php' );
            } 
            else
            {
                die( 'No script kiddies please!' );
            }
        }

        /*
         * Save the instagram settings
        */
        function apif_instagram_settings_action() 
        {
            if( !empty( $_POST ) && wp_verify_nonce( $_POST['apif_instagram_settings_nonce'], 'apif_instagram_settings_action' ) )
            {
                include( 'inc/backend/save-options/save-instagram-settings.php' );
            }
        }

        /**
         * AccessPress Instagram Feed Widget
         */
        function register_apif_widget() 
        {
            // register_widget( 'APIF_Widget' );
            register_widget( 'APIF_Pro_SideWidget' );
            register_widget ( 'APIF_Widget_Instagram_Feeds' );
        }

        /**
         * loads the more images from instagram
         */
        function load_more() 
        {
            if( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'apif-ajax-nonce' ) )
            {
                $page_num = 0;
                include( 'inc/frontend/feed-ajax.php' );
                wp_die();
            }
        }

        /*
        * ANy user feeds load more ajax
        */
        public function load_more_by_userfeeds(){
            if( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'apif-ajax-nonce' ) )
            {
                $page_num = sanitize_text_field($_POST[ 'page_num' ]);
                include( 'inc/frontend/feed-ajax.php' );
                wp_die();
            }
        }

        public function get_media_comments(){
            if( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'apif-ajax-nonce' ) )
            {
                $feed_id = sanitize_text_field($_POST[ 'feedid' ]);
                $link = esc_url($_POST[ 'feedlink' ]);
                $feed_type = sanitize_text_field($_POST[ 'data_feedtype' ]);
                $comments = $this->get_feeds_comment($link,$feed_id,$feed_type);
                include_once(APIF_INST_PATH.'inc/frontend/instagram.php');
                $insta = new InstaWCD();
                $comments = $insta->objectToArray($comments);   
                include( 'inc/frontend/ajax/comments-posts.php' );
                wp_die();
            }
        }

        /*
        * Get Carousel Media Feeds
        */
        public function get_carousel_feeds(){
            if( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'apif-ajax-nonce' ) )
            {
                $feedid = sanitize_text_field($_POST[ 'feed_id' ]);
                $link = esc_url($_POST[ 'link' ]);
                $feed_type = sanitize_text_field($_POST[ 'ftype' ]);
                $carousel_array = stripslashes($_POST['carousel_array']);
               if($feed_type == "any_user_timeline" || $feed_type == "hashtag"){
                    $carousels = $this->get_all_carousels($feedid);
                    include_once(APIF_INST_PATH.'inc/frontend/instagram.php');
                    $insta = new InstaWCD();
                    $carousels = $insta->objectToArray($carousels);
                    $carousels = unserialize($carousels['carousel']);
               }else{
                    $carousels = unserialize($carousel_array);
               }
               // $this->displayArr($carousels);
               if(isset($carousels) && !empty($carousels)){
                   include_once(APIF_INST_PATH.'inc/frontend/ajax/display_carousel_layout.php');
                }
               wp_die();
            }
        }


        /*
        * Rebuild Cache Function
        */
        public function fn_rebuild_cache_settings(){
            if( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'apif-admin-ajax-nonce' ) )
            {

                $message_inputs = array();
                $errors = array();
                $check = false;
                $feed_type = sanitize_text_field($_POST[ 'feed_type' ]); //any_user_timeline
                $anyusername = sanitize_text_field($_POST[ 'anyusername' ]); //any user name
                $apif_settings = get_option( 'apif_settings' ,true);
                $access_token = !empty($apif_settings['access_token']) ? $apif_settings['access_token'] : '';
                $feed_id   = intval($_POST[ 'feed_id' ]);

                if($feed_type == "any_user_timeline" || $feed_type == "hashtag"){
                    // $this->cleanFeed($feed_id);
                    // $this->refreshCache4Source($feed_id, true);
                
                   if($anyusername == '' && $access_token != ''){
                         $errors['message'] = __('Username Field is emply for Any User Time of this post.','accesspress-instagram-feed-pro');
                         return false;
                    }
                    if($access_token == '' && $anyusername != ''){
                        $errors['message'] = __('Access Token is left empty. Please fill access token from plugin main settings page first.','accesspress-instagram-feed-pro');
                         return false;
                    }
                     if($access_token == '' && $anyusername == ''){
                        $errors['message'] = __('The access token and username is empty for Any User Time Feed type in this post. Please do fill access token from plugin main settings page and on edit of this post, fill any user timeline feed with specific username.','accesspress-instagram-feed-pro');
                         return false;
                    }

                    // if there are any errors in our errors array, return a success boolean of false
                    if ( ! empty($errors)) {                        
                      $response= array(
                            'status' => 'error',
                            'message'   => $errors['message'],
                        );
                        
                    }else{
                          $res =  $this->get_feeds_by_type($feed_type,$access_token,$anyusername);
                          include_once(APIF_INST_PATH.'inc/frontend/instagram.php');
                          $insta = new InstaWCD();
                          $res = $insta->objectToArray($res); 
                        //  $this->displayArr( $res );
                        if(!empty($res)){
                          $check = $this->save_feeds($feed_id,$res,'cache_reset');
                        }
                       // if($check){
                             $response= array(
                            'status' => 'success',
                            'message'   => 'success',
                            'data'=> $res,
                          );
                       /* }else{
                             $response= array(
                            'status' => 'error',
                            'message'   => 'error',
                            //'data'=> $res,
                           );
                        }*/
                    } 
                }else if($feed_type == "recent_media"){

                    if($access_token == ''){
                        $errors['message'] = __('Access Token is left empty. Please fill access token from plugin main settings page first.','accesspress-instagram-feed-pro');
                         return false;
                    }

                     $bool = delete_transient('recent_feed_transient');
                     $feeds = get_transient('recent_feed_transient');

                     if ( ! empty($errors)) {                        
                      $response= array(
                            'status' => 'error',
                            'message'   => $errors['message'],
                        );
                    }else{
                     if( empty($feeds) ){
                      $response= array(
                            'status' => 'success'
                        );
                    }else{
                      $response= array(
                            'status' => 'error'
                        );
                    }
                  }     
                }else if($feed_type == "tag"){
                    if($access_token == ''){
                        $errors['message'] = __('Access Token is left empty. Please fill access token from plugin main settings page first.','accesspress-instagram-feed-pro');
                         return false;
                    }

                    if ( ! empty($errors)) {                        
                      $response= array(
                            'status' => 'error',
                            'message'   => $errors['message'],
                        );
                    }else{
                    if( delete_transient('tag_feed_transient')){
                      $response= array(
                            'status' => 'success'
                        );

                    }else{
                      $response= array(
                            'status' => 'error'
                        );
                    }
                 }
                }
                echo json_encode($response); 
                wp_die();
            }else{
              wp_send_json_error();  
            }

        }


        function accesspress_popup(){
            include('inc/frontend/accesspress_popup.php');
        }

        //plugin's backend admin page
        function main_page() 
        {
            include( 'inc/backend/main-page-new.php' );
        }

        // function to add new instagram feeds
        function add_new_feed() 
        {
            include( 'inc/backend/boards/add_new_feed.php' );
        }

        //function to add/edit the instagram settings
        function apif_settings() 
        {
            include( 'inc/backend/boards/instagram-settings.php' );
        }

        //function to show how to use section
        function how_to_use() 
        {
            include( 'inc/backend/boards/how-to-use-new.php' );
        }
        //function to about section
        function about() 
        {
            include( 'inc/backend/boards/about-new.php' );
        }


        /**
         * Returns Default Settings
         */
        function get_default_settings() 
        {
            $apif_settings = array('username' => '', 'access_token' => '', 'user_id' => '', 'instagram_mosaic' => 'mosaic');
            return $apif_settings;
        }

        // instagram feed shortcode
        function ap_instagram_feed_pro( $attr )
        {
             extract( shortcode_atts( array(
            'id' => '',
            'layout' => '',
            'column' => '',
            ), $attr ) );  
            ob_start();
            include( 'inc/frontend/instagram-feed-pro.php' );
            $html = ob_get_contents();
            ob_get_clean();
            return $html;
        }

        /**
         *
         * @param int $count
         * @param string $format
         */
        static function get_formatted_count( $count, $format )
        {
            switch( $format )
            {
            case '2':
                $count = number_format( $count );
                break;

            case '3':
                $count = self::abreviateTotalCount( $count );
                break;

            default:
                break;
            }
            return $count;
        }
        
        /**
         *
         * @param integer $value
         * @return string
         */
        static function abreviateTotalCount( $value )
        {
            if($value == 0){
                return $value;
            }else{
                $abbreviations = array(12 => 'T', 9 => 'B', 6 => 'M', 3 => 'K', 0 => '');
                foreach ($abbreviations as $exponent => $abbreviation) {
                    if ($value >= pow(10, $exponent)) {
                        return round(floatval($value / pow(10, $exponent)), 1) . $abbreviation;
                    }
                }
            }
        }

        /**
         *
         * @param integer $value
         * @return string
         * Since 1.0.2
         */

        static function return_string_80_char($string){
            if(strlen($string) <= 120 ){
                return $string;
            }else if( strlen($string) >= 120 ){
                $string = strip_tags($string);
                return substr($string, 0, 80).'...';
            }
        }

        function SortByLikesOrder($a, $b) {
            return $b['likes_count'] - $a['likes_count'];
        }

        function SortByCommentOrder($a, $b) {
            return $b['comment_count'] - $a['comment_count'];
        }

        function SortByDateOrder($a, $b) {
            return $b['created_time'] - $a['created_time'];
        }

        function apif_contains_keywords($str, array $arr)
        {
            foreach($arr as $a) {
                if (stripos($str,$a) !== false) return true;
            }
            return false;
        }

        function apif_doesnt_contains_keywords($str, array $arr)
        {
            foreach($arr as $a) {
                if (stripos($str,$a) !== true) return true;
            }
            return false;
        }

        public static function contains($str, array $arr){
            foreach($arr as $a) {
                if (stripos($str,$a) !== false) return true;
            }
            return false;
        }

        /**
          * Sanitizes Multi Dimensional Array
          * @param array $array
          * @param array $sanitize_rule
          * @return array
          *
          * @since 1.0.0
          */
        static function sanitize_array( $array = array(), $sanitize_rule = array() ){
            if ( ! is_array( $array ) || count( $array ) == 0 ) {
                return array();
            }

            foreach ( $array as $k => $v ) {
                if ( ! is_array( $v ) ) {
                    $default_sanitize_rule = (is_numeric( $k )) ? 'html' : 'text';
                    $sanitize_type = isset( $sanitize_rule[ $k ] ) ? $sanitize_rule[ $k ] : $default_sanitize_rule;
                    $array[ $k ] = self:: sanitize_value( $v, $sanitize_type );
                }

                if ( is_array( $v ) ) {
                    $array[ $k ] = self:: sanitize_array( $v, $sanitize_rule );
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
        static function sanitize_value( $value = '', $sanitize_type = 'text' ){
            switch ( $sanitize_type ) {
             case 'html':
                 $allowed_html = wp_kses_allowed_html( 'post' );
                 return wp_kses( $value, $allowed_html );
                 break;
             default:
                 return sanitize_text_field( $value );
                 break;
            }
        }

        // trim the string function
       public function trim_word($text, $length, $startPoint=0, $allowedTags=""){
            $text = html_entity_decode(htmlspecialchars_decode($text));
            $text = strip_tags($text, $allowedTags);
            return $text = substr($text, $startPoint, $length);
        }

     public function html_cut($text, $max_length)
       {
                $tags   = array();
                $result = "";

                $is_open   = false;
                $grab_open = false;
                $is_close  = false;
                $in_double_quotes = false;
                $in_single_quotes = false;
                $tag = "";

                $i = 0;
                $stripped = 0;

                $stripped_text = strip_tags($text);

                while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length)
                {
                    $symbol  = $text{$i};
                    $result .= $symbol;

                    switch ($symbol)
                    {
                       case '<':
                            $is_open   = true;
                            $grab_open = true;
                            break;

                       case '"':
                           if ($in_double_quotes)
                               $in_double_quotes = false;
                           else
                               $in_double_quotes = true;

                        break;

                        case "'":
                          if ($in_single_quotes)
                              $in_single_quotes = false;
                          else
                              $in_single_quotes = true;

                        break;

                        case '/':
                            if ($is_open && !$in_double_quotes && !$in_single_quotes)
                            {
                                $is_close  = true;
                                $is_open   = false;
                                $grab_open = false;
                            }

                            break;

                        case ' ':
                            if ($is_open)
                                $grab_open = false;
                            else
                                $stripped++;

                            break;

                        case '>':
                            if ($is_open)
                            {
                                $is_open   = false;
                                $grab_open = false;
                                array_push($tags, $tag);
                                $tag = "";
                            }
                            else if ($is_close)
                            {
                                $is_close = false;
                                array_pop($tags);
                                $tag = "";
                            }

                            break;

                        default:
                            if ($grab_open || $is_close)
                                $tag .= $symbol;

                            if (!$is_open && !$is_close)
                                $stripped++;
                    }

                    $i++;
                }

                while ($tags)
                    $result .= "</".array_pop($tags).">";

                return $result;
     }
      
    /*
    * Preview Instagram Feed
    */
     public function apif_insta_preview(){
        if ( is_user_logged_in() && isset($_GET[ 'apif_insta_preview' ], $_GET[ 'insta_id' ]) ) {
            $insta_id = sanitize_text_field($_GET[ 'insta_id' ]);
            include(APIF_INST_PATH . 'inc/frontend/feed-preview.php');
            die();
        }
     }

     /*
     * Get Profile Image
     */
     public static function get_Profile_Image($items_array){
     	   $profile_username = (isset($items_array[0]['user']['username']) && $items_array[0]['user']['username'] != '') ? $items_array[0]['user']['username']:'';
		    //$profilelink = "https://www.instagram.com/".$pun;
		    //$profurl = $profilelink.'/?__a=1';  
     		$profurl = "https://www.instagram.com/".$profile_username;
			$html_decode = file_get_contents($profurl);
			$feedarr = explode('window._sharedData = ',$html_decode);
			if(isset($feedarr) && !empty($feedarr)){
				$feedarr = explode(';</script>',$feedarr[1]);
				$obj = json_decode($feedarr[0] , true);
				if(isset($obj) && !empty($feedarr) && isset($obj["entry_data"]["ProfilePage"]) && $obj["entry_data"]["ProfilePage"][0] !='' ){
					 $user = (isset($obj["entry_data"]["ProfilePage"][0]["graphql"]["user"]) && $obj["entry_data"]["ProfilePage"][0]["graphql"]["user"] != '')?$obj["entry_data"]["ProfilePage"][0]["graphql"]["user"]:'';
					 $res["username"] = $user["username"];
					 $res["full_name"] = $user["full_name"];
					 $res["id"] = $user["id"];
					 $res["is_private"] = $user["is_private"];
					 $res["profile_pic_url"] = $user["profile_pic_url"];
					 $res["profile_pic_url_hd"] = $user["profile_pic_url_hd"];
				 }
		    }
		    $data_profile_image_url = (isset($items_array[0]['user']['profile_picture']) && $items_array[0]['user']['profile_picture'] != '') ? $items_array[0]['user']['profile_picture']:'';
		    $header_response = get_headers($data_profile_image_url, 1);
			if ( strpos( $header_response[0], "404" ) !== false )
			{
				$data_profile_image = $data_profile_image_url;
			} 
			else 
			{
				if(isset($res) && $res["profile_pic_url_hd"]!= ''){
					 $data_profile_image = esc_url($res["profile_pic_url_hd"]);
				}else{
			    	$data_profile_image = APIF_IMAGE_DIR.'/round-prof.png';
				}
			} 
			return $data_profile_image;
     }

     /* 
     * Check if feed type is image or video to get screenshot of video images
     */
     public static function check_ifexist_image($image,$image_size,$permalink){
        $header_response2 = get_headers($image, 1);
        if ( strpos( $header_response2[0], "404" ) !== false || strpos( $header_response2[0], "403" ) !== false )
        {
             $imageinfo = false;
        }else{
             $imageinfo = true;
        }
     
          if(!$imageinfo){
       	    if($image_size === 'thumbnail'){
              $image = $permalink.'/media?size=m';
            }else if($image_size === 'thumbnail-200'){
              $image = $permalink.'/media?size=m';
           	}else if($image_size ==='thumbnail-320'){
              $image = $permalink.'/media?size=m';
           	}else if($image_size ==='thumbnail-640'){
              $image = $permalink.'/media?size=t';
           	}else if($image_size ==='thumbnail-800'){
              $image = $permalink.'/media?size=t';
           	}else if($image_size == 'low_resolution'){
              $image = $permalink.'/media?size=t';
           	}else if($image_size == 'standard_resolution'){
              $image = $permalink.'/media?size=l';
           	}
       }

       return $image;
     }

    }
$sc_object = new IF_Pro_Class();
//initialization of plugin
    
    
}

?>