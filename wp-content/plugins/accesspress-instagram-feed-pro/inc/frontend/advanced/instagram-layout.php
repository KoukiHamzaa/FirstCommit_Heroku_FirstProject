<?php
$generated_random_no = rand(9999, 999999);
$join_js_array = array();
$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
$facebook_icon = (isset($apif_settings['social_share']['facebook_icon']) && $apif_settings['social_share']['facebook_icon'] == 1)?1:0;
$twiter_icon = (isset($apif_settings['social_share']['twiter_icon']) && $apif_settings['social_share']['twiter_icon'] == 1)?1:0;
$google_plus_icon = (isset($apif_settings['social_share']['google_plus_icon']) && $apif_settings['social_share']['google_plus_icon'] == 1)?1:0;
$pinterest_icon = (isset($apif_settings['social_share']['pinterest_icon']) && $apif_settings['social_share']['pinterest_icon'] == 1)?1:0;
$instagram_layout_show_time_ago = (isset($instagram_layout_show_time_ago) && $instagram_layout_show_time_ago == '1')?1:0;
$instagram_layout_show_image_caption = (isset($instagram_layout_show_image_caption) && $instagram_layout_show_image_caption == '1')?1:0;
?>
<div class='apif-wrapper'>
<section id="apif-shortcode-wrapper" class="apif-instagram-view apif-isotope-wrapper">
<div  class='ap_feed_wrapper'>
<div class="ap_feeds ap_commond_div_for_pretty_photo_lightbox ap_feeds-instagram_layout" id="ins-container" data-feed-id='<?php echo $generated_random_no; ?>'>
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
$total_page = intval($total_items) /  intval($per_page);
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
$carousel_array = array();

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
$img = $vm['images']['standard_resolution']['url'];
$width = $vm['images']['standard_resolution']['width'];
$lowwidth = $vm['images']['low_resolution']['width'];
$thumbwidth = $vm['images']['thumbnail']['width'];
$height = $vm['images']['standard_resolution']['height'];
$lowheight = $vm['images']['low_resolution']['height'];
$thumbheight = $vm['images']['thumbnail']['height'];

$image_url = APIF_IMAGE_DIR . '/image-square.png';
if($img == ''){
$lightbox_image = $vm['images']['thumbnail']['url'];
}else{
$lightbox_image = $vm['images']['standard_resolution']['url'];
}
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
<div class="apif-masonry-box apif-instagram-layout <?php if( isset($instagram_layout_animate_css_effect) && $instagram_layout_animate_css_effect !='' ){ echo 'wow '.$instagram_layout_animate_css_effect; } ?> " data-wow-duration="2s">
<div class="apif-instagram-block">
<div class="header-insta-wrap">
<div class="apif-left-wrapper">
    <?php if(isset($instagram_user_link)){ 
        include(APIF_INST_PATH.'inc/frontend/common/profile-image.php');
    } ?>
    <?php if(isset($instagram_user_username)){ ?>
    <div class="apif-user-name">
        <?php echo $html_profile_userlink; ?> 
    </div>
    <?php } ?>
</div>
<div class="apif-right-wrapper">
    <?php if($instagram_layout_show_time_ago == 1){ ?>
    <div class='ap_posted_ago' style='color:<?php if(isset($hover_image_text_color)){ echo $hover_image_text_color; }else{ echo "#fff"; } ?>;'>
        <?php
        $oldTime = $vm['created_time'];
        echo $insta->xTimeAgo($oldTime);
        ?>
    </div>
    <?php } ?>
