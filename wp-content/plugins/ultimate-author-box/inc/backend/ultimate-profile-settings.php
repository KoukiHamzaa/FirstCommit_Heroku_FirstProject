<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
if(empty($unserialized_uab_profile_data)){
	esc_html_e( 'Please fill your Author Box', 'ultimate-author-box' );
}else{
	// $this->print_array($unserialized_uab_profile_data);
}
if(empty($uab_general_settings['uab_twitter_api_key'])||
	empty($uab_general_settings['uab_twitter_api_secret'])||
	empty($uab_general_settings['uab_twitter_access_token'])||
	empty($uab_general_settings['uab_twitter_token_secret'])){
	$twitter_flag = 1;
}else{$twitter_flag = 0;} 
?>
<div class="uab-profile-backend-wrapper">
	<div class="uab-profile-header-wrapper">
		<div class="uab-profile-header-main"><h2><?php _e( 'Ultimate Author Box Profile Settings', 'ultimate-author-box' ); ?></h2>
		<p class="description"><?php _e('Please visit ','ultimate-author-box');?><a href="https://accesspressthemes.com/documentation/ultimate-author-box/" target="_blank">https://accesspressthemes.com/documentation/ultimate-author-box/</a><?php _e(' for detail documentation.','ultimate-author-box');?></p>
		</div>
	</div>
	<input type="hidden" name="uab_profile_data[0][uab_random_identifier]" value="<?php echo $uab_random_identifier ?>">
	<div class="uab-profile-content-wrapper">
		<div id="dialog" class="uab-tab-option" title="<?php _e( 'Select New Tab Option', 'ultimate-author-box' ); ?>">
			<fieldset class="ui-helper-reset">
				<div>
					<div class="select-tab-wrapper uab-profile-field">
						<label for="uab-tab-type-selection"><?php _e( 'Select Tab Type', 'ultimate-author-box' ); ?></label>
							<select class="uab-tab-type-selection " name="uab_profile_data[0][uab_tab_type_selection]">
								<optgroup label="<?php _e( 'Default tabs', 'ultimate-author-box' ); ?>"></optgroup> 
									<option  value="uab_author_post"><?php _e( 'Author posts', 'ultimate-author-box' ); ?></option>
									<option  value="uab_company_description"><?php _e( 'Company description', 'ultimate-author-box' ); ?></option>
									<option  value="uab_contact_form"><?php _e( 'Contact Form', 'ultimate-author-box' ); ?></option>
								<optgroup label="<?php _e( 'Feeds tabs', 'ultimate-author-box' ); ?>"></optgroup> 
									<option  value="uab_twitter_feeds"><?php _e( 'Twitter Feeds', 'ultimate-author-box' ); ?></option>
									<option  value="uab_rss_feeds"><?php _e( 'RSS Feeds', 'ultimate-author-box' ); ?></option>
									<option  value="uab_external_link"><?php _e( 'External Link', 'ultimate-author-box' ); ?></option>
									<!-- <option  value="uab_facebook_feeds"><?php //_e( 'Facebook Feeds', 'ultimate-author-box' ); ?></option> -->
								<optgroup label="<?php _e( 'Custom tabs', 'ultimate-author-box' ); ?>"></optgroup> 
									<option  value="uab_shortcode"><?php _e( 'Shortcode', 'ultimate-author-box' ); ?></option>
									<option  value="uab_widget"><?php _e( 'Widget', 'ultimate-author-box' ); ?></option>
									<option  value="uab_editor"><?php _e( 'WYSIWYG Editor', 'ultimate-author-box' ); ?></option>
								<optgroup label="<?php _e('Profile tabs','ultimate-author-box') ?>"></optgroup>
									<option value="uab_linkedin_profile"><?php _e('Linkedin Profile','ultimate-author-box') ?></option>
							</select>
						</div>
					</div>
					<div class="uab-profile-field">
						<label for="uab_tab_title"><?php _e( 'Tab Name', 'ultimate-author-box' ); ?></label>
							<input type="text" name="uab_profile_data[0][uab_tab_title]" id="uab_tab_title" value="<?php _e( 'New tab', 'ultimate-author-box' ); ?>" class="ui-widget-content ui-corner-all">  
					</div>
				</div>
			</fieldset>	
		</div><!--End Of Dialog Box--> 

		<div id="tabs" class="uab-backend-tabs">
			<div class="uab-variable-width-wrapper">
				<ul class="uab-variable-width">
					<!-- Initial Static Tab -->
					<li><a href="#tabs-d"><?php _e( 'Author Details', 'ultimate-author-box' ); ?></a></li>
					<!-- Dynamic Add New Tabs -->
					<?php
					if (!empty($unserialized_uab_profile_data)) {
						foreach( $unserialized_uab_profile_data as $index=>$val ){
							$keyArray[$index] = $index;
							if( $keyArray[$index] != '0' && $keyArray[$index] != 'uab_id' && $keyArray[$index] != '1'){
								?>

								<li><a href='#tabs-<?php esc_attr_e($index);?>'><?php echo (isset( $unserialized_uab_profile_data[$index]['uab_tab_name'] )) ? esc_attr( $unserialized_uab_profile_data[$index]['uab_tab_name'] ) : 'Tab'.$index;?><span class='ui-icon ui-icon-close' role='presentation'></span></a></li>
								<?php
							}

						}
					}
					?>
				</ul><!-- End of Tabs ul or Header definition -->
				<!-- Add New Tab Button -->
				<div class="uab-right-elements">
					<input type="button" value="<?php _e( '+', 'ultimate-author-box' ); ?>" id="uab-add-field" title="<?php _e( 'New Tab', 'ultimate-author-box' ); ?>">
				<?php 
				$uab_customizer_restriction = 0;
				if(isset($uab_general_settings['uab_disable_customizer']) && !empty($uab_general_settings['uab_disable_customizer']) && $uab_general_settings['uab_disable_customizer'] == 1):
					$uab_customizer_restriction = 1;
					?>
				<?php endif;?>
				<div id="uab-template-settings" title="<?php _e( 'Template Settings', 'ultimate-author-box' ); ?>" <?php if($uab_customizer_restriction == 1) esc_attr_e('style=display:none;');?>><i class="fas fa-code"></i></div>
				</div>
			</div>
			

			
			<div id="tabs-d">
				<!-- <input type="hidden" name="uab_tab_keys" class="uab-tab-keys" value="<?php echo (isset($uab_key_set) ? esc_attr($uab_key_set) : ''); ?>"> -->
				<?php include(UAB_PATH . '/inc/backend/uab-backend-tabs/uap-defaut-tab.php'); ?>
			</div><!--End of Default Tab-->
			<?php
		        if (!empty($unserialized_uab_profile_data)) {
		            foreach ($unserialized_uab_profile_data as $key => $val) {
		        	    $keyArray[$key] = $key;
		          		if( $keyArray[$key] != '0' && $keyArray[$key] != 'uab_id' && $keyArray[$key] != '1'){
		                ?>  
			                <div id="tabs-<?php esc_attr_e($key);?>" class="uab-tab-panel">
			                <?php 
			                	if(isset($unserialized_uab_profile_data[$key]['uab_tab_type'])){
				                	switch($unserialized_uab_profile_data[$key]['uab_tab_type']) {
										case 'uab_author_post':
											?>
											<div class="uab-recent-post-wrapper uap-option-wrapper">
												<input type="hidden" class="uab_tab_name" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_name]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_name']);?>">
												<input type="hidden" class="uab_tab_type" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_type]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_type']);?>">
												<div class="uab-recent-post-header-wrapper uab-title-wrapper uab-profile-header">
													<h2><?php _e( 'Author Posts', 'ultimate-author-box' ); ?></h2>
												</div>
												<div class="uab-profile-content-wrapper">
													<div class="author-post-wrapper">
														<div class="latest-posts-wrapper uab-author-post-option uab-profile-field">
															<label><?php _e( 'Frontend Tab Title', 'ultimate-author-box' ); ?></label>	
															<input type="text" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_author_post_tab_title]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_author_post_tab_title'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_author_post_tab_title'] ) : ''; ?>"/>
														</div>
														<div class="latest-posts-wrapper uab-author-post-option uab-profile-field">
															<label><?php _e( 'Number of posts', 'ultimate-author-box' ); ?></label>	
															<input type="number" min="0" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_post_number]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_post_number'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_post_number'] ) : ''; ?>"/>
														</div>
														<div class="uab-field uab-profile-field">
															<label><?php _e( 'Select Post Type', 'ultimate-author-box' ); ?></label>
															<select class="uab_post_select " name="uab_profile_data[<?php esc_attr_e($key);?>][uab_post_select]" >
																<option value="uab_latest_posts" <?php if ( $unserialized_uab_profile_data[$key]['uab_post_select'] =='uab_latest_posts' ) echo 'selected'; ?>><?php _e( 'Latest Posts', 'ultimate-author-box' ); ?></option>
																<option value="uab_selective_posts" <?php if ( $unserialized_uab_profile_data[$key]['uab_post_select'] =='uab_selective_posts' ) echo 'selected'; ?>><?php _e( 'Selective Posts', 'ultimate-author-box' ); ?></option>
															</select>
														</div>
														<div class="uab-selective-posts uab-author-post-option uab-profile-field" <?php if($unserialized_uab_profile_data[$key]['uab_post_select'] =='uab_latest_posts') echo 'style="display:none;"' ;?>>
															<label><?php _e( 'Posts to show', 'ultimate-author-box' ); ?></label>
															<div class="uab-profile-content-wrapper uab-profile-recent-post-list-wrapper">
																<?php
																$recent = get_posts(array(
																	'posts_per_page' => '-1',
																	'author'=> $user->ID,
																	'orderby'=>'date',
																	'order'=>'desc',
																));
																if( $recent ){
																	foreach($recent as $post){
																		$title = get_the_title($post->ID);		
																		?>
																		<div class="uab-profile-recent-post-list">
																		<input type="checkbox" value="<?php esc_attr_e($post->ID);?>" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_post_list][]"

																		<?php 
																		if( isset($unserialized_uab_profile_data[$key]['uab_post_list'])){
																			foreach( $unserialized_uab_profile_data[$key]['uab_post_list'] as $innerKey => $type){
																				if($post->ID==$type) echo 'checked';
																			}
																		}
																		?>
																		><?php esc_html_e($title); ?>
																		</div>
																		<?php
																	}
																}else{
																	esc_html_e('The User does not have any posts','ultimate-author-box');
																}?>
															</div>
														</div>
														<div class="latest-posts-wrapper uab-date-disable uab-profile-field">
															<label><?php _e('Hide Post Date','ultimate-author-box') ?></label>
															<div class="uab-disable-date">
																<input type="checkbox" name="uab_profile_data[<?php esc_attr_e($key) ?>][uab_disable_date]" value="1" <?php checked((isset($unserialized_uab_profile_data[$key]['uab_disable_date'])?boolval($unserialized_uab_profile_data[$key]['uab_disable_date']):boolval(0)),boolval(1)) ?>>
															</div>
														</div>
														<div class="latest-posts-wrapper uab-author-disable uab-profile-field">
															<label><?php _e('Hide Post Author','ultimate-author-box') ?></label>
															<div class="uab-disable-author">
																<input type="checkbox" name="uab_profile_data[<?php esc_attr_e($key) ?>][uab_disable_author]" value="1" <?php checked((isset($unserialized_uab_profile_data[$key]['uab_disable_author'])?boolval($unserialized_uab_profile_data[$key]['uab_disable_author']):boolval(0)),boolval(1)) ?>>
															</div>
														</div>
														<div class="latest-posts-wrapper uab-author-url-disable uab-profile-field">
															<label><?php _e('Disable Author URL','ultimate-author-box') ?></label>
															<div class="uab-disable-author-url">
																<input type="checkbox" name="uab_profile_data[<?php esc_attr_e($key) ?>][uab_disable_author_url]" value="1" <?php checked((isset($unserialized_uab_profile_data[$key]['uab_disable_author_url'])?boolval($unserialized_uab_profile_data[$key]['uab_disable_author_url']):boolval(0)),boolval(1)) ?>>
															</div>
														</div>
