<?php 
$join_js_array = array();
$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
$facebook_icon = (isset($apif_settings['social_share']['facebook_icon']) && $apif_settings['social_share']['facebook_icon'] == 1)?1:0;
$twiter_icon = (isset($apif_settings['social_share']['twiter_icon']) && $apif_settings['social_share']['twiter_icon'] == 1)?1:0;
$google_plus_icon = (isset($apif_settings['social_share']['google_plus_icon']) && $apif_settings['social_share']['google_plus_icon'] == 1)?1:0;
$pinterest_icon = (isset($apif_settings['social_share']['pinterest_icon']) && $apif_settings['social_share']['pinterest_icon'] == 1)?1:0;

if(isset($attr['hover_animation']) && $attr['hover_animation'] != ''){
  $slider_layout2_animation_effect = $attr['hover_animation'];
}else{
  $slider_layout2_animation_effect = (isset($slider_layout2_animation_effect) && $slider_layout2_animation_effect != '')?esc_attr($slider_layout2_animation_effect):'apif-top-to-bottom';
}
?>
<div class="wrapper">
  <div class="jcarousel-wrapper">
    <!-- Carousel -->
    <div class="apif-jcarousel ap_commond_div_for_pretty_photo_lightbox">
      <?php
      if(isset($ins_media['meta']['error_message'])){
        ?>
        <h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1>
        <?php
      }else if (is_array($ins_media['data']) || is_object($ins_media['data'])) { ?>
      <ul class='apif-jcarousel-slider-wrap'>
        <?php
        $index_counter = 0;
$carousel_arr = array();
$data_profile_image = IF_Pro_Class::get_Profile_Image($ins_media['data']);   

foreach ($ins_media['data'] as $vm):
$index_id = $index_counter++;
$check = 1;
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
$permalink = (isset($vm['permalink']) && $vm['permalink'] != '')?esc_url($vm['permalink']):'';
$img = $vm['images']['standard_resolution']['url'];
$width = $vm['images']['standard_resolution']['width'];
$lowwidth = $vm['images']['low_resolution']['width'];
$thumbwidth = $vm['images']['thumbnail']['width'];
$height = $vm['images']['standard_resolution']['height'];
$lowheight = $vm['images']['low_resolution']['height'];
$thumbheight = $vm['images']['thumbnail']['height'];
$image_url = APIF_IMAGE_DIR . '/image-square.png';

if($feed_type == "any_user_timeline" || $feed_type == "hashtag"){
 $extra_options = (isset($vm['extra_options']) && $vm['extra_options'] != '')?unserialize($vm['extra_options']):array();
 include_once(APIF_INST_PATH.'inc/frontend/instagram.php');
 $insta = new InstaWCD();
 $extra_options = $insta->objectToArray($extra_options);  
   // $this->displayArr($extra_options);
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

if($vm['type'] == 'video'){
  $lightbox_image = $vm['images']['standard_resolution']['url'];
  $video_link = $vm['videos']['low_bandwidth']['url'];
}else{
  $lightbox_image = $vm['images']['standard_resolution']['url'];
}
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
$permalink = $vm['permalink'];
$image = IF_Pro_Class::check_ifexist_image($image,$image_size,$permalink);
?>
<li class='apif_<?php echo $image_size; ?>'>
  <div class="ap_feeds_slider <?php echo $slider_layout2_animation_effect;?>">
    <figure>
     <div class="apif-featimg">
      <a class="example-image-link" href="<?php echo esc_url($lightbox_image); ?>" target="_blank"><img class="the-thumb" src="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 20)); ?>'></a>
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

      }else if ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { 
        $join_js_array[] = 'apif-litbx-core';
        wp_enqueue_script('apif-litbx-core');
        wp_enqueue_style('apif-litbx-lightbox');
        ?>
        <a href='<?php echo esc_url($lightbox_image); ?>' class="hoverlay-link litbx" data-group="gallery"> </a>
        <?php
      }else if ($apif_settings['lightbox_layout'] == 'swipe_box'){ 
        $join_js_array[] = 'apif-swipebox-core-js';
        wp_enqueue_script('apif-swipebox-core-js');
        wp_enqueue_style('swipebox-core-style');
        include(APIF_INST_PATH.'inc/frontend/lightbox/swipe_box.php');
      }else if($apif_settings['lightbox_layout'] == 'classic'){ 
        $join_js_array[] = 'lightbox-js';
        wp_enqueue_script('lightbox-js');
        wp_enqueue_style('lightbox');
        ?>
        <a class="hoverlay-link example-image-link" href="<?php echo esc_url($lightbox_image); ?>" data-lightbox="example-set"></a>
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
    } ?>
    
    <?php if(isset($instagram_image_link)){
     include(APIF_INST_PATH.'inc/frontend/common/instagram-image-link.php');  
   } ?>

   <div class="apif-image-info-wrapper apif-middle-content-wrapper">
    <div class="apif-inner-content-wrapper">
      <?php 
      $like_count = $image_likes_count;
      $comment_count = $image_comments_count;
      if($slider_layout2_animation_effect == "apif-img-creative"){ ?>
      
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
    <?php }else if($slider_layout2_animation_effect == "apif-img-sweetmarley" || $slider_layout2_animation_effect == "apif-img-tender" || $slider_layout2_animation_effect == "apif-img-jolly" || $slider_layout2_animation_effect == "apif-img-strongapollo" || $slider_layout2_animation_effect == "apif-img-darkkiraview"){ 
     if($slider_layout2_animation_effect == "apif-img-tender"){
       $classanimte = "tender";
     }else if($slider_layout2_animation_effect == "apif-img-jolly"){
       $classanimte = "jolly";
     }else if($slider_layout2_animation_effect == "apif-img-strongapollo"){
       $classanimte = "strongapollo";
     }else if($slider_layout2_animation_effect == "apif-img-sweetmarley"){
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
</div>
</li>
<?php 
}
endforeach;
?>
</ul>
<?php  } ?>
</div>

</div>
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
</style>
<script type="text/javascript">
  jQuery(document).ready( function($) {
    $('.apif-jcarousel-slider-wrap').each(function(){
      var widdth = $(this).find('.ap_feeds_slider figure').width();
      if(widdth <= 350){
        $(this).find('.ap_feeds_slider').addClass('apif-small-size-display');
      }else{
       $(this).find('.ap_feeds_slider').removeClass('apif-small-size-display');
     }
   });
  });
</script>
</div>
<?php
// wp_enqueue_script('apif-owl-carousel-js');
wp_enqueue_script('apif-jcarousel-core');
wp_enqueue_script('apif-jcarousel-skeleton');
wp_enqueue_script('apif-jcarousel-control');
wp_enqueue_script('apif-jcarousel-autoscroll');
wp_enqueue_style('apif-bx-slider');
wp_enqueue_script('apif-bxslider-core');
$dependencies = array('jquery', 'apif-jcarousel-core', 'apif-jcarousel-skeleton', 'apif-jcarousel-control', 'apif-jcarousel-autoscroll','apif-bxslider-core');
array_merge($dependencies, $join_js_array);
wp_enqueue_script('apif-frontend-js', $dependencies);
// wp_localize_script( 'apif-frontend-js', 'frontend_owl_carousel_object', array('owl_carousel_enable' => 'true') );