</div>
</div>
<figure>
<div class="apif-featimg">
    <?php
    if(isset($apif_settings['enable_lightbox'])){
        if($apif_settings['lightbox_layout'] == 'preety_photo'){
            $join_js_array[] = 'apif-prettyphoto-lightbox-core-js';
            wp_enqueue_script('apif-prettyphoto-lightbox-core-js');
            wp_enqueue_style('apif-prettyphoto-lightbox');
            if($vm['type'] == 'video'){
                $video_link = $vm['videos']['low_bandwidth']['url'];
                ?>
                <a href='#inline-1-<?php echo $vm['created_time']; ?>'  rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo esc_html($captiontext); ?>" class="apif-image-link" width='420' height='300'><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($vm['caption']['text'], 0, 20)); ?>' /></a>
                <div id="inline-1-<?php echo $vm['created_time']; ?>" style="display:none;">
                   <video controls>
                      <source src="<?php echo $video_link; ?>" type="video/mp4">
                          Your browser does not support the video tag.
                      </video>
                  </div>
                  <?php
              }else{
                ?>
                <a href='<?php echo esc_url($lightbox_image); ?>'  rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo esc_html($captiontext); ?>" class="apif-image-link"> <img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 20)); ?>' /> </a>
                <?php
            }
        }elseif ($apif_settings['lightbox_layout'] == 'litbx_lightbox') { 
            $join_js_array[] = 'apif-litbx-core';
            wp_enqueue_script('apif-litbx-core');
            wp_enqueue_style('apif-litbx-lightbox');
            ?>
            <a href='<?php echo esc_url($lightbox_image); ?>' class="example-image-link litbx" data-group="gallery"><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 20)); ?>'></a>
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
                <a href='<?php echo esc_url($video_link); ?>?swipeboxVideo=1' class="apif-swipebox" title='<?php echo esc_html($captiontext); ?>'><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($vm['caption']['text'], 0, 20)); ?>'></a>
                <?php }else { ?>
                <a href='<?php echo esc_url($lightbox_image); ?>' class="apif-swipebox" title='<?php echo esc_html($captiontext); ?>'><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($vm['caption']['text'], 0, 20)); ?>'></a>
                <?php } ?>
                <!-- for swipe box ends -->
                <?php
            }elseif($apif_settings['lightbox_layout'] == 'classic'){ 
                $join_js_array[] = 'lightbox-js';
                wp_enqueue_script('lightbox-js');
                wp_enqueue_style('lightbox');
                ?>
                <a class="example-image-link example-image-link" href="<?php echo esc_url($image); ?>" data-lightbox="example-set"><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 20)); ?>'></a>
                <?php
            }elseif($apif_settings['lightbox_layout'] == 'venobox_lightbox'){
                $join_js_array[] = 'apif-venobox-core';
                wp_enqueue_script('apif-venobox-core');
                wp_enqueue_style('apif-venobox-lightbox');
                ?>
                <!-- for venobox -->
                <?php
                if($vm['type'] == 'video'){
                    $video_link = $vm['videos']['low_bandwidth']['url'];
                    ?>
                    <a class="apif-venobox" href="#inline-2-<?php echo $vm['created_time']; ?>" data-type="inline" title='<?php echo esc_html($captiontext); ?>' data-gall="apif-Gallery" ><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 20)); ?>'></a>
                    <div id="inline-2-<?php echo $vm['created_time']; ?>" style="display:none; background:#fff; width:100%; height:100%; float:left; padding:10px;">
                        <video controls>
                            <source src="<?php echo $video_link; ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <?php
                    }else{
                        $image_link = $lightbox_image; ?>
                        <a class="apif-venobox" href="<?php echo $lightbox_image; ?>" title='<?php echo esc_html($captiontext); ?>' data-gall="apif-Gallery" ><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($captiontext, 0, 20)); ?>'></a>
                        <?php
                    } ?>
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
					<a class="apif-own-lightbox" href="javascript:void(0);"
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
					><img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($vm['caption']['text'], 0, 20)); ?>'></a>
					<div class="apif-hidden" style="display: none;">
					<?php echo $captiontext;?>
					</div>
					<textarea class="apif-hidden-carousel" style="display: none;"><?php echo $carousel_arr;?></textarea>
					<?php  
			}
}else{ 
?>
<img class="apif-feature-image" src="<?php echo esc_url($image); ?>" alt='<?php echo esc_attr(substr($vm['caption']['text'], 0, 20)); ?>'/>
<?php
} ?>
</div>
<?php if(isset($instagram_image_link)){ ?>
<?php if($vm['type'] == 'video'){ ?>
<span class="apif-ins-link apif-ins-video-icon"> 
<a href="<?php echo $link; ?>" target="_blank" title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>"><i class="fa fa-play-circle-o"></i> </a> 
</span>
<?php }else if($vm['type'] == 'sidecar' || $vm['type'] == 'carousel'){ //carousel 
?>
<span class="apif-ins-link apif-ins-video-icon apif-carusel-type"> 
<a href="<?php echo $link; ?>" target="_blank" title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>">
<i class="fa fa-clone"></i> 
</a> 
</span>
<?php }else{ ?> 
<span class="apif-ins-link"> <a href='<?php echo $link; ?>' target='_blank' title="<?php echo _e('View on Instagram', 'accesspress-instagram-feed-pro'); ?>"><i class="fa fa-camera"></i></a> 
</span>
<?php } ?>
<?php  } ?>
</figure>
<div class="apif-insta-content-wrap">
<div class="apif-insta-cont-block">
<div class="apif-comment-like" style='color:<?php if(isset($hover_image_text_color)){ echo $hover_image_text_color; }else{ echo "#fff"; } ?>;'>
<?php if ($like_count == '1') : ?>
<!-- Image like count section start -->
<span class="ap_insta_like_count">
<p class="ap-instagram_imge_like">
<span class="ap-insta like_image">
<i class="fa fa-heart"></i>
</span>

