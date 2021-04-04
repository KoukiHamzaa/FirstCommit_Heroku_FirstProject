<?php defined('ABSPATH') or die('No script for you') ?>
<?php //$this->print_array($guest_details) ?>
<div class="uab-guest-author-details-form-wrapper">
	<div class="uab-guest-details-group">
		<?php wp_nonce_field('uab_guest_nonce','uab_guest_nonce_field') ?>
		<div class="uab-guest-form-field">
			<label><?php esc_attr_e('Disable Email','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<input type="checkbox" name="uab_guest_detail[general][disable_email]" value="1" <?php checked((isset($guest_details['general']['disable_email'])?boolval($guest_details['general']['disable_email']):boolval(0)),1) ?>/>
			</div>
		</div>
		<div class="uab-guest-form-field">
			<label><?php esc_attr_e('Email','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<input type="email" name="uab_guest_detail[general][email]" value="<?=isset($guest_details['general']['email'])?esc_attr($guest_details['general']['email']):'' ?>"/>
			</div>
		</div>
		<div class="uab-guest-form-field">
			<label><?php esc_attr_e('Website','ultimate-author-box') ?></label>
			<div class="uab-guest-input-field">
				<input type="url" name="uab_guest_detail[general][site]" value="<?=isset($guest_details['general']['site'])?esc_attr($guest_details['general']['site']):'' ?>"/>
			</div>
		</div>
	</div>
</div>