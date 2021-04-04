<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
//For template 2
//For template 5
//For template 6
//For template 8
//For template 10
//For template 17

?>
<div class="uab-content-header <?php if($uab_template_type == 'uab-template-2' || $uab_template_type == 'uab-template-5') esc_attr_e('uab-clearfix');?>">
	<?php
	if($uab_template_type == 'uab-template-2'){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-name.php');
	}
	if($uab_template_type == 'uab-template-5'){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-title.php');
	}
	if(
		$uab_template_type == 'uab-template-6'
	){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-title.php');
	}
	if(
		$uab_template_type == 'uab-template-8'||
		$uab_template_type == 'uab-template-17'
	){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-image.php');
	}
	if(
		$uab_template_type == 'uab-template-10'
	){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-title.php');
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-description.php');
	}
	?>
</div>
<?php if($uab_template_type == 'uab-template-8'){
	?>
	<div class="uab-content-temp-wrapper">
		<?php
	}
	?>
	<?php if($uab_template_type == 'uab-template-5'){
		?>
		<div class="uab-content-temp-wrapper uab-clearfix">
			<?php
		}
		?>
		<div class="uab-content-mid <?php if($uab_template_type == 'uab-template-2' || $uab_template_type == 'uab-template-6' || $uab_template_type == 'uab-template-8') esc_attr_e('uab-clearfix');?>">
			<div class="uab-content-mid-inner-1">
				<?php
				if(
					$uab_template_type == 'uab-template-2'||
					$uab_template_type == 'uab-template-5'

				){
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-image.php');
				}
				if(
					$uab_template_type == 'uab-template-6'||
					$uab_template_type == 'uab-template-10'
				){
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-image.php');
					if($uab_template_type == 'uab-template-10'):?><div class="uap-content-temp-wrapper"><?php endif;
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-name.php');
					if($uab_template_type == 'uab-template-10'):?></div><?php endif;
				}
				if(
					$uab_template_type == 'uab-template-8'
				){
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-name.php');
				}
				if(
					$uab_template_type == 'uab-template-17'
				){
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-name.php');
				}
				?>
			</div>
			<div class="uab-content-mid-inner-2">
				<?php

				if(				
					$uab_template_type == 'uab-template-17'
				){
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-contact.php');
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-description.php');
				}
				if($uab_template_type == 'uab-template-10'||$uab_template_type == 'uab-template-2' || $uab_template_type == 'uab-template-5'){
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-contact.php');
				}
				if(
					$uab_template_type == 'uab-template-6'
				){
					?><div class="uab-content-temp-wrapper">
					<?php
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-description.php');
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-social.php');
					include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-contact.php');
					?>
				</div>
				<?php
			}
			if(
				$uab_template_type == 'uab-template-2'||
				$uab_template_type == 'uab-template-8'||
				$uab_template_type == 'uab-template-10'
			){
				include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-social.php');

			}
			?>

		</div>
	</div>

	<?php if($uab_template_type != 'uab-template-17'){?>
	<div class="uab-content-lower">
		<?php
		if($uab_template_type == 'uab-template-5'){
			include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-name.php');
		}
		if(
			$uab_template_type == 'uab-template-2'||
			$uab_template_type == 'uab-template-5'||
			$uab_template_type == 'uab-template-8'
		){
			include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-description.php');
		}
		if ($uab_template_type == 'uab-template-5') {
			include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-social.php');
		}
		?>
	</div>
	<?php }?>

	<?php if($uab_template_type == 'uab-template-5'){
		?>
	</div>
	<?php
}
if($uab_template_type == 'uab-template-8'){
	?>
</div>
<?php
}

include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-custom-shortcode.php');
?>


