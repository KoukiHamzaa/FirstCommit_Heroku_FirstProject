<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
  Plugin Name: Ultimate Author Box
  Plugin URI: accesspressthemes.com/wordpress-plugins/ultimate-author-box
  Description: Ultimate Author Box is a plugin that allows you to add additional information about the author in your Post, Page Custom Post Type as a default option or through use of shortcode and widgets.
  Version: 2.0.6
  Author: AccessPress Themes
  Author URI: http://accesspressthemes.com
  License: GPL2 or later
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
  Domain Path: /languages/
  Text Domain: ultimate-author-box
 */
/* include File for Widget */
include_once('inc/backend/uab-widgets/uab-author-list-widgets.php');
include_once('inc/backend/uab-widgets/uab-author-box-widgets.php');

/* Create class Ultimate_Author_Box */
if ( !class_exists( 'Ultimate_Author_Box' ) ) {

	class Ultimate_Author_Box {
		/* Construtor to load all hooks */

		function __construct() {

			/* Define Folder Paths */
			$this->define_constants();
			/* Start Session for Facebook API and Define Text Domain */
			add_action( 'init', array( $this, 'uab_init' ) );
			/* Enqueue Backend Scripts */
			add_action( 'admin_enqueue_scripts' , array( $this , 'uab_register_backend_assets' ) );
			/* Enqueue Frontend Scripts */
			add_action( 'wp_enqueue_scripts', array( $this, 'uab_register_frontend_assets' ) );
			/* Register Ultimate Author Box Dashboard Menu */
			add_action( 'admin_menu', array( $this, 'uab_menu' ) );
			/* Register Ultimate Author Box Dashboard Sub-menu */
			add_action( 'admin_menu', array( $this, 'uab_add_how_to_sub_menu_page' ) );
			add_action( 'admin_menu', array( $this, 'uab_add_about_sub_menu_page' ) );
			/* Register additional support link in plugin listings */
			add_filter( 'plugin_action_links', array( $this, 'uab_plugin_action_link' ), 10, 5 );
			add_action( 'show_user_profile', array( $this, 'uab_profile_fields' ) );
			add_action( 'edit_user_profile', array( $this, 'uab_profile_fields' ) );
			/* add_action( 'wp_ajax_save_tab_option', array( $this, 'uab_profile_fields' ) ); */
			add_action( 'personal_options_update', array( $this, 'uab_save_profile_fields' ) );
			add_action( 'edit_user_profile_update', array( $this, 'uab_save_profile_fields' ) );
			/* General Settings Save */
			add_action( 'admin_post_uab_settings_save_action', array( $this, 'uab_save_settings' ) );
			/* General Settings Restore */
			add_action( 'admin_post_uab_restore_settings', array( $this, 'uab_restore_settings' ) );
			/* Twitter Cache Clear */
			/* action to delete cache */
			add_action( 'admin_post_uab_delete_cache', array( $this, 'uab_delete_cache' ) );
			register_activation_hook( __FILE__, array( $this, 'uab_load_default_settings' ) );
			add_shortcode( 'ultimate_author_box', array( $this, 'ultimate_author_box' ) );
			add_shortcode( 'ultimate_author_box_widget', array( $this, 'ultimate_author_box_widget' ) );
			add_shortcode( 'ultimate_author_list_widget', array( $this, 'ultimate_author_list_widget' ) );
			/*
			add_shortcode( 'ultimate_subscription', array( $this, 'ultimate_subscription' ) );
			add_shortcode( 'uab_get_image', array( $this, 'uab_get_image' ) );
			add_shortcode( 'uab_get_company_phone', array( $this, 'uab_get_company_phone' ) );
			add_shortcode( 'uab_get_company_url', array( $this, 'uab_get_company_url' ) );
			add_shortcode( 'uab_get_social', array( $this, 'uab_get_social' ) );
			*/
			add_filter( 'the_content', array( $this, 'uab_add_post_content' ), 0 );
			/* Contact Form Actions */
			add_action( 'wp_ajax_uab_sendmail', array( $this, 'uab_form_submission' ) );
			add_action( 'wp_ajax_nopriv_uab_sendmail', array( $this, 'uab_form_submission' ) );
			/* Author PopUp Actions */
			add_action( 'wp_ajax_uab_show_popup', array( $this, 'uab_show_popup' ) );
			add_action( 'wp_ajax_nopriv_uab_show_popup', array( $this, 'uab_show_popup' ) );
			/* Register Widgets */
			add_action( 'widgets_init', array( $this, 'register_uap_author_lists_widget' ) );
			add_action( 'widgets_init', array( $this, 'register_uap_author_box_widget' ) );
			/* Register Meta Box */
			add_action( 'add_meta_boxes', array( $this, 'uab_metabox' ) );
			add_action( 'save_post', array( $this, 'uab_meta_save' ) );
			add_action( 'save_post', array( $this, 'uab_guest_save' ) );
			/* Google Fonts */
			add_action( 'wp_enqueue_scripts', array( $this, 'uab_google_fonts' ) );
			/* add selected widgets on div section using ajax */
			add_action( 'wp_ajax_add_selected_widget', array( $this, 'add_selected_widget' ) );
			/* edit widget data of specific widgets */
			add_action( 'wp_ajax_edit_widget_data', array( $this, 'ajax_edit_widget_data' ) );
			/* edit widget data of specific widgets */
			add_action( 'wp_ajax_uab_delete_widget', array( $this, 'ajax_delete_widget_form' ) );
			/* save widgets data */
			add_action( 'wp_ajax_uab_save_widget', array( $this, 'ajax_save_widget' ) );
			add_action( 'init', array( $this, 'register_sidebar' ) );
			add_action( 'after_widget_add', array( $this, 'clear_caches' ) );
			add_action( 'after_widget_save', array( $this, 'clear_caches' ) );
			add_action( 'after_widget_delete', array( $this, 'clear_caches' ) );
			/* disable WordPress sanitization to allow more than just $allowedtags from /wp-includes/kses.php */
			remove_filter( 'pre_user_description', 'wp_filter_kses' );
			/* add sanitization for WordPress posts */
			add_filter( 'pre_user_description', 'wp_filter_post_kses' );
		}

		/* Get all editable roles */

		function get_editable_roles() {
			global $wp_roles;
			$all_roles = $wp_roles->roles;
			return $all_roles;
		}

		/* Register UAB_Author_lists_widget */

		function register_uap_author_lists_widget() {
			register_widget( 'uab_author_list_widget' );
		}

		/* Register UAB_Author_box_widget */

		function register_uap_author_box_widget() {
			register_widget( 'uab_author_box_widget' );
		}

		/* Define Folder Paths */

		function define_constants() {
			defined( 'UAB_CSS_DIR' ) or define( 'UAB_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' );
			defined( 'UAB_JS_DIR' ) or define( 'UAB_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );
			defined( 'UAB_IMG_DIR' ) or define( 'UAB_IMG_DIR', plugin_dir_url( __FILE__ ) . 'images' );
			defined( 'UAB_PATH' ) or define( 'UAB_PATH', plugin_dir_path( __FILE__ ) );
			defined( 'UAB_VERSION' ) or define( 'UAB_VERSION', '2.0.6' );

			$uab_twitter_status = get_option('uab_twitter_status');
			if (isset($uab_twitter_status) && !empty($uab_twitter_status)) {
				include(UAB_PATH . '/twitteroauth/OAuth.php');
				include(UAB_PATH . '/twitteroauth/twitteroauth.php');
			}

			include(UAB_PATH . 'LinkedinProfile/uab_linkedin_class.php');
		}

		/* Register Text Domain */

		function uab_init() {
			include(UAB_PATH . 'inc/backend/guest_author/register_guest_author.php');
			if ( !session_id() && !headers_sent() ) {
				session_start();
			}
			load_plugin_textdomain( 'ultimate-author-box', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		}

		/* Register Backend resources (Enqueue scripts and style) */
		
		function uab_register_backend_guest(){
		}

		function uab_register_backend_assets( $hook ) {

			if ( !('toplevel_page_ultimate-author-box' == $hook || 'profile.php' == $hook || 'post-new.php' == $hook || 'post.php' == $hook || 'user-edit.php' == $hook || 'ultimate-author-box_page_ultimate-author-box-how-to' == $hook || 'ultimate-author-box_page_ultimate-author-box-about' == $hook) ) {
				return;
			}
			wp_enqueue_style( 'jquery-ui-css', UAB_CSS_DIR . '/jquery-ui.css', array(), '1.12.1' );
			
			wp_enqueue_style( 'uab-fontawesome-css', UAB_CSS_DIR . '/fontawesome.css', UAB_VERSION );
	      	wp_enqueue_style( 'uab-fa-solid-css', UAB_CSS_DIR . '/fa-solid.css', UAB_VERSION );
	      	wp_enqueue_style( 'uab-fa-regular-css', UAB_CSS_DIR . '/fa-regular.css', UAB_VERSION );
	      	wp_enqueue_style( 'uab-fa-brands-css', UAB_CSS_DIR . '/fa-brands.css', UAB_VERSION );
	      	wp_enqueue_style( 'uab-font-awesome-style', UAB_CSS_DIR . '/font-awesome.min.css', array(), UAB_VERSION );
			
			wp_enqueue_style( 'uab-codemirror-style', UAB_CSS_DIR . '/codemirror.css', array(), UAB_VERSION );
			/* wp_enqueue_style( 'uab-jquery-selectbox', UAB_CSS_DIR . '/jquery.selectbox.css', array(), UAB_VERSION ); */
			wp_enqueue_style( 'ultimate-author-box-backend-style', UAB_CSS_DIR . '/backend.css', array(), UAB_VERSION );
			/* wp_enqueue_style( 'uab-bxslider-css', UAB_CSS_DIR . '/jquery.bxslider.css', array(), UAB_VERSION ); */
			wp_enqueue_script( 'uab-codemirror-script', UAB_JS_DIR . '/codemirror.js', array(), '5.22.0' );
			wp_enqueue_script( 'uab-codemirror-css-js', UAB_JS_DIR . '/css.js', array( 'jquery', 'uab-codemirror-script' ), UAB_VERSION );
			wp_enqueue_script( 'jquery-ui', UAB_JS_DIR . '/jquery-ui.js', array( 'jquery' ), '1.12.1' );
			// wp_enqueue_script( 'uab-ckeditor-js', UAB_JS_DIR . '/ckeditor/ckeditor.js', array( 'jquery' ), UAB_VERSION );
			// wp_enqueue_script( 'uab-ckfinder-js', UAB_JS_DIR . '/ckfinder/ckfinder.js', array( 'jquery' ), UAB_VERSION );
			/* wp_enqueue_script( 'uab-bxslider-js', UAB_JS_DIR . '/jquery.bxslider.js', array( 'jquery' ), UAB_VERSION ); */
			/* wp_enqueue_script( 'uab-jquery-selectbox-js', UAB_JS_DIR . '/jquery.selectbox-0.2.min.js', array('jquery'), UAB_VERSION ); */
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'uab-color-picker-js', UAB_JS_DIR . '/wp-color-picker-alpha.js', array( 'jquery', 'wp-color-picker' ), UAB_VERSION );
			wp_enqueue_script( 'uab-backend-script', UAB_JS_DIR . '/backend.js', array( 'jquery', 'jquery-ui', 'jquery-ui-dialog', 'uab-codemirror-script', 'wp-color-picker' ), UAB_VERSION );
			wp_enqueue_media();
			wp_localize_script( 'uab-backend-script', 'uab_variable', array(
				'plugin_javascript_path' => UAB_JS_DIR,
				'plugin_image_path' => UAB_IMG_DIR,
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'_wpnonce' => wp_create_nonce( 'uab_form_nonce' ),
				'selected_widget_limits' => __( 'Only 1 widget allowed per tab', 'ultimate-author-box' ),
				'saving_msg' => __( 'Saving Data.', 'ultimate-author-box' ),
				'saved_msg' => __( 'Saved Data.', 'ultimate-author-box' ),
			) );
		}

		/* Register Frontend resources (Enqueue scripts and style) */

		function uab_register_frontend_assets() {
			wp_enqueue_style( 'jquery-ui-css', UAB_CSS_DIR . '/jquery-ui.css', array(), '1.12.1' );
			wp_enqueue_style( 'uab-slick-style', UAB_JS_DIR . '/slick/slick.css', array(), '1.0.6' );
			wp_enqueue_style( 'uab-slick-thmes-style', UAB_JS_DIR . '/slick/slick-theme.css', array(), '1.0.6' );
			/* wp_enqueue_style( 'uab-owl-style', UAB_JS_DIR . '/owl/assets/owl.carousel.css', array(),'2.2.1'); */
			wp_enqueue_style( 'uab-frontend-style', UAB_CSS_DIR . '/frontend.css', array(), UAB_VERSION );
			wp_enqueue_style( 'uab-frontend-responsive-style', UAB_CSS_DIR . '/uab-responsive.css', array(), UAB_VERSION );
			
			wp_enqueue_style( 'uab-fontawesome-css', UAB_CSS_DIR . '/fontawesome.css', UAB_VERSION );
	      	wp_enqueue_style( 'uab-fa-solid-css', UAB_CSS_DIR . '/fa-solid.css', UAB_VERSION );
	      	wp_enqueue_style( 'uab-fa-regular-css', UAB_CSS_DIR . '/fa-regular.css', UAB_VERSION );
	      	wp_enqueue_style( 'uab-fa-brands-css', UAB_CSS_DIR . '/fa-brands.css', UAB_VERSION );
	      	wp_enqueue_style( 'uab-font-awesome-style', UAB_CSS_DIR . '/font-awesome.min.css', array(), UAB_VERSION );

	      	wp_enqueue_script( 'ip-linearicons', 'https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js' );
		    wp_enqueue_style( 'ip-linearicons-css', 'https://cdn.linearicons.com/free/1.0.0/icon-font.min.css');

			/* wp_enqueue_script( 'jquery1', UAB_JS_DIR . '/jquery.js', array(), '1.12.4' ); */
			wp_enqueue_script( 'jquery-ui', UAB_JS_DIR . '/jquery-ui.js', array( 'jquery' ), '1.12.1' );
			wp_enqueue_script( 'uab-slick-js', UAB_JS_DIR . '/slick/slick.js', array( 'jquery' ), '1.0.6' );
			/* wp_enqueue_script( 'uab-owl-js', UAB_JS_DIR . '/owl/owl.carousel.js', array('jquery'),'2.2.1'); */
			wp_enqueue_script( 'uab-frontend-script', UAB_JS_DIR . '/frontend.js', array( 'jquery', 'jquery-ui', 'uab-slick-js' ), UAB_VERSION );
			wp_localize_script( 'uab-frontend-script', 'uab_js_obj', array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'_wpnonce' => wp_create_nonce( 'uab_form_nonce' ),
				'_wpnonce_popup' => wp_create_nonce( 'uab_popup_nonce' )
			) );
		}

		/* Load Google Fonts */

		function uab_google_fonts() {
			$query_args = array(
				'family' => 'Amatic+SC|Merriweather|Roboto+Slab|Montserrat|Lato|Italianno|PT+Sans|PT+Sans+Narrow|Raleway|Roboto|Open+Sans|Great+Vibes|Varela+Round',
				'subset' => 'latin,latin-ext,cursive',
			);
			wp_register_style( 'uab_google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
			wp_register_style( 'googleFonts', 'https://fonts.googleapis.com/css?family=Amatic+SC|Crafty+Girls|Italianno|Great+Vibes|Schoolbell|Oswald|Lato|Montserrat|Droid+Sans|Poppins|Varela+Round' );
			wp_enqueue_style( 'googleFonts' );
		}

		/* Add Support Link in Plugin Listing Page */

		function uab_plugin_action_link( $actions, $plugin_file ) {
			static $plugin;
			if ( !isset( $plugin ) )
				$plugin = plugin_basename( __FILE__ );
			if ( $plugin == $plugin_file ) {
				$settings = array( 'settings' => '<a href="admin.php?page=ultimate-author-box">' . __( 'Settings', 'ultimate-author-box' ) . '</a>' );
				$site_link = array( 'support' => '<a href="https://accesspressthemes.com/support/" target="_blank">' . __( 'Support', 'ultimate-author-box' ) . '</a>' );
				$actions = array_merge( $settings, $actions );
				$actions = array_merge( $site_link, $actions );
			}
			return $actions;
		}

		/* Registering Plugin access through Dashboard */

		function uab_menu() {
			add_menu_page(
					__( 'Ultimate Author Box', 'ultimate-author-box' ), __( 'Ultimate Author Box', 'ultimate-author-box' ), 'manage_options', 'ultimate-author-box', array( $this, 'uab_settings_page' ), 'dashicons-id', 70
			);
		}

		/* Registering Plugin backend settings */

		function uab_settings_page() {
			include(UAB_PATH . '/inc/backend/uap-settings.php');
		}

		/* Register How to sub-menus */

		function uab_add_how_to_sub_menu_page() {
			add_submenu_page(
					'ultimate-author-box', __( 'How to use', 'ultimate-author-box' ), __( 'How to use', 'ultimate-author-box' ), 'edit_posts', 'ultimate-author-box-how-to', array( $this, 'uab_ultimate_author_box_how_to' ) );
		}

		/* How To page Callback */

		function uab_ultimate_author_box_how_to() {
			include(UAB_PATH . '/inc/backend/uab-boards/uap-how-to.php');
		}

		/* Register About Sub Menu */

		function uab_add_about_sub_menu_page() {
			add_submenu_page(
					'ultimate-author-box', __( 'More WordPress Stuff', 'ultimate-author-box' ), __( 'More WordPress Stuff', 'ultimate-author-box' ), 'edit_posts', 'ultimate-author-box-about', array( $this, 'uab_ultimate_author_box_about' ) );
		}


		/* About Page Callback */

		function uab_ultimate_author_box_about() {
			include(UAB_PATH . '/inc/backend/uab-boards/uap-about.php');
		}

		/* Load Default General Settings */

		function uab_load_default_settings() {
			$default_settings = $this->get_default_settings();
			if ( !get_option( 'uap_general_settings' ) ) {
				update_option( 'uap_general_settings', $default_settings );
			}
		}

		/* Save General Settings */

		function uab_save_settings() {
			if ( check_admin_referer( 'uab_admin_option_update' ) ) {
				if ( isset( $_POST['uab_settings_save_button'] ) ) {
					$uab_general_settings = array();
					$uab_general_settings['uab_custom_post_type_list'] = array();
					$uab_general_settings['uab_user_roles'] = array();

					if ( isset( $_POST['uab_custom_post_type_list'] ) ) {
						foreach ( $_POST['uab_custom_post_type_list'] as $key => $value ) {
							$uab_general_settings['uab_custom_post_type_list'][$key] = $value;
						}
					} else {
						$uab_general_settings['uab_custom_post_type_list'] = array();
					}

					if ( isset( $_POST['uab_user_roles'] ) ) {
						foreach ( $_POST['uab_user_roles'] as $key => $value ) {
							$uab_general_settings['uab_user_roles'][$key] = $value;
						}
					} else {
						$uab_general_settings['uab_user_roles'] = array();
					}

					$uab_twitter_status = (isset( $_POST['uab_twitter_status'] ) ? boolval(1) : boolval(0) );
					update_option('uab_twitter_status',$uab_twitter_status);

					$uab_general_settings['uab_disable_uab'] = (isset( $_POST['uab_disable_uab'] ) ? 1 : 0);
					$uab_general_settings['uab_posts'] = (isset( $_POST['uab_posts'] ) ? 1 : 0);
					$uab_general_settings['uab_pages'] = (isset( $_POST['uab_pages'] ) ? 1 : 0);
					$uab_general_settings['uab_custom_post'] = (isset( $_POST['uab_custom_post'] ) ? 1 : 0);
					$uab_general_settings['uab_box_position'] = sanitize_text_field( $_POST['uab_box_position'] );
					$uab_general_settings['uab_empty_bio'] = (isset( $_POST['uab_empty_bio'] ) ? 1 : 0);
					$uab_general_settings['uab_default_bio'] = (isset( $_POST['uab_default_bio'] ) ? 1 : 0);
					$uab_general_settings['uab_default_message'] = sanitize_text_field( $_POST['uab_default_message'] );
					/* $uab_general_settings['uab_small_device'] = (isset($_POST['uab_small_device'])?1:0); */
					$uab_general_settings['uab_link_target_option'] = sanitize_text_field( $_POST['uab_link_target_option'] );
					$uab_general_settings['uab_show_popup'] = (isset( $_POST['uab_show_popup'] ) ? 1 : 0);
					$uab_general_settings['uab_disable_email'] = (isset( $_POST['uab_disable_email'] ) ? 1 : 0);
					$uab_general_settings['uab_disable_coauthor'] = (isset( $_POST['uab_disable_coauthor'] ) ? 1 : 0);
					$uab_general_settings['uab_coauthor_header_text'] = (isset( $_POST['uab_coauthor_header_text']) && !empty($_POST['uab_coauthor_header_text']) ) ? sanitize_text_field($_POST['uab_coauthor_header_text']) : esc_html('Co Authors','ultimate_author_box');
					$uab_general_settings['uab_disable_customizer'] = (isset( $_POST['uab_disable_customizer'] ) ? 1 : 0);
					$uab_general_settings['uab_twitter_api_key'] = sanitize_text_field( $_POST['uab_twitter_api_key'] );
					$uab_general_settings['uab_twitter_api_secret'] = sanitize_text_field( $_POST['uab_twitter_api_secret'] );
					$uab_general_settings['uab_twitter_access_token'] = sanitize_text_field( $_POST['uab_twitter_access_token'] );
					$uab_general_settings['uab_twitter_token_secret'] = sanitize_text_field( $_POST['uab_twitter_token_secret'] );
					$uab_general_settings['uab_twitter_cache_period'] = sanitize_text_field( $_POST['uab_twitter_cache_period'] );
					$uab_general_settings['uab_template'] = sanitize_text_field( $_POST['uab_template'] );
					$uab_general_settings['uab_enable_custom_css'] = (isset( $_POST['uab_enable_custom_css'] ) ? 1 : 0);
					$uab_general_settings['uab_custom_css'] = stripslashes(wp_kses_post( $_POST['uab_custom_css'] ));

					$uab_general_settings['uab_custom_template'] = sanitize_text_field( $_POST['uab_custom_template'] );
					$uab_general_settings['uab_primary_color'] = sanitize_text_field( $_POST['uab_primary_color'] );
					$uab_general_settings['uab_secondary_color'] = sanitize_text_field( $_POST['uab_secondary_color'] );
					$uab_general_settings['uab_tertiary_color'] = sanitize_text_field( $_POST['uab_tertiary_color'] );
					$uab_general_settings['custom_image_background'] = sanitize_text_field( $_POST['custom_image_background'] );

					$check = update_option( 'uap_general_settings', $uab_general_settings );
					wp_redirect( admin_url( 'admin.php?page=ultimate-author-box&message=1' ) );
					exit;

				}
			} else {
				die( 'No script kiddies please!' );
			}
		}

		/* Settings Default Values */

		function get_default_settings() {
			$uab_general_settings = array();
			$user_role_list = $this->get_editable_roles();
			foreach ( $user_role_list as $key => $value ) {
				$uab_general_settings['uab_user_roles'][] = $key;
			}
			$uab_general_settings['uab_custom_post_type_list'] = array();
			$uab_general_settings['uab_disable_uab'] = 0;
			$uab_general_settings['uab_posts'] = 1;
			$uab_general_settings['uab_pages'] = 1;
			$uab_general_settings['uab_custom_post'] = 1;
			$uab_general_settings['uab_box_position'] = 'uab_bottom';
			$uab_general_settings['uab_empty_bio'] = 0;
			$uab_general_settings['uab_default_bio'] = 1;
			$uab_general_settings['uab_default_message'] = __( 'Sorry! The Author has not filled his profile.', 'ultimate-author-box' );
			/* $uab_general_settings['uab_small_device'] = 0; */
			$uab_general_settings['uab_link_target_option'] = '_blank';
			$uab_general_settings['uab_show_popup'] = 1;
			$uab_general_settings['uab_disable_customizer'] = 1;
			$uab_general_settings['uab_twitter_api_key'] = '';
			$uab_general_settings['uab_twitter_api_secret'] = '';
			$uab_general_settings['uab_twitter_access_token'] = '';
			$uab_general_settings['uab_twitter_token_secret'] = '';
			$uab_general_settings['uab_twitter_cache_period'] = '1';
			$uab_general_settings['uab_template'] = 'uab-template-1';
			$uab_general_settings['uab_enable_custom_css'] = 1;
			$uab_general_settings['uab_custom_css'] = '';
			$uab_general_settings['uab_custom_template'] = 'uab-template-1';
			$uab_general_settings['uab_primary_color'] = '';
			$uab_general_settings['uab_secondary_color'] = '';
			$uab_general_settings['uab_tertiary_color'] = '';
			$uab_general_settings['custom_image_background'] = '';
			return $uab_general_settings;
		}

		/* Restore Default Settings */

		function uab_restore_settings() {
			if ( !empty( $_GET ) && wp_verify_nonce( $_GET['_wpnonce'], 'uab-restore-nonce' ) ) {
				$default_settings = $this->get_default_settings();
				update_option( 'uap_general_settings', $default_settings );
				wp_redirect( admin_url( 'admin.php?page=ultimate-author-box&restore-message=1' ) );
			} else {
				die( 'No script kiddies please!' );
			}
		}

		function uab_delete_cache() {
			delete_transient( 'uab_tweets' );
			wp_redirect( admin_url( 'admin.php?page=ultimate-author-box&cache-message=1' ) );
		}

		/* Register Shortcode [ultimate_author_box user_id="1" template='uab-template-1'] */

		function ultimate_author_box( $atts ) {
			ob_start();
			?>
			<div class="uab-frontend-wrapper-outer">
			<?php
			include(UAB_PATH . '/inc/frontend/uap-shortcode.php');
			?>
			</div>
			<?php
			$form_html = ob_get_contents();
			ob_end_clean();
			return $form_html;
		}

		function ultimate_author_box_widget( $atts ) {
			ob_start();
			include(UAB_PATH . '/inc/frontend/uap-author-box-widget-shortcode.php');
			$form_html = ob_get_contents();
			ob_end_clean();
			return $form_html;
		}

		function ultimate_author_list_widget( $atts ) {
			ob_start();
			include(UAB_PATH . '/inc/frontend/uap-author-list-widget-shortcode.php');
			$form_html = ob_get_contents();
			ob_end_clean();
			return $form_html;
		}

		/*
		function ultimate_subscription() {
			ob_start();
			?>
			<form action="http://mailz.imarketmarketing.com/webform-submit-html" method="post" class="webform"  id="webform">
			    <div class="form9-bg" id="demo-preview" style="background-image: url("http://mailz.imarketmarketing.com/assets/media_image/form7-bg.png");">
					 <div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="col-md-12 col-sm-12 col-xs-12 form_area9">
								<div class="ribbon"><span contenteditable="false">FREE REPORT!</span></div>
								<div class="mdem25 smem15 xsem12 text-center w600 mt16 xsmt15 whitetext" contenteditable="false" data-gramm_id="19dffb74-584d-eba2-6d9e-56a58955fbf1" data-gramm="true" spellcheck="false" data-gramm_editor="true"><font color="#2a2a2a">IM COACHING</font><div><font size="6" color="#2a2a2a">Let Me Coach You!</font></div></div><grammarly-btn><div data-reactroot="" class="_e725ae-textarea_btn _e725ae-show _e725ae-anonymous _e725ae-field_hovered" style="z-index: 2; transform: translate(313.5px, 117.547px);"><div class="_e725ae-transform_wrap"><div title="Protected by Grammarly" class="_e725ae-status"> </div></div></div></grammarly-btn>
								<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 mt7 xsmt5">
									<div class="namefield">
										<div class="mdem11 smem11 xsem10 w300 whitetext" contenteditable="false"><font color="#2a2a2a">Full Name</font></div>
										<div class="mdem11 smem11 xsem10"><input type="text" name="name" class="fieldinput" placeholder="Name"></div>
									</div>
									<div class="copydiv">
										<div class="mdem11 smem11 xsem10 w300 whitetext fieldname" contenteditable="false"><font color="#2a2a2a">Email Address</font></div>
										<div class="mdem12 smem11 xsem10"><input type="text" name="email" class="fieldinput" placeholder="Email"></div>
									</div>
									<div class="mdem12 smem12 xsem11 mt5 xsmt5 w400"><a href="#" class="form-btn9" contenteditable="false" id="rect">Sign Up</a></div>
								</div>
							</div>
						</div>
					</div>
			    </div><input name="form_id" type="hidden" value="56">
			</form>
			<?php
			$form_html = ob_get_contents();
			ob_end_clean();
			return $form_html;
		}

		function uab_get_image( $atts ) {
			ob_start();
			$form_html = ob_get_contents();

			$uab_shortcode_atts = $atts = shortcode_atts(
					array(
				'user_id' => get_the_author_meta( 'ID' ),
					), $atts, 'uab_get_image' );

			$author_id = $uab_shortcode_atts['user_id'];
			$uab_profile_data = maybe_unserialize( get_the_author_meta( 'uab_profile_data', $author_id ) );
			_e( '<div class="uab_get_image">' );
			include(UAB_PATH . '/inc/frontend/frontend-default/components/uab-component-image.php');
			_e( '</div>' );
			$form_html = ob_get_contents();
			ob_end_clean();
			return $form_html;
		}

		function uab_get_company_phone( $atts ) {
			ob_start();
			$form_html = ob_get_contents();

			$uab_shortcode_atts = $atts = shortcode_atts(
					array(
				'user_id' => get_the_author_meta( 'ID' ),
					), $atts, 'uab_get_company_phone' );

			$author_id = $uab_shortcode_atts['user_id'];
			$uab_profile_data = maybe_unserialize( get_the_author_meta( 'uab_profile_data', $author_id ) );
			$author_phone = isset( $uab_profile_data[0]['uab_company_phone'] ) ? $uab_profile_data[0]['uab_company_phone'] : '';
			_e( $author_phone );
			$form_html = ob_get_contents();
			ob_end_clean();
			return $form_html;
		}

		function uab_get_company_url( $atts ) {
			ob_start();
			$form_html = ob_get_contents();

			$uab_shortcode_atts = $atts = shortcode_atts(
					array(
				'user_id' => get_the_author_meta( 'ID' ),
					), $atts, 'uab_get_company_url' );

			$author_id = $uab_shortcode_atts['user_id'];
			$uab_profile_data = maybe_unserialize( get_the_author_meta( 'uab_profile_data', $author_id ) );
			$author_url = isset( $uab_profile_data[0]['uab_company_url'] ) ? $uab_profile_data[0]['uab_company_url'] : '';
			_e( $author_url );
			$form_html = ob_get_contents();
			ob_end_clean();
			return $form_html;
		}

		function uab_get_social( $atts ) {
			ob_start();
			$form_html = ob_get_contents();

			$uab_shortcode_atts = $atts = shortcode_atts(
					array(
				'user_id' => get_the_author_meta( 'ID' ),
					), $atts, 'uab_get_social' );

			$author_id = $uab_shortcode_atts['user_id'];
			$uab_template_type = 'uab-template-6';
			$uab_general_settings = get_option( 'uap_general_settings' );
			$uab_social_icons = maybe_unserialize( get_the_author_meta( 'uab_social_icons', $author_id ) );
			_e( '<div class="uab_get_social">' );
			include(UAB_PATH . '/inc/frontend/frontend-default/components/uab-component-social.php');
			_e( '</div>' );
			$form_html = ob_get_contents();
			ob_end_clean();
			return $form_html;
		}
		*/
		/* Add Author Box To post content */

		function uab_add_post_content( $content ) {
			$uab_general_settings = get_option( 'uap_general_settings' );
			$post_id = get_the_ID();
			$author = get_the_author_meta('ID');
			$uab_stored_meta = (get_post_meta( $post_id, 'uab_option' ) !== NULL) ? get_post_meta( $post_id, 'uab_option' ) : array();
			$uab_stored_meta_position = (get_post_meta( $post_id, 'uab_meta_position' ) !== NULL) ? get_post_meta( $post_id, 'uab_meta_position' ) : array();
			$uab_stored_meta_value = (isset( $uab_stored_meta[0] ) && !empty( $uab_stored_meta[0] )) ? $uab_stored_meta[0] : 'yes';
			$uab_stored_meta_value_position = (isset( $uab_stored_meta_position[0] ) && !empty( $uab_stored_meta[0] )) ? $uab_stored_meta_position[0] : 'default';

			$postIDfield = '';
			if ( is_singular( 'post' ) ) {
				$postID = get_the_ID();
				$postIDfield .= '<input type="hidden" value="' . $postID . '">';
				$count_key = 'post_views_count';
				$count = get_post_meta( $postID, $count_key, true );
				if ( $count == '' ) {
					$count = 0;
					delete_post_meta( $postID, $count_key );
					add_post_meta( $postID, $count_key, '0' );
				} else {
					$count++;
					update_post_meta( $postID, $count_key, $count );
				}
			}
			if ( $uab_general_settings['uab_posts'] && $uab_stored_meta_value == 'yes' ) {
				if ( is_singular( 'post' ) && is_main_query() && in_the_loop() ) {
					if ( $uab_stored_meta_value_position != 'default' ) {
						$check_position = $uab_stored_meta_value_position;
					} else {
						$check_position = $uab_general_settings['uab_box_position'];
					}
					switch ( $check_position ) {
						case 'uab_top':
							remove_filter( 'the_content', 'wpautop' );
							$content = $postIDfield . do_shortcode( '[ultimate_author_box]' ) . wpautop( $content );
							break;
						case 'uab_bottom':
							remove_filter( 'the_content', 'wpautop' );
							$content = wpautop( $content ) . $postIDfield;
							$content .= do_shortcode( '[ultimate_author_box]' );
							break;
						default:
							return $content;
					}
				}
				elseif (is_singular('post')) {
					if ( $uab_stored_meta_value_position != 'default' ) {
						$check_position = $uab_stored_meta_value_position;
					} else {
						$check_position = $uab_general_settings['uab_box_position'];
					}
					switch ( $check_position ) {
						case 'uab_top':
							remove_filter( 'the_content', 'wpautop' );
							$content = $postIDfield . do_shortcode( '[ultimate_author_box]' ) . wpautop( $content );
							break;
						case 'uab_bottom':
							remove_filter( 'the_content', 'wpautop' );
							$content = wpautop( $content ) . $postIDfield;
							$content .= do_shortcode( '[ultimate_author_box]' );
							break;
						default:
							return $content;
					}
				}
			}
			if ( $uab_general_settings['uab_pages'] && $uab_stored_meta_value == 'yes' ) {
				if ( is_singular( 'page' ) ) {
					if ( $uab_stored_meta_value_position != 'default' ) {
						$check_position = $uab_stored_meta_value_position;
					} else {
						$check_position = $uab_general_settings['uab_box_position'];
					}
					switch ( $check_position ) {
						case 'uab_top':
							remove_filter( 'the_content', 'wpautop' );
							$content = $postIDfield . do_shortcode( '[ultimate_author_box]' ) . wpautop( $content );
							break;
						case 'uab_bottom':
							remove_filter( 'the_content', 'wpautop' );
							$content = wpautop( $content ) . $postIDfield;
							$content .= do_shortcode( '[ultimate_author_box]' );
							break;
						default:
							return $content;
					}
				}
			}
			if ( $uab_general_settings['uab_custom_post'] && isset( $uab_general_settings['uab_custom_post_type_list'] ) && $uab_stored_meta_value == 'yes' ) {
				foreach ( $uab_general_settings['uab_custom_post_type_list'] as $innerKey => $type ) {
					if ( is_singular( $type ) ) {
						if ( $uab_stored_meta_value_position != 'default' ) {
							$check_position = $uab_stored_meta_value_position;
						} else {
							$check_position = $uab_general_settings['uab_box_position'];
						}
						switch ( $check_position ) {
							case 'uab_top':
								remove_filter( 'the_content', 'wpautop' );
								$content = $postIDfield . do_shortcode( '[ultimate_author_box]' ) . wpautop( $content );
								break;
							case 'uab_bottom':
								remove_filter( 'the_content', 'wpautop' );
								$content = wpautop( $content ) . $postIDfield;
								$content .= do_shortcode( '[ultimate_author_box]' );
								break;
							default:
								return $content;
						}
					}
				}
			}
			return $content;
		}

		/* Print function to Print Array */

		function print_array( $array ) {
			echo "<pre>";
			print_r( $array );
			echo "</pre>";
		}

		/* Twitter Feed Request */

		function get_oauth_connection( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret ) {
			$ai_connection = new TwitterOAuth( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret );
			return $ai_connection;
		}

		/* Fetch Twitter Feed */

		function get_twitter_tweets( $username, $total_tweets_number ) {
			$uab_general_settings = get_option( 'uap_general_settings' );
			$tweets = get_transient( 'uab_tweets' );
			$username = str_replace( '@', '', $username );

			if ( false === $tweets ) {
				$consumer_key = $uab_general_settings['uab_twitter_api_key'];
				$consumer_secret = $uab_general_settings['uab_twitter_api_secret'];
				$access_token = $uab_general_settings['uab_twitter_access_token'];
				$access_token_secret = $uab_general_settings['uab_twitter_token_secret'];
				$oauth_connection = $this->get_oauth_connection( $consumer_key, $consumer_secret, $access_token, $access_token_secret );
				$tweets = $oauth_connection->get( "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $username . "&count=" . $total_tweets_number );

				if ( isset( $uab_general_settings['uab_twitter_cache_period'] ) ) {
					$cache_period = $uab_general_settings['uab_twitter_cache_period'];
				} else {
					$cache_period = 1;
				}
				$cache_period = intval( $cache_period ) * 60;
				$cache_period = ($cache_period < 1) ? 3600 : $cache_period;
				if ( !isset( $tweets->errors ) ) {
					set_transient( 'uab_tweets', $tweets, $cache_period );
				}
			}
			return $tweets;
		}

		/* Callback funtion to Add Content to Profile.php */

		function uab_profile_fields( $user ) {
			if ( !current_user_can( 'edit_posts', $user->ID ) )
				return false;

			$uab_current_user = get_current_user_id();

			$uab_current_user_roles = new WP_User( $uab_current_user );

			if ( !empty( $uab_current_user_roles->roles ) && is_array( $uab_current_user_roles->roles ) ) {
				foreach ( $uab_current_user_roles->roles as $role )
					$uab_current_user_role[] = $role;
			}

			$uab_general_settings = get_option( 'uap_general_settings' );

			/* $this->print_array($uab_current_user_role); */
			/* $this->print_array($uab_general_settings['uab_user_roles']); */
			$user_permission_flag = 0;
			foreach ( $uab_current_user_role as $user_role ) {
				/* echo $user_role; */
				if ( in_array( $user_role, $uab_general_settings['uab_user_roles'] ) || $user_role == 'administrator' ) {

					// Added version silver
					$uab_target_ranking = get_the_author_meta( 'uab_frontend_target_ranking' , $user->ID );
					$uab_target_ranking = ($uab_target_ranking != '')?intval($uab_target_ranking):'';

					$unserialized_uab_profile_data = maybe_unserialize( get_the_author_meta( 'uab_profile_data', $user->ID ) );
					/* $uab_key_set = get_the_author_meta( 'wpKeySet', $user->ID ); */
					/* echo 'keys:'.$uab_key_set; */
					$uab_social_data = maybe_unserialize( get_the_author_meta( 'uab_social_icons', $user->ID ) );
					/* $this->print_array($uab_social_data); */
					if ( !empty( $uab_social_data ) ) {
						$uab_social_icons = maybe_unserialize( get_the_author_meta( 'uab_social_icons', $user->ID ) );
						$uab_social_icons = array(
							'facebook' => array(
								'icon' => 'facebook',
								'label' => 'Facebook',
								'url' => isset( $uab_social_icons['facebook']['url'] ) ? esc_url( $uab_social_icons['facebook']['url'] ) : ''
							),
							'twitter' => array(
								'icon' => 'twitter',
								'label' => 'Twitter',
								'url' => isset( $uab_social_icons['twitter']['url'] ) ? esc_url( $uab_social_icons['twitter']['url'] ) : ''
							),
							'instagram' => array(
								'icon' => 'instagram',
								'label' => 'Instagram',
								'url' => isset( $uab_social_icons['instagram']['url'] ) ? esc_url( $uab_social_icons['instagram']['url'] ) : ''
							),
							'youtube' => array(
								'icon' => 'youtube',
								'label' => 'Youtube',
								'url' => isset( $uab_social_icons['youtube']['url'] ) ? esc_url( $uab_social_icons['youtube']['url'] ) : ''
							),
							'linkedin' => array(
								'icon' => 'linkedin',
								'label' => 'Linkedin',
								'url' => isset( $uab_social_icons['linkedin']['url'] ) ? esc_url( $uab_social_icons['linkedin']['url'] ) : ''
							),
							'pinterest' => array(
								'icon' => 'pinterest',
								'label' => 'Pinterest',
								'url' => isset( $uab_social_icons['pinterest']['url'] ) ? esc_url( $uab_social_icons['pinterest']['url'] ) : ''
							),
							'google-plus' => array(
								'icon' => 'google-plus',
								'label' => 'Google+',
								'url' => isset( $uab_social_icons['google-plus']['url'] ) ? esc_url( $uab_social_icons['google-plus']['url'] ) : ''
							),
							'tumblr' => array(
								'icon' => 'tumblr',
								'label' => 'Tumblr.',
								'url' => isset( $uab_social_icons['tumblr']['url'] ) ? esc_url( $uab_social_icons['tumblr']['url'] ) : ''
							),
							'reddit' => array(
								'icon' => 'reddit',
								'label' => 'Reddit',
								'url' => isset( $uab_social_icons['reddit']['url'] ) ? esc_url( $uab_social_icons['reddit']['url'] ) : ''
							),
							'flickr' => array(
								'icon' => 'flickr',
								'label' => 'Flickr',
								'url' => isset( $uab_social_icons['flickr']['url'] ) ? esc_url( $uab_social_icons['flickr']['url'] ) : ''
							),
							'vine' => array(
								'icon' => 'vine',
								'label' => 'Vine',
								'url' => isset( $uab_social_icons['vine']['url'] ) ? esc_url( $uab_social_icons['vine']['url'] ) : ''
							),
							'meetup' => array(
								'icon' => 'meetup',
								'label' => 'Meetup',
								'url' => isset( $uab_social_icons['meetup']['url'] ) ? esc_url( $uab_social_icons['meetup']['url'] ) : ''
							),
							'github' => array(
								'icon' => 'github',
								'label' => 'Github',
								'url' => isset( $uab_social_icons['github']['url'] ) ? esc_url( $uab_social_icons['github']['url'] ) : ''
							),
							'soundcloud' => array(
								'icon' => 'soundcloud',
								'label' => 'Soundcloud',
								'url' => isset( $uab_social_icons['soundcloud']['url'] ) ? esc_url( $uab_social_icons['soundcloud']['url'] ) : ''
							),
							'steam' => array(
								'icon' => 'steam',
								'label' => 'Steam',
								'url' => isset( $uab_social_icons['steam']['url'] ) ? esc_url( $uab_social_icons['steam']['url'] ) : ''
							),
							'vimeo' => array(
								'icon' => 'vimeo',
								'label' => 'Vimeo',
								'url' => isset( $uab_social_icons['vimeo']['url'] ) ? esc_url( $uab_social_icons['vimeo']['url'] ) : ''
							),
							'wordpress' => array(
								'icon' => 'wordpress',
								'label' => 'WordPress',
								'url' => isset( $uab_social_icons['wordpress']['url'] ) ? esc_url( $uab_social_icons['wordpress']['url'] ) : ''
							),
							'telegram' => array(
								'icon' => 'telegram',
								'label' => 'Telegram',
								'url' => isset( $uab_social_icons['telegram']['url'] ) ? esc_url( $uab_social_icons['telegram']['url'] ) : ''
							),
							'spotify' => array(
								'icon' => 'spotify',
								'label' => 'Spotify',
								'url' => isset( $uab_social_icons['spotify']['url'] ) ? esc_url( $uab_social_icons['spotify']['url'] ) : ''
							),
							'snapchat' => array(
								'icon' => 'snapchat',
								'label' => 'Snapchat',
								'url' => isset( $uab_social_icons['snapchat']['url'] ) ? esc_url( $uab_social_icons['snapchat']['url'] ) : ''
							),
							'skype' => array(
								'icon' => 'skype',
								'label' => 'Skype',
								'url' => isset( $uab_social_icons['skype']['url'] ) ? esc_url( $uab_social_icons['skype']['url'] ) : ''
							),
							'whatsapp' => array(
								'icon' => 'whatsapp',
								'label' => 'Whatsapp',
								'url' => isset( $uab_social_icons['whatsapp']['url'] ) ? esc_url( $uab_social_icons['whatsapp']['url'] ) : ''
							),
							'dribbble' => array(
								'icon' => 'dribbble',
								'label' => 'Dribbble',
								'url' => isset( $uab_social_icons['dribbble']['url'] ) ? esc_url( $uab_social_icons['dribbble']['url'] ) : ''
							),
							'rss' => array(
								'icon' => 'rss',
								'label' => 'RSS',
								'url' => isset( $uab_social_icons['rss']['url'] ) ? esc_url( $uab_social_icons['rss']['url'] ) : ''
							),
							'quora' => array(
								'icon' => 'quora',
								'label' => 'Quora',
								'url' => isset( $uab_social_icons['quora']['url'] ) ? esc_url( $uab_social_icons['quora']['url'] ) : ''
							),
							'blogger' => array(
								'icon' => 'blogger',
								'label' => 'Blogger',
								'url' => isset( $uab_social_icons['blogger']['url'] ) ? esc_url( $uab_social_icons['blogger']['url'] ) : ''
							),
							'odnoklassniki'	=> array(
								'icon'	=> 'odnoklassniki',
								'label'	=> 'Odnoklassniki',
								'url'	=> isset($uab_social_icons['odnoklassniki']['url'])?esc_url($uab_social_icons['odnoklassniki']['url']):''
							),
							'vk'		=> array(
								'icon'	=> 'vk',
								'label'	=> 'Vkontakte',
								'url'	=> isset($uab_social_icons['vk']['url'])?esc_url($uab_social_icons['vk']['url']):''
							),
						);
					} else {
						$uab_social_icons = array(
							'facebook' => array(
								'icon' => 'facebook',
								'label' => 'Facebook',
								'url' => ''
							),
							'twitter' => array(
								'icon' => 'twitter',
								'label' => 'Twitter',
								'url' => ''
							),
							'instagram' => array(
								'icon' => 'instagram',
								'label' => 'Instagram',
								'url' => ''
							),
							'youtube' => array(
								'icon' => 'youtube',
								'label' => 'Youtube',
								'url' => ''
							),
							'linkedin' => array(
								'icon' => 'linkedin',
								'label' => 'Linkedin',
								'url' => ''
							),
							'pinterest' => array(
								'icon' => 'pinterest',
								'label' => 'Pinterest',
								'url' => ''
							),
							'google-plus' => array(
								'icon' => 'google-plus',
								'label' => 'Google+',
								'url' => ''
							),
							'tumblr' => array(
								'icon' => 'tumblr',
								'label' => 'Tumblr.',
								'url' => ''
							),
							'reddit' => array(
								'icon' => 'reddit',
								'label' => 'Reddit',
								'url' => ''
							),
							'flickr' => array(
								'icon' => 'flickr',
								'label' => 'Flickr',
								'url' => ''
							),
							'vine' => array(
								'icon' => 'vine',
								'label' => 'Vine',
								'url' => ''
							),
							'meetup' => array(
								'icon' => 'meetup',
								'label' => 'Meetup',
								'url' => ''
							),
							'github' => array(
								'icon' => 'github',
								'label' => 'Github',
								'url' => ''
							),
							'soundcloud' => array(
								'icon' => 'soundcloud',
								'label' => 'Soundcloud',
								'url' => ''
							),
							'steam' => array(
								'icon' => 'steam',
								'label' => 'Steam',
								'url' => ''
							),
							'vimeo' => array(
								'icon' => 'vimeo',
								'label' => 'Vimeo',
								'url' => ''
							),
							'wordpress' => array(
								'icon' => 'wordpress',
								'label' => 'WordPress',
								'url' => ''
							),
							'telegram' => array(
								'icon' => 'telegram',
								'label' => 'Telegram',
								'url' => ''
							),
							'spotify' => array(
								'icon' => 'spotify',
								'label' => 'Spotify',
								'url' => ''
							),
							'snapchat' => array(
								'icon' => 'snapchat',
								'label' => 'Snapchat',
								'url' => ''
							),
							'skype' => array(
								'icon' => 'skype',
								'label' => 'Skype',
								'url' => ''
							),
							'whatsapp' => array(
								'icon' => 'whatsapp',
								'label' => 'Whatsapp',
								'url' => ''
							),
							'dribbble' => array(
								'icon' => 'dribbble',
								'label' => 'Dribbble',
								'url' => ''
							),
							'rss' => array(
								'icon' => 'rss',
								'label' => 'RSS',
								'url' => ''
							),
							'quora' => array(
								'icon' => 'quora',
								'label' => 'Quora',
								'url' => ''
							),
							'blogger' => array(
								'icon' => 'blogger',
								'label' => 'Blogger',
								'url' => ''
							),
							'odnoklassniki'	=> array(
								'icon'	=> 'odnoklassniki',
								'label'	=> 'Odnoklassniki',
								'url'	=> ''
							),
							'vk'		=> array(
								'icon'	=> 'vk',
								'label'	=> 'Vkontakte',
								'url'	=> ''
							),
						);
					}
					$uab_wysiwyg_content = maybe_unserialize( get_the_author_meta( 'uab_wysiwyg_content', $user->ID ) );


					/* $this->print_array($uab_wysiwyg_content); */
					$uab_company_content = maybe_unserialize( get_the_author_meta( 'uab_company_content', $user->ID ) );
					$uab_shortcode = maybe_unserialize( get_the_author_meta( 'uab_shortcode', $user->ID ) );
					$uab_contact_shortcode = maybe_unserialize( get_the_author_meta( 'uab_contact_shortcode', $user->ID ) );
					/* $this->print_array($uab_contact_shortcode); */
					/* $this->print_array($uab_wysiwyg_content); */

					$uab_frontend_shortcode_title = get_user_meta($user->ID, 'uab_frontend_shortcode_title', true);
					$uab_frontend_shortcode = get_user_meta($user->ID, 'uab_frontend_shortcode', true);

					$uab_random_identifier = (isset($unserialized_uab_profile_data[0]['uab_random_identifier']) && !empty($unserialized_uab_profile_data[0]['uab_random_identifier']))?esc_attr($unserialized_uab_profile_data[0]['uab_random_identifier']):str_pad( dechex( mt_rand( 0, pow(16, 5) ) ), 2, '0', STR_PAD_LEFT);

					include(UAB_PATH . '/inc/backend/ultimate-profile-settings.php');
					break;
				} else {
					$user_permission_flag++;
				}
			}
			if ( $user_permission_flag > 0 ) {
				?><div id="setting-error-bloger" class="notice notice-info is-dismissible"> 
					<p><strong><span style="display: block; margin: 0.5em 0.5em 0 0; clear: both;"><?php esc_html_e( 'Note: The Ultimate Author Box is installed but you do not have the permission to configure it. Please contact the site Admin to have access to your AuthorBox.', 'ultimate-author-box' ); ?></span>
						</strong></p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div><?php
			}
		}

		/* Mail Submission function */

		function uab_form_submission() {
			if ( check_ajax_referer( 'uab_form_nonce', '_wpnonce' ) ) {
				$to = sanitize_text_field( $_POST['to'] );
				$from = sanitize_text_field( $_POST['from'] );
				$email = sanitize_text_field( $_POST['email'] );
				$phone = sanitize_text_field( $_POST['phone'] );
				$subject = sanitize_text_field( $_POST['subject'] );
				$message = sanitize_text_field( $_POST['message'] );
				$sent_message = __( 'Hello there, 

You have received an email from your site. 

Details below: 
Name: #name 
Email: #email 
Phone: #phone
Subject: #subject 
Message: #message 

Thank you!  ', 'ultimate-author-box' );
				$orginalstr = array( '#name', '#email', 'phone', '#subject', '#message' );
				$replacestr = array( $from, $email, $phone, $subject, $message );
				$email_message = str_replace( $orginalstr, $replacestr, $sent_message );
				$email_message = $this->sanitize_escaping_linebreaks( $email_message );

				$header = array();
				$headers[] = 'Content-Type: text/html; charset=UTF-8';
				$headers[] = 'From:' . $from . ' ' . '<' . $email . '>';

				$email_check = wp_mail( $to, $subject, $email_message, $headers );
				if ( $email_check ) {
					echo "success";
				} else {
					echo "error";
				}
				die();
			}
		}

		/* Creating format for textarea input */

		function sanitize_escaping_linebreaks( $text ) {
			$text = implode( "<br \>", explode( "\n", $text ) );
			return $text;
		}

		function uab_show_popup() {
			if ( check_ajax_referer( 'uab_popup_nonce', '_wpnonce_popup' ) ) {
				$author_id = sanitize_text_field( $_POST['author_id'] );
				$uab_profile_data = maybe_unserialize( get_the_author_meta( 'uab_profile_data', $author_id ) );
				$uab_general_settings = get_option( 'uap_general_settings' );
				$uab_select_image_option = isset( $uab_profile_data[0]['uab_image_select'] ) ? $uab_profile_data[0]['uab_image_select'] : 'uab_gravatar';
				_e( '<div class="uab-frontend-popup-wrapper">
          <div class="uab-frontend-popup-content">
            <span class="uab-popup-close">&times;</span>
            <div class="uab-pop-up-wrapper-first uab-clearfix">
              <div class="uab-popup-image-wrapper"><div class="uab-author-profile-pic"><div class="uap-profile-image uap-profile-image-square">' );
				switch ( $uab_select_image_option ) {
					case 'uab_facebook':
						if ( !empty( $uab_profile_data[0]['uab_profile_image_facebook'] ) ) {
							_e( '<img src="//graph.facebook.com/' . esc_attr( $uab_profile_data[0]["uab_profile_image_facebook"] ) . '/picture?width=200">' );
						} else {
							_e( get_avatar( $author_id, 200 ) );
						}
						break;
					case 'uab_instagram':
						if ( !empty( $uab_profile_data[0]['uab_profile_image_instagram'] ) ) {
							_e( '<img src="https://instagram.com/p/' . esc_attr( $uab_profile_data[0]["uab_profile_image_instagram"] ) .
									'/media/" width=200>' );
						} else {
							_e( get_avatar( $author_id, 200 ) );
						}
						break;
					case 'uab_twitter':
						if ( !empty( $uab_profile_data[0]['uab_profile_image_twitter'] ) ) {
							_e( '<img src="https://twitter.com/' . esc_attr( $uab_profile_data[0]["uab_profile_image_twitter"] ) . '/profile_image?size=original" width=200>' );
						} else {
							_e( get_avatar( $author_id, 200 ) );
						}
						break;
					case 'uab_upload_image':
						if ( !empty( $uab_profile_data[0]['uab_upload_image_url'] ) ) {
							_e( '<img src="' );
							esc_attr_e( $uab_profile_data[0]["uab_upload_image_url"] );
							_e( '" width="200">' );
						} else {
							_e( get_avatar( $author_id, 200 ) );
						}
						break;
					default:
						_e( get_avatar( $author_id, 200 ) );
				}
				_e( '</div></div></div><div class="uab-popup-description-wrapper "><div class="uab-display-name">' );
				_e( '<a href="' );
				esc_attr_e( get_author_posts_url( $author_id ) );
				_e( '" target="_blank">' );
				the_author_meta( 'display_name', $author_id );
				_e( '</a>' );
				_e( '<span class="uab-user-role">' );
				$user_meta = get_userdata( $author_id );
				$user_roles = $user_meta->roles;
				$user_role_lists = $this->get_editable_roles();
				foreach ( $user_role_lists as $user_role_list => $value ) {
					/* echo $user_role_list; */
					foreach ( $user_roles as $role => $val ) {
						/* echo $val; */
						if ( $user_role_list == $val ) {
							_e( $user_role_lists[$user_role_list]['name'] );
						}
					}
				}
				_e( '</span></div><div class="uab-company-info"><span class="uab-company-designation">' );
				_e( $uab_profile_data[0]['uab_company_designation'] );
				_e( '</span><span class="uab-designation-separator">&nbsp;' );

				if ( !empty( $uab_profile_data[0]['uab_company_url'] ) ) {

					isset( $uab_profile_data[0]["uab_company_separator"] ) ? $author_separator = ($uab_profile_data[0]["uab_company_separator"]) : $author_separator = esc_html_( ' at', 'ultimate-author-box' );

					_e( $author_separator );
					_e( '&nbsp;</span><a href="' . esc_attr( $uab_profile_data[0]["uab_company_url"] ) . '">' . esc_html( $uab_profile_data[0]["uab_company_name"] ) . '</a>' );
				}
				_e( '</div><div class="uab-short-info">' );
				if ( (get_the_author_meta( 'description', $author_id ) == '' && $uab_general_settings['uab_default_bio'] ) ) {
					_e( $uab_general_settings['uab_default_message'] );
				} else {
					the_author_meta( 'description', $author_id );
				}
				_e( '</div></div></div><div class="uab-pop-up-wrapper-second uab-clearfix"><div class="uab-popup-contact-wrapper"><div class="uab-short-contact"><div class="uab-contact-inner"><div class="uab-user-website"><i class="fa fa-globe" aria-hidden="true"></i> <a href="' );
				the_author_meta( 'url', $author_id );
				_e( '" target="_blank">' );
				the_author_meta( 'url', $author_id );
				_e( '</a></div></div>' );
				if ( $uab_email_disable ):
					_e( '<div class="uab-contact-inner"><div class="uab-user-email"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:' );
					_e( $this->encode_email( get_the_author_meta( 'email', $author_id ) ) . '">' );
					_e( $this->encode_email( get_the_author_meta( 'email', $author_id ) ) );
					_e( '</a></div></div>' );
				endif;
				if ( isset( $uab_profile_data[0]['uab_company_phone'] ) && !empty( $uab_profile_data[0]['uab_company_phone'] ) ) {
					_e( '<div class="uab-contact-inner"><div class="uab-user-phone"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:' );
					$author_phone = isset( $uab_profile_data[0]['uab_company_phone'] ) ? $uab_profile_data[0]['uab_company_phone'] : '';
					_e( $author_phone );
					_e( '">' );
					_e( $author_phone );
					_e( '</a></div></div>' );
				}
				_e( '</div><div class="uab-social-icons"><ul id="uap-social-outlets-fields">' );
				$uab_social_icons = maybe_unserialize( get_the_author_meta( 'uab_social_icons', $author_id ) );
				if ( !empty( $uab_social_icons ) ) {
					foreach ( $uab_social_icons as $socialname => $innerarray ) {
						if ( !empty( $uab_social_icons[$socialname]['url'] ) ) {
							_e( '<li class="uab-icon-' );
							esc_attr_e( $uab_social_icons[$socialname]['label'] );
							_e( '"><a href="' );
							_e( $uab_social_icons[$socialname]['url'] );
							_e( '" target="' );
							_e( $uab_general_settings['uab_link_target_option'] );
							_e( '"><i class="fa fa-' );
							_e( $uab_social_icons[$socialname]['icon'] );
							_e( '"></i></a>' );
							_e( '<div class="uab-frontend-tooltip">' );
							_e( $uab_social_icons[$socialname]['url'] );
							_e( '</div></li>' );
						}
					}
				}
				_e( '</ul></div></div><div class="uab-popup-recent-wrapper"><div class="uab-post-title">');
				_e('Latest Posts','ultimate-author-box');
				_e('</div><ul>' );
				$recent = get_posts( array(
					'author' => $author_id,
					'orderby' => 'date',
					'order' => 'desc',
					'numberposts' => -1,
				) );
				$loop_counter = 0;
				if ( $recent ) {
					foreach ( $recent as $post ) {
						if ( $loop_counter < 4 ) {
							if ( has_post_thumbnail( $post->ID ) ) {
								_e( '<li><div class="uab-post-image" title="');
								_e($post->post_title);
								_e('"><a href="' );
								_e( get_permalink( $post->ID ) );
								_e( '">' );
								_e( get_the_post_thumbnail( $post->ID, 'thumbnail' ) );
								_e( '</a></div></li>' );
								$loop_counter++;
							}
						}
					}
				} else {
					_e( 'The User does not have any posts', 'ultimate-author-box' );
				}
				_e( '</ul></div></div></div></div></div></div></div>' );
			}
			wp_die();
		}

		function return_cache_period() {
			/* please set the integer value in seconds */
			return 2;
		}

		/* Fetch RSS Feeds */

		function uab_get_rss_feed( $feed_url, $number_of_feeds_to_show ) {

			/* Get a rss feed object from the specified feed source. */
			add_filter( 'wp_feed_cache_transient_lifetime', array( $this, 'return_cache_period' ) );
			$rss = fetch_feed( $feed_url );
			remove_filter( 'wp_feed_cache_transient_lifetime', array( $this, 'return_cache_period' ) );
			if ( !is_wp_error( $rss ) ) {
				/* Figure out how many total items there are, but limit it to number specified */
				$maxitems = $rss->get_item_quantity( $number_of_feeds_to_show );
				$rss_items = $rss->get_items( 0, $maxitems );
				return $rss_items;
			} else {
				return false;
			}
		}

		/* Register Ultimate Author Box Option Metabox */

		function uab_metabox() {
			$args = array(
				'public' => true,
			);
			/* names or objects, note names is the default */
			$output = 'names';
			/* 'and' or 'or' */
			$operator = 'and';

			$post_types = get_post_types( $args, $output, $operator );

			$uab_general_settings = get_option( 'uap_general_settings' );

			add_meta_box(
					'uab_meta', __( 'Ultimate Author Box Options' ), array( $this, 'uab_meta_callback' ), array( 'post', 'page', $post_types ), 'side', 'high'
			);

			if (!$uab_general_settings['uab_disable_coauthor']) {
				add_meta_box(
						'uab_co_author', __('Ultimate Co Authors') , array($this, 'uab_co_author_callback'), array('post','page',$post_types), 'side','high'
				);
			}
				$this->uab_co_author_meta();

		}

		function uab_co_author_meta(){
			add_meta_box('uab_guest_company_details',__('Company Details') ,array($this,'uab_guest_company_details'),array('uab_guest_author','side','high'));
			add_meta_box('uab_guest_general_details',__('Guest Details') ,array($this,'uab_guest_general_details'),array('uab_guest_author'),'side','high');
			add_meta_box('uab_guest_image_details',__('Profile Image') ,array($this,'uab_guest_image_details'),array('uab_guest_author'),'side','low');
			add_meta_box('uab_guest_social_icons',__('Social Icons') ,array($this,'uab_guest_social_icons'),array('uab_guest_author'));
	
			add_filter( 'gettext', array($this,'change_publish_button'), 10, 2 );
		}



		function change_publish_button( $translation, $text ) {
			if (isset($_GET['post_type']) && ($_GET['post_type'] == 'uab_guest_author')) {
				if ( $text == 'Publish' )
				    return 'Add Guest';
			}
			return $translation;
		}

		function uab_guest_social_icons(){
			$guest_details = get_post_meta(get_the_ID(),'uab_guest_details',true);
			$guest_details_social = isset($guest_details['social'])?$guest_details['social']:array();
			include_once('inc/backend/guest_author/guest_social_icons.php');
		}

		function uab_guest_general_details(){
			$guest_details = get_post_meta(get_the_ID(),'uab_guest_details',true);
			include_once('inc/backend/guest_author/guest_general_details.php');
		}

		function uab_guest_company_details(){
			$guest_details = get_post_meta(get_the_ID(),'uab_guest_details',true);
			include_once('inc/backend/guest_author/guest_company_details.php');
		}

		function uab_guest_image_details(){
			$guest_details = get_post_meta(get_the_ID(),'uab_guest_details',true);
			include_once('inc/backend/guest_author/guest_image.php');
		}

		function uab_co_author_callback($post){
			if (current_user_can('manage_options')) {
				
				$blogusers = get_users();
				$uab_co_authors_main = get_post_meta($post->ID,'uab_meta_co_author');
				$uab_co_authors = !empty($uab_co_authors_main[0])?maybe_unserialize($uab_co_authors_main[0]):array();
				$post_author = intval($post->post_author);

				$args = array(
				  'offset'           => 0,
				  'post_type'        => 'uab_guest_author',
				  'post_status'      => 'publish',
				  'suppress_filters' => true,
				  'numberposts'      => -1,
				);
				$guest_author = get_posts( $args );
				// $this->print_array($guest_author);

				// Array of WP_User objects.
				$output = "<div class='uab-co-author-wrap'>";
				foreach ($blogusers as $index => $user_obj) {
					if ($post_author != $user_obj->data->ID) {
						$output .= "<div class='uab-co-author-individual'>";
							$output .= "<input type='checkbox' name='uab_co_authors[author][]' value='" . intval($user_obj->data->ID) . "' ";
							if ( isset($uab_co_authors['author']) && in_array(intval($user_obj->data->ID), $uab_co_authors['author'])) {
								$output .= "checked";
							}
							$output .= "/>";
							$output .= esc_attr($user_obj->data->display_name);
						$output .= "</div>";
					}
				}
				foreach ($guest_author as $index => $guest_details) {
					$output .= "<div class='uab-co-author-individual'>";
							$output .= "<input type='checkbox' name='uab_co_authors[guest][]' value='" . intval($guest_details->ID) . "' ";
							if (isset($uab_co_authors['guest']) && in_array(intval($guest_details->ID), $uab_co_authors['guest'])) {
								$output .= "checked";
							}
							$output .= "/>";
							$output .= esc_attr($guest_details->post_title);
						$output .= "</div>";
				}
				$output .= "</div>";
				if ((count($blogusers) == 1) && (count($guest_author) == 0)) {
					$output .= '<div>';
					$output .= esc_attr__('No other authors assigned in the site','ultimate-author-box');
					$output .= '</div>';
				}
				echo $output;
				// $this->print_array($blogusers);
			}
		}

		/* Ultimate Author Box Option Metabox Callback Function */

		function uab_meta_callback( $post ) {
			wp_nonce_field( basename( __FILE__ ), 'uab_nonce' );
			$uab_stored_meta = get_post_meta( $post->ID, 'uab_option' );
			$uab_stored_meta_position = get_post_meta( $post->ID, 'uab_meta_position' );
			$uab_co_author_display_type = get_post_meta( $post->ID, 'uab_co_author_display_type' ,true);
			$uab_general_settings = get_option( 'uap_general_settings' );

			/* $this->print_array($uab_stored_meta); */
			/* $this->print_array($uab_stored_meta_position); */
			/* $this->print_array($uab_co_author_display_type); */
			?>
			<p>
				<label><?php _e( 'Show Author Box in this post', 'ultimate-author-box' ); ?></label>
				<select name="uab_meta_option" id="uab-meta-option" value="<?php !empty( $uab_stored_meta[0] ) ? $uab_stored_meta[0] : 'yes' ?>">
					<option value="yes" <?php if ( !empty( $uab_stored_meta[0] ) ) selected( $uab_stored_meta[0], 'yes' ); ?>><?php _e( 'Yes', 'ultimate-author-box' ); ?></option>
					<option value="no" <?php if ( !empty( $uab_stored_meta[0] ) ) selected( $uab_stored_meta[0], 'no' ); ?>><?php _e( 'No', 'ultimate-author-box' ); ?></option>
				</select>
			</p>
			<p>
				<label><?php _e( 'Author Box Position', 'ultimate-author-box' ); ?></label>
				<select name="uab_meta_position" id="uab-meta-position" value="<?php !empty( $uab_stored_meta_position[0] ) ? $uab_stored_meta_position[0] : 'default' ?>">
					<option value="default" <?php if ( !empty( $uab_stored_meta_position[0] ) ) selected( $uab_stored_meta_position[0], 'default' ); ?>><?php _e( 'Default', 'ultimate-author-box' ); ?></option>
					<option value="uab_top" <?php if ( !empty( $uab_stored_meta_position[0] ) ) selected( $uab_stored_meta_position[0], 'uab_top' ); ?>><?php _e( 'Top', 'ultimate-author-box' ); ?></option>
					<option value="uab_bottom" <?php if ( !empty( $uab_stored_meta_position[0] ) ) selected( $uab_stored_meta_position[0], 'uab_bottom' ); ?>><?php _e( 'Bottom', 'ultimate-author-box' ); ?></option>
				</select>
			</p>
			<?php if (!$uab_general_settings['uab_disable_coauthor']): ?>
				<p>
					<label><?php _e('Co Author Layout Type','ultimate-author-box'); ?></label>
					<select name="uab_co_author_display_type">
						<option value="list" <?php selected(isset($uab_co_author_display_type)?esc_attr($uab_co_author_display_type):'','list') ?>><?php esc_attr_e('List','ultimate-author-box') ?></option>
						<option value="grid" <?php selected(isset($uab_co_author_display_type)?esc_attr($uab_co_author_display_type):'','grid') ?>><?php esc_attr_e('Grid','ultimate-author-box') ?></option>
					</select>
				</p>
			<?php endif ?>
			<?php
		}

		/* Ultimate Author Box Option Metabox Save */

		function uab_meta_save( $post_id ) {
			/* Checks save status */
			$is_autosave = wp_is_post_autosave( $post_id );
			$is_revision = wp_is_post_revision( $post_id );
			$is_valid_nonce = ( isset( $_POST['uab_nonce'] ) && wp_verify_nonce( $_POST['uab_nonce'], basename( __FILE__ ) ) ) ? 'true' : 'false';
			/* die($_POST['uab_meta_option']); */
			/* Exits script depending on save status */
			if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
				return;
			}

			$uab_meta_co_author = !empty($_POST['uab_co_authors'])?maybe_serialize($_POST['uab_co_authors']):'';
			$uab_co_author_type = !empty($_POST['uab_co_author_display_type'])?sanitize_text_field($_POST['uab_co_author_display_type']):'';
			$uab_meta_option = !empty( $_POST['uab_meta_option'] ) ? $_POST['uab_meta_option'] : '';
			$uab_meta_position = !empty( $_POST['uab_meta_position'] ) ? $_POST['uab_meta_position'] : '';

			update_post_meta( $post_id, 'uab_option', sanitize_text_field( $uab_meta_option ) );
			update_post_meta( $post_id, 'uab_meta_position', sanitize_text_field( $uab_meta_position ) );

			if (!empty($uab_meta_co_author)) {
				update_post_meta( $post_id, 'uab_meta_co_author', sanitize_text_field( $uab_meta_co_author ) );
			}
			if (!empty($uab_co_author_type)) {
				update_post_meta( $post_id, 'uab_co_author_display_type', $uab_co_author_type );
			}
		}

		function uab_guest_save($post_id){
			if (isset($_POST['uab_guest_nonce_field']) && wp_verify_nonce($_POST['uab_guest_nonce_field'],'uab_guest_nonce')) {
				$uab_guest_details = $_POST['uab_guest_detail'];
				$temp_array = array();
				foreach ($uab_guest_details as $type => $type_array) {
					foreach ($type_array as $key => $value) {
						if (is_array($value)) {
							foreach ($value as $socialname => $data) {
								$temp_array[sanitize_text_field($type)][sanitize_text_field($key)]['icon'] = $key;
								$temp_array[sanitize_text_field($type)][sanitize_text_field($key)]['label'] = $key;
								$temp_array[sanitize_text_field($type)][sanitize_text_field($key)]['url'] = sanitize_text_field($data);
							}
						}
						else{
							$temp_array[sanitize_text_field($type)][sanitize_text_field($key)] = sanitize_text_field($value);
						}
					}
				}
				// $this->print_array($temp_array);
				// die();
				update_post_meta($post_id,'uab_guest_details',$temp_array);
			}
		}

		/* Encode Email */

		function encode_email( $e ) {
			$output = '';
			for ( $i = 0; $i < strlen( $e ); $i++ ) {
				$output .= '&#' . ord( $e[$i] ) . ';';
			}
			return $output;
		}

		/* Callback funtion to Save values of Profile.php */

		function uab_save_profile_fields( $user_id ) {
			// $this->print_array($_POST);
			// die();

			$uab_frontend_shortcode = isset( $_POST['uab_frontend_shortcode'] )? wp_kses_post( $_POST['uab_frontend_shortcode']):'';
			$uab_frontend_shortcode_title = isset( $_POST['uab_frontend_shortcode_title'] )? sanitize_text_field( $_POST['uab_frontend_shortcode_title']):'';
			// Added version silver
			$uab_link_target_ranking = isset($_POST['uab_link_influence_avoid'])?intval(1):intval(0);

			update_user_meta( $user_id, 'uab_frontend_shortcode', $uab_frontend_shortcode );
			update_user_meta( $user_id, 'uab_frontend_shortcode_title', $uab_frontend_shortcode_title );
			// Added version silver
			update_user_meta( $user_id, 'uab_frontend_target_ranking', $uab_link_target_ranking );
			
			if ( !current_user_can( 'edit_user', $user_id ) )
				return false;

			/* Query to save current tab structure setting into usermeta table */
			if ( isset( $_POST['uab_profile_data'] ) ) {
				foreach ( $_POST as $key => $val ) {
					if ( $key == 'uab_profile_data' ) {
						$$key = $val;
					}
				}

				/* Sanitizing each form fields for Menu field added */
				$uab_profile_data_temp = array();
				foreach ( $uab_profile_data as $key => $val ) {
					$uab_profile_data_temp[$key] = array();
					foreach ( $val as $k => $v ) {
						if ( !is_array( $v ) ) {
   							$uab_profile_data_temp[$key][$k] = sanitize_text_field( $v );
						} else {
							$uab_profile_data_temp[$key][$k] = array_map( 'sanitize_text_field', $v );
						}
					}

					if ($val['uab_tab_type'] == 'uab_linkedin_profile') {
						if (isset($val['uab_linkedin_client_id']) && isset($val['uab_linkedin_secret_id']) ) {
							if (!empty($val['uab_linkedin_client_id'])) {
								$client_id  = esc_attr($val['uab_linkedin_client_id']);
								update_user_meta($user_id,'uab_linkedin_client_id',$client_id);
							}
							if (!empty($val['uab_linkedin_secret_id'])) {
								$secret_id  = esc_attr($val['uab_linkedin_secret_id']);
								update_user_meta($user_id,'uab_linkedin_secret_id',$secret_id);
							}
						}
					}

				}

				$uab_profile_data = $uab_profile_data_temp;
				$serialized_uab_profile_data = serialize( $uab_profile_data );

				update_user_meta( $user_id, 'uab_profile_data', $serialized_uab_profile_data );
			}

			if ( isset( $_POST['uab_social_icons'] ) ) {
				$uab_social_icons = array();
				foreach ( $_POST['uab_social_icons'] as $socialname => $innerarray ) {
					$uab_social_icons[$socialname]['icon'] = $socialname;
					$uab_social_icons[$socialname]['label'] = $socialname;
					$uab_social_icons[$socialname]['url'] = $innerarray['url'];
				}

				$serialized_social_icons = serialize( $uab_social_icons );
				update_user_meta( $user_id, 'uab_social_icons', $serialized_social_icons );
			}

			$allowed_html = array(
				'quotes' => array()
			);


			if ( isset( $_POST['uab_shortcode'] ) ) {
				$uab_shortcode = array();
				foreach ( $_POST['uab_shortcode'] as $key => $value ) {
					$uab_shortcode[$key] = wp_kses( $value, $allowed_html );
				}

				update_user_meta( $user_id, 'uab_shortcode', $uab_shortcode );
			}
			if ( isset( $_POST['uab_contact_shortcode'] ) ) {
				$uab_contact_shortcode = array();
				foreach ( $_POST['uab_contact_shortcode'] as $key => $value ) {
					$uab_contact_shortcode[$key] = wp_kses( $value, $allowed_html );
				}

				update_user_meta( $user_id, 'uab_contact_shortcode', $uab_contact_shortcode );
			}

			if ( isset( $_POST['uab_wysiwyg_content'] ) ) {
				$uab_wysiwyg_content = array();
				foreach ( $_POST['uab_wysiwyg_content'] as $key => $value ) {
					$uab_wysiwyg_content[$key] = wp_kses_post($value);
				}

				update_user_meta( $user_id, 'uab_wysiwyg_content', $uab_wysiwyg_content );
			}

			if ( isset( $_POST['uab_company_content'] ) ) {
				$uab_company_content = array();
				foreach ( $_POST['uab_company_content'] as $key => $value ) {
					$uab_company_content[$key] = wp_kses_post( $value );
				}

				update_user_meta( $user_id, 'uab_company_content', $uab_company_content );
			}

			$allowed_html = wp_kses_allowed_html( 'post' );
			$custom_bio_box = !empty($_POST['uab_custom_description'])?wp_kses( $_POST['uab_custom_description'] , $allowed_html ):'';
			update_user_meta($user_id, 'uab_custom_description' , $custom_bio_box );
		}

		/* All Widget related Code @since 1.0 */

		/* Create our own widget area to store all mega menu widgets. All widgets from all menus are stored here, they are filtered later to ensure the correct widgets show under the correct menu item. @since 1.0 */

		public function register_sidebar() {

			register_sidebar(
					array(
						'id' => 'uab-tab-widget',
						'name' => __( "Ultimate Author Box Widget area", 'ultimate-author-box' ),
						'description' => __( "Do not manually edit this area.", 'ultimate-author-box' )
					)
			);
		}

		/* Clear the cache @since 1.0 */

		public function clear_caches() {

			/* https://wordpress.org/plugins/widget-output-cache/ */
			if ( function_exists( 'menu_output_cache_bump' ) ) {
				menu_output_cache_bump();
			}

			/* https://wordpress.org/plugins/widget-output-cache/ */
			if ( function_exists( 'widget_output_cache_bump' ) ) {
				widget_output_cache_bump();
			}
		}

		/* Ajax callback function to add new Widget @since 1.0.0 */

		public function add_selected_widget() {
			check_ajax_referer( 'uab_form_nonce', 'nonce' );
			if ( isset( $_POST ) && $_POST['widget_id'] != '' ) {
				$widgets_id = sanitize_text_field( $_POST['widget_id'] );
				$widget_title = sanitize_text_field( $_POST['title'] );
				$tab_key = sanitize_text_field( $_POST['widget_key'] );

				$added_widgets = $this->add_widget_selected( $widgets_id, $widget_title, $tab_key );
				if ( $added_widgets ) {
					if ( ob_get_contents() )
						ob_clean();
					wp_send_json_success( $added_widgets );
				} else {
					if ( ob_get_contents() )
						ob_clean();
					wp_send_json_error( sprintf( __( "Failed to add %s to %d", 'ultimate-author-box' ) ) );
				}
			}
		}

		/* Adds a widget to WordPress. @since 1.0 @param string $id_base as $widgets_id_value @param string $title as $widget_title */

		public function add_widget_selected( $widgets_id, $widget_title, $tab_key ) {
			require_once( ABSPATH . 'wp-admin/includes/widgets.php' );
			$next_id = next_widget_id_number( $widgets_id );
			$my_current_widgets = get_option( 'widget_' . $widgets_id );

			$my_current_widgets[$next_id] = array(
				"widget_columns" => 3
			);

			update_option( 'widget_' . $widgets_id, $my_current_widgets );
			$widget_id = $this->wpmm_add_widget_to_sidebar( $widgets_id, $next_id );

			$return .= '<div class="uab_widget_area ui-sortable" data-title="' . esc_attr( $widget_title ) . '" data-id="' . $widget_id . '">';
			$return .= '<input type="hidden" name="uab_profile_data[' . $tab_key . '][widget_id]" value="' . $widget_id . '"/>';
			$return .= '<input type="hidden" name="uab_profile_data[' . $tab_key . '][widget_title]" value="' . esc_attr( $widget_title ) . '"/>';
			$return .= '<div class="widget_area">';
			$return .= '<div class="widget_title">';
			$return .= '<span class="wptitle">' . esc_html( $widget_title ) . '</div></span>';
			$return .= '<div class="widget_right_action">';
			$return .= '<a class="widget-option widget-action" title="' . esc_attr( __( "Edit", 'ultimate-author-box' ) ) . '">';
			$return .= '<i class="far fa-edit" aria-hidden="true"></i></a>';
			$return .= '</div>';
			$return .= '</div>';
			$return .= '<div class="widget_inner"></div>';
			$return .= '</div>';

			return $return;
		}

		private function wpmm_add_widget_to_sidebar( $id_base, $next_id ) {

			$widget_id = $id_base . '-' . $next_id;

			$sidebar_widgets = $this->get_sidebar_widgets();

			$sidebar_widgets[] = $widget_id;

			$this->set_sidebar_widgets( $sidebar_widgets );

			do_action( "after_widget_add" );

			return $widget_id;
		}

		/* Returns an unfiltered array of all widgets in our sidebar @since 1.0 @return array */

		public function get_sidebar_widgets() {

			$sidebar_widgets = wp_get_sidebars_widgets();

			if ( !isset( $sidebar_widgets['uab-tab-widget'] ) ) {

				return false;
			}

			return $sidebar_widgets['uab-tab-widget'];
		}

		/* Sets the sidebar widgets @since 1.0 */

		private function set_sidebar_widgets( $widgets ) {

			$sidebar_widgets = wp_get_sidebars_widgets();

			$sidebar_widgets['uab-tab-widget'] = $widgets;

			wp_set_sidebars_widgets( $sidebar_widgets );
		}

		/* Ajax callback function to add new Widget @since 1.0.0 */

		public function ajax_edit_widget_data() {
			check_ajax_referer( 'uab_form_nonce', '_wpnonce' );

			$widget_id = sanitize_text_field( $_POST['widget_id'] );
			/* remove any warnings or output from other plugins which may corrupt the response */
			if ( ob_get_contents() )
				ob_clean();

			wp_die( trim( $this->show_widget_form( $widget_id ) ) );
		}

		/* Widget CallBack Form */

		public function show_widget_form( $widget_id ) {
			global $wp_registered_widget_controls;
			$control_widget = $wp_registered_widget_controls[$widget_id];
			$id_base = $this->get_id_base_for_widget_id( $widget_id );
			$parts = explode( "-", $widget_id );
			$widget_number = absint( end( $parts ) );
			$widget_nonce = wp_create_nonce( 'uab_save_widget_' . $widget_id );
			?>

			<div class='uab_widget-content'>
				<form method='post'>
					<input type="hidden" name="widget_id" class="widget-id" value="<?php esc_attr_e( $widget_id ); ?>" />
					<input type='hidden' name='action'  value='uab_save_widget' />
					<input type='hidden' name='id_base'   value='<?php esc_attr_e( $id_base ); ?>' />
					<input type='hidden' name='_wpnonce'  value='<?php esc_attr_e( $widget_nonce ); ?>' />
			<?php
			if ( is_callable( $control_widget['callback'] ) ) {
				call_user_func_array( $control_widget['callback'], $control_widget['params'] );
			}
			?>

					<div class='uab-widget-controls'>
						<a class='uab_delete' href='#delete'><?php _e( "Delete", 'ultimate-author-box' ); ?></a> |
						<a class='uab_close' href='#close'><?php _e( "Close", 'ultimate-author-box' ); ?></a>
					</div>
			<?php
			submit_button( __( 'Save' ), 'button-primary alignright', 'uab_savewidget', false );
			?>
				</form>
			</div>
			<?php
		}

		/* Returns the id_base value for a Widget ID @since 1.0 */

		public function get_id_base_for_widget_id( $widget_id ) {
			global $wp_registered_widget_controls;

			if ( !isset( $wp_registered_widget_controls[$widget_id] ) ) {
				return false;
			}

			$control = $wp_registered_widget_controls[$widget_id];

			$id_base = isset( $control['id_base'] ) ? $control['id_base'] : $control['id'];

			return $id_base;
		}

		/* Delete widget form */

		public function ajax_delete_widget_form() {
			check_ajax_referer( 'uab_form_nonce', 'nonce' );

			$widget_id = sanitize_text_field( $_POST['widget_id'] );

			$deleted_widgets = $this->uab_delete_widgets( $widget_id );

			if ( $deleted_widgets ) {
				wp_send_json_success( sprintf( __( "Deleted %s", 'ultimate-author-box' ), $widget_id ) );
			} else {
				wp_send_json_error( sprintf( __( "Failed to delete %s", 'ultimate-author-box' ), $widget_id ) );
			}
		}

		/* Deletes a widget from WordPress */

		public function uab_delete_widgets( $widget_id ) {

			$this->remove_widget_from_sidebar( $widget_id );
			$this->remove_widget_instance( $widget_id );

			do_action( "after_widget_delete" );

			return true;
		}

		/* Removes a widget from the Ultimate Author Box widget sidebar @since 1.0 @return string The widget that was removed */

		private function remove_widget_from_sidebar( $widget_id ) {

			$widgets = $this->get_sidebar_widgets();

			$new_widgets = array();

			foreach ( $widgets as $widget ) {

				if ( $widget != $widget_id )
					$new_widgets[] = $widget;
			}

			$this->set_sidebar_widgets( $new_widgets );

			return $widget_id;
		}

		/* Removes a widget instance from the database @since 1.0 @param string $widget_id e.g. meta-3 @return bool. True if widget has been deleted. */

		private function remove_widget_instance( $widget_id ) {

			$id_base = $this->get_id_base_for_widget_id( $widget_id );
			$parts = explode( "-", $widget_id );
			$widget_number = absint( end( $parts ) );

			/* add blank widget */
			$current_widgets = get_option( 'widget_' . $id_base );

			if ( isset( $current_widgets[$widget_number] ) ) {

				unset( $current_widgets[$widget_number] );

				update_option( 'widget_' . $id_base, $current_widgets );

				return true;
			}

			return false;
		}

		/* Save a widget @since 1.0 */

		public function ajax_save_widget() {
			$widget_id = sanitize_text_field( $_POST['widget_id'] );
			$id_base = sanitize_text_field( $_POST['id_base'] );

			check_ajax_referer( 'uab_save_widget_' . $widget_id );

			$saved_widgets = $this->uab_save_widget( $id_base );

			if ( $saved_widgets ) {
				wp_send_json_success( sprintf( __( "Saved %s", 'ultimate-author-box' ), $id_base ) );
			} else {
				wp_send_json_error( sprintf( __( "Failed to save %s", 'ultimate-author-box' ), $id_base ) );
			}
		}

		/* Saves a widget. Calls the update callback on the widget. The callback inspects the post values and updates all widget instances which match the base ID. */

		public function uab_save_widget( $id_base ) {
			global $wp_registered_widget_updates;

			$control_widgets = $wp_registered_widget_updates[$id_base];

			if ( is_callable( $control_widgets['callback'] ) ) {

				call_user_func_array( $control_widgets['callback'], $control_widgets['params'] );

				do_action( "after_widget_save" );

				return true;
			}

			return false;
		}

		/* Returns the HTML for a single widget instance */

		static public function show_widget( $id ) {
			global $wp_registered_widgets;

			$lists_arr_parameters = array_merge(
					array( array_merge( array( 'widgetid' => $id, 'widgetname' => $wp_registered_widgets[$id]['name'] ) ) ), (array) $wp_registered_widgets[$id]['params']
			);

			$lists_arr_parameters[0]['before_title'] = apply_filters( "before_widget_title", '<h4 class="uab-mega-block-title">', $wp_registered_widgets[$id] );
			$lists_arr_parameters[0]['after_title'] = apply_filters( "after_widget_title", '</h4>', $wp_registered_widgets[$id] );
			$lists_arr_parameters[0]['before_widget'] = apply_filters( "before_widget", "", $wp_registered_widgets[$id] );
			$lists_arr_parameters[0]['after_widget'] = apply_filters( "after_widget", "", $wp_registered_widgets[$id] );

			$callback = $wp_registered_widgets[$id]['callback'];

			if ( is_callable( $callback ) ) {
				ob_start();
				call_user_func_array( $callback, $lists_arr_parameters );
				return ob_get_clean();
			}
		}

		public function get_token_process_url($r=false) {
			$query = array();
			$rules = get_option('rewrite_rules');

			if (is_array($rules) and !empty($rules)) {
				// we have rewrite rules activated
				$url = home_url('/oauth/linkedin/');
			} else {
				$url = home_url();
				$query['oauth'] = 'linkedin';
			}

			if ($r) {
				// cleanup the url, remove args specified below
				$removable_query_args = array(
				        'message', 'settings-updated', 'saved',
				        'update', 'updated', 'activated',
				        'activate', 'deactivate', 'locked',
				        'deleted', 'trashed', 'untrashed',
				        'enabled', 'disabled', 'skipped',
				        'spammed', 'unspammed',
				    );
				$removable_query_args = apply_filters('removable_query_args', $removable_query_args);

				$r = remove_query_arg($removable_query_args, $r);
				$query['r'] = $r;
			}

			if (!empty($query)) {
				$url .= '?' . http_build_query($query);
			}

			return $url;
		}

		public function get_state_token() {
			$time = intval(time() / 172800);
			$salt = (defined('NONCE_SALT')) ? NONCE_SALT : SECRET_KEY;
			return sha1('linkedin-oauth' . $salt . $time);
		}

	}

	/* Creating AP_Contact_Form class object */
	$ultimate_author_box_obj = new Ultimate_Author_Box();
}