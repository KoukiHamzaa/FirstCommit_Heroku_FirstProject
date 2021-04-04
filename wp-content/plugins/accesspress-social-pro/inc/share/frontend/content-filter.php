<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
?>
<div class='apss-share-wrapper-div'>
     <?php
     if ( isset( $options[ 'share_text' ] ) && $options[ 'share_text' ] != '' ) {
          ?>
          <div class='apss-share-text'><?php echo $options[ 'share_text' ]; ?></div>
          <?php
     }

     $total_count = 0;

     foreach ( $options[ 'social_networks' ] as $key => $value ) {
          include('apss-share.php');
     }

     do_action( 'apss_more_networks' );

     if ( isset( $enable_counter ) && $enable_counter == '1' ) {
          ?>
          <div class='apss-total-share-count'>
               <?php
               //echo $total_count;

               $formatted_count = APSS_Class:: get_formatted_count( $total_count, $counter_type_options );
               ?>
               <span class="apss-prepend-text"><?php echo $total_count_prepend_text ?></span>
               <span class='apss-count-number'><?php echo $formatted_count; ?></span>
               <span class='apss-append-text'><?php echo $total_count_append_text ?></span>
          </div>
     <?php } ?>
</div>