<?php 
$totalcolumn = 4;
$generated_random_no = rand(9999, 999999);
$join_js_array = array();
$detect = new apif_Mobile_Detect;
// Any mobile device (phones or tablets).
// Exclude tablets.
if ($layout == 'grid_layout'){
 $layout_class = "ap_feeds-grid_layout";
 $layout_enable = "grid_layout";
 $grid_layout_animate_css_effect = (isset($grid_layout_animate_css_effect) && $grid_layout_animate_css_effect != '')?esc_attr($grid_layout_animate_css_effect):''; 
}else{
 $layout_class = "ap_feeds-grid_layout1";
 $layout_enable = "grid_layout1"; 
$grid_layout_animate_css_effect = (isset($grid_layout1_animate_css_effect) && $grid_layout1_animate_css_effect != '')?esc_attr($grid_layout1_animate_css_effect):''; 
}
$dcolumn_option  = array(
'largedesktop' => 4,
'desktop' => 3,
'tablet' => 3, 
'mobile' => 2
);


if($layout_enable  == "grid_layout"){
if(isset($apif_settings['grid_layout'])){
    $column_option = (isset($apif_settings['grid_layout']['columns']) && !empty($apif_settings['grid_layout']['columns']))?$apif_settings['grid_layout']['columns']:$dcolumn_option;
    if( $detect->isMobile() && !$detect->isTablet() ){
      // echo "Mobile Detected";
      $grid_layout_no_of_columns = isset($column_option['mobile']) ? $column_option['mobile'] : '1'; // "apif-col-1";
    }
    // Any tablet device.
    else if( $detect->isTablet() ){
      // echo "Tablet Detected";
      $grid_layout_no_of_columns =  isset($column_option['tablet']) ? $column_option['tablet'] : '3';
    }
    // any desktop devices
    else{
        // echo "Desktop detected";
          if(isset($shortcode_column) && $shortcode_column != ''){
              $grid_layout_no_of_columns = $shortcode_column;
          }else{
              $grid_layout_no_of_columns = isset($column_option['desktop']) ? $column_option['desktop'] : '5';
          }
          $totalcolumn = $grid_layout_no_of_columns;
      }
      $grid_layout_no_of_columns = "apif-col-$grid_layout_no_of_columns";
  }else{
      $grid_layout_no_of_columns = $grid_layout_no_of_columns;
  }
}else{
   
    if(isset($apif_settings['grid_layout1'])){
    $column_option = $apif_settings['grid_layout1']['columns'];
    if( $detect->isMobile() && !$detect->isTablet() ){
      // echo "Mobile Detected";
      $grid_layout_no_of_columns = isset($column_option['mobile']) ? $column_option['mobile'] : '1'; // "apif-col-1";
    }
    // Any tablet device.
    else if( $detect->isTablet() ){
      // echo "Tablet Detected";
      $grid_layout_no_of_columns =  isset($column_option['tablet']) ? $column_option['tablet'] : '3';
    }
    // any desktop devices
    else{
        // echo "Desktop detected";
        if(isset($shortcode_column) && $shortcode_column != ''){
            $grid_layout_no_of_columns = $shortcode_column;
        }else{
            $grid_layout_no_of_columns = isset($column_option['desktop']) ? $column_option['desktop'] : $grid_layout_no_of_columns;
        }
         $totalcolumn = $grid_layout_no_of_columns;
        
    }
        $grid_layout_no_of_columns = "apif-col-$grid_layout_no_of_columns";
    }else{
        $grid_layout_no_of_columns = $grid_layout_no_of_columns;
    }
}
$total_page = 0;

