<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<div class="uab-social-content">
	<?php
	if ($tweet->text) {
		$the_tweet = ' '.$tweet->text . ' '; 
		
		if (is_array($tweet->entities->user_mentions)) {
			foreach ($tweet->entities->user_mentions as $key => $user_mention) {
				$the_tweet = preg_replace('/@' . $user_mention->screen_name . '/i', '<a href="http://www.twitter.com/' . $user_mention->screen_name . '" target="_blank">@' . $user_mention->screen_name . '</a>', $the_tweet);
			}
		}

		
		if (is_array($tweet->entities->hashtags)) {
			foreach ($tweet->entities->hashtags as $hashtag) {
				$the_tweet = str_replace(' #' . $hashtag->text . ' ', ' <a href="https://twitter.com/search?q=%23' . $hashtag->text . '&src=hash" target="_blank">#' . $hashtag->text . '</a> ', $the_tweet);
			}
		}

		
		if (is_array($tweet->entities->urls)) {
			foreach ($tweet->entities->urls as $key => $link) {
				$the_tweet = preg_replace('`' . $link->url . '`', '<a href="' . $link->url . '" target="_blank">' . $link->url . '</a>', $the_tweet);
			}
		}
		_e($the_tweet) . ' ';
	}else {
		?>
		<p><a href="http://twitter.com/'<?php esc_attr_e($username); ?> " class="edn-aptf-tweet-name" target="_blank"><?php _e('Click here to read ' . $username . '\'S Twitter feed', 'edn-plugin-pro'); ?></a></p>
		<?php
	}
	?>
</div>