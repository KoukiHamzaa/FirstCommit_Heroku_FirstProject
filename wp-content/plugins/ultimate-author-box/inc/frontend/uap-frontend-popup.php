<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="uab-frontend-popup-wrapper">
	<div class="uab-frontend-popup-content">
		<span class="uab-popup-close">&times;</span>
		<div class="uab-pop-up-wrapper-first uab-clearfix">
			<div class="uab-popup-image-wrapper">
				<?php include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-image.php');?>
			</div>
			<div class="uab-popup-description-wrapper ">
				<?php include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-name.php');?>
				<?php include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-description.php');?>
			</div>
		</div>
		<div class="uab-pop-up-wrapper-second uab-clearfix">
			<div class="uab-popup-contact-wrapper">
				<?php include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-contact.php');?>
				<?php include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-social.php');?>
			</div>
			<?php if(isset($uab_profile_data) && !empty($uab_profile_data)){?>
			<div class="uab-popup-recent-wrapper">
				<div class="uab-post-title"><?php esc_html_e('Latest Posts', 'ultimate-author-box' );?></div>
				<ul>
					<?php
					$recent = get_posts(array(
						'author'=> $author_id,
						'orderby'=>'date',
						'order'=>'desc',
						'numberposts' => -1,
					));
					$loop_counter = 0;
					if( $recent ){
						foreach($recent as $post){
							if($loop_counter<4){
								if ( has_post_thumbnail( $post->ID )) {
								?><li><div class="uab-post-image" title="<?php _e($post->post_title);?>"><a href="<?php esc_attr_e(get_permalink($post->ID));?>"><?php _e(get_the_post_thumbnail( $post->ID, 'thumbnail' ));?></a></div></li><?php
									$loop_counter++;
								}
								
							}
						}	
					}else{
						esc_html_e('The User does not have any posts','ultimate-author-box');
					}
					?>
				</ul>
			</div>
			<?php } ?>
		</div>
	</div>
</div>