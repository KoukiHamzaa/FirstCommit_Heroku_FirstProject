<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php if ( !empty($uab_profile_data[$key]['uab_phone_label'] )): ?>
	<div class="uab-field-wrap uab-contact-phone">
		<?php
		if($uab_template_type == 'uab-template-1'|| $uab_template_type == 'uab-template-4'|| $uab_template_type == 'uab-template-9'|| $uab_template_type == 'uab-template-17'){
			?>
			<label><?php esc_html_e( $uab_profile_data[$key]['uab_phone_label'] ); ?></label>
			<?php
		}?>
		<div class="uab-field">
			<input type="tel" class="uab-phone-field" name="uab_contact_field[phone]" <?php 
				if($uab_template_type == 'uab-template-3'||$uab_template_type == 'uab-template-2'||$uab_template_type == 'uab-template-5'|| $uab_template_type == 'uab-template-6'|| $uab_template_type == 'uab-template-7'|| $uab_template_type == 'uab-template-8'|| $uab_template_type == 'uab-template-10'|| $uab_template_type == 'uab-template-11'|| $uab_template_type == 'uab-template-12'|| $uab_template_type == 'uab-template-13'|| $uab_template_type == 'uab-template-14'|| $uab_template_type == 'uab-template-15'|| $uab_template_type == 'uab-template-16'|| $uab_template_type == 'uab-template-18'|| $uab_template_type == 'uab-template-19')
					echo 'placeholder='.$uab_profile_data[$key]['uab_phone_label'];
				?>>
				<?php if($uab_template_type == 'uab-template-2'|| $uab_template_type == 'uab-template-6'|| $uab_template_type == 'uab-template-8'|| $uab_template_type == 'uab-template-12'|| $uab_template_type == 'uab-template-13'):?><i class="fa fa-phone"></i><?php endif;?>
		</div>
	</div>
<?php endif; ?>