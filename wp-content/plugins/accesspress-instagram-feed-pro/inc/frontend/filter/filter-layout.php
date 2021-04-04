<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
$generated_random_no = rand(9999, 999999);
$join_js_array = array();
$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
$facebook_icon = (isset($apif_settings['social_share']['facebook_icon']) && $apif_settings['social_share']['facebook_icon'] == 1)?1:0;
$twiter_icon = (isset($apif_settings['social_share']['twiter_icon']) && $apif_settings['social_share']['twiter_icon'] == 1)?1:0;
$google_plus_icon = (isset($apif_settings['social_share']['google_plus_icon']) && $apif_settings['social_share']['google_plus_icon'] == 1)?1:0;
$pinterest_icon = (isset($apif_settings['social_share']['pinterest_icon']) && $apif_settings['social_share']['pinterest_icon'] == 1)?1:0;
$comments_show = (isset($apif_settings['enable_comments']) && $apif_settings['enable_comments'] == 1)?1:0;

$item_label = (isset($apif_settings['filter_layout']['all_item_label']) && $apif_settings['filter_layout']['all_item_label'] != '')?esc_attr($apif_settings['filter_layout']['all_item_label']):__('All Feeds','accesspress-instagram-feed-pro');
$show_feed_num = (isset($apif_settings['filter_layout']['feednumber_show']) && $apif_settings['filter_layout']['feednumber_show'] == '1')?1:0;
$filter_options = (isset($apif_settings['filter_layout']['filter_options']) && !empty($apif_settings['filter_layout']['filter_options']))?$apif_settings['filter_layout']['filter_options']:array();
//custom options
$active_bg_color = (isset($apif_settings['filter_layout']['active_bg_color']) && $apif_settings['filter_layout']['active_bg_color'] != '')?esc_attr($apif_settings['filter_layout']['active_bg_color']):'';
$active_font_color = (isset($apif_settings['filter_layout']['active_font_color']) && $apif_settings['filter_layout']['active_font_color'] != '')?esc_attr($apif_settings['filter_layout']['active_font_color']):'';
$inactive_font_color = (isset($apif_settings['filter_layout']['inactive_font_color']) && $apif_settings['filter_layout']['inactive_font_color'] != '')?esc_attr($apif_settings['filter_layout']['inactive_font_color']):'';

