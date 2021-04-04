<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$options = get_option( APSS_SETTING_NAME );

//echo"<pre>";
//print_r( $options );
//echo"</pre>";

$url = APSS_Class::curPageURL();
$text = get_the_title();

$url_shortner_enable = isset( $options[ 'url_shortner_enable' ] ) && $options[ 'url_shortner_enable' ] != '' ? esc_attr( $options[ 'url_shortner_enable' ] ) : '';
$url_shortner = isset( $options[ 'url_shortner' ] ) ? esc_attr( $options[ 'url_shortner' ] ) : 'only';
$shortner_type = isset( $options[ 'shortner_type' ] ) ? esc_attr( $options[ 'shortner_type' ] ) : 'wp_function';
if ( $shortner_type == 'bitly' ) {
     $bitly = isset( $options[ 'bitly' ][ 'shortner_type' ] ) ? esc_attr( $options[ 'bitly' ][ 'shortner_type' ] ) : 0;
     $bitly_username = isset( $options[ 'bitly' ][ 'username' ] ) ? esc_attr( $options[ 'bitly' ][ 'username' ] ) : '';
     $bitly_api_key = isset( $options[ 'bitly' ][ 'api_key' ] ) ? esc_attr( $options[ 'bitly' ][ 'api_key' ] ) : '';
}

if ( $shortner_type == 'rebrandly' ) {
     $rebrandly_api_key = isset( $options[ 'rebrandly' ][ 'api_key' ] ) ? esc_attr( $options[ 'rebrandly' ][ 'api_key' ] ) : '';
     $rebrandly_domain_id = isset( $options[ 'rebrandly' ][ 'domain_id' ] ) ? esc_attr( $options[ 'rebrandly' ][ 'domain_id' ] ) : '';
}

if ( $shortner_type == 'google' ) {
     $google_api_key = isset( $options[ 'shortner_google_api' ] ) ? esc_attr( $options[ 'shortner_google_api' ] ) : '';
}

if ( $shortner_type == 'post' ) {
     $post_api_key = isset( $options[ 'post' ][ 'shortner_google_api' ] ) ? esc_attr( $options[ 'post' ][ 'shortner_google_api' ] ) : '';
}

$bitly_options = isset( $options[ 'bitly' ] ) ? $options[ 'bitly' ] : array();


$counter_type_options = isset( $options[ 'counter_type_options' ] ) && $options[ 'counter_type_options' ] != '' ? esc_attr( $options[ 'counter_type_options' ] ) : 3;


$cache_period = ($options[ 'cache_period' ] != '') ? esc_attr( $options[ 'cache_period' ] ) * 60 * 60 : 24 * 60 * 60;

// FOR FLOATING DISPLAY
$social_networks = isset( $options[ 'floating_social_networks' ] ) && ! empty( $options[ 'floating_social_networks' ] ) ? $options[ 'floating_social_networks' ] : array();
$enabled = isset( $options[ 'floating_sidebar' ][ 'enabled' ] ) && $options[ 'floating_sidebar' ][ 'enabled' ] != '' ? esc_attr( $options[ 'floating_sidebar' ][ 'enabled' ] ) : '';
$enable_hide_show_button = isset( $options[ 'floating_sidebar' ][ 'hide_show_button' ] ) && $options[ 'floating_sidebar' ][ 'hide_show_button' ] != '' ? esc_attr( $options[ 'floating_sidebar' ][ 'hide_show_button' ] ) : '0';
$semi_transparent = isset( $options[ 'floating_sidebar' ][ 'semi_transparent' ] ) && $options[ 'floating_sidebar' ][ 'semi_transparent' ] != '' ? esc_attr( $options[ 'floating_sidebar' ][ 'semi_transparent' ] ) : '';
$theme = isset( $options[ 'floating_sidebar' ][ 'theme' ] ) && $options[ 'floating_sidebar' ][ 'theme' ] != '' ? esc_attr( $options[ 'floating_sidebar' ][ 'theme' ] ) : '';
$position = isset( $options[ 'floating_sidebar' ][ 'position' ] ) && $options[ 'floating_sidebar' ][ 'position' ] != '' ? esc_attr( $options[ 'floating_sidebar' ][ 'position' ] ) : 'bottom_left';
$counter_enable_options = isset( $options[ 'floating_sidebar' ][ 'counter' ] ) && $options[ 'floating_sidebar' ][ 'counter' ] != '' ? esc_attr( $options[ 'floating_sidebar' ][ 'counter' ] ) : '';
$total_count = isset( $options[ 'floating_sidebar' ][ 'total_count' ] ) && $options[ 'floating_sidebar' ][ 'total_count' ] != '' ? esc_attr( $options[ 'floating_sidebar' ][ 'total_count' ] ) : '';
$show_all = isset( $options[ 'floating_sidebar' ][ 'show_all' ] ) && $options[ 'floating_sidebar' ][ 'show_all' ] != '' ? esc_attr( $options[ 'floating_sidebar' ][ 'show_all' ] ) : '0';