$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
$facebook_icon = (isset($apif_settings['social_share']['facebook_icon']) && $apif_settings['social_share']['facebook_icon'] == 1)?1:0;
$twiter_icon = (isset($apif_settings['social_share']['twiter_icon']) && $apif_settings['social_share']['twiter_icon'] == 1)?1:0;
$google_plus_icon = (isset($apif_settings['social_share']['google_plus_icon']) && $apif_settings['social_share']['google_plus_icon'] == 1)?1:0;
$pinterest_icon = (isset($apif_settings['social_share']['pinterest_icon']) && $apif_settings['social_share']['pinterest_icon'] == 1)?1:0;
$comments_show = (isset($apif_settings['enable_comments']) && $apif_settings['enable_comments'] == 1)?1:0;
$grid_layout_animation_effect = (isset($grid_layout_animation_effect) && $grid_layout_animation_effect != '')?$grid_layout_animation_effect:'apif-top-to-bottom';
if(isset($attr['hover_animation']) && $attr['hover_animation'] != ''){
 $grid_layout_animation_effect = $attr['hover_animation'];
}else{
  if($layout_enable  == "grid_layout"){
    $grid_layout_animation_effect = $grid_layout_animation_effect;
  }else{
    $grid_layout_animation_effect = $grid_layout1_animation_effect;
  }
}
$large_desktop_column = (isset($column_option['largedesktop']) && $column_option['largedesktop'] != '') ? 'apif-large-desktop-col-'.$column_option['largedesktop'] : 'apif-large-desktop-col-4';
?>
<div class='apif-wrapper clearfix'>
<section class="ap-shortcode-wrapper apif-grid-view apif-isotope-wrapper">
<div class='ap_feed_wrapper'>
<div class="ap_feeds ap_commond_div_for_pretty_photo_lightbox <?php echo $layout_class;?> apif-unique-<?php echo $if_id;?>" data-feed-id='<?php echo $generated_random_no; ?>' data-layouttype="grid">
<?php
if(isset($ins_media['meta']['error_message'])){
    ?>
       <h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1>
    <?php
}else{
   if (is_array($ins_media['data']) || is_object($ins_media['data'])){
    //$this->displayArr($ins_media['data']);
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
   //$this->displayArr($items_array);
    $carousel_array  = array();
    $carousel_arr  = array();

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
  <div class="ap-self-user-feed apif-masonry-box <?php echo 'apif-'.$image_size;?> <?php if(isset($grid_layout_no_of_columns)){ echo $grid_layout_no_of_columns; }else{ echo 'apif-col-4'; } ?> <?php echo $large_desktop_column;?> <?php if(isset($grid_layout_animate_css_effect) && $grid_layout_animate_css_effect !=''){ echo 'wow '.$grid_layout_animate_css_effect.' '; }else{ echo ''; } ?> <?php echo $grid_layout_animation_effect; ?>" >
         <figure>
              <div class="apif-featimg">
                <img src="<?php echo esc_url($image); ?>" style='display: none;'/>
                    <a class="example-image-link" href="#" style="background-image: url(<?php echo esc_url($image); ?>);"></a>
                </div>
                <div class='apif-image-overlay' style="background: <?php echo $theme_accent_color; ?>;"></div>
                <div class="apif-overlay-cont-block">
                      <?php
                        if(isset($apif_settings['enable_lightbox'])){
                            if($apif_settings['lightbox_layout'] == 'preety_photo'){
                                $lightbox_type = "normalload";
                                $join_js_array[] = 'apif-prettyphoto-lightbox-core-js';
                                wp_enqueue_script('apif-prettyphoto-lightbox-core-js');
                                wp_enqueue_style('apif-prettyphoto-lightbox');
                                include(APIF_INST_PATH.'inc/frontend/lightbox/prettyphoto.php');
                            }else if ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { 
                                $join_js_array[] = 'apif-litbx-core';
                                wp_enqueue_script('apif-litbx-core');
                                wp_enqueue_style('apif-litbx-lightbox');
                              ?>
                              <a href='<?php echo esc_url($image); ?>' class="hoverlay-link litbx" data-group="gallery">image link </a>
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
                                <a class="hoverlay-link example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set">image link</a>
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

                    <div class="apif-middle-content-wrapper"> 
                      <div class="apif-inner-content-wrapper"> 
                       <?php 
                        if($grid_layout_animation_effect == "apif-img-creative"){ ?>
                           <div class="apif-creative-wrapper-profile">
                            <?php if(isset($instagram_user_username)){ ?>
                            <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>> 
                              <?php echo $html_profile_userlink; ?> 
                             </div>
                            <?php  } ?>
                            <?php  include(APIF_INST_PATH.'inc/frontend/common/comments.php'); ?>
                            </div>
                            <div class="apif-creative-second-wrapper">
                              <?php if(isset($instagram_user_link)){   include(APIF_INST_PATH.'inc/frontend/common/profile-image.php'); }?>
                               <?php include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); ?>
                            </div>
                        
                         <?php }else if($grid_layout_animation_effect == "apif-img-sweetmarley" || $grid_layout_animation_effect == "apif-img-tender" || $grid_layout_animation_effect == "apif-img-jolly" || $grid_layout_animation_effect == "apif-img-strongapollo" || $grid_layout_animation_effect == "apif-img-darkkiraview"){ 
                             if($grid_layout_animation_effect == "apif-img-tender"){
                               $classanimte = "tender";
                             }else if($grid_layout_animation_effect == "apif-img-jolly"){
                               $classanimte = "jolly";
                             }else if($grid_layout_animation_effect == "apif-img-strongapollo"){
                               $classanimte = "strongapollo";
                             }else if($grid_layout_animation_effect == "apif-img-sweetmarley"){
                               $classanimte = "sweetmarley";
                             }else{
                                $classanimte = "darkkiraview";
                             }
                            ?>
                            <div class="apif-<?php echo $classanimte;?>-wrapper-profile">
                              <?php if(isset($instagram_user_link)){   include(APIF_INST_PATH.'inc/frontend/common/profile-image.php'); }?>
                              <?php if(isset($instagram_user_username)){ ?>
                            <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>> <?php echo $html_profile_userlink; ?> 
                             </div>
                            <?php  } ?>                           
                            </div>
                            <div class="apif-<?php echo $classanimte;?>-second-wrapper">
                               <?php  include(APIF_INST_PATH.'inc/frontend/common/comments.php'); ?>
                               <?php include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); ?>
                            </div>
                         <?php }else{ 

                         if(isset($instagram_user_link)){ 
                          include(APIF_INST_PATH.'inc/frontend/common/profile-image.php');
                          }
                          if(isset($instagram_user_username)){ ?>
                           <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>><?php echo $html_profile_userlink; ?>
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
   
   <?php  }
 endforeach;


   }
}
?>
</div>
</div>
</section>
<?php
if($layout == "grid_layout"){
  $grid_layout_load_more_button_enable = (isset($grid_layout_load_more_button_enable) && $grid_layout_load_more_button_enable == 1)?1:0;
 $grid_layout_load_more_button_text = (isset($grid_layout_load_more_button_text) && $grid_layout_load_more_button_text != '')?$grid_layout_load_more_button_text:'';
 $grid_layout_load_more_button_icon = (isset($grid_layout_load_more_button_icon) && $grid_layout_load_more_button_icon != '')?$grid_layout_load_more_button_icon:'';
 $grid_layout_load_more_button_position = (isset($grid_layout_load_more_button_position) && $grid_layout_load_more_button_position != '')?$grid_layout_load_more_button_position:'';
}else{
  $grid_layout_load_more_button_enable = (isset($grid_layout1_load_more_button_enable) && $grid_layout1_load_more_button_enable == 1)?1:0;
  $grid_layout_load_more_button_text = (isset($grid_layout1_load_more_button_text) && $grid_layout1_load_more_button_text != '')?$grid_layout1_load_more_button_text:'';
  $grid_layout_load_more_button_icon = (isset($grid_layout1_load_more_button_icon) && $grid_layout1_load_more_button_icon != '')?$grid_layout1_load_more_button_icon:'';
  $grid_layout_load_more_button_position = (isset($grid_layout1_load_more_button_position) && $grid_layout1_load_more_button_position != '')?$grid_layout1_load_more_button_position:'apif-left';
}
if(!empty($ins_media['pagination']) && isset($grid_layout_load_more_button_enable) && $grid_layout_load_more_button_enable == 1){ ?>
            <div class='ap_pagination <?php if(isset($grid_layout_load_more_button_position)){ echo $grid_layout_load_more_button_position; }else{ echo "apif-left";  } ?> clearfix'>
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
                    data-largedesktopcolumn = "<?php echo $large_desktop_column;?>"
                    data-hoveranimation = "<?php echo $grid_layout_animation_effect;?>"
                    >
                    <?php 
                    if(isset($grid_layout_load_more_button_text) && $grid_layout_load_more_button_text != ''){ echo $grid_layout_load_more_button_text; }else{ _e('Load more','accesspress-instagram-feed-pro');  } ?>
                </a>
                <div id='ap_wait_loader-grid_layout' class='ap_wait_loader' style='display:none;'><img src='<?php echo APIF_IMAGE_DIR."/loaders/loader".$grid_layout_load_more_button_icon.".gif"; ?>' alt='Loading' /></div>
            </div>
<?php } ?>
<?php 
if($layout == "grid_layout"){ ?>
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
<?php if($hover_image_text_hcolor != ''){ ?> 
.apif-unique-<?php echo $if_id;?> .apif-middle-content-wrapper .apif-user-name a:hover{
color: <?php echo $hover_image_text_hcolor;?> !important;
}
<?php } ?>
.apif-id-<?php echo $if_id; ?>.load-more-button-<?php echo $layout; ?> {
    <?php if(isset($grid_layout_load_more_button_background_color) && $grid_layout_load_more_button_background_color != ''){ ?>
        background: <?php echo $grid_layout_load_more_button_background_color; ?>;
    <?php ?>
    <?php if(isset($grid_layout_load_more_button_text_color) && $grid_layout_load_more_button_text_color !=''){ ?> 
        color: <?php echo $grid_layout_load_more_button_text_color; ?>;
    <?php } ?>
    <?php if(isset($grid_layout_load_more_button_border_color) && $grid_layout_load_more_button_border_color !='' ){ ?> 
        border:2px solid <?php echo $grid_layout_load_more_button_border_color; ?>;
    <?php  } ?>
}
.apif-id-<?php echo $if_id; ?>.load-more-button-<?php echo $layout; ?>:hover{ 
    background: <?php  echo $grid_layout_load_more_button_text_hover_background_color; }else{ echo "#f1f1f1"; } ?>; /* #f1f1f1 grid_layout_load_more_button_text_hover_background_color */
    <?php if(isset($grid_layout_load_more_button_hover_text_color) && $grid_layout_load_more_button_hover_text_color !=''){ ?>
        color: <?php echo $grid_layout_load_more_button_hover_text_color; ?>;
    <?php } ?>

    <?php if(isset($grid_layout_load_more_button_hover_border_color) && $grid_layout_load_more_button_hover_border_color !=''){ ?>
        border:2px solid <?php echo $grid_layout_load_more_button_hover_border_color; ?>;
    <?php } ?>
}
</style>
<?php }else{?>
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
<?php if($hover_image_text_hcolor != ''){ ?> 
.apif-unique-<?php echo $if_id;?> .apif-middle-content-wrapper .apif-user-name a:hover{
color: <?php echo $hover_image_text_hcolor;?> !important;
}
<?php } ?>
.apif-id-<?php echo $if_id; ?>.load-more-button-<?php echo $layout; ?> {
    <?php if(isset($grid_layout1_load_more_button_background_color) && $grid_layout1_load_more_button_background_color != ''){ ?>
        background: <?php echo $grid_layout1_load_more_button_background_color; ?>;
    <?php ?>
    <?php if(isset($grid_layout1_load_more_button_text_color) && $grid_layout1_load_more_button_text_color !=''){ ?> 
        color: <?php echo $grid_layout1_load_more_button_text_color; ?>;
    <?php } ?>
    <?php if(isset($grid_layout1_load_more_button_border_color) && $grid_layout1_load_more_button_border_color !='' ){ ?> 
        border:2px solid <?php echo $grid_layout1_load_more_button_border_color; ?>;
    <?php  } ?>
}

.apif-id-<?php echo $if_id; ?>.load-more-button-<?php echo $layout; ?>:hover{ 
    background: <?php  echo $grid_layout1_load_more_button_text_hover_background_color; }else{ echo "#f1f1f1"; } ?>; /* #f1f1f1 grid_layout_load_more_button_text_hover_background_color */
    <?php if(isset($grid_layout1_load_more_button_hover_text_color) && $grid_layout1_load_more_button_hover_text_color !=''){ ?>
        color: <?php echo $grid_layout1_load_more_button_hover_text_color; ?>;
    <?php } ?>

    <?php if(isset($grid_layout1_load_more_button_hover_border_color) && $grid_layout1_load_more_button_hover_border_color !=''){ ?>
        border:2px solid <?php echo $grid_layout1_load_more_button_hover_border_color; ?>;
    <?php } ?>
}
</style>

<?php }?>
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
$dependencies = array('jquery','apif-bxslider-core','apif-isotope-pkgd-min-js', 'apif-imagesloaded-min-js', 'wow-animation', 'lightbox-js','apif-isotope-packery');
array_merge($dependencies, $join_js_array);
wp_enqueue_script('apif-frontend-js', '', $dependencies);
