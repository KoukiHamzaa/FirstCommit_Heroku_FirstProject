<?php defined('ABSPATH') or die('No script for you') ?>
<?php //$this->print_array($guest_details_social) ?>
<div class="uab-guest-author-details-form-wrapper">
	<div class="uab-guest-details-group">
		<div class="uab-guest-form-field">
			<div class="uab-profile-content-wrapper">
				<ul class="uap-social-outlets-fields">
					<?php 
					$guest_details_social = array(
							'facebook' => array(
								'icon' => 'facebook',
								'label' => 'Facebook',
								'url' => isset( $guest_details_social['facebook']['url'] ) ? esc_url( $guest_details_social['facebook']['url'] ) : ''
							),
							'twitter' => array(
								'icon' => 'twitter',
								'label' => 'Twitter',
								'url' => isset( $guest_details_social['twitter']['url'] ) ? esc_url( $guest_details_social['twitter']['url'] ) : ''
							),
							'instagram' => array(
								'icon' => 'instagram',
								'label' => 'Instagram',
								'url' => isset( $guest_details_social['instagram']['url'] ) ? esc_url( $guest_details_social['instagram']['url'] ) : ''
							),
							'youtube' => array(
								'icon' => 'youtube',
								'label' => 'Youtube',
								'url' => isset( $guest_details_social['youtube']['url'] ) ? esc_url( $guest_details_social['youtube']['url'] ) : ''
							),
							'linkedin' => array(
								'icon' => 'linkedin',
								'label' => 'Linkedin',
								'url' => isset( $guest_details_social['linkedin']['url'] ) ? esc_url( $guest_details_social['linkedin']['url'] ) : ''
							),
							'pinterest' => array(
								'icon' => 'pinterest',
								'label' => 'Pinterest',
								'url' => isset( $guest_details_social['pinterest']['url'] ) ? esc_url( $guest_details_social['pinterest']['url'] ) : ''
							),
							'google-plus' => array(
								'icon' => 'google-plus',
								'label' => 'Google+',
								'url' => isset( $guest_details_social['google-plus']['url'] ) ? esc_url( $guest_details_social['google-plus']['url'] ) : ''
							),
							'tumblr' => array(
								'icon' => 'tumblr',
								'label' => 'Tumblr.',
								'url' => isset( $guest_details_social['tumblr']['url'] ) ? esc_url( $guest_details_social['tumblr']['url'] ) : ''
							),
							'reddit' => array(
								'icon' => 'reddit',
								'label' => 'Reddit',
								'url' => isset( $guest_details_social['reddit']['url'] ) ? esc_url( $guest_details_social['reddit']['url'] ) : ''
							),
							'flickr' => array(
								'icon' => 'flickr',
								'label' => 'Flickr',
								'url' => isset( $guest_details_social['flickr']['url'] ) ? esc_url( $guest_details_social['flickr']['url'] ) : ''
							),
							'vine' => array(
								'icon' => 'vine',
								'label' => 'Vine',
								'url' => isset( $guest_details_social['vine']['url'] ) ? esc_url( $guest_details_social['vine']['url'] ) : ''
							),
							'meetup' => array(
								'icon' => 'meetup',
								'label' => 'Meetup',
								'url' => isset( $guest_details_social['meetup']['url'] ) ? esc_url( $guest_details_social['meetup']['url'] ) : ''
							),
							'github' => array(
								'icon' => 'github',
								'label' => 'Github',
								'url' => isset( $guest_details_social['github']['url'] ) ? esc_url( $guest_details_social['github']['url'] ) : ''
							),
							'soundcloud' => array(
								'icon' => 'soundcloud',
								'label' => 'Soundcloud',
								'url' => isset( $guest_details_social['soundcloud']['url'] ) ? esc_url( $guest_details_social['soundcloud']['url'] ) : ''
							),
							'steam' => array(
								'icon' => 'steam',
								'label' => 'Steam',
								'url' => isset( $guest_details_social['steam']['url'] ) ? esc_url( $guest_details_social['steam']['url'] ) : ''
							),
							'vimeo' => array(
								'icon' => 'vimeo',
								'label' => 'Vimeo',
								'url' => isset( $guest_details_social['vimeo']['url'] ) ? esc_url( $guest_details_social['vimeo']['url'] ) : ''
							),
							'wordpress' => array(
								'icon' => 'wordpress',
								'label' => 'WordPress',
								'url' => isset( $guest_details_social['wordpress']['url'] ) ? esc_url( $guest_details_social['wordpress']['url'] ) : ''
							),
							'telegram' => array(
								'icon' => 'telegram',
								'label' => 'Telegram',
								'url' => isset( $guest_details_social['telegram']['url'] ) ? esc_url( $guest_details_social['telegram']['url'] ) : ''
							),
							'spotify' => array(
								'icon' => 'spotify',
								'label' => 'Spotify',
								'url' => isset( $guest_details_social['spotify']['url'] ) ? esc_url( $guest_details_social['spotify']['url'] ) : ''
							),
							'snapchat' => array(
								'icon' => 'snapchat',
								'label' => 'Snapchat',
								'url' => isset( $guest_details_social['snapchat']['url'] ) ? esc_url( $guest_details_social['snapchat']['url'] ) : ''
							),
							'skype' => array(
								'icon' => 'skype',
								'label' => 'Skype',
								'url' => isset( $guest_details_social['skype']['url'] ) ? esc_url( $guest_details_social['skype']['url'] ) : ''
							),
							'whatsapp' => array(
								'icon' => 'whatsapp',
								'label' => 'Whatsapp',
								'url' => isset( $guest_details_social['whatsapp']['url'] ) ? esc_url( $guest_details_social['whatsapp']['url'] ) : ''
							),
							'dribbble' => array(
								'icon' => 'dribbble',
								'label' => 'Dribbble',
								'url' => isset( $guest_details_social['dribbble']['url'] ) ? esc_url( $guest_details_social['dribbble']['url'] ) : ''
							),
							'rss' => array(
								'icon' => 'rss',
								'label' => 'RSS',
								'url' => isset( $guest_details_social['rss']['url'] ) ? esc_url( $guest_details_social['rss']['url'] ) : ''
							),
							'quora' => array(
								'icon' => 'quora',
								'label' => 'Quora',
								'url' => isset( $guest_details_social['quora']['url'] ) ? esc_url( $guest_details_social['quora']['url'] ) : ''
							),
							'blogger' => array(
								'icon' => 'blogger',
								'label' => 'Blogger',
								'url' => isset( $guest_details_social['blogger']['url'] ) ? esc_url( $guest_details_social['blogger']['url'] ) : ''
							)
						);
					if(!empty($guest_details_social)){
						foreach($guest_details_social as $socialname => $innerarray){ 
							$uab_font_type = 'fab';
							if( $guest_details_social[$socialname]['icon'] == 'rss'){
								$uab_font_type = 'fas';
							}
							?>
							<li>
								<div class="uab-field uab-profile-field">
									<label><i class="<?php esc_attr_e($uab_font_type); ?> fa-<?php echo $guest_details_social[$socialname]['icon'];?>"></i><?php esc_html_e($guest_details_social[$socialname]['label']);?></label>
									<input type="url" name="uab_guest_detail[social][<?php esc_attr_e($socialname);?>][url]" value="<?=esc_attr($guest_details_social[$socialname]['url']) ?>" placeholder="<?php esc_attr_e('Enter link or social media icon', 'ultimate-author-box' );?>">
								</div>
							</li>
							<?php
						}
					}
					?>	
				</ul>
			</div>
		</div>
	</div>
</div>