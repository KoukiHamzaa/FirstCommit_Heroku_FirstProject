<?php
$join_js_array  = array();
$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
$facebook_icon = (isset($apif_settings['social_share']['facebook_icon']) && $apif_settings['social_share']['facebook_icon'] == 1)?1:0;
$twiter_icon = (isset($apif_settings['social_share']['twiter_icon']) && $apif_settings['social_share']['twiter_icon'] == 1)?1:0;
$google_plus_icon = (isset($apif_settings['social_share']['google_plus_icon']) && $apif_settings['social_share']['google_plus_icon'] == 1)?1:0;
$pinterest_icon = (isset($apif_settings['social_share']['pinterest_icon']) && $apif_settings['social_share']['pinterest_icon'] == 1)?1:0;

//set column value
$largedesktop = ( isset($apif_settings['carousel_row_slider_layout']['columns']['large_desktop']) && $apif_settings['carousel_row_slider_layout']['columns']['large_desktop'] !='' ) ? $apif_settings['carousel_row_slider_layout']['columns']['large_desktop']: 5;
$count_item = ( isset($apif_settings['carousel_row_slider_layout']['columns']['desktop']) && $apif_settings['carousel_row_slider_layout']['columns']['desktop'] !='' ) ? $apif_settings['carousel_row_slider_layout']['columns']['desktop']: 4;
$tablet_column = ( isset($apif_settings['carousel_row_slider_layout']['columns']['tablet']) && $apif_settings['carousel_row_slider_layout']['columns']['tablet'] !='' ) ? $apif_settings['carousel_row_slider_layout']['columns']['tablet']: 3;
$mobile_column = ( isset($apif_settings['carousel_row_slider_layout']['columns']['mobile']) && $apif_settings['carousel_row_slider_layout']['columns']['mobile'] !='' ) ? $apif_settings['carousel_row_slider_layout']['columns']['mobile']: 1;
$columndesktop_class2 = "apif-slider-desktop-col-".$count_item;
$columntablet_class2 = "apif-slider-tablet-col-".$tablet_column;
$columnmobile_class2 = "apif-slider-mobile-col-".$mobile_column;

$autoplay = ( isset($apif_settings['carousel_row_slider_layout']['autoplay']) && $apif_settings['carousel_row_slider_layout']['autoplay'] =='true' ) ? 'true': 'false';
$pager = ( isset($apif_settings['carousel_row_slider_layout']['pager']) && $apif_settings['carousel_row_slider_layout']['pager'] =='true' ) ? 'true': 'false';
$controls = ( isset($apif_settings['carousel_row_slider_layout']['controls']) && $apif_settings['carousel_row_slider_layout']['controls'] =='true' ) ? 'true': 'false';
$autoplay_speed = ( isset($apif_settings['carousel_row_slider_layout']['autoplay_speed']) && $apif_settings['carousel_row_slider_layout']['autoplay_speed'] !='' ) ? $apif_settings['carousel_row_slider_layout']['autoplay_speed']: '2000';
$controls_type = ( isset($apif_settings['carousel_row_slider_layout']['controls_type']) && $apif_settings['carousel_row_slider_layout']['controls_type'] == 'text' ) ? 'text': 'arrow';
$next_text = ( isset($apif_settings['carousel_row_slider_layout']['next_text']) && $apif_settings['carousel_row_slider_layout']['next_text'] !='' )  ? $apif_settings['carousel_row_slider_layout']['next_text'] : 'Next';
$previous_text = ( isset($apif_settings['carousel_row_slider_layout']['previous_text']) && $apif_settings['carousel_row_slider_layout']['previous_text'] !='' ) ? $apif_settings['carousel_row_slider_layout']['previous_text']: 'Prev';
//custom settings
$carousel_row_arrow_bgcolor  = $apif_settings['carousel_row_slider_layout']['arrow_bgcolor'];
$carousel_row_arrow_bghcolor = $apif_settings['carousel_row_slider_layout']['arrow_bghcolor'];
$carousel_row_arrow_color    = $apif_settings['carousel_row_slider_layout']['arrow_color'];

$carousel_row_button_bgcolor  = $apif_settings['carousel_row_slider_layout']['bgcolor'];
$carousel_row_button_bghcolor = $apif_settings['carousel_row_slider_layout']['bghcolor'];
$carousel_row_button_fcolor   = $apif_settings['carousel_row_slider_layout']['fcolor'];
$prowanimation_effect = ( isset($apif_settings['carousel_row_slider_animation_effect']) && $apif_settings['carousel_row_slider_animation_effect'] !='' ) ? $apif_settings['carousel_row_slider_animation_effect']: 'apif-top-to-bottom';

if(isset($attr['hover_animation']) && $attr['hover_animation'] != ''){
 $prowanimation_effect = $attr['hover_animation'];
}


