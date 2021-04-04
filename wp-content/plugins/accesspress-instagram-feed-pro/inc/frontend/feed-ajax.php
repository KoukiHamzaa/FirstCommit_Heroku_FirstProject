<?php
global $apif_settings, $insta, $wpdb;
$apif_settings = get_option( 'apif_settings' );
$username = !empty($apif_settings['username']) ? $apif_settings['username'] : ''; // your username
$access_token = !empty($apif_settings['access_token']) ? $apif_settings['access_token'] : '';
$count = $apif_settings['image_number'];

$url = $_POST['pagination_link'];
require_once('instagram.php');
$insta = new InstaWCD();
$insta->username = $username;
$insta->access_token = $access_token;


$feed_id =  intval(sanitize_text_field($_POST[ 'apif_id' ]));
$totalcolumn = sanitize_text_field($_POST['column']);
$largedesktopcolumn = (isset($_POST['largedesktopcolumn']) && $_POST['largedesktopcolumn'] != '')?sanitize_text_field($_POST['largedesktopcolumn']):'apif-large-desktop-col-4'; // large desktop

$if_id =  $feed_id;
$table_name = $instagram_feed_tbl = $wpdb->prefix.'instagram_feeds';
$in_feeds = $wpdb->get_results("SELECT * FROM $table_name where id = $if_id");
$apif_settings = unserialize($in_feeds[0]->feed_settings);
foreach ($apif_settings as $key => $value) {
    $$key = $value;
}
$social_share_enable = (isset($apif_settings['social_share']['enable_social_share']) && $apif_settings['social_share']['enable_social_share'] == 1)?1:0;
$facebook_icon = (isset($apif_settings['social_share']['facebook_icon']) && $apif_settings['social_share']['facebook_icon'] == 1)?1:0;
$twiter_icon = (isset($apif_settings['social_share']['twiter_icon']) && $apif_settings['social_share']['twiter_icon'] == 1)?1:0;
$google_plus_icon = (isset($apif_settings['social_share']['google_plus_icon']) && $apif_settings['social_share']['google_plus_icon'] == 1)?1:0;
$pinterest_icon = (isset($apif_settings['social_share']['pinterest_icon']) && $apif_settings['social_share']['pinterest_icon'] == 1)?1:0;
$comments_show = (isset($apif_settings['enable_comments']) && $apif_settings['enable_comments'] == 1)?1:0;

$hide_profile_link = (isset($apif_settings['hide_profile_link']) && $apif_settings['hide_profile_link'] == '1')?1:0;

$layout = sanitize_text_field($_POST[ 'layout' ]);
$hoveranimation = sanitize_text_field($_POST[ 'hoveranimation' ]);
$sort_by = sanitize_text_field($_POST[ 'sort_by' ]);

$data_index_num_last = isset($_POST['data_index_num_last']) ? $_POST['data_index_num_last'] : '' ;

$count=$apif_settings['image_number'];


