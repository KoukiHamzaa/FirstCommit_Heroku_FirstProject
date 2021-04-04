<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="apss-tab-contents apss-social-networks" id="tab-apss-social-networks" style='display:block'>
     <h2><?php _e( 'Social Networks', APSS_TEXT_DOMAIN ); ?> </h2>
     <?php /* ?>
       <span class="social-text">
       <?php _e( '', APSS_TEXT_DOMAIN ); ?>
       </span>
       <?php */ ?>
     <?php
     $label_array = array(
         'facebook' => ' <span class="media-icon"><i class="fa fa-facebook"></i></span> Facebook',
         'twitter' => ' <span class="media-icon"><i class="fa fa-twitter"></i></span> Twitter',
         'google-plus' => '<span class="media-icon"><i class="fa fa-google-plus"></i></span> Google Plus',
         'pinterest' => '<span class="media-icon"> <i class="fa fa-pinterest"></i> </span>Pinterest',
         'linkedin' => '<span class="media-icon"><i class="fa fa-linkedin"></i></span> Linkedin',
         'digg' => '<span class="media-icon"><i class="fa fa-digg"></i></span> Digg',
         'delicious' => '<span class="media-icon"><i class="fa fa-delicious"></i></span> Delicious',
         'reddit' => ' <span class="media-icon"><i class="fa fa-reddit"></i></span> Reddit',
         'stumbleupon' => ' <span class="media-icon"><i class="fa fa-stumbleupon"></i></span> StumbleUpon',
         'tumblr' => '<span class="media-icon"><i class="fa fa-tumblr"></i> </span>Tumblr',
         'vkontakte' => '<span class="media-icon"><i class="fa fa-vk"></i> </span>VKontakte',
         'xing' => '<span class="media-icon"><i class="fa fa-xing"></i> </span>Xing',
         'weibo' => '<span class="media-icon"><i class="fa fa-weibo"></i> </span>Weibo',
         'buffer' => '<span class="media-icon"><i class="fa fa-buffer"></i> </span>Buffer',
         'whatsapp' => '<span class="media-icon"><i class="fa fa-whatsapp"></i> </span>Whatsapp',
         'viber' => '<span class="media-icon"><i class="fa fa-viber"></i> </span>Viber',
         'sms' => '<span class="media-icon"><i class="fa fa-comment-o"></i> </span>SMS',
         'messenger' => '<span class="media-icon"><i class="fa fa-messenger"></i></span>Messenger',
         'email' => '<span class="media-icon"><i class="fa  fa-envelope"></i></span> Email',
         'print' => '<span class="media-icon"><i class="fa fa-print"></i> </span>Print',
         'blogger' => '<span class="media-icon"><i class="fa fa-bold"></i> </span>Blogger',
         'flipboard' => '<span class="media-icon"><i class="fa fa-flipboard"></i> </span>Flipboard',
         'kakao' => '<span class="media-icon"><i class="fa fa-kakao"></i> </span>Kakao',
         'yammer' => '<span class="media-icon"><i class="socicon-yammer"></i> </span>Yammer',
         'mix' => '<span class="media-icon"><i class="fa fa-mix"></i> </span>Mix',
         'yummly' => '<span class="media-icon"><i class="fa fa-yummly"></i> </span>Yummly',
         'odnoklassniki' => '<span class="media-icon"><i class="fa fa-odnoklassniki"></i> </span>Odnoklassniki',
         'pocket' => '<span class="media-icon"><i class="fa fa-get-pocket"></i> </span>Pocket'
     );

