<?php
if($layout == 'filter_template3'){
	$clearfixclass = '';
}else{
	$clearfixclass = 'clearfix';
}
?>
<div class="coment-like" <?php if(isset($hover_image_text_color) && $hover_image_text_color != '') echo 'style="color:'.$hover_image_text_color.'"';?>>
<?php if (isset($like_count) && $like_count == '1') : ?><span class="ap_insta_like_count <?php echo $clearfixclass;?>"><span class="ap-instagram_imge_like"><span class="ap-insta like_image"><i class="fa fa-heart"></i></span><?php
        $count = $vm['likes']['count'];
        $format = $counter_type_options;
        $likes_count = IF_Pro_Class:: get_formatted_count($count, $format); 
        ?><span class="count"><?php echo $likes_count; ?></span></span></span><?php endif; ?>
<?php if(isset($comment_count) && $comment_count == '1'): ?><span class='ap_insta_comment_count_wrapper <?php echo $clearfixclass;?>'><span class="ap_insta_comment_count"><span class='insta comment_count'><i class='fa fa-comment'></i></span><?php
        $count = $vm['comments']['count'];
        $format = $counter_type_options;
        $comments_count = IF_Pro_Class:: get_formatted_count($count, $format); ?><span class='ap_insta_count'><?php echo $comments_count; ?></span></span></span><?php endif; ?><?php if($layout == "masonry_layout3" || $layout == "masonry_layout4" || $layout == "filter_template3"){?><span class='ap_posted_ago'><?php
         $oldTime = $vm['created_time'];
        echo $insta->xTimeAgo($oldTime); ?></span><?php } ?></div>