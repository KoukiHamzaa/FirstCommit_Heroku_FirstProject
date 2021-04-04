<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
?>

<div class='apss-social-share apss-theme-<?php echo $icon_set_value; ?> <?php echo($counter_enable_options == '1') ? 'counter-enable' : '';
?> clearfix <?php echo $text_align; ?>' >

     <?php if ( $share_text != '' ) { ?>
          <div class='apss-share-text'><?php echo $share_text; ?></div>
     <?php } ?>

     <?php
     $total_count = 0;
     foreach ( $options[ 'social_networks' ] as $key => $value ) {
          include('apss-share.php');
     }

     do_action( 'apss_more_networks_in_shortcodes' );

     if ( isset( $total_counter_enable_options ) && $total_counter_enable_options == '1' ) {
          ?>
          <div class='apss-total-share-count'>
               <div class="apss-total-sahre-count-wrap">
     <?php $formatted_count = APSS_Class:: get_formatted_count( $total_count, $counter_type_options ); ?>
                    <span class="apss-prepend-text"><?php echo $total_count_prepend_text ?></span>
                    <span class='apss-count-number'><?php echo $formatted_count; ?></span>
                    <span class='apss-append-text'><?php echo $total_count_append_text ?></span>
               </div>
          </div>
<?php } ?>
</div>

