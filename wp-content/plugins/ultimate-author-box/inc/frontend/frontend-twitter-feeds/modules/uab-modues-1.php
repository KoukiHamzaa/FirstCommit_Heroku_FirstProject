<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); 
?>
<div class="uab-social-header <?php if(!('uab-template-5'||'uab-template-8'||'uab-template-11'||'uab-template-14'||'uab-template-15'||'uab-template-16'||'uab-template-17'||'uab-template-18'||'uab-template-19')) echo 'uab-clearfix';?>">
<?php
	if($uab_template_type == 'uab-template-5'||$uab_template_type == 'uab-template-8' ||$uab_template_type == 'uab-template-11'||$uab_template_type == 'uab-template-14'||$uab_template_type == 'uab-template-15'||$uab_template_type == 'uab-template-16'||$uab_template_type == 'uab-template-17'||$uab_template_type == 'uab-template-18'||$uab_template_type == 'uab-template-19'){
		include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-image.php');
	}
	if($uab_template_type == 'uab-template-1' || $uab_template_type == 'uab-template-5'|| $uab_template_type == 'uab-template-7'||$uab_template_type == 'uab-template-8'|| $uab_template_type == 'uab-template-9' || $uab_template_type == 'uab-template-10'||$uab_template_type == 'uab-template-11'||$uab_template_type == 'uab-template-13'||$uab_template_type == 'uab-template-14'||$uab_template_type == 'uab-template-15'||$uab_template_type == 'uab-template-16'||$uab_template_type == 'uab-template-17'||$uab_template_type == 'uab-template-18'||$uab_template_type == 'uab-template-19'){
		include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-name.php');
		include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-follow.php');	
	}
	if($uab_template_type == 'uab-template-2'||$uab_template_type == 'uab-template-3'||$uab_template_type == 'uab-template-4'){
		include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-follow.php');	
	}

?>
</div>
<ul class="uab-social-feed">
	<?php
	if(!empty($tweets)){
		foreach ($tweets as $tweet) {
				//$this->print_array($tweet);				                            
			?>
			<li>
				<div class="uab-social-feed-inner-wrapper uab-clearfix">
				<div class="uab-social-wrapper-first ">
					<?php 
						/*if($uab_template_type == 'uab-template-1'||$uab_template_type == 'uab-template-2'||$uab_template_type == 'uab-template-3'||$uab_template_type == 'uab-template-4'|| $uab_template_type == 'uab-template-7'|| $uab_template_type == 'uab-template-9'|| $uab_template_type == 'uab-template-10'||$uab_template_type == 'uab-template-13'){
							include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-image.php');
						}*/
						//include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-name.php');
						//include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-username.php');
						//include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-date.php');
					?>
				</div>
				<div class="uab-social-wrapper-second ">
					<?php 
					if($uab_template_type == 'uab-template-1'|| $uab_template_type == 'uab-template-7'|| $uab_template_type == 'uab-template-9'|| $uab_template_type == 'uab-template-10'||$uab_template_type == 'uab-template-13'){
						include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-description.php');
						?><div class="uab-temp-content-wrapper uab-clearfix"><?php
						include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-date.php');
						include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-action.php');
						?></div><?php
					}
					if($uab_template_type == 'uab-template-2'||$uab_template_type == 'uab-template-3'||$uab_template_type == 'uab-template-4' ||$uab_template_type == 'uab-template-5'||$uab_template_type == 'uab-template-6'||$uab_template_type == 'uab-template-8'||$uab_template_type == 'uab-template-11'||$uab_template_type == 'uab-template-12'||$uab_template_type == 'uab-template-14'||$uab_template_type == 'uab-template-15'||$uab_template_type == 'uab-template-16'||$uab_template_type == 'uab-template-17'||$uab_template_type == 'uab-template-18'||$uab_template_type == 'uab-template-19'){
						if(!($uab_template_type == 'uab-template-6'||$uab_template_type == 'uab-template-8'||$uab_template_type == 'uab-template-14'||$uab_template_type == 'uab-template-15'||$uab_template_type == 'uab-template-16'||$uab_template_type == 'uab-template-17'||$uab_template_type == 'uab-template-18'||$uab_template_type == 'uab-template-19')){
							include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-name.php');	
						}
						include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-username.php');
						include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-date.php');
						include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-description.php');
						include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-action.php');
					}
					?>
				</div>
				<div class="uab-social-wrapper-third">
					<?php 
						//include(UAB_PATH . 'inc/frontend/frontend-twitter-feeds/components/uab-twitter-action.php');
					?>
				</div>
				</div>
			</li>
			<?php
		}
	}
	?>
</ul>

