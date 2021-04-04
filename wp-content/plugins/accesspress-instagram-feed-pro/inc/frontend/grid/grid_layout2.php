<?php
$totalcolumn = 4;
$generated_random_no = rand(9999, 999999);
$join_js_array = array();
$detect = new apif_Mobile_Detect;
$column_option = (isset($apif_settings['grid_layout3']['columns']) && !empty($apif_settings['grid_layout3']['columns']))?$apif_settings['grid_layout3']['columns']:array();
$grid_layout3_animate = (isset($apif_settings['grid_layout3_animate_css_effect']) && !empty($apif_settings['grid_layout3_animate_css_effect']))?'wow '.$apif_settings['grid_layout3_animate_css_effect']:'';
$layout_enable = "grid_layout2"; 
$layout_class = "ap-feeds-grid-layout2";
$total_page = 0;
$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
$facebook_icon = (isset($apif_settings['social_share']['facebook_icon']) && $apif_settings['social_share']['facebook_icon'] == 1)?1:0;
$twiter_icon = (isset($apif_settings['social_share']['twiter_icon']) && $apif_settings['social_share']['twiter_icon'] == 1)?1:0;
$google_plus_icon = (isset($apif_settings['social_share']['google_plus_icon']) && $apif_settings['social_share']['google_plus_icon'] == 1)?1:0;
$pinterest_icon = (isset($apif_settings['social_share']['pinterest_icon']) && $apif_settings['social_share']['pinterest_icon'] == 1)?1:0;

