<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="uab-social-action-wrapper">
	<div class="uab-social-action">
	<a href="https://twitter.com/intent/tweet?in_reply_to=<?php esc_attr_e($tweet->id_str); ?>" class="uab-tweet-reply uab-tweet-action-reply" target="_blank">
		<i class="fa fa-reply"></i>
		<?php if(0):?>
			<span class="uab-social-label">
				<?php esc_html_e('Reply','ultimate-author-box');?>
			</span>
		<?php endif;?>
	</a>	
	</div>
	<div class="uab-social-action">
		<a href="https://twitter.com/intent/retweet?tweet_id=<?php esc_attr_e($tweet->id_str); ?>" class="uab-tweet-retweet uab-tweet-action-retweet" target="_blank">
			<i class="fa fa-retweet"></i>
			<?php if(0):?>
				<span class="uab-social-label">
					<?php esc_html_e('Retweet','ultimate-author-box');?>
				</span>
			<?php endif;?>
		</a>
	</div>
	<div class="uab-social-action">
		<a href="https://twitter.com/intent/favorite?tweet_id=<?php esc_attr_e($tweet->id_str); ?>" class="uab-tweet-fav uab-tweet-action-favourite" target="_blank">
			<i class="fa fa-heart "></i>
			<?php if(0):?>
				<span class="uab-social-label">
					<?php esc_html_e('Favorite','ultimate-author-box');?>
				</span>
			<?php endif;?>
		</a>	
	</div>
</div>
