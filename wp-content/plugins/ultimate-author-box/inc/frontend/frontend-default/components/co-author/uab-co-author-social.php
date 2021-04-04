<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php if(!($error_flag && $uab_template_type != 'uab-template-8')){?>
<div class="uab-social-icons">
	<ul id="uap-social-outlets-fields">
		<?php
		if(!empty($uab_co_author_social_icons)){
			foreach($uab_co_author_social_icons as $socialname => $innerarray){ 
				if(!empty($uab_co_author_social_icons[$socialname]['url'])){
					$uab_font_type = 'fab';
						if( $uab_co_author_social_icons[$socialname]['icon'] == 'rss'){
							$uab_font_type = 'fas';
						}
					?>
					<li class="uab-icon-<?php esc_attr_e($uab_co_author_social_icons[$socialname]['label']);?>">
						<a href="<?php esc_attr_e($uab_co_author_social_icons[$socialname]['url']);?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>" rel="nofollow noopener">
							<i class="<?php esc_attr_e($uab_font_type); ?> fa-<?php esc_attr_e($uab_co_author_social_icons[$socialname]['icon']);?>"></i>
						</a>
						<?php if($uab_template_type == 'uab-template-8'):?>
							<div class="uab-frontend-tooltip"><?php esc_attr_e($uab_co_author_social_icons[$socialname]['url']);?></div>
						<?php endif;?>
					</li>
					<?php
				}
			}
		}
		?>
		<?php if($uab_template_type == 'uab-template-8'){
			?>
			<?php 
			if(!empty($author_url)){?>
				<li class="uab-icon-web">
					<a href="<?php esc_attr_e($author_url); ?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>">
						<i class="fa fa-globe"></i>
					</a>
					<div class="uab-frontend-tooltip"><?php esc_html_e($author_url); ?></div>
				</li>
			<?php }?>
			<?php if(!$uab_email_disable):?>
			<li class="uab-icon-mail">
				<a href="javascript:void(0)">
					<i class="fa fa-envelope"></i>
				</a>
				<div class="uab-frontend-tooltip"><?php esc_html_e($uab_co_author_email); ?></div>
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