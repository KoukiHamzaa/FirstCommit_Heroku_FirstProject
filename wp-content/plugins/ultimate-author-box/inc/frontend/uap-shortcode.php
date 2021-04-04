<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); 
$uab_general_settings = get_option('uap_general_settings');
$uab_twitter_status = get_option('uab_twitter_status');
$uab_shortcode_atts = shortcode_atts( array(
	'user_id' => get_the_author_meta('ID'),
	'template' => isset($uab_general_settings['uab_template'])?$uab_general_settings['uab_template']:'uab-template-1',
	'anchor_box' => isset($atts['anchor_box'])?$atts['anchor_box']:boolval(0),
	'anchor_timeout' => isset($atts['anchor_timeout'])?$atts['anchor_timeout']:intval(1000)
	), $atts );

$anchor_box = (isset($uab_shortcode_atts['anchor_box']) && (($uab_shortcode_atts['anchor_box'] == 1) || ($uab_shortcode_atts['anchor_box'] == true) || ($uab_shortcode_atts['anchor_box'] == 'yes')))?boolval(1):boolval(0);
$anchor_timeout = (isset($anchor_box) && isset($uab_shortcode_atts['anchor_timeout']))?intval($uab_shortcode_atts['anchor_timeout']):intval(1000);

$uab_shortcode_atts['template'] = isset($uab_general_settings['uab_template'])?$uab_general_settings['uab_template']:'uab-template-1';
$uab_custom_template = $uab_general_settings['uab_custom_template'];
$uab_coauthor_header_text = esc_attr($uab_general_settings['uab_coauthor_header_text']);
$uab_template_type = isset($atts['template'])?$atts['template']:$uab_general_settings['uab_template'];
$author_id = $uab_shortcode_atts['user_id']; 
$author_description = get_the_author_meta('description',$author_id);

$uab_profile_data = maybe_unserialize(get_the_author_meta( 'uab_profile_data', $author_id));

if (isset($uab_profile_data[0]['uab_custom_description_status'])) {
	$allowed_html = wp_kses_allowed_html('post');
	$uab_custom_description = get_the_author_meta('uab_custom_description',$author_id);
	$author_description = !empty($uab_custom_description)?wp_kses($uab_custom_description ,$allowed_html):'';
}

$uab_random_identifier = (isset($uab_profile_data[0]['uab_random_identifier']) && !empty($uab_profile_data[0]['uab_random_identifier']))?esc_attr('uab_rid_' . $uab_profile_data[0]['uab_random_identifier']):'';

$uab_social_icons = maybe_unserialize(get_the_author_meta( 'uab_social_icons', $author_id));
$uab_wysiwyg_content = maybe_unserialize(get_the_author_meta( 'uab_wysiwyg_content', $author_id ));	
$uab_company_content = maybe_unserialize(get_the_author_meta( 'uab_company_content', $author_id ));
$uab_wysiwyg_content = maybe_unserialize(get_the_author_meta( 'uab_wysiwyg_content', $author_id ));	
$uab_shortcode = maybe_unserialize(get_the_author_meta( 'uab_shortcode', $author_id ));	
$uab_contact_shortcode = maybe_unserialize(get_the_author_meta( 'uab_contact_shortcode', $author_id ));
$uab_access_roles = $uab_general_settings['uab_user_roles'];

$uab_co_author_string = get_post_meta(get_the_ID(),'uab_meta_co_author');
if (isset($uab_co_author_string) && !empty($uab_co_author_string)) {
	$uab_co_author = maybe_unserialize($uab_co_author_string[0]);
}

$uab_current_user_roles = new WP_User($author_id);

if ( !empty( $uab_current_user_roles->roles ) && is_array( $uab_current_user_roles->roles ) ) {
	foreach ( $uab_current_user_roles->roles as $role )
		$uab_current_user_role = $role;
}

if (isset($uab_social_icons) && !empty($uab_social_icons)){
	$error_flag="1";
	foreach($uab_social_icons as $key => $val) {
		if (!empty($val['url']))
			$error_flag="0";
	}
}else{
	$error_flag="1";
}


if(isset($uab_profile_data[1]['uab_personal_theme'])=='on'){
	$uab_temp_template = '';
	if(isset($uab_profile_data[1]['uab_select_template']) && $uab_profile_data[1]['uab_select_template'] == 'uab-custom-template'){
		$uab_temp_template = $uab_profile_data[1]['uab_select_template'];
		$uab_template_type = $uab_profile_data[1]['uab_custom_template'];
		include(UAB_PATH . 'inc/frontend/uab-custom-css.php');
	}else{
		$uab_temp_template = $uab_profile_data[1]['uab_select_template'];
		$uab_template_type = $uab_profile_data[1]['uab_select_template'];
	}
}else{
	$uab_temp_template = '';
	if($uab_template_type == 'uab-custom-template'){
		$uab_temp_template = $uab_template_type;
		$uab_template_type = $uab_custom_template;
		include(UAB_PATH . 'inc/frontend/uab-custom-css.php');
	}
}