$columns_desktop = (isset($apif_settings['filter_layout']['columns_desktop']) && $apif_settings['filter_layout']['columns_desktop'] != '')?esc_attr('apif-col-'.$apif_settings['filter_layout']['columns_desktop']):'apif-col-3';
$hover_animation_effect = (isset($apif_settings['filter_layout']['hover_animation_effect']) && $apif_settings['filter_layout']['hover_animation_effect'] != '')?esc_attr($apif_settings['filter_layout']['hover_animation_effect']):'apif-top-to-bottom';
$animation_effect =(isset($apif_settings['filter_layout']['animation_effect']) && $apif_settings['filter_layout']['animation_effect'] != '')?esc_attr(' wow '.$apif_settings['filter_layout']['animation_effect']):'';
$carousel_arr = array();
$index_counter = 0;
if($feed_type == "any_user_timeline" || $feed_type == "hashtag"){
        $per_page = $count;
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
$totalimagecount = 0;
$totalvideocount = 0;
$totalcarouselcount = 0;
$totalcount = count($items_array);
foreach ($items_array as $key => $value) {
  if($value['type'] == "sidecar" || $value['type'] == "carousel"){
       $totalcarouselcount++;
  }else if($value['type'] == "image"){
      $totalimagecount++;
  }else if($value['type'] == "video"){
      $totalvideocount++;
  }    
}
if($layout == "filter_template1"){
  $layout_class2 = "ap_feeds-grid_layout1";
}else{
  $layout_class2 = "";
}
?>
<div class='apif-wrapper clearfix'>
<section class="ap-shortcode-wrapper apif-filter-layout-view apif_<?php echo $layout;?> apif-isotope-wrapper">
<div class='ap_feed_wrapper'>
<ul class="apifeeds-filter-wrap clearfix" id="apif_filter_<?php echo $generated_random_no; ?>">
    <li><a href="javascript:void(0);" class="apif-filter-trigger apif-active-filter" data-filter-key="apif-filter-all" data-layout-type="<?php if ( isset( $layout ) ) { echo esc_attr( $layout ); }?>"><?php echo $item_label; ?>
    <?php if($show_feed_num ){?>
    <span>(<?php echo $totalcount;?>)</span>
    <?php } ?>
    </a></li>
    <?php
    //$this->displayArr( $filter_options);
    if(!empty($filter_options)){
        foreach ( $filter_options as $filter_key => $value ) { ?>
           <li>
            <a href="javascript:void(0);" data-filter-key="apif-filter-<?php echo esc_attr( $value); ?>" class="apif-filter-trigger" data-layout-type="<?php echo esc_attr( $layout ); ?>">
             <?php echo esc_attr(ucwords($value));?>
            <?php if($show_feed_num ){?>
             <span>(
               <?php if($value== "image"){ 
                echo $totalimagecount;
              }else if($value == "video"){
                echo $totalvideocount;
              }else if($value == "carousel" || $value == "sidecar"){
                echo $totalcarouselcount;
              }
              ?>)
             </span>
             <?php } ?>
           </a>
           </li>
         <?php }
    } ?>
</ul>
<!-- content of filter -->
<div class="ap_commond_div_for_pretty_photo_lightbox apif-<?php echo $layout;?>" data-feed-id='<?php echo $generated_random_no; ?>'>
<?php 
 //$this->displayArr( $ins_media['data'] );
if(isset($ins_media['meta']['error_message'])){?>
     <h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1>
<?php
}else if (is_array($ins_media['data']) || is_object($ins_media['data'])) { ?>
<?php
$theme_accent_color = (isset($theme_accent_color) && $theme_accent_color != '')?$theme_accent_color:'';
?>
  <div class="apifeeds-filtr-container apifeeds-overlay-effect <?php echo $layout_class2;?>" id="apif_container_<?php echo $generated_random_no; ?>" data-id="<?php echo $generated_random_no; ?>" data-layout="<?php echo esc_attr( $layout ); ?>">
    <div class="apif-masonry-sizer"></div>
    <?php 
     $check = 1;
     $carousel_arr = '';
     $data_profile_image = IF_Pro_Class::get_Profile_Image($items_array); 
    // $this->displayArr( $ins_media['data'] );
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
         $lightbox_image = '';
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
              //$this->displayArr($extra_options);
              include(APIF_INST_PATH.'inc/frontend/common/anyuser-image-size.php');
              $feed_id  = $vm['feed_id'];
              $carousel_arr = $vm['carousel'];
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
		  $mediatype = $vm['type'];
          if($mediatype == "image"){
            $media_type_class = "apif-filter-image";
          }else if($mediatype == "video"){
            $media_type_class = "apif-filter-video";
          }else if($mediatype == "sidecar" || $mediatype == "carousel" ){
            $media_type_class = "apif-filter-carousel";
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
		 <div class="ap-self-user-feed apif-masonry-box <?php echo $columns_desktop;?> <?php echo $animation_effect;?> <?php echo $hover_animation_effect;?> apif-filter-all <?php echo $media_type_class;?>">
		 	 <figure>
		 	 	 <div class="apif-featimg">
                  <a class="example-image-link" title="<?php echo esc_attr(substr($captiontext, 0, 18));?>" style="background-image: url(<?php echo esc_url($image); ?>);"></a>
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
                            }elseif($apif_settings['lightbox_layout'] == 'venobox_lightbox'){ 
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
                     <?php if($hover_animation_effect == "apif-img-creative"){?>                                
                                    <div class="apif-creative-wrapper-profile">
                                       <div class="apif-prof-n-name-wrap">
                                         <?php if(isset($instagram_user_username)){ 
                                             ?>
                                          <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>>
                                          <?php echo $html_profile_userlink; ?> 
                                          </div>
                                           <?php  } ?>
                                       </div>
                                        <?php
                                             include(APIF_INST_PATH.'inc/frontend/common/comments.php'); 
                                        ?>
                                    </div>
                                    <div class="apif-creative-second-wrapper">
                                       <div class="apif-prof-n-name-wrap">
                                         <?php 
                                          if(isset($instagram_user_link)){ 
                                                include(APIF_INST_PATH.'inc/frontend/common/profile-image.php');
                                             }
                                          include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); 
                                          ?>
                                       </div>
                                    </div>
                                 <?php }else if($hover_animation_effect == "apif-img-sweetmarley" || $hover_animation_effect == "apif-img-tender" || $hover_animation_effect == "apif-img-jolly" || $hover_animation_effect == "apif-img-strongapollo" || $hover_animation_effect == "apif-img-darkkiraview"){ 
                                         if($hover_animation_effect == "apif-img-tender"){
                                           $classanimte = "tender";
                                         }else if($hover_animation_effect == "apif-img-jolly"){
                                           $classanimte = "jolly";
                                         }else if($hover_animation_effect == "apif-img-strongapollo"){
                                           $classanimte = "strongapollo";
                                         }else if($hover_animation_effect == "apif-img-sweetmarley"){
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
                                    <div class="apif-user-name" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>> <?php echo $html_profile_userlink; ?>
                                     </div>
                                             <?php  } ?>
                       <?php 
                         include(APIF_INST_PATH.'inc/frontend/common/comments.php'); 
                         include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); 
                        } ?>
             </div>
            </div>
                </div>

		 	 </figure>
          
		 </div>
       <?php }
    endforeach;
    ?>
  </div>

<?php } ?>
</div>

</div>
</section>
<script type="text/javascript">
jQuery(document).ready( function($) {
    $('.apifeeds-filtr-container').each(function(){
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
wp_enqueue_style('apif-bx-slider');
wp_enqueue_script('apif-bxslider-core');
wp_enqueue_script('wow-animation');
$dependencies = array('jquery','apif-bxslider-core','apif-isotope-pkgd-min-js', 'apif-imagesloaded-min-js', 'wow-animation', 'lightbox-js','apif-isotope-packery');
array_merge($dependencies, $join_js_array);
wp_enqueue_script('apif-frontend-js', $dependencies);