$comments_show = (isset($apif_settings['enable_comments']) && $apif_settings['enable_comments'] == 1)?1:0;
?>
<div class='apif-wrapper clearfix'>
  <section class="ap-shortcode-wrapper apif-grid-view apif-isotope-wrapper">
   <div class='ap_feed_wrapper'>
    <div class="ap_feeds ap_commond_div_for_pretty_photo_lightbox <?php echo $layout_class;?> apif-unique-<?php echo $if_id;?>" data-feed-id='<?php echo $generated_random_no; ?>' data-layouttype="grid">
      <?php
     // echo "<pre>";print_r($ins_media['data']);
      if(isset($ins_media['meta']['error_message'])){ ?>
      <h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1>
      <?php }else if (is_array($ins_media['data']) || is_object($ins_media['data'])) {
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

if(isset($items_array) && !empty($items_array)):

  $data_profile_image = IF_Pro_Class::get_Profile_Image($items_array);

  foreach ($items_array as $vm):
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
  $lightbox_image = '';
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

$image_url = APIF_IMAGE_DIR . '/image-square.png';
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
  ?>
<div class="ap-self-user-feed apif-masonry-box apif-col-4 apif-large-desktop-col-4 <?php echo $grid_layout3_animate; ?>" >
  <ul class="clearfix">
   <li>
    <figure>
      <div class="apif-featimg">
        <a class="example-image-link" href="#" style="background-image: url(<?php echo esc_url($image); ?>);"></a>
        <?php
        if(isset($apif_settings['enable_lightbox'])){?>
        <span class="apif-lightbox-popup">
          <?php
          if($apif_settings['lightbox_layout'] == 'preety_photo'){
            $lightbox_type = "normalload";
            $join_js_array[] = 'apif-prettyphoto-lightbox-core-js';
            wp_enqueue_script('apif-prettyphoto-lightbox-core-js');
            wp_enqueue_style('apif-prettyphoto-lightbox');
            include(APIF_INST_PATH.'inc/frontend/lightbox/prettyphoto.php');
          }elseif ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { 

            $join_js_array[] = 'apif-litbx-core';
            wp_enqueue_script('apif-litbx-core');
            wp_enqueue_style('apif-litbx-lightbox');
            ?>
            <a href='<?php echo esc_url($image); ?>' class="hoverlay-link litbx" data-group="gallery"><i class="fa fa-search"></i></a>
            <?php
          }elseif ($apif_settings['lightbox_layout'] == 'swipe_box'){ 
           $join_js_array[] = 'apif-swipebox-core-js';
           wp_enqueue_script('apif-swipebox-core-js');
           wp_enqueue_style('swipebox-core-style');
           include(APIF_INST_PATH.'inc/frontend/lightbox/swipe_box.php');

         }elseif($apif_settings['lightbox_layout'] == 'classic'){ 
          $join_js_array[] = 'lightbox-js';
          wp_enqueue_script('lightbox-js');
          wp_enqueue_style('lightbox');
          ?>
          <a class="hoverlay-link example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set"><i class="fa fa-search"></i></a>
          <?php
        }elseif($apif_settings['lightbox_layout'] == 'venobox_lightbox'){ 
          $join_js_array[] = 'apif-venobox-core';
          wp_enqueue_script('apif-venobox-core');
          wp_enqueue_style('apif-venobox-lightbox');
          include(APIF_INST_PATH.'inc/frontend/lightbox/venobox.php');
        }else if($apif_settings['lightbox_layout'] == 'apif_own_lightbox'){
         $extra_hover_class = "hoverlay-link";
         include(APIF_INST_PATH.'inc/frontend/lightbox/custom_lightbox.php');
       } ?>
     </span>
     <?php
   }
   ?> 
 </div>
 <div class="apif-overlay-cont-block">
   <?php if(isset($instagram_image_link)){ 
     include(APIF_INST_PATH.'inc/frontend/common/instagram-image-link.php'); 
   } ?>

   <div class="apif-middle-content-wrap"> 
    <div class="apif-inner-content-wrap"> 
      <?php if(isset($instagram_user_link)){ 
       include(APIF_INST_PATH.'inc/frontend/common/profile-image.php');
     }
     ?>
     <?php if(isset($instagram_user_username)){ ?>
     <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>>
      <?php echo $html_profile_userlink; ?>
    </div>
    <?php  } ?>
    <?php 
    include(APIF_INST_PATH.'inc/frontend/common/comments.php');
    ?>
    <div class="apif-caption-warp apif-image-caption" id="apif-scroll-style-4"><?php echo $captiontext;?></div>
    <?php 
    include(APIF_INST_PATH.'inc/frontend/common/social-share.php');
    ?>
  </div>
</div>
</div>
</figure>
</li>
</ul>
</div>
<?php 
//}
}
endforeach;
endif;
} ?>
</div>
</div>
</section>
<?php
if(!empty($ins_media['pagination']) && isset($grid_layout3_load_more_button_enable) && $grid_layout3_load_more_button_enable == 1){ ?>
<div class='ap_pagination <?php if(isset($grid_layout3_load_more_button_position)){ echo $grid_layout3_load_more_button_position; }else{ echo "apif-left";  } ?> clearfix'>
  <a href='javascript:void(0);' class='load-more-button apif-load-more-button load-more-button-<?php echo $layout; ?> apif-id-<?php echo $if_id; ?>'
    data-pagination-link="<?php echo $ins_media['pagination']['next_url']; ?>"
    data-id = "<?php echo $if_id; ?>"
    data-feedtype = "<?php echo esc_attr($feed_type);?>"
    data-layout-name="<?php echo $layout_enable;?>" 
    data-sort-by = '<?php echo isset($apif_settings['sort_by']) ? $apif_settings['sort_by'] : 'date'; ?>' 
    data-random-num = '<?php echo $generated_random_no; ?>'
    data-index-num-last = '<?php echo $apif_settings['image_number']; ?>'
    data-page-number="1"
    data-total-page="<?php echo $total_page; ?>"
    data-lighbox-layout = "<?php echo $apif_settings['lightbox_layout'];?>"
    data-total-column = "<?php echo $totalcolumn;?>"
    data-hoveranimation= ""
    >
    <?php 
    $grid_layout3_load_more_button_text = (isset($grid_layout3_load_more_button_text) && $grid_layout3_load_more_button_text != '')?$grid_layout3_load_more_button_text:__('Load more','accesspress-instagram-feed-pro');
    $grid_layout3_load_more_button_icon = (isset($grid_layout3_load_more_button_icon) && $grid_layout3_load_more_button_icon != '')?$grid_layout3_load_more_button_icon:'';
    echo $grid_layout3_load_more_button_text; 
    ?>
  </a>
  <div id='ap_wait_loader-grid_layout' class='ap_wait_loader' style='display:none;'><img src='<?php echo APIF_IMAGE_DIR."/loaders/loader".$grid_layout3_load_more_button_icon.".gif"; ?>' alt='Loading' /></div>
</div>
<?php } ?>
<style type="text/css">
<?php if($hover_image_comment_color != ''){ ?> 
.apif-unique-<?php echo $if_id;?> .apif-inner-content-wrap .coment-like .ap_insta_comment_count_wrapper{
color: <?php echo $hover_image_comment_color;?>;
}
<?php } ?>
<?php if($hover_image_likes_color != ''){ ?> 
.apif-unique-<?php echo $if_id;?> .apif-inner-content-wrap .coment-like .ap_insta_like_count{
color: <?php echo $hover_image_likes_color;?>;
}
<?php } ?>
<?php if($hover_image_text_hcolor != ''){ ?> 
.apif-unique-<?php echo $if_id;?> .apif-middle-content-wrap .apif-user-name a:hover{
color: <?php echo $hover_image_text_hcolor;?> !important;
}
<?php } ?>
.apif-id-<?php echo $if_id; ?>.load-more-button-<?php echo $layout; ?> {
<?php if(isset($grid_layout3_load_more_button_background_color) && $grid_layout3_load_more_button_background_color != ''){ ?>
background: <?php echo $grid_layout3_load_more_button_background_color; ?>;
<?php ?>
<?php if(isset($grid_layout3_load_more_button_text_color) && $grid_layout3_load_more_button_text_color !=''){ ?> 
  color: <?php echo $grid_layout3_load_more_button_text_color; ?>;
  <?php } ?>
  <?php if(isset($grid_layout3_load_more_button_border_color) && $grid_layout3_load_more_button_border_color !='' ){ ?> 
    border:2px solid <?php echo $grid_layout3_load_more_button_border_color; ?>;
    <?php  } ?>
  }

  .apif-id-<?php echo $if_id; ?>.load-more-button-<?php echo $layout; ?>:hover{ 
    background: <?php  echo $grid_layout3_load_more_button_text_hover_background_color; }else{ echo "#f1f1f1"; } ?>; /* #f1f1f1 grid_layout3_load_more_button_text_hover_background_color */
    <?php if(isset($grid_layout3_load_more_button_hover_text_color) && $grid_layout3_load_more_button_hover_text_color !=''){ ?>
      color: <?php echo $grid_layout3_load_more_button_hover_text_color; ?>;
      <?php } ?>

      <?php if(isset($grid_layout3_load_more_button_hover_border_color) && $grid_layout3_load_more_button_hover_border_color !=''){ ?>
        border:2px solid <?php echo $grid_layout3_load_more_button_hover_border_color; ?>;
        <?php } ?>
      }
</style>
<script type="text/javascript">
      jQuery(document).ready( function($) {
        $('.ap_feeds').each(function(){
          var widdth = $(this).find('.ap-self-user-feed figure').width();
          if(widdth <= 350){
            $(this).find('.ap-self-user-feed').addClass('apif-small-size-display');
          }else{
           $(this).find('.ap-self-user-feed').removeClass('apif-small-size-display');
         }
       });
    });
</script>
</div>
<?php
wp_enqueue_style('animate-style');
wp_enqueue_script('apif-isotope-pkgd-min-js');
wp_enqueue_script('apif-imagesloaded-min-js');
wp_enqueue_script('apif-isotope-packery');
wp_enqueue_script('wow-animation');
wp_enqueue_style('apif-bx-slider');
wp_enqueue_script('apif-bxslider-core');
$dependencies = array('jquery','apif-isotope-pkgd-min-js', 'apif-imagesloaded-min-js', 'wow-animation', 'lightbox-js','apif-bxslider-core','apif-isotope-packery');
array_merge($dependencies, $join_js_array);
wp_enqueue_script('apif-frontend-js', '', $dependencies);