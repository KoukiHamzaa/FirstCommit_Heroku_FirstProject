<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<!-- <?php 
if (isset($uab_social_icons) && !empty($uab_social_icons)){
	$error_flag="1";
	foreach($uab_social_icons as $key => $val) {
		if (!empty($val['url']))
			$error_flag="0";
	}
}else{
	$error_flag="1";
}
?> -->
<?php if(!($error_flag && $uab_template_type != 'uab-template-8')){?>
<div class="uab-social-icons">
	<?php
	if($uab_template_type == 'uab-template-1' || $uab_template_type == 'uab-template-15'){
		?>
		<?php if(!empty($uab_social_icons)):?>
			<span class="uab-contact-label"><?php esc_html_e('follow me','ultimate-author-box');?></span>
		<?php endif;?>
		<?php	
	}
	?>
	<ul id="uap-social-outlets-fields">
		<?php
		$uab_social_icons = maybe_unserialize(get_the_author_meta( 'uab_social_icons', $author_id));
		if(!empty($uab_social_icons)){
			foreach($uab_social_icons as $socialname => $innerarray){ 
				if(!empty($uab_social_icons[$socialname]['url'])){
					$uab_font_type = 'fab';
						if( $uab_social_icons[$socialname]['icon'] == 'rss'){
							$uab_font_type = 'fas';
						}
					?>
					<li class="uab-icon-<?php esc_attr_e($uab_social_icons[$socialname]['label']);?>">
						<a href="<?php esc_attr_e($uab_social_icons[$socialname]['url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>" rel="nofollow noopener">
							<i class="<?php esc_attr_e($uab_font_type); ?> fa-<?php esc_attr_e($uab_social_icons[$socialname]['icon']);?>"></i>
						</a>
						<?php if($uab_template_type == 'uab-template-8'):?>
							<div class="uab-frontend-tooltip"><?php esc_attr_e($uab_social_icons[$socialname]['url']);?></div>
						<?php endif;?>
					</li>
					<?php
				}
			}
		}
		?>
		<?php if($uab_template_type == 'uab-template-8'){
			$author_phone = isset($uab_profile_data[0]['uab_company_phone'])?$uab_profile_data[0]['uab_company_phone']:'';
			?>
			<?php 
			$author_url = get_the_author_meta('url', $author_id);
			$uab_email_disable = isset($uab_profile_data[0]['uab-email-disable'])?1:0;
			if(!empty($author_url)){?>
				<li class="uab-icon-web">
					<a href="<?php esc_attr_e(get_the_author_meta( 'url', $author_id)); ?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>">
						<i class="fa fa-globe"></i>
					</a>
					<div class="uab-frontend-tooltip"><?php esc_html_e(the_author_meta( 'url', $author_id)); ?></div>
				</li>
			<?php }?>
			<?php if(!$uab_email_disable):?>
			<li class="uab-icon-mail">
				<a href="javascript:void(0)">
					<i class="fa fa-envelope"></i>
				</a>
				<div class="uab-frontend-tooltip"><?php esc_html_e(the_author_meta( 'email', $author_id)); ?></div>
			</li>
			<?php endif;?>
			<?php if(!empty($author_phone)):?>
				<li class="uab-icon-phone">
					<a href="javascript:void(0)">
						<i class="fa fa-phone"></i>
					</a>
					<div class="uab-frontend-tooltip"><?php esc_html_e($author_phone); ?></div>
				</li>
			<?php endif;?>
		<?php }?> 
	</ul>
</div>
<?php }?>