<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<?php if (!$uab_post_author_hide): ?>
	<div class="uap-post-author-name">
		<?php 
		if(!($uab_template_type == 'uab-template-1'||$uab_template_type == 'uab-template-6' || $uab_template_type == 'uab-template-7' || $uab_template_type == 'uab-template-10' || $uab_template_type == 'uab-template-11' || $uab_template_type == 'uab-template-12' || $uab_template_type == 'uab-template-13' || $uab_template_type == 'uab-template-16'|| $uab_template_type == 'uab-template-18'|| $uab_template_type == 'uab-template-19')){
			_e('By','ultimate-author-box');
		}
		?>
		<?php if ($uab_post_author_url_hide): ?>
			<span><?php esc_html_e(the_author_meta( 'display_name', $author_id)); ?></span>
		<?php else: ?>
			<a href="<?php esc_attr_e(get_author_posts_url($author_id));?>" target="<?php esc_attr_e($uab_general_settings['uab_link_target_option']);?>"><?php esc_html_e(the_author_meta( 'display_name', $author_id)); ?></a>
		<?php endif ?>
	</div>
<?php endif ?>
