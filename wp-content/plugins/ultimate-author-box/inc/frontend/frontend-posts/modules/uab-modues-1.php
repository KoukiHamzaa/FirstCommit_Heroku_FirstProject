<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="post-item-wrapper <?php if($uab_template_type == 'uab-template-1' || $uab_template_type == 'uab-template-3' || $uab_template_type == 'uab-template-8'|| $uab_template_type == 'uab-template-10' || $uab_template_type == 'uab-template-13' || $uab_template_type == 'uab-template-15' || $uab_template_type == 'uab-template-17'|| $uab_template_type == 'uab-template-18'|| $uab_template_type == 'uab-template-19') echo 'uab-clearfix';?>">
	<div class="uab-post-first-wrapper">
		<?php 
			if(!($uab_template_type == 'uab-template-6' || $uab_template_type == 'uab-template-11' || $uab_template_type == 'uab-template-12' || $uab_template_type == 'uab-template-14' || $uab_template_type == 'uab-template-16')){
				include(UAB_PATH . '/inc/frontend/frontend-posts/components/uab-post-image.php');
			}
		?>
	</div>
	<div class="uab-post-second-wrapper">
		<?php include(UAB_PATH . '/inc/frontend/frontend-posts/components/uab-post-title.php'); ?>
		<?php 
		if($uab_template_type == 'uab-template-7' || $uab_template_type == 'uab-template-8'){
			include(UAB_PATH . '/inc/frontend/frontend-posts/components/uab-post-excerpt.php');	
		}
		?>
		<div class="uab-post-meta-info">
			<?php
			if($uab_template_type == 'uab-template-1' || $uab_template_type == 'uab-template-3' || $uab_template_type == 'uab-template-6' || $uab_template_type == 'uab-template-7' || $uab_template_type == 'uab-template-9' || $uab_template_type == 'uab-template-10' || $uab_template_type == 'uab-template-13' || $uab_template_type == 'uab-template-14'){
				if (!$uab_post_date_hide) {
					include(UAB_PATH . '/inc/frontend/frontend-posts/components/uab-post-date.php');	
				}
				if(!($uab_template_type == 'uab-template-3' || $uab_template_type == 'uab-template-9' || $uab_template_type == 'uab-template-14' || $uab_template_type == 'uab-template-16')){
					include(UAB_PATH . '/inc/frontend/frontend-posts/components/uab-post-author.php');
				}
			}
			else{
				if(!($uab_template_type == 'uab-template-4'|| $uab_template_type == 'uab-template-8' || $uab_template_type == 'uab-template-15')){
					include(UAB_PATH . '/inc/frontend/frontend-posts/components/uab-post-author.php');
					if (!$uab_post_date_hide) {
						include(UAB_PATH . '/inc/frontend/frontend-posts/components/uab-post-date.php');
					}
				}
			}
			?>
		</div>
		<?php 
		if($uab_template_type == 'uab-template-2' || $uab_template_type == 'uab-template-4' || $uab_template_type == 'uab-template-9'|| $uab_template_type == 'uab-template-10' || $uab_template_type == 'uab-template-11' || $uab_template_type == 'uab-template-13' || $uab_template_type == 'uab-template-14' || $uab_template_type == 'uab-template-15'|| $uab_template_type == 'uab-template-18'|| $uab_template_type == 'uab-template-19'){
			include(UAB_PATH . '/inc/frontend/frontend-posts/components/uab-post-excerpt.php');	
		}
		?>

	</div>
</div>