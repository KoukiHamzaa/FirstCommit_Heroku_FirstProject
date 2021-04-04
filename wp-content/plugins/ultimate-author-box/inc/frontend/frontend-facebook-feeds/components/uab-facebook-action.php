<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="uab-social-action-wrapper">
	<div class="uab-social-action uab-facebook-action">
		<span class="uab-facebook-count"><?php echo count($uab_facebook_feeds[$x]['likes']);?><i class="fas fa-thumbs-up"></i></span>
		<!-- <span class="uab-facebook-label"><?php //esc_html_e('Likes','ultimate-author-box'); ?></span> -->
	</div>
	<div class="uab-social-action uab-facebook-action">
		<span class="uab-facebook-count"><?php echo count($uab_facebook_feeds[$x]['comments']);?><i class="fa fa-comment"></i></span>
		<!-- <span class="uab-social-label"><?php //esc_html_e('Comments','ultimate-author-box'); ?></span> -->
	</div>
</div>