<!-- 														<div class="uap-show-post-excerpt uab-profile-field">
															<label><?php _e( 'Show Post Excerpt', 'ultimate-author-box' ); ?></label>
															<input type="checkbox" name="uab_profile_data[<?php echo $key;?>][uab_show_post_excerpt]"  <?php if ( isset($unserialized_uab_profile_data[$key]['uab_show_post_excerpt'] )) echo 'checked'; ?>><?php _e( 'Check to show post excerpt.', 'ultimate-author-box' ); ?>
														</div>
														<div class="latest-posts-wrapper uab-author-post-option uab-profile-field">
															<label><?php _e( 'Read More Text', 'ultimate-author-box' ); ?></label>	
															<input type="text" name="uab_profile_data[<?php echo $key;?>][uab_author_post_readmore]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_author_post_readmore'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_author_post_readmore'] ) : ''; ?>"/>
														</div>
														<div class="uap-show-post-image uab-profile-field">
															<label><?php _e( 'Show Post Image', 'ultimate-author-box' ); ?></label>
															<input type="checkbox" name="uab_profile_data[<?php echo $key;?>][uab_show_post_image]"  <?php if ( isset($unserialized_uab_profile_data[$key]['uab_show_post_image'] )) echo 'checked'; ?>><?php _e( 'Check to show post image.', 'ultimate-author-box' ); ?>
														</div>	
														<div class="uap-show-post-date uab-profile-field">
															<label><?php _e( 'Show Post Date', 'ultimate-author-box' ); ?></label>
															<input type="checkbox" name="uab_profile_data[<?php echo $key;?>][uab_show_post_date]"  <?php if ( isset($unserialized_uab_profile_data[$key]['uab_show_post_date'] )) echo 'checked'; ?>><?php _e( 'Check to show post date.', 'ultimate-author-box' ); ?>
														</div>
														<div class="uap-show-post-category uab-profile-field">
															<label><?php _e( 'Show Post Category', 'ultimate-author-box' ); ?></label>
															<input type="checkbox" name="uab_profile_data[<?php echo $key;?>][uab_show_post_category]"  <?php if ( isset($unserialized_uab_profile_data[$key]['uab_show_post_category'] )) echo 'checked'; ?>><?php _e( 'Check to show post category.', 'ultimate-author-box' ); ?>
														</div> -->
													</div>
												</div>
											</div><!-- End of Recent Posts-->
											<?php
										break;
										case 'uab_company_description':
										?>
										<div class="uab-company-info-wrapper uap-option-wrapper">
											<input type="hidden" class="uab_tab_name" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_name]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_name']);?>"> 
											<input type="hidden" class="uab_tab_type" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_type]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_type']);?>" >
											<div class="uab-company-info-header-wrapper uab-title-wrapper uab-profile-header">
												<h2><?php _e( 'Additional Company Information', 'ultimate-author-box' ); ?></h2>
											</div>
											<div class="uab-profile-content-wrapper uab-profile-field">
												<label for="uab_upload_company_url"><?php _e( 'Upload Custom Image', 'ultimate-author-box' ); ?></label>
												<input type="text" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_upload_company_url]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_upload_company_url'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_upload_company_url'] ) : ''; ?>" class="uab_upload_company_url input-controller required"/>
												<input type="button" class="uab_company_image_button input-controller image_button button-secondary"  value="<?php esc_attr_e('Upload Image','ultimate-author-box');?>" size="25"/> 
												<div class="company-image-preview">
													<div class="current-company-image" >
														<h4><?php _e( 'Image Preview:', 'ultimate-author-box' ); ?></h4>
														<img src="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_upload_company_url'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_upload_company_url'] ) : ''; ?> " style="height:180px; width:180px;"/>
													</div>
												</div>
											</div>
											<div class="uab-company-detail-description uab-profile-field">
												<label><?php _e( 'Company Detail Description', 'ultimate-author-box' );?></label>
												<textarea id="uab-company-content-<?php esc_attr_e($key);?>" class="uab-editor" name="uab_company_content[<?php esc_attr_e($key);?>]"><?php echo (isset( $uab_company_content[$key])) ? wp_kses_post( $uab_company_content[$key]) : ''; ?></textarea>
											</div>
										</div>
											<?php
										break;
										case 'uab_contact_form':
											?>
											<div class="uab-contact-form-wrapper uap-option-wrapper">
												<input type="hidden" class="uab_tab_name" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_name]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_name']);?>">
												<input type="hidden" class="uab_tab_type" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_type]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_type']);?>">
												<div class="uab-contact-form-header-wrapper uab-title-wrapper uab-profile-header">
													<h2><?php _e( 'Contact Form Settings', 'ultimate-author-box' ); ?></h2>
												</div>
												<div class="uab-profile-content-wrapper">
													<div class="select-tab-wrapper uab-profile-field">
														<label for="uab-popup-selection"><?php _e( 'Select Tab Type', 'ultimate-author-box' ); ?></label>
														<select class="uab-contact-type-selection " name="uab_profile_data[<?php esc_attr_e($key);?>][uab_contact_type_selection]">
															<option value="uab_default_contact_form" <?php if ( $unserialized_uab_profile_data[$key]['uab_contact_type_selection'] =='uab_default_contact_form' ) echo 'selected'; ?>><?php _e( 'Default Contact Form', 'ultimate-author-box' ); ?></option>
															<option value="uab_shortcode_contact_form" <?php if ( $unserialized_uab_profile_data[$key]['uab_contact_type_selection'] =='uab_shortcode_contact_form' ) echo 'selected'; ?>><?php _e( 'External Contact Form', 'ultimate-author-box' ); ?></option>
														</select>
													</div>
													<div class="contact-shortcode-wrapper" <?php if($unserialized_uab_profile_data[$key]['uab_contact_type_selection'] =='uab_default_contact_form') echo 'style="display:none;"' ;?>>
														<div class="uab-field uab-profile-field">
															<label for="uab-contact-form-shortcode"><?php _e( 'Contact Form Shortcode', 'ultimate-author-box' ); ?></label>
															<input type="text" class="uab-text-field" id="uab-contact-form-shortcode" name="uab_contact_shortcode[<?php esc_attr_e($key);?>]" value="<?php echo (isset( $uab_contact_shortcode[$key])) ? esc_attr( $uab_contact_shortcode[$key]) : ''; ?>">
														</div>
													</div>
													<div class="custom-contact-form-fields-wrapper" <?php if($unserialized_uab_profile_data[$key]['uab_contact_type_selection'] =='uab_shortcode_contact_form') echo 'style="display:none;"' ;?>>
														<div class="uab-field uab-profile-field">
															<label for="uab-contact-form-name"><?php _e( 'Contact Form Title', 'ultimate-author-box' ); ?></label>
															<input type="text" class="uab-text-field" id="uab-contact-form-name" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_contact_form_name]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_contact_form_name'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_contact_form_name'] ) : ''; ?>">
														</div>
														<div class="uab-field uab-profile-field">
															<label for="uab-contact-form-from-label"><?php _e( 'Name Label', 'ultimate-author-box' ); ?></label>
															<input type="text" class="uab-text-field" id="uab-contact-form-from-label" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_from_label]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_from_label'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_from_label'] ) : ''; ?>">
														</div>
														<div class="uab-field uab-profile-field">
															<label for="uab-contact-form-email-label"><?php _e( 'Email Label', 'ultimate-author-box' ); ?></label>
															<input type="text" class="uab-text-field" id="uab-contact-form-email-label" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_email_label]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_email_label'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_email_label'] ) : ''; ?>" >
														</div>
														<div class="uab-field uab-profile-field">
															<label for="uab-contact-form-phone-label"><?php _e( 'Phone Label', 'ultimate-author-box' ); ?></label>
															<input type="text" class="uab-text-field" id="uab-contact-form-phone-label" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_phone_label]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_phone_label'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_phone_label'] ) : ''; ?>" >
														</div>
														<div class="uab-field uab-profile-field">
															<label for="uab-contact-form-subject-label"><?php _e( 'Subject Label', 'ultimate-author-box' ); ?></label>
															<input type="text" class="uab-text-field" id="uab-contact-form-subject-label" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_subject_label]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_subject_label'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_subject_label'] ) : ''; ?>" >
														</div>
														<div class="uab-field uab-profile-field">
															<label for="uab-contact-form-message-label"><?php _e( 'Message Label', 'ultimate-author-box' ); ?></label>
															<input type="text" class="uab-text-field" id="uab-contact-form-message-label" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_message_label]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_message_label'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_message_label'] ) : ''; ?>" >
														</div>
														<div class="uab-field uab-profile-field">
															<label for="uab-contact-form-submit-btn-label"><?php _e( 'Submit Button Label', 'ultimate-author-box' ); ?></label>
															<input type="text" class="uab-text-field" id="uab-contact-form-submit-btn-label" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_submit_btn_label]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_submit_btn_label'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_submit_btn_label'] ) : ''; ?>" >
														</div>
														<div class="uab-field uab-profile-field">
															<label for="uab-contact-form-success-message-label"><?php _e( 'Success Message', 'ultimate-author-box' ); ?></label>
															<input type="text" class="uab-text-field" id="uab-contact-form-success-message-label" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_submission_message]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_submission_message'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_submission_message'] ) : ''; ?>" >
														</div>
														<div class="uab-field uab-profile-field">
															<label for="uab-contact-form-send-to-email-label"><?php _e( 'Send to Email', 'ultimate-author-box' ); ?></label>
															<input type="email" class="uab-text-field" id="uab-contact-form-send-to-email-label" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_send_to_email]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_send_to_email'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_send_to_email'] ) : ''; ?>">
														</div>
													</div>
												</div>
											</div><!-- End of Contact Form-->
											<?php
										break;
										case 'uab_twitter_feeds':
										?>
										<input type="hidden" class="uab_tab_name" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_name]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_name']);?>">
										<input type="hidden" class="uab_tab_type" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_type]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_type']);?>">
										<?php if($twitter_flag == '1'):?>
											<span><?php esc_html_e('Note: The Admin has not configured the Twitter Settings. Please contact Admin to use Twitter Feeds.','ultimate-author-box');?></span>
										<?php endif?>
										<div class="uab-twitter-header-wrapper uab-title-wrapper uab-profile-header">
											<h2><?php _e( 'Twitter Settings', 'ultimate-author-box' ); ?></h2>
										</div>
										<div class="uab-field uab-profile-field uab-profile-header">
											<label for="uab-twitter-username"><?php _e( 'Twitter Username', 'ultimate-author-box' ); ?></label>
											<input type="text" class="uab-text-field" id="uab-twitter-username" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_twitter_username]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_twitter_username'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_twitter_username'] ) : ''; ?>" <?php if($twitter_flag == '1') esc_attr_e('disabled');?>>
										</div>
										<div class="uab-field uab-profile-field">
											<label for="uab-twitter-feed-number"><?php _e( 'Number of Twitter Feeds', 'ultimate-author-box' ); ?></label>
											<input type="number" min="0" class="uab-text-field" id="uab-twitter-feed-number" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_twitter_feed_number]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_twitter_username'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_twitter_feed_number'] ) : ''; ?>" <?php if($twitter_flag == '1') esc_attr_e('disabled');?>>
										</div>
										<?php
										break;
										case 'uab_rss_feeds':
										?>
										<input type="hidden" class="uab_tab_name" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_name]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_name']);?>">
										<input type="hidden" class="uab_tab_type" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_type]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_type']);?>">
										<div class="uab-rss-wrapper">
											<div class="uab-header-wrapper uab-profile-header">
												<h2><?php _e( 'RSS Feed Settings', 'ultimate-author-box' ); ?></h2>
											</div>
											<div class="uab-profile-content-wrapper">
												<div class="uab-field uab-profile-field">
													<label for="uab-rss-url"><?php _e( 'RSS URL', 'ultimate-author-box' ); ?></label>
													<input type="url" class="uab-text-field" id="uab-rss-url" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_rss_url]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_rss_url'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_rss_url'] ) : ''; ?>">
												</div>
