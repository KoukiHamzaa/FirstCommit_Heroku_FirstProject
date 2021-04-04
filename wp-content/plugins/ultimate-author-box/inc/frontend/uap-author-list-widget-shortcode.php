<div class="UAB_Author_List_Widget">
	<?php
	$uab_shortcode_atts = shortcode_atts( array(
		'showauthorpost' => 1,
		'showpostcount' => 1,
		'showsocial' => 1,
		'display_type' => 'full-grid',
		'image_click' => 'uab_archive',
		'author_number' => 10,
		'orderby' => 'display_name',
		'order' => 'ASC',
		'excludeauthorlist' => '',
		), $atts );
	$displayType = isset($atts['display_type'])?$atts['display_type']:$uab_shortcode_atts['display_type'];
	$image_click = isset($atts['image_click'])?$atts['image_click']:$uab_shortcode_atts['image_click'];
	$authorNumber = isset($atts['author_number'])?$atts['author_number']:$uab_shortcode_atts['author_number'];
	$orderBy = isset($atts['orderby'])?$atts['orderby']:$uab_shortcode_atts['orderby'];
	$order = isset($atts['order'])?$atts['order']:$uab_shortcode_atts['order'];
	$excludeAuthorList = isset($atts['excludeauthorlist'])?$atts['excludeauthorlist']:$uab_shortcode_atts['excludeauthorlist'];
	$showAuthorPost = isset($atts['showauthorpost'])?$atts['showauthorpost']:$uab_shortcode_atts['showauthorpost'];
	$showPostCount = isset($atts['showpostcount'])?$atts['showpostcount']:$uab_shortcode_atts['showpostcount'];
	$showSocial = isset($atts['showsocial'])?$atts['showsocial']:$uab_shortcode_atts['showsocial'];
	
	/*$this->print_array($atts);*/
	
	/*Author and post view count @since 1.0.6
	*List all authors
	*/
	if($orderBy != 'most_view' ){
		$filterArgs = array(
			'orderby' => $orderBy,
			'order'   => $order,
			'number'  => $authorNumber,
			'exclude' => $excludeAuthorList,
			'who'    => 'authors'
		);
		$authorList = get_users($filterArgs);
		switch($displayType){
			case 'slider':
			?>
			<div class="uab-author-slider">
				<?php
				foreach ( $authorList as $user ) {
					?>
					<div class="uab-author-slider-item">

						<div class="uab-profile-image">
							<?php
							$uab_profile_data = maybe_unserialize(get_the_author_meta( 'uab_profile_data', $user->ID));
							$author_id = $user->ID;
							$uab_select_image_option = isset($uab_profile_data[0]['uab_image_select'])?$uab_profile_data[0]['uab_image_select']:'uab_gravatar';
							switch( $uab_select_image_option){
								case 'uab_facebook':
								if(!empty($uab_profile_data[0]['uab_profile_image_facebook'])){
									?>
									<img src="//graph.facebook.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_facebook']) ;?>/picture?width=200">
									<?php
								}
								else{
									_e(get_avatar($author_id,200));
								}
								break;
								case 'uab_instagram':
								if(!empty($uab_profile_data[0]['uab_profile_image_instagram'])){
									?>
									<img src="https://instagram.com/p/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_instagram']) ;?>/media/" width=200>
									<?php
								}
								else{
									_e(get_avatar($author_id,200));
								}
								break;
								case 'uab_twitter':
								if(!empty($uab_profile_data[0]['uab_profile_image_twitter'])){
									?>
									<img src="https://twitter.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_twitter']) ;?>/profile_image?size=original" width=200/>
									<?php
								}
								else{
									_e(get_avatar($author_id,200));
								}
								break;
								case 'uab_upload_image':
								if(!empty($uab_profile_data[0]['uab_upload_image_url'])){
									?>
									<img src="<?php esc_attr_e($uab_profile_data[0]['uab_upload_image_url']);?>" width="200">
									<?php
								}
								else{
									_e(get_avatar($author_id,200));
								}
								break;
								default:
								_e(get_avatar($author_id,200));
							}
							?>
						</div>
						<div class="uab-profile-content">
							<a class="uab-widget-popup" href="<?php if($image_click == 'uab_archive') echo get_author_posts_url($user->ID); else echo 'javascript:void(0)'; ?>"><span class="uab-info" data-userid="<?php esc_attr_e($author_id);?>"><?php the_author_meta( 'display_name', $author_id);?></span></a>
							<?php
							if($showAuthorPost){
								$recent = get_posts(array(
									'author'=> $author_id,
									'orderby'=>'date',
									'order'=>'desc',
									'numberposts' => 1
								));
								if( $recent){
									foreach($recent as $post){
										?>
										<div class="uab-post-title-wrapper">
											<a href="<?php esc_attr_e(get_permalink($post->ID));?>"><?php $title = get_the_title($post->ID); esc_html_e($title); ?></a>
										</div>
										<?php
									}
								}
							}
							if($showPostCount){
								?>
								<div class="uab-info"><?php _e('Total Posts: ','ultimate-author-box'); _e(number_format_i18n( count_user_posts($author_id))); ?></div>
								<?php }?>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<?php
				break;
				case 'sidebar-grid':
				?>
				<div class="uab-author-side-grid uab-author-grid">
					<?php
					foreach ( $authorList as $user ) {
						?>
						<div class="uab-author-grid-outer">
							<div class="uab-author-grid-item">
								<div class="uab-author-grid-inner">
									<div class="uab-profile-image">
										<?php
										$uab_profile_data = maybe_unserialize(get_the_author_meta( 'uab_profile_data', $user->ID));
										$author_id = $user->ID;
										$uab_select_image_option = isset($uab_profile_data[0]['uab_image_select'])?$uab_profile_data[0]['uab_image_select']:'uab_gravatar';
										switch( $uab_select_image_option){
											case 'uab_facebook':
											if(!empty($uab_profile_data[0]['uab_profile_image_facebook'])){
												?>
												<img src="//graph.facebook.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_facebook']) ;?>/picture?width=200">
												<?php
											}
											else{
												_e(get_avatar($author_id,200));
											}
											break;
											case 'uab_instagram':
											if(!empty($uab_profile_data[0]['uab_profile_image_instagram'])){
												?>
												<img src="https://instagram.com/p/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_instagram']) ;?>/media/" width=200>
												<?php
											}
											else{
												_e(get_avatar($author_id,200));
											}
											break;
											case 'uab_twitter':
											if(!empty($uab_profile_data[0]['uab_profile_image_twitter'])){
												?>
												<img src="https://twitter.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_twitter']) ;?>/profile_image?size=original" width=200/>
												<?php
											}
											else{
												_e(get_avatar($author_id,200));
											}
											break;
											case 'uab_upload_image':
											if(!empty($uab_profile_data[0]['uab_upload_image_url'])){
												?>
												<img src="<?php esc_attr_e($uab_profile_data[0]['uab_upload_image_url']);?>" width="200">
												<?php
											}
											else{
												_e(get_avatar($author_id,200));
											}
											break;
											default:
											_e(get_avatar($author_id,200));
										}
										?>
									</div>
									<div class="uab-profile-content">
										<a class="uab-widget-popup" href="<?php if($image_click == 'uab_archive') echo get_author_posts_url($user->ID); else echo 'javascript:void(0)'; ?>"><span class="uab-info" data-userid="<?php esc_attr_e($author_id);?>"><?php the_author_meta( 'display_name', $author_id);?></span></a>
										<?php
										if($showAuthorPost){
											$recent = get_posts(array(
												'author'=> $author_id,
												'orderby'=>'date',
												'order'=>'desc',
												'numberposts' => 1
											));
											if( $recent){
												foreach($recent as $post){
													?>
													<div class="uab-post-title-wrapper">
														<a href="<?php esc_attr_e(get_permalink($post->ID));?>"><?php $title = get_the_title($post->ID); esc_html_e($title); ?></a>
													</div>
													<?php
												}
											}
										}
										if($showPostCount){
											?>
											<div class="uab-info"><?php _e('Total Posts: ','ultimate-author-box'); _e(number_format_i18n( count_user_posts($author_id))); ?></div>
											<?php
										}
										if($showSocial){
											?>
											<div class="uab-template-1">
												<div class="uab-social-icons">
													<?php
													$uab_template_type = 'uab-template-1';
													$uab_general_settings = get_option('uap_general_settings');
													?>
													<ul class="uap-social-outlets-fields">
														<?php
														$uab_social_icons = maybe_unserialize(get_the_author_meta( 'uab_social_icons', $author_id));
														if(!empty($uab_social_icons)){
															foreach($uab_social_icons as $socialname => $innerarray){
																if(!empty($uab_social_icons[$socialname]['url'])){
																	?>
																	<li class="uab-icon-<?php esc_attr_e($uab_social_icons[$socialname]['label']);?>">
																		<a href="<?php esc_attr_e($uab_social_icons[$socialname]['url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>" rel="nofollow noopener">
																			<i class="fa fa-<?php esc_attr_e($uab_social_icons[$socialname]['icon']);?>"></i>
																		</a>
																	</li>
																	<?php
																}
															}
														}
														?>
													</ul>
												</div>
											</div>
											<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<?php
				break;
				case 'full-grid':
				?>
				<div class="uab-author-full-grid uab-author-grid">
					<?php
					foreach ( $authorList as $user ) {
						?>
						<div class="uab-author-grid-outer">
							<div class="uab-author-grid-item">
								<div class="uab-author-grid-inner">
									<div class="uab-profile-image">
										<?php
										$uab_profile_data = maybe_unserialize(get_the_author_meta( 'uab_profile_data', $user->ID));
										$author_id = $user->ID;
										$uab_select_image_option = isset($uab_profile_data[0]['uab_image_select'])?$uab_profile_data[0]['uab_image_select']:'uab_gravatar';
										switch( $uab_select_image_option){
											case 'uab_facebook':
											if(!empty($uab_profile_data[0]['uab_profile_image_facebook'])){
												?>
												<img src="//graph.facebook.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_facebook']) ;?>/picture?width=200">
												<?php
											}
											else{
												_e(get_avatar($author_id,200));
											}
											break;
											case 'uab_instagram':
											if(!empty($uab_profile_data[0]['uab_profile_image_instagram'])){
												?>
												<img src="https://instagram.com/p/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_instagram']) ;?>/media/" width=200>
												<?php
											}
											else{
												_e(get_avatar($author_id,200));
											}
											break;
											case 'uab_twitter':
											if(!empty($uab_profile_data[0]['uab_profile_image_twitter'])){
												?>
												<img src="https://twitter.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_twitter']) ;?>/profile_image?size=original" width=200/>
												<?php
											}
											else{
												_e(get_avatar($author_id,200));
											}
											break;
											case 'uab_upload_image':
											if(!empty($uab_profile_data[0]['uab_upload_image_url'])){
												?>
												<img src="<?php esc_attr_e($uab_profile_data[0]['uab_upload_image_url']);?>" width="200">
												<?php
											}
											else{
												_e(get_avatar($author_id,200));
											}
											break;
											default:
											_e(get_avatar($author_id,200));
										}
										?>
									</div>
									<div class="uab-profile-content">
										<a class="uab-widget-popup" href="<?php if($image_click == 'uab_archive') echo get_author_posts_url($user->ID);	else echo 'javascript:void(0)';	?>"><span class="uab-info" data-userid="<?php esc_attr_e($author_id);?>"><?php the_author_meta( 'display_name', $author_id);?></span></a>
										<?php
										if($showAuthorPost){
											$recent = get_posts(array(
												'author'=> $author_id,
												'orderby'=>'date',
												'order'=>'desc',
												'numberposts' => 1
											));
											if( $recent){
												foreach($recent as $post){
													?>
													<div class="uab-post-title-wrapper">
														<a href="<?php esc_attr_e(get_permalink($post->ID));?>"><?php $title = get_the_title($post->ID); esc_html_e($title); ?></a>
													</div>
													<?php
												}
											}
										}
										if($showPostCount){
											?>
											<div class="uab-info"><?php _e('Total Posts: ','ultimate-author-box'); _e(number_format_i18n( count_user_posts($author_id))); ?></div>
											<?php 
										}
										if($showSocial){
											?>
											<div class="uab-template-1">
												<div class="uab-social-icons">
													<?php
													$uab_template_type = 'uab-template-1';
													$uab_general_settings = get_option('uap_general_settings');
													?>
													<ul class="uap-social-outlets-fields">
														<?php
														$uab_social_icons = maybe_unserialize(get_the_author_meta( 'uab_social_icons', $author_id));
														if(!empty($uab_social_icons)){
															foreach($uab_social_icons as $socialname => $innerarray){
																if(!empty($uab_social_icons[$socialname]['url'])){
																	?>
																	<li class="uab-icon-<?php esc_attr_e($uab_social_icons[$socialname]['label']);?>">
																		<a href="<?php esc_attr_e($uab_social_icons[$socialname]['url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>">
																			<i class="fa fa-<?php esc_attr_e($uab_social_icons[$socialname]['icon']);?>"></i>
																		</a>
																	</li>
																	<?php
																}
															}
														}
														?>
													</ul>
												</div>
											</div>
											<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<?php
				break;
				default:
				?>
				<div class="uab-author-list-wrapper">
					<?php
					foreach ( $authorList as $user ) {
						?>
						<div class="uab-author-list-outer">
							<div class="uab-author-list-image-wrapper">
								<?php
								$uab_profile_data = maybe_unserialize(get_the_author_meta( 'uab_profile_data', $user->ID));
								$author_id = $user->ID;
								$uab_select_image_option = isset($uab_profile_data[0]['uab_image_select'])?$uab_profile_data[0]['uab_image_select']:'uab_gravatar';
								switch( $uab_select_image_option){
									case 'uab_facebook':
									if(!empty($uab_profile_data[0]['uab_profile_image_facebook'])){
										?>
										<img src="//graph.facebook.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_facebook']) ;?>/picture?width=200">
										<?php
									}
									else{
										_e(get_avatar($author_id,200));
									}
									break;
									case 'uab_instagram':
									if(!empty($uab_profile_data[0]['uab_profile_image_instagram'])){
										?>
										<img src="https://instagram.com/p/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_instagram']) ;?>/media/" width=200>
										<?php
									}
									else{
										_e(get_avatar($author_id,200));
									}
									break;
									case 'uab_twitter':
									if(!empty($uab_profile_data[0]['uab_profile_image_twitter'])){
										?>
										<img src="https://twitter.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_twitter']) ;?>/profile_image?size=original" width=200/>
										<?php
									}
									else{
										_e(get_avatar($author_id,200));
									}
									break;
									case 'uab_upload_image':
									if(!empty($uab_profile_data[0]['uab_upload_image_url'])){
										?>
										<img src="<?php esc_attr_e($uab_profile_data[0]['uab_upload_image_url']);?>" width="200">
										<?php
									}
									else{
										_e(get_avatar($author_id,200));
									}
									break;
									default:
									_e(get_avatar($author_id,200));
								}
								?>
							</div>
							<div class="uab-author-list-content-wrapper">
								<div class="uab-author-list-content-header-wrapper">
									<a class="uab-widget-popup" href="<?php if($image_click == 'uab_archive') echo get_author_posts_url($author_id);	else echo 'javascript:void(0)';	?>"><span class="uab-info" data-userid="<?php esc_attr_e($author_id);?>"><?php esc_html_e(the_author_meta( 'display_name', $author_id));?></span></a>
									<?php
									if($showAuthorPost){
										$recent = get_posts(array(
											'author'=> $author_id,
											'orderby'=>'date',
											'order'=>'desc',
											'numberposts' => 1
										));
										if( $recent){
											foreach($recent as $post){
												?>
												<div class="uab-post-title-wrapper">
													<a href="<?php esc_attr_e(get_permalink($post->ID));?>"><?php $title = get_the_title($post->ID); esc_html_e($title); ?></a>
												</div>
												<?php
											}
										}
									}
									if($showPostCount){
										?>
										<div class="uab-info"><?php _e('Total Posts: ','ultimate-author-box'); _e(number_format_i18n( count_user_posts($author_id))); ?></div>
										<?php 
									}
									if($showSocial){
										?>
										<div class="uab-template-1">
											<div class="uab-social-icons">
												<?php
												$uab_template_type = 'uab-template-1';
												$uab_general_settings = get_option('uap_general_settings');
												?>
												<ul class="uap-social-outlets-fields">
													<?php
													$uab_social_icons = maybe_unserialize(get_the_author_meta( 'uab_social_icons', $author_id));
													if(!empty($uab_social_icons)){
														foreach($uab_social_icons as $socialname => $innerarray){
															if(!empty($uab_social_icons[$socialname]['url'])){
																?>
																<li class="uab-icon-<?php esc_attr_e($uab_social_icons[$socialname]['label']);?>">
																	<a href="<?php esc_attr_e($uab_social_icons[$socialname]['url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>">
																		<i class="fa fa-<?php esc_attr_e($uab_social_icons[$socialname]['icon']);?>"></i>
																	</a>
																</li>
																<?php
															}
														}
													}
													?>
												</ul>
											</div>
										</div>
										<?php
									}
									?>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<?php
			}
		}
		else{
			$filterArgs = array(
				'orderby' => '$orderBy',
				'order'   => $order,
				'number'  => -1,
				'exclude' => $excludeAuthorList,
				'who'    => 'authors',
			);
			$authorList = get_users($filterArgs);
			$author_viewcount = array();
			/*Loop though each author*/
			foreach ( $authorList as $user ) {
				$author_id = $user->ID;
				$recent = get_posts(array(
					'author'=> $author_id,
					'orderby'=>'date',
					'order'=>'desc',
					'numberposts' => -1,
				));
				/*Loop though each post by that author*/
				$total_count = 0;
				foreach ( $recent as $post ) {
					$postID = $post->ID;
					$count_key = 'post_views_count';
					$count = get_post_meta($postID, $count_key,true);
					if($count==''){
						delete_post_meta($postID, $count_key);
						add_post_meta($postID, $count_key, '0');
					}
					$total_count += $count;
				}
				$author_viewcount[$author_id] = $total_count;
			}
			arsort($author_viewcount);
			$show_author_count = 0;
			switch($displayType){
				case 'slider':
				?>
				<div class="uab-author-slider">
					<?php
					foreach ( $author_viewcount as $author_id => $view_count ) {
						if($show_author_count < $authorNumber){
							if($view_count != 0 ){
								?>
								<div class="uab-author-slider-item">
									<div class="uab-profile-image">
										<?php
										$uab_profile_data = maybe_unserialize(get_the_author_meta( 'uab_profile_data', $author_id));
										$uab_select_image_option = isset($uab_profile_data[0]['uab_image_select'])?$uab_profile_data[0]['uab_image_select']:'uab_gravatar';
										switch( $uab_select_image_option){
											case 'uab_facebook':
											if(!empty($uab_profile_data[0]['uab_profile_image_facebook'])){
												?>
												<!--Facebook Image-->
												<img src="//graph.facebook.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_facebook']) ;?>/picture?width=200">
												<?php
											}
											else{
												_e(get_avatar($author_id,200));
											}
											break;
											case 'uab_instagram':
											if(!empty($uab_profile_data[0]['uab_profile_image_instagram'])){
												?>
												<img src="https://instagram.com/p/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_instagram']) ;?>/media/" width=200>
												<?php
											}
											else{
												_e(get_avatar($author_id,200));
											}
											break;
											case 'uab_twitter':
											if(!empty($uab_profile_data[0]['uab_profile_image_twitter'])){
												?>
												<img src="https://twitter.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_twitter']) ;?>/profile_image?size=original" width=200/>
												<?php
											}
											else{
												_e(get_avatar($author_id,200));
											}
											break;
											case 'uab_upload_image':
											if(!empty($uab_profile_data[0]['uab_upload_image_url'])){
												?>
												<img src="<?php esc_attr_e($uab_profile_data[0]['uab_upload_image_url']);?>" width="200">
												<?php
											}
											else{
												_e(get_avatar($author_id,200));
											}
											break;
											default:
											_e(get_avatar($author_id,200));
										}
										?>
									</div>
									<div class="uab-profile-content">
										<a class="uab-widget-popup" href="<?php if($image_click == 'uab_archive') echo get_author_posts_url($author_id); else echo 'javascript:void(0)'; ?>"><span class="uab-info" data-userid="<?php esc_attr_e($author_id);?>"><?php the_author_meta( 'display_name', $author_id);?></span></a>
										<?php
										if($showAuthorPost){
											$recent = get_posts(array(
												'author'=> $author_id,
												'orderby'=>'date',
												'order'=>'desc',
												'numberposts' => 1
											));
											if( $recent){
												foreach($recent as $post){
													?>
													<div class="uab-post-title-wrapper">
														<a href="<?php esc_attr_e(get_permalink($post->ID));?>"><?php $title = get_the_title($post->ID); esc_html_e($title); ?></a>
													</div>
													<?php
												}
											}
											if($showPostCount){}
											?>
											<div class="uab-info"><?php _e('Total Views: ','ultimate-author-box'); _e(number_format_i18n($view_count)); ?></div>
											<?php } ?>
										</div>
									</div>
									<?php
									$show_author_count ++;
								}
							}
						}
						?>
					</div>
					<?php
					break;
					case 'sidebar-grid':
					?>
					<div class="uab-author-side-grid uab-author-grid">
						<?php
						foreach ( $author_viewcount as $author_id => $view_count ) {
							if($show_author_count < $authorNumber){
								if($view_count != 0 ){
									?>
									<div class="uab-author-grid-outer">
										<div class="uab-author-grid-item">
											<div class="uab-author-grid-inner">
												<div class="uab-profile-image">
													<?php
													$uab_profile_data = maybe_unserialize(get_the_author_meta( 'uab_profile_data', $author_id));
													$uab_select_image_option = isset($uab_profile_data[0]['uab_image_select'])?$uab_profile_data[0]['uab_image_select']:'uab_gravatar';
													switch( $uab_select_image_option){
														case 'uab_facebook':
														if(!empty($uab_profile_data[0]['uab_profile_image_facebook'])){
															?>
															<img src="//graph.facebook.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_facebook']) ;?>/picture?width=200">
															<?php
														}
														else{
															_e(get_avatar($author_id,200));
														}
														break;
														case 'uab_instagram':
														if(!empty($uab_profile_data[0]['uab_profile_image_instagram'])){
															?>
															<img src="https://instagram.com/p/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_instagram']) ;?>/media/" width=200>
															<?php
														}
														else{
															_e(get_avatar($author_id,200));
														}
														break;
														case 'uab_twitter':
														if(!empty($uab_profile_data[0]['uab_profile_image_twitter'])){
															?>
															<img src="https://twitter.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_twitter']) ;?>/profile_image?size=original" width=200/>
															<?php
														}
														else{
															_e(get_avatar($author_id,200));
														}
														break;
														case 'uab_upload_image':
														if(!empty($uab_profile_data[0]['uab_upload_image_url'])){
															?>
															<img src="<?php esc_attr_e($uab_profile_data[0]['uab_upload_image_url']);?>" width="200">
															<?php
														}
														else{
															_e(get_avatar($author_id,200));
														}
														break;
														default:
														_e(get_avatar($author_id,200));
													}
													?>
												</div>
												<div class="uab-profile-content">
													<a class="uab-widget-popup" href="<?php if($image_click == 'uab_archive') echo get_author_posts_url($user->ID); else echo 'javascript:void(0)'; ?>"><span class="uab-info" data-userid="<?php esc_attr_e($author_id);?>"><?php esc_html_e(the_author_meta( 'display_name', $author_id));?></span></a>
													<?php
													if($showAuthorPost){
														$recent = get_posts(array(
															'author'=> $author_id,
															'orderby'=>'date',
															'order'=>'desc',
															'numberposts' => 1
														));
														if( $recent){
															foreach($recent as $post){
																?>
																<div class="uab-post-title-wrapper">
																	<a href="<?php esc_attr_e(get_permalink($post->ID));?>"><?php $title = get_the_title($post->ID); esc_html_e($title); ?></a>
																</div>
																<?php
															}
														}
													}
													if($showPostCount){
														?>
														<div class="uab-info"><?php _e('Total Views: ','ultimate-author-box'); _e(number_format_i18n($view_count)); ?></div>
														<?php 
													} 
													if($showSocial){
														?>
														<div class="uab-template-1">
															<div class="uab-social-icons">
																<?php
																$uab_template_type = 'uab-template-1';
																$uab_general_settings = get_option('uap_general_settings');
																?>
																<ul class="uap-social-outlets-fields">
																	<?php
																	$uab_social_icons = maybe_unserialize(get_the_author_meta( 'uab_social_icons', $author_id));
																	if(!empty($uab_social_icons)){
																		foreach($uab_social_icons as $socialname => $innerarray){
																			if(!empty($uab_social_icons[$socialname]['url'])){
																				?>
																				<li class="uab-icon-<?php esc_attr_e($uab_social_icons[$socialname]['label']);?>">
																					<a href="<?php esc_attr_e($uab_social_icons[$socialname]['url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>">
																						<i class="fa fa-<?php esc_attr_e($uab_social_icons[$socialname]['icon']);?>"></i>
																					</a>
																				</li>
																				<?php
																			}
																		}
																	}
																	?>
																</ul>
															</div>
														</div>
														<?php
													}
													?>
												</div>
											</div>
										</div>
									</div>
									<?php
									$show_author_count ++;
								}
							}
						}
						?>
					</div>
					<?php
					break;
					case 'full-grid':
					?>
					<div class="uab-author-full-grid uab-author-grid">
						<?php
						foreach ( $author_viewcount as $author_id => $view_count ) {
							if($show_author_count < $authorNumber){
								if($view_count != 0 ){
									?>
									<div class="uab-author-grid-outer">
										<div class="uab-author-grid-item">
											<div class="uab-author-grid-inner">
												<div class="uab-profile-image">
													<?php
													$uab_profile_data = maybe_unserialize(get_the_author_meta( 'uab_profile_data', $author_id));
													$uab_select_image_option = isset($uab_profile_data[0]['uab_image_select'])?$uab_profile_data[0]['uab_image_select']:'uab_gravatar';
													switch( $uab_select_image_option){
														case 'uab_facebook':
														if(!empty($uab_profile_data[0]['uab_profile_image_facebook'])){
															?>
															<img src="//graph.facebook.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_facebook']) ;?>/picture?width=200">
															<?php
														}
														else{
															_e(get_avatar($author_id,200));
														}
														break;
														case 'uab_instagram':
														if(!empty($uab_profile_data[0]['uab_profile_image_instagram'])){
															?>
															<img src="https://instagram.com/p/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_instagram']) ;?>/media/" width=200>
															<?php
														}
														else{
															_e(get_avatar($author_id,200));
														}
														break;
														case 'uab_twitter':
														if(!empty($uab_profile_data[0]['uab_profile_image_twitter'])){
															?>
															<img src="https://twitter.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_twitter']) ;?>/profile_image?size=original" width=200/>
															<?php
														}
														else{
															_e(get_avatar($author_id,200));
														}
														break;
														case 'uab_upload_image':
														if(!empty($uab_profile_data[0]['uab_upload_image_url'])){
															?>
															<img src="<?php esc_attr_e($uab_profile_data[0]['uab_upload_image_url']);?>" width="200">
															<?php
														}
														else{
															_e(get_avatar($author_id,200));
														}
														break;
														default:
														_e(get_avatar($author_id,200));
													}
													?>
												</div>
												<div class="uab-profile-content">
													<a class="uab-widget-popup" href="<?php if($image_click == 'uab_archive') echo get_author_posts_url($author_id); else echo 'javascript:void(0)'; ?>"><span class="uab-info" data-userid="<?php esc_attr_e($author_id);?>"><?php esc_html_e(the_author_meta( 'display_name', $author_id));?></span></a>
													<?php
													if($showAuthorPost){
														$recent = get_posts(array(
															'author'=> $author_id,
															'orderby'=>'date',
															'order'=>'desc',
															'numberposts' => 1
														));
														if( $recent){
															foreach($recent as $post){
																?>
																<div class="uab-post-title-wrapper">
																	<a href="<?php esc_attr_e(get_permalink($post->ID));?>"><?php $title = get_the_title($post->ID); esc_html_e($title); ?></a>
																</div>
																<?php
															}
														}
													}
													if($showPostCount){
														?>
														<div class="uab-info"><?php _e('Total Views: ','ultimate-author-box'); _e(number_format_i18n($view_count)); ?></div>
														<?php } 
														if($showSocial){
															?>
															<div class="uab-template-1">
																<div class="uab-social-icons">
																	<?php
																	$uab_template_type = 'uab-template-1';
																	$uab_general_settings = get_option('uap_general_settings');
																	?>
																	<ul class="uap-social-outlets-fields">
																		<?php
																		$uab_social_icons = maybe_unserialize(get_the_author_meta( 'uab_social_icons', $author_id));
																		if(!empty($uab_social_icons)){
																			foreach($uab_social_icons as $socialname => $innerarray){
																				if(!empty($uab_social_icons[$socialname]['url'])){
																					?>
																					<li class="uab-icon-<?php esc_attr_e($uab_social_icons[$socialname]['label']);?>">
																						<a href="<?php esc_attr_e($uab_social_icons[$socialname]['url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>">
																							<i class="fa fa-<?php esc_attr_e($uab_social_icons[$socialname]['icon']);?>"></i>
																						</a>
																					</li>
																					<?php
																				}
																			}
																		}
																		?>
																	</ul>
																</div>
															</div>
															<?php
														}
														?>
													</div>
												</div>
											</div>
										</div>
										<?php
										$show_author_count ++;
									}
								}
							}
							?>
						</div>
						<?php
						break;
						default:
						?>
						<div class="uab-author-list-wrapper">
							<?php
							foreach ( $author_viewcount as $author_id => $view_count ) {
								if($show_author_count < $authorNumber){
									if($view_count != 0 ){
										?>
										<div class="uab-author-list-outer">
											<div class="uab-author-list-image-wrapper">
												<?php
												$uab_profile_data = maybe_unserialize(get_the_author_meta( 'uab_profile_data', $author_id));
												$uab_select_image_option = isset($uab_profile_data[0]['uab_image_select'])?$uab_profile_data[0]['uab_image_select']:'uab_gravatar';
												switch( $uab_select_image_option){
													case 'uab_facebook':
													if(!empty($uab_profile_data[0]['uab_profile_image_facebook'])){
														?>
														<img src="//graph.facebook.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_facebook']) ;?>/picture?width=200">
														<?php
													}
													else{
														_e(get_avatar($author_id,200));
													}
													break;
													case 'uab_instagram':
													if(!empty($uab_profile_data[0]['uab_profile_image_instagram'])){
														?>
														<img src="https://instagram.com/p/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_instagram']) ;?>/media/" width=200>
														<?php
													}
													else{
														_e(get_avatar($author_id,200));
													}
													break;
													case 'uab_twitter':
													if(!empty($uab_profile_data[0]['uab_profile_image_twitter'])){
														?>
														<img src="https://twitter.com/<?php esc_attr_e($uab_profile_data[0]['uab_profile_image_twitter']) ;?>/profile_image?size=original" width=200/>
														<?php
													}
													else{
														_e(get_avatar($author_id,200));
													}
													break;
													case 'uab_upload_image':
													if(!empty($uab_profile_data[0]['uab_upload_image_url'])){
														?>
														<img src="<?php esc_attr_e($uab_profile_data[0]['uab_upload_image_url']);?>" width="200">
														<?php
													}
													else{
														_e(get_avatar($author_id,200));
													}
													break;
													default:
													_e(get_avatar($author_id,200));
												}
												?>
											</div>
											<div class="uab-author-list-content-wrapper">
												<div class="uab-author-list-content-header-wrapper">
													<a class="uab-widget-popup" href="<?php if($image_click == 'uab_archive') echo get_author_posts_url($author_id);	else echo 'javascript:void(0)';	?>"><span class="uab-info" data-userid="<?php esc_attr_e($author_id);?>"><?php esc_html_e(the_author_meta( 'display_name', $author_id));?></span></a>
													<?php
													if($showAuthorPost){
														$recent = get_posts(array(
															'author'=> $author_id,
															'orderby'=>'date',
															'order'=>'desc',
															'numberposts' => 1
														));
														if( $recent){
															foreach($recent as $post){
																?>
																<div class="uab-post-title-wrapper">
																	<a href="<?php esc_attr_e(get_permalink($post->ID));?>"><?php $title = get_the_title($post->ID); esc_html_e($title); ?></a>
																</div>
																<?php
															}
														}else{
															esc_html_e('The User does not have any posts','ultimate-author-box');
														}
													}
													if($showPostCount){
														?>
														<div class="uab-info"><?php _e('Total Views: ','ultimate-author-box'); _e(number_format_i18n($view_count)); ?></div>
														<?php 
													} 
													if($showSocial){
														?>
														<div class="uab-template-1">
															<div class="uab-social-icons">
																<?php
																$uab_template_type = 'uab-template-1';
																$uab_general_settings = get_option('uap_general_settings');
																?>
																<ul class="uap-social-outlets-fields">
																	<?php
																	$uab_social_icons = maybe_unserialize(get_the_author_meta( 'uab_social_icons', $author_id));
																	if(!empty($uab_social_icons)){
																		foreach($uab_social_icons as $socialname => $innerarray){
																			if(!empty($uab_social_icons[$socialname]['url'])){
																				?>
																				<li class="uab-icon-<?php esc_attr_e($uab_social_icons[$socialname]['label']);?>">
																					<a href="<?php esc_attr_e($uab_social_icons[$socialname]['url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>">
																						<i class="fa fa-<?php esc_attr_e($uab_social_icons[$socialname]['icon']);?>"></i>
																					</a>
																				</li>
																				<?php
																			}
																		}
																	}
																	?>
																</ul>
															</div>
														</div>
														<?php 
													}
												?>
												</div>
											</div>
										</div>
										<?php
										$show_author_count ++;
									}
								}
							}	
						?>
						</div>
						<?php
					}
				}
				?>
			</div>