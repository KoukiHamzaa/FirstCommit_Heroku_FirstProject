<?php
if($vm['type'] == 'video'){
   $video_link = $vm['videos']['low_bandwidth']['url'];
   ?>
  <a href='#inline-1-<?php echo $vm['created_time']; ?>'  rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo strip_tags(substr($captiontext, 0, 20)); ?>" class="hoverlay-link" width='420' height='300'><i class="fa fa-search"></i></a>
  <div id="inline-1-<?php echo $vm['created_time']; ?>" style="display:none;">
       <video controls>
        <source src="<?php echo $video_link; ?>" type="video/mp4">
        Your browser does not support the video tag.
      </video> 
  </div>
  <?php }else{ ?>
  <a href='<?php echo esc_url($image); ?>'  rel="prettyPhoto[apif-preetyphoto-lightbox]" title="<?php echo strip_tags(substr($captiontext, 0, 20)); ?>" class="hoverlay-link"><i class="fa fa-search"></i></a>
  <?php
}?>