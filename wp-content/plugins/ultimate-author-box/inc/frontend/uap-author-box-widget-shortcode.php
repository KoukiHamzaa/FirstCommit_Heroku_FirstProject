<?php
$uab_shortcode_atts = shortcode_atts( array(
	'author_list' => 1,
	'display_type' => 'template-1',
	'detect_author' => 0,
	'display_author_name' => 1,
	'display_author_designation' => 1,
	'display_author_description' => 1,
	'display_social_icons' => 1 ,
	'display_contacts' => 0 ,
	
), $atts );

$authorList = isset($atts['author_list'])?$atts['author_list']:$uab_shortcode_atts['author_list'];
$displayType = isset($atts['display_type'])?$atts['display_type']:$uab_shortcode_atts['display_type'];
$detectAuthor = isset($atts['detect_author'])?$atts['detect_author']:$uab_shortcode_atts['detect_author'];
$displayAuthorName = isset($atts['display_author_name'])?$atts['display_author_name']:$uab_shortcode_atts['display_author_name'];
$displayAuthorDesignation = isset($atts['display_author_designation'])?$atts['display_author_designation']:$uab_shortcode_atts['display_author_designation'];
$displayAuthorDescription = isset($atts['display_author_description'])?$atts['display_author_description']:$uab_shortcode_atts['display_author_description'];
$displaySocialIcons = isset($atts['display_social_icons'])?$atts['display_social_icons']:$uab_shortcode_atts['display_social_icons'];
$displayContacts = isset($atts['display_contacts'])?$atts['display_contacts']:$uab_shortcode_atts['display_contacts'];




$user_id = $authorList;
if($detectAuthor){
	if(is_author()){
		$obj = get_queried_object();
		$user_id = $obj->data->ID;
	} elseif(is_single()){
		$obj = get_queried_object();
		$user_id = $obj->post_author;
	}
}


$uab_profile_data = maybe_unserialize(get_the_author_meta( 'uab_profile_data', $user_id ));
$uab_general_settings = get_option( 'uap_general_settings' );
$uab_social_icons = maybe_unserialize(get_the_author_meta( 'uab_social_icons', $user_id));

// Added version silver
$uab_influence_target_link = intval(get_the_author_meta('uab_frontend_target_ranking',$user_id));
$follow_var = ($uab_influence_target_link == intval(1))?('rel="' . esc_attr("nofollow noopener") . '"'):('');