//     $options[ 'social_networks' ] = array(
//         'facebook' => 'Facebook',
//         'twitter' => 'Twitter',
//         'google-plus' => 'Google Plus',
//         'pinterest' => 'Pinterest',
//         'linkedin' => 'Linkedin',
//         'digg' => 'Digg',
//         'delicious' => 'Delicious',
//         'reddit' => 'Reddit',
//         'stumbleupon' => 'StumbleUpon',
//         'tumblr' => 'Tumblr',
//         'vkontakte' => 'VKontakte',
//         'xing' => 'Xing',
//         'weibo' => 'Weibo',
//         'buffer' => 'Buffer',
//         'whatsapp' => 'Whatsapp',
//         'viber' => 'Viber',
//         'sms' => 'SMS',
//         'messenger' => 'Messenger',
//         'email' => 'Email',
//         'print' => 'Print',
//         'blogger' => 'Blogger',
//         'flipboard' => 'Flipboard',
//         'kakao' => 'Kakao',
//         'yammer' => 'Yammer',
//         'mix' => 'Mix',
//         'yummly' => 'Yummly',
//         'odnoklassniki' => 'Odnoklassniki',
//         'pocket' => 'Pocket'
//     );
     ?>

     <div class="apss-row-odd">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <?php _e( 'Available Social Networks', APSS_TEXT_DOMAIN ); ?>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="">
                         <?php
                         foreach ( $options[ 'social_networks' ] as $key => $val ) {
                              // foreach ( $label_array as $key => $val ) {
                              ?>
                              <label for="available_network_<?php echo $key ?>">
                                   <div class="apss-option-wrapper apss-select-network" data-network="<?php echo $key; ?>" <?php echo ($val == '1' ) ? "style='display:none'" : ''; ?>>
                                        <span class="social-name"> <?php echo $label_array[ $key ]; ?> </span>
                                        <input type="checkbox" class='available_social_networks_class' id="available_network_<?php echo $key ?>" data-key='<?php echo $key; ?>' name="available_social_networks[<?php echo $key; ?>]" value="<?php echo ($val == '1' ) ? 1 : 0; ?>" <?php echo ($val == '1' ) ? "checked='checked'" : ''; ?> style="display:none;"  />
                                   </div>
                              </label>
                         <?php }
                         ?>
                    </label>
                    <p class="description"> <?php _e( 'Please click on the social medias you want to be displayed in the frontend from the above list', APSS_TEXT_DOMAIN ) ?> </p>
               </div>
          </div>
     </div>

     <div class="apss-row-even">
          <div class="apss-general-div">
               <div class="apss-title-div">
                    <label>
                         <h3> <?php _e( 'Selected Social Networks', APSS_TEXT_DOMAIN ); ?> </h3>
                    </label>
               </div>
               <div class="apss-option-value">
                    <label class="">
                         <div id="apps-selected-nertworks" class="apps-opt-wrap ">
                              <?php
                              // foreach ( $label_array as $key => $val ) {
                              foreach ( $options[ 'social_networks' ] as $key => $val ) {
                                   ?>
                                   <div class="apss-option-wrapper apss-selected-option-wrapper" id="apss-<?php echo $key; ?>" <?php echo ($val == '1' ) ? "style='display:inline-block'" : "style='display:none'"; ?> >
                                        <div class="apss-sort-div">
                                             <div class='apss-select-all-label'>
                                                  <span class="left-icon">
                                                       <i class="fa fa-arrows"></i>
                                                  </span>
                                             </div>
                                        </div>
                                        <div class="apss-network-div">
                                             <input type="checkbox" class='selected_social_networks_class' id="apss-network-<?php echo $key; ?>" data-key='<?php echo $key; ?>' name="social_networks[<?php echo $key; ?>]" value="1" <?php echo ($val == '1' ) ? "checked='checked'" : ''; ?> style="display:none;"/>
                                             <span class="social-name"><?php echo $label_array[ $key ]; ?></span>
                                             <label for="apss-network-<?php echo $key; ?>">
                                                  <span class="apss-remove-selected-network apss-remove-selected-network-<?php echo $key; ?>" data-remove-network="<?php echo $key; ?>" ></span>
                                             </label>
                                        </div>
                                        <div>
                                             <div class="apss-custom-title-div">
                                                  <label>
                                                       <?php _e( 'Custom Name:', APSS_TEXT_DOMAIN ); ?>
                                                  </label>
                                             </div>
                                             <div class="apss-custom-name-div">
                                                  <input class="apss-social-network-naming-input" id='apss-share-social-network-naming-<?php echo $key; ?>' type='text' name="apss_share_settings[apss_social_networks_naming][<?php echo $key; ?>]" value="<?php
                                                  if ( isset( $options[ 'apss_social_networks_naming' ][ $key ] ) ) {
                                                       echo $options[ 'apss_social_networks_naming' ][ $key ];
                                                  }
                                                  ?>" />
                                             </div>
                                        </div>
                                   </div>
                              <?php }
                              ?>
                              <input type="hidden" name="apss_social_newtwork_order" id='apss_social_newtwork_order' value="<?php echo implode( ',', array_keys( $options[ 'social_networks' ] ) ); ?>"/>
                         </div>
                    </label>

                    <p class="description"> <?php _e( 'The social medias that are clicked from the above Available Social Networks will be displayed here. You can drap drop the social medias to set an order for them.', APSS_TEXT_DOMAIN ) ?> </p>

               </div>
          </div>
     </div>
</div>