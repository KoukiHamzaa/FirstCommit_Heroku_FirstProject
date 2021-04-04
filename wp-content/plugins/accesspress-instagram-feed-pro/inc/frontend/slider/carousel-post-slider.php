<?php 
$join_js_array  = array();
//custom settings
$arrow_bgcolor  = $apif_settings['carousel_post_slider_layout']['arrow_bgcolor'];
$arrow_bghcolor = $apif_settings['carousel_post_slider_layout']['arrow_bghcolor'];
$arrow_color    = $apif_settings['carousel_post_slider_layout']['arrow_color'];

$button_bgcolor  = $apif_settings['carousel_post_slider_layout']['bgcolor'];
$button_bghcolor = $apif_settings['carousel_post_slider_layout']['bghcolor'];
$button_fcolor   = $apif_settings['carousel_post_slider_layout']['fcolor'];
$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
$facebook_icon = (isset($apif_settings['social_share']['facebook_icon']) && $apif_settings['social_share']['facebook_icon'] == 1)?1:0;
$twiter_icon = (isset($apif_settings['social_share']['twiter_icon']) && $apif_settings['social_share']['twiter_icon'] == 1)?1:0;
$google_plus_icon = (isset($apif_settings['social_share']['google_plus_icon']) && $apif_settings['social_share']['google_plus_icon'] == 1)?1:0;
$pinterest_icon = (isset($apif_settings['social_share']['pinterest_icon']) && $apif_settings['social_share']['pinterest_icon'] == 1)?1:0;

$next_text = ( isset($apif_settings['carousel_post_slider_layout']['next_text']) && $apif_settings['carousel_post_slider_layout']['next_text'] !='' )  ? $apif_settings['carousel_post_slider_layout']['next_text'] : 'Next';
$previous_text = ( isset($apif_settings['carousel_post_slider_layout']['previous_text']) && $apif_settings['carousel_post_slider_layout']['previous_text'] !='' ) ? $apif_settings['carousel_post_slider_layout']['previous_text']: 'Prev';

$large_desktop_column = ( isset($apif_settings['carousel_post_slider_layout']['columns']['large_desktop']) && $apif_settings['carousel_post_slider_layout']['columns']['large_desktop'] !='' ) ? $apif_settings['carousel_post_slider_layout']['columns']['large_desktop']: 4;

$large_desktop_column_class = (isset($large_desktop_column) && $large_desktop_column != '') ? 'apif-large-desktop-col-'.$large_desktop_column : 'apif-large-desktop-col-4';

$desktop_column = ( isset($apif_settings['carousel_post_slider_layout']['columns']['desktop']) && $apif_settings['carousel_post_slider_layout']['columns']['desktop'] !='' ) ? $apif_settings['carousel_post_slider_layout']['columns']['desktop']: 4;
$tablet_column = ( isset($apif_settings['carousel_post_slider_layout']['columns']['tablet']) && $apif_settings['carousel_post_slider_layout']['columns']['tablet'] !='' ) ? $apif_settings['carousel_post_slider_layout']['columns']['tablet']: 3;
$mobile_column = ( isset($apif_settings['carousel_post_slider_layout']['columns']['mobile']) && $apif_settings['carousel_post_slider_layout']['columns']['mobile'] !='' ) ? $apif_settings['carousel_post_slider_layout']['columns']['mobile']: 1;

$autoplay = ( isset($apif_settings['carousel_post_slider_layout']['autoplay']) && $apif_settings['carousel_post_slider_layout']['autoplay'] =='true' ) ? 'true': 'false';
$pager = ( isset($apif_settings['carousel_post_slider_layout']['pager']) && $apif_settings['carousel_post_slider_layout']['pager'] == 'true' )?'true':'false';
$controls = ( isset($apif_settings['carousel_post_slider_layout']['controls']) && $apif_settings['carousel_post_slider_layout']['controls'] =='true' )?'true': 'false';
$autoplay_speed = ( isset($apif_settings['carousel_post_slider_layout']['autoplay_speed']) && $apif_settings['carousel_post_slider_layout']['autoplay_speed'] !='' ) ? $apif_settings['carousel_post_slider_layout']['autoplay_speed']: '2000';
$controls_type = ( isset($apif_settings['carousel_post_slider_layout']['controls_type']) && $apif_settings['carousel_post_slider_layout']['controls_type'] == 'text' ) ? 'text': 'arrow';
$captionlimit = (isset($apif_settings['carousel_post_slider_layout']['captionlimit']) && $apif_settings['carousel_post_slider_layout']['captionlimit'] != '')?$apif_settings['carousel_post_slider_layout']['captionlimit']:'150';
$hide_post_time = (isset($apif_settings['carousel_post_slider_layout']['hide_post_time']) && $apif_settings['carousel_post_slider_layout']['hide_post_time'] == '1')?1:0;
$hide_caption = (isset($apif_settings['carousel_post_slider_layout']['hide_caption']) && $apif_settings['carousel_post_slider_layout']['hide_caption'] == '1')?1:0;

