<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

//$this -> print_array( $_POST );
//die();

foreach ( $_POST as $key => $val ) {
     $$key = $val;
}

$apsc_settings = array(); //array for saving all the settings
$apsc_settings[ 'social_profile' ] = $social_profile;
$apsc_settings[ 'floating_sidebar' ] = $floating_sidebar;
$apsc_settings[ 'profile_order' ] = $profile_order;
$apsc_settings[ 'icon_hover_animation' ] = $icon_hover_animation;
$apsc_settings[ 'icon_hover_color' ] = isset( $icon_hover_color ) ? $icon_hover_color : 0;
$apsc_settings[ 'cache_period' ] = $cache_period;
$apsc_settings[ 'social_profile_theme' ] = $social_profile_theme;
$apsc_settings[ 'counter_format' ] = $counter_format;
$apsc_settings[ 'sidebar_counter_format' ] = $sidebar_counter_format;
$apsc_settings[ 'floatbar_profiles' ] = sanitize_text_field( $floatbar_profiles );
$apsc_settings[ 'hide_count' ] = isset( $hide_count ) ? 1 : 0;
$apsc_settings[ 'mobile_hide' ] = isset( $mobile_hide ) ? 1 : 0;
$apsc_settings[ 'total_count' ] = isset( $total_count ) ? 1 : 0;

$apsc_settings[ 'hashtag' ] = isset( $hashtag ) && $hashtag != '' ? $hashtag : '#social-profile';
$hashtag = sanitize_text_field( $apsc_settings[ 'hashtag' ] );

//echo "<pre>";
//print_r( $apsc_settings );
//echo "</pre>";
//die( 'reached' );
update_option( 'apsc_settings', $apsc_settings );

wp_redirect( admin_url() . 'admin.php?page=ap-social-counter-pro&message=1' . $hashtag );
