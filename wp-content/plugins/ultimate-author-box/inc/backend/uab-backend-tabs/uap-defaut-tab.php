<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="uab-default-tab-wrapper">
	<div class="uab-field uab-profile-field">
		<label for="uab-frontend-title"><?php _e( 'Frontend Tab Title', 'ultimate-author-box' ); ?></label>
		<input type="text" class="uab-text-field" id="uab-frontend-title" name="uab_profile_data[0][uab-frontend-title]" value="<?php echo (isset( $unserialized_uab_profile_data[0]['uab-frontend-title'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab-frontend-title'] ) : esc_html_e( 'Author Details', 'ultimate-author-box' ); ?>" >
	</div>
	<div class="uab-field uab-profile-field">
		<label for="uab-email-disable"><?php _e( 'Hide Author email in frontend', 'ultimate-author-box' ); ?></label>
		<input type="checkbox" class="uab-text-field" id="uab-email-disable" name="uab_profile_data[0][uab-email-disable]" <?php checked((isset($unserialized_uab_profile_data)?(isset($unserialized_uab_profile_data[0]['uab-email-disable'])?boolval($unserialized_uab_profile_data[0]['uab-email-disable']):boolval(0)):boolval(1)),boolval(1)) ?> <?php if(isset($unserialized_uab_profile_data[0]['uab-email-disable'] )) echo 'checked';?>>
	</div>
	<div class="uab-field uab-profile-field">
		<label for="uab-author-url-disable"><?php _e( 'Disable Author url in frontend', 'ultimate-author-box' ); ?></label>
		<input type="checkbox" class="uab-text-field" id="uab-author-url-disable" name="uab_profile_data[0][uab-author-url-disable]" <?php checked((isset($unserialized_uab_profile_data)?(isset($unserialized_uab_profile_data[0]['uab-author-url-disable'])?boolval($unserialized_uab_profile_data[0]['uab-author-url-disable']):boolval(0)):boolval(1)),boolval(1)) ?> <?php if(isset($unserialized_uab_profile_data[0]['uab-author-url-disable'] )) echo 'checked';?>>
	</div>
	<div class="uab-field uab-profile-field user-custom-description-status-wrap">
		<label for="custom-description"><?php _e( 'Switch to Customized Biography' , 'ultimate-author-box-lite') ?></label>
		<input type="checkbox" id="uab-custom-desc-status" name="uab_profile_data[0][uab_custom_description_status]" <?php checked((isset($unserialized_uab_profile_data[0]['uab_custom_description_status'])?intval($unserialized_uab_profile_data[0]['uab_custom_description_status']):intval(0)),1) ?> value="1">
	</div>
	<div class="uab-field uab-profile-field user-custom-description-wrap" style="display: none;">
		<label for="custom-description"><?php _e( 'Custom Biographical Information' , 'ultimate-author-box-lite') ?></label>
		<?php
		$allowed_html = wp_kses_allowed_html( 'post' );
		$general_value = get_the_author_meta('uab_custom_description',$user->ID);
		$content = !empty($general_value)?wp_kses(stripslashes($general_value),$allowed_html):'';
		$editor_id = 'uab-custom-desc';
		$settings = array(
			'textarea_name' => 'uab_custom_description',
			'media_buttons'	=> false,
			'wpautop'		=> false,
			'editor_class'	=> 'uab-wp-editor',
			'editor_height'	=> 200,
			// 'quicktags'		=> array('buttons'=>'a,b,i,strong,em,ul,ol,li'),
		);
		wp_editor($content,$editor_id,$settings);
		?>
	</div>
	<?php 
		$args = array(
			'uab_frontend_shortcode_title' => $uab_frontend_shortcode_title,
			'uab_frontend_shortcode' => $uab_frontend_shortcode
		);
		do_action('uab_custom_action',$args);
	?>
	<div class="uab-profile-image-wrapper">
		<div class="uab-profile-header">
			<h2><?php _e( 'Profile Image Settings', 'ultimate-author-box' ); ?></h2>
		</div>
		<div class="uab-profile-content-wrapper">
			<div class="uab-alternate-image-selection">
				<div class="uab-image-selection-option uab-profile-field">
					<label><?php _e( 'Choose Image Type', 'ultimate-author-box' );?></label>
					<select class="uab_image_select " name="uab_profile_data[0][uab_image_select]" value="<?php echo isset($unserialized_uab_profile_data[0]['uab_image_select'])?$unserialized_uab_profile_data[0]['uab_image_select']: 'uab_gravatar';?>">
						<optgroup label="<?php _e( 'Default', 'ultimate-author-box' ); ?>"></optgroup>
						<option value="uab_gravatar" <?php if ( isset($unserialized_uab_profile_data[0]['uab_image_select']) && $unserialized_uab_profile_data[0]['uab_image_select'] =='uab_gravatar' ) echo 'selected'; ?>><?php _e( 'Gravatar', 'ultimate-author-box' ); ?></option>
						<optgroup label="<?php _e( 'Social Profile Image', 'ultimate-author-box' ); ?>"></optgroup>
						<option value="uab_facebook" <?php if ( isset($unserialized_uab_profile_data[0]['uab_image_select']) && $unserialized_uab_profile_data[0]['uab_image_select'] =='uab_facebook' ) echo 'selected'; ?>><?php _e( 'Facebook', 'ultimate-author-box' ); ?></option>
						<option value="uab_instagram" <?php if ( isset($unserialized_uab_profile_data[0]['uab_image_select']) && $unserialized_uab_profile_data[0]['uab_image_select'] =='uab_instagram' ) echo 'selected'; ?>><?php _e( 'Instagram', 'ultimate-author-box' ); ?></option>
						<option value="uab_twitter" <?php if ( isset($unserialized_uab_profile_data[0]['uab_image_select']) && $unserialized_uab_profile_data[0]['uab_image_select'] =='uab_twitter' ) echo 'selected'; ?>><?php _e( 'Twitter', 'ultimate-author-box' ); ?></option>
						<optgroup label="<?php _e( 'Custom Image', 'ultimate-author-box' ); ?>"></optgroup>
						<option value="uab_upload_image" <?php if ( isset($unserialized_uab_profile_data[0]['uab_image_select']) && $unserialized_uab_profile_data[0]['uab_image_select'] =='uab_upload_image' ) echo 'selected'; ?>><?php _e( 'Upload Image', 'ultimate-author-box' ); ?></option>
					</select>
				</div><!-- End of Image Option Selection-->
				<div class="uab-social-image-option-wrapper">
					<div class="uab-facebook-image-upload-wrapper uab-image-upload-option-wrapper" <?php if(isset($unserialized_uab_profile_data[0]['uab_image_select']) !='uab_facebook') echo 'style="display:none;"'; elseif($unserialized_uab_profile_data[0]['uab_image_select']!='uab_facebook') echo'style="display:none;"';?>>
						<div class="uab-field uab-profile-field">
							<label><?php _e( 'Facebook User ID', 'ultimate-author-box' ); ?></label>
							<div class="uab-input-field">
								<input type="text" name="uab_profile_data[0][uab_profile_image_facebook]" value="<?php echo (isset( $unserialized_uab_profile_data[0]['uab_profile_image_facebook'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab_profile_image_facebook'] ) : ''; ?>"/>
								<div class="uab-label-hint">
									<?php _e( 'To get your Facebook User ID, Please go to ','ultimate-author-box');?><a href="http://findmyfbid.com/" target="_blank">http://findmyfbid.com/</a><?php _e(' paste your Facebook Profile URL and click on Find Numeric ID.', 'ultimate-author-box' ); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="uab-instagram-image-upload-wrapper uab-image-upload-option-wrapper" <?php if(isset($unserialized_uab_profile_data[0]['uab_image_select']) !='uab_instagram') echo 'style="display:none;"'; elseif($unserialized_uab_profile_data[0]['uab_image_select']!='uab_instagram') echo 'style="display:none;"';?>>
						<div class="uab-field uab-profile-field">
							<label><?php _e( 'Instagram Image ID', 'ultimate-author-box' ); ?></label>
							<div class="uab-input-field">
								<input type="text" name="uab_profile_data[0][uab_profile_image_instagram]" value="<?php echo (isset( $unserialized_uab_profile_data[0]['uab_profile_image_instagram'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab_profile_image_instagram'] ) : ''; ?>"/>
								<div class="uab-label-hint"><?php _e( 'To get your Instagram Image ID, Please open any image on Instagram you want in the single preview. If your image URL is https://www.instagram.com/p/7FfbBpSOaC/ then 7FfbBpSOaC is your Instagram Image ID', 'ultimate-author-box' ); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="uab-twitter-image-upload-wrapper uab-image-upload-option-wrapper" <?php if(isset($unserialized_uab_profile_data[0]['uab_image_select']) !='uab_twitter') echo 'style="display:none;"'; elseif($unserialized_uab_profile_data[0]['uab_image_select']!='uab_twitter') echo 'style="display:none;"';?>>
						<div class="uab-field uab-profile-field">
							<label><?php _e( 'Twitter Username', 'ultimate-author-box' ); ?></label>
							<div class="uab-input-field">
								<input type="text" name="uab_profile_data[0][uab_profile_image_twitter]" value="<?php echo (isset( $unserialized_uab_profile_data[0]['uab_profile_image_twitter'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab_profile_image_twitter'] ) : ''; ?>"/>
								<div class="uab-label-hint"><?php _e( 'To get your Twitter Username, Please open your twitter profile. If your profile URL is https://twitter.com/apthemes  then apthemes is your Twitter username.', 'ultimate-author-box' ); ?>

								</div>
							</div>
						</div>
					</div>
					<div class="uab-custom-image-upload-wrapper uab-image-upload-option-wrapper" <?php if(isset($unserialized_uab_profile_data[0]['uab_image_select']) !='uab_upload_image') echo 'style="display:none;"'; elseif($unserialized_uab_profile_data[0]['uab_image_select']!='uab_upload_image') echo 'style="display:none;"';?>>
						<div class="uab-field uab-profile-field">
							<label for="uab_upload_image_url"><?php _e( 'Upload Custom Image', 'ultimate-author-box' ); ?></label>
							<input class="uab_upload_image_url" type="text" name="uab_profile_data[0][uab_upload_image_url]" value="<?php echo (isset( $unserialized_uab_profile_data[0]['uab_upload_image_url'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab_upload_image_url'] ) : ''; ?>" class="input-controller required"/>
							<input type="button" class="uab_upload_image_button input-controller image_button button-secondary"  value="<?php esc_attr_e('Upload Image','ultimate-author-box');?>" size="25"/>
							<span class="uab-info"><?php _e('Recommended image size is 200x200 px.','ultimate-author-box');?></span>
							<div class="image-preview">
								<h4><?php _e( 'Image Preview:', 'ultimate-author-box' ); ?></h4>
								<div class="current-image" ><img src="<?php echo (isset( $unserialized_uab_profile_data[0]['uab_upload_image_url'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab_upload_image_url'] ) : ''; ?>" style="height:180px; width:180px;"/></div>
							</div>
						</div>
					</div>
				</div><!--End of Social Image Option Wrapper-->
			</div><!--End of Alternate Image Selection Option-->

			<div class="uap-image-shape-wrapper uab-profile-field">
				<label><?php _e( 'Choose Image Shape', 'ultimate-author-box' ); ?></label>
				<select class="uab_image_shape " name="uab_profile_data[0][uab_image_shape]" value="<?php echo isset($unserialized_uab_profile_data[0]['uab_image_shape'])?$unserialized_uab_profile_data[0]['uab_image_shape']:'uab_is_square';?>">
					<option value="uab_is_square" <?php if ( isset($unserialized_uab_profile_data[0]['uab_image_shape']) && $unserialized_uab_profile_data[0]['uab_image_shape'] =='uab_is_square' ) echo 'selected'; ?>><?php _e( 'Square', 'ultimate-author-box' ); ?></option>
					<option value="uab_is_circle" <?php if ( !empty($unserialized_uab_profile_data[0]['uab_image_shape']) && $unserialized_uab_profile_data[0]['uab_image_shape'] =='uab_is_circle' ) echo 'selected'; ?>><?php _e( 'Circular', 'ultimate-author-box' ); ?></option>
				</select>
			</div><!--End of Image Shape Option Wrapper-->
		</div><!--End of Image Wrapper-->
	</div>
	<div class="uab-label-info-wrapper">
		<div class="uab-company-info-header-wrapper uab-title-wrapper uab-profile-header">
			<h2><?php _e( 'Label Information', 'ultimate-author-box' ); ?></h2>
		</div>
		<div class="uab-profile-content-wrapper">
			<div class="uab-field uab-profile-field">
				<label for="uab-website-label"><?php _e( 'Website Label', 'ultimate-author-box' ); ?></label>
				<input type="text" class="uab-text-field" id="uab-website-label" name="uab_profile_data[0][uab_site_label]" value="<?php echo (isset( $unserialized_uab_profile_data[0]['uab_site_label'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab_site_label'] ) : ''; ?>" />
			</div>
			<div class="uab-field uab-profile-field">
				<label for="uab-email-label"><?php _e( 'Email Label', 'ultimate-author-box' ); ?></label>
				<input type="text" class="uab-text-field" id="uab-email-label" name="uab_profile_data[0][uab_email_label]" value="<?php echo (isset( $unserialized_uab_profile_data[0]['uab_email_label'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab_email_label'] ) : ''; ?>" />
			</div>
			<div class="uab-field uab-profile-field">
				<label for="uab-phone-label"><?php _e( 'Phone Label', 'ultimate-author-box' ); ?></label>
				<input type="text" class="uab-text-field" id="uab-phone-label" name="uab_profile_data[0][uab_phone_label]" value="<?php echo (isset( $unserialized_uab_profile_data[0]['uab_phone_label'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab_phone_label'] ) : ''; ?>" />
			</div>
		</div>
	</div>
	<div class="uab-company-info-wrapper uap-option-wrapper">
		<div class="uab-company-info-header-wrapper uab-title-wrapper uab-profile-header">
			<h2><?php _e( 'Company Information', 'ultimate-author-box' ); ?></h2>
		</div>
		<div class="uab-profile-content-wrapper">
			<div class="uab-field uab-profile-field">
				<label for="uab-company-name"><?php _e( 'Company Name', 'ultimate-author-box' ); ?></label>
				<input type="text" class="uab-text-field" id="uab-company-name" name="uab_profile_data[0][uab_company_name]" value="<?php echo (isset( $unserialized_uab_profile_data[0]['uab_company_name'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab_company_name'] ) : ''; ?>" />
			</div>
			<div class="uab-field uab-profile-field">
				<label for="uab-company-url"><?php _e( 'Company URL', 'ultimate-author-box' ); ?></label>
				<input type="url" class="uab-url-field" id="uab-company-url" name="uab_profile_data[0][uab_company_url]" value="<?php echo (isset( $unserialized_uab_profile_data[0]['uab_company_url'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab_company_url'] ) : ''; ?>" />
			</div>
			<div class="uab-field uab-profile-field uap-company-reachable-field">
				<label for="uab-link-influence"><?php esc_attr_e("Avoid Links have Search Ranking influence") ?></label>
				<input type="checkbox" id="uab-link-influence" name="uab_link_influence_avoid" value="1" <?php checked((($uab_target_ranking !== '')?(($uab_target_ranking != 0)?intval(1):intval(0)):intval(1)),1) ?>>
			</div>
			<div class="uab-field uab-profile-field">
				<label for="uab-company-designation"><?php _e( 'Designation', 'ultimate-author-box' ); ?></label>
				<input type="text" class="uab-text-field" id="uab-company-designation" name="uab_profile_data[0][uab_company_designation]" value="<?php echo (isset( $unserialized_uab_profile_data[0]['uab_company_designation'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab_company_designation'] ) : ''; ?>" />
			</div>
			<div class="uab-field uab-profile-field">
				<label for="uab-company-separator"><?php _e( 'Separator', 'ultimate-author-box' ); ?></label>
				<input type="text" class="uab-text-field" id="uab-company-separator" name="uab_profile_data[0][uab_company_separator]" value="<?php echo (isset( $unserialized_uab_profile_data[0]['uab_company_separator'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab_company_separator'] ) : ','; ?>" />
				<span class="uab-info"><?php esc_html_e('Designation [separator] Company Name. Example, Plugin Developer at AccessPress','ultimate-author-box');?></span>
			</div>
			<div class="uab-field uab-profile-field">
				<label for="uab-company-phone"><?php _e( 'Phone Number', 'ultimate-author-box' ); ?></label>
				<input type="text" class="uab-text-field" id="uab-company-phone" name="uab_profile_data[0][uab_company_phone]" value="<?php echo (isset( $unserialized_uab_profile_data[0]['uab_company_phone'] )) ? esc_attr( $unserialized_uab_profile_data[0]['uab_company_phone'] ) : ''; ?>" />
			</div>
		</div>
	</div><!-- End of Company info -->
	<div class="uab-social-outlets-wrapper">
		<div class="uab-social-outlets-header-wrapper uab-title-wrapper uab-profile-header">
			<h2><?php _e( 'Social Media Icons', 'ultimate-author-box' ); ?></h2>
		</div>
		<div class="uab-profile-content-wrapper">
			<ul class="uap-social-outlets-fields">
				<?php 
				if(!empty($uab_social_icons)){
					foreach($uab_social_icons as $socialname => $innerarray){ 
						$uab_font_type = 'fab';
						if( $uab_social_icons[$socialname]['icon'] == 'rss'){
							$uab_font_type = 'fas';
						}
						?>
						<li>
							<div class="uab-field uab-profile-field">
								<label><i class="<?php esc_attr_e($uab_font_type); ?> fa-<?php echo $uab_social_icons[$socialname]['icon'];?>"></i><?php esc_html_e($uab_social_icons[$socialname]['label']);?></label>
								<input type="url" name="uab_social_icons[<?php esc_attr_e($socialname);?>][url]" value="<?php esc_attr_e($uab_social_icons[$socialname]['url']);?>" placeholder="<?php esc_attr_e('Enter link for social media icon', 'ultimate-author-box' );?>">
							</div>
						</li>
						<?php
					}
				}
				?>	
			</ul>
		</div><!-- End of Social Outlet Fields-->

	</div><!-- End of Social Outlet Wrapper-->


	
</div><!--End of Default Content Wrapper-->