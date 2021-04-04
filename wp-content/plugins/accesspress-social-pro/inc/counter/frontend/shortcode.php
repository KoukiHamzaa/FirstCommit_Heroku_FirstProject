<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );

$apsc_settings = $this -> apsc_settings;

//$this -> print_array( $apsc_settings );
//echo "Shortcode Attributes: ";
//$this->print_array($atts);

if ( isset( $atts[ 'profiles' ] ) ) {
     $profiles_atts = strtolower( $atts[ 'profiles' ] );
     $profiles_atts = str_replace( 'google-plus', 'google-plus', $profiles_atts );
     $apsc_settings[ 'profile_order' ] = explode( ',', $profiles_atts );
}

$apsc_settings[ 'social_profile_theme' ] = isset( $atts[ 'theme' ] ) ? $atts[ 'theme' ] : $apsc_settings[ 'social_profile_theme' ];
$hide_count = ( isset( $apsc_settings[ 'hide_count' ] ) && $apsc_settings[ 'hide_count' ] == '1' ) ? '1' : '0';
$hide_count = ( isset( $atts[ 'hide_count' ] ) ) ? $atts[ 'hide_count' ] : $hide_count;

if ( $hide_count != '1' ) {
     $count_class = "counter-enable";
} else {
     $count_class = '';
}

$apsc_settings[ 'counter_format' ] = ( isset( $atts[ 'counter_format' ] ) ) ? $atts[ 'counter_format' ] : $apsc_settings[ 'counter_format' ];

if ( isset( $atts[ 'animation' ] ) && $atts[ 'animation' ] != 'default' ) {
     $apsc_settings[ 'icon_hover_animation' ] = 'apsc-' . $atts[ 'animation' ];
}

$cache_period = ($apsc_settings[ 'cache_period' ] != '') ? $apsc_settings[ 'cache_period' ] * 60 * 60 : 24 * 60 * 60;
$animation_class = ($apsc_settings[ 'icon_hover_animation' ] != '') ? ' ' . $apsc_settings[ 'icon_hover_animation' ] : '';

include(SC_PRO_PATH . '/frontend/demo-file.php');
?>

<div class="apsp_count_inline_main_demo_wrapper">

     <?php
     $arr = explode( "-", $apsc_settings[ 'social_profile_theme' ] );
     $template_id = $arr[ 1 ];
     if ( isset( $template_id ) && $template_id <= 20 ) {
          include(SC_PRO_PATH . '/frontend/template/inline/old_template.php');
     } else {
          include(SC_PRO_PATH . '/frontend/template/inline/new_template.php');
     }
     ?>

</div>
<?php
