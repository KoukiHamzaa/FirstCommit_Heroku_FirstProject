<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );

$floating_sidebar = $apsc_settings[ 'floating_sidebar' ];

if ( isset( $floating_sidebar[ 'show' ] ) && $floating_sidebar[ 'active' ] == 1 ) {
     $counter_format = $apsc_settings[ 'sidebar_counter_format' ];
     if ( isset( $apsc_settings[ 'floatbar_profiles' ] ) && $apsc_settings[ 'floatbar_profiles' ] != '' ) {
          $floatbar_profiles = strtolower( $apsc_settings[ 'floatbar_profiles' ] );
          $floatbar_profiles = str_replace( ' ', '', $floatbar_profiles );
          $floatbar_profiles = str_replace( 'google-plus', 'google-plus', $floatbar_profiles );
          $apsc_settings[ 'profile_order' ] = explode( ',', $floatbar_profiles );
     }

     $hide_count = ( isset( $apsc_settings[ 'hide_count' ] ) && $apsc_settings[ 'hide_count' ] == '1' ) ? '1' : '0';

     if ( $hide_count != '1' ) {
          $count_class = "counter-enable";
     } else {
          $count_class = '';
     }
     include(SC_PRO_PATH . '/frontend/demo-file.php');
     ?>
     <div class="apsp_count_float_main_demo_wrapper">
          <?php
          $arr = explode( "-", $floating_sidebar[ 'theme' ] );
          $template_id = $arr[ 1 ];
          if ( isset( $template_id ) && $template_id <= 6 ) {
               include(SC_PRO_PATH . '/frontend/template/floating/floating_old_template.php');
          } else {
               include(SC_PRO_PATH . '/frontend/template/floating/floating_new_template.php');
          }
          ?>
     </div>
<?php }
?>

<?php