?>
<div class="uab-abw-wrapper <?php esc_attr_e($displayType);?>">

	<?php if($displayType=='template-2'){ ?>
	<?php if($displayAuthorName){ ?>
	<div class="uab-abw-name-wrapper">
		<a href="<?php echo get_author_posts_url($user_id); ?>
			"><?php esc_html_e(the_author_meta( 'display_name', $user_id));?></a>
		</div>
		<?php } ?>

		<?php if($displayAuthorDesignation){ ?>
		<?php if(isset($uab_profile_data[0]['uab_company_designation']) && !empty($uab_profile_data[0]['uab_company_designation'])){ ?>
		<div class="uab-abw-designation-wrapper">
			<?php 
			esc_html_e($uab_profile_data[0]['uab_company_designation']);
			if (!empty($uab_profile_data[0]['uab_company_url'])){
				_e(' at','ultimate-author-box');
				?>
				<a href="<?php esc_attr_e($uab_profile_data[0]['uab_company_url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>" <?=$follow_var ?>><?php esc_html_e($uab_profile_data[0]['uab_company_name']);?></a>
				<?php
			}
			?>
		</div>
		<?php } ?>
		<?php } ?>
		<?php } ?>
		<div class="uab-abw-image-wrapper"><a href="<?php echo get_author_posts_url($user_id); ?>
			"><?php
			$uab_select_image_option = isset($uab_profile_data[0]['uab_image_select'])?$uab_profile_data[0]['uab_image_select']:'uab_gravatar';
			switch( $uab_select_image_option){
				case 'uab_facebook':
				if(!empty($uab_profile_data[0]['uab_profile_image_facebook'])){
					?>
					<!--Facebook Image-->
					<div class="uap-profile-image ">
						<img src="//graph.facebook.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_facebook']) ;?>/picture?width=200"> 
					</div>
					<?php
				}
				else{
					?>
					<div class="uap-profile-image ">
						<?php _e(get_avatar($user_id,200)); ?>
					</div>
					<?php
				}
				break;
				case 'uab_instagram':
				if(!empty($uab_profile_data[0]['uab_profile_image_instagram'])){
					?>
					<!--Instagram Image-->
					<div class="uap-profile-image ">
						<img src="https://instagram.com/p/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_instagram']) ;?>/media/" width=200>
					</div>
					<?php
				}
				else{
					?>
					<div class="uap-profile-image ">
						<?php _e(get_avatar($user_id,200)); ?>
					</div>
					<?php
				}
				break;
				case 'uab_twitter':
				if(!empty($uab_profile_data[0]['uab_profile_image_twitter'])){
					?>
					<!--Twitter Image-->
					<div class="uap-profile-image ">
						<img src="https://twitter.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_twitter']) ;?>/profile_image?size=original" width=200>
					</div>
					<?php
				}
				else{
					?>
					<div class="uap-profile-image ">
						<?php _e(get_avatar($user_id,200)); ?>
					</div>
					<?php
				}
				break;
				case 'uab_upload_image':
				if(!empty($uab_profile_data[0]['uab_upload_image_url'])){
					?>
					<!--Custom Image-->
					<div class="uap-profile-image ">
						<img src="<?php esc_attr_e($uab_profile_data[0]['uab_upload_image_url']);?>" width="200">
					</div>
					<?php
				}
				else{
					?>
					<div class="uap-profile-image ">
						<?php _e(get_avatar($user_id,200)); ?>
					</div>
					<?php
				}
				break;
				default:
				?>
				<!--Gravatar Image-->
				<div class="uap-profile-image ">
					<?php _e(get_avatar($user_id,200)); ?>
				</div>
				<?php
			}?></a>
		</div>

		<?php if($displayType=='template-1'){ ?>
		<?php if($displayAuthorName){ ?>
		<div class="uab-abw-name-wrapper">
			<a href="<?php echo get_author_posts_url($user_id); ?>
				"><?php esc_html_e(the_author_meta( 'display_name', $user_id));?></a>
			</div>
			<?php } ?>

			<?php if($displayAuthorDesignation){ ?>
			<?php if(isset($uab_profile_data[0]['uab_company_designation']) && !empty($uab_profile_data[0]['uab_company_designation'])){ ?>
			<div class="uab-abw-designation-wrapper">
				<?php 
				esc_html_e($uab_profile_data[0]['uab_company_designation']);
				if (!empty($uab_profile_data[0]['uab_company_url'])){
					_e(' at','ultimate-author-box');
					?>
					<a href="<?php esc_attr_e($uab_profile_data[0]['uab_company_url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>" <?=$follow_var ?>><?php esc_html_e($uab_profile_data[0]['uab_company_name']);?></a>
					<?php
				}
				?>
			</div>
			<?php } ?>
			<?php } ?>
			<?php } ?>
			
		<?php if($displayAuthorDescription){ ?>
		<div class="uab-abw-description-wrapper">
			<?php 
			if((get_the_author_meta('description', $user_id) == '' && $uab_general_settings['uab_default_bio'])){
				esc_html_e($uab_general_settings['uab_default_message']);
			}
			else{
				esc_html_e(the_author_meta( 'description', $user_id)); 
			}
			?>
		</div>
		<?php } ?>

			<?php if($displaySocialIcons){ ?>
			<div class="uab-abw-social-wrapper">
				<ul id="uap-social-outlets-fields">
					<?php 
					if(!empty($uab_social_icons)){
						foreach($uab_social_icons as $socialname => $innerarray){ 
							if(!empty($uab_social_icons[$socialname]['url'])){
								$uab_font_type = 'fab';
								if( $uab_social_icons[$socialname]['icon'] == 'rss'){
									$uab_font_type = 'fas';
								}
								?>
								<li>
									<a href="<?php esc_attr_e($uab_social_icons[$socialname]['url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>" rel="nofollow noopener">
										<i class="<?php esc_attr_e($uab_font_type); ?> fa-<?php esc_attr_e($uab_social_icons[$socialname]['icon']);?>"></i>
									</a>
								</li>
								<?php
							}
						}
					}

					if($displayContacts){
						$author_phone = isset($uab_profile_data[0]['uab_company_phone'])?$uab_profile_data[0]['uab_company_phone']:'';
						$author_url = get_the_author_meta('url', $user_id);
						$uab_email_disable = isset($uab_profile_data[0]['uab-email-disable'])?1:0;
						if(!empty($author_url)){
							?>
							<li class="uab-icon-web">
								<a href="<?php esc_attr_e(get_the_author_meta( 'url', $user_id)); ?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>">
								<i class="fa fa-globe"></i>
								</a>
							</li>
							<?php 
						}
						?>
						<?php if(!$uab_email_disable):?>
							<li class="uab-icon-mail">
								<a href="javascript:void(0)">
									<i class="fa fa-envelope"></i>
								</a>
							</li>
						<?php endif;?>
						<?php if(!empty($author_phone)):?>
							<li class="uab-icon-phone">
								<a href="javascript:void(0)">
									<i class="fa fa-phone"></i>	
								</a>
							</li>
						<?php endif;?>
						<?php 
					}
					?> 
				</ul>
			</div>
			<?php } ?>
		</div>