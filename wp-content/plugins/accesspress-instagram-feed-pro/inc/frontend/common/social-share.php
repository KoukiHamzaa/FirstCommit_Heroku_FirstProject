<?php 
if($social_share_enable){?>
<div class="apifeeds-social-icon-wrap">
<?php if($facebook_icon){ ?>
<a rel="nofollow" title="Share on Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $link;?>">
  <i class="fa fa-facebook" aria-hidden="true"></i>
</a>
<?php } ?>
<?php if($twiter_icon){ ?>
<a rel="nofollow" title="Tweet on Twitter" target="_blank" href="https://twitter.com/intent/tweet?text=<?php echo strip_tags(substr($captiontext, 0, 20)); ?>&url=<?php echo $link;?>">
  <i class="fa fa-twitter" aria-hidden="true"></i>
</a>
<?php } ?>
<?php if($google_plus_icon){ ?>
<a rel="nofollow" title="Share on Google Plus" target="_blank" href="https://plus.google.com/share?url=<?php echo $link;?>">
  <i class="fa fa-google-plus" aria-hidden="true"></i>
</a>
<?php }?>
<?php if($pinterest_icon){ ?>
<a href="http://pinterest.com/pin/create/button/?url=<?php echo $link;?>" target="_blank" rel="nofollow">
  <i class="fa fa-pinterest" aria-hidden="true"></i>
</a>
<!-- <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
  <i class="fa fa-pinterest" aria-hidden="true"></i>
</a> -->
<?php } ?>
</div>
<?php }
?>