<?php
$generated_random_no = rand(9999, 999999);
$join_js_array = array();
$detect = new apif_Mobile_Detect;
// Any mobile device (phones or tablets).
// Exclude tablets.
if(isset($apif_settings['round_image_layout'])){
  $column_option = $apif_settings['round_image_layout']['columns'];
  if( $detect->isMobile() && !$detect->isTablet() ){
// echo "Mobile Detected";
$round_image_layout_no_of_columns = isset($column_option['mobile']) ? $column_option['mobile'] : '1'; // "apif-col-1";
}
// Any tablet device.
else if( $detect->isTablet() ){
// echo "Tablet Detected";
  $round_image_layout_no_of_columns = isset($column_option['tablet']) ? $column_option['tablet'] : '3';
}
// any desktop devices
else{
// echo "Desktop detected";
  $round_image_layout_no_of_columns = isset($column_option['desktop']) ? $column_option['desktop'] : $round_image_layout_no_of_columns;
}
if($round_image_layout_no_of_columns == ''){
  $round_image_layout_no_of_columns = 2;
}
$round_image_layout_no_of_columns = "apif-col-$round_image_layout_no_of_columns";
}else{
  $round_image_layout_no_of_columns = $round_image_layout_no_of_columns;
}
$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
$facebook_icon = (isset($apif_settings['social_share']['facebook_icon']) && $apif_settings['social_share']['facebook_icon'] == 1)?1:0;
$twiter_icon = (isset($apif_settings['social_share']['twiter_icon']) && $apif_settings['social_share']['twiter_icon'] == 1)?1:0;
$google_plus_icon = (isset($apif_settings['social_share']['google_plus_icon']) && $apif_settings['social_share']['google_plus_icon'] == 1)?1:0;
$pinterest_icon = (isset($apif_settings['social_share']['pinterest_icon']) && $apif_settings['social_share']['pinterest_icon'] == 1)?1:0;

