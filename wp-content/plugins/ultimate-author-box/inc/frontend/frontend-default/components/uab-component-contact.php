<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="uab-short-contact <?php if($uab_template_type == 'uab-template-6') esc_attr_e('uab-clearfix');?>">
	<?php
	$author_url = get_the_author_meta( 'url', $author_id);
	$author_phone = isset($uab_profile_data[0]['uab_company_phone'])?$uab_profile_data[0]['uab_company_phone']:'';
	$uab_email_disable = isset($uab_profile_data[0]['uab-email-disable'])?1:0;
	
	$author_website_label = (!empty($uab_profile_data[0]['uab_site_label']) && ($uab_template_type!='uab-template-1') && ($uab_template_type!='uab-template-17'))?esc_attr($uab_profile_data[0]['uab_site_label']):$author_url;

	$author_phone_label = (!empty($uab_profile_data[0]['uab_phone_label']) && ($uab_template_type!='uab-template-1') && ($uab_template_type!='uab-template-17'))?esc_attr($uab_profile_data[0]['uab_phone_label']):$author_phone;

	$author_email_label = (!empty($uab_profile_data[0]['uab_email_label']) && ($uab_email_disable == 0) && ($uab_template_type!='uab-template-1') && ($uab_template_type!='uab-template-17'))?esc_attr($uab_profile_data[0]['uab_email_label']):(esc_html($this->encode_email(get_the_author_meta( 'email', $author_id))));

	if($uab_template_type == 'uab-template-15'){
		?>
		<span class="uab-contact-label"><?php esc_html_e('contact me','ultimate-author-box');?></span>
		<?php
	}
	?>
	<?php if(!empty($author_url)):?>
	<?php if($uab_template_type != 'uab-template-6'):?>
		<div class="uab-contact-inner">
		<?php endif;?>
		<?php
		if (!empty($author_url)){
			if($uab_template_type == 'uab-template-1' || $uab_template_type == 'uab-template-17'){
				?>
				<span class="uab-contact-label"><?php echo !empty($uab_profile_data[0]['uab_site_label'])?esc_attr($uab_profile_data[0]['uab_site_label']):esc_html__('web','ultimate-author-box');?></span>
				<?php	
			}
			?>
			<?php if($uab_template_type == 'uab-template-6'):?>
				<div class="uab-contact-inner">
				<?php endif;?>
				<div class="uab-user-website">
					<a href="<?php esc_attr_e($author_url); ?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>"><?php esc_html_e($author_website_label); ?></a>
				</div>
				<?php if($uab_template_type == 'uab-template-6'):?>
				</div>
			<?php endif;?>


			<?php
		}?>
		<?php if($uab_template_type != 'uab-template-6'):?>
		</div>
	<?php endif;?>
	<?php endif;?>
	<?php if(!$uab_email_disable):?>
		<?php if (isset($uab_general_settings['uab_disable_email']) && ($uab_general_settings['uab_disable_email'] == 0) ): ?>
				<div class="uab-contact-inner">
					<?php
					if($uab_template_type == 'uab-template-1' || $uab_template_type == 'uab-template-17'){
						?>
						
						<span class="uab-contact-label"><?php echo !empty($uab_profile_data[0]['uab_email_label'])?esc_attr($uab_profile_data[0]['uab_email_label']):esc_html__('email','ultimate-author-box');?></span>
						<?php	
					}
					?>
					<div class="uab-user-email">
						<a href="mailto:<?php esc_attr_e(the_author_meta( 'email', $author_id)); ?>"><?=$author_email_label ?></a>
					</div>
				</div>
		<?php endif ?>
	<?php endif;?>
	<?php if(!empty($author_phone)):?>
	<?php if($uab_template_type != 'uab-template-6'):?>
		<div class="uab-contact-inner">
		<?php endif;?>
		<?php

		if(!empty($author_phone)){
		if($uab_template_type == 'uab-template-1' || $uab_template_type == 'uab-template-17'){
			?>
			
			<span class="uab-contact-label"><?php echo !empty($uab_profile_data[0]['uab_phone_label'])?esc_attr($uab_profile_data[0]['uab_phone_label']):esc_html__('call','ultimate-author-box');?></span>
			<?php	
		}?>
			<?php if($uab_template_type == 'uab-template-6'):?>
				<div class="uab-contact-inner">
				<?php endif;?>
				<div class="uab-user-phone">
					<a href="tel:<?php esc_attr_e($author_phone); ?>"><?php esc_html_e($author_phone_label);?></a>
				</div>
				<?php if($uab_template_type == 'uab-template-6'):?>
				</div>
			<?php endif;?>
			<?php
		}
		?>
		<?php if($uab_template_type != 'uab-template-6'):?>
		</div>
	<?php endif;?>
	<?php endif;?>
</div>