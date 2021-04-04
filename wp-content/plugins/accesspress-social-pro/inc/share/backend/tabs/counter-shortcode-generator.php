<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="apss-shortcode-tab-contents apss-counter-shortcode-generator-settings" id="tab-apss-count-shortcode-settings" style='display:none'>
     <div class="apsc-boards-tabs apss-row" id="">
          <div class="apss-subhead">
               <h2><?php _e( 'AccessPress Social Counter', APSS_TEXT_DOMAIN ) ?></h2>
          </div>

          <h3>Shortcode <strong> [aps-counter-pro]</strong></h3>
          <div class="social-text">
               If you wish to use shortcode to display the social counter in your site, you will need to place the shortcode <strong> [aps-counter-pro]</strong>. When you use this shortcode, by default, all the values you have set in the Social Counter Tab settings will be loaded.
               However, if you want multiple shortcode each with different values set to it, you can pass parameters in the shortcode itself. All the possible parameters that you can set in the above shortcode is described below.

               <div class= 'apss-title-div'>
                    <label>1. theme:</label>
               </div>
               <div class ="apss-option-value">
                    <label>
                         You can pass "theme" parameter to get the desired theme. eg: theme ="theme-1".  One of the following values can be passed to the 'theme' parameter.
                         <p class="description"> theme-1 , theme-2, theme-3, ............ , theme-41, theme-42</p>
                    </label>
               </div>
               <div class= 'apss-title-div'>
                    <label> 2. hide_count:</label>
               </div>
               <div class ="apss-option-value">
                    <label>
                         You can disable the display of the counter using "hide_count" parameter. eg: hide_count ='1', hide_count='0' .  One of the following values can be passed to the 'hide_count' parameter.
                    </label>
                    <p class="description">1 : Setting the parameter value to '1' will hide the counter </p>
                    <p class="description">0 : Setting the value to '0' with display the counter</p>
               </div>

               <div class= 'apss-title-div'>
                    <label>3.  animation:</label>
               </div>
               <div class ="apss-option-value">
                    <label> You can set the animation for the counter buttons using the 'animation' parameter. One of the following values can be passed to the 'animation' parameter.</label>
                    <p class="description">animation-1, animation-2, animation-3, animation-4, animation-5 </p>
               </div>

               <div class= 'apss-title-div'>
                    <label> 4. counter_format:</label>
               </div>
               <div class ="apss-option-value">
                    <label> You can set the number format for the counter using the "counter_format" parameter. One of the following values can be passed to the 'counter_format' parameter.</label>
                    <p class="description">default, short, comma</p>
               </div>
               <div class= 'apss-title-div'>
                    <label>5. profiles:</label>
               </div>
               <div class ="apss-option-value">
                    <label>  You can set the social media you want to set in your social counter buttons using the "profiles" parameter.One of the following values can be passed to the 'profile' parameter. </label>

                    <p class="description">facebook, twitter, instagram, google-plus, soundcloud, dribbble, youtube, steam, vimeo, pinterest, forrst, vk, flickr, behance, github, envato, posts, comments, spotify, twitch, feedly, slideshare, foursquare, delicious, weheartit </p>
               </div>
               <div>
                    <h2>  For example: [aps-counter-pro theme="theme-19" hide_count='1']</h2>
               </div>
          </div>
     </div>

     <div class="apsc-boards-tabs apss-row" id="">
          <h3>Shortcode <strong> [aps-get-count] </strong></h3>
          <div class="social-text">
               <p>There is an another shortcode in social counter pro that might be helpful for you all. It is <strong> [aps-get-count] </strong>. It can be used to get the individual folowers count of the social media.  The possible parameters that you can set in this shortcode is described below.</p>
               <div class= 'apss-title-div'>
                    <label>1. social_media:</label>
               </div>
               <div class ="apss-option-value">
                    <label>  You can set the social media you want to set in your social counter buttons using the "social_media" parameter.One of the following values can be passed to the 'profile' parameter. </label>

                    <p class="description">facebook, twitter, instagram, google-plus, soundcloud, dribbble, youtube, steam, vimeo, pinterest, forrst, vk, flickr, behance, github, envato, posts, comments, spotify, twitch, feedly, slideshare, foursquare, delicious, weheartit </p>
               </div>
               <div class= 'apss-title-div'>
                    <label> 2. count_format:</label>
               </div>
               <div class ="apss-option-value">
                    <label> You can set the number format for the counter using the "count_format" parameter. One of the following values can be passed to the 'counter_format' parameter.</label>
                    <p class="description">default, short, comma</p>
               </div>
               <div>
                    <h2> For example [aps-get-count social_media="facebook" count_format="short"] </h2>
               </div>
          </div>
     </div>