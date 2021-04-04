<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );

switch ( $social_profile ) {
     case 'facebook':
          $facebook_page_id = $apsc_settings[ 'social_profile' ][ 'facebook' ][ 'page_id' ];
          $social_profile_url = ("http://facebook.com/" . $facebook_page_id);
          break;
     case 'twitter':
          $twitter_username = $apsc_settings[ 'social_profile' ][ 'twitter' ][ 'username' ];
          $social_profile_url = "http://twitter.com/" . $twitter_username;
          break;
     case 'google-plus':
          $social_profile = 'google-plus';
          $social_profile_url = 'https://plus.google.com/' . $apsc_settings[ 'social_profile' ][ 'google-plus' ][ 'page_id' ];
          break;
     case 'instagram':
          $username = $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'username' ];
          $user_id = $apsc_settings[ 'social_profile' ][ 'instagram' ][ 'user_id' ];
          $social_profile_url = "http://instagram.com/" . $username;
          break;
     case 'youtube':
          $social_profile_url = esc_url( $apsc_settings[ 'social_profile' ][ 'youtube' ][ 'channel_url' ] );
          break;
     case 'soundcloud':
          $username = $apsc_settings[ 'social_profile' ][ 'soundcloud' ][ 'username' ];
          $social_profile_url = 'https://soundcloud.com/' . $username;
          break;
     case 'dribbble':
          $social_profile_url = 'http://dribbble.com/' . $apsc_settings[ 'social_profile' ][ 'dribbble' ][ 'username' ];
          break;
     case 'steam':
          $social_profile_url = "http://steamcommunity.com/groups/" . $apsc_settings[ 'social_profile' ][ 'steam' ][ 'group_name' ];
          break;
     case 'vimeo':
          $username = $apsc_settings[ 'social_profile' ][ 'vimeo' ][ 'username' ];
          $social_profile_url = 'https://vimeo.com/' . $username;
          break;
     case 'pinterest':
          $social_profile_url = $apsc_settings[ 'social_profile' ][ 'pinterest' ][ 'profile_url' ];
          break;
     case 'forrst':
          $forrst_username = $apsc_settings[ 'social_profile' ][ 'forrst' ][ 'username' ];
          $social_profile_url = 'https://forrst.com/people/' . $forrst_username;
          break;
     case 'vk':
          $group_id = $apsc_settings[ 'social_profile' ][ 'vk' ][ 'group_id' ];
          $social_profile_url = 'http://vk.com/' . $group_id;
          break;
     case 'flickr':
          $flickr_group_id = $apsc_settings[ 'social_profile' ][ 'flickr' ][ 'group_id' ];
          $social_profile_url = 'https://www.flickr.com/groups/' . $flickr_group_id;
          break;
     case 'behance':
          $behance_username = $apsc_settings[ 'social_profile' ][ 'behance' ][ 'username' ];
          $social_profile_url = 'https://www.behance.net/' . $behance_username;
          break;
     case 'github':
          $git_username = $apsc_settings[ 'social_profile' ][ 'github' ][ 'username' ];
          $social_profile_url = 'https://github.com/' . $git_username;
          break;
     case 'envato':
          $social_profile_url = $apsc_settings[ 'social_profile' ][ 'envato' ][ 'profile_url' ];
          break;
     case 'linkedin':
          $social_profile_url = isset( $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'profile_url' ] ) && $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'profile_url' ] != '' ? $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'profile_url' ] : '';
          $linkedin_counter_type = isset( $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'linkedin_counter_type' ] ) && $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'linkedin_counter_type' ] != '' ? $apsc_settings[ 'social_profile' ][ 'linkedin' ][ 'linkedin_counter_type' ] : 'followers';
          if ( $linkedin_counter_type == 'followers' ) {
               $linkedin_counter_type = __( 'Followers', APSC_TD );
               $linkedin_counter_label = __( 'Follow', APSC_TD );
          } else if ( $linkedin_counter_type == 'connections' ) {
               $linkedin_counter_type = __( 'Connections', APSC_TD );
               $linkedin_counter_label = __( 'Connect', APSC_TD );
          }
          break;
     case 'rss':
          $social_profile_url = $apsc_settings[ 'social_profile' ][ 'rss' ][ 'rss_url' ];
          break;
     case 'posts':
          $social_profile_url = "javascript:void(0);";
          break;
     case 'comments':
          $social_profile_url = "javascript:void(0);";
          break;
     case 'spotify':
          $social_profile_url = $apsc_settings[ 'social_profile' ][ 'spotify' ][ 'url' ];
     case 'twitch':
          $twitch_channel_name = $apsc_settings[ 'social_profile' ][ 'twitch' ][ 'channel_name' ];
          $social_profile_url = 'https://api.twitch.tv/kraken/channels/' . $twitch_channel_name;
     case 'feedly':
          $social_profile_url = $apsc_settings[ 'social_profile' ][ 'feedly' ][ 'url' ];
     case 'slideshare':
          $slideshare_url = $apsc_settings[ 'social_profile' ][ 'slideshare' ][ 'username' ];
          $social_profile_url = 'http://www.slideshare.net/' . $slideshare_url;
     case 'foursquare':
          $foursquare_api_key = $apsc_settings[ 'social_profile' ][ 'foursquare' ][ 'api_key' ];
          $social_profile_url = 'https://api.foursquare.com/v2/users/self?oauth_token=' . $foursquare_api_key;
     case 'delicious':
          $delicious_username = $apsc_settings[ 'social_profile' ][ 'delicious' ][ 'username' ];
          $social_profile_url = 'http://feeds.delicious.com/v2/json/userinfo/' . $delicious_username;
     case 'weheartit':
          $weheartit_username = $apsc_settings[ 'social_profile' ][ 'weheartit' ][ 'username' ];
          $social_profile_url = 'http://weheartit.com/' . $weheartit_username;
     default:
          break;
}