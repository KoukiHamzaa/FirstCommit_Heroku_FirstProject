<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
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
<?php if($uab_template_type == 'uab-template-14'):?>
<div class="uab-defaut-tab uab-clearfix">	
<div class="uab-content-temp-wrapper">
<?php 
	include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-image.php');
	include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-name.php');
?>
</div>
<div class="uab-front-content">
<?php endif;?>
<div class="uap-contact-form-wrapper">
	<?php
	if($uab_template_type == 'uab-template-5'){
		?>
		<div class="uab-post-header"><?php esc_html_e($uab_profile_data[$key]['uab_tab_name']);?></div>
		<?php
	}
	?>
	<?php
		if(isset($uab_profile_data[$key]['uab_contact_type_selection'])){
			switch($uab_profile_data[$key]['uab_contact_type_selection']){
				case 'uab_shortcode_contact_form':
					if(!empty($uab_contact_shortcode[$key])){
						echo do_shortcode( $uab_contact_shortcode[$key]);
					}
					else{
						esc_html_e('No shortcode placed.','ultimate-author-box');
					}
				break;
				default:
				?>
				<form class="uab-contact-form" method="post" action="">
					<input type="hidden" class="uab-to-field" value="<?php (!empty($uab_profile_data[$key]['uab_send_to_email']))?esc_attr_e($uab_profile_data[$key]['uab_send_to_email']):esc_attr_e(the_author_meta( 'email', $author_id));?>">
					<?php
					switch($uab_template_type){
						case 'uab-template-1':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-2':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-3':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-4':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-5':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-6':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-7':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-8':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-9':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-10':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-11':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-12':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-13':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-14':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-15':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-16':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-17':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-18':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						case 'uab-template-19':
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
						break;
						default:
						include(UAB_PATH . '/inc/frontend/frontend-contact-form/modules/uab-modues-1.php');
					}if(!($uab_template_type == 'uab-template-3' || $uab_template_type == 'uab-template-5'|| $uab_template_type == 'uab-template-7'|| $uab_template_type == 'uab-template-10'||$uab_template_type == 'uab-template-11'|| $uab_template_type == 'uab-template-14'|| $uab_template_type == 'uab-template-18'|| $uab_template_type == 'uab-template-19')):
					?>
					<div class="uab-contact-form-submit">
						<input type="submit" class="uab-contact-submit" value="<?php echo (isset($uab_profile_data[$key]['uab_submit_btn_label']) && !empty($uab_profile_data[$key]['uab_submit_btn_label']))?esc_attr($uab_profile_data[$key]['uab_submit_btn_label']):esc_html_e('Submit','ultimate-author-box'); ?>"><img src="<?php echo esc_url( admin_url() . '/images/loading.gif' ); ?>" class="uab-ajax-loader" style="display: none;">
					</div>
					<!-- Success Message -->
        			<div class="uap-success-message" style="display: none;"><?php esc_html_e( $uab_profile_data[$key]['uab_submission_message'] ); ?></div>
        		<?php endif;?>
				</form><!--End of Form-->
				<?php
			}
		}
	?>
</div><!-- End of uap-contact-form-wrapper -->
<?php if($uab_template_type == 'uab-template-14'):?>
	</div>
</div>
<?php endif;?>	
<?php if($uab_template_type == 'uab-template-6'):?>
			</div>
		</div>
	</div>
</div>
<?php endif;?>