<?php
$totalcolumn = 4;
$generated_random_no = rand(9999, 999999);
$join_js_array = array();
$detect = new apif_Mobile_Detect;
// Any mobile device (phones or tablets).
// Exclude tablets.
if(isset($apif_settings['masonary_layout2'])){
$column_option = $apif_settings['masonary_layout2']['columns'];
if( $detect->isMobile() && !$detect->isTablet() ){
// echo "Mobile Detected";
$masonary_layout2_no_of_columns = isset($column_option['mobile']) ? $column_option['mobile'] : '1'; // "apif-col-1";
}
// Any tablet device.
else if( $detect->isTablet() ){
// echo "Tablet Detected";
$masonary_layout2_no_of_columns = isset($column_option['tablet']) ? $column_option['tablet'] : '3';
}
// any desktop devices
else{
// echo "Desktop detected";
if($shortcode_column != ''){
    $masonary_layout2_no_of_columns = $shortcode_column;
}else{
  $masonary_layout2_no_of_columns = isset($column_option['desktop']) ? $column_option['desktop'] : '3';
}
$totalcolumn = $masonary_layout2_no_of_columns;
}

$masonary_layout2_no_of_columns = "apif-col-$masonary_layout2_no_of_columns";
}else{
$masonary_layout2_no_of_columns = $masonary_layout2_no_of_columns;
}
if($show_share_icon == 1){
$social_share_enable = 1;
}else{
$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
}

$facebook_icon = (isset($apif_settings['social_share']['facebook_icon']) && $apif_settings['social_share']['facebook_icon'] == 1)?1:0;
$twiter_icon = (isset($apif_settings['social_share']['twiter_icon']) && $apif_settings['social_share']['twiter_icon'] == 1)?1:0;
$google_plus_icon = (isset($apif_settings['social_share']['google_plus_icon']) && $apif_settings['social_share']['google_plus_icon'] == 1)?1:0;
$pinterest_icon = (isset($apif_settings['social_share']['pinterest_icon']) && $apif_settings['social_share']['pinterest_icon'] == 1)?1:0;

