<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>
<!-- //get_post_time( 'F j, Y g:i a', $post->ID) -->
<div class="uap-post-date"><?php _e(date_i18n( get_option( 'date_format' ), strtotime( $post->post_date )));?></div>
