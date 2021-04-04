<?php
//thumbnail scroller slider layout
$rand_no = rand();
$join_js_array = array();
$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
$facebook_icon = (isset($apif_settings['social_share']['facebook_icon']) && $apif_settings['social_share']['facebook_icon'] == 1)?1:0;
$twiter_icon = (isset($apif_settings['social_share']['twiter_icon']) && $apif_settings['social_share']['twiter_icon'] == 1)?1:0;
$google_plus_icon = (isset($apif_settings['social_share']['google_plus_icon']) && $apif_settings['social_share']['google_plus_icon'] == 1)?1:0;
$pinterest_icon = (isset($apif_settings['social_share']['pinterest_icon']) && $apif_settings['social_share']['pinterest_icon'] == 1)?1:0;

$slider_layout5_layouttype = (isset($slider_layout5_layouttype) && $slider_layout5_layouttype != '')?$slider_layout5_layouttype:'#000000';
$slider_layout5_type = (isset($slider_layout5_type) && $slider_layout5_type != '')?$slider_layout5_type:'hover-precise';
$slider_layout5_theme = (isset($slider_layout5_theme) && $slider_layout5_theme != '')?$slider_layout5_theme:'hover-classic';
if(isset($attr['hover_animation']) && $attr['hover_animation'] != ''){
$slider_layout5_animation_effect = $attr['hover_animation'];
}else{
$slider_layout5_animation_effect = (isset($slider_layout5_animation_effect) && $slider_layout5_animation_effect != '')?esc_attr($slider_layout5_animation_effect):'movement-on-hover';
}
?>
<section id="apif-shortcode-wrapper" class="apif-slider-5-view">
<div  class='ap_slider_wrapper'>
   <div id="apif-content-<?php echo $rand_no; ?>" class="apif-slider-thumbnail-scroller-wrap apif-content-<?php echo $rand_no; ?> ap_commond_div_for_pretty_photo_lightbox content" data-id="<?php echo $rand_no;?>" data-type="<?php echo $slider_layout5_type;?>" data-theme="<?php echo $slider_layout5_theme;?>">
  <?php
    if(isset($ins_media['meta']['error_message'])){
        ?>
           <h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1>
        <?php
    }else if (is_array($ins_media['data']) || is_object($ins_media['data'])) { ?>
    <ul>
    <?php
        $index_counter = 0;
        $carousel_arr = array();
        $data_profile_image = IF_Pro_Class::get_Profile_Image($items_array);
        $check = 1;
        foreach ($ins_media['data'] as $vm):
            if($feed_type == "personal_hashtag"){
              $alltags = $vm['tags'];
              if(isset($alltags) && !empty($alltags) && in_array($personal_hashtag_name,$alltags)){
              $check = 1;
              }else{
              $check = 0;
              }
            }else{
              $alltags = '';
              $check = 1;
            }
        if($check == 1){
            $index_id = $index_counter++;
            $img = $vm['images']['standard_resolution']['url'];
            $image_url = APIF_IMAGE_DIR . '/image-square.png';
             if($feed_type == "any_user_timeline" || $feed_type == "hashtag"){
                      $extra_options = (isset($vm['extra_options']) && $vm['extra_options'] != '')?unserialize($vm['extra_options']):array();
                          include_once(APIF_INST_PATH.'inc/frontend/instagram.php');
                          $insta = new InstaWCD();
                          $extra_options = $insta->objectToArray($extra_options);  
                          include(APIF_INST_PATH.'inc/frontend/common/anyuser-image-size.php');
                            $feed_id  = $vm['feed_id'];
                          $carousel = (isset($vm['carousel']) && $vm['carousel'] != '')?$vm['carousel']:'';
							if(empty($carousel_arr)){
							   $carousel_arr = serialize($carousel);
							}
              }else{
                    include(APIF_INST_PATH.'inc/frontend/common/image_size.php');
                    $feed_id  = $vm['caption']['id'];
                    $carousel = (isset($vm['carousel_media']) && !empty($vm['carousel_media']))?$vm['carousel_media']:array();
                    if(!empty($carousel)){
                         foreach ($carousel as $key => $value) {
                            $type = (isset($value['images']['type']) && $value['images']['type'] != '')?esc_attr($value['images']['type']):'image';
			                $url =  (isset($value['images']['standard_resolution']['url']) && $value['images']['standard_resolution']['url'] != '')?esc_url($value['images']['standard_resolution']['url']):'';
			                $width =  (isset($value['images']['standard_resolution']['width']) && $value['images']['standard_resolution']['width'] != '')?intval($value['images']['standard_resolution']['width']):'';
			                $height =  (isset($value['images']['standard_resolution']['height']) && $value['images']['standard_resolution']['height'] != '')?intval($value['images']['standard_resolution']['height']):'';
                            $arr = array(
                                'type' => $type,
                                'url' => $url,
                                'width' => $width,
                                'height' => $height
                            );
                            $carousel_array[] =  $arr;
                        }
                        $carousel_arr = serialize($carousel_array);
                    }
           }
            if(empty($carousel_arr)){
                $carousel_arr = '';
            } 
            $link = $vm["link"];
            $flow_icon = APIF_IMAGE_DIR . '/sc-icon.png';
            $captiontext = $vm['caption']['text'];
            if($feed_type != "any_user_timeline" || $feed_type != "hashtag"){
               preg_match_all('/#\w+/',$captiontext,$matches);
                if($matches[0]) {
                    foreach($matches[0] as $hashtag) {
                        $hash = str_replace('#', '', $hashtag);
                        $replace = "<a href='https://www.instagram.com/explore/tags/".$hash."/'>".$hashtag."</a>";
                      $captiontext =  str_replace($hashtag, $replace, $captiontext);
                    }
                }
            }
        if(isset($vm['user']['username']) && $vm['user']['username'] != ''){
           $data_username = $vm['user']['username'];
          }else{
            if(isset($vm['nickname']) && $vm['nickname'] != ''){
               $data_username = $vm['nickname'];
            }else{
               $data_username = '';
            }
          }
      $hover_text_color = (isset($hover_image_text_color) && $hover_image_text_color != '')?$hover_image_text_color:'';
      if($hover_text_color != ''){
      $hover_text_color_style = 'style="color:'.$hover_text_color.'"';
      }else{
      $hover_text_color_style = '';
}
        if($hide_profile_link == 1){
            $html_profile_userlink = $data_username;
        }else{
            $nickname = (isset($data_username) && $data_username != '')?esc_attr($data_username):'#';
            $url_profilelink = "https://www.instagram.com/".$nickname;
            $html_profile_userlink = "<a href='".$url_profilelink."' target='_blank' ".$hover_text_color_style.">".$data_username."</a>";
        }
    $permalink = (isset($vm['permalink']) && $vm['permalink'] != '')?esc_url($vm['permalink']):'';
    $image = IF_Pro_Class::check_ifexist_image($image,$image_size,$permalink);    
?>
<li class="apif_<?php echo $image_size; ?> <?php echo $slider_layout5_animation_effect;?>">
            <figure>
                <div class="apif-featimg">
                <a class="example-image-link" href="<?php echo $link; ?>"> <img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 12)); ?>'/></a>
                </div>
                <div class='apif-image-overlay' style="background: <?php echo $theme_accent_color; ?>;"></div>
                <div class="apif-overlay-cont-block">
                    <?php
                    if(isset($apif_settings['enable_lightbox'])){ 
                        if($apif_settings['lightbox_layout'] == 'preety_photo'){
                            $join_js_array[] = 'apif-prettyphoto-lightbox-core-js';
                            wp_enqueue_script('apif-prettyphoto-lightbox-core-js');
                            wp_enqueue_style('apif-prettyphoto-lightbox');
                            include(APIF_INST_PATH.'inc/frontend/lightbox/prettyphoto.php');
                        }elseif ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { 
                            $join_js_array[] = 'apif-litbx-core';
                            wp_enqueue_script('apif-litbx-core');
                            wp_enqueue_style('apif-litbx-lightbox');
                            ?>
                            <a href='<?php echo esc_url($image); ?>' class="hoverlay-link litbx" data-group="gallery"> </a>
                            <?php
                        }elseif ($apif_settings['lightbox_layout'] == 'swipe_box'){ 
                            $join_js_array[] = 'apif-swipebox-core-js';
                            wp_enqueue_script('apif-swipebox-core-js');
                            wp_enqueue_style('swipebox-core-style');
                            include(APIF_INST_PATH.'inc/frontend/lightbox/swipe_box.php');
                        }else if($apif_settings['lightbox_layout'] == 'classic'){ 
                            $join_js_array[] = 'lightbox-js';
                            wp_enqueue_script('lightbox-js');
                            wp_enqueue_style('lightbox');
                            ?>
                            <a class="hoverlay-link example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="classic"></a>
                            <?php
                        }else if($apif_settings['lightbox_layout'] == 'venobox_lightbox'){ 
                            $join_js_array[] = 'apif-venobox-core';
                            wp_enqueue_script('apif-venobox-core');
                            wp_enqueue_style('apif-venobox-lightbox');
                            include(APIF_INST_PATH.'inc/frontend/lightbox/venobox.php');
                        }else if($apif_settings['lightbox_layout'] == 'apif_own_lightbox'){ 
                            $extra_hover_class = "hoverlay-link";
                            include(APIF_INST_PATH.'inc/frontend/lightbox/custom_lightbox.php');
                        }
                    }
                    ?>

                    <?php if(isset($instagram_image_link)){ 
                        include(APIF_INST_PATH.'inc/frontend/common/instagram-image-link.php');  
                    } ?>