// FOR POPUP DISPLAY
$popup_window_title = isset( $options[ 'popup_options' ][ 'share_text' ] ) && $options[ 'popup_options' ][ 'share_text' ] != '' ? esc_attr( $options[ 'popup_options' ][ 'share_text' ] ) : '';
$popup_window_message = isset( $options[ 'popup_options' ][ 'popup_window_message' ] ) && $options[ 'popup_options' ][ 'popup_window_message' ] != '' ? esc_attr( $options[ 'popup_options' ][ 'popup_window_message' ] ) : '';
$popup_type = isset( $options[ 'popup_options' ][ 'popup_type' ] ) && ($options[ 'popup_options' ][ 'popup_type' ] !== "") ? esc_attr( $options[ 'popup_options' ][ 'popup_type' ] ) : '';
$delay_time = isset( $options[ 'popup_options' ][ 'delay_time' ] ) && $options[ 'popup_options' ][ 'delay_time' ] != '' ? esc_attr( $options[ 'popup_options' ][ 'delay_time' ] ) : 0;
$delay_time = $delay_time * 1000;
$percent_viewed = isset( $options[ 'popup_options' ][ 'percent_viewed' ] ) && $options[ 'popup_options' ][ 'percent_viewed' ] != '' ? esc_attr( $options[ 'popup_options' ][ 'percent_viewed' ] ) : 0;

// For FLYIN DISPLAY
$flyin_window_title = isset( $options[ 'flyin_options' ][ 'flyin_share_text' ] ) && $options[ 'flyin_options' ][ 'flyin_share_text' ] != '' ? esc_attr( $options[ 'flyin_options' ][ 'flyin_share_text' ] ) : '';
$flyin_window_message = isset( $options[ 'flyin_options' ][ 'flyin_window_message' ] ) && $options[ 'flyin_options' ][ 'flyin_window_message' ] != '' ? esc_attr( $options[ 'flyin_options' ][ 'flyin_window_message' ] ) : '';
$flyin_location = isset( $options[ 'flyin_options' ][ 'flyin_location' ] ) && ($options[ 'flyin_options' ][ 'flyin_location' ] !== "") ? esc_attr( $options[ 'flyin_options' ][ 'flyin_location' ] ) : 'right';

// Template Settings
$icon_set_value = isset( $options[ 'social_icon_set' ] ) && $options[ 'social_icon_set' ] != '' ? esc_attr( $options[ 'social_icon_set' ] ) : '1';
if ( isset( $options[ 'button_animation' ] ) && $options[ 'button_animation' ] == 'enable' ) {
     $animation = isset( $options[ 'button_animation_type' ] ) && $options[ 'button_animation_type' ] != '' ? esc_attr( $options[ 'button_animation_type' ] ) : 'animation-1';
} else {
     $animation = '';
}

