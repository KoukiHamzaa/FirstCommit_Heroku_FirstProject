<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
/*
Plugin Name: Vmagazine Companion
Plugin URI: https://accesspressthemes.com/wordpress-themes/vmagazine/
Description: This is a companion plugin for the theme Vmagazine. This plugin helps the theme to achieve some useful features and functionalities
Author: AccessPress Themes
Author URI:  http://accesspressthemes.com/
Version: 1.0.4
Text Domain: vmagazine-companion
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

/** Necessary Constants **/
defined( 'VMC_VERSION' ) or define( 'VMC_VERSION', '1.0.4' );
defined( 'VMC_TD' ) or define( 'VMC_TD', 'vmagazine-companion' ); //plugin's text domain
defined( 'VMC_PATH' ) or define( 'VMC_PATH', plugin_dir_path( __FILE__ ) );
define( 'VMC_URL', plugins_url( '/', __FILE__ ) );

require_once VMC_PATH.'widgets/widget-functions.php';

if(!class_exists('Vmagazine_Companion')) :

	class Vmagazine_Companion {

		public function __construct() {

	        /** Loads plugin text domain for internationalization **/
			add_action('init', array($this, 'load_text_domain'));

			/** Add Shortcode File **/
			add_action('init', array($this, 'vmagazine_add_plugin_file'));

			/** Enqueue Styles & Scripts **/
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles_and_scripts' ) );

			add_action( 'show_user_profile', array( $this, 'vmagazine_additional_user_fields' ) );
			add_action( 'edit_user_profile', array( $this,'vmagazine_additional_user_fields' ) );

			add_action( 'personal_options_update', array( $this,'vmagazine_save_additional_user_meta' ) );
			add_action( 'edit_user_profile_update', array( $this,'vmagazine_save_additional_user_meta' ) );

			add_filter( 'user_contactmethods', array( $this,'vmagazine_author_meta_contact' ) );
		}

		/** Enqueue Necessary Plugin Scripts and Styles **/
		public function enqueue_styles_and_scripts() {

			wp_enqueue_style('vmagazine-shortcodes-front', plugin_dir_url( __FILE__ ) . 'assets/css/shortcodes.css');
			wp_enqueue_script('vmagazine-shortcodes-front', plugin_dir_url( __FILE__ ) . 'assets/js/shortcodes-front.js' , array('jquery'));
		}

		
		public function vmagazine_add_plugin_file() {
			require_once VMC_PATH.'shortcodes.php'; /** Shortcode File **/
			require_once VMC_PATH.'vmagazine-post-metabox.php';
			require_once VMC_PATH.'vmagazine-page-metabox.php';

		}

		/**
	     * Loads Plugin Text Domain
	     * 
	     */
	    function load_text_domain() {
	        load_plugin_textdomain('vmagazine-companion', false, basename(dirname(__FILE__)) . '/languages');
	    }

		/**
		* Adds additional user fields
		* more info: http://justintadlock.com/archives/2009/09/10/adding-and-using-custom-user-profile-fields
		*/

		function vmagazine_additional_user_fields( $user ) { 

			wp_nonce_field( basename( __FILE__ ), 'vmagazine_author_meta_nonce' );
		    $getm= get_user_meta( $user->ID);

			$user_img_url = get_the_author_meta( 'user_meta_image', $user->ID );
			$user_img_id = vmagazine_get_attachment_id_from_url( $user_img_url );
			$user_thumb_img_url = wp_get_attachment_image_src( $user_img_id, 'thumbnail', true );
		   ?>
		 
		    <h3><?php esc_html_e( 'Additional User Meta', 'vmagazine-companion' ); ?></h3>
		 
		    <table class="form-table">
		 
		        <tr>
		            <th><label for="user_meta_image"><?php esc_html_e( 'A special image for each user', 'vmagazine-companion' ); ?></label></th>
		            <td>
		                <!-- Outputs the image after save -->
		                <img class="show-author-img" src="<?php echo esc_url( $user_thumb_img_url[0] ); ?>" style="width:150px;"><br />
		                <!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
		                <input type="text" name="user_meta_image" id="user_meta_image" value="<?php echo esc_url_raw( get_the_author_meta( 'user_meta_image', $user->ID ) ); ?>" class="regular-text" />
		                <!-- Outputs the save button -->
		                <input type='button' class="additional-user-image button-primary" value="<?php esc_html_e( 'Upload Image', 'vmagazine-companion' ); ?>" id="uploadUserImage"/><br />
		                <span class="description"><?php esc_html_e( 'Upload an additional image for your user profile.', 'vmagazine-companion' ); ?></span>
		            </td>
		        </tr>
		        <tr>
		            <th>
		                <label for="user_location"><?php esc_html_e( 'Location','vmagazine-companion' ); ?></label>
		            </th>
		            <td>
		                <input type="text" name="user_location" id="user_location" value="<?php echo esc_attr( get_the_author_meta( 'user_location', $user->ID ) ); ?>" class="regular-text" />
		                <br><span class="description"><?php esc_html_e( 'Your location.', 'vmagazine-companion' ); ?></span>
		            </td>
		        </tr>        
		 
		    </table><!-- end form-table -->
		<?php 	
		} // vmagazine_additional_user_fields

		/**
		* Saves additional user fields to the database
		*/
		function vmagazine_save_additional_user_meta( $user_id ) {

			// Verify the nonce before proceeding.
		    if ( !isset( $_POST[ 'vmagazine_author_meta_nonce' ] ) || !wp_verify_nonce( $_POST[ 'vmagazine_author_meta_nonce' ], basename( __FILE__ ) ) ) {
		        return;
		    }

		 
		    // only saves if the current user can edit user profiles
		    if ( !current_user_can( 'edit_user', $user_id ) ) {
		        return false;
		    }
		 
		    update_user_meta( $user_id, 'user_meta_image', $_POST['user_meta_image'] );
		    update_user_meta( $user_id, 'user_location', $_POST['user_location'] );
		}


		function vmagazine_user_social_array(){

			$vmagazine_user_social_array = array(
			    'behance'			=> esc_html__( 'Behance', 'vmagazine-companion' ),
			    'delicious'			=> esc_html__( 'Delicious', 'vmagazine-companion' ),
			    'deviantart'		=> esc_html__( 'Deviantart', 'vmagazine-companion' ),
			    'digg'				=> esc_html__( 'Digg', 'vmagazine-companion' ),
			    'dribbble'			=> esc_html__( 'Dribbble', 'vmagazine-companion' ),
			    'facebook'			=> esc_html__( 'Facebook', 'vmagazine-companion' ),
			    'flickr'			=> esc_html__( 'Flickr', 'vmagazine-companion' ),
			    'github'			=> esc_html__( 'Github', 'vmagazine-companion' ),
			    'google-plus'		=> esc_html__( 'Google+', 'vmagazine-companion' ),
			    'html5'				=> esc_html__( 'Html5', 'vmagazine-companion' ),
			    'instagram'			=> esc_html__( 'Instagram', 'vmagazine-companion' ),    
			    'linkedin'			=> esc_html__( 'Linkedin', 'vmagazine-companion' ),
			    'paypal'			=> esc_html__( 'Paypal', 'vmagazine-companion' ),
			    'pinterest'			=> esc_html__( 'Pinterest', 'vmagazine-companion' ),
			    'reddit'			=> esc_html__( 'Reddit', 'vmagazine-companion' ),
			    'rss'				=> esc_html__( 'RSS', 'vmagazine-companion' ),
			    'share'				=> esc_html__( 'Share', 'vmagazine-companion' ),
			    'skype'				=> esc_html__( 'Skype', 'vmagazine-companion' ),
			    'soundcloud'		=> esc_html__( 'Soundcloud', 'vmagazine-companion' ),
			    'spotify'			=> esc_html__( 'Spotify', 'vmagazine-companion' ),
			    'stack-exchange'	=> esc_html__( 'Stackexchange', 'vmagazine-companion' ),
			    'stack-overflow'	=> esc_html__( 'Stackoverflow', 'vmagazine-companion' ),
			    'steam'				=> esc_html__( 	'Steam', 'vmagazine-companion' ),
			    'stumbleupon'		=> esc_html__( 'StumbleUpon', 'vmagazine-companion' ),
			    'tumblr'			=> esc_html__( 'Tumblr', 'vmagazine-companion' ),
			    'twitter'			=> esc_html__( 'Twitter', 'vmagazine-companion' ),
			    'vimeo'				=> esc_html__( 'Vimeo', 'vmagazine-companion' ),
			    'vk'				=> esc_html__( 'VKontakte', 'vmagazine-companion' ),
			    'windows'			=> esc_html__( 'Windows', 'vmagazine-companion' ),
			    'wordpress'			=> esc_html__( 'Woordpress', 'vmagazine-companion' ),
			    'yahoo'				=> esc_html__( 'Yahoo', 'vmagazine-companion' ),
			    'youtube'			=> esc_html__( 'Youtube', 'vmagazine-companion' )
			);
			return $vmagazine_user_social_array;
		}
	

		function vmagazine_author_meta_contact() {

		    $vmagazine_user_social_array = $this->vmagazine_user_social_array();
		    foreach( $vmagazine_user_social_array as $icon_id => $icon_name ) {
		        $contactmethods[$icon_id] = $icon_name;
		    }
		    return $contactmethods;
		}

		
		




    }
    $bscd_object = new Vmagazine_Companion();
endif;

		/**
		 * Set Post view count
		 *
		 * @since 1.0.0
		 */
		function vmagazine_setPostViews( $postID ) {
		    $count_key = 'vmagazine_post_views_count';
		    $count = get_post_meta( $postID, $count_key, true );
		    if( $count == '' ){
		        $count = 0;
		        delete_post_meta( $postID, $count_key );
		        add_post_meta( $postID, $count_key, '0' );
		    }else{
		        $count++;
		        update_post_meta( $postID, $count_key, $count );
		    }
		}

		/**
		 * Get Post view count
		 *
		 * @since 1.0.0
		 */
		function vmagazine_getPostViews( $postID ){
		    $count_key = 'vmagazine_post_views_count';
		    $count = get_post_meta( $postID, $count_key, true) ;
		    if( $count == '' ){
		        delete_post_meta( $postID, $count_key );
		        add_post_meta( $postID, $count_key, '0' );
		        return '0';
		    }
		    return $count;
		}

		function vmagazine_post_views() {
			$post_view_count = vmagazine_getPostViews( get_the_ID() );
			echo '<span class="post-view"><i class="fa fa-eye"></i>'. absint($post_view_count) .'</span>';
		}
