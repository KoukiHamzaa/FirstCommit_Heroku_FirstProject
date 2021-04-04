<?php
$data_source_type = $vm['type'];
if($vm['type'] == 'video'){
$data_source_url = $vm['videos']['low_bandwidth']['url'];
}else {
$data_source_url = $image;
// $data_source_url = $lightbox_image;//slider-layout
}
$data_image_caption = $captiontext; // IF_Pro_Class:: return_string_80_char($vm['caption']['text']);
$likes_count = $vm['likes']['count'];
$format = $counter_type_options;
$likes_count = IF_Pro_Class:: get_formatted_count($likes_count, $format);
$comments_count = $vm['comments']['count'];
$format = $counter_type_options;
$comments_count = IF_Pro_Class::get_formatted_count($comments_count, $format);
$timestamp = $vm['created_time'];
$posted_ago = $insta->xTimeAgo($timestamp);
$instagram_link = $vm['link'];
$data_id = $vm['created_time'];
$if_id =  $attr['id'];
$comments_show = (isset($apif_settings['enable_comments']) && $apif_settings['enable_comments'] == 1)?1:0;
$hover_class = $extra_hover_class;
?><a class="<?php echo $hover_class;?> apif-own-lightbox" href="javascript:void(0);" data-index = '<?php echo esc_attr($index_id); ?>'data-id = '<?php echo esc_attr($if_id); ?>' data-index-id = '<?php echo $index_id; ?>-<?php echo $if_id; ?>' data-source-type= '<?php echo esc_attr($data_source_type); ?>' data-source-url ='<?php echo esc_url($data_source_url); ?>' data-profile-image='<?php echo esc_url($data_profile_image); ?>' data-username = '<?php echo esc_attr($data_username); ?>' data-likes = '<?php echo esc_attr($likes_count); ?>' data-comments = '<?php echo esc_attr($comments_count); ?>' data-posted-ago = '<?php echo esc_attr($posted_ago); ?>' data-instagram-link='<?php echo esc_url($instagram_link); ?>' data-feedid="<?php echo $feed_id;?>"  data-link="<?php echo $link;?>"  data-feedtype="<?php echo $feed_type;?>" data-showcomment="<?php echo $comments_show;?>"><i class="fa fa-search"></i></a> 
<div class="apif-hidden" style="display: none;"><?php echo $captiontext;?></div><textarea class="apif-hidden-carousel" style="display: none;"><?php echo $carousel_arr;?></textarea>