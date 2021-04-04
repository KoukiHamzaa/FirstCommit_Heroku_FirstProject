<?php
//custom slider pro layout
$join_js_array = array();
$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
$facebook_icon = (isset($apif_settings['social_share']['facebook_icon']) && $apif_settings['social_share']['facebook_icon'] == 1)?1:0;
$twiter_icon = (isset($apif_settings['social_share']['twiter_icon']) && $apif_settings['social_share']['twiter_icon'] == 1)?1:0;
$google_plus_icon = (isset($apif_settings['social_share']['google_plus_icon']) && $apif_settings['social_share']['google_plus_icon'] == 1)?1:0;
$pinterest_icon = (isset($apif_settings['social_share']['pinterest_icon']) && $apif_settings['social_share']['pinterest_icon'] == 1)?1:0;1
?>
<section id="apif-shortcode-wrapper" class="apif-unique-<?php echo $if_id;?>">
    <div  class='ap_slider_wrapper ap_commond_div_for_pretty_photo_lightbox apif-slider-4-view apif-large apif-unique-<?php echo $if_id;?>'>
        <div class="ap_sliders" id="ins-container">
            <?php
            if(isset($ins_media['meta']['error_message'])){
                ?>
                <h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1>
                <?php
		         }else if (is_array($ins_media['data']) || is_object($ins_media['data'])) { 
		        
		      $carousel_arr = array();
              $data_profile_image = IF_Pro_Class::get_Profile_Image($ins_media['data']);  
              ?>
            <div class="apif-slider-pro">
                <div class='sp-slides'>
                    <?php
                    $index_counter = 0;
                  //  $this->displayArr($ins_media['data']);
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
                    $permalink = (isset($vm['permalink']) && $vm['permalink'] != '')?esc_url($vm['permalink']):'';
                    $img = $vm['images']['standard_resolution']['url'];
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
$image = IF_Pro_Class::check_ifexist_image($image,$image_size,$permalink);
//if($imageinfo){ 
?>
<div class="sp-slide">
    <div class='apif-left-pro-slide-content'> 
       <div class="apif-hidden" style="display: none;">
        <?php echo $captiontext;?>
    </div>
    <textarea class="apif-hidden-carousel" style="display: none;"><?php echo $carousel_arr;?></textarea> 
    <div class='profile-user-wrap'>
        <?php if(isset($instagram_user_link)){ ?>
        
        <div class='profile-image'>
            <img src='<?php echo $data_profile_image; ?>' width='150px' alt='<?php echo $vm['user']['username']; ?>'/>
        </div>
        <?php } 
        if(isset($instagram_user_username)){ 
            ?>
            <div class="sp-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>>
                <?php echo $html_profile_userlink; ?> 
            </div>
            <?php } ?>
        </div>

        <div class="apif-s4-content">

            <?php if(($image_likes_count == '1') || ($image_comments_count =='1')){ ?>

            <p class="apif-comlike">

             <?php if ($image_likes_count == '1') : ?>
                <span class="ap_insta_like_count">
                 <span class="ap-insta like_image">
                    <i class="fa fa-heart"></i>
                </span>
                <?php 
                $count = $vm['likes']['count'];
                $format = $counter_type_options;
                $likes_count = IF_Pro_Class:: get_formatted_count($count, $format);
                echo $likes_count; ?>
            </span>
        <?php endif; ?>


        <span class="apif-left-space">
            <?php if($image_comments_count == '1'): ?>
                <span class='ap_insta_comment_count_wrapper'>
                 <span class="ap-insta like_image">
                    <i class="fa fa-comment"></i>
                </span>

                <?php
                $count = $vm['comments']['count'];
                $format = $counter_type_options;
                $comments_count = IF_Pro_Class:: get_formatted_count($count, $format);
                echo $comments_count;
                endif; ?>
            </span>
        </span>


    </p>


    <?php if(isset($slider_layout_4_show_time_ago)){ ?>
    <p class="posted-time">
       <span> <i class="fa fa-clock-o" aria-hidden="true"></i> </span>
       <?php
       $oldTime = $vm['created_time'];
       echo $insta->xTimeAgo($oldTime);
       ?>
   </p>
   
   <?php } ?>
   <?php } ?>
   <?php if(isset($slider_layout_4_show_image_caption) && isset($vm['caption']['text']) && $vm['caption']['text'] != ''){  ?>
   <div class="apif-caption-warp">
    <p class="apif-posted-info">
       <?php
                               /* $text = $captiontext;
                                $length = 400;
                                $caption = $this->trim_word($text, $length, $startPoint=0);
                                echo $caption; */
                                $reg_exUrl = "/(http|https|ftp|ftps|www|www.)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                                $text = $captiontext;
                                $text = str_replace( " www. ", "http://www.", $text );
                                $text = str_replace( " Www. ", "http://www.", $text );
                                $text = $this->html_cut($text, 400);
                                $text = str_replace('#', ' #', $text);
                                echo $text;
                                ?>                           
                            </p>
                        </div>
                        <?php } ?>
                        
                        <?php include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); ?>

                    </div>
                </div>
                
                <div class='sp-image-container'>

                    <?php if(isset($apif_settings['enable_lightbox'])){
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
                            <a href='<?php echo esc_url($image); ?>' class="hoverlay-link litbx" data-group="gallery"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($vm['caption']['text'], 0, 12)); ?>' /></a>
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
                            <a class="hoverlay-link example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($vm['caption']['text'], 0, 12)); ?>' /></a>
                            <?php
                        }elseif($apif_settings['lightbox_layout'] == 'venobox_lightbox'){ 
                            $join_js_array[] = 'apif-venobox-core';
                            wp_enqueue_script('apif-venobox-core');
                            wp_enqueue_style('apif-venobox-lightbox');
                            include(APIF_INST_PATH.'inc/frontend/lightbox/venobox.php');
                        }else if($apif_settings['lightbox_layout'] == 'apif_own_lightbox'){ 
                            $data_source_type = $vm['type'];
                            if($vm['type'] == 'video'){
                                $data_source_url = $vm['videos']['low_bandwidth']['url'];
                            }else {
                                $data_source_url = $image;
                            }

                            $data_username = $vm['user']['username'];
                            
                            $data_image_caption =$vm['caption']['text'];
                            $likes_count = $vm['likes']['count'];
                            $format = $counter_type_options;
                            $likes_count = IF_Pro_Class:: get_formatted_count($likes_count, $format); 
                            
                            $comments_count = $vm['comments']['count'];
                            $format = $counter_type_options;
                            $comments_count = IF_Pro_Class:: get_formatted_count($comments_count, $format);
                            
                            $timestamp = $vm['created_time'];
                            $posted_ago = $insta->xTimeAgo($timestamp);

                            $instagram_link = $vm['link'];

                            $data_id = $vm['created_time'];
                            $if_id =  $attr['id'];
                            $comments_show = (isset($apif_settings['enable_comments']) && $apif_settings['enable_comments'] == 1)?1:0;
                            ?>
                            <a class="hoverlay-link apif-own-lightbox" title='<?php echo esc_attr(substr($captiontext,0,20)); ?>' data-gall="apif-Gallery"  href="javascript:void(0);"
                                data-index = '<?php echo esc_attr($index_id); ?>'
                                data-id = '<?php echo esc_attr($if_id); ?>'
                                data-index-id = '<?php echo $index_id; ?>-<?php echo $if_id; ?>'
                                data-source-type= '<?php echo esc_attr($data_source_type); ?>'
                                data-source-url ='<?php echo esc_url($data_source_url); ?>'
                                data-profile-image = '<?php echo esc_url($data_profile_image); ?>'
                                data-username = '<?php echo esc_attr($data_username); ?>'
                                
                                data-likes = '<?php echo esc_attr($likes_count); ?>'
                                data-comments = '<?php echo esc_attr($comments_count); ?>'
                                data-posted-ago = '<?php echo esc_attr($posted_ago); ?>'
                                data-instagram-link='<?php echo esc_url($instagram_link); ?>'
                                data-feedid="<?php echo $feed_id;?>" 
                                data-link="<?php echo $link;?>" 
                                data-feedtype="<?php echo $feed_type;?>"
                                data-showcomment="<?php echo $comments_show;?>"
                                ><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" title="#<?php echo $vm['created_time']; ?>" alt='<?php echo esc_attr(substr($vm['caption']['text'], 0, 12)); ?>'/></a>
                                
                                <?php  
                            }
                        }else{ ?> 
                        <a href="<?php echo esc_url($image); ?>" title='<?php echo esc_attr(substr($vm['caption']['text'], 0, 12)); ?>' data-gall="apif-Gallery"><img class="sp-image" src="<?php echo esc_url($image); ?>" data-src="<?php echo esc_url($image); ?>" data-retina="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($vm['caption']['text'], 0, 12)); ?>' /></a>
                        <?php } ?>
                        
                    </div>
                </div>
                <?php
            //}
          }
            endforeach;
            ?>
        </div>
        <div class="sp-thumbnails">
         <?php foreach ($ins_media['data'] as $vm):
         	$permalink = $vm['permalink'];
         	$image1 = $vm['images']['thumbnail']['url'];
         	$image = IF_Pro_Class::check_ifexist_image($image1,'thumbnail',$permalink);
       ?>
        <div class="sp-thumbnail">
            <img src='<?php echo esc_url($image); ?>' width='150px' alt='<?php echo esc_attr(substr($vm['caption']['text'], 0, 12)); ?>' />
            </div>
            <?php 
            endforeach; ?>
        </div>
    </div>
    <?php } ?>
