<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
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
<div class="uab-facebook-wrapper uab-social-feed-wrapper <?php if( $uab_template_type == 'uab-template-5'||$uab_template_type == 'uab-template-8'||$uab_template_type == 'uab-template-11'||$uab_template_type == 'uab-template-14'||$uab_template_type == 'uab-template-15'||$uab_template_type == 'uab-template-16'||$uab_template_type == 'uab-template-17'||$uab_template_type == 'uab-template-18'||$uab_template_type == 'uab-template-19') echo 'uab-social-temp-wrapper-3 uab-clearfix';?>">
<?php
$facebook_count = ((isset($uab_profile_data[$key]['uab_facebook_feed_number']) && $uab_profile_data[$key]['uab_facebook_feed_number'] != '')?$uab_profile_data[$key]['uab_facebook_feed_number']:'1');
$facebook_image_url = ((!empty($uab_profile_data[$key]['uab_fb_image']))?$uab_profile_data[$key]['uab_fb_image']:'');
$facebook_profile_url = ((!empty($uab_profile_data[$key]['uab_fb_link']))?$uab_profile_data[$key]['uab_fb_link']:'#');
$facebook_profile_name = ((!empty($uab_profile_data[$key]['uab_fb_name']))?$uab_profile_data[$key]['uab_fb_name']:'');
$uab_facebook_feeds = maybe_unserialize(get_the_author_meta( 'uab_facebook_feeds', $author_id));
//$this->print_array($uab_facebook_feeds);
//$this->print_array($uab_profile_data);
include(UAB_PATH . '/inc/frontend/frontend-facebook-feeds/modules/uab-modues-1.php');
?>
</div>
<?php if($uab_template_type == 'uab-template-6'):?>
			</div>
		</div>
	</div>
</div>
<?php endif;?>