<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

$apss_share_settings = array();

if ( $_POST[ 'action' ] == 'apss_save_options' ) {

//     echo "<pre>";
//     print_r( $_POST );
//     echo "</pre>";
//
//     die( 'reached' );



     /**
      * *
       Tab: Social Networks
      * *
      * */
     // 1
     $social_networks = array();
     $apss_social_newtwork_order = explode( ',', $_POST[ 'apss_social_newtwork_order' ] );

     $available_social_networks = array();
     foreach ( $apss_social_newtwork_order as $social_network ) {
          $available_social_networks[ $social_network ] = (isset( $_POST[ 'available_social_networks' ][ $social_network ] )) ? 1 : 0;
     }
     $apss_share_settings[ 'available_social_networks' ] = $available_social_networks;

     // 2
     $social_networks = array();
     foreach ( $apss_social_newtwork_order as $social_network ) {
          $social_networks[ $social_network ] = (isset( $_POST[ 'social_networks' ][ $social_network ] )) ? 1 : 0;
     }
     $apss_share_settings[ 'social_networks' ] = $social_networks;

     // 3
     $apss_social_networks_naming = array();
     foreach ( $_POST[ 'apss_share_settings' ][ 'apss_social_networks_naming' ] as $key => $value ) {
          $apss_social_networks_naming[ $key ] = stripslashes_deep( $value );
     }
     $apss_share_settings[ 'apss_social_networks_naming' ] = $apss_social_networks_naming;

     /**
      * *
       Tab: Share Options
      * *
      * */
     // 1
     $share_options = array();
     if ( isset( $_POST[ 'apss_share_settings' ][ 'share_options' ] ) ) {
          foreach ( $_POST[ 'apss_share_settings' ][ 'share_options' ] as $key => $value ) {
               $share_options[] = $value;
          }
     }
     $apss_share_settings[ 'share_options' ] = $share_options;

     // 2
     foreach ( $_POST[ 'pinit_options' ] as $key => $value ) {
          $pinit_options[ $key ] = $value;
     }
     $apss_share_settings[ 'pin_it_button_options' ] = $pinit_options;

     /**
      * *
       Tab: Display Settings
      * *
      * */
     // Inline Settings
     $apss_share_settings[ 'share_positions' ] = $_POST[ 'apss_share_settings' ][ 'social_share_position_options' ];
     $apss_share_settings[ 'share_locations' ] = $_POST[ 'apss_share_settings' ][ 'social_share_location_options' ];

     // Floating Button Settings
     $floating_sidebar = array();
     foreach ( $_POST[ 'apss_share_settings' ][ 'floating_sidebar' ] as $key => $value ) {
          $floating_sidebar[ $key ] = $value;
     }
     $apss_share_settings[ 'floating_sidebar' ] = $floating_sidebar;

     $floating_social_networks = array();
     $apss_floating_social_newtwork_order = explode( ',', $_POST[ 'apss_floating_social_newtwork_order' ] );

     $floating_social_network_array = array();
     foreach ( $apss_floating_social_newtwork_order as $floating_social_network ) {
          $floating_social_network_array[ $floating_social_network ] = (isset( $_POST[ 'floating_social_networks' ][ $floating_social_network ] )) ? 1 : 0;
     }

     $apss_share_settings[ 'floating_social_networks' ] = $floating_social_network_array;

     $mobile_floating_sidebar = array();
     if ( isset( $_POST[ 'apss_share_settings' ][ 'mobile_floating_sidebar' ] ) ) {
          foreach ( $_POST[ 'apss_share_settings' ][ 'mobile_floating_sidebar' ] as $key => $value ) {
               $mobile_floating_sidebar[ $key ] = $value;
          }
     }

     $apss_share_settings[ 'mobile_floating_sidebar' ] = $mobile_floating_sidebar;

     // Popup Settings

     $popup_options = array();
     foreach ( $_POST[ 'apss_share_settings' ][ 'popup_options' ] as $key => $value ) {
          $popup_options[ $key ] = $value;
     }

     $apss_share_settings[ 'popup_options' ] = $popup_options;

     // Flyin Settings

     $flyin_options = array();
     foreach ( $_POST[ 'apss_share_settings' ][ 'flyin_options' ] as $key => $value ) {
          $flyin_options[ $key ] = $value;
     }

     $apss_share_settings[ 'flyin_options' ] = $flyin_options;

     // Template Settings

     $apss_share_settings[ 'social_icon_set' ] = isset( $_POST[ 'apss_share_settings' ][ 'social_icon_set' ] ) ? $_POST[ 'apss_share_settings' ][ 'social_icon_set' ] : '';
     $apss_share_settings[ 'button_animation' ] = isset( $_POST[ 'apss_share_settings' ][ 'button_animation' ] ) ? $_POST[ 'apss_share_settings' ][ 'button_animation' ] : 'disable';
     $apss_share_settings[ 'button_animation_type' ] = isset( $_POST[ 'apss_share_settings' ][ 'button_animation_type' ] ) ? $_POST[ 'apss_share_settings' ][ 'button_animation_type' ] : '';

     /**
      * *
       Tab: Sticky Header Share Setting
      * *
      * */
     $attr = array();
     foreach ( $_POST[ 'apss_share_settings' ][ 'social_share_sticky_share' ] as $key => $value ) {
          $attr[ $key ] = $value;
     }

     $apss_share_settings[ 'social_share_sticky_share' ] = $attr;

     /**
      * *
       Tab: Miscellaneous Settings
      * *
      * */
     $apss_share_settings[ 'twitter_username' ] = stripslashes_deep( $_POST[ 'apss_share_settings' ][ 'twitter_username' ] );
     $apss_share_settings[ 'enable_http_count' ] = $_POST[ 'apss_share_settings' ][ 'enable_http_count' ];
     $apss_share_settings[ 'dialog_box_options' ] = $_POST[ 'apss_share_settings' ][ 'dialog_box_options' ];
     $apss_share_settings[ 'disable_whatsapp_in_desktop' ] = isset( $_POST[ 'apss_share_settings' ][ 'disable_whatsapp_in_desktop' ] ) ? $_POST[ 'apss_share_settings' ][ 'disable_whatsapp_in_desktop' ] : '0';
     $apss_share_settings[ 'disable_viber_in_desktop' ] = isset( $_POST[ 'apss_share_settings' ][ 'disable_viber_in_desktop' ] ) ? $_POST[ 'apss_share_settings' ][ 'disable_viber_in_desktop' ] : '0';
     $apss_share_settings[ 'disable_sms_in_desktop' ] = isset( $_POST[ 'apss_share_settings' ][ 'disable_sms_in_desktop' ] ) ? $_POST[ 'apss_share_settings' ][ 'disable_sms_in_desktop' ] : '0';
     $apss_share_settings[ 'disable_messenger_in_desktop' ] = isset( $_POST[ 'apss_share_settings' ][ 'disable_messenger_in_desktop' ] ) ? $_POST[ 'apss_share_settings' ][ 'disable_messenger_in_desktop' ] : '0';

     /**
      * *
       Tab: Custom Text Settings
      * *
      * */
     $apss_share_settings[ 'share_text' ] = stripslashes_deep( $_POST[ 'apss_share_settings' ][ 'share_text' ] );

     $share_texts = array();
     foreach ( $_POST[ 'apss_share_settings' ][ 'share_texts' ] as $key => $value ) {
          $share_texts[ $key ] = stripslashes_deep( $value );
     }
     $apss_share_settings[ 'share_texts' ] = $share_texts;



     /**
      * *
       Tab: Share Counter Settings
      * *
      * */
     // Total Share Count Tab

     $apss_share_settings[ 'total_counter_enable_options' ] = isset( $_POST[ 'apss_share_settings' ][ 'total_counter_enable_options' ] ) ? $_POST[ 'apss_share_settings' ][ 'total_counter_enable_options' ] : '';
     $apss_share_settings[ 'counter_type_options' ] = isset( $_POST[ 'apss_share_settings' ][ 'total_counter_enable_options' ] ) ? $_POST[ 'apss_share_settings' ][ 'counter_type_options' ] : '';
     $apss_share_settings[ 'total_count_prepend_text' ] = isset( $_POST[ 'apss_share_settings' ][ 'total_counter_enable_options' ] ) ? $_POST[ 'apss_share_settings' ][ 'total_count_prepend_text' ] : '';
     $apss_share_settings[ 'total_count_append_text' ] = isset( $_POST[ 'apss_share_settings' ][ 'total_counter_enable_options' ] ) ? $_POST[ 'apss_share_settings' ][ 'total_count_append_text' ] : '';

     // Individual Share Count Tab
     $apss_share_settings[ 'counter_enable_options' ] = isset( $_POST[ 'apss_share_settings' ][ 'counter_enable_options' ] ) ? $_POST[ 'apss_share_settings' ][ 'counter_enable_options' ] : '';
     $apss_share_settings[ 'twitter_counter_api' ] = isset( $_POST[ 'apss_share_settings' ][ 'twitter_counter_api' ] ) ? $_POST[ 'apss_share_settings' ][ 'twitter_counter_api' ] : '';
     $apss_share_settings[ 'api_configuration' ][ 'facebook' ][ 'app_id' ] = isset( $_POST[ 'apss_share_settings' ][ 'api_configuration' ][ 'facebook' ][ 'app_id' ] ) ? $_POST[ 'apss_share_settings' ][ 'api_configuration' ][ 'facebook' ][ 'app_id' ] : 'e';
     $apss_share_settings[ 'api_configuration' ][ 'facebook' ][ 'app_secret' ] = isset( $_POST[ 'apss_share_settings' ][ 'api_configuration' ][ 'facebook' ][ 'app_secret' ] ) && $_POST[ 'apss_share_settings' ][ 'api_configuration' ][ 'facebook' ][ 'app_secret' ] !== '' ? $_POST[ 'apss_share_settings' ][ 'api_configuration' ][ 'facebook' ][ 'app_secret' ] : 'e';

     $apss_share_settings[ 'individual_counter_format' ] = isset( $_POST[ 'apss_share_settings' ][ 'individual_counter_format' ] ) ? $_POST[ 'apss_share_settings' ][ 'individual_counter_format' ] : '';
     $apss_share_settings[ 'individual_share_prepend_text' ] = isset( $_POST[ 'apss_share_settings' ][ 'individual_share_prepend_text' ] ) ? $_POST[ 'apss_share_settings' ][ 'individual_share_prepend_text' ] : '';
     $apss_share_settings[ 'individual_share_append_text' ] = isset( $_POST[ 'apss_share_settings' ][ 'individual_share_append_text' ] ) ? $_POST[ 'apss_share_settings' ][ 'individual_share_append_text' ] : '';


     //Counter Update Tab

     $apss_share_settings[ 'enable_cache' ] = isset( $_POST[ 'apss_share_settings' ][ 'enable_cache' ] ) ? $_POST[ 'apss_share_settings' ][ 'enable_cache' ] : '1';
     $apss_share_settings[ 'cache_period' ] = is_numeric( $_POST[ 'apss_share_settings' ][ 'cache_settings' ] ) ? $_POST[ 'apss_share_settings' ][ 'cache_settings' ] : '24';



     /**
      * *
       Tab: URL Shortner Settings
      * *
      * */
     $apss_share_settings[ 'url_shortner_enable' ] = isset( $_POST[ 'apss_share_settings' ][ 'url_shortner_enable' ] ) ? $_POST[ 'apss_share_settings' ][ 'url_shortner_enable' ] : '';
     $apss_share_settings[ 'url_shortner' ] = isset( $_POST[ 'apss_share_settings' ][ 'url_shortner' ] ) ? $_POST[ 'apss_share_settings' ][ 'url_shortner' ] : 'only';
     $apss_share_settings[ 'shortner_type' ] = isset( $_POST[ 'apss_share_settings' ][ 'shortner_type' ] ) ? $_POST[ 'apss_share_settings' ][ 'shortner_type' ] : 'wp_function';

     $apss_share_settings[ 'shortner_google_api' ] = isset( $_POST[ 'apss_share_settings' ][ 'shortner_google_api' ] ) && $_POST[ 'apss_share_settings' ][ 'shortner_google_api' ] != '' ? $_POST[ 'apss_share_settings' ][ 'shortner_google_api' ] : '';

     $apss_share_settings[ 'bitly' ][ 'enable' ] = isset( $_POST[ 'apss_share_settings' ][ 'shortner_type' ] ) && $_POST[ 'apss_share_settings' ][ 'shortner_type' ] == 'bitly' ? '1' : '0';
     $apss_share_settings[ 'bitly' ][ 'username' ] = isset( $_POST[ 'apss_share_settings' ][ 'bitly' ][ 'username' ] ) ? stripslashes_deep( $_POST[ 'apss_share_settings' ][ 'bitly' ][ 'username' ] ) : '';
     $apss_share_settings[ 'bitly' ][ 'api_key' ] = isset( $_POST[ 'apss_share_settings' ][ 'bitly' ][ 'api_key' ] ) ? stripslashes_deep( $_POST[ 'apss_share_settings' ][ 'bitly' ][ 'api_key' ] ) : '';

     $apss_share_settings[ 'rebrandly' ][ 'api_key' ] = isset( $_POST[ 'apss_share_settings' ][ 'rebrandly' ][ 'api_key' ] ) ? stripslashes_deep( $_POST[ 'apss_share_settings' ][ 'rebrandly' ][ 'api_key' ] ) : '';
     $apss_share_settings[ 'rebrandly' ][ 'domain_id' ] = isset( $_POST[ 'apss_share_settings' ][ 'rebrandly' ][ 'domain_id' ] ) ? ( $_POST[ 'apss_share_settings' ][ 'rebrandly' ][ 'domain_id' ] ) : '';

     $apss_share_settings[ 'post' ][ 'api_key' ] = isset( $_POST[ 'apss_share_settings' ][ 'post' ][ 'api_key' ] ) ? stripslashes_deep( $_POST[ 'apss_share_settings' ][ 'post' ][ 'api_key' ] ) : '';

     /**
      * *
       Tab: Email Settings
      * *
      * */
     $apss_share_settings[ 'apss_email_share_popup_disable' ] = isset( $_POST[ 'apss_share_settings' ][ 'apss_email_share_popup_disable' ] ) ? $_POST[ 'apss_share_settings' ][ 'apss_email_share_popup_disable' ] : '0';
     $apss_share_settings[ 'apss_email_subject' ] = stripslashes_deep( $_POST[ 'apss_share_settings' ][ 'apss_email_subject' ] );
     $apss_share_settings[ 'apss_email_body' ] = stripslashes_deep( $_POST[ 'apss_share_settings' ][ 'apss_email_body' ] );

     $apss_share_settings[ 'hashtag' ] = $_POST[ 'apss_share_settings' ][ 'hashtag' ];
     $hashtag = sanitize_text_field( $apss_share_settings[ 'hashtag' ] );

     update_option( APSS_SETTING_NAME, $apss_share_settings );
//     echo "<pre>";
//     print_r( $apss_share_settings );
//     echo "</pre>";
//     die( 'reached' );
     wp_redirect( admin_url() . 'admin.php?page=apss-share-pro&message=1' . $hashtag );
     exit;
}