</div>
</div>
</section>

<script type="text/javascript">
// wow and animate css effect
// Masonry Setting for instagram
jQuery(document).ready( function($) {
    $( '.apif-slider-pro' ).sliderPro({
        width: 960,
        height: 500,
        arrows: true,
        buttons: false,
        waitForLayers: true,
        thumbnailWidth: 150,
        thumbnailHeight: 100,
        thumbnailPointer: false,
        autoplay: true,
        autoScaleLayers: false,
        breakpoints: {
            500: {
                thumbnailWidth: 120,
                thumbnailHeight: 50
            }
        }
    });
});

</script>
<style type="text/css">
    <?php if($hover_image_comment_color != ''){ ?> 
        .apif-unique-<?php echo $if_id;?> .apif-slider-4-view .apif-slider-pro .apif-comlike .ap_insta_comment_count_wrapper,
        .apif-unique-<?php echo $if_id;?> .apif-slider-4-view .apif-slider-pro .apif-comlike .ap_insta_comment_count_wrapper .ap-insta i,
        {
            color: <?php echo $hover_image_comment_color;?>;
        }
        <?php } ?>
        <?php if($hover_image_likes_color != ''){ ?> 
            .apif-unique-<?php echo $if_id;?> .apif-slider-4-view .apif-slider-pro .apif-comlike .ap_insta_like_count .ap-insta i,
            .apif-unique-<?php echo $if_id;?> .apif-slider-4-view .apif-slider-pro .apif-comlike .ap_insta_like_count{
                color: <?php echo $hover_image_likes_color;?>;
            }
            <?php } ?>
            .sp-next-arrow::after, .sp-next-arrow::before, .sp-previous-arrow::after, .sp-previous-arrow::before{ background-color: <?php if(isset($slider_layout_4_navigation_color)){ echo $slider_layout_4_navigation_color; }else{ echo "#FF0000"; } ?> !important; }
            .sp-bottom-thumbnails.sp-has-pointer .sp-selected-thumbnail:before { border-bottom: 5px solid <?php if(isset($slider_layout_4_navigation_color)){ echo $slider_layout_4_navigation_color; }else{ echo "#FF0000"; } ?> !important; }
        </style>

        <?php
        wp_enqueue_style('apif-sliderpro');
        wp_enqueue_script('apif-sliderpro-core');
        wp_enqueue_style('apif-bx-slider');
        wp_enqueue_script('apif-bxslider-core');
        $dependencies = array('jquery', 'apif-sliderpro-core','apif-bxslider-core');
        array_merge($dependencies, $join_js_array);
        wp_enqueue_script('apif-frontend-js', $dependencies);
// wp_localize_script( 'apif-frontend-js', 'frontend_owl_carousel_object', array('owl_carousel_enable' => 'true') );
        ?>