<!-- apif-image-info-wrapper  -->
                  <div class="apif-middle-content-wrapper">
                  <div class="apif-inner-content-wrapper">
                   <?php 
                    if($slider_layout5_animation_effect == "apif-img-creative"){  ?>

                   <div class="apif-creative-wrapper-profile">
                    <?php if(isset($instagram_user_username)){ ?>
                     <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>>
                        <?php echo $html_profile_userlink; ?> 
                     </div>
                    <?php  } ?>
                    <?php  include(APIF_INST_PATH.'inc/frontend/common/comments.php'); ?>
                    </div>
                    <div class="apif-creative-second-wrapper">
                       <?php if(isset($instagram_user_link)){ ?>
                        <div class='profile-image'>
                            <img src='<?php echo $data_profile_image; ?>' width='150px' alt='<?php echo $vm['user']['username']; ?>'/>
                        </div>
                        <?php  } ?>
                       <?php include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); ?>
                    </div>

                    <?php }else if($slider_layout5_animation_effect == "apif-img-sweetmarley" || $slider_layout5_animation_effect == "apif-img-tender" || $slider_layout5_animation_effect == "apif-img-jolly" || $slider_layout5_animation_effect == "apif-img-strongapollo" || $slider_layout5_animation_effect == "apif-img-darkkiraview"){ 
                         if($slider_layout5_animation_effect == "apif-img-tender"){
                           $classanimte = "tender";
                         }else if($slider_layout5_animation_effect == "apif-img-jolly"){
                           $classanimte = "jolly";
                         }else if($slider_layout5_animation_effect == "apif-img-strongapollo"){
                           $classanimte = "strongapollo";
                         }else if($slider_layout5_animation_effect == "apif-img-sweetmarley"){
                           $classanimte = "sweetmarley";
                         }else{
                            $classanimte = "darkkiraview";
                         }
                        ?>
                        <div class="apif-<?php echo $classanimte;?>-wrapper-profile">
                          <?php if(isset($instagram_user_link)){   include(APIF_INST_PATH.'inc/frontend/common/profile-image.php'); }?>
                          <?php if(isset($instagram_user_username)){ ?>
                        <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>>
                               <?php echo $html_profile_userlink; ?> 
                             </div>
                        <?php  } ?>                           
                        </div>
                        <div class="apif-<?php echo $classanimte;?>-second-wrapper">
                           <?php  include(APIF_INST_PATH.'inc/frontend/common/comments.php'); ?>
                           <?php include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); ?>
                        </div>
                     <?php }else{ 

                      if(isset($instagram_user_link)){ ?>
                     <div class='profile-image'>
                        <img src='<?php echo $data_profile_image; ?>' width='150px' alt='<?php echo $vm['user']['username']; ?>'/>
                     </div>
                     <?php  } 
                        if(isset($instagram_user_username)){ ?>
                         <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>>
                              <?php echo $html_profile_userlink; ?> 
                           </div>
                          <?php  } 
                        include(APIF_INST_PATH.'inc/frontend/common/comments.php'); 
                        include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); 
                    
                     } ?>
                     </div>
                    </div>

                    </div>
                    </figure>
                 
            </li>               
      <?php }
        endforeach;
        ?>
        </ul>
    <?php } ?>
    </div>
  </div>
