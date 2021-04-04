<?php
/**
 * Plugin Name: VMagazine Elementor Addons
 * Description: The elementor elements for VMagazine theme
 * Author: AccessPress Themes
 * Version: 1.0.3
 * Author URI: https://accesspressthemes.com/
 *
 * Text Domain: vmagazine-ea
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !function_exists( 'is_plugin_active' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}


define( 'VMAGAZINE_EA_URL', plugins_url( '/', __FILE__ ) );
define( 'VMAGAZINE_EA_LIB_URL', plugins_url( '/', __FILE__ ) .'assets/lib/');
define( 'VMAGAZINE_EA_PATH', plugin_dir_path( __FILE__ ) );
define( 'VMAGAZINE_EA_PHP_VER_REQUIRED', '5.4' );
define( 'VMAGAZINE_EA_VER','1.0.3');


require_once VMAGAZINE_EA_PATH.'includes/queries.php';
require_once VMAGAZINE_EA_PATH.'includes/ajax-functions.php';
require_once VMAGAZINE_EA_PATH.'includes/elementor-helper.php';




if( ! class_exists('VMagazine_EA') ):

	class VMagazine_EA {

		function __construct(){

			/** Loads plugin text domain for internationalization **/
			add_action('init', array($this, 'load_text_domain'));
			
			add_action( 'plugins_loaded', array($this,'vmagazine_ea_init') );
			add_action( 'elementor/controls/controls_registered', array($this,'vmagazine_ea_posts_register_control') );
			add_action( 'elementor/widgets/widgets_registered', array($this, 'vmagazine_ea_load_elements') );
			add_action( 'wp_enqueue_scripts', array($this, 'vmagazine_ea_scripts') );
			add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'vmagazine_ea_frontend_styles' ) );
			//Editor Style
        	add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'vmagazine_ea_enqueue_editor_styles' ) );

		}


		function vmagazine_ea_init(){

			// Check for required PHP version
			if ( ! version_compare( PHP_VERSION, VMAGAZINE_EA_PHP_VER_REQUIRED, '>=' ) ) {
				add_action( 'admin_notices', array($this,'vmagazine_ea_fail_php') );
				add_action( 'admin_init', array($this,'vmagazine_ea_deactivate') );
				return;
			}

			// Notice if the Elementor is not active
			if ( ! did_action( 'elementor/loaded' ) ) {
				add_action( 'admin_notices', array($this,'vmagazine_ea_fail_load') );
				return;
			}

		}

	
		/**
	    * Check if Elementor is Installed or not
	    */
		function vmagazine_ea_is_elementor_active() {
	         $file_path = 'elementor/elementor.php';
	         $installed_plugins = get_plugins();
	         return isset( $installed_plugins[$file_path] );
		}

		/**
	     * Loads Plugin Text Domain
	     * 
	     */
	    function load_text_domain() {
	        load_plugin_textdomain('vmagazine-ea', false, basename(dirname(__FILE__)) . '/languages');
	    }

		/**
		 * Shows notice to user if Elementor plugin
		 * is not installed or activated or both
		 *
		 * @since 1.0.0
		 *
		 */
		function vmagazine_ea_fail_load() {
		    $plugin = 'elementor/elementor.php';

			if ( $this->vmagazine_ea_is_elementor_active() ) {
				if ( ! current_user_can( 'activate_plugins' ) ) {
					return;
				}

				$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
		        $message = sprintf(__( '%1$s"VMagazine Elementor Addons"%2$s requires %3$s"Elementor"%4$s plugin to be active. Please activate Elementor to continue.', 'vmagazine-ea' ), '<strong>', '</strong>','<strong>', '</strong>' );
				$button_text = __( 'Activate Elementor', 'vmagazine-ea' );

			} else {
				if ( ! current_user_can( 'install_plugins' ) ) {
					return;
				}

				$activation_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );
		        $message = sprintf( __( '%1$s"VMagazine Elementor Addons"%2$s requires %3$s"Elementor"%4$s plugin to be installed and activated. Please install Elementor to continue.', 'vmagazine-ea' ), '<strong>', '</strong>', '<strong>', '</strong>');
				$button_text = __( 'Install Elementor', 'vmagazine-ea' );
			}

			$button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
		    
		    printf( '<div class="error"><p>%1$s</p>%2$s</div>', wp_kses_post( $message ), $button );
		}

		/**
		 * Shows notice to user if minimum PHP
		 * version requirement is not met
		 *
		 * @since 1.0.0
		 *
		 */
		function vmagazine_ea_fail_php() {
			$message = __( 'VMagazine Addons requires PHP version ' . VMAGAZINE_EA_PHP_VER_REQUIRED .'+ to work properly. The plugins is deactivated for now.', 'vmagazine-ea' );

			printf( '<div class="error"><p>%1$s</p></div>', esc_html( $message ) );

			if ( isset( $_GET['activate'] ) ) 
				unset( $_GET['activate'] );
		}

		/**
		 * Deactivates the plugin
		 *
		 * @since 1.0.0
		 */
		function vmagazine_ea_deactivate() {
			deactivate_plugins( plugin_basename( __FILE__ ) );
		}

		/**
		* Loads custom made elementor elements
		*
		*/
		function vmagazine_ea_load_elements(){
			$files = array('recent-posts','featured-slider','fullwidth-slider','post-column','category-slider','multiple-category','grid-list','slider-tab','multiple-category-tabbed','block-post-slider','slider-tab-carousel','block-post-carousel','timeline-posts','video-playlist','block-post-carousel(small)','multiple-tab','top-trending-block','about-author','fb-like');
			foreach( $files as $file ){
				require_once VMAGAZINE_EA_PATH.'elements/'.$file.'.php';	
			}
			
		}

		/**
		 * Registering a Group Control for All Posts Element
		 */
		function vmagazine_ea_posts_register_control( $controls_manager ){
			include_once VMAGAZINE_EA_PATH . 'includes/posts-group-control.php';
		    $controls_manager->add_group_control( 'vmagazine-posts', new Elementor\EAE_Posts_Group_Control() );
		}

	
	/**
	* Register scripts for elementor 
	*/
	function vmagazine_ea_scripts(){
		
		wp_enqueue_style( 'jquery-slickslider',VMAGAZINE_EA_LIB_URL.'slick/slick.css', array(), VMAGAZINE_EA_VER, true );
		wp_enqueue_style( 'jquery-lightslider',VMAGAZINE_EA_LIB_URL.'lightslider/lightslider.css', array(), VMAGAZINE_EA_VER, true );
		

		wp_enqueue_script( 'jquery-slickslider',VMAGAZINE_EA_LIB_URL.'slick/slick.min.js', array( 'jquery' ), VMAGAZINE_EA_VER, true );
		wp_enqueue_script( 'jquery-lightslider',VMAGAZINE_EA_LIB_URL.'lightslider/lightslider.js', array( 'jquery' ), VMAGAZINE_EA_VER, true );
		wp_enqueue_script( 'jquery-lazy',VMAGAZINE_EA_URL.'assets/js/jquery.lazy.min.js', array( 'jquery' ), VMAGAZINE_EA_VER, true );
		wp_enqueue_script( 'youtube-api',VMAGAZINE_EA_URL.'assets/js/iframe-api.js', array( 'jquery' ), VMAGAZINE_EA_VER, true );

		//wp_enqueue_script( 'vmagazine-ea-ytplayer',VMAGAZINE_EA_URL.'assets/js/vmea-youtube.js', array( 'jquery' ), VMAGAZINE_EA_VER, true );

		wp_enqueue_script( 'vmagazine-ea-script',VMAGAZINE_EA_URL.'assets/js/scripts.js', array( 'jquery' ), VMAGAZINE_EA_VER, true );
		wp_register_script( 'vmagazine-ea-ajax',VMAGAZINE_EA_URL.'assets/js/vmea-ajax.js', array( 'jquery' ), VMAGAZINE_EA_VER, true );

		$args = array(
			'ajaxurl'		=> admin_url( 'admin-ajax.php')
		);

		wp_localize_script( 'vmagazine-ea-ajax', 'vmea_ajax_script', $args  );
    	wp_enqueue_script( 'vmagazine-ea-ajax' );

	}

	/**
	* Frontend styles
	*
	*/
	function vmagazine_ea_frontend_styles(){

		wp_enqueue_style( 'vmea-frontend-styles',VMAGAZINE_EA_URL.'assets/css/frontend-styles.css', array(), VMAGAZINE_EA_VER, false );
	}	
		

	function vmagazine_ea_enqueue_editor_styles(){
		wp_enqueue_style( 'vmea-editor-styles',VMAGAZINE_EA_URL.'assets/css/editor-styles.css', array(), VMAGAZINE_EA_VER, false );
	}


	}

	$vmagazine_ea_obj = new VMagazine_EA();

endif;