<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); 
if (isset($uab_twitter_status) && !empty($uab_twitter_status)) {
	if($uab_template_type == 'uab-template-5'){
		?>
		<div class="uab-post-header"><?php esc_html_e($uab_profile_data[$key]['uab_tab_name']);?></div>
		<?php
	}
?>
<?php if($uab_template_type == 'uab-template-6'):?>
<div class="uab-content-header">
	<div class="uab-tab-header"><?php esc_html_e($uab_profile_data[$key]['uab_tab_name']);?></div>
</div>
<div class="uab-clearfix">
	<div class="uab-content-mid <?php if($uab_template_type == 'uab-template-6') esc_attr_e('uab-clearfix');?>">
		<div class="uab-content-mid-inner-1">
			<?php
			if($uab_template_type == 'uab-template-6'){
				include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-image.php');
				include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-name.php');
			}
			?>
		</div>
		<div class="uab-content-mid-inner-2">
			<div class="uab-content-temp-wrapper">
<?php endif;?>
<div class="uab-twitter-wrapper uab-social-feed-wrapper <?php if( $uab_template_type == 'uab-template-5'||$uab_template_type == 'uab-template-8'||$uab_template_type == 'uab-template-11'||$uab_template_type == 'uab-template-14'||$uab_template_type == 'uab-template-15'||$uab_template_type == 'uab-template-16'||$uab_template_type == 'uab-template-17'||$uab_template_type == 'uab-template-18'||$uab_template_type == 'uab-template-19') echo 'uab-social-temp-wrapper-3 uab-clearfix';?>">
<?php
$username = isset( $uab_profile_data[$key]['uab_twitter_username']) ? esc_attr( $uab_profile_data[$key]['uab_twitter_username'] ) : 'apthemes';
$total_feed = isset( $uab_profile_data[$key]['uab_twitter_feed_number']) ? esc_attr( $uab_profile_data[$key]['uab_twitter_feed_number'] ) : '1';
$tweets = $this->get_twitter_tweets($username, $total_feed);

if(!empty($tweets)){
	foreach ($tweets as $tweet) {
		foreach ($tweet as $tw){
			if(isset($tw->message) && $tw->message != ''){
				$tweets_error = $tw->message;
			}
		}
	}
}

if(isset($tweets_error)){ 
	esc_html_e($tweets_error);
}else{
	include(UAB_PATH . '/inc/frontend/frontend-twitter-feeds/modules/uab-modues-1.php');
}
?>
</div>
<?php if($uab_template_type == 'uab-template-6'):?>
			</div>
		</div>
	</div>
</div>
<?php endif;
	}
?>