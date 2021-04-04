<!-- for venobox start-->
<?php if($vm['type'] == 'video'){ 
    $video_link = $vm['videos']['low_bandwidth']['url'];
?>
        <a class="hoverlay-link apif-venobox" href="#inline-2-<?php echo $vm['created_time']; ?>" data-type="inline" title='<?php echo strip_tags(substr($captiontext, 0, 20)); ?>' data-gall="apif-Gallery" ><i class="fa fa-search"></i></a>
        <div id="inline-2-<?php echo $vm['created_time']; ?>" style="display:none; background:#fff; width:100%; height:100%; float:left; padding:10px;">
         <video controls>
          <source src="<?php echo $video_link; ?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
        </div>
<?php }else{
    $image_link = $image; ?>
        <a class="hoverlay-link apif-venobox" href="<?php echo $image; ?>" title='<?php echo strip_tags(substr($captiontext, 0, 20)); ?>' data-gall="apif-Gallery" ><i class="fa fa-search"></i></a>
<?php } ?>
<!-- for venobox end-->