<?php

$count = $vm['likes']['count'];
$format = $counter_type_options;
$likes_count = IF_Pro_Class:: get_formatted_count($count, $format); 

?>

<span class="count"><?php echo $likes_count; ?></span>
</p>
</span>
<!-- Image like count section end -->
<?php endif; ?>
<!-- Image comment count section -->
<?php if($comment_count == '1'): ?>
<span class='ap_insta_comment_count_wrapper'>
<p class="ap_insta_comment_count">
<span class='insta comment_count'>
<i class='fa fa-comment'></i>
</span>
<?php

$count = $vm['comments']['count'];
$format = $counter_type_options;
$comments_count = IF_Pro_Class:: get_formatted_count($count, $format); 

?>
<span class='ap_insta_count'><?php echo $comments_count; ?></span>
</p>
</span>
<?php endif; ?>
<!-- Image comment count section end -->
</div>
</div>
<div class="apif-fig-content">
<?php if($instagram_layout_show_image_caption == 1){ ?>
<div class='apif-image-caption clearfix'><?php 
echo $captiontext; 
?>
</div>
<?php } ?>
<?php include(APIF_INST_PATH.'inc/frontend/common/social-share.php'); ?>
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
</section>
<?php if(!empty($ins_media['pagination']) && isset($instagram_layout_load_more_button_enable) && $instagram_layout_load_more_button_enable == 1){ ?>
<div class='ap_pagination <?php if(isset($instagram_layout_load_more_button_position)){ echo $instagram_layout_load_more_button_position; }else{ echo "apif-left";  } ?> clearfix'>
<a href='javascript:void(0);' class='load-more-button apif-load-more-button load-more-button-<?php echo $layout; ?> apif-id-<?php echo $if_id; ?>' 
data-pagination-link="<?php echo $ins_media['pagination']['next_url']; ?>"
data-id="<?php echo $if_id; ?>"
data-layout-name="instagram_layout"
data-sort-by = '<?php echo isset($apif_settings['sort_by']) ? $apif_settings['sort_by'] : 'date'; ?>' 
data-random-num = '<?php echo $generated_random_no; ?>'
data-index-num-last = '<?php echo $apif_settings['image_number']; ?>'
data-page-number="1"
data-feedtype = "<?php echo esc_attr($feed_type);?>"
data-total-page="<?php echo $total_page; ?>"
data-lighbox-layout = "<?php echo $apif_settings['lightbox_layout'];?>"
>
<?php if(isset($instagram_layout_load_more_button_text) && $instagram_layout_load_more_button_text !=''){ echo $instagram_layout_load_more_button_text; }else{ echo "Load more";  } ?></a>
<div class='ap_wait_loader ap_wait_loader-instagram_layout' style='display:none;'>
<?php if(isset($instagram_layout_load_more_button_icon)){ ?>
<img src='<?php echo APIF_IMAGE_DIR."/loaders/loader".$instagram_layout_load_more_button_icon.".gif"; ?>' alt='Loading' />
<?php }else{ ?>
<img src='<?php echo APIF_IMAGE_DIR."/loaders/loader7.gif"; ?>' alt='Loading' />
<?php } ?>
</div>
</div>
<?php } ?>
<script type="text/javascript">
// wow and animate css effect
// Masonry Setting for instagram
// jQuery(document).ready( function($) {
//  new WOW().init();
//  var $container = jQuery('.apif-masonry-view');
//     // use imagesLoaded, instead of window.load
//     $container.imagesLoaded( function() {
//         $container.isotope({
//             itemSelector: '.apif-masonry-box',
//             // masonry is default layoutMode, no need to specify it
//             masonry: {
//               columnWidth: '.apif-masonry-box',
//             },
//         });
//     });
// });
</script>
</div>