</section>
<style type="text/css">
<?php if($hover_image_comment_color != ''){ ?> 
.apif-unique-<?php echo $if_id;?> .apif-inner-content-wrapper .coment-like .ap_insta_comment_count_wrapper{
color: <?php echo $hover_image_comment_color;?>;
}
<?php } ?>
<?php if($hover_image_likes_color != ''){ ?> 
.apif-unique-<?php echo $if_id;?> .apif-inner-content-wrapper .coment-like .ap_insta_like_count .ap-instagram_imge_like{
color: <?php echo $hover_image_likes_color;?>;
}
<?php } ?>
    .apif-slider-thumbnail-scroller-wrap.content, 
    .apif-slider-thumbnail-scroller-wrap.content .mTSButton{
     background-color: <?php echo $slider_layout5_layouttype;?>; 
    }
</style>
<script type="text/javascript">
// Mouse hover Effect slider
// jQuery(document).ready( function($) {
(function($){
$(window).load(function(){
$(".apif-content-<?php echo $rand_no; ?>").mThumbnailScroller({
    axis:"x",
    type:"<?php echo $slider_layout5_type;?>",
    theme:"<?php echo $slider_layout5_theme;?>",
});
$('.apif-slider-thumbnail-scroller-wrap').each(function(){
      var widdth = $(this).find('ul li .apif-featimg').width();
     if(widdth <= 350){
      $(this).find('li').addClass('apif-small-size-display');
     }else{
       $(this).find('li').removeClass('apif-small-size-display');
     }
  });
     });
    })(jQuery);
 // });
</script>
<?php /* ?>
<style type="text/css">
.apif-content-<?php echo $rand_no; ?> .apif_standard_resolution figure {
    height: 400px;
    width: 100%;
    position: relative;
    display: block;
}
.apif-content-<?php echo $rand_no; ?> .apif_standard_resolution figure a img{
    transform-origin: 0 0;
    backface-visibility: hidden;
    height: 100%;
    width: 100%;
    min-width: 100%;
    max-width: inherit;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
<?php
*/
wp_enqueue_style('apif-thumbnail-scroller-master');
wp_enqueue_script('apif-thumbnail-scroller-master-core');
wp_enqueue_style('apif-bx-slider');
wp_enqueue_script('apif-bxslider-core');
$dependencies = array('jquery', 'apif-thumbnail-scroller-master-core','apif-bxslider-core');
array_merge($dependencies, $join_js_array);
wp_enqueue_script('apif-frontend-js', $dependencies);