$columndesktop_class1 = "apif-slider-desktop-col-".$desktop_column;
$columntablet_class1 = "apif-slider-tablet-col-".$tablet_column;
$columnmobile_class1 = "apif-slider-mobile-col-".$mobile_column;
?>
<div id="owl-demo" class="apif-owl-demo <?php echo $large_desktop_column_class;?> <?php echo 'apif-control-'.$controls_type.'-type';?> apif-<?php echo $image_size; ?> owl-carousel apif-carousel-post-sldier-layout <?php echo $columndesktop_class1;?> <?php echo $columntablet_class1;?> <?php echo $columnmobile_class1;?>" data-controls="<?php echo $controls;?>" data-id="apif_<?php echo rand( 1111111, 9999999 );?>" data-pager="<?php echo $pager;?>" data-desktopcol="<?php echo $desktop_column;?>" data-tabletcol="<?php echo $tablet_column;?>" data-mobilecol="<?php echo $mobile_column;?>">
    <?php 
    // $this->displayArr($ins_media);
    if(isset($ins_media['meta']['error_message'])){
        ?>
        <h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1> 
        <?php
    }else if (is_array($ins_media['data']) || is_object($ins_media['data'])) {
        $index_counter = 0;
		$carousel_arr = array();
		$data_profile_image = IF_Pro_Class::get_Profile_Image($ins_media['data']);   

foreach ($ins_media['data'] as $vm):
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
        $index_id = $index_counter++;
        $image = $vm['images']['standard_resolution']['url'];
        $width = $vm['images']['standard_resolution']['width'];
        $lowwidth = $vm['images']['low_resolution']['width'];
        $thumbwidth = $vm['images']['thumbnail']['width'];
        $height = $vm['images']['standard_resolution']['height'];
        $lowheight = $vm['images']['low_resolution']['height'];
        $thumbheight = $vm['images']['thumbnail']['height'];
        $link = $vm["link"];
        $timestamp = $vm['created_time'];
        $posted_ago = $insta->xTimeAgo($timestamp);
       
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
$like_count = $image_likes_count;
$comment_count = $image_comments_count;
if(isset($vm['user']['username']) && $vm['user']['username'] != ''){
   $data_username = $vm['user']['username'];
  }else{
    if(isset($vm['nickname']) && $vm['nickname'] != ''){
       $data_username = $vm['nickname'];
    }else{
       $data_username = '';
    }
  }
if($hide_profile_link == 1){
    $html_profile_userlink = $data_username;
}else{
    $nickname = (isset($data_username) && $data_username != '')?esc_attr($data_username):'#';
    $url_profilelink = "https://www.instagram.com/".$nickname;
    $html_profile_userlink = "<a href='".$url_profilelink."' target='_blank'>".$data_username."</a>";
}
$permalink = (isset($vm['permalink']) && $vm['permalink'] != '')?esc_url($vm['permalink']):'';
$image = IF_Pro_Class::check_ifexist_image($image,$image_size,$permalink);
?>
<div class="apif-owl-silder apif-carousel-pslider-box">
   <div class="apif-carousel-pslider-block">
    <figure>
        
        <div class="apif-top-content">
           <div class="apif-rt-top-wrap">
            <?php if(isset($instagram_user_link)){   include(APIF_INST_PATH.'inc/frontend/common/profile-image.php'); }?>
          
             <div class="apif-userinfo-wrap">
              <?php if(isset($instagram_user_username)){ 
                ?>
               <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>>
                <?php echo $html_profile_userlink; ?> 
               </div>
              <?php  } ?>
              <?php if($hide_post_time != 1){?>
               <div class='posted-ago-wrap'>
                     <span class="apif-popup-posted-ago"><?php echo esc_attr($posted_ago); ?></span>
               </div>
               <?php } ?>
             </div>

            </div>
            <?php if(isset($instagram_image_link)){ 
              include(APIF_INST_PATH.'inc/frontend/common/instagram-image-link.php');  
            } ?>
        </div>

        <div class="apif-featimg">
         <a class="example-image-link" href="#" style="background-image: url(<?php echo esc_url($image); ?>);" title="<?php echo esc_attr(substr($captiontext, 0, 20)); ?>"></a>
        </div>
      
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
                    <a href='<?php echo esc_url($image); ?>' class="hoverlay-link litbx" data-group="gallery"> </a>
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
                        <a class="hoverlay-link example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set"></a>
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
            </div>
   </figure>
    <div class="apif-fig-content">
            <div class="ap-insta-popup-likecomment clearfix">
               <?php
                 include(APIF_INST_PATH.'inc/frontend/common/comments.php'); 
                ?>
               <div class="apif-social-icons-sharewrap">
              <?php if($social_share_enable){?>
                  <div class="apif-share-wrapper">
                   <div class="apif-share-wrap">
                    <div class="apifeeds-social-icon-wrap">
                      <?php if($facebook_icon){ ?>
                      <a rel="nofollow" title="Share on Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link;?>">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <?php } ?>
                    <?php if($twiter_icon){ ?>
                    <a rel="nofollow" title="Tweet on Twitter" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo strip_tags(substr($captiontext, 0, 20)); ?>&url=<?php echo $link;?>">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <?php } ?>
                    <?php if($google_plus_icon){ ?>
                    <a rel="nofollow" title="Share on Google Plus" target="_blank" href="https://plus.google.com/share?url=<?php echo $link;?>">
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                    </a>
                    <?php }?>
                    <?php if($pinterest_icon){ ?>
                    <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                    </a>
                    <?php } ?>
                </div>
            </div>
            </div>
            <?php } ?>
               </div>
            </div>
      <?php if($hide_post_time  != 1){ ?>
            <div class="apif-image-caption">
            <div class="apif-caption-text clearfix">
              <?php
                $reg_exUrl = "/(http|https|ftp|ftps|www|www.)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                $text = $captiontext;
                $text = str_replace( " www. ", "http://www.", $text );
                $text = str_replace( " Www. ", "http://www.", $text );
                if(preg_match($reg_exUrl, $text, $url)) {
                }
                 $text = $this->html_cut($text,$captionlimit);
                 $text = str_replace('#', ' #', $text);
                 echo $text;
                ?>
            </div>
            </div>
   <?php } ?>
        </div>
  </div>
</div>
    <?php
  }
    endforeach;
} ?>
</div>
<style>
    .apif-owl-demo.owl-carousel .owl-nav .owl-prev, .apif-owl-demo.owl-carousel .owl-nav .owl-next{ background: <?php if(isset($slider_layout_show_next_previous_color)){ echo $slider_layout_show_next_previous_color; }else{ echo '#722611'; } ?> !important; }