<style type="text/css">
a.apif-id-<?php echo $if_id; ?>.load-more-button-<?php echo $layout; ?> {
<?php if(isset($instagram_layout_load_more_button_background_color) && $instagram_layout_load_more_button_background_color !='' ){ ?> 
background: <?php  echo $instagram_layout_load_more_button_background_color; ?>;
<?php } ?>
<?php if(isset($instagram_layout_load_more_button_text_color) && $instagram_layout_load_more_button_text_color !='' ){ ?>
color: <?php  echo $instagram_layout_load_more_button_text_color; ?>;
<?php } ?>
<?php if(isset($instagram_layout_load_more_button_border_color) && $instagram_layout_load_more_button_border_color !='' ){ ?>
border:2px solid <?php echo $instagram_layout_load_more_button_border_color; ?>;
<?php } ?>
}

.apif-id-<?php echo $if_id; ?>.load-more-button-<?php echo $layout; ?>:hover{
<?php if(isset($instagram_layout_load_more_button_text_hover_background_color) && $instagram_layout_load_more_button_text_hover_background_color !='' ){ ?>
background: <?php echo $instagram_layout_load_more_button_text_hover_background_color; ?>;
<?php } ?>
<?php if(isset($instagram_layout_load_more_button_hover_text_color) && $instagram_layout_load_more_button_hover_text_color !='' ){ ?>
color: <?php echo $instagram_layout_load_more_button_hover_text_color; ?>;
<?php } ?>
<?php if(isset($instagram_layout_load_more_button_hover_border_color) && $instagram_layout_load_more_button_hover_border_color !=''){ ?>
    border:2px solid <?php echo $instagram_layout_load_more_button_hover_border_color; ?>;
    <?php } ?>
}
</style>
<?php
wp_enqueue_style('animate-style');
wp_enqueue_script('apif-isotope-pkgd-min-js');
wp_enqueue_script('apif-imagesloaded-min-js');
wp_enqueue_script('wow-animation');
wp_enqueue_style('apif-bx-slider');
wp_enqueue_script('apif-bxslider-core');

$dependencies = array('jquery','apif-bxslider-core', 'apif-isotope-pkgd-min-js', 'apif-imagesloaded-min-js', 'wow-animation', 'lightbox-js');
array_merge($dependencies, $join_js_array);
wp_enqueue_script('apif-frontend-js', '', $dependencies);