<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="new-tab-outer-wrapper" style="display:none">
	<div class="uab-new-tab">
		<div class="uab-tab-content">
			<div class="uab-recent-post-outer-wrapper uap-option-wrapper">
				<div class="uab-recent-post-wrapper uap-option-wrapper">
					<input type="hidden" class="uab_tab_name" name="uab_profile_data[uab_id][uab_tab_name]">
					<input type="hidden" class="uab_tab_type" name="uab_profile_data[uab_id][uab_tab_type]">
					<input type="hidden" id="uab_tab_id" name="uab_profile_data[uab_id][uab_tab_id] ">
					<div class="uab-recent-post-header-wrapper uab-title-wrapper uab-profile-header">
						<h2><?php _e( 'Author Posts', 'ultimate-author-box' ); ?></h2>
					</div>
					<div class="uab-profile-content-wrapper">
						<div class="author-post-wrapper">
							<div class="latest-posts-wrapper uab-author-post-option uab-profile-field">
								<label><?php _e( 'Frontend Tab Title', 'ultimate-author-box' ); ?></label>	
								<input type="text" name="uab_profile_data[uab_id][uab_author_post_tab_title]" value="<?php esc_html_e('Recent Posts','ultimate-form-builder');?>"/>
							</div>
							<div class="latest-posts-wrapper uab-author-post-option uab-profile-field">
								<label><?php _e( 'Number of posts', 'ultimate-author-box' ); ?></label>	
								<input type="number" min="0" name="uab_profile_data[uab_id][uab_post_number]" value="5"/>
							</div>
							<div class="uab-field uab-profile-field">
								<label><?php _e( 'Select Post Type', 'ultimate-author-box' ); ?></label>
								<select class="uab_post_select" name="uab_profile_data[uab_id][uab_post_select]">
									<option value="uab_latest_posts"><?php _e( 'Latest Posts', 'ultimate-author-box' ); ?></option>
									<option value="uab_selective_posts"><?php _e( 'Selective Posts', 'ultimate-author-box' ); ?></option>
								</select>
							</div>

							<div class="uab-selective-posts uab-author-post-option uab-profile-field" style="display: none;">
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
												<input type="checkbox" value="<?php esc_attr_e($post->ID);?>" name="uab_profile_data[uab_id][uab_post_list][]">
												<?php esc_html_e($title); ?>
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
									<input type="checkbox" name="uab_profile_data[uab_id][uab_disable_date]" value="1">
								</div>
							</div>
							<div class="latest-posts-wrapper uab-author-disable uab-profile-field">
								<label><?php _e('Hide Post Author','ultimate-author-box') ?></label>
								<div class="uab-disable-author">
									<input type="checkbox" name="uab_profile_data[uab_id][uab_disable_author]" value="1">
								</div>
							</div>
							<div class="latest-posts-wrapper uab-author-url-disable uab-profile-field">
								<label><?php _e('Disable Author URL','ultimate-author-box') ?></label>
								<div class="uab-disable-author-url">
									<input type="checkbox" name="uab_profile_data[uab_id][uab_disable_author_url]" value="1">
								</div>
							</div>
						</div>
					</div>
				</div><!-- End of Recent Posts-->
			</div>

			<div class="uab-company-info-outer-wrapper uap-option-wrapper">
				<div class="uab-company-info-wrapper uap-option-wrapper">
					<input type="hidden" class="uab_tab_name" name="uab_profile_data[uab_id][uab_tab_name]">
					<input type="hidden" class="uab_tab_type" name="uab_profile_data[uab_id][uab_tab_type]">
					<div class="uab-company-info-header-wrapper uab-title-wrapper uab-profile-header">
						<h2><?php _e( 'Additional Company Information', 'ultimate-author-box' ); ?></h2>
					</div>
					<div class="uab-profile-content-wrapper uab-profile-field">
						<label for="uab_upload_company_url"><?php _e( 'Upload Custom Image', 'ultimate-author-box' ); ?></label>
						<input type="text" name="uab_profile_data[uab_id][uab_upload_company_url]" class="uab_upload_company_url input-controller required"/>
						<input type="button" class="uab_company_image_button input-controller image_button button-secondary"  value="<?php esc_attr_e('Upload Image','ultimate-author-box');?>" size="25"/> 
						<div class="company-image-preview">
							<h4><?php _e( 'Image Preview:', 'ultimate-author-box' ); ?></h4>
							<div class="current-company-image" ><img src=" " style="height:180px; width:180px;"/></div>
						</div>
					</div>
					<div class="uab-company-detail-description uab-profile-field">
						<label><?php _e( 'Company Detail Description', 'ultimate-author-box' );?></label>
						<textarea id="uab-company-content" name="uab_company_content[uab_id]"></textarea>
					</div>
				</div><!-- End of Company Info-->
			</div>

			<div class="uab-contact-form-outer-wrapper uap-option-wrapper">
				<div class="uab-contact-form-wrapper uap-option-wrapper">
					<input type="hidden" class="uab_tab_name" name="uab_profile_data[uab_id][uab_tab_name]">
					<input type="hidden" class="uab_tab_type" name="uab_profile_data[uab_id][uab_tab_type]">
					<div class="uab-contact-form-header-wrapper uab-title-wrapper uab-profile-header">
						<h2><?php _e( 'Contact Form Settings', 'ultimate-author-box' ); ?></h2>
					</div>
					<div class="uab-profile-content-wrapper">
						<div class="select-tab-wrapper uab-profile-field">
							<label for="uab-popup-selection"><?php _e( 'Select Tab Type', 'ultimate-author-box' ); ?></label>
							<select class="uab-contact-type-selection " name="uab_profile_data[uab_id][uab_contact_type_selection]">
								<option value="uab_default_contact_form"><?php _e( 'Default Contact Form', 'ultimate-author-box' ); ?></option>
								<option value="uab_shortcode_contact_form"><?php _e( 'External Contact Form', 'ultimate-author-box' ); ?></option>
							</select>
						</div>
						<div class="custom-contact-form-fields-wrapper">
							<div class="uab-field uab-profile-field">
								<label for="uab-contact-form-name"><?php _e( 'Contact Form Title', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-text-field" id="uab-contact-form-name" name="uab_profile_data[uab_id][uab_contact_form_name]" value="<?php _e( 'Contact Me', 'ultimate-author-box' ); ?>">
							</div>
							<div class="uab-field uab-profile-field">
								<label for="uab-contact-form-from-label"><?php _e( 'Name Label', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-text-field" id="uab-contact-form-from-label" name="uab_profile_data[uab_id][uab_from_label]" value="<?php _e( 'Name', 'ultimate-author-box' ); ?>">
							</div>
							<div class="uab-field uab-profile-field">
								<label for="uab-contact-form-email-label"><?php _e( 'Email Label', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-text-field" id="uab-contact-form-email-label" name="uab_profile_data[uab_id][uab_email_label]" value="<?php _e( 'Email', 'ultimate-author-box' ); ?>">
							</div>
							<div class="uab-field uab-profile-field">
								<label for="uab-contact-form-subject-label"><?php _e( 'Subject Label', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-text-field" id="uab-contact-form-subject-label" name="uab_profile_data[uab_id][uab_subject_label]" value="<?php _e( 'Subject', 'ultimate-author-box' ); ?>">
							</div>
							<div class="uab-field uab-profile-field">
								<label for="uab-contact-form-phone-label"><?php _e( 'Phone Label', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-text-field" id="uab-contact-form-phone-label" name="uab_profile_data[uab_id][uab_phone_label]" value="<?php _e( 'Phone', 'ultimate-author-box' ); ?>">
							</div>
							<div class="uab-field uab-profile-field">
								<label for="uab-contact-form-message-label"><?php _e( 'Message Label', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-text-field" id="uab-contact-form-message-label" name="uab_profile_data[uab_id][uab_message_label]" value="<?php _e( 'Message', 'ultimate-author-box' ); ?>">
							</div>
							<div class="uab-field uab-profile-field">
								<label for="uab-contact-form-submit-btn-label"><?php _e( 'Submit Button Label', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-text-field" id="uab-contact-form-submit-btn-label" name="uab_profile_data[uab_id][uab_submit_btn_label]" >
							</div>
							<div class="uab-field uab-profile-field">
								<label for="uab-contact-form-success-message-label"><?php _e( 'Success Message', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-text-field" id="uab-contact-form-success-message-label" name="uab_profile_data[uab_id][uab_submission_message]" value="<?php _e( 'Your message has been sent successfully!!', 'ultimate-author-box' ); ?>">
							</div>
							<div class="uab-field uab-profile-field">
								<label for="uab-contact-form-success-message-label"><?php _e( 'Send To Email', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-text-field" id="uab-contact-form-sent-to-label" name="uab_profile_data[uab_id][uab_send_to_email]" value="<?php esc_attr_e(the_author_meta( 'email', $user->ID)); ?>">
							</div>
						</div>
						<div class="contact-shortcode-wrapper" style="display: none">
							<div class="uab-field uab-profile-field">
								<label for="uab-contact-form-shortcode"><?php _e( 'Contact Form Shortcode', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-text-field" id="uab-contact-form-shortcode" name="uab_contact_shortcode[uab_id]" >
							</div>
						</div>
					</div>
				</div><!-- End of Contact Form-->
			</div>

			<div class="uab-twitter-feeds-outer-wrapper uap-option-wrapper">
				<div class="uab-twitter-feeds-wrapper uap-option-wrapper">
					<input type="hidden" class="uab_tab_name" name="uab_profile_data[uab_id][uab_tab_name]">
					<input type="hidden" class="uab_tab_type" name="uab_profile_data[uab_id][uab_tab_type]">
						<?php if($twitter_flag == '1'):?>
							<span><?php esc_html_e('Note: The Admin has not configured the Twitter Settings. Please contact Admin to use Twitter Feeds.','ultimate-author-box');?></span>
						<?php endif?>
						<div class="uab-twitter-header-wrapper uab-title-wrapper uab-profile-header">
							<h2><?php _e( 'Twitter Settings', 'ultimate-author-box' ); ?></h2>
						</div>
						<div class="uab-profile-content-wrapper">
							<div class="uab-field uab-profile-field">
								<label for="uab-twitter-username"><?php _e( 'Twitter Username', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-text-field" id="uab-twitter-username" name="uab_profile_data[uab_id][uab_twitter_username]" <?php if($twitter_flag == '1') echo 'disabled';?>>
							</div>
							<div class="uab-field uab-profile-field">
								<label for="uab-twitter-feed-number"><?php _e( 'Number of Twitter Feeds', 'ultimate-author-box' ); ?></label>
								<input type="number" min="0" class="uab-text-field" id="uab-twitter-feed-number" name="uab_profile_data[uab_id][uab_twitter_feed_number]" value="5" <?php if($twitter_flag == '1') echo 'disabled';?>>
							</div>
						</div>
					</div>
				</div><!-- End of Feeds-->
			</div>

			<div class="uab-rss-feeds-outer-wrapper uap-option-wrapper">
				<div class="uab-rss-feeds-wrapper uap-option-wrapper">
					<input type="hidden" class="uab_tab_name" name="uab_profile_data[uab_id][uab_tab_name]">
					<input type="hidden" class="uab_tab_type" name="uab_profile_data[uab_id][uab_tab_type]">
					<div class="uab-rss-wrapper">
						<div class="uab-header-wrapper uab-profile-header">
							<h2><?php _e( 'RSS Feed Settings', 'ultimate-author-box' ); ?></h2>
						</div>
						<div class="uab-profile-content-wrapper">
							<div class="uab-field uab-profile-field">
								<label for="uab-rss-url-skel"><?php _e( 'RSS URL', 'ultimate-author-box' ); ?></label>
								<input type="url" class="uab-text-field" id="uab-rss-url-skel" name="uab_profile_data[uab_id][uab_rss_url]">
							</div>
<!-- 							<div class="uab-field uab-profile-field">
								<label for="uab-rss-text"><?php _e( 'Read More Text', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-text-field" id="uab-rss-text" name="uab_profile_data[uab_id][uab_rss_text]" value="<?php esc_attr_e('Read more...'); ?>">
							</div> -->
							<div class="uab-field uab-profile-field">
				    			<label for="uab-link-target-option"><?php _e( 'Link target options', 'ultimate-author-box' ); ?></label>
				    			<select class="" id="uab-rss-link-target-skel" name="uab_profile_data[uab_id][uab_link_target]">
				    				<option  value="_blank"><?php _e( 'New Page', 'ultimate-author-box' ); ?></option>
				    				<option  value="_self"><?php _e( 'Same Page', 'ultimate-author-box' ); ?></option>
				    			</select>
				    		</div>
							<div class="uab-field uab-profile-field">
								<label for="uab-rss-feed-number-skel"><?php _e( 'Number of RSS Feeds', 'ultimate-author-box' ); ?></label>
								<input type="number" min="0" class="uab-text-field" id="uab-rss-feed-number-skel" name="uab_profile_data[uab_id][uab_rss_feed_number]" value="5">
							</div>
						</div>
					</div>
				</div><!-- End of Feeds-->
			</div>

			<div class="uab-external-link-outer-wrapper uap-option-wrapper">
				<div class="uab-external-link-wrapper uap-option-wrapper">
					<input type="hidden" class="uab_tab_name" name="uab_profile_data[uab_id][uab_tab_name]">
					<input type="hidden" class="uab_tab_type" name="uab_profile_data[uab_id][uab_tab_type]">
					<div class="uab-external-link-content-wrapper">
						<div class="uab-field uab-profile-field">
							<label for="uab-linkedin-external-link"><?php _e( 'External Link', 'ultimate-author-box' ); ?></label>
							<input type="text" class="uab-text-field" name="uab_profile_data[uab_id][uab_external_link_url]" id="uab-linkedin-external-link">
						</div>
						<div class="uab-field uab-profile-field">
							<label for="uab-linkedin-external-target"><?php _e( 'External Link target', 'ultimate-author-box' ); ?></label>
							<select id="uab-linkedin-external-target" name="uab_profile_data[uab_id][uab_external_link_target]">
								<option value="_self"><?php _e('Same Page','ultimate-author-box') ?></option>
								<option value="_blank"><?php _e('New Page','ultimate-author-box') ?></option>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="uab-facebook-feeds-outer-wrapper uap-option-wrapper">
				<div class="uab-facebook-feeds-wrapper uap-option-wrapper">
					<input type="hidden" class="uab_tab_name" name="uab_profile_data[uab_id][uab_tab_name]">
					<input type="hidden" class="uab_tab_type" name="uab_profile_data[uab_id][uab_tab_type]">
					<input type="hidden" id="uab_admin_url" name="uab_profile_data[uab_id][admin_url]" value="<?php echo admin_url().'user-edit.php?user_id='.($user->ID);?>">
					<div class="uab-facebook-wrapper uab-profile-header">
						<div class="uab-header-wrapper">
							<h2><?php _e( 'Facebook Feed Settings', 'ultimate-author-box' ); ?></h2>
						</div>
						<div class="uab-profile-content-wrapper ">
							<div class="uab-field uab-profile-field" >
								<label for="uab-facebook-id "><?php _e( 'Facebook APP ID', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-text-field regular-text" id="uab-facebook-id" name="uab_profile_data[uab_id][uab_facebook_id]">
							</div>
							<div class="uab-field uab-profile-field">
								<label for="uab-facebook-token"><?php _e( 'Facebook APP Secret', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-token-field regular-text" id="uab-facebook-token" name="uab_profile_data[uab_id][uab_facebook_token]">
							</div>
							<div class="uab-field uab-profile-field">
								<label for="uab-facebook-userid"><?php _e( 'Facebook Profile/Page ID', 'ultimate-author-box' ); ?></label>
								<input type="text" class="uab-token-field regular-text" id="uab-facebook-userid" name="uab_profile_data[uab_id][uab_facebook_userid]">
								<span class="uab-info"><?php _e( 'You can get your Profile/Page ID from ', 'ultimate-author-box' ) ?><tt><a href = "http://findmyfbid.com/" target="_blank">http://findmyfbid.com/</a></tt></span>
							</div>
							<div class="uab-field uab-profile-field">
								<label for="uab-facebook-feed-number"><?php _e( 'Number of Facebook Feeds', 'ultimate-author-box' ); ?></label>
								<input type="number" min="0" class="uab-text-field" id="uab-facebook-feed-number" name="uab_profile_data[uab_id][uab_facebook_feed_number]" value="5">
							</div>
						</div>
					</div>
				</div><!-- End of Feeds-->
			</div>
			
			<div class="uab-shortcode-outer-wrapper uap-option-wrapper">
				<div class="uab-shortcode-wrapper uap-option-wrapper">
					<input type="hidden" class="uab_tab_name" name="uab_profile_data[uab_id][uab_tab_name]">
					<input type="hidden" class="uab_tab_type" name="uab_profile_data[uab_id][uab_tab_type]">
					<div class="uab-field uab-profile-field">
						<label for="uab-tab-shortcode"><?php _e( 'Shortcode', 'ultimate-author-box' ); ?></label>
						<input type="text" class="uab-text-field" id="uab-tab-shortcode" name="uab_shortcode[uab_id]" >
					</div>
				</div><!-- End of Shortcode Tab-->
			</div>

			<div class="uab-widget-outer-wrapper uap-option-wrapper">
				<div class="uab-widget-wrapper uap-option-wrapper">
					<input type="hidden" class="uab_tab_name" name="uab_profile_data[uab_id][uab_tab_name]">
					<input type="hidden" class="uab_tab_type" name="uab_profile_data[uab_id][uab_tab_type]">
					<input type="hidden" id="uab_tab_key" name="uab_id">

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
								if(isset($uab_bar_setting['uab_open_panel']['uab_widgets'])){
									if(is_array($uab_bar_setting['uab_open_panel']['uab_widgets']) && !empty($uab_bar_setting['uab_open_panel']['uab_widgets'])){ 

										$array_widgets = $uab_bar_setting['uab_open_panel']['uab_widgets'];
										for($i=0;$i<count($array_widgets['widget_id']);$i++) {
											$widget_id = $array_widgets['widget_id'][$i];
											$widget_title = $array_widgets['widget_title'][$i];
											?>

											<div class="uab_widget_area ui-sortable" data-title="<?php echo esc_attr( $widget_title  );?>" 
												data-id="<?php echo esc_attr( $widget_id );?>">
												<input type="hidden" name="uab_profile_data[uab_id][widget_id]" value="<?php echo esc_attr( $widget_id );?>"/>
												<input type="hidden" name="uab_profile_data[uab_id][widget_title]" value="<?php echo esc_attr( $widget_title  );?>"/>
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
								}
								?>
							</div>
						</div>
					</div>
				</div><!-- End of Widget Wrapper-->
			</div>
			
			<div class="uab-editor-outer-wrapper uap-option-wrapper">
				<div class="uab-editor-wrapper uap-option-wrapper">
					<input type="hidden" class="uab_tab_name" name="uab_profile_data[uab_id][uab_tab_name]">
					<input type="hidden" class="uab_tab_type" name="uab_profile_data[uab_id][uab_tab_type]">
					<?php
					$content = '';
					$editor_id = "uab-wysiwyg-content";
					$settings = array(
						'textarea_name'	=> 'uab_wysiwyg_content[uab_id]',
						'wpautop'		=> false,
						'media_buttons'	=> true,
						'editor_height'	=> 200,
						// 'quicktags'		=> array('buttons'=>'a,b,i,strong,em,ul,ol,li'),
					);
					wp_editor( $content , $editor_id , $settings );
					?>
				</div><!-- End of WYSIWYG Wrapper-->
			</div>
			<div class="uab-linkedin-profile-outer-wrapper uap-option-wrapper">
				<div class="uab-linkedin-profile-wrapper uap-option-wrapper">
					<input type="hidden" class="uab_tab_name" name="uab_profile_data[uab_id][uab_tab_name]">
					<input type="hidden" class="uab_tab_type" name="uab_profile_data[uab_id][uab_tab_type]">
					<div class="uab-linkedin-profile-content-wrapper">
						<div class="uab-field uab-profile-field">
							<label for="uab-linkedin-client-id"><?php _e( 'Linkedin Client ID', 'ultimate-author-box' ); ?></label>
							<input type="text" class="uab-text-field" name="uab_profile_data[uab_id][uab_linkedin_client_id]" id="uab-linkedin-client-id">
						</div>
						<div class="uab-field uab-profile-field">
							<label for="uab-linkedin-secret-id"><?php _e( 'Linkedin Secret ID', 'ultimate-author-box' ); ?></label>
							<input type="text" class="uab-text-field" name="uab_profile_data[uab_id][uab_linkedin_secret_id]" id="uab-linkedin-secret-id">
						</div>
					</div>
				</div>
			</div>


		</div><!-- End of Tab Contents-->
	</div><!-- End of New Wrapper-->
</div><!-- End of Hidden Wrapper-->
