<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
if($uab_template_type == 'uab-template-5' || $uab_template_type == 'uab-template-11' || $uab_template_type == 'uab-template-19'  ){
	?>
	<?php if(!empty($uab_profile_data[0]['uab_company_designation']) || !empty($uab_profile_data[0]['uab_company_separator']) || !empty($uab_profile_data[0]['uab_company_name'])):?>
	<div class="uab-company-info">
		<?php if(!empty($uab_profile_data[0]['uab_company_designation'])):?>
		<span class="uab-company-designation">
			<?php esc_html_e($uab_profile_data[0]['uab_company_designation']);?>
		</span>
		<?php endif;?>
		<?php
		$uab_influence_target_link = intval(get_the_author_meta('uab_frontend_target_ranking',$author_id));
		$follow_var = ($uab_influence_target_link == intval(1))?('rel="' . esc_attr("nofollow noopener") . '"'):('');

		if (!empty($uab_profile_data[0]['uab_company_url'])){
			if(!($uab_template_type == 'uab-template-17')){
				?><span class="uab-designation-separator"><?php
				isset($uab_profile_data[0]['uab_company_separator'])?esc_html_e($uab_profile_data[0]['uab_company_separator']):esc_html_e(' at','ultimate-author-box');?></span><?php
			}
			?>
			<a href="<?php esc_attr_e($uab_profile_data[0]['uab_company_url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>" <?=$follow_var ?>><?php esc_html_e($uab_profile_data[0]['uab_company_name']);?></a>
			<?php
		}
		?>
	</div>
	<?php endif; ?>
	<div class="uab-display-name">
		<!-- User Display Name -->
		<?php if (isset($uab_profile_data[0]['uab-author-url-disable'])): ?>
			<span><?php esc_html_e(the_author_meta( 'display_name', $author_id)); ?></span>
		<?php else: ?>
			<a href="<?php esc_attr_e(get_author_posts_url($author_id));?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>"><?php esc_html_e(the_author_meta( 'display_name', $author_id)); ?></a>
		<?php endif ?>
	</div>
	<?php
}elseif($uab_template_type == 'uab-template-17'){?>
	<?php if(!empty($uab_profile_data[0]['uab_company_designation']) || !empty($uab_profile_data[0]['uab_company_separator']) || !empty($uab_profile_data[0]['uab_company_name'])):?>
<div class="uab-company-info">
	<span class="uab-company-designation">
		<?php esc_html_e($uab_profile_data[0]['uab_company_designation']);?>
	</span><?php
	if (!empty($uab_profile_data[0]['uab_company_url'])){
			?><span class="uab-designation-separator"><?php
				isset($uab_profile_data[0]['uab_company_separator'])?esc_html_e($uab_profile_data[0]['uab_company_separator']):esc_html_e(' at','ultimate-author-box');?></span><?php
		
				$uab_influence_target_link = intval(get_the_author_meta('uab_frontend_target_ranking',$author_id));
				$follow_var = ($uab_influence_target_link == intval(1))?('rel="' . esc_attr("nofollow noopener") . '"'):('');
		?>
		<a href="<?php esc_attr_e($uab_profile_data[0]['uab_company_url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>" <?=$follow_var ?>><?php esc_html_e($uab_profile_data[0]['uab_company_name']);?></a>
		<?php
	}
	?>
</div>
<?php endif;?>
<div class="uab-content-temp-wrapper uab-clearfix">
	<div class="uab-display-name">
		<!-- User Display Name -->
		<?php if (isset($uab_profile_data[0]['uab-author-url-disable'])): ?>
			<span><?php esc_html_e(the_author_meta( 'display_name', $author_id)); ?></span>
		<?php else: ?>
			<a href="<?php esc_attr_e(get_author_posts_url($author_id));?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>"><?php esc_html_e(the_author_meta( 'display_name', $author_id)); ?></a>
		<?php endif ?>
	</div>
	<?php include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-social.php'); ?>
</div>

<?php
}
else{
	?>
	<div class="uab-display-name">
		<!-- User Display Name -->
		<?php if (isset($uab_profile_data[0]['uab-author-url-disable'])): ?>
			<span><?php esc_html_e(the_author_meta( 'display_name', $author_id)); ?></span>
		<?php else: ?>
			<a href="<?php esc_attr_e(get_author_posts_url( $author_id));?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>"><?php esc_html_e(the_author_meta( 'display_name', $author_id)); ?></a>
		<?php endif ?>
		
		<?php
		if($uab_template_type == 'uab-template-1' || $uab_template_type == 'uab-template-12'){
			$user_meta=get_userdata($author_id);
			$user_roles=$user_meta->roles;

			//$this->print_array($user_roles);
			$user_role_lists = $this->get_editable_roles();

			foreach($user_role_lists as $user_role_list => $value){
		//echo $user_role_list;
				foreach($user_roles as $role=>$val){
			//echo $val;
					if($user_role_list == $val){
						?><span class="uab-user-role uab-role-<?php _e($user_role_lists[$user_role_list]['name']);?>"><?php esc_html_e($user_role_lists[$user_role_list]['name'],'ultimate-author-box');?></span><?php
					}
				}
			}
		}?>
	</div>
		<?php if(!empty($uab_profile_data[0]['uab_company_designation']) || !empty($uab_profile_data[0]['uab_company_separator']) || !empty($uab_profile_data[0]['uab_company_name'])):?>
	<div class="uab-company-info">
		<span class="uab-company-designation">
			<?php esc_html_e($uab_profile_data[0]['uab_company_designation']);?>
		</span><?php
		if (!empty($uab_profile_data[0]['uab_company_url'])){
			if(!($uab_template_type == 'uab-template-6' || $uab_template_type == 'uab-template-8' || $uab_template_type == 'uab-template-10' || $uab_template_type == 'uab-template-14')){
				?><span class="uab-designation-separator"><?php
				isset($uab_profile_data[0]['uab_company_separator'])?esc_html_e($uab_profile_data[0]['uab_company_separator']):esc_html_e(' at','ultimate-author-box');?></span><?php
			}
			$uab_influence_target_link = intval(get_the_author_meta('uab_frontend_target_ranking',$author_id));
			$follow_var = ($uab_influence_target_link == intval(1))?('rel="' . esc_attr("nofollow noopener") . '"'):('');
			?>
			<a href="<?php esc_attr_e($uab_profile_data[0]['uab_company_url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>" <?=$follow_var ?>><?php esc_html_e($uab_profile_data[0]['uab_company_name']);?></a>
			<?php
		}
		?>
	</div>
	<?php endif;?>
	<?php
}
