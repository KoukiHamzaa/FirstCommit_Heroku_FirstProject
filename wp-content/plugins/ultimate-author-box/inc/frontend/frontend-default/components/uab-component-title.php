<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php 
	if(
		$uab_template_type == 'uab-template-4'||
		$uab_template_type == 'uab-template-5'||
		$uab_template_type == 'uab-template-6'||
		$uab_template_type == 'uab-template-10'||
		$uab_template_type == 'uab-template-12'||
		$uab_template_type == 'uab-template-14'||
		$uab_template_type == 'uab-template-16'
	){
		?>
		<span class="uab-tab-header">
			<?php !empty($uab_profile_data[0]['uab-frontend-title'])? esc_html_e($uab_profile_data[0]['uab-frontend-title']):esc_html_e('Author Details','ultimate-author-box');?>
		</span>
		<?php
	}
?>