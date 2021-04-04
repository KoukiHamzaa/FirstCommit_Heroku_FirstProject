<?php if($social_share_enable){?>
<div class="apif-share-wrapper">
<i class="fa fa-share-alt" aria-hidden="true"></i>Share

<div class="apif-share-wrap">
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
<?php } ?>
</div>
</div>
</div>
<?php } ?>