$large_desktop_column_class = (isset($largedesktop) && $largedesktop != '') ? 'apif-large-desktop-col-'.$largedesktop : 'apif-large-desktop-col-5';
?>
<div class="apif-owl-demo <?php echo $large_desktop_column_class;?> <?php echo 'apif-control-'.$controls_type.'-type';?> apif-<?php echo $image_size; ?> owl-carousel apif-carousel-row-slider-layout <?php echo $columndesktop_class2;?> <?php echo $columntablet_class2;?> <?php echo $columnmobile_class2;?>" data-pager="<?php echo $pager;?>" data-controls="<?php echo $controls;?>" data-id="apif_<?php echo rand( 1111111, 9999999 );?>" data-count="<?php echo $count;?>" data-desktopcol="<?php echo $count_item;?>" data-tabletcol="<?php echo $tablet_column;?>" data-mobilecol="<?php echo $mobile_column;?>">

<?php if(isset($ins_media['meta']['error_message'])){?>
<h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1>
<?php }else if (is_array($ins_media['data']) || is_object($ins_media['data'])) {
  $index_counter = 0;
  $per_page = $count;
  $items_array = array_slice($ins_media['data'], 0, $per_page); 
  $countitem = 0;
  $carousel_arr = array();
  $data_profile_image = IF_Pro_Class::get_Profile_Image($items_array);  
  $check = 1;     

foreach ($items_array as $vm){
  
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
		$countitem ++;
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
    if($vm['type'] == 'video'){
      $header_response2 = get_headers($image, 1);
          if ( strpos( $header_response2[0], "404" ) !== false )
          {
               $imageinfo = false;
          }else{
               $imageinfo = true;
          }
    }else{
       $imageinfo = true;
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
  if($hide_profile_link == 1){
      $html_profile_userlink = $data_username;
  }else{
      $nickname = (isset($data_username) && $data_username != '')?esc_attr($data_username):'#';
      $url_profilelink = "https://www.instagram.com/".$nickname;
      $html_profile_userlink = "<a href='".$url_profilelink."' target='_blank'>".$data_username."</a>";
  }
    $count_item_row = $countitem % 2;
	$permalink = (isset($vm['permalink']) && $vm['permalink'] != '')?esc_url($vm['permalink']):'';
    $image = IF_Pro_Class::check_ifexist_image($image,$image_size,$permalink);
      ?>
      <?php if ( $count_item_row == 1 ) {
	        ?>
	        <div class="apinsta-feeds-row-wrap apif-item-count-<?php echo $count_item_row;?> apif-countitem-<?php echo $count_item;?>">
	        <?php }
	        ?>
	      <div class="apif-owl-silder apif-carousel-row-slider-box <?php echo $prowanimation_effect;?>">
			 	    <div class="apif-each-row apif-row-image">
				 	<figure>
                 <div class="apif-featimg">
                  <a class="example-image-link" href="#" style="background-image: url(<?php echo esc_url($image); ?>);width: 100%;background-size: cover;display: block;background-position: center center; background-repeat: no-repeat;height: 238px;" title="<?php echo strip_tags(substr($captiontext, 0, 20)); ?>"></a>
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
                              <a href='<?php echo esc_url($image); ?>' class="hoverlay-link litbx" data-group="gallery">image link </a>
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
                        if($prowanimation_effect == "apif-img-creative"){ ?>
                         
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
                            </div>
                        
                         <?php }else if($prowanimation_effect == "apif-img-sweetmarley" || $prowanimation_effect == "apif-img-tender" || $prowanimation_effect == "apif-img-jolly" || $prowanimation_effect == "apif-img-strongapollo" || $prowanimation_effect == "apif-img-darkkiraview"){ 
                             if($prowanimation_effect == "apif-img-tender"){
                               $classanimte = "tender";
                             }else if($prowanimation_effect == "apif-img-jolly"){
                               $classanimte = "jolly";
                             }else if($prowanimation_effect == "apif-img-strongapollo"){
                               $classanimte = "strongapollo";
                             }else if($prowanimation_effect == "apif-img-sweetmarley"){
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
                         } ?>
                     

                         <?php include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); ?>

                    </div>
                </div>
            </div>
				</figure>
   </div>    
</div>
 <?php if ( $count_item_row == 0 ) { ?>
            </div>
       <?php }  ?>
<?php 
  // } //imageinfo end
  }
 }//foreach end
}
?>
</div>
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

$dependencies = array('jquery','apif-bxslider-core', 'apif-owl-carousel-js', 'apif-jcarousel-core', 'apif-jcarousel-skeleton', 'apif-jcarousel-control', 'apif-jcarousel-autoscroll');
array_merge($dependencies, $join_js_array);
wp_enqueue_script('apif-frontend-js', $dependencies);
wp_localize_script( 'apif-frontend-js', 'frontend_owl_carousel_object', 
array(
	'owl_carousel_enable' => 'true',
	'count' => $count_item,
  'large_desktop_column' => $largedesktop,
  'tablet_count' => $tablet_column,
  'mobile_count' => $mobile_column,
	'next_text' =>$next_text,
	'previous_text' => $previous_text,
	'autoplay' => $autoplay,
	'pager' => $pager,
	'controls' => $controls,
	'autoplay_speed' => $autoplay_speed,
	'controls_type' => $controls_type,
  'margin' => 0,
   'layout' => 'rowcarousel'
	) );