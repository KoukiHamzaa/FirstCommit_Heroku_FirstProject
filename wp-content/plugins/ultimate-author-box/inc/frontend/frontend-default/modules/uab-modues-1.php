<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
	//For template 1
	//For template 3
	//For template 4
	//For template 7	
	//For template 9
	//For template 11
	//For template 12
	//For template 13
	//For template 14
	//For template 15
	//For template 16
	//For template 18
	//For template 19

	if($uab_template_type == 'uab-template-4'){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-social.php');
	}
	if($uab_template_type == 'uab-template-14' || $uab_template_type == 'uab-template-16'){
		?><div class="uab-content-temp-wrapper"><?php
	}
	if(
		$uab_template_type == 'uab-template-1'||
		$uab_template_type == 'uab-template-3'||
		$uab_template_type == 'uab-template-4'||
		$uab_template_type == 'uab-template-7'||
		$uab_template_type == 'uab-template-9'||
		$uab_template_type == 'uab-template-11'||
		$uab_template_type == 'uab-template-13'||
		$uab_template_type == 'uab-template-14'||
		$uab_template_type == 'uab-template-15'||
		$uab_template_type == 'uab-template-16'||
		$uab_template_type == 'uab-template-18'||
		$uab_template_type == 'uab-template-19'

	){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-image.php');
	}
	if(
		$uab_template_type == 'uab-template-14'
	){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-name.php');
		?></div><?php
	}
	if(
		$uab_template_type == 'uab-template-16'
	){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-contact.php');
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-social.php');
		?></div><?php
	}

?>
<div class="uab-front-content">
<?php
	if(
		$uab_template_type == 'uab-template-4'||
		$uab_template_type == 'uab-template-12'||
		$uab_template_type == 'uab-template-14'||
		$uab_template_type == 'uab-template-16'
	){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-title.php');
	}
	if(!($uab_template_type == 'uab-template-12' || $uab_template_type == 'uab-template-14')){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-name.php');
	}
	if($uab_template_type == 'uab-template-11'){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-contact.php');
	}

	if($uab_template_type == 'uab-template-11' || $uab_template_type == 'uab-template-14' || $uab_template_type == 'uab-template-19'){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-social.php');
	}

	include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-description.php');
	if(	
		$uab_template_type == 'uab-template-1'||
		$uab_template_type == 'uab-template-3'||
		$uab_template_type == 'uab-template-4'||
		$uab_template_type == 'uab-template-7'||
		$uab_template_type == 'uab-template-9'||
		$uab_template_type == 'uab-template-12'||
		$uab_template_type == 'uab-template-13'||
		$uab_template_type == 'uab-template-14'||
		$uab_template_type == 'uab-template-15'||
		$uab_template_type == 'uab-template-19'
	){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-contact.php');
	}
	if(
		$uab_template_type == 'uab-template-1'||
		$uab_template_type == 'uab-template-7'||
		$uab_template_type == 'uab-template-9'||
		$uab_template_type == 'uab-template-13'||
		$uab_template_type == 'uab-template-15'||
		$uab_template_type == 'uab-template-18'
	){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-social.php');
	}
	if(	
		$uab_template_type == 'uab-template-18'
	){
		include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-component-contact.php');
	}
	include(UAB_PATH . 'inc/frontend/frontend-default/components/uab-custom-shortcode.php');
?>
</div>