</style>
<script type="text/javascript">
jQuery(document).ready( function($) {
    $('.apif-owl-demo').each(function(){
        var widdth = $(this).find('.apif-owl-silder').width();
       if(widdth <= 350){
        $(this).find('.apif-owl-silder').addClass('apif-small-size-display');
       }else{
         $(this).find('.apif-owl-silder').removeClass('apif-small-size-display');
       }
    });
  });
</script>
<?php
wp_enqueue_style('apif-bx-slider');
wp_enqueue_script('apif-bxslider-core');
wp_enqueue_style( 'owl-theme' );
wp_enqueue_style( 'owl-carousel' );
wp_enqueue_script('apif-owl-carousel-js');
wp_enqueue_script('apif-jcarousel-core');
wp_enqueue_script('apif-jcarousel-skeleton');
wp_enqueue_script('apif-jcarousel-control');
wp_enqueue_script('apif-jcarousel-autoscroll');
$dependencies = array('jquery', 'apif-bxslider-core','apif-owl-carousel-js', 'apif-jcarousel-core', 'apif-jcarousel-skeleton', 'apif-jcarousel-control', 'apif-jcarousel-autoscroll');
array_merge($dependencies, $join_js_array);
wp_enqueue_script('apif-frontend-js', $dependencies);
wp_localize_script( 'apif-frontend-js', 'frontend_owl_carousel_object', 
    array(
        'owl_carousel_enable' => 'true',
        'count' => $desktop_column,
        'large_desktop_column' => $large_desktop_column,
        'tablet_count' => $tablet_column,
        'mobile_count' => $mobile_column,
        'next_text' =>$next_text,
        'previous_text' => $previous_text,
        'autoplay' => $autoplay,
        'controls' => $controls,
        'pager' => $pager,
        'autoplay_speed' => $autoplay_speed,
        'controls_type' => $controls_type,
        'margin' => 0,
        'layout' => 'postcarousel'
) );