<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>

<div class='apss-social-share apss-social-share-flyin apss-theme-<?php echo $icon_set_value ?> clearfix apss-flyin-<?php echo $flyin_location ?>'>
     <span class='apss_flyin apss_flyin_window_title'><?php echo $flyin_window_title; ?></span>
     <span class='apss_flyin apss_flyin_window_message'><?php echo $flyin_window_message; ?></span>
     <span id='apss_close_flyin' class='apss_close_flyin close'>X</span>
     <?php
     foreach ( $options[ 'social_networks' ] as $key => $value ) {
          include('apss-share.php');
     }
     do_action( 'apss_more_networks' );
     ?>
</div>