<?php 
defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); 
$rss_url = ((isset($uab_profile_data[$key]['uab_rss_url']) && $uab_profile_data[$key]['uab_rss_url'] != '')?$uab_profile_data[$key]['uab_rss_url']:'#');
$link_text = ((isset($uab_profile_data[$key]['uab_rss_text']) && $uab_profile_data[$key]['uab_rss_text'] != '')?$uab_profile_data[$key]['uab_rss_text']:'Read More >>');
$link_target = ((isset($uab_profile_data[$key]['uab_link_target']) && $uab_profile_data[$key]['uab_link_target'] != '')?$uab_profile_data[$key]['uab_link_target']:'_blank');
$total_feed = ((isset($uab_profile_data[$key]['uab_rss_feed_number']) && $uab_profile_data[$key]['uab_rss_feed_number'])?$uab_profile_data[$key]['uab_rss_feed_number']:'5');

$new_feeds_result = $this->uab_get_rss_feed($rss_url, $total_feed);
?>
<div class="uab-rss-wrapper">
	<?php 
		if(!empty($new_feeds_result)){
			foreach($new_feeds_result as $item){
		$rss_pin_description = $item->get_description();	
		$title = $item->get_title();
		$date = $item->get_date();
		$content = strip_tags($rss_pin_description);
		$link = $item->get_link();
				?>
				<div class="uab-rss-inner-wrapper">
					<div class="uab-rss-secondary-wrapper">
						<div class="uab-rss-feed-title-wrapper">
							<a href='<?php esc_attr_e($link);?>' class="uab_temp_link" target="<?php esc_attr_e($link_target);?>" title='<?php 
							esc_html_e($title)?>'>
								<?php esc_html_e($title);?>	
							</a>
						</div>
						<div class="uab-rss-feed-date-wrapper">
							<?php esc_html_e(date('M j, Y', strtotime($date)));?>	
						</div>
						<div class="uab-rss-feed-description-wrapper">
							<?php esc_html_e($content);?>
						</div>
					</div>
				</div>
				<?php
			
		}
		}
		else{
			esc_html_e( 'Invalid/Empty RSS URL', 'ultimate-author-box' );
		}
	?>
</div>	