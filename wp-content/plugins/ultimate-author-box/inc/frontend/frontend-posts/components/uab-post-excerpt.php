<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php
	$text = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
	?><div class="uab-post-excerpt-wrapper"><?php _e($text);?></div><?php
	/*if(!empty($text)){
		?>
		<div class="uab-post-readmore-wrapper"><a href="<?php esc_attr_e(get_permalink($post->ID));?>"><?php esc_html_e($uab_post_excerpt);?></a></div><?php
	}*/

?>