$rimage_large_desktop_colmn = (isset($column_option['largedesktop']) && $column_option['largedesktop'] != '') ? 'apif-large-desktop-col-'.$column_option['largedesktop'] : 'apif-large-desktop-col-4';
?>
<div class='apif-wrapper'>
  <section id="apif-shortcode-wrapper" class="apif-image-layout-view apif-isotope-wrapper">
    <div  class='ap_feed_wrapper'>
      <div class="ap_feeds ap_commond_div_for_pretty_photo_lightbox ap_feeds-round_image" id="ins-container"  data-feed-id='<?php echo $generated_random_no; ?>'>
        <?php
        if(isset($ins_media['meta']['error_message'])){
          ?>
          <h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1>
          <?php
        }else if (is_array($ins_media['data']) || is_object($ins_media['data'])) {
          $index_counter = 0;
          $per_page = $count;
          if($feed_type == "any_user_timeline" || $feed_type == "hashtag"){
            if ( isset($ins_media[ 'pagination' ][ 'status' ]) && $ins_media[ 'pagination' ][ 'status' ] == 1 ) {
              $total_items = count($ins_media['data']);
              $total_page = $total_items / $per_page;
              if ( $total_items % $per_page != 0 ) {
                $total_page = intval($total_page) + 1;
              }
              $items_array = array_slice($ins_media['data'], 0, $per_page);
            }else {
              $items_array = array_slice($ins_media['data'], 0, $per_page);
            }
            $total_items = count($items_array);

          }else{
            $items_array = $ins_media['data'];
          }

         $data_profile_image = IF_Pro_Class::get_Profile_Image($items_array);  
         $check = 1;
        foreach ( $items_array  as $vm):
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
  <div class="apif-masonry-box apif-round-image-layout <?php if(isset($round_image_layout_no_of_columns)){ echo $round_image_layout_no_of_columns; }else{ echo 'apif-col-5'; } ?>  <?php echo $rimage_large_desktop_colmn;?> <?php if(isset($round_image_layout_animate_css_effect) && $round_image_layout_animate_css_effect !=''){ echo 'wow '.$round_image_layout_animate_css_effect; } ?> " data-wow-duration="2s">
    <div class="apif-round-image-block <?php if(isset($round_image_layout_animation_effect)){ echo $round_image_layout_animation_effect; }else{ echo 'circle-rotateyrs'; } ?> ">
      <div class="img"><img class="img-thumb" src="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($vm['caption']['text'], 0, 20)); ?>'></div>
      <div class="apif-round-img-info" style="border:<?php if(isset($round_image_layout_hover_border_width) && $round_image_layout_hover_border_width !=''){ echo $round_image_layout_hover_border_width; }else{ echo '5'; } ?>px solid <?php if(isset($round_image_layout_hover_border_color) && $round_image_layout_hover_border_color !=''){ echo $round_image_layout_hover_border_color; }else{ echo '#eee'; } ?>;">
        <div class="apif-round-info-main-wrap">
          <div class="apif-user-info-wrapper">
            <?php if(isset($instagram_user_link)){ ?>
            <a href='javascript:void(0);'>
              <div class='apif-img-round-p-image'>
                <img src='<?php echo $data_profile_image; ?>' width='150px' alt='<?php echo $vm['user']['username']; ?>' />
              </div>
            </a>
            <?php  } ?>
            <?php if(isset($instagram_user_username)){ ?>
            <div class="apif-user-name" style='color:<?php if(isset($hover_image_text_color)){ echo $hover_image_text_color; }else{ echo "#fff"; } ?>;'><?php echo $html_profile_userlink; ?></div>
            <?php  } ?>
          </div>
          <div class="apif-img-round-c-like" style='color:<?php if(isset($hover_image_text_color)){ echo $hover_image_text_color; }else{ echo "#fff"; } ?>;'>
            <?php if ($like_count == '1') : ?>
              <!-- Image like count section start -->
              <span class="apif-count"><i class="fa fa-heart"></i></span>
              <?php

              $count = $vm['likes']['count'];
              $format = $counter_type_options;
              $likes_count = IF_Pro_Class:: get_formatted_count($count, $format); 

              ?>
              <span class="apif-ound-img-count"><?php echo $likes_count; ?></span>
              <!-- Image like count section end -->

            <?php endif; ?>

            <!-- Image comment count section -->
            <?php if($comment_count == '1'): ?>
              <span class='ap_imground_comment_count_wrapper'>
                <p class="ap_imground_comment_count">
                  <span class='imground comment_count'>
                    <i class='fa fa-comment'></i>
                  </span>

                  <?php

                  $count = $vm['comments']['count'];
                  $format = $counter_type_options;
                  $comments_count = IF_Pro_Class:: get_formatted_count($count, $format);

                  ?>
                  <span class='ap_imground_count'><?php echo $comments_count; ?></span>
                </p>
              </span>
            <?php endif; ?>
            <!-- Image comment count section end -->
          </div>
          <!-- instagram image link -->
          <div class="apif-link-section">  
            <?php if(isset($instagram_image_link)){ ?>
            <?php if($vm['type'] == 'video'){ ?>
            <span class="apif-ins-link apif-ins-video-icon">
             <a href="<?php echo $link; ?>" target="_blank" title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>"><i class="fa fa-play-circle-o"></i> </a> 
           </span>
           <?php }else if($vm['type'] == 'sidecar' || $vm['type'] == 'carousel'){ //carousel ?>
           <span class="apif-ins-link apif-ins-video-icon apif-carusel-type"> 
             <a href="<?php echo $link; ?>" target="_blank" title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>">
              <i class="fa fa-clone"></i> 
            </a> 
          </span>
          <?php }else{ ?> 
          <span class="apif-ins-link"> 
            <a href='<?php echo $link; ?>' target='_blank' title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>"><i class="fa fa-camera"></i></a> </span>
            <?php } ?>
            <?php  } ?> 
            <?php
            if(isset($apif_settings['enable_lightbox'])){?>
            <span class="apif-lightbox-popup">
              <?php
              if($apif_settings['lightbox_layout'] == 'preety_photo'){
                $join_js_array[] = 'apif-prettyphoto-lightbox-core-js';
                wp_enqueue_script('apif-prettyphoto-lightbox-core-js');
                wp_enqueue_style('apif-prettyphoto-lightbox');
                if($vm['type'] == 'video'){
                  $video_link = $vm['videos']['low_bandwidth']['url']; ?>
                  <a href='#inline-1-<?php echo $vm['created_time']; ?>'  rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo esc_attr(substr($captiontext,0,12)); ?>" class="apif-round-image-link " >
                   <i class="fa fa-search"></i>
                 </a>
                 <div id="inline-1-<?php echo $vm['created_time']; ?>" style="display:none;">
                   <video controls>
                    <source src="<?php echo $video_link; ?>" type="video/mp4">
                      Your browser does not support the video tag.
                    </video> 
                  </div>
                  <?php
                }else{
                  ?>
                  <a href='<?php echo esc_url($image); ?>' rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo esc_attr(substr($captiontext,0,12)); ?>" class="apif-round-image-link " >
                    <i class="fa fa-search"></i>
                  </a>
                  <?php
                }
              }elseif ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { 
                $join_js_array[] = 'apif-litbx-core';
                wp_enqueue_script('apif-litbx-core');
                wp_enqueue_style('apif-litbx-lightbox');
                ?>
                <a href='<?php echo esc_url($image); ?>' class="apif-round-image-link litbx" data-group="gallery">
                 <i class="fa fa-search"></i>
               </a>
               <?php
             }elseif ($apif_settings['lightbox_layout'] == 'swipe_box'){ 
              $join_js_array[] = 'apif-swipebox-core-js';
              wp_enqueue_script('apif-swipebox-core-js');
              wp_enqueue_style('swipebox-core-style');
              ?>
              <!-- for swipe box -->
              <?php if($vm['type'] == 'video'){
                $video_link = $vm['videos']['low_bandwidth']['url'];
                ?>
                <a href='<?php echo esc_url($video_link); ?>?swipeboxVideo=1' class="apif-round-image-link apif-swipebox" title='<?php echo esc_attr(substr($captiontext,0,12)); ?>'>
                 <i class="fa fa-search"></i>
               </a>
               <?php }else { ?>
               <a href='<?php echo esc_url($image); ?>' class="apif-round-image-link apif-swipebox" title='<?php echo esc_attr(substr($captiontext,0,12)); ?>'>
                 <i class="fa fa-search"></i>
               </a>
               <?php } ?>
               <!-- for swipe box ends -->
               <?php
             }elseif($apif_settings['lightbox_layout'] == 'classic'){ 
              $join_js_array[] = 'lightbox-js';
              wp_enqueue_script('lightbox-js');
              wp_enqueue_style('lightbox');
              ?>
              <a class="apif-round-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set">
                <i class="fa fa-search"></i>
              </a>
              <?php
            }elseif($apif_settings['lightbox_layout'] == 'venobox_lightbox'){ 
              $join_js_array[] = 'apif-venobox-core';
              wp_enqueue_script('apif-venobox-core');
              wp_enqueue_style('apif-venobox-lightbox');
              ?>
              <!-- for venobox -->
              <?php if($vm['type'] == 'video'){ 
                $video_link = $vm['videos']['low_bandwidth']['url'];
                ?>
                <a class="apif-round-image-link apif-venobox" href="#inline-2-<?php echo $vm['created_time']; ?>" data-type="inline" title='<?php echo esc_attr(substr($captiontext,0,12)); ?>' data-gall="apif-Gallery" >
                  <i class="fa fa-search"></i>
                </a>
                <div id="inline-2-<?php echo $vm['created_time']; ?>" style="display:none; background:#fff; width:100%; height:100%; float:left; padding:10px;">
                 <video controls>
                  <source src="<?php echo $video_link; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                  </video> 
                </div>
                <?php }else{
                              // $image_link = $image; ?>
                              <a class="apif-round-image-link apif-venobox" href="<?php echo $image; ?>" title='<?php echo esc_attr(substr($captiontext,0,12)); ?>' data-gall="apif-Gallery" >
                                <i class="fa fa-search"></i>
                              </a>
                              <?php } ?>
                              <!-- for venobox ends -->
                              <?php
                            }else if($apif_settings['lightbox_layout'] == 'apif_own_lightbox'){ 
                              $data_source_type = $vm['type'];
                              if($vm['type'] == 'video'){
                                $data_source_url = $vm['videos']['low_bandwidth']['url'];
                              }else {
                                $data_source_url = $image;
                              }

                              $data_username = $vm['user']['username'];

                            $data_image_caption = $vm['caption']['text']; // IF_Pro_Class:: return_string_80_char($vm['caption']['text']);
                            
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
                            <a class="apif-round-image-link apif-own-lightbox" href="javascript:void(0);"
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
                            >
                            <i class="fa fa-search"></i>
                          </a>
                          <div class="apif-hidden" style="display: none;">
                            <?php echo $captiontext;?>
                          </div>
                          <textarea class="apif-hidden-carousel" style="display: none;"><?php echo $carousel_arr;?></textarea>
                          <?php       } ?>
                        </span>
                        <?php
                      }
                      ?>
                    </div>
                    <?php include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); ?>
                  </div>    
                </div>
              </div>
            </div>
