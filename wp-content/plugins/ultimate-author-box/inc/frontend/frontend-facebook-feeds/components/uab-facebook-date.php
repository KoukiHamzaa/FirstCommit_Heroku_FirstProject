<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="uab-social-date">
	<!-- <?php var_dump($total_posts[$x]['created_time']);?>	 -->
	<?php 
	$classes = explode("_",$uab_facebook_feeds[$x]['id']);
	$fb_id = $classes[0];
	$fb_post_id = $classes[1];
	$fb_post_link = 'https://www.facebook.com/'.$fb_id.'/posts/'.$fb_post_id;
	//echo $fb_post_link;
	if (!empty($uab_facebook_feeds[$x]['created_time']->date)){
		$readable_date = human_time_diff( strtotime($uab_facebook_feeds[$x]['created_time']->date), current_time( 'timestamp' ) ).' '.__( 'ago','ultimate-author-box');	
		$simple_date = date('M j, Y', strtotime($uab_facebook_feeds[$x]['created_time']->date));
		//echo $uab_facebook_feeds[$x]['created_time']->date;
		if(1){
			?><a href="<?php esc_attr_e($fb_post_link);?>"><?php esc_html_e($readable_date);?></a><?php	
		}else{
			?><a href="<?php esc_attr_e($fb_post_link);?>"><?php esc_html_e($simple_date);?></a><?php
		}
	}
	?>
</div>