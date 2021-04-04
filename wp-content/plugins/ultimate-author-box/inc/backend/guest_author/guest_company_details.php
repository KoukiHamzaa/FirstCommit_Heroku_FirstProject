<?php defined('ABSPATH') or die('No script for you') ?>
<div class="uab-guest-author-details-form-wrapper">
	<div class="uab-guest-details-group">
		<div class="uab-guest-form-field">
			<label><?php esc_attr_e('Company Name','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<input type="text" name="uab_guest_detail[company][name]" value="<?=isset($guest_details['company']['name'])?esc_attr($guest_details['company']['name']):'' ?>"/>
			</div>
		</div>
		<div class="uab-guest-form-field">
			<label><?php esc_attr_e('Company URL','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<input type="url" name="uab_guest_detail[company][url]" value="<?=isset($guest_details['company']['url'])?esc_attr($guest_details['company']['url']):'' ?>"/>
			</div>
		</div>
		<div class="uab-guest-form-field">
			<label><?php esc_attr_e('Designation','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<input type="text" name="uab_guest_detail[company][designation]" value="<?=isset($guest_details['company']['designation'])?esc_attr($guest_details['company']['designation']):'' ?>"/>
			</div>
		</div>
		<div class="uab-guest-form-field">
			<label><?php esc_attr_e('Separator','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<input type="text" name="uab_guest_detail[company][separator]" value="<?=isset($guest_details['company']['separator'])?esc_attr($guest_details['company']['separator']):'' ?>"/>
			</div>
		</div>
		<div class="uab-guest-form-field">
			<label><?php esc_attr_e('Phone Number','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<input type="text" name="uab_guest_detail[company][phone]" value="<?=isset($guest_details['company']['phone'])?esc_attr($guest_details['company']['phone']):'' ?>"/>
			</div>
		</div>
	</div>
</div>