if($feed_type == 'tag'){

    $i = 0;
    $blocked_image_caption_words = isset($tag_blocked_caption_words) ? $tag_blocked_caption_words: '';
    $allowed_image_caption_words = isset($tag_allowed_caption_words) ? $tag_allowed_caption_words: '';

    $blocked_username_words      = isset($tag_blocked_username_words) ? $tag_blocked_username_words: '';
    $allowed_username_words      = isset($tag_allowed_username_words) ? $tag_allowed_username_words: '';

    $filtered_array = $insta->getFilteredTagRecentMedia($url, $i, $count, $blocked_image_caption_words, $allowed_image_caption_words, $blocked_username_words, $allowed_username_words );
    $ins_media['data'] = $filtered_array['data'];
    if(!empty($filtered_array['data'])){
        if(isset($filtered_array['pagination']['next_url'])){
            $ins_media['pagination']['next_url'] = $filtered_array['pagination']['next_url'];
        }
    }else{
        $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
    }

}
else if($feed_type == 'any_user_timeline'){
    $i = 0;
    $insta_posts = APIF_Instagram_Feeds_Table;
    $any_user_blocked_caption_words = isset($any_user_username_blocked_caption_words) ? $any_user_username_blocked_caption_words : '';
    $any_userallowed_caption_words = isset($any_user_username_allowed_caption_words) ? $any_user_username_allowed_caption_words : '';
    $insta_media_feeds = $wpdb->get_results("SELECT * FROM $insta_posts where post_id = $if_id");
    if(isset($insta_media_feeds) && !empty($insta_media_feeds)){
        foreach($insta_media_feeds as $key => $item){
            $instamediafeeds[$key]= (array)$item;
        }   
    }else{
        $instamediafeeds = array();
    }

    $filtered_array = $insta->get_anyuser_feeds($instamediafeeds,$i,$any_user_blocked_caption_words, $any_userallowed_caption_words);
    if(isset($filtered_array) && !empty($filtered_array)){
        $ins_media['data'] = $filtered_array;
    }else{
        $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
    } 
}
else if($feed_type == 'hashtag'){
    $i = 0;
    $insta_posts = APIF_Instagram_Feeds_Table;

    $blocked_image_caption_words = isset($tag_blocked_caption_words) ? $tag_blocked_caption_words: '';
    $allowed_image_caption_words = isset($tag_allowed_caption_words) ? $tag_allowed_caption_words: '';
    $blocked_username_words      = isset($tag_blocked_username_words) ? $tag_blocked_username_words: '';
    $allowed_username_words      = isset($tag_allowed_username_words) ? $tag_allowed_username_words: '';

    $insta_media_feeds = $wpdb->get_results("SELECT * FROM $insta_posts where post_id = $if_id");
    if(isset($insta_media_feeds) && !empty($insta_media_feeds)){
        foreach($insta_media_feeds as $key => $item){
            $instamediafeeds[$key]= (array)$item;
        }   
    }else{
        $instamediafeeds = array();
    }

    $filtered_array = $insta->get_feeds_bytag_alternate($instamediafeeds,$i,$blocked_username_words, $allowed_username_words,$blocked_image_caption_words,$allowed_image_caption_words);

    if(isset($filtered_array) && !empty($filtered_array)){
        $ins_media['data'] = $filtered_array;
    }else{
        $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
    } 

}
else if($feed_type=='any_user'){
    $i = 0;
    $filtered_array = $insta->get_username_feeds($url, $i, $count, $any_user_username_blocked_caption_words, $any_user_username_allowed_caption_words);
    $ins_media['data'] = $filtered_array['data'];
    if(!empty($filtered_array['data'])){
        if(isset($filtered_array['pagination']['next_url'])){
            $ins_media['pagination']['next_url'] = $filtered_array['pagination']['next_url'];
        }
    }else{
        $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
    }

}else if ($feed_type == 'likes' ){
    $i = 0;
    $blocked_image_caption_words = isset($user_likes_blocked_caption_words) ? $user_likes_blocked_caption_words: '';
    $allowed_image_caption_words = isset($user_likes_allowed_caption_words) ? $user_likes_allowed_caption_words: '';

    $blocked_username_words      = isset($user_likes_blocked_username_words) ? $user_likes_blocked_username_words: '';
    $allowed_username_words      = isset($user_likes_allowed_username_words) ? $user_likes_allowed_username_words: '';

    $filtered_array = $insta->getFilteredUserLiked($url, $i, $count, $blocked_image_caption_words, $allowed_image_caption_words, $blocked_username_words, $allowed_username_words);
    $ins_media['data'] = $filtered_array['data'];
    if(!empty($filtered_array['data'])){
        if(isset($filtered_array['pagination']['next_url'])){
            $ins_media['pagination']['next_url'] = $filtered_array['pagination']['next_url'];
        }
    }else{
        $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
    }
}else if($feed_type == 'recent_media'){
    $i = 0;
    $blocked_image_caption_words = isset($recent_media_blocked_caption_words) ? $recent_media_blocked_caption_words: '';
    $allowed_image_caption_words = isset($recent_media_allowed_caption_words) ? $recent_media_allowed_caption_words: '';

    $filtered_array = $insta->get_username_feeds($url, $i, $count, $blocked_image_caption_words, $allowed_image_caption_words);

    $ins_media['data'] = $filtered_array['data'];

    if(!empty($filtered_array['data'])){
        if(isset($filtered_array['pagination']['next_url'])){
            $ins_media['pagination']['next_url'] = $filtered_array['pagination']['next_url'];
        }
    }else{
        $ins_media = array('meta'=>array('error_message'=>"The filter terms that you have used didn't match. Please change the parameters."));
    }
}