<!-- 												<div class="uab-field uab-profile-field">
													<label for="uab-rss-text"><?php _e( 'Read More Text', 'ultimate-author-box' ); ?></label>
													<input type="text" class="uab-text-field" id="uab-rss-text" name="uab_profile_data[<?php echo $key;?>][uab_rss_text]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_rss_text'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_rss_text'] ) : ''; ?>">
												</div> -->
												<div class="uab-field uab-profile-field">
									    			<label for="uab-link-target-option"><?php _e( 'Link target options', 'ultimate-author-box' ); ?></label>
									    			<select class="" id="uab-rss-link-target" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_link_target]">
									    				<option  value="_blank" <?php if ( $unserialized_uab_profile_data[$key]['uab_link_target'] == '_blank' ) echo 'selected'; ?>><?php _e( 'New Page', 'ultimate-author-box' ); ?></option>
									    				<option  value="_self" <?php if ( $unserialized_uab_profile_data[$key]['uab_link_target'] == '_self' ) echo 'selected'; ?>><?php _e( 'Same Page', 'ultimate-author-box' ); ?></option>
									    			</select>
									    		</div>
												<div class="uab-field uab-profile-field">
													<label for="uab-rss-feed-number"><?php _e( 'Number of RSS Feeds', 'ultimate-author-box' ); ?></label>
													<input type="number" min="0" class="uab-text-field" id="uab-rss-feed-number" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_rss_feed_number]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_rss_feed_number'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_rss_feed_number'] ) : ''; ?>">
												</div>
											</div>
										</div>
										<?php
										break;
										case 'uab_external_link':
										?>
										<div class="uab-external-link-outer-wrapper uap-option-wrapper">
											<div class="uab-external-link-wrapper uap-option-wrapper">
												<input type="hidden" class="uab_tab_name" name="uab_profile_data[<?php esc_attr_e($key) ?>][uab_tab_name]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_name']) ?>">
												<input type="hidden" class="uab_tab_type" name="uab_profile_data[<?php esc_attr_e($key) ?>][uab_tab_type]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_type']) ?>">
												<div class="uab-external-link-content-wrapper">
													<div class="uab-field uab-profile-field">
														<label for="uab-linkedin-external-link"><?php _e( 'External Link', 'ultimate-author-box' ); ?></label>
														<input type="text" class="uab-text-field" name="uab_profile_data[<?php esc_attr_e($key) ?>][uab_external_link_url]" id="uab-linkedin-external-link" value="<?php echo isset($unserialized_uab_profile_data[$key]['uab_external_link_url'])?esc_attr($unserialized_uab_profile_data[$key]['uab_external_link_url']):'' ?>">
													</div>
													<div class="uab-field uab-profile-field">
														<label for="uab-linkedin-external-target"><?php _e( 'External Link target', 'ultimate-author-box' ); ?></label>
														<select id="uab-linkedin-external-target" name="uab_profile_data[<?php esc_attr_e($key) ?>][uab_external_link_target]">
															<option value="_self" <?php selected(isset($unserialized_uab_profile_data[$key]['uab_external_link_target'])?esc_attr($unserialized_uab_profile_data[$key]['uab_external_link_target']):'_self','_self') ?>><?php _e('Same Page','ultimate-author-box') ?></option>
															<option value="_blank" <?php selected(isset($unserialized_uab_profile_data[$key]['uab_external_link_target'])?esc_attr($unserialized_uab_profile_data[$key]['uab_external_link_target']):'_self','_blank') ?>><?php _e('New Page','ultimate-author-box') ?></option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<?php
										break;
										case 'uab_facebook_feedss':
										?>
										<input type="hidden" class="uab_tab_name" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_name]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_name']);?>">
										<input type="hidden" class="uab_tab_type" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_type]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_type']);?>">
										<input type="hidden" id="uab_admin_url" name="uab_profile_data[<?php esc_attr_e($key);?>][admin_url]" value="<?php echo admin_url().'user-edit.php?user_id='.($user->ID);?>">
										<div class="uab-facebook-wrapper uab-profile-header">
											<div class="uab-header-wrapper">
												<h2><?php _e( 'Facebook Feed Settings', 'ultimate-author-box' ); ?></h2>
											</div>
											<div class="uab-profile-content-wrapper">
												<div class="uab-field uab-profile-field">
													<label for="uab-facebook-id"><?php _e( 'Facebook APP ID', 'ultimate-author-box' ); ?></label>
													<input type="text" class="uab-text-field regular-text" id="uab-facebook-id" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_facebook_id]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_facebook_id'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_facebook_id'] ) : ''; ?>" <?php if( !empty($unserialized_uab_profile_data[$key]['uab_facebook_id'])) esc_attr_e('readonly');?>>
												</div>
												<div class="uab-field uab-profile-field">
													<label for="uab-facebook-token"><?php _e( 'Facebook APP Secret', 'ultimate-author-box' ); ?></label>
													<input type="text" class="uab-token-field regular-text" id="uab-facebook-token" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_facebook_token]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_facebook_token'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_facebook_token'] ) : ''; ?>" <?php if( !empty($unserialized_uab_profile_data[$key]['uab_facebook_token'])) esc_attr_e('readonly');?>>
												</div>
												<div class="uab-field uab-profile-field">
													<label for="uab-facebook-userid"><?php _e( 'Facebook Profile/Page ID', 'ultimate-author-box' ); ?></label>
													<input type="text" class="uab-token-field regular-text" id="uab-facebook-userid" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_facebook_userid]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_facebook_userid'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_facebook_userid'] ) : ''; ?>">
													<span class="uab-info"><?php _e( 'You can get your Profile/Page ID from ', 'ultimate-author-box' ) ?><tt><a href = "http://findmyfbid.com/" target="_blank">http://findmyfbid.com/</a></tt></span>
												</div>
												<div class="uab-field uab-profile-field">
													<label for="uab-facebook-feed-number"><?php _e( 'Number of Facebook Feeds', 'ultimate-author-box' ); ?></label>
													<input type="number" min="0" class="uab-text-field" id="uab-facebook-feed-number" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_facebook_feed_number]" value="<?php echo (isset( $unserialized_uab_profile_data[$key]['uab_facebook_feed_number'] )) ? esc_attr( $unserialized_uab_profile_data[$key]['uab_facebook_feed_number'] ) : ''; ?>">
												</div>
											</div>
										</div>
										<?php
										// include(UAB_PATH . 'inc/backend/uab-backend-tabs/uab-facebook-fetch.php');
										
										break;
										case 'uab_shortcode':
											?>
											<div class="uab-shortcode-wrapper uap-option-wrapper">
												<input type="hidden" class="uab_tab_name" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_name]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_name']);?>">
												<input type="hidden" class="uab_tab_type" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_type]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_type']);?>">
												<div class="uab-field uab-profile-field">
													<label for="uab-tab-shortcode"><?php _e( 'Shortcode', 'ultimate-author-box' ); ?></label>
													<input type="text" class="uab-text-field" id="uab-tab-shortcode" name="uab_shortcode[<?php esc_attr_e($key);?>]" value="<?php echo (isset( $uab_shortcode[$key] )) ? esc_attr( $uab_shortcode[$key]) : ''; ?>" >
												</div>
											</div><!-- End of Shortcode Tab-->
											<?php
										break;
										case 'uab_widget':
										?>
										<div class="uab-widget-wrapper uap-option-wrapper">
											<input type="hidden" class="uab_tab_name" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_name]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_name']);?>">
											<input type="hidden" class="uab_tab_type" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_type]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_type']);?>">
											<input type="hidden" id="uab_tab_key" name="<?php esc_attr_e($key);?>">
											<?php
											$widget_key=$key;
											?>
											<div class="uab-select-widget-wrapper">
												<div class="uab-field">
													<label><?php _e('Add Widgets','ultimate-author-box')?></label>
													<input class="button button-secondary uab_add_widgets" type="button" value="<?php esc_attr_e('Select Widgets', 'ultimate-author-box'); ?>">
												</div>
													<div class="lists_widgets" title="<?php _e( 'Lists Of Widgets', 'ultimate-author-box' ); ?>"> 
														<ul>
															<?php 			
															global $wp_widget_factory;
															$wordpress_widgets = array();

															foreach( $wp_widget_factory->widgets as $wordpress_widget ) {
																$wordpress_widgets[] = array(
																	'text' => $wordpress_widget->name,
																	'value' => $wordpress_widget->id_base,
																	'description' => $wordpress_widget->widget_options['description']
																);
															}
															foreach ($wordpress_widgets as $key => $value) { ?>
															<li class="all_wp_widgets" data-value="<?php esc_attr_e($value['value']);?>" data-text="<?php esc_attr_e($value['text']);?>">
																<div class="widget-type-wrapper">
																	<span class="widget-icon dashicons dashicons-wordpress"></span>
																	<h3><?php esc_html_e($value['text']);?></h3>
																	<p class="widgets_description"><?php esc_html_e($value['description']);?></p>
																</div>
															</li>
															<?php }
															?>
														</ul>
													</div>
											</div>

											<div class="uab_listed_widgets">
												<div><label><?php _e('Listed Widgets','ultimate-author-box')?></label></div>
												<div class="uab-field">
													<div class="uab_save_data" style="display:none;">
														<img src="<?php echo esc_url( admin_url() . '/images/loading.gif' ); ?>">
														<span class="saving_msg"></span>
													</div>
													<div class="listed_selected_widgets">
														<?php
														if(isset($unserialized_uab_profile_data[$widget_key]['widget_id'])){
															if(!empty($unserialized_uab_profile_data[$widget_key]['widget_id'])){ 
																$widget_id = $unserialized_uab_profile_data[$widget_key]['widget_id'];
																$widget_title = $unserialized_uab_profile_data[$widget_key]['widget_title'];
																?>

																<div class="uab_widget_area ui-sortable" data-title="<?php echo esc_attr( $widget_title  );?>" 
																	data-id="<?php echo esc_attr( $widget_id );?>">
																	<input type="hidden" name="uab_profile_data[<?php esc_attr_e($widget_key);?>][widget_id]" value="<?php echo esc_attr( $widget_id );?>"/>
																	<input type="hidden" name="uab_profile_data[<?php esc_attr_e($widget_key);?>][widget_title]" value="<?php echo esc_attr( $widget_title);?>"/>
																	<div class="widget_area">
																		<div class="widget_title">
																			<span><i class="fa fa-wordpress" aria-hidden="true"></i></span>
																			<span class="wptitle"><?php echo esc_attr( $widget_title  );?></span>
																		</div>
																		<div class="widget_right_action">
																			<a class="widget-option widget-action" title="<?php echo esc_attr( __("Edit",'ultimate-author-box') );?>">
																				<i class="far fa-edit" aria-hidden="true"></i>
																			</a>
																		</div>
																	</div>
																	<div class="widget_inner"></div>
																</div>
																<?php 
															}
														}
														?>
													</div>
												</div>
											</div>
										</div>
										<?php
										break;
										case 'uab_editor':
											?>
												<input type="hidden" class="uab_tab_name" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_name]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_name']);?>">
												<input type="hidden" class="uab_tab_type" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_type]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_type']);?>">
												<?php
													$allowed_html = wp_kses_allowed_html( 'post' );
													$retrieved_value = (isset($uab_wysiwyg_content[$key]) && !empty($uab_wysiwyg_content[$key]))?$uab_wysiwyg_content[$key]:'';
													$content = stripslashes(stripslashes(wp_kses($retrieved_value,$allowed_html)));
													$editor_id = "uab-wysiwyg-content-" . esc_attr__($key);
													$settings = array(
														'textarea_name'	=> 'uab_wysiwyg_content[' . esc_attr__($key) . ']',
														'media_buttons'	=> true,
														'wpautop'		=> false,
														'editor_class'	=> 'uab-editor',
														'editor_height'	=> 200,
														// 'quicktags'		=> array('buttons'=>'a,b,i,strong,em,ul,ol,li'),
													);
													wp_editor( $content , $editor_id , $settings );
												?>
											<?php
										break;
										case 'uab_linkedin_profile':
										?>
										<?php if (isset($_GET['message'])): ?>
											<?php if ($_GET['message'] == 'failedAuth'): ?>
												<div class="notice notice-info is-dismissible"><p><?php esc_attr_e('Failed to authenticate user','ultimate-author-box') ?></p></div>
											<?php elseif ($_GET['message'] == 'success') : ?>
												<div class="notice notice-success is-dismissible"><p><?php esc_attr_e('Successfully received access token','ultimate-author-box') ?></p></div>
											<?php elseif ($_GET['message'] == 'failedAccess') : ?>
												<div class="notice notice-warning is-dismissible"><p><?php esc_attr_e('Failed to connect/access','ultimate-author-box') ?></p></div>
											<?php elseif ($_GET['message'] == 'stateInvalid') : ?>
												<div class="notice notice-error is-dismissible"><p><?php esc_attr_e('The State has been compromised. Please try again.','ultimate-author-box') ?></p></div>
											<?php endif ?>
										<?php endif ?>
										<input type="hidden" class="uab_tab_name" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_name]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_name']);?>">
										<input type="hidden" class="uab_tab_type" name="uab_profile_data[<?php esc_attr_e($key);?>][uab_tab_type]" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_tab_type']);?>">
										<div class="uab-linkedin-profile-content-wrapper">
											<div class="uab-field uab-profile-field">
												<label for="uab-linkedin-client-id"><?php _e( 'Linkedin Client ID', 'ultimate-author-box' ); ?></label>
												<input type="text" class="uab-text-field" name="uab_profile_data[<?=$key ?>][uab_linkedin_client_id]" id="uab-linkedin-client-id" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_linkedin_client_id']) ?>">
											</div>
											<div class="uab-field uab-profile-field">
												<label for="uab-linkedin-secret-id"><?php _e( 'Linkedin Secret ID', 'ultimate-author-box' ); ?></label>
												<input type="text" class="uab-text-field" name="uab_profile_data[<?=$key ?>][uab_linkedin_secret_id]" id="uab-linkedin-secret-id" value="<?php esc_attr_e($unserialized_uab_profile_data[$key]['uab_linkedin_secret_id']) ?>">
											</div>
											<?php
												$scope = array('r_basicprofile');
												$scope = array_unique(apply_filters('linkedin_scope', $scope));
												$redirect_uri = $_SERVER["REQUEST_URI"];
												$redirect_uri = $this->get_token_process_url($redirect_uri);

												$authorization_link = 'https://www.linkedin.com/oauth/v2/authorization?' . http_build_query(array(
														'response_type' => 'code',
														'client_id' => $unserialized_uab_profile_data[$key]['uab_linkedin_client_id'],
														'scope' => implode(' ', $scope),
														'state' => $this->get_state_token(),
														'redirect_uri' => $redirect_uri), '', '&');
											?>
											<a href="<?php echo $authorization_link ?>"><button type="button" class="button button-secondary"><?php esc_attr_e('Retreive Access Token','ultimate-author-box') ?></button></a>
											<?php
											if (!empty(get_the_author_meta('uab_linkedin_access_token',$user->ID))) {
												do_shortcode('[uab_linkedin_profile user_id=' . intval($user->ID) .']');
												$json_data = get_the_author_meta('uab_linkedin_profile_data',$user->ID);
											}
											?>
											<?php
											if (isset($json_data) && !empty($json_data)): ?>
												<div class="uab-field uab-profile-field">
													<label for="uab-linkedin-headline-display"><?php esc_attr_e('Hide Headline','ultimate-author-box') ?></label>
													<input type="checkbox" name="uab_profile_data[<?=$key ?>][uab_header_hide]" id="uab-linkedin-headline-display" value="1" <?php checked(isset($unserialized_uab_profile_data[$key]['uab_header_hide'])?intval($unserialized_uab_profile_data[$key]['uab_header_hide']):intval(0),1) ?>>
												</div>
												<div class="uab-field uab-profile-field">
													<label for="uab-linkedin-company-display"><?php esc_attr_e('Hide Company Details','ultimate-author-box') ?></label>
													<input type="checkbox" name="uab_profile_data[<?=$key ?>][uab_company_details_hide]" id="uab-linkedin-company-display" value="1" <?php checked(isset($unserialized_uab_profile_data[$key]['uab_company_details_hide'])?intval($unserialized_uab_profile_data[$key]['uab_company_details_hide']):intval(0),1) ?>>
												</div>
											<?php endif ?>
										</div>
										<?php
										break;
										default:
									}
			                	}	

							?>
			                </div><!-- End of Dynamic Tab-->
		               	<?php
		           	}
		            }
			    }
			?>
			<div class="uab-custom-tab ui-tabs-panel" style="display:none;">
				<div class="uab-profile-content-wrapper">
					<div class="uab-field uab-profile-field">
						<label><?php _e('Enable Personal Template','ultimate-author-box');?></label>
						<input type="checkbox" name="uab_profile_data[1][uab_personal_theme]" <?php if ( isset($unserialized_uab_profile_data[1]['uab_personal_theme'] )) echo 'checked'; ?>>
					</div>
					<div class="uab-field uab-profile-field">
						<label for="uab-tab-type-selection"><?php _e( 'Select Template', 'ultimate-author-box' ); ?></label>
						<select class="uab-select-input1 uab-select-template"  name="uab_profile_data[1][uab_select_template]">	<optgroup label="<?php _e( 'Default template', 'ultimate-author-box' ); ?>"></optgroup>
							<option  value="uab-template-1" <?php if (isset($unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template']=='uab-template-1' ) echo 'selected'; ?>><?php _e( 'Template 1', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-2" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] == 'uab-template-2') echo 'selected'; ?>><?php _e( 'Template 2', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-3" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template']=='uab-template-3') echo 'selected'; ?>><?php _e( 'Template 3', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-4" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-4' ) echo 'selected'; ?>><?php _e( 'Template 4', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-5" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-5' ) echo 'selected'; ?>><?php _e( 'Template 5', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-6" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-6' ) echo 'selected'; ?>><?php _e( 'Template 6', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-7" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-7' ) echo 'selected'; ?>><?php _e( 'Template 7', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-8" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-8' ) echo 'selected'; ?>><?php _e( 'Template 8', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-9" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-9' ) echo 'selected'; ?>><?php _e( 'Template 9', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-10" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-10') echo 'selected'; ?>><?php _e( 'Template 10', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-11" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-11') echo 'selected'; ?>><?php _e( 'Template 11', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-12" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-12') echo 'selected'; ?>><?php _e( 'Template 12', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-13" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-13') echo 'selected'; ?>><?php _e( 'Template 13', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-14" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-14') echo 'selected'; ?>><?php _e( 'Template 14', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-15" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-15') echo 'selected'; ?>><?php _e( 'Template 15', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-16" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-16') echo 'selected'; ?>><?php _e( 'Template 16', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-17" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-17') echo 'selected'; ?>><?php _e( 'Template 17', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-18" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-18') echo 'selected'; ?>><?php _e( 'Template 18', 'ultimate-author-box' ); ?></option>
							<option  value="uab-template-19" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-template-19') echo 'selected'; ?>><?php _e( 'Template 19', 'ultimate-author-box' ); ?></option>
							<optgroup label="<?php _e( 'Custom template', 'ultimate-author-box' ); ?>"></optgroup>
									<option  value="uab-custom-template" <?php if (isset( $unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-custom-template') echo 'selected'; ?>><?php _e( 'Custom Template', 'ultimate-author-box' ); ?></option>
						</select>
					</div>
						<div class="uab-template-image-preview" <?php if(isset($unserialized_uab_profile_data[1]['uab_select_template']) &&  $unserialized_uab_profile_data[1]['uab_select_template'] == 'uab-custom-template') echo 'style="display:none;"';?>>
							<?php 
								$uab_image_source='uab-template-1.PNG';
								if(isset($unserialized_uab_profile_data[1]['uab_select_template'])){
									$uab_select_template = $unserialized_uab_profile_data[1]['uab_select_template'];
								}
								else{
									$uab_select_template = 'uab-template-1';
								}
								switch($uab_select_template){
									case 'uab-template-1':
									$uab_image_source='uab-template-1.PNG';
									break;
									case 'uab-template-2':
									$uab_image_source='uab-template-2.PNG';
									break;
									case 'uab-template-3':
									$uab_image_source='uab-template-3.PNG';
									break;
									case 'uab-template-4':
									$uab_image_source='uab-template-4.PNG';
									break;
									case 'uab-template-5':
									$uab_image_source='uab-template-5.PNG';
									break;
									case 'uab-template-6':
									$uab_image_source='uab-template-6.PNG';
									break;
									case 'uab-template-7':
									$uab_image_source='uab-template-7.PNG';
									break;
									case 'uab-template-8':
									$uab_image_source='uab-template-8.PNG';
									break;
									case 'uab-template-9':
									$uab_image_source='uab-template-9.PNG';
									break;
									case 'uab-template-10':
									$uab_image_source='uab-template-10.PNG';
									break;
									case 'uab-template-11':
									$uab_image_source='uab-template-11.PNG';
									break;
									case 'uab-template-12':
									$uab_image_source='uab-template-12.PNG';
									break;
									case 'uab-template-13':
									$uab_image_source='uab-template-13.PNG';
									break;
									case 'uab-template-14':
									$uab_image_source='uab-template-14.PNG';
									break;
									case 'uab-template-15':
									$uab_image_source='uab-template-15.PNG';
									break;
									case 'uab-template-16':
									$uab_image_source='uab-template-16.PNG';
									break;
									case 'uab-template-17':
									$uab_image_source='uab-template-17.PNG';
									break;
									case 'uab-template-18':
									$uab_image_source='uab-template-18.PNG';
									break;
									case 'uab-template-19':
									$uab_image_source='uab-template-19.PNG';
									break;
									default:
									$uab_image_source='uab-template-1.PNG';
								}							
							?>
							<img src="<?php esc_attr_e(UAB_IMG_DIR); ?>/uab-template-screenshorts/<?php esc_attr_e($uab_image_source); ?>" width="100%"/>
						</div>
					<div class="uab-personal-template-select" <?php if(!(isset($unserialized_uab_profile_data[1]['uab_select_template']) && $unserialized_uab_profile_data[1]['uab_select_template'] =='uab-custom-template')) echo 'style="display:none;"'?>>
						<div class="uab-field uab-profile-field">
							<label for="uab-tab-type-selection"><?php _e( 'Select Custom Template', 'ultimate-author-box' ); ?></label>
							<select class="uab-select-input1 uab-custom-template"  name="uab_profile_data[1][uab_custom_template]">
								<option  value="uab-template-1" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) && $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-1' ) echo 'selected'; ?>><?php _e( 'Template 1', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-2" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-2' ) echo 'selected'; ?>><?php _e( 'Template 2', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-3" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-3' ) echo 'selected'; ?>><?php _e( 'Template 3', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-4" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-4' ) echo 'selected'; ?>><?php _e( 'Template 4', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-5" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-5' ) echo 'selected'; ?>><?php _e( 'Template 5', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-6" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-6' ) echo 'selected'; ?>><?php _e( 'Template 6', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-7" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-7' ) echo 'selected'; ?>><?php _e( 'Template 7', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-8" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-8' ) echo 'selected'; ?>><?php _e( 'Template 8', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-9" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-9' ) echo 'selected'; ?>><?php _e( 'Template 9', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-10" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-10' ) echo 'selected'; ?>><?php _e( 'Template 10', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-11" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-11' ) echo 'selected'; ?>><?php _e( 'Template 11', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-12" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-12' ) echo 'selected'; ?>><?php _e( 'Template 12', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-13" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-13' ) echo 'selected'; ?>><?php _e( 'Template 13', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-14" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-14' ) echo 'selected'; ?>><?php _e( 'Template 14', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-15" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-15' ) echo 'selected'; ?>><?php _e( 'Template 15', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-16" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-16' ) echo 'selected'; ?>><?php _e( 'Template 16', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-17" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-17' ) echo 'selected'; ?>><?php _e( 'Template 17', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-18" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-18' ) echo 'selected'; ?>><?php _e( 'Template 18', 'ultimate-author-box' ); ?></option>
								<option  value="uab-template-19" <?php if (isset( $unserialized_uab_profile_data[1]['uab_custom_template']) &&  $unserialized_uab_profile_data[1]['uab_custom_template']=='uab-template-19' ) echo 'selected'; ?>><?php _e( 'Template 19', 'ultimate-author-box' ); ?></option>
							</select>
						</div>
						<div class="uab-template-image-preview" >
							<?php 
								$uab_image_source='uab-template-1.PNG';
								if(isset($unserialized_uab_profile_data[1]['uab_custom_template'])){
									$uab_custom_template = $unserialized_uab_profile_data[1]['uab_custom_template'];
								}
								else{
									$uab_custom_template = 'uab-template-1';
								}
								switch($uab_custom_template){
									case 'uab-template-1':
									$uab_image_source='uab-template-1.PNG';
									break;
									case 'uab-template-2':
									$uab_image_source='uab-template-2.PNG';
									break;
									case 'uab-template-3':
									$uab_image_source='uab-template-3.PNG';
									break;
									case 'uab-template-4':
									$uab_image_source='uab-template-4.PNG';
									break;
									case 'uab-template-5':
									$uab_image_source='uab-template-5.PNG';
									break;
									case 'uab-template-6':
									$uab_image_source='uab-template-6.PNG';
									break;
									case 'uab-template-7':
									$uab_image_source='uab-template-7.PNG';
									break;
									case 'uab-template-8':
									$uab_image_source='uab-template-8.PNG';
									break;
									case 'uab-template-9':
									$uab_image_source='uab-template-9.PNG';
									break;
									case 'uab-template-10':
									$uab_image_source='uab-template-10.PNG';
									break;
									case 'uab-template-11':
									$uab_image_source='uab-template-11.PNG';
									break;
									case 'uab-template-12':
									$uab_image_source='uab-template-12.PNG';
									break;
									case 'uab-template-13':
									$uab_image_source='uab-template-13.PNG';
									break;
									case 'uab-template-14':
									$uab_image_source='uab-template-14.PNG';
									break;
									case 'uab-template-15':
									$uab_image_source='uab-template-15.PNG';
									break;
									case 'uab-template-16':
									$uab_image_source='uab-template-16.PNG';
									break;
									case 'uab-template-17':
									$uab_image_source='uab-template-17.PNG';
									break;
									case 'uab-template-18':
									$uab_image_source='uab-template-18.PNG';
									break;
									case 'uab-template-19':
									$uab_image_source='uab-template-19.PNG';
									break;
									default:
									$uab_image_source='uab-template-1.PNG';
								}							
							?>
							<img src="<?php esc_attr_e(UAB_IMG_DIR); ?>/uab-template-screenshorts/<?php esc_attr_e($uab_image_source); ?>" width="100%"/>
						</div>
						<?php //$this->print_array($unserialized_uab_profile_data[1]['uab_custom_template']);?>
						<div class="uab-field uab-profile-field uab-primary-color uab-custom-template-option">
							<label><?php _e('Primary Color','ultimate-author-box');?></label>
							<input type="text" name="uab_profile_data[1][uab_primary_color]" data-alpha="true" value="<?php echo isset($unserialized_uab_profile_data[1]['uab_primary_color'])? esc_attr($unserialized_uab_profile_data[1]['uab_primary_color']) :'';?>" class="small uab-color-picker uab-primary-color-picker" >
						</div>
						<div class="uab-field uab-profile-field uab-secondary-color uab-custom-template-option" <?php if(isset($unserialized_uab_profile_data[1]['uab_custom_template']) && !($unserialized_uab_profile_data[1]['uab_custom_template'] == 'uab-template-3' || $unserialized_uab_profile_data[1]['uab_custom_template'] == 'uab-template-5' || $unserialized_uab_profile_data[1]['uab_custom_template'] == 'uab-template-7' || $unserialized_uab_profile_data[1]['uab_custom_template'] == 'uab-template-11' || $unserialized_uab_profile_data[1]['uab_custom_template'] == 'uab-template-13'|| $unserialized_uab_profile_data[1]['uab_custom_template'] == 'uab-template-14'|| $unserialized_uab_profile_data[1]['uab_custom_template'] == 'uab-template-18')) echo 'style="display:none;"'; elseif(!isset($unserialized_uab_profile_data[1]['uab_custom_template'])) echo 'style="display:none;"';?>>
							<label><?php _e('Secondary Color','ultimate-author-box');?></label>
							<input type="text" name="uab_profile_data[1][uab_secondary_color]" data-alpha="true" value="<?php echo isset($unserialized_uab_profile_data[1]['uab_secondary_color'] )? esc_attr( $unserialized_uab_profile_data[1]['uab_secondary_color']) : ''; ?>" class="small uab-color-picker uab-secondary-color-picker" >
						</div>
						<div class="uab-field uab-profile-field uab-tertiary-color uab-custom-template-option" <?php if(isset($unserialized_uab_profile_data[1]['uab_custom_template']) && !($unserialized_uab_profile_data[1]['uab_custom_template'] == 'uab-template-7' || $unserialized_uab_profile_data[1]['uab_custom_template'] == 'uab-template-16' )) echo 'style="display:none;"'; elseif(!isset($unserialized_uab_profile_data[1]['uab_custom_template'])) echo 'style="display:none;"';?>>
							<label><?php _e('Tertiary Color','ultimate-author-box');?></label>
							<input type="text" name="uab_profile_data[1][uab_tertiary_color]" data-alpha="true" value="<?php echo (isset( $unserialized_uab_profile_data[1]['uab_tertiary_color'] )) ? esc_attr( $unserialized_uab_profile_data[1]['uab_tertiary_color']) : ''; ?>" class="small uab-color-picker uab-tertiary-color-picker" >
						</div>
						<div class="uab-field uab-profile-field uab-background uab-custom-template-option" 
							<?php if(isset($unserialized_uab_profile_data[1]['uab_custom_template']) && !($unserialized_uab_profile_data[1]['uab_custom_template'] == 'uab-template-13' || $unserialized_uab_profile_data[1]['uab_custom_template'] == 'uab-template-15' || $unserialized_uab_profile_data[1]['uab_custom_template'] == 'uab-template-18'|| $unserialized_uab_profile_data[1]['uab_custom_template'] == 'uab-template-19')) echo 'style="display:none;"'; elseif(!isset($unserialized_uab_profile_data[1]['uab_custom_template'])) echo 'style="display:none;"';?>
						>
							<label for="custom_image_background"><?php _e( 'Upload Custom Image', 'ultimate-author-box' ); ?></label>
							<input type="text" class="uab_upload_background_url" name="uab_profile_data[1][custom_image_background]" value="<?php echo (isset( $unserialized_uab_profile_data[1]['custom_image_background'] )) ? esc_attr( $unserialized_uab_profile_data[1]['custom_image_background']) : ''; ?>"/>
							<input type="button" class="custom_image_background_button input-controller image_button button-secondary"  value="<?php esc_attr_e('Upload Image','ultimate-author-box');?>" size="25"/> 
							<div class="background-image-preview">
								<div class="current-background-image" >
									<h4><?php _e( 'Image Preview:', 'ultimate-author-box' ); ?></h4>
									<img src="<?php echo (isset( $unserialized_uab_profile_data[1]['custom_image_background'] )) ? esc_attr( $unserialized_uab_profile_data[1]['custom_image_background']) : ''; ?>" style="height:180px; width:180px;"/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- End Of Tabs-->
	</div>
</div>

<?php include(UAB_PATH . '/inc/backend/uab-backend-tabs/uap-skeleton-tab.php'); ?>

	
