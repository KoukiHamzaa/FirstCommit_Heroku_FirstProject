<?php defined('ABSPATH') or die('No scripts for you') ?>
<?php
	$uab_co_author_display_type = get_post_meta(get_the_ID(),'uab_co_author_display_type',true);
	$uab_co_author_display_type = ($uab_co_author_display_type == 'grid')?($uab_co_author_display_type . ' clearfix'):$uab_co_author_display_type;
?>
<div class="uab-co-author-<?=isset($uab_co_author_display_type)?esc_attr($uab_co_author_display_type):'list' ?>">
	<label class="uab-co-author-header"><span><?php echo !empty($uab_coauthor_header_text)?esc_attr($uab_coauthor_header_text):esc_attr__('Co Authors','ultimate-author-box') ?></span></label>
	<?php
	foreach ($uab_co_author as $type => $co_author_array):
		foreach ($co_author_array as $key => $co_author_id):
			if ($type == 'author') {
				$uab_co_author_details = maybe_unserialize(get_the_author_meta( 'uab_profile_data', $co_author_id));
				$uab_co_author_social_icons = maybe_unserialize(get_the_author_meta( 'uab_social_icons', $co_author_id));

				$uab_co_author_general = get_user_by('id',$co_author_id);
				$uab_co_author_name = esc_attr($uab_co_author_general->data->display_name);

				$co_author_designation = isset($uab_co_author_details[0]['uab_company_designation'])?esc_attr($uab_co_author_details[0]['uab_company_designation']):'';
				$co_author_company = isset($uab_co_author_details[0]['uab_company_name'])?esc_attr($uab_co_author_details[0]['uab_company_name']):'';
				$co_author_company_url = isset($uab_co_author_details[0]['uab_company_url'])?$uab_co_author_details[0]['uab_company_url']:'';
				$co_author_company_separator = isset($uab_co_author_details[0]['uab_company_separator'])?esc_attr($uab_co_author_details[0]['uab_company_separator']):'';

				$uab_co_author_image_shape = isset($uab_co_author_details[0]['uab_image_shape'])?$uab_co_author_details[0]['uab_image_shape']:'';
				$uab_co_author_image_type = isset($uab_co_author_details[0]['uab_image_select'])?$uab_co_author_details[0]['uab_image_select']:'';
				$uab_co_author_facebook = isset($uab_co_author_details[0]['uab_profile_image_facebook'])?$uab_co_author_details[0]['uab_profile_image_facebook']:'';
				$uab_co_author_instagram = isset($uab_co_author_details[0]['uab_profile_image_instagram'])?$uab_co_author_details[0]['uab_profile_image_instagram']:'';
				$uab_co_author_twitter = isset($uab_co_author_details[0]['uab_profile_image_twitter'])?$uab_co_author_details[0]['uab_profile_image_twitter']:'';
				$uab_co_author_custom_image = isset($uab_co_author_details[0]['uab_upload_image_url'])?$uab_co_author_details[0]['uab_upload_image_url']:'';

				$author_phone = isset($uab_co_author_details[0]['uab_company_phone'])?$uab_co_author_details[0]['uab_company_phone']:'';
				$author_url = get_the_author_meta('url', $co_author_id);
				$uab_email_disable = isset($uab_co_author_details[0]['uab-email-disable'])?1:0;
				$uab_co_author_email = get_the_author_meta( 'email', $co_author_id);
				$numOfPost = __(number_format_i18n( count_user_posts($co_author_id)));

				// $this->print_array($uab_co_author_details);

				include(UAB_PATH . 'inc/frontend/frontend-default/components/co-author/uab-co-author-structure.php');
			}
			elseif ($type == 'guest') {
				$guest_data = get_post($co_author_id);
				$uab_guest_details = get_post_meta($co_author_id,'uab_guest_details',true);
				$uab_co_author_description = intval($guest_data->ID);
				$uab_co_author_name = esc_attr($guest_data->post_title) . ' (' . esc_attr__('Guest','ultimate-author-box') . ')';
				// $this->print_array($uab_guest_details);

				$uab_co_author_social_icons = $uab_guest_details['social'];

				$co_author_designation = $uab_guest_details['company']['designation'];
				$co_author_company = $uab_guest_details['company']['name'];
				$co_author_company_url = $uab_guest_details['company']['url'];
				$co_author_company_spe = $uab_guest_details['company']['separator'];

				$uab_co_author_image_shape = esc_attr($uab_guest_details['image']['shape']);
				$uab_co_author_image_type = ($uab_guest_details['image']['type'] == 'facebook')?'uab_facebook':'';
				$uab_co_author_image_type = ($uab_guest_details['image']['type'] == 'instagram')?'uab_instagram':$uab_co_author_image_type;
				$uab_co_author_image_type = ($uab_guest_details['image']['type'] == 'twitter')?'uab_twitter':$uab_co_author_image_type;
				$uab_co_author_image_type = ($uab_guest_details['image']['type'] == 'custom_image')?'uab_upload_image':$uab_co_author_image_type;
				$uab_co_author_facebook = $uab_guest_details['image']['facebook'];
				$uab_co_author_instagram = $uab_guest_details['image']['instagram'];
				$uab_co_author_twitter = $uab_guest_details['image']['twitter'];
				$uab_co_author_custom_image = $uab_guest_details['image']['upload_image'];

				$author_phone = !empty($uab_guest_details['company']['phone'])?$uab_guest_details['company']['phone']:'';
				$author_url = !empty($uab_guest_details['general']['site'])?$uab_guest_details['general']['site']:'';
				$uab_email_disable = isset($uab_guest_details['general']['disable_email'])?1:0;
				$uab_co_author_email = !empty($uab_guest_details['general']['email'])?$uab_guest_details['general']['email']:'';

				include(UAB_PATH . 'inc/frontend/frontend-default/components/co-author/uab-co-author-structure.php');

			}
		endforeach;
	endforeach;
	?>
</div>