?>
<div id="<?php echo $uab_random_identifier; ?>" class="uab-frontend-inner-layer uab-frontend-wrapper-author-<?=intval($author_id) ?> <?=(isset($anchor_box) && !empty($anchor_box))?esc_attr('uab_anchor_box'):'' ?>" <?=isset($anchor_box)?('data-timeout="' . intval($anchor_timeout) . '"'):intval(1000) ?>>
<?php

if ($uab_general_settings['uab_disable_uab']){
	//echo 'Disable author box';
}else{
	if ($uab_general_settings['uab_empty_bio'] && $author_description == ''){
		//echo 'The Author Box Will not show if the author bio is empty';
	}
	else{
		if(in_array($uab_current_user_role, $uab_access_roles) || !empty($uab_profile_data)){
			?>
			<div id="uab-frontend-wrapper"  class="uab-frontend-wrapper 
			<?php 
			if($uab_temp_template == 'uab-custom-template'){
				esc_attr_e($uab_template_type.' uab-custom-template');
			}else{
				esc_attr_e($uab_template_type);  	
			}
			if($uab_template_type == 'uab-template-12') echo ' uab-clearfix';
			if($error_flag && $uab_template_type == 'uab-template-4') echo ' uab-hidden-icon';
			?>">
			<?php
			if($uab_template_type == 'uab-template-12'){
				?>
				<div class="uab-author-info">
					<?php
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-name.php');
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-image.php');
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-social.php');
					?>
				</div>
				<div class="uab-content-temp-wrapper">
					<?php
				}
				?>
				<div id="uab-tab-index-wrapper" class="uab-tab-index-wrapper" <?php if(count($uab_profile_data)<='1') echo 'style="display:none;"'?>>
					<?php if($uab_template_type == 'uab-template-10' || $uab_template_type == 'uab-template-14'){
						?>
						<div class="uab-select-tab-header"><?php !empty($uab_profile_data[0]['uab-frontend-title'])? esc_html_e($uab_profile_data[0]['uab-frontend-title']):esc_html_e('Author Details','ultimate-author-box');?></div>
						<?php
					}?>
					<ul class="uab-tabs uab-clearfix" <?php if($uab_template_type == 'uab-template-10' || $uab_template_type == 'uab-template-14') echo 'style="display:none;"'?>>
						<li class="tab-link uab_author_detail uab-current" data-tab="tab-1" data-name="<?php !empty($uab_profile_data[0]['uab-frontend-title'])? esc_html_e($uab_profile_data[0]['uab-frontend-title']):esc_html_e('Author Details','ultimate-author-box');?>">
							<?php !empty($uab_profile_data[0]['uab-frontend-title'])? esc_html_e($uab_profile_data[0]['uab-frontend-title']):esc_html_e('Author Details','ultimate-author-box');
							?>
						</li>
						<?php
						if (!empty($uab_profile_data)) {
							foreach( $uab_profile_data as $index=>$val ){
								$keyArray[$index] = $index;
								if( $keyArray[$index] != '0' && $keyArray[$index] != 'uab_id' && $keyArray[$index] != '1'){
									?>
									<?php if (($uab_profile_data[$index]['uab_tab_type'] != 'uab_external_link') && ( $uab_profile_data[$index]['uab_tab_type'] != 'uab_twitter_feeds') || (( $uab_profile_data[$index]['uab_tab_type'] == 'uab_twitter_feeds') && isset($uab_twitter_status) && !empty($uab_twitter_status)) ): ?>
										<li class="tab-link <?php esc_attr_e($uab_profile_data[$index]['uab_tab_type']);?>" data-tab="tab-<?php esc_attr_e($index);?>" data-name="<?php
											echo (isset( $uab_profile_data[$index]['uab_tab_name'] )) ? esc_attr($uab_profile_data[$index]['uab_tab_name']) : 'Tab'.$index ;?>">
											<?php 
											echo (isset( $uab_profile_data[$index]['uab_tab_name'] )) ? esc_html($uab_profile_data[$index]['uab_tab_name']) : 'Tab'.$index ;?>
										</li>
									<?php elseif ($uab_profile_data[$index]['uab_tab_type'] == 'uab_external_link') : ?>
										<a href="<?php echo !empty($uab_profile_data[$index]['uab_external_link_url'])?esc_url($uab_profile_data[$index]['uab_external_link_url']):'#' ?>" class="uab_external_link_tab" target="<?php esc_attr_e($uab_profile_data[$index]['uab_external_link_target']) ?>">
												<?php 
												echo (isset( $uab_profile_data[$index]['uab_tab_name'] )) ? esc_html($uab_profile_data[$index]['uab_tab_name']) : 'Tab'.$index ;?>
										</a>
									<?php endif ?>
									<?php
								}
							}
						}
						?>
					</ul>
				</div>

				<?php if($uab_template_type == 'uab-template-19'):?><div class="uab-content-temp-wrapper"><?php endif;?>
				<div id="tab-1" class="uab-tab-content uab-current">
					<?php
					if($uab_template_type == 'uab-template-3'){
						?>
						<div class="uab-temp-wrapper "><?php
						}
						?>
						<div class="uab-defaut-tab-wrapper ">
							<div class="uab-defaut-tab 
							<?php 
							if($uab_template_type != 'uab-template-3') esc_attr_e('uab-clearfix');
							?>"
							>
								<?php //include(UAB_PATH . '/inc/frontend/uap-frontend-default-author-tab.php'); 
								include(UAB_PATH . '/inc/frontend/frontend-default/uab-default.php');
								?>
							</div>
						</div>
						<?php
						if($uab_template_type == 'uab-template-3'){
							include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-social.php');
						}
						?>
						<?php
						if ( isset($uab_co_author) && !empty($uab_co_author) && (!isset($uab_general_settings['uab_disable_coauthor']) || ($uab_general_settings['uab_disable_coauthor'] == '0'))){
							include(UAB_PATH . 'inc/frontend/frontend-default/components/co-author/uab-co-author-display.php');
						}
						?>
					</div>	
					<?php

					if($uab_template_type == 'uab-template-3'){
						?></div><?php
					}

					if (!empty($uab_profile_data)) {
						foreach ($uab_profile_data as $key => $val) {
							$keyArray[$key] = $key;
							if( $keyArray[$key] != '0' && $keyArray[$key] != 'uab_id' && $keyArray[$key] != '1'){
								?>  
								<div id="tab-<?php esc_attr_e($key);?>" class="uab-tab-content">
									<?php 
									if(isset($uab_profile_data[$key]['uab_tab_type'])){
										switch($uab_profile_data[$key]['uab_tab_type']) {
											case 'uab_author_post':
											include(UAB_PATH . '/inc/frontend/frontend-posts/uab-frontend-posts.php');
											break;
											case 'uab_company_description':
											?>
											<div class="uab-company-wrapper">
												<?php
												if (!empty($uab_profile_data[$key]['uab_upload_company_url'])){
													?>
													<div class="uab-first-wrapper">
														<div class="uab-company-image">
															<img src="<?php esc_attr_e($uab_profile_data[$key]['uab_upload_company_url']);?>";>
														</div>
													</div>
													<?php
												}
												?>
												<div class="uab-frontend-editor">
													<?php _e(do_shortcode($uab_company_content[$key])); ?>
												</div>
											</div>
											<?php
											break;
											case 'uab_contact_form':
											include(UAB_PATH . '/inc/frontend/frontend-contact-form/uab-frontend-contact-form.php');
											break;
											case 'uab_twitter_feeds':
											include(UAB_PATH . '/inc/frontend/frontend-twitter-feeds/uab-frontend-tweets.php');
											break;
											case 'uab_rss_feeds':
											include(UAB_PATH . '/inc/frontend/uab-frontend-rssfeeds.php');
											break;
											case 'uab_facebook_feeds':
											include(UAB_PATH . '/inc/frontend/frontend-facebook-feeds/uab-frontend-facebook.php');
											break;
											case 'uab_shortcode':
											echo do_shortcode( $uab_shortcode[$key]);
											break;
											case 'uab_widget':
											$widget_data = Ultimate_Author_Box::show_widget($uab_profile_data[$key]['widget_id']);
											?>
											<div class="uab_widgets_content">
												<?php _e($widget_data);?>
											</div>
											<?php
											break;
											case 'uab_linkedin_profile':
											include(UAB_PATH . '/inc/frontend/frontend-linkedin/uab-display-linkedin-profile.php');
											break;
											case 'uab_editor':
											?>
											<div class="uab-frontend-editor">
												<?php _e(do_shortcode($uab_wysiwyg_content[$key])); ?>
											</div>
											<?php
											break;
											default:
											esc_html_e('No Tab Selected','ultimate-author-box');
										}
									}	
									?>

								</div>
								<?php
							}
						}
					}

					if($uab_template_type == 'uab-template-12'){
						?></div><?php
					}
					?>
					<?php if($uab_template_type == 'uab-template-19'):?></div><?php endif;?>
				</div>
				<?php 
					if(isset($uab_general_settings['uab_show_popup']) && !empty($uab_general_settings['uab_show_popup']) && $uab_general_settings['uab_show_popup'] == '1'){
						include(UAB_PATH . '/inc/frontend/uap-frontend-popup.php');
					} 
				?>
				<?php
			}	
		} 
	}	
	?>

	<?php

	if ($uab_general_settings['uab_custom_css']){
		echo '<style>';
		_e($uab_general_settings['uab_custom_css']);
		echo '</style>';

	}
	?>
	</div><?php