$formated_array = array();
$sort_images_by = $sort_by;

// if($feed_type != "any_user_timeline" && $feed_type != "hashtag"){
if($feed_type == "recent_media" || $feed_type == "tag"){
    foreach($ins_media['data'] as $key=>$data) {
        $likes = esc_attr($data['likes']['count']);
        $comments = esc_attr($data['comments']['count']);
        $formated_array[$key] = $data;
        $formated_array[$key]['likes_count'] = $likes;
        $formated_array[$key]['comment_count'] = $comments;
    };

    if(!empty($sort_images_by) && $sort_images_by =='random') {
        shuffle($formated_array);
    }else if(!empty($sort_images_by) && $sort_images_by == 'likes') {
        if($formated_array){
            usort($formated_array, array($this, 'SortByLikesOrder'));
        }
    }else if(!empty($sort_images_by) && $sort_images_by == 'comments') {
        if($formated_array){
            usort($formated_array, array( $this, 'SortByCommentOrder'));
        }
    }else if(!empty($sort_images_by) && $sort_images_by == 'date') {
        if($formated_array){
            usort($formated_array, array( $this, 'SortByDateOrder'));
        }
    }
}else{
//any user timeline or hashtag, any user timeline feeds by instascrapper
 if(!empty($ins_media['data'])){
       $formated_array = array();
       $sort_images_by = $sort_by;
//$this->displayArr($ins_media['data']);
       foreach($ins_media['data'] as $key=>$data) {
           $additional = (isset($data['additional']) && !empty($data['additional']))?unserialize($data['additional']):array();
           $caption = (isset($data['description']) && !empty($data['description']))?$data['description']:'';
           $permalink = (isset($data['permalink']) && !empty($data['permalink']))?esc_url($data['permalink']):'';
           $profile_link = (isset($data['profile_link']) && !empty($data['profile_link']))?esc_url($data['profile_link']):'';
           $image_arr = (isset($data['img']) && !empty($data['img']))?unserialize($data['img']):array();
           $carousel = (isset($data['carousel']) && !empty($data['carousel']))?unserialize($data['carousel']):array();
           $media_arr = (isset($data['media']) && !empty($data['media']))?unserialize($data['media']):array();
           $location_arr = (isset($data['location']) && !empty($data['location']))?unserialize($data['location']):array();
           $userMeta = (isset($data['userMeta']) && !empty($data['userMeta']))?unserialize($data['userMeta']):array();
           $userMeta = (array)$userMeta;
           $location_arr = (array)$location_arr;
           $media_arr = (array)$media_arr;
           $location_arr = (array)$location_arr;
           if(!empty($userMeta)){
            $username = esc_attr($userMeta['username']);
            $full_name = esc_attr($userMeta['full_name']);
            $id = esc_attr($userMeta['id']);
            $bio = esc_attr($userMeta['bio']);
            $website = esc_attr($userMeta['website']);
            $counts = (isset($userMeta['counts']) && !empty($userMeta['counts']))?(array)$userMeta['counts']:array();
            $profile_picture = esc_url($userMeta['profile_picture']);
            if(!empty($counts)){
                $media = esc_attr($counts['media']);
                $follows = esc_attr($counts['follows']);
                $followed_by = esc_attr($counts['followed_by']);
            }else{
                $media = $follows = $followed_by = 0;
            }
            
        }else{
            $username = '';
            $full_name = '';
            $id = '';
            $bio = '';
            $website = '';
            $counts = '';
            $profile_picture = '';
        }

        if(!empty($additional)){
            $likes = esc_attr($additional['likes']);
            $comments = esc_attr($additional['comments']);
        }else{
            $likes = $comments = 0;
        }
        if(!empty($image_arr)){
            $img_url = esc_url($image_arr['url']);
            $width = esc_attr($image_arr['width']);
            $height = esc_attr($image_arr['height']);
        }else{
            $img_url = '';
            $width = '';
            $height = '';
        }
        if(!empty($media_arr)){
            if($data['media_type'] == "video"){
                $starndard_resolution_video_url = esc_url($media_arr['url']);
            }else{
                $starndard_resolution_video_url = '';
            }
            
            $starndard_resolution_width = esc_attr($media_arr['width']);
            $starndard_resolution_height = esc_attr($media_arr['height']);
        }else{
            $starndard_resolution_video_url = '';
            $starndard_resolution_width = '';
            $starndard_resolution_height = '';
        }
        
        $location_id = (isset($location_arr['id']) && $location_arr['id'] != '')?esc_attr($location_arr['id']):'';
        $lname = (isset($location_arr['name']) && $location_arr['name'] != '')?esc_attr($location_arr['name']):'';
        $lslug = (isset($location_arr['slug']) && $location_arr['slug'] != '')?esc_attr($location_arr['slug']):'';

        $tags_arr = array();
        if( $caption != ''){
            $pieces = explode(" ", $caption);
            for ($pieces = 0; $i < count($pieces); $i++) { 
             if (strpos($pieces[$i], "#") !== false){
                $tags_arr[] = $pieces[$i];
            }
        }
        
    }
    
    $formated_array[$key] = $data;
    $formated_array[$key]['videos']['low_bandwidth']['url'] = $starndard_resolution_video_url;
    $formated_array[$key]['likes_count'] = $likes;
    $formated_array[$key]['comment_count'] = $comments;
    $formated_array[$key]['user']['id'] = $location_id;
    $formated_array[$key]['user']['full_name'] = $full_name;
    $formated_array[$key]['user']['profile_picture'] = (isset($data['userpic']) && $data['userpic'] != '')?esc_url($data['userpic']):$profile_picture;
    $formated_array[$key]['user']['username'] = $username;
    $formated_array[$key]['images']['thumbnail']['url'] = $img_url;
    $formated_array[$key]['images']['thumbnail']['width'] = $width;
    $formated_array[$key]['images']['thumbnail']['height'] = $height;
    $formated_array[$key]['images']['standard_resolution']['url'] = $img_url;
    $formated_array[$key]['images']['standard_resolution']['width'] = $width;
    $formated_array[$key]['images']['standard_resolution']['height'] = $height;
    $formated_array[$key]['created_time'] = (isset($data['system_timestamp']) && $data['system_timestamp'] != '')?esc_attr($data['system_timestamp']):'';
    $formated_array[$key]['caption']['text'] = $caption;
    $formated_array[$key]['caption']['from']['username'] = $username;
    $formated_array[$key]['user_has_liked'] = '';
    $formated_array[$key]['likes']['count'] = $likes;
    $formated_array[$key]['tags'] = $tags_arr;
    $formated_array[$key]['filter'] = 'Normal';
    $formated_array[$key]['comments']['count'] = $comments;
    $formated_array[$key]['type'] = (isset($data['media_type']) && $data['media_type'] != '')?esc_attr($data['media_type']):'';
    $formated_array[$key]['link'] = $permalink;
     // $formated_array[$key]['location']['name'] = $lname;
     // $formated_array[$key]['location']['id'] = $location_id;
    $formated_array[$key]['attribution'] = '';
    $formated_array[$key]['users_in_photo'] = '';
};
  // echo $sort_images_by;
if(!empty($sort_images_by) && $sort_images_by =='random') {
    shuffle($formated_array);
}else if(!empty($sort_images_by) && $sort_images_by == 'likes') {
    if($formated_array){
        usort($formated_array, array($this, 'SortByLikesOrder'));
    }
}else if(!empty($sort_images_by) && $sort_images_by == 'comments') {
    if($formated_array){
        usort($formated_array, array( $this, 'SortByCommentOrder'));
    }
}else if(!empty($sort_images_by) && $sort_images_by == 'date') {
   if($formated_array){
    usort($formated_array, array( $this, 'SortByDateOrder'));
}
}
}
}

