<?php defined('ABSPATH') or die('No script for you') ?>
<div class="uab-guest-author-details-form-wrapper">
	<div class="uab-guest-details-group">
		<div class="uab-guest-form-field">
			<label><?php esc_attr_e('Shape','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<select name="uab_guest_detail[image][shape]">
					<option value="uab_is_circle"><?php esc_attr_e('Circular') ?></option>
					<option value="uab_is_square"><?php esc_attr_e('Square') ?></option>
				</select>
			</div>
		</div>
		<div class="uab-guest-form-field">
			<label><?php esc_attr_e('Choose Image Type','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<select name="uab_guest_detail[image][type]" class="uab_selector_field" id="uab_guest_image_selector">
					<optgroup label="<?php esc_attr_e('Default','ultimate-author-box') ?>"></optgroup>
					<option value="<?=esc_attr('gravatar') ?>" <?php selected((isset($guest_details['image']['type'])?esc_attr($guest_details['image']['type']):''),esc_attr('gravatar')) ?>><?=esc_attr('Gravatar') ?></option>
					<optgroup label="<?php esc_attr_e('Social Profile Image','ultimate-author-box') ?>"></optgroup>
					<option value="<?=esc_attr('facebook') ?>" <?php selected((isset($guest_details['image']['type'])?esc_attr($guest_details['image']['type']):''),esc_attr('facebook')) ?>><?=esc_attr('Facebook') ?></option>
					<option value="<?=esc_attr('instagram') ?>" <?php selected((isset($guest_details['image']['type'])?esc_attr($guest_details['image']['type']):''),esc_attr('instagram')) ?>><?=esc_attr('Instagram') ?></option>
					<option value="<?=esc_attr('twitter') ?>" <?php selected((isset($guest_details['image']['type'])?esc_attr($guest_details['image']['type']):''),esc_attr('twitter')) ?>><?=esc_attr('Twitter') ?></option>
					<optgroup label="<?php esc_attr_e('Custom Image','ultimate-author-box') ?>"></optgroup>
					<option value="<?=esc_attr('custom_image') ?>" <?php selected((isset($guest_details['image']['type'])?esc_attr($guest_details['image']['type']):''),esc_attr('custom_image')) ?>><?php esc_attr_e('Upload Image','ultimate-author-box') ?></option>
				</select>
			</div>
		</div>
		<div class="uab-guest-form-field uab_guest_image_selector uab_facebook_option" style="display:none;">
			<label><?php esc_attr_e('Facebook User Id','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<input type="text" name="uab_guest_detail[image][facebook]" value="<?=isset($guest_details['image']['facebook'])?esc_attr($guest_details['image']['facebook']):'' ?>"/>
			</div>
		</div>
		<div class="uab-guest-form-field uab_guest_image_selector uab_instagram_option" style="display:none;">
			<label><?php esc_attr_e('Instagram Image Id','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<input type="text" name="uab_guest_detail[image][instagram]" value="<?=isset($guest_details['image']['instagram'])?esc_attr($guest_details['image']['instagram']):'' ?>"/>
			</div>
		</div>
		<div class="uab-guest-form-field uab_guest_image_selector uab_twitter_option" style="display:none;">
			<label><?php esc_attr_e('Twitter Username','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<input type="text" name="uab_guest_detail[image][twitter]" value="<?=isset($guest_details['image']['twitter'])?esc_attr($guest_details['image']['twitter']):'' ?>"/>
			</div>
		</div>
		<div class="uab-guest-form-field uab_guest_image_selector uab_custom_image_option" style="display:none;">
			<label><?php esc_attr_e('Upload Custom Image','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<input type="url" name="uab_guest_detail[image][upload_image]" value="<?=isset($guest_details['image']['upload_image'])?esc_attr($guest_details['image']['upload_image']):'' ?>" class="uab_icon_image_id">
				<button type="button" class="button button-primary uab_guest_media_manager" data-input="uab_icon_image_id" data-preview="uab_image_preview" id="uab_profile_image_manager"><?php esc_attr_e('Upload Image','ultimate-author-box') ?></button>
				<img class="uab_image_preview" src="<?php echo isset($guest_details['image']['upload_image'])?esc_url($guest_details['image']['upload_image']):'' ?>" height=100 width=100 />
			</div>
		</div>
	</div>
</div>