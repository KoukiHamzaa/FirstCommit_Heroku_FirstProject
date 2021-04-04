<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
//echo"<strong>THESE ARE THE SHORTCODE ATTRIBUTES</strong>";
//echo "<pre>";
//print_r( $atts );
//echo "</pre>";

if ( isset( $atts ) && ! empty( $atts ) ) {

     if ( isset( $atts[ 'networks' ] ) ) {
          $raw_array = explode( ',', $atts[ 'networks' ] );
          $network_array = array_map( 'trim', $raw_array );
          $new_array = array();
          foreach ( $network_array as $network ) {
               $new_array[ $network ] = '1';
          }
          $options[ 'social_networks' ] = $new_array;
     }
     $icon_set_value = isset( $atts[ 'theme' ] ) && $atts[ 'theme' ] != ' ' ? esc_attr( $atts[ 'theme' ] ) : esc_attr( $options[ 'social_icon_set' ] );

     if ( isset( $atts[ 'inline' ] ) && $atts[ 'inline' ] == 'enable' ) {
          $alignment = isset( $atts[ 'alignment' ] ) && $atts[ 'alignment' ] != '' ? esc_attr( $atts[ 'alignment' ] ) : 'left';
          $text_align = 'apss-buttons-' . $alignment;
     }

     if ( isset( $atts[ 'floating' ] ) && $atts[ 'floating' ] == 'enable' ) {
          $social_networks = $options[ 'social_networks' ];
          $enabled = '1';
          $enable_hide_show_button = isset( $atts[ 'show_hide_button' ] ) && $atts[ 'show_hide_button' ] != '' ? esc_attr( $atts[ 'show_hide_button' ] ) : '';
          $alignment = isset( $atts[ 'alignment' ] ) && $atts[ 'alignment' ] != '' ? esc_attr( $atts[ 'alignment' ] ) : 'left';
          $semi_transparent = isset( $atts[ 'semi_transparent' ] ) && $atts[ 'semi_transparent' ] != '' ? esc_attr( $atts[ 'semi_transparent' ] ) : '';
          $theme = isset( $atts[ 'floating_sidebar_theme' ] ) && $atts[ 'floating_sidebar_theme' ] != '' ? esc_attr( $atts[ 'floating_sidebar_theme' ] ) : '';
          $position = isset( $atts[ 'floating_sidebar_position' ] ) && $atts[ 'floating_sidebar_position' ] != '' ? esc_attr( $atts[ 'floating_sidebar_position' ] ) : 'bottom_left';
          $counter_enable_options = isset( $atts[ 'floating_sidebar_counter' ] ) && $atts[ 'floating_sidebar_counter' ] != '' ? esc_attr( $atts[ 'floating_sidebar_counter' ] ) : '';
          $total_count = isset( $atts[ 'floating_sidebar_total_count' ] ) && $atts[ 'floating_sidebar_total_count' ] != '' ? esc_attr( $atts[ 'floating_sidebar_total_count' ] ) : '';
          $show_all = isset( $atts[ 'floating_sidebar_show_all' ] ) && $atts[ 'floating_sidebar_show_all' ] != '' ? esc_attr( $atts[ 'floating_sidebar_show_all' ] ) : '';
          $enable_mobile_floating_sidebar = isset( $atts[ 'enable_mobile_floating_sidebar' ] ) && $atts[ 'enable_mobile_floating_sidebar' ] != '' ? esc_attr( $atts[ 'enable_mobile_floating_sidebar' ] ) : '';
     }

     if ( isset( $atts[ 'popup' ] ) && $atts[ 'popup' ] == 'enable' ) {
          $popup_window_title = isset( $atts[ 'popup_share_text' ] ) && $atts[ 'popup_share_text' ] != '' ? esc_attr( $atts[ 'popup_share_text' ] ) : '';
          $popup_window_message = isset( $atts[ 'popup_window_message' ] ) && $atts[ 'popup_window_message' ] != '' ? esc_attr( $atts[ 'popup_window_message' ] ) : '';
          $popup_type = isset( $atts[ 'popup_type' ] ) && $atts[ 'popup_type' ] != '' ? esc_attr( $atts[ 'popup_type' ] ) : '';
          $delay_time = isset( $atts[ 'popup_delay_time' ] ) && $atts[ 'popup_delay_time' ] != '' ? esc_attr( $atts[ 'popup_delay_time' ] ) : 99;
          $delay_time = $delay_time * 1000;
          $percent_viewed = isset( $atts[ 'popup_percent_viewed' ] ) && $atts[ 'popup_percent_viewed' ] != '' ? esc_attr( $atts[ 'popup_percent_viewed' ] ) : '';
     }

     if ( isset( $atts[ 'flyin' ] ) && $atts[ 'flyin' ] == 'enable' ) {
          $flyin_window_title = isset( $atts[ 'flyin_share_text' ] ) && $atts[ 'flyin_share_text' ] != '' ? esc_attr( $atts[ 'flyin_share_text' ] ) : '';
          $flyin_window_message = isset( $atts[ 'flyin_window_message' ] ) && $atts[ 'flyin_window_message' ] != '' ? esc_attr( $atts[ 'flyin_window_message' ] ) : '';
          $flyin_location = isset( $atts[ 'flyin_location' ] ) && $atts[ 'flyin_location' ] != '' ? esc_attr( $atts[ 'flyin_location' ] ) : '';
     }

     $twitter_user = isset( $atts[ 'twitter_username' ] ) && $atts[ 'twitter_username' ] != '' ? esc_attr( $atts[ 'twitter_username' ] ) : $twitter_user;
     $counter_enable_options = isset( $atts[ 'counter' ] ) && $atts[ 'counter' ] != '' ? esc_attr( $atts[ 'counter' ] ) : 0;
     $total_counter_enable_options = isset( $atts[ 'total_counter' ] ) && $atts[ 'total_counter' ] != '' ? esc_attr( $atts[ 'total_counter' ] ) : 0;
     $custom_share_link = isset( $atts[ 'custom_share_link' ] ) && $atts[ 'custom_share_link' ] != '' ? esc_attr( $atts[ 'custom_share_link' ] ) : ' ';
     $http_url_checked = isset( $atts[ 'http_count' ] ) && $atts[ 'http_count' ] != '' ? esc_attr( $atts[ 'http_count' ] ) : $http_url_checked;


     $twitter_api_use = (isset( $atts[ 'twitter_counter_api' ] ) && $atts[ 'twitter_counter_api' ] != '1') ? esc_attr( $atts[ 'twitter_counter_api' ] ) : '1';
     $fb_app_id = ( isset( $atts[ 'fb_app_id' ] ) && $atts[ 'fb_app_id' ] != '' ) ? esc_attr( $atts[ 'fb_app_id' ] ) : "";
     $fb_app_secret = ( isset( $atts[ 'fb_app_secret' ] ) && $atts[ 'fb_app_secret' ] != '' ) ? esc_attr( $atts[ 'fb_app_secret' ] ) : "";


     $dialog_box_options = isset( $atts[ 'dialog_box_options' ] ) && $atts[ 'dialog_box_options' ] != '' ? esc_attr( $atts[ 'dialog_box_options' ] ) : ' ';
     $disable_whatsapp_in_desktop = isset( $atts[ 'disable_whatsapp_in_desktop' ] ) && $atts[ 'disable_whatsapp_in_desktop' ] != '' ? esc_attr( $atts[ 'disable_whatsapp_in_desktop' ] ) : ' ';
     $disable_viber_in_desktop = isset( $atts[ 'disable_viber_in_desktop' ] ) && $atts[ 'disable_viber_in_desktop' ] != '' ? esc_attr( $atts[ 'disable_viber_in_desktop' ] ) : ' ';
     $disable_sms_in_desktop = isset( $atts[ 'disable_sms_in_desktop' ] ) && $atts[ 'disable_sms_in_desktop' ] != '' ? esc_attr( $atts[ 'disable_sms_in_desktop' ] ) : ' ';
     $disable_messenger_in_desktop = isset( $atts[ 'disable_messenger_in_desktop' ] ) && $atts[ 'disable_messenger_in_desktop' ] != '' ? esc_attr( $atts[ 'disable_messenger_in_desktop' ] ) : ' ';
     $share_text = isset( $atts[ 'share_text' ] ) && $atts[ 'share_text' ] != '' ? esc_attr( $atts[ 'share_text' ] ) : ' ';
     $common_short_text = isset( $atts[ 'common_short_text' ] ) && $atts[ 'common_short_text' ] != '' ? esc_attr( $atts[ 'common_short_text' ] ) : ' ';
     $twitter_short_text = isset( $atts[ 'twitter_short_text' ] ) && $atts[ 'twitter_short_text' ] != '' ? esc_attr( $atts[ 'twitter_short_text' ] ) : ' ';
     $email_short_text = isset( $atts[ 'email_short_text' ] ) && $atts[ 'email_short_text' ] != '' ? esc_attr( $atts[ 'email_short_text' ] ) : ' ';
     $print_short_text = isset( $atts[ 'print_short_text' ] ) && $atts[ 'print_short_text' ] != '' ? esc_attr( $atts[ 'print_short_text' ] ) : ' ';
     $common_long_text = isset( $atts[ 'common_long_text' ] ) && $atts[ 'common_long_text' ] != '' ? esc_attr( $atts[ 'common_long_text' ] ) : ' ';
     $twitter_long_text = isset( $atts[ 'twitter_long_text' ] ) && $atts[ 'twitter_long_text' ] != '' ? esc_attr( $atts[ 'twitter_long_text' ] ) : ' ';
     $email_long_text = isset( $atts[ 'email_long_text' ] ) && $atts[ 'email_long_text' ] != '' ? esc_attr( $atts[ 'email_long_text' ] ) : ' ';
     $print_long_text = isset( $atts[ 'print_long_text' ] ) && $atts[ 'print_long_text' ] != '' ? esc_attr( $atts[ 'print_long_text' ] ) : ' ';
     $class = "apss-shortcode";
}