// For STICKY HEADER SETTING
$sticky_header_site_logo = isset( $options[ 'social_share_sticky_share' ][ 'image_url' ] ) && ($options[ 'social_share_sticky_share' ][ 'image_url' ] !== "") ? esc_attr( $options[ 'social_share_sticky_share' ][ 'image_url' ] ) : APSS_IMAGE_DIR . '/apss-sticky-share.png';
$image_height = isset( $options[ 'social_share_sticky_share' ][ 'image_height' ] ) && ($options[ 'social_share_sticky_share' ][ 'image_height' ] !== "") ? esc_attr( $options[ 'social_share_sticky_share' ][ 'image_height' ] ) : '';
$image_width = isset( $options[ 'social_share_sticky_share' ][ 'image_width' ] ) && ($options[ 'social_share_sticky_share' ][ 'image_width' ] !== "") ? esc_attr( $options[ 'social_share_sticky_share' ][ 'image_width' ] ) : '';


//Miscellaneous Settings
$apss_link_open_option = ($options[ 'dialog_box_options' ] == '1') ? "_blank" : "";
$apss_link_open_option_value = intval( $options[ 'dialog_box_options' ] );
$http_url_checked = ( isset( $options[ 'enable_http_count' ] ) && $options[ 'enable_http_count' ] == "1") ? 1 : 0;
$twitter_user = $options[ 'twitter_username' ];
$twitter_api_use = (isset( $options[ 'twitter_counter_api' ] ) && $options[ 'twitter_counter_api' ] != '1') ? $options[ 'twitter_counter_api' ] : '1';
$fb_app_id = ( isset( $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_id' ] ) && $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_id' ] != '' ) ? $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_id' ] : "";
$fb_app_secret = ( isset( $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_secret' ] ) && $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_secret' ] != '' ) ? $apss_settings[ 'api_configuration' ][ 'facebook' ][ 'app_secret' ] : "";

//$facebook_app_id=
//$facebook+app_secret=
global $post;
$title = str_replace( '+', '%20', urlencode( isset( $post -> post_title ) ? $post -> post_title : '' ) );
$content = isset( $post -> post_content ) ? $post -> post_content : '';
$content = trim( strip_shortcodes( strip_tags( $content ) ) );

if ( strlen( $content ) >= 100 ) {
     $excerpt = substr( $content, 0, 100 ) . '...';
     $excerpt = str_replace( '+', '%20', urlencode( $excerpt ) );
} else {
     $excerpt = $content;
     $excerpt = str_replace( '+', '%20', urlencode( $excerpt ) );
}

if ( is_tax() || is_category() ) {
     global $wp_query;
     $term = $wp_query -> get_queried_object();
     $title = $term -> name;
     $excerpt = strip_tags( $term -> description );
}

$email_sub = $options[ 'apss_email_subject' ];
$email_sub = preg_replace( array( '#%%title%%#', '#%%siteurl%%#', '#%%permalink%%#', '#%%url%%#' ), array( get_the_title(), get_site_url(), get_permalink(), $url ), $email_sub );

$email_body = sanitize_text_field( $options[ 'apss_email_body' ] );
$email_body = preg_replace( array( '#%%title%%#', '#%%siteurl%%#', '#%%permalink%%#', '#%%url%%#' ), array( get_the_title(), get_site_url(), get_permalink(), $url ), $email_body );

$class = "";


$enable_counter = isset( $options[ 'total_counter_enable_options' ] ) && $options[ 'total_counter_enable_options' ] == '1' ? 1 : 0;
$total_count_prepend_text = isset( $options[ 'total_count_prepend_text' ] ) && $options[ 'total_count_prepend_text' ] != '' ? $options[ 'total_count_prepend_text' ] : 'Total';
$total_count_append_text = isset( $options[ 'total_count_append_text' ] ) && $options[ 'total_count_append_text' ] != '' ? $options[ 'total_count_append_text' ] : 'Shares';