<?php }
   endforeach;
}
?>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    jQuery(document).ready( function($) {
      $('.ap_feeds').each(function(){
        var widdth = $(this).find('.img-thumb').width();
        if(widdth <= 350){
          $(this).find('.apif-masonry-box').addClass('apif-small-size-display');
        }else{
         $(this).find('.apif-masonry-box').removeClass('apif-small-size-display');
       }
     });
    });
  </script>
  <?php if(!empty($ins_media['pagination']) && isset($round_image_layout_load_more_button_enable) && $round_image_layout_load_more_button_enable == 1){ ?>
  <div class='ap_pagination <?php if(isset($round_image_layout_load_more_button_position)){ echo $round_image_layout_load_more_button_position; }else{ echo "apif-left";  } ?> clearfix'>
    <a href='javascript:void(0);' id='loadmore-round_image' class='load-more-button apif-load-more-button load-more-button-<?php echo $layout; ?> apif-id-<?php echo $if_id; ?>'
      data-pagination-link="<?php echo $ins_media['pagination']['next_url']; ?>"
      data-id="<?php echo $if_id; ?>"
      data-layout-name="round_image"
      data-sort-by = '<?php echo isset($apif_settings['sort_by']) ? $apif_settings['sort_by'] : 'date'; ?>' 
      data-random-num = '<?php echo $generated_random_no; ?>'
      data-index-num-last = '<?php echo $apif_settings['image_number']; ?>'
      data-page-number="1"
      data-feedtype = "<?php echo esc_attr($feed_type);?>"
      data-total-page="<?php echo $total_page; ?>"
      data-largedesktopcolumn = "<?php echo $rimage_large_desktop_colmn;?>"
      data-hoveranimation = ""
      data-lighbox-layout = "<?php echo $apif_settings['lightbox_layout'];?>"
      >
      <?php if(isset($round_image_layout_load_more_button_text) && $round_image_layout_load_more_button_text !=''){ echo $round_image_layout_load_more_button_text; }else{ echo "Load more";  } ?></a>

      <div id='ap_wait_loader-round_image' class='ap_wait_loader' style='display:none;'>
        <?php if(isset($round_image_layout_load_more_button_icon)){ ?>
        <img src='<?php echo APIF_IMAGE_DIR."/loaders/loader".$round_image_layout_load_more_button_icon.".gif"; ?>' alt='Loading' />
        <?php }else{ ?>
        <img src='<?php echo APIF_IMAGE_DIR."/loaders/loader7.gif"; ?>' alt='Loading' />
        <?php } ?>
      </div>
    </div>
<?php } ?>
<!-- round image layout load more button css -->
<style type="text/css">
.apif-id-<?php echo $if_id; ?>.load-more-button-<?php echo $layout; ?> {
<?php if(isset($round_image_layout_load_more_button_background_color) && $round_image_layout_load_more_button_background_color != ''){ ?>
  background: <?php echo $round_image_layout_load_more_button_background_color; ?>;
  <?php ?>
  <?php if(isset($round_image_layout_load_more_button_text_color) && $round_image_layout_load_more_button_text_color !=''){ ?> 
    color: <?php echo $round_image_layout_load_more_button_text_color; ?>;
    <?php } ?>
    <?php if(isset($round_image_layout_load_more_button_border_color) && $round_image_layout_load_more_button_border_color !='' ){ ?> 
      border:2px solid <?php echo $round_image_layout_load_more_button_border_color; ?>;
      <?php  } ?>
    }

    .apif-id-<?php echo $if_id; ?>.load-more-button-<?php echo $layout; ?>:hover{ 
      background: <?php  echo $round_image_layout_load_more_button_text_hover_background_color; }else{ echo "#f1f1f1"; } ?>; /* #f1f1f1 grid_layout_load_more_button_text_hover_background_color */
      <?php if(isset($round_image_layout_load_more_button_hover_text_color) && $round_image_layout_load_more_button_hover_text_color !=''){ ?>
        color: <?php echo $round_image_layout_load_more_button_hover_text_color; ?>;
        <?php } ?>

        <?php if(isset($round_image_layout_load_more_button_hover_border_color) && $round_image_layout_load_more_button_hover_border_color !=''){ ?>
          border:2px solid <?php echo $round_image_layout_load_more_button_hover_border_color; ?>;
          <?php } ?>
        }
</style>
<!-- round image layout load more button css -->
</div>
<?php
wp_enqueue_style('animate-style');
wp_enqueue_script('apif-isotope-pkgd-min-js');
wp_enqueue_script('apif-imagesloaded-min-js');
wp_enqueue_script('wow-animation');
wp_enqueue_style('apif-bx-slider');
wp_enqueue_script('apif-bxslider-core');

wp_enqueue_script('apif-isotope-packery');
$dependencies = array('jquery', 'apif-bxslider-core','apif-isotope-pkgd-min-js', 'apif-imagesloaded-min-js', 'wow-animation', 'lightbox-js','apif-isotope-packery');
array_merge($dependencies, $join_js_array);
wp_enqueue_script('apif-frontend-js', '', $dependencies);