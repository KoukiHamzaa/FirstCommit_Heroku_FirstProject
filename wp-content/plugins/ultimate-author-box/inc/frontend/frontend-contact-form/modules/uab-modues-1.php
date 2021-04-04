<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="uab-contact-first-wrapper">
	<?php 
	if($uab_template_type == 'uab-template-1' || $uab_template_type == 'uab-template-2' || $uab_template_type == 'uab-template-3'|| $uab_template_type == 'uab-template-4' || $uab_template_type == 'uab-template-5'|| $uab_template_type == 'uab-template-6'|| $uab_template_type == 'uab-template-7'|| $uab_template_type == 'uab-template-8'|| $uab_template_type == 'uab-template-9'|| $uab_template_type == 'uab-template-10'|| $uab_template_type == 'uab-template-11'|| $uab_template_type == 'uab-template-12'|| $uab_template_type == 'uab-template-13'|| $uab_template_type == 'uab-template-14'|| $uab_template_type == 'uab-template-15'|| $uab_template_type == 'uab-template-16'|| $uab_template_type == 'uab-template-17'|| $uab_template_type == 'uab-template-18'|| $uab_template_type == 'uab-template-19'){
		include(UAB_PATH . '/inc/frontend/frontend-contact-form/components/uab-contact-name.php');
		include(UAB_PATH . '/inc/frontend/frontend-contact-form/components/uab-contact-email.php');
	}
	if($uab_template_type == 'uab-template-1' || $uab_template_type == 'uab-template-2'|| $uab_template_type == 'uab-template-3'|| $uab_template_type == 'uab-template-4' || $uab_template_type == 'uab-template-5'|| $uab_template_type == 'uab-template-6'|| $uab_template_type == 'uab-template-7'|| $uab_template_type == 'uab-template-8'|| $uab_template_type == 'uab-template-9'|| $uab_template_type == 'uab-template-10'|| $uab_template_type == 'uab-template-11'|| $uab_template_type == 'uab-template-12'|| $uab_template_type == 'uab-template-13'|| $uab_template_type == 'uab-template-14'|| $uab_template_type == 'uab-template-15'|| $uab_template_type == 'uab-template-16'|| $uab_template_type == 'uab-template-17'|| $uab_template_type == 'uab-template-18'|| $uab_template_type == 'uab-template-19'){
		include(UAB_PATH . '/inc/frontend/frontend-contact-form/components/uab-contact-phone.php');
		include(UAB_PATH . '/inc/frontend/frontend-contact-form/components/uab-contact-subject.php');
	}
	?>
</div>
<div class="uab-contact-second-wrapper">
	<?php 
	if($uab_template_type == 'uab-template-1'|| $uab_template_type == 'uab-template-9'|| $uab_template_type == 'uab-template-17'){
		//include(UAB_PATH . '/inc/frontend/frontend-contact-form/components/uab-contact-subject.php');
		include(UAB_PATH . '/inc/frontend/frontend-contact-form/components/uab-contact-message.php');
	}
	if($uab_template_type == 'uab-template-2'|| $uab_template_type == 'uab-template-3'|| $uab_template_type == 'uab-template-4' || $uab_template_type == 'uab-template-5'|| $uab_template_type == 'uab-template-6'|| $uab_template_type == 'uab-template-7'|| $uab_template_type == 'uab-template-8'|| $uab_template_type == 'uab-template-10'|| $uab_template_type == 'uab-template-11'|| $uab_template_type == 'uab-template-12'|| $uab_template_type == 'uab-template-13'|| $uab_template_type == 'uab-template-14'|| $uab_template_type == 'uab-template-15'|| $uab_template_type == 'uab-template-16'|| $uab_template_type == 'uab-template-18'|| $uab_template_type == 'uab-template-19'){
		include(UAB_PATH . '/inc/frontend/frontend-contact-form/components/uab-contact-message.php');
	}
	if($uab_template_type == 'uab-template-3' || $uab_template_type == 'uab-template-5'|| $uab_template_type == 'uab-template-7'|| $uab_template_type == 'uab-template-10'|| $uab_template_type == 'uab-template-11'|| $uab_template_type == 'uab-template-14'|| $uab_template_type == 'uab-template-18'|| $uab_template_type == 'uab-template-19'):?>
	<div class="uab-contact-form-submit">
		<input type="submit" class="uab-contact-submit" value="submit"><img src="<?php echo esc_url( admin_url() . '/images/loading.gif' ); ?>" class="uab-ajax-loader" style="display: none;">
	</div>
	<!-- Success Message -->
	<div class="uap-success-message" style="display: none;"><?php esc_html_e( $uab_profile_data[$key]['uab_submission_message'] ); ?></div>
	<?php endif;?>        			
</div>