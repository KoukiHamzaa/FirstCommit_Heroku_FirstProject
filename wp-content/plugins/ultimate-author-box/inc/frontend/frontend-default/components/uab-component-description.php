<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="uab-short-info">
	<?php 
	if(($author_description == '' && $uab_general_settings['uab_default_bio'])){
		esc_html_e($uab_general_settings['uab_default_message']);
	}
	else{
		if (isset($uab_profile_data[0]['uab_custom_description_status'])) {
		 	echo do_shortcode($author_description);	
		}
		else{
			echo $author_description; 
		}
	}
	?>
</div>