<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

/**
 * Plugin Name: AccessPress Social Pro
 * Plugin URI: https://accesspressthemes.com/wordpress-plugins/accesspress-social-pro/
 * Description: AccessPress Social PRO is a Premium WordPress plugin to  allow anyone easily share website content on major social media and display your social accounts fans, subscribers and followers number on your website!
 * Version: 2.0.7
 * Author: AccessPress Themes
 * Author URI: http://accesspressthemes.com
 * Domain Path: /languages/
 * Network: false
 *
 */
include('accesspress-social-share-pro.php');
include('accesspress-social-counter-pro.php');
register_activation_hook( __FILE__, array( 'SC_PRO_Class', 'load_default_settings' ) );
register_activation_hook( __FILE__, array( 'APSS_Class', 'plugin_activation' ) );
