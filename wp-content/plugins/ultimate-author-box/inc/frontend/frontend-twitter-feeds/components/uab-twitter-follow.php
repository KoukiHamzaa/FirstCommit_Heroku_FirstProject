<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="uab-social-follow">
	<a href="<?php esc_attr_e("https://twitter.com/".$username);?>" target="_blank" class="uab-follow-link">
		<div class="uab-follow-btn">
			<span id="l" class="label"><?php esc_html_e('Follow ','ultimate-author-box'); esc_html_e($username);?>
			</span>
		</div>
	</a>	
</div>
<!-- <a href="<?php esc_attr_e("https://twitter.com/".$username);?>" class="twitter-follow-button" data-show-count="false">Follow @<?php esc_html_e($username)?></a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script> -->