/*if(isset($attr['hover_animation']) && $attr['hover_animation'] != ''){
 $masonary_layout2_animation_effect = $attr['hover_animation'];
}*/
$m3large_desktop_column = (isset($column_option['largedesktop']) && $column_option['largedesktop'] != '') ? 'apif-large-desktop-col-'.$column_option['largedesktop'] : 'apif-large-desktop-col-4';
?>
<div class='apif-wrapper'>
<section id="apif-shortcode-wrapper" class="apif-masonry-view apif-isotope-wrapper">
<div  class='ap_feed_wrapper'>
    <div class="ap_feeds ap_commond_div_for_pretty_photo_lightbox ap_feeds-masonry_layout <?php echo 'apif-template-'.$layout;?> apif-unique-<?php echo $if_id;?>" id="mas-container" data-feed-id='<?php echo $generated_random_no; ?>'>
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

       $carousel_arr = array();
       $data_profile_image = IF_Pro_Class::get_Profile_Image($items_array);  

       foreach ($items_array as $vm):
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
        <div class="ap-self-user-feed apif-masonry-box <?php if(isset($masonary_layout2_no_of_columns)){ echo $masonary_layout2_no_of_columns; }else{ echo 'apif-col-3'; } ?> <?php echo $m3large_desktop_column;?> <?php if( isset($masonary_layout2_animate_css_effect) && $masonary_layout2_animate_css_effect!='' ){ echo 'wow '.$masonary_layout2_animate_css_effect; } ?> apif-masnry-ui-two apif-masnry-ui-two-<?php echo $if_id; ?>" data-wow-duration="2s">
            <div class="apif-masonry-block" style="border:<?php if(isset($masonary_layout2_border_width)){ echo $masonary_layout2_border_width; }else{ echo '2'; } ?>px solid <?php if(isset($masonary_layout2_border_color)){ echo $masonary_layout2_border_color; }else{ echo '#fd7062'; } ?> !important;">
                <figure>
                    <div class="apif-blue-wrap" style="<?php if(isset($masonary_layout2_background_color)){ echo 'background:'.$masonary_layout2_background_color; } ?>;">
                        <div class="apif-featimg">
                            <div class="apif-view-n-popup">
                                <?php
                                if(isset($apif_settings['enable_lightbox'])){
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
                                        <a href='<?php echo esc_url($image); ?>' class="litbx" data-group="gallery"><i class="fa fa-search"></i></a>
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
                                            <a class="example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set"><i class="fa fa-search"></i></a>
                                            <?php
                                     }elseif($apif_settings['lightbox_layout'] == 'venobox_lightbox'){ 
                                            $join_js_array[] = 'apif-venobox-core';
                                            wp_enqueue_script('apif-venobox-core');
                                            wp_enqueue_style('apif-venobox-lightbox');
                                            include(APIF_INST_PATH.'inc/frontend/lightbox/venobox.php');
                                      }else if($apif_settings['lightbox_layout'] == 'apif_own_lightbox'){
                                            $extra_hover_class = "";
                                            include(APIF_INST_PATH.'inc/frontend/lightbox/custom_lightbox.php');      
                                      }
                                      ?>

                                   <?php if(isset($instagram_image_link)){ ?>
                                     <?php if($vm['type'] == 'video'){ ?>
                                    <a class="apif-ins-video-icon" href="<?php echo $link; ?>" target="_blank" title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>"><i class="fa fa-play-circle-o"></i> </a> </span>
                                     <?php }else if($vm['type'] == 'sidecar' || $vm['type'] == 'carousel'){ //carousel 
                                      ?>
                                       <a class="apif-ins-video-icon apif-carusel-type" href="<?php echo $link; ?>" target="_blank" title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>">
                                        <i class="fa fa-clone"></i> 
                                        </a> 
                                     <?php }else{ ?>
                                         <a class="apif-ins-link" href='<?php echo $link; ?>' target='_blank' title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>"><i class="fa fa-chain"></i></a>
                                     <?php } ?>
                                 <?php  } ?>
                              <?php } ?>
                         </div>
                 <a href="#" class="example-image-link" style="background-image: url(<?php echo esc_url($image); ?>);"></a>
                <div class='apif-image-overlay' style="background: <?php echo $theme_accent_color; ?>;"></div>
                 </div>
                <div class="apif-overlay-cont-block">
                        <div class="apif-post-feeds-wrapper">
                            <div class='ap_posted_ago' style='color:<?php if(isset($masonary_layout2_text_color)){ echo $masonary_layout2_text_color; }else{ echo "#fff"; } ?>;'>
                                <?php
                                $oldTime = $vm['created_time'];
                                echo $insta->xTimeAgo($oldTime);
                                ?>
                            </div>
                            <?php include(APIF_INST_PATH.'inc/frontend/common/social-share-layout1.php'); ?>

                          </div>

                          <div class='apif-image-caption clearfix' style='color:<?php if(isset($masonary_layout2_text_color)){ echo $masonary_layout2_text_color; }else{ echo "#fff"; } ?>;'>
                            <?php #echo esc_attr($vm['caption']['text']); //self:: return_string_80_char( $vm['caption']['text'] ); ?>

                            <?php
                            $reg_exUrl = "/(http|https|ftp|ftps|www|www.)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                            $text = $captiontext;
                            $text = str_replace( " www. ", "http://www.", $text );
                            $text = str_replace( " Www. ", "http://www.", $text );
                            if(preg_match($reg_exUrl, $text, $url)) {
                                                   // make the urls hyper links
                                                  // $text =  preg_replace($reg_exUrl, "<a style='font-size:12px;color:#ad6060' href='{$url[0]}'>{$url[0]}</a>", $text);
                            }
                            // echo strip_tags( substr($text, 0, 400)); 
                              $text = $this->html_cut($text, 400);
                              $text = str_replace('#', ' #', $text);
                              echo $text;
                             ?>
                        </div>
                        <?php
                           $hover_image_text_color =  $masonary_layout2_text_color;
                           include(APIF_INST_PATH.'inc/frontend/common/comments.php'); 
                        ?>

                    </div>
                </div>
            </figure>

            <div class="apif-fig-content">
                <div class="apif-prof-n-name-wrap">
                    <?php if(isset($instagram_user_link)){  include(APIF_INST_PATH.'inc/frontend/common/profile-image.php');  } ?>
                    <?php if(isset($instagram_user_username)){ ?>
                    <div class="apif-user-name" style='color:<?php if(isset($hover_image_text_color)){ echo $hover_image_text_color; } ?>;'><?php echo $html_profile_userlink; ?>  </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
    <?php
  }
    endforeach;
}
?>
</div>
</div>
</section>

