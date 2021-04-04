<?php
	$uab_frontend_shortcode = get_user_meta($author_id, 'uab_frontend_shortcode', true);
	$uab_frontend_shortcode_title = get_user_meta($author_id, 'uab_frontend_shortcode_title', true);
	$args = array(
		'uab_frontend_shortcode_title' => $uab_frontend_shortcode_title,
		'uab_frontend_shortcode' => $uab_frontend_shortcode,
	);
	do_action('uab_custom_action_result', $args);
	
