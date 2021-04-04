<?php
$join_js_array = array();
$generated_random_no = rand(9999, 999999);
?>
<section id="main" class="thumb-view">
    <div class="ap_feeds ap_commond_div_for_pretty_photo_lightbox row masonry for-mosaic isotope ifgrid" data-feed-mosiacid='<?php echo $generated_random_no; ?>'>
        <?php
        $i = 1;
        $j = 0;

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
        $carousel_array  = array();
        $carousel_arr  = array();
        $carousel_arr = array();
        $data_profile_image = IF_Pro_Class::get_Profile_Image($items_array); 
        $check = 1;
foreach ($items_array as $vm):    
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
      if ($count == $j) {
          break;
      }
      $j++;
  $img = $vm['images']['standard_resolution']['url'];
  $width = $vm['images']['standard_resolution']['width'];
  $lowwidth = $vm['images']['low_resolution']['width'];
  $thumbwidth = $vm['images']['thumbnail']['width'];
  $height = $vm['images']['standard_resolution']['height'];
  $lowheight = $vm['images']['low_resolution']['height'];
  $thumbheight = $vm['images']['thumbnail']['height'];
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
        $url = (isset($value['images']['standard_resolution']['url']) && $value['images']['standard_resolution']['url'] != '')?esc_url($value['images']['standard_resolution']['url']):'';
        $width = (isset($value['images']['standard_resolution']['width']) && $value['images']['standard_resolution']['width'] != '')?intval($value['images']['standard_resolution']['width']):'';
        $height = (isset($value['images']['standard_resolution']['height']) && $value['images']['standard_resolution']['height'] != '')?intval($value['images']['standard_resolution']['height']):'';
        $arr = array(
            'type' => $type,
            'url' => $url,
            'width' => $width,
            'height' => $height
            );
        $carousel_array[] =  $arr;
    }
    $carousel = serialize($carousel_array);
}
}
if(empty($carousel_arr)){
   $carousel_arr = '';
}
?>
<?php
if ($i <= 2 || $i == 6 || $i == 7) {
    $masonary_class = 'grid-small';
    $image_url = APIF_IMAGE_DIR . '/image-square.png';
    $image = $vm['images']['low_resolution']['url'];
} elseif ($i == 4 || $i == 5 ) {
    $masonary_class = 'grid-medium';
    $image_url = APIF_IMAGE_DIR . '/image-rect.png';
    $image = $vm['images']['standard_resolution']['url'];
} elseif ($i == 3) {
    $masonary_class = 'grid-large';
    $image_url = APIF_IMAGE_DIR . '/image-square.png';
    $image = $vm['images']['standard_resolution']['url'];
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
    <div class="masonry_elem columns apif-masonry-box isotope-item element-itemif <?php echo esc_attr($masonary_class); ?>" >
        <div class="thumb-elem large-mosaic-elem small-mosaic-elem  hovermove large-mosaic-elem">
            <header class="thumb-elem-header">

                <div class="featimg">
                    <?php if(isset($apif_settings['enable_lightbox'])){
                        if($apif_settings['lightbox_layout'] == 'preety_photo'){
                            $join_js_array[] = 'apif-prettyphoto-lightbox-core-js';
                            wp_enqueue_script('apif-prettyphoto-lightbox-core-js');
                            wp_enqueue_style('apif-prettyphoto-lightbox');

                            if($vm['type'] == 'video'){
                                $video_link = $vm['videos']['low_bandwidth']['url'];
                                ?>
                                <a href='#inline-1-<?php echo $vm['created_time']; ?>'  rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo strip_tags(substr($captiontext, 0, 20)); ?>" width='420' height='300' ></a>
                                <div id="inline-1-<?php echo $vm['created_time']; ?>" style="display:none;">
                                 <video controls>
                                  <source src="<?php echo $video_link; ?>" type="video/mp4">
                                      Your browser does not support the video tag.
                                  </video>
                              </div>
                              <?php
                          }else{
                            ?>
                            <a href='<?php echo esc_url($image); ?>'  rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo strip_tags(substr($captiontext, 0, 20)); ?>" >
                                <img class="the-thumb" src="<?php echo esc_url($image); ?>">
                                <img class="transparent-image" src="<?php echo esc_url($image_url); ?>">
                            </a>
                            <?php
                        }

                    }elseif ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { 
                        $join_js_array[] = 'apif-litbx-core';
                        wp_enqueue_script('apif-litbx-core');
                        wp_enqueue_style('apif-litbx-lightbox');
                        ?>
                        <a href='<?php echo esc_url($image); ?>' class="litbx" data-group="gallery">
                            <img class="the-thumb" src="<?php echo esc_url($image); ?>">
                            <img class="transparent-image" src="<?php echo esc_url($image_url); ?>">
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
                            <a href='<?php echo esc_url($video_link); ?>?swipeboxVideo=1' class="apif-swipebox" title='<?php echo strip_tags(substr($captiontext, 0, 20)); ?>'>
                                <img class="the-thumb" src="<?php echo esc_url($image); ?>">
                                <img class="transparent-image" src="<?php echo esc_url($image_url); ?>">
                            </a>
                            <?php }else { ?>
                            <a href='<?php echo esc_url($image); ?>' class="apif-swipebox" title='<?php echo strip_tags(substr($captiontext, 0, 20)); ?>'>
                                <img class="the-thumb" src="<?php echo esc_url($image); ?>">
                                <img class="transparent-image" src="<?php echo esc_url($image_url); ?>">
                            </a>
                            <?php } ?>
                            <!-- for swipe box ends -->
                            <?php
                        }elseif($apif_settings['lightbox_layout'] == 'classic'){ 
                            $join_js_array[] = 'lightbox-js';
                            wp_enqueue_script('lightbox-js');
                            wp_enqueue_style('lightbox');
                            ?>
                            <a class="example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set">
                                <img class="the-thumb" src="<?php echo esc_url($image); ?>">
                                <img class="transparent-image" src="<?php echo esc_url($image_url); ?>">
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
                                <a class="hoverlay-link apif-venobox" href="#inline-2-<?php echo $vm['created_time']; ?>" data-type="inline" title='<?php echo strip_tags(substr($captiontext, 0, 20)); ?>' data-gall="apif-Gallery" ></a>
                                <div id="inline-2-<?php echo $vm['created_time']; ?>" style="display:none; background:#fff; width:100%; height:100%; float:left; padding:10px;">
                                 <video controls>
                                  <source src="<?php echo $video_link; ?>" type="video/mp4">
                                      Your browser does not support the video tag.
                                  </video> 
                              </div>
                              <?php }else{
                                $image_link = $image; ?>
                                <a class="example-image-link apif-venobox" href="<?php echo $image_link; ?>" title='<?php echo strip_tags(substr($captiontext, 0, 20)); ?>' data-gall="apif-Gallery" >
                                    <img class="the-thumb" src="<?php echo esc_url($image); ?>">
                                    <img class="transparent-image" src="<?php echo esc_url($image_url); ?>">
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
                                <a class="example-image-link apif-own-lightbox" href="javascript:void(0);"
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
                                <img class="the-thumb" src="<?php echo esc_url($image); ?>">
                                <img class="transparent-image" src="<?php echo esc_url($image_url); ?>">
                            </a>
                            <div class="apif-hidden" style="display: none;">
                              <?php echo $captiontext;?>
                          </div>
                          <textarea class="apif-hidden-carousel" style="display: none;"><?php echo $carousel_arr;?></textarea>
                          <?php  }
                      }else{ ?>
                      <a class="example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set">
                        <img class="the-thumb" src="<?php echo esc_url($image); ?>">
                        <img class="transparent-image" src="<?php echo esc_url($image_url); ?>">
                    </a>
                    <?php  } ?>

                </div>

                <?php if(isset($instagram_image_link)){ ?>
                <a href="<?php echo $link; ?>" target="_blank" class="image-hover">
                    <span class="follow"><?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?></span>
                    <span class="follow_icon">
                        <img src="<?php echo $flow_icon; ?>"/>
                    </span>
                </a>
                <?php } ?>
            </header>
            <!-- Image like cound section start -->
            <span class="instagram_like_count">
                <?php if(isset($instagram_user_link)){  
                  include(APIF_INST_PATH.'inc/frontend/common/profile-image.php');
              } ?>
              <?php
              if(isset($instagram_user_username)){ ?>
                <div class="apif-user-name">
                    <?php echo $html_profile_userlink; ?> 
                </div>
                <?php
            } ?>
            <div class="instagram_imge_like">
                <?php if ($image_like == '1') : ?>
                    <div class="ap-instagram_like_count">
                        <span class="insta like_image">
                            <i class="fa fa-heart fa-2x"></i>
                        </span>
                        <span class="count"><?php echo $likes = $vm['likes']['count']; ?></span>
                    </div>
                <?php endif; ?>
                <?php if(isset($comment_count) && $comment_count == '1'): ?>
                    <div class="ap_insta_comment_count">
                        <span class='insta comment_count'>
                            <i class='fa fa-comment fa-2x'></i>
                        </span>
                        <?php
                        $count = $vm['comments']['count'];
                        $format = $counter_type_options;
                        $comments_count = IF_Pro_Class:: get_formatted_count($count, $format);
                        ?>
                        <span class='ap_insta_count'><?php echo $comments_count; ?></span>
                    </div>
                <?php endif; ?>
            </div>
        </span>
        <!-- Image like cound section end -->
    </div>