<?php if(!empty($ins_media['pagination']) && isset($masonary_layout2_load_more_button_enable) && $masonary_layout2_load_more_button_enable == 1){ ?>
<div class='ap_pagination <?php if(isset($masonary_layout2_load_more_button_position)){ echo $masonary_layout2_load_more_button_position; }else{ echo "apif-left";  } ?> clearfix'>
<a href='javascript:void(0);' class='load-more-button apif-load-more-button load-more-button-<?php echo $layout; ?> apif-id-<?php echo $if_id; ?>'
data-pagination-link="<?php echo $ins_media['pagination']['next_url']; ?>"
data-id="<?php echo $if_id; ?>"
data-layout-name="masonry_layout2"
data-sort-by = '<?php echo isset($apif_settings['sort_by']) ? $apif_settings['sort_by'] : 'date'; ?>' 
data-random-num = '<?php echo $generated_random_no; ?>'
data-index-num-last = '<?php echo $apif_settings['image_number']; ?>'
data-page-number="1"
data-feedtype = "<?php echo esc_attr($feed_type);?>"
data-total-page="<?php echo $total_page; ?>"
data-lighbox-layout = "<?php echo $apif_settings['lightbox_layout'];?>"
data-total-column = "<?php echo $totalcolumn;?>"
data-largedesktopcolumn = "<?php echo $m3large_desktop_column;?>"
data-hoveranimation = ""
>
<?php if(isset($masonary_layout2_load_more_button_text) && $masonary_layout2_load_more_button_text !=''){ echo $masonary_layout2_load_more_button_text; }else{ echo "Load more";  } ?></a>
<div id='ap_wait_loader-masonry_layout2' class='ap_wait_loader' style='display:none;'>
    <?php if(isset($masonary_layout2_load_more_button_icon)){ ?>
    <img src='<?php echo APIF_IMAGE_DIR."/loaders/loader".$masonary_layout2_load_more_button_icon.".gif"; ?>' alt='Loading' />
    <?php }else{ ?>
    <img src='<?php echo APIF_IMAGE_DIR."/loaders/loader7.gif"; ?>' alt='Loading' />
    <?php } ?>
</div>
</div>
<?php } ?>
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
    .apif-masnry-ui-two-<?php echo $if_id; ?> .apif-featimg .apif-view-n-popup a i {
        color: <?php echo $hover_image_text_color; ?>;
        border: 1px solid <?php echo $hover_image_text_color; ?>;
    }
    .apif-masnry-ui-two-<?php echo $if_id; ?> .apif-featimg .apif-view-n-popup i {
        border: 2px solid <?php echo $hover_image_text_color; ?>;
    }
    <?php if(isset($masonary_layout2_background_color) && $masonary_layout2_background_color !='' ){ ?>
        .apif-masnry-ui-two .apif-blue-wrap:after {
            border-top: 20px solid <?php if(isset($masonary_layout2_background_color)){ echo $masonary_layout2_background_color; } ?>;
        }

        <?php  } ?>

        .apif-id-<?php echo $if_id; ?>.load-more-button-<?php echo $layout; ?> {
          background: <?php if(isset($masonary_layout2_load_more_button_background_color) && $masonary_layout2_load_more_button_background_color!=''){ echo $masonary_layout2_load_more_button_background_color; }else{ echo "#000"; } ?>; /* #000; masonary_layout2_load_more_button_background_color */
          color: <?php if(isset($masonary_layout2_load_more_button_text_color) && $masonary_layout2_load_more_button_text_color!=''){ echo $masonary_layout2_load_more_button_text_color; }else{ echo "#f4f4f4"; } ?>;  /* #f4f4f4; masonary_layout2_load_more_button_text_color */
          border:2px solid <?php if(isset($masonary_layout2_load_more_button_border_color) && $masonary_layout2_load_more_button_border_color !=''){ echo $masonary_layout2_load_more_button_border_color; }else{ echo "#000"; } ?>; /* #000 masonary_layout2_load_more_button_border_color */
      }

      .apif-id-<?php echo $if_id; ?>.load-more-button-<?php echo $layout; ?>:hover{ 
        background: <?php if(isset($masonary_layout2_load_more_button_text_hover_background_color) && $masonary_layout2_load_more_button_text_hover_background_color!=''){ echo $masonary_layout2_load_more_button_text_hover_background_color; }else{ echo "#f1f1f1"; } ?>; /* #f1f1f1 masonary_layout2_load_more_button_text_hover_background_color */
        color: <?php if(isset($masonary_layout2_load_more_button_hover_text_color) && $masonary_layout2_load_more_button_hover_text_color!=''){ echo $masonary_layout2_load_more_button_hover_text_color; }else{ echo "#000"; } ?>; /* #000 masonary_layout2_load_more_button_hover_text_color */
        border:2px solid <?php if(isset($masonary_layout2_load_more_button_hover_border_color) && $masonary_layout2_load_more_button_hover_border_color !=''){ echo $masonary_layout2_load_more_button_hover_border_color; }else{ echo "#000"; } ?>; /* #000 masonary_layout2_load_more_button_border_color */
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
$dependencies = array('jquery', 'apif-isotope-pkgd-min-js', 'apif-imagesloaded-min-js', 'wow-animation', 'lightbox-js','apif-bxslider-core','apif-isotope-packery');
array_merge($dependencies, $join_js_array);
wp_enqueue_script('apif-frontend-js', '', $dependencies);
