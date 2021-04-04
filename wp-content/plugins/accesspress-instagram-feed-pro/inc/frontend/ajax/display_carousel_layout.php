<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );?>
<?php foreach ($carousels as $key => $value) {
   $image_url = esc_url($value['url']);
   $type = esc_attr($value['type']);
   $width = esc_attr($value['width']);
   $height = esc_attr($value['height']);
  	if($image_url != ''){?>
    <li class="apif-popup-each-item">
     <a class="apif-example-link" style="background-image:url(<?php echo $image_url;?>);"></a>
    <!--  <img class="img-responsive" src="< ?php echo $image_url;?>" width="< ?php echo $width;?>" height="< ?php echo $height;?>"/> -->
     </li>
  	<?php
    }
  }
?>