</div>
<?php
$i++;
}
endforeach;
}
?>
</div>
</section>
<?php /* <div class='ap_pagination clearfix'>
<a href="javascript:void(0);" class="load-more-button apif-load-more-button load-more-button-mosaic apif-id-43" data-pagination-link="#" data-id="43" data-feedtype="any_user_timeline" data-layout-name="mosaic" data-sort-by="likes" data-random-num="652708" data-index-num-last="15" data-page-number="1" data-total-page="2" data-lighbox-layout="apif_own_lightbox" data-total-column="5" data-hoveranimation="apif-img-jolly">View More </a>
<div id='ap_wait_loader-masonry_layout' class='ap_wait_loader' style='display:none;'>
 <img src='<?php echo APIF_IMAGE_DIR."/loaders/loader7.gif"; ?>' alt='Loading' />
</div>
</div> */?>
<?php
wp_enqueue_script('apif-isotope-pkgd-min-js');
wp_enqueue_script('apif-imagesloaded-min-js');
wp_enqueue_script('wow-animation');
wp_enqueue_style('apif-bx-slider');
wp_enqueue_script('apif-bxslider-core');
?>
<script>
    jQuery(document).ready( function($) {
        apif_init_masonry();
        function apif_init_masonry(){
            var masonary_obj = [];
            $('.ap_feeds').each(function () {
       //   new WOW().init();
       var $selector = $(this);
       var masonary_id = $(this).data('feed-mosiacid');
       masonary_obj[masonary_id] = $selector.imagesLoaded(function () {
          masonary_obj[masonary_id].isotope({
              itemSelector: '.apif-masonry-box',
              percentPosition: true,
              masonry: {
                      // use element for option
                      columnWidth: '.apif-masonry-box',
                      // horizontalOrder: true
                  }
              });
      });
   });
        }

    });

</script>
<?php 
$dependencies = array('jquery', 'apif-isotope-pkgd-min-js', 'apif-imagesloaded-min-js', 'wow-animation','apif-bxslider-core');
array_merge($dependencies, $join_js_array);
wp_enqueue_script('apif-frontend-js', '', $dependencies);