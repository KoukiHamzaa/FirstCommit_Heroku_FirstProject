<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="uab-social-date">
	<?php 
		if($uab_template_type == 'uab-template-1'||$uab_template_type == 'uab-template-2'||$uab_template_type == 'uab-template-3'||$uab_template_type == 'uab-template-4'){
			echo human_time_diff( strtotime($tweet->created_at), current_time( 'timestamp' ) ).' '.__( 'ago','ultimate-author-box'); 	
		}
		else{
			echo date('M j, Y', strtotime($tweet->created_at));	
		}
	?>	
</div>
