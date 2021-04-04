<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

if ( intval( $value ) == '1' ) {

     include(APSS_PLUGIN_PATH . 'inc/share/frontend/apss-share-count.php');

     if ( isset( $options[ 'share_texts' ][ 'common-long-text' ] ) && $options[ 'share_texts' ][ 'common-long-text' ] != '' ) {
          $pre_text = $options[ 'share_texts' ][ 'common-long-text' ];
     } else {
          $pre_text = "Share on";
     }

     if ( isset( $options[ 'apss_social_networks_naming' ][ $key ] ) && $options[ 'apss_social_networks_naming' ][ $key ] != '' ) {
          $network_name = $options[ 'apss_social_networks_naming' ][ $key ];
     } else {
          $network_name = ucfirst( $key );
     }

     $total_count += $count; // Checked for inline
     if ( $url_shortner == 'all' ) {
          include(APSS_PLUGIN_PATH . 'inc/share/frontend/url_shortner.php');
     }

     switch ( $key ) {
          //counter available for facebook
          case 'facebook':
               include('social_network/facebook.php');
               break;

          //counter available for twitter
          case 'twitter':
               include('social_network/twitter.php');
               break;

          //counter available for google plus
          case 'google-plus':
               include('social_network/google-plus.php');
               break;

          //counter available for pinterest
          case 'pinterest':
               include('social_network/pinterest.php');
               break;

          //couter available for linkedin
          case 'linkedin':
               include('social_network/linkedin.php');
               break;

          //there is no counter available for digg
          case 'digg':
               include('social_network/digg.php');
               break;

          //counter available for delicious
          case 'delicious':
               include('social_network/delicious.php');
               break;

          //counter available for reddit
          case 'reddit':
               include('social_network/reddit.php');
               break;

          //counter available for stumbleupon
          case 'stumbleupon':
               include('social_network/stumbleupon.php');
               break;

          //counter not available for tumblr
          case 'tumblr':
               include('social_network/tumblr.php');
               break;

          //counter available for vkontakte
          case 'vkontakte':
               include('social_network/vkontakte.php');
               break;

          //there is no counter available for xing
          case 'xing':
               include('social_network/xing.php');
               break;

          //counter not available for weibo
          case 'weibo':
               include('social_network/weibo.php');
               break;

          //counter available for buffer
          case "buffer":
               include('social_network/buffer.php');
               break;

          //counter not available for whatsapp
          case 'whatsapp':
               include('social_network/whatsapp.php');
               break;

          //counter not available for viber
          case 'viber':
               include('social_network/viber.php');
               break;

          //counter not available for sms
          case 'sms':
               include('social_network/sms.php');
               break;

          //counter not available for fb messenger
          case 'messenger':
               include('social_network/messenger.php');
               break;
          //counter not available for fb messenger
          case 'email':
               include('social_network/email.php');
               break;
          //counter not available for fb messenger
          case 'print':
               include('social_network/print.php');
               break;

          // New Social Networks
          //counter not available for blogger
          case 'blogger':
               include('social_network/blogger.php');
               break;
          //counter not available for flipboard
          case 'flipboard':
               include('social_network/flipboard.php');
               break;
          //counter not available for kakao
          case 'kakao':
               include('social_network/kakao.php');
               break;
          //counter not available for yammer
          case 'yammer':
               include('social_network/yammer.php');
               break;
          //counter not available for mix
          case 'mix':
               include('social_network/mix.php');
               break;
          //counter not available for yummy
          case 'yummy':
               include('social_network/yummy.php');
               break;
          //counter not available for line
          case 'line':
               include('social_network/line.php');
               break;
          //counter not available for pocket
          case 'pocket':
               include('social_network/pocket.php');
               break;
     }

     //$link = htmlspecialchars( json_encode( $link ) );
     if ( $apss_link_open_option_value == '2' ) {
          $onclick = 'onclick="apss_open_in_popup_window( event, ' . $link . ' ) " ';
     } else {
          $onclick = ' ';
     }
     include(APSS_PLUGIN_PATH . 'inc/share/frontend/template/inline/apss-template.php');
}
