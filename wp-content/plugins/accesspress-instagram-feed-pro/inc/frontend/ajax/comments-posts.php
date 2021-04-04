<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
//$this->displayArr($comments);
if(isset($comments)):
    if(!empty($comments)){ ?>
    <div class="apif-com-wrap" id="apif-scroll-style-14">
    <ul class="apif-comment-section-wrap">
      <?php
     	foreach ($comments as $key => $value) {
     		$comments = $value['comments'];
     		?>
           <li><div class="apif-comment-row">
	           <?php 
	           if(isset($value['additional']) && !empty($value['additional'])){
	           	    $additional = unserialize($value['additional']);
	           		$username = esc_attr($additional['username']);
	           		$user_link = 'https://instagram.com/'.$username;
	           		$profile_picture = $additional['profile_picture'];?>
		             <a href="<?php echo $user_link;?>">
                     <div class="apif-commenter-user-image"><img src="<?php echo $profile_picture;?>"/></div>
		                 <b><?php echo $username;?></b>
                </a>
	           		<?php
	           } ?>
             <span><?php echo $comments;?></span>
	         </div>
           </li>
     		<?php
     	}
     ?>
	</ul>
  </div>
    <div class="view-more-comments">
     <a href="<?php echo esc_url($link);?>" target="_blank"><?php _e('View More Comments','accesspress-instagram-feed-pro');?></a>
     </div>
	<?php
     }else{
       ?>
      <span class="apif-comment-null">
      	<?php _e('No any comments available for this feed','accesspress-instagram-feed-pro'); ?>
      </span>
     <?php
     }
	endif;
?>