$ins_media['data'] = $formated_array;

$detect = new apif_Mobile_Detect; // Any mobile device (phones or tablets).

if(isset($ins_media['meta']['error_message'])){
    ?>
    <h1 class="widget-title-insta"><span><?php echo $ins_media['meta']['error_message']; ?></span></h1>
    <?php

}
else if (is_array($ins_media['data']) || is_object($ins_media['data'])) {
    $per_page = $index_counter = $data_index_num_last;
    if($feed_type == "any_user_timeline" || $feed_type == "hashtag"){
       $offset = ($page_num - 1) * $per_page;
       $items_array = array_slice($ins_media['data'] , $offset, $per_page);
       $total_items = count($items_array);
       $item_counter = 0;
       $ins_media['data'] =  $items_array;
   }
foreach ($ins_media['data'] as $vm):
$index_id = $index_counter++;
$img = $vm['images']['standard_resolution']['url'];
$width = $vm['images']['standard_resolution']['width'];
$lowwidth = $vm['images']['low_resolution']['width'];
$thumbwidth = $vm['images']['thumbnail']['width'];
$height = $vm['images']['standard_resolution']['height'];
$lowheight = $vm['images']['low_resolution']['height'];
$thumbheight = $vm['images']['thumbnail']['height'];
$data_profile_image = isset($vm['user']['profile_picture']) ? $vm['user']['profile_picture']:'';
try {
  $profileimginfo = @getimagesize($data_profile_image);
} catch (Exception $e) {
  $profileimginfo = false;
}
if(!$profileimginfo){
  $data_profile_image = APIF_IMAGE_DIR.'/round-prof.png';
}
$image_url = APIF_IMAGE_DIR . '/image-square.png';
if($feed_type == "any_user_timeline" || $feed_type == "hashtag"){
    $extra_options = (isset($vm['extra_options']) && $vm['extra_options'] != '')?unserialize($vm['extra_options']):array();
    include_once(APIF_INST_PATH.'inc/frontend/instagram.php');
    $insta = new InstaWCD();
    $extra_options = $insta->objectToArray($extra_options);  
     // $this->displayArr($extra_options);
    include(APIF_INST_PATH.'inc/frontend/common/anyuser-image-size.php');
    $feed_id  = $vm['feed_id'];
  //  $carousel = $vm['carousel'];
}else{
    include(APIF_INST_PATH.'inc/frontend/common/image_size.php');
    $feed_id  = $vm['caption']['id'];
    $carousel = (isset($vm['carousel_media']) && !empty($vm['carousel_media']))?$vm['carousel_media']:array();
    if(!empty($carousel)){
       foreach ($carousel as $key => $value) {
        $type = $value['images']['type'];
        $url = $value['images']['standard_resolution']['url'];
        $width = $value['images']['standard_resolution']['width'];
        $height = $value['images']['standard_resolution']['height'];
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
if($vm['type'] == 'video'){
try {
    $imageinfo = @getimagesize($image);
} catch (Exception $e) {
    $imageinfo = false;
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

if($imageinfo){
 if($layout == 'round_image'){
  include(APIF_INST_PATH.'inc/frontend/ajax/ajax-load-round-layout.php');
}
else if($layout == 'grid_layout2'){
 $layout_class = "ap-feeds-grid-layout2";
 include(APIF_INST_PATH.'inc/frontend/ajax/ajax-load-grid-layout2.php');
}
else if($layout == 'grid_layout' || $layout == 'grid_layout1'){
    include(APIF_INST_PATH.'inc/frontend/ajax/ajax-load-grid-layout.php');
}else if($layout == 'masonry_layout'){
    include(APIF_INST_PATH.'inc/frontend/ajax/ajax-load-masonry-layout.php');
}else if($layout == 'masonry_layout1'){
    include(APIF_INST_PATH.'inc/frontend/ajax/ajax-load-masonry-layout1.php');
}else if($layout == 'masonry_layout2'){
    include(APIF_INST_PATH.'inc/frontend/ajax/ajax-load-masonry-layout2.php');
}else if($layout == 'masonry_layout3'){
    include(APIF_INST_PATH.'inc/frontend/ajax/ajax-load-masonry-layout3.php');   
}else if($layout == 'masonry_layout4'){
    include(APIF_INST_PATH.'inc/frontend/ajax/ajax-load-masonry-layout4.php');   
}else if($layout == 'masonry_layout5'){
    include(APIF_INST_PATH.'inc/frontend/ajax/ajax-load-masonry-layout5.php');   
}else if($layout == 'mosaic'){
    include(APIF_INST_PATH.'inc/frontend/ajax/ajax-load-mosaic.php');   
}
else if($layout == 'instagram_layout'){
    if($image == ''){
       $image = $vm['images']['standard_resolution']['url'];
   }
   include(APIF_INST_PATH.'inc/frontend/ajax/ajax-load-instagram-layout.php');  
}
else{
/*$img = $vm['images'][$image_size]['url'];
if($img == ''){
    $lightbox_image = $vm['images']['thumbnail']['url'];
}else{
    $lightbox_image = $vm['images']['standard_resolution']['url'];
}*/
?>
<div class="ap-self-user-feed">
    <div class="thumb-images">
        <header class="thumb-element-header">
            <div class='user'>
                <div class='profile-image'><img scr='<?php echo $vm['user']['profile_picture']; ?>' /></div>
                <div class='user-link'><a href="https://instagram.com/<?php echo $vm['user']['username']; ?>" target='_blank'><?php echo $vm['user']['username']; ?></a></div>
            </div>
            <div class='ap_posted_ago'>
                <?php
                $oldTime = $vm['created_time'];
                echo InstaWCD:: xTimeAgo($oldTime); ?>
            </div>

            <div class="featimg">
                <?php if($vm['type'] == 'video'){
                    ?>
                    <video width="480" height="480" controls>
                        <source src="<?php echo $vm['videos']['low_bandwidth']['url']; ?>" type="video/mp4"/>
                        </video>
                        <?php }else{ ?>
                        <a class="example-image-link" href="<?php echo esc_url($img); ?>">
                            <img class="the-thumb" src="<?php echo esc_url($image); ?>">
                        </a>
                        <?php } ?>
                    </div>

                    <div class='ap-follow-me'>
                        <span class="follow">Follow <a href='https://instagram.com/<?php echo $vm['user']['username']; ?>' target='_blank'><?php echo $vm['user']['username']; ?></a></span>
                        <span class="follow_icon"> <img src="<?php echo $flow_icon; ?>"/> </span>
                    </div>
                    <?php
                // $media_comments = $insta->getComments($vm['id']);
                // $insta->displayComments($media_comments, '4');
                    ?>
                </header>
                <?php if ($image_likes_count == '1') : ?>
                    <!-- Image like count section start -->
                    <span class="ap_insta_like_count">
                        <p class="instagram_imge_like">
                            <span class="insta like_image">
                                <i class="fa fa-heart fa-2x"></i>
                            </span>

                            <span class="count"><?php echo $likes = $vm['likes']['count']; ?></span>
                        </p>
                    </span>
                    <!-- Image like count section end -->
                <?php endif; ?>

                <!-- Image comment count section -->
                <?php if($image_comments_count == '1'): ?>
                    <span class='ap_insta_comment_count_wrapper'>
                        <p class="ap_insta_comment_count">
                            <span class='insta comment_count'>
                                <i class='fa fa-comment fa-2x'></i>
                            </span>
                            <span class='ap_insta_count'><?php echo $vm['comments']['count']; ?></span>
                        </p>
                    </span>
                <?php endif; ?>
                <!-- Image comment count section end -->
                <!-- Image comments section ends -->
                <a href='<?php echo $link; ?>' target='_blank'>View on Instagram</a>
                <span class="image-caption"><?php echo $captiontext; ?></span>
                <span class='created-time'><?php echo date('F j, Y, g:i a', $vm['created_time']); ?></span>
            </div>
        </div>

        <?php
    }
}
endforeach;
}
if(isset($lightbox_layout) && $lightbox_layout != "apif_own_lightbox" && $lightbox_layout != ""){
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            <?php
            switch ($lightbox_layout) {
                
                case 'nivo_lightbox':
                ?>
            // for nivo lightbox
            $('a').nivoLightbox({
                effect: 'fade',                             // The effect to use when showing the lightbox
                theme: 'default',                             // The lightbox theme to use
                keyboardNav: true,                             // Enable/Disable keyboard navigation (left/right/escape)
                clickOverlayToClose: true,                    // If false clicking the "close" button will be the only way to close the lightbox
                onInit: function(){},                         // Callback when lightbox has loaded
                beforeShowLightbox: function(){},             // Callback before the lightbox is shown
                afterShowLightbox: function(lightbox){},     // Callback after the lightbox is shown
                beforeHideLightbox: function(){},             // Callback before the lightbox is hidden
                afterHideLightbox: function(){},             // Callback after the lightbox is hidden
                onPrev: function(element){},                 // Callback when the lightbox gallery goes to previous item
                onNext: function(element){},                 // Callback when the lightbox gallery goes to next item
                errorMessage: 'The requested content cannot be loaded. Please try again later.' // Error message when content can't be loaded
            });

            <?php
            break;

            case 'preety_photo': ?>
            // for prettyphoto
            $("area[rel^='prettyPhoto']").prettyPhoto();
            $(".ap_feeds:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'slow',theme:'light_square',slideshow:10000, autoplay_slideshow: false});
            <?php
            break;

            case 'swipe_box': ?>
            // for swipebox
            $( '.apif-swipebox' ).swipebox({
                useCSS : true, // false will force the use of jQuery for animations
                useSVG : true, // false to force the use of png for buttons
                initialIndexOnArray : 0, // which image index to init when a array is passed
                hideCloseButtonOnMobile : false, // true will hide the close button on mobile devices
                hideBarsDelay : 3000, // delay before hiding bars on desktop
                videoMaxWidth : 1140, // videos max width
                beforeOpen: function() {}, // called before opening
                afterOpen: null, // called after opening
                afterClose: function() {}, // called after closing
                loopAtEnd: false // true will return to the first image after the last image is reached
            });

            <?php
            break;

            case 'litbx_lightbox': ?>
            // for litbx gallery
            $(".litbx").litbx({padding: 10});
            <?php 
            break;

            case 'classic':
            break;

            case 'venobox_lightbox': ?>
            // default settings
            $('.apif-venobox').venobox({
                // framewidth: '300px',
                // frameheight: '250px',
                border: '6px',
                bordercolor: '#ba7c36',
                numeratio: true
            });
            <?php
            break;

            default:
            # code...
            break;
        }
        ?>
    });
</script>
<?php
}
if( $feed_type == "recent_media"){
    if(!isset($ins_media['pagination']['next_url'])){ ?>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            setTimeout(function() {
                var ref_random_num = <?php echo sanitize_text_field( $_POST['random_num'] );?>;
                $('.apif-load-more-button[data-random-num="'+ref_random_num+'"]').attr('style', 'display:none;');
            }, 200);
        });
    </script>
    <?php }else{
        $data_count = count($ins_media['data']);
        if(isset($_POST['data_index_num_last'])){
            $data_index_num_last = $_POST['data_index_num_last'] + $data_count;
        }
        ?>
        <script type="text/javascript">
            var next_url = "<?php echo $ins_media['pagination']['next_url']; ?>";
            var data_index_num_last = "<?php echo $data_index_num_last; ?>";
            var ref_random_num = <?php echo sanitize_text_field( $_POST['random_num'] );?>;
            jQuery(document).ready(function($){
                $('.apif-load-more-button[data-random-num="'+ref_random_num+'"]').attr( 'data-pagination-link', next_url);
                $('.apif-load-more-button[data-random-num="'+ref_random_num+'"]').attr( 'data-index-num-last', data_index_num_last);
            });

        </script>
        <?php }
}
die();