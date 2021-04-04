<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

$apsc_settings = $this -> apsc_settings;
$cache_period = ($apsc_settings[ 'cache_period' ] != '') ? $apsc_settings[ 'cache_period' ] * 60 * 60 : 24 * 60 * 60;
switch ( $profile ) {
     case 'facebook':
          include(SC_PRO_PATH . '/frontend/social_network/facebook.php');
          break;
     case 'twitter':
          include(SC_PRO_PATH . '/frontend/social_network/twitter.php');
          break;
     case 'googlePlus':
          include(SC_PRO_PATH . '/frontend/social_network/googlePlus.php');
          break;
     case 'instagram':
          include(SC_PRO_PATH . '/frontend/social_network/instagram.php');
          break;
     case 'youtube':
          include(SC_PRO_PATH . '/frontend/social_network/youtube.php');
          break;
     case 'soundcloud':
          include(SC_PRO_PATH . '/frontend/social_network/soundcloud.php');
          break;
     case 'dribbble':
          include(SC_PRO_PATH . '/frontend/social_network/dribbble.php');
          break;
     case 'steam':
          include(SC_PRO_PATH . '/frontend/social_network/steam.php');
          break;
     case 'vimeo':
          include(SC_PRO_PATH . '/frontend/social_network/vimeo.php');
          break;
     case 'pinterest':
          include(SC_PRO_PATH . '/frontend/social_network/pinterest.php');
          break;
     case 'forrst':
          include(SC_PRO_PATH . '/frontend/social_network/forrst.php');
          break;
     case 'vk':
          include(SC_PRO_PATH . '/frontend/social_network/vk.php');
          break;
     case 'flickr':
          include(SC_PRO_PATH . '/frontend/social_network/flickr.php');
          break;
     case 'behance':
          include(SC_PRO_PATH . '/frontend/social_network/behance.php');
          break;
     case 'github':
          include(SC_PRO_PATH . '/frontend/social_network/github.php');
          break;
     case 'envato':
          include(SC_PRO_PATH . '/frontend/social_network/envato.php');
          break;
     case 'linkedin':
          include(SC_PRO_PATH . '/frontend/social_network/linkedin.php');
          break;
     case 'rss':
          include(SC_PRO_PATH . '/frontend/social_network/rss.php');
          break;
     case 'posts':
          include(SC_PRO_PATH . '/frontend/social_network/posts.php');
          break;
     case 'comments':
          include(SC_PRO_PATH . '/frontend/social_network/comments.php');
          break;
     case 'spotify':
          include(SC_PRO_PATH . '/frontend/social_network/spotify.php');
          break;
     case 'twitch':
          include(SC_PRO_PATH . '/frontend/social_network/twitch.php');
          break;
     case 'feedly':
          include(SC_PRO_PATH . '/frontend/social_network/feedly.php');
          break;
     case 'slideshare':
          include(SC_PRO_PATH . '/frontend/social_network/slideshare.php');
          break;
     case 'foursquare':
          include(SC_PRO_PATH . '/frontend/social_network/foursquare.php');
          break;
     case 'delicious':
          include(SC_PRO_PATH . '/frontend/social_network/delicious.php');
          break;
     case 'weheartit':
          include(SC_PRO_PATH . '/frontend/social_network/weheartit.php');
          break;
     default:
          break;
}

