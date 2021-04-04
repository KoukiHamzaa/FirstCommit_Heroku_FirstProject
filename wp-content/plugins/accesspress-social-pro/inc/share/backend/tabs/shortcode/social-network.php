<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<h2><?php _e( 'Social Networks', APSS_TEXT_DOMAIN ); ?> </h2>

<span class="social-text">
     <?php _e( 'Please choose the social media you want to display. Also you can order these social media\'s by drag and drop:', APSS_TEXT_DOMAIN ); ?>
</span>
<?php
$label_array = array(
    'facebook' => ' <span class="media-icon"><i class="fa fa-facebook"></i></span> Facebook',
    'twitter' => ' <span class="media-icon"><i class="fa fa-twitter"></i></span> Twitter',
    'google-plus' => '<span class="media-icon"><i class="fa fa-google-plus"></i></span> Google Plus',
    'pinterest' => '<span class="media-icon"> <i class="fa fa-pinterest"></i> </span> Pinterest',
    'linkedin' => '<span class="media-icon"><i class="fa fa-linkedin"></i></span> Linkedin',
    'digg' => '<span class="media-icon"><i class="fa fa-digg"></i></span> Digg',
    'delicious' => '<span class="media-icon"><i class="fa fa-delicious"></i></span> Delicious',
    'reddit' => ' <span class="media-icon"><i class="fa fa-reddit"></i></span> Reddit',
    'stumbleupon' => ' <span class="media-icon"><i class="fa fa-stumbleupon"></i></span> StumbleUpon',
    'tumblr' => '<span class="media-icon"><i class="fa fa-tumblr"></i> </span> Tumblr',
    'vkontakte' => '<span class="media-icon"><i class="fa fa-vk"></i> </span> VKontakte',
    'xing' => '<span class="media-icon"><i class="fa fa-xing"></i> </span> Xing',
    'weibo' => '<span class="media-icon"><i class="fa fa-weibo"></i> </span> Weibo',
    'buffer' => '<span class="media-icon"><i class="fa fa-buffer"></i> </span> Buffer',
    'whatsapp' => '<span class="media-icon"><i class="fa fa-whatsapp"></i> </span> Whatsapp',
    'viber' => '<span class="media-icon"><i class="fa fa-viber"></i> </span> Viber',
    'sms' => '<span class="media-icon"><i class="fa fa-comment-o"></i> </span> SMS',
    'messenger' => '<span class="media-icon"><i class="fa fa-messenger"></i></span> Messenger',
    'email' => '<span class="media-icon"><i class="fa fa-envelope"></i></span> Email',
    'print' => '<span class="media-icon"><i class="fa fa-printgit ad"></i> </span> Print',
    'blogger' => '<span class="media-icon"><i class="fa fa-blogger"></i> </span>Blogger',
    'flipboard' => '<span class="media-icon"><i class="fa fa-flipboard"></i> </span>Flipboard',
    'kakao' => '<span class="media-icon"><i class="fa fa-kakao"></i> </span>Kakao',
    'yammer' => '<span class="media-icon"><i class="fa fa-yammer"></i> </span>Yammer',
    'mix' => '<span class="media-icon"><i class="fa fa-mix"></i> </span>Mix',
    'yummly' => '<span class="media-icon"><i class="fa fa-yummly"></i> </span>Yummy',
    'odnoklassniki' => '<span class="media-icon"><i class="fa fa-odnoklassniki"></i> </span>Odnoklassniki',
    'pocket' => '<span class="media-icon"><i class="fa fa-pocket"></i> </span>Pocket'
);
?>

<div class="apss-row">
     <div class="apss-general-div">
          <div class="apss-title-div">
               <label>
                    <h3> <?php _e( 'Selected Social Networks', APSS_TEXT_DOMAIN ); ?> </h3>
               </label>
          </div>
          <div class="apss-option-value">
               <label class="">
                    <div id="apps-selected-nertworks" class="apps-opt-wrap-2 ">
                         <?php foreach ( $label_array as $key => $val ) { ?>
                              <div class="apss-option-wrapper apss-option-wrapper-2 apss-selected-option-wrapper" id="apss-shortcode-<?php echo $key; ?>" >
                                   <div class="apss-sort-div">
                                        <div class='apss-select-all-label'>
                                             <span class="apss-left-icon">
                                                  <i class="fa fa-arrows"></i>
                                             </span>
                                        </div>
                                   </div>
                                   <div class="apss-network-div">
                                        <input type="checkbox" class='shortcode_social_networks_class' id="apss-shortcode-sn-<?php echo $key; ?>" data-key='<?php echo $key; ?>' name="<?php echo $key; ?>" value="<?php echo $key; ?>" />
                                        <span class="social-name"><?php echo $label_array[ $key ]; ?></span>
                                   </div>
                                   <div>
                                        <div class="apss-custom-title-div">
                                             <label>
                                                  <?php _e( 'Custom Name:', APSS_TEXT_DOMAIN ); ?>
                                             </label>
                                        </div>
                                        <div class="apss-custom-name-div">
                                             <input class="apss-shortcode-sn-naming-input" id='apss-share-social-network-naming-<?php echo $key; ?>' type='text' name="custom_name_<?php echo $key; ?>" value=" " />
                                        </div>
                                   </div>
                              </div>
                              <?php
                         }
                         ?>
                         <input type="hidden" name="apss_social_newtwork_order" id='apss_social_newtwork_order' value="<?php echo implode( ',', array_keys( $options[ 'social_networks' ] ) ); ?>"/>
                    </div>
               </label>
          </div>
     </div>
</div>