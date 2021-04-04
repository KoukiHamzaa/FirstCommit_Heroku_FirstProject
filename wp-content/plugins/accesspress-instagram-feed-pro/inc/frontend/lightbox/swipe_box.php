<?php
if($vm['type'] == 'video'){
    $video_link = $vm['videos']['low_bandwidth']['url'];
?>
<a href='<?php echo esc_url($video_link); ?>?swipeboxVideo=1' class="hoverlay-link apif-swipebox" title='<?php echo strip_tags(substr($captiontext, 0, 20)); ?>'><i class="fa fa-search"></i></a>
<?php }else { ?>
<a href='<?php echo esc_url($image); ?>' class="hoverlay-link apif-swipebox" title='<?php echo strip_tags(substr($captiontext, 0, 20)); ?>'><i class="fa fa-search"></i></a>
<?php } ?>
